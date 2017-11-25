<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="header">
        @include('header')
	    <div class="container-fluid" style="background-color: #034f84">
			<nav class="navbar navbar-inverse" style="background-color: #034f84; border:none; font-size: 15px; margin:0;">
			    <ul class="nav navbar-nav">
			      <li><a href="{{ route('halamanAdmin') }}">Kelola Postingan</a></li>
			      <li><a href="{{ route('tampilUser') }}">Kelola Pengguna</a></li>
			    </ul>
			</nav>
	    </div>
    </div>

    <div class="container-fluid"> 
   
    	<!-- profil -->
	  	<div class="row">
		  	<div class="col-md-8 col-md-offset-2 well">
		  		<div class="panel-header">
		  					<img src="img/image1.jpg" class="img-circle" height="30" width="30" style="margin : 10px;">
		  					<a  href="#">{{ auth()->user()->nama }}</a>
		  			</div>

		  	</div>
		</div>
		<!-- akhir profil -->

		<!-- awal table -->
			<div class="row">
		  	<div class="col-md-8 col-md-offset-2 well ">
				@if(Session::has('message'))
				<div>
        {{Session::get('message')}}
				</div>
        @endif
		  		<h3 style="text-align: center; padding-bottom: 15px; ">Kelola Pengguna</h3> 
					<div class="col-md-6 col-md-offset-3">
		  			  <table class="table table-hover">
					    <thead>
					      <tr>
					        <th>Pengguna</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
                        @foreach($users as $user)
                        @if($user->nama != 'admin')
					      <tr>
					        <td>{{ $user->nama }}</td>
					        <td><a onclick="return confirm('Apa anda ingin menghapus pengguna ini?')" href="{{ route('deleteUser', ['user_id' => $user->id]) }}"> delete</a></td>
					      </tr>
                        @endif
                        @endforeach
					    </tbody>
					  </table>
				</div>

		  	</div>
		</div>

		<!-- akhir table -->
	</div>
</body>
</html>