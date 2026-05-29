<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayGest - Panel de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3 sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/ludoteca') }}">
                <img src="{{ asset('img/logo2.jpg.jpeg') }}" alt="Logo PlayGest" width="40" height="40" class="rounded-circle object-fit-cover">
                <span class="fs-4 fw-normal text-dark">PlayGest</span>
            </a>
            
            <div class="d-none d-lg-flex align-items-center gap-3 ms-4">
                <a href="{{ url('/ludoteca') }}" class="text-decoration-none">
                    <button class="btn btn-outline-primary rounded-3 px-3">
                        <i class="bi bi-house-door me-2"></i>Inicio
                    </button>
                </a>
                <a href="{{ url('/admin/catalogo') }}" class="text-decoration-none">
                    <button class="btn btn-outline-primary rounded-3 px-3">
                        <i class="bi bi-code-slash me-2"></i>Gestión Catálogo
                    </button>
                </a>
            </div>

            <div class="ms-auto">
                <span class="badge rounded-pill bg-danger px-3 py-2 fw-medium border">
                    <i class="bi bi-shield-lock me-1"></i> Modo Administrador
                </span>
            </div>
        </div>
    </nav>

    <section class="container py-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Solicitudes Pendientes</h3>
                        <p class="text-muted mb-0">Revisa y gestiona las peticiones de préstamo del catálogo.</p>
                    </div>
                    <span id="contadorSolicitudes" class="badge bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center fs-6 shadow-sm" style="width: 35px; height: 35px; background-color: #2435b3 !important;">
                        0
                    </span>
                </div>

                <div id="contenedorSolicitudes" class="list-group shadow-sm border-0 rounded-4 overflow-hidden" style="min-height: 150px; background-color: #ffffff;">
                    </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>