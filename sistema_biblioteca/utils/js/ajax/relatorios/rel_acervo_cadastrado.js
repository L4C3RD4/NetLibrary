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
  
    //clicou em voltar relatÃƒÂ³rio
    $("#btSelecaoRelatorio").click(function(){
             $("#filtros_relatorio").show();
             $("#area_impressao").hide();
             $("#btGerarRelatorio").show();
             $("#btGerarPlanilha").show();
             
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
        $("#btGerarRelatorio").hide();
        $("#btGerarPlanilha").hide();
         if($('input:radio[name=tiporel]:checked').val()=="acervo_geral"){
              $("#rel_acervo_biblioteca").hide();
              $("#filtros_relatorio").hide();
             $("#spsubtitulo").text("Geral");
           
             $.ajax({
                url: "rel_acervo_cadastrado_controller/relatorio_ag",
                type:"POST",
                data: {
                    
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_acervo_geral').show();
                        $('#tblrel_acervo_geral').hide();
                        
                    }else{
                        $('#empty_acervo_geral').hide();
                        $("#tblrel_acervo_geral tbody tr td").detach();
                        $(data).appendTo("#tblrel_acervo_geral tbody");                    
                        $('#tblrel_acervo_geral').show();
                         $('#rel_acervo_geral').show();                         
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
            
            if($('input:radio[name=tiporel]:checked').val()=="acervo_biblioteca"){
             $("#rel_acervo_geral").hide();
             $("#filtros_relatorio").hide();
             var biblioteca = $("#biblioteca").val();
             var nome_biblioteca = $("#biblioteca :selected").text();
             if(nome_biblioteca!=""){
                nome_biblioteca = nome_biblioteca.split("-");
             }else{
                 nome_biblioteca = $("#spunidade").text();
                 nome_biblioteca = nome_biblioteca.split("-");
             }
             
             $("#spsubtitulonomebib").text(" da Biblioteca : " + nome_biblioteca[1]);
                               
             $.ajax({
                url: "rel_acervo_cadastrado_controller/relatorio_bib",
                type: "POST",
                data: {
                    biblioteca: biblioteca
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_acervo_biblioteca').show();
                        $('#tblrel_acervo_biblioteca').hide();
                    }else{
                        $('#empty_acervo_biblioteca').hide();
                        $("#tblrel_acervo_biblioteca tbody tr td").detach();
                        $(data).appendTo("#tblrel_acervo_biblioteca tbody");                    
                        $('#tblrel_acervo_biblioteca').show();
                        $('#rel_acervo_biblioteca').show();                        
                        
                    }
            },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
         
       
        
              }
            
        }
        
         $("#btSelecaoRelatorio").show();
        $("#btImprimir").show();
        $("#area_impressao").show();
    });
   
        $("#btGerarPlanilha").click(function(){
            
            if($('input:radio[name=tiporel]:checked').val()=="acervo_geral"){
                
                window.location.href='rel_acervo_cadastrado_controller/gera_arquivo_acervo_geral';
                
            }else{
            
            var biblioteca = $("#biblioteca").val();
            window.location.href='rel_acervo_cadastrado_controller/gera_arquivo_acervo_unidade?biblioteca='+biblioteca;
            
            }
    });
   
   $("#btImprimir").click(function(){
       $("#area_impressao").print();
   });
    

});




