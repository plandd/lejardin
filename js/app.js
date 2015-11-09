// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();
//plugins
$.fn.getDataThumb = function(options) {
    options = $.extend({
        bgClass: 'bg-cover'
    }, options || {});
    return this.each(function() {
        var th = $(this).data('thumb');
        if (th) {
            $(this).css('background-image', 'url(' + th + ')').addClass(options.bgClass);
        }
    });
};
$('*[data-thumb]').getDataThumb(); // data-thumb para esses elementos

//menu offcanvas
$('.site-menu').clone().appendTo('#offcanvas');

$('.site-menu > li:first-child a','#offcanvas').text('Principal');

$('.show-offcanvas,.close-offcanvas,.close-menu').on('click', function () {
    $('body').toggleClass('move');
    $('.close-offcanvas').toggleClass('show');
});

//menu principal
$('li','.site-menu').each(function (i) {
    if($(this).find('ul').length) {
        $('> a',this).append('<span class="icon-lejardim_down_3 right"></span>')
            .on('click', function () {
                $(this)
                    .siblings('.sub-menu').toggleClass('show')
                    .end()
                    .find('span').toggleClass('rotate');
            });
    }
});

(function() {
  $('nav','#home-slider').on('cycle-after', function() {
    $('hgroup',this).addClass('active');
  });
  $('nav','#home-slider').on('cycle-before', function() {
    $('hgroup',this).removeClass('active');
  });
  $('nav','#home-slider').on('cycle-initialized', function() {
    $('hgroup',this).addClass('active');
  });
})();

//slider suites
(function() {
    var planos = $("#suites-carousel");
    planos.owlCarousel({
        responsiveBaseWidth: $(".row"),
        responsive: true,
        responsiveRefreshRate: 200,
        pagination: true,
        autoPlay: 5000,
        rewindNav: true,
        rewindSpeed: 1000,
        loop: true,
        itemsCustom: [
            [200, 1],
            [700, 2],
            [800, 3],
        ],
        rewindNav: false,
        rewindSpeed: 300
    });

    $(".next-roll").click(function(e) {
        e.preventDefault();
        planos.trigger('owl.next');
    });
    $(".prev-roll").click(function(e) {
        e.preventDefault();
        planos.trigger('owl.prev');
    });

    var sobre = $("#about-carousel");
    sobre.owlCarousel({
        responsiveBaseWidth: $(".row"),
        responsive: true,
        responsiveRefreshRate: 200,
        pagination: true,
        autoPlay: 5000,
        rewindNav: true,
        rewindSpeed: 1000,
        loop: true,
        itemsCustom: [
            [200, 1],
            [700, 2],
            [800, 4],
        ],
        rewindNav: false,
        rewindSpeed: 300
    });
})();

//MAPS
(function() {
  if($('#map').length) {
    var lat = $("#map").data('lat'),
        lng = $("#map").data('lng');

    function initMap() {
      var myLatLng = {lat: lat, lng: lng};

      var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        zoom: 14
      });

      var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        title: 'Motel Le Jardin'
      });
    }

    google.maps.event.addDomListener(window, 'load', initMap);

  }
})();

//Menu scroll
(function() {
    $("#header").clone().appendTo("#offmenu");
    
    var lastScrollTop = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            $('#offmenu').removeClass('active');
        } else if(st <= 200) {
            $('#offmenu').removeClass('active');
        } else {
            $('#offmenu').addClass('active');
        }
        lastScrollTop = st;
    });
})();

//Suites
(function() {
    $("a","#nav-suites").on('click',function(e) {
        e.preventDefault();
        var titulo = $(this).text();

        $(this).addClass('active')
        .parents('li')
        .siblings('li')
        .find('a').removeClass('active');

        $('.a-suite').each(function() {
            var dt = $(this).data('suite');
            
            if(dt == titulo) {
                $(this).addClass('active')
                .siblings('.a-suite').removeClass('active');
            }
        });
    });
})();

//Cliente VIP
(function() {
    $('a[data-reveal-id="cliente-vip"]').on('click',function(e) {
        var email = $("#req-vip").find('input[type="email"]').val();
        $.ajax({
            url: getData.ajaxDir,
            dataType: 'html',
            data: {
                action: 'plandd_cliente_vip',
                vip_email: email
            },
            type: 'GET',
            beforeSend: function() {
                console.log('enviado');
            },
            complete: function() {
                console.log('completo');
            },
            success: function(data) {
                $("#cliente-vip > div").html(data);
                send_form_vip();
            }
        });
    });

    function send_form_vip() {
        $("#form-vip").on("submit",function(e) {
            e.preventDefault();
            var data_form = $(this).serialize();
            $.ajax({
                url: getData.ajaxDir,
                dataType: 'html',
                data: {
                    action: 'add_cliente_vip',
                    serialize: data_form
                },
                type: 'GET',
                beforeSend: function() {
                    console.log('enviado');
                },
                complete: function() {
                    console.log('completo');
                },
                success: function(data) {
                    if(data !== 'true') {
                        $('.error-reporting').html(data);
                    } else {
                        $("#cliente-vip > div").html('<header class="divide-40 text-center bg-secondary vip-header">Cadastro realizado com sucesso</header><p class="vapor text-center">Bem vindo à nossa lista de clientes VIP`s.<br>Fique de olho em nossas promoções!</p>');
                    }
                }
            });
        });
    };
    
})();

