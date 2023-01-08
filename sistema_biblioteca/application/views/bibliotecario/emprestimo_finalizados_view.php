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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
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
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas"> Histórico de Empréstimos</a>
                </li>
<!--                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_emprestimos">Realizar Empréstimos</a>
                </li>                            -->
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
                        <label>Sitauação</label>
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
                            <option value="entregues">Entregues</option>
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
                                    <th>Data Devolução</th>
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
            </div>
        </div>

</div> 
</div>

<script src="<?php echo base_url(); ?>utils/js/ajax/emprestimo_finalizados.js"></script>

