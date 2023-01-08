<div id="page-wrapper">
  <div class="container-fluid">

        <!-- Page Heading -->
         <div id="loading" style="display: none;">
        
        <!--<p id="fraseLoader">Processando, aguarde...</p>-->
        </div>
        
       <div class="row">
            <div class="col-lg-12">
                <div id="sucesso">  
                    <div class="modal-content alert-success">
                        <div class="modal-header alert-success">
                            <button type="button" class="close fechar" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title ">Sucesso</h4>
                        </div>
                        <div class="modal-body">
                            <p id="msg_acerto">Bibliotecário Excluido com Sucesso!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="fechar" data-dismiss="modal" >Fechar</button>
                        </div>
                    </div>
                </div>



                <div id="erro">
                    <div class="modal-content alert-danger">
                        <div class="modal-header alert-danger">
                            <button type="button" class=" btn btn-default close fechar" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title ">Falha</h4>
                        </div>
                        <div class="modal-body">
                            <p id="msg_erro">Falha ao excluir o Bibliotecário!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                        </div>
                    </div>
                </div>

			

                    </div>   

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ATRIBUIÇÃO DE PROFISSIONAIS AS BIBLIOTECAS <small></small>
                        </h1>
                        <!--
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>-->
                    </div>
                <!--</div>-->
                <!-- /.row -->
                <div class="col-md-12 column">
                    <div class="tabbable" id="tabs-442075">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecarios">Listagem de Profissionais Atribuídos</a>
                            </li>
                            <li>
                                <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_bibliotecarios">Atribuir Novo Profissional</a>
                            </li>                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel-168546">
                                <br />
                                <h4> Todos os profissionais cadastrados </h4>
                                <hr />
                                <table id="tblbibliotecarios" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Funcionário</th>
                                            <th>Biblioteca</th>
                                            <th>Data de Início</th>
                                            <th>Horário de Trabalho</th>
                                            <th>Data de Término</th>                                            
                                            <th>Ação</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <b>Legenda:</b> &nbsp&nbsp<span style="color:green;">Profissionais em Trabalho&nbsp&nbsp</span> <span style="color:red;">&nbsp&nbspAtribuição já Finalizada</span>
                            </div>
                            <div class="tab-pane" id="panel-190060">
                                
                                    <form id="atribui_profissional">
                                    <br />
                                    <h4> Nova Atribuição de Profissional</h4>
                                    <br />
                                    <div class="col-xs-12">
                                        <div class="col-xs-3">
                                            <label>Selecione Biblioteca:</label>
                                        </div>
                                        <div class="col-xs-6">
                                            <select id="biblioteca" name="biblioteca" class="form-control"></select>
                                        </div>     
                                    </div>     
                                    <div class="col-xs-12">
                                        <br/>
                                        <div class="col-xs-3">
                                            <label>Selecione o Profissional</label>
                                        </div>
                                        <div class="col-xs-6">
                                            <select id="profissional" name="profissional" class="form-control"></select>
                                        </div>     
                                    </div>     
                                    <div class="col-xs-12">
                                        <br/>
                                        <div class="col-xs-3">
                                            <label>Data de Início</label>
                                        </div>
                                        <div class="col-xs-3">
                                            <label>Horário de Trabalho</label>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Observações</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-3">
                                            <input type="date" id="data_inicio" name="data_inicio" value="<?php echo date("Y-m-d"); ?>"  class="form-control">
                                        </div>     
                                        <div class="col-xs-3">
                                            <input type="text" id="horario_trabalho" name="horario_trabalho" placeholder="Informe o horário de trabalho" class="form-control">
                                        </div>     
                                        <div class="col-xs-6">
                                            <input type="text" id="observacoes" name="observacoes" placeholder="Informe alguma observação caso haja" class="form-control">
                                        </div>     
                                    </div> 
                                          <br><br><br>
							   
    
