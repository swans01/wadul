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
		  		
		  		<div class="col-md-3"></div>

				<div class="col-md-6 text-left">
					<div class="row">
						<div class="col-md-12">
							Edit Postingan
              				<form  method="POST" action="{{ route('editPost', ['post_id' => $post->id]) }}">
              					<input style="height: 100px; margin : 5px 0px 5px 0;" type="text" name="postingan" class="form-control" value="{{ $post->postingan }}">
              					</input>
								  <button onclick="return confirm('Apa anda ingin melakukan edit pada komentar ini?')" type="submit" class="btn btn-primary btn-md">Edit</button>
							  <input type="hidden" name="_token" value="{{ Session::token() }}">
              				</form>
              				
						</div>
					</div>
      			</div>

		  	</div>
		</div>
		<!-- akhir form -->
        </div>
</body>
</html>