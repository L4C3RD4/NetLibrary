<div id="page-wrapper">
  <div class="container-fluid">
 <!--   <div class="container-fluid">-->

        <!-- Page Heading -->  
        <div id="loading" style="display: none;">
        <img id="imagemLoader" alt="Processando" src="../utils/img/carregando.gif" style="
    width: 700px;
    height: 700px;
    margin-top: 10px; ">
        <!--<p id="fraseLoader">Processando, aguarde...</p>-->
        </div>
        
       <div class="row">
                    <div class="col-lg-12">
                       
                    
                    <div class="modal fade" id="erro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">    
                    <div class="modal-content alert-danger">
                        <div class="modal-header alert-danger">
                            <button type="button" class="close fechar" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title ">Falha</h4>
                        </div>
                        <div class="modal-body">
                            <p id="msg_erro">Falha!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                        </div>
                    </div>
                </div>
                    
                </div>

                       		

                    </div>   

                    <div class="col-lg-12">
                       
                       
                        <h1 class="page-header">
                            Relatórios de Listagem de Leitores Cadastrados<small></small>
                        </h1>
                        
                        <div id="filtros_relatorio"> 
                            
                            
                            <?php
                                 $session_data = $this->session->userdata('logged_in');
                                if($session_data["perfil"] =="gestor"){?>
                            
                            <h3 class="page-header">
                                <input type="radio" name="tiporel" value="geral">Toda a Lista de Leitores <small></small> 
                                 </h3>
                                                       
                                <h3 class="page-header">
                                <input type="radio" name="tiporel" value="unidade" checked="checked">Por Biblioteca <small></small>
                                </h3>
                                <br/>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <select id="biblioteca" name="biblioteca" class="form-control"></select>
                                    </div>                                    
                                </div>
                            <?php } else { ?>
                         
                        <h3 class="page-header">
                            <input type="radio" name="tiporel" value="unidade" checked="checked">Por Biblioteca <small></small>
                        </h3>
                        <br/>    
                        <div class="col-xs-12">
                            
                            
                                <?php
                                   ?>
                                        <div class="col-xs-4">
                                            <!--<button type="button" class="btn btn-primary " id="btUnidade_Educacional" data-toggle="modal" data-target="#selecionarUnidade_Educacional">
                                                <span class="fa fa-building " aria-hidden="true"></span> Unidade Educacional
                                              </button>--> 
                                            <label> Biblioteca </label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="hidden" id="biblioteca" name="biblioteca" value="<?php echo $session_data["biblioteca"]; ?>">
                                            <span id="spunidade" name="spunidade" /><?php echo $session_data["biblioteca"] . " - " . $session_data["descricao"]; ?> </span>                                            
                                        </div>
                            
                            <?php } ?>
                                        
                        <h3 class="page-header">
                            <br/>
                                Perfil de Leitor  <small></small>
                                </h3>
                            <div class="col-xs-12">                                        
                                        <div class="col-xs-4">
                                            <label> Perfil </label>
                                        </div>                                        
                                <div class="col-xs-4" id="serie_label">
                                            <label> Série </label>
                                        </div>                                        
                        </div>
                            
                            <div class="col-xs-12">
                                                                                
                                        <div class="col-xs-4">
                                            <select name="perfil" id="perfil" class="form-control">  
                                                <option value="todos"> Todos </option>
                                                <option value="aluno"> Alunos </option>
                                                <option value="comunidade"> Comunidade </option>
                                                <option value="funcionario"> Funcionários </option>
                                                <option value="professor"> Professores </option>
                                            </select>
                                        </div>                                        
                                        <div class="col-xs-4">
                                            <select name="serie" id="serie" class="form-control">  
                                      <option value='todas'>Todas</option>
                                      <option value='Berçário'>Berçário</option>
                                        <option value='1 Ano de Idade'>1 Ano de Idade</option>
                                        <option value='2 Anos de Idade'>2 Anos de Idade</option>
                                        <option value='3 Anos de Idade'>3 Anos de Idade</option>
                                        <option value='4 Anos de Idade'>4 Anos de Idade</option>
                                        <option value='5 Anos de Idade'>5 Anos de Idade</option>
                                        <option value='1º Ano'>1º Ano</option>
                                        <option value='2º Ano'>2º Ano</option>
                                        <option value='3º Ano'>3º Ano</option>
                                        <option value='4º Ano'>4º Ano</option>
                                        <option value='5º Ano'>5º Ano</option>
                                        <option value='6º Ano'>6º Ano</option>
                                        <option value='7º Ano'>7º Ano</option>
                                        <option value='8º Ano'>8º Ano</option>
                                        <option value='9º Ano'>9º Ano</option>
                                        <option value='1º Ano Ensino Médio'>1º Ano Ensino Médio</option>
                                        <option value='2º Ano Ensino Médio'>2º Ano Ensino Médio</option>
                                        <option value='3º Ano Ensino Médio'>3º Ano Ensino Médio</option>
                                        <option value='EJA - 1º Segmento'>EJA - 1º Segmento</option>
                                        <option value="EJA - 2º Segmento">EJA - 2º Segmento</option>                                                
                                        <option value="Curso de Qualificação Profissional (FIC)">Curso de Qualificação Profissional (FIC)</option>                                                
                                        <option value="Ensino Técnico">Ensino Técnico</option>                                             
                                            </select>
                                        </div>                                        
                        </div>
                        <br/><br/><br/><br/><br/>
                            <div class="col-xs-12">
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-primary " id="btGerarRelatorio" >
                                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Gerar Relatório
                                              </button>                                            
                                        </div>                                        
                        </div>
                        </div>
                        <br/><br/>
                        
                        <br/><br/>
                        
                        </div>
                        <div id="area_impressao" style="border: 1px solid black;">
                           
                                
                            <div id="rel_leu">
                                <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h3>Relatório de leitores <span  id="spsubtitulo" name="spsubtitulo"> </span></h3>             
             </center></div>                                    
         </div>      
         <div class="col-xs-12 cabecalho">
             
         <div class="col-xs-12">            
             <h3><label id="titulo_rel_leu"></label></h3>             
             <div id="empty_leu"><label>Não existem leitores com esses parâmetros de busca nessa Biblioteca</label></div>
             <!--<h3 style="display:inline;">- SeguranÃ§a e eficiÃªncia nas suas transaÃ§Ãµes finaceiras</h3>-->                          
         </div>                                    
      </div>
     <table id="tblrel_leitores_unidade" class="table table-striped table-bordered" cellspacing="0" width="100%" >
        
            <thead>
                                        <tr>
                                        
                                            <th>Nome</th>
                                            <th>Logradouro</th>
                                            <th>Complemento</th>
                                            <th>Bairro</th>                                            
                                            <th>Município</th>                                            
                                            <th>CEP</th>  
                                            <th>Código Matricula</th>
                                            <th>Email</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>    
         
         
                            </div>
                            
                                                                   
         
         
         
                            
        <div id="rel_leg">
         <div class="col-xs-12 cabecalho">
             <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h3>Relatório Geral de Leitores do Sistema</h3>             
             </center></div>                                    
         </div>      
         <div class="col-xs-12">            
             <h3><label id="titulo_rel_leg"></label></h3>             
             <div id="empty_leg"><label>Não existem leitores cadastrados</label></div>
             <!--<h3 style="display:inline;">- SeguranÃ§a e eficiÃªncia nas suas transaÃ§Ãµes finaceiras</h3>-->                          
         </div>                                    
      </div>
        <table id="tblrel_leitores_geral" class="table table-striped table-bordered" cellspacing="0" width="100%" >
        
            <thead>
                                        <tr>
                                        
                                            <th>Biblioteca</th>
                                            <th>Nome</th>
                                            <th>Logradouro</th>
                                            <th>Complemento</th>
                                            <th>Bairro</th>                                            
                                            <th>Município</th>                                            
                                            <th>CEP</th>  
                                            <th>Código Matricula</th>
                                            <th>Email</th>                                             
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>    
         
        </div>                    
                            
                            
                            
         <div class="col-xs-12 rodape" style="border: 1px solid black;">
         <div class="col-xs-12">
             <center>
             <label id="detalhes_prog">Relatório gerado em: <?php
                echo Date("d/m/Y h:m");
             ?></div>
             </center>
         </div>  
        </div>
                        <br/><br/><br/><br/>
                        <div class="col-xs-12">
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-danger " id="btSelecaoRelatorio" >
                                                <span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Voltar
                                              </button>                                            
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-primary " id="btImprimir" >
                                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                                              </button>                                            
                                        </div>
                        </div>
                        
                        
            <!-- Modal SeleÃ§Ã£o de Unidade_Educacionals -->
            <div class="col-md-12 column">
                <div class="modal fade" id="selecionarUnidade_Educacional" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="post" action="<?php echo base_url('ana_controller/excluirana') ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Selecione uma Unidade Educacional dentre as cadastradas
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="idanaex" name="idanaex" />
                                    <!-- <input type="hidden" id="emailanaex" name="emailanaex" />-->
                                   <h4>Todas as bibliotecas cadastradas </h4>
                        <hr/>
                            <table id="tblBibliotecas" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Descrição</th>                                            
                                    <th>Logradouro</th>                                            
                                    <th>Complemento</th>                                            
                                    <th>Bairro</th>                                            
                                    <th>Município</th>                                            
                                    <th>CEP</th>
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btSFecharSelecionarUnidade_Educacional">Fechar</button> 
                                    <input type="button" id="btSelecionarUnidade_Educacional" class="btn btn-primary" value="Cancelar" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="<?php echo base_url(); ?>utils/js/ajax/relatorios/rel_leitores.js"></script>
            <script src="<?php echo base_url(); ?>utils/js/jQuery.print.js"></script>
            <script src="<?php echo base_url(); ?>utils/js/jQuery.PrintArea.js"></script>            
                        <!--
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->
  </div>
</div>   
                
