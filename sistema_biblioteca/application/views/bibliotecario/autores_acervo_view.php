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
                       <p id="msg_acerto"></p>
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
                        <p id="msg_erro"></p>
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
        <h1 class="page-header">CADASTRO DE ACERVOS DO AUTOR</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas">Listagem de Autores cadastrados</a>
                </li>
                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_bibliotecas">Cadastrar Novo Autor </a>
                </li>                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Todos os autores do acervo cadastrados </h4>
                        <hr/>
                            <table id="tblAutoresAcervo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Acervo</th>
                                    <th>Autor</th>                                            
                                    <th>Principal</th>                                            
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
            </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                <form role="form" method="post" action="autores_acervo_controller/cadastrar_autores_acervo" name="cadastrar_autores_acervo" id="cadastrar_autores_acervo" >
                            
                          
                                <br/>
                                <h4>Acervo</h4>
                                <hr/>
                                <div class="col-xs-12" id="codigo_material">
                                    <div class="col-xs-6">
                                        <a href='#PesquisarAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'><i class="fa fa-search"></i> Pesquisar Material</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="hidden" name="acervo" id="acervo">&nbsp&nbsp
                                        <br><label id="idacervo_titulo"></label><span id="value_idacervo"><input name="idacervo" id="idacervo" type="hidden"/>Clique em "Procurar Acervo" e selecione o mesmo</span>&nbsp&nbsp
                                        <label id="titulo_titulo"></label><span id="value_titulo"></span>&nbsp&nbsp
                                        <br><label id="tipo_titulo"></label><span id="value_tipo"></span>&nbsp&nbsp
                                        <label id="editora_titulo"></label><span id="value_editora"></span>&nbsp&nbsp
                                        <label id="ano_publicacao_titulo"></label><span id="value_ano_publicacao"></span>&nbsp&nbsp
                                        <br><label id="isbn_titulo"></label><span id="value_isbn"></span>&nbsp&nbsp
                                        <label id="status_2_titulo"></label><span id="value_status_2"></span>&nbsp&nbsp
                                    </div>
                                </div>
                                
                                <div id="CadastrarAcervo">
                                <form role="form" method="post" action="acervo_controller/CadastrarAcervo" name="cadastrar_acervo">
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                             <label>Titulo</label>
                                         </div>
                                         <div class="col-xs-6">
                                             <label>Tipo</label>
                                         </div>
                                     </div>
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                             <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Infome o titulo"> 
                                         </div>
                                        <div class="col-xs-6">
                                             <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Informe o tipo de material a ser cadastrado">
                                         </div>
                                     </div>
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                             <br>   <label>Local</label>
                                         </div>
                                         <div class="col-xs-6">
                                             <br>  <label>Editora</label>
                                         </div>
                                     </div>
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                              <input type="text" class="form-control" id="local" name="local" placeholder="Infome o local"> 
                                         </div>
                                        <div class="col-xs-6">
                                             <input type="text" class="form-control" id="editora" name="editora" placeholder="Informe a editora">
                                         </div>
                                     </div>
                                   <div class="col-xs-12">
                                         <div class="col-xs-6">
                                           <br>   <label>Ano de publicação</label>
                                         </div>
                                         <div class="col-xs-6">
                                          <br>    <label>Tema</label>
                                         </div>
                                     </div>    <br><br><br><br>
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                               <input type="text" class="form-control" id="anopublicacao" name="anopublicacao" placeholder="Infome o tipo da aquisição"> 
                                         </div>
                                     <div class="col-xs-6">
                                             <input type="text" class="form-control" id="tema" name="tema" placeholder="Informe o total de exemplares">
                                         </div>
                                     </div>
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                         <br>      <label>Resumo das informações</label>
                                         </div>
                                         <div class="col-xs-6">
                                            <br>   <label>ISBN</label>
                                         </div>
                                     </div>
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                             <input type="text" class="form-control" id="resumo" name="resumo" placeholder="Infome o Resumo das informações"> 
                                         </div>
                                     <div class="col-xs-6">
                                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Informe o ISBN">
                                         </div>
                                     </div>
                                     <!-- Fim do  Codigo e data de aquisição-->
                                    <br><br><br><br>  <div class="col-xs-12">
                                         <div class="col-xs-6">
                                           <br>  <label>Idioma</label>
                                         </div>
                                         <div class="col-xs-6">
                                          <br>  <label>Número de páginas</label>
                                         </div>
                                     </div>
                                     <div class="col-xs-12">
                                         <div class="col-xs-6">
                                         <input type="text" class="form-control" id="idioma" name="idioma" placeholder="Infome o idioma"> 
                                         </div>
                                     <div class="col-xs-6">
                                             <input type="text" class="form-control" id="numeropg" name="numeropg" placeholder="Informe o número de páginas">
                                         </div>
                                     </div>
                                         <div class="col-xs-12">
                                             <div class="col-xs-6">
                                           <br><label>Status</label>
                                             </div>
                                         </div>
                                         <div class="col-xs-12">
                                             <div class="col-xs-6">
                                            <input type="text" class="form-control" id="status" name="status" placeholder="Infome o status"> 
                                             </div>
                                         </div>
										 <center>   
    
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btCadastrarMaterial">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Material
         </button>   
    </div>
