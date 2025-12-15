const modal = document.querySelector(".modal");
const abrir = document.querySelector(".btnAgregar");
const cerrar = document.getElementById("cerrar");

if (abrir) {
    abrir.onclick = function() {
        modal.style.display = "block";
    }
}
if (cerrar) {
    cerrar.onclick = function() {
        modal.style.display = "none";
    }
}

/* Script para el modal de modificar */
const modalUpdate = document.querySelector(".modalUpdate");
const abrirModificar = document.querySelector(".btnUpdate");
const cerrarModificar = document.getElementById("closeModalUpdate");

if (abrirModificar) {
    abrirModificar.onclick = function() {
        modalUpdate.style.display = "block";
    }
}
if (cerrarModificar) {
    cerrarModificar.onclick = function() {
        modalUpdate.style.display = "none";
    }
}