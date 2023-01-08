var table = "";

function CadastrarMaterial() {
   
}

function modalPesquisarAcervoBiblioteca() {
    $("#cadastrar_acervo_biblioteca").on("click", ".btn-pesquisar", function () {
        
    $('.dataTables_filter').show();
     
    });
}

function GuardarAcervo() {
    $("#tblAcervo tbody").on("click", ".btn-guardar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#idacervo').val(data["idacervo"]);
        
        $('#acervo').val(data["idacervo"]);
        
        $("#idacervo_titulo").html("ID: ");  
        $("#titulo_titulo").html("Título: ");  
        $("#tipo_titulo").html("Tipo:");  
        $("#editora_titulo").html("Editora: ");  
        $("#ano_publicacao_titulo").html("Ano de Publicação: ");  
        $("#isbn_titulo").html("ISBN: ");  
        $("#status_2_titulo").html("Status: ");  
        
        $("#value_idacervo").html(data["idacervo"]);             
        $("#value_titulo").html(data["titulo"]);             
        $("#value_tipo").html(data["tipo"]);             
        $("#value_editora").html(data["editora"]);             
        $("#value_ano_publicacao").html(data["ano_publicacao"]);             
        $("#value_isbn").html(data["isbn"]);             
        $("#value_status_2").html(data["status_2"]);    
        
        $("#btfecharPesquisarAcervo").click();                  
       
       
    });
}

function modalExcluirAutoresAcervo() {
    $("#tblAutoresAcervo tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosAutoresAcervo").html("<br>ID:"+data["acervo"] + " - Acervo " + data["acervo"]);
        $("#acervoex").val(data["acervo"]);        
    });
}


function modalAlterarAutoresAcervo() {
    $("#tblAutoresAcervo tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#valuematerial').text(data["acervo"]);
        $('#valueautor').text(data["autor"]);
        $('#edmaterial').val(data["acervo"]);              
        $('#edautor').val(data["autor"]);              
        $('#edprincipal').val(data["principal"]);              
                           
       
      
        
    });
}




function PesquisaAcervo(tipo_pesquisa,chave){
    
    if ( $.fn.dataTable.isDataTable( '#tblAcervo' ) ) {
           
    table.destroy();
        
       table = $('#tblAcervo').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por pÃ¡gina",
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
            "url": 'acervo_controller/listar_acervos' ,
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
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "isbn"},{"data": "status_2"}],
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
     else
     {
      
       table = $('#tblAcervo').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por pÃ¡gina",
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
            "url": 'acervo_controller/listar_acervos' ,
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
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "isbn"},{"data": "status_2"}],
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



//Carrega Bibliotecas
function carrega_autores(){
    
    $.ajax({
            url: "autores_controller/listar_sem_autores_acervo",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#autor");
                sel.empty();
                  
               for (var i=0; i<json.data.length; i++) {
                sel.append('<option value="' + json.data[i].idautor + '">' +json.data[i].idautor+ " - " + json.data[i].nome + '</option>');
               }
                            
          }                            
        });
    
}


