<div id="page-wrapper"> 
    <div class="container-fluid">  
    <div id="loading" style="display: none;">
        <img id="imagemLoader" alt="Processando" src="<?php echo base_url();?>utils/img/carregando.gif" style="
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
                       <p id="msg_acerto">Sucesso ao cadastrar o acervo!</p>
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
                        <p id="msg_erro">Falha ao cadastrar o acervo!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
            <div id="erroAut">
                    <div class="modal-content alert-danger">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Falha</h4>
                     </div>
                    <div class="modal-body">
                        <p id="msg_erro">Falha ao cadastrar o acervo!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
            <div id="erroAce">
                    <div class="modal-content alert-danger">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <h4 class="modal-title ">Falha</h4>
                     </div>
                    <div class="modal-body">
                        <p id="msg_erro">Falha ao cadastrar o acervo!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default fechar" data-dismiss="modal" >Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <!-- Modal -->
    <!--Nome Principal da P????gina!-->
    <div class="col-lg-12">
        <h1 class="page-header">CADASTRO DO ACERVO</h1>
    </div>
    <!--</div>-->
     <!-- /.row -->
     <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_acervo">Listagem dos acervos cadastrados</a>
                </li>
                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_acervo">Cadastrar Acervo</a>
                </li>                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Acervos Cadastrados </h4>
                        <hr/>
                            <table id="tblAcervo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>                                            
                                    <th>Tipo</th>                                            
                                    <th>Local</th>                                            
                                    <th>Editora </th>                                            
                                    <th>Assunto </th>                                            
                                    <th>G??nero </th>                                            
                                    <th>Ano de publica????o</th>                                            
                                    <th>ISBN</th>
                                    <th>A????o</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
            </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                    <h4> Novo Acervo</h4>
                <hr/>
                    <form role="form" method="post" action="acervo_controller/cadastrar_acervo" name="cadastrar_acervo">
                            <input type="hidden" name="idacervo" id="idacervo" value="0"/>
                            <!-- Biblioteca e Material-->
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Titulo</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Tipo</label>
                                </div>
                                 <div class="col-xs-4">
                                    <label>Editora</label>
                                </div>
                            </div>
                                                      
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Infome o titulo"> 
                                </div>
                            <div class="col-xs-2">
                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="livro">Livro</option>
                                    <option value="revista">Revista</option>
                                    <option value="cd">CD</option>
                                    <option value="dvd">DVD</option>
                                    <option value="mapa">Mapa</option>
                                </select>
                            </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="editora" name="editora" placeholder="Infome a editora"> 
                                </div>
                            </div>
                           <hr/> <br><br><br><br> <div class="col-xs-12">
                               <div class="col-xs-3">
                                    <label>Ano de publica????o</label>
                                </div> 
                               <div class="col-xs-3">
                                    <label>Pa??s de Origem</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Idioma</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>ISBN</label>
                                </div>
                            </div><br>
                            <div class="col-xs-12"> 
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="anopublicacao" name="anopublicacao" placeholder="Infome o ano de publica????o"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="local" name="local" placeholder="Informe o p??is de origem">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="idioma" name="idioma" placeholder="Infome o idioma"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Informe o ISBN">
                                </div>
                            </div>   
                                
                    <br><br><br><br> <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <label>Resumo das informa????es</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" id="resumo" name="resumo" placeholder="Infome o Resumo das informa????es"> 
                                </div>
                            </div>
                    <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Assunto</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>S??rie/ Cole????o</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>N??mero de p??ginas</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <select class="form-control" name="assunto" id="assunto">

                                        <option value="">Selecione um assunto</option>
 <option value="Administra????o da fam??lia e do lar"> Administra????o da fam??lia e do lar</option>                                       
