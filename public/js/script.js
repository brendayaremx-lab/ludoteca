if (document.getElementById('contenedor-tarjetas')) {
    const form = document.getElementById('form');
    const contenedor = document.getElementById('contenedor-tarjetas');
    const contador = document.getElementById('contador');

    let editandoId = null;
    let juegos = [];
    let seleccionados = [];

    function cargarJuegos() {
        fetch('/api/juegos')
            .then(res => res.json())
            .then(data => {
                juegos = data;
                mostrarJuegos();
            })
            .catch(err => console.error("Error al cargar la BD:", err));
    }

    cargarJuegos();

    if(form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            
            const datos = {
                nombre: document.getElementById('nombreJuego').value,
                dificultad: document.getElementById('dificultad').value,
                edad_recomendada: document.getElementById('edad').value,
                numero_jugadores: document.getElementById('jugadores').value,
                imagen: document.getElementById('imagen').value || 'default.jpg' 
            };

            if (!datos.nombre || !datos.dificultad || !datos.edad_recomendada || !datos.numero_jugadores) {
                alert('Todos los campos son obligatorios');
                return;
            }

            const url = editandoId ? `/api/admin/juegos/${editandoId}` : '/api/admin/juegos';
            const method = editandoId ? 'PUT' : 'POST';

            fetch(url, {
                method: method,
                headers: { 
                    'Content-Type': 'application/json', 
                    'Accept': 'application/json' 
                },
                body: JSON.stringify(datos)
            })
            .then(res => res.json())
            .then(() => {
                cargarJuegos();
                form.reset();
                document.getElementById('titulo-form').textContent = 'Agregar juego nuevo';
                form.querySelector("button[type='submit']").textContent = 'Agregar juego';
                editandoId = null;
            })
            .catch(err => console.error('Error al guardar:', err));
        });
    }

    function mostrarJuegos(lista = juegos, busquedaActiva = false) {
    contenedor.innerHTML = '';

    if (contador) {
        contador.textContent = busquedaActiva
            ? `Resultados encontrados: ${lista.length}`
            : `Juegos en catálogo: ${juegos.length}`;
    }

    if (lista.length === 0) {
        contenedor.innerHTML = `
            <div class="text-center text-muted p-4">
                ${busquedaActiva ? 'No se encontraron coincidencias.' : 'No hay juegos todavía.'}
            </div>
        `;
        return;
    }

    lista.forEach((juego) => {
        const estaSeleccionado = seleccionados.includes(juego.id);

        const card = document.createElement('div');
        card.className = 'tarjeta' + (estaSeleccionado ? ' seleccionado' : '');

        if (document.getElementById('boton-prestamo')) {
            card.onclick = function (e) {
                if (e.target.tagName !== 'BUTTON') seleccionar(juego.id);
            };
        }

<<<<<<< HEAD
        const baseUrl = document.querySelector('meta[name="asset-base"]')?.content ?? '';
        const imagenHTML = juego.imagen
            ? `<img src="${baseUrl}/img/${juego.imagen}" alt="${juego.nombre}">`
=======
        const imagenHTML = juego.imagen
            ? `<img src="/img/${juego.imagen}" alt="${juego.nombre}">`
>>>>>>> 64f9c9466bacb1c823f459513cee514e23e1d80f
            : `<div class="sin-imagen">Sin imagen</div>`;

        card.innerHTML = `
            ${imagenHTML}
            <h3>${juego.nombre}</h3>
            <p>Dificultad: ${juego.dificultad}</p>
            <p>Edad: ${juego.edad_recomendada}</p>
            <p>Jugadores: ${juego.numero_jugadores}</p>

            ${form ? `
<<<<<<< HEAD
                <div class="botones">
                    <button class="btn-editar" onclick="editarJuego(${juego.id})">Editar</button>
                    <button class="btn-eliminar" onclick="eliminarJuego(${juego.id})">Eliminar</button>
                </div>
=======
                <button onclick="editarJuego(${juego.id})">Editar</button>
                <button onclick="eliminarJuego(${juego.id})">Eliminar</button>
>>>>>>> 64f9c9466bacb1c823f459513cee514e23e1d80f
            ` : ''}
        `;

        contenedor.appendChild(card);
    });
}

