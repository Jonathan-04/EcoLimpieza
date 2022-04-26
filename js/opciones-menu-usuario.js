$(document).ready(function(){


    $('ul.btn-options li a:first').addClass('active'); //Añadir nueva Clase


    $('.article-menu article').hide(); //Ocultar los Article
    $('.article-menu article:first').show(); //Mostrar el Primer Article

    $('ul.btn-options li a').click(function(){

        $('ul.btn-options li a').removeClass('active');
        $(this).addClass('active');
        $('.article-menu article').hide();

        //Mostrar los Article
        var activeArticle = $(this).attr('href');
        $(activeArticle).show();
        return false;

    });
});

