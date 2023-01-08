var table = "";




$(document).ready(function  () {
        
    $.ajax({
            url: "index_controller/retorna_qtd_materiais",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#materiais_cadastrados").text(data);
        
                }else {            
//                        $("#btFecharExcluirBiblioteca").click();
//                        $("#msg_erro").html("Falha ao excluir a biblioteca!");
//                        $('#erro').show('slow');
//                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
        
        
    $.ajax({
            url: "index_controller/retornar_numero_emprestimos",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#materiais_emprestados").text(data);
        
                }else {            
//                        $("#btFecharExcluirBiblioteca").click();
//                        $("#msg_erro").html("Falha ao excluir a biblioteca!");
//                        $('#erro').show('slow');
//                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
        
        
    $.ajax({
            url: "index_controller/retornar_numero_leitores",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#leitores_cadastrados").text(data);
        
                }else {            
                       $("#leitores_cadastrados").text(data);
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
        
    $.ajax({
            url: "index_controller/retornar_numero_reservas",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#reservas").text(data);
        
                }else {            
                       $("#reservas").text(data);
                    }                 
                    
            },
            beforeSend: function () {
                $('#loading').css({
                    display: "inline"
                });
            },
            complete: function () {
                $('#loading').css({
                    display: "none"
                });
            }            
        });
        

});

