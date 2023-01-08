var table = "";

/*function validaFormulario(){
    if("#descricao"==""){
        $("#btFecharExcluirBiblioteca").click();
        $("#msg_erro").html("Preencha todos os campos para efeutuar o cadastramento");
        $('#erro').show('slow');
        $('html, body').animate({scrollTop: 0}, 'slow');
    }
*/



function modalExcluirConfiguracao() {
    $("#tblConfiguracoes tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosConfiguracao").html("<br>ID:"+data["idconfiguracoes"] + " - Nome:" + data["descricao"]);
        $("#idconfiguracoesex").val(data["idconfiguracoes"]);        
    });
}


function modalAlterarConfiguracao() {
    $("#tblConfiguracoes tbody").on("click", ".btn-alterar", function () {
        var data = table.row($(this).parents('tr')).data();
        $('#edidconfiguracoes').val(data["idconfiguracoes"]);
        $('#dados-biblioteca').text(data["biblioteca"]+"-"+data["descricao"]);
        $('#edbiblioteca').val(data["biblioteca"]);              
        $('#eddias_empres_aluno').val(data["dias_empres_aluno"]);              
        $('#edqtd_mat_aluno').val(data["qtd_mat_aluno"]);              
        $('#eddias_empres_prof').val(data["dias_empres_prof"]);              
        $('#edqtd_mat_prof').val(data["qtd_mat_prof"]);              
        $('#eddias_empres_funcionario').val(data["dias_empres_funcionario"]);              
        $('#edqtd_mat_funcionario').val(data["qtd_mat_funcionario"]);              
        $('#eddias_empres_comunidade').val(data["dias_empres_comunidade"]);              
        $('#edqtd_mat_comunidade').val(data["qtd_mat_comunidade"]);              
                
        
    });
}
//Carrega Bibliotecas
function carrega_bibliotecas(){
    
    $.ajax({
            url: "configuracoes_controller/listar_sem_configuracao",
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

    
    $("#erro").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
//    var biblioteca = $('#biblioteca').val();
//    alert(biblioteca)
    modalExcluirConfiguracao();
    modalAlterarConfiguracao();
    carrega_bibliotecas();
   
   $("#CancelarCadastro").click(function(){
        $("#limparDados").click();
        $("#tab_lista_bibliotecas").tab("show");
    });
   
 table = $('#tblConfiguracoes').DataTable({
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
            "url": 'configuracoes_controller/listar_configuracoes',
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
                "defaultContent": "<a href='#alterarConfiguracao' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações da Configuração '></i></a>" +
                        "&nbsp<a href='#excluirConfiguracao' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Disciplina '></i></a>"
            }
        ],
        "columns": [{"data": "idconfiguracoes"}, {"data": "descricao"}, {"data": "qtd_mat_aluno"},{"data": "qtd_mat_prof"},{"data": "qtd_mat_funcionario"},{"data": "qtd_mat_comunidade"}],
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
    $("#btcadastrarConfiguracao").click(function () {

        //dados da Biblioteca
        var idconfiguracoes = null;
        var biblioteca = $('#biblioteca').val();
        var dias_empres_aluno = $('#dias_empres_aluno').val();
        var qtd_mat_aluno = $('#qtd_mat_aluno').val();
        var dias_empres_prof = $('#dias_empres_prof').val();
        var qtd_mat_prof = $('#qtd_mat_prof').val();
        var dias_empres_funcionario = $('#dias_empres_funcionario').val();
        var qtd_mat_funcionario = $('#qtd_mat_funcionario').val();
        var dias_empres_comunidade = $('#dias_empres_comunidade').val();
        var qtd_mat_comunidade = $('#qtd_mat_comunidade').val();
        
        
        $.ajax({
            url: "configuracoes_controller/cadastrar_configuracao",
            type: "POST",
            data: {
                idconfiguracoes: idconfiguracoes,
                biblioteca: biblioteca,
                dias_empres_aluno: dias_empres_aluno,
                qtd_mat_aluno: qtd_mat_aluno,
                dias_empres_prof: dias_empres_prof,
                qtd_mat_prof: qtd_mat_prof,
                dias_empres_funcionario: dias_empres_funcionario,
                qtd_mat_funcionario: qtd_mat_funcionario,
                dias_empres_comunidade: dias_empres_comunidade,
                qtd_mat_comunidade: qtd_mat_comunidade
                
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirConfiguracao").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Configuração Cadastrada com Sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarConfiguracao").val("Cadastrar");
                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }else {            
                        $("#btFecharExcluirConfiguracao").click();
                        $("#msg_erro").html("Falha ao cadastrar a Configuracao!");
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
    
    
     $("#btAlterarConfiguracao").click(function () {

        //dados da CONFIGURAÇÃO
        var idconfiguracoes = $('#edidconfiguracoes').val();
        var dias_empres_aluno = $('#eddias_empres_aluno').val();
        var qtd_mat_aluno = $('#edqtd_mat_aluno').val();
        var dias_empres_prof = $('#eddias_empres_prof').val();
        var qtd_mat_prof = $('#edqtd_mat_prof').val();
        var dias_empres_funcionario = $('#eddias_empres_funcionario').val();
        var qtd_mat_funcionario = $('#edqtd_mat_funcionario').val();
        var dias_empres_comunidade = $('#eddias_empres_comunidade').val();
        var qtd_mat_comunidade = $('#edqtd_mat_comunidade').val();
        
        
        $.ajax({
            url: "configuracoes_controller/alterar_configuracao",
            type: "POST",
            data: {
                idconfiguracoes: idconfiguracoes,
                dias_empres_aluno: dias_empres_aluno,
                qtd_mat_aluno: qtd_mat_aluno,
                dias_empres_prof: dias_empres_prof,
                qtd_mat_prof: qtd_mat_prof,
                dias_empres_funcionario: dias_empres_funcionario,
                qtd_mat_funcionario: qtd_mat_funcionario,
                dias_empres_comunidade: dias_empres_comunidade,
                qtd_mat_comunidade: qtd_mat_comunidade
                
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharAlterarConfiguracao").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Configuracão atualizada com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("cadastrarConfiguracao").val("Cadastrar");
                    
                }else {            
                        $("#btFecharAlterarConfiguracao").click();
                        $("#msg_erro").html("Falha ao alterar os dados da Configuracao");
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
   
    
    
    
    $("#btExcluirConfiguracao").click(function () {

        //dados da Biblioteca
        var idconfiguracoes = $('#idconfiguracoesex').val();
        
        $.ajax({
            url: "configuracoes_controller/excluir_configuracao",
            type: "POST",
            data: {
                idconfiguracoes: idconfiguracoes
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirConfiguracao").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Configuracao excluída com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');                    
                }else {            
                        $("#btFecharExcluirConfiguracao").click();
                        $("#msg_erro").html("Falha ao excluir a Configuracao!");
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

