<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.panel-header img {
			margin : 10px;
		}

	</style>
	
</head>
<body>
	<div class="header">
    @include('header')
    </div>

		<div class="container-fluid" >  
    	<!-- awal postingan -->

		<div class="row">
		  	<div class="col-md-8 col-md-offset-2">
		  		<div class="panel panel-default" >

		  		<!-- postingan 1 -->
		  			<div class="panel-header">
					  		@if (Storage::disk('local')->has($post->user->nama . '-' . $post->user->id . '.jpg'))
		  					<img src="{{ route('accountImage', ['filename' => $post->user->nama . '-' . $post->user->id . '.jpg']) }}" class="img-circle" height="30" width="30" style="margin : 10px;">
							@else
							<img src="{{ asset('img/photo.jpg') }}" class="img-circle" height="30" width="30" style="margin : 10px;">
							@endif
		  					<a  href="{{ route('profileUser', ['user_id' => $post->user->id]) }}">{{ $post->user->nama }}</a>
		  					<small style="font-size: 10px;">{{ $post->created_at }}</small>
		  			</div>
		  			<div class="panel-body">
		  				<p>{{ $post->postingan }}</p>
		  			</div>

		  			<div class="panel-body">
		  				<div class="col-md-2">
		  					<button class="btn btn-warning">{{ $post->status }}</button>
		  				</div>
		  				<div class="col-md-10 text-right" >
		  					<label style="margin-right: 15px; ">{{$agree->selectAgree($post->id)->count()}}</label>
		  					@if($agree->checkAgree($post->id)->exists())
							<a href="{{ route('deleteAgree', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Disagree</a>
							@else
			  				<a href="{{ route('addAgree', ['post_id' => $post->id]) }}" type="button" class="btn btn-link">Agree</a>
							@endif   
		  				</div>
		  			</div>
		  			<!-- akhir postingan 1 -->

		  			<!-- form komentar -->
		  			<div class="panel-body">
		  				<div class="col-md-12">
		  					<form  method="POST" action="{{ route('addKomentar', ['post_id' => $post->id]) }}">
              					<input style="height: 60px; margin : 5px 0px 5px 0;" type="text" name="komentar" class="form-control" value="Comment..">
              					</input>
                                <button type="submit" class="btn btn-primary btn-md">Comment</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
              				</form>
              				
		  				</div>
		  			</div>
		  			<hr>
		  			<!-- akhir form komentar -->
					@if(Session::has('message'))
                        <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                        {{Session::get('message')}}
                        </div>
                        </div>
                    @endif
                      @foreach($komentars as $komentar)
                        <!-- awal komentar 1 -->
		  			    <div class="panel-header">
			  			<a href="#">
						  	@if (Storage::disk('local')->has($komentar->user->nama . '-' . $komentar->user->id . '.jpg'))
			  				<img src="{{ route('accountImage', ['filename' => $komentar->user->nama . '-' . $komentar->user->id . '.jpg']) }}" class="img-circle" height="30" width="30" style="margin : 10px;">
							@else
							<img src="{{ asset('img/photo.jpg') }}" class="img-circle" height="30" width="30" style="margin : 10px;">
							@endif
			  			</a>
			  			<label>{{ $komentar->user->nama ." : ". $komentar->komentar }}</label>
			  		    </div>
		  			    <div class="panel-body">
		  				<div class="col-md-12" >
                        @if(auth()->user()->id == $komentar->user_id)
		  					<a href="{{ route('showEditKomentar', ['komentar_id' => $komentar->id]) }}" type="button" class="btn btn-link">Edit</a>  
			  				<a onclick="return confirm('Apa anda ingin menghapus komentar ini?')" href="{{ route('deleteKomentar', ['komentar_id' => $komentar->id]) }}" type="button" class="btn btn-link">Delete</a>  
                        @endif
		  				</div>
		  			    </div>
		  			    <hr>

		  			<!-- akhir komentar 1-->
                      @endforeach
		  		</div>
		  	</div>
		  </div>
	</div>
</body>
</html>