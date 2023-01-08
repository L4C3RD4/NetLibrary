<div id="page-wrapper">      
    <div class="container-fluid">
    <!-- Page Heading -->
    <div id="loading" style="display: none;">
        <img id="imagemLoader" alt="Processando" src="./utils/img/carregando.gif" style="
            width: 700px;
            height: 700px;
            margin-top: 10px; ">
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
        <h1 class="page-header"> RELATÓRIO DE EMPRÉSTIMOS DE MATERIAL</h1>
    </div>
      <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_emprestimos">Listagem de Empréstimo</a>
                   
                </li>
                                           
            </ul>
                                  
             <div id="filtros_relatorio"> 
                            
                            
                            <?php
                                 $session_data = $this->session->userdata('logged_in');
                                if($session_data["perfil"] =="gestor"){?>
                            
                            <h3 class="page-header">
                                <input type="radio" name="tiporel" value="geral">Relatório Geral de Empréstimos <small></small> 
                                 </h3>
                                                       
                                <h3 class="page-header">
                                <input type="radio" name="tiporel" value="unidade" checked="checked">Por Biblioteca <small></small>
                                </h3>
                                <br/>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <select id="biblioteca" name="biblioteca" class="form-control"></select>
                                    </div>                                    
                                </div>
                            <?php } else { ?>
                         
                        <h3 class="page-header">
                            <input type="radio" name="tiporel" value="unidade" checked="checked">Por Biblioteca <small></small>
                        </h3>
                        <br/>    
                        <div class="col-xs-12">                            
                                <?php
                                   ?>
                                        <div class="col-xs-4">
                                            <!--<button type="button" class="btn btn-primary " id="btUnidade_Educacional" data-toggle="modal" data-target="#selecionarUnidade_Educacional">
                                                <span class="fa fa-building " aria-hidden="true"></span> Unidade Educacional
                                              </button>--> 
                                            <label> Biblioteca </label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="hidden" id="biblioteca" name="biblioteca" value="<?php echo $session_data["biblioteca"]; ?>">
                                            <span id="spunidade" name="spunidade" /><?php echo $session_data["biblioteca"] . " - " . $session_data["descricao"]; ?> </span>                                            
                                        </div>
                            
                            <?php } ?>
                            <br/>
        <h3 class="page-header">
                                    Período <small></small>
                            </h3>
                            <div class="col-xs-12">
                             <div class="col-xs-2">
                                <label> Data Inicial </label>
                            </div>
                            <div class="col-xs-3">
                                <?php 
                                    $data_incio = mktime(0, 0, 0, date('m') , 1 , date('Y'));
                                    $data_fim = mktime(23, 59, 59, date('m'), date("t"), date('Y'));
                                ?>
                                <input class="form-control" type="date" id='data_inicial' name="data_inicial" value="<?php echo date("Y-m-")."01"; ?>"></input>
                            </div>
                            <div class="col-xs-2">
                                <label> Data Final </label>
                            </div>
                            <div class="col-xs-3">
                                <input class="form-control" type="date" id='data_final' name="data_final" value="<?php echo date('Y-m-d',$data_fim); ?>"></input>
                            </div>    
                            </div>
        <br/>
        <h3 class="page-header">
                            <br/>
                                Perfil de Leitor  <small></small>
                                </h3>
                            <div class="col-xs-12">                                        
                                        <div class="col-xs-4">
                                            <label> Perfil </label>
                                        </div>                                        
                                <div class="col-xs-4" id="serie_label">
                                            <label> Série </label>
                                        </div>                                        
                        </div>
                            
                            <div class="col-xs-12">
                                                                                
                                        <div class="col-xs-4">
                                            <select name="perfil" id="perfil" class="form-control">  
                                                <option value="todos"> Todos </option>
                                                <option value="aluno"> Alunos </option>
                                                <option value="comunidade"> Comunidade </option>
                                                <option value="funcionario"> Funcionários </option>
                                                <option value="professor"> Professores </option>
                                            </select>
                                        </div>                                        
                                        <div class="col-xs-4">
                                            <select name="serie" id="serie" class="form-control">  
                                      <option value='todas'>Todas</option>
                                      <option value='Berçário'>Berçário</option>
                                        <option value='1 Ano de Idade'>1 Ano de Idade</option>
                                        <option value='2 Anos de Idade'>2 Anos de Idade</option>
                                        <option value='3 Anos de Idade'>3 Anos de Idade</option>
                                        <option value='4 Anos de Idade'>4 Anos de Idade</option>
                                        <option value='5 Anos de Idade'>5 Anos de Idade</option>
                                        <option value='1º Ano'>1º Ano</option>
                                        <option value='2º Ano'>2º Ano</option>
                                        <option value='3º Ano'>3º Ano</option>
                                        <option value='4º Ano'>4º Ano</option>
                                        <option value='5º Ano'>5º Ano</option>
                                        <option value='6º Ano'>6º Ano</option>
                                        <option value='7º Ano'>7º Ano</option>
                                        <option value='8º Ano'>8º Ano</option>
                                        <option value='9º Ano'>9º Ano</option>
                                        <option value='1º Ano Ensino Médio'>1º Ano Ensino Médio</option>
                                        <option value='2º Ano Ensino Médio'>2º Ano Ensino Médio</option>
                                        <option value='3º Ano Ensino Médio'>3º Ano Ensino Médio</option>
                                        <option value='EJA - 1º Segmento'>EJA - 1º Segmento</option>
                                        <option value="EJA - 2º Segmento">EJA - 2º Segmento</option>                                                
                                        <option value="Curso de Qualificação Profissional (FIC)">Curso de Qualificação Profissional (FIC)</option>                                                
                                        <option value="Ensino Técnico">Ensino Técnico</option>                                             
                                            </select>
                                        </div>                                        
                        </div>
     
         <br>
        <br>
        <br>
        <br>
      
        
        
        
    <br><br>     
        <div class="col-xs-4">
            <button type="button" class="btn btn-primary " id="btGerarRelatorioBib" >
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Gerar Relatório
            </button>                                            
        </div>                                        
    </div>
                        <br/> <br/> 
        </div>

