var tableLogs = "";

function PesquisarSolicitacoes(tabela,id_registro,data_inicial,data_final) {
    
        $('.dataTables_filter').show();
        
        //alert(tabela + " - " + id_registro + " - "+ data_inicial + " - " + data_final);
        
        if($.fn.dataTable.isDataTable('#tblLogs')){
            
            tableLogs.destroy();
        
            tableLogs = $('#tblLogs').DataTable({
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
                "url": 'logs_controller/buscarLogs',
                "type": 'POST',
                "data":{
                    tabela : tabela,
                    id_registro: id_registro,
                    data_inicial: data_inicial,
                    data_final: data_final
                }
            },
            "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6,
                "data": null,
                "defaultContent": "" 
            }
        ],
         "columns": [{"data": "idlog"},{"data": "tabela"},{"data": "id_registro"},{"data": "data"},{"data": "hora"},{"data": "usuario"},{"data": "descricao"}],
        "autoWidth": false,
        
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

         if ((aData['status']==0)||(aData['status']==1))
         {
                $('td', nRow).css('color', 'orange');                        
         }
         else 
         {                        
                $('td', nRow).css('color', 'green');                        
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
        
        }else{
            
            tableLogs = $('#tblLogs').DataTable({
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
                "url": 'logs_controller/buscarLogs',
                "type": 'POST',
                "data":{
                    tabela : tabela,
                    id_registro: id_registro,
                    data_inicial: data_inicial,
                    data_final: data_final
                }
            },
            "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6,
                "data": null,
                "defaultContent": "" 
            }
        ],
         "columns": [{"data": "idlog"},{"data": "tabela"},{"data": "id_registro"},{"data": "data"},{"data": "hora"},{"data": "usuario"},{"data": "descricao"}],
        "autoWidth": false,
        
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

         if ((aData['status']==0)||(aData['status']==1))
         {
                $('td', nRow).css('color', 'orange');                        
         }
         else 
         {                        
                $('td', nRow).css('color', 'green');                        
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


$(document).ready(function () {
    
    
    $("#erro").hide();
    $("#sucesso").hide();
    $("#loading").hide();
        
    $("#btn-erro-fechar").click(function(){
        $("#erro").hide();
    });

    $("#btn-sucesso-fechar").click(function(){
        $("#sucesso").hide();
    });
    
    $("#btBuscarRegistros").click(function(){
        
        var tabela = $("#tabela").val();
        var id_registro = $("#id_registro").val();
        var data_inicial = $("#data_inicial").val();
        var data_final = $("#data_final").val();
        
        PesquisarSolicitacoes(tabela,id_registro,data_inicial,data_final);
    });
   
});



