<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieRater</title>
    <link rel="shortcut icon" href="../img/star.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/profile_stylesheet.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
  </head>
  <?php
  session_start();
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";

    $dbconn=pg_connect($conn_string) or die('Connection failed');
    $user=$_SESSION['user'];
    $query="SELECT first_name, last_name, email, city, province, country FROM movie_rater.users WHERE user_id=$user;";

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
        <div class="col-md-6 logo-column">
           <img class="logo" src="../img/star.png" height="55" with="55"></img>
        </div>
        <div class="col-md-6 name-column">
           <h1 class="name">MovieRater</h1>    
        </div>
      </div>
    </div>
    <div id="content" class="container content">
     <div class="row">
      <div class="col-md-5 col-md-offset-4">
        <div class="information">
          <table>
            <tr>
              <td> Name </td>
              <td class="text_center"> <?php echo $row[0]." ".$row[1]; ?> </td>
              </tr>
              <tr>
                <td> Email </td>
                <td class="text_center"> <?php echo $row[2]; ?> </td>
              </tr>
              <tr>
                <td> Date of Birth </td>
                <td class="text_center"> <?php echo $row2[0]; ?> </td>
              </tr>
              <tr>
                <td> Gender </td>
                <td class="text_center"> <?php echo $row2[1]; ?> </td>
                
                <?php if ($row[3]!= null): ?>
                <tr>
                  <td> City </td>
                  <td class="text_center"> <?php echo $row[3]; ?> </td>
                </tr>
              <?php endif; ?>
              
              <?php if ($row[4]!= null): ?>
                <tr>
                  <td> Province </td>
                  <td class="text_center"> <?php echo $row[4]; ?> </td>
                </tr>
              <?php endif; ?>
              
              <?php if ($row[5]!= null): ?>
                <tr>
                  <td> Country </td>
                  <td class="text_center"> <?php echo $row[5]; ?> </td>
                </tr>
              <?php endif; ?>

                
              </tr>
          </table>
      </div>
    </div>
  </div>
  </body>
</html>