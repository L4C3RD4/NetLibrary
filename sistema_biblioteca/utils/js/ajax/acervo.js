var table = "";
var autores_acervo;
var tabletblAutoresAcervo = "";

function valida_campos(){
    var titulo = $("#titulo").val();
    var msg = "";
    if(titulo==""){
        msg = " É obrigatório informar um título! ";
    }        
    return msg;
}

function GuardarAutores() {
    $("#tblAutores tbody").on("click", ".btn-guardar", function () {
        
        
        var tab = $('.tab-content .active').attr('id');
        
        if(tab=="panel-190060"){
        //função de cadastro de acervo
        var data = table.row($(this).parents('tr')).data();
        $('#idautor').val(data["idautor"]);
        
        //busca por valores repetidos
        var busca_repetido = $('#autores').val();
        var n = busca_repetido.indexOf(data["idautor"]);
        
        if(n>-1){
            $("#btfecharPesquisarAutores").click();    
            $("#msg_erro").html("Esse autor já foi adicionado anteriormente. Favor escolher outro!");
                    $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
            
            
            
        }else{
            $('#autores').val($('#autores').val()+";"+data["idautor"]);

            $("#lbAltoresSelecionados").html($("#lbAltoresSelecionados").html()+"&nbsp;&nbsp;<a href='#RemoverAutores' onClick='removerAutor("+data["idautor"]+")' value='"+data["idautor"]+"' data-toggle='modal' id='modal-"+data["idautor"]+"' role='button' class='btn btn-pesquisar'><i class='fa fa-remove'></i>"+data["formato_citacao"]+"</a>");             
            var sel =  $("#autor_principal_selecao");
            sel.append('<option value="' + data["idautor"] + '">' +data["idautor"]+ " - " + data["formato_citacao"] + '</option>');

            $("#btfecharPesquisarAutores").click();                  
       
        }
        
    }else{
        
        if(tab="panel-190070"){
            
            var data = table.row($(this).parents('tr')).data();
            var autor = data["idautor"];
            var dados_autor = data["idautor"]+" - "+data["nome"]+" "+data["sobrenome"];
            var material = $('#material').val();
            var dados_material = $("#value_idacervo").val()+" - "+$("#value_material").val();
            //alert(autor + " - " + material);
            $.ajax({
            url: "autores_controller/cadastrar_autor_acervo",
            type: "POST",
            data: {
                dados_material: dados_material,
                material: material,
                dados_autor: dados_autor,
                autor: autor
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    tabletblAutoresAcervo.ajax.reload();
                    $("#btfecharPesquisarAutores").click();
                    $("#msg_acerto").html("Autor cadastrado com sucesso para o Acervo!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');                    
                    
                     
                }else {   
                        $("#btfecharPesquisarAutores").click();
                        $("#msg_erro").html("Falha ao cadastrar os autores para esse material!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                        
                        });}, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    
                        
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });            
            
        }
                
    }    
       
    });
}

function modalPrincipalAutores() {
    $("#tblAutoresAcervo tbody").on("click", ".btn-principal", function () {
        var data = tabletblAutoresAcervo.row($(this).parents('tr')).data();
        var autor = data["idautor"];
        var dados_autor = data["idautor"]+" - "+data["nome"]+" "+data["sobrenome"];
        var material = $("#material").val();
        var dados_material = $("#value_idacervo").val()+" - "+$("#value_material").val();        
       
        $.ajax({
            url: "autores_controller/principal_autor_acervo",
            type: "POST",
            data: {
                dados_material: dados_material,
                material: material,
                dados_autor: dados_autor,
                autor: autor                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    tabletblAutoresAcervo.ajax.reload();
                    $("#msg_acerto").html("Autor principal cadastrado como sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');                    
                    
                     
                }else {   
                       
                        $("#msg_erro").html("Falha ao definir o autor principal com sucesso!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                        
                        });}, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    
                        
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        }); 
        
    });
}


