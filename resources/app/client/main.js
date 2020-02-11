$("#enviar").click(function(e) {

    let data = $('#nuevaSol').serialize();
    axios.post(http + "/main/nueva", data).then(response => {
        Swal.fire('Correcto!', 'Su solicitud ha sido enviada correctamente, un correo le será enviado para notificarle la fecha de su atención. Puede ver todas las solicitudes actuales en el botón de la lista', 'success');
        clear();
    });
})

$(".swal2-confirm").click(function() {
    // window.location.reload(true);
    alert("as")
})

function clear() {
    $("#name").val("");
    $("#correo").val("");
    $("#lugar").val("");
    $("#descripcion").val("");
}