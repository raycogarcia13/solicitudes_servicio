<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
    <!-- END: Subheader -->
<div class="m-content">
<div class="row">
    <div class="col-lg-3">
        <!--begin::Portlet-->
        <div class="m-portlet" id="m_portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-add"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                           Solicitudes
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div id="m_calendar_external_events" class="fc-unthemed">
                    <?php foreach($plan as $item):?>
                    <div class='fc-event fc-event-external fc-start m-fc-event--info m--margin-bottom-15' data-color="m-fc-event--info"
                    data-id="<?=$item['id']?>" data-descripcion="<?=$item['descripcion']?>" data-correo="<?=$item['correo']?>">
                        <div class="fc-title">
                            <div class="fc-content" title="<?=$item['descripcion']?>" >
                                <?=$item['nombre']?>: <?=trim($item['descripcion'],10)?> 
                            </div>
                        </div>
                    </div>
                    <?php endforeach?>

                    <div class="m-separator m-separator--dashed m-separator--space"></div>
                    <div>
                        <label class="m-checkbox m-checkbox--brand">
                            <input type="checkbox" checked id='m_calendar_external_events_remove'>
                            Eliminar al arrastrar
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Portlet-->
    </div>
    <div class="col-lg-9">
        <!--begin::Portlet-->
        <div class="m-portlet" id="m_portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-calendar-2"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Plan de servicios
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <button id="newActBtn" type="button" class="btn btn-focus" data-toggle="modal" data-target="#activity" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        Nueva Tarea
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <div id="m_calendar"></div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activity_title">
                    Nueva Actividad
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form id="activity_form">
                    <div class="form-group m-form__group">
                        <input type="hidden" id="act_id_inp" value="" name="id">
                        <input type="text" class="form-control m-input m-input--square" id="act_title_inp" name="nombre" placeholder="Título">
                    </div>
                    <div class="form-group m-form__group">
                        <input type="email" class="form-control m-input m-input--square" id="act_correo_inp" name="correo" placeholder="Correo">
                    </div>
                    <div class="form-group m-form__group">
                        <input type="text" class="form-control m-input m-input--square" id="act_lugar_inp" name="lugar" placeholder="Lugar">
                    </div>
                    <div class="form-group m-form__group">
                        <textarea class="form-control m-input m-input--square" id="act_descriptio_inp" name="descripcion" placeholder="Descripción"></textarea>
                    </div>
                    <div class="form-group m-form__group">
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" readonly value="<?=date('d M Y H:i:s')?>" name="fecha" id="act_fecha_inicio_inp"/>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar glyphicon-th"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <select class="form-control m-input" id="act_estado_inp" name="estado">
                            <?php foreach($estados as $item):?>
                                <option value="<?=$item['id']?>" style="color:<?=$item['color']?>"><?=$item['estado']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
                <button type="button" id="enviarDatosActivity" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
 var eventos=<?=json_encode($eventos)?>;
</script>