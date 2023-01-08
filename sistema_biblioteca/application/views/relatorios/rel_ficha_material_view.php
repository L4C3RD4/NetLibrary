<style>
    tr{
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }
    .ficha_catalografica{
        float: left;    
        padding: 10px;
        width: 303px;
        height: 300px;
        font-size: smaller;
    }
    table{
        width: 280px;
        height: 300px;
    }
    
</style>    
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
            Emissão de Fichas de Registros <small></small>
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
        <div class="col-xs-6">
            <button type="button" class="btn btn-primary " id="btGerarRelatorio" >
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Gerar Fichas de Registro
            </button>                                            
        </div>
        </div>

    </div> 
        
  
    <div id="area_impressao">
                               
    <div id="rel_fichas_cataloraficas">
        <div class="col-xs-12">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h3>Relatório de Fichas de Registro <span  id="spsubtitulo" name="spsubtitulo"> </span></h3>             
             </center>
            </div>                                                            
         </div>                 
         <div class="col-xs-12">
         <div id="fichas"></div>
         </div>         
    </div>
    <div class="col-xs-12 rodape" style="">
         <div class="col-xs-12">
             <center>
             <label id="detalhes_prog">Fichas de Registro geradas em: <?php echo Date("d/m/Y h:m"); ?> </div>
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
                        
                        
        
            <script src="<?php echo base_url(); ?>utils/js/ajax/relatorios/rel_ficha_material.js"></script>            
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
                              
                
