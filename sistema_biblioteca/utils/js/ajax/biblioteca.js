var table = "";

/*function validaFormulario(){
    if("#descricao"==""){
        $("#btFecharExcluirBiblioteca").click();
        $("#msg_erro").html("Preencha todos os campos para efeutuar o cadastramento");
        $('#erro').show('slow');
        $('html, body').animate({scrollTop: 0}, 'slow');
    }
*/
function valida_campos(tipo){

    var msg = "";
    var descricao;
    var cep;
    var logradouro;
    var bairro;
    var municipio;
    var email;
    if(tipo=="cadastro"){
        descricao = $("#nome").val();
        cep = $("#cep").val();
        logradouro = $("#logradouro").val();
        bairro = $("#bairro").val();
        municipio = $("#municipio").val();        
        email = $("#email").val();            
    }else{
        descricao = $("#ednome").val();
        cep = $("#edcep").val();
        logradouro = $("#edlogradouro").val();
        bairro = $("#edbairro").val();
        municipio = $("#edmunicipio").val();
        email = $("#edemail").val();        
    }
    
    if(descricao==""){
        msg += " É obrigatório informar uma descricao da biblioteca! ";
    }
    if(cep==""){
        msg += " É obrigatório informar o cep da biblioteca! ";
    }
    if(logradouro==""){
        msg += " É Obrigatório informar o lograouro da biblioteca ";
    }
    if(bairro==""){
        msg += " É obrigatório informar o bairro da biblioteca! ";
    }
    if(municipio==""){
        msg += " É obrigatório informar o município da biblioteca! ";
    }
    if(email==""){
        msg += " É obrigatório informar o e-mail da biblioteca! ";
    }
    
    return msg;
}


function modalExcluirBiblioteca() {
    $("#tblBibliotecas tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosBiblioteca").html("<br>ID:"+data["idbiblioteca"] + " - Nome:" + data["descricao"]);
        $("#idbibliotecaex").val(data["idbiblioteca"]);        
    });
}


function modalAlterarBiblioteca() {
    $("#tblBibliotecas tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#edidbiblioteca').val(data["idbiblioteca"]);
        $('#valueid').text(data["idbiblioteca"]);
        $('#eddescricao').val(data["descricao"]);              
        $('#edlogradouro').val(data["logradouro"]);              
        $('#edcomplemento').val(data["complemento"]);              
        $('#edbairro').val(data["bairro"]);              
        $('#edmunicipio').val(data["municipio"]);              
        $('#edcep').val(data["cep"]);              
        $('#edemail').val(data["email"]);              
        $('#edtelefone').val(data["telefone"]);              
        $('#edobservacoes').val(data["observacoes"]);              
        
    });
}


$(document).ready(function  () {
    
    $("#erro").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
    
    modalExcluirBiblioteca();
    modalAlterarBiblioteca();    
    
    $("#CancelarCadastro").click(function(){
        $("#limparDados").click();
        $("#tab_lista_bibliotecas").tab("show");
    });
    
//Mascara para o campo CEP no
$("#cep").mask("99999-999");


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


        
    $('.dataTables_filter').show();

    table = $('#tblBibliotecas').DataTable({
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
            "url": 'bibliotecas_controller/listar_bibliotecas',
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#alterarBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações da Biblioteca '></i></a>" +
                        "&nbsp<a href='#excluirBiblioteca' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir a Biblioteca '></i></a>"
            }
        ],
        "columns": [{"data": "idbiblioteca"}, {"data": "descricao"}, {"data": "logradouro"},{"data": "complemento"},{"data": "bairro"},{"data": "telefone"},{"data": "email"}],
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

        
    $("#btcadastrarBiblioteca").click(function () {

        //dados da Biblioteca
        var idbiblioteca = null;
        var descricao = $('#descricao').val();
        var logradouro = $('#logradouro').val();
        var complemento = $('#complemento').val();
        var bairro = $('#bairro').val();
        var municipio = $('#municipio').val();
        var cep = $('#cep').val();
        var email = $('#email').val();
        var telefone = $('#telefone').val();
        var observacoes = $('#observacoes').val();
        
        var erros = valida_campos("cadastro");
      
        if(erros!=""){
            $("#msg_erro").html("Falha ao cadastrar a biblioteca! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
        } else{       
      
        
        $.ajax({
            url: "bibliotecas_controller/cadastrar_biblioteca",
            type: "POST",
            data: {
                idbiblioteca: idbiblioteca,
                descricao: descricao,
                logradouro: logradouro,
                complemento: complemento,
                bairro: bairro,
                municipio: municipio,
                cep: cep,
                email: email,
                telefone: telefone,
                observacoes: observacoes
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirBiblioteca").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Biblioteca cadastrada com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarBiblioteca").val("Cadastrar");                     
                    
                }else {            
                        $("#btFecharExcluirBiblioteca").click();
                        $("#msg_erro").html("Falha ao cadastrar a biblioteca!");
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
    
    
     $("#btAlterarBiblioteca").click(function () {

        //dados da Biblioteca
        var idbiblioteca = $('#edidbiblioteca').val();
        var descricao = $('#eddescricao').val();
        var logradouro = $('#edlogradouro').val();
        var complemento = $('#edcomplemento').val();
        var bairro = $('#edbairro').val();
        var municipio = $('#edmunicipio').val();
        var cep = $('#edcep').val();
        var email = $('#edemail').val();
        var telefone = $('#edtelefone').val();
        var observacoes = $('#edobservacoes').val();
        
        var erros = valida_campos("alteração");
      
        if(erros!=""){
            $("#msg_erro").html("Falha ao atualizar os dados da biblioteca! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
            
            $("#alterarBiblioteca").modal("hide");
            window.setTimeout(function() {
                $("#alterarBiblioteca").modal("show");                        
            }, 1000);                     
            
        } else{       
      
        
        $.ajax({
            url: "bibliotecas_controller/alterar_biblioteca",
            type: "POST",
            data: {
                idbiblioteca: idbiblioteca,
                descricao: descricao,
                logradouro: logradouro,
                complemento: complemento,
                bairro: bairro,
                municipio: municipio,
                cep: cep,
                email: email,
                telefone: telefone,
                observacoes: observacoes
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharAlterarBiblioteca").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Biblioteca atualizada com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');                    
                    $("cadastrarBiblioteca").val("Cadastrar");             
                    
                }else {            
                        $("#btFecharAlterarBiblioteca").click();
                        $("#msg_erro").html("Falha ao alterar os dados da biblioteca!");
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
   
    
    
    
    $("#btExcluirBiblioteca").click(function () {

        //dados da Biblioteca
        var idbiblioteca = $('#idbibliotecaex').val();
		var dados_exclusao = $("#spanDadosBiblioteca").text();
        
        $.ajax({
            url: "bibliotecas_controller/excluir_biblioteca",
            type: "POST",
            data: {
                idbiblioteca: idbiblioteca,
				dados_exclusao: dados_exclusao
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirBiblioteca").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Biblioteca excluída com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');                    
                    
                }else {            
                        $("#btFecharExcluirBiblioteca").click();
                        $("#msg_erro").html("Falha ao excluir a biblioteca!");
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
        $("#sucesso").hide();
    });

});

