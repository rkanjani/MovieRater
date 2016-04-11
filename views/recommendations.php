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

      // selects movies from the above tag and the ones that are the movst rated
      $movie_query = "SELECT m.title, m.date_released, m.movie_id, w.rating FROM movie_rater.movie m,
     movie_rater.tag t, movie_rater.movie_tags mt, movie_rater.watches w WHERE t.tag_id = '$tag_row[1]'
      AND t.tag_id = mt.tag_id AND mt.movie_id =  m.movie_id AND NOT m.movie_id = w.movie_id ORDER BY w.rating DESC;";
      $movie_res=pg_query($dbconn,$movie_query);
      if(!$movie_res){
        die("Error in SQL query: " .pg_last_error());
      }
    
      ?>

    	<div class="row-fluid">
          <h2 id="genre-name"><u><?php echo $tag_row[0] ?></u></h2>
      </div>


      <div class="movie-listing-recc row-fluid">
  
            
            <?php while($numOfMovies>0):
                $numOfMovies--;
                $movie_row=pg_fetch_row($movie_res);
                if($movie_row[0]==null){
                  break;
                }


            ?>
          <div class="movie-holder-recc">

                <a href="<?="#"."popup".$movie_row[2] ?>">
                  <span class="movie-recc">
                    <img class="completed" src="<?php echo "../img/".$movie_row[0].".jpg"?>" width=148 height=215>
                    <h4 class="movie-title"><?php $pieces=explode("-", $movie_row[1]); echo $movie_row[0]." (".$pieces[0].")" ?> </h4>
                  </span>
                </a>

                      <?php
                      //selects required information for directors
                        $director_query="SELECT first_name, last_name FROM movie_rater.director d, 
                          movie_rater.directs ds, movie_rater.movie m WHERE d.director_id=ds.director_id
                          AND m.movie_id='$movie_row[2]'AND ds.movie_id=m.movie_id;";
                           $res2=pg_query($dbconn,$director_query);
                          if(!$res2){
                            die("Error in SQL query: " .pg_last_error());
                          }

                          $director_query="SELECT first_name, last_name FROM movie_rater.director d, 
                          movie_rater.directs ds, movie_rater.movie m WHERE d.director_id=ds.director_id
                          AND m.movie_id='$movie_row[2]'AND ds.movie_id=m.movie_id;";
                           $res2=pg_query($dbconn,$director_query);
                          if(!$res2){
                            die("Error in SQL query: " .pg_last_error());
                          }

                          $actor_query="SELECT first_name, last_name FROM movie_rater.actor a,
                          movie_rater.actor_plays ap, movie_rater.movie m WHERE m.movie_id = '$movie_row[2]' AND
                          m.movie_id=ap.movie_id AND ap.actor_id=a.actor_id;";
                          $res3=pg_query($dbconn,$actor_query);
                          if(!$res3){
                            die("Error in SQL query: " .pg_last_error());
                          }

                          $studio_query="SELECT name FROM movie_rater.studio s, movie_rater.sponsors sp,
                          movie_rater.movie m WHERE m.movie_id='$movie_row[2]' AND m.movie_id = sp.movie_id AND
                          sp.studio_id = s.studio_id;";
                          $res4=pg_query($dbconn,$studio_query);
                          if(!$res4){
                            die("Error in SQL query: " .pg_last_error());
                          }

                          $topic_query="SELECT description FROM movie_rater.topics t, movie_rater.movie_topics mt,
                          movie_rater.movie m WHERE m.movie_id='$movie_row[2]' AND m.movie_id = mt.movie_id AND
                          mt.topic_id = t.topic_id;";
                          $res5=pg_query($dbconn,$topic_query);
                          if(!$res5){
                            die("Error in SQL query: " .pg_last_error());
                          }

                          $watched_query="SELECT rating FROM movie_rater.watches WHERE movie_id='$movie_row[2]' AND user_id= '$user'; ";
                          $watchedres=pg_query($dbconn,$watched_query);
                          if(!$watchedres){
                            die("Error in SQL query: " .pg_last_error());
                          }
                          $flag=true;

                          if(pg_num_rows($watchedres)==1){
                            $image = "../img/stamp.png";
                          }
                          else{
                            $image = "../img/transparent.png";
                          }
                      ?>

                      <div id="<?= "popup".$movie_row[2] ?>" class="overlay">
                                <div id="popup-recc" class="popup">
                              <h2><?php $pieces=explode("-", $movie_row[1]); echo $movie_row[0]." (".$pieces[0].")" ?></h2>

                      <a class="close" href="#">&times;</a>
                      <div class="content">
                          <img src="<?php echo "../img/".$movie_row[0].".jpg"?>" height=250 style="float:left;">
                          <div class="movie-info">

                            <p class="directors">
                             <b>Director(s):</b>
                              <?php while ($row2 = pg_fetch_row($res2)): ?>
                                <p class="directors"><?php echo $row2[0]." ".$row2[1]; ?></p>
                              <?php endwhile ?>

                            </p>


                            <p class="actors">
                              <b>Starring: </b>
                              <?php while ($row3 = pg_fetch_row($res3)): ?>
                              <p class="actors"><?php echo $row3[0]." ".$row3[1]; ?> </p>
                            <?php endwhile ?>

                            </p>

                            <p class="studio">
                              <b>Produced by: </b>
                              <?php while ($row4 = pg_fetch_row($res4)): ?>
                              <p class="studio"><?php echo $row4[0]; ?> </p>
                            <?php endwhile ?>
                            </p>

                            <p class="movie-description">
                              <b>Synopsis: </b>
                              <?php while ($row5 = pg_fetch_row($res5)): ?>
                              <p class="movie-description"><?php echo $row5[0]; ?> </p>
                            <?php endwhile ?>
                            </p>
                          </div>

                            <a name="trailer" href="<?php echo $row[3] ?>" target="_blank" value="Trailer" class="btn btn-default trailer">Trailer</a>
                        </div>
              </div>
          </div>
           

      </div>
<?php endwhile ?>


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
