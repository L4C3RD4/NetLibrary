var table = "";


$(document).ready(function  () {


    $("#erro").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
    
    $.ajax({
            url: "acervo_controller/listar_editoras",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#editora");
                sel.empty();
                sel.append('<option value="todas"> Todas </option>');
                for (var i=0; i<json.data.length; i++) {
                 sel.append('<option value="' + json.data[i].editora + '">'+json.data[i].editora + '</option>');
               }
              
          }                            
        });
        
    $('.dataTables_filter').show();

    table = $('#tblReservas_leitor').DataTable({
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
            "url": 'reservas_leitor_controller/listar_reservas_leitor',
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5, /*anterior 9 */
                "data": null,
                "defaultContent": "",
            }
        ],
        "columns": [{"data": "idreserva"}, {"data": "nome_leitor"}, {"data": "titulo"},{"data": "descricao"},{"data": "data_solicitacao"},{"data": "data_vencimento"}],
        "autoWidth": false,
              "autoWidth": false,
                        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                alert( data["dias_atraso"]);        
                    if ( data["dias_atraso"]<0){  
                        $('td', nRow).css('color', 'green');                        
                         }else{   
                                if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                                }else{                       
                                    if( data["dias_atraso"]>=1){
                                        $('td', nRow).css('color', 'red');
                                    }else{
                                        
                                    }                        
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

