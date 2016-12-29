$(function () {
    
 $(".formAvaliacao").submit(function(event) {
            event.preventDefault();

            console.log(event.target.id);

            var status = $('#status');

            $.post("../dao/Controller.php",$(this).serialize(),
              function(resposta){
                status.slideDown();
                status.removeClass('alert alert-danger');
                status.addClass('alert alert-success');
                status.html('<strong> Avaliado com sucesso </strong>');

                setTimeout(function(){
                  status.hide();
                  location.reload();
                },2000);
              }
            );


        });
    
    //pesquisar os cursos sem refresh na página
    $("#pesquisa").keyup(function () { //recebendo enquanto está digitando
        
        var pesquisa = $(this).val(); //receber o valor que está sendo digitado
        if (pesquisa != '') { //verificar se há algo digitado
            var dados = {//cria objeto para enviar para buscar no banco
                palavra: pesquisa //atribuir pesquisa a palavra
                        //como se fosse no html name="palavra"
            }
            $.post('../paginas/busca.php', dados, function (retorna) {
                //mostra dentro da ul index.php os resultados obtidos
                $("#tab").html(retorna); //id retornar valores
                
            });
        } else { //enquanto o usuário não digitar nada aparecer vazio
            $("#tab").html('');
        }
    });

});

