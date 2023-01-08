var table = "";

function valida_campos(){
    var nome = $("#nome").val();
    var sobrenome = $("#sobrenome").val();
    var msg = "";
    if(nome==""){
        msg += " É obrigatório informar um nome! ";
    }
    if(sobrenome==""){
        msg += " É obrigatório informar um sobrenome! ";
    }
    return msg;
}

function modalExcluirAutor() {
   $("#tblAutores tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanNomeAutor").html("<br>ID:"+data["idautor"] + " - Nome:" + data["nome"]);
        $("#idautorex").val(data["idautor"]);        
    });
}


function modalAlterarAutor() {
    $("#tblAutores tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#edidautor').val(data["idautor"]);
        $('#ednome').val(data["nome"]);
        //$('#edemail').val(data["email"]);
        $('#edsobrenome').val(data["sobrenome"]);
        $('#edcitacao').val(data["formato_citacao"]);              
      //  $('#ed-perfil').val(data["perfil"]);              
        
    });
}
$(document).ready(function () {
    modalAlterarAutor();
    modalExcluirAutor();
    $("#erro").hide();
    $("#sucesso").hide();
    
    $('.close').click(function(){
       $("#erro").hide();
       $("#sucesso").hide();
    });

    $('.confirm').click(function(){
        $("#erro").hide();
        $("#sucesso").hide();
    });


    $('.dataTables_filter').show();

    table = $('#tblAutores').DataTable({
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
            "url": 'autores_controller/listar_autores/'
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 4, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#alterarAutor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações do Autor '></i></a>" +
                        "&nbsp<a href='#excluirAutor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Autor '></i></a>"
            }
        ],
        "columns": [{"data": "idautor"}, {"data": "nome"}, {"data": "sobrenome"},{"data": "formato_citacao"}],
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

    $("#btcadastrarAutores").click(function () {
      
       var erros = valida_campos();
        if(erros==""){
                    
            var idautor = null;
            var nome = $('#nome').val();
            var sobrenome = $('#sobrenome').val();
            var citacao = $('#citacao').val();
    
            $.ajax({
		url: "autores_controller/cadastrar_autor",
                type: "POST",
                data: {
                        idautor: idautor,
                        nome: nome,
                        sobrenome: sobrenome,
                        citacao: citacao
			},
                        
                success: function (data){
                    var json = $.parseJSON(data);
                    if (json.tipo == 'success'){
                        table.ajax.reload();
                        $("#msg_acerto").html("Autor cadastrado com sucesso!");                       
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                         
                    }else{	
                        $("#msg_erro").html("Falha ao cadastrar autor!");
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
                    $('#loading').css({display: "inline"});
                },
                complete: function () {
                    $('#loading').css({display: "none"});
                }

            }); 
    
    $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });
    
    }else{
            
            $("#msg_erro").html("Falha ao cadastrar o autor! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
        }
        
});
   
    
     $("#btAlterarAutor").click(function () {

    var nome = $("#ednome").val();
    var sobrenome = $("#edsobrenome").val();
    var msg = "";
    if(nome==""){
        msg += " É obrigatório informar um nome! ";
    }
    if(sobrenome==""){
        msg += " É obrigatório informar um sobrenome! ";
    }
    if(msg==""){
       //dados
         var idautor = $('#edidautor').val();
        var nome = $('#ednome').val();
        var sobrenome = $('#edsobrenome').val();
        var citacao = $('#edcitacao').val();
       
        $.ajax({
            url: "autores_controller/alterarAutores",
            type: "POST",
            data: {
               idautor: idautor,
                nome: nome,
                sobrenome: sobrenome,
                citacao: citacao
               
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    table.ajax.reload();
                    $("#btFecharAlterarAutor").click();
                    $("#msg_acerto").html("Autor atualizado com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarAutor").val("Cadastrar");     
                    
                }else {            
                        $("#btFecharAlterarAutor").click();
                        $("#msg_erro").html("Falha ao alterar os dados do Autor!");
                        $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');;
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
         $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });
        
        }else{
            
            $("#msg_erro").html("Falha ao cadastrar o autor! É necessário corrijir os problemas abaixo:<br> "+msg);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
            $("#alterarAutor").modal("hide");
            window.setTimeout(function() {
                $("#alterarAutor").modal("show"); 
                 $("#btFecharErro").click();
            }, 1000);   
            
        }
    });

    
        $("#btExcluirAutor").click(function () {

        var idautor = $('#idautorex').val();
        $.ajax({
            url: "autores_controller/excluirautores",
            type: "POST",
            data: {
                idautor: idautor       
            },
            success: function (data) {
           var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirAutor").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Autor excluído com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    //location.reload();
                } else {

                        $("#btFecharExcluirAutor").click();
                        $("#msg_erro").html("Falha ao excluir o autor do sistema!");
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
         $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });
    });
    
    $("#sobrenome").focusout(function(){
        var nome = $("#nome").val();
        var sobrenome = $("#sobrenome").val();
        sobrenome = sobrenome.toUpperCase();         
        $("#citacao").val(sobrenome+","+nome);
    });
    
    $("#edsobrenome").focusout(function(){
        var nome = $("#ednome").val();
        var sobrenome = $("#edsobrenome").val();
        sobrenome = sobrenome.toUpperCase();         
        $("#edcitacao").val(sobrenome+","+nome);
    });
    
});


