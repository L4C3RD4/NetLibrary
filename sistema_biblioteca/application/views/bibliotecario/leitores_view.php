<head>
    <style>
        #myProgress {
  width: 200px;
  background-color: grey;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: red;
}
#mybar {
  width: 1%;
  height: 30px;
  background-color: red;
}
        
        
    </style>
    
</head>
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title ">Sucesso</h4>
                    </div>
                    <div class="modal-body">
                       <p id="msg_acerto">Sucesso ao cadastrar o Leitor</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>

            <div id="erro">
                    <div class="modal-content alert-danger">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btFecharErro">x</button>
                        <h4 class="modal-title ">Falha</h4>
                     </div>
                    <div class="modal-body">
                        <p id="msg_erro">Falha ao cadastrar o Leitor!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
                       
                        <div id="cep_invalido">
                            <div class="modal-content alert-danger">
                                <div class="modal-header alert-danger">
                                    <h4 class="modal-title ">Aten????o!</h4>
                                </div>
                                <div class="modal-body">
                                    <p id="msg_cep_invalido">O CEP informado ?? inv??lido!</p>                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="manterCEP">Manter o valor Informado</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="corrigirCEP">Corrigir o CEP</button>                                    
                                </div>
                            </div>
                        </div>
						

                    </div>
        
    </div>   
    <!-- Modal -->
    <!--Nome Principal da P??gina!-->
    <div class="col-lg-12">
        <h1 class="page-header">CADASTRO DE LEITORES</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="row">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_leitores">Listagem de Leitores Cadastrados</a>
                </li>
                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_leitores">Cadastrar Novo Leitor</a>
                </li>                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Todos os Leitores Cadastrados </h4>
                        <hr/>
                            <table id="tblLeitores" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>                    
                                    <th>Nome completo</th>                    
                                    <th>Logradouro</th>                                            
                                    <th>Complemento</th>                                            
                                    <th>Bairro</th>                                            
                                    <th>Munic??pio</th>                                            
                                    <th>CEP</th>
                                    <th>Matricula</th>
                                    <th>Email</th>
                                    <th>A????o</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
            </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                    <h4> Novo Leitor</h4>
                <hr/>
                <form role="form" method="post" action="leitores_controller/cadastrar_leitor" name="cadastrar_leitores">
                            <input type="hidden" name="idleitor" id="idleitor" value="0"/>
                            <!-- Nome Logradouro-->
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Nome</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>CPF</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>CEP</label>
                                </div>
                              
                                
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o nome"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Infome o CPF"> 
                                </div>
                                    <div class="col-xs-3">
                                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o CEP">
                                </div>
                            </div>
                            <!-- Fim do Nome e Logradouro-->
                            
                            <!-- Complemento e Bairro-->
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Logradouro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label> Complemento</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Bairro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Munic??pio</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Informe o endere??o">
                                </div>
                                  <div class="col-xs-3">
                                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Infome o complemento"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o bairro">
                                </div>
                                  <div class="col-xs-3">
                                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Infome o Munic??pio"> 
                                </div>
                            </div>
                            <br><br><br><br><div class="col-xs-12">
                                  <div class="col-xs-3">
                                    <label>Perfil</label>
                                </div>
                                <div class="col-xs-3" id="serie_label">
                                    <label>S??rie</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Matricula</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Celular</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                  <div class="col-xs-3">
                                    <select id="perfil" name="perfil" class="form-control"> 
                                         <option value="">Selecione um Perfil</option>
                                        <option value="professor">Professor</option>
                                        <option value="aluno">Aluno</option>                                
                                        <option value="funcionario">Funcion??rio</option>
                                        <option value="comunidade">Comunidade Escolar</option>                                
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control" id="serie">
                                        <option value='Ber????rio'>Ber????rio</option>
                                        <option value='1 Ano de Idade'>1 Ano de Idade</option>
                                        <option value='2 Anos de Idade'>2 Anos de Idade</option>
                                        <option value='3 Anos de Idade'>3 Anos de Idade</option>
                                        <option value='4 Anos de Idade'>4 Anos de Idade</option>
                                        <option value='5 Anos de Idade'>5 Anos de Idade</option>
                                        <option value='1?? Ano'>1?? Ano</option>
                                        <option value='2?? Ano'>2?? Ano</option>
                                        <option value='3?? Ano'>3?? Ano</option>
                                        <option value='4?? Ano'>4?? Ano</option>
                                        <option value='5?? Ano'>5?? Ano</option>
                                        <option value='6?? Ano'>6?? Ano</option>
                                        <option value='7?? Ano'>7?? Ano</option>
                                        <option value='8?? Ano'>8?? Ano</option>
                                        <option value='9?? Ano'>9?? Ano</option>
                                        <option value='1?? Ano Ensino M??dio'>1?? Ano Ensino M??dio</option>
                                        <option value='2?? Ano Ensino M??dio'>2?? Ano Ensino M??dio</option>
                                        <option value='3?? Ano Ensino M??dio'>3?? Ano Ensino M??dio</option>
                                        <option value='EJA - 1?? Segmento'>EJA - 1?? Segmento</option>
                                        <option value="EJA - 2?? Segmento">EJA - 2?? Segmento</option>                                                
                                        <option value="Curso de Qualifica????o Profissional (FIC)">Curso de Qualifica????o Profissional (FIC)</option>                                                
                                        <option value="Ensino T??cnico">Ensino T??cnico</option>  
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Infome a Matricula"> 
                                </div>
                                <div class="col-xs-3">
                                            <input type="text" class="form-control" id="celular" name="celular" placeholder="informe o celular do usu??rio"> 
                                </div>
                            </div>
                            <br><br><br><br>
                            <!-- Fim da Matricula e Email-->
                            
                                    <div class="col-xs-12">
                                        <div class="col-xs-3">
                                            <label>Email</label>
                                        </div>
                                       <div class="col-xs-3">
                                            <label>Senha</label>
                                        </div>
                                       <div class="col-xs-3">
                                            <label>Confirma????o da Senha</label>
                                            
                                        </div>
                                        <div class="col-xs-3">
                                            <label>N??vel de Seguran??a da Senha:</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        
                                        <div class="col-xs-3">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Informe o e-mail">
                                        </div>
                                       <div class="col-xs-3">
                                           <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha"> 
                                        </div>
                                       <div class="col-xs-3">
                                           <input type="password" class="form-control" id="senha2" name="password" placeholder="Confirme a senha">
                                        </div>
                                        <div class="col-xs-3">
                                            <div id="myProgress">
                                                <div id="myBar"></div>
                                            </div>
                                        </div>
                                    </div>
                            <br><br><br>
                            <center>   
    <div class="col-xs-12">
        <br/><br/>
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="CancelarCadastro" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Cadastro  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarLeitor">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Leitor
         </button>   
    </div>
    </div>