<option value="Administra????o e servi??os auxiliares">Administra????o e servi??os auxiliares</option>
<option value="Administra????o p??blica e ci??ncia militar">Administra????o p??blica e ci??ncia militar</option>
<option value="Agricultura e tecnologias relacionadas">Agricultura e tecnologias relacionadas</option>
<option value="Animais (zoologia)">Animais (zoologia)</option>
<option value="Arquitetura">Arquitetura</option>
<option value="Artes gr??ficas">Artes gr??ficas</option>
<option value="Artes pl??sticas">Artes pl??sticas</option>
<option value="Artes">Artes</option>
<option value="Associa????es"> Associa????es</option>
<option value="Assunto n??o informado">Assunto n??o informado</option>
<option value="Astronomia e ci??ncias afins">Astronomia e ci??ncias afins</option>
<option value="Bibliografia">Bibliografia</option>
<option value="Biblioteconomia e ci??ncia da informa????o">Biblioteconomia e ci??ncia da informa????o</option>
<option value="Biografias, genealogia e ins??gnia">Biografias, genealogia e ins??gnia</option>
<option value="Biologia, ci??ncias da vida">Biologia, ci??ncias da vida</option>
<option value="B??blia">B??blia</option>
<option value="Cartas brasileiras">Cartas brasileiras</option>
<option value="Ci??ncia da computa????o, informa????o e obras gerais">Ci??ncia da computa????o, informa????o e obras gerais</option>
<option value="ci??ncias da terra"> Ci??ncias da terra</option>
<option value="Ci??ncia pol??tica">Ci??ncia pol??tica</option>
<option value="Ci??ncias naturais">Ci??ncias naturais</option>
<option value="Ci??ncias sociais">Ci??ncias sociais</option>
<option value="Cole????es de estat??sticas gerais">Cole????es de estat??sticas gerais</option>
<option value="Cole????es de obras diversas sem assunto espec??fico">Cole????es de obras diversas sem assunto espec??fico</option>
<option value="Com??rcio, comunica????o e transporte">Com??rcio, comunica????o e transporte</option>
<option value="Congrega????es crist??s, pr??tica e teologia pastoral">Congrega????es crist??s, pr??tica e teologia pastoral</option>
<option value="Constru????es">Constru????es</option>
<option value="Cristianismo e teologia crist??">Cristianismo e teologia crist??</option>
<option value="Denomina????es e seitas crist??s">Denomina????es e seitas crist??s</option>
<option value="Desenho e artes decorativas">Desenho e artes decorativas</option>
<option value="Direito">Direito</option>
<option value="Discursos brasileiros">Discursos brasileiros</option>
<option value="Economia dom??stica">Economia dom??stica</option>
<option value="Economia">Economia</option>
<option value="Educa????o">Educa????o</option>
<option value="Enciclop??dias gerais">Enciclop??dias gerais</option>
<option value="Engenharia qu??mica e tecnologias relacionadas">Engenharia qu??mica e tecnologias relacionadas</option>
<option value="Engenharia">Engenharia</option>
<option value="Ensaios brasileiros">Ensaios brasileiros</option>
<option value="Escolas filos??ficas espec??ficas">Escolas filos??ficas espec??ficas</option>
<option value="Escultura">Escultura</option>
<option value="Esportes">Esportes</option>
<option value="??tica">??tica</option>
<option value="Fic????o e contos brasileiros">Fic????o e contos brasileiros</option>
<option value="Filosofia antiga, medieval e oriental">Filosofia antiga, medieval e oriental</option>
<option value="Filosofia e psicologia">Filosofia e psicologia</option>
<option value="Filosofia e teoria da religi??o">Filosofia e teoria da religi??o</option>
<option value="Filosofia moderna ocidental">Filosofia moderna ocidental</option>
<option value="Fotografia e arte por computador">Fotografia e arte por computador</option>
<option value="F??sica">F??sica</option>
<option value="Geoci??ncias">Geoci??ncias</option>
<option value="Geografia e hist??ria">Geografia e hist??ria</option>
<option value="Geografia e viagens - brasil">Geografia e viagens - brasil</option>
<option value="Geografia e viagens">Geografia e viagens</option>
<option value="Gravuras">Gravuras</option>
<option value="Hist??ria da am??rica do norte">Hist??ria da am??rica do norte</option>
<option value="Hist??ria da am??rica do sul">Hist??ria da am??rica do sul</option>
<option value="Hist??ria da europa">Hist??ria da europa</option>
<option value="Hist??ria da ??frica">Hist??ria da ??frica</option>
<option value="Hist??ria da ??sia">Hist??ria da ??sia</option>
<option value="Hist??ria de outras regi??es">Hist??ria de outras regi??es</option>
<option value="Hist??ria do Brasil">Hist??ria do Brasil</option>
<option value="Hist??ria do cristianismo">Hist??ria do cristianismo</option>
<option value="Hist??ria do mundo antigo at?? ca. 499">Hist??ria do mundo antigo at?? ca. 499</option>
<option value="Humor e s??tira brasileiros">Humor e s??tira brasileiros</option>
<option value="Jornalismo, editora????o e imprensa document??ria e educativa">Jornalismo, editora????o e imprensa document??ria e educativa</option>
<option value="Linguagem e l??nguas">Linguagem e l??nguas</option>
<option value="Lingu??stica">Lingu??stica</option>
<option value="Literatura alem??">Literatura alem??</option>
<option value="Literatura americana">Literatura americana</option>
<option value="Literatura australiana em lingua inglesa">Literatura australiana em lingua inglesa</option>
<option value="Literatura brasileira">Literatura brasileira</option>
<option value="Literatura e ret??rica">Literatura e ret??rica</option>
<option value="Literatura espanhola">Literatura espanhola</option>
<option value="Literatura francesa">Literatura francesa</option>
<option value="Literatura grega">Literatura grega</option>
<option value="Literatura inglesa">Literatura inglesa</option>
<option value="Literatura italiana">Literatura italiana</option>
<option value="Literatura latina">Literatura latina</option>
<option value="Literatura portuguesa">Literatura portuguesa</option>
<option value="L??ngua alem??">L??ngua alem??</option>
<option value="L??ngua espanhola">L??ngua espanhola</option>
<option value="L??ngua francesa">L??ngua francesa</option>
<option value="L??ngua grega cl??ssica e moderna">L??ngua grega cl??ssica e moderna</option>
<option value="L??ngua inglesa">L??ngua inglesa</option>
<option value="L??ngua italiana">L??ngua italiana</option>
<option value="L??ngua latina">L??ngua latina</option>
<option value="L??ngua portuguesa">L??ngua portuguesa</option>
<option value="L??gica">L??gica</option>
<option value="Manufatura para usos espec??ficos">Manufatura para usos espec??ficos</option>
<option value="Manuscritos, obras raras e outros materiais raros impressos">Manuscritos, obras raras e outros materiais raros impressos</option>
<option value="Matem??tica">Matem??tica</option>
<option value="Medicina e sa??de">Medicina e sa??de</option>
<option value="Metaf??sica">Metaf??sica</option>
<option value="Miscel??nea de escritos brasileiros (inclui mais de um gen??ro e cr??nica e literatura infanto-juvenil brasileira)">
<option value="Moral crist?? e teologia devocional">Moral crist?? e teologia devocional</option>
<option value="M??sica">M??sica</option><option value="Artes c??nicas e recreativas">Artes c??nicas e recreativas</option>
<option value="oriente">Oriente</option>
<option value="Outras literaturas">Outras literaturas</option>
<option value="Outras l??nguas">Outras l??nguas</option>
<option value="Outras religi??es">Outras religi??es</option>
<option value="Paleontologia">Paleontologia</option>
<option value="Paleozoologia"> Paleozoologia</option>
<option value="Parapsicologia, ocultismo e espiritismo">Parapsicologia, ocultismo e espiritismo</option>
<option value="Peri??dicos">Peri??dicos</option>
<option value="Pintura">Pintura</option>
<option value="Planejamento urbano e paisagismo">Planejamento urbano e paisagismo</option>
<option value="Plantas (bot??nica)">Plantas (bot??nica)</option>
<option value="Poesia brasileira">Poesia brasileira</option>
<option value="Produtos manufaturados">Produtos manufaturados</option>
<option value="Psicologia">Psicologia</option>
<option value="Qu??mica e ci??ncias afins">Qu??mica e ci??ncias afins</option>
<option value="Religi??o">Religi??o</option>
<option value="Servi??os e problemas sociais">Servi??os e problemas sociais</option>
<option value="Sociedades, organiza????es e museologia">Sociedades, organiza????es e museologia</option>
<option value="Teatro brasileiro">Teatro brasileiro</option>
<option value="Tecnologia (ci??ncias aplicadas)"> Tecnologia (ci??ncias aplicadas)</option>
<option value="Teologia social e eclesi??stica crist??">Teologia social e eclesi??stica crist??</option>
<option value="Teoria do conhecimento, causalidade e ser humano">Teoria do conhecimento, causalidade e ser humano</option>
<option value="Usos e costumes, etiqueta e folclore">Usos e costumes, etiqueta e folclore</option>

