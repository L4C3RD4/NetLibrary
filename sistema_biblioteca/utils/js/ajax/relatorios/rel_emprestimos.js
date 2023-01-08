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



$(document).ready(function  () {
 $("#listar_emprestimos").hide();   
 $("#erro").hide();
 $("#sucesso").hide();
 $("#area_impressao").hide();
 $("#btSelecaoRelatorio").hide();
 $("#btImprimir").hide();
 
  document.getElementById('serie').disabled=true;

 carrega_bibliotecas();
 
 $('#perfil').change(function(){
        if($('#perfil').val()!="aluno"){
           document.getElementById('serie').disabled=true;
        }else{
            document.getElementById('serie').disabled=false;
        }
         
    });

   

    $(".fechar").click(function()
    {
        $("#filtros_relatorio").show();
        $("#area_impressao").hide();
        $("#btSelecaoRelatorio").hide();
        $("#btImprimir").hide();
    });
    //clicou em voltar relatÃ³rio
    $("#btSelecaoRelatorio").click(function(){
            $("#filtros_relatorio").show();
            $("#btGerarRelatorioBib").show();
            $("#area_impressao").hide();
            $("#listar_emprestimos_unidade").hide(); 
            $("#listar_emprestimos_geral").hide(); 
            $("#btSelecaoRelatorio").hide();
            $("#btImprimir").hide();
    });
    
    $("#btGerarRelatorioBib").click(function(){
    
                //se o relatÃ³rio por unidade estÃ¡ checado
         if($('input:radio[name=tiporel]:checked').val()=="unidade"){
            
                        
                var biblioteca = $("#biblioteca").val();
                var perfil = $("#perfil").val();
                var serie = $("#serie").val();
                var data_inicial = $("#data_inicial").val();
                var data_final = $("#data_final").val();
  
         $("#filtros_relatorio").hide();
         $("#btGerarRelatorioBib").hide();
            
            
            
            var tit_perfil = "",tit_serie = "",tit_unidade = "";
            if(perfil!="todos"){
                tit_perfil = " com perfil "+ perfil;
            }else{
                tit_perfil = " com todos os perfis  ";
            }
            if(serie!="todas"){
                tit_serie = " na série  "+ serie;
            }
            
            if(unidade_educacional!="todas"){
                tit_unidade = " na unidade "+$("#spunidade").text();
            }
            
            var ano = data_inicial.substring(0,4);
            var mes = data_inicial.substring(5,7);
            var dia = data_inicial.substring(8,10);
            var data_inicial_label = dia+"/"+mes+"/"+ano;   
            
            ano = data_final.substring(0,4);
            mes = data_final.substring(5,7);
            dia = data_final.substring(8,10);
            var data_final_label = dia+"/"+mes+"/"+ano;   
            
            var periodo = "período de "+data_inicial_label+" à "+data_final_label;    
                
             $("#subtitulo_rel_unidade").text(tit_perfil + tit_unidade + tit_serie + periodo );
             $.ajax({
                url: "rel_emprestimos_controller/relatorio_emprestimos_unidade",
                type: "POST",
                data: {
                    biblioteca: biblioteca,
                    perfil: perfil,
                    serie: serie,
                    data_inicial:data_inicial,
                    data_final:data_final
                },
                 success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                       $("#listar_emprestimos_unidade").show(); 
                       $("#listar_emprestimos_geral").hide(); 
                       $('#empty_emp').show();
                         
                    }else{
                        $("#listar_emprestimos").show(); 
                        $('#empty_emp').hide();
                         $("#tblEmprestimoUnidade tbody tr td").detach();
                        $(data).appendTo("#tblEmprestimoUnidade tbody");                    
                        $('#tblEmprestimoUnidade').show();
                        $("#listar_emprestimos_unidade").show(); 
                        $("#listar_emprestimos_geral").hide(); 
                        
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
             
         //geral
                         
                var unidade_educacional = "todas";
                var perfil = $("#perfil").val();
                var serie = $("#serie").val();
                var data_inicial = $("#data_inicial").val();
                var data_final = $("#data_final").val();
                       
                         
            $("#filtros_relatorio").hide();
            $("#btGerarRelatorioBib").hide();
            
            var tit_perfil = "",tit_serie = "",tit_unidade = "";
            if(perfil!="todos"){
                tit_perfil = " com perfil "+ perfil;
            }else{
                tit_perfil = " com todos os perfis  ";
            }
            if(serie!="todas"){
                tit_serie = " na série  "+ serie;
            }
            
            if(unidade_educacional!="todas"){
                tit_unidade = " na unidade "+$("#spunidade").text();
            }
            
            var ano = data_inicial.substring(0,4);
            var mes = data_inicial.substring(5,7);
            var dia = data_inicial.substring(8,10);
            var data_inicial_label = dia+"/"+mes+"/"+ano;   
            
            ano = data_final.substring(0,4);
            mes = data_final.substring(5,7);
            dia = data_final.substring(8,10);
            var data_final_label = dia+"/"+mes+"/"+ano;   
            
            var periodo = data_inicial_label+" à "+data_final_label;
                
             $("#subtitulo_rel_geral").text(tit_perfil + tit_unidade + tit_serie + periodo );
             $.ajax({
                url: "rel_emprestimos_controller/relatorio_geral_emprestimos",
                type: "POST",
                data: {
                    unidade_educacional: unidade_educacional,
                    perfil: perfil,
                    serie: serie,
                    data_inicial:data_inicial,
                    data_final:data_final
                    
                },
                success: function (data) {
                    if (data.indexOf("vazio") >= 0){
                        $("#listar_emprestimos").show(); 
                        $('#empty_emp').show();
                        $("#listar_emprestimos_unidade").hide(); 
                        $("#listar_emprestimos_geral").show(); 
                        
                        
                    }else{
                         $("#listar_emprestimos").show(); 
                        $('#empty_emp').hide();
                         $("#tblEmprestimo tbody tr td").detach();
                        $(data).appendTo("#tblEmprestimo tbody");                    
                        $('#tblEmprestimo').show();
                        $("#listar_emprestimos_unidade").hide(); 
                        $("#listar_emprestimos_geral").show(); 
                        
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
           
        
        $("#btSelecaoRelatorio").show();
        $("#btImprimir").show();
        $("#area_impressao").show();
        
        
      
 
    });
    

    $("#btImprimir").click(function(){
       $("#area_impressao").print(); 
   });
    
    
});