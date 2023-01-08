var table = "";


function valida_campos(tipo){
    var msg = "";
    var nome;
    var cep;
    var logradouro;
    var bairro;
    var municipio;
    var celular;
    var email;        
    if(tipo=="cadastro"){
        nome = $("#nome").val();
        cep = $("#cep").val();
        logradouro = $("#logradouro").val();
        bairro = $("#bairro").val();
        municipio = $("#municipio").val();
        celular = $("#celular").val();
        email = $("#email").val();            
    }else{
        nome = $("#ednome").val();
        cep = $("#edcep").val();
        logradouro = $("#edlogradouro").val();
        bairro = $("#edbairro").val();
        municipio = $("#edmunicipio").val();
        celular = $("#edcelular").val();
        email = $("#edemail").val();        
    }
    
    if(nome==""){
        msg += " É obrigatório informar o nome do leitor! ";
    }
    if(cep==""){
        msg += " É obrigatório informar o cep do leitor! ";
    }
    if(logradouro==""){
        msg += " É Obrigatório informar o lograouro do leitor ";
    }
    if(bairro==""){
        msg += " É obrigatório informar o bairro do leitor! ";
    }
    if(municipio==""){
        msg += " É obrigatório informar o município do leitor! ";
    }
    if(celular==""){
        msg += " É obrigatório informar o celular do leitor! ";
    }
    if(email==""){
        msg += " É obrigatório informar o e-mail do leitor! ";
    }
    
    return msg;
}

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
    $("#tblLeitores tbody").on("click", ".btn-altsenha", function () {
        var data = table.row($(this).parents('tr')).data();
        if(data["email"]==""){
            $("#msg_erro").html("Atenção! Esse estudante não possui e-mail cadastrado! Favor incluir um e-mail principal no cadastro do mesmo! ");
            $('#erro').show('slow');
            $('html, body').animate({scrollTop: 0}, 'slow');
        }else{
            $("#sp_nome").text(data["idleitor"]+" - "+data["nome"]);
            $("#usuario_login").val(data["idleitor"]);
            $("#sp_email").text(data["email"]);
            $("#atualiza_login").show();
        }
        
    });
}
function modalExcluirLeitor() {
    $("#tblLeitores tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosLeitor").html("<br>ID:"+data["idleitor"] + " - Nome:" + data["nome"]);
        $("#idleitorex").val(data["idleitor"]);        
    });
}


function modalAlterarLeitor() {
    $("#tblLeitores tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
        
        $('#edidleitor').val(data["idleitor"]); 
        $('#dados-leitor').text(data["idleitor"]+" - "+data["nome"]);
        $('#edperfil').val(data["perfil"]); 
        $('#perfil-leitor').text(data["perfil"]);
        if(data["perfil"]!="aluno")
        {
            $('#edserie').attr('disabled', true);
            $('#edmatricula').attr('disabled', true);
        }
        $('#unidade_de_cadastro').text(data["descricao"]); 
        $('#edunidade_cadastro').val(data["unidade_cadastro"]);        
        $('#ednome').val(data["nome"]);              
        $('#edcpf').val(data["cpf"]);              
        $('#edserie').val(data["serie"]);              
        $('#edlogradouro').val(data["logradouro"]);              
        $('#edcomplemento').val(data["complemento"]); 
        $('#edbairro').val(data["bairro"]);              
        $('#edmunicipio').val(data["municipio"]);  
        $('#edcep').val(data["cep"]);  
        $('#edmatricula').val(data["matricula"]);  
        $('#edcelular').val(data["celular"]);  
        $('#edemail').val(data["email"]);  
                
        
    });
}


$(document).ready(function  () {
    $("#edcelular").mask("(99)99999-9999");
$("#cpf_cnpj_invalido").hide();
$("#cep_invalido").hide();
$("#cep").mask("99999-999");
$("#celular").mask("(99)99999-9999");
    AlterarSenha();
    
   $("#CancelarCadastro").click(function(){
        $("#limparDados").click();
        $("#tab_lista_leitores").tab("show");
    });
    
  
$("#senha").focusout(function(){
        verifica();
});
$("#altsenha").focusout(function(){
        verifica_altera();
});
function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro").val("");
                $("#bairro").val("");
                $("#bairro").val("");
		$("#cep").val("");
		$("#municipio").val("");
            }
            
            function limpa_formulario_alterarSenha(){
                $("#altsenha").val("");
                $("#confirm_senha").val("");
                
                
                
            }
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
            $('#logradouro').val(data.tipo_logradouro + " " + data.logradouro);
            $('#bairro').val(data.bairro); 
	    $('#municipio').val(data.cidade); 
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
        $("#logradouro").val("");
        $("#bairro").val("");
        $("#municipio").val("");
        $("#cep_invalido").hide();        
    });
    
    $("#manterCEP").click(function(){
        $("#logradouro").focus();        
        $("#cep_invalido").hide();        
    });

    //$("#cep").mask("99999-999");
    $("#erro").hide();
    $("#sucesso").hide();

    $("#impressao").hide();


    modalExcluirLeitor();
    modalAlterarLeitor();
