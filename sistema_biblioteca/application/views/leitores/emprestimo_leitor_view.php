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
        <h1 class="page-header">EMPRÉSTIMO DE MATERIAL</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas">Listagem de Empréstimos</a>
                </li>
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Todos os empréstimos realizados </h4>
                        <hr/>
                             <table id="tblEmprestimo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Material</th>                                                                                    
                                    <th>Bibliotecário</th><!--Bibliotecario = Usuário(nome)!-->                                            
                                    <th>Data Emprestimo</th>                                            
                                    <th>Hora Emprestimo</th>                                            
                                    <th>Data de Devolução</th>
                                    <th>Local</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                  
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                        <label>Legenda para empréstimos não finalizados</label>&nbsp;&nbsp;&nbsp;
                         <span style="color: green;">Em dia</span>&nbsp;&nbsp;&nbsp;
                          <span style="color: orange;"> O prazo vence hoje</span>&nbsp;&nbsp;&nbsp;
                         <span style="color: red;"> Em Atraso</span>
            </div>
            <br><br><br>
<!--            <div class="col-xs-4">
                <a href='#RenovarEmprestimoLeitor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary'><i class="fa fa-bookmark"></i> Renovar Empréstimo Leitor</a>
            </div>-->
        </div>                
    </div>
</div>   

     
     <!--Renovar Empréstimo-->
     
       <div class="col-md-12 column">
        <div class="modal fade" id="RenovarEmprestimoLeitor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                          Renovação do Empréstimo 
                        </h4>
                    </div>
    <div class="modal-body">
        <form method="post" action="<?php echo base_url('emprestimo_leitor_controller/renovar_emprestimo_leitor') ?>" class="formAtualizarEmprestimo">
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label>ID Empréstimo</label>
                </div>
                <div class="col-xs-6">
                    <label>Material</label>
                </div>
                <div class="col-xs-4">
                    <label>Leitor</label>
                </div>
            </div>
            
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <input type="hidden"class="form-control" id="edidemprestimo" name="edidemprestimo">
                    <span id="valueid"></span>
                </div>
                <div class="col-xs-6">
                    <input type="hidden" class="form-control" id="edmaterial" name="edmaterial">
                    <span id="valuematerial"></span>
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
                    <label>Hora Empréstimo</label>
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
                    <input type="date" id="eddata_emprestimo" name="eddata_emprpestimo"  class="form-control" disabled>
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
                <br> <div class="col-xs-3">
                    <label>Nova data de Devolução</label>
                </div>
                <div class="col-xs-3">
                    <label>Hora da Renovação</label>
                </div>
                <div class="col-xs-3">
                    <label>Status</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <input type="date" id="next_date" name="next_date" class="form-control disa" disabled>
                </div>
                <div class="col-xs-3">
                    <input type="time" id="hora_renovacao" name="data_renovacao" class="form-control"  value="<?php echo date("H:i"); ?>"disabled>
                </div>
                 <div class="col-xs-3">
                    <select class="form-control" id="edstatus" disabled>
                        <option value="0">Não Finalizado</option>
                        <option value="1">Finalizado</option>
                    </select>
                </div>
                <div class="col-xs-3">
                    <input type="hidden" id="data_renovacao" name="data_renovacao" class="form-control" disabled>
                </div>
                
            </div>
            <div class="col-xs-12">
                <br><p>A renovação do empréstimo é permitida uma vez</p>
            </div>
        </form>
   
        <br><br><br><br><br><br><br><br><br><br><div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btFecharAlterarEmprestimo">Cancelar</button> 
        <input type="button" id="btAlterarEmprestimo" class="btn btn-primary" value="Efetivar Renovação" />
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
     
     
    </div>
</div>
<script src="<?php echo base_url(); ?>utils/js/ajax/emprestimo_leitor.js"></script>

