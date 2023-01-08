var table = "";
function verifica(){
	 var senha = $("#senha").val();
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
            document.getElementById('myBar').style.width = '40%';
            $('#myBar').css('background-color', 'red');
            
        }else{
            
             if(forca>=50 && forca<=69){
           document.getElementById('myBar').style.width = '50%';
           $('#myBar').css('background-color', 'orange');
            
        }else{
            if(forca>70){
                document.getElementById('myBar').style.width = '100%';
            $('#myBar').css('background-color', 'green');
            
        } 
            
        }
            
        }

}
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
    $("#tblUsuarios tbody").on("click", ".btn-altsenha", function () {
        var data = table.row($(this).parents('tr')).data();
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
            $("#sp_nome").text(data["idusuario"]+" - "+data["nome"]);
            $("#usuario_login").val(data["idusuario"]);
            $("#sp_email").text(data["email"]);
            $("#atualiza_login").show();
        }
        
    });
}
 function limpa_formulario_alterarSenha(){
                $("#altsenha").val("");
                $("#confirm_senha").val("");
                
                
                
            }
            
function modalExcluirUsuario() {
   $("#tblUsuarios tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanNomeUsuario").html("<br>ID:"+data["idusuario"] + " - Nome:" + data["nome"]);
        $("#idusuarioex").val(data["idusuario"]); 
        if(data["status"]==0){
            $("#spacao").text(" desbloquear "); 
            $("#btacao").text(" desbloquear "); 
            $("#status").val("1"); 
        }else{
            $("#spacao").text(" bloquear ");
            $("#btacao").text(" bloquear "); 
            $("#status").val("0");
        }
    });
}


function modalAlterarUsuario() {
    $("#tblUsuarios tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#edidusuario').val(data["idusuario"]);
        $('#ednome').val(data["nome"]);
        //$('#edemail').val(data["email"]);
        $('#edendereco').val(data["endereco"]);
        $('#edcelular').val(data["celular"]);   
        $('#edemail').val(data["email"]);   
        
      //  $('#ed-perfil').val(data["perfil"]);              
        
    });
}
function reset_campos(){
    $('#nome').val("");
$('#endereco').val("");
$('#celular').val("");
$('#email').val("");
$('#perfil').val("");
    
    
}


