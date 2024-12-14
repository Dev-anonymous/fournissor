<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Accueil | {{ config('app.name') }}</title>
    <x-css-file-web />
</head>

<body>
    <div class="page-wrapper">
        <div class="preloader"></div>

        <section class="header-uper" style="padding: 10px 0;">
            <div class="container clearfix">
                <div class="logo">
                    <figure>
                        <a href="{{ route('home') }}">
                            @php
                                $logo = @getappconfig()->logo;
                                if (!$logo) {
                                    $logo = 'ressources/images/logo.png';
                                } else {
                                    $logo = asset('storage/' . $logo);
                                }
                            @endphp
                            <img src="{{ $logo }}" alt="" width="130" height="70px"
                                style="object-fit: contain" />
                        </a>
                    </figure>
                </div>
                <div class="right-side">
                    <ul class="contact-info">
                        <li class="item">
                            <div class="icon-box">
                                <i class="text-primary fa fa-envelope-o"></i>
                            </div>
                            <strong>Email</strong>
                            <br />
                            <a href="mailto:{{ @getappconfig()->email }}">
                                <p>{{ @getappconfig()->email }}</p>
                            </a>
                        </li>
                        <li class="item">
                            <div class="icon-box">
                                <i class="text-primary fa fa-phone"></i>
                            </div>
                            <strong>Phone</strong>
                            <br />
                            <a href="tel:{{ @getappconfig()->tel }}" class="text-muted">
                                <p>{{ @getappconfig()->tel }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <x-nav />

        <div class="hero-slider">
            <div class="slider-item slide1" style="background-image: url({{ asset('ressources/images/bg1.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content style text-center">
                                <h2 class="text-white text-bold mb-2">Satisfaction Garantie</h2>
                                <p class="tag-text mb-5">
                                    Notre politique de satisfaction vous permet de résoudre tout problème rapidement et
                                    efficacement afin que votre expérience soit toujours positive.
                                </p>
                                {{-- <a href="#" class="btn btn-main btn-white">explore</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item" style="background-image: url({{ asset('ressources/images/bg2.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content style text-right">
                                <h2 class="text-white">Évaluation de la Qualité</h2>
                                <p class="tag-text">
                                    Chaque professionnel inscrit sur la plateforme est évalué
                                    par les utilisateurs précédents. Cela permet de garantir la qualité des services
                                    proposés ainsi que la satisfaction des clients.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item" style="background-image: url({{ asset('ressources/images/bg3.png') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content text-center style">
                                <h2 class="text-white text-bold mb-2">
                                    Économie
                                </h2>
                                <p class="tag-text mb-5">
                                    Comparez les devis et choisissez les solutions les plus adaptées à votre budget sans
                                    sacrifier la qualité des travaux.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cta">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cta-block">
                            <div class="item" style="background: whitesmoke; border-radius: 10px; margin:5px;">
                                <h2> <i class="fa fa-clock-o"></i> Gain de Temps</h2>
                                <p>
                                    Simplifiez vos recherches et réduisez le temps nécessaire à la
                                    gestion de votre projet grâce à une plateforme unique.
                                </p>
                            </div>
                            <div class="item" style="background: whitesmoke; border-radius: 10px; margin:5px;">
                                <h2><i class="fa fa-building-o"></i>Construction</h2>
                                <p>
                                    Nous vous mettons en relation avec des entreprises
                                    spécialisées dans la construction de bâtiments résidentiels et commerciaux. Que ce
                                    soit pour des fondations, des charpentes ou des finitions, nos partenaires sauront
                                    répondre à toutes vos demandes.
                                </p>
                            </div>
                            <div class="item" style="background: whitesmoke; border-radius: 10px; margin:5px;">
                                <h2><i class="fa fa-list-alt"></i> Devis Instantanés</h2>
                                <p>
                                    Demandez des devis en ligne auprès de plusieurs prestataires en
                                    quelques clics. Comparez les prix et les services pour faire le choix qui vous
                                    convient le mieux.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section section bg-gray p-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="image-content">
                            <div class="section-title text-center">
                                {{-- <h3>
                                    Satisfaction
                                    <span>Garantie</span>
                                </h3> --}}
                                <p>
                                    La Plateforme de Prestation de Service de Construction représente un outil
                                    incontournable <br> pour tous ceux qui souhaitent réaliser des projets de
                                    construction ou
                                    de rénovation. <br>En mettant en relation des clients et des prestataires de manière
                                    efficace et transparente, <br>nous contribuons à transformer le secteur de la
                                    construction en rendant les services plus accessibles et fiables.
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <i class="fa fa-dollar text-primary fa-3x"></i>
                                            </figure>
                                        </div>
                                        <h6>Transparence des Coûts</h6>
                                        <p>
                                            Les devis sont clairs et sans surprises, aidant les clients à mieux gérer
                                            leur budget de construction ou de rénovation.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <i class="fa fa-check-square text-primary fa-3x"></i>
                                            </figure>
                                        </div>
                                        <h6>Réputation et Fiabilité</h6>
                                        <p>
                                            Chaque prestataire sur notre plateforme est
                                            soigneusement sélectionné et vérifié pour garantir des compétences et un
                                            service de qualité. Les évaluations des utilisateurs vous aident à faire un
                                            choix éclairé.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <i class="fa fa-list-alt text-primary fa-3x"></i>
                                            </figure>
                                        </div>
                                        <h6>Système de Devis</h6>
                                        <p>
                                            Obtenez plusieurs devis détaillés en quelques clics, facilitant ainsi la
                                            comparaison des prix et des services offerts.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="item">
                                        <div class="icon-box">
                                            <figure>
                                                <i class="fa fa-user-md text-primary fa-3x"></i>
                                            </figure>
                                        </div>
                                        <h6>Service Client Dévoué</h6>
                                        <p>
                                            Notre équipe de support client est disponible pour vous aider à chaque
                                            étape, de la recherche initiale à la finalisation de votre projet.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="team-section section" id="service">
            <div class="container">
                <div class="section-title text-center">
                    <h3>
                        Nos
                        <span>Services</span>
                    </h3>
                </div>
                <div class="row">
                    <div id="resdata"></div>
                    <div id="defdata">
                        @foreach ($service as $el)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="team-member">
                                    <img src="{{ asset('storage/' . $el->image) }}" alt="doctor"
                                        class="img-responsive" width="100%" style="height:200px !important" />
                                    <div class="contents">
                                        <div class="text-center" style="height: 300px; overflow: auto;">
                                            <h4 service{{ $el->id }}>
                                                {{ $el->service }}
                                            </h4>
                                            <p>
                                                {{ $el->description }}
                                            </p>
                                        </div>
                                        <div class="">
                                            <div class="align-items-center"
                                                style="display: flex; vertical-align: middle;">
                                                <div class="">
                                                    <img src="{{ asset('storage/' . $el->business->logo) }}"
                                                        alt="img"
                                                        style="height: 60px; width: 60px; object-fit: contain;"
                                                        class="mb-3 rounded-circle">
                                                </div>
                                                <div class="">
                                                    <b business{{ $el->id }}>
                                                        {{ $el->business->businessname }}
                                                    </b>
                                                    <br>
                                                    <b>
                                                        {{ $el->business->category->category }}
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 text-center">
                                            <a href="#" class="btn btn-main myservice"
                                                service="{{ $el->id }}">
                                                <i class="fa fa-list-alt"></i> Demander un devis
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-12">
                        <h3 class="text-dark" style="margin-bottom: 20px">Vous avez besoin d'une recommandation ?
                            faites-nous savoir vos besoins et
                            nous vous
                            recommanderons une entreprise sur mesure. </h3>
                        <a href="#" class="btn btn-primary myservice">
                            <i class="fa fa-check-circle"></i> Soumettre ma demande
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-section bg-gray section p-0">
            <div class="container">
                <div class="section-title text-center">
                    <h3>
                        Nos
                        <span>Fournisseurs</span>
                    </h3>
                    <p>
                        Que vous ayez besoin d'un architecte, d'un entrepreneur général, d'un électricien ou d'un
                        plombier,<br> nous couvrons tous les aspects de la construction. Notre plateforme est un guichet
                        unique pour tous vos besoins.
                    </p>
                </div>
                <div class="row items-container clearfix">
                    @foreach ($business as $el)
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img src="{{ asset('storage/' . $el->logo) }}" alt="images"
                                            class="img-responsive" width="100%" style="height:200px !important" />
                                    </a>
                                </div>
                                <div class="image-content text-center" style="height: 300px; overflow: auto;">
                                    <span>{{ $el->category->category }}</span>
                                    <a href="service.html">
                                        <h6>{{ $el->businessname }}</h6>
                                    </a>
                                    <p>
                                        {{ $el->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="appoinment-section section pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" id="contact">
                        <div class="contact-area">
                            <div class="section-title text-center">
                                <h3>
                                    Nous contacter
                                </h3>
                            </div>
                            <form action="#" id="fcont" class="default-form contact-form">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" name="nom" placeholder="Votre nom"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Tel." required="" class="phone"
                                                id="phone" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" maxlength="100" name="sujet" placeholder="Sujet"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <textarea name="message" maxlength="300" placeholder="Message" required=""></textarea>
                                        </div>
                                        <div class="py-3 w-100">
                                            <div id="rep"></div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn-style-one">
                                                <span></span> Envoyer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-footer-web />
    </div>

    <div id="mdl1" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Demande du service</h4>
                </div>
                <form action="#" id="fserv">
                    <div class="modal-body">
                        <input type="hidden" name="service_id">
                        <div class="jumbotron" style="padding: 10px" id="servicediv"></div>
                        <div class="form-group">
                            <label>
                                Avez-vous un budget prévu ou estimatif pour ce service
                                ?
                            </label>
                            <select id="sbudget" name="yes">
                                <option>NON</option>
                                <option>OUI</option>
                            </select>
                        </div>
                        <div class="form-group" id="budgetdiv" style="display: none">
                            <label for="">Quel est votre budget (USD)</label>
                            <input type="number" class="form-control" min="0" name="budget">
                        </div>
                        <div class="form-group">
                            <label>
                                Veuillez décrire votre besoin en détail.
                            </label>
                            <textarea class="form-control" rows="10" name="description" required maxlength="10000"
                                placeholder="Description du service"></textarea>
                        </div>
                        <div class="form-group">
                            <div id="rep"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><span></span> Valider</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="mdl0" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="h4">Veuillez vous connecter avant de soumettre une demande.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light btn-sm" data-dismiss="modal" type="button">
                        <i class="fa fa-times-circle"></i> Annuler
                    </button>
                    <a href="#" url class="btn btn-primary btn-sm" type="submit">
                        <span class="fa fa-user"></span>
                        Je me connecte
                    </a>
                </div>
            </div>

        </div>
    </div>


    <x-js-file-web />
    <script src="{{ asset('assets/phone/intlTelInput.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/phone/intlTelInput.css') }}">
    <style>
        .iti--separate-dial-code {
            width: 100% !important
        }
    </style>
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
    <script>
        $('.phone').mask('0000000000000000');
        var input = document.querySelector("#phone");
        var iti = intlTelInput(input, {
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "CD";
                    callback(countryCode);
                });
            },
            preferredCountries: ["cd"],
            initialCountry: "auto",
            separateDialCode: true,
        });

        $('#fcont').submit(function() {
            event.preventDefault();
            var form = $(this);
            var rep = $('#rep', form);
            rep.html('');

            var dial = $('.iti__selected-dial-code', form).html() + '';
            if (!dial) {
                alert("Veuillez sélectionner l'indicatif du pays a cote du champs téléphone.");
                return false;
            }
            var tl = $("#phone").val() + '';
            var tel = dial + tl + '';

            var btn = $(':submit', form);
            btn.attr('disabled', true);
            btn.find('span').removeClass().addClass('fa fa-spin fa-spinner');
            var d = form.serialize() + '&telephone=' + tel;

            $.ajax({
                type: 'post',
                url: '{{ route('contact') }}',
                data: d,
                success: function(r) {
                    if (r.success) {
                        rep.removeClass().addClass('text-success');
                        form[0].reset();
                        setTimeout(() => {
                            rep.html('');
                        }, 5000);
                    } else {
                        btn.attr('disabled', false);
                        rep.removeClass().addClass('text-danger');
                    }
                    rep.html(r.message);
                },
                error: function(r) {
                    alert("une erreur s'est produite");
                }
            }).always(function() {
                btn.find('span').removeClass();
                btn.attr('disabled', false);
            });
        });

        $('#search').on('keyup change focus', function() {
            var v = this.value.trim();
            if (!v) {
                this.value = '';
                $('#resdata').fadeOut();
                $('#defdata').fadeIn();
                return;
            }

            $('[ldr]').fadeIn();
            $('[nodata]').fadeOut();
            $.ajax({
                type: 'post',
                url: '{{ route('search') }}',
                data: {
                    q: v
                },
                success: function(r) {

                    if (r.length) {
                        var str = '';
                        $(r).each(function(i, e) {
                            str += `
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="team-member">
                                        <img src="{{ asset('storage') }}/${e.image}" alt="doctor"
                                            class="img-responsive" style="object-fit: contain; height: 400px;" />
                                        <div class="contents text-center">
                                            <h4>${e.name}</h4>
                                            <p>
                                                <b>Grade : ${ e?.niveauetude }</b> <br>
                                                <b>Structure : ${ e?.structure } </b> <br>
                                                <b>Numéro d'ordre : ${ e?.numeroordre ?? '-' }</b> <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            `;
                        })
                        $('#defdata').fadeOut();
                        $('#resdata').html(str).fadeIn();
                        $('[nodata]').fadeOut();
                    } else {
                        $('#resdata').fadeOut();
                        $('#defdata').fadeIn();
                        $('[nodata]').fadeIn();
                        setTimeout(() => {
                            $('[nodata]').fadeOut();
                        }, 3000);
                    }
                },

            }).always(function() {
                $('[ldr]').fadeOut();
            });

        });

        function showmdl(service) {
            var ok = Number('{{ null !== auth()->user() ? 1 : 0 }}');
            if (!ok) {
                var url = '{{ route('login', ['r' => route('home', ['subscribe' => ''])]) }}' + (service ?? '');
                $('a[url]').attr('href', url);
                $('#mdl0').modal('show');
                return;
            }
            if (service) {
                var sn = $(`[service${service}]`).text().trim();
                var bn = $(`[business${service}]`).text().trim();
                $('#servicediv').html(`<h3 class='m-0'>Service : ${sn}</h3><h3>Entreprise : ${bn}</h3>`);
            } else {
                $('#servicediv').html('');
                $('#servicediv').html();
            }
            $('[name="service_id"]').val(service);
            $('#mdl1').modal('show');
        }

        $('.myservice').click(function() {
            event.preventDefault();
            var service = $(this).attr('service');
            showmdl(service);
        });
        var scroll = Number('{{ request()->has('subscribe') ? 1 : 0 }}');
        var sid = Number('{{ request('subscribe') }}');
        if (scroll) {
            $("html, body").animate({
                    scrollTop: $('#service').offset().top
                },
                1200
            );
            showmdl(sid);
        }

        var sbudget = $('#sbudget');
        sbudget.change(function() {
            tog();
        })

        function tog() {
            var yes = sbudget.val();
            if ('OUI' == yes) {
                $('#budgetdiv').slideDown();
            } else {
                $('#budgetdiv').slideUp();
            }
        }
        tog();

        $('#fserv').submit(function() {
            event.preventDefault();
            var form = $(this);
            var rep = $('#rep', form);
            rep.html('');

            var btn = $(':submit', form);
            btn.attr('disabled', true);
            btn.find('span').removeClass().addClass('fa fa-spin fa-spinner');
            var d = form.serialize();

            $.ajax({
                type: 'post',
                data: d,
                url: '{{ route('demandeservice') }}',
                success: function(r) {
                    if (r.success) {
                        btn.attr('disabled', false);
                        rep.removeClass().addClass('text-success');
                        form.get(0).reset();
                        window.history.pushState({}, null, '{{ route('home') }}');
                        setTimeout(() => {
                            $('.modal').modal('hide');
                        }, 5000);
                    } else {
                        btn.attr('disabled', false);
                        rep.removeClass().addClass('text-danger');
                    }
                    btn.find('span').removeClass();
                    rep.html(r.message);
                },
                error: function(r) {
                    btn.attr('disabled', false);
                    btn.find('span').removeClass();
                    alert("une erreur s'est produite");
                }
            });
        });
    </script>

</body>

</html>