<center>   
    <div class="col-xs-12">
        <br/><br/>
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="CancelarAtribuicao" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Atribuição  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarBibliotecario">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Atribuir no Profissional
         </button>   
    </div>
    </div>
</center>							
							
                        <br/><br/>
                    </form>
</div>
            
        
               <div class="col-md-12 column">
                <div class="modal fade" id="excluirBibliotecario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" action="<?php echo base_url('bibliotecario_controller/excluirbibliotecario') ?>" >
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Excluir Atribuição
                                    </h4>
                                </div>
                                <div class="modal-body excluir">
                                    <input type="hidden" id="idbibliotecarioex" name="idbibliotecarioex" />
                                    Tem certeza que deseja excluir essa atribuição? <b><span id="spanNomeBib"></span></b>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-xs-12">								
								<center>   
    <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirBibliotecario" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirBibliotecario">
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
                <div class="modal fade" id="alterarBibliotecario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    Alterar Dados da Atribuição
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('bibliotecario_controller/alterarBibliotecario') ?>" class="formCadastrarCliente">
<!--                                    <input type="hidden" name="instituicao" id="edinstituicao" value="<?php
                                      //     $session_data = $this->session->userdata('logged_in');
                                       //    echo $session_data["instituicao"];
                                           ?>"/>								-->
                                    <!--Código do Cliente -->
                                    								

                                    <div class="col-xs-12">
                                        <br/>
                                        <div class="col-xs-2">
                                            <label>Id</label>
                                        </div>
                                        <div class="col-xs-5">
                                            <label>Biblioteca</label>
                                        </div>
                                        <div class="col-xs-5">
                                            <label>Profissional</label>
                                        </div>                                        
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-2">
                                            <input type="hidden" id="edidbibliotecario" name="edidbibliotecario">
                                            <span id="spedidbibliotecario" name="spedidbibliotecario"></span>
                                        </div>     
                                        <div class="col-xs-5">
                                            <input type="hidden" id="edbiblioteca" name="edbiblioteca">
                                            <span id="spedbiblioteca" name="spedbiblioteca"></span>
                                        </div>     
                                        <div class="col-xs-5">
                                            <input type="hidden" id="edprofissional" name="edprofissional">
                                            <span id="spedprofissional" name="spedprofissional"></span>
                                        </div>                                             
                                    </div>
                                    <div class="col-xs-12">
                                        <br/>
                                        <div class="col-xs-3">
                                            <label>Data de Início</label>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Horário de Trabalho</label>
                                        </div>
                                        <div class="col-xs-3">
                                            <label>Data de Término</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-3">
                                            <input type="date" id="eddata_inicio" name="eddata_inicio" class="form-control">
                                        </div>     
                                        <div class="col-xs-6">
                                            <input type="text" id="edhorario_trabalho" name="edhorario_trabalho" placeholder="Informe o horário de trabalho" class="form-control">
                                        </div>     
                                        <div class="col-xs-3">
                                            <input type="date" id="eddata_termino" name="eddata_termino" class="form-control">
                                        </div>     
                                    </div>
                                    <div class="col-xs-12">
                                        <br/>
                                        <div class="col-xs-6">
                                            <label>Observações</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <input type="text" id="edobservacoes" name="edobservacoes" placeholder="Informe alguma observação caso haja" class="form-control">
                                        </div>     
                                    </div>
                            <br><br><br><br>   
                            <br><br><br><br>   
                            <br><br><br><br>   
                            <div class="modal-footer">                              
                                <div class="col-xs-12">                                            
        <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarBibliotecario" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDadosAlteracao">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarBibliotecario">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Alterações
         </button>   
    </div>
    </div>
                                
                            </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        
        </div>
            
        <!--</div>-->
</div>
</div>
    <!-- /#page-wrapper -->
       <!-- /#wrapper -->
<script src="<?php echo base_url(); ?>utils/js/ajax/bibliotecario.js"></script>

