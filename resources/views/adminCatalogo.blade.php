<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PlayGest - Gestión de Inventario</title>
    <meta name="asset-base" content="{{ rtrim(asset(''), '/') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        /* Oculta los controles de préstamo al administrador */
        #mensaje-seleccion, #boton-prestamo { display: none !important; }
        .tarjeta { cursor: default !important; }
    </style>
</head>
<body>

    <nav class="barra" style="background-color: #2435b3;">
        <img src="{{ asset('img/logo2.jpg.jpeg') }}" style="display: inline-block; vertical-align: middle; width: 50px; margin-right: 10px;">
        <h1 style="display: inline-block; vertical-align: middle; color: white;">PlayGest <span style="font-size: 14px; color: #ffeb3b;">[ADMIN]</span></h1>
        <a href="{{ url('/ludoteca') }}" class="caja">Inicio</a>
        <a href="{{ url('/admin/catalogo') }}" class="caja">Gestión Catálogo</a>
        <a href="{{ url('/admin/solicitudes') }}" class="caja" style="margin-right:10px;">Ver Solicitudes</a>
    </nav>

    <div class="separador" style="margin-top: 40px;">
        <h2>Panel de Administrador: Inventario</h2>
    </div>

    <form id="form" class="formulario-admin">
        <h3 id="titulo-form">Agregar juego nuevo</h3>

        <label>Nombre del juego</label>
        <input type="text" id="nombreJuego" placeholder="Nombre del juego">

        <label>Dificultad</label>
        <select id="dificultad">
            <option value="Facil">Fácil</option>
            <option value="Medio">Media</option>
            <option value="Dificil">Difícil</option>
        </select>

        <label>Edad recomendada</label>
        <input type="text" id="edad" placeholder="ej: 18+">

        <label>Numero de jugadores</label>
        <input type="text" id="jugadores" placeholder="ej: 1-4">

        <label>Imagen (nombre del archivo en carpeta img/)</label>
        <input type="text" id="imagen" placeholder="ej: minecraft.jpg">

        <button type="submit">Agregar juego</button>
    </form>

    <div class="separador" style="margin-top: 40px;">
        <h2>Juegos en la Base de Datos</h2>
    </div>

    <div class="filtros">
    <input type="text" id="buscador" placeholder="Buscar juego...">

    <button type="button" id="btn-buscar">
        Buscar
    </button>
</div>

<div id="mensaje-busqueda"></div>

    <p id="contador" style="text-align: center; font-weight: bold; margin-top: 10px;"></p>
    <div class="tarjetas" id="contenedor-tarjetas"></div>
    <p id="mensaje-seleccion" style="display: none;"></p>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>