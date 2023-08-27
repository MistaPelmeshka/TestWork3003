
jQuery(function ($) {
    $('#production_form').submit(function (e) {
        e.preventDefault();

        $('.error_msg').remove();
        $('.product_image-block').removeClass('error_img');
        $('#regular_price, #product_date, #title_prod, #product_type, #product_image,  #product_type',).removeClass('error');

        console.log($('#product_image').prop('files')[0])
        $.ajax({
            type: 'post',
            url: window.wp_data.ajax_url,
            data: {
                action: 'create_product',
                title_prod: $('#title_prod').val(),
                product_date: $('#product_date').val(),
                product_type: $('#product_type').val(),
                regular_price: $('#regular_price').val(),
                sale_price: $('#sale_price').val(),
                product_image: $('#product_image').val(),

            },
            success: function (response) {
                console.log('AJAX response : ', response);
                /* console.log(response.success); */
                if (response.success) {
                    $('#production_form')[0].reset();

                    $('.section__form').append(function () {

                        return $(`<div class="done_form">
                                     <h3>Товар Добавлен!</h3>
                                  </div>`);
                    });
                    setTimeout(function () {
                        $('.done_form').remove();
                    }, 3000);
                    

                } else {

                    if (response.data.hasOwnProperty('title_prod')) {
                        $('#title_prod').addClass('error');
                        $('#title_prod').after(function () {
                            return $(`<span class="error_msg"> Заполните это поле </span>`)
                        });
                    }
                    if (response.data.hasOwnProperty('product_date')) {
                        $('#product_date').addClass('error');
                        $('#product_date').after(function () {
                            return $(`<span class="error_msg"> Заполните поле </span>`)
                        });
                    }
                    if (response.data.hasOwnProperty('product_type')) {
                        $('#product_type').addClass('error');
                        $('#product_type').after(function () {
                            return $(`<span class="error_msg"> Заполните поле </span>`)
                        });
                    }
                    if (response.data.hasOwnProperty('regular_price')) {
                        $('#regular_price').addClass('error');

                        $('#regular_price').after(function () {
                            return $(`<span class="error_msg"> Заполните поле </span>`)
                        });
                    }
                    if (response.data.hasOwnProperty('product_image')) {
                        $('#product_image').addClass('error');
                        $('.product_image-block').addClass('error_img');
                        $('.product_image-block').append(function () {
                            return $(`<span class="error_msg"> Добавте картинку </span>`)
                        });
                    }
                }
                /*  if(response.data.hasOwnProperty('sale_price')){
                     $('#sale_price').addClass('error'); 
                     $('#sale_price').after(function () {
                         return $(`<span class="error_msg"> Заполните поле </span>`)
                       });
                 } */
            }
        });

        /*   console.log(input[type="file"]) */

    });
})


function readURL(input) {
    let product_img = product_image.files[0];
    if (product_img) {
        see_img.src = URL.createObjectURL(product_img);
        document.querySelector('.product_image-text').classList.add('done');
        document.querySelector('.product_image-text2').classList.add('done');

        localStorage.setItem('myImage1', see_img.src);
    } else {
        document.querySelector('.product_image-text').classList.remove('done');
        document.querySelector('.product_image-text2').classList.remove('done');
        localStorage.clear();
    }

    see_img.src = localStorage.getItem('myImage1')

    console.log(see_img.src)
}
window.addEventListener("DOMContentLoaded", event => {
    see_img.src = localStorage.getItem('myImage1')

});


