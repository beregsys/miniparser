$(document).ready(function() {
    $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
            }
        }
    });
    //large images
    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });

    //
    $("#testform").submit(function (event) {
        event.preventDefault();
        var $form = $( this ),
            name = $form.find( "input[name='name']" ).val(),
            phone = $form.find( "input[name='phone']" ).val(),
            email = $form.find( "input[name='email']" ).val(),
            product_id = $form.find( "input[name='product_id']" ).val(),
            product_sum = $form.find( "input[name='product_sum']" ).val(),
            url = $form.attr( "action" );

        // Send the data using post
        var posting = $.post( url, { name: name, phone:phone, email: email, product_id:product_id, product_sum:product_sum} );

        // Put the results in a div
        posting.done(function( data ) {
            console.log(data);
            $('.white-popup-block').hide();
            $('.mfp-content').append("<div class='thank-you'>Спасибо за заказ!</div>");
            setTimeout(function(){
                $('.mfp-close').click();
                $('.white-popup-block').show();
            }, 3000);

        });
        posting.fail(function(data) {
            console.log(data);
            $('.white-popup-block').hide();
            $('.mfp-content').append("<div class='thank-you'>Ошибка при отправке!</div>");
            setTimeout(function(){
                $('.mfp-close').click();
            }, 3000);
        })
    });

    $(".products__button__link").on("click", function (event) {
        event.preventDefault();
        $("#product-id")[0].value = parseInt(event.target.id) + 1;
        var id = "#" + event.target.id;
        var product = $(id).parents('.product-item'),
            brand = product.find('.brand-section__link').text().trim(),
            name = product.find('.name-section__link').text().trim(),
            artnumber = product.find('.artnumber-section__link').text().trim(),
            price = product.find('.section-price__link').text().trim();
        arr = [name, brand, artnumber, price];
        var somestirng = arr.join(';');
        $("#product-sum")[0].value = somestirng;
    })
});