Miscel??nea de escritos brasileiros (inclui mais de um gen??ro e cr??nica e literatura infanto-juvenil brasileira)</option>

                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="serie_colecao" name="serie_colecao" placeholder="Informe a s??rie ou a cole????o"> 
                                </div>
                                 
                                <div class="col-xs-2">
                                    <input type="number" class="form-control" id="numeropg" name="numeropg" placeholder="Informe o n??mero de p??ginas" min="0">
                                </div>
                            </div>
                    <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-12">
                                    <label>Detalhes</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="detalhes" id="detalhes" placeholder="Informe os detalhes">
                                </div>
                            </div>
                            
                           <br/><br><br><br>
                                <h4>Autores da Obra</h4>
                                <hr/>
                                <div class="col-xs-12" id="codigo_autores">
                                    <div class="col-xs-6">
                                        <a href='#PesquisarAutores' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'><i class="fa fa-search"></i> Pesquisar Autor</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Autor Principal: </label><select id="autor_principal_selecao" class="form-control"></select>
                                    </div>
                                </div>    
                                    <br>
                                    <div class="col-xs-12" id="campos_autores" >
                                        <input type="hidden" name="autores" id="autores">&nbsp&nbsp
                                        <label id="lbAltoresSelecionados"></label>&nbsp&nbsp
                                        <span id="btEsconder_campos_autores"></span>
                                    </div>
                                
                            
            <br><br><br><br><br><br><hr/>
			<center>   
     
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarAcervo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar Acervo
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
        <div class="modal fade" id="excluirAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                    <form role="form" method="post" action="acervo_controller/excluir_acervo" name="">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Acervo
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idacervoex" name="idacervoex" />
                                 Tem certeza que deseja excluir esse Acervo? <b><span id="spanDadosAcervo"></span></b>
                             </div>
                             <div class="modal-footer">
							 
							 <center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar  
		</button>   
    </div> 
  
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btExcluirAcervo">
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
         <!--Alterar Dados do Acervo!-->
    <div class="col-md-12 column">
        <div class="modal fade" id="alterarAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                            Alterar Dados do Acervo
                        </h4>
                    </div>
    <div class="modal-body">
       <form method="post" action="<?php echo base_url('acervo_controller/alterarAcervo') ?>" class="formAtualizarAcervo">
          
             <input type="hidden" name="edidacervo" id="edidacervo"/>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Titulo</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Tipo</label>
                                </div>
                                 <div class="col-xs-4">
                                    <label>Editora</label>
                                </div>
                            </div>
                                                      
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="edtitulo" name="edtitulo" placeholder="Infome o titulo"> 
                                </div>
                            <div class="col-xs-2">
                                <select class="form-control" id="edtipo" name="edtipo">
                                    <option value="livro">Livro</option>
                                    <option value="revista">Revista</option>
                                    <option value="cd">CD</option>
                                    <option value="dvd">DVD</option>
                                    <option value="mapa">Mapa</option>
                                </select>
                            </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="ededitora" name="ededitora" placeholder="Infome a editora"> 
                                </div>
                            </div>
                           <hr/> <br><br><br><br> <div class="col-xs-12">
                               <div class="col-xs-3">
                                    <label>Ano de publica????o</label>
                                </div> 
                               <div class="col-xs-3">
                                    <label>Pa??s de Origem</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Idioma</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>ISBN</label>
                                </div>
                            </div><br>
                            <div class="col-xs-12"> 
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edanopublicacao" name="edanopublicacao" placeholder="Infome o ano de publica????o"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edlocal" name="edlocal" placeholder="Informe o p??is de origem">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edidioma" name="edidioma" placeholder="Infome o idioma"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edisbn" name="edisbn" placeholder="Informe o ISBN">
                                </div>
                            </div>   
                                
                    <br><br><br><br> <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <label>Resumo das informa????es</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" id="edresumo" name="edresumo" placeholder="Infome o Resumo das informa????es"> 
                                </div>
                            </div>
                    <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Assunto</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>S??rie/ Cole????o</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>N??mero de p??ginas</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <select class="form-control" name="edassunto" id="edassunto">

                                        <option value="">Selecione um assunto</option>
 <option value="Administra????o da fam??lia e do lar"> Administra????o da fam??lia e do lar</option>                                       
