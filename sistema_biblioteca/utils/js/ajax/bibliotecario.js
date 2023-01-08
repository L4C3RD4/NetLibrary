/* global table */
var tableBib = "";
var tableLista = "";


function modalExcluirBibliotecario() {
   $("#tblbibliotecarios tbody").on("click", ".btn-excluir", function () {
        var data = tableLista.row($(this).parents('tr')).data();
        $("#spanNomeBib").html("<br>ID:"+data["idbibliotecario"] + " - Nome:" + data["nome"]);
        $("#idbibliotecarioex").val(data["idbibliotecario"]);  
        
   
    });
}
function modalAlterarBibliotecario() {
    $("#tblbibliotecarios tbody").on("click", ".btn-alterar", function () {
        var data = tableLista.row($(this).parents('tr')).data();
        $('#edidbibliotecario').val(data["idbibliotecario"]);
        $('#spedidbibliotecario').text(data["idbibliotecario"]);
        $('#eddata_inicio').val(data["data_inicio"]);
        $('#eddata_termino').val(data["data_termino"]);
        $('#edbiblioteca').val(data["biblioteca"]);      
        $('#edprofissional').val(data["usuario"]);      
        $('#edhorario_trabalho').val(data["horario_trabalho"]);      
        $('#edobservacoes').val(data["observacoes"]);      
        $("#spedbiblioteca").text(data["descricao"]);
        $("#spedprofissional").text(data["nome"]);
    });
}

function ListarBib(){
    $.ajax({
            url: "bibliotecario_controller/listar_sem_acervo",
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

function ListarProf(){
    $.ajax({
            url: "usuarios_controller/lista_profissionais",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#profissional");
                sel.empty();
                  
               for (var i=0; i<json.data.length; i++) {
                sel.append('<option value="' + json.data[i].idusuario + '">' +json.data[i].idusuario+ " - " + json.data[i].nome + '</option>');
               }
                            
          }                            
        });   
}

function ListarBibAlterar(){
    

    
    $.ajax({
            url: "bibliotecario_controller/listar_sem_acervo",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#edbiblioteca");
                sel.empty();
                  
               for (var i=0; i<json.data.length; i++) {
                sel.append('<option value="' + json.data[i].idbiblioteca + '">' +json.data[i].idbiblioteca+ " - " + json.data[i].descricao + '</option>');
               }
                            
          }                            
        });   
}


function Pesquisa_usuario(chave_pesquisa,filtro_perfil){
     $("#resultados_busca").show();
    if ( $.fn.dataTable.isDataTable( '#tblUsuarios' ) ) {
           
    tableBib.destroy();
        
       tableBib = $('#tblUsuarios').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por pÃ¡gina",
            "sLoadingRecords": "<imgh src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "último"
            }
        },
        "ajax": {
            "url": 'bibliotecario_controller/pesquisar' ,
            type: "POST",
            data: {
                chave_pesquisa: chave_pesquisa,
                filtro_perfil : filtro_perfil
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button'  class='btn btn-success cadastrar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idusuario"}, {"data": "nome"}, {"data": "endereco"},{"data": "celular"},{"data": "email"},{"data": "perfil"}],
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
                    "sToolTip": "Copiar os dados para a Ã¡rea de transferÃªncia",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

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
     }
     else
     {
      
       tableBib = $('#tblUsuarios').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por pÃ¡gina",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "último"
            }
        },
        "ajax": {
            "url": 'bibliotecario_controller/pesquisar' ,
            type: "POST",
            data: {
             
                chave_pesquisa: chave_pesquisa,
                filtro_perfil: filtro_perfil
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6, /*anterior 9 */
                "data": null,
               "defaultContent": "<a role='button' class='btn btn-success cadastrar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idusuario"}, {"data": "nome"}, {"data": "endereco"},{"data": "celular"},{"data": "email"},{"data": "perfil"}],
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
                    "sToolTip": "Copiar os dados para a Ã¡rea de transferÃªncia",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

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
        
     }
}

