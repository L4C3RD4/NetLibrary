var table = "";
var autores_acervo;

function valida_campos(){
    var material = $("#material").val();
    var msg = "";
    if(material==""){
        msg += " É obrigatória a escolha de um material! ";
    }
    
    return msg;
}


function GuardarAutores() {
    $("#tbl_Autores tbody").on("click", ".btn-guardar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#idautor').val(data["idautor"]);
        
        //busca por valores repetidos
        var busca_repetido = $('#autores').val();
        var n = busca_repetido.indexOf(data["idautor"]);
        
        if(n>-1){
            
            $("#msg_erro").html("Esse autor já foi adicionado anteriormente. Favor escolher outro!");
            $('#erro').show('slow');
            $('html, body').animate({scrollTop: 0}, 'slow');
            $("#btfecharPesquisarAutores").click();    
            
            
        }else{
            $('#autores').val($('#autores').val()+";"+data["idautor"]);

            $("#lbAltoresSelecionados").html($("#lbAltoresSelecionados").html()+"&nbsp;&nbsp;<a href='#RemoverAutores' onClick='removerAutor("+data["idautor"]+")' value='"+data["idautor"]+"' data-toggle='modal' id='modal-"+data["idautor"]+"' role='button' class='btn btn-pesquisar'><i class='fa fa-remove'></i>"+data["formato_citacao"]+"</a>");             
            var sel =  $("#autor_principal_selecao");
            sel.append('<option value="' + data["idautor"] + '">' +data["idautor"]+ " - " + data["formato_citacao"] + '</option>');

            $("#btfecharPesquisarAutores").click();                  
       
        }
        
        
       
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
function PesquisaAutores(tipo_pesquisa,chave){
    
    if ( $.fn.dataTable.isDataTable( '#tbl_Autores' ) ) {
           
    table.destroy();
        
       table = $('#tbl_Autores').DataTable({
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
      
       table = $('#tbl_Autores').DataTable({
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
        
        $('#material').val(data["idacervo"]);
        
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
        
        $("#btCancelarPesquisarAcervo").click();                  
       
       
    });
}

function modalExcluirAcervoBiblioteca() {
    $("#tblAcervoBibliotecas tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosAcervoBiblioteca").html("<br>ID:"+data["idacervo"] + " - Biblioteca " + data["biblioteca"]);
        $("#idacervoex").val(data["idacervo"]);        
    });
}


function modalAlterarAcervoBiblioteca() {
    $("#tblAcervoBibliotecas tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#edidacervo').val(data["idacervo"]);
        $('#valueid').text(data["idacervo"]);
        $('#valuebiblioteca').text(data["biblioteca"] + " - "+data["descricao"]);
        $('#valuematerial').text(data["material"] + " - "+data["titulo"]);
        $('#edbiblioteca').val(data["biblioteca"]);              
        $('#edmaterial').val(data["material"]);              
        $('#edcodigo_exemplar').val(data["codigo_exemplar"]);              
        $('#eddata_aquisicao').val(data["data_aquisicao"]);              
        $('#eddata_registro').val(data["data_registro"]);              
        $('#edbaixa').val(data["baixa"]);              
        $('#eddata_baixa').val(data["data_baixa"]);              
        $('#edmotivo_baixa').val(data["motivo_baixa"]);              
        $('#edobservacoes').val(data["observacoes"]);              
//        $('#edqtd_total_exemplares').val(data["qtd_total_exemplares"]);              
        $('#edstatus').val(data["status"]);              
       
      
        
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
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "assunto"},{"data": "isbn"}],
        "autoWidth": false,
            "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                 var ano = aData['data_fim'].substring(6,10);
//                 var mes = aData['data_fim'].substring(3,5);
//                 var dia = aData['data_fim'].substring(0,2);
//                 
//                 var datah = new Date();
//                 var datav = new Date(ano+"/"+mes+"/"+dia);
//             if (data['status']==1){
//                $('td', nRow).css('color', 'green');                        
//             }else{
//                if (data['status']==0){
//                    $('td', nRow).css('color', 'orange');                        
//                 }else{
//                    if (data['status']==2){
//                        $('td', nRow).css('color', 'red');                        
//                    }
//                }
//             }
             
             },
        
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
         "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "assunto"},{"data": "isbn"}],
        "autoWidth": false,
                "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                 var ano = aData['data_fim'].substring(6,10);
//                 var mes = aData['data_fim'].substring(3,5);
//                 var dia = aData['data_fim'].substring(0,2);
//                 
//                 var datah = new Date();
//                 var datav = new Date(ano+"/"+mes+"/"+dia);
//             if (data['status']==1){
//                $('td', nRow).css('color', 'green');                        
//             }else{
//                if (data['status']==0){
//                    $('td', nRow).css('color', 'orange');                        
//                 }else{
//                    if (data['status']==2){
//                        $('td', nRow).css('color', 'red');                        
//                    }
//                }
//             }
             
             },
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
function carrega_bibliotecas(){
    
    $.ajax({
            url: "acervo_biblioteca_controller/listar_sem_acervo",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#biblioteca");
                sel.empty();
                  
               for (var i=0; i<json.data.length; i++) {
                sel.append('<option value="' + json.data[i].idbiblioteca + '">' +json.data[i].idbiblioteca+ " - " + json.data[i].descricao + '</option>');
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
   
     GuardarAutores();
     
    modalExcluirAcervoBiblioteca();
    modalAlterarAcervoBiblioteca();   
    carrega_bibliotecas();
    modalPesquisarAcervoBiblioteca();
    GuardarAcervo(); 
    
    
    $("#CancelarCadastro").click(function(){
        $("#limparDadosCadastro").click();
        $("#tab_lista_bibliotecas").tab("show");
    });
    
    $("#limparDadosCadastro").click(function(){
        $("#cadastrar_acervo_biblioteca").closest('form').find("input[type=text], textarea").val("");
        $("#material").val("");             
        $("#value_idacervo").html("");             
        $("#value_idacervo").html("");             
        $("#value_titulo").html("");             
        $("#value_tipo").html("");             
        $("#value_editora").html("");             
        $("#value_ano_publicacao").html("");             
        $("#value_isbn").html("");             
        $("#value_status_2").html("");    
    });
    $("#limparDadosAlteracao").click(function(){
        $("#formalterar").closest('form').find("input[type=text], textarea").val("");
    });
    
      $.ajax({
            url: "bibliotecario_controller/retornar_bibliotecario",
           
            data: {
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                var i=0;
                
                $('#biblioteca').text(json.data[i].biblioteca+" - "+json.data[i].descricao);
                $('#biblioteca').val(json.data[i].biblioteca);
                $('#bibliotecario').text(json.data[i].idbibliotecario+" - "+json.data[i].nome);
                $('#bibliotecario').val(json.data[i].idbibliotecario);
                $('#usuario').val(json.data[i].usuario);
                
                
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
    
    
    $('#CadastrarAcervo').hide();
           
    $('.dataTables_filter').show();

    table = $('#tblAcervoBibliotecas').DataTable({
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
            "url": 'acervo_biblioteca_controller/listar_acervo_bibliotecas',
        },
        "columnDefs": [
            {
                "targets": [8], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 9, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#alterarAcervoBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações do Acervo da Biblioteca'></i></a>" +
                        "&nbsp<a href='#excluirAcervoBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Acervo '></i></a>"
            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "descricao"}, {"data": "titulo"},{"data": "tipo"},{"data": "codigo_exemplar"},{"data": "data_aquisicao2"},{"data": "tipo_aquisicao"},{"data": "nome_autor"},{"data": "status_2"}],
        "autoWidth": false,
                 "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
                if ( data['status']==1){                 
                        $('td', nRow).css('color', 'green');                        
                    }else{     
                            if( data['status']==0){
                                $('td', nRow).css('color', 'orange');                        
                            }else{
                                $('td', nRow).css('color', 'red');    
                            }                    
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

        
    $("#btcadastrarAcervoBiblioteca").click(function () {

        var erros = valida_campos();
        if(erros==""){
   
        //dados da Biblioteca
        var idacervo = null;
        var biblioteca = $('#biblioteca').val();
        var material = $('#material').val();
        var codigo_exemplar = $('#codigo_exemplar').val();
        var numero_exemplar = $('#numero_exemplar').val();
        var data_aquisicao = $('#data_aquisicao').val();
        var tipo_aquisicao = $('#tipo_aquisicao').val();
        var data_registro = $('#data_registro').val();
        var baixa = $('#baixa').val();
        var data_baixa = $('#data_baixa').val();
        var motivo_baixa = $('#motivo_baixa').val();
        var observacoes = $('#observacoes').val();
//        var qtd_total_exemplares = $('#qtd_total_exemplares').val();
        var status = $('#status').val();
        
        $.ajax({
            url: "acervo_biblioteca_controller/cadastrar_acervo_biblioteca",
            type: "POST",
            data: {
                idacervo: idacervo,
                biblioteca : biblioteca,
                material : material,
                codigo_exemplar: codigo_exemplar,
                numero_exemplar: numero_exemplar,
                data_aquisicao: data_aquisicao,
                tipo_aquisicao: tipo_aquisicao,
                data_registro: data_registro,
                baixa: baixa,
                data_baixa: data_baixa,
                motivo_baixa: motivo_baixa,
                observacoes: observacoes,
                status: status
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirAcervoBiblioteca").click();
                    $("#msg_acerto").html("Acervo cadastrado com sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    table.ajax.reload();
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarAcervoBiblioteca").val("Cadastrar");
                     
                }else {            
                        $("#btFecharExcluirAcervoBiblioteca").click();
                        $("#msg_erro").html("Falha ao cadastrar o acervo!");
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
            
            $("#msg_erro").html("Falha ao cadastrar o acervo! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
        }
        
    });
    
    
     $("#btAlterarAcervoBiblioteca").click(function () {

        //dados da Biblioteca
        var idacervo = $('#edidacervo').val();
        var biblioteca = $('#edbiblioteca').val();
        var material = $('#edmaterial').val();
        var codigo_exemplar = $('#edcodigo_exemplar').val();
        var numero_exemplar = $('#ednumero_exemplar').val();
        var data_aquisicao = $('#eddata_aquisicao').val();
        var tipo_aquisicao = $('#edtipo_aquisicao').val();
        var data_registro = $('#eddata_registro').val();
        var baixa = $('#edbaixa').val();
        var data_baixa = $('#eddata_baixa').val();
        var motivo_baixa = $('#edmotivo_baixa').val();
        var observacoes = $('#edobservacoes').val();
//        var qtd_total_exemplares = $('#edqtd_total_exemplares').val();
        var status = $('#edstatus').val();
        
        $.ajax({
            url: "acervo_biblioteca_controller/alterar_acervo_biblioteca",
            type: "POST",
            data: {
                idacervo: idacervo,
                biblioteca : biblioteca,
                material : material,
                codigo_exemplar: codigo_exemplar,
                numero_exemplar: numero_exemplar,
                data_aquisicao: data_aquisicao,
                tipo_aquisicao: tipo_aquisicao,
                data_registro: data_registro,
                baixa: baixa,
                data_baixa: data_baixa,
                motivo_baixa: motivo_baixa,
                observacoes: observacoes,
//                qtd_total_exemplares: qtd_total_exemplares,
                status: status
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("cadastrarAcervoBiblioteca").val("Cadastrar");
                    table.ajax.reload();
                    $("#btFecharAlterarAcervoBiblioteca").click();
                    $("#msg_acerto").html("Acervo atualizado com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');                    
                }else {            
                        $("#btFecharAlterarAcervoBiblioteca").click();
                        $("#msg_erro").html("Falha ao alterar os dados do acervo!");
                        $("#erro").fadeTo(1, 1).show('slow');
                        window.setTimeout(function() {
                        $("#erro").fadeTo(500, 0).slideUp(500, function(){
                            $("#erro").hide();                        
                        });}, 1000);                     
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
   
    
    
    
    $("#btExcluirAcervoBiblioteca").click(function () {

   
        var idacervo = $('#idacervoex').val();
        
        $.ajax({
            url: "acervo_biblioteca_controller/excluir_acervo_biblioteca",
            type: "POST",
            data: {
                idacervo: idacervo
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    
                    $("#msg_acerto").html("Acervo excluído com sucesso!");
                    $('#sucesso').show('slow');
                    table.ajax.reload();
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("#btFecharAcervoExcluirBiblioteca").click();
                    table.ajax.reload();
                }else {            
                        $("#btFecharExcluirAcervoBiblioteca").click();
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

    $("#BtCadastrarAcervo").on("click", function () {
        $('#btfecharPesquisarAcervo').click();
        $('#codigo_material').hide();
        $('#CadastrarAcervo').show();
 
     
    });
    $("#btCancelarMaterialAcervo").on("click", function () {
//        $('#btfecharPesquisarAcervo').click();
        $('#codigo_material').show();
        $('#CadastrarAcervo').hide();
 
     
    });
    
     $("#btCadastrarMaterial").on("click",function () {
       
        var idacervo = null;
        var titulo = $('#titulo').val();
        var tipo = $('#tipo').val();
        var local = $('#local').val();
        var editora = $('#editora').val();
        var anopublicacao = $('#anopublicacao').val();
        var tema = $('#tema').val();
        var resumo = $('#resumo').val();
        var isbn = $('#isbn').val();
        var idioma = $('#idioma').val();
        var serie_colecao = $('#serie_colecao').val();
        var origem = $('#origem').val();
        var numeropg = $('#numeropg').val();
        var status = $('#status').val();
       
        $.ajax({
            url: "acervo_controller/CadastrarAcervo",
            type: "POST",
            data: {
                idacervo: idacervo,
                titulo: titulo,
                tipo: tipo,
                local_2: local,
                editora: editora,
                ano_publicacao: anopublicacao,
                tema: tema,
                resumo_informacoes: resumo,
                isbn: isbn,
                idioma: idioma,
                serie_colecao: serie_colecao,
                origem: origem,
                num_paginas: numeropg,
                status: status
                
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

     
    //Baixa  
      
 $("#baixa").change(function(){
     
     if($("#baixa").val()==0){
         $('#status').val(2);
         $('#status').attr('disabled', true);

     }else{
          $('#status').attr('disabled', false);
     }
  


    });
    
     $("#btPesquisarAutores").click(function () {
        if($("#chave_autor").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave_autor").focus();
//            alert( $("#chave").val());
            
        }else{
            PesquisaAutores($("#tipo_pesquisa_autor").val(),$("#chave_autor").val());
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
                    $("#msg_acerto").html("Autor Acervo cadastrado com sucesso!");
                    $('#sucesso').show('slow');
                    $("cadastrarAutorAcervo").val("Cadastrar");
                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    table.ajax.reload();
                }else {            
                        $("#btFecharExcluirAutoresAcervo").click();
                        $("#msg_erro").html("Falha ao cadastrar o Autor para este Acervo!");
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

});
