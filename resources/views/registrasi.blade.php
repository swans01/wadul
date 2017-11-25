<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <div class="header">
    @include('header')
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                    @if(count($errors) > 0)
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <li>Harap Periksa Kembali Form Registrasi</li>
                        </ul>
                    </div>
                    @endif
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ Request::old('nama') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ Request::old('username') }}" required>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ Request::old('password') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>