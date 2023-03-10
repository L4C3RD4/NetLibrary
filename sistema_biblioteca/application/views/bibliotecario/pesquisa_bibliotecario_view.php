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
                                        <option value="titulo">T??tulo</option>
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
                                    <label>Localiza????o</label>
                                </div>                                
                                <div class="col-xs-3">
                                    <label>Assunto</label>
                                </div>                                
                                <div class="col-xs-3">
                                    <label>G??nero</label>
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
<!--<option value="Administra????o da fam??lia e do lar"> Administra????o da fam??lia e do lar</option>                                       
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

Miscel??nea de escritos brasileiros (inclui mais de um gen??ro e cr??nica e literatura infanto-juvenil brasileira)</option>-->
<option value="000 ??? GENERALIDADES ">000 ??? GENERALIDADES </option>
<option value="028 ??? LITERATURA INFANTIL">028 ??? LITERATURA INFANTIL</option>
<option value="028.5 ??? LITERATURA INFANTO-JUVENIL">028.5 ??? LITERATURA INFANTO-JUVENIL</option>
<option value="100 ??? FILOSOFIA ">100 ??? FILOSOFIA </option>
<option value="150-  PSICOLOGIA">150-  PSICOLOGIA</option>
<option value="200- RELIGI??O">200- RELIGI??O</option>
<option value="300 ??? CI??NCIAS SOCIAIS / SOCIOLOGIA">300 ??? CI??NCIAS SOCIAIS / SOCIOLOGIA</option>
<option value="370 ??? EDUCA????O">370 ??? EDUCA????O</option>
<option value="398 ??? FOLCLORE">398 ??? FOLCLORE</option>
<option value="400- LINGUAGEM/ LINGU??STICA">400- LINGUAGEM/ LINGU??STICA</option>
<option value="500 ??? CI??NCIAS NATURAIS">500 ??? CI??NCIAS NATURAIS</option>
<option value="510 ??? MATEM??TICA">510 ??? MATEM??TICA</option>
<option value="530 ??? F??SICA">530 ??? F??SICA</option>
<option value="540 ??? QU??MICA">540 ??? QU??MICA</option>
<option value="570 ??? BIOLOGIA">570 ??? BIOLOGIA</option>
<option value="600 ??? CI??NCIAS APLICADAS">600 ??? CI??NCIAS APLICADAS</option>
<option value="700 ??? ARTES">700 ??? ARTES</option>
<option value="800 ??? LITERATURA">800 ??? LITERATURA</option>
<option value="B869 ??? LITERATURA BRASILEIRA (ADULTA)">B869 ??? LITERATURA BRASILEIRA (ADULTA)</option>
<option value="890 ??? LITERATURA ESTRANGEIRA (ADULTA)">890 ??? LITERATURA ESTRANGEIRA (ADULTA)</option>
<option value="900 ??? HIST??RIA ">900 ??? HIST??RIA </option>
<option value="910 ??? GEOGRAFIA ">910 ??? GEOGRAFIA </option>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control" id="genero" name="genero">
                                        <option value=""> Selecione um g??nero</option>
                                        <option value="Poesia/ Poema">Poesia/ Poema </option>
                                        <option value="Romance">Romance</option>
                                        <option value="Teatro">Teatro</option>
                                        <option value="Cr??nica">Cr??nica</option>
                                        <option value="Suspense/ terror">Suspense/ terror </option>
                                        <option value="Conto">Conto</option>
                                        <option value="F??bula">F??bula</option>
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
                                            <th>T??tulo</th>                                            
                                            <th>Autor</th>                                            
                                            <th>Tipo</th>                                            
                                            <th>Editora</th>                                            
                                            <th>Ano Publica????o</th>                                            
                                            <th>Localiza????o</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                               <label>Legenda</label>&nbsp;&nbsp;&nbsp;<span style="color: green;">Dispon??vel</span>&nbsp;&nbsp;&nbsp;<span style="color: orange;">Emprestado</span>&nbsp;&nbsp;&nbsp;<span style="color: gray;">Possui Reservas</span>&nbsp;&nbsp;&nbsp;<span style="color: red;">Indispon??vel</span>
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