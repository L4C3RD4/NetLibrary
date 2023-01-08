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
                       <p id="msg_acerto">Sucesso ao cadastrar a Configuração</p>
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
                        <p id="msg_erro">Falha ao cadastrar a Configuração!</p>
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
        <h1 class="page-header">CADASTRO DE CONFIGURAÇÕES</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas">Listagem de Configurações cadastradas</a>
                </li>
                <!--li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_bibliotecas">Cadastrar Nova Configuração</a>
                </li-->                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Todos as Configurações cadastradas </h4>
                        <hr/>
                        
                            <table id="tblConfiguracoes" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Biblioteca</th>                                            
                                    <!--<th>Dias empres Aluno</th>-->                                            
                                    <th>Qtd Materiais Aluno</th>                                            
                                    <!--<th>Dias empres Professor</th>-->                                            
                                    <th>Qtd materiais Professor</th>  
                                    <!--<th>Dias empres Funcionário</th>-->                                            
                                    <th>Qtd Materiais Funcionário</th>                                            
                                    <!--<th>Dias empres Comunidade</th>-->                                            
                                    <th>Qtd materiais Comunidade</th>  
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
            </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                
                    <h4> Nova Configuração</h4>
                <hr/>
                 <div class="col-xs-12">
<!--                                    <div class="col-xs-6">
                                      <select id="biblioteca" name="biblioteca" class="form-control">

                                      </select>
                                    </div>                                 -->
                                    <?php
                                        $session_data = $this->session->userdata('logged_in');
                                        $biblioteca = $session_data['biblioteca'];
                                    ?>
                                </div>
                                <div class="col-xs-12">
                            <div class="col-xs-6">
                                <label>Bibliotecário</label>&nbsp<span id="bibliotecario"></span>
                            </div>
                            <div class="col-xs-6">
                                <label>Biblioteca</label>&nbsp<span id="biblioteca"></span>
                            </div>
                             
                                </div><br><br><br>
                <form role="form" method="post" action="configuracoes_controller/cadastrar_configuracao" name="cadastrar_configuracao">
                            <input type="hidden" name="idconfiguracoes" id="idconfiguracoes" value="0"/>
                            <!--Id da tabela Biblioteca-->
                            <div id="select_titulo_biblioteca">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <label>Biblioteca</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <select id="biblioteca" name="biblioteca" class="form-control">

                                        </select>
                                    </div>

                                </div>
                           </div>     
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label id="mensagem_configuracao_existente" style="text-align: center"></label>
                                </div>
                            </div>
                            <!--fim do Id da tabela biblioteca-->
                            <!-- Quantidade de Materiais e Dias de Empréstimo do Aluno-->
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Dias de Empréstimo do Aluno</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Quantidade de Materiais do Aluno</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Dias de Empréstimo do Professor</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Quantidade de Materiais do Professor</label>
                                </div>
                            </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <input type="number" class="form-control" id="dias_empres_aluno" name="dias_empres_aluno" placeholder="Infome a quantidade" min="0"> 
                                    </div>
                                <div class="col-xs-3">
                                        <input type="number" class="form-control" id="qtd_mat_aluno" name="qtd_mat_aluno" placeholder="Informe a quantidade" min="0">
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="number" class="form-control" id="dias_empres_prof" name="dias_empres_prof" placeholder="Infome a quantidade" min="0"> 
                                    </div>
                                <div class="col-xs-3">
                                    <input type="number" class="form-control" id="qtd_mat_prof" name="qtd_mat_prof" placeholder="Informe a quantidade" min="0">
                                </div>
                            </div>
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Dias de Empréstimo do Funcionário</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Quantidade de Materiais do Funcionário</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Dias de Empréstimo da Comunidade</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Quantidade de Materiais da Comunidade</label>
                                </div>
                            </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <input type="number" class="form-control" id="dias_empres_funcionario" name="dias_empres_funcionario" placeholder="Infome a quantidade" min="0"> 
                                    </div>
                                <div class="col-xs-3">
                                        <input type="number" class="form-control" id="qtd_mat_funcionario" name="qtd_mat_funcionario" placeholder="Informe a quantidade" min="0">
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="number" class="form-control" id="dias_empres_comunidade" name="dias_empres_comunidade" placeholder="Infome a quantidade" min="0"> 
                                    </div>
                                <div class="col-xs-3">
                                    <input type="number" class="form-control" id="qtd_mat_comunidade" name="qtd_mat_comunidade" placeholder="Informe a quantidade" min="0">
                                </div>
                            </div>
                      
                            <br><br><br><br><br>
							
							<center>   
     
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarConfiguracao">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Configuração
         </button>   
    </div>
