<div id="page-wrapper">      
    <div class="container-fluid">
    <!-- Page Heading -->
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
        <h1 class="page-header">CADASTRO DE ACERVOS DA BIBLIOTECA</h1>
    </div>
      <div class="col-md-12 column">
        <div class="tabbable" id="tabs-442075">
            <ul class="nav nav-tabs">
                <li class="active">
                   <a href="#panel-168546" data-toggle="tab" id="tab_lista_bibliotecas">Listagem de Acervos cadastrados</a>
                </li>
                <li>
                   <a href="#panel-190060" data-toggle="tab" id="tab_cadastra_bibliotecas">Cadastrar Novo Acervo</a>
                </li>                            
            </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="panel-168546">
                <br/>
                    <h4>Todos os acervos cadastrados </h4>
                        <hr/>
                            <table id="tblAcervoBibliotecas" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Biblioteca</th>                                            
                                    <th>Material</th>                                            
                                    <th>Tipo</th>                                            
                                    <th>Código Exemplar</th>                                            
                                    <th>Data Aquisição</th>                                            
                                    <th>Tipo de Aquisição</th>                                            
                                    <th>Autor</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                        <label>Legenda</label>&nbsp;&nbsp;&nbsp;<span style="color: green;">Disponível</span>&nbsp;&nbsp;&nbsp;<span style="color: orange;">Emprestado</span>&nbsp;&nbsp;&nbsp;<span style="color: red;">Indisponível</span>
            </div>
                <div class="tab-pane" id="panel-190060">
                <br/>
                <form role="form" method="post" action="acervo_biblioteca_controller/cadastrar_acervo_biblioteca" name="cadastrar_acervo_biblioteca" id="cadastrar_acervo_biblioteca" >
                    <input type="hidden" name="idacervo" id="idacervo" value="0"/>
                            <!--<h4>Selecione Biblioteca</h4>-->
                            <hr/>
                                <div class="col-xs-12">
<!--                                    <div class="col-xs-6">
                                      <select id="biblioteca" name="biblioteca" class="form-control">
                                          
                                      </select>
                                    </div>                                 -->
                                    <?php
                                        $session_data = $this->session->userdata('logged_in');
                                        $biblioteca = $session_data['biblioteca'];
                                    ?>
                                </div>
                                <div class="col-xs-12">
                            <div class="col-xs-6">
                                <label>Bibliotecário</label>&nbsp<span id="bibliotecario"></span>
                            </div>
                            <div class="col-xs-6">
                                <label>Biblioteca</label>&nbsp<span id="biblioteca"></span>
                            </div>
                                </div>
                                <br/><br><br>
                                <h4>Material</h4>
                                <hr/>
                                <div class="col-xs-12" id="codigo_material">
                                    <div class="col-xs-6">
                                        <a href='#PesquisarAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'><i class="fa fa-search"></i> Pesquisar Material</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="hidden" name="material" id="material">&nbsp&nbsp
                                        <br><label id="idacervo_titulo"></label><span id="value_idacervo"><input name="idacervo" id="idacervo" type="hidden"/>Clique em "Procurar Acervo" e selecione o mesmo</span>&nbsp&nbsp
                                        <label id="titulo_titulo"></label><span id="value_titulo"></span>&nbsp&nbsp
                                        <br><label id="tipo_titulo"></label><span id="value_tipo"></span>&nbsp&nbsp
                                        <label id="editora_titulo"></label><span id="value_editora"></span>&nbsp&nbsp
                                        <label id="ano_publicacao_titulo"></label><span id="value_ano_publicacao"></span>&nbsp&nbsp
                                        <br><label id="isbn_titulo"></label><span id="value_isbn"></span>&nbsp&nbsp
                                        <label id="status_titulo"></label><span id="value_status"></span>&nbsp&nbsp
                                    </div>
                                </div>
                                
                                <div id="CadastrarAcervo">
                                <form method="post" action="acervo_controller/CadastrarAcervo" name="form_cadastrar_acervo" id="form_cadastrar_acervo">
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
                                    <label>Ano de publicação</label>
                                </div> 
                               <div class="col-xs-3">
                                    <label>País de Origem</label>
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
                                    <input type="text" class="form-control" id="anopublicacao" name="anopublicacao" placeholder="Infome o ano de publicação"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="local" name="local" placeholder="Informe o páis de origem">
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
                                    <label>Resumo das informações</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" id="resumo" name="resumo" placeholder="Infome o Resumo das informações"> 
                                </div>
                            </div>
                    <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Assunto</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>Série/ Coleção</label>
                                </div>
                                <div class="col-xs-2">
                                    <label>Número de páginas</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <select class="form-control" name="assunto" id="assunto">

                                        <option value="">Selecione um assunto</option>
