<div id="page-wrapper"> 
    <div class="fluid-container">
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
    <div class="col-lg-12">
        <h1 class="page-header">PESQUISA AO ACERVO DA BIBLIOTECA</h1>
    </div>
        <div id="pesquisa">
          <!--<img style="margin-top: 50px;margin-left: 30%;margin-right:5%; height: 300px;" src="utils/img/icone-biblioteca-maior.png" alt="Logo do Site"/>-->
                <form role="form" method="post"  name="pesquisa-acervo">
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <label>Busca por</label>
                                </div>
                                <div class="col-xs-6">
                                    <label>Digite a chave de busca:</label> 
                                </div>
                                 <div class="col-xs-3">
                                    <label>Tipo de Material</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-3">
                                    <select class="form-control" name="tipo_busca" id="tipo_busca">
                                        <option value="titulo">Título</option>
                                        <option value="autor">Autor</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="chave_pesquisa" name="chave_pesquisa">
                                </div>   
                                 <div class="col-xs-3">
                                    <select class="form-control" name="tipo_material" id="tipo_material">
                                        <option value="todos">Todos</option>
                                        <option value="livro">livro</option>
                                        <option value="revista">revista</option>
                                        <option value="cd">CD</option>
                                        <option value="DVD">DVD</option>
                                    </select>
                                </div>
                            </div>
                    
                             <div class="col-xs-12">
                                <br><div class="col-xs-3">
                                    <label>Editora</label>
                                </div>
                                <div class="col-xs-3">
                                    <label>Localização</label>
                                </div>                                
                                <div class="col-xs-3">
                                    <label>Assunto</label>
                                </div>                                
                                <div class="col-xs-3">
                                    <label>Gênero</label>
                                </div>                                
                                
                            </div>
                            <div class="col-xs-12">
                      
                               
                                <div class="col-xs-3">
                                    <select class="form-control" name="editora" id="editora">
                                
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control" name="localizacao" id="localizacao">
                                       
                                    </select>                                
                                </div>
                                <div class="col-xs-3">
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
                                <div class="col-xs-3">
                                    <select class="form-control" id="genero" name="genero">
                                        <option value=""> Selecione um gênero</option>
                                        <option value="Poesia/ Poema">Poesia/ Poema </option>
                                        <option value="Romance">Romance</option>
                                        <option value="Teatro">Teatro</option>
                                        <option value="Crônica">Crônica</option>
                                        <option value="Suspense/ terror">Suspense/ terror </option>
                                        <option value="Conto">Conto</option>
                                        <option value="Fábula">Fábula</option>
                                         <option value="Cordel">Cordel</option>
                                    </select>
                                </div>
                            </div>
                    <div class="col-xs-12">
                        <br><div class="col-xs-3">                                            
                            <button type="button" class="btn btn-primary " id="btpesquisa">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar no Acervo
                            </button>   
                        </div>
                    </div> 
                    </form>


                    </div>
                    <div id="resultados_busca">
                    <br />
                                <h4> Todos os materiais encontrados </h4>
                                <hr />
                                <table id="tblPesquisa" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                    <thead>
                                        <tr>
                                            <th>Id Acervo Biblioteca </th>
                                            <th>Título</th>                                            
                                            <th>Autor</th>                                            
                                            <th>Tipo</th>                                            
                                            <th>Editora</th>                                            
                                            <th>Ano Publicação</th>                                            
                                            <th>Localização</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                               <label>Legenda</label>&nbsp;&nbsp;&nbsp;<span style="color: green;">Disponível</span>&nbsp;&nbsp;&nbsp;<span style="color: orange;">Emprestado</span>&nbsp;&nbsp;&nbsp;<span style="color: gray;">Possui Reservas</span>&nbsp;&nbsp;&nbsp;<span style="color: red;">Indisponível</span>
                                <br/>
                                <br><br><br><br><div class="col-xs-8">
                              
                                <div class="col-xs-4">                                            
                                    <button type="reset" class="btn btn-primary" id="resetarPesquisa">
                                        <span class="fa fa-eraser" aria-hidden="true"></span> Nova Pesquisa
                                    </button>   
                                </div>
                            </div>
                        <br/><br/>
                    </div>
        
        
</div>

</div>
    <script src="<?php echo base_url(); ?>utils/js/ajax/pesquisa_bibliotecario.js"></script>