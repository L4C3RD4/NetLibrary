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
        <h1 class="page-header">MINHAS RESERVAS</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas">Listagem de Reservas</a>
                </li>
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Todas as Reservas</h4>
                        <hr/>
                             <table id="tblReservas_leitor" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Nome</th>                                                                                    
                                    <th>Título</th><!--Bibliotecario = Usuário(nome)!-->                                            
                                    <th>Biblioteca</th>                                            
                                    <th>Data Solicitação</th>                                            
                                    <th>Data Limite</th>
                                    </tr>
                                </thead>
                                
                                <tbody></tbody>
                        </table>
                          <label>Legenda</label>&nbsp;&nbsp;&nbsp;
                         <span style="color: green;">Em dia</span>&nbsp;&nbsp;&nbsp;
                          <span style="color: orange;"> O prazo vence hoje</span>&nbsp;&nbsp;&nbsp;
                         <span style="color: red;"> Em Atraso</span>&nbsp;&nbsp;&nbsp;
                         <!--<span style="color: black;">Emprestado</span>-->
<!--                        <label>Legenda para empréstimos não finalizados</label>&nbsp;&nbsp;&nbsp;
                         <span style="color: green;">Em dia</span>&nbsp;&nbsp;&nbsp;
                          <span style="color: orange;"> O prazo vence hoje</span>&nbsp;&nbsp;&nbsp;
                         <span style="color: red;"> Em Atraso</span>-->
                </div>
        </div>                
    </div>
</div>   

    </div>
</div>
<script src="<?php echo base_url(); ?>utils/js/ajax/reservas_leitor.js"></script>

