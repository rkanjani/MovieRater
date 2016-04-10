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
            <!-- populating the required fields with database data-->
              <?php 
              $director_query="SELECT first_name, last_name FROM movie_rater.director d, 
    movie_rater.directs ds, movie_rater.movie m WHERE d.director_id=ds.director_id
    AND m.movie_id='$row[2]'AND ds.movie_id=m.movie_id;";
     $res2=pg_query($dbconn,$director_query);
    if(!$res2){
      die("Error in SQL query: " .pg_last_error());
    }

    $actor_query="SELECT first_name, last_name FROM movie_rater.actor a,
    movie_rater.actor_plays ap, movie_rater.movie m WHERE m.movie_id = '$row[2]' AND
    m.movie_id=ap.movie_id AND ap.actor_id=a.actor_id;";
    $res3=pg_query($dbconn,$actor_query);
    if(!$res3){
      die("Error in SQL query: " .pg_last_error());
    }

    $studio_query="SELECT name FROM movie_rater.studio s, movie_rater.sponsors sp,
    movie_rater.movie m WHERE m.movie_id='$row[2]' AND m.movie_id = sp.movie_id AND
    sp.studio_id = s.studio_id;";
    $res4=pg_query($dbconn,$studio_query);
    if(!$res4){
      die("Error in SQL query: " .pg_last_error());
    }

    $topic_query="SELECT description FROM movie_rater.topics t, movie_rater.movie_topics mt,
    movie_rater.movie m WHERE m.movie_id='$row[2]' AND m.movie_id = mt.movie_id AND
    mt.topic_id = t.topic_id;";
    $res5=pg_query($dbconn,$topic_query);
    if(!$res5){
      die("Error in SQL query: " .pg_last_error());
    }
    ?>
          <p class="directors">
             <b>Director(s):</b>
             <table>
                <tr>
              <?php while ($row2 = pg_fetch_row($res2)): ?>
              <td><p><?php echo $row2[0]." ".$row2[1]; ?></p></td>
            <?php endwhile ?>
          </tr>
          </table>

            </p>


            <p class="actors">
              <b>Starring: </b>
              <table>
                <tr>
              <?php while ($row3 = pg_fetch_row($res3)): ?>
              <td><p><?php echo $row3[0]." ".$row3[1]; ?> </p></td>
            <?php endwhile ?>
            </tr>
          </table>
            </p>

            <p class="studio">
              <b>Produced by: </b>
              <table>
                <tr>
              <?php while ($row4 = pg_fetch_row($res4)): ?>
              <td><p><?php echo $row4[0]; ?> </p></td>
            <?php endwhile ?>
          </tr>
        </table>
            </p>

            <p class="movie-description">
              <b>Synopsis: </b>
              <table>
              <tr>
              <?php while ($row5 = pg_fetch_row($res5)): ?>
              <td><p><?php echo $row5[0]; ?> </p></td>
            <?php endwhile ?>
          </tr>
        </table>
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