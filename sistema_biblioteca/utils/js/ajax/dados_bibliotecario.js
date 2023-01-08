var table = "";
function verifica_altera(){
	 var senha = $("#altsenha").val();
	var forca = 0;
	//mostra = document.getElementById("mostra");
	if((senha.length >= 4) && (senha.length <= 7)){
		forca += 10;
	}else if(senha.length>7){
		forca += 25;
	}
	if(senha.match(/[a-z]+/)){
		forca += 10;
	}
	if(senha.match(/[A-Z]+/)){
		forca += 20;
	}
	if(senha.match(/d+/)){
		forca += 20;
	}
	if(senha.match(/W+/)){
		forca += 25;
	}
	if(senha.match(/@/)||senha.match(/!/)||senha.match(/£/)||senha.match(/%/)||senha.match(/$/)||senha.match(/^/)||senha.match(/_/)||senha.match(/#/)){
		forca += 25;
	}
        
        if(forca<=49){
            document.getElementById('mybar').style.width = '40%';
            $('#mybar').css('background-color', 'red');
            
        }else{
            
             if(forca>=50 && forca<=69){
           document.getElementById('mybar').style.width = '50%';
           $('#mybar').css('background-color', 'orange');
            
        }else{
            if(forca>70){
                document.getElementById('mybar').style.width = '100%';
            $('#mybar').css('background-color', 'green');
            
        } 
            
        }
            
        }

}
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
     $("#altsenha").focusout(function(){
        verifica_altera();
});
    
      $.ajax({
            url: "dados_usuario_controller/exibir_dados_bibliotecario",
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
                   
                    $('#nome'). text(json.data[i].idusuario+" - "+json.data[i].nome);
                    $('#biblioteca'). text(json.data[i].idbiblioteca +" - "+json.data[i].descricao);
                    var data = json.data[i].data;
                    data = data.split("-");
                    $('#data').text(data[2]+"/"+data[1]+"/"+data[0]);
                    $('#logradouro').text(json.data[i].logradouro);
                    $('#complemento').text(json.data[i].complemento);
                    $('#bairro').text(json.data[i].bairro);
                    $('#municipio').text(json.data[i].municipio);
                    $('#perfil').text(json.data[i].perfil);
                    $('#serie').text(json.data[i].serie);
                    $('#celular').text(json.data[i].celular);
                    $('#email').text(json.data[i].email);
                    
                   

            $("#sp_nome").text(json.data[i].idusuario+" - "+json.data[i].nome);
            $("#usuario_login").val(json.data[i].idusuario);
            $("#sp_email").text(json.data[i].email);;
                    
                    
                }else {            

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
    



