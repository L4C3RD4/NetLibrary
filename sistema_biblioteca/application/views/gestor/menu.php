<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url();?>index_controller"><i class="fa fa-home fa-fw"></i> Painel do Gestor</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>acervo_controller"><i class="fa fa-book fa-fw"></i> Acervo Geral</a>                            
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>configuracoes_controller"><i class="fa fa-gears fa-fw"></i> Configurações das Bibliotecas</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>bibliotecario_controller"><i class="fa fa-user fa-fw"></i>Atribuição de Profissionais</a>                            
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>bibliotecas_controller"><i class="fa fa-university fa-fw"></i> Bibliotecas</a>                            
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>usuarios_controller"><i class="fa fa-child fa-fw"></i> Usuarios</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file fa-fw"></i>Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url()."relatorios";?>/rel_acervo_cadastrado_controller"><i class="fa fa-book"></i> Relatório dos Acervos</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()."relatorios"?>/rel_leitores_cadastrados_controller"><i class="fa fa-users fa-fw"></i> Relatório dos Leitores</a>
                                </li>
                                 <li>
                                   <a href="<?php echo base_url()."relatorios";?>/rel_leitura_controller"><i class="fa fa-tasks fa-fw"></i> Relatório de Leitura</a>
                                </li>
                                <li>
                                   <a href="<?php echo base_url()."relatorios";?>/rel_reservas_controller"><i class="fa fa-paperclip fa-fw"></i> Relatório das Reservas</a>
                                </li>
                                <li>
                                   <a href="<?php echo base_url()."relatorios";?>/rel_emprestimos_controller"><i class="fa fa-send fa-fw"></i> Relatório de Empréstimos</a>
                                </li>
                            </ul>                            
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>logs_controller"><i class="fa fa-search"></i> Registro de Logs</a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url();?>dados_usuario_controller"><i class="fa fa-user fa-fw"></i> Meus Dados</a>
                        </li> 
                </div>                
            </div>
