    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                     $session_data = $this->session->userdata('logged_in');
                        $biblioteca = $session_data["biblioteca"];
                        $perfil = $session_data["perfil"];
                        $nome = $session_data["nome"];
                     
                        
                    ?>
                    <h1 class="page-header">Painel do <?php if($perfil=="auxiliar"){
                        echo "Auxiliar";
                    }else{
                       echo "Bibliotecário"; 
                    } ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="materiais_cadastrados"></div>
                                    <div>Materiais Cadastrados nessa Biblioteca</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
<!--                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-paperclip fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="reservas"></div>
                                    <div>Reservas solicitadas nessa Biblioteca</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
<!--                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-paper-plane-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="materiais_emprestados"></div>
                                    <div>Acervos em Situação de Empréstimo</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
<!--                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>-->
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="leitores_cadastrados"></div>
                                    <div>Leitores Cadastrados nessa Biblioteca</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
<!--                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>-->
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<!--            <h1 class="page-header">Sugestões para <?php echo $nome ?> </h1>
             <main class="dicas container" id="dicas">
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/arte_guerra.jpeg" ></a>
                <div class="inner">
                    <a href="#">A arte da Guerra</a>
                    <h4>A arte da Guerra</h4>
                </div>
            </article>
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/ateneu.jpeg" ></a>
                <div class="inner">
                    <a href="#">O Ateneu</a>
                    <h4>O Ateneu</h4>
                </div>
            </article>
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/bird_box.jpeg" ></a>
                <div class="inner">
                    <a href="#">Bird Box</a>
                    <h4>Bird Box</h4>
                </div>
            </article>
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/it.jpeg" ></a>
                <div class="inner">
                    <a href="#">IT- A coisa</a>
                   <h4>IT- A coisa</h4>
                </div>
            </article>
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/leguas.jpeg" ></a>
                <div class="inner">
                    <a href="#"></a>
                    <h4>20 000 Léguas Submarinas</h4>
                </div>
            </article>
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/livro.jpeg" ></a>
                <div class="inner">
                    <a href="#">O livro da Psicologia</a>
                    <h4>O livro da Psicologia</h4>
                </div>
            </article>
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/oriente.jpeg" ></a>
                <div class="inner">
                    <a href="#"></a>
                    <h4>Assassinato no expresso do Oriente</h4>
                </div>
            </article>
            <article class="dica bg-white">
                <a href="#"><img src="<?php echo base_url();?>utils/img/sugestoes/pequeno_principe.jpeg" ></a>
                <div class="inner">
                    <center>O pequeno Pricípe</center>
                    <h4>O pequeno Pricípe</h4>
                </div>
            </article>
                 
            
        </main>-->

                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <script src="<?php echo base_url(); ?>utils/js/ajax/estatisticas_bibliotecario.js"></script>
