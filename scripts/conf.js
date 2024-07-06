function confirmarEliminar(id) {
    if (confirm('¿Estás seguro de que quieres eliminar este elemento?')) {
        window.location.href = 'eliminar.php?id=' + id;
    }
}
