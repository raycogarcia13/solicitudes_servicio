<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
            </h3>
        </div>
        <div>
        </div>
    </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
    <!-- widgets -->
    <div class="m-portlet ">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::Total Profit-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                               Solicitudes
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Total
                            </span>
                            <span class="m-widget24__stats m--font-brand">
                                <?=$todas?>
                            </span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-brand" role="progressbar" style="width: <?=($todas!=0)?$realizado/$todas*100:0?>%;" ></div>
                            </div>
                            <span class="m-widget24__change">
                                Resueltas
                            </span>
                            <span class="m-widget24__number">
                               <?=($todas!=0)?$realizado/$todas*100:0?>%
                            </span>
                        </div>
                    </div>
                    <!--end::Total Profit-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Feedbacks-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Nuevas Solicitudes
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                
                            </span>
                            <span class="m-widget24__stats m--font-info">
                               <?=$enviado?>
                            </span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-info" role="progressbar" style="width: <?=($todas!=0)?$enviado/$todas*100:0?>%;"></div>
                            </div>
                            <span class="m-widget24__number">
                            <?=($todas!=0)?$enviado/$todas*100:0?>%
                            </span>
                        </div>
                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Orders-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                Planificadas
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                              
                            </span>
                            <span class="m-widget24__stats m--font-danger">
                                <?=$planificado?>
                            </span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-danger" role="progressbar" style="width:  <?=($todas!=0)?$planificado/$todas*100:0?>%;"></div>
                            </div>
                            <span class="m-widget24__number">
                                <?=($todas!=0)?$planificado/$todas*100:0?>%
                            </span>
                        </div>
                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <!--begin::New Users-->
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                               Cumplidas
                            </h4>
                            <br>
                            <span class="m-widget24__desc">
                                Ya terminadas
                            </span>
                            <span class="m-widget24__stats m--font-success">
                                <?=$realizado?>
                            </span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
                                <div class="progress-bar m--bg-success" role="progressbar" style="width: <?=($todas!=0)?$realizado/$todas*100:0?>%;" ></div>
                            </div>
                            <span class="m-widget24__number">
                                <?=($todas!=0)?$realizado/$todas*100:0?>%
                            </span>
                        </div>
                    </div>
                    <!--end::New Users-->
                </div>
            </div>
        </div>
    </div>
    <!-- cuerpo abajo -->
    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Solicitudes
                                        <small>
                                            Ordenadas descendentemente
                                        </small>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m_datatable">
                                    <table id="datatable" class="table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>correo</th>
                                                <th>Estado</th>
                                                <th>Descripción</th>
                                                <th>Fecha de atención</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($solicitudes as $item):?>
                                                <?php if($item['estado']!="Realizado"):?>
                                                <tr>
                                                    <td><?=$item['nombre']?></td>
                                                    <td><?=$item['correo']?></td>
                                                    <td><span class="m-badge" style="background-color:<?=$item['color']?>"> <?=$item['estado']?> </span> </td>
                                                    <td><?=$item['descripcion']?></td>
                                                    <td><?=($item['fecha_plan']!='')?date('d M Y H:i',$item['fecha_plan']):'<span class="badge badge-info">No planificado</span>'?></td>
                                                </tr>
                                                <?php endif?>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div> 
</div> 