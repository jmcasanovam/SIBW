const botonComentarios = document.getElementById('mostrarComentarios');

botonComentarios.addEventListener('click', () => {
    document.querySelector('.comentarios').classList.toggle('oculto');
    //toggle: si tiene la clase la quita, si no la tiene la pone
    //querySelector: selecciona el primer elemento que cumpla con la condición
});

formulario = document.getElementById('formulario-comentario');

formulario.addEventListener('submit', (evento) =>{
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var comentario = document.getElementById('texto-comentario').value;
    var fecha = (new Date()).toLocaleDateString();
    var hora = (new Date()).toLocaleTimeString();

    //Creo un comentario
    console.log(nombre, email, comentario, fecha, hora);
    var nuevoComentario = document.createElement('div');
    nuevoComentario.classList.add('caja-comentario');

    nuevoComentario.innerHTML = `
        <p class="autor">${nombre}</p>
        <p class="fecha-hora">${fecha} ${hora}</p>
        <p class="texto-comentario">${comentario}</p>
        
    `;

    //Agrego el comentario al contenedor de comentarios
    var contenedorComentarios = document.querySelector('.comentarios');
    contenedorComentarios.appendChild(nuevoComentario);

    //Evito que se envíe el formulario
    evento.preventDefault();

    //Limpio los campos del formulario
    document.getElementById('nombre').value = '';
    document.getElementById('email').value = '';
    document.getElementById('texto-comentario').value = '';

});

const palabrasProhibidas = ['gilipollas', 'polla', 'mierda', 'idiota', 'tonto', 'cabron', 'cabrón', 'puta', 'coño', 'joder', 'hostia', 'capullo'];

const campoComentario = document.getElementById('texto-comentario');

campoComentario.addEventListener('input', () => {
    var comentario = campoComentario.value;
    var palabras = comentario.split(' ');//para dividir el comentario en palabras (substring) separadas por espacios y lo guarda en un array
    palabras[0] = palabras[0].toLowerCase();//para que la primera palabra sea en minuscula

    var esValida = true;
    


    palabrasProhibidas.forEach((palabra) => {
        if (palabras.includes(palabra)) {//includes: busca si la palabra esta en el array
            // expresion regular para indicar que se remplace por * siguiendo las reglas g(busca todas las ocurrencias de la palabra) y i(no distingue entre mayusculas y minusculas)
            comentario = comentario.replace(new RegExp(palabra, 'gi'), '*'.repeat(palabra.length));
            esValida = false;
        }
    });

    if (!esValida) {
        campoComentario.value = comentario;
    }
        
});