$(document).ready(function () { 

$("#cpf_cnpj_invalido").hide();
$("#cep_invalido").hide();
$("#cep").mask("99999-999");
$("#edcep").mask("99999-999");
$("#celular").mask("(99)99999-9999");
$("#edcelular").mask("(99)99999-9999");
    AlterarSenha();
    $("#erro").hide();
    $("#sucesso").hide();
    $("#sucesso2").hide();
    $("#impressao").hide();
    $("#loading").hide();
    $("#loading2").hide();
$("#senha").focusout(function(){
        verifica();
});
$("#altsenha").focusout(function(){
        verifica_altera();
});
    
    $("#alert-ed-senha").hide();
   
   $("#altsenha").complexify({}, function (valid, complexity) {
        document.getElementById("mtSenha").value = complexity;
        $('#per').text(Math.round(complexity));
    });

$("#btFecharAtualizacao").click(function(){
    $("#atualiza_login").hide();
});

    $("#CancelarCadastro").click(function(){
        $("#limparDados").click();
        $("#tab_lista_usuarios").tab("show");
    });
 
    modalExcluirUsuario();
    modalAlterarUsuario();


    function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
            }
                //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                       $.ajax({
        url: 'http://cep.republicavirtual.com.br/web_cep.php?cep='+cep+'&formato=json',
        dataType: 'json',
        cache: false,
        beforeSend: function(){
            // implemente sua animação aqui
            $('#loading').show();
        }
    }).done(function(data){
        if (data.resultado > 0){
            $('#loading').hide();
            $('#endereco').val(data.tipo_logradouro + " " + data.logradouro + "," + data.bairro + "," + data.cidade);
            if(data.cidade!="Contagem"){
                $("#msg_cep_invalido").text("Atenção! Segundo nossa base de dados o CEP digitado não pertence ao município de Contagem!");
                $("#cep_invalido").show();
                $('html, body').animate({scrollTop: 0}, 'slow');
            }
            }        
        else{ 
            $("#msg_cep_invalido").text("Atenção! O CEP não foi encontrado!");
            $("#cep_invalido").show();
            $('html, body').animate({scrollTop: 0}, 'slow');
            $('#loading').hide();
        };
    }).always(function(){
       // esconde animação
       $('#loading').hide(); 
    });
       

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                       $("#msg_cep_invalido").text("Atenção! O formato do CEP está inválido!");
                       $("#cep_invalido").show();
                       $('html, body').animate({scrollTop: 0}, 'slow');
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
            $("#corrigirCEP").click(function(){
        $("#cep").focus();
        $("#endereco").val("");
        $("#cep_invalido").hide();        
    });
    
    $("#manterCEP").click(function(){
        $("#endereco").focus();        
        $("#cep_invalido").hide();        
    });

    //$("#cep").mask("99999-999");
    $("#erro").hide();
    $("#sucesso").hide();
    var email;
    function ValidateEmail() 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    return (true)
  }
    $("#msg_erro").html("Você digitou um email invalido!Verifique-o!");
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
            $("#email").focus();
    return (false)
}
$("#email").focusout(function(){
        email= $("#email").val();
        ValidateEmail();
        
});

    $('.close').click(function(){
       $("#erro").hide();
       $("#sucesso").hide();
       $("#sucesso2").hide();
    });

    $('.confirm').click(function(){
        $("#erro").hide();
        $("#sucesso").hide();
        $("#sucesso2").hide();
    });

    $('.dataTables_filter').show();

    table = $('#tblUsuarios').DataTable({
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
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'usuarios_controller/listar_usuarios/'
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#alterarUsuario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações do Usuario '></i></a>" +
                        "&nbsp<a href='#excluirUsuario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-remove' title='Bloquear o Usuário '></i></a>"+
                       "&nbsp<a href='#alterarsenha' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-altsenha'><i class='glyphicon glyphicon-lock' title='Atualizar a Senha do Usuário '></i></a>"

            }
        ],
        "columns": [{"data": "idusuario"}, {"data": "nome"}, {"data": "endereco"},{"data": "celular"},{"data": "email"},{"data": "perfil"}],
        "autoWidth": false,
         "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                 if ( aData['status']==0)
                 {
                        $('td', nRow).css('color', 'red');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'green');                        
                 }
                 }
        ,
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {"sExtends": "copy",
                    "sButtonText": "Copiar",
                    "sToolTip": "Copiar os dados para a área de transferência",
                    "sInfo": "Os dados foram copiados para a área de transferência"

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


    $("#cadastrarUsuario").click(function () {
       var senha = $("#senha").val();
        var senha2 = $("#senha2").val();
    	if((senha=="")||(senha2=="")){
             $("#msg_erro").html("O campo de senha não pode ficar vazio! verifique as senhas!");
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
        }else{
        
	if (senha !== senha2){
            $("#msg_erro").html("A senha de confirmação não confere com a original! verifique as senhas!");
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
	}else{
            var idusuario = null;
            var nome = $('#nome').val();
            var endereco = $('#endereco').val();
            var celular = $('#celular').val();
             email = $('#email').val();
            var perfil = $('#perfil').val();
       if((nome=="")||(endereco=="")||(celular=="")||(email=="")||(perfil=="")){
            $("#msg_erro").html("Todos os campos devem estar preenchidos! verifique-os!");
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
           
       }else{    
            $.ajax({
		url: "usuarios_controller/cadastrar_usuario",
                type: "POST",
                data: {
                        idusuario: idusuario,
                        nome: nome,
                        endereco: endereco,
                        celular: celular,
                        email: email,
                        perfil: perfil,
                        senha: senha
			},
                success: function (data){
                    var json = $.parseJSON(data);
                    if (json.tipo == 'success'){
                        $("#msg_acerto").html(perfil +" cadastrado com sucesso!");
                         $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                        
                         table.ajax.reload();
                        
                        
                    }
                    
                    else{	
                        $("#msg_erro").html("Falha ao cadastrar usuário!");
                        $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
                         table.ajax.reload();
                    }
                },
                beforeSend: function () {
                    $('#loading').css({display: "inline"});
                },
                complete: function () {
                    $('#loading').css({display: "none"});
                }

            }); 
            reset_campos();
    }
    }
}
    
});
    var email;
              function ValidateEmail_altera() 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    return (true)
  }
    $("#btFecharAlterarUsuario").click();
    $("#msg_erro").html("Você digitou um email invalido!Verifique-o!");
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
            $("#email").focus();
    return (false)
}
$("#edemail").focusout(function(){
        email= $("#edemail").val();
        ValidateEmail_altera();
        
});
//Quando o campo altera cep perde o foco.
    $("#edcep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                       $.ajax({
        url: 'http://cep.republicavirtual.com.br/web_cep.php?cep='+cep+'&formato=json',
        dataType: 'json',
        cache: false,
        beforeSend: function(){
            // implemente sua animação aqui
            $('#loading').show();
        }
    }).done(function(data){
        if (data.resultado > 0){
            $('#loading').hide();
            $('#edendereco').val(data.tipo_logradouro + " " + data.logradouro + "," + data.bairro + "," + data.cidade);

//            if(data.cidade!="Contagem"){
//                $("#btFecharAlterarLeitor").click();
//                $("#msg_cep_invalido").text("Atenção! Segundo nossa base de dados o CEP digitado não pertence ao município de Contagem!");
//                $("#cep_invalido").show();
//                $('html, body').animate({scrollTop: 0}, 'slow');
//            }
            }        
        else{ 
          $("#edendereco").val("");
 
 
        };
    }).always(function(){
       // esconde animação
       $('#loading').hide(); 
    });
       

                    } //end if.
                    else {
                        //cep é inválido.
                        $("#edcep").val("");
                        $("#edendereco").val("");
                         $("#edcep").focus();
                    }
                } //end if.
