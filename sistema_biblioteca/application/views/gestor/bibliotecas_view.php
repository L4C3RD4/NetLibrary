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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Sucesso</h4>
                    </div>
                    <div class="modal-body">
                       <p id="msg_acerto">Sucesso ao cadastrar a biblioteca</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>

            <div id="erro">
                    <div class="modal-content alert-danger">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Falha</h4>
                     </div>
                    <div class="modal-body">
                        <p id="msg_erro">Falha ao cadastrar a biblioteca!</p>
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
        <h1 class="page-header">CADASTRO DE BIBLIOTECAS</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas">Listagem de Bibliotecas cadastradas</a>
                </li>
                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_bibliotecas">Cadastrar Nova Biblioteca</a>
                </li>                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Todos as bibliotecas cadastradas </h4>
                        <hr/>
                            <table id="tblBibliotecas" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Descrição</th>                                            
                                    <th>Logradouro</th>                                            
                                    <th>Complemento</th>                                            
                                    <th>Bairro</th>                                            
                                    <th>Telefone</th>                                            
                                    <th>E-mail</th>
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
            </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                    <h4> Nova Biblioteca</h4>
                <hr/>
                    <form role="form" method="post" action="bibliotecas_controller/cadastrar_biblioteca" name="cadastrar_bibliotecas">
                            <input type="hidden" name="idbiblioteca" id="idbiblioteca" value="0"/>
                            <!-- Descrição e Logradouro-->
                            <div class="col-xs-12">
                                <div class="col-xs-9">
                                    <label>Descrição</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>CEP</label>
                                </div>                                
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Infome a descrição da biblioteca"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o CEP">
                                </div>                            
                            </div>
                            <!-- Fim da Descrição e Logradouro-->
                            
                            <!-- Complemento e Bairro-->
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Logradouro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Complemento</label>
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
                                    <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Informe o endereço da bibliotecca">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Infome o complemento"> 
                                </div>
                            <div class="col-xs-3">
                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o bairro">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Infome o Município"> 
                                </div>
                            </div>
                            <!-- Fim do Complemento e Bairro-->
                            <!-- telefone email e observações-->
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Telefone</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-xs-5">
                                    <label>Observações</label>
                                </div>                                
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Informe o telefone da bibliotecca">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Infome o e-mail da biblioteca"> 
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" id="observacoes" name="observacoes" placeholder="Espaço para informar observações">
                                </div>                                
                            </div>
                            <!-- Fim do Complemento e Bairro-->
							
							<br><br><br><br><br><br>
							<center>   
   
    <div class="col-xs-12">                                            
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="CancelarCadastro" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Cadastro  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarBiblioteca">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Biblioteca
         </button>   
    </div>
    </div>
</center>
                            <br><br><br><br>
                        <br/><br/>
                    </form>
                </div>                       
            </div>
        </div>                
    </div>
</div>   
<!-- /.container-fluid -->


    <div class="col-md-12 column">
        <div class="modal fade" id="excluirBiblioteca" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header bg-danger">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Biblioteca
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idbibliotecaex" name="idbibliotecaex" />
                                 Tem certeza que deseja excluir essa Biblioteca? <b><span id="spanDadosBiblioteca"></span></b>
                             </div>
                             <div class="modal-footer">
							 
							 <center>   
    <div class="col-xs-12">                                            
    <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirBiblioteca" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar 
		</button>   
    </div> 
    
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirBiblioteca">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Excluir
         </button>   
    </div>
    </div>
</center>
							 
                                   </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!--Alterar Dados da Biblioteca!-->
    <div class="col-md-12 column">
        <div class="modal fade" id="alterarBiblioteca" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                            Alterar Dados da Biblioteca
                        </h4>
                    </div>
    <div class="modal-body">
        <form method="post" action="<?php echo base_url('bibliotecas_controller/alterar_biblioteca') ?>" class="formAtualizarBiblioteca">
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label> Código </label>
                </div>
            <input type="hidden" id="edidbiblioteca" name="edidbiblioteca" />
            <div id="valueid" name="valueid"> </div>                                        
            <!--<label id="idsetor" name="idsetor"> </label>-->
             </div>
            </div>
            <div class="col-xs-12">
                                <div class="col-xs-9">
                                    <label>Descrição</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>CEP</label>
                                </div>                                
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="eddescricao" name="eddescricao" placeholder="Infome a descrição da biblioteca"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edcep" name="edcep" placeholder="Informe o CEP">
                                </div>                            
                            </div>
                            <!-- Fim da Descrição e Logradouro-->
                            
                            <!-- Complemento e Bairro-->
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Logradouro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Complemento</label>
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
                                    <input type="text" class="form-control" id="edlogradouro" name="edlogradouro" placeholder="Informe o endereço da bibliotecca">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edcomplemento" name="edcomplemento" placeholder="Infome o complemento"> 
                                </div>
                            <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edbairro" name="edbairro" placeholder="Informe o bairro">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edmunicipio" name="edmunicipio" placeholder="Infome o Município"> 
                                </div>
                            </div>
                            <!-- Fim do Complemento e Bairro-->
                            <!-- telefone email e observações-->
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Telefone</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-xs-5">
                                    <label>Observações</label>
                                </div>                                
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edtelefone" name="edtelefone" placeholder="Informe o telefone da bibliotecca">
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="edemail" name="edemail" placeholder="Infome o e-mail da biblioteca"> 
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" class="form-control" id="edobservacoes" name="edobservacoes" placeholder="Espaço para informar observações">
                                </div>                                
                            </div>
            
        <br/><br/><br/><br/>
        
    
    <div class="modal-footer">
	
	
	<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarBiblioteca" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarBiblioteca">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Alterações
         </button>   
    </div>
</center>
	</form>
	
        <!--<input type="submit" class="btn btn-primary" value="Salvar" />*/-->
    </div>

         </div>   </div>
        </div>
    </div>

<script src="<?php echo base_url(); ?>utils/js/ajax/biblioteca.js"></script>