function buscarJuegos() {
    const buscador = document.getElementById('buscador');
    const mensajeBusqueda = document.getElementById('mensaje-busqueda');

    if (!buscador) return;

    const texto = buscador.value.trim().toLowerCase();

    if (mensajeBusqueda) {
        mensajeBusqueda.innerText = '';
    }

    if (texto.length < 3) {
        if (mensajeBusqueda) {
            mensajeBusqueda.innerText = 'Escribe al menos 3 caracteres para buscar.';
        }

        mostrarJuegos();
        return;
    }

    const resultados = juegos.filter(juego =>
        juego.nombre.toLowerCase().includes(texto)
    );

    mostrarJuegos(resultados, true);
}

const btnBuscar = document.getElementById('btn-buscar');
const buscador = document.getElementById('buscador');

if (btnBuscar) {
    btnBuscar.addEventListener('click', buscarJuegos);
}

if (buscador) {
    buscador.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            buscarJuegos();
        }
    });

    buscador.addEventListener('input', function() {
        if (buscador.value.trim() === '') {
            const mensajeBusqueda = document.getElementById('mensaje-busqueda');

            if (mensajeBusqueda) {
                mensajeBusqueda.innerText = '';
            }

            mostrarJuegos();
        }
    });
}

    window.eliminarJuego = function(id) {
        if(confirm("¿Eliminar este juego?")) {
            fetch(`/api/admin/juegos/${id}`, { method: 'DELETE' })
                .then(() => cargarJuegos());
        }
    };

    window.editarJuego = function(id) {
        const juego = juegos.find(j => j.id === id);
        if(juego) {
            document.getElementById('nombreJuego').value = juego.nombre;
            document.getElementById('dificultad').value = juego.dificultad;
            document.getElementById('edad').value = juego.edad_recomendada;
            document.getElementById('jugadores').value = juego.numero_jugadores;
            document.getElementById('imagen').value = juego.imagen;

            document.getElementById('titulo-form').textContent = 'Editar juego';
            form.querySelector("button[type='submit']").textContent = 'Guardar cambios';
            editandoId = id;
            form.scrollIntoView({ behavior: 'smooth' });
        }
    };

    window.seleccionar = function(id) {
        if (seleccionados.includes(id)) {
            seleccionados = seleccionados.filter(x => x !== id);
        } else {
            if (seleccionados.length >= 3) {
                alert('Solo puedes seleccionar 3 juegos.');
                return;
            }
            seleccionados.push(id);
        }
        document.getElementById('mensaje-seleccion').textContent = `Seleccionados: ${seleccionados.length} / 3`;
        mostrarJuegos();
    };

    window.irAPrestamo = function() {
        if (seleccionados.length === 0) {
            alert('Selecciona al menos un juego.');
            return;
        }
        const juegosSeleccionados = juegos.filter(j => seleccionados.includes(j.id));
        const nombresJuegos = juegosSeleccionados.map(j => j.nombre);

        sessionStorage.setItem('selectedGamesNames', JSON.stringify(nombresJuegos));
        window.location.href = '/indexForm'; 
    };
}

if (document.getElementById('prestamoForm')) {
    const nombresGuardados = sessionStorage.getItem('selectedGamesNames');
    const contenedor = document.getElementById('juegosSeleccionados');

    let arrayJuegos = [];

    if (nombresGuardados && contenedor) {
        arrayJuegos = JSON.parse(nombresGuardados);
        if (arrayJuegos.length > 0) {
            contenedor.innerHTML = '<ul style="margin:0; padding-left:20px;">' +
                arrayJuegos.map(j => `<li><strong>${j}</strong></li>`).join('') +
                '</ul>';
        }
    } else if (contenedor) {
        contenedor.innerHTML = '<p class="text-muted mb-0 text-center">No hay juegos seleccionados. <a href="/catalogo">Volver al catálogo</a></p>';
    }

    const form = document.getElementById('prestamoForm');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const usuario = document.getElementById('nombreCliente').value;
        const personas = document.getElementById('numeroPersonas').value;

        if (!usuario || !personas || arrayJuegos.length === 0) {
            alert("Llena todos los campos y selecciona juegos en el catálogo.");
            return;
        }

        const payload = {
            nombre_cliente: usuario,
            numero_personas: personas,
            juegos: arrayJuegos 
        };

        fetch('/api/prestamos', {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json', 
                'Accept': 'application/json' 
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            sessionStorage.removeItem('selectedGamesNames');
            sessionStorage.setItem('ultimaSolicitud', JSON.stringify(data.prestamo));
            window.location.href = '/indexConfirm'; 
        })
        .catch(err => console.error("Error al enviar solicitud:", err));
    });
}