//                else {
//                    //cep sem valor, limpa formulário.
//                    limpa_formulário_cep();
//                }
            });

    
    $("#corrigirCEP").click(function(){
        
        $("#edcep").focus();
        $("#edendereco").val("");
        $("#cep_invalido").hide();        
    });
    
    $("#manterCEP").click(function(){
        $("#edendereco").focus();        
        $("#cep_invalido").hide();        
    });

    $("#btAlterarUsuario").click(function(){
        var idusuario = $("#edidusuario").val();

        var nome = $('#ednome').val();
        var email = $('#edemail').val();
        var endereco = $('#edendereco').val();
        var telefone = $('#edcelular').val();
     //   var perfil = $('#ed-perfil').val();

        var senha = $('#edsenha').val();
        
         if((nome=="")||(endereco=="")||(telefone=="")){
             $("#alterarUsuario").modal("hide");
            $("#msg_erro").html("Os campos nome, endereço e telefone devem estar preenchidos! verifique-os!");
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        $("#alterarUsuario").modal("show");
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
           
       }else{    
        
        
        $.ajax({
            url: "usuarios_controller/alterarUsuarios",
            type: "POST",
            data: {
                idusuario: idusuario,
                nome: nome,
               email: email,
                endereco: endereco,
                celular: telefone,
                senha: senha
                
                
               // perfil: perfil               
            },
            beforeSend : function() {
                    $('#loading').show();
	    },
	    complete : function() {
                    $('#loading').hide();
	    },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                        $('.close').click();
                        $("#msg_acerto").html("Usuário  alterado com sucesso!");
                         $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                        table.ajax.reload();
                        

                } else if(json.tipo == "error_l"){          
                        $('.close').click();
                        $("#msg_error").html("Erro ao cadastrar login!");
                    $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');    
                    table.ajax.reload();
                        $('html, body').animate({scrollTop: 0}, 'slow');
                        //$('html, body').animate({scrollTop: 0}, 'slow');

                }  else if(json.tipo == "error_u"){ 

                        $('.close').click();           
                        $("#msg_error").html("Erro ao cadastrar usuário!");
                        $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
                        table.ajax.reload();
                        $('html, body').animate({scrollTop: 0}, 'slow');
                        //$('html, body').animate({scrollTop: 0}, 'slow');
                }             
        }
      });
  }
    });

      
    $("#mostrar-senha").click(function(){
          var type = $("#ed-senha").attr('type');

          if (type=='password') {
            $("#ed-senha").attr('type','text');
          }else{
            $("#ed-senha").attr('type','password');
          }

    });

    $("#ed-senha-confirm").keyup(function(){
        
        var senha = $("#ed-senha").val();
        var senha_confirm = $(this).val();
        

        if (senha==senha_confirm) {
            $("#alert-ed-senha").text("Senhas coincidem!");
            $("#alert-ed-senha").removeClass('alert-danger');
            $("#alert-ed-senha").addClass('alert-success');
            $("#alert-ed-senha").show();

        }else{
            $("#alert-ed-senha").text("Senhas não coincidem!");
            $("#alert-ed-senha").addClass('alert alert-danger');
            $("#alert-ed-senha").show();
        }
    });

    $("#btn-ed-alterar-senha").click(function(){
        var idusuario = $("#ed-idusuario-senha").val();

        var senha = $('#ed-senha').val();
        var senha_confirm = $('#ed-senha-confirm').val();

        if (senha==senha_confirm) {

            $.ajax({
                    url: "login_controller/alterar_senha",
                    type: "POST",
                    data: {
                        idusuario: idusuario,
                        senha: senha                                     
                    },                    
                beforeSend : function() {
                    $('#loading').show();
		},
		complete : function() {
                    $('#loading').hide();
		},
                    success: function (data) {
                        var json = $.parseJSON(data);
                        if (json.tipo == 'success') {

                                $('.close').click();
                                $("#msg_acerto").html("Usuário  alterado com sucesso!");
                             $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');    
                            table.ajax.reload();
                            

                        } else if(json.tipo == "error_l"){          

                                $('.close').click();
                                $("#msg_error").html("Erro ao cadastrar login!");
                                $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
                                table.ajax.reload();
                                

                        }  else if(json.tipo == "error_u"){ 

                                $('.close').click();           
                                $("#msg_error").html("Erro ao cadastrar usuário!");
                                $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
                            table.ajax.reload();
                                
                                
                        }             
                }
              })
        }else{
            return false;

            $("#alert-ed-senha").text("As senhas não coincidem!");
            $("#alert-ed-senha").addClass('alert alert-danger');
            $("#alert-ed-senha").show();
        }

        
       
    });
    
    
