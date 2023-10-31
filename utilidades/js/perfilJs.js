$(document).ready(function () {

    ////////////////////////////////
    // seleccionador de elementos //
    ///////////////////////////////

    const seleccionarElemento = (selector) => {//variable que contiene una funcion flecha
        const elemento = document.querySelector(selector);//contiene el valor del argument selector
        if (elemento) {//determina si existe el elemento seleccionado
            return elemento;
        } else {//mensaje de error en caso de que exista el elemento
            throw new Error(`Error, ${selector} inexistente`); // Usar comillas inversas para interpolar el selector
        }
    };


    /////////////////
    // cambiar pfp //
    ////////////////
    const btncambiarpfp = seleccionarElemento('#pfp-cambio');
    const pfpmenu = seleccionarElemento('#contenedor-cambio-pfp');
    const activarPfp = () => {
        pfpmenu.classList.toggle('activo');
        btncambiarpfp.classList.toggle('activo');
    }

    btncambiarpfp.addEventListener('click', activarPfp);

    window.addEventListener('keyup', evento => {
        if (evento.key === 'Escape') {
            pfpmenu.classList.remove('activo');
        }

    });

    const imageLinks = document.querySelectorAll('.link-img');
    const imagenSeleccionada = seleccionarElemento('#imagen-selec');

    imageLinks.forEach(link => {
        link.addEventListener('click', () => {
            const dataImg = link.getAttribute('data-img');
            actualizarImagenDePerfil(dataImg);
        });
    });

    function actualizarImagenDePerfil(dataImg) {
        $.ajax({
            type: 'POST',
            url: '../utilidades/php/router.php',
            data: { dataImg: dataImg },
            success: function (response) {
                if (response === 'success') {
                    imagenSeleccionada.innerHTML = `<img src="${dataImg}" alt="Imagen de perfil">`;
                    location.reload(); // Recargar la página
                } else {
                    location.reload();
                }
            }
        });
    }
    //////////////////////////////
    // ABRIR Y CERRAR Eliminar cuenta  //
    //////////////////////////////
    const eliminarBtn = seleccionarElemento('#eliminar-cuenta');
    const cerrarEliminar = seleccionarElemento('#btn-cerrar');
    const contenedorEliminar = seleccionarElemento('#esta-seguro');
    eliminarBtn.addEventListener('click', () => {
        console.log('click')
        contenedorEliminar.classList.add('activo');
    });

    cerrarEliminar.addEventListener('click', () => {
        contenedorEliminar.classList.remove('activo');
    });
    window.addEventListener('keyup', evento => {
        if (evento.key === 'Escape') {
            contenedorEliminar.classList.remove('activo');
        }

    });

    //////////////////////////////
    // ABRIR Y CERRAR Eliminar cuenta  //
    //////////////////////////////
    const cambiarBtn = seleccionarElemento('#cambiar-correo');
    const cerrarCambiar = seleccionarElemento('#btn-cerrar-mail');
    const contenedorCambiar = seleccionarElemento('#cambiar-mail');
    cambiarBtn.addEventListener('click', () => {
        console.log('click')
        contenedorCambiar.classList.add('activo');
    });

    cerrarCambiar.addEventListener('click', () => {
        contenedorCambiar.classList.remove('activo');
    });
    window.addEventListener('keyup', evento => {
        if (evento.key === 'Escape') {
            contenedorCambiar.classList.remove('activo');
        }

    });
    /////////////////////////////////
    // Cambiar modo obscuro/claro //
    ////////////////////////////////
    const cuerpo = document.body;
    const btnCambiarModo = seleccionarElemento('#btn-modo');
    const modoActual = localStorage.getItem('modoActual');//recupera el modo del local storage

    if(modoActual){//si hay un modoActual significa que es el modo obc asique agrega el modo obsc cuando se refresca
        cuerpo.classList.add('modo-obsc');
        console.log('modo-osc');
    }else{
        console.log('problema con modo')
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