<div id="page-wrapper">
    <div class="container-fluid"> 
    <div class="row">
        <div class="col-lg-12">
            <div id="loading" style="display: none;">
    <img id="imagemLoader" alt="Processando" src="utils/img/carregando.gif" style="
    width: 700px;
    height: 700px;
    margin-top: 10px; ">
    </div>  
            <div id="sucesso">  
            <div class="modal-content alert-success">
                <div class="modal-header alert-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title ">Sucesso</h4>
                </div>
                <div class="modal-body">
                    <p id="msg_acerto">Solicitação alterada  com sucesso</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id='btn-sucesso-fechar' class="btn btn-default" data-dismiss="modal" >Fechar</button>
                </div>
            </div>
        </div>
        <div id="erro">
            <div class="modal-content alert-danger">
                <div class="modal-header alert-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title ">Falha</h4>
                </div>
                <div class="modal-body">
                    <p id="msg_erro">Falha ao alterar solicitação</p>
                </div>
                <div class="modal-footer">
                     <button type="button" id='btn-erro-fechar' class="btn btn-default" data-dismiss="modal" >Fechar</button>
                </div>
            </div>
        </div>
    </div>
                
        <div class="col-lg-12">
            <h1 class="page-header">
                ANÁLISE DE LOGS
            </h1>
        </div>
        <div class="col-md-12 column">
            
            
            <div class="col-xs-12">
                            <div class="col-xs-3">
                                <label> Tabela </label>
                            </div>
                            <div class="col-xs-3">
                                <label> ID de Registro </label>
                            </div>
                            <div class="col-xs-2">
                                <label> Data Inicial </label>
                            </div>
                            <div class="col-xs-2">
                                <label> Data Final </label>
                            </div>
                            <div class="col-xs-2">
                                
                            </div>
            </div>
            <div class="col-xs-12">
            <div class="col-xs-3">
                                <select class="form-control" id='tabela' name="tabela">
                                    <option value="">Todas</option>
                                    <option value="Biblioteca">Biblioteca</option>
                                    <option value="bibliotecarios">Bibliotecários</option>
                                    <option value="usuarios">Usuários</option>
                                    <option value="login">Login</option>
                                    <option value="confiiguracoes">Configurações</option>
                                    <option value="acervo_biblioteca">Acervo da Biblioteca</option>
                                    <option value="emprestimo">Empréstimo</option>
                                    <option value="acervo">Acervo</option>
                                    <option value="leitores">Leitores</option>
                                    <option value="login_leitor">Login do leitor</option>
                                    <option value="autores_acervo">Autores do Acervo</option>
                                    <option value="autores">Autores</option>
                                    <option value="reserva">Reserva</option>
                                </select>
            </div> 
            <div class="col-xs-3">
                <input class="form-control" type="text" id='id_registro' name="id_registro"></input>
            </div>
            <div class="col-xs-2">
                <input class="form-control" type="date" id='data_inicial' name="data_inicial" value="<?php echo date("Y-m-d");?>"></input>
            </div>
            <div class="col-xs-2">
                <input class="form-control" type="date" id='data_final' name="data_final" value="<?php echo date("Y-m-d");?>"></input>
            </div>
            <div class="col-xs-2">
                <button type="button" class="btn btn-primary" id="btBuscarRegistros">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar Registros
                </button>
            </div>
            </div>    
                            <div class="col-xs-12 card-header">
                                <br />
                                <br />                                
                                <strong class="card-title"><h4>Ações Encontradas</h4></strong>
                            </div>                                
                            <hr />
                            <div class='card-body'>
                                <br /><br /><br /><br />
                                <table id="tblLogs" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tabela</th>
                                            <th>ID do registro</th>
                                            <th>Data</th>                                     
                                            <th>Hora</th>                                     
                                            <th>Usuário</th>
                                            <th>Descrição</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <!--label>Legenda:</label>&nbsp;&nbsp;&nbsp;<span style="color:green">Solicitações Respondidas</span>&nbsp;&nbsp;<span style="color:orange">Solicitações Não Respondidas</span--> 
                            </div>
                                   
                </div>
            </div>
        </div>
    </div>   
           <!-- /.container-fluid -->

<!--<script src="<?php echo base_url(); ?>utils/js/jquery.maskedinput.js"></script>-->
<!--<script src="<?php echo base_url(); ?>utils/js/jquery-3.3.1.min.js"></script>-->
<script src="<?php echo base_url(); ?>utils/js/ajax/logs.js"></script>
        <!--</div>-->
</div>
    <!-- /#page-wrapper -->
       <!-- /#wrapper --
