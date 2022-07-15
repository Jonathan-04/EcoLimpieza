$(document).ready(function(){


    $('.btn-datos-usuario a:first').addClass('active2'); //Añadir nueva Clase


    $('.container-datos-usuario div').hide(); //Ocultar los Div
    $('.container-datos-usuario div:first').show(); //Mostrar el Primer Div

    $('.btn-datos-usuario a').click(function(){

        $('.btn-datos-usuario a').removeClass('active2');
        $(this).addClass('active2');
        $('.container-datos-usuario div').hide();

        //Mostrar los Article
        var activeArticle2 = $(this).attr('href');
        $(activeArticle2).show();
        return false;

    });
});

