<div id="page-wrapper">      
    <div class="container-fluid">
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
                        <p id="msg_erro_atraso"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
<!--            <div id="erro_atraso">
                    <div class="modal-content alert-danger">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Falha</h4>
                     </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>   
    <!-- Modal -->
    <!--Nome Principal da PÃ¡gina!-->
    <div class="col-lg-12">
        <h1 class="page-header">EMPRÉSTIMO DE LIVROS</h1>
    </div>
      <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas">Listagem de Empréstimos</a>
                </li>
                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_emprestimos">Realizar Empréstimos</a>
                </li>                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                <hr/>
                <!--<div class="col-xs-12">
                    <div class="col-xs-6">
                        <a href='#PesquisarEmprestimo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'><i class="fa fa-search"></i> Pesquisar EmprÃ©stimo</a>
                    </div>
                      <br><div class="col-xs-6">
                          <p>Clique no botÃ£o ao lado para pesquisar os emprÃ©stimos da biblioteca </p>
                      </div>
                </div>-->
                <div class="col-xs-12">
                    <div class="col-xs-4">
                        <label>Perfil do Leitor</label>
                    </div>
                    <div class="col-xs-4">
                        <label>Material</label>
                    </div>
                    <div class="col-xs-4">
                        <label>Situação</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4">
                        <select class="form-control filtro" id="chave_emprestimo_leitor">
                            <option value="">Todos </option>
                            <option value="Aluno">Aluno</option><!--Aluno virou LEITOR!-->
                            <option value="Comunidade">Comunidade</option>
                            <option value="Professor">Professor</option>
                            <option value="Funcionario">Funcionário</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <select class="form-control filtro" id="chave_emprestimo_material"> 
                            <option value="">Todos</option>
                            <option value="dvd">DVD</option>
                            <option value="livro">livro</option>
                            <option value="revista">revista</option>
                            <option value="cd">CD</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <select class="form-control filtro" id="chave_emprestimo_situacao">
                            <option value="prazo_limite">Prazo Limite</option>
                             <option value="em_dia">Em dia</option>
                            <option value="atrasado">Atrasado</option>
                            <option value="entregues">Entregues</option>
                            <option value="">Todas</option>
                        </select>
                    </div>
                </div>
                <div id="listar_emprestimos"><br><br><br><br><h4>Todos os emprestimos realizados </h4>
                        <hr/>
                      
                    <table id="tblEmprestimo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Material</th>                                                                                    
                                    <th>Bibliotecário</th><!--Bibliotecario = UsuÃ¡rio(nome)!-->                                            
                                    <th>leitor</th>                                            
                                    <th>Data Emprestimo</th>                                            
                                    <th>Hora Emprestimo</th>                                            
                                    <th>Data Limite de Devolução</th>
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                         <label>Legenda</label>&nbsp;&nbsp;&nbsp;
                         <span style="color: green;">Em dia</span>&nbsp;&nbsp;&nbsp;
                          <span style="color: orange;"> O prazo vence hoje</span>&nbsp;&nbsp;&nbsp;
                         <span style="color: red;"> Em Atraso</span>&nbsp;&nbsp;&nbsp;
                         <span style="color: black;">Entregue</span>
                         
                        
            </div>
                </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                 
                <form role="form" method="post" action="emprestimo_controller/cadastrar_emprestimo" name="cadastrar_emprestimo" id="cadastrar_emprestimo" >
                    <input type="hidden" name="idacervo" id="idacervo" value="0"/>
                    <input id="usuario" name="usuario" type="hidden">    
                    <h4>Bibliotecário</h4>
                        <hr/>                        
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <label>Bibliotecário</label>
                            </div>
                            <div class="col-xs-3">
                                <label>Biblioteca</label>
                            </div> 
                            <div class="col-xs-3">
                                 <label>Data do Empréstimo</label>
                            </div>
                            <div class="col-xs-3">
                                <label>Data da Devolução</label>
                            </div>
                        </div>
                <br><br><div class="col-xs-12">
                            <div class="col-xs-3">
                                <span id="bibliotecario"></span>
                                <!--<input id="bibliotecario_emprestimo">-->
                            </div>
                            <div class="col-xs-3">
                                <span id="biblioteca"></span>
                            </div>
                            <div class="col-xs-3">
                                <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="col-xs-3">
                                <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" >
                            </div>
                        </div>
                              <input type="hidden" class="form-control" id="status" name="status">
                              
                               <input type="hidden" class="form-control" id="hora_devolucao" name="hora_devolucao">
                                <input type="hidden" class="form-control" id="hora_emprestimo" name="hora_emprestimo" value="<?php echo date("H:i"); ?>" >
                             <!--ConfiguraÃ§Ãµes-->
                    <?php
                            $session_data = $this->session->userdata('logged_in');                                    
                    ?>
                               <input type="hidden" id="dias_empres_aluno" name="dias_empres_aluno" value="<?php echo $session_data['dias_empres_aluno']; ?>">
                               <input type="hidden" id="dias_empres_prof" name="dias_empres_prof" value="<?php echo $session_data['dias_empres_prof']; ?>">
                               <input type="hidden" id="qtd_mat_aluno" name="qtd_mat_aluno" value="<?php echo $session_data['qtd_mat_aluno']; ?>">
                               <input type="hidden" id="qtd_mat_prof" name="qtd_mat_prof" value="<?php echo $session_data['qtd_mat_prof']; ?>">
                               <input type="hidden" id="dias_empres_funcionario" name="dias_empres_funcionario" value="<?php echo $session_data['dias_empres_funcionario']; ?>">
                               <input type="hidden" id="dias_empres_comunidade" name="dias_empres_comunidade" value="<?php echo $session_data['dias_empres_comunidade']; ?>">
                               <input type="hidden" id="qtd_mat_funcionario" name="qtd_mat_funcionario" value="<?php echo $session_data['qtd_mat_funcionario']; ?>">
                               <input type="hidden" id="qtd_mat_comunidade" name="qtd_mat_comunidade" value="<?php echo $session_data['qtd_mat_comunidade']; ?>">
                   
                        
                        <br><br><br><h4>Leitor</h4>
                            <hr/>
                                <div class="col-xs-12" id="codigo_leitor">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4>Pesquisa Por</h4>
                                        </div>
                                    </div>
                            <br><div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="tipo_pes" id="tipo_pes" value="matricula" checked> Matricula
                                        </label>
                                        <label class="radio-inline">
                                                <input type="radio" name="tipo_pes" id="tipo_pes" value="id"> ID
                                        </label>
                                    </div>
                                </div>
                        <br><br><div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <input type="text" class="form-control" name="pesquisa_codigo_leitor" id="pesquisa_codigo_leitor"/>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href='#PesquisarLeitor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'><i class="fa fa-search"></i> Leitor</a>
                                    </div>
                                      <div class="col-xs-6">
                                        <input type="hidden" name="leitor" id="leitor">&nbsp&nbsp
                                        <br><label id="idleitor_titulo"></label> <span id="value_idleitor"><input name="idleitor" id="idleitor" type="hidden"/>Informe um dos campos ao lado ou clique na lupa para fazer a busca</span>&nbsp&nbsp
                                        <label id="nome_titulo"></label> <span id="value_nome"></span>&nbsp&nbsp
                                        <label id="logradouro_titulo"> </label><span id="value_logradouro"></span>&nbsp&nbsp
                                        <label id="cep_titulo"></label> <span id="value_cep"></span>&nbsp&nbsp
                                        <br><label id="matricula_titulo"></label> <span id="value_matricula"></span>&nbsp&nbsp
                                        <label id="email_titulo"></label> <span id="value_email"></span>&nbsp&nbsp
                                        <label id="perfil_titulo"></label> <span id="value_perfil"></span>&nbsp&nbsp
                                        <label id="qtd_titulo"></label> <span id="value_qtd"></span>&nbsp&nbsp
                                    </div>
                                </div>
                            </div>
                                <br/><br><br>
                                <h4>Material</h4>
                                <hr/>
                                <div class="col-xs-12" id="codigo_material">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4>Pesquisa Por</h4>
                                        </div>
                                    </div>
                            <br><br><div class="col-xs-12">
                                        <div class="col-xs-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="tipo_mat" id="tipo_mat" value="codigo" checked> Código
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tipo_mat" id="tipo_mat" value="isbn"> ISBN
                                            </label>
                                        </div>
                                    </div>
                                        <br><br><div class="col-xs-12">
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" name="pesquisa_codigo_acervo" id="pesquisa_codigo_acervo" />
                                        </div>
                                        <div class="col-xs-3">
                                            <a href='#PesquisarAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'><i class="fa fa-search"></i> Material</a>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="hidden" name="material" id="material">&nbsp&nbsp
                                            <br><label id="idacervo_titulo"> </label><span id="value_idacervo"><input name="idacervo" id="idacervo" type="hidden"/>Informe um dos campos ao lado ou clique na lupa para fazer a busca </span>&nbsp&nbsp
                                            <label id="titulo_titulo"></label> <span id="value_titulo"></span>&nbsp&nbsp
                                            <label id="tipo_titulo"></label> <span id="value_tipo"></span>&nbsp&nbsp
                                            <label id="editora_titulo"></label> <span id="value_editora"></span>&nbsp&nbsp
                                            <br><label id="ano_publicacao_titulo"></label> <span id="value_ano_publicacao"></span>&nbsp&nbsp
                                            <label id="isbn_titulo"></label> <span id="value_isbn"></span>&nbsp&nbsp
                                            <br><label id="status_2_titulo"></label> <span id="value_status_2"></span>&nbsp&nbsp
                                        </div>
                                    </div> 
                                </div>
                                
                            <hr>
							
							<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="CancelarEmprestimo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Empréstimo  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarEmprestimo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Realizar Empréstimo
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
        <div class="modal fade" id="confirmarEmprestimo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Finalizar Emprésstimo
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idemprestimoe" name="idemprestimoe" />
                                 <input type="hidden" id="hora_devolucaoe" name="hora_devolucaoe"  value="<?php echo date("H:i"); ?>"/>
                                 <input type="hidden" id="data_devolucaoe" name="data_devolucaoe"  value="<?php echo date("Y-m-d"); ?>"/>
                                 <input type="hidden" id="status_acervo_biblioteca" name="status_acervo_biblioteca"/>
                                 <input type="hidden" id="idacervo_biblioteca" name="idacervo_biblioteca"/>
                                 
                                 <div class="col-xs-12">
                                     <div class="col-xs-6">
                                         <strong>Deseja confirmar a entrega deste Material?</strong>
                                     </div>
                                 </div>            
                                 <br><br><div class="col-xs-12">
                                     <div class="col-xs-4">
                                        <label>ID da Reserva</label>
                                     </div>
                                     <div class="col-xs-4">
                                        <label>Material</label>
                                     </div>
                                     <div class="col-xs-4">
                                         <label>Leitor</label>
                                     </div>
                                 
                                </div>
                                     <br><div class="col-xs-12">
                                     <div class="col-xs-4">
                                           <span id="span_id_emprestimo_confirmar"></span>
                                     </div>
                                     <div class="col-xs-4">
                                           <span id="span_material_emprestimo_confirmar"></span>
                                     </div>
                                     <div class="col-xs-4">
                                          <span id="span_leitor_emprestimo_confirmar"></span>
                                     </div>
                               
                                 </div>
                                <br><br><div class="col-xs-12">
                                    <br><div class="col-xs-6">
                                        <span>Status do Empréstimo:</span>
                                        <label id="label_status_emprestimo_confrimar"></label>
                                    </div>
                                </div>
                             </div>
                             <br><br><div class="modal-footer">
							 
							 <center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharConfirmarEmprestimo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar  
		</button>   
    </div> 
     
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btConfirmarEmprestimo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Finalizar Empréstimo
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
        <div class="modal fade" id="alterarEmprestimo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                          Renovação do Empréstimo 
                        </h4>
                    </div>
    <div class="modal-body">
        <form method="post" action="<?php echo base_url('acervo_biblioteca_controller/alterar_acervo_biblioteca') ?>" class="formAtualizarEmprestimo">
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label>ID Empréstimo</label>
                </div>
                <div class="col-xs-4">
                    <label>Material</label>
                </div>
                <div class="col-xs-2">
                    <label>Usuário</label>
                </div>
                <div class="col-xs-2">
                    <label>Leitor</label>
                </div>
            </div>
            
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <input type="hidden"class="form-control" id="edidemprestimo" name="edidemprestimo">
                    <span id="valueid"></span>
                </div>
                <div class="col-xs-4">
                    <input type="hidden" class="form-control" id="edmaterial" name="edmaterial">
                    <span id="valuematerial"></span>
                </div>
                <div class="col-xs-2">
                    <input type="hidden" class="form-control" id="edusuario" name="edusuario">
                    <span id="valueusuario"></span>
                </div>
                <div class="col-xs-2">
                    <input type="hidden" class="form-control" id="edleitor" name="edleitor">
                    <span id="valueleitor"></span>
                </div>
            </div>
            
            <br><br><br><div class="col-xs-12">
                <div class="col-xs-3">
                    <label>Data Empréstimo</label>
                </div>
                <div class="col-xs-3">
                    <label>Hora Empréstimos</label>
                </div>
                <div class="col-xs-3">
                    <label>Data Devolução Atual</label>
                </div>
                <div class="col-xs-3">
                    <label>Hora Devolução</label>
                </div>
            </div>
            <div class="col-xs-12"> 
                <div class="col-xs-3">
                    <input type="date" id="eddata_emprestimo" name="eddata_emprpestimo" disabled class="form-control">
                </div>
                <div class="col-xs-3">
                    <input type="time" id="edhora_emprestimo" name="edhora_emprpestimo" disabled class="form-control">
                </div>
                <div class="col-xs-3">
                    <input type="date" id="eddata_devolucao" name="eddata_devolucao"  class="form-control" disabled>
                </div>
                <div class="col-xs-3">
                    <input type="time" id="edhora_devolucao" name="edhora_devolucao"  class="form-control" disabled>
                </div>
            </div>
            <div class="col-xs-12">
                <br><div class="col-xs-3">
                    <label>Status</label>
                </div>
                <div class="col-xs-3">
                    <label>Próxima Data para Entrega</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <select class="form-control" id="edstatus" disabled>
                        <option value="0">Não Finalizado</option>
                        <option value="1">Finalizado</option>
                    </select>
                </div>
                <div class="col-xs-3">
                    <input type="date" id="data_renovacao" name="data_renovacao" class="form-control">
                </div>
            </div>
        </form>
   
        <br><br><br><br><br><br><br><br><br><div class="modal-footer">
		
		<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarEmprestimo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarEmprestimo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Efetivar Renovação
         </button>   
    </div>
