var table = "";

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
    
    $("#loading").hide();
    
    
carrega_bibliotecas();
    

    //clicou em voltar relatÃ³rio
    $("#btSelecaoRelatorio").click(function(){
             $("#filtros_relatorio").show();
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
    });
    
    $("#btGerarRelatorio").click(function(){
         if($('input:radio[name=tiporel]:checked').val()=="leitores_geral"){
          $("#rel_leitor_unidade").hide();
              $("#filtros_relatorio").hide();
             $("#titulo_rel_leitores_geral").text("Lista de Leitores");
           
             $.ajax({
                url: "rel_leitores_cadastrados_controller/gera_arquivo_leitores_geral",
                type:"POST",
                data: {
                    
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leitores_geral').show();
                        $('#tblrel_leitores_geral').hide();
                        
                    }else{
                        $('#empty_leitores_geral').hide();
//                        $("#tblrel_leitores_geral tbody tr td").detach();
//                        $(data).appendTo("#tblrel_leitores_geral tbody");                    
//                        $('#tblrel_leitores_geral').show();
//                         $('#rel_leitores_geral').show();
                          window.location.href='rel_leitores_cadastrados_controller/gera_arquivo_leitores_geral';
                        }
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });                
        }else{
            
            if($('input:radio[name=tiporel]:checked').val()=="leitor_unidade"){
             $("#rel_leitores_geral").hide();
             $("#filtros_relatorio").hide();
                var biblioteca = $("#biblioteca").val();
                    $.ajax({
                         
                            url: "../bibliotecas_controller/retorna_biblioteca",
                               type:"POST",
                               data: {
                               biblioteca:biblioteca
                               },
                               success: function (data){
                                  var json = $.parseJSON(data);
                                 var i=0;
                                  $('#descricao').val(json.data[i].descricao);
                                 $("#titulo_rel_leitor_unidade").text("Lista de leitores na Unidade : " + json.data[i].descricao);
                               }

                           }); 
                           

                
             $.ajax({
                url: "rel_leitores_cadastrados_controller/relatorio_leitor_unidade",
                type: "POST",
                data: {
                    biblioteca: biblioteca
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_leitor_unidade').show();
                        $('#tblrel_leitor_unidade').hide();
                    }else{
                        $('#empty_leitor_unidade').hide();
                        $("#tblrel_leitor_unidade tbody tr td").detach();
                        $(data).appendTo("#tblrel_leitor_unidade tbody");                    
                        $('#tblrel_leitor_unidade').show();
                        $('#rel_leitor_unidade').show();
//                        alert (biblioteca);
//                            $.ajax({
//                         
//                               url: "rel_acervo_cadastrado_controller/gera_arquivo_acervo_unidade",
//                               type:"POST",
//                               data: {
//                               biblioteca:biblioteca
//                               },
//                               success: function (data){
////                                   alert(biblioteca);
////                                  window.location.href='rel_acervo_cadastrado_controller/gera_arquivo_acervo_unidade';
//                               }
//
//                           }); 
                        
                         
                    }
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
//             $("#rel_ler").show();
         }else{
               $("#btSelecaoRelatorio").show();
         }
        }
        $("#btSelecaoRelatorio").show();
        $("#btImprimir").show();
        $("#area_impressao").show();
    });
   
   $("#btImprimir").click(function(){
       window.print();
       /*var conteudo = document.getElementById('area_impressao').innerHTML,
        tela_impressao = window.open('about:blank');
        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();   */
   });
    
});




