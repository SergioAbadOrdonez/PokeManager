const dialogo = document.getElementById('dialogoRegistro');
const botonAbrir = document.getElementById('registro');
const botonCancelar = document.getElementById('botonCancelar');

botonAbrir.addEventListener('click', () => {
    dialogo.showModal();
});

botonCancelar.addEventListener('click', () => {
    dialogo.close();
});