</center>
		
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
                                            <div class="col-xs-3">
                                                <label>Pesquisa por</label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Chave de Busca</label>
                                            </div>
                                            <div class="col-xs-3">                                                
                                            </div>
                                        </div>
                                </div>
                            <div class="col-xs-12">                          
                                    <div class="col-xs-3">                          
                                        <select  class="form-control" id="tipo_pesquisa" >
                                            <option value="titulo">TÍtulo</option>
                                            <option value="autor"> Autor</option>
                                            <option value="editora"> Editora</option>
                                        </select>    
                                    </div>
                                    <div class="col-xs-6">                          
                                        <input type="text" class="form-control" id="chave" >
                                    </div>
                                    <div class="col-xs-3">
                                        <button id="btPesquisarMaterialTipo" class=" btn btn-primary"><i class="fa fa-search"></i> Pesquisar Material</button>
                                    </div>
                                </div>
                                
                                
                            <br><br><br><br> <table id="tblAcervo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
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
		<button type="button" class="btn btn-danger " id="btfecharPesquisarAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar 
		</button>   
    </div> 
    
    

					
					
                        <a class='btn btn-success' id="BtCadastrarAcervo" href="acervo_biblioteca_controller"><i class='glyphicon glyphicon-ok'></i>Não Encontrado - Cadastrar Novo Acervo</a>
                  </center>
				  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pesquisar Leitor !-->    
    <div class="col-md-12 column">
        <div class="modal large-12" id="PesquisarLeitor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                           Seleção Leitor
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="tab-pane active" id="panel-168546">
                            <div class="col-xs-12">
                                    <div class="col-xs-12">
                                        <div class="col-xs-3">
                                            <label>Pesquisa por</label>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Chave de Busca</label>
                                        </div>
                                        <div class="col-xs-3">                                            
                                        </div>
                                    </div>
                                </div>
                            <div class="col-xs-12">                          
                                    <div class="col-xs-3">                          
                                        <select  class="form-control" id="tipo_pesquisa_leitor" >
                                            <option value="nome">Nome</option>
                                            <option value="matricula">Matricula</option>
                                            <option value="email">Email</option>
                                        </select>    
                                    </div>
                                    <div class="col-xs-6">                          
                                        <input type="text" class="form-control" id="chave_leitor" >
                                    </div>                                
                                    <div class="col-xs-3">
                                            <button id="btPesquisarLeitorTipo" class=" btn btn-primary"><i class="fa fa-search"></i> Pesquisar Leitor</button>
                                    </div>
                            </div>
                           
                            <br><br><br><br> <table id="tblLeitores" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                                 <br><thead>
                                                    <tr>
                                                    <th>Id</th>
                                                    <th>Nome completo</th>                                            
                                                    <th>logradouro</th>                                                                                     
                                                    <th>CEP</th>
                                                    <th>Matricula</th>
                                                    <th>Email</th>
                                                    <th>Perfil</th>
                                                    <th>Ação</th>
                                                    </tr>
                                                 </thead>
                                                 <tbody></tbody>
                                         </table>
                        </div><br><br>
                    <div class="modal-footer">
					
					<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btfecharPesquisarLeitor" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar  
		</button>   
    </div> 
     
    

					
					
                        <a class='btn btn-success' id="BtCadastrarLeitor" href="leitores_controller"<i class='glyphicon glyphicon-ok'></i>Não Encontrado - Cadastrar Novo Leitor</a>
                    </center>
					</div>
                    </div>
                </div>
            </div>
        </div>

    
</div></div>
</div> 
</div>

<script src="<?php echo base_url(); ?>utils/js/ajax/emprestimo.js"></script>