function removerAutor(autor){
    $("#modal-"+autor).hide();
    var autores_atuais = $("#autores").val();
    autores_atuais = autores_atuais.replace(autor,"");
    $("#autores").val(autores_atuais);
    
    $("#autor_principal_selecao option").each(function(){
        var valor_atual = $(this).val();
        if(autor==valor_atual){
            $(this).remove();
        }        
    });
    
}

function modalPesquisarAutores() {
    $("#cadastrar_autores").on("click", ".btn-pesquisar", function () {
        
    $('.dataTables_filter').show();
     
    });
}

function modalExcluirAcervo() {
    $("#tblAcervo tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosAcervo").html("<br>ID:"+data["idacervo"] + " - Nome:" + data["titulo"]);
        $("#idacervoex").val(data["idacervo"]);        
    });
}

function modalExcluirAutorAcervo() {
    $("#tblAutoresAcervo tbody").on("click", ".btn-apagar", function () {
        var data = tabletblAutoresAcervo.row($(this).parents('tr')).data();
        $("#spanDadosAutorMaterial").html("<br>ID:"+data["idautor"] + " - Nome:" + data["nome"] +" "+data["sobrenome"]);
        $("#idAutorMaterialex").val(data["idautor"]);        
    });
}


function modalAlterarAcervo() {
    $("#tblAcervo tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
     $('#edidacervo').val(data["idacervo"]);
        $('#edtitulo').val(data["titulo"]);
        $('#edtipo').val(data["tipo"]);                    
        $('#edlocal').val(data["local"]);              
        $('#ededitora').val(data["editora"]);              
        $('#ededicao').val(data["edicao"]);              
        $('#edvolume').val(data["volume"]);              
        $('#edtipo_material').val(data["tipo_material"]);              
        $('#edanopublicacao').val(data["ano_publicacao"]);              
        $('#edassunto').val(data["assunto"]);              
        $('#edresumo').val(data["resumo_informacoes"]);              
        $('#edisbn').val(data["isbn"]);              
        $('#edidioma').val(data["idioma"]);              
        $('#edserie_colecao').val(data["serie_colecao"]);
          var details = data["detalhes"];
        if((details.indexOf("Caixa Alta"))!=-1){
            $('#edcaixa_alta').attr('checked',true);
        }else{
            $('#edcaixa_alta').attr('checked',false);
        }
        if(details.indexOf("Livro de Imagem")!=-1){
            $('#edlivro_imagem').attr('checked',true);
        }else{
             $('#edlivro_imagem').attr('checked',false);
        }
        if(details.indexOf("Audiolivro")!=-1){
            $('#edaudiolivro').attr('checked',true);
        }else{
             $('#edaudiolivro').attr('checked',false);
        }
        if(details.indexOf("Braille")!=-1){
            $('#edbraille').attr('checked',true);
        }else{
            $('#edbraille').attr('checked',false);
        }
        if(details.indexOf("Kit Afro (SEDUC e outros)")!=-1){
            $('#edkit_afro').attr('checked',true);
        }else{
            $('#edkit_afro').attr('checked',false);
        }
        if(details.indexOf("Inclusão")!=-1){
            $('#edinclusao').attr('checked',true);
        }else{
            $('#edinclusao').attr('checked',false);
        }
        if(details.indexOf("Diversidade")!=-1){
            $('#eddiversidade').attr('checked',true);
        }else{
            $('#eddiversidade').attr('checked',false);
        }
        if(details.indexOf("Programas do MEC (PNBE, PNAIC, PNLD Literário, outros)")!=-1){
            $('#edprogramas_mec').attr('checked',true);
        }else{
            $('#edprogramas_mec').attr('checked',false);
        }
        if(details.indexOf("História em quadrinhos/ mangás")!=-1){
            $('#edhistoria_quadrinhos').attr('checked',true);
        }else{
             $('#edhistoria_quadrinhos').attr('checked',false);
        }
      
        $('#eddetalhes').val(data["detalhes"]);              
        
        $('#ednumeropg').val(data["num_paginas"]);              
        $('#edstatus').val(data["status"]);              
        
    });
}