<!--<option value="Administração da família e do lar"> Administração da família e do lar</option>                                       
<option value="Administração e serviços auxiliares">Administração e serviços auxiliares</option>
<option value="Administração pública e ciência militar">Administração pública e ciência militar</option>
<option value="Agricultura e tecnologias relacionadas">Agricultura e tecnologias relacionadas</option>
<option value="Animais (zoologia)">Animais (zoologia)</option>
<option value="Arquitetura">Arquitetura</option>
<option value="Artes gráficas">Artes gráficas</option>
<option value="Artes plásticas">Artes plásticas</option>
<option value="Artes">Artes</option>
<option value="Associações"> Associações</option>
<option value="Assunto não informado">Assunto não informado</option>
<option value="Astronomia e ciências afins">Astronomia e ciências afins</option>
<option value="Bibliografia">Bibliografia</option>
<option value="Biblioteconomia e ciência da informação">Biblioteconomia e ciência da informação</option>
<option value="Biografias, genealogia e insígnia">Biografias, genealogia e insígnia</option>
<option value="Biologia, ciências da vida">Biologia, ciências da vida</option>
<option value="Bíblia">Bíblia</option>
<option value="Cartas brasileiras">Cartas brasileiras</option>
<option value="Ciência da computação, informação e obras gerais">Ciência da computação, informação e obras gerais</option>
<option value="ciências da terra"> Ciências da terra</option>
<option value="Ciência política">Ciência política</option>
<option value="Ciências naturais">Ciências naturais</option>
<option value="Ciências sociais">Ciências sociais</option>
<option value="Coleções de estatísticas gerais">Coleções de estatísticas gerais</option>
<option value="Coleções de obras diversas sem assunto específico">Coleções de obras diversas sem assunto específico</option>
<option value="Comércio, comunicação e transporte">Comércio, comunicação e transporte</option>
<option value="Congregações cristãs, prática e teologia pastoral">Congregações cristãs, prática e teologia pastoral</option>
<option value="Construções">Construções</option>
<option value="Cristianismo e teologia cristã">Cristianismo e teologia cristã</option>
<option value="Denominações e seitas cristãs">Denominações e seitas cristãs</option>
<option value="Desenho e artes decorativas">Desenho e artes decorativas</option>
<option value="Direito">Direito</option>
<option value="Discursos brasileiros">Discursos brasileiros</option>
<option value="Economia doméstica">Economia doméstica</option>
<option value="Economia">Economia</option>
<option value="Educação">Educação</option>
<option value="Enciclopédias gerais">Enciclopédias gerais</option>
<option value="Engenharia química e tecnologias relacionadas">Engenharia química e tecnologias relacionadas</option>
<option value="Engenharia">Engenharia</option>
<option value="Ensaios brasileiros">Ensaios brasileiros</option>
<option value="Escolas filosóficas específicas">Escolas filosóficas específicas</option>
<option value="Escultura">Escultura</option>
<option value="Esportes">Esportes</option>
<option value="Ética">Ética</option>
<option value="Ficção e contos brasileiros">Ficção e contos brasileiros</option>
<option value="Filosofia antiga, medieval e oriental">Filosofia antiga, medieval e oriental</option>
<option value="Filosofia e psicologia">Filosofia e psicologia</option>
<option value="Filosofia e teoria da religião">Filosofia e teoria da religião</option>
<option value="Filosofia moderna ocidental">Filosofia moderna ocidental</option>
<option value="Fotografia e arte por computador">Fotografia e arte por computador</option>
<option value="Física">Física</option>
<option value="Geociências">Geociências</option>
<option value="Geografia e história">Geografia e história</option>
<option value="Geografia e viagens - brasil">Geografia e viagens - brasil</option>
<option value="Geografia e viagens">Geografia e viagens</option>
<option value="Gravuras">Gravuras</option>
<option value="História da américa do norte">História da américa do norte</option>
<option value="História da américa do sul">História da américa do sul</option>
<option value="História da europa">História da europa</option>
<option value="História da áfrica">História da áfrica</option>
<option value="História da ásia">História da ásia</option>
<option value="História de outras regiões">História de outras regiões</option>
<option value="História do Brasil">História do Brasil</option>
<option value="História do cristianismo">História do cristianismo</option>
<option value="História do mundo antigo até ca. 499">História do mundo antigo até ca. 499</option>
<option value="Humor e sátira brasileiros">Humor e sátira brasileiros</option>
<option value="Jornalismo, editoração e imprensa documentária e educativa">Jornalismo, editoração e imprensa documentária e educativa</option>
<option value="Linguagem e línguas">Linguagem e línguas</option>
<option value="Linguística">Linguística</option>
<option value="Literatura alemã">Literatura alemã</option>
<option value="Literatura americana">Literatura americana</option>
<option value="Literatura australiana em lingua inglesa">Literatura australiana em lingua inglesa</option>
<option value="Literatura brasileira">Literatura brasileira</option>
<option value="Literatura e retórica">Literatura e retórica</option>
<option value="Literatura espanhola">Literatura espanhola</option>
<option value="Literatura francesa">Literatura francesa</option>
<option value="Literatura grega">Literatura grega</option>
<option value="Literatura inglesa">Literatura inglesa</option>
<option value="Literatura italiana">Literatura italiana</option>
<option value="Literatura latina">Literatura latina</option>
<option value="Literatura portuguesa">Literatura portuguesa</option>
<option value="Língua alemã">Língua alemã</option>
<option value="Língua espanhola">Língua espanhola</option>
<option value="Língua francesa">Língua francesa</option>
<option value="Língua grega clássica e moderna">Língua grega clássica e moderna</option>
<option value="Língua inglesa">Língua inglesa</option>
<option value="Língua italiana">Língua italiana</option>
<option value="Língua latina">Língua latina</option>
<option value="Língua portuguesa">Língua portuguesa</option>
<option value="Lógica">Lógica</option>
<option value="Manufatura para usos específicos">Manufatura para usos específicos</option>
<option value="Manuscritos, obras raras e outros materiais raros impressos">Manuscritos, obras raras e outros materiais raros impressos</option>
<option value="Matemática">Matemática</option>
<option value="Medicina e saúde">Medicina e saúde</option>
<option value="Metafísica">Metafísica</option>
<option value="Miscelânea de escritos brasileiros (inclui mais de um genêro e crônica e literatura infanto-juvenil brasileira)">
<option value="Moral cristã e teologia devocional">Moral cristã e teologia devocional</option>
<option value="Música">Música</option><option value="Artes cênicas e recreativas">Artes cênicas e recreativas</option>
<option value="oriente">Oriente</option>
<option value="Outras literaturas">Outras literaturas</option>
<option value="Outras línguas">Outras línguas</option>
<option value="Outras religiões">Outras religiões</option>
<option value="Paleontologia">Paleontologia</option>
<option value="Paleozoologia"> Paleozoologia</option>
<option value="Parapsicologia, ocultismo e espiritismo">Parapsicologia, ocultismo e espiritismo</option>
<option value="Periódicos">Periódicos</option>
<option value="Pintura">Pintura</option>
<option value="Planejamento urbano e paisagismo">Planejamento urbano e paisagismo</option>
<option value="Plantas (botânica)">Plantas (botânica)</option>
<option value="Poesia brasileira">Poesia brasileira</option>
<option value="Produtos manufaturados">Produtos manufaturados</option>
<option value="Psicologia">Psicologia</option>
<option value="Química e ciências afins">Química e ciências afins</option>
<option value="Religião">Religião</option>
<option value="Serviços e problemas sociais">Serviços e problemas sociais</option>
<option value="Sociedades, organizações e museologia">Sociedades, organizações e museologia</option>
<option value="Teatro brasileiro">Teatro brasileiro</option>
<option value="Tecnologia (ciências aplicadas)"> Tecnologia (ciências aplicadas)</option>
<option value="Teologia social e eclesiástica cristã">Teologia social e eclesiástica cristã</option>
<option value="Teoria do conhecimento, causalidade e ser humano">Teoria do conhecimento, causalidade e ser humano</option>
<option value="Usos e costumes, etiqueta e folclore">Usos e costumes, etiqueta e folclore</option>

