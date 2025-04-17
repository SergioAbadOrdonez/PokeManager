document.addEventListener('DOMContentLoaded', () => {
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

    formulario.addEventListener('submit', (e) => {
        const email = document.getElementById('email').value;
        const confirmarEmail = document.getElementById('confirmaEmail').value;
        const password = document.getElementById('password').value;
        const confirmarPassword = document.getElementById('confirmarPassword').value;

        if (email !== confirmarEmail) {
            e.preventDefault();
            alert('Los correos electrónicos no coinciden');
            return;
        }

        if (password !== confirmarPassword) {
            e.preventDefault();
            alert('Las contraseñas no coinciden');
            return;
        }
    });
});