</div> 
</div>
    <style>
        div#empty_emp {
            text-align: center;
            
        }
        
        
    </style>
    
    <div id="area_impressao" style="border: 1px solid black;">
    
    <div id="listar_emprestimos_geral">
        
            <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h3>Relatório Geral de Empréstimos <br/><span id="subtitulo_rel_geral"></span></h3>             
             </center></div>                                    
         </div>  
                    <table id="tblEmprestimo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Biblioteca</th>    
                                    <th>Código</th>
                                    <th>Material</th>                                                                                    
                                    <th>Leitor</th>                                            
                                    <th>Data Empréstimo</th>                                            
                                    <th>Data de Devolução</th>                                            
                                    <th>Situação</th>                                    
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                        <div id="empty_emp"><label>Não existem empréstimos realizados nesse periodo</label></div> <br>                         
                        
            </div>
    
        <div id="listar_emprestimos_unidade">
        
            <div class="col-xs-12 cabecalho">
            <div class="col-xs-12">
             <center>
             <img src="<?php echo base_url(); ?>utils/img/icone-biblioteca-maior.png" style="width: 11%;">
             <h3 style="display:inline;"><label>Net Library</label></h3>
             <h3>Relatório de Empréstimos Por Unidade<br/><span id="subtitulo_rel_unidade"></span></h3>             
             </center></div>                                    
         </div>  
                    <table id="tblEmprestimoUnidade" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Código</th>
                                    <th>Data Empréstimo</th>
                                    <th>Profissional</th>                                            
                                    <th>Material</th>                                                                                    
                                    <th>Leitor</th>                                            
                                    <th>Data de Devolução</th>                                            
                                    <th>Situação</th>                                    
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                        <div id="empty_emp"><label>Não existem empréstimos realizados nesse periodo</label></div> <br>                         
                        
            </div>
     
                        
                        
                                   <div class="col-xs-12 rodape" style="border: 1px solid black;">
         <div class="col-xs-12">
             <center>
             <label id="detalhes_prog">Relatório gerado em: <?php
                echo Date("d/m/Y h:m");
             ?></div>
             </center>
         </div>
        </div>
                     <br/>   
                        <div class="col-xs-12">
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-danger " id="btSelecaoRelatorio" >
                                                <span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Voltar
                                              </button>                                            
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="button" class="btn btn-primary " id="btImprimir" >
                                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                                              </button>                                            
                                        </div>
                        </div>
                                
                                
                            
     
     
    </div>
</div>
    
<script src="<?php echo base_url(); ?>utils/js/jQuery.print.js"></script>
<script src="<?php echo base_url(); ?>utils/js/jQuery.PrintArea.js"></script>  
<script src="<?php echo base_url(); ?>utils/js/ajax/relatorios/rel_emprestimos.js"></script>


