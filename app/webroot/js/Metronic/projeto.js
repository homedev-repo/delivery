$(window).on("load loaderGif",function(){
    $(".loader").fadeOut("slow");
    $(".loaderGif").fadeOut("slow");
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });

function setPaginate() {
    $("[paginate-control]").on('change', function () {
        url = $(this).attr('url') + $(this).val();
        $.get(url).done(function (response) {
            $('#content').html(response)
        });
    });
}

function createAjax() {
    $('[requisicaoAjax]').each(function (index) {
        $(this).on('click', function (event) {
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

function modalAlerta() {
    $(".chamadaModal").on('click', function () {
        controllerName = $(this).attr('controllerName');
        $("#ajax_button").html('<a href=' + controllerName + '/delete/' + $(this).attr("data-id") + " class='btn btn-success btn-flat'>Confirmar</a>");
        $("#chamaModalExcluir").click();
    });
}

function modalAlertaClientes() {
    $("#chamadaModalCliente").on('click', function () {
        $("#triggerCliente").click();
    });
}

function modalAlertaEmailCupom() {
    $("#chamadaModalCupom").on('click', function () {
        $("#triggerCupom").click();
    });
}

function validarJustificativa() {
    var justificativa = function (tipo) {
        $('.Justificativa').attr("disabled", true).parent('div').hide();
        if (tipo != '1') {
            $('.Justificativa').attr("disabled", false).parent('div').show();
        } else {
            $('.Justificativa').attr("disabled", true).parent('div').hide();
        }
    }
    $('select[name="data[Cliente][situacao_id]"]').on('change', function (e) { justificativa($(this).val()); });
    justificativa($('[name="data[Cliente][situacao_id]"]').val());
}

function motoboyTerceirizado() {
    var terceirizado = function (tipo) {
        $('.motoboyTerceirizado').parent('div').hide();
        if (tipo == 'Sim') {
            $('.motoboyTerceirizado').parent('div').show();
            $('.Tercerizado').parent('div').hide();
        } else {
            $('.motoboyTerceirizado').parent('div').hide();
            $('.Tercerizado').parent('div').show();
            $('h4').show();
        }
    }
    $('input[name="data[Motoboy][terceirizada]"]').on('change', function (e) { terceirizado($(this).val()); });
    terceirizado($('[name="data[Motoboy][terceirizada]"]:checked').val());
}

function situacaoCliente() {
    var situacao = function (tipo) {
        $('#ClienteJustificativa').parent('div').hide();
        if (tipo == '2') {
            $('#ClienteJustificativa').parent('div').show();
        }
    }
    $('input[name="data[Cliente][situacao_id]"]').on('change', function (e) { situacao($(this).val()); });
    situacao($('[name="data[Cliente][situacao_id]"]:checked').val());
}

function alterarImagemProduto() {
    $('.upload-input-desabilitar').attr("disabled", "disabled");
    $('.alterarImagem-div').hide();
    if ($('.AlterarFotoUm').click(function () {
        $('.alterarImagem-div').show();
        $('.desabilitar').attr("disabled", false).removeClass('desabilita');
        $('.upload-input-desabilitar').attr("disabled", false).removeClass('desabilita');
        $('.input-div').show();
    }));

}

function produtoPromocao() {
    var produto = function (tipo) {
        $('#MascaraReaisPromocao').attr("disabled", true).parent('div').hide();
        $('#MascaraReais').attr("disabled", true).parent('div').hide();
        if (tipo == 'Sim') {
            $('#MascaraReaisPromocao').attr("disabled", false).parent('div').show();
            $('#MascaraReais').attr("disabled", false).parent('div').show();
        } else {
            $('#MascaraReais').attr("disabled", false).parent('div').show();
        }
    }
    $('input[name="data[Produto][promocao]"]').on('change', function (e) { produto($(this).val()); });
    produto($('[name="data[Produto][promocao]"]:checked').val());
}

function mostraOpcoesBanner() {
    var mostraOpcoes = function (tipo) {
        $('.AbreOpcaoLink').attr("disabled", true).parent('div').hide();
        $('.AbreOpcaoProduto').attr("disabled", true).parent('div').hide();
        if (tipo == '3') {
            $('.AbreOpcaoProduto').attr("disabled", true).parent('div').hide();
            $('.AbreOpcaoLink').attr("disabled", false).parent('div').show();
        }
        if (tipo == '2') {
            $('.AbreOpcaoProduto').attr("disabled", true).parent('div').show();
            $('.AbreOpcaoLink').attr("disabled", false).parent('div').hide();
        }
    }
    $('select[name="data[Banner][acao_id]"]').on('change', function (e) { mostraOpcoes($(this).val()); });
    mostraOpcoes($('[name="data[Banner][acao_id]"]').val());

}

//Mensagem de aniversario
$(window).load(function () {
    $('#myModal').modal('show');
});

function getCep() {
    $(".Cep").blur(function () {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {

                $(".Rua").val("Carregando...");
                $(".Bairro").val("Carregando....");
                $(".Cidade").val("Carregando...");
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        $(".Rua").val(dados.logradouro);
                        $(".Bairro").val(dados.bairro);
                        $(".Cidade").val(dados.localidade);
                    } else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            }
        }
    });
}

function atualizaNotificacoes() {
    var urlNotificacoes = "http://localhost/Vayron/notificas/notificacoesFind";
    $.getJSON(urlNotificacoes, function (data, callback) {
        var atualizaNotificacoesAjax = '';
        $.each(data, function (key, value) {
            var conteudo = value['Notifica']['conteudo'];
            var created = value['Notifica']['created'];
            atualizaNotificacoesAjax += '<tr>';
            atualizaNotificacoesAjax += '<td>' + conteudo + '</td>';
            atualizaNotificacoesAjax += '<td>' + created + '</td>';
            atualizaNotificacoesAjax += '</tr>';
        });

        $('#atualizaNotificacoesAjax').append(atualizaNotificacoesAjax);
        $('.toast').toast('show');

    });
}

$("#onClickNotificacoesLoad").click(function () {
    atualizaNotificacoes();
});


$(document).ready(function () {
    $('input').inputmask({
        mask: '$ [9][9][9][9][9][9][9][9]9.99',
        numericInput: true,
        placeholder: '0',
        greedy: false
      });
    $('#onClickNotificacoesLoad').off('click');
});


function programaDeFidelidadeDados() {
    var mostraOpcoes = function (tipo) {
        $('#comprarXVezes').attr("disabled", true).parent('div').hide();
        $('.gastarXVezes').attr("disabled", true).parent('div').hide();
        if (tipo == '1') {
            $('#comprarXVezes').attr("disabled", false).parent('div').show();
            $('.gastarXVezes').attr("disabled", true).parent('div').hide();
        }
        if (tipo == '2') {
            $('#comprarXVezes').attr("disabled", true).parent('div').hide();
            $('.gastarXVezes').attr("disabled", false).parent('div').show();
        }
    }
    $('select[name="data[Fidelidade][premio_id]"]').on('change', function (e) { mostraOpcoes($(this).val()); });
    mostraOpcoes($('[name="data[Fidelidade][premio_id]"]').val());

}

function programaDeFidelidadePremio() {
    var mostraOpcoesPremio = function (tipo) {
        $('#porcentagemDesconto').attr("disabled", true).parent('div').hide();
        $('.compraDesconto').attr("disabled", true).parent('div').hide();
        if (tipo == '1') {
            $('#porcentagemDesconto').attr("disabled", false).parent('div').show();
            $('.compraDesconto').attr("disabled", true).parent('div').hide();
        }
        if (tipo == '2') {
            $('#porcentagemDesconto').attr("disabled", true).parent('div').hide();
            $('.compraDesconto').attr("disabled", false).parent('div').show();
        }
    }
    $('select[name="data[Fidelidade][recompensa_id]"]').on('change', function (e) { mostraOpcoesPremio($(this).val()); });
    mostraOpcoesPremio($('[name="data[Fidelidade][recompensa_id]"]').val());

}

function atribuirCupom() {
    var mostraOpcoesCupom = function (tipo) {
        $('#CupomClienteId').attr("disabled", true).parent('div').hide();
        if (tipo == 'Sim') {
            $('#CupomClienteId').attr("disabled", false).parent('div').show();
        }
    }
    $('select[name="data[Cupom][atribuir_cupom]"]').on('change', function (e) { mostraOpcoesCupom($(this).val()); });
    mostraOpcoesCupom($('[name="data[Cupom][atribuir_cupom]"]').val());

}


function atribuirCupom() {
    var atribuirCupom = function (tipo) {
        $('#CupomCliente').attr("disabled", true).parent('div').hide();
        if (tipo == 'Sim') {
            $('#CupomCliente').attr("disabled", false).parent('div').show();
        }
    }
    $('input[name="data[Cupom][atribuir_cupom]"]').on('change', function (e) { atribuirCupom($(this).val()); });
    atribuirCupom($('[name="data[Cupom][atribuir_cupom]"]:checked').val());
}


function ocultaDivFichaTecnica() {
    $(".hiddenDiv").hide().attr("disabled", true);        
    $("#mostraItens").click(function(){
        $(".hiddenDiv").show().attr("disabled", false);  
      });
}

function hiddenBotaoAddBanner(){
    $('#idBotaoNovo').attr("disabled", true).parent('div').hide();
}

function cupomDesativado() {
    var situacao = function (tipo) {
        if (tipo == 'Desativado') {
            $('#CupomCliente').attr("disabled", true).parent('div').hide();
            $('.ocultaDiv').attr("disabled", true).parent('div').hide();
            document.querySelector("[name='data[Cupom][atribuir_cupom]']").value = 'Não';
        } else {
            $('#CupomCliente').attr("disabled", false).parent('div').show();
            $('.ocultaDiv').attr("disabled", false).parent('div').show();
        }
    }
    $('select[name="data[Cupom][situacao]"]').on('change', function (e) { situacao($(this).val()); });
    situacao($('[name="data[Cupom][situacao]"]').val());

}

function mensagemCustoProduto(){
    $(".descricaoProdutoCusto").hide().attr("disabled", true);        
    $("#labelProduto").click(function(){
        $(".descricaoProdutoCusto").toggle().attr("disabled", false);  
      });
}

function emailMarketing() {
    var opcoesEmail = function (tipo) {
        $('#para').attr("disabled", true).parent('div').hide();
        if (tipo == 'enderecoEspecifico') {
            $('#para').attr("disabled", false).parent('div').show();

        }
    }
    $('input[name="data[Emailmarketing][forma]"]').on('change', function (e) { opcoesEmail($(this).val()); });
    opcoesEmail($('[name="data[Emailmarketing][forma]"]:checked').val());

}

function envioSMS() {
    var opcoesEnvio = function (tipo) {
        $('#para').attr("disabled", true).parent('div').hide();
        if (tipo == 'enderecoEspecifico') {
            $('#para').attr("disabled", false).parent('div').show();

        }
    }
    $('input[name="data[Envioshortservice][forma]"]').on('change', function (e) { opcoesEnvio($(this).val()); });
    opcoesEnvio($('[name="data[Envioshortservice][forma]"]:checked').val());

}

function cloneDivDescricaoProduto() {
    tratamentoDaView();
    tratamentoDoEdit();

    contador = 0;
    $(".tamanho1").hide();
    $('#inputTamanho1').attr('disabled', 'disabled');

    $(".tamanho2").hide();
    $('#inputTamanho2').attr('disabled', 'disabled');

    $(".tamanho3").hide();
    $('#inputTamanho3').attr('disabled', 'disabled');

    $(".tamanho4").hide();
    $('#inputTamanho4').attr('disabled', 'disabled');

    $(".tamanho5").hide();
    $('#inputTamanho5').attr('disabled', 'disabled');

    $("#novoTamanho").click(function(){
        contador++;
        if(contador == 1){
            $(".tamanho1").show();
            $('#inputTamanho1').attr('disabled', false);
        }
        if(contador == 2){
            $(".tamanho2").show();
            $('#inputTamanho2').attr('disabled', false);
        }
        if(contador == 3){
            $(".tamanho3").show();
            $('#inputTamanho3').attr('disabled', false);
        }
        if(contador == 4){
            $(".tamanho4").show();
            $('#inputTamanho4').attr('disabled', false);
        }
        if(contador == 5){
            $(".tamanho5").show();
            $('#inputTamanho5').attr('disabled', false);
        }
    });

    $(".fechaInput1").click(function(){
        $(".tamanho1").remove();
        $('#inputTamanho1').attr('disabled', 'disabled');
    });

    $(".fechaInput2").click(function(){
        $(".tamanho2").remove();
        $('#inputTamanho2').attr('disabled', 'disabled');
    });

    $(".fechaInput3").click(function(){
        $(".tamanho3").remove();
        $('#inputTamanho3').attr('disabled', 'disabled');
    });

    $(".fechaInput4").click(function(){
        $(".tamanho4").remove();
        $('#inputTamanho4').attr('disabled', 'disabled');
    });

    $(".fechaInput5").click(function(){
        $(".tamanho5").remove();
        $('#inputTamanho5').attr('disabled', 'disabled');
    });

}

function tratamentoDaView() {
    var valorInput1 = $("#inputTamanho1View").val();
    var valorInput2 = $("#inputTamanho2View").val();
    var valorInput3 = $("#inputTamanho3View").val();
    var valorInput4 = $("#inputTamanho4View").val();
    var valorInput5 = $("#inputTamanho5View").val();
    
    if (valorInput1 == null || valorInput1 == '' || valorInput1 == 'undefined') {
        $(".tamanho1View").remove();
    }

    if (valorInput2 == null || valorInput2 == '' || valorInput2 == 'undefined') {
        $(".tamanho2View").remove();
    }

    if (valorInput3 == null || valorInput3 == '' || valorInput3 == 'undefined') {
        $(".tamanho3View").remove();
    }

    if (valorInput4 == null || valorInput4 == '' || valorInput4 == 'undefined') {
        $(".tamanho4View").remove();
    }

    if (valorInput5 == null || valorInput5 == '' || valorInput5 == 'undefined') {
        $(".tamanho5View").remove();
    }
}

function tratamentoDoEdit() {
    var contadorInput1 = 1;
    var contadorInput2 = 1;
    var contadorInput3 = 1;
    var contadorInput4 = 1;
    var contadorInput5 = 1;
    var valorInput1 = $("#inputTamanho1Edit").val();
    var valorInput2 = $("#inputTamanho2Edit").val();
    var valorInput3 = $("#inputTamanho3Edit").val();
    var valorInput4 = $("#inputTamanho4Edit").val();
    var valorInput5 = $("#inputTamanho5Edit").val();
    if (!valorInput1) {
        contadorInput1 = 0;
        $(".tamanho1Edit").hide();
        $('#inputTamanho1Edit').attr('disabled', 'disabled');
    }

    if (!valorInput2) {
        $(".tamanho2Edit").hide();
        $('#inputTamanho2Edit').attr('disabled', 'disabled');
        contadorInput2 = 0;
    }

    if (!valorInput3) {
        $(".tamanho3Edit").hide();
        $('#inputTamanho3Edit').attr('disabled', 'disabled');
        contadorInput3 = 0;
    }

    if (!valorInput4) {
        $(".tamanho4Edit").hide();
        $('#inputTamanho4Edit').attr('disabled', 'disabled');
        contadorInput4 = 0;
    }

    if (!valorInput5) {
        $(".tamanho5Edit").hide();
        $('#inputTamanho5Edit').attr('disabled', 'disabled');
        contadorInput5 = 0;
    }

   var contadorIniciaEm = contadorInput1 + contadorInput2 + contadorInput3 + contadorInput4 + contadorInput5;

    $(".fechaInput1Edit").click(function(){
        $('#inputTamanho1Edit').attr('disabled', 'disabled');
        $(".tamanho1Edit").remove();
    });

    $(".fechaInput2Edit").click(function(){
        $('#inputTamanho2Edit').attr('disabled', 'disabled');
        $(".tamanho2Edit").remove();
    });

    $(".fechaInput3Edit").click(function(){
        $('#inputTamanho3Edit').attr('disabled', 'disabled');
        $(".tamanho3Edit").remove();
    });

    $(".fechaInput4Edit").click(function(){
        $(".tamanho4Edit").remove();
        $('#inputTamanho4Edit').attr('disabled', 'disabled');
    });

    $(".fechaInput5Edit").click(function(){
        $(".tamanho5Edit").remove();
        $('#inputTamanho5Edit').attr('disabled', 'disabled');
    });

    $("#novoTamanhoEdit").click(function(){
        contadorIniciaEm++
        if(contadorIniciaEm == 1 || contadorIniciaEm == 0){
            $(".tamanho1Edit").show();
            $('#inputTamanho1Edit').attr('disabled', false);
        }
        if(contadorIniciaEm == 2){
            $(".tamanho2Edit").show();
            $('#inputTamanho2Edit').attr('disabled', false);
        }
        if(contadorIniciaEm == 3){
            $(".tamanho3Edit").show();
            $('#inputTamanho3Edit').attr('disabled', false);
        }
        if(contadorIniciaEm == 4){
            $(".tamanho4Edit").show();
            $('#inputTamanho4Edit').attr('disabled', false);
        }
        if(contadorIniciaEm == 5){
            $(".tamanho5Edit").show();
            $('#inputTamanho5Edit').attr('disabled', false);
        }
    });
}

function pegaValorSelectTipoProdutosTamanhos() {
    var valorInput0 = $("#inputTamanho0ProdutosTamanhos").val();
    var valorInput1 = $("#inputTamanho1ProdutosTamanhos").val();
    var valorInput2 = $("#inputTamanho2ProdutosTamanhos").val();
    var valorInput3 = $("#inputTamanh30ProdutosTamanhos").val();
    var valorInput4 = $("#inputTamanh40ProdutosTamanhos").val();
    var valorInput5 = $("#inputTamanho5ProdutosTamanhos").val();
    
    if (valorInput0 == null || valorInput0 == '' || valorInput0 == 'undefined') {
        $(".tamanho0ProdutosTamanhos").remove();
    }

    if (valorInput1 == null || valorInput1 == '' || valorInput1 == 'undefined') {
        $(".tamanho1ProdutosTamanhos").remove();
    }

    if (valorInput2 == null || valorInput2 == '' || valorInput2 == 'undefined') {
        $(".tamanho2ProdutosTamanhos").remove();
    }
    if (valorInput3 == null || valorInput3 == '' || valorInput3 == 'undefined') {
        $(".tamanho3ProdutosTamanhos").remove();
    }

    if (valorInput4 == null || valorInput4 == '' || valorInput4 == 'undefined') {
        $(".tamanho4ProdutosTamanhos").remove();
    }

    if (valorInput5 == null || valorInput5 == '' || valorInput5 == 'undefined') {
        $(".tamanho5ProdutosTamanhos").remove();
    }

    $('input[name="data[Tamanho][habilitar]"]').on('change', function () {
        var total = $('[name="data[Tamanho][habilitar]"]:checked').length;
        if (total == 1) {
            $('#inputTamanhoprecocustoEditTamanho').attr('disabled', false);
            $('#inputTamanhoprecovendaEditTamanho').attr('disabled', false);
        } else {
            $('#inputTamanhoprecocustoEditTamanho').attr('disabled', true);
            $('#inputTamanhoprecovendaEditTamanho').attr('disabled', true);
        }
    });

    $('input[name="data[Tamanho][0][habilitar]"]').on('change', function () {
        var total = $('[name="data[Tamanho][0][habilitar]"]:checked').length;
        if (total == 1) {
            $('#inputTamanho0precocusto').attr('disabled', false);
            $('#inputTamanho0precovenda').attr('disabled', false);
        } else {
            $('#inputTamanho0precocusto').attr('disabled', true);
            $('#inputTamanho0precovenda').attr('disabled', true);
        }
    });

    $('input[name="data[Tamanho][1][habilitar]"]').on('change', function () {
        var total = $('[name="data[Tamanho][1][habilitar]"]:checked').length;
        if (total == 1) {
            $('#inputTamanho1precocusto').attr('disabled', false);
            $('#inputTamanho1precovenda').attr('disabled', false);
        } else {
            $('#inputTamanho1precocusto').attr('disabled', true);
            $('#inputTamanho1precovenda').attr('disabled', true);
        }
    });

    $('input[name="data[Tamanho][2][habilitar]"]').on('change', function () {
        var total = $('[name="data[Tamanho][2][habilitar]"]:checked').length;
        if (total == 1) {
            $('#inputTamanho2precocusto').attr('disabled', false);
            $('#inputTamanho2precovenda').attr('disabled', false);
        } else {
            $('#inputTamanho2precocusto').attr('disabled', true);
            $('#inputTamanho2precovenda').attr('disabled', true);
        }
    });

    $('input[name="data[Tamanho][3][habilitar]"]').on('change', function () {
        var total = $('[name="data[Tamanho][3][habilitar]"]:checked').length;
        if (total == 1) {
            $('#inputTamanho3precocusto').attr('disabled', false);
            $('#inputTamanho3precovenda').attr('disabled', false);
        } else {
            $('#inputTamanho3precocusto').attr('disabled', true);
            $('#inputTamanho3precovenda').attr('disabled', true);
        }
    });

    $('input[name="data[Tamanho][4][habilitar]"]').on('change', function () {
        var total = $('[name="data[Tamanho][4][habilitar]"]:checked').length;
        if (total == 1) {
            $('#inputTamanho4precocusto').attr('disabled', false);
            $('#inputTamanho4precovenda').attr('disabled', false);
        } else {
            $('#inputTamanho4precocusto').attr('disabled', true);
            $('#inputTamanho4precovenda').attr('disabled', true);
        }
    });

    $('input[name="data[Tamanho][5][habilitar]"]').on('change', function () {
        var total = $('[name="data[Tamanho][5][habilitar]"]:checked').length;
        if (total == 1) {
            $('#inputTamanho5precocusto').attr('disabled', false);
            $('#inputTamanho5precovenda').attr('disabled', false);
        } else {
            $('#inputTamanho5precocusto').attr('disabled', true);
            $('#inputTamanho5precovenda').attr('disabled', true);
        }
    });

}

function produtoEmPromocao() {
    var produtoEmPromocao = function (tipo) {
        $('.valor_promocao').attr("disabled", true).parent('div').hide();
        if (tipo == 'Sim') {
            $('.valor_promocao').attr("disabled", false).parent('div').show();
        }
    }
    $('input[name="data[Produto][promocao]"]').on('change', function (e) { produtoEmPromocao($(this).val()); });
    produtoEmPromocao($('[name="data[Produto][promocao]"]:checked').val());
}

function produtoContemComplementos() {
    var produtoContemComplementos = function (tipo) {
        $('.produtoComplementos').attr("disabled", true).parent('div').hide();
        $('.quantidade_inicial').attr("disabled", true).parent('div').hide();
        if (tipo == 'Nao') {
            $('.produtoComplementos').attr("disabled", false).parent('div').show();
        }
    }
    $('input[name="data[Produto][contem_complementos]"]').on('change', function (e) { produtoContemComplementos($(this).val()); });
    produtoContemComplementos($('[name="data[Produto][contem_complementos]"]:checked').val());
}

function produtoEstoque() {
    var produtoEstoque = function (tipo) {
        $('.quantidade_inicial').attr("disabled", true).parent('div').hide();
         tipo == 'Nao'
        if (tipo == 'Sim') {
            $('.quantidade_inicial').attr("disabled", false).parent('div').show();
        }
    }
    $('input[name="data[Produto][controlar_estoque]"]').on('change', function (e) { produtoEstoque($(this).val()); });
    produtoEstoque($('[name="data[Produto][controlar_estoque]"]:checked').val());
}





