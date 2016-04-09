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
<?php
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";
    $dbconn=pg_connect($conn_string) or die('Connection failed');

    $query="SELECT date_released, title, movie_id FROM movie_rater.movie;";
     $res=pg_query($dbconn,$query);
    if(!$res){
      die("Error in SQL query: " .pg_last_error());
    }
    ?>
  <body>
  <div id="header" class="container header">
  	<div class="row-fluid">
      <div class="col-md-6 logo-column">
        <a class="btn btn-default logout" href="Logout.php">
          <span class="glyphicon glyphicon-log-out"></span>
        </a>

        <h3 class="status"><i>Start Rating!</i></h3>


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

<?php while ($row = pg_fetch_row($res)): 
      $movie_id = $row[2]?>
      <div class="movie-holder">
        <span class="movie">

        <a href="<?= "#"."popup".$movie_id ?>">
          <img src="<?php echo "../img/".$row[1].".jpg"?>" height=220>
          <h4 class="movie-title"><?php $pieces=explode("-", $row[0]); echo $row[1]." (".$pieces[0].")" ?> </h4>
        </a>

        </span>
        <div id="<?= "popup".$movie_id ?>" class="overlay">
        <div class="popup">
        <h2><?php $pieces=explode("-", $row[0]); echo $row[1]." (".$pieces[0].")" ?> </h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
          <img src="<?php echo "../img/".$row[1].".jpg"?>" height=250 style="float:left;"></img>
          <div class="movie-info">
            <p class="directors">
              <b>Director(s):</b> Tim Miller
            </p>
            <p class="actors">
              <b>Starring: </b> Ryan Reynolds, Morena Baccarin, T.J. Miller
            </p>
            <p class="studio">
              <b>Produced by: </b>Twentieth Century Fox Film Corporation
            </p>
            <p class="movie-description">
              <b>Synopsis: </b>A former Special Forces operative turned mercenary is subjected to a rogue experiment that leaves him with accelerated healing powers, adopting the alter ego Deadpool.
            </p>
          </div>
        </div>
      </div>
    </div>
      </div>
    <?php endwhile ?>








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