Miscelânea de escritos brasileiros (inclui mais de um genêro e crônica e literatura infanto-juvenil brasileira)</option>-->
<option value="000 – GENERALIDADES ">000 – GENERALIDADES </option>
<option value="028 – LITERATURA INFANTIL">028 – LITERATURA INFANTIL</option>
<option value="028.5 – LITERATURA INFANTO-JUVENIL">028.5 – LITERATURA INFANTO-JUVENIL</option>
<option value="100 – FILOSOFIA ">100 – FILOSOFIA </option>
<option value="150-  PSICOLOGIA">150-  PSICOLOGIA</option>
<option value="200- RELIGIÃO">200- RELIGIÃO</option>
<option value="300 – CIÊNCIAS SOCIAIS / SOCIOLOGIA">300 – CIÊNCIAS SOCIAIS / SOCIOLOGIA</option>
<option value="370 – EDUCAÇÃO">370 – EDUCAÇÃO</option>
<option value="398 – FOLCLORE">398 – FOLCLORE</option>
<option value="400- LINGUAGEM/ LINGUÍSTICA">400- LINGUAGEM/ LINGUÍSTICA</option>
<option value="500 – CIÊNCIAS NATURAIS">500 – CIÊNCIAS NATURAIS</option>
<option value="510 – MATEMÁTICA">510 – MATEMÁTICA</option>
<option value="530 – FÍSICA">530 – FÍSICA</option>
<option value="540 – QUÍMICA">540 – QUÍMICA</option>
<option value="570 – BIOLOGIA">570 – BIOLOGIA</option>
<option value="600 – CIÊNCIAS APLICADAS">600 – CIÊNCIAS APLICADAS</option>
<option value="700 – ARTES">700 – ARTES</option>
<option value="800 – LITERATURA">800 – LITERATURA</option>
<option value="B869 – LITERATURA BRASILEIRA (ADULTA)">B869 – LITERATURA BRASILEIRA (ADULTA)</option>
<option value="890 – LITERATURA ESTRANGEIRA (ADULTA)">890 – LITERATURA ESTRANGEIRA (ADULTA)</option>
<option value="900 – HISTÓRIA ">900 – HISTÓRIA </option>
<option value="910 – GEOGRAFIA ">910 – GEOGRAFIA </option>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="serie_colecao" name="serie_colecao" placeholder="Informe a série ou a coleção"> 
                                </div>
                                 
                                <div class="col-xs-2">
                                    <input type="number" class="form-control" id="numeropg" name="numeropg" placeholder="Informe o número de páginas" min="0">
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
                                         <div class="col-xs-12">
                                             <br><div class="col-xs-3">
                                                <button type="button" class="btn btn-primary " id="btCadastrarMaterial">
                                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Cadastrar Material
                                                </button> 
                                             </div>
                                             <div class="col-xs-3">
                                                <button type="button" class="btn btn-danger" id="btCancelarMaterialAcervo">
                                                    <span class="glyphicon glyphicon" aria-hidden="true"></span>Cancelar Material
                                                </button> 
                                             </div>
                                         </div>                                 
                                </div>     
                            <hr/>
                            <br><br><br><div class="col-xs-12">
                                <hr/><div class="col-xs-3">
                                    <label>Código do Exemplar</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Número do Exemplar</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Data de Aquisição</label>
                                </div>
                                 <div class="col-xs-3">
                                    <label>Tipo de aquisição</label>
                                </div>                               
                            </div>
                            <br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="codigo_exemplar" name="codigo_exemplar" placeholder="Infome o código"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="numero_exemplar" name="numero_exemplar" placeholder="Infome o número do exemplar Ex.: 01/01"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" placeholder="Informe a data de aquisição">
                                </div>
                                <div class="col-xs-3">
                                    <select name="tipo_aquisicao" id="tipo_aquisicao" class="form-control">
                                        <option value="compra">Compra</option>
                                        <option value="doacao">Doaçao</option>
                                        <option value="mec pnaic">MEC - PNAIC</option>
                                        <option value="mec pnbe">MEC - PNBE</option>
                                        <option value="mec literario">MEC - PNLD Literário</option>
                                        <option value="permuta">Permuta</option>
                                        <option value="seduc kit literario">SEDUC - Kit Literário</option>
                                        <option value="seduc kit afro">SEDUC - Kit Afro</option>
                                        <option value="suduc kit genese">SEDUC - Kit Gênese</option>
                                    </select>
                                </div>
                                
                            </div>
                             <br><br><br><br> <div class="col-xs-12">
                                 <div class="col-xs-3">
                                    <label>Data Registro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Baixa</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Data da Baixa</label>
                                </div>
                                 <div class="col-xs-3">
                                    <label>Status</label>
                                </div>                                 
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="date" class="form-control" id="data_registro" name="data_registro"> 
                                </div>
                                <div class="col-xs-3">
                                    <select name="baixa" id="baixa" class="form-control">
                                        <option value="1">Não</option>
                                        <option value="0">Sim</option>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <input type="date" class="form-control" id="data_baixa" name="data_baixa">
                                </div>
                                <div class="col-xs-3">
                                       <select type="text" class="form-control" id="status" name="status" placeholder="Informe o status">
                                            <option value="1" style="color: green">Disponível</option>
                                            <option value="0" style="color: orange" >Emprestado</option>
                                            <option value="2" style="color: red">Indisponível</option>
                                        </select>
                                </div>                                 
                            </div>
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Motivo Baixa</label>
                                </div>
                                <div class="col-xs-6">
                                    <label>Observações</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" id="motivo_baixa" name="motivo_baixa" placeholder="Informe o motivos da baixa" class="form-control">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" id="observacoes" name="observacoes" placeholder="Informe observações caso existam" class="form-control">
                                </div>                                
                            </div>
                                                        
                            							<center>   
    <div class="col-xs-12">
        <br/><br/>
    <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="CancelarCadastro" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar Cadastro  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDadosCadastro">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btcadastrarAcervoBiblioteca">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar no Acervo
         </button>   
    </div>
