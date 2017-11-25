<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="header">
    @include('header')
    </div>

    <div class="container-fluid"> 
    	<!-- form post  -->
	  	<div class="row">
		  	<div class="col-md-8 col-md-offset-2 well">
		  		<div class="col-md-2">
				@if (Storage::disk('local')->has($user->nama . '-' . $user->id . '.jpg'))
				  	<img src="{{ route('accountImage', ['filename' => $user->nama . '-' . $user->id . '.jpg']) }}" class="img-circle" height="90" width="90" alt="Avatar">
				@else
					<img src="{{ asset('img/photo.jpg') }}" class="img-circle" height="90" width="90" alt="Avatar" style="margin-top: 30px;">
				@endif
				</div>

				@if( auth()->user()->id == $user->id )
				<div class="col-md-6">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('editUser') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
			@if(Session::has('message'))
               <div class="row">
			   <div class="col-md-4"></div>
                <div >
	              {{Session::get('message')}}
                 </div>
                </div>
            @endif
        </div>
			@else
			<div class="col-md-6 text-left">
					<div class="row">
						<div class="col-md-12">
							<a style="font-size: 20px;"href="#">{{ $user->nama }}</a>
						</div>
					</div>
      			</div>
			@endif

		  	</div>
		</div>
		<!-- akhir form -->


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
			  					<a  href="#">{{ $post->user->nama }}</a>
			  					<label style="font-size: 10px;">{{ $post->created_at }}</label>
			  			</div>
			  			<div class="panel-body">
			  				<p>{{ $post->postingan }}</p>
			  			</div>
			  			<div class="panel-body">
			  				<div class="col-md-2">
							  	@if($post->status == "Belum Dikonfirmasi")
			  					<button class="btn btn-warning">{{ $post->status }}</button>
								@else
								<button class="btn btn-success">{{ $post->status }}</button>
								@endif
			  				</div>
			  				<div class="col-md-10 text-right" >
			  					<label style="margin-right: 15px; ">{{$agree->selectAgree($post->id)->count()}}</label>
			  					@if($agree->checkAgree($post->id)->exists())
								<a href="{{ route('deleteAgree', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Disagree</a>
								@else
			  					<a href="{{ route('addAgree', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Agree</a>
								@endif  
			  					<a href="{{ route('tampilKomentar', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Comment</a>
								  @if(auth()->user()->id == $post->user_id)  
			  					<a onclick="return confirm('Apa anda ingin menghapus postingan ini?')" href="{{ route('deletePost', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Delete</a>
								<a href="{{ route('showEditPost', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Edit</a>  
								  @endif 
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