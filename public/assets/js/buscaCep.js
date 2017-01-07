$(function () {
    $('#cep').change(function () {
        var cep = $('#cep').val();
        $.ajax({
            url: 'https://viacep.com.br/ws/'+cep+'/json/ ',
            type: 'GET',
            dataType: 'json',
            success: function(RESPOSTA){
                $("#bairro").val(RESPOSTA.bairro);
                $("#endereco").val(RESPOSTA.logradouro);
                $("#pais").val('Brasil');
                $("#uf").val(RESPOSTA.uf);
                $("#cidade").val(RESPOSTA.localidade);
            }

        });
    });
});