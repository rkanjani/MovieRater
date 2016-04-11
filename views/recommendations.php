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
    
</script>
  </head>
<?php
  session_start();
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";
    $dbconn=pg_connect($conn_string) or die('Connection failed');
    
    $user=$_SESSION['user'];
    

    //selects all tags in db
    $tag_query="SELECT name, tag_id FROM movie_rater.tag ORDER BY name ASC;";
    $tag_res=pg_query($dbconn,$tag_query);
    if(!$tag_res){
      die("Error in SQL query: " .pg_last_error());
    }

    $the_query="SELECT movie_rater.movie_tags.tag_id, AVG(movie_rater.watches.rating), COUNT(movie_rater.watches.rating) FROM movie_rater.movie
      INNER JOIN movie_rater.movie_tags
      ON movie_rater.movie.movie_id=movie_rater.movie_tags.movie_id
      INNER JOIN movie_rater.watches
      ON movie_rater.movie.movie_id=movie_rater.watches.movie_id AND movie_rater.watches.user_id='$user'
      GROUP BY movie_rater.movie_tags.tag_id
      ORDER BY tag_id;";
    $the_query_res=pg_query($dbconn, $the_query);
    if(!$the_query){
      die("Error in SQL query: " .pg_last_error());
    }

    while($the_query_row=pg_fetch_row($the_query_res)):

      $movie_tag = $the_query_row[0];
      $average = $the_query_row[1];
      $numOfRatings = $the_query_row[2];

      $numOfMovies = $average+$numOfRatings;

      echo "For Genre #".$movie_tag." grab ".(int)$numOfMovies;

      while($numOfMovies>0):?>


    <?php endwhile 
  endwhile ?>

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

            <h3 class="status"><i>Here ya go!</i></h3>
           <img class="logo" src="../img/star.png" height="55" with="55"></img>
        </div>
        <div class="col-md-6 name-column">
           <h1 class="name">MovieRater</h1>    

        </div>
      </div>
    </div>
  <div>
  
    
    	    <div class="row-fluid">
             <h2><u>Recommended Genre #1</u></h2>
    	   </div>


         <div class="movie-listing row-fluid">
            <div class="movie-holder">
                      <a href="#">
                        <span class="movie">
                          <img class="completed" src="" width=148>
                          <img src="" height=220>
                          <h4 class="movie-title">Recommended Movie #1</h4>
                        </span>
                      </a>
                      <div id="<?= "popup".$movie_id ?>" class="overlay">
                      <div class="popup">
                      <h2>Movie Title</h2>

                      <a class="close" href="#">&times;</a>
                      <div class="content">
                      <img class="completed" src="" width=148>
                      <img src="" height=250 style="float:left;"></img>
                      <div class="movie-info">

                      <p class="directors">
                         <b>Director(s):</b>
                     
                            <p class="directors">Director</p>


                        </p>


                        <p class="actors">
                          <b>Starring: </b>
    
                          <p class="actors">Actors</p>


                        </p>

                        <p class="studio">
                          <b>Produced by: </b>
                          <p class="studio">Studio</p>

                        </p>

                        <p class="movie-description">
                          <b>Synopsis: </b>
                          <p class="movie-description">Synopsis</p>
                        </p>
                      </div>
          <a name="trailer" href="https://www.youtube.com/watch?v=Deadpool" target="_blank" value="Trailer" class="btn btn-default trailer">Trailer</a>
        </div>
       
        </div>
      </div>
    </div>


      <!--Ends here-->  
      </div>

    <!--Ends here-->
    </div>


  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="../js/bootstrap.js"></script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
