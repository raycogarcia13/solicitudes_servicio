<?php $this->load->view('template/base_head') ?>

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-login m-login--signin  m-login--5" id="m_login" style="">
            <div class="m-login__wrapper-1 m-portlet-full-height">
                <div class="m-login__wrapper-1-1">
                    <div class="m-login__contanier">
                        <div class="m-login__content">
                            <div class="m-login__logo">
                                <a href="#">
                                    <img src="<?= base_url() ?>resources/images/iconoEnpa.png">
                                </a>
                            </div>
                            <div class="m-login__title">
                                <h3>
                                    Sistema de solicitud de servicio informáticos
                                </h3>
                            </div>
                            <div class="m-login__desc">
                                Inserte su solicitud y su problema será atendido
                            </div>
                            <div class="m-login__form-action">
                                <a title="Autenticarse" href="<?=base_url()?>login" id="m_login_signup" class="btn btn-outline-focus m-btn--pill">
                                    <i class="fa fa-user"></i>
                            </a>
                                <a href="<?=base_url()?>main/main" title="Ver todas las solicitudes actuales" class="btn btn-outline-focus m-btn--pill">
                                    <i class="fa fa-list"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="m-login__border">
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="m-login__wrapper-2 m-portlet-full-height">
                <div class="m-login__contanier">
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">
                                Nueva solicitud
                            </h3>
                        </div>
                        <form id="nuevaSol" class="m-login__form m-form" action="">
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" id="name" placeholder="Nombre" name="name">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" id="correo" placeholder="Correo" name="correo">
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" id="lugar" placeholder="Lugar" name="lugar">
                            </div>
                            <div class="form-group m-form__group">
                                <textarea class="form-control m-input" name="descripcion" id="descripcion" placeholder="Solictud"></textarea>
                            </div>
                            <div class="m-login__form-action">
                                <button type="button" id="enviar" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                    Enviar <i class="fa fa-envelope"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
  <?php $this->load->view('template/footer')?>
</body>
</html> 