</center>							
							
							
                        <br/><br/>
                    </form>
                </div>                       
            </div>
        </div>                
    
   
<!-- /.container-fluid -->


    <div class="col-md-12 column">
        <div class="modal fade" id="excluirLeitor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header bg-danger">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Leitor
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idleitorex" name="idleitorex" />
                                 Tem certeza que deseja excluir esse Leitor? <b><span id="spanDadosLeitor"></span></b>
                             </div>
                             <div class="modal-footer">
							                                                              
                                                             <div class="col-xs-12">								
								<center>   
    <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirLeitor" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirLeitor">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Excluir
         </button>   
    </div>
                                                                    </center>
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
        <div class="modal fade" id="alterarLeitor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="altleitor">
                    <div class="modal-header bg-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                            Alterar Dados do Leitor
                        </h4>
                    </div>
    <div class="modal-body">
            <form method="post" action="<?php echo base_url('leitores_controller/alterar_leitor') ?>" class="formAtualizarLeitor">
        <div class="col-xs-12">
            <div class="col-xs-4">
                <label>Leitor</label>
            </div>
            <div class="col-xs-4">
                <label>Perfil</label>
            </div>
            <div class="col-xs-4">
                <label>Unidade de Cadastro</label>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-4">
                <span id="dados-leitor" name="dados-leitor"></span>
                <input type="hidden"  id="edidleitor" name="idleitor">
            </div>
            <div class="col-xs-4">
                <span id="perfil-leitor" name="perfil-leitor"></span>
                <input type="hidden"  id="edperfil" name="edperfil">
            </div>
            <div class="col-xs-4">
                <span id="unidade_de_cadastro" name="unidade_de_cadastro"></span>
                <input type="hidden"  id="edunidade_cadastro" name="edunidade_cadastro">
            </div>
        </div><br>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <label>Nome</label>
                </div>
                <div class="col-xs-3">
                    <label>CPF</label>
                </div>
                <div class="col-xs-3">
                    <label>CEP</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="ednome" name="nome" placeholder="Infome o Nome"> 
                </div>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="edcpf" name="cpf" placeholder="Infome o cpf"> 
                </div>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="edcep" name="cep" placeholder="Informe o CEP">
                </div>
            </div>
            <!-- Fim da Descri????o e Logradouro-->

            <!-- Complemento e Bairro-->
            <br><br><br><br><br><div class="col-xs-12">
                <div class="col-xs-3">
                    <label>Logradouro</label>
                </div>
                <div class="col-xs-3">
                    <label>Complemento</label>
                </div>
                <div class="col-xs-3">
                    <label>Bairro</label>
                </div>
                 <div class="col-xs-3">
                    <label>Munic??pio</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="edlogradouro" name="logradouro" placeholder="Informe o endere??o ">
                </div>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="edcomplemento" name="edcomplemento" placeholder="Infome o complemento"> 
                </div>
            <div class="col-xs-3">
                    <input type="text" class="form-control" id="edbairro" name="bairro" placeholder="Informe o bairro">
                </div>
                   <div class="col-xs-3">
                    <input type="text" class="form-control" id="edmunicipio" name="municipio" placeholder="Infome o Munic??pio"> 
                </div>
            </div>
            <br><br><br><br><div class="col-xs-12">
                <div class="col-xs-3">
                    <label>Matricula</label>
                </div>
                <div class="col-xs-3">
                    <label>S??rie</label>
                </div>
                <div class="col-xs-3">
                    <label>celular</label>
                </div>
                <div class="col-xs-3">
                    <label>Email</label>
                </div>
               
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="edmatricula" name="matricula" placeholder="Infome a Matricula"> 
                </div>
                <div class="col-xs-3">
                    <select class="form-control" id="edserie">
                              <option value='Ber????rio'>Ber????rio</option>
                              <option value='1 Ano de Idade'>1 Ano de Idade</option>
                              <option value='2 Anos de Idade'>2 Anos de Idade</option>
                              <option value='3 Anos de Idade'>3 Anos de Idade</option>
                              <option value='4 Anos de Idade'>4 Anos de Idade</option>
                              <option value='5 Anos de Idade'>5 Anos de Idade</option>
                              <option value='1?? Ano'>1?? Ano</option>
                              <option value='2?? Ano'>2?? Ano</option>
                              <option value='3?? Ano'>3?? Ano</option>
                              <option value='4?? Ano'>4?? Ano</option>
                              <option value='5?? Ano'>5?? Ano</option>
                              <option value='6?? Ano'>6?? Ano</option>
                              <option value='7?? Ano'>7?? Ano</option>
                              <option value='8?? Ano'>8?? Ano</option>
                              <option value='9?? Ano'>9?? Ano</option>
                              <option value='1?? Ano Ensino M??dio'>1?? Ano Ensino M??dio</option>
                              <option value='2?? Ano Ensino M??dio'>2?? Ano Ensino M??dio</option>
                              <option value='3?? Ano Ensino M??dio'>3?? Ano Ensino M??dio</option>
                              <option value='EJA - 1?? Segmento'>EJA - 1?? Segmento</option>
                              <option value="EJA - 2?? Segmento">EJA - 2?? Segmento</option>                                                
                              <option value="Curso de Qualifica????o Profissional (FIC)">Curso de Qualifica????o Profissional (FIC)</option>                                                
                              <option value="Ensino T??cnico">Ensino T??cnico</option>  
                          </select>
                </div>
                <div class="col-xs-3">
                    
                      <input type="text" class="form-control" id="edcelular" name="celular" placeholder="informe o celular do usu??rio"> 
                               
                </div>
            <div class="col-xs-3">
                    <input type="email" class="form-control" id="edemail" name="email" placeholder="Informe o e-mail">
                </div>
             
            </div>
            <!-- Fim da Matricula e Email-->
  
    </div>
                    <br><br><br><br><div class="modal-footer">
					
					
					<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarLeitor" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarLeitor">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Altera????es
         </button>   
    </div>
