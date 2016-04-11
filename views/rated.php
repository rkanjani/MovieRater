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
<?php
  session_start();
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";
    $dbconn=pg_connect($conn_string) or die('Connection failed');
    
    //gets the user that is logged in user_id
    $user=$_SESSION['user'];

    //retrieves watched data and orders by rating and date rated
    $watched_query="SELECT movie_id, date_rated, rating FROM movie_rater.watches WHERE
    user_id=$user ORDER BY rating DESC, date_rated DESC;";
    $watched_res=pg_query($dbconn,$watched_query);
        if(!$watched_res){
          die("Error in SQL query: " .pg_last_error());
        }
    ?>
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

    <!--populates the page with the watched movies-->
    <?php while ($watched_row = pg_fetch_row($watched_res)): 

        //retrieves movie information for watched movie
        $movie_query="SELECT title, date_released FROM movie_rater.movie WHERE movie_id=$watched_row[0];";
        $movie_res=pg_query($dbconn,$movie_query);
          if(!$movie_res){
            die("Error in SQL query: " .pg_last_error());
          }
          $movie_row=pg_fetch_row($movie_res);

          // splits the date where '-' is
          $year=explode("-", $movie_row[1]);

        //retrives director information
        $director_query="SELECT first_name, last_name FROM movie_rater.director d, movie_rater.directs ds
        WHERE ds.movie_id=$watched_row[0] AND ds.director_id = d.director_id;";
        $director_res=pg_query($dbconn,$director_query);
          if(!$director_res){
            die("Error in SQL query: " .pg_last_error());
          }

          //retrieves actor information
        $actor_query="SELECT first_name, last_name FROM movie_rater.actor a, movie_rater.actor_plays ap
        WHERE ap.movie_id=$watched_row[0] AND ap.actor_id = a.actor_id;";
        $actor_res=pg_query($dbconn,$actor_query);
          if(!$actor_res){
            die("Error in SQL query: " .pg_last_error());
          }

          //retrieves topic information
          $topic_query="SELECT description FROM movie_rater.topics t, movie_rater.movie_topics mt
        WHERE mt.movie_id=$watched_row[0] AND mt.topic_id = t.topic_id;";
        $topic_res=pg_query($dbconn,$topic_query);
          if(!$topic_res){
            die("Error in SQL query: " .pg_last_error());
          }

          $topic_row=pg_fetch_row($topic_res);

        ?>



    <div class="row-fluid no-margins movie-row">
      <div class="col-md-2 inherit-height">
        <span>
          <img class="img-rated" src="../img/<?php echo $movie_row[0] ?>.jpg" height=295>
        </span>
      </div>
      <div class="col-md-10 inherit-height">
        <h1><?php echo $movie_row[0]." (". $year[0].")"?></h1>  

        <h3><b>Director(s):</b> 
          <p><?php while ($director_row = pg_fetch_row($director_res)): ?>
                <?php echo $director_row[0]." ".$director_row[1]; ?></p>
            <?php endwhile ?></h3>

        <h3><b>Starring:</b>
         <?php while ($actor_row = pg_fetch_row($actor_res)): ?>
              <p><?php echo $actor_row[0]." ".$actor_row[1]; ?> </p>
            <?php endwhile ?></h3>

        <h3><b>Synopsis:</b> <?php echo $topic_row[0] ?></h3>
       
        <h3><b>Rating:</b> <?php echo $watched_row[2] ."/10" ?></h3>
      </div>
    </div>

    <?php endwhile ?>


  </div>

    




    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/MovieController.js"></script>
    <script type="../js/bootstrap.js"></script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
