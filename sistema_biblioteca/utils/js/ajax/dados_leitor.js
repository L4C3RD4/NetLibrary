var table = "";

function AlterarSenha(){
        if(data["email"]==""){
            $("#msg_erro").html("Atenção! Esse estudante não possui e-mail cadastrado! Favor incluir um e-mail principal no cadastro do mesmo! ");
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');            
        }else{
            $("#sp_nome").text(data["idleitor"]+" - "+data["nome"]);
            $("#usuario_login").val(data["idleitor"]);
            $("#sp_email").text(data["email"]);
            $("#atualiza_login").show();
        }
        
   
}    
        



$(document).ready(function  () {

    $('#sucesso').hide();
    $('#erro').hide();
    $('#atualiza_login').hide();
    
      $.ajax({
            url: "dados_usuario_controller/exibir_dados",
            type: "POST",
            data: {
                
                
            },
            success: function (data) {
               var json = $.parseJSON(data);
                var i=0;
                if (data) {
//                    $("#btFecharExcluirLeitor").click();
//                    $("#msg_acerto").html("Leitor excluido com sucesso!");
//                    $('#sucesso').show('slow');
//                    table.ajax.reload();
//                    $('html, body').animate({scrollTop: 0}, 'slow');
                   
                    $('#nome'). text(json.data[i].idleitor+" - "+json.data[i].nome);
                    $('#cpf'). text(json.data[i].cpf);
                    $('#cep'). text(json.data[i].cep);
                    $('#logradouro'). text(json.data[i].logradouro);
                    $('#complemento'). text(json.data[i].complemento);
                    $('#bairro'). text(json.data[i].bairro);
                    $('#municipio'). text(json.data[i].municipio);
                    $('#perfil'). text(json.data[i].perfil);
                    $('#serie'). text(json.data[i].serie);
                    $('#matricula').text(json.data[i].matricula);
                    $('#email').text(json.data[i].email);
                                       

            $("#sp_nome").text(json.data[i].idleitor+" - "+json.data[i].nome);
            $("#usuario_login").val(json.data[i].idleitor);
            $("#sp_email").text(json.data[i].email);;
//            $("#atualiza_login").show();
                    
                    
                }else {            
//                        $("#btFecharExcluirLeitor").click();
//                        $("#msg_erro").html("Falha ao excluir o Leitor!");
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
    
   

$("#btAtualizaSenhaUsuario").click(function(){
                
        var senha_atual = $("#senha_atual").val();
        var altsenha = $("#altsenha").val();
        var confirm_senha = $("#confirm_senha").val();
        
        
        if((altsenha=="")||(confirm_senha==""))
        {            
            $("#atualiza_login").hide();
            $("#msg_erro").html("Valor inválido para o campo senha e ou confirmação de senha! Esses campos não podem ficar em branco!");
           $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
            
        }else{
            
            if(altsenha!=confirm_senha)
            {
                $("#atualiza_login").hide();
                $("#msg_erro").html("As senhas não conferem! Favor verificar essa informação!");
                $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
                $("#altsenha").val("");
                $("#confirm_senha").val("");
            }
            else
            {
                var idusuario= $('#usuario_login').val();
                
//                limpa_formulario_alterarSenha();
                $.ajax({
                    url: "usuarios_controller/atualiza_proprio_login",
                    type: "POST",
                    data: {
                        idusuario: idusuario,
                        senha_atual: senha_atual,
                        altpass: altsenha
                    },
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    complete: function () {
                        $('#loading').hide();
                    },
                    success: function (data) {
                        var json = $.parseJSON(data);
                        if (json.tipo == 'success') {
                            $("#btFecharAtualizacao").click();
                            $("#msg_acerto").html("A senha do usuário foi atualizada com sucesso!");
                            $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                             $("#altsenha").val("");
                            $("#confirm_senha").val("");
                        } else {
                            $("#msg_erro").html("Falha ao atualizar a senha do usuário! Tente novamente mais tarde.");
                           $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
                            
                        }
                    }
                });               
            }            
        }        
    });
    
       $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });
    
    $("#btFecharAtualizacao").click(function(){
        window.location.href = "index_controller";
    });
    
});
    



