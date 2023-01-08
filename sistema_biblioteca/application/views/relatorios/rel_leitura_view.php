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
                            Relatório de Leitura<small></small>
                        </h1>
                        <div id="filtros_relatorio"> 
                            
                            <?php
                                 $session_data = $this->session->userdata('logged_in');
                                if($session_data["perfil"] =="gestor"){?>
                            
                            <h3 class="page-header">
                                <input type="radio" name="tiporel" id="geral" value="geral">Ranking de Leitura por Unidade <small></small> 
                                 </h3>
                            <h3 class="page-header">
                                    <input type="radio" name="tiporel" id="unidade" value="unidade" checked="checked">Por Biblioteca <small></small>
                                </h3>                                                 
                                <br/>
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <b> <span id="spunidade_educacional" name="spunidade_educacional" >Selecione a Biblioteca </span> </b>                                         
                                    </div>
                                    <div class="col-xs-6">
                                        <select id="unidade_educacional" name="biblioteca" class="form-control"></select>
                                    </div>
                                </div>
                                <br/>
                   
                            <?php } else { ?>
                         
                        <h3 class="page-header">
                            <input type="radio" name="tiporel" value="unidade" checked="checked">Por Biblioteca <small></small>
                        </h3>
                        <br/>    
                        <div class="col-xs-12">
                            <div class="col-xs-4">
                                <label> Biblioteca </label>
                            </div>
                            <div class="col-xs-8">
                                <input type="hidden" id="unidade_educacional" name="unidade_educacional" value="<?php echo $session_data["biblioteca"];?>">
                                <span id="spunidade" name="spunidade" /><?php echo $session_data["biblioteca"]." - ".$session_data["descricao"];?> </span>                                            
                            </div>
                        </div>    
                            <?php } ?>
                            <h3 class="page-header">
                                    Período <small></small>
                            </h3>
                            <div class="col-xs-12">
                             <div class="col-xs-2">
                                <label> Data Inicial </label>
                            </div>
                            <div class="col-xs-3">
                                <?php 
                                    $data_incio = mktime(0, 0, 0, date('m') , 1 , date('Y'));
                                    $data_fim = mktime(23, 59, 59, date('m'), date("t"), date('Y'));
                                ?>
                                <input class="form-control" type="date" id='data_inicial' name="data_inicial" value="<?php echo date("Y-m-")."01"; ?>"></input>
                            </div>
                            <div class="col-xs-2">
                                <label> Data Final </label>
                            </div>
                            <div class="col-xs-3">
                                <input class="form-control" type="date" id='data_final' name="data_final" value="<?php echo date('Y-m-d',$data_fim); ?>"></input>
                            </div>    
                            </div>
                                                                 

<div id="pesquisa">  
    <br/>
    <h3 class="page-header">
        Seleção de Leitor <small></small>
    </h3>
    <br />
    <div class="col-xs-12">
        <div class="col-xs-6">
          
          <input type="hidden" name="matricula" id="matricula">
          <input type="hidden" name="idleitor" id="idleitor">
          <span id="spnome_leitor" name="spnome_leitor">Clique no botão ao lado para pesquisar por um leitor</span>
                                    
                                    
                                
        </div>
        <div class="col-xs-6">
            <a href="#PesquisarUsuario" data-toggle="modal" id="modal-30777" role="button" class="btn btn-primary btn-pesquisar">
                <i class="fa fa-search"></i> Pesquisar por Leitores</a>
        </div>
    </div>
    <br/><br/><br/><br/><hr>

</div>


<div class="col-md-12 column">
                <div class="modal fade" id="PesquisarUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"  id="fechar_modal" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    Pesquisar Leitores
                                </h4>
                    </div>
                    <div class="modal-body">
                                        <div class="col-xs-12">
                                    <div class="col-xs-4">
                                        <label>Digite o nome do Leitor</label>
                                    </div>                                        
                                          <div class="col-xs-4">
                                              <label>Perfil</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" id="chave_pesquisa" name="chave_pesquisa">
                                    </div>                                
                                    <div class="col-xs-4">
                                        <select name="filtro_perfil" id="filtro_perfil" class="form-control">
                                         <option value="todos">Selecione um Perfil</option>
                                         <option value="aluno">Aluno</option>                                
                                         <option value="comunidade">Comunidade Escolar</option>
                                         <option value="funcionario">Funcionário</option>                                         
                                         <option value="professor">Professor</option>
                                        </select>
                                    </div>
                                    
                                  <div class="col-xs-4">                                            
                                        <button type="button" class="btn btn-primary " id="btpesquisa">
                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar por Leitores
                                        </button>
                                    </div>
                                    
                                     
                                </div>

                        <br>
                        <br>
                        <br>
       
        <h4> Todos os leitores encontrados </h4>
        <hr />
        <table id="tblUsuarios" class="table table-striped table-bordered" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>                                            
                    <th>Série</th>                                                                                       
                    <th>Matricula</th>                                            
                    <th>E-mail</th>                                                                                       
                    <th>Perfil</th>                                                                                       
                    <th>Ação</th>                                            
                </tr>
            </thead>
            <tbody></tbody>
        </table>
                        </div><br><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-fechar" data-dismiss="modal" id="btfecharPesquisarLeitores">Fechar</button> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btCancelarPesquisarLeitores">Cancelar</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            
    </div>

<div class="col-xs-4">
            <button type="button" class="btn btn-primary " id="btGerarRelatorio" >
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Gerar Relatório
            </button>                                            
        </div> 

                <!-- /.row -->
  </div>
      
          <div id="area_impressao" style="border: 1px solid black;"">
         <div id="listar_emprestimos">     
          <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h2>Relatório de Leitura</h2>             
             </center></div>                                    
         </div>      
          <h4>Leitor: <span id="spleitor"></span>
              <br />Unidade: <span id="spunidade"></span>
              <br />Período: <span id="spperiodo"></span>
          </h4>
          
                        <hr/>
                      
                    <table id="tblEmprestimo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Material</th>                                                   
                                    <th>Tipo Material</th>                                                   
                                    <th>Data Empréstimo</th>                                             
                                    <th>Data Devolução</th>
                                    <th>Dias Empréstimo</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                          <div class="col-xs-12 rodape" style="border: 1px solid black;">
         <div class="col-xs-12">
             <center>
             <label id="detalhes_prog">Relatorio gerado em: <?php
                echo Date("d/m/Y h:m");
             ?></div>
             </center>
         </div> 
        </div>
              
        <div id="ranking_leitura">     
          <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h2>Relatório de Ranking de Leitura</h2> 
             <h4>Período : <span id="periodoranking"></span></h4> 
             </center></div>                                    
         </div>      
          <hr/>
                <table id="tblRanking" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Unidade</th>                                                   
                                    <th>Leitor</th>                                                   
                                    <th>Qtd Material</th>                                                                                       
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                          <div class="col-xs-12 rodape" style="border: 1px solid black;">
         <div class="col-xs-12">
             <center>
             <label id="detalhes_prog">Relatorio gerado em: <?php
                echo Date("d/m/Y h:m");
             ?></div>
             </center>
         </div> 
        </div>      
              
              
            </div>    
                        <br/><br/><br/><br/>
                        <div class="col-xs-8">
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
</div>   
       </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>utils/js/jQuery.print.js"></script>
<script src="<?php echo base_url(); ?>utils/js/jQuery.PrintArea.js"></script>            
<script src="<?php echo base_url(); ?>utils/js/ajax/relatorios/rel_leitura.js"></script>            