if (document.getElementById('confirmationCode')) {
    const dataStr = sessionStorage.getItem('ultimaSolicitud');
    if (dataStr) {
        const data = JSON.parse(dataStr);
        document.getElementById('confirmationCode').innerText = data.codigo_confirmacion;

        let juegosTexto = "";
        try {
            juegosTexto = JSON.parse(data.juegos).join(', ');
        } catch(e) {
            juegosTexto = data.juegos;
        }

        document.getElementById('listaJuegos').innerText = juegosTexto;

        const estatus = document.getElementById('estatusReservacion');
        if(estatus) {
            estatus.innerHTML = `<span class="badge bg-warning text-dark">${data.estado}</span>`;
        }
    }
}

if (document.getElementById('contenedorSolicitudes')) {
    function cargarSolicitudes() {
        fetch('/api/admin/solicitudes')
            .then(res => res.json())
            .then(prestamos => {
                const contenedor = document.getElementById('contenedorSolicitudes');
                const contador = document.getElementById('contadorSolicitudes');

                // Mostramos pendientes y entregadas.
                // Las entregadas son las que pueden marcarse como devueltas.
                const solicitudesVisibles = prestamos.filter(p =>
                    p.estado === 'Pendiente' || p.estado === 'Entregado'
                );

                if (contador) contador.innerText = solicitudesVisibles.length;

                if (solicitudesVisibles.length === 0) {
                    contenedor.innerHTML = '<div class="p-5 text-center text-muted">No hay solicitudes pendientes o entregadas.</div>';
                    return;
                }

                contenedor.innerHTML = '';

                solicitudesVisibles.forEach(sol => {
                    let juegosTexto = "";

                    try {
                        juegosTexto = JSON.parse(sol.juegos).join(', ');
                    } catch (e) {
                        juegosTexto = sol.juegos;
                    }

                    const item = document.createElement('div');
                    item.className = 'list-group-item bg-white p-4 border-bottom';

                    let botones = '';

                    if (sol.estado === 'Pendiente') {
                        botones = `
                            <button class="btn btn-outline-danger rounded-pill px-4"
                                onclick="gestionarSolicitud(${sol.id}, 'Cancelado')">
                                Rechazar
                            </button>

                            <button class="btn btn-success rounded-pill px-4"
                                onclick="gestionarSolicitud(${sol.id}, 'Entregado')">
                                Aprobar
                            </button>
                        `;
                    }

                    if (sol.estado === 'Entregado') {
                        botones = `
                            <button class="btn btn-outline-primary rounded-pill px-4"
                                onclick="gestionarSolicitud(${sol.id}, 'Devuelto')">
                                Juego Devuelto
                            </button>
                        `;
                    }

                    item.innerHTML = `
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div>
                                    <h6 class="fw-bold mb-1">
                                        ${sol.nombre_cliente}
                                        <small class="text-primary border rounded px-1 ms-1">
                                            ${sol.codigo_confirmacion}
                                        </small>
                                    </h6>

                                    <p class="mb-1 text-dark small fw-medium">${juegosTexto}</p>

                                    <div class="text-muted small">
                                        <span>${sol.numero_personas} Personas</span>
                                        <span class="ms-2 badge bg-light text-dark border">${sol.estado}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex justify-content-md-end gap-2 mt-3 mt-md-0">
                                ${botones}
                            </div>
                        </div>
                    `;

                    contenedor.appendChild(item);
                });
            });
    }

    cargarSolicitudes();

    const mensajesConfirm = {
        'Entregado': '¿Aprobar esta solicitud y marcarla como entregada?',
        'Cancelado': '¿Rechazar esta solicitud?',
        'Devuelto':  '¿Confirmar que el juego fue devuelto?'
    };

    window.gestionarSolicitud = function(id, accion) {
        const mensaje = mensajesConfirm[accion] ?? `¿Desea marcar la solicitud como ${accion}?`;
        if (confirm(mensaje)) {
            fetch(`/api/admin/solicitudes/${id}/estado`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ estado: accion })
            })
            .then(() => cargarSolicitudes());
        }
    };
}