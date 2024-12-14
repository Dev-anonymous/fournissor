<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light"
    data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Connexion | {{ config('app.name') }} </title>
    <script>
        localStorage.setItem("loaderEnable", "true");
        localStorage.setItem("ynexHeader", "light");
        localStorage.setItem("ynexMenu", "light");
    </script>
    <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
    <script src="{{ asset('assets/js/authentication-main.js') }}"></script>
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    @php
                        $logo = @getappconfig()->logo;
                        if (!$logo) {
                            $logo = 'ressources/images/logo.png';
                        } else {
                            $logo = asset('storage/' . $logo);
                        }
                    @endphp
                    <a href="{{ route('login') }}">
                        <img src="{{ $logo }}" alt="logo" class="desktop-logo">
                        <img src="{{ $logo }}" alt="logo" class="desktop-dark">
                    </a>
                </div>
                <div class="card custom-card">
                    <div class="card-body p-5" logcard>
                        <p class="h5 fw-semibold mb-2 text-center">Connexion</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">{{ config('app.name') }}</p>
                        <div class="row gy-3">
                            <form action="#" id="flog">
                                <div class="col-xl-12 mb-3">
                                    <label for="signin-username" class="form-label text-default">Email ou Tel.</label>
                                    <input required type="text" name="login" class="form-control"
                                        id="signin-username" placeholder="Email">
                                </div>
                                <div class="col-xl-12">
                                    <label for="signin-password" class="form-label text-default d-block">Mot de passe
                                        {{-- <a href="reset-password-basic.html" class="float-end text-danger">Forget password
                                        ?</a> --}}
                                    </label>
                                    <div class="input-group">
                                        <input required type="password" name="pass" class="form-control "
                                            id="signin-password" placeholder="Mot de passe">
                                        <button class="btn btn-light" type="button"
                                            onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                class="ri-eye-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Rester connecté
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div id="rep"></div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <span></span>
                                        Connexion
                                    </button>
                                </div>
                                <p class="fs-12 text-muted mt-3">Pas de compte ?
                                    <a href="#" singup class="text-primary">Créer un compte</a>
                                </p>
                            </form>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('home') }}" class="btn btn-link font-weight-bold">
                                <i class="bx bx-home-smile">Accueil</i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-5" signcard style="display: none">
                        <p class="h5 fw-semibold mb-2 text-center">Créer un compte</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">{{ config('app.name') }}</p>
                        <div class="row gy-3">
                            <form action="#" id="flcmpt">
                                <input type="hidden" name="role" value="user">
                                <div class="col-xl-12 mb-3">
                                    <label for="signin-username" class="form-label text-default">Nom complet</label>
                                    <input required type="text" name="name" class="form-control "
                                        id="signin-username" placeholder="Nom complet">
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 mb-3">
                                        <label class="form-label text-default">Téléphone</label>
                                        <input required type="text" minlength="9" id="phone"
                                            class="form-control phone" placeholder="Téléphone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 mb-3">
                                        <label for="signin-username" class="form-label text-default">Email</label>
                                        <input required type="email" name="email" class="form-control "
                                            id="signin-username" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label for="signin-password" class="form-label text-default d-block">
                                        Mot de passe
                                    </label>
                                    <div class="input-group mb-3">
                                        <input required type="password" name="password" class="form-control "
                                            id="signin-password" placeholder="Mot de passe">
                                        <button class="btn btn-light" type="button"
                                            onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                class="ri-eye-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div id="rep"></div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <span></span>
                                        Créer mon compte
                                    </button>
                                </div>
                                <p class="fs-12 text-muted mt-3">
                                    <a href="#" singin class="text-primary">Se connecter</a>
                                </p>
                            </form>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('home') }}" class="btn btn-link font-weight-bold">
                                <i class="bx bx-home-smile">Accueil</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jq.min.js') }}"></script>
    <script src="{{ asset('assets/js/show-password.js') }}"></script>

    <script src="{{ asset('assets/phone/intlTelInput.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/phone/intlTelInput.css') }}">
    <style>
        .iti--separate-dial-code {
            width: 100% !important
        }
    </style>
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>

    <script>
        @if (!Auth::check())
            localStorage.setItem('_t', '')
        @endif
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Authorization': 'Bearer ' + localStorage.getItem('_t'),
                'Accept': 'application/json'
            }
        });

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

        $('[singup]').click(function() {
            $('[logcard]').stop().hide();
            $('[signcard]').stop().fadeIn('slow');
        });
        $('[singin]').click(function() {
            $('[signcard]').stop().hide();
            $('[logcard]').stop().fadeIn('slow');
        });
    </script>

    <script>
        $(function() {
            $('#flog').submit(function() {
                event.preventDefault();
                var form = $(this);
                var rep = $('#rep', form);
                rep.html('');

                var btn = $(':submit', form);
                btn.attr('disabled', true);
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var d = form.serialize() + '&r={{ request('r') }}';

                $.ajax({
                    type: 'post',
                    url: '{{ route('auth-login') }}',
                    data: d,
                    success: function(r) {
                        if (r.success) {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-success');
                            localStorage.setItem('_t', r.token);
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        } else {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-danger');
                        }
                        btn.find('span').removeClass();
                        rep.html(r.message);
                    },
                    error: function(r) {
                        btn.attr('disabled', false).find('span').removeClass();
                        alert("une erreur s'est produite");
                    }
                });
            });


            $('#flcmpt').submit(function() {
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
                btn.find('span').removeClass().addClass('bx bx-spin bx-loader');
                var d = new FormData(this);
                d.append('phone', (tel));

                $.ajax({
                    type: 'post',
                    url: '{{ route('auth-new') }}',
                    data: d,
                    contentType: false,
                    processData: false,
                    success: function(r) {
                        if (r.success) {
                            btn.hide();
                            rep.removeClass().addClass('text-success');
                            localStorage.setItem('_t', r.token);
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        } else {
                            btn.attr('disabled', false);
                            rep.removeClass().addClass('text-danger');
                        }
                        btn.find('span').removeClass();
                        rep.html(r.message);
                    },
                    error: function(r) {
                        btn.attr('disabled', false).find('span').removeClass();
                        alert("une erreur s'est produite");
                    }
                });
            });

        })
    </script>

</body>

</html>
