// filtro.js

// Obtén el formulario de los filtros de marcas
const filtroMarcasForm = document.getElementById('filtroMarcasForm');

// Agrega un evento a cada checkbox dentro del formulario
if (filtroMarcasForm) {
    filtroMarcasForm.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            // Enviar el formulario automáticamente al cambiar el estado del checkbox
            filtroMarcasForm.submit();
        });
    });
}
