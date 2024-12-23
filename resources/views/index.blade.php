@extends('layouts.layout')

@section('content')

<div class="main-content">
    <div class="bet-card">
        <i class="fas fa-heart save-icon"></i>
        <div style="display: flex; justify-content: space-between;">
            <div style="text-align: left;">
                <i class="fas fa-futbol" style="font-size: 32px;"></i><br>
                <small>Fútbol</small>
            </div>
            <div style="border-left: 1px solid #ccc; padding-left: 10px;">
                <small>México > Liga MX</small><br>
                <small style="display: flex; align-items: center;">Pachuca <button
                        style="background-color: green; color: white; font-size: 10px; padding: 2px 5px; border: none; border-radius: 3px; margin-left: 70px;">En
                        vivo</button></small><br>
                <small style="font-size: 12px;" class="me-4"> Pumas UNAM<i class="far fa-clock time text-success" style="margin-left: 15px;"> 42' 1ª parte</i></small>
            </div>
        </div>
        <div class="bet-buttons">
            <button><i class="fas fa-lock"></i> <small>Pachuca</small></button>
            <button><i class="fas fa-lock"></i> <small>Empate</small></button>
            <button><i class="fas fa-lock"></i> <small>Pumas UNAM</small></button>
        </div>
    </div>

    <div class="bet-card">
        <i class="fas fa-heart save-icon"></i>
        <div style="display: flex; justify-content: space-between;">
            <div style="text-align: left;">
                <i class="fas fa-futbol" style="font-size: 32px;"></i><br>
                <small>Fútbol</small>
            </div>
            <div style="border-left: 1px solid #ccc; padding-left: 10px;">
                <small>México > Liga MX</small><br>
                <small style="display: flex; align-items: center;">Pachuca <button
                        style="background-color: green; color: white; font-size: 10px; padding: 2px 5px; border: none; border-radius: 3px; margin-left: 70px;">En
                        vivo</button></small><br>
                        <small style="font-size: 12px;" class="me-4"> Pumas UNAM<i class="far fa-clock time text-success" style="margin-left: 15px;"> 42' 1ª parte</i></small>
            </div>
        </div>
        <div class="bet-buttons">
            <button><i class="fas fa-lock"></i> <small>Pachuca</small></button>
            <button><i class="fas fa-lock"></i> <small>Empate</small></button>
            <button><i class="fas fa-lock"></i> <small>Pumas UNAM</small></button>
        </div>
    </div>

    <div class="bet-slip">
        <div class="bet-slip-tabs">
            <button class="tab active" onclick="showTab('coupon')">Tu Cupón</button>
            <button class="tab" onclick="showTab('history')">Historial</button>
        </div>
        <div class="tab-content" id="coupon">
            <p id="empty-coupon-text">No hay selecciones en el boleto de apuesta</p>
            <ul id="coupon-list" class="coupon-list"></ul>
            <div class="bet-details" style="margin-top: 15px;">
                <input type="number" id="bet-amount" placeholder="$"
                    style="width: 20%; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"
                    oninput="updateBetDetails()">
            </div>
            <div class="text-center" style="margin-top: 5px;">
                <button class="place-bet" onclick="placeBet()"
                    style="display: inline-block; margin: 0 auto; padding: 8px; background-color: #ff4d4f; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Realizar Apuesta
                </button>
            </div>
            <div class="bet-summary" style="margin-top: 10px; text-align: center; font-size: 8px; line-height: 0;">
                <p><strong>Total de Apuesta:</strong> <span id="total-bet">0.00</span> USD</p>
                <p><strong>Ganancia Posible:</strong> <span id="possible-win">0.00</span> USD</p>
            </div>
        </div>
        <div class="tab-content" id="history" style="display: none;">
            <ul id="history-list">
                <p id="empty-history-text">No hay historial disponible</p>
            </ul>
        </div>
    </div>
</div>
</div>

<div class="sports-icons">
    <div class="selected">
        <i class="fas fa-globe"></i>
        <small>Todos</small>
    </div>
    <div>
        <i class="fas fa-futbol"></i>
        <small>Fútbol</small>
    </div>
    <div>
        <i class="fas fa-basketball-ball"></i>
        <small>Basketball</small>
    </div>
    <div>
        <i class="fas fa-baseball-ball"></i>
        <small>Béisbol</small>
    </div>
    <div>
        <i class="fas fa-hockey-puck"></i>
        <small>Hockey</small>
    </div>
    <div>
        <i class="fas fa-football-ball"></i>
        <small>Fútbol Americano</small>
    </div>
    <div>
        <i class="fas fa-table-tennis"></i>
        <small>Tenis</small>
    </div>
</div>

