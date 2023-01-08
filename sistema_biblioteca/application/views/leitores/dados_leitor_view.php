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
                    <h4>Dados do Leitor </h4>
                <hr/>
               <form role="form" method="post">
                    <input type="hidden" name="idleitor" id="idleitor" value="0"/>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Nome</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>CPF</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>CEP</label>
                                </div>
                              
                                
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <span id="nome"></span>
                                </div>
                                <div class="col-xs-3">
                                    <span id="cpf"></span>
                                </div>
                                    <div class="col-xs-3">
                                    <span id="cep"></span>
                                </div>
                            </div>
                            <!-- Fim do Nome e Logradouro-->
                            
                            <!-- Complemento e Bairro-->
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Logradouro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label> Complemento</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Bairro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Município</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <span id="logradouro"></span>
                                </div>
                                  <div class="col-xs-3">
                                   <span id="complemento"></span>
                                </div>
                                <div class="col-xs-3">
                                    <span id="bairro"></span>
                                </div>
                                  <div class="col-xs-3">
                                   <span id="municipio"></span>
                                </div>
                            </div>
                            <br><br><br><br><div class="col-xs-12">
                                  <div class="col-xs-3">
                                    <label>Perfil</label>
                                </div>
                                <div class="col-xs-3" id="serie_label">
                                    <label>Série</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Matricula</label>
                                </div>
                                
                            </div>
                            <div class="col-xs-12">
                                  <div class="col-xs-3">
                                     <span id="perfil"></span>                       
                                </div>
                                <div class="col-xs-3">
                                    <span id="serie"></span>
                                </div>
                                <div class="col-xs-3">
                                   <span id="matricula"></span>
                                </div>                                
                            </div>
                            <br><br>
                            <p>
                                <br>
                Caso haja alguma divergência entre as informações acima, favor entre em contato com o profissional da biblioteca e solicitar alteração.
            </p>
                            <br>
                            <!-- Fim da Matricula e Email-->
                            
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-xs-2">
                                                <label>Senha Atual:</label> 
                                            </div>
                                            <div class="col-xs-2">
                                                <label>Digite a Nova Senha:</label> 
                                            </div>                                                                                                                                    
                                            <div class="col-xs-2">
                                                <label>Confirma a nova Senha:</label> 
                                            </div>                                                                                        
                                            <div class="col-xs-2">
                                                <label>Nível de Segurança da Senha:</label> 
                                            </div>                                                                                        
                                                                                                                                    
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-4">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Informe o e-mail">
                                            </div>
                                            <div class="col-xs-2">
                                                <input type="password" name="senha_atual" id="senha_atual" class="form-control"></input> 
                                            </div>
                                            <div class="col-xs-2">
                                                <input type="password" name="altsenha" id="altsenha" class="form-control"></input> 
                                            </div>
                                            <div class="col-xs-2">
                                                <input type="password" name="confirm_senha" id="confirm_senha" class="form-control"></input> 
                                            </div>                                                                                        
                                            <div class="col-xs-2">
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
                            </div>
                        <br/><br/>
                    </form>
                </div>                       
            </div>
        </div>                
    </div>
   
         <div class="col-md-12 column">
                        <div class="modal fad" id="atualiza_login" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" id="closeNota" class="close fechar" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            Atualizar a senha de acesso do usuário
                                        </h4>                                        
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="col-xs-12"><br>
                                            <div class="col-xs-6">
                                                <label>Usuário: </label> <span id="sp_nome"></span>
                                                <input type="hidden" name="usuario_login" id="usuario_login">
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Email: </label> <span id="sp_email"></span>
                                            </div>
                                        </div>
                                        <br/>    
                                        <br/>    
                                        <br/>    
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-4">
                                                <label>Digite a Nova Senha:</label> 
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Confirma a nova Senha:</label> 
                                            </div>                                                                                        
                                            <div class="col-xs-4">
                                                <label>Nível de Segurança da Senha:</label> 
                                            </div>                                                                                        
                                                                                                                                    
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-4">
                                                <input type="password" name="altsenha" id="altsenha" class="form-control"></input> 
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="password" name="confirm_senha" id="confirm_senha" class="form-control"></input> 
                                            </div>                                                                                        
                                            <div class="col-xs-4">
                                                <div id="myProgress">
                                                <div id="mybar"></div>
                                            </div>
                                            </div>
                                            
                                        </div>                                            
                                        </div>
                                    </div>
                                    <div id="bt-update-lancar" class="modal-footer">
                                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" id="btFecharAtualizacao">Cancelar</button> 
                                        <input type="button" id="btAtualizaSenhaUsuario" class="btn btn-primary" value="Alterar a Senha de Acesso" /> </div>
                                </div>
                            </div>
                        </div>
                    </div>
     
    
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.js"></script>    
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.banlist.js"></script>
<script src="<?php echo base_url(); ?>utils/js/ajax/dados_leitor.js"></script>

