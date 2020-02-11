<?php $this->load->view('template/base_head.php')?>
<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="<?=base_url()?>resources/images/attr.png" style="width: 25%">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Zona de administración
								</h3>
							</div>
							<form class="m-login__form m-form" id="login_form" method="POST" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Usuario" value="<?=$username?>" name="username" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" id="password" type="password" placeholder="Contraseña" name="password">
								</div>
								<div class="m-login__form-action">
									<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
									 	<i class="fa fa-key"></i> Entrar
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
        
		<?php if($username!=''):?>
			<script>
				var error=true;
			</script>
		<?php endif?>
        <?php $this->load->view('template/footer.php')?>

        
	</body>