</center>
							
							
                        <br/><br/>
                    </form>
                </div>                       
            </div>
        </div>                
    </div>
</div>   
<!-- /.container-fluid -->
    <div class="col-md-12 column">
        <div class="modal fade" id="excluirConfiguracao" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header bg-danger">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Configuração
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idconfiguracoesex" name="idconfiguracoesex" />
                                 Tem certeza que deseja excluir essa Configuração? <b><span id="spanDadosConfgiuracao"></span></b>
                             </div>
                             <div class="modal-footer">
                                 
                                 <div class="col-xs-12">								
								<center>   
    <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirConfiguracao" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirConfiguracao">
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
         <!--Alterar Dados da Configuração!-->
    <div class="col-md-12 column">
	<form>
        <div class="modal fade" id="alterarConfiguracao" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                            Alterar Dados da Configuração
                        </h4>
                    </div>
    <div class="modal-body">
        <form method="post" action="<?php echo base_url('configuracoes_controller/alterar_configuracao') ?>" class="formAtualizarConfiguracao">
    <!--Id da tabela Biblioteca-->
        <div class="col-xs-12">
            <div class="col-xs-6">
                <label>Biblioteca</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <span id="dados-biblioteca" name="dados-biblioteca"></span>
                <input type="hidden"  id="edidconfiguracoes" name="idconfiguracoes"></span>
            </div>
        </div>
        <!--fim do Id da tabela biblioteca-->
        <!-- Quantidade de Materiais e Dias de Empréstimo do Aluno-->
        <br><br><br><br><div class="col-xs-12">
            <div class="col-xs-3">
                <label>Dias de Empréstimo do Aluno</label>
            </div>
            <div class="col-xs-3">
                <label>Quantidade de Materiais do Aluno</label>
            </div>
             <div class="col-xs-3">
                <label>Dias de Empréstimo do Professor</label>
            </div>
            <div class="col-xs-3">
                <label>Quantidade de Materiais do Professor</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-3">
                <input type="number" class="form-control" id="eddias_empres_aluno" name="dias_empres_aluno" placeholder="Infome a quantidade" min="0"> 
            </div>
        <div class="col-xs-3">
                <input type="number" class="form-control" id="edqtd_mat_aluno" name="qtd_mat_aluno" placeholder="Informe a quantidade" min="0">
            </div>
            <div class="col-xs-3">
                <input type="number" class="form-control" id="eddias_empres_prof" name="dias_empres_prof" placeholder="Infome a quantidade" min="0"> 
            </div>
        <div class="col-xs-3">
                <input type="number" class="form-control" id="edqtd_mat_prof" name="qtd_mat_prof" placeholder="Informe a quantidade" min="0">
            </div>
        </div>
        <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Dias de Empréstimo do Funcionário</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Quantidade de Materiais do Funcionário</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Dias de Empréstimo da Comunidade</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Quantidade de Materiais da Comunidade</label>
                                </div>
                            </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <input type="number" class="form-control" id="eddias_empres_funcionario" name="eddias_empres_funcionario" placeholder="Infome a quantidade" min="0"> 
                                    </div>
                                <div class="col-xs-3">
                                        <input type="number" class="form-control" id="edqtd_mat_funcionario" name="edqtd_mat_funcionario" placeholder="Informe a quantidade" min="0">
                                    </div>

                                    <div class="col-xs-3">
                                        <input type="number" class="form-control" id="eddias_empres_comunidade" name="eddias_empres_comunidade" placeholder="Infome a quantidade" min="0"> 
                                    </div>
                                <div class="col-xs-3">
                                    <input type="number" class="form-control" id="edqtd_mat_comunidade" name="edqtd_mat_comunidade" placeholder="Informe a quantidade" min="0">
                                </div>
                            </div>
                      
        <div class="col-xs-12">
           
        </div>
        <div class="col-xs-12">
            
        </div>

        <br/><br/><br/><br/>
        </form>
    </div>
    <div class="modal-footer">
	
	
	<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarConfiguracao" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarConfiguracao">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Alterações
         </button>   
    </div>
</center>
	  </div>
</form>
            </div>
        </div>
    </div>

<script src="<?php echo base_url(); ?>utils/js/ajax/configuracoes.js"></script>

