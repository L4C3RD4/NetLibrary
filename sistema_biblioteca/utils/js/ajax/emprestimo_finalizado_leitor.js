var table = "";


$(document).ready(function  () {


    $("#erro").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
    
   
        
    $('.dataTables_filter').show();

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
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'emprestimo_finalizados_controller/listar_emprestimos_leitor_finalizado',
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#alterarBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações da Biblioteca '></i></a>" +
                        "&nbsp<a href='#excluirBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Disciplina '></i></a>"
            }
        ],
        "columns": [{"data": "idemprestimo"}, {"data": "titulo"}, {"data": "bibliotecario"},{"data": "data_emprestimo"},{"data": "hora_emprestimo"},{"data": "data_devolucao"},{"data": "descricao"},{"data": "status_2"}],
        "autoWidth": false,
              "autoWidth": false,
                        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                alert( data["dias_atraso"]);        
                 
                    if ( data["status"]==0){  
                            if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                             }else{   
                                 if ( data["dias_atraso"]>=1){  
                                    $('td', nRow).css('color', 'red');                        
                                    }else{                       
                                         $('td', nRow).css('color', 'green');                        
                                    }   
                                }                           
                        
                            }else{
                                if ( data["status"]==1){ 
                                
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


     $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });

});

