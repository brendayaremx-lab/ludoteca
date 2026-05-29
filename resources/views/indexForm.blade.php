<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayGest - Solicitud de Préstamo</title>
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
                <a href="{{ url('/catalogo') }}" class="text-decoration-none">
                    <button class="btn btn-outline-primary rounded-3 px-3">
                        <i class="bi bi-code-slash me-2"></i>Juegos
                    </button>
                </a>
                <a href="{{ url('/indexForm') }}" class="text-decoration-none">
                    <button class="btn btn-outline-primary rounded-3 px-3">
                        <i class="bi bi-briefcase me-2"></i>Realizar Préstamo
                    </button>
                </a>
            </div>
        </div>
    </nav>

    <section class="container-fluid p-0 mb-5">
        <div class="row g-0">
            <div class="col-md-3 d-flex align-items-center justify-content-center py-5 px-3" style="background-color: #3b3bc2; min-height: 500px;">
                <img src="{{ asset('img/logoply.jpg.jpeg') }}" alt="Logo Ply" class="img-fluid rounded-3 shadow">
            </div>

            <div class="col-md-9 d-flex justify-content-center align-items-center py-5 bg-white">
                <div class="card border border-2 shadow-sm rounded-4 p-4" style="width: 100%; max-width: 450px;">
                    <h4 class="fw-bold mb-4">Solicitud de Préstamo de Juego</h4>
                    
                    <form id="prestamoForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold mb-1">Nombre de Usuario</label>
                            <input type="text" id="nombreCliente" class="form-control" placeholder="Escribe tu usuario" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold mb-1">Número de Personas</label>
                            <input type="text" id="numeroPersonas" class="form-control" placeholder="ej. 4" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold mb-1">Juegos seleccionados</label>
                            <div id="juegosSeleccionados" class="border rounded-3 p-3 bg-light" style="min-height: 80px;">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 mb-2" style="background-color: #2435b3; border-color: #2435b3;">
                            Enviar Solicitud
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>