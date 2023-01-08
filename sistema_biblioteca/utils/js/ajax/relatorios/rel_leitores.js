var table = "";

function carrega_bibliotecas(){
    $.ajax({
            url: "../bibliotecas_controller/listarbibliotecas",
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



$(document).ready(function () {

    $("#erro").hide();
    $("#area_impressao").hide();
    $("#rel_le").hide();
    $("#area_impressao").hide();
    $("#btSelecaoRelatorio").hide();
    $("#btImprimir").hide();
    document.getElementById('serie').disabled=true;
    $("#loading").hide();
    
    carrega_bibliotecas();

     
      $('#perfil').change(function(){
        if($('#perfil').val()!="aluno"){
           document.getElementById('serie').disabled=true;
        }else{
            document.getElementById('serie').disabled=false;
        }
         
    });

    //clicou em voltar relatório
    $("#btSelecaoRelatorio").click(function(){
             $("#filtros_relatorio").show();
             $("#btGerarRelatorio").show();
             $("#area_impressao").hide();
             $("#btSelecaoRelatorio").hide();
             $("#btImprimir").hide();
    });
   
    $(".fechar").click(function()
    {
        $("#filtros_relatorio").show();
        $("#area_impressao").hide();
        $("#btSelecaoRelatorio").hide();
        $("#btImprimir").hide();
        $("#rel_ler").hide();
        $("#rel_leg").hide();
        $("#rel_leu").hide();    
    });
    
    $("#btGerarRelatorio").click(function()
    {
          
                //se o relatório por unidade está checado
         if($('input:radio[name=tiporel]:checked').val()=="unidade"){
            
         
             
            var biblioteca = $("#biblioteca").val();
            var perfil = $("#perfil").val();
            var serie = $("#serie").val();
            
               
                
         
         $("#filtros_relatorio").hide();
         $("#btGerarRelatorio").hide();
            
            
            
            var tit_perfil = "",tit_serie = "",tit_biblioteca = "";
            
            if(perfil!="todos"){
                tit_perfil = " com perfil "+ perfil;
            }else{
                tit_perfil = " com todos os perfis  ";
            }
            if(serie!="todas"){
                tit_serie = " na série  "+ serie;
            }
            
            if(biblioteca!="todas"){                
                tit_biblioteca = $("#biblioteca :selected").text();
                if(tit_biblioteca==""){
                 tit_biblioteca = $("#spunidade").text();   
                }
                tit_biblioteca = tit_biblioteca.split("-");
                tit_biblioteca = " da Biblioteca "+ tit_biblioteca[1];
            }
                
             $("#spsubtitulo").text(tit_biblioteca + tit_perfil + tit_serie );
             $.ajax({
                url: "rel_leitores_controller/relatorio_leitores_unidade",
                type: "POST",
                data: {
                    biblioteca: biblioteca,
                    perfil: perfil,
                    serie: serie
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leu').show();
                        $('#tblrel_leitores_unidade').hide();
                        $('#rel_leg').hide();
                        
                    }else{
                        $('#empty_leu').hide();
                         $("#tblrel_leitores_unidade tbody tr td").detach();
                        $(data).appendTo("#tblrel_leitores_unidade tbody");                    
                        $('#tblrel_leitores_unidade').show();
                        $('#rel_leg').hide();
                    }
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
             $("#rel_leu").show();
         
         
         }else{ 
         //se o relatório por unidade está checado
         //geral
         
          if($('input:radio[name=tiporel]:checked').val()=="geral"){
                
            var biblioteca = "todas";
            var perfil = $("#perfil").val();
            var serie = $("#serie").val();
            $("#filtros_relatorio").hide();
            $("#rel_leu").hide();
            $("#rel_ler").hide();            
             $.ajax({
                url: "rel_leitores_controller/relatorio_leitores_geral",
                type: "POST",
                data: {
                     biblioteca: biblioteca,
                    perfil: perfil,
                    serie: serie
                    
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leg').show();
                        $('#tblrel_leitores_geral').hide();
                    }else{
                        $('#empty_leg').hide();
                         $("#tblrel_leitores_geral tbody tr td").detach();
                        $(data).appendTo("#tblrel_leitores_geral tbody");                    
                        $('#tblrel_leitores_geral').show();
                    }
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
             $("#rel_leg").show();
         }             
     }       
        
        $("#btSelecaoRelatorio").show();
        $("#btImprimir").show();
        $("#area_impressao").show();
        
    });
   
   $("#btImprimir").click(function(){
       $("#area_impressao").print();       
   });
    
    

    $('.dataTables_filter').show();
   


table = $('#tblBibliotecas').DataTable({
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
            "url": '../relatorios/rel_leitores_controller/listar_bibliotecas',
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
                "defaultContent": "<a href='#selecionarBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-selecionar'><i class='glyphicon glyphicon-ok' title='Atualizar Informações da Biblioteca '></i></a>"
            }
        ],
        "columns": [{"data": "idbiblioteca"}, {"data": "descricao"}, {"data": "logradouro"},{"data": "complemento"},{"data": "bairro"},{"data": "municipio"},{"data": "cep"}],
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
 
});