function modalManutencaoAutores() {
    $("#tblAcervo tbody").on("click", ".btn-manutencao", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#material').val(data["idacervo"]);
        $('#value_idacervo').text(data["idacervo"]);
        $('#value_titulo').text(data["titulo"]);
        $('#value_tipo').text(data["tipo"]);
        $('#value_editora').text(data["editora"]);
        $('#value_ano_publicacao').text(data["ano_publicacao"]);              
        $('#value_isbn').text(data["isbn"]);              
        
        AutoresObra(data["idacervo"]);
        
        $('#tab_manutencao_autores').tab("show");                              
    });
}


function AutoresObra(material){
    
    if ( $.fn.dataTable.isDataTable( '#tblAutoresAcervo' ) ) {
           
    tabletblAutoresAcervo.destroy();
        
       tabletblAutoresAcervo = $('#tblAutoresAcervo').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "último"
            }
        },
        "ajax": {
            "url": 'autores_controller/lista_autores_material' ,
            type: "POST",
            data: {
                material: material
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 4, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#excluirAutorAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-apagar' ><i class='glyphicon glyphicon-remove''></i></a>" +
                                  "&nbsp<a href='#PrincipalAutorAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-principal'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idautor"}, {"data": "nome"}, {"data": "sobrenome"},{"data": "formato_citacao"}],
        "autoWidth": false,
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                 if ( aData['principal']==1)
                 {
                        $('td', nRow).css('color', 'green');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'black');                        
                 }
                 }
        ,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {"sExtends": "copy",
                    "sButtonText": "Copiar",
                    "sToolTip": "Copiar os dados para a área de transferência",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

                },
                {"sExtends": "print",
                    "sButtonText": "Imprimir",
                    "sToolTip": "Imprimir a tabela",
                    "sInfo": "Aperte 'ctrl + p' para imprimir ou pressione a tecla ESC para retornar"

                },
                {
                    "sExtends": "collection",
                    "sButtonText": "Salvar",
                    "aButtons": ["csv", "xls", "pdf"]
                }]
        }
          
        });
     }
     else
     {
      
       tabletblAutoresAcervo = $('#tblAutoresAcervo').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "último"
            }
        },
        "ajax": {
            "url": 'autores_controller/lista_autores_material' ,
            type: "POST",
            data: {
                material: material
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 4, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#excluirAutorAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-apagar' ><i class='glyphicon glyphicon-remove''></i></a>" +
                                  "&nbsp<a href='#PrincipalAutorAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-principal'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idautor"}, {"data": "nome"}, {"data": "sobrenome"},{"data": "formato_citacao"}],
        "autoWidth": false,
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                 if ( aData['principal']==1)
                 {
                        $('td', nRow).css('color', 'green');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'black');                        
                 }
                 }
        ,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {"sExtends": "copy",
                    "sButtonText": "Copiar",
                    "sToolTip": "Copiar os dados para a Ã¡rea de transferÃªncia",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

                },
                {"sExtends": "print",
                    "sButtonText": "Imprimir",
                    "sToolTip": "Imprimir a tabela",
                    "sInfo": "Aperte 'ctrl + p' para imprimir ou pressione a tecla ESC para retornar"

                },
                {
                    "sExtends": "collection",
                    "sButtonText": "Salvar",
                    "aButtons": ["csv", "xls", "pdf"]
                }]
        }
          
        });
        
     }
}
function PesquisaAutores(tipo_pesquisa,chave){
    
    if ( $.fn.dataTable.isDataTable( '#tblAutores' ) ) {
           
    table.destroy();
        
       table = $('#tblAutores').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "último"
            }
        },
        "ajax": {
            "url": 'autores_controller/listar_autores_do_acervo' ,
            type: "POST",
            data: {
                tipo_pesquisa: tipo_pesquisa,
                chave: chave
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 4, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar' id='btmostrar_autores'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idautor"}, {"data": "nome"}, {"data": "sobrenome"},{"data": "formato_citacao"}],
        "autoWidth": false
                /* "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var ano = aData['data_fim'].substring(6,10);
                 var mes = aData['data_fim'].substring(3,5);
                 var dia = aData['data_fim'].substring(0,2);
                 
                 var datah = new Date();
                 var datav = new Date(ano+"/"+mes+"/"+dia);
                 if ( aData['ativo']==0)
                 {
                        $('td', nRow).css('color', 'red');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'green');                        
                 }
                 }*/
        ,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {"sExtends": "copy",
                    "sButtonText": "Copiar",
                    "sToolTip": "Copiar os dados para a área de transferência",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

                },
                {"sExtends": "print",
                    "sButtonText": "Imprimir",
                    "sToolTip": "Imprimir a tabela",
                    "sInfo": "Aperte 'ctrl + p' para imprimir ou pressione a tecla ESC para retornar"

                },
                {
                    "sExtends": "collection",
                    "sButtonText": "Salvar",
                    "aButtons": ["csv", "xls", "pdf"]
                }]
        }
          
        });
     }
     else
     {
      
       table = $('#tblAutores').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "último"
            }
        },
        "ajax": {
            "url": 'autores_controller/listar_autores_do_acervo' ,
            type: "POST",
            data: {
                tipo_pesquisa: tipo_pesquisa,
                chave: chave
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 4, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar' id='btmostrar_autores'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idautor"}, {"data": "nome"}, {"data": "sobrenome"},{"data": "formato_citacao"}],
        "autoWidth": false
                /* "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var ano = aData['data_fim'].substring(6,10);
                 var mes = aData['data_fim'].substring(3,5);
                 var dia = aData['data_fim'].substring(0,2);
                 
                 var datah = new Date();
                 var datav = new Date(ano+"/"+mes+"/"+dia);
                 if ( aData['ativo']==0)
                 {
                        $('td', nRow).css('color', 'red');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'green');                        
                 }
                 }*/
        ,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {"sExtends": "copy",
                    "sButtonText": "Copiar",
                    "sToolTip": "Copiar os dados para a Ã¡rea de transferÃªncia",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

                },
                {"sExtends": "print",
                    "sButtonText": "Imprimir",
                    "sToolTip": "Imprimir a tabela",
                    "sInfo": "Aperte 'ctrl + p' para imprimir ou pressione a tecla ESC para retornar"

                },
                {
                    "sExtends": "collection",
                    "sButtonText": "Salvar",
                    "aButtons": ["csv", "xls", "pdf"]
                }]
        }
          
        });
        
     }
}

