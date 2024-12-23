<header style="background-color: rgba(34, 34, 34, 0.8); position: fixed; width: 100%; z-index: 10;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-dice me-2"></i>Fortunato Casino</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="#">
                            <i class="fas fa-home me-2"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-chess-queen me-2"></i>Casino</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link position-relative text-white" href="#">
                            <i class="fas fa-futbol me-2"></i>Deportes
                            <span
                                style="display: block; height: 3px; background-color: red; width: 100%; position: absolute; bottom: -5px; left: 0;"></span>
                        </a>
                    </li>

                </ul>
                <button class="btn btn-outline-light me-2" type="button" style="border: none;">
                    <i class="fas fa-search me-2"></i>Buscar
                </button>
                @if (Session::has('isLoggedIn'))
                    <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle d-flex align-items-center" type="button" id="userMenu"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/Perfil.jpg') }}" alt="Avatar" class="rounded-circle me-2"
                                style="width: 30px; height: 30px;">
                            <span class="me-2 fw-bold">TOTAL $0.00 |</span>Hacer un depósito
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="fas fa-user me-2"></i><span class="me-4">Mi cuenta</span>
                                    <span class="ms-auto text-danger d-flex align-items-center">
                                        <i class="fas fa-exclamation-triangle me-1"></i>Completar
                                    </span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cogs me-2"></i>Configuración</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-headset me-2"></i>Soporte Online</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Cerrar
                                        Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                    </button>
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <i class="fas fa-user-plus me-2"></i>Registrarse
                    </button>
                @endif
            </div>
        </div>
    </nav>
</header>