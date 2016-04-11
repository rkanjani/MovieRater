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

  //connects to db
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";
    $dbconn=pg_connect($conn_string) or die('Connection failed');
    
    //gets the user_id from user logged in
    $user=$_SESSION['user'];  

    //selects all tags in db
    $tag_query="SELECT name, tag_id FROM movie_rater.tag ORDER BY name ASC;";
    $tag_res=pg_query($dbconn,$tag_query);
    if(!$tag_res){
      die("Error in SQL query: " .pg_last_error());
    }

    //Enters the Rating of the movie watched
    if(array_key_exists('srating', $_POST)){
         $movie_id=$_POST['imovie_id'];
         $rating=$_POST['irating'.$movie_id];
         $date=getdate();
         $date_watched=$date['year']."-".$date['mon']."-".$date['mday'];

        $rating_query="INSERT INTO movie_rater.watches(user_id, movie_id, date_rated, rating)
         VALUES ('$user', '$movie_id', '$date_watched', '$rating')";
        $rating_res=pg_query($dbconn,$rating_query);
        if(!$rating_res){
          die("Error in SQL query: " .pg_last_error());
        }
      }
                    
              
    ?>

  <body>
  <div id="header" class="container header">
  	<div class="row-fluid">
      <div class="col-md-6 logo-column">
        <a class="btn logout" href="Logout.php">
          <i class="material-icons md-36">launch</i>
        </a>


        <h3 class="status"><i>Start Rating!</i></h3>


  		   <img class="logo" src="../img/star.png" height="55" with="55"></img>
      </div>
      <div class="col-md-6 name-column">
	       <h1 class="name">MovieRater</h1>

      <a class="profile" href="profile.php">
       <i class="material-icons md-36">person</i>
      </a>

      <a class="done" href="recommendations.php">
        <i class="material-icons md-36">done</i>
      </a>

      <a class="rated" href="rated.php">
        <i class="material-icons md-36" style="max-width: 36px;">star_rate</i>
      </a>



      <div id="search-block" class="col-md-12">
        <form action='<?php echo $_SERVER['PHP_SELF'];?>' method='get'>

          <div id="search-container"> 
              <div  class="input-group stylish-input-group">
                  <input type="text" class="form-control"  name="isearch" placeholder="Search" >
                  <span class="input-group-addon">
                      <button type="submit" name'search'>
                          <span class="glyphicon glyphicon-search"></span> 
                        </button>
                    </form>
                  </span>          
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
  <div>
  
    <?php 
        // adds the tag rows on main movie page for all tags
        while ($tag_row = pg_fetch_row($tag_res)): ?>
        <div id="movie-container" class="container-fluid movie-container">
            <?php 

              // only selects the tags that have a movie in associated with is
              $checkTag_query="SELECT mt.movie_id FROM movie_rater.movie_tags mt, movie_rater.tag t
                WHERE t.tag_id='$tag_row[1]' AND t.tag_id=mt.tag_id;";
                  $checkTag_res=pg_query($dbconn,$checkTag_query);
                    if(!$checkTag_res){
                      die("Error in SQL query: " .pg_last_error());
                    }

                      //gets the number of rows returned fro the query
                      $checkTag_row = pg_num_rows($checkTag_res);




                // only displays tags with movies associated with it
                if($checkTag_row!=0):

                  
                    // selects all the movies that are associate with the above tag
                    $query="SELECT date_released, title, m.movie_id, youtube FROM movie_rater.movie m, movie_rater.movie_tags mt,
                       movie_rater.tag t WHERE t.tag_id='$tag_row[1]' AND t.tag_id=mt.tag_id AND m.movie_id = mt.movie_id;";
                      $res=pg_query($dbconn,$query);

                    if(!$res){
                      die("Error in SQL query: " .pg_last_error());
                     }

                  //gets called once the user searhes
                   if ($_SERVER["REQUEST_METHOD"] == "GET") { 
                    error_reporting(E_ALL ^ E_NOTICE);  
                     // collect value of input field
                      $name = $_GET['isearch'];      
                        $search_query="SELECT date_released, title, m.movie_id, youtube, t.name FROM movie_rater.movie m, movie_rater.movie_tags mt,
                          movie_rater.tag t  WHERE  t.tag_id='$tag_row[1]' AND t.tag_id=mt.tag_id AND m.movie_id = mt.movie_id AND
                        ( (title LIKE '%" . $name . "%') OR (t.name LIKE '%" . $name . "%'));";
                            $res=pg_query($dbconn,$search_query); 
                              if(!$res){
                                die("Error in SQL query: " .pg_last_error());
                              } 

                    }
            ?>
    	    <div class="row-fluid">
             <h2><u><?php echo $tag_row[0] ?></u></h2>
    	   </div>


         <div class="movie-listing row-fluid">
              <?php
                     while ($row = pg_fetch_row($res)): 
                      $movie_id = $row[2]?>
            <div class="movie-holder">
                      <a href="<?="#"."popup".$movie_id ?>">
                        <span class="movie">

                        <?php

                          $watched_query="SELECT rating FROM movie_rater.watches w WHERE w.movie_id='$movie_id' AND w.user_id= '$user';";
                           $watched_res=pg_query($dbconn,$watched_query);
                          if(!$watched_res){
                            die("Error in SQL query: " .pg_last_error());
                          }
                          if(pg_num_rows($watched_res)==1){
                            $image = "../img/stamp.png";
                          }
                          else{
                            $image = "../img/transparent.png";
                          }
                        ?>

                          <!--<img class="completed-popup" src="<?php// echo $image?>" width=148>-->
                          <img src="<?php echo "../img/".$row[1].".jpg"?>" height=220>
                          <h4 class="movie-title"><?php $pieces=explode("-", $row[0]); echo $row[1]." (".$pieces[0].")" ?> </h4>
                        </span>
                      </a>
                    <div id="<?= "popup".$movie_id ?>" class="overlay">
                  <div class="popup">
                <h2><?php $pieces=explode("-", $row[0]); echo $row[1]." (".$pieces[0].")" ?> </h2>


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

                $watched_query="SELECT rating FROM movie_rater.watches WHERE movie_id='$row[2]' AND user_id= '$user'; ";
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



          <a class="close" href="#">&times;</a>
          <div class="content">
          
          <img src="<?php echo "../img/".$row[1].".jpg"?>" height=250 width=170 style="float:left;">
          <!--<img class="completed" src="<?php //echo $image?>" width=148></img>-->
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

            <form action="" style="<?= (pg_num_rows($watchedres)==1)?"display:none;" : "display:block;"?>" method="post">
                <fieldset class="rating">
                    <input type="radio" id="<?= "star5#".$movie_id?>" name="<?="irating".$movie_id?>" value="10" /><label class = "full" for="<?= "star5#".$movie_id?>" title="Awesome - 5 stars"></label>
                    <input type="radio" id="<?= "star4.5#".$movie_id?>" name="<?="irating".$movie_id?>" value="9" /><label class="half" for="<?= "star4.5#".$movie_id?>" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="<?= "star4#".$movie_id?>" name="<?="irating".$movie_id?>" value="8" /><label class = "full" for="<?= "star4#".$movie_id?>" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="<?= "star3.5#".$movie_id?>" name="<?="irating".$movie_id?>" value="7" /><label class="half" for="<?= "star3.5#".$movie_id?>" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="<?= "star3#".$movie_id?>" name="<?="irating".$movie_id?>" value="6" /><label class = "full" for="<?= "star3#".$movie_id?>" title="Meh - 3 stars"></label>
                    <input type="radio" id="<?= "star2.5#".$movie_id?>" name="<?="irating".$movie_id?>" value="5" /><label class="half" for="<?= "star2.5#".$movie_id?>" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="<?= "star2#".$movie_id?>" name="<?="irating".$movie_id?>" value="4" /><label class = "full" for="<?= "star2#".$movie_id?>" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="<?= "star1.5#".$movie_id?>" name="<?="irating".$movie_id?>" value="3" /><label class="half" for="<?= "star1.5#".$movie_id?>" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="<?= "star1#".$movie_id?>" name="<?="irating".$movie_id?>" value="2" /><label class = "full" for="<?= "star1#".$movie_id?>" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="<?= "star.5#".$movie_id?>" name="<?="irating".$movie_id?>" value="1" /><label class="half" for="<?= "star.5#".$movie_id?>" title="Sucks big time - 0.5 stars"></label>
                </fieldset>




            <input class="movie-id-textfield"type="text" name="imovie_id" value="<?php echo $row[2]; ?>" />
            <!--<input type="text" name="irating"></input>-->
            <input id="rate-button" class="btn btn-default " type="submit" name="srating" value="Rate"/>
          </form>

            <a name="trailer" href="<?php echo $row[3] ?>" target="_blank" value="Trailer" class="btn btn-default trailer">Trailer</a>
        </div>
       
        </div>
      </div>
    </div>


      <!--ends movie loop -->
    <?php endwhile ?>


      <!--Ends here-->  
      </div>

    <!--Ends here-->
    </div>

    <!--ends tag check and loop -->
  <?php endif ?>

  <?php endwhile ?>

  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="../js/bootstrap.js"></script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
