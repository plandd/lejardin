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

    //gerar voucher pra promo aberta
    $('a[data-voucher]').on('click',function(e) {
        e.preventDefault();
        var dt = $(this).data('voucher');

        $.ajax({
            url: getData.ajaxDir,
            dataType: 'html',
            data: {
                action: 'plandd_voucher',
                promo: dt,
                tipo: "Promoção aberta"
            },
            type: 'GET',
            beforeSend: function() {
                console.log('enviado');
            },
            complete: function() {
                console.log('completo');
            },
            success: function(data) {
                if(data) {
                    window.location.href = data;
                }
            }
        });

    });

    function generate_voucher_vip() {
        $('a[data-vouchervip]').on('click',function(e) {
            e.preventDefault();
            var dt = $(this).data('vouchervip'),
                email = $(this).siblings('input[type="email"]').val(),
                formEmail = $(this).parents('div[data-reveal]').find('.voucher-info'),
                formID = $(this).parents('div[data-reveal]'),
                formHTML = $(this).parents('div[data-reveal]').find('.voucher-info').html();

            $.ajax({
                url: getData.ajaxDir,
                dataType: 'html',
                data: {
                    action: 'plandd_voucher_vip',
                    promo: dt,
                    tipo: "Promoção para clientes VIP",
                    form_data: email
                },
                type: 'GET',
                beforeSend: function() {
                    console.log('enviado');
                },
                complete: function() {
                    console.log('completo');
                },
                success: function(data) {
                    generate_voucher_vip();

                    if(data !== "false") {
                        window.location.href = data;
                    } else {
                        formEmail.html('<header class="divide-40 text-center bg-secondary vip-header"> <h2 class="white">Voucher Cliente VIP</h2></header><h4 class="primary small-14 left text-center">O e-mail cadastrado não se encontra em nossos registros.</h4><p class="vapor">Pode ter ocorrido os seguintes fatores:</p><p class="font-bold vapor no-margin">1) Você preencheu incorretamente seu email</p><p class="font-lite font-small vapor divide-10">Neste caso, favor retornar e preencher corretamente:</p><p><a href="#" class="button-secondary" data-closer>Retornar</a></p><p class="font-bold vapor no-margin">2) O e-mail preenchido não é o mesmo usado em seu cadastramento VIP</p><p class="font-lite font-small vapor divide-10">Neste caso, favor retornar e preencher com o email correto:</p><p><a href="#" class="button-secondary" data-closer>Retornar</a></p><p class="font-bold vapor no-margin">3) Você não é um cliente VIP do Le Jardin</p><p class="font-lite font-small vapor divide-10">Neste caso, aproveite e faça já o seu cadastro VIP</p><p class="font-bold secondary">É muito fácil e totalmente grátis!</p><p><a href="#" class="button-primary" data-cadastro>Quero ser cliente VIP</a></p>');
                            
                        $('a[data-cadastro]').click(function(e) {
                            e.preventDefault();
                            window.location.href = getData.cadastroVip;
                        });

                        $('a[data-closer]').on('click', function(e) {
                          e.preventDefault();
                          //formID.foundation('reveal', 'close');
                          formEmail.html(formHTML);
                          generate_voucher_vip();
                        });
                    }
                }
            });
        });  
    };
    generate_voucher_vip();

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

    function insertVIPhtml() {
        $('a[data-promovip]').on('click',function(e) {
            var formEmail = $(this).parents('div[data-reveal]').find('.voucher-info');
            $.ajax({
                url: getData.ajaxDir,
                dataType: 'html',
                data: {
                    action: 'cliente_vip_voucher_html'
                },
                type: 'GET',
                beforeSend: function() {
                    console.log('enviado');
                },
                complete: function() {
                    console.log('completo');
                },
                success: function(data) {
                    if(data == 'true') {
                        formEmail.html(data);
                    }
                }
            });
        });
    }
    
})();

