jQuery(document).ready(function($){
    
    // jQuery sticky Menu
    
	$(".mainmenu-area").sticky({topSpacing:0});
    
    
    $('.product-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });


    function getCart()
    {
        $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function (res){
                if(!res){
                    alert ('Ошибка');
                    return false;
                }
                else {
                    showCart(res);
                }
            },
            error: function(){
                alert('ERROR');
            }
        })
    }


    $('#cart .modal-body'). on('click', '.del-item', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function (res){
                if(!res){
                    alert ('Ошибка');
                    return false;
                }
                else {
                    showCart(res);
                }
            },
            error: function(){
                alert('ERROR');
            }
        });
    });

    function showCart(cart)
    {
        $('#cart .modal-body'). html(cart);
        $('#cart').modal();
    }

    function clearCart()
    {
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function (res){
                if(!res){
                    alert ('Ошибка');
                    return false;
                }
                else {
                    showCart(res);
                }
            },
            error: function(){
                alert('ERROR');
            }
        });
        return false;
    }
    $('.index-clear-cart'). on('click', function (e) {
        clearCart();
    });
    
    $('.add_to_cart_button'). on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id'),
            qty = $('#qty').val();
        $.ajax({
            url: '/cart/add',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function (res){
                if(!res){
                    alert ('Ошибка');
                    return false;
                }
                else {
                    showCart(res);

                }
            },
            error: function(){
                alert ('ERROR');
            }
        })
    });
    
    $('.related-products-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });  
    
    $('.brand-list').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });    
    
    
    // Bootstrap Mobile Menu fix
    $(".navbar-nav li a").click(function(){
        $(".navbar-collapse").removeClass('in');
    });    
    
    // jQuery Scroll effect
    $('.navbar-nav li a, .scroll-to-up').bind('click', function(event) {
        var $anchor = $(this);
        var headerH = $('.header-area').outerHeight();
        $('html, body').stop().animate({
            scrollTop : $($anchor.attr('href')).offset().top - headerH + "px"
        }, 1200, 'easeInOutExpo');

        event.preventDefault();
    });    
    
    // Bootstrap ScrollPSY
    $('body').scrollspy({ 
        target: '.navbar-collapse',
        offset: 95
    })      
});

