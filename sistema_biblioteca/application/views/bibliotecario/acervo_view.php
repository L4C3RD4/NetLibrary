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
    <!--Nome Principal da PÃ¡gina!-->
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
                <li>
                   <a href="#panel-190070" data-toggle="tab" id="tab_manutencao_autores">Manutenção de Autores</a>
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
                                    <th>Gênero</th>                                            
                                    <th>Ano de publicação</th>                                            
                                    <th>ISBN</th>
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>
                        <br/><br/>                
            </div>
            <div class="tab-pane" id="panel-190070">
                <br/>
                    <h4>Manutenção de Autores do Acervo </h4>
                        <hr/>
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <label>Material Selecionado</label>
                            </div>
                                <div class="col-xs-6">
                                    <input type="hidden" name="material" id="material">                                    
                                    <label id="idacervo_titulo">Código</label><span id="value_idacervo"></span>
                                      <label id="titulo_titulo">Título</label> <span id="value_titulo"></span>&nbsp&nbsp
                                    <br/><label id="tipo_titulo">Tipo</label> <span id="value_tipo"></span>&nbsp&nbsp
                                      <label id="editora_titulo">Editora</label> <span id="value_editora"></span>&nbsp&nbsp
                                      <label id="ano_publicacao_titulo">Publicação</label> <span id="value_ano_publicacao"></span>&nbsp&nbsp
                                      <label id="isbn_titulo">ISBN</label> <span id="value_isbn"></span>&nbsp&nbsp                                    
                                </div>
                            </div>
                            <p><label>Todos os Autores Já Cadastrados para Esse Material</label></p>
                            <table id="tblAutoresAcervo" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Nome</th>                                            
                                    <th>Sobrenome</th>                                            
                                    <th>Citação</th>                                            
                                    <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                        </table>

                 <div class="col-xs-12">
                <div class="col-xs-3">
                    <a href='#PesquisarAutores' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'>
                        <i class="fa fa-search"></i> Adicionar Autor
                    </a>
                </div>
                </div>       
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
                                    <label>Tipo Material</label>
                                </div>
                                 <div class="col-xs-4">
                                    <label>Tipo Documento</label>
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
                                    <select class="form-control" id="tipo_material">
                                        <option value="Referencia">Referência</option>
                                        <option value="Paradidatico">Paradidático</option>
                                        <option value="Literatura Adulta">Literatura Adulta</option>
                                        <option value="Literatura Infantojuvenil">Literatura Infantojuvenil</option>
                                        <option value="Literatura Infantil">Literatura Infantil</option>
                                    </select>
                                </div>
                            </div>
                           <hr/> <div class="col-xs-12">
                               <br/>
                                <div class="col-xs-3">
                                    <label>Editora</label>
                                </div>
                               <div class="col-xs-3">
                                    <label>Ano de publicação</label>
                                </div> 
                               <div class="col-xs-3">
                                    <label>Edição</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Volume</label>
                                </div>                               
                            </div><br>
                            <div class="col-xs-12"> 
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="editora" name="editora" placeholder="Infome a editora"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="anopublicacao" name="anopublicacao" placeholder="Infome o ano de publicação"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edicao" name="edicao" placeholder="Informe o número da edição ">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="volume" name="volume" placeholder="Infome o volume"> 
                                </div>
                                
                            </div>   
                                
                    <div class="col-xs-12">
                        <br/>
                                <div class="col-xs-3">
                                    <label>País de Origem</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Idioma</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>ISBN</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Número de Páginas</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="local" name="local" placeholder="Informe o páis de origem">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="idioma" name="idioma" placeholder="Infome o idioma"> 
                                </div>                                
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Informe o ISBN">
                                </div>
                                <div class="col-xs-3">                                    
                                    <input type="number" class="form-control" id="numeropg" name="numeropg" placeholder="Informe o número de páginas" min="0">
                                </div>
                                
                                </div>
                            
                    <div class="col-xs-12">
                        <br/>
                                <div class="col-xs-4">
                                    <label>Assunto</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>Série/ Coleção</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>Gênero</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-4">
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
                                <div class="col-xs-4">
                                    <select id="genero" name="genero" class="form-control">
                                        <option value="">Selecione um Gênero</option>
                                        <option value="Poesia/ Poema">Poesia/ Poema </option>
                                        <option value="Romance">Romance</option>
                                        <option value="Teatro">Teatro</option>
                                        <option value="Crônica">Crônica</option>
                                        <option value="Suspense/ terror">Suspense/ terror </option>
                                        <option value="Conto">Conto</option>
                                        <option value="Fábula">Fábula</option>
                                    </select>
                                </div>
                            </div>
                    <div class="col-xs-12">
                        <br/>
                                <div class="col-xs-12">
                                    <label>Resumo das Informações</label>
                                </div>
                            </div>
                    <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" id="resumo" name="resumo" placeholder="Infome o Resumo das informações">                                     
                                </div>
                        </div>                                  
                   <div class="col-xs-12">
                        <br>
                                <div class="col-xs-12">
                                    <label>Características</label>
                                </div>
                            </div>
                    <br><br><div class="col-xs-12">
                                <div class="col-xs-12">
                                    <label class="radio-inline">
                                        <input type="checkbox" name="caixa_alta" id="caixa_alta" value="Caixa Alta" > Caixa Alta
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="livro_iamgem" id="livro_iamgem" value="Livro de Imagem"> Livro de Imagem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="audiolivro" id="audiolivro" value="Audiolivro"> Audiolivro
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="braille" id="braille" value="Braille"> Braille
                                    </label>
                                   <label class="radio-inline">
                                        <input type="checkbox" name="kit_afro" id="kit_afro" value="Kit Afro (SEDUC e outros)"> Kit Afro (SEDUC e outros) 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="inclusao" id="inclusao" value="Inclusao"> Inclusão
                                    </label>
                                     <br><br><br><label class="radio-inline">
                                        <input type="checkbox" name="diversidade" id="diversidade" value="Diversidade"> Diversidade 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="programas_mec" id="programas_mec" value="Programas do MEC (PNBE, PNAIC, PNLD Literário, outros)"> Programas do MEC (PNBE, PNAIC, PNLD Literário, outros) 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="historia_quadrinhos" id="historia_quadrinhos" value="historia_quadrinhos"> História em quadrinhos/ mangás  
                                    </label>
                                </div>
                        <br>
                            </div>
                    <div class="col-xs-12"><br/><br/></div>
                    <br/><br><br><br><br><br>
                                <h4>Autores da Obra</h4>
                                <hr/>
                                <div class="col-xs-12" id="codigo_autores">
                                    <div class="col-xs-3">
                                        <a href='#PesquisarAutores' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-pesquisar'><i class="fa fa-search"></i> Pesquisar Autor</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Autor Principal: </label><select id="autor_principal_selecao" class="form-control"></select>
                                    </div>
                                </div>                                        
                                    <div class="col-xs-12" id="campos_autores" >
                                    <div class="col-xs-3">                                        
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="hidden" name="autores" id="autores">&nbsp&nbsp
                                        <label id="lbAltoresSelecionados"></label>&nbsp&nbsp
                                        <span id="btEsconder_campos_autores"></span>
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
         <button type="button" class="btn btn-success" id="btcadastrarAcervo">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cadastrar no Acervo
         </button>   
    </div>
    </div>