</center>
                                         
                                 </form>
                                 </div>
                                  <h4>Selecione Autor</h4>
                            <hr/>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                      <select id="autor" name="autor" class="form-control">
                                      </select>
                                    </div>  
                                </div>
                          
                            <hr/>
                            <div class="col-xs-12">
                                <br><hr/><div class="col-xs-6">
                                    <label>Principal</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="principal" name="principal" placeholder="Infome "> 
                                </div>
                            </div>
                           
                            
							<center>   
    
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarAutoresAcervo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Autores Acervo
         </button>   
    </div>
</center>
							
                           
                        <br/><br/>
                    </form>
                </div>
            </div>
        </div>
    

<!-- /.container-fluid -->


    <div class="col-md-12 column">
        <div class="modal fade" id="excluirAutoresAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Autores Acervo
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="acervoex" name="acervoex" />
                                 <input type="hidden" id="autorex" name="autorex" />
                                 Tem certeza que deseja excluir o Autor deste Acervo? <b><span id="spanDadosAutoresAcervo"></span></b>
                             </div>
                             <div class="modal-footer">
							 <center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAutoresExcluirAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar 
		</button>   
    </div> 
  
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btExcluirAutoresAcervo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Excluir
         </button>   
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
        <div class="modal fade" id="alterarAutoresAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                            Alterar Dados do Autores Acervo
                        </h4>
                    </div>
    <div class="modal-body">
        <form method="post" action="<?php echo base_url('autores_acervo_controller/alterar_autores_acervo') ?>" class="formAtualizarAutoresAcervo">
                   
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label> Acervo</label>
                </div>
                <input type="hidden" id="edmaterial" name="edmaterial" />
                <div class="col-xs-2" id="valuematerial" name="valuematerial"> </div>       
            </div>
            
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label> Autor </label>
                </div>
                    
                 <input type="hidden" id="edautor" name="edautor" />
                 <div class="col-xs-2" id="valueautor" name="valueautor"> </div>  
            </div>
        <br><br><div class="col-xs-12">
            <div class="col-xs-6">
                <label>Principal</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <input type="text" class="form-control" id="edprincipal" name="principal" placeholder="Infome"> 
            </div>
        </div>
        <br/><br/><br/><br/>
        </form>
   
    <div class="modal-footer">
	<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarAutoresAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarAutoresAcervo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Alterações
         </button>   
    </div>
</center>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btFecharAlterarAutoresAcervo">Cancelar</button> 
        <input type="button" id="btAlterarAutoresAcervo" class="btn btn-primary" value="Salvar Alterações" />
    </div>
 </div>
            </div>
        </div>
    </div>
    </div>
         
         
         
    <!-- Pesquisar Material !-->    
    <div class="col-md-12 column">
        <div class="modal large-12" id="PesquisarAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                           Seleção Material
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="tab-pane active" id="panel-168546">
                            
                                <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <label>Pesquisa por</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <label>Chave de Busca</label>
                                            </div>
                                        </div>
                                </div>
                            <br><div class="col-xs-12">                          
                                    <div class="col-xs-4">                          
                                        <select  class="form-control" id="tipo_pesquisa" >
                                            <option value="titulo">Título</option>
                                            <option value="autor"> Autor</option>
                                            <option value="editora"> Editora</option>
                                        </select>    
                                    </div>
                                    <div class="col-xs-8">                          
                                        <input type="text" class="form-control" id="chave" >
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">                          
                                    <div class="col-xs-12">
                                        <br><div class="col-xs-6">
                                            <button id="btPesquisarMaterialTipo" class=" btn btn-primary"><i class="fa fa-search"></i> Pesquisar Material</button>
                                        </div><br><br>
                                    </div>  
                                </div>
                           
                            <br><br> <table id="tblAcervo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                                 <br><thead>
                                                     <tr>
                                                     <th>Id</th>
                                                     <th>Titulo</th>                                            
                                                     <th>Tipo</th>                                            
                                                     <th>Editora </th>                                            
                                                     <th>Ano de publicação</th>                                            
                                                     <th>ISBN</th>
                                                     <th>Status</th>
                                                     <th>Ação</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody></tbody>
                                         </table>
                        </div><br><br>
                    <div class="modal-footer">
					<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btCancelarPesquisarAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="btfecharPesquisarAcervo">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Fechar
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btCadastrarAcervo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Não Encontrado - - Cadastrar Novo Acervo
         </button>   
    </div>
</center>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 </div>
            

<script src="<?php echo base_url(); ?>utils/js/ajax/autores_acervo.js"></script>

