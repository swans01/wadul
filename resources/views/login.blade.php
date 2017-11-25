<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    @include('header')
    <div  class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div  class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                        {{Session::get('message')}}
                        </div>
                        </div>
                    @endif
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">

                            <div class="form-group">
                                <label for="username" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="username" class="form-control" name="username" value="{{ Request::old('username') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ Request::old('password') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
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