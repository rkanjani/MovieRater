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

            <h3 class="status"><i>Here ya go!</i></h3>
           <img class="logo" src="../img/star.png" height="55" with="55"></img>
        </div>
        <div class="col-md-6 name-column">
           <h1 class="name">MovieRater</h1>    

        </div>
      </div>
    </div>
  <div>

<?php
    //runs the recommend query and gets a value for each genre watched
    while($the_query_row=pg_fetch_row($the_query_res)):

  //selects the tags from the above query
    $tag_query="SELECT name, tag_id FROM movie_rater.tag WHERE tag_id = '$the_query_row[0]'
  ORDER BY name ASC;";
    $tag_res=pg_query($dbconn,$tag_query);
    if(!$tag_res){
      die("Error in SQL query: " .pg_last_error());
    }

      //gets all the tags to populate rows
      $tag_row=pg_fetch_row($tag_res);

    //calculate how many movies the system should recommend
      $movie_tag = $the_query_row[0];
      $average = $the_query_row[1];
      $numOfRatings = $the_query_row[2];

      $numOfMovies = $average+$numOfRatings;

      echo "For Genre #".$movie_tag." grab ".(int)$numOfMovies;

      // selects movies from the above tag and the ones that are the movst rated
      $movie_query = "SELECT m.title, m.date_released, m.movie_id, w.rating FROM movie_rater.movie m,
     movie_rater.tag t, movie_rater.movie_tags mt, movie_rater.watches w WHERE t.tag_id = '$tag_row[1]'
      AND t.tag_id = mt.tag_id AND mt.movie_id =  m.movie_id AND m.movie_id = w.movie_id ORDER BY w.rating DESC;";
      $movie_res=pg_query($dbconn,$movie_query);
    if(!$movie_res){
      die("Error in SQL query: " .pg_last_error());
    }
      ?>

    	<div class="row-fluid">
          <h2><u><?php echo $tag_row[0] ?></u></h2>
      </div>


      <div class="movie-listing row-fluid">
  
            
            <?php while($numOfMovies>0):
                $numOfMovies--;
                $movie_row=pg_fetch_row($movie_res);
            ?>
          <div class="movie-holder">

                <a href="#">
                  <span class="movie">
                    <img class="completed" src="<?php echo "../img/".$movie_row[0].".jpg"?>" width=148>
                    <img src="" height=220>
                    <h4 class="movie-title"><?php echo $movie_row[0] ?></h4>
                  </span>
                </a>
              <div id="" class="overlay">
                  <div class="popup">
                      <h2><?php echo $movie_row[0] ?></h2>

                      <?php
                      //selects required information for directors
                        $director_query="SELECT first_name, last_name FROM movie_rater.director d, 
                          movie_rater.directs ds, movie_rater.movie m WHERE d.director_id=ds.director_id
                          AND m.movie_id='$movie_row[2]'AND ds.movie_id=m.movie_id;";
                           $res2=pg_query($dbconn,$director_query);
                          if(!$res2){
                            die("Error in SQL query: " .pg_last_error());
                          }
                      ?>

                      <a class="close" href="#">&times;</a>
                      <div class="content">
                          <img class="completed" src="" width=148>
                          <img src="" height=250 style="float:left;"></img>
                          <div class="movie-info">

                              <p class="directors">
                                <b>Director(s):</b>
                                  
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
           <?php endwhile ?>

      </div>



    </div>
  </div>
<!--ENd here-->

<?php endwhile ?> 

  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="../js/bootstrap.js"></script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
