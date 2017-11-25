<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
          <style type="text/css">
                body {
                    background-color: #b7d7e8;
                }

                .row {
                    margin-top: 15px;
                }
          </style>
    </head>

    <body>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- header -->
     <div class="container-fluid" style="background-color:white; margin:0">
            <nav  class="navbar navbar-default navbar-static-top" style="background-color: white; padding-bottom: 35px">
                <a style="font-size: 40px; margin-top:0px" class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo.png') }}" width="120" height="50"> 
                    <p style="font-size: 15px; text-align: center;">Solusi   Kota    Pintar</p>
                </a>    


                <div class="collapse navbar-collapse" id="app-navbar-collapse">               
                    <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li><a style="font-size: 18px;" href="/login">Login</a></li>
                            <li><a style="font-size: 18px;" href="/register">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">{{ Auth::user()->nama }}</a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/halamanUtama">Halaman Utama</a>
                                    </li>
                                    <li>
                                        <a href="/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>
    </div>
    </body>
</html>