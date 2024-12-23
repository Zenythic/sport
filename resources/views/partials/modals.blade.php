<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Modal Iniciar Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header bg-dark text-white rounded-top">
                <h5 class="modal-title fw-bold" id="loginModalLabel"><i class="fas fa-sign-in-alt me-2"></i>Iniciar
                    Sesión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="loginForm" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label for="loginUser" class="form-label text-dark"><i
                                class="fas fa-user-circle me-2"></i>Usuario</label>
                        <input type="text" class="form-control rounded-pill px-3" id="loginUser"
                            placeholder="Ingrese su usuario" required>
                    </div>
                    <div class="mb-4">
                        <label for="loginPassword" class="form-label text-dark"><i
                                class="fas fa-lock me-2"></i>Contraseña</label>
                        <input type="password" class="form-control rounded-pill px-3" id="loginPassword"
                            placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger rounded-pill px-4 py-2" id="loginBtn">
                            <i class="fas fa-check me-2"></i>Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Registrarse -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header bg-dark text-white rounded-top">
                <h5 class="modal-title fw-bold" id="registerModalLabel"><i class="fas fa-user-plus me-2"></i>Registrarse
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="registerForm" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label for="registerUser" class="form-label text-dark"><i
                                class="fas fa-user-circle me-2"></i>Usuario</label>
                        <input type="text" class="form-control rounded-pill px-3" id="registerUser"
                            placeholder="Elige un nombre de usuario" required>
                    </div>
                    <div class="mb-4">
                        <label for="registerPassword" class="form-label text-dark"><i
                                class="fas fa-lock me-2"></i>Contraseña</label>
                        <input type="password" class="form-control rounded-pill px-3" id="registerPassword"
                            placeholder="Crea una contraseña segura" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirmPassword" class="form-label text-dark"><i
                                class="fas fa-lock me-2"></i>Confirmar Contraseña</label>
                        <input type="password" class="form-control rounded-pill px-3" id="confirmPassword"
                            placeholder="Repite tu contraseña" required>
                    </div>
                    <div class="text-danger text-center fw-bold mb-3" id="passwordError" style="display: none;">
                        <i class="fas fa-exclamation-circle me-2"></i>Las contraseñas no coinciden.
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger rounded-pill px-4 py-2" id="registerBtn">
                            <i class="fas fa-user-check me-2"></i>Registrarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("loginBtn").addEventListener("click", async function () {
        const username = document.getElementById("loginUser").value;
        const password = document.getElementById("loginPassword").value;

        // Validar campos vacíos
        if (!username || !password) {
            alert("Por favor, ingrese sus credenciales.");
            return;
        }

        try {
            // Enviar datos al backend
            const response = await fetch("/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },

                body: JSON.stringify({ username, password }),
            });

            const result = await response.json();

            if (result.success) {
                // Redirigir o actualizar interfaz tras el login
                window.location.reload();
            } else {
                alert(result.message || "Credenciales incorrectas.");
            }
        } catch (error) {
            console.error("Error en el inicio de sesión:", error);
            alert("Hubo un problema al procesar su solicitud.");
        }
    });
</script>