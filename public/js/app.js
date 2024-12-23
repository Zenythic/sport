document.addEventListener('DOMContentLoaded', () => {
    const toggleDeportes = document.getElementById('toggle-deportes');
    const sportsList = document.querySelector('.sports-list');
    const sports = document.querySelectorAll('.sports-list li');
    const countries = [
        'Venezuela', 'Argentina', 'Brasil', 'España', 'Italia', 'Alemania',
        'Francia', 'México', 'Chile', 'Perú', 'Colombia', 'Uruguay',
        'Paraguay', 'Ecuador', 'Costa Rica', 'Inglaterra', 'Portugal',
        'Países Bajos', 'Bélgica', 'Suiza'
    ];

    toggleDeportes.addEventListener('click', () => {
        if (sportsList.style.display === 'none' || sportsList.style.display === '') {
            sportsList.style.display = 'block';
            toggleDeportes.querySelector('i').classList.replace('fa-chevron-down', 'fa-chevron-up');
        } else {
            sportsList.style.display = 'none';
            toggleDeportes.querySelector('i').classList.replace('fa-chevron-up', 'fa-chevron-down');
        }
    });

    sports.forEach(sport => {
        const chevronDown = sport.querySelector('i.fa-chevron-down') || document.createElement('i');
        if (!sport.querySelector('i.fa-chevron-down')) {
            chevronDown.classList.add('fas', 'fa-chevron-down');
            sport.appendChild(chevronDown);
        }

        const countriesList = sport.querySelector('.countries-list');

        sport.addEventListener('click', (event) => {
            event.stopPropagation();
            if (countriesList.style.display === 'none' || countriesList.style.display === '') {
                const selectedCountries = countries.sort(() => 0.5 - Math.random()).slice(0, 10);

                countriesList.innerHTML = '';
                selectedCountries.forEach(country => {
                    const li = document.createElement('li');
                    li.textContent = country;
                    countriesList.appendChild(li);
                });

                countriesList.style.display = 'block';
                chevronDown.classList.replace('fa-chevron-down', 'fa-chevron-up');
            } else {
                countriesList.style.display = 'none';
                chevronDown.classList.replace('fa-chevron-up', 'fa-chevron-down');
            }
        });
    });
});


const WIN_MULTIPLIER = 2.5;

let couponData = [];

function showTab(tabId) {
    const tabs = document.querySelectorAll(".tab-content");
    const buttons = document.querySelectorAll(".tab");

    tabs.forEach((tab) => (tab.style.display = "none"));
    buttons.forEach((button) => button.classList.remove("active"));

    document.getElementById(tabId).style.display = "block";
    document
        .querySelector(button[(onclick = "showTab('${tabId}')")])
        .classList.add("active");
}

function updateBetDetails() {
    const betAmount =
        parseFloat(document.getElementById("bet-amount").value) || 0;
    const totalBet = betAmount.toFixed(2);
    const possibleWin = (betAmount * WIN_MULTIPLIER).toFixed(2);

    document.getElementById("total-bet").textContent = totalBet;
    document.getElementById("possible-win").textContent = possibleWin;
}

function addToHistory(
    date,
    league,
    team1,
    team2,
    betTeam,
    totalBet,
    possibleWin
) {
    const historyList = document.getElementById("history-list");
    const emptyHistoryText = document.getElementById("empty-history-text");

    const historyItem = document.createElement("div");
    historyItem.style.marginBottom = "5px";
    historyItem.style.lineHeight = "2";

    historyItem.innerHTML = `
    <div style="justify-content: flex-start; align-items: center; margin: 0;">
        <p class="text-success" style="margin-bottom: 0;">${date}</p>
        <p class="text-white" style="margin-bottom: 0;">${league}</p>
    </div>
    <div style="margin: 0;">
        <p class="text-white text-left" style="margin-bottom: 0;">${team1} vs ${team2}</p>
        <p class="text-white" style="margin-bottom: 0;">${betTeam}</p>
        <p class="text-secondary" style="font-size: 10px; margin-bottom: 0;">Total de Apuestas: ${totalBet} USD</p>
        <p class="text-secondary" style="font-size: 10px; margin-bottom: 0;">Ganancia Posible: ${possibleWin} USD</p>
        <p class="text-secondary" style="font-size: 10px; margin-bottom: 0;">Estado: En proceso</p>
    </div>
`;
    historyList.appendChild(historyItem);

    emptyHistoryText.style.display = "none";
}

