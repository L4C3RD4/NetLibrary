var table = "";


function valida_campos(){
    var leitor = $("#leitor").val();
    var material = $("#material").val();
    var data_devolucao = $("#data_devolucao").val();
    var msg = "";
    if(leitor==""){
        msg += " É obrigatória a escolha de um leitor! ";
    }
    if(material==""){
        msg += " É obrigatória a escolha de um material! ";
    }
    if(data_devolucao==""){
        msg += " A data de devolução atual não é válida! ";
    }
    
    return msg;
}


function modalConfirmarEmprestimo() {
    $("#tblEmprestimo tbody").on("click", ".btn-confirmar", function () {
        var data = table.row($(this).parents('tr')).data();
        $("#spanDadosMaterial").html("<br>ID Empréstimo:"+data["idemprestimo"] + " - Nome do Material: " + data["titulo"]+ " - Nome do Leitor: " + data["nome"]);
        $("#idemprestimoe").val(data["idemprestimo"]);   
        $("#idacervo_biblioteca").val(data["idacervo_biblioteca"]); 
        $("#span_id_emprestimo_confirmar").text(data["idemprestimo"]); 
        $("#span_material_emprestimo_confirmar").text(data["idacervo_biblioteca"]+" - "+data["titulo"]); 
        $("#span_leitor_emprestimo_confirmar").text(data["leitor"]+" - "+data["nome"]); 
        if(data["dias_atraso"]==0){
             $("#label_status_emprestimo_confrimar").text("O prazo vence hoje"); 
        }else{
            if(data["dias_atraso"]<0){
             $("#label_status_emprestimo_confrimar").text("Em dia"); 
            }else{
                $("#label_status_emprestimo_confrimar").text("Em Atraso"); 
            }
        }
       
        
    });
}
function modalAlterarEmprestimo() {
    $("#tblEmprestimo tbody").on("click", ".btn-alterar", function () {
        var situacao = $("#chave_emprestimo_situacao").val();
        if((situacao=="atrasado")||(situacao=="entregues")||(situacao=="")){
            $("#alterarEmprestimo").modal("hide");
            if((situacao=="atrasado")){
                $("#msg_erro").html("Esse empréstimo está em atraso! E dessa forma ele só pode ser entregue");
            }else{
                if((situacao=="entregues")){
                   $("#msg_erro").html("Esse empréstimo foi entregue e não pode ser alterado!");
                }else{
                    $("#msg_erro").html("Troque a situação para poder atualizad os empréstimos! No tipo 'todas' não é permitida a atualização.");
                }
            }
            
            $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');  
            
        }else{
        
        var data = table.row($(this).parents('tr')).data();
        $('#edidemprestimo').val(data["idemprestimo"]);
        $('#valueid').text(data["idemprestimo"]);
        
        $('#edmaterial').val(data["material"]);
        $('#valuematerial').text(data["titulo"]);
        
        $('#valueusuario').text(data["usuario_nome"]);
        $('#edusuario').val(data["usuario"]);
                      
        $('#edleitor').val(data["leitor"]);              
        $('#valueleitor').text(data["nome"]);
        
        $('#eddata_emprestimo').val(data["data_emprestimo"]);              
        $('#edhora_emprestimo').val(data["hora_emprestimo"]);              
        $('#eddata_devolucao').val(data["data_devolucao"]);              
        $('#edhora_devolucao').val(data["hora_devolucao"]);              
        $('#edstatus').val(data["status_emprestimo"]);              
       
       $("#alterarEmprestimo").modal("show");
   }    
    });
    
}



function modalPesquisarAcervoBiblioteca() {
    $("#cadastrar_acervo_biblioteca").on("click", ".btn-pesquisar", function () {
        
    $('.dataTables_filter').show();
     
    });
}

