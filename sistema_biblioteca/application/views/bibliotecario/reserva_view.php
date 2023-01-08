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
    <!--Nome Principal da Página!-->
    <div class="col-lg-12">
        <h1 class="page-header">RESERVA DE MATERIAL</h1>    
    </div>
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
               <h4>Todos as solicitações de reserva </h4>
                        <hr/>
                      
                    <table id="tblReservas" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Acervo</th>                                                                                    
                                    <th>Leitor</th>                                            
                                    <th>Data Solicitação</th>                                            
                                    <th>Data Vencimento</th>                                            
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
            </div>
            <label>Legenda</label>&nbsp;&nbsp;&nbsp;
                <span style="color: green;">Em dia</span>&nbsp;&nbsp;&nbsp;
                 <span style="color: orange;"> O prazo vence hoje</span>&nbsp;&nbsp;&nbsp;
                <span style="color: red;"> Em Atraso</span>&nbsp;&nbsp;&nbsp;
                <input type="hidden" id="idacervo_biblioteca_ex">
                <input type="hidden" id="biblioteca_ex">
            <br><br
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <a class="btn btn-danger" href="#ExcluirReservas" data-toggle='modal' id='modal-30777' role='button' ><i class="glyphicon glyphicon-trash"></i>  Excluir todos as reservas atrasadas</a>
                </div>
            </div>

<!-- /.container-fluid -->


    <div class="col-md-12 column">
        <div class="modal fade" id="CadastarEmprestimo_reservas" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                    <?php
                                        $session_data = $this->session->userdata('logged_in');
                                        
                                    ?>
                                     Realizar empréstimo
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <!--<p>Deseja realizar este empréstimo ? <label id="value_dados_reserva"></label></p>-->
                                   <input type="hidden" id="usuario" value="<?php echo $session_data['idusuario']; ?>">
                                    <input type="hidden" id="material">
                                    <input type="hidden" id="leitor">
                                    <input type="hidden" id="idreservaex">
                                     <input type="hidden" id="idemprestimo">
                                           
                                 <div class="col-xs-12">
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
                                           <span id="span_id"></span>
                                     </div>
                                     <div class="col-xs-4">
                                           <span id="span_material"></span>
                                     </div>
                                     <div class="col-xs-4">
                                          <span id="span_leitor"></span>
                                     </div>
                               
                                 </div>
                                     <br><br><br><div class="col-xs-12">
                                    <div class="col-xs-4">
                                        <label>Data do Empréstimo</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>Data da Devolução</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                   <div class="col-xs-4">
                                        <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" value="<?php echo date("Y-m-d", strtotime("+ 2 day")); ?>" >
                                    </div>
                                </div>
                                <br><br><div class="col-xs-12">
                                    <br><div class="col-xs-6">
                                        <span>Observação: Esta Reserva está</span>
                                        <label id="label_status_reserva"></label>
                                    </div>
                                </div>
                                <!--<label id="perfil_titulo"></label>--> 
                                 <input type="hidden" class="form-control" id="hora_emprestimo" name="hora_emprestimo" value="<?php echo date("H:i"); ?>" >
                                <input type="hidden" class="form-control" id="hora_devolucao" name="hora_devolucao">
                                <input type="hidden" class="form-control" id="status" name="status">
                             </div>
                             
                             <br><br><br><div class="modal-footer">
							 
							 <center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharConfirmarEmprestimo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar  
		</button>   
    </div> 
    
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btRealizarEmprestimo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Realizar Empréstimo
         </button>   
    </div>
</center>
							 
							 
							 
                                 </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>

    <div class="col-md-12 column">
        <div class="modal fade" id="ExcluirReservas" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog bg-danger">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header bg-danger">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Todas As Reservas
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <p><center>Tem certeza que deseja excluir todas as reservas atrasadas?</center></p>
                                <br><div class="modal-footer">
								
								
<div class="col-xs-12">   								<center>   
    <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirTodas" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
   
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirTodasAsReservas">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Excluir Reservas
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
</div>
   <div class="col-md-12 column">
        <div class="modal fade" id="excluirLeitor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Reserva
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idreservaex" name="idreservaex" />
                                 <div class="col-xs-12">
                                     <div class="col-xs-6">
                                         <strong>Tem certeza que deseja excluir essa Reserva?</strong>
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
                                           <span id="span_id_ex"></span>
                                     </div>
                                     <div class="col-xs-4">
                                           <span id="span_material_ex"></span>
                                     </div>
                                     <div class="col-xs-4">
                                          <span id="span_leitor_ex"></span>
                                     </div>
                               
                                 </div>
                                     <br><br><br><div class="col-xs-12">
                                    <div class="col-xs-4">
                                        <label>Data do Empréstimo</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <label>Data da Devolução</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                   <div class="col-xs-4">
                                        <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" value="<?php echo date("Y-m-d", strtotime("+ 2 day")); ?>" >
                                    </div>
                                </div>
                                <br><br><div class="col-xs-12">
                                    <br><div class="col-xs-6">
                                        <span>Observação: Esta Reserva está</span>
                                        <label id="label_status_reserva_ex"></label>
                                    </div>
                                </div>
                             </div>
                             <br><br><br><div class="modal-footer">
							 
							 <center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirReserva" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar  
		</button>   
    </div> 
   
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btExcluirReserva">
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
</div>
</div> 
</div>
</div>

<script src="<?php echo base_url(); ?>utils/js/ajax/reserva.js"></script>

