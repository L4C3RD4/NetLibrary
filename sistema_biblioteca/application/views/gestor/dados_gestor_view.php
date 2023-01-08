<head>
    <style>
        #myProgress {
  width: 200px;
  background-color: grey;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: red;
}
#mybar {
  width: 1%;
  height: 30px;
  background-color: red;
}
        
        
    </style>
    
</head>
<div id="page-wrapper">
    <!-- Page Heading -->
    <div id="loading" style="display: none;">
        <img id="imagemLoader" alt="Processando" src="./utils/img/carregando.gif" style="
            width: 700px;
            height: 700px;
            margin-top: 10px; ">
        <!--<p id="fraseLoader">Processando, aguarde...</p>-->
    </div>       
    <div class="row">
        <!-- Modal -->      
        <div class="col-lg-12">
            <div id="sucesso">  
               <div class="modal-content alert-success">
                    <div class="modal-header alert-success">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title ">Sucesso</h4>
                    </div>
                    <div class="modal-body">
                       <p id="msg_acerto">Sucesso ao cadastrar o Leitor</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>

            <div id="erro">
                    <div class="modal-content alert-danger">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title ">Falha</h4>
                     </div>
                    <div class="modal-body">
                        <p id="msg_erro">Falha ao cadastrar o Leitor!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>   
    <!-- Modal -->
    <!--Nome Principal da Página!-->
    <div class="col-lg-12">
        <h1 class="page-header">MEUS DADOS</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <!--ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_leitores">Meus Dados</a>
                </li>                            
            </ul-->
                <div class="tab-pane" id="panel-190060">
                <br/>
                    <h4>Dados do Gestor</h4>
                <hr/>
                <form role="form" method="post">
                    <input type="hidden" name="idleitor" id="idleitor" value="0"/>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Nome</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Endereço</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Perfil</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>E-mail</label>
                                </div>
                            </div> 
                                
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <span id="nome"></span>
                                </div>
                                    <div class="col-xs-3">
                                    <span id="logradouro"></span>
                                </div>
                                    <div class="col-xs-3">
                                    <span id="perfil"></span>
                                </div>
                                    <div class="col-xs-3">
                                    <span id="email"></span>
                                </div>
                            </div>
                    <br><br><br>
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-3">
                                                <label>Senha Atual:</label> 
                                            </div>
                                            <div class="col-xs-3">
                                                <label>Digite a Nova Senha:</label> 
                                            </div>                                                                                                                                    
                                            <div class="col-xs-3">
                                                <label>Confirma a nova Senha:</label> 
                                            </div>                                                                                        
                                            <div class="col-xs-3">
                                                <label>Nível de Segurança da Senha:</label> 
                                            </div>                                                                                        
                                                                                                                                    
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-3">
                                                <input type="password" name="senha_atual" id="senha_atual" class="form-control"></input> 
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="password" name="altsenha" id="altsenha" class="form-control"></input> 
                                            </div>
                                            <div class="col-xs-3">
                                                <input type="password" name="confirm_senha" id="confirm_senha" class="form-control"></input> 
                                            </div>                                                                                        
                                            <div class="col-xs-3">
                                                <div id="myProgress">
                                                <div id="mybar"></div>
                                            </div>
                                            </div>
                                            
                                        </div>
                            <br><br><br><br>
                            <div class="col-xs-12">
                                <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAtualizacao" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAtualizaSenhaUsuario">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Alterar Dados de Acesso
         </button>   
    </div>
                            </div>    
                            
                        <br/><br/>
                    </form>
                </div>                       
            </div>
        </div>                
    </div>
        
    
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.js"></script>    
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.banlist.js"></script>
<script src="<?php echo base_url(); ?>utils/js/ajax/dados_gestor.js"></script>

