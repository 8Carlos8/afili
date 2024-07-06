function filtrarAfiliado() {
    var input, filter, select, option, i;
    input = document.getElementById("buscar_afiliado");
    filter = input.value.toUpperCase();
    select = document.getElementById('id_afiliado');
    option = select.getElementsByTagName("option");

    for (i = 0; i < option.length; i++) {
        if (option[i].text.toUpperCase().indexOf(filter) > -1) {
            option[i].style.display = "";
        } else {
            option[i].style.display = "none";
        }
    }
}
