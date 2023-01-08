var table = "";
function verifica_emprestimo_renovado(){
    var idemprestimo = $('#edidemprestimo').val();
    var material = $('#edmaterial').val();
    var leitor = $('#edleitor').val();
    
    $.ajax({
            url: "emprestimo_leitor_controller/verifica_renovacao_emprestimo_leitor",
            type: "POST",
            data: {
                idemprestimo: idemprestimo,
                material : material,
                leitor: leitor

            },
            success: function (data) {
            if((data!="0000-00-00")&&(data!=null)){
//                     if(json.data[i].data_renovao!=""){
//                        alert();
                        $("#btAlterarEmprestimo").hide();
                        $("#next_date").val(0);
                        $("#hora_renovacao").val(0);
                        $("#msg_erro").html("Falha ao renovar o empréstimo! \n O empréstimo só pode ser renovado uma vez!");
                         $("#erro").fadeTo(1, 1).show('slow');
                    window.setTimeout(function() {
                    $("#erro").fadeTo(500, 0).slideUp(500, function(){
                        $("#erro").hide();                        
                        });
            }, 1000);                     
            $('html, body').animate({scrollTop: 0}, 'slow');  
            
                }else{            
                    $("#btAlterarEmprestimo").show();  
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
function modalAlterarEmprestimo() {
    $("#tblEmprestimo tbody").on("click", ".btn-alterar", function () {
        
        var data = table.row($(this).parents('tr')).data();
        $('#edidemprestimo').val(data["idemprestimo"]);
        $('#valueid').text(data["idemprestimo"]);
        
        $('#edmaterial').val(data["material"]);
        $('#valuematerial').text(data["titulo"]);
        
                      
        $('#edleitor').val(data["leitor"]);              
        $('#valueleitor').text(data["nome_leitor"]);
       
        $('#eddata_emprestimo').val(data["data_emprestimo"]);              
        //alert(data["data_emprestimo"]);
        $('#edhora_emprestimo').val(data["hora_emprestimo"]);              
        $('#eddata_devolucao').val(data["data_devolucao"]);              
        $('#edhora_devolucao').val(data["hora_devolucao"]);              
        $('#edstatus').val(data["status_emprestimo"]);  
//        alert(data["next_date"]);//
        $('#next_date').val(data["next_date"]);
       // busca_perfil_leitor(data[""""]);
        verifica_emprestimo_renovado();
    });
}

$(document).ready(function  () {
modalAlterarEmprestimo();

    $("#erro").hide();
    $("#sucesso").hide();
    $("#impressao").hide();
    
   
  $('.dataTables_filter').show();

    table = $('#tblEmprestimo').DataTable({
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
            "url": 'emprestimo_leitor_controller/listar_emprestimos_leitor' ,
        },
        "columnDefs": [
            {
                "targets": [], /* Campo para esconder as colunas pelo Ã­ndice */
                "visible": false,
                "searchable": false
            },
            {
                "targets": 8, /*anterior 9 */
                "data": null,
                "defaultContent": "<a href='#RenovarEmprestimoLeitor' data-toggle='modal' id='modal-30777' role='button' class='btn btn-warning btn-alterar'><i class='glyphicon glyphicon-refresh' title='Renovar o Empréstimo '></i></a>"
            }
        ],
        "columns": [{"data": "idemprestimo"}, {"data": "titulo"}, {"data": "bibliotecario"},{"data": "data_emprestimo2"},{"data": "hora_emprestimo"},{"data": "data_devolucao2"},{"data": "descricao"},{"data": "status_2"}],
        "autoWidth": false,
               "fnRowCallback": function (nRow, data, iDisplayIndex, iDisplayIndexFull) {
//                alert( data["dias_atraso"]);        
                 
                    if ( data["status_emprestimo"]==0){  
                            if ( data["dias_atraso"]==0){  
                                    $('td', nRow).css('color', 'orange');                        
                             }else{   
                                 if ( data["dias_atraso"]>=1){  
                                    $('td', nRow).css('color', 'red');                        
                                    }else{                       
                                         $('td', nRow).css('color', 'green');                        
                                    }   
                                }                           
                        
                            }else{
                                if ( data["status_emprestimo"]==1){ 
                                
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


     $(".fechar").click(function () {
        $("#erro").hide();
        $("#sucesso").hide();
    });

$("#btAlterarEmprestimo").click(function () {

        //dados da Biblioteca
        var idemprestimo = $('#edidemprestimo').val();
        var material = $('#edmaterial').val();
        var usuario = $('#edusuario').val();
        var leitor = $('#edleitor').val();
        var data_emprestimo = $('#eddata_emprestimo').val();
        var hora_emprestimo = $('#edhora_emprestimo').val();
        var data_devolucao = $('#next_date').val();
        alert($('#next_date').val());
        var hora_devolucao = $('#edhora_devolucao').val();
        var data_renovacao = $('#next_date').val();
        var hora_renovacao = $('#hora_renovacao').val();
        
        $.ajax({
            url: "emprestimo_leitor_controller/renovar_emprestimo_leitor",
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
                data_renovacao: data_renovacao,
                hora_renovacao: hora_renovacao
               
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
   



});