<div class="nav-bar" style="margin-top: 20px;">
    <div class="nav-item selected">
        <small>Partidos en Vivo</small>
    </div>
    <div class="nav-item">
        <small>Recomendados</small>
    </div>
    <div class="nav-item">
        <small>Próximos</small>
    </div>
    <div class="nav-item search-bar">
        <i class="fa fa-search"></i>
        <input type="text" placeholder="Buscar por equipo" disabled>
    </div>
    <div class="nav-item">
        <select>
            <option>Todas las categorías</option>
        </select>
    </div>
    <div class="nav-item">
        <select>
            <option>Recientes</option>
            <option>Semanal</option>
            <option>Mensual</option>
        </select>
    </div>
</div>

<h2 style="margin-left: 20px; font-size: 24px; margin-top: 20px;">Partidos en vivo</h2>
@foreach ($matches as $match)
    <div class="match-container"
        style="margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 8px; margin-left: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 1; margin-right: 10px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2 style="margin: 0; font-size: 1.2rem;">{{ $match['league'] }}</h2>
                    <i class="far fa-heart" style="cursor: pointer; font-size: 1.5rem; color: #aaa;"
                        onmouseover="this.classList.replace('far', 'fas')" onmouseout="this.classList.replace('fas', 'far')"
                        onclick="toggleFavorite(this, '{{ $match['league'] }}', '{{ $match['date'] }}', '{{ $match['teams'][0]['name'] }}', '{{ $match['teams'][1]['name'] }}')">
                    </i>
                </div>

                <div style="margin-top: 10px; text-align: left;">
                    <button
                        style="background-color: #28a745; color: white; border: none; padding: 5px 15px; border-radius: 5px; cursor: pointer;">
                        En vivo
                    </button>
                    <span style="color: #28a745; font-weight: bold; margin-left: 15px;">{{ $match['time'] }}</span>
                    <i class="fas fa-thumbtack" style="cursor: pointer; font-size: 1.5rem; color: #aaa; float: right;"
                        onclick="toggleCoupon(this, '{{ $match['league'] }}', '{{ $match['date'] }}', '{{ $match['teams'][0]['name'] }}', '{{ $match['teams'][1]['name'] }}')">
                    </i>
                    <div style="margin-top: 10px; font-size: 1rem;">
                        <span>{{ $match['teams'][0]['name'] }}</span>
                        <span>{{ $match['teams'][0]['bets']['1x2']['1'] }}</span> <br>
                        <span>{{ $match['teams'][1]['name'] }}</span>
                        <span>{{ $match['teams'][1]['bets']['1x2']['2'] }}</span><br>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">1x2</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(3, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['1x2']['1'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">Empate:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['1x2']['empate'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">2:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['1x2']['2'] }}</span>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">Doble Oportunidad</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(3, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1 o empate: </span><br>
                        <span>{{ $match['teams'][0]['bets']['doble_oportunidad']['1 o empate'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">Empate o 2: </span>
                        <br>
                        <span>{{ $match['teams'][0]['bets']['doble_oportunidad']['empate o 2'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1 o 2:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['doble_oportunidad']['1 o 2'] }}</span>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">Total</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(4, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Más de 3.0:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['total']['más de 3.0'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Menos de 3.0:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['total']['menos de 3.0'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Más de 3.5: </span> <br>
                        <span>{{ $match['teams'][1]['bets']['total']['más de 3.5'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Menos de 3.5:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['total']['menos de 3.5'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="text-center">
    <button class="btn btn-danger" type="button">
        <i class="fas fa-futbol me-2"></i>Ver Todos los Partidos
    </button>
</div>

<h2 style="margin-left: 20px; font-size: 24px; margin-top: 20px;">Partidos Recomendados</h2>
@foreach ($recommendedMatches as $match)
    <div class="match-container"
        style="margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 8px; margin-left: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="flex: 1; margin-right: 10px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2 style="margin: 0; font-size: 1.2rem;">{{ $match['league'] }}</h2>
                    <i class="far fa-heart" style="cursor: pointer; font-size: 1.5rem; color: #aaa;"
                        onmouseover="this.classList.replace('far', 'fas')" onmouseout="this.classList.replace('fas', 'far')"
                        onclick="toggleFavorite(this, '{{ $match['league'] }}', '{{ $match['date'] }}', '{{ $match['teams'][0]['name'] }}', '{{ $match['teams'][1]['name'] }}')">
                    </i>
                </div>

                <div style="margin-top: 10px; text-align: left;">
                    <span style="color: #28a745; font-weight: bold; margin-left: 15px;">{{ $match['date'] }}</span>
                    <i class="fas fa-thumbtack" style="cursor: pointer; font-size: 1.5rem; color: #aaa; float: right;"
                        onclick="toggleCoupon(this, '{{ $match['league'] }}', '{{ $match['date'] }}', '{{ $match['teams'][0]['name'] }}', '{{ $match['teams'][1]['name'] }}')">
                    </i>


                    <div style="margin-top: 10px; font-size: 1rem;">
                        <span>{{ $match['teams'][0]['name'] }}</span>
                        <span>{{ $match['teams'][0]['bets']['1x2']['1'] }}</span> <br>
                        <span>{{ $match['teams'][1]['name'] }}</span>
                        <span>{{ $match['teams'][1]['bets']['1x2']['2'] }}</span><br>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">1x2</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(3, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['1x2']['1'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">Empate:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['1x2']['empate'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">2:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['1x2']['2'] }}</span>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">Doble Oportunidad</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(3, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1 o empate: </span><br>
                        <span>{{ $match['teams'][0]['bets']['doble_oportunidad']['1 o empate'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">Empate o 2: </span>
                        <br>
                        <span>{{ $match['teams'][0]['bets']['doble_oportunidad']['empate o 2'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1 o 2:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['doble_oportunidad']['1 o 2'] }}</span>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">Total</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(4, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Más de 3.0:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['total']['más de 3.0'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Menos de 3.0:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['total']['menos de 3.0'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Más de 3.5: </span> <br>
                        <span>{{ $match['teams'][1]['bets']['total']['más de 3.5'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Menos de 3.5:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['total']['menos de 3.5'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="text-center">
    <button class="btn btn-danger" type="button">
        <i class="fas fa-futbol me-2"></i>Ver Todos los Partidos Recomendados

    </button>
</div>

<h2 style="margin-left: 20px; font-size: 24px; margin-top: 20px;">Próximos Partidos</h2>
@foreach ($upcomingMatches as $match)
    <div class="match-container"
        style="margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 8px; margin-left: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">

            <div style="flex: 1; margin-right: 10px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2 style="margin: 0; font-size: 1.2rem;">{{ $match['league'] }}</h2>
                    <i class="far fa-heart" style="cursor: pointer; font-size: 1.5rem; color: #aaa;"
                        onmouseover="this.classList.replace('far', 'fas')" onmouseout="this.classList.replace('fas', 'far')"
                        onclick="toggleFavorite(this, '{{ $match['league'] }}', '{{ $match['date'] }}', '{{ $match['teams'][0]['name'] }}', '{{ $match['teams'][1]['name'] }}')">
                    </i>
                </div>

                <div style="margin-top: 10px; text-align: left;">
                    <span style="color: #28a745; font-weight: bold; margin-left: 15px;">{{ $match['date'] }}</span>
                    <i class="fas fa-thumbtack" style="cursor: pointer; font-size: 1.5rem; color: #aaa; float: right;"
                        onclick="toggleCoupon(this, '{{ $match['league'] }}', '{{ $match['date'] }}', '{{ $match['teams'][0]['name'] }}', '{{ $match['teams'][1]['name'] }}')">
                    </i>
                    <div style="margin-top: 10px; font-size: 1rem;">
                        <span>{{ $match['teams'][0]['name'] }}</span>
                        <span>{{ $match['teams'][0]['bets']['1x2']['1'] }}</span> <br>
                        <span>{{ $match['teams'][1]['name'] }}</span>
                        <span>{{ $match['teams'][1]['bets']['1x2']['2'] }}</span><br>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">1x2</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(3, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['1x2']['1'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">Empate:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['1x2']['empate'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">2:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['1x2']['2'] }}</span>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">Doble Oportunidad</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(3, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1 o empate: </span><br>
                        <span>{{ $match['teams'][0]['bets']['doble_oportunidad']['1 o empate'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">Empate o 2: </span>
                        <br>
                        <span>{{ $match['teams'][0]['bets']['doble_oportunidad']['empate o 2'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.7rem;">
                        <span class="text-secondary">1 o 2:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['doble_oportunidad']['1 o 2'] }}</span>
                    </div>
                </div>
            </div>

            <div style="flex: 1; margin-left: 5px;">
                <h3 style="text-align: center; font-size: 1.2rem; margin-bottom: 10px;">Total</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(4, 1fr); margin-top: 10px; text-align: center; font-size: 1.2rem;">
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Más de 3.0:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['total']['más de 3.0'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Menos de 3.0:</span> <br>
                        <span>{{ $match['teams'][0]['bets']['total']['menos de 3.0'] }}</span>
                    </div>
                    <div style="border-right: 1px solid #ddd; padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Más de 3.5: </span> <br>
                        <span>{{ $match['teams'][1]['bets']['total']['más de 3.5'] }}</span>
                    </div>
                    <div style="padding: 5px; font-size: 0.6rem;">
                        <span class="text-secondary">Menos de 3.5:</span> <br>
                        <span>{{ $match['teams'][1]['bets']['total']['menos de 3.5'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="text-center">
    <button class="btn btn-danger" type="button">
        <i class="fas fa-futbol me-2"></i>Ver Todos los Proximos Partidos
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection