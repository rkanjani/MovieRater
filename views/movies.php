<html ng-app="movieRaterApp" ng-controller="MovieController" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieRater</title>
    <link rel="shortcut icon" href="../img/star.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylesheet.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
  </head>
  <body>
  <div id="header" class="container header">
  	<div class="row-fluid">
      <div class="col-md-6 logo-column">
  		   <img class="logo" src="../img/star.png" height="55" with="55"></img>
      </div>
      <div class="col-md-6 name-column">
	       <h1 class="name">MovieRater</h1>

      <a class="btn btn-default profile" href="profile.php">
        <span class="glyphicon glyphicon-user"></span>
      </a>

      <button class="btn btn-default done">
        <span class="glyphicon glyphicon-ok"></span>
      </button>

      <button class="btn btn-default rated">
        <span class="glyphicon glyphicon-star"></span>
      </button>


      <div class="col-sm-6 col-sm-offset-3">
          <div id="search-container"> 
              <div class="input-group stylish-input-group">
                  <input type="text" class="form-control"  placeholder="Search" >
                  <span class="input-group-addon">
                      <button type="submit">
                          <span class="glyphicon glyphicon-search"></span>
                      </button>  
                  </span>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
  <div>


    <!--Singluar Movie Genre - Needs to be looped -->
    <div id="movie-container" class="container-fluid movie-container">

    
    	<div class="row-fluid">
        <h2><u>Action</u></h2>
    	</div>

      <div class="movie-listing row-fluid">
      <!--Singluar Movie Listing - Need to be looped -->


      <div class="movie-holder">
        <span class="movie">
          <img src="../img/sample.jpg" height=200>
          <h4>Deadpool (2016)</h4>
        </span>

      </div>


      <!--Ends here-->  
      </div>

    <!--Ends here-->
    </div>



  </div>




    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/MovieController.js"></script>
    <script type="../js/bootstrap.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>