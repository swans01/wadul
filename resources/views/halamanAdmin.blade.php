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
		  			<h2>Halaman Admin</h2>
		  			</div>

		  	</div>
		</div>
		<!-- akhir profil -->


		<!-- postingan -->
			<div class="row">
			  	<div class="col-md-8 col-md-offset-2">
			  		<div class="panel panel-default" >
			  		
                      @foreach($posts as $post)
					  	<!-- postingan 1 -->
			  			<div class="panel-header">
						  		@if (Storage::disk('local')->has($post->user->nama . '-' . $post->user->id . '.jpg'))
			  					<img src="{{ route('accountImage', ['filename' => $post->user->nama . '-' . $post->user->id . '.jpg']) }}" class="img-circle" height="30" width="30" style="margin : 10px;">
								@else
								<img src="{{ asset('img/photo.jpg') }}" class="img-circle" height="30" width="30" style="margin : 10px;">
								@endif
			  					<a  href="{{ route('profileUser', ['user_id' => $post->user_id]) }}">{{ $post->user->nama }}</a>
			  					<label style="font-size: 10px;">{{ $post->created_at }}</label>
			  			</div>
			  			<div class="panel-body">
			  				<p>{{ $post->postingan }}</p>
			  			</div>
			  			<div class="panel-body">
			  				<div class="col-md-2">
							  <form action="{{ route('addStatus', ['post_id' => $post->id]) }}">
							  	@if($post->status == "Belum Dikonfirmasi")
			  					<button onclick="return confirm('Apa anda ingin mengubah status postingan ini?')" class="btn btn-warning"> {{ $post->status }} </button>
								@else
								<button class="btn btn-success">{{ $post->status }}</button>
								@endif
								</form>
			  					
			  				</div>
			  				<div class="col-md-10 text-right" >
							  	<a onclick="return confirm('Apa anda ingin menghapus postingan ini?')" href="{{ route('deletePost', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Delete</a>    
			  					<a href="{{ route('tampilKomentar', ['post_id' => $post->id]) }}" class="btn btn-link">Comment</a>  
			  					
			  				</div>
			  			</div>
			  			<hr>
			  			<!-- akhir postingan 1 -->
					  @endforeach

			  		</div>
			  	</div>
			</div>
		<!-- akhir postngan -->
	</div>
</body>
</html>