function GuardarAcervo() {
    $("#tblAcervo tbody").on("click", ".btn-guardar", function () {
        var data = table.row($(this).parents('tr')).data();
        
        if(data["status"]==1){
        $('#idacervo').val(data["idacervo"]);
        
        $('#material').val(data["idacervo"]);
        
        $("#idacervo_titulo").html("ID: ");  
        $("#titulo_titulo").html("Título: ");  
        $("#tipo_titulo").html("Tipo:");  
        $("#editora_titulo").html("Editora: ");  
        $("#ano_publicacao_titulo").html("Ano de Publicação: ");  
        $("#isbn_titulo").html("ISBN: ");  
        $("#status_2_titulo").html("Status: ");  
        
        $("#value_idacervo").html(data["idacervo"]);             
        $("#value_titulo").html(data["titulo"]);             
        $("#value_tipo").html(data["tipo"]);             
        $("#value_editora").html(data["editora"]);             
        $("#value_ano_publicacao").html(data["ano_publicacao"]);             
        $("#value_isbn").html(data["isbn"]);             
        $("#value_status_2").html(data["status_2"]);    
        
        $("#btfecharPesquisarAcervo").click();                  
    }else{
        $("#btfecharPesquisarAcervo").click();
        $("#msg_erro").html("Esse material não está disponível para empréstimo!");
         $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');  
    }
       
    });
}