//    carrega_bibliotecas();
        
    $('.dataTables_filter').show();

    table = $('#tblLeitores').DataTable({
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
            "url": 'leitores_controller/listar_leitores',
        },
        "columnDefs": [
            {
                "targets": [2,3], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 9, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#alterarLeitor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações do Leitor '></i></a>" +
                        "&nbsp<a href='#excluirLeitor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Leitor '></i></a>"+
                        "&nbsp<a href='#alterarsenha' data-toggle='modal' id='modal-30777' role='button' class='btn btn-primary btn-altsenha'><i class='glyphicon glyphicon-lock' title='Alterar dados de acesso '></i></a>"
            }
        ],
        "columns": [{"data": "idleitor"}, {"data": "nome"}, {"data": "logradouro"},{"data": "complemento"},{"data": "bairro"},{"data": "municipio"},{"data": "cep"},{"data": "matricula"},{"data": "email"}],
        "autoWidth": false
                /* "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var ano = aData['data_fim'].substring(6,10);
                 var mes = aData['data_fim'].substring(3,5);
                 var dia = aData['data_fim'].substring(0,2);
                 
                 var datah = new Date();
                 var datav = new Date(ano+"/"+mes+"/"+dia);
                 if ( aData['ativo']==0)
                 {
                        $('td', nRow).css('color', 'red');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'green');                        
                 }
                 }*/
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

        
    $("#btcadastrarLeitor").click(function () {
        
        //dados do Leitor
       // 
       
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
             var idleitor = null;
        var nome = $('#nome').val();
        var cpf = $('#cpf').val();
        var serie = $('#serie').val();
        var logradouro = $('#logradouro').val();
        var complemento = $('#complemento').val();
        var bairro = $('#bairro').val();
        var municipio = $('#municipio').val();
        var cep = $('#cep').val();
        var matricula = $('#matricula').val();
        var celular = $('#celular').val();
            email = $('#email').val();
        var perfil = $('#perfil').val();
        
     
    
      var erros = valida_campos("cadastro");
      
        if(erros!=""){
             $("#msg_erro").html("Falha ao cadastrar o leitor! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
        } else{       
        
        
        $.ajax({
            url: "leitores_controller/cadastrar_leitor",
            type: "POST",
            data: {
                idleitor: idleitor,
                nome: nome,
                cpf: cpf,
                serie: serie,
                logradouro:logradouro,
                complemento: complemento,
                bairro: bairro,
                municipio: municipio,
                cep: cep,
                matricula: matricula,
                celular: celular,
                email: email,
                senha: senha,
                perfil:perfil
                
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirLeitor").click();
                    $("#msg_acerto").html("Leitor Cadastradado com Sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarLeitor").val("Cadastrar");
                     table.ajax.reload();
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }else {            
                        $("#btFecharExcluirLeitor").click();
                        $("#msg_erro").html("Falha ao cadastrar o Leitor!");
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
    $("#btFecharAlterarLeitor").click();
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
            $('#edlogradouro').val(data.tipo_logradouro + " " + data.logradouro);
            $('#edbairro').val(data.bairro); 
	    $('#edmunicipio').val(data.cidade); 
//            if(data.cidade!="Contagem"){
//                $("#btFecharAlterarLeitor").click();
//                $("#msg_cep_invalido").text("Atenção! Segundo nossa base de dados o CEP digitado não pertence ao município de Contagem!");
//                $("#cep_invalido").show();
//                $('html, body').animate({scrollTop: 0}, 'slow');
//            }
            }        
        else{ 
          $("#edlogradouro").val("");
          $("#edbairro").val("");
          $("#edmunicipio").val("");
        };
    }).always(function(){
       // esconde animação
       $('#loading').hide(); 
    });
       

                    } //end if.
                    else {
                        //cep é inválido.
                        $("#edcep").val("");
                        $("#edlogradouro").val("");
                         $("#edbairro").val("");
                         $("#edmunicipio").val("");
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
        $("#edlogradouro").val("");
        $("#edbairro").val("");
        $("#edmunicipio").val("");
        $("#cep_invalido").hide();        
    });
    
    $("#manterCEP").click(function(){
        $("#edlogradouro").focus();        
        $("#cep_invalido").hide();        
    });
    
     $("#btAlterarLeitor").click(function () {
       $("#edcep").mask("99999-999");
       

        //dados de Leitores
        var idleitor = $('#edidleitor').val();
        var nome = $('#ednome').val();
        var cpf = $('#edcpf').val();
        var serie = $('#edserie').val();
        var logradouro = $('#edlogradouro').val();
        var complemento = $('#edcomplemento').val();
        var bairro = $('#edbairro').val();
        var municipio = $('#edmunicipio').val();
        var cep = $('#edcep').val();
        var matricula = $('#edmatricula').val();
        var email = $('#edemail').val();
        var celular = $('#edcelular').val();
          //var senha = $('#edsenha').val();
       var erros = valida_campos("atualizacao");
      
        if(erros!=""){
             $("#msg_erro").html("Falha ao atualizar o leitor! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
            
             $("#alterarLeitor").modal("hide");
            window.setTimeout(function() {
                $("#alterarLeitor").modal("show");                        
                $(".fechar").click();
            }, 1000);
            
        } else{       
            
        $.ajax({
            url: "leitores_controller/alterar_leitor",
            type: "POST",
            data: {
                idleitor: idleitor,
                nome: nome,
                cpf: cpf,
                serie:serie,
                logradouro:logradouro,
                complemento: complemento,
                bairro: bairro,
                municipio: municipio,
                cep: cep,
                matricula: matricula,
                celular:celular,
                email: email,
             //   senha:senha
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharAlterarLeitor").click();
                    $("#msg_acerto").html("Leitor atualizado com sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarLeitor").val("Cadastrar");
                    table.ajax.reload();
                    
                }else {            
                        $("#btFecharAlterarLeitor").click();
                        $("#msg_erro").html("Falha ao alterar os dados do Leitor");
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
     }
    });
   
    
    


$("#btAtualizaSenhaUsuario").click(function(){
                
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
                limpa_formulario_alterarSenha();
                
            }
            else
            {
                var leitor= $('#usuario_login').val();
              
                limpa_formulario_alterarSenha();
                $.ajax({
                    url: "leitores_controller/atualiza_login",
                    type: "POST",
                    data: {
                        leitor: leitor,
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
 
    
    
       $("#btExcluirLeitor").click(function () {

        //dados da Biblioteca
        var idleitor = $('#idleitorex').val();
        
        $.ajax({
            url: "leitores_controller/excluir_leitor",
            type: "POST",
            data: {
                idleitor: idleitor
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirLeitor").click();
                    $("#msg_acerto").html("Leitor excluido com sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    table.ajax.reload();
                    
                }else {            
                        $("#btFecharExcluirLeitor").click();
                        $("#msg_erro").html("Falha ao excluir o Leitor!");
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
    
     $(".fechar").click(function () {
        $("#erro").hide();
        $("#atualiza_login").hide();
        $("#sucesso").hide();
    });

      //Série  
      
      $('#perfil').change(function(){
        if($('#perfil').val()=="aluno"){
//            $('#serie').show();
//            $('#serie_label').show();
        $('#serie').attr('disabled', false);
         $('#serie').val("Berçário");
        }else{
//            $('#serie').hide();
//            $('#serie_label').hide();
            $('#serie').attr('disabled', true);
            $('#serie').val("");
        }
        if($('#perfil').val()=="comunidade"){
            $('#matricula').attr('disabled', true);
         
            $('#matricula').val("");
            
        }else{
            $('#matricula').attr('disabled', false);
            
        }
        
    });
      //Série  
      
      $('#edperfil').change(function(){
        if($('#edperfil').val()=="aluno"){
//            $('#serie').show();
//            $('#serie_label').show();
        $('#edserie').attr('disabled', false);
//         $('#edserie').val("Berçário");
        }else{
//            $('#serie').hide();
//            $('#serie_label').hide();
            $('#edserie').attr('disabled', true);
//            $('#edserie').val("");
        }
        if($('#perfil').val()=="comunidade"){
            $('#edmatricula').attr('disabled', true);
         
            $('ed#matricula').val("");
            
        }else{
            $('ed#matricula').attr('disabled', false);
            
        }
        
    });
    
});
    



