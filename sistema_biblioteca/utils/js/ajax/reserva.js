var table = "";
  
  function modalExcluirReserva() {
    $("#tblReservas tbody").on("click", ".btn-excluir", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosReserva").html("<br>ID:"+data["idreserva"] + "&nbsp&nbsp - Acervo:" + data["titulo"]+ " &nbsp&nbsp - Leitor: "+data["nome"]);
        $("#idreservaex").val(data["idreserva"]);   
        $('#span_id_ex').text(data["idreserva"]);
       $('#span_material_ex').text(data["acervo"]+" - "+data["titulo"]);
       $('#span_leitor_ex').text(data["leitor"]+" - "+data["nome"]);
       $('#label_status_reserva_ex').text(data["status_2"]);
    });
}                  
function modalCadastrarReserva() {
    
    
    /*
     *  0 - Emprestado
     *  1 - Disponível
     *  2 - Baixa / Indisponível
     *  3 - Reservado
     */
    
    $("#tblPesquisa tbody").on("click", ".btn-atribuir", function () {
        var data = table.row($(this).parents('tr')).data();
       
        if((data['status_acervo_biblioteca'])!="1"){  
        var motivo = data['status_acervo_biblioteca'];    
        if(motivo==0){
            motivo = " porque ele está emprestado!";
        }else{
            if(motivo==2){
               motivo = " porque ele está em situação de baixa, verifique o motivo na biblioteca!";
            }else{
                if(motivo==3){
                    motivo = " porque ele já possui reservas!"; 
                }
               
            }
        }
        $('#btCadastrarReserva').hide();
        $('#valuematerial').hide();
        $('#myModalLabel-reserva').html("Falha ao reservar o Material");
        $('#titulo_material').html("Não é possível realizar a reserva deste material "+motivo);
        } else{
        $('#btCadastrarReserva').show();
        $('#valuematerial').show();
        $('#myModalLabel-reserva').html("Realizar Reserva de Material");
        $('#titulo_material').html("Título do Material");
        $('#material').val(data["material"]);
        $('#valuematerial').text(data["titulo"]);
        $('#acervo').val(data["idacervo_biblioteca"]);
        $('#biblioteca').val(data["idbiblioteca"]);
       
        }

    });
}
function modalCadastrarEmprestimo_Reservas() {
    $("#tblReservas tbody").on("click", ".btn-cadastrar-emprestimo", function () {
        var data = table.row($(this).parents('tr')).data();
        
        $('#material').val(data["acervo"]);
        $('#leitor').val(data["leitor"]);
        $('#idreservaex').val(data["idreserva"]);
//        $('#value_dados_reserva').html("Leitor: "++" &nbsp&nbsp&nbsp&nbsp Material Reservado: ");
       $('#span_id').text(data["idreserva"]);
       $('#span_material').text(data["acervo"]+" - "+data["titulo"]);
       $('#span_leitor').text(data["leitor"]+" - "+data["nome"]);
       $('#label_status_reserva').text(data["status_2"]);
        

    });
}
$(document).ready(function  () {
    modalCadastrarReserva();
    modalCadastrarEmprestimo_Reservas();
    modalExcluirReserva();
    $("#erro").hide();
    $("#erro_status").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
           
           
           
    $('.dataTables_filter').show();

    table = $('#tblReservas').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ Registros por página",
            "sLoadingRecords": "<img src='utils/img/ajax_loader.gif'>",
            "sProcessing": "<img src='utils/img/ajax_loader.gif'>",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "úlltimo"
            }
        },
        "ajax": {
            "url": 'reserva_controller/listar_reservas' ,
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#CadastarEmprestimo_reservas' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-cadastrar-emprestimo'><i class='glyphicon glyphicon-book' title='Cadastrar Emprestimo '></i></a>" +
                                    "&nbsp<a href='#excluirLeitor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash' title='Excluir o Disciplina '></i></a>"
                    }
        ],
            "columns": [{"data": "idreserva"}, {"data": "titulo"}, {"data": "nome"},{"data": "data_solicitacao"},{"data": "data_vencimento"}],
        "autoWidth": false,
                      "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
                    //Pegar o Id do Acervo da Bilioteca para alterar o status na função de excluir reserva
                    $("#idacervo_biblioteca_ex").val(data["idacervo_biblioteca"]);
                    $("#biblioteca_ex").val(data["idbiblioteca"]);
                    
                
                    if ( data["dias_atraso"]<0){  
                        $('td', nRow).css('color', 'green');                        
                         }else{   
                                if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                                }else{                       
                                    $('td', nRow).css('color', 'red');                        
                                }
                            }
                    
               
                 }
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

           
    
      
    $("#btCadastrarReserva").click(function () {
        
        
        //dados da Biblioteca
        var idreserva = null;
        var acervo = $('#acervo').val();
        var leitor = $('#leitor').val();
        var data_solicitacao = $('#data_solicitacao').val();
        var data_vencimento = $('#data_vencimento').val();
        
        $.ajax({
            url: "reserva_controller/cadastrar_reserva",
            type: "POST",
            data: {
                idreserva: idreserva,
                acervo : acervo,
                leitor: leitor,
                data_solicitacao: data_solicitacao,
                data_vencimento: data_vencimento
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharReserva").click();
                    $("#msg_acerto").html("Reserva realizada com sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    
                     var idacervo =  $('#acervo').val();
                     var material =  $('#material').val();
                     var biblioteca =  $('#biblioteca').val();
                     
                    $.ajax({
                        url: "acervo_biblioteca_controller/alterar_status_acervo_biblioteca",
                        type: "POST",
                        data: {
                            idacervo: idacervo,
                            material : material,
                            biblioteca : biblioteca
                            
                        },
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.tipo == 'success') {
                                table.ajax.reload();
                            }else {            
//                                    alert(" Não Alterou o Status");
                                }                 

                        }
                    });   
             
                }else {            
                        $("#btFecharReserva").click();
                        $("#msg_erro").html("Falha ao reservar o material!");
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
    
      
    $("#btRealizarEmprestimo").click(function () {
      
        var idemprestimo = null;
        var material = $('#material').val();
        var usuario = $('#usuario').val();
        var leitor = $('#leitor').val();
        var data_emprestimo = $('#data_emprestimo').val();
        var hora_emprestimo = $('#hora_emprestimo').val();
        var data_devolucao = $('#data_devolucao').val();
        var hora_devolucao = $('#hora_devolucao').val();
        var status = $('#status').val();
                 
        $.ajax({
            url: "emprestimo_controller/cadastrar_emprestimo",
            type: "POST",
            data: {
                idemprestimo: idemprestimo,
                material : material,
                usuario: usuario,
                leitor: leitor,
                data_emprestimo: data_emprestimo,
                hora_emprestimo: hora_emprestimo,
                data_devolucao: data_devolucao,
                hora_devolucao: hora_devolucao,
                status: status
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharEmprestimo").click();
                    $("#msg_acerto").html(" Sucesso ao realizar o empréstimo!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    
                    $.ajax({
                        url: "acervo_biblioteca_controller/alterar_status_acervo_biblioteca_emprestimo_cadastrar",
                        type: "POST",
                        data: {
                            idacervo: material,
                            
                        },
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.tipo == 'success') {
//                                          //dados da Biblioteca
                            var idreserva = $('#idreservaex').val();

                            $.ajax({
                                url: "reserva_controller/excluir_reserva",
                                type: "POST",
                                data: {
                                    idreserva: idreserva

                                },
                                success: function (data) {
                                    var json = $.parseJSON(data);
                                    if (json.tipo == 'success') {
                                         $("#btFecharConfirmarEmprestimo").click();  
                                         table.ajax.reload();
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
    
                            }else {            
//                                    alert(" Não Alterou o Status");
                                }                 

                        }
                    });
                    
//                    table.ajax.reload();
                }else {            
                        $("#btFecharExcluirEmprestimo").click();
                        $("#msg_erro").html("Falha ao realizar o empréstimo");
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
    
    
     $("#btAlterarEmprestimo").click(function () {
         
        //dados da Biblioteca
        var idemprestimo = $('#edidemprestimo').val();
        var material = $('#edmaterial').val();
        var usuario = $('#edusuario').val();
        var leitor = $('#edleitor').val();
        var data_emprestimo = $('#eddata_emprestimo').val();
        var hora_emprestimo = $('#edhora_emprestimo').val();
        var data_devolucao = $('#data_renovacao').val();
        var hora_devolucao = $('#edhora_devolucao').val();
        var status = $('#edstatus').val();
        
        $.ajax({
            url: "emprestimo_controller/alterar_emprestimo",
            type: "POST",
            data: {
                idemprestimo: idemprestimo,
                material : material,
                usuario: usuario,
                leitor: leitor,
                data_emprestimo: data_emprestimo,
                hora_emprestimo: hora_emprestimo,
                data_devolucao: data_devolucao,
                hora_devolucao: hora_devolucao,
                status: status
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharAlterarEmprestimo").click();
                    $("#msg_acerto").html("Empréstimo Renovado com Sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    table.ajax.reload();
                    
                }else {            
                        $("#btFecharAlterarEmprestimo").click();
                        $("#msg_erro").html("Falha ao renovar o empréstimo!");
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
    
     $("#btExcluirReserva").click(function () {
         
      var idreserva =  $("#idreservaex").val();
        
        $.ajax({
            url: "reserva_controller/excluir_reserva",
            type: "POST",
            data: {
              idreserva:idreserva
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirReserva").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Reserva Excluída com Sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    
                    //Função para alterar o status do Acervo na Biblioteca para disponível
                    var idacervo_biblioteca_ex = $("#idacervo_biblioteca_ex").val();
                    var biblioteca_ex = $("#biblioteca_ex").val();
                   
                    $.ajax({
                        url: "acervo_biblioteca_controller/alterar_status_acervo_biblioteca_reserva_excluida",
                        type: "POST",
                        data: {
                            idacervo_biblioteca_ex: idacervo_biblioteca_ex,
                            biblioteca_ex: biblioteca_ex
                        },
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.tipo == 'success') {
//                                    alert("alterou o status");    
                            }else {            
                                
                            }                 

                        }
                    });
                    
                    
                }else {            
                        $("#btFecharExcluirReserva").click();
                        $("#msg_erro").html("Falha ao excluir a Reserva!");
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
   
    
     $("#btExcluirTodasAsReservas").click(function () {
         
//      var idreserva =  $("#idreservaex").val();
//       alert(idreserva); 
        $.ajax({
            url: "reserva_controller/exclui_todas_reservas",
            type: "POST",
            data: {
//              idreserva:idreserva
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    $("#btFecharExcluirTodas").click();
                    table.ajax.reload();
                    $("#msg_acerto").html("Reservas Excluídas com Sucesso!");
                     $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    
                }else {            
                        $("#btFecharExcluirTodas").click();
                        $("#msg_erro").html("Falha ao excluir as Reservas!");
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
   
    
    
    
   $("#resultados_busca").hide();
    
    $.ajax({
            url: "pesquisa_controller/listar_local/",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#localizacao");
                sel.empty();
                sel.append('<option value="todas"> Todas </option>');
                for (var i=0; i<json.data.length; i++) {
                 sel.append('<option value="' + json.data[i].idbiblioteca + '">' +json.data[i].idbiblioteca+ " - " + json.data[i].descricao + '</option>');
               }
              
          }                            
        });
    
    
 $("#btpesquisa").click(function () {
        if($("#chave_pesquisa").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave_pesquisa").focus();
        }else{
            
            Pesquisalivro($("#chave_pesquisa").val());
            $("#resultados_busca").show();
            $("#pesquisa").hide();
            
        }
        
    });



function Pesquisalivro(chave_pesquisa){
    
         var tipo_busca = $("#tipo_busca").val();
         var tipo_material = $("#tipo_material").val();
         var localizacao = $("#localizacao").val();
         var editora = $("#editora").val();
         var assunto = $("#assunto").val();
         var genero = $("#genero").val();

    if ( $.fn.dataTable.isDataTable( '#tblPesquisa' ) ) {
           
    table.destroy();
        
    table = $('#tblPesquisa').DataTable({
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
            "buttons": {
                copyTitle: 'Dados copiados',
                copyKeys: 'Use your keyboard or menu to select the copy command'
            },
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'pesquisa_controller/pesquisar_leitores',
            type: "POST",
            data: {
                chave_pesquisa: chave_pesquisa,
                tipo_material: tipo_material,
                tipo_busca: tipo_busca,
                localizacao: localizacao,
                editora:editora,
                assunto:assunto,
                genero:genero
                
            }
        },
        "columnDefs": [
            {
                "targets":[], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#cadastrarReserva' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-atribuir'><i class='glyphicon glyphicon-plus' title='Reservar o Material'></i></a> "

            }
        ],
        "columns": [{"data": "idacervo_biblioteca"}, {"data": "titulo"}, {"data": "nome_autor"},{"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "descricao"}],
        "autoWidth": false,
        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
                 
             if (data['status_acervo_biblioteca']==1){
                $('td', nRow).css('color', 'green');                        
             }else{
                if (data['status_acervo_biblioteca']==0){
                    $('td', nRow).css('color', 'orange');                        
                 }else{
                    if (data['status_acervo_biblioteca']==2){
                        $('td', nRow).css('color', 'red');                        
                    }
                }
             }
             
             
             },
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
     }
     else
     {
      
      table = $('#tblPesquisa').DataTable({
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
            "buttons": {
                copyTitle: 'Dados copiados',
                copyKeys: 'Use your keyboard or menu to select the copy command'
            },
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'pesquisa_controller/pesquisar_leitores',
            type: "POST",
            data: {
                chave_pesquisa: chave_pesquisa,
                tipo_material: tipo_material,
                tipo_busca: tipo_busca,
                localizacao: localizacao,
                editora: editora,
                assunto:assunto,
                genero:genero
            }
        },
        "columnDefs": [
            {
                "targets":[], /* Campo para esconder as colunas pelo índice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#cadastrarReserva' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-atribuir'><i class='glyphicon glyphicon-time' title='Reservar o Material'></i></a> "

            }
        ],
        "columns": [{"data": "idacervo_biblioteca"}, {"data": "titulo"}, {"data": "nome_autor"},{"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "descricao"}],
        "autoWidth": false,
        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
            
            /*
                 *  0 - Emprestado
                *  1 - Disponível
                *  2 - Baixa / Indisponível
                *  3 - Reservado
            */    

            if (data['status_acervo_biblioteca']==1){
                $('td', nRow).css('color', 'green');                        
             }else{
                if (data['status_acervo_biblioteca']==0){
                    $('td', nRow).css('color', 'orange');                        
                 }else{
                    if (data['status_acervo_biblioteca']==2){
                        $('td', nRow).css('color', 'red');
                    }else{
                        $('td', nRow).css('color', 'gray');                            
                    }
                }
             }
             
             
             
             },
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
        
     }
}

$("#resetarPesquisa").click(function(){
    $("#resultados_busca").hide();
    $("#pesquisa").show();
});

    
     $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
        $("#erro_status").hide();
    });

 $.ajax({
            url: "acervo_controller/listar_editoras",
            //type: "POST",
            success: function (data) {
                var json = $.parseJSON(data);
                var sel =  $("#editora");
                sel.empty();
                sel.append('<option value="todas"> Todas </option>');
                for (var i=0; i<json.data.length; i++) {
                 sel.append('<option value="' + json.data[i].editora + '">'+json.data[i].editora + '</option>');
               }
              
          }                            
        });
    
});