$(document).ready(function(){
  $("#erro").hide();
    $("#sucesso").hide();
    $("#resultados_busca").hide();
    //esconde os resultados da busca
    ListarBib();
    ListarProf();
    modalExcluirBibliotecario();
    modalAlterarBibliotecario();
    

 $("#btAlterarBibliotecario").click(function(){
           
        var idbibliotecario = $("#edidbibliotecario").val();
        var data_inicio = $('#eddata_inicio').val();
        var data_termino = $('#eddata_termino').val();
        var horario_trabalho = $('#edhorario_trabalho').val();
        var observacoes = $('#edobservacoes').val();
            
        
        $.ajax({
            url: "bibliotecario_controller/alterarBibliotecario",
            type: "POST",
            data: {
                idbibliotecario: idbibliotecario,
                data_inicio: data_inicio,
                data_termino: data_termino,
                horario_trabalho: horario_trabalho,
                observacoes: observacoes                
                
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
                        tableLista.ajax.reload();
                        $("#msg_acerto").html("Bibliotecário  alterado com sucesso!");
                        $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                        
                        

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

                }  else if(json.tipo == "error_u"){ 

                        $('.close').click();           
                        $("#msg_error").html("Erro ao cadastrar bibliotecário!");
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
    });
    

$("#btExcluirBibliotecario").click(function() {
            
         var idbibliotecario = $('#idbibliotecarioex').val();
         var dados = $("#spanNomeBib").text();
        $.ajax({
            url: "bibliotecario_controller/excluirbibliotecario",
            type: "POST",
            data: {
                  idbibliotecario: idbibliotecario,     
                  dados: dados     
            },
            success: function (data) {
           var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirBibliotecario").click();
                    tableLista.ajax.reload();
                    $("#msg_acerto").html("Bibliotecário excluído com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("#tab_lista_bibliotecarios").tab("show");
                    //location.reload();
                } else {

                        $("#btFecharExcluirBibliotecario").click();
                        $("#msg_erro").html("Falha ao excluir o bibliotecário do sistema!");
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

tableLista = $('#tblbibliotecarios').DataTable({
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
                "sLast": "último"
            }
        },
        "ajax": {
            "url": 'bibliotecario_controller/listagem_geral' ,
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 6, /*anterior 9 */
                "data": null,
                   "defaultContent": "<a href='#alterarBibliotecario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Atribuição do Profissional '></i></a>" +
                        "&nbsp<a href='#excluirBibliotecario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir a Atribuição '></i></a>"
           }
        ],
        "columns": [{"data": "idbibliotecario"}, {"data": "nome"}, {"data": "descricao"},{"data": "data_inicio2"},{"data": "horario_trabalho"},{"data": "data_termino2"}],
        "autoWidth": false,
                 "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {                 
                 if ((aData['data_termino']!="0000-00-00")&&(aData['data_termino']!=null))
                 {
                        $('td', nRow).css('color', 'red');                        
                 }
                 else 
                 {                        
                        $('td', nRow).css('color', 'green');                        
                 }
                 },
        
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
            "sSwfPath": "//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {"sExtends": "copy",
                    "sButtonText": "Copiar",
                    "sToolTip": "Copiar os dados para a Ã¡rea de transferÃªncia",
                    "sInfo": "Os dados foram copiados para a Ã¡rea de transferÃªncia"

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


$("#CancelarAtribuicao").click(function(){
    $("#limparDados").click();
    $("#tab_lista_bibliotecarios").tab("show");
});

$("#tblUsuarios tbody").on("click", ".cadastrar", function () {
var data = tableBib.row($(this).parents('tr')).data();
      
});    
    
 $("#btpesquisa").click(function () {
    
        if($("#chave_pesquisa").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave_pesquisa").focus();
            
        }else{
            
            Pesquisa_usuario($("#chave_pesquisa").val(),$('#filtro_perfil').val());
             $('.modal').modal('hide');
                $('#chave_pesquisa').val("");
                $('#filtro_perfil').val();
                
    
           
        }
        
    });
    
    
        $("#btcadastrarBibliotecario").click(function() {
           
            var idbibliotecario = null;
            var biblioteca = $('#biblioteca').val();
            var profissional = $('#profissional').val();
            var data_inicio = $('#data_inicio').val();
            var horario_trabalho = $('#horario_trabalho').val();
            var observacoes = $('#observacoes').val();          
    
            $.ajax({
		url: "bibliotecario_controller/cadastrar_bibliotecario",
                type: "POST",
                data: {
                        idbibliotecario :  idbibliotecario,
                        biblioteca:  biblioteca,
                        profissional:  profissional,
                        data_inicio: data_inicio,
                        horario_trabalho:  horario_trabalho,
                        observacoes:  observacoes
                       
			},
                success: function (data){
                    var json = $.parseJSON(data);
                    if (json.tipo == 'success'){                        
                        $("#msg_acerto").html("Bibliotecário/Auxiliar de Biblioteca cadastrado com sucesso!");
                        $("#sucesso").fadeTo(1, 1).show('slow');                    
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("#tab_lista_bibliotecarios").tab("show");
                    }else{	
                        $("#msg_erro").html("Falha ao cadastrar o bibliotecário/Auxiliar de Biblioteca!");
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
    $(".btn btn-default fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });
    
});







});



