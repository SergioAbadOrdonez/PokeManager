const dialogo = document.getElementById('dialogoRegistro');
const botonAbrir = document.getElementById('registro');
const botonCancelar = document.getElementById('botonCancelar');
const formulario = document.getElementById('formularioRegistro');

botonAbrir.addEventListener('click', () => {
    dialogo.showModal();
});

botonCancelar.addEventListener('click', () => {
    dialogo.close();
});

formulario.addEventListener('submit', (event) => {
    event.preventDefault();
    
    const formData = new FormData(formulario);
    
    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const confirmarEmail = document.getElementById('confirmarEmail').value;
    const password = document.getElementById('password').value;
    const confirmarPassword = document.getElementById('confirmarPassword').value;
    const edad = document.getElementById('edad').value;
    const mensaje = document.getElementById('mensaje');
    mensaje.innerText = "";

    if (nombre === "" || email === "" || confirmarEmail === "" || password === "" || confirmarPassword === "" || edad === "") {
        mensaje.innerText = 'Faltan campos por rellenar.';
        return;
    }

    if (edad < 14) {
        mensaje.innerText = 'Tienes que tener más de 14 años.';
        return;
    }

    if (email != confirmarEmail) {
        mensaje.innerText = 'Los correos electrónicos no coinciden';
        return;
    }

    if (password != confirmarPassword) {
        mensaje.innerText = 'Las contraseñas no coinciden';
        return;
    }

    fetch("includes/registro.inc.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        return response.text();
    })
    .then(data => {
        if(data.status === "error") {
            mensaje.innerText = data.message;
        } else {
            dialogo.close();
        }
    });
});