</center>							
							
                        <br/><br/>
                    </form>
                </div>
                </div>                       
            </div>
     </div>
    
                      
   
<!-- /.container-fluid -->


    <div class="col-md-12 column">
        <div class="modal fade" id="excluirAutorAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                    <form role="form" method="post" action="acervo_controller/excluir_acervo" name="">
                         <div class="modal-content">
                             <div class="modal-header bg-danger">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                 <h4 class="modal-title" id="myModalLabel">
                                     Excluir Autor do Material
                                 </h4>
                             </div>
                             <div class="modal-body">
                                 <input type="hidden" id="idAutorMaterialex" name="idAutorMaterialex" />
                                 Tem certeza que deseja excluir esse Autor do Material? <b><span id="spanDadosAutorMaterial"></span></b>
                             </div>
                             <div class="modal-footer">
							  
    <div class="col-xs-12">                             
         <center> 
        <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirAutorAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirAutorAcervo">
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
    

<!--Alterar Dados do Acervo!-->
    <div class="col-md-12 column">
        <div class="modal fade" id="excluirAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                    <form role="form" method="post" action="acervo_controller/excluir_acervo" name="">
                         <div class="modal-content">
                             <div class="modal-header bg-danger">
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
							  
    <div class="col-xs-12">                             
         <center> 
        <div class="col-xs-6">                                            
		<button type="button" class="btn btn-danger " id="btFecharExcluirAcervo" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
    </div> 
    <div class="col-xs-6">                                            
         <button type="button" class="btn btn-success" id="btExcluirAcervo">
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
         <!--Alterar Dados do Acervo!-->
    <div class="col-md-12 column">
        <div class="modal fade" id="alterarAcervo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
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
                                    <label>Tipo Material</label>
                                </div>
                                 <div class="col-xs-4">
                                    <label>Tipo Documento</label>
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
                                    <select class="form-control" id="edtipo_material" name="edtipo_material">
                                        <option value="Referencia">Referência</option>
                                        <option value="Paradidatico">Paradidático</option>
                                        <option value="Literatura Adulta">Literatura Adulta</option>
                                        <option value="Literatura Infantojuvenil">Literatura Infantojuvenil</option>
                                        <option value="Literatura Infantil">Literatura Infantil</option>
                                    </select>
                                </div>
                            </div>
                           <div class="col-xs-12">
                               <br/>
                                <div class="col-xs-3">
                                    <label>Editora</label>
                                </div>
                               <div class="col-xs-3">
                                    <label>Ano de publicação</label>
                                </div> 
                               <div class="col-xs-3">
                                    <label>Edição</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Volume</label>
                                </div>                               
                            </div><br>
                            <div class="col-xs-12"> 
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="ededitora" name="ededitora" placeholder="Infome a editora"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edanopublicacao" name="edanopublicacao" placeholder="Infome o ano de publicação"> 
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="ededicao" name="ededicao" placeholder="Informe o número da edição ">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edvolume" name="edvolume" placeholder="Infome o volume"> 
                                </div>
                                
                            </div>   
                                
                    <div class="col-xs-12">
                        <br/>
                                <div class="col-xs-3">
                                    <label>País de Origem</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Idioma</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>ISBN</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Número de Páginas</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edlocal" name="edlocal" placeholder="Informe o páis de origem">
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edidioma" name="edidioma" placeholder="Infome o idioma"> 
                                </div>                                
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="edisbn" name="edisbn" placeholder="Informe o ISBN">
                                </div>
                                <div class="col-xs-3">                                    
                                    <input type="number" class="form-control" id="ednumeropg" name="ednumeropg" placeholder="Informe o número de páginas" min="0">
                                </div>
                                
                                </div>
                            
                    <div class="col-xs-12">
                        <br/>
                                <div class="col-xs-4">
                                    <label>Assunto</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>Série/ Coleção</label>
                                </div>
                                <div class="col-xs-4">
                                    <label>Gênero</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-4">
                                    <select class="form-control" name="edassunto" id="edassunto">

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
                                    <input type="text" class="form-control" id="edserie_colecao" name="edserie_colecao" placeholder="Informe a série ou a coleção"> 
                                </div>
                                <div class="col-xs-4">
                                    <select id="edgenero" name="edgenero" class="form-control">
                                        <option value="">Selecione um Gênero</option>
                                        <option value="Poesia/ Poema">Poesia/ Poema </option>
                                        <option value="Romance">Romance</option>
                                        <option value="Teatro">Teatro</option>
                                        <option value="Crônica">Crônica</option>
                                        <option value="Suspense/ terror">Suspense/ terror </option>
                                        <option value="Conto">Conto</option>
                                        <option value="Fábula">Fábula</option>
                                    </select>
                                </div>
                            </div>
                    <div class="col-xs-12">
                        <br/>
                                <div class="col-xs-12">
                                    <label>Resumo das Informações</label>
                                </div>
                            </div>
                    <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" id="edresumo" name="edresumo" placeholder="Infome o Resumo das informações">                                     
                                </div>
                        </div>
                    <br><br><div class="col-xs-12">
                        <br>
                                <div class="col-xs-12">
                                    <label>Detalhes</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                    <label class="radio-inline">
                                        <input type="checkbox" name="edcaixa_alta" id="edcaixa_alta" value="Caixa Alta"> Caixa Alta
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="edlivro_imagem" id="edlivro_iamgem" value="Livro de Imagem"> Livro de Imagem
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="edaudiolivro" id="edaudiolivro" value="Audiolivro"> Audiolivro
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="edbraille" id="edbraille" value="Braille"> Braille
                                    </label>
                                   <label class="radio-inline">
                                        <input type="checkbox" name="edkit_afro" id="edkit_afro" value="Kit Afro (SEDUC e outros)"> Kit Afro (SEDUC e outros) 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="edinclusao" id="edinclusao" value="Inclusao"> Inclusão
                                    </label>
                                     <br><br><br><label class="radio-inline">
                                        <input type="checkbox" name="eddiversidade" id="eddiversidade" value="Diversidade"> Diversidade 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="edprogramas_mec" id="edprogramas_mec" value="Programas do MEC (PNBE, PNAIC, PNLD Literário, outros)"> Programas do MEC (PNBE, PNAIC, PNLD Literário, outros) 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="edhistoria_quadrinhos" id="edhistoria_quadrinhos" value="historia_quadrinhos"> História em quadrinhos/ mangás  
                                    </label>                                     
                            </div>                  

    </div>
                    <br/><br/><br/><br/>
                    <br/><br/><br/><br/>
                    <br/><br/><br/><br/>
                    <br/><br/><br/><br/>
                    <br/><br/><br/><br/>
                    <br/><br/><br/><br/>
                    <div class="modal-footer">
					<center>   
    <div class="col-xs-12"> 
        <br/>
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
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar Alterações
         </button>   
    </div>
    </div>
