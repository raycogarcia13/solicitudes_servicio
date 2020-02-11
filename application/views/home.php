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
        <!--Begin::Section-->
        <!-- <div class="row"> -->
        
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
                                            <?php foreach($all as $item):?>
                                                <tr>
                                                    <td><?=$item['nombre']?></td>
                                                    <td><?=$item['correo']?></td>
                                                    <td><span class="m-badge" style="background-color:<?=$item['color']?>"> <?=$item['estado']?> </span> </td>
                                                    <td><?=$item['descripcion']?></td>
                                                    <td><?=($item['fecha_plan']!='')?date('d M Y H:i',$item['fecha_plan']):'<span class="badge badge-info">No planificado</span>'?></td>
                                                </tr>
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