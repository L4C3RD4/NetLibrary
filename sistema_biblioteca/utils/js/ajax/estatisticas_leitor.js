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
            url: "index_controller/retornar_numero_bibliotecas",
            type: "POST",
            data: {
                                
            },
            success: function (data) {
                var json = $.parseJSON(data);
//                alert("Chegou anttes do if ");
                if (data) {
//                    alert("Chegou aqui");
                    $("#bibliotecas").text(data);
        
                }else {            
                      $("#bibliotecas").text(data);
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
            url: "index_controller/retornar_numero_acervos_emprestados_leitor",
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
            url: "index_controller/retornar_numero_reservas_solicitadas_leitor",
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
        
//    $.ajax({
//            url: "acervo_biblioteca_controller/alterar_status_reserva_atrasada",
//            type: "POST",
//            data: {
//                                
//            },
//             success: function (data) {
//                var json = $.parseJSON(data);
//                if (json.tipo == 'error') {
////                    $("#btFecharExcluirAutoresAcervo").click();
//                    $("#msg_erro").html("Suas Reservas Foram Canceladas! Devido a não retirada do material na biblioteca no prazo");
//                    $('#sucesso').show('slow');
////                    $("cadastrarAutorAcervo").val("Cadastrar");
//                     
//                    $('html, body').animate({scrollTop: 0}, 'slow');
////                    table.ajax.reload();
//                }else {            
////                        
//                    }                 
//                    
//            },
//            beforeSend: function () {
//                $('#loading').css({
//                    display: "inline"
//                });
//            },
//            complete: function () {
//                $('#loading').css({
//                    display: "none"
//                });
//            }            
//        });
        
         $("#erro").hide();
//         $("#sucesso").hide();

});