$(document).ready(function  () {

//Mascara para o campo CEP no
$("#cep").mask("99999-999");

    $("#erro").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
    
    modalExcluirAutoresAcervo();
    modalAlterarAutoresAcervo();   
    carrega_autores();
    modalPesquisarAcervoBiblioteca();
    GuardarAcervo(); 
    
    
    $('#CadastrarAcervo').hide();
           
    $('.dataTables_filter').show();

    table = $('#tblAutoresAcervo').DataTable({
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
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'autores_acervo_controller/listar_autores_acervo',
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 3, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#alterarAutoresAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Alterar o Autor do Acervo '></i></a>" +
                        "&nbsp<a href='#excluirAutoresAcervo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Autor do Acervo '></i></a>"
            }
        ],
        "columns": [{"data": "acervo"}, {"data": "autor"}, {"data": "principal"}],
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
                    "sInfo": "Os dados foram copiados para a área de transferência"

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

        
    $("#btcadastrarAutoresAcervo").click(function () {

        var acervo = $('#acervo').val();
        var autor = $('#autor').val();
        var principal = $('#principal').val();        
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
                        $("#msg_acerto").html("Autor cadastrado com sucesso!");                       
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
                        $("#msg_erro").html("Falha ao cadastrar autor!");
                        $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');;
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
    
    
     $("#btAlterarAutoresAcervo").click(function () {

        //dados da Biblioteca
        var acervo = $('#edmaterial').val();
        var autor = $('#edautor').val();
        var principal = $('#edprincipal').val();
       
        
        $.ajax({
            url: "autores_acervo_controller/alterar_autores_acervo",
            type: "POST",
            data: {
                acervo: acervo,
                autor : autor,
                principal : principal
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharAlterarAutoresAcervo").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Autor Acervo atualizado com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarAutorAcervo").val("Cadastrar");                    
                    
                }else {            
                        $("#btFecharAlterarAcervoBiblioteca").click();
                        $("#msg_erro").html("Falha ao alterar os dados do Autor Acervo!");
                        $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');;
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
   
    
    
    
    $("#btExcluirAutoresAcervo").click(function () {

   
        var acervo = $('#acervoex').val();
        var autor = $('#autorex').val();
        
        $.ajax({
            url: "autores_acervo_controller/excluir_autores_acervo",
            type: "POST",
            data: {
                acervo: acervo,
                autor:autor
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    table.ajax.reload();
                    $("#msg_acerto").html("Autor Acervo excluído com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    
                    
                }else {            
                        $("#btFecharAutoresExcluirAcervo").click();
                       $("#msg_erro").html("Falha ao excluir o autor do sistema!");
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


 $("#btPesquisarMaterialTipo").click(function () {
        if($("#chave").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave").focus();
            
        }else{
            PesquisaAcervo($("#tipo_pesquisa").val(),$("#chave").val());
            //$("#btn").show();    
        }
        
    });

 $("#btcadastrarAcervo").click(function () {

        
    });

    $("#BtCadastrarAcervo").on("click", function () {
        $('#btfecharPesquisarAcervo').click();
        $('#codigo_material').hide();
        $('#CadastrarAcervo').show();
 
     
    });
    
     $("#btCadastrarMaterial").on("click",function () {
       
        var idacervo = null;
        var titulo = $('#titulo').val();
        var tipo = $('#tipo').val();
        var autores = $('#autores').val();
        var local = $('#local').val();
        var editora = $('#editora').val();
        var anopublicacao = $('#anopublicacao').val();
        var tema = $('#tema').val();
        var resumo = $('#resumo').val();
        var isbn = $('#isbn').val();
        var idioma = $('#idioma').val();
        var numeropg = $('#numeropg').val();
        var status = $('#status').val();
       
        $.ajax({
            url: "acervo_controller/CadastrarAcervo",
            type: "POST",
            data: {
                idacervo: idacervo,
                titulo: titulo,
                tipo: tipo,
                autores: autores,
                local_2: local,
                editora: editora,
                ano_publicacao: anopublicacao,
                tema: tema,
                resumo_informacoes: resumo,
                isbn: isbn,
                idioma: idioma,
                num_paginas: numeropg,
                status_2: status
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirAcervo").click();
                    $("#msg_acerto").html("Material Cadastrado com Sucesso");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarAcervo").val("Cadastrar");
                     $('#codigo_material').show();
                    $('#CadastrarAcervo').hide();
        
        $.ajax({
            url: "acervo_controller/pegarId",
            
            success: function (data) {
            var json = $.parseJSON(data);
            var i=0;
            
            $('#material').val(json.data[i].idacervo);

            $("#idacervo_titulo").html("ID: ");  
            $("#titulo_titulo").html("Título: ");  
            $("#tipo_titulo").html("Tipo:");  
            $("#editora_titulo").html("Editora: ");  
            $("#ano_publicacao_titulo").html("Ano de Publicação: ");  
            $("#isbn_titulo").html("ISBN: ");  
            $("#status_2_titulo").html("Status: ");  
                        
            $("#value_idacervo").html(json.data[i].idacervo);             
            $("#value_titulo").html(json.data[i].titulo);             
            $("#value_tipo").html(json.data[i].tipo);             
            $("#value_editora").html(json.data[i].editora);             
            $("#value_ano_publicacao").html(json.data[i].ano_publicacao);             
            $("#value_isbn").html(json.data[i].isbn);             
            $("#value_status_2").html(json.data[i].status_2);  
          }                                
        });
                     
                }else {            
                        $("#btFecharExcluirAcervo").click();
                        $("#msg_erro").html("Falha ao cadastrar o material!");
                        $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');;
                        
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
    
});