function placeBet() {
    const betAmount = parseFloat(document.getElementById("bet-amount").value);
    const totalBet = betAmount.toFixed(2);
    const possibleWin = (betAmount * WIN_MULTIPLIER).toFixed(2);

    if (betAmount <= 0 || isNaN(betAmount)) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ingresa una cantidad válida para apostar.",
        });
        return;
    }

    if (couponData.length === 0) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "No hay selecciones en tu cupón.",
        });
        return;
    }

    fetch("/auth/check-login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({}),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                Swal.fire({
                    title: "¿Confirmas esta apuesta?",
                    html: `
                    <p><strong>Cantidad:</strong> ${totalBet} USD</p>
                    <p><strong>Ganancia Posible:</strong> ${possibleWin} USD</p>`,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, apostar",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        const { date, league, team1, team2, betTeam } =
                            couponData[0];
                        addToHistory(
                            date,
                            league,
                            team1,
                            team2,
                            betTeam,
                            totalBet,
                            possibleWin
                        );
                        Swal.fire({
                            icon: "success",
                            title: "¡Apuesta realizada!",
                            text: "Tu apuesta ha sido procesada con éxito.",
                        });
                        document.getElementById("bet-amount").value = "";
                        updateBetDetails();
                    }
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Inicia sesión para realizar la apuesta.",
                });
            }
        })
        .catch((error) => {
            console.error("Error al realizar la solicitud:", error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudo procesar tu solicitud. Inténtalo más tarde.",
            });
        });
}

function toggleCoupon(icon, league, date, team1, team2) {
    icon.style.color = icon.style.color === "red" ? "#aaa" : "red";
    const couponList = document.getElementById("coupon-list");
    const emptyText = document.getElementById("empty-coupon-text");

    if (icon.style.color === "red") {
        couponData.push({ date, league, team1, team2, betTeam: team1 });
        const listItem = document.createElement("li");
        listItem.innerHTML = `
            <div>
                <strong>${league}</strong><br>
                <span style="color: #28a745; font-weight: bold;">${date}</span><br>
                ${team1} vs ${team2}
                <i class="fas fa-times" style="cursor: pointer; float: right; color: red;" onclick="removeCoupon(this)"></i>
            </div>`;
        couponList.appendChild(listItem);
        emptyText.style.display = "none";
    } else {
        couponData = couponData.filter(
            (coupon) => coupon.date !== date || coupon.league !== league
        );
        const items = couponList.querySelectorAll("li");
        items.forEach((item) => {
            if (
                item.innerHTML.includes(league) &&
                item.innerHTML.includes(date)
            ) {
                couponList.removeChild(item);
            }
        });
        if (couponList.children.length === 0) {
            emptyText.style.display = "block";
        }
    }
}

function removeCoupon(icon) {
    const listItem = icon.parentElement.parentElement;
    const couponList = document.getElementById("coupon-list");
    couponList.removeChild(listItem);
    if (couponList.children.length === 0) {
        document.getElementById("empty-coupon-text").style.display = "block";
    }
}

function toggleFavorite(icon, league, date, team1, team2) {
    const isFavorite = icon.style.color === "red";

    Swal.fire({
        title: isFavorite ? "¿Eliminar de favoritos?" : "¿Agregar a favoritos?",
        text: isFavorite
            ? `¿Estás seguro que deseas eliminar "${league}" de tus favoritos?`
            : `¿Estás seguro que deseas agregar "${league}" a tus favoritos?`,
        icon: "question",
        showCancelButton: true,
        confirmButtonText: isFavorite ? "Eliminar" : "Agregar",
        cancelButtonText: "Cancelar",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            icon.style.color = isFavorite ? "#aaa" : "red";

            const favoriteList = document.getElementById(
                "favorite-sports-list"
            );
            if (isFavorite) {
                Array.from(favoriteList.children).forEach((item) => {
                    if (
                        item.querySelector("span").textContent === league &&
                        item.querySelector("span:nth-child(2)").textContent ===
                            date
                    ) {
                        favoriteList.removeChild(item);
                    }
                });
            } else {
                const favoriteItem = document.createElement("li");
                favoriteItem.innerHTML = `
                    <div style="margin-top: 10px; text-align: left;">
                    <i class="fas fa-thumbtack" style="cursor: pointer; font-size: 1.5rem; color: #aaa; float: right;"
                        onclick="toggleCoupon(this, '${league}', '${date}', '${team1}', '${team2}')">
                    </i>
                        <div style="margin-top: 10px; font-size: 1rem;">
                            <span class='text-white'>${league}</span><br>
                            <span style="color: #28a745; font-weight: bold;">${date}</span> <br>
                            <span class='text-white'>${team1} (1)</span><br>
                            <span class='text-white'>${team2} (2)</span><br>
                        </div>
                    </div>
                `;
                favoriteList.appendChild(favoriteItem);
            }

            Swal.fire({
                icon: "success",
                title: isFavorite ? "Eliminado" : "Agregado",
                text: isFavorite
                    ? "El partido ha sido eliminado de tus favoritos."
                    : "El partido ha sido agregado a tus favoritos.",
                timer: 2000,
                showConfirmButton: false,
            });
        }
    });
}

document.querySelectorAll(".bet-card button").forEach((button) => {
    button.addEventListener("click", function () {
        alert("¡Apuesta realizada!");
    });
});

document.querySelectorAll(".sports-icons div").forEach((icon) => {
    icon.addEventListener("click", function () {
        document
            .querySelectorAll(".sports-icons div")
            .forEach((el) => el.classList.remove("selected"));
        this.classList.add("selected");
    });
});

document.querySelectorAll(".nav-bar .nav-item").forEach((item) => {
    item.addEventListener("click", function () {
        document.querySelectorAll(".nav-bar .nav-item").forEach((el) => el.classList.remove("selected"));
        this.classList.add("selected");
    });
});

