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
    const nombre = document.getElementById('nombreLogin').value;
    const password = document.getElementById('passwordLogin').value;

    if (nombre === "" || password === "") {
        event.preventDefault(); // Evita el envío si hay campos vacíos
        const mensajeLogin = document.getElementById('mensajeLogin');
        mensajeLogin.innerText = 'Faltan campos por rellenar.';
    }
});
