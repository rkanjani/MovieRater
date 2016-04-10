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
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";
    $dbconn=pg_connect($conn_string) or die('Connection failed');

    $query="SELECT date_released, title, movie_id FROM movie_rater.movie;";
     $res=pg_query($dbconn,$query);
    if(!$res){
      die("Error in SQL query: " .pg_last_error());
    }
    ?>
  <body>
<?php 
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>
  <div id="header" class="container header">
  	<div class="row-fluid">
      <div class="col-md-6 logo-column">
        <button class="btn logout">
          <i class="material-icons md-36">launch</i>
        </button>

        <h3 class="status"><i>Start Rating!</i></h3>


  		   <img class="logo" src="../img/star.png" height="55" with="55"></img>
      </div>
      <div class="col-md-6 name-column">
	       <h1 class="name">MovieRater</h1>

      <a class="profile" href="profile.php">
       <i class="material-icons md-36">person</i>
      </a>

      <a class="done" href="#">
        <i class="material-icons md-36">done</i>
      </a>

      <a class="rated" href="#">
        <i class="material-icons md-36">star_rate</i>
      </a>


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
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                      Name: <input type="text" name="movie">
                      <input type="submit">
                  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['movie'];
    
     $query="SELECT date_released, title, movie_id FROM movie_rater.movie WHERE title LIKE '%" . $name . "%' ";
     $res=pg_query($dbconn,$query);
     while ($row=pg_fetch_array($result)){
      $date_released = $row['date_released'];
      $title = $row['title'];
      $movie_id = $row['movie_id'];
       //-display the result of the array
      echo $date_released;
      echo $title;
      echo $movie_id;
    }
     
}
?>


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
        <a href="<?= "#"."popup".$movie_id ?>">

        <span class="movie">


          <img src="<?php echo "../img/".$row[1].".jpg"?>" height=220>
          <h4 class="movie-title"><?php $pieces=explode("-", $row[0]); echo $row[1]." (".$pieces[0].")" ?> </h4>

        </span>

                </a>
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

            <fieldset class="rating">
              <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
              <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
              <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
              <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
              <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
              <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
              <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
              <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
              <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
              <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
            </fieldset>

            <a name="trailer" href="https://www.youtube.com/watch?v=FyKWUTwSYAs" target="_blank" value="Trailer" class="btn btn-default trailer">Trailer</a>


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
