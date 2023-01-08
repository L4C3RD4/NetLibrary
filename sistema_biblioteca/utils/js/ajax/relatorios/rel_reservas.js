var table = "";


function SelecionaUnidade() {
    $("#tblBibliotecas tbody").on("click", ".btn-selecionar", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spunidade_educacional").html("<br>"+data["idbiblioteca"] + " - " + data["descricao"]);
        $("#unidade_educacional").val(data["idbiblioteca"]);        
        $("#btSFecharSelecionarUnidade_Educacional").click();
        $("#titulo_rel_leu").text("Lista Geral da Unidade : "+ data["descricao"]);
    });

}

//Carrega Bibliotecas
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
    carrega_bibliotecas();
    $("#loading").hide();
    
    document.getElementById('serie').disabled=true;

    SelecionaUnidade();
   
     $('#perfil').change(function(){
        if($('#perfil').val()!="aluno"){
           document.getElementById('serie').disabled=true;
        }else{
            document.getElementById('serie').disabled=false;
        }
         
    });
    

    //clicou em voltar relatÃ³rio
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
         
    });
    
    $("#btGerarRelatorio").click(function()
    {
          
                //se o relatÃ³rio por unidade estÃ¡ checado
         if($('input:radio[name=tiporel]:checked').val()=="unidade"){
            
                        
             if($("#unidade_educacional").val()=="")
             {
                $("#msg_erro").html("Escolha uma Unidade Educacional!");
                $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                $("#btSelecaoRelatorio").click();
            }
            else 
            {
             
            var biblioteca = $("#biblioteca").val();
            var perfil = $("#perfil").val();
            var serie = $("#serie").val();
                
         
         $("#filtros_relatorio").hide();
         $("#btGerarRelatorio").hide();
            
            
            
            var tit_perfil = "",tit_serie = "",tit_unidade = "";
            if(perfil!="todos"){
                tit_perfil = " com perfil "+ perfil;
            }else{
                tit_perfil = " com todos os perfils  ";
            }
            if(serie!="todas"){
                tit_serie = " na série  "+ serie;
            }
            
            if(biblioteca!="todas"){
                tit_unidade = " na unidade "+$("#biblioteca :selected").text();
            }
                
             $("#titulo_rel_leg").text("Relatório de Reservas Solicitadas "+ tit_perfil + tit_unidade + tit_serie );
             $.ajax({
                url: "rel_reservas_controller/listar_reservas",
                type: "POST",
                data: {
                    biblioteca: biblioteca,
                    perfil: perfil,
                    serie: serie
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leg').show();
                        $('#tblrel_reservas').hide();
                    }else{
                        $('#empty_leg').hide();
                         $("#tblrel_reservas tbody tr td").detach();
                        $(data).appendTo("#tblrel_reservas tbody");                    
                        $('#tblrel_reservas').show();
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
         
         }else{ 
         //se o relatÃ³rio geral estiver checado
         
          if($('input:radio[name=tiporel]:checked').val()=="geral"){
              
             
            var biblioteca = "todas"
            var perfil = $("#perfil").val();
            var serie = $("#serie").val();
            $("#filtros_relatorio").hide();
            $("#titulo_rel_leg").text("Relatório Geral de Reservas Solicitadas");
             $.ajax({
                url: "rel_reservas_controller/listar_reservas",
                type: "POST",
                data: {
                    biblioteca: biblioteca,
                    perfil: perfil,
                    serie: serie
                    
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leg').show();
                        $('#tblrel_reservas').hide();
                    }else{
                        $('#empty_leg').hide();
                         $("#tblrel_reservas tbody tr td").detach();
                        $(data).appendTo("#tblrel_reservas tbody");                    
                        $('#tblrel_reservas').show();
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
            "sLengthMenu": "Mostrar _MENU_ registros por pÃ¡gina",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "PrÃ³ximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Ãšltimo"
            }
        },
        "ajax": {
            "url": '../relatorios/rel_reservas_controller/listar_bibliotecas',
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
                "defaultContent": "<a href='#selecionarBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-selecionar'><i class='glyphicon glyphicon-ok' title='Atualizar InformaÃ§Ãµes da Biblioteca '></i></a>"
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
 
});




