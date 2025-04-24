const dialogoLogin = document.getElementById('dialogoLogin');
const botonLogin = document.getElementById('login');
const botonCancelarLogin = document.getElementById('botonCancelarLogin');
const formularioLogin = document.getElementById('formularioLogin');

botonLogin.addEventListener('click', () => {
    dialogoLogin.showModal();
});

botonCancelarLogin.addEventListener('click', () => {
    dialogoLogin.close();
});

formularioLogin.addEventListener('submit', (event) => {
    event.preventDefault(); 
    const mensajeLogin = document.getElementById('mensajeLogin');
    const nombre = document.getElementById('nombre').value;
    const password = document.getElementById('password').value;

    if (nombre === "" || password === "" ) {
        mensajeLogin.innerText = 'Faltan campos por rellenar.';
        return;
    }

    const formData = new FormData(formularioLogin);

    fetch("includes/login.inc.php", {
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