</center>
                        
</form>
        <!--<input type="submit" class="btn btn-primary" value="Salvar" />*/-->
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
                                            <div class="col-xs-6">
                                                <label>Chave de Busca</label>
                                            </div>
                                            <div class="col-xs-2">
                                                
                                            </div>
                                        </div>
                                </div>
                            <br><div class="col-xs-12">                          
                                    <div class="col-xs-4">                          
                                        <select  class="form-control" id="tipo_pesquisa" >
                                            <option value="nome">Nome</option>
                                            <option value="sobrenome">Sobrenome</option>
                                            <option value="formato_citacao">Formato Citação</option>
                                        </select>    
                                    </div>
                                    <div class="col-xs-6">                          
                                        <input type="text" class="form-control" id="chave" >
                                    </div>
                                    <div class="col-xs-2">
                                        <button id="btPesquisarAutores" class=" btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>
                                    </div>
                                </div>
                                
                           
                            <br><br> <table id="tblAutores" class="table table-striped table-bordered" cellspacing="0" width="100%" >
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
                            <!--button type="button" class="btn btn-default btn-fechar" data-dismiss="modal" id="btfecharPesquisarAutores">Fechar</button-->
                            <button type="button" class="btn btn-danger " id="btfecharPesquisarAutores" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar  
		</button>   
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
<script src="<?php echo base_url(); ?>utils/js/ajax/acervo.js"></script>

