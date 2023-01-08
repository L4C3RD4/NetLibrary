var table = "";



$(document).ready(function  () {

//Mascara para o campo CEP no
$("#cep").mask("99999-999");

    $("#erro").hide();
    $("#sucesso").hide();
    $("#impressao").hide();

     $('.filtro').change(function() {
        var perfil = $('#chave_emprestimo_leitor').val(); 
        var tipo = $('#chave_emprestimo_material').val(); 
        var situacao = $('#chave_emprestimo_situacao').val(); 
         $("#listar_emprestimos").show();    
//       $('#chave_emprestimo_situacao').val("entregues");
        
    if ( $.fn.dataTable.isDataTable( '#tblEmprestimo' ) ) {
           
    table.destroy();
        
       table = $('#tblEmprestimo').DataTable({
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
            "url": 'emprestimo_finalizados_controller/listar_emprestimo_parametro' ,
            type: "POST",
            data: {
                perfil : perfil,
                tipo : tipo,
                situacao : situacao
            }
            
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6, /*anterior 9 */
                "data": null,
            "defaultContent": ""
            }
        ],
       "columns": [{"data": "idemprestimo"}, {"data": "titulo"}, {"data": "usuario_nome"},{"data": "nome"},{"data": "data_emprestimo"},{"data": "hora_emprestimo"},{"data": "data_devolucao"}],
       "autoWidth": false,
                        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                alert( data["dias_atraso"]);  

                if (data["status_emprestimo"]==0){
                    if ( data["dias_atraso"]<0){  
                        $('td', nRow).css('color', 'green');                        
                         }else{   
                                if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                                }else{                       
                                    $('td', nRow).css('color', 'red');                        
                                }
                            }
                    }else{
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
      
       table = $('#tblEmprestimo').DataTable({
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
            "url": 'emprestimo_finalizados_controller/listar_emprestimo_parametro' ,
            type: "POST",
            data: {
                perfil : perfil,
                tipo : tipo,
                situacao : situacao
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6, /*anterior 9 */
                "data": null,
               "defaultContent": ""
            }
        ],
        "columns": [{"data": "idemprestimo"}, {"data": "titulo"}, {"data": "usuario_nome"},{"data": "nome"},{"data": "data_emprestimo"},{"data": "hora_emprestimo"},{"data": "data_devolucao"}],
         "autoWidth": false,
                        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                alert( data["dias_atraso"]);        
                 if (data["status_emprestimo"]==0){
                    if ( data["dias_atraso"]<0){  
                        $('td', nRow).css('color', 'green');                        
                         }else{   
                                if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                                }else{                       
                                    $('td', nRow).css('color', 'red');                        
                                }
                            }
                    }else{
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
    
     });
     
       $("#chave_emprestimo_situacao").val("entregues");
    $('.filtro').change();
    
});

