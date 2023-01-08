<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>NetLibrary</title>
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="shortcut icon" href="img/icons/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gestão de Estágios Escolares">
    <meta name="author" content="Paulo Henrique Rodrigues - paulohenriquerodrigues@outlook.com">
    <meta name="keywords" content="sistema gestão de estágios, estágio FUNEC" />
    <meta name="description" content="...resumo da página..." />
    <meta name="copyright" content="© 20017 Sistema Gestão de Estágios" />
    <meta name="robots" content="index, follow">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url()?>utils/img/icone-biblioteca-maior.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>utils/novo_login/css/main.css">

<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url()?>utils/img/icone-biblioteca-maior.png');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="login_leitor_controller/verifica_login">
					<span class="login100-form-logo">
						<i class="fa fa-user fa fa"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Leitor
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email" id="email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="senha" placeholder="Senha" id="senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

	

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="go">
							Acessar
						</button>
                                            &nbsp&nbsp&nbsp&nbsp
                                            <button class=""  type="submit" id="cancelar_login" >
                                                <a href="pesquisa_controller" class="login10Cancelar-form-btn">
                                                    Cancelar
                                                </a>
                                            </button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>utils/novo_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>utils/novo_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>utils/novo_login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>utils/novo_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>utils/novo_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>utils/novo_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url()?>utils/novo_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>utils/novo_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>utils/novo_login/js/main.js"></script>
        

</body>
</html>