</center>
</div>
                        <br/><br/>
                    </form>
                </div>
            </div>
        </div>
    

<!-- /.container-fluid -->


    <div class="col-md-12 column">
        <div class="modal fade" id="excluirAcervoBiblioteca" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <form method="post">
                         <div class="modal-content">
                             <div class="modal-header bg-danger">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Acervo
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idacervoex" name="idacervoex" />
                                 Tem certeza que deseja excluir o acervo dessa Biblioteca? <b><span id="spanDadosAcervoBiblioteca"></span></b>
                             </div>
                             <div class="modal-footer">
                                 <div class="col-xs-12">								
								<center>   
    <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharAcervoExcluirBiblioteca" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fechar  
		</button>   
    </div> 
    
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirAcervoBiblioteca">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Excluir
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
         <!--Alterar Dados da Biblioteca!-->
    <div class="col-md-12 column">
        <div class="modal fade" id="alterarAcervoBiblioteca" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myModalLabel">
                            Alterar Dados do Acervo da Biblioteca
                        </h4>
                    </div>
    <div class="modal-body">
        <form method="post" name="formalterar" id="formalterar" class="formAtualizarAcervoBiblioteca">
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label>Id</label>
                </div>        
                <input type="hidden" id="edidacervo" name="edidacervo" />
                <div class="col-xs-6" id="valueid" name="valueid"> </div>                                        
            </div>
            
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label> Biblioteca </label>
                </div>
                    
                 <input type="hidden" id="edbiblioteca" name="edbiblioteca" />
                 <div class="col-xs-6" id="valuebiblioteca" name="valuebiblioteca"> </div>  
            </div>
            
            <div class="col-xs-12">
                <div class="col-xs-2">
                    <label> Material </label>
                </div>
                <input type="hidden" id="edmaterial" name="edmaterial" />
                <div class="col-xs-6" id="valuematerial" name="valuematerial"> </div>       
            </div>
            
      <br><br><br><div class="col-xs-12">
                                <hr/><div class="col-xs-3">
                                    <label>Código do Exemplar</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Número do Exemplar</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Data de Aquisição</label>
                                </div>
                                 <div class="col-xs-3">
                                    <label>Tipo de aquisição</label>
                                </div>                               
                            </div>
                            <br><br><div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edcodigo_exemplar" name="edcodigo_exemplar" placeholder="Infome o código"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="ednumero_exemplar" name="ednumero_exemplar" placeholder="Infome o número do exemplar Ex.: 01/01"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="date" class="form-control" id="eddata_aquisicao" name="eddata_aquisicao" placeholder="Informe a data de aquisição">
                                </div>
                                <div class="col-xs-3">
                                    <select name="edtipo_aquisicao" id="edtipo_aquisicao" class="form-control">
                                        <option value="compra">Compra</option>
                                        <option value="doacao">Doaçao</option>
                                        <option value="mec pnaic">MEC - PNAIC</option>
                                        <option value="mec pnbe">MEC - PNBE</option>
                                        <option value="mec literario">MEC - PNLD Literário</option>
                                        <option value="permuta">Permuta</option>
                                        <option value="seduc kit literario">SEDUC - Kit Literário</option>
                                        <option value="seduc kit afro">SEDUC - Kit Afro</option>
                                        <option value="suduc kit genese">SEDUC - Kit Gênese</option>
                                    </select>
                                </div>
                                
                            </div>
                             <br><br><br><br> <div class="col-xs-12">
                                 <div class="col-xs-3">
                                    <label>Data Registro</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Baixa</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Data da Baixa</label>
                                </div>
                                 <div class="col-xs-3">
                                    <label>Status</label>
                                </div>                                 
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="date" class="form-control" id="eddata_registro" name="eddata_registro"> 
                                </div>
                                <div class="col-xs-3">
                                    <select name="edbaixa" id="edbaixa" class="form-control">
                                        <option value="1">Não</option>
                                        <option value="0">Sim</option>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <input type="date" class="form-control" id="eddata_baixa" name="eddata_baixa">
                                </div>
                                <div class="col-xs-3">
                                       <select type="text" class="form-control" id="edstatus" name="edstatus" placeholder="Informe o status">
                                            <option value="1" style="color: green">Disponível</option>
                                            <option value="0" style="color: orange" >Emprestado</option>
                                            <option value="2" style="color: red">Indisponível</option>
                                        </select>
                                </div>                                 
                            </div>
                            <br><br><br><br><div class="col-xs-12">
                                <div class="col-xs-6">
                                    <label>Motivo Baixa</label>
                                </div>
                                <div class="col-xs-6">
                                    <label>Observações</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <input type="text" id="edmotivo_baixa" name="edmotivo_baixa" placeholder="Informe o motivos da baixa" class="form-control">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" id="edobservacoes" name="edobservacoes" placeholder="Informe observações caso existam" class="form-control">
                                </div>                                
                            </div>
                            <br/><br><br>
        </form>
   
        <br><br><div class="modal-footer">
               
        <div class="col-xs-12">                                            
        <div class="col-xs-4">                                            
		<button type="button" class="btn btn-danger " id="btFecharAlterarAcervoBiblioteca" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-4">                                            
       <button type="reset" class="btn btn-warning " id="limparDadosAlteracao">
			<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar Dados
		</button>   
    </div> 
    <div class="col-xs-4">                                            
         <button type="button" class="btn btn-success" id="btAlterarAcervoBiblioteca">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Alterações
         </button>   
    </div>
    </div>
        
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
                            <br><div class="col-xs-12">                          
                                    <div class="col-xs-3">                          
                                        <select  class="form-control" id="tipo_pesquisa" >
                                            <option value="titulo">Título</option>
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
                                                     <th>Assunto</th>
                                                     <th>ISBN</th>
                                                     <th>Ação</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody></tbody>
                                         </table>
                        </div><br><br>
                    <div class="modal-footer">
                        <!--button type="button" class="btn btn-default btn-fechar" data-dismiss="modal" id="btfecharPesquisarAcervo">Fechar</button--> 
                        <button type="button" class="btn btn-danger " id="btCancelarPesquisarAcervo" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
                        </button>   
                        <button class='btn btn-primary' id="BtCadastrarAcervo" type="button"><i class='glyphicon glyphicon-ok'></i>Não Encontrado - Cadastrar Novo Acervo</button>
                    </div>
                    </div>
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
                           Seleção Autores
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
                                        <select  class="form-control" id="tipo_pesquisa_autor" >
                                            <option value="nome">Nome</option>
                                            <option value="sobrenome">Sobrenome</option>
                                            <option value="formato_citacao">Formato Citação</option>
                                        </select>    
                                    </div>
                                    <div class="col-xs-8">                          
                                        <input type="text" class="form-control" id="chave_autor" >
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">                          
                                    <div class="col-xs-12">
                                        <br><div class="col-xs-6">
                                            <button id="btPesquisarAutores" class=" btn btn-primary"><i class="fa fa-search"></i> Pesquisar Autores</button>
                                        </div><br><br>
                                    </div>  
                                </div>
                           
                            <br><br> <table id="tbl_Autores" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                                 <br><thead>
                                                     <tr>
                                                     <th>Id</th>
                                                     <th>Nome</th>
                                                     <th>Sobrenome</th>
                                                     <th>Formato Citação</th>
                                                     <th>Ação</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody></tbody>
                                         </table>
                        </div><br><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-fechar" data-dismiss="modal" id="btfecharPesquisarAutores">Fechar</button> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btCancelarPesquisarAutores">Cancelar</button> 
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

<script src="<?php echo base_url(); ?>utils/js/ajax/acervo_biblioteca.js"></script>