<option value="Administra????o e servi??os auxiliares">Administra????o e servi??os auxiliares</option>
<option value="Administra????o p??blica e ci??ncia militar">Administra????o p??blica e ci??ncia militar</option>
<option value="Agricultura e tecnologias relacionadas">Agricultura e tecnologias relacionadas</option>
<option value="Animais (zoologia)">Animais (zoologia)</option>
<option value="Arquitetura">Arquitetura</option>
<option value="Artes gr??ficas">Artes gr??ficas</option>
<option value="Artes pl??sticas">Artes pl??sticas</option>
<option value="Artes">Artes</option>
<option value="Associa????es"> Associa????es</option>
<option value="Assunto n??o informado">Assunto n??o informado</option>
<option value="Astronomia e ci??ncias afins">Astronomia e ci??ncias afins</option>
<option value="Bibliografia">Bibliografia</option>
<option value="Biblioteconomia e ci??ncia da informa????o">Biblioteconomia e ci??ncia da informa????o</option>
<option value="Biografias, genealogia e ins??gnia">Biografias, genealogia e ins??gnia</option>
<option value="Biologia, ci??ncias da vida">Biologia, ci??ncias da vida</option>
<option value="B??blia">B??blia</option>
<option value="Cartas brasileiras">Cartas brasileiras</option>
<option value="Ci??ncia da computa????o, informa????o e obras gerais">Ci??ncia da computa????o, informa????o e obras gerais</option>
<option value="ci??ncias da terra"> Ci??ncias da terra</option>
<option value="Ci??ncia pol??tica">Ci??ncia pol??tica</option>
<option value="Ci??ncias naturais">Ci??ncias naturais</option>
<option value="Ci??ncias sociais">Ci??ncias sociais</option>
<option value="Cole????es de estat??sticas gerais">Cole????es de estat??sticas gerais</option>
<option value="Cole????es de obras diversas sem assunto espec??fico">Cole????es de obras diversas sem assunto espec??fico</option>
<option value="Com??rcio, comunica????o e transporte">Com??rcio, comunica????o e transporte</option>
<option value="Congrega????es crist??s, pr??tica e teologia pastoral">Congrega????es crist??s, pr??tica e teologia pastoral</option>
<option value="Constru????es">Constru????es</option>
<option value="Cristianismo e teologia crist??">Cristianismo e teologia crist??</option>
<option value="Denomina????es e seitas crist??s">Denomina????es e seitas crist??s</option>
<option value="Desenho e artes decorativas">Desenho e artes decorativas</option>
<option value="Direito">Direito</option>
<option value="Discursos brasileiros">Discursos brasileiros</option>
<option value="Economia dom??stica">Economia dom??stica</option>
<option value="Economia">Economia</option>
<option value="Educa????o">Educa????o</option>
<option value="Enciclop??dias gerais">Enciclop??dias gerais</option>
<option value="Engenharia qu??mica e tecnologias relacionadas">Engenharia qu??mica e tecnologias relacionadas</option>
<option value="Engenharia">Engenharia</option>
<option value="Ensaios brasileiros">Ensaios brasileiros</option>
<option value="Escolas filos??ficas espec??ficas">Escolas filos??ficas espec??ficas</option>
<option value="Escultura">Escultura</option>
<option value="Esportes">Esportes</option>
<option value="??tica">??tica</option>
<option value="Fic????o e contos brasileiros">Fic????o e contos brasileiros</option>
<option value="Filosofia antiga, medieval e oriental">Filosofia antiga, medieval e oriental</option>
<option value="Filosofia e psicologia">Filosofia e psicologia</option>
<option value="Filosofia e teoria da religi??o">Filosofia e teoria da religi??o</option>
<option value="Filosofia moderna ocidental">Filosofia moderna ocidental</option>
<option value="Fotografia e arte por computador">Fotografia e arte por computador</option>
<option value="F??sica">F??sica</option>
<option value="Geoci??ncias">Geoci??ncias</option>
<option value="Geografia e hist??ria">Geografia e hist??ria</option>
<option value="Geografia e viagens - brasil">Geografia e viagens - brasil</option>
<option value="Geografia e viagens">Geografia e viagens</option>
<option value="Gravuras">Gravuras</option>
<option value="Hist??ria da am??rica do norte">Hist??ria da am??rica do norte</option>
<option value="Hist??ria da am??rica do sul">Hist??ria da am??rica do sul</option>
<option value="Hist??ria da europa">Hist??ria da europa</option>
<option value="Hist??ria da ??frica">Hist??ria da ??frica</option>
<option value="Hist??ria da ??sia">Hist??ria da ??sia</option>
<option value="Hist??ria de outras regi??es">Hist??ria de outras regi??es</option>
<option value="Hist??ria do Brasil">Hist??ria do Brasil</option>
<option value="Hist??ria do cristianismo">Hist??ria do cristianismo</option>
<option value="Hist??ria do mundo antigo at?? ca. 499">Hist??ria do mundo antigo at?? ca. 499</option>
<option value="Humor e s??tira brasileiros">Humor e s??tira brasileiros</option>
<option value="Jornalismo, editora????o e imprensa document??ria e educativa">Jornalismo, editora????o e imprensa document??ria e educativa</option>
<option value="Linguagem e l??nguas">Linguagem e l??nguas</option>
<option value="Lingu??stica">Lingu??stica</option>
<option value="Literatura alem??">Literatura alem??</option>
<option value="Literatura americana">Literatura americana</option>
<option value="Literatura australiana em lingua inglesa">Literatura australiana em lingua inglesa</option>
<option value="Literatura brasileira">Literatura brasileira</option>
<option value="Literatura e ret??rica">Literatura e ret??rica</option>
<option value="Literatura espanhola">Literatura espanhola</option>
<option value="Literatura francesa">Literatura francesa</option>
<option value="Literatura grega">Literatura grega</option>
<option value="Literatura inglesa">Literatura inglesa</option>
<option value="Literatura italiana">Literatura italiana</option>
<option value="Literatura latina">Literatura latina</option>
<option value="Literatura portuguesa">Literatura portuguesa</option>
<option value="L??ngua alem??">L??ngua alem??</option>
<option value="L??ngua espanhola">L??ngua espanhola</option>
<option value="L??ngua francesa">L??ngua francesa</option>
<option value="L??ngua grega cl??ssica e moderna">L??ngua grega cl??ssica e moderna</option>
<option value="L??ngua inglesa">L??ngua inglesa</option>
<option value="L??ngua italiana">L??ngua italiana</option>
<option value="L??ngua latina">L??ngua latina</option>
<option value="L??ngua portuguesa">L??ngua portuguesa</option>
<option value="L??gica">L??gica</option>
<option value="Manufatura para usos espec??ficos">Manufatura para usos espec??ficos</option>
<option value="Manuscritos, obras raras e outros materiais raros impressos">Manuscritos, obras raras e outros materiais raros impressos</option>
<option value="Matem??tica">Matem??tica</option>
<option value="Medicina e sa??de">Medicina e sa??de</option>
<option value="Metaf??sica">Metaf??sica</option>
<option value="Miscel??nea de escritos brasileiros (inclui mais de um gen??ro e cr??nica e literatura infanto-juvenil brasileira)">
<option value="Moral crist?? e teologia devocional">Moral crist?? e teologia devocional</option>
<option value="M??sica">M??sica</option><option value="Artes c??nicas e recreativas">Artes c??nicas e recreativas</option>
<option value="oriente">Oriente</option>
<option value="Outras literaturas">Outras literaturas</option>
<option value="Outras l??nguas">Outras l??nguas</option>
<option value="Outras religi??es">Outras religi??es</option>
<option value="Paleontologia">Paleontologia</option>
<option value="Paleozoologia"> Paleozoologia</option>
<option value="Parapsicologia, ocultismo e espiritismo">Parapsicologia, ocultismo e espiritismo</option>
<option value="Peri??dicos">Peri??dicos</option>
<option value="Pintura">Pintura</option>
<option value="Planejamento urbano e paisagismo">Planejamento urbano e paisagismo</option>
<option value="Plantas (bot??nica)">Plantas (bot??nica)</option>
<option value="Poesia brasileira">Poesia brasileira</option>
<option value="Produtos manufaturados">Produtos manufaturados</option>
<option value="Psicologia">Psicologia</option>
<option value="Qu??mica e ci??ncias afins">Qu??mica e ci??ncias afins</option>
<option value="Religi??o">Religi??o</option>
<option value="Servi??os e problemas sociais">Servi??os e problemas sociais</option>
<option value="Sociedades, organiza????es e museologia">Sociedades, organiza????es e museologia</option>
<option value="Teatro brasileiro">Teatro brasileiro</option>
<option value="Tecnologia (ci??ncias aplicadas)"> Tecnologia (ci??ncias aplicadas)</option>
<option value="Teologia social e eclesi??stica crist??">Teologia social e eclesi??stica crist??</option>
<option value="Teoria do conhecimento, causalidade e ser humano">Teoria do conhecimento, causalidade e ser humano</option>
<option value="Usos e costumes, etiqueta e folclore">Usos e costumes, etiqueta e folclore</option>

