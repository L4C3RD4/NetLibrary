    <div id="page-wrapper">
    <div class="container-fluid">
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
                                <p id="msg_erro"></p>
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
            Relatórios de Acervos Cadastrados <small></small>
        </h1>
        
    <div id="filtros_relatorio"> 
        <?php
        $session_data = $this->session->userdata('logged_in');
        if ($session_data["perfil"] == "gestor") {
            ?>
        <div class="col-xs-12" >                    
            <div class="col-xs-12" >
                <h3 class="page-header">
                    <input type="radio" name="tiporel" value="acervo_geral" checked="true">Acervo Geral do Sistema<small></small>
                </h3>
           </div>     
        </div>   
        <div class="col-xs-12" >
            <div class="col-xs-4" >
            <h3 class="page">
                <input type="radio" name="tiporel" value="acervo_biblioteca">Acervo por Unidade<small></small>            
            </h3>
            </div>
            <div class="col-xs-4" >
                <br/>
                <select id="biblioteca" name="biblioteca" class="form-control"></select>
            </div>             
        </div>         
        </div>  
    
    
    <?php } else { ?>
    <h3 class="page-header">
        <input type="radio" name="tiporel" value="acervo_biblioteca" checked="true">Por Biblioteca<small></small>
        </h3>
        <br/>
        <div class="col-xs-4">
                <label> Biblioteca </label>
            </div>
            <div class="col-xs-4">
                <input type="hidden" id="biblioteca" name="biblioteca" value="<?php echo $session_data["biblioteca"]; ?>">
                <span id="spunidade" name="spunidade" /><?php echo $session_data["biblioteca"] . " - " . $session_data["descricao"]; ?> </span>                                            
            </div>
        <?php } ?>
        <br>
        <br>
                
        <div class="col-xs-12">
        <br>
        <br>
        <div class="col-xs-4">
            <button type="button" class="btn btn-primary " id="btGerarRelatorio" >
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Gerar Relatório
            </button>                                            
        </div>
        <div class="col-xs-4">
                <button type="button" class="btn btn-success" id="btGerarPlanilha">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>Gerar planilha
                </button>
        </div>
        </div>

    </div> 
        
  
    <div id="area_impressao" style="border: 1px solid black;">
                           
                                
    <div id="rel_acervo_geral">
        <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h3>Relatório de Acervo <span  id="spsubtitulo" name="spsubtitulo"> </span></h3>             
             </center></div>                                    
         </div>      
         <div class="col-xs-12 cabecalho">
         <div class="col-xs-12">            
             <h3><label id="titulo_rel_acervo_geral"></label></h3>             
             <div id="empty_acervo_geral"><label>Não possui acervos cadastrados</label></div>
             <!--<h3 style="display:inline;">- SeguranÃƒÂ§a e eficiÃƒÂªncia nas suas transaÃƒÂ§ÃƒÂµes finaceiras</h3>-->                          
         </div>                                    
      </div>
        <table id="tblrel_acervo_geral" class="table table-striped table-bordered" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Código do Material</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Unidade</th>
                    <th>Assunto</th>
                    <th>Editora</th>
                    <th>Publicação£o</th>
                    <th>ISBN</th>
                    <th>Aquisição</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>    
         
    </div>
                            
              
                                      
        
    <div id="rel_acervo_biblioteca">
        <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h3>Relatório de Acervo <span  id="spsubtitulonomebib" name="spsubtitulonomebib"> </span></h3>             
             </center></div>                                    
         </div>
         <div class="col-xs-12 cabecalho">
         <div class="col-xs-12">            
             <h3><label id="titulo_rel_acervo_biblioteca"></label></h3>             
             <div id="empty_acervo_biblioteca"><label>Não existem acervos cadastrados para esta biblioteca no sistema</label></div>
             <!--<h3 style="display:inline;">- SeguranÃƒÂ§a e eficiÃƒÂªncia nas suas transaÃƒÂ§ÃƒÂµes finaceiras</h3>-->                          
         </div>                                    
      </div>
        <table id="tblrel_acervo_biblioteca" class="table table-striped table-bordered" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Código do Material</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Assunto</th>
                    <th>Editora</th>
                    <th>Publicação</th>
                    <th>ISBN</th>
                    <th>Aquisição</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>            
    </div>
             
         <div class="col-xs-12 rodape" style="">
         <div class="col-xs-12">
             <center>
             <label id="detalhes_prog">Relatorio gerado em: <?php
                echo Date("d/m/Y h:m");
             ?></div>
             </center>
         </div>  
        </div>
                        <br/><br/>
                        <div class="col-xs-12">
                            <br/><br/>
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
                        
                        
        
            <script src="<?php echo base_url(); ?>utils/js/ajax/relatorios/rel_acervo_cadastrado.js"></script>            
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
    </div>
</div>                <!-- /.row -->
                              
                
