$(document).ready(function () {

    ////////////////////////////////
    // seleccionador de elementos //
    ///////////////////////////////s

    const seleccionarElemento = (selector) => {//variable que contiene una funcion flecha
        const elemento = document.querySelector(selector);//contiene el valor del argument selector
        if (elemento) {//determina si existe el elemento seleccionado
            return elemento;
        } else {//mensaje de error en caso de que exista el elemento
            throw new Error(`Error, ${selector} inexistente`); // Usar comillas inversas para interpolar el selector
        }
    };

    const abrirCerrar = (abrirBtn, contenedor, cerrarBtn) => {//variable que contiene una funcion flecha
        abrirBtn.addEventListener('click', (evento) => {
            evento.preventDefault(); // Evita la acción predeterminada del formulario
            contenedor.classList.add('activo');
        });

        cerrarBtn.addEventListener('click', () => {
            contenedor.classList.remove('activo');
        });

        window.addEventListener('keyup', (evento) => {
            if (evento.key === 'Escape') {
                contenedor.classList.remove('activo');
            }
        });
    };




    ////////////////////////////
    // ESTILOS DEL ENCABEZADO //
    ////////////////////////////
    const scrollEncabezado = () => {
        abrirRegistro.addEventListener('click', (evento) => {
            evento.preventDefault(); // Evita la acción predeterminada del formulario
            contenedorRegistro.classList.add('activo');
        });

        cerrarRgBtn.addEventListener('click', () => {
            contenedorRegistro.classList.remove('activo');
        });

        window.addEventListener('keyup', (evento) => {
            if (evento.key === 'Escape') {
                contenedorRegistro.classList.remove('activo');
            }
        });
    };

    window.addEventListener('scroll', scrollEncabezado);
    ////////////////////////////
    // ABRIR Y CERRAR EL MENU //
    ////////////////////////////
    const btnActivarMenu = seleccionarElemento('#btn-menu');

    const activarMenu = () => {
        const menuMovil = seleccionarElemento('#menu');
        menuMovil.classList.toggle('activo');
        btnActivarMenu.classList.toggle('activo');
    }

    btnActivarMenu.addEventListener('click', activarMenu);

    //////////////////////////////
    // ABRIR Y CERRAR BUSCADOR  //
    //////////////////////////////
    const abrirSbBtn = seleccionarElemento('#btn-buscar');
    const cerrarSbBtn = seleccionarElemento('#btn-sb-cerrar');
    const contenedorSb = seleccionarElemento('#contenedor-sb-cel');
    abrirSbBtn.addEventListener('click', () => {
        console.log('click')
        contenedorSb.classList.add('activo');
    });

    cerrarSbBtn.addEventListener('click', () => {

        contenedorSb.classList.remove('activo');
    });
    window.addEventListener('keyup', evento => {
        if (evento.key === 'Escape') {
            contenedorSb.classList.remove('activo');
        }

    });

    /////////////////////////////////
    // BOTONES LOGIN&REGISTRARSE  //
    ////////////////////////////////
    const abrirRegistro = seleccionarElemento('#btn-registro');
    const cerrarRgBtn = seleccionarElemento('#btn-rg-cerrar');
    const contenedorRegistro = seleccionarElemento('.contenedor-formulario-registro');
    const abrirRegistroMenu = seleccionarElemento('#btn-registro-menu');

    const btnLogOut = seleccionarElemento('#btn-cerrar-sesion');
    const btnPerfil = seleccionarElemento('#btn-perfil');
    const btnLogOutMenu = seleccionarElemento('#btn-cerrar-sesion-menu');
    const btnPerfilMenu = seleccionarElemento('#btn-perfil-menu');

    const abrirLogin = seleccionarElemento('#btn-login');
    const cerrarLgBtn = seleccionarElemento('#btn-lg-cerrar');
    const contenedorLogin = seleccionarElemento('.contenedor-formulario-login');
    const abrirLoginMenu = seleccionarElemento('#btn-login-menu');
    /* abrir pagina de registro */
    abrirCerrar(abrirRegistro, contenedorRegistro, cerrarRgBtn);
    abrirCerrar(abrirRegistroMenu, contenedorRegistro, cerrarRgBtn);

    /* abrir pagina de login */
    abrirCerrar(abrirLoginMenu, cerrarLgBtn, contenedorLogin);
    /* no se porque la funcion de abrir cerra no funciona con este*/
    abrirLogin.addEventListener('click', (evento) => {
        evento.preventDefault(); // Evita la acción predeterminada del formulario
        contenedorLogin.classList.add('activo');
    });

    cerrarLgBtn.addEventListener('click', () => {
        contenedorLogin.classList.remove('activo');
    });

    window.addEventListener('keyup', (evento) => {
        if (evento.key === 'Escape') {
            contenedorLogin.classList.remove('activo');
        }
    });

    // Comprobar si la sesión está iniciada
    if (typeof sessionStarted !== 'undefined' && sessionStarted === true) 
    {
        console.log('goooooooo');
        abrirRegistroMenu.classList.add('oculto');
        abrirRegistro.classList.add('oculto');

        abrirLoginMenu.classList.add('oculto');
        abrirLogin.classList.add('oculto');

        btnLogOut.classList.remove('oculto');
        btnPerfil.classList.remove('oculto');
        btnLogOutMenu.classList.remove('oculto');
        btnPerfilMenu.classList.remove('oculto');
        console.log(abrirRegistroMenu.classList.toString());
    } else 
    {
        
        console.log('roooooo');
        abrirRegistroMenu.classList.remove('oculto');
        abrirRegistro.classList.remove('oculto');

        abrirLoginMenu.classList.remove('oculto');
        abrirLogin.classList.remove('oculto');

        btnLogOut.classList.add('oculto');
        btnPerfil.classList.add('oculto');
        btnLogOutMenu.classList.add('oculto');
        btnPerfilMenu.classList.add('oculto');
    }
    

    // Función para cerrar la sesión

    /////////////////////////////////
    // Cambiar modo obscuro/claro //
    ////////////////////////////////
    const cuerpo = document.body;
    const btnCambiarModo = seleccionarElemento('#btn-modo');
    const modoActual = localStorage.getItem('modoActual');//recupera el modo del local storage

    if(modoActual){//si hay un modoActual significa que es el modo obc asique agrega el modo obsc cuando se refresca
        cuerpo.classList.add('modo-obsc');
    }   
    
    btnCambiarModo.addEventListener('click', () => {
        cuerpo.classList.toggle('modo-obsc');
        console.log('modo cambiado');

        if(cuerpo.classList.contains('modo-obsc'))
        {//si el cuerpo contiene la clase modo-obsc setea un item en el localstorage llamado modo Actual con el valor modoActivo
            localStorage.setItem('modoActual', 'modoActivo');
        }else{//elimina el valor modo activo si el cuerpo no esta en modo-obsc
            localStorage.removeItem('modoActual');
        }
    });

});
