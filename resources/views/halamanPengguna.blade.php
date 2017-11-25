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
				@if (Storage::disk('local')->has(auth()->user()->nama . '-' . auth()->user()->id . '.jpg'))
				  	<img src="{{ route('accountImage', ['filename' => auth()->user()->nama . '-' . auth()->user()->id . '.jpg']) }}" class="img-circle" height="90" width="90" alt="Avatar" style="margin-top: 30px;">
				@else
					<img src="{{ asset('img/photo.jpg') }}" class="img-circle" height="90" width="90" alt="avatar" style="margin-top: 30px;">
				@endif
				</div>

				<div class="col-md-6 text-left">
					<div class="row">
						<div class="col-md-12">
							<a style="font-size: 20px;"href="{{ route('profileUser', ['user_id' => auth()->user()->id]) }}">{{ auth()->user()->nama }}</a>
              				<form  method="POST" action="/addPostingan">
              					<input style="height: 60px; margin : 5px 0px 5px 0;" type="text" name="postingan" class="form-control" value="apa yang kamu pikirkan...">
              					</input>
								  <button type="submit" class="btn btn-primary btn-md">Post</button>
							  <input type="hidden" name="_token" value="{{ Session::token() }}">
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
					</div>
      			</div>

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
			  					<a  href="{{ route('profileUser', ['user_id' => $post->user_id]) }}">{{ $post->user->nama }}</a>
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