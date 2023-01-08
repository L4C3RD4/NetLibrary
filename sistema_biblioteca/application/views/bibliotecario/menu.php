<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php 
                     $session_data = $this->session->userdata('logged_in');
                        $biblioteca = $session_data["biblioteca"];
                        $perfil = $session_data["perfil"];
                    ?>
                        <li id="painel_bibliotecario">
                            <a href="<?php echo base_url();?>index_controller"><i class="fa fa-home fa-fw"></i> Painel do <?php if($perfil=="auxiliar"){
                        echo "Auxiliar";
                    }else{
                       echo "Bibliotecário"; 
                    } ?></a>
                        </li>
                        <li>
                            <a href ="<?php echo base_url();?>pesquisa_controller"><i class="fa fa-search fa fw"></i> Pesquisa do Acervo</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-send fa-fw"></i>Empréstimos e Reservas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>emprestimo_controller"><i class="fa fa-search fa-fw"></i> Gestão Empréstimos</a>
                                </li>
                                <!--li>
                                    <a href="<?php echo base_url();?>emprestimo_finalizados_controller"><i class="fa fa-list fa-fw"></i> Histórico de Empréstimos</a>
                                </li-->
                                <li>
                                    <a href="<?php echo base_url();?>reserva_controller"><i class="fa fa-paperclip fa-fw"></i> Gestão de Reservas</a>
                                </li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Acervo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>acervo_biblioteca_controller"><i class="fa fa-bookmark fa-fw"></i> Cadastro Acervo Biblioteca</a>
                                </li>                                
                                <li>
                                    <a href="<?php echo base_url();?>acervo_controller"><i class="fa fa-bookmark-o fa-fw"></i> Cadastro Acervo Geral</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>autores_controller"><i class="fa fa-pencil fa-fw"></i> Autores</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>leitores_controller"><i class="fa fa-users fa-fw"></i> Leitores</a>
                        </li>
<!--                        <li>
                            <a href="#"><i class="fa fa-folder-open fa-fw"></i>Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html"><i class="fa fa-flag fa-fw"></i>Empréstimos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="bibliotecas_controller"><i class="fa fa-send fa-fw"></i>Todos Empréstimos</a>                            
                                        </li>
                                        <li>
                                            <a href="bibliotecas_controller"><i class="fa fa-flag fa-fw"></i>Todas as Reservas</a>                            
                                        </li>
                                    </ul>    
                                </li>
                                <li>
                                    <a href="buttons.html"><i class="fa fa-user-md fa-fw"></i>Acervo<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="panels-wells.html"><i class="fa fa-plus fa-fw"></i>Cadastro de Material</a>
                                        </li>
                                        <li>
                                            <a href="buttons.html"><i class="fa fa-user-md fa-fw"></i>Autores</a>
                                        </li>
                                    </ul>
                                     
                                </li>                                
                            </ul>
                             /.nav-second-level 
                        </li>-->
                        <li>
                            <a href="<?php echo base_url();?>configuracoes_controller"><i class="fa fa-gears fa-fw"></i> Configurações da Biblioteca</a>
                        </li>
                            <li>
                            <a href="#"><i class="fa fa-file fa-fw"></i>Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url()."relatorios";?>/rel_leitores_controller"><i class="fa fa-users"></i> Relatório dos Leitores</a>
                                </li>
                                  <li>
                                    <a href="<?php echo base_url()."relatorios";?>/rel_acervo_cadastrado_controller"><i class="fa fa-book"></i> Relatório dos Acervos</a>
                                </li>
                                  <li>
                                    <a href="<?php echo base_url()."relatorios";?>/rel_leitura_controller"><i class="fa fa-tasks"></i> Relatório de Leitura</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()."relatorios";?>/rel_emprestimos_controller"><i class="fa fa-send"></i> Relatório dos Empréstimos</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()."relatorios";?>/rel_ficha_material_controller"><i class="fa fa-file-text"></i> Ficha de Registro</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>dados_usuario_controller"><i class="fa fa-user fa-fw"></i> Meus Dados</a>
                        </li> 
                </div>
                <!-- /.sidebar-collapse -->
            </div>