function PesquisaAcervo(tipo_pesquisa,chave){
    
    if ( $.fn.dataTable.isDataTable( '#tblAcervo' ) ) {
           
    table.destroy();
        
       table = $('#tblAcervo').DataTable({
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
            "url": 'acervo_controller/listar_acervos_emprestimo' ,
            type: "POST",
            data: {
                tipo_pesquisa: tipo_pesquisa,
                chave: chave
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "isbn"},{"data": "status_2"}],
        "autoWidth": false,
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if ( aData['status']==0)
                    {
                        $('td', nRow).css('color', 'orange');                        
                    }
                 else 
                 {                        
                      if ( aData['status']==1)
                    {
                        $('td', nRow).css('color', 'green');                        
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
      
       table = $('#tblAcervo').DataTable({
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
            "url": 'acervo_controller/listar_acervos_emprestimo' ,
            type: "POST",
            data: {
                tipo_pesquisa: tipo_pesquisa,
                chave: chave
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idacervo"}, {"data": "titulo"}, {"data": "tipo"},{"data": "editora"},{"data": "ano_publicacao"},{"data": "isbn"},{"data": "status_2"}],
        "autoWidth": false,
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData['status']==0)
                    {
                        $('td', nRow).css('color', 'orange');                        
                    }
                 else 
                 {   
                    if ( aData['status']==1)
                    {
                        $('td', nRow).css('color', 'green');                        
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
        
     }
}


function modalPesquisarLeitor() {
    $("#cadastrar_emprestimo").on("click", ".btn-pesquisar", function () {
        
    $('.dataTables_filter').show();
     
    });
}
function VerificaEmprestimosAtrasadosLeitor(idleitor){
    
        $.ajax({
            url: "leitores_controller/verifca_atrasos_leitor",
            type: "POST",    
            data: {
                idleitor:idleitor
            },            
            success: function (data) {
                if(data>0){
                    $("#msg_erro").html("Não é possível realizar o empréstimo para este leitor! Leitor(a) tem empréstimos em atraso!");
                     $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');  
                    $('#btcadastrarEmprestimo').hide();
                }else{
                    $('#btcadastrarEmprestimo').show();
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
function AutorizaEmprestimoLeitor(idleitorAutoriza,perfil){
    
        $.ajax({
            url: "emprestimo_controller/verifica_emprestimos_leitor",
            type: "POST",    
            data: {
                idleitorAutoriza:idleitorAutoriza,
                perfil:perfil
            },            
            success: function (data) {
           //alert(data);
         var  qtd = parseInt(data);
         //alert(qtd)
             if(qtd>=0){
                    //alert(data)
                    //alert("Menor que zero")
                     $('#btcadastrarEmprestimo').show();
                }else{
                    $("#msg_erro_atraso").html("Devido as configurações da biblioteca, o leitor não pode reservar este livro. Ele excedeu o limte do perfil do "+perfil+".");
                     $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');  
                    $('#btcadastrarEmprestimo').hide();
               // alert("Maior que zero")
                //alert(data);
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

function GuardarLeitor() {
    $("#tblLeitores tbody").on("click", ".btn-guardar-leitor", function () {
        var data = table.row($(this).parents('tr')).data();
        var idleitor = data["idleitor"];
        var perfil = data["perfil"];
        var nome = data["nome"];
        calcula_data_devolucao(perfil);
        AutorizaEmprestimoLeitor(idleitor,perfil);
        VerificaEmprestimosAtrasadosLeitor(idleitor);
       
        $('#idleitor').val(data["idleitor"]);
        
       
        $('#leitor').val(data["idleitor"]);
        
        $("#idleitor_titulo").html("ID: ");  
        $("#nome_titulo").html("Nome: ");  
        $("#logradouro_titulo").html("Logradouro:");  
        $("#cep_titulo").html("CEP: ");  
        $("#matricula_titulo").html("Matricula: ");  
        $("#email_titulo").html("Email: ");  
        $("#perfil_titulo").html("Pefil: ");  
         
        
        $("#value_idleitor").html(data["idleitor"]);             
        $("#value_nome").html(data["nome"]);             
        $("#value_logradouro").html(data["logradouro"]);             
        $("#value_cep").html(data["cep"]);             
        $("#value_matricula").html(data["matricula"]);             
        $("#value_email").html(data["email"]);             
        $("#value_perfil").html(data["perfil"]);             
        $("#btCancelarPesquisarLeitor").click();    
       
    });
}

function calcula_data_devolucao(perfil){
    //descobre o perfil do leitor
    
    var qtd_dias = "";
    var biblioteca = $("#biblioteca").val();
//    alert (biblioteca);
    if(perfil=="aluno"){
        qtd_dias = $("#dias_empres_aluno").val();
    } else{
        if(perfil=="professor"){
            qtd_dias = $("#dias_empres_prof").val();
        }else{
            if(perfil=="funcionario"){
                qtd_dias = $("#dias_empres_funcionario").val();
            }else{
                qtd_dias = $("#dias_empres_comunidade").val();
            }
        }
    }
        $.ajax({
            url: "emprestimo_controller/calcula_data_entrega",
            type: "POST",    
            data: {
                biblioteca:biblioteca,
                perfil:perfil
                
            },            
            success: function (data_devolucao) {
                $("#data_devolucao").val(data_devolucao);             
                $("#data_renovacao").val(data_devolucao);             
//                 alert($("#data_devolucao"));         
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


function PesquisaLeitor(tipo_pesquisa_leitor,chave_leitor){
    
    if ( $.fn.dataTable.isDataTable( '#tblLeitores' ) ) {
           
    table.destroy();
        
       table = $('#tblLeitores').DataTable({
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
            "url": 'leitores_controller/listar_leitor' ,
            type: "POST",
            data: {
                tipo_pesquisa_leitor: tipo_pesquisa_leitor,
                chave_leitor: chave_leitor
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar-leitor'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idleitor"}, {"data": "nome"}, {"data": "logradouro"},{"data": "cep"},{"data": "matricula"},{"data": "email"},{"data": "perfil"}],
        "autoWidth": false
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
     }
     else
     {
      
       table = $('#tblLeitores').DataTable({
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
            "url": 'leitores_controller/listar_leitor' ,
            type: "POST",
            data: {
                tipo_pesquisa_leitor: tipo_pesquisa_leitor,
                chave_leitor: chave_leitor
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
                "defaultContent": "<a role='button' class='btn btn-success btn-guardar-leitor'><i class='glyphicon glyphicon-ok''></i></a>" 
            }
        ],
        "columns": [{"data": "idleitor"}, {"data": "nome"}, {"data": "logradouro"},{"data": "cep"},{"data": "matricula"},{"data": "email"},{"data": "perfil"}],
        "autoWidth": false

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

$(document).ready(function  () {

//Mascara para o campo CEP no
$("#cep").mask("99999-999");

    $("#erro").hide();
    $("#erro_atraso").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
    
    modalPesquisarLeitor();
    GuardarLeitor(); 
    modalPesquisarAcervoBiblioteca();
    GuardarAcervo(); 
    modalAlterarEmprestimo();
    modalConfirmarEmprestimo();
//    $('#tabela_emprestimo').hide();
           
  $.ajax({
            url: "bibliotecario_controller/retornar_bibliotecario",
           
            data: {
                
            },
            success: function (data) {
                var json = $.parseJSON(data);
                var i=0;
                
                $('#biblioteca').text(json.data[i].biblioteca+" - "+json.data[i].descricao);
                $('#biblioteca').val(json.data[i].biblioteca);
                $('#bibliotecario').text(json.data[i].idbibliotecario+" - "+json.data[i].nome);
                $('#bibliotecario').val(json.data[i].idbibliotecario);
                $('#bibliotecario_emprestimo').val(json.data[i].idbibliotecario);
                $('#usuario').val(json.data[i].usuario);
                ///alert($('#bibliotecario').val());
                
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
        
    $("#btcadastrarEmprestimo").click(function () {
   
        var erros = valida_campos();
        if(erros==""){
   
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
            url: "reserva_controller/verifcar_reservas",
            type: "POST",
            data: {
             idacervo: material
             
            },
            success: function (data) {
                
            var json = $.parseJSON(data);
            if((json.data.length>0)&&(data["idleitor"]!=leitor)){
                $("#msg_erro").html("Não é possível emprestar este material para esse leitor!\n\
                                      Verifique a tabela reservas");
                 $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');  
            }else{
               
                 
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
                    $("cadastrarAcervoBiblioteca").val("Cadastrar");                        
                    
                    $.ajax({
                        url: "acervo_biblioteca_controller/alterar_status_acervo_biblioteca_emprestimo_cadastrar",
                        type: "POST",
                        data: {
                            idacervo: material,
                            
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
                
            
          }
      }            
});
      
        }else{
            
            $("#msg_erro").html("Falha ao realizar o empréstimo! É necessário corrijir os problemas abaixo:<br> "+erros);
            $("#erro").show();
            $('html, body').animate({scrollTop: 0}, 'slow');  
        }
       
        
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
                    $("#chave_emprestimo_situacao").val("em_dia");
                    $('.filtro').change();
                    
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
   
    
    
    
    $("#btConfirmarEmprestimo").click(function () {

   
        var idemprestimo = $('#idemprestimoe').val();
        var hora_devolucao = $('#hora_devolucaoe').val();
        var idacervo = $("#idacervo_biblioteca").val();
        var data_devolucao = $("#data_devolucaoe").val();
        //Status do Empréstimo passa a ser 1, ou seja, que ele foi finalizado. Essa parte está no Model
        $.ajax({
            url: "emprestimo_controller/confirmar_emprestimo",
            type: "POST",
            data: {
                
                idemprestimo: idemprestimo,
                hora_devolucao: hora_devolucao,
                data_devolucao: data_devolucao
            },
            success: function (data) {
                var json = $.parseJSON(data);
                if (json.tipo == 'success') {
                    
                    $("#msg_acerto").html("Material entregue com sucesso!");
                    $("#sucesso").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#sucesso").fadeTo(500, 0).slideUp(500, function(){
                        $("#sucesso").hide();                                            
                    });
                    }, 1000);                     
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    table.ajax.reload();
                    
                    $("#btFecharConfirmarEmprestimo").click();
                     
                    
                    
                    $.ajax({
                        url: "acervo_biblioteca_controller/alterar_status_acervo_biblioteca_emprestimo",
                        type: "POST",
                        data: {
                            idacervo: idacervo,
                            
                        },
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.tipo == 'success') {
//                                   
                            }else {            
//                                    alert(" Não Alterou o Status");
                                }                 

                        }
                    });
                    
                }else {            
                        $("#btFecharConfirmarEmprestimo").click();
                        $("#msg_erro").html("Falha ao entregar o material");
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




 $("#btPesquisarMaterialTipo").click(function () {
        if($("#chave").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave").focus();
            
        }else{
            PesquisaAcervo($("#tipo_pesquisa").val(),$("#chave").val());
            //$("#btn").show();    
        }
        
    });

    $("#BtCadastrarAcervo").on("click", function () {
        $('#btfecharPesquisarAcervo').click();
        $('#codigo_material').show();
 
     
    });
    
   

 $("#btPesquisarEmprestimoTipo").click(function () {
        if($("#chave_emprestimo").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave_emprestimo").focus();
            
        }else{
            PesquisaEmprestimo($("#tipo_pesquisa_emprestimo").val(),$("#chave_emprestimo").val());
            
            //$("#btn").show();    
        }
        
    });

    $("#BtCadastrarLeitor").on("click", function () {
        
        $('#codigo_leitor').show();
        $('#btfecharPesquisarLeitor').click();
 
     
    });
    $("#btCancelarPesquisarLeitores").on("click", function () {
        $('#codigo_leitor').show();
 
     
    });
    
    
    
    $("#pesquisa_codigo_leitor").on('keypress',function(event){
  //Tecla 13 = Enter
  if(event.which == 13) {
    //cancela a ação padrão
    $("#pesquisa_codigo_acervo").focus();
    event.preventDefault();
  }
});
    
    
        $("#pesquisa_codigo_leitor").focusout(function(){
            
            var tipo = "";
            var valor = $("#pesquisa_codigo_leitor").val();
            
        if($('input:radio[name=tipo_pes]:checked').val()=="matricula"){
            tipo  = "matricula";
    
        }else{
             tipo  = "id";
        }
        
//        var codigo_pesquisa = $(this).val();
        
//        alert(mat_leitor);
        $.ajax({
            url: "leitores_controller/pesquisar_matricula_ou_id",
            type: "POST",
            data: {
             tipo: tipo,
             valor: valor
             
            },
            success: function (data_leitor) {
          
               
            var json = $.parseJSON(data_leitor);
            if(json.data.length>0){
                var i=0;

                $('#codigo_leitor').show();
                $('#leitor').val(json.data[i].idleitor);

                $("#idleitor_titulo").html("ID: ");  
                $("#nome_titulo").html("Nome: ");  
                $("#logradouro_titulo").html("Logradouro:");  
                $("#cep_titulo").html("CEP: ");  
                $("#matricula_titulo").html("Matricula: ");  
                $("#email_titulo").html("Email: ");  

                $("#value_idleitor").html(json.data[i].idleitor);             
                $("#value_nome").html(json.data[i].nome);             
                $("#value_logradouro").html(json.data[i].logradouro);             
                $("#value_cep").html(json.data[i].cep);             
                $("#value_matricula").html(json.data[i].matricula);             
                $("#value_email").html(json.data[i].email); 
      //          var perfil = json.data[i].perfil;
                var idleitor =json.data[i].idleitor;
                var perfil =json.data[i].perfil;
                var nome = json.data[i].nome;
                calcula_data_devolucao(perfil);
                AutorizaEmprestimoLeitor(idleitor,perfil);
                VerificaEmprestimosAtrasadosLeitor(idleitor);
                calcula_data_devolucao(perfil);
//                busca_perfil_leitor(json.data[i].idleitor);
            
            }else{
                $("#msg_erro").html("Não foi encontrado nenhum leitor com esse número de matrícula!\n\
                                     Clique no botão pesquisar para fazer outra busca!");
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
      
          $("#pesquisa_codigo_acervo").on('keypress',function(event){
  //Tecla 13 = Enter
  if(event.which == 13) {
    //cancela a ação padrão
    $("#btcadastrarEmprestimo").focus();
    event.preventDefault();
  }
});
        $("#pesquisa_codigo_acervo").focusout(function(){

//        var codigo_acervo = $(this).val();
            
            var tipo = "";
            var valor = $("#pesquisa_codigo_acervo").val();
           
        if($('input:radio[name=tipo_mat]:checked').val()=="codigo"){
            tipo  = "codigo";
    
        }else{
             tipo  = "isbn";
        } 
                
                
        $.ajax({
            url: "acervo_biblioteca_controller/pesquisar_codigo_ou_isbn",
            type: "POST",
            data: {
             tipo: tipo,
             valor:valor
             
            },
            success: function (data_leitor) {
                
                var json = $.parseJSON(data_leitor);
                if(json.data.length>0){
                    var i=0;

                $('#codigo_material').show();
                $('#material').val(json.data[i].idacervo);

                $("#idacervo_titulo").html("ID: ");  
                $("#titulo_titulo").html("Título: ");  
                $("#tipo_titulo").html("Tipo:");  
                $("#editora_titulo").html("Editora: ");  
                $("#ano_publicacao_titulo").html("Ano de Publicação: ");  
                $("#isbn_titulo").html("ISBN: ");  
                $("#status_2_titulo").html("Status: ");  

                $("#value_idacervo").html(json.data[i].idacervo);             
                $("#value_titulo").html(json.data[i].titulo);             
                $("#value_tipo").html(json.data[i].tipo);             
                $("#value_editora").html(json.data[i].editora);             
                $("#value_ano_publicacao").html(json.data[i].ano_publicacao);             
                $("#value_isbn").html(json.data[i].isbn);             
                $("#value_status_2").html(json.data[i].status_2);  
            }else{
                $("#msg_erro").html("Não foi encontrado nenhum material com esse número de acervo!\n\
                                     Clique no botão pesquisar para fazer outra busca!");
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
      

     $("#btPesquisarLeitorTipo").click(function () {
        if($("#chave_leitor").val().length<3){
            alert("É necessário informar pelo menos 3 caracteres para pesquisar!");
            $("#chave").focus();
            
        }else{
            PesquisaLeitor($("#tipo_pesquisa_leitor").val(),$("#chave_leitor").val());
            //$("#btn").show();    
        }
        
    });
    //alert($('#bibliotecario').val());
     $('.filtro').change(function() {
        var perfil = $('#chave_emprestimo_leitor').val(); 
        var tipo = $('#chave_emprestimo_material').val(); 
        var situacao = $('#chave_emprestimo_situacao').val(); 
        var bibliotecario = $('#bibliotecario_emprestimo').val(); 
       
         $("#listar_emprestimos").show();    
        
    if ( $.fn.dataTable.isDataTable( '#tblEmprestimo' ) ) {
           
    table.destroy();
        
       table = $('#tblEmprestimo').DataTable({
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
            "url": 'emprestimo_controller/listar_emprestimo_parametro' ,
            type: "POST",
            data: {
                perfil : perfil,
                tipo : tipo,
                situacao : situacao,
                bibliotecario:bibliotecario
            }
            
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
            "defaultContent": "<a href='' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações do Empréstimo '></i></a>" +
                        "&nbsp<a href='#confirmarEmprestimo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-confirmar'><i class='glyphicon glyphicon-ok' title='Confirmar Empréstimo '></i></a>"
            }
        ],
       "columns": [{"data": "idemprestimo"}, {"data": "titulo"}, {"data": "usuario_nome"},{"data": "nome"},{"data": "data_emprestimo2"},{"data": "hora_emprestimo"},{"data": "data_devolucao2"}],
       "autoWidth": false,
                        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                alert( data["dias_atraso"]);  

                if (data["status_emprestimo"]==0){
                    if ( data["dias_atraso"]<0){  
                        $('td', nRow).css('color', 'green');                        
                         }else{   
                                if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                                }else{                       
                                    $('td', nRow).css('color', 'red');                        
                                }
                            }
                    }else{
                         $('td', nRow).css('color', 'black');
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
     }else{
      
       table = $('#tblEmprestimo').DataTable({
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
            "url": 'emprestimo_controller/listar_emprestimo_parametro' ,
            type: "POST",
            data: {
                perfil : perfil,
                tipo : tipo,
                situacao : situacao,
                bibliotecario:bibliotecario
            }
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 7, /*anterior 9 */
                "data": null,
               "defaultContent": "<a href='#alterarEmprestimo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Atualizar Informações do Empréstimo '></i></a>" +
                        "&nbsp<a href='#confirmarEmprestimo' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-confirmar'><i class='glyphicon glyphicon-ok' title='Confirmar Empréstimo '></i></a>"
            }
        ],
        "columns": [{"data": "idemprestimo"}, {"data": "titulo"}, {"data": "usuario_nome"},{"data": "nome"},{"data": "data_emprestimo2"},{"data": "hora_emprestimo"},{"data": "data_devolucao2"}],
         "autoWidth": false,
                        "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                alert( data["dias_atraso"]);        
                 if (data["status_emprestimo"]==0){
                    if ( data["dias_atraso"]<0){  
                        $('td', nRow).css('color', 'green');                        
                         }else{   
                                if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                                }else{                       
                                    $('td', nRow).css('color', 'red');                        
                                }
                            }
                    }else{
                         $('td', nRow).css('color', 'black');
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
        
     }
    
     });
     
     
     //Emprestimos Tabela Esconder
     $("#listar_emprestimos").hide();       
     
     $("#CancelarEmprestimo").click(function(){
        $("#limparDados").click();
        $("#tab_lista_bibliotecas").tab("show");
     });
     
      $("#limparDados").on("click", function () {
        //Acervo
        $('#idacervo').val("");
        
        $('#material').val("");
        
        $("#idacervo_titulo").html("");  
        $("#titulo_titulo").html("");  
        $("#tipo_titulo").html("");  
        $("#editora_titulo").html("");  
        $("#ano_publicacao_titulo").html("");  
        $("#isbn_titulo").html("");  
        $("#status_2_titulo").html("");  
        
        $("#value_idacervo").html("Informe um dos campos ao lado ou clique na lupa para fazer a busca");             
        $("#value_titulo").html("");             
        $("#value_tipo").html("");             
        $("#value_editora").html("");             
        $("#value_ano_publicacao").html("");             
        $("#value_isbn").html("");             
        $("#value_status_2").html("");
        //Leitor
         
        $('#idleitor').val("");
        
        $('#leitor').val("");
        
        $("#idleitor_titulo").html("");  
        $("#nome_titulo").html("");  
        $("#logradouro_titulo").html("");  
        $("#cep_titulo").html("");  
        $("#matricula_titulo").html("");  
        $("#email_titulo").html("");  
        $("#perfil_titulo").html("");  
         $("#codigo_leitor").show();
        
        $("#value_idleitor").html("Informe um dos campos ao lado ou clique na lupa para fazer a busca");             
        $("#value_nome").html("");             
        $("#value_logradouro").html("");             
        $("#value_cep").html("");             
        $("#value_matricula").html("");             
        $("#value_email").html("");             
        $("#value_perfil").html("");  
        $("#codigo_material").show();  
         $('#btcadastrarEmprestimo').show();
    });
    
    //Começar carregar a tabela
    $("#chave_emprestimo_situacao").val("prazo_limite");
    $('.filtro').change();
   
    $("#tab_emprestimos").click(function(){
        
         $("#pesquisa_codigo_leitor").focus();
    });
    
});

