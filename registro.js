document.addEventListener('DOMContentLoaded', () => {
    const dialogo = document.getElementById('dialogoRegistro');
    const botonAbrir = document.getElementById('registro');
    const botonCancelar = document.getElementById('botonCancelar');
    const formulario = document.getElementById('formularioRegistro');
    const inputFoto = document.getElementById('fotoPerfil');
    const previewFoto = document.getElementById('previewFoto');

    botonAbrir.addEventListener('click', () => {
        dialogo.showModal();
    });

    botonCancelar.addEventListener('click', () => {
        dialogo.close();
    });

    inputFoto.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewFoto.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    formulario.addEventListener('submit', (e) => {
        const email = document.getElementById('email').value;
        const confirmarEmail = document.getElementById('confirmaEmail').value;
        const password = document.getElementById('password').value;
        const confirmarPassword = document.getElementById('confirmarPassword').value;
        const edad = document.getElementById('edad').value;

        if (edad < 10 || edad > 100) {
            e.preventDefault();
            alert('La edad debe estar entre 10 y 100 años');
            return;
        }

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