$(document).ready(function  () {

    
    $("#erro").hide();
    $("#erroAut").hide();
    $("#erroAce").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
    GuardarAutores();
    modalExcluirAcervo();
    modalAlterarAcervo();
    modalPesquisarAutores();
    modalManutencaoAutores();
    modalExcluirAutorAcervo();
    modalPrincipalAutores();
    
    $("#CancelarCadastro").click(function(){
        $("#limparDados").click();
        $("#tab_lista_acervo").tab("show");
    });
    
    
   $('.dataTables_filter').show();

    table = $('#tblAcervo').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ Registros por página",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "úlltimo"
            }
        },
        "ajax": {
            "url": 'acervo_controller/listar_acervos_sem_parametro' ,
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 9, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#excluirAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Acervo '></i></a>" +
                        "&nbsp<a href='#alterarAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informaçoes do Acervo '></i></a>" +
                        "&nbsp<a href='#manutencaoAutores' data-toggle='' id='manutencao-autores' role='button' class='btn btn-info btn-manutencao'><i class='glyphicon glyphicon-font' title=' Manutenção de Autores '></i></a>" 
            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "tipo"}, {"data": "local"}, {"data": "editora"},{"data": "assunto"},{"data": "genero"},{"data": "ano_publicacao"},{"data": "isbn"}],
        "autoWidth": false
                /* "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var ano = aData['data_fim'].substring(6,10);
                 var mes = aData['data_fim'].substring(3,5);
                 var dia = aData['data_fim'].substring(0,2);
                 
                 var datah = new Date();
                 var datav = new Date(ano+"/"+mes+"/"+dia);
                 if ( aData['ativo']==0)
                 {
                        $('td', nRow).css('color', 'red');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'green');                        
                 }
                 }*/
        ,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {"sExtends": "copy",
                    "sButtonText": "Copiar",
                    "sToolTip": "Copiar os dados para a Ã¡rea de transferÃªncia",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

                },
                {"sExtends": "print",
                    "sButtonText": "Imprimir",
                    "sToolTip": "Imprimir a tabela",
                    "sInfo": "Aperte 'ctrl + p' para imprimir ou pressione a tecla ESC para retornar"

                },
                {
                    "sExtends": "collection",
                    "sButtonText": "Salvar",
                    "aButtons": ["csv", "xls", "pdf"]
                }]
        }
    });

        
    $("#btcadastrarAcervo").click(function () {
//        $('#assunto').change(function(){
//        if(($('#assunto').val()=="028 – LITERATURA INFANTIL")||($('#assunto').val()=="028.5 – LITERATURA INFANTO-JUVENIL")||($('#assunto').val()=="800 – LITERATURA")||($('#assunto').val()=="B869 – LITERATURA BRASILEIRA (ADULTA)")||($('#assunto').val()=="890 – LITERATURA ESTRANGEIRA (ADULTA)")){
//             $("#genero").prop("disabled", true);
//        }else{
//             $("#genero").prop("disabled", true);
//             //alert("Aqui");
//        }
//    });
      var erros = valida_campos();
        if(erros==""){
  
         $("#genero").prop("disabled", true);
        
        var caracteristicas = ""; 
         if($('input:checkbox[name=caixa_alta]:checked').val()=="Caixa Alta"){
           caracteristicas = "Caixa Alta";
        }
         if($('input:checkbox[name=livro_imagem]:checked').val()=="Livro de Imagem"){
              caracteristicas+=", Livro de Imagem";
             }
        if($('input:checkbox[name=audiolivro]:checked').val()=="Audiolivro"){
            caracteristicas+=", Audiolivro";
        }
         if($('input:checkbox[name=braille]:checked').val()=="Braille"){
                caracteristicas+=", Braille";
            }
        if($('input:checkbox[name=kit_afro]:checked').val()=="Kit Afro (SEDUC e outros)"){
                 caracteristicas+=", Kit Afro (SEDUC e outros)";
             }
        if($('input:checkbox[name=inclusao]:checked').val()=="Inclusao"){
                caracteristicas+=", Inclusão";
            }
        if($('input:checkbox[name=diversidade]:checked').val()=="Diversidade"){
                caracteristicas+=", Diversidade";
            }
        if($('input:checkbox[name=programas_mec]:checked').val()=="Programas do MEC (PNBE, PNAIC, PNLD Literário, outros)"){
                caracteristicas+=", Programas do MEC (PNBE, PNAIC, PNLD Literário, outros)";
            }
        if($('input:checkbox[name=historia_quadrinhos]:checked').val()=="historia_quadrinhos"){
                caracteristicas+=", História em quadrinhos/ mangás";
            }
        
        //dados do Material
        var idacervo = null;
        var titulo = $('#titulo').val();
        var tipo = $('#tipo').val();
        var local = $('#local').val();
        var editora = $('#editora').val();
        var edicao = $('#edicao').val();
        var volume = $('#volume').val();
        var tipo_material = $('#tipo_material').val();
        var anopublicacao = $('#anopublicacao').val();
        var assunto = $('#assunto').val();
        var genero = $('#genero').val();
        var resumo = $('#resumo').val();
        var isbn = $('#isbn').val();
        var idioma = $('#idioma').val();
        var serie_colecao = $('#serie_colecao').val();
        var detalhes = caracteristicas;
        var numeropg = $('#numeropg').val();
        var autores = $('#autores').val();
        var principal = $('#autor_principal_selecao option:selected').val();
        
        
        
        
//        Autores
    
        
        $.ajax({
            url: "acervo_controller/cadastrar_acervo",
            type: "POST",
            data: {
                idacervo: idacervo,
                titulo: titulo,
                tipo: tipo,
                editora: editora,
                edicao: edicao,
                volume: volume,
                ano_publicacao: anopublicacao,
                local: local,
                idioma: idioma,
                tipo_material: tipo_material,
                isbn: isbn,
                resumo_informacoes: resumo,
                assunto: assunto,
                genero: genero,
                serie_colecao: serie_colecao,
                detalhes: detalhes,
                num_paginas: numeropg,
                autores : autores,
                principal : principal
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    table.ajax.reload();
                    $("#btFecharExcluirAcervo").click();
                    $("#msg_acerto").html("Acervo cadastrado com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    table.ajax.reload();
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarAcervo").val("Cadastrar");
                    $("#btcadastrarAutoresAcervo").click();    
                     
                }else {   
                    if (json.tipo == 'errorAut') {
                        $("#btFecharExcluirAcervo").click();
                        $("#msg_erro").html("Falha ao cadastrar os autores para esse material!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                        
                        });}, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
            
                    }else{
                        $("#btFecharExcluirAcervo").click();
                        $("#msg_erro").html("Falha ao cadastrar os autores para esse material!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                        
                        });}, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }
                        
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
        
        }else{
            
            $("#msg_erro").html("Falha ao cadastrar o acervo! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
        }
    });
    
    
     $("#btAlterarAcervo").click(function () {
         
         var titulo = $('#edtitulo').val();
         if(titulo!=""){
         
         var caracteristicas ="";
         if($('input:checkbox[name=edcaixa_alta]:checked').val()=="Caixa Alta"){
           caracteristicas = "Caixa Alta";
        }
         if($('input:checkbox[name=edlivro_imagem]:checked').val()=="Livro de Imagem"){
              caracteristicas+=", Livro de Imagem";
             }
        if($('input:checkbox[name=edaudiolivro]:checked').val()=="Audiolivro"){
            caracteristicas+=", Audiolivro";
        }
         if($('input:checkbox[name=edbraille]:checked').val()=="Braille"){
                caracteristicas+=", Braille";
            }
        if($('input:checkbox[name=edkit_afro]:checked').val()=="Kit Afro (SEDUC e outros)"){
                 caracteristicas+=", Kit Afro (SEDUC e outros)";
             }
        if($('input:checkbox[name=edinclusao]:checked').val()=="Inclusao"){
                caracteristicas+=", Inclusão";
            }
        if($('input:checkbox[name=eddiversidade]:checked').val()=="Diversidade"){
                caracteristicas+=", Diversidade";
            }
        if($('input:checkbox[name=edprogramas_mec]:checked').val()=="Programas do MEC (PNBE, PNAIC, PNLD Literário, outros)"){
                caracteristicas+=", Programas do MEC (PNBE, PNAIC, PNLD Literário, outros)";
            }
        if($('input:checkbox[name=edhistoria_quadrinhos]:checked').val()=="historia_quadrinhos"){
                caracteristicas+=", História em quadrinhos/ mangás";
            }
       //dados
        var idacervo = $('#edidacervo').val();
        var titulo = $('#edtitulo').val();
        var tipo = $('#edtipo').val();
        var local = $('#edlocal').val();
        var editora = $('#ededitora').val();
        var edicao = $('#ededicao').val();
        var volume = $('#edvolume').val();
        var tipo_material = $('#edtipo_material').val();
        var anopublicacao = $('#edanopublicacao').val();
        var assunto = $('#edassunto').val();
        var genero = $('#edgenero').val();
        var resumo = $('#edresumo').val();
        var isbn = $('#edisbn').val();
        var idioma = $('#edidioma').val();
        var serie_colecao = $('#edserie_colecao').val();
        var detalhes = caracteristicas ;
        var numeropg = $('#ednumeropg').val();
        
        
        $.ajax({
            url: "acervo_controller/alterarAcervo",
            type: "POST",
            data: {
               idacervo: idacervo,
                titulo: titulo,
                tipo: tipo,
                local: local,
                editora: editora,
                edicao: edicao,
                volume: volume,
                tipo_material: tipo_material,
                ano_publicacao: anopublicacao,
                assunto: assunto,
                genero: genero,
                resumo_informacoes: resumo,
                isbn: isbn,
                idioma: idioma,
                serie_colecao: serie_colecao,
                detalhes: detalhes,
                num_paginas: numeropg
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharAlterarAcervo").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Acervo atualizado com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }else {            
                        $("#btFecharAlterarAcervo").click();
                        $("#msg_erro").html("Falha ao alterar os dados do acervo!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                        
                        });}, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
    }else{
        
        $("#msg_erro").html("Falha ao atualizar o acervo! É necessário informar um título!");
        $("#erro").show();
        $('html, body').animate({scrollTop: 0}, 'slow');  
        
        $("#alterarAcervo").modal("hide");
            window.setTimeout(function() {
                $("#alterarAcervo").modal("show"); 
                 $(".fechar").click();
            }, 1000);   
    }
    });
   
    
    
    
    $("#btExcluirAcervo").click(function () {

        //dados 
        var idacervo = $('#idacervoex').val();
        
        $.ajax({
            url: "acervo_controller/excluir_acervo",
            type: "POST",
            data: {
                idacervo: idacervo
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirAcervo").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Acervo excluido com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }else {            
                        $("#btFecharExcluirAcervo").click();
                        $("#msg_erro").html("Falha ao excluir o Acervo!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                                            
                        });
                        }, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
    });
    
    $("#btExcluirAutorAcervo").click(function () {

        //dados 
        var material = $('#material').val();
        var autor = $('#idAutorMaterialex').val();
        var dados_autor = $('#spanDadosAutorMaterial').text();
        var dados_material = $('#value_idacervo').text() + " - "+$('#value_titulo').text();
        
        $.ajax({
            url: "autores_controller/excluir_autor_material",
            type: "POST",
            data: {
                material: material,
                autor: autor,
                dados_autor: dados_autor,
                dados_material: dados_material
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirAutorAcervo").click();
                    tabletblAutoresAcervo.ajax.reload();
                    $("#msg_acerto").html("Autor excluido do material com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }else {            
                        $("#btFecharExcluirAutorAcervo").click();
                        $("#msg_erro").html("Falha ao excluir o autor do Acervo!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                                            
                        });
                        }, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
    });
    
     $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });
    
        $("#btPesquisarAutores").click(function () {
        if($("#chave").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave").focus();
            
        }else{
            PesquisaAutores($("#tipo_pesquisa").val(),$("#chave").val());
            //$("#btn").show();    
        }
        
    });
     
    $("#btcadastrarAutoresAcervo").click(function () {

        var acervo = $('#idacervo').val();
        var autor = $('#autores').val();
        var principal = $('#autor_principal_selecao').val();        
        $.ajax({
            url: "autores_acervo_controller/cadastrar_autores_acervo",
            type: "POST",
            data: {
                acervo: acervo,
                autor : autor,
                principal : principal
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirAutoresAcervo").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("O Autor desse material foi cadastrado com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarAutorAcervo").val("Cadastrar");                                         
                }else {            
                        $("#btFecharExcluirAutoresAcervo").click();
                        $("#msg_erro").html("Falha ao cadastrar os Autores para o acervo!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                        
                        });}, 1000);                     
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
        
       
        
    });
   
 
 
  $('#assunto').change(function(){
        
        if(($('#assunto').val()=="028 – LITERATURA INFANTIL")||($('#assunto').val()=="028.5 – LITERATURA INFANTO-JUVENIL")||($('#assunto').val()=="800 – LITERATURA")||($('#assunto').val()=="B869 – LITERATURA BRASILEIRA (ADULTA)")||($('#assunto').val()=="890 – LITERATURA ESTRANGEIRA (ADULTA)")){
            $('#genero').attr('disabled', false);
        }else{
             $('#genero').attr('disabled', true);
             $('#genero').val("");
             
             //alert("Aqui");
        }
        if($('#assunto').val()==""){
           $('#genero').attr('disabled', false);
        }
        
    });
 
    
});

