var table = "";
var tableBib = "";


function SelecionaLeitor() {
    $("#tblUsuarios tbody").on("click", ".selecionar", function () {
        var data = tableBib.row($(this).parents('tr')).data();
        $("#spnome_leitor").html("id: "+data["idleitor"] + "<br>"+"nome: " + data["nome"] + "<br>"+"perfil: " + data["perfil"]);
        $("#idleitor").val(data["idleitor"]);        
        $("#matricula").val(data["matricula"]);        
        $("#fechar_modal").click();
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
                var sel =  $("#unidade_educacional");
                sel.empty();
                for (var i=0; i<json.data.length; i++) {
                sel.append('<option value="' + json.data[i].idbiblioteca + '">' +json.data[i].idbiblioteca+ " - " + json.data[i].descricao + '</option>');
               }
               
          }                            
        });
}
   

function Pesquisa_usuario(chave_pesquisa,filtro_perfil,unidade_educacional){
     $("#resultados_busca").show();
    if ( $.fn.dataTable.isDataTable( '#tblUsuarios' ) ) {
           
    tableBib.destroy();
        
       tableBib = $('#tblUsuarios').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "<imgh src='utils/img/ajax_loader.gif'>",
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
            "url": 'rel_leitura_controller/pesquisar' ,
            type: "POST",
            data: {
                chave_pesquisa: chave_pesquisa,
                filtro_perfil : filtro_perfil,
                unidade_educacional:unidade_educacional
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
                "defaultContent": "<a role='button'  class='btn btn-success selecionar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idleitor"}, {"data": "nome"}, {"data": "serie"},{"data": "matricula"},{"data": "email"},{"data": "perfil"}],
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
      
       tableBib = $('#tblUsuarios').DataTable({
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
            "url": 'rel_leitura_controller/pesquisar' ,
            type: "POST",
            data: {
             
                chave_pesquisa: chave_pesquisa,
                filtro_perfil: filtro_perfil,
                unidade_educacional:unidade_educacional
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
               "defaultContent": "<a role='button' class='btn btn-success selecionar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idleitor"}, {"data": "nome"}, {"data": "serie"},{"data": "matricula"},{"data": "email"},{"data": "perfil"}],
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

$(document).ready(function () {

    $("#erro").hide();
    $("#resultados_busca").hide();
    $("#btSelecaoRelatorio").hide();
    $("#btImprimir").hide();
    $("#loading").hide();
    $("#area_impressao").hide();

    $("#geral").on("click", function () {
           carrega_bibliotecas();
           document.getElementById('unidade_educacional').disabled=true;
           document.getElementById('modal-30777').disabled=true;
     
    });
    $("#unidade").on("click", function () {
           document.getElementById('unidade_educacional').disabled=false;
           document.getElementById('modal-30777').disabled=false;
     
    });
    
    carrega_bibliotecas();
    SelecionaLeitor();


    $("#tblUsuarios tbody").on("click", ".cadastrar", function () {
var data = tableBib.row($(this).parents('tr')).data();
         
}); 
 $("#btpesquisa").click(function () {
    
        if($("#chave_pesquisa").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave_pesquisa").focus();
            
        }else{
            Pesquisa_usuario($("#chave_pesquisa").val(),$('#filtro_perfil').val(),$("#unidade_educacional").val());
           //  $('.modal').modal('hide');
           //     $('#chave_pesquisa').val("");
                $('#filtro_perfil').val();
                $("#unidade_educacional").val();
                
    
           
        }
       
    });
    

    //clicou em voltar relatório
    $("#btSelecaoRelatorio").click(function(){
             $("#filtros_relatorio").show();
             $("#btGerarRelatorio").show();
             $("#area_impressao").hide();
             $("#btSelecaoRelatorio").hide();
             $("#btImprimir").hide();
             $("#listar_emprestimos").hide();
             $('#tblEmprestimo').hide();
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
        $('#listar_emprestimos').hide();
        $("#btGerarRelatorio").show();
    });
    
    $("#btGerarRelatorio").click(function()
    {
          
         //se o relatório por unidade está checado
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
             
            
            var idleitor = $("#idleitor").val();
            var data_inicial = $("#data_inicial").val();
            var data_final = $("#data_final").val();
            
            var ano = data_inicial.substring(0,4);
            var mes = data_inicial.substring(5,7);
            var dia = data_inicial.substring(8,10);
            var data_inicial_label = dia+"/"+mes+"/"+ano;   
            
            ano = data_final.substring(0,4);
            mes = data_final.substring(5,7);
            dia = data_final.substring(8,10);
            var data_final_label = dia+"/"+mes+"/"+ano;   
            
            if(idleitor=="")
            {
                $("#msg_erro").html("Escolha uma Leitor!");
                $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                $("#btSelecaoRelatorio").click(); 
                
            }else{
                $.ajax({
                url: "rel_leitura_controller/relatorio_leitura_unidade",
                type: "POST",
                data: {
                    idleitor: idleitor,
                    data_inicial:data_inicial,
                    data_final:data_final
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leu').show();
                        $('#tblEmprestimo').hide();
                        $('#rel_leg').hide();
                        
                    }else{
                        $('#empty_leu').hide();
                         $("#tblEmprestimo tbody tr td").detach();
                        $(data).appendTo("#tblEmprestimo tbody");  
                        $('#tblEmprestimo').show();
                        $('#listar_emprestimos').show();
                        $('#ranking_leitura').hide();
                    }
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
                
         var nome_leitor = $("#spnome_leitor").text();
         nome_leitor = nome_leitor.replace("id:","");
         nome_leitor = nome_leitor.replace("nome:","");
         nome_leitor = nome_leitor.replace("perfil:","");
         nome_leitor = nome_leitor.replace("aluno","");
         nome_leitor = nome_leitor.replace("professor","");
         nome_leitor = nome_leitor.replace("comunidade","");
         var nome_biblioteca = $("#unidade_educacional :selected").text();
         var periodo = data_inicial_label+" à "+data_final_label;
         
         $("#spleitor").text(nome_leitor);
         $("#spunidade").text(nome_biblioteca);
         $("#spperiodo").text(periodo);
         
         $("#filtros_relatorio").hide();
         $("#btGerarRelatorio").hide();     
         $("#listar_emprestimos").show();    

            }
             
         }
         
         }else{ 
         //se o relatório por unidade está checado
         //geral
         
          if($('input:radio[name=tiporel]:checked').val()=="geral"){
              
              
            data_inicial = $("#data_inicial").val();
            data_final = $("#data_final").val();
            
            var ano = data_inicial.substring(0,4);
            var mes = data_inicial.substring(5,7);
            var dia = data_inicial.substring(8,10);
            var data_inicial_label = dia+"/"+mes+"/"+ano;   
            
            ano = data_final.substring(0,4);
            mes = data_final.substring(5,7);
            dia = data_final.substring(8,10);
            var data_final_label = dia+"/"+mes+"/"+ano;   
            
            var periodo = data_inicial_label +" à "+data_final_label;
            $("#periodoranking").text(periodo);
     
            $.ajax({
                url: "rel_leitura_controller/relatorio_ranking_leitura",
                type: "POST",
                data: {
                    data_inicial:data_inicial,
                    data_final:data_final
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leu').show();
                        $('#tblrel_leitores_unidade').hide();
                        $('#rel_leg').hide();
                        
                    }else{
                        $('#empty_leu').hide();
                         $("#tblRanking tbody tr td").detach();
                        $(data).appendTo("#tblRanking tbody");                    
                        $('#listar_emprestimos').hide();                        
                        $('#ranking_leitura').show();
                    }
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
                
         
         $("#filtros_relatorio").hide();
         $("#btGerarRelatorio").hide();
            
            
       
     
         $("#listar_emprestimos").show();    
 
    
   
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
   

});




