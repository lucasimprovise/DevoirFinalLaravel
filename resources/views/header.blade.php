<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">PaLu</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Accueil</a></li>
                <li class="active"><a href="/contact">Nous contacter</a></li>
            </ul>

            <form action="/" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" name="query" class="form-control search-box" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Panier</a></li>
                    @if(Session::has('user')) <!-- Récupère le user-->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}} <!-- Si le user est récupéré, au lieu d'afficher "se connecter/s'inscrire",
                        ce sera "mon profil/se déconnecter qui s'affichera -->
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/logout">Mon profil</a></li>
                            <li><a href="/logout">Se déconnecter</a></li>
                        </ul>
                    </li>

                    @else 

                    <li><a href="/login">Se connecter</a></li>
                    <li><a href="/inscription">S'inscrire</a></li>

                    @endif

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>