Miscel??nea de escritos brasileiros (inclui mais de um gen??ro e cr??nica e literatura infanto-juvenil brasileira)</option>

                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="edserie_colecao" name="edserie_colecao" placeholder="Informe a s??rie ou a cole????o"> 
                                </div>
                                 
                                <div class="col-xs-2">
                                    <input type="number" class="form-control" id="ednumeropg" name="ednumeropg" placeholder="Informe o n??mero de p??ginas" min="0">
                                </div>
                            </div>
                    <br><br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-12">
                                    <label>Detalhes</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="eddetalhes" id="eddetalhes" placeholder="Informe os detalhes">
                                </div>
                            </div>
                            
                   
 
    </div>
           <br><br><br><div class="modal-footer">
		   
		   
		   
		   <center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDados">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarAcervo">
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
        
        <div class="col-md-12 column">
        <div class="modal large-12" id="PesquisarAutores" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                           Sele????o Autores
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="tab-pane active" id="panel-168546">
                            
                                <div class="col-xs-12">
                                        <div class="col-xs-12">
                                            <div class="col-xs-4">
                                                <label>Pesquisa por</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <label>Chave de Busca</label>
                                            </div>
                                        </div>
                                </div>
                            <br><div class="col-xs-12">                          
                                    <div class="col-xs-4">                          
                                        <select  class="form-control" id="tipo_pesquisa" >
                                            <option value="nome">Nome</option>
                                            <option value="sobrenome">Sobrenome</option>
                                            <option value="formato_citacao">Formato Cita????o</option>
                                        </select>    
                                    </div>
                                    <div class="col-xs-8">                          
                                        <input type="text" class="form-control" id="chave" >
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">                          
                                    <div class="col-xs-12">
                                        <br><div class="col-xs-6">
                                            <button id="btPesquisarAutores" class=" btn btn-primary"><i class="fa fa-search"></i> Pesquisar Autores</button>
                                        </div><br><br>
                                    </div>  
                                </div>
                           
                            <br><br> <table id="tblAutores" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                                 <br><thead>
                                                     <tr>
                                                     <th>Id</th>
                                                     <th>Nome</th>
                                                     <th>Sobrenome</th>
                                                     <th>Formato Cita????o</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody></tbody>
                                         </table>
                        </div><br><br>
                        <div class="modal-footer">
						
						
						<center>   
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btfecharPesquisarAutores" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar  
		</button>   
    </div> 
     
    
</center>
						
                            </div>
                    </div>
                </div>
            </div>
        </div>
            
      <!--  <div class="col-md-12 column">
            <div class="modal fade" id="RemoverAutores" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                    <form role="form" method="post" action="autores_controller/excluir_acervo" name="remover_autor">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Remover o  Autor
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="autoresre" name="autoresre" />
                                 Tem certeza que deseja excluir esse Autor? <b><span id="spanDadosRemoverAutor"></span></b>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal" id="btFecharRemoverAutor">Fechar</button> 
                                 <input type="button" id="btRemoverAutor" class="btn btn-primary" value="Remover" />
                             </div>
                         </div>
                     </form>
                 </div>
             </div>!-->
            
         </div>
    </div>
     </div>
</div>  
</div>
<script src="<?php echo base_url(); ?>utils/js/ajax/acervo.js"></script>

