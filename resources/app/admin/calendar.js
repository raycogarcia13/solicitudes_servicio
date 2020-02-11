const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

$("#newActBtn").click(function() {
    $('#act_title_inp').val("");
    $('#act_id_inp').val("");
    $('#act_correo_inp').val("");
    $('#act_descriptio_inp').val("");
    $('#act_lugar_inp').val("");
    $('#activity_title').html("Nueva Actividad");
});
$('#act_fecha_inicio_inp').datetimepicker({ format: "dd MM yyyy - HH:ii P", showMeridian: !0, todayHighlight: !0, autoclose: !0, pickerPosition: "bottom-left" })
var CalendarExternalEvents = {
    init: function() {
        var e, t, i, r, a;
        $("#m_calendar_external_events .fc-event").each(function() {
                $(this).data("event", {
                        title: $.trim($(this).text()),
                        stick: !0,
                        className: $(this).data("color"),
                        description: $(this).data("descripcion"),
                        correo: $(this).data("correo"),
                        id: $(this).data("id")
                    }),
                    $(this).draggable({ zIndex: 999, revert: !0, revertDuration: 0 })
            }),
            e = moment().startOf("day"),
            t = e.format("YYYY-MM"),
            i = e.clone().subtract(1, "day").format("YYYY-MM-DD"),
            r = e.format("YYYY-MM-DD"),
            a = e.clone().add(1, "day").format("YYYY-MM-DD"),

            $("#m_calendar").fullCalendar({
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "month,agendaWeek,agendaDay,listWeek"
                },
                eventLimit: !0,
                navLinks: !0,
                events: eventos,
                editable: !0,
                droppable: !0,
                selectable: true,
                selectHelper: true,
                drop: function(e, t, i, r) {
                    var a = $.fullCalendar.moment(e.format());
                    a.stripTime(), a.time("08:00:00");
                    var n = $.fullCalendar.moment(e.format());
                    n.stripTime(), n.time("12:00:00"), $(this).data("event").start = a,
                        $(this).data("event").end = n,
                        $("#m_calendar_external_events_remove").is(":checked") && $(this).remove();
                    let id = $(this).data('id');
                    let correo = $(this).data('correo');

                    axios.post(http + "admin/planificarTask", { id: id, time: n._i, correo: correo }).then(resp => {
                        if (resp.data.status == 'success')
                            Toast.fire({
                                type: 'success',
                                title: resp.data.msg
                            });
                        else
                            Toast.fire({
                                type: 'error',
                                title: "Ha ocurrido un error en el servidor"
                            });
                    })

                },
                //arrastre de evento
                eventDrop: function(event, delta, revertFunc) {
                    console.log(event);
                    let fecha = event.start.format();
                    axios.post(http + "admin/moveTask", { id: event.id, time: fecha }).then(resp => {
                        if (resp.data.status == 'success')
                            Toast.fire({
                                type: 'success',
                                title: resp.data.msg
                            });
                        else
                            Toast.fire({
                                type: 'error',
                                title: "Ha ocurrido un error en el servidor"
                            });
                    })
                },
                //click al evento
                eventClick: function(calEvent, jsEvent, view) {
                    $("#newActBtn").click();
                    $('#activity_title').html("Editar Actividad");
                    $('#act_title_inp').val(calEvent.title);
                    $('#act_id_inp').val(calEvent.id);
                    $('#act_correo_inp').val(calEvent.correo);
                    $('#act_descriptio_inp').val(calEvent.description);
                    $('#act_fecha_inicio_inp').val(calEvent.start._i);
                    $('#act_lugar_inp').val(calEvent.lugar);
                },
                //click vacio
                select: function(start, end, allDay) {
                    console.log(start);
                    $("#newActBtn").click();
                    let fecha = moment(start._i).add(1, "day");
                    $('#act_fecha_inicio_inp').val(fecha.format("YYYY-MM-DD"));

                },
                eventRender: function(e, t) {
                    t.hasClass("fc-day-grid-event") ? (t.data("content", e.description), t.data("placement", "top"), mApp.initPopover(t)) : t.hasClass("fc-time-grid-event") ? t.find(".fc-title").append('<div class="fc-description">' + e.description + "</div>") : 0 !== t.find(".fc-list-item-title").lenght && t.find(".fc-list-item-title").
                    append('<div class="fc-description">' + e.description + "</div>")
                }
            })
    }
};

$('#enviarDatosActivity').click(function() {
    axios.post(http + "admin/addOrUpdate", $('#activity_form').serialize()).then(resp => {
        if (resp.data.status == 'success')
            Toast.fire({
                type: 'success',
                title: resp.data.msg
            });
        else
            Toast.fire({
                type: 'error',
                title: "Ha ocurrido un error en el servidor"
            });
    })
})


jQuery(document).ready(function() { CalendarExternalEvents.init() });