<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wadul</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style type="text/css">
  body {
    background-color: white;
  }
  </style>

</head>
<body>
 @include('header')
 <div class="col-md-4 col-md-offset-4 text-center">
    <img src="{{ asset('img/logo.png') }}" width="250px" height="125px">
    <label>Solusi Kota Pintar</label>
  </div>

<div class="container"> 
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="border : double white 10px;">
      <div class="item active">
        <img src="{{ asset('img/kota.jpg') }}" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="{{ asset('img/kota2.jpeg') }}" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="{{ asset('img/kota3.jpg') }}" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
