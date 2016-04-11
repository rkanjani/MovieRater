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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    
  </head>

  <body>
  <div id="header" class="container header">
  	<div class="row-fluid">
      <div class="col-md-6 logo-column">
        <a class="btn go-back" href="movies.php">
              <i class="material-icons md-36">keyboard_backspace</i>
            </a>

            <a class="btn logout-profile" href="Logout.php">
              <i class="material-icons md-36">launch</i>
            </a>

        <h3 class="status"><i>Check your ratings!</i></h3>


  		   <img class="logo" src="../img/star.png" height="55" with="55"></img>
      </div>
      <div class="col-md-6 name-column">
	       <h1 class="name">MovieRater</h1>

      <a id="profile-rated" class="profile" href="profile.php">
       <i class="material-icons md-36">person</i>
      </a>

      <a id="done-rated" class="done" href="#">
        <i class="material-icons md-36">done</i>
      </a>

      </div>
    </div>
  </div>
  <div>
  


  <div class="container normal-bg full-width full-height">

    <!--REPEAT THIS BLOCK OF CODE-->

    <div class="row-fluid no-margins movie-row">
      <div class="col-md-2 inherit-height">
        <span>
          <img class="img-rated" src="../img/juno.jpg" height=295>
        </span>
      </div>
      <div class="col-md-10 inherit-height">
        <h1>Juno (2003)</h1>  
        <h3><b>Director(s):</b> Bob Dylan</h3>
        <h3><b>Starring:</b> Jonah Hill Leonardo DiCaprio</h3>
        <h3><b>Synopsis:</b> Faced with an unplanned pregnancy, an offbeat young woman makes an unusual decision regarding her unborn child.</h3>
        <h3><b>Rating:</b> 2/10</h3>
      </div>
    </div>

    <!--REPEAT BLOCK ENDS HERE -->


  </div>

    




    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/MovieController.js"></script>
    <script type="../js/bootstrap.js"></script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