$("#btAtualizaSenhaUsuario").click(function(){
                
        var altsenha = $("#altsenha").val();
        var confirm_senha = $("#confirm_senha").val();
//        alert(altsenha);
//        alert(confirm_senha);
        
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
            
            if(altsenha!= confirm_senha)
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
                limpa_formulario_alterarSenha();
                
            }
            else
            {
                var usuario= $('#usuario_login').val();
//                alert(altsenha);
                limpa_formulario_alterarSenha();
                $.ajax({
                    url: "usuarios_controller/atualiza_login",
                    type: "POST",
                    data: {
                        idusuario: usuario,
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
    
    $("#btExcluirUsuario").click(function () {

        var idusuario = $('#idusuarioex').val();
        var dados_usuario = $('#spanNomeUsuario').text();
        var status = $('#status').val();
        $.ajax({
            url: "usuarios_controller/bloquear_usuarios",
            type: "POST",
            data: {
                idusuario: idusuario,       
                dados_usuario: dados_usuario,       
                status: status       
            },
            success: function (data) {
           var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirUsuario").click();
                    if(status==0){
                        $("#msg_acerto").html("Usuário bloqueado com sucesso!");
                    }else{
                        $("#msg_acerto").html("Usuário desbloqueado com sucesso!");
                    }                    
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    table.ajax.reload();
                    
                    //location.reload();
                } else {

                        $("#btFecharExcluirUsuario").click();
                        $("#msg_erro").html("Falha ao excluir o usuário do sistema!");
                        $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');
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

    $(".fechar").click(function(){
        $("#sucesso").hide();
        $("#erro").hide();
        $("#sucesso2").hide();
        $('.modal').modal('hide');
            $("#atualiza_login").hide();
    });
    

    $("#ir").click(function () {
        $("#sucesso2").hide;
        $('.modal').modal('hide');
        window.location.replace("http://localhost/sistema_biblioteca/bibliotecario_controller");

    });
});