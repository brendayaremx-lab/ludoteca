<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PlayGest - Catálogo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        /* Oculta los botones de administración en la vista de usuario */
        .btn-editar, .btn-eliminar { display: none !important; }
    </style>
</head>
<body>

    <nav class="barra">
        <img src="{{ asset('img/logo2.jpg.jpeg') }}" style="display: inline-block; vertical-align: middle; width: 50px; margin-right: 10px;">
        <h1 style="display: inline-block; vertical-align: middle;">PlayGest</h1>
        <a href="{{ url('/ludoteca') }}" class="caja">Inicio</a>
        <a href="{{ url('/catalogo') }}" class="caja">Juegos</a>
        <a href="{{ url('/indexForm') }}" class="caja" style="margin-right:10px;">Realizar Préstamo</a>
    </nav>

    <h1>Catálogo de Juegos</h1>

    <div class="filtros">
    <input type="text" id="buscador" placeholder="Buscar juego...">

    <button type="button" id="btn-buscar">
        Buscar
    </button>
</div>

<div id="mensaje-busqueda"></div>

    <p id="mensaje-seleccion">Seleccionados: 0 / 3</p>
    <button id="boton-prestamo" onclick="irAPrestamo()">Solicitar prestamo →</button>
    <p id="contador"></p>

    <div class="tarjetas" id="contenedor-tarjetas"></div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>