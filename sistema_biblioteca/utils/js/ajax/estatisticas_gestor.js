var table = "";




$(document).ready(function  () {
        
    $.ajax({
            url: "index_controller/retornar_numero_acervos_cadastrados",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#acervos_cadastrados").text(data);
        
                }else {            
                        $("#acervos_cadastrados").text(data);
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
            url: "index_controller/retornar_numero_leitores_cadastrados",
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
            url: "index_controller/retornar_numero_acervos_emprestados",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#acervos_empregados").text(data);
        
                }else {            
                       $("#acervos_empregados").text(data);
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
            url: "index_controller/retornar_numero_reservas_solicitadas",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#reservas_solicitadas").text(data);
        
                }else {            
                       $("#reservas_solicitadas").text(data);
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

