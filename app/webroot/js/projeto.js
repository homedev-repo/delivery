function setPaginate() {
    $("[paginate-control]").on('change', function() {
        console.log('test');
        url = $(this).attr('url') + $(this).val();
        $.get(url).done(function(response) {
            $('#content').html(response)
        });
    });
}


function createAjax() {
    $('a[ajax="post"]').each(function(index) {
        $(this).on('click', function(event) {
            event.preventDefault();
            var url = $(this).attr('href');
            var update = $(this).attr('update');
            $.ajax({
                async: true,
                cache: false,
                type: 'post',
                data: $(this).closest('form').serialize(),
                url: url
            }).done(function (response) {
                $(update).html(response);
            });
        });
    });
}

function mostraCampoObservacao() {
    $("#campoObservacao").hide();
    $("#Checkbox").click(function () {
        if ($(this).is(":checked")) {
            $("#campoObservacao").show();
        } else {
            $("#campoObservacao").hide();
          
        }
    });
}

$(document).ready(function() {
    $(".Cep").blur(function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                $(".Rua").val("Carregando dados...");
                $(".Bairro").val("Carregando dados...");
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        $(".Rua").val(dados.logradouro);
                        $(".Bairro").val(dados.bairro);
                    }
                    else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            }
        }
    });
});


