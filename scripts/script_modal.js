const modal = document.querySelector(".modal");
const abrir = document.getElementById("btnAgregar");
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