document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function darkMode (){

    // Modo oscuro depende del sistema del equipo
    const darkSistem = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(darkSistem.matches);

    if(darkSistem.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    darkSistem.addEventListener('change', function() {
        if(darkSistem.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    // modo oscuro en sitio web
    const botonDarkMode = document.querySelector('.darkMode');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode')
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector(".mobile-menu");
    mobileMenu.addEventListener('click', navegacionResp);

    // muestra campos de contacto 
    const tipoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

    // cuando son mas de 1 atributo se utiliza foreach 
    tipoContacto.forEach(input => input.addEventListener('click', mostrarTipoContacto))
}

function navegacionResp(){
    const navegacion = document.querySelector('.navegacion');

    // Otra opcion
    // navegacion.classList.toggle('mostrar'); 

    if(navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }
}

function mostrarTipoContacto(evt) {
    const contactoDiv = document.querySelector('#contacto');
    if (evt.target.value === 'Telefono') {
        contactoDiv.innerHTML = `

        <label for="telefono">Numero de Teléfono</label>
        <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

        <p>Elija la fecha y la hora</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" >
        `;
    }
}