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
  <?
  session_start();
  if(array_key_exists('save', $_POST))
  {
    $fullname=$_POST['ifullname'];
    $pieces=explode(" ", $fullname);
    $firstname=$pieces[0];
    $lastname=$pieces[1];
    $username=$_POST['iemail'];
    $date_of_birth=$_POST['idate_of_birth'];
    $email=$_POST['iemail'];
    $password=$_POST['ipassword'];
    $gender=$_POST['igender'];
    $conn_string="host=web0.site.uottawa.ca port=15432 dbname= user= password=";

    $dbconn=pg_connect($conn_string) or die('Connection failed');
    $query="INSERT INTO movie_rater.users(First_name,last_name,
      email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$password');";
    $result=pg_query($dbconn,$query);
    if(!$result){
      die("Error in SQL query: " .pg_last_error());
    }
    $query2="INSERT INTO movie_rater.profile(user_id) SELECT user_id FROM movie_rater.users WHERE first_name = '$firstname';";
    $result2=pg_query($dbconn,$query2);
    if(!$result2){
      die("Error in SQL query: " .pg_last_error());
    }
    $query3="UPDATE movie_rater.profile SET date_of_birth='$date_of_birth', gender='$gender'";
    $result3=pg_query($dbconn,$query3);
    if(!$result3){
      die("Error in SQL query: " .pg_last_error());
    }
    echo "Data Successfully Entered";
      pg_free_result($result);
      pg_free_result($result2);
      pg_free_result($result3);
      pg_close($dbconn);
  }
  if(array_key_exists('login', $_POST))
  {
    $email=$_POST['lemail'];
    $password=$_POST['lpassword'];

    $conn_string="host=web0.site.uottawa.ca port=15432 dbname= user= password=";
    $dbconn=pg_connect($conn_string) or die('Connection failed');

    $query="SELECT password FROM movie_rater.users WHERE email = '$email'";
    $res=pg_query($dbconn,$query);
    if(!$res){
      die("Error in SQL query: " .pg_last_error());
    }

    $row=pg_fetch_row($res);
    if($row[0] == $password){
      $query2="SELECT user_id FROM movie_rater.users WHERE email = '$email'";
      $res2=pg_query($dbconn,$query2);
    if(!$res2){
      die("Error in SQL query: " .pg_last_error());
    }
    $row2=pg_fetch_row($res2);
    echo $row2[0];
    $_SESSION["user"]=$row2[0];
     header("Location: http://localhost/MovieRater/views/movies.php");
    exit;

    }
    else{
      echo "error";
    }

  }

  ?>
  <body>
  <div id="header" class="container header">
  	<div class="row-fluid">
  		<img class="logo" src="../img/star.png" height="55" with="55"></img>
	    <h1 class="name">MovieRater</h1>
    </div>
  </div>
  <div id="register-login" class="container">
  	<div class="row-fluid">
	  	<div id="register" class="col-md-6">
	  	<h2>New?</h2>


      <form method="post" action="">
        <div class="name-form-entry col-md-6">
          <label for="name">Full Name</label>
          <input type="name" class="name-form col-md-12" id="ifullname" name="ifullname"placeholder="Full Name" required>
        </div>

        <div class="input-append date col-md-6" id="dp3" data-date="2012-02-12" data-date-format="yyyy-mm-dd">
        <label for="date_of_birth">Date of birth</label>
        <input class="date-field col-md-12" size="16" type="date" value="YYYY-MM-DD" name="idate_of_birth" id="idate_of_birth" required>
        <span class="add-on"><i class="icon-th"></i></span>
      </div>



        <div class="email-form-entry col-md-6">
          <label for="email">Email Address</label>
          <input type="email" class="name-form col-md-12" name="iemail" id="iemail" placeholder="Email" required>
        </div>



        <div class="password-form col-md-6">
          <label for="password">Password</label>
          <input type="password" class="password-entry col-md-12" name="ipassword" id="ipassword" placeholder="Password" required>
        </div>
        
          <div class="gender-selection">
              <label class="gender">Gender</label>
              <div class="col-md-12">
                  <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default gender-button">
                          <input type="radio" name="igender" value="m" required/> Male
                      </label>
                      <label class="btn btn-default gender-button">
                          <input type="radio" name="igender" value="f" required/> Female
                      </label>
                      <label class="btn btn-default gender-button">
                          <input type="radio" name="igender" value="o" required/> Other
                      </label>
                  </div>
              </div>
          </div>

        <input type="submit" name="save" value="Register" class="btn btn-default submit"/>
      </form>




	  	</div>
	  	<div id="login" class="col-md-6">
		  <h2>Veteran?</h2>

      <form method="post" action="">
        <div class="email-form-entry">
          <label for="email" class="col-md-12">Email Address</label>
          <input type="email" class="login-email col-md-12" name ="lemail" id="login-email" placeholder="Email">
        </div>




          


        <div class="password-form">
          <label for="password" class="col-md-12">Password</label>
          <input type="password" class="login-password col-md-12" name="lpassword" id="login-password" placeholder="Password">
        </div>

        <input type="submit" name="login" value="Login"class="btn btn-default col-md-12 login-button"/>
      </form>


	  	</div>
  	</div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/datepicker.js"></script>
    <script type="../js/bootstrap.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>