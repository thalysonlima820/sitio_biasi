$(document).ready(() => {
    //PRODUTO
    $('#cadastro_produto').on('click', () => {
        $.get("/cadastro_produto", data => {
            $("#pri").html(data)
        });
    });
    //PESTICIDA
    $('#cadastro_pesticida').on('click', () => {
        $.get('cadastro_pesticida', data => {
            $('#pri').html(data)
        });
    });
    //PLANTAÇÃO
    $('#plantacao').on('click', () => {
        $.get('plantacao', data => {
            $('#pri').html(data)
        });
    });
    //CANTEIRO
    $('#cadastro_canteiro').on('click', () => {
        $.get('cadastro_canteiro', data => {
            $('#pri').html(data)
        });
    });

});
