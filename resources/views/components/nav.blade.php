<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i> Accueil
                    </a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}"><i class="fa fa-user"></i> Connexion

                        </a>
                    </li>
                @endguest
                <li>
                    <a href="#" id="bservice"><i class="fa fa-list-alt"></i> Services</a>
                </li>
                <li>
                    <a href="#" id="bcont"> <i class="fa fa-support"></i> Contact</a>
                </li>
                @auth
                    @auth
                        @php
                            $user = auth()->user();
                            $img = userimage($user);
                            $href = '';
                            $dah = '';
                            if ($user->user_role == 'admin') {
                                $href = route('admin.profile');
                                $dah = route('admin.home');
                            }
                            if ($user->user_role == 'provider') {
                                $href = route('business.profile');
                                $dah = route('business.service');
                            }
                            if ($user->user_role == 'user') {
                                $href = route('user.profile');
                                $dah = route('user.devis');
                            }
                        @endphp
                    @endauth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"> {{ $user->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ $dah }}" style="color: #000; padding: 10px;">Mon Panel</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ $href }}" style="color: #000; padding: 10px;">Profil</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#" logout style="color: #000; padding: 10px;">Déconnexion</a>
                            </li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
