<div id="page-wrapper">    
    <div id="loading" style="display: none;">
       <!-- <img id="imagemLoader" alt="Processando" src="./utils/img/carregando.gif" style="
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Sucesso</h4>
                    </div>
                    <div class="modal-body">
                       <p id="msg_acerto">Sucesso ao cadastrar o Autor</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>

            <div id="erro">
                    <div class="modal-content alert-danger">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btFecharErro">x</button>
                        <h4 class="modal-title ">Falha</h4>
                     </div>
                    <div class="modal-body">
                        <p id="msg_erro">Falha ao cadastrar o Autor!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>     
      <div class="col-lg-12">
        <h1 class="page-header">CADASTRO DE AUTORES</h1>
    </div

 <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_autores">Listagem de Autores cadastradas</a>
                </li>
                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_autores">Cadastrar Novo Autor</a>
                </li>                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br />
        <h4> Todos os autores cadastrados </h4>
        <hr />
        <table id="tblAutores" class="table table-striped table-bordered" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>                                            
                    <th>Sobrenome</th>                                            
                    <th>Citação</th>                                                                                      
                    <th>Ação</th>                                            
                </tr>
            </thead>
            <tbody></tbody>
        </table>
            </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                    <h4> Novo Autor</h4>
                <hr/>
                    <form role="form" method="post" action="autores_controller/cadastrar_autor" name="cadastrar_autores">
                <div class="col-xs-12">   
                    <div class="col-xs-4">
                        <label>Nome do autor</label>
                    </div> 
                    <div class="col-xs-4">
                        <label>Sobrenome do autor</label>
                    </div> 
                    <div class="col-xs-4">
                        <label>Formato Citação</label>
                    </div> 
                    
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do autor">
                    </div>
                     <div class="col-xs-4">
                         <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite o Sobrenome do autor">
                    </div>
                      <div class="col-xs-4">
                          <input type="text" class="form-control" id="citacao" name="citacao" placeholder="Digite o formato de citação do autor">
                    </div>
                </div>
            <br><br><br><br>
			
			<center>   
   
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarAutores">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Autor
         </button>   
    </div>
</center>
			
			
   <br><br><br>
</form>
                </div>                       
            </div>
        </div>                
    </div>

<div class="col-md-12 column">
                <div class="modal fade" id="excluirAutor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" action="<?php echo base_url('autores_controller/excluirautores') ?>" >
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Excluir Autor
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="idautorex" name="idautorex" />
                                    Tem certeza que deseja excluir o autor? <b><span id="spanNomeAutor"></span></b>
                                </div>
                                <div class="modal-footer">
<div class="col-xs-12">								
								<center>   
    <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirAutor" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirAutor">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Excluir
         </button>   
    </div>
                                                                    </center>
    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 column">
                <div class="modal fade" id="alterarAutor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    Alterar Dados do Autor
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('autores_controller/alterarAutores') ?>" class="formCadastrarCliente">
<!--                                    <input type="hidden" name="instituicao" id="edinstituicao" value="<?php
                                      //     $session_data = $this->session->userdata('logged_in');
                                       //    echo $session_data["instituicao"];
                                           ?>"/>								-->
                                    <!--Código do Cliente -->
                                    <div class="col-xs-2">
                                        
                                        <div class="col-xs-2">
                                            <input type="hidden" id="edidautor" name="edidautor" value="<?php
                                           $session_data = $this->session->userdata('logged_in');
                                    
                                           ?>" />
                                            <div id="valueid"> </div>                                        
                                            <!--<label id="idsetor" name="idsetor"> </label>-->
                                        </div>
                                    </div>
                                   								

            <div class="col-xs-12">
                <div class="col-xs-6">
                    <label>Nome</label>
                </div>
                <div class="col-xs-6">
                    <label>Sobrenome</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="ednome" name="nome" placeholder="Infome o nome do autor"> 
                </div>
            <div class="col-xs-6">
                <input type="text" class="form-control" id="edsobrenome" name="sobrenome" placeholder="Informe osobrenome do autor ">
                </div>
            </div>
            <br><br><br><br>      
                <div class="col-xs-12">
                <div class="col-xs-12">
                    <label>Citação</label>
                </div>
               
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12">
                    <input type="text" class="form-control" id="edcitacao" name="edcitacao" placeholder="Infome a citação"> 
                </div>
     
                  </div> 
               
                                     
                            </div><br><br><br> 
                            <div class="modal-footer">
							
							<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarAutor" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarAutor">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Alterações
         </button>   
    </div>
</center>
							
                                  </div>
                        </div></div>
                </div></div></div>
                            
                            
<script src="<?php echo base_url(); ?>utils/js/ajax/autores.js"></script>