<html lang="en">
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
  session_start();
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";

    $dbconn=pg_connect($conn_string) or die('Connection failed');
    $user=$_SESSION['user'];
    $query="SELECT first_name, last_name, email FROM movie_rater.users WHERE user_id=$user;";

     $res=pg_query($dbconn,$query);
    if(!$res){
      die("Error in SQL query: " .pg_last_error());
    }
    $row=pg_fetch_row($res);

    $query2="SELECT date_of_birth, gender FROM movie_rater.profile WHERE user_id=$user;";
    $res2=pg_query($dbconn,$query2);
    if(!$res2){
      die("Error in SQL query: " .pg_last_error());
    }
    $row2=pg_fetch_row($res2);

  ?>
  <body>
    <div id="header" class="container header">
    <div class="row-fluid">
        <img class="logo" src="../img/star.png" height="55" with="55"></img>
        <h1 class="name">MovieRater</h1>
    </div>
  </div>
  <div>
    <p>
        Name
        <?php
        echo $row[0]." ".$row[1];
        ?>
    </p>
    <p>
        email
        <?php
            echo $row[2];
        ?>
    </p>
    <p>
        Date of Birth
        <?php
        echo $row2[0];
        ?>
    </p>
    <p>
        Gender
        <?php
        echo $row2[1];
        ?>
    </p>
  </div>
  </body>
</html>