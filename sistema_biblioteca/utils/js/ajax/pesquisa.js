/* global table */
table = "";
$(document).ready(function  () {
    
    //esconde os resultados da busca
    $("#resultados_busca").hide();
    
    $.ajax({
            url: "pesquisa_controller/listar_local/",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#localizacao");
                sel.empty();
                sel.append('<option value="todas"> Todas </option>');
                for (var i=0; i<json.data.length; i++) {
                 sel.append('<option value="' + json.data[i].idbiblioteca + '">' +json.data[i].idbiblioteca+ " - " + json.data[i].descricao + '</option>');
               }
              
          }                            
        });
    
    $.ajax({
            url: "acervo_controller/listar_editoras",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#editora");
                sel.empty();
                sel.append('<option value="todas"> Todas </option>');
                for (var i=0; i<json.data.length; i++) {
                 sel.append('<option value="' + json.data[i].editora +'">'+json.data[i].editora + '</option>');
               }
              
          }                            
        });
    
 $("#btpesquisa").click(function () {
        if($("#chave_pesquisa").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave_pesquisa").focus();
        }else{
            
            Pesquisalivro($("#chave_pesquisa").val());
            $("#resultados_busca").show();
            $("#pesquisa").hide();
            
        }
        
    });
    
    /*
    $(document).keypress(function(e) {
        if($("#chave_pesquisa").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave_pesquisa").focus();
        }else{
            
            Pesquisalivro($("#chave_pesquisa").val());
            $("#resultados_busca").show();
            $("#pesquisa").hide();
            
        }
    }); */



function Pesquisalivro(chave_pesquisa){
    
         var tipo_busca = $("#tipo_busca").val();
         var tipo_material = $("#tipo_material").val();
         var localizacao = $("#localizacao").val();
         var editora = $("#editora").val();
         var assunto = $("#assunto").val();
         var genero = $("#genero").val();
    if ( $.fn.dataTable.isDataTable( '#tblPesquisa' ) ) {
           
    table.destroy();
        
    table = $('#tblPesquisa').DataTable({
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
            "buttons": {
                copyTitle: 'Dados copiados',
                copyKeys: 'Use your keyboard or menu to select the copy command'
            },
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'pesquisa_controller/pesquisar',
            type: "POST",
            data: {
                chave_pesquisa: chave_pesquisa,
                tipo_material: tipo_material,
                tipo_busca: tipo_busca,
                localizacao: localizacao,
                editora: editora,
                assunto:assunto,
                genero: genero
                
            }
        },
        "columnDefs": [
            {
                "targets":[], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#NecessarioFazerLogin' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-atribuir'><i class='glyphicon glyphicon-plus' title='É necessário fazer o login'></i></a> "

            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "nome_autor"},{"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "descricao"}],
        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {

                         /*
                 *  0 - Emprestado
                *  1 - Disponível
                *  2 - Baixa / Indisponível
                *  3 - Reservado
            */    

            if (data['status_acervo_biblioteca']==1){
                $('td', nRow).css('color', 'green');                        
             }else{
                if (data['status_acervo_biblioteca']==0){
                    $('td', nRow).css('color', 'orange');                        
                 }else{
                    if (data['status_acervo_biblioteca']==2){
                        $('td', nRow).css('color', 'red');
                    }else{
                        $('td', nRow).css('color', 'gray');                            
                    }
                }
             }
             
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
      
      table = $('#tblPesquisa').DataTable({
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
            "buttons": {
                copyTitle: 'Dados copiados',
                copyKeys: 'Use your keyboard or menu to select the copy command'
            },
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'pesquisa_controller/pesquisar',
            type: "POST",
            data: {
                chave_pesquisa: chave_pesquisa,
                tipo_material: tipo_material,
                tipo_busca: tipo_busca,
                localizacao: localizacao,
                editora:editora,
                assunto: assunto,
                genero: genero
                
            }
        },
        "columnDefs": [
            {
                "targets":[], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#NecessarioFazerLogin' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-atribuir'><i class='glyphicon glyphicon-plus' title='É necessário fazer o login'></i></a> "

            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "nome_autor"},{"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "descricao"}],
        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {

                         /*
                 *  0 - Emprestado
                *  1 - Disponível
                *  2 - Baixa / Indisponível
                *  3 - Reservado
            */    

            if (data['status_acervo_biblioteca']==1){
                $('td', nRow).css('color', 'green');                        
             }else{
                if (data['status_acervo_biblioteca']==0){
                    $('td', nRow).css('color', 'orange');                        
                 }else{
                    if (data['status_acervo_biblioteca']==2){
                        $('td', nRow).css('color', 'red');
                    }else{
                        $('td', nRow).css('color', 'gray');                            
                    }
                }
             }
             
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
}

$("#resetarPesquisa").click(function(){
    $("#resultados_busca").hide();
    $("#pesquisa").show();
});

});



