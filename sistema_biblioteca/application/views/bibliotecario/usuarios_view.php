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
    
    <div class="container-fluid"> 
         <div id="loading" style="display: none;">
        <img id="imagemLoader" alt="Processando" src="<?php echo base_url();?>/utils/img/carregando.gif" style="
    width: 700px;
    height: 700px;
    margin-top: 10px; ">
        <!--<p id="fraseLoader">Processando, aguarde...</p>-->
        </div>
        
       <div class="row">
           <div class="col-lg-12">
                       
               <div id="sucesso2">  
               <div class="modal-content alert-success">
                    <div class="modal-header alert-success">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Sucesso!</h4>
                    </div>
                    <div class="modal-body">
                       <p id="msg_suc">O Bibliotecário foi cadastrado com sucesso,clique em atribuir para atribui-lo agora</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="ir">Atribuir</button>                                    

                    </div>
                </div>
            </div>
                    
              <div class="col-lg-12">
            <div id="sucesso">  
               <div class="modal-content alert-success">
                    <div class="modal-header alert-success">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Sucesso</h4>
                    </div>
                    <div class="modal-body">
                       <p id="msg_acerto">Sucesso ao cadastrar o Usuário!</p>
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
                        <h4 class="modal-title ">Falha!</h4>
                     </div>
                    <div class="modal-body">
                        <p id="msg_erro">Falha ao cadastrar o Usuário!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        
			

                    </div>   

                    <div class="col-lg-12">
                        <h1 class="page-header">
                            CADASTRO DE USUÁRIOS <small></small>
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
                                <a href="#panel-168546" data-toggle="tab" id="tab_lista_usuarios">Listagem de Usuários Cadastrados</a>
                            </li>
                            <li>
                                <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_usuarios">Cadastrar Novo Usuário</a>
                            </li>                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel-168546">
                                <br />
                                <h4> Todos os usuários cadastrados </h4>
                                <hr />
                                <table id="tblUsuarios" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>                                            
                                            <th>Endereço</th>                                            
                                            <th>Celular</th>                                            
                                            <th>E-mail</th>                                            
                                            <th>Perfil</th>                                            
                                            <th>Ação</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <!--<b>Legenda:</b> &nbsp&nbsp<span style="color:green;">Secretários Ativos&nbsp&nbsp</span> <span style="color:red;">&nbsp&nbspSecretários Inativos</span>-->
                            </div>
                            <div class="tab-pane" id="panel-190060">
                                <br />
                                <h4> Novo Usuário</h4>
                                <hr />
                                <form method="post" action="<?php echo base_url('usuarios_controller/cadastrar_usuario') ?>" class="formCadastrarUsuario">
                                  
                            <input type="hidden" name="idusuario" id="idusuario" value="0"/>

                                    <div class="col-xs-12">
                                       <div class="col-xs-6">
                                            <label> Nome </label>
                                        </div>
                                       <div class="col-xs-6">
                                            <label> Endereço </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                       <div class="col-xs-6">
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="informe o nome do usuário"> 
                                        </div>
                                       <div class="col-xs-6">
                                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="informe o endereço do usuário">
                                        </div>
                                    </div>
                                   <br/> 
                                   <br/> 
                                   <br/>
                                   <br/>
                                   <div class="col-xs-12">
                                       <div class="col-xs-6">
                                            <label> Celular </label>
                                        </div>
                                       <div class="col-xs-6">
                                            <label> E-mail </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                       <div class="col-xs-6">
                                            <input type="text" class="form-control" id="celular" name="celular" placeholder="informe o celular do usuário"> 
                                        </div>
                                       <div class="col-xs-6">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="informe o endereço de email do usuário">
                                        </div>
                                    </div>
                                    <!-- Fim descrição e CNPJ -->
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <div class="col-xs-12">
                                       <div class="col-xs-4">
                                            <label>SENHA </label>
                                        </div>
                                       <div class="col-xs-4">
                                            <label> SENHA</label>
                                        </div>
                                       <div class="col-xs-4">
                                            <label>Nível de Segurança da Senha:</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                       <div class="col-xs-4">
                                           <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha"> 
                                        </div>
                                       <div class="col-xs-4">
                                           <input type="password" class="form-control" id="senha2" name="password" placeholder="Confirme a senha">
                                        </div>
                                        <div class="col-xs-4">
                                            <div id="myProgress">
                                                <div id="myBar"></div>
                                            </div>
                                        </div>
                                    </div>
                                      <br/>
                                      <br/>
                                      <br/>
                                      <br/>
                                      
                                       <div class="col-xs-12">
                                       <div class="col-xs-6">
                                           
                                            <label>PERFIL </label>
                                       </div>
                                       <div class="col-xs-3">
                                           
                                            
                                       </div>
                                       <div class="col-xs-3">
                                           
                                            
                                       </div>
                                        </div>
                                      <div class="col-xs-12">
                                    <div class="col-xs-6">
                                    <select class="form-control" name="perfil" id="perfil" >
                                        <option value="">SELECIONE UM PERFIL</option>
                                        <option value="gestor">Gestor</option>
                                        <option value="usuario">Usuário</option>
                                        <option value="bibliotecario">Bibliotecário</option>
                                        <option value="auxiliar">Auxiliar de Biblioteca</option>
                   
                                    </select>
                                    </div>
                                         <div class="col-xs-3">
                                                                                
                                            <button type="button" class="btn btn-primary " id="cadastrarUsuario">
                                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Usuário
                                              </button>   
                                         </div>
                                          <div class="col-xs-3">
                                                                              
                                             <button type="reset" class="btn btn-primary" id="resetarUsuario">
                                                    <span class="fa fa-eraser" aria-hidden="true"></span> Limpar Dados
                                             </button>   
                                        
                                   
                                </div>
                                      </div>
                                     <br/>
                                      <br/>
                                      <br/>
                                      <br/>
                                   
                                    <br />
                                    <br />
                                </form>
                            </div>                       
                        </div>
                    </div>                <!-- /.row -->

                </div>
            </div>   
            <!-- /.container-fluid -->


            <div class="col-md-12 column">
                <div class="modal fade" id="excluirUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" action="<?php echo base_url('usuarios_controller/excluirusuarios') ?>" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Excluir Usuário
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="idusuarioex" name="idusuarioex" />
                                    Tem certeza que deseja excluir o usuário? <b><span id="spanNomeUsuario"></span></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default fechar" data-dismiss="modal" id="btFecharExcluirUsuario">Fechar</button> 
                                    <input type="button" id="btExcluirUsuario" class="  btn btn-primary" value="Excluir" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 column">
                <div class="modal fade" id="alterarUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">
                                    Alterar Dados do Usuário
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('usuarios_controller/alterarUsuario') ?>" class="formCadastrarCliente">
<!--                                    <input type="hidden" name="instituicao" id="edinstituicao" value="<?php
                                      //     $session_data = $this->session->userdata('logged_in');
                                       //    echo $session_data["instituicao"];
                                           ?>"/>								-->
                                    <!--Código do Cliente -->
                                    <div class="col-xs-2">
                                        
                                        <div class="col-xs-2">
                                            <input type="hidden" id="edidusuario" name="edidusuario" value="<?php
                                           $session_data = $this->session->userdata('logged_in');
                                    
                                           ?>" />
                                            <div id="valueid"> </div>                                        
                                            <!--<label id="idsetor" name="idsetor"> </label>-->
                                        </div>
                                    </div>
                                   								

            <div class="col-xs-12">
                <div class="col-xs-6">
                    <label>Nome</label>
                </div>
                <div class="col-xs-6">
                 <label>Endereço</label>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="ednome" name="nome" placeholder="Infome o nome do usuário"> 
                </div>
            <div class="col-xs-6">
             <input type="text" class="form-control" id="edendereco" name="endereco" placeholder="Infome o endereço"> 

                </div>
            </div>
            <br><br><br><br>      
                <div class="col-xs-12">
               
                <div class="col-xs-6">
                    <label>celular</label>
                </div>
                    <div class="col-xs-6">
                    <label>Email</label>
                    
                </div>
            </div>
            <div class="col-xs-12">
           
            <div class="col-xs-6">
                    <input type="text" class="form-control" id="edcelular" name="celular" placeholder="Informe o celular">
                </div>
                <div class="col-xs-6">
                    <input type="text" class="form-control" id="edemail" name="email" placeholder="Infome o email"> 
                </div>
                  </div> 
               <!-- <br><br><br>
                <div class="col-xs-6">
                    <label>Email</label>
                    
                </div>
                 <div class="col-xs-6">
                    <input type="text" class="form-control" id="edemail" name="email" placeholder="Infome o email"> 
                </div>!-->
                                     
                            </div><br><br><br> 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" id="btFecharAlterarUsuario">Cancelar</button> 
                                <input type="button" id="btAlterarUsuario" class="btn btn-primary" value="Salvar Alterações" />
                                <!--<input type="submit" class="btn btn-primary" value="Salvar" />*/-->
                            </div>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    <div class="col-md-12 column">
                        <div class="modal fad" id="atualiza_login" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" id="closeNota" class="close fechar" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            Atualizar a senha de acesso do usuário
                                        </h4>                                        
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="col-xs-12"><br>
                                            <div class="col-xs-6">
                                                <label>Usuário: </label> <span id="sp_nome"></span>
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
                                                <label>Nível de Segurança da Senha:</label> 
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
                                    <div id="bt-update-lancar" class="modal-footer">
                                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" id="btFecharAtualizacao">Cancelar</button> 
                                        <input type="button" id="btAtualizaSenhaUsuario" class="btn btn-primary" value="Alterar a Senha de Acesso" /> </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- /#page-wrapper -->
       <!-- /#wrapper -->
       
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.js"></script>    
<script src="<?php echo base_url(); ?>utils/js/jquery.complexify.banlist.js"></script>
<script src="<?php echo base_url(); ?>utils/js/ajax/usuarios.js"></script>