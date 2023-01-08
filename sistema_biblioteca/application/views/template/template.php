
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="<?php echo base_url();?>/utils/img/icone-biblioteca-maior.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NetLibrary</title>
    <script src="<?php echo base_url();?>/utils/js/jquery.js"></script>
    <script src="<?php echo base_url();?>/utils/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/utils/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>/utils/js/jquery.maskedinput.js"></script>
    <script src="<?php echo base_url();?>utils/vendor/datatables/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>/utils/js/dataTables.tableTools.js"></script>
        <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>/utils/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>/utils/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/utils/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/utils/css/sb-admin-2.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>/utils/css/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/utils/css/datatables/dataTables.tableTools.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/utils/css/datatables/jquery.dataTables.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>/utils/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>/utils/css/style_person.css" rel= "stylesheet" type="text/css">
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <img  class="navbar-brand" src="<?php echo base_url();?>/utils/img/icone-biblioteca-maior.png" /> <a class="navbar-brand" href="index_controller">NetLibrary</a>
            
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                    <?php if ($this->session->userdata('logged_in')) { ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                            $session_data = $this->session->userdata('logged_in');
                            $usuario = $session_data['idusuario'];
                            $nome_usuario = $session_data['nome'];                         
                         ?>
                        <li><a href="dados_usuario_controller"><i class="fa fa-user fa-fw"></i>Usuário:
                        <?php echo "<br/>".$usuario." - ".$nome_usuario;  ?>    
                        </a>
                        </li>    
                        <li class="divider"></li>
                        <li><a><i class="fa fa-lock fa-fw "></i>Último Login</a>
                        <?php
                         date_default_timezone_set('America/Sao_Paulo');
                            //Atribui a variavel perfil, o valor perfil do array, esse array tem todos os dados do usuario;
                            $data = strftime("%d/%m/%Y", strtotime($session_data['data']));                            
                            $hora = $session_data['hora'];
                            $host = $session_data['host'];
//                            echo $data;
                            if($data==""){
                                $data = date('d-m-Y');
                            }
                            if($hora==""){
                                $hora = date('H:i');;
            
                            }
                            if($host==""){
                               $host = $_SERVER["REMOTE_ADDR"];
                            }
                            
                            ?>
                        <i class="fa fa-calendar fa-fw"></i><?php echo $data; ?>
                        <br><i class="fa fa-clock-o fa-fw"></i><?php echo $hora; ?>
                        <br/><i class="fa fa-desktop fa-fw"></i><?php echo $host; ?>
                        </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>pesquisa_controller/logout"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                        </li>
                        <?php } else { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-lock fa-2x"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                    <ul class="dropdown-menu dropdown-user in">
                            <li><a href="login_leitor_controller" class="active"><i class="fa fa-user fa-fw"></i>Login Leitor</a></li>    
                        <li class="divider"></li>
                        <li><a href="admin"><i class="fa fa-user fa-fw"></i>Login Administrador</a></li>                        
                    </ul>
                        <?php } ?>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <?php echo $menu;?>
            <!-- /.navbar-static-side -->
        </nav>

    <?php echo $content;?>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>/utils/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
   

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>/utils/bower_components/raphael/raphael-min.js" type="text/javascript"></script>
   
    <!--<script src="<?php echo base_url();?>/utils/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>/utils/dist/js/sb-admin-2.js"></script>
     <script src="<?php echo base_url();?>/utils/bower_components/metisMenu/dist/metisMenu.min.js"></script>

</body>

</html>