</center>
</form>
        <!--<input type="submit" class="btn btn-primary" value="Salvar" />*/-->
    </div>

            </div>
        </div>
    </div>
    </div>

         <div class="col-md-12 column">
		 <form>
                        <div class="modal fad" id="atualiza_login" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" id="closeNota" class="close fechar" data-dismiss="modal" aria-hidden="true">??</button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            Atualizar a senha de acesso do usu??rio
                                        </h4>                                        
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="col-xs-12"><br>
                                            <div class="col-xs-6">
                                                <label>Usu??rio: </label> <span id="sp_nome"></span>
                                                <input type="hidden" name="usuario_login" id="usuario_login">
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Email: </label> <span id="sp_email"></span>
                                            </div>
                                        </div>
                                        <br/>    
                                        <br/>    
                                        <br/>    
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-4">
                                                <label>Digite a Nova Senha:</label> 
                                            </div>
                                            <div class="col-xs-4">
                                                <label>Confirma a nova Senha:</label> 
                                            </div>                                                                                        
                                            <div class="col-xs-4">
                                                <label>N??vel de Seguran??a da Senha:</label> 
                                            </div>                                                                                        
                                            <div class="col-xs-2">
                                                <label></label> 
                                            </div>                                                                                        
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-4">
                                                <input type="password" name="altsenha" id="altsenha" class="form-control"></input> 
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="password" name="confirm_senha" id="confirm_senha" class="form-control"></input> 
                                            </div>                                                                                        
                                            <div class="col-xs-4">
                                              <div id="myProgress">
                                                <div id="mybar"></div>
                                            </div>                                           
                                            </div>
                                           
                                        </div>                                            
                                        </div>
                                    </div>
                                    <div id="bt-update-lancar" class="modal-footer">
									
									
									<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger fechar " id="btFecharAtualizacao" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAtualizaSenhaUsuario">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Alterar a Senha de Acesso
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
                    </div>
                    
     
    
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.js"></script>    
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.banlist.js"></script>
<script src="<?php echo base_url(); ?>utils/js/ajax/leitores.js"></script>

