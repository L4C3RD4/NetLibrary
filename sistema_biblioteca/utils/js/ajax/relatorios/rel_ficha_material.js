var table = "";



$(document).ready(function () {

    $("#erro").hide();
    $("#area_impressao").hide();
    $("#rel_le").hide();
    $("#area_impressao").hide();
    $("#btSelecaoRelatorio").hide();
    $("#btImprimir").hide();
    
    $("#loading").hide();
    
    
  
    //clicou em voltar relatório
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
             
             $("#spsubtitulo").text(" da Biblioteca : " + nome_biblioteca[1]);
                               
             $.ajax({
                url: "rel_ficha_material_controller/fichas_material",
                type: "POST",
                data: {
                    biblioteca: biblioteca
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $('#empty_acervo_biblioteca').show();
                        $('#tblrel_acervo_biblioteca').hide();
                    }else{
                        $("#fichas").html("");
                        $("#fichas").html(data);
                        //$('#tblrel_acervo_biblioteca').show();
                        //$('#rel_acervo_biblioteca').show();                        
                        
                    }
            },
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
         
       
        
              
            
        
        
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




