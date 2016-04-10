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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  </head>
  <?php
  session_start();
  $conn_string="host=web0.site.uottawa.ca port=15432 dbname=tmeta088 user=tmeta088 password=Pu\$\$yslayer";

    $dbconn=pg_connect($conn_string) or die('Connection failed');
    $user=$_SESSION['user'];
    $query="SELECT first_name, last_name, email, city, province, country, username, password FROM movie_rater.users WHERE user_id=$user;";

     $res=pg_query($dbconn,$query);
    if(!$res){
      die("Error in SQL query: " .pg_last_error());
    }
    $row=pg_fetch_row($res);

    $query2="SELECT date_of_birth, gender, occupation, device_used, age_range FROM movie_rater.profile WHERE user_id=$user;";
    $res2=pg_query($dbconn,$query2);
    if(!$res2){
      die("Error in SQL query: " .pg_last_error());
    }
    $row2=pg_fetch_row($res2);

    if(array_key_exists('save', $_POST)){
      //remember to set default inputs the original shit
    $fullname=$_POST['ifullname'];
    $pieces=explode(" ", $fullname);
    $firstname=$pieces[0];
    $lastname=$pieces[1];
    $username=$_POST['iemail'];
    $password=$_POST['ipassword'];
    $email=$_POST['iemail'];
    $date_of_birth=$_POST['idob'];
    //gender radio button ?????????
    //$gender=$_POST['igender'];
    $city=$_POST['icity'];
    $province=$_POST['iprovince'];
    $country=$_POST['icountry'];
    $occupation=$_POST['ioccupation'];
    $device=$_POST['idevice'];
    $ageRange=$_POST['iageRange'];

    $updateUser_query="UPDATE movie_rater.users SET first_name='$firstname', last_name='$lastname', email='$email',
    username='$username', password='$password', city='$city', province='$province', country='$country'
    WHERE user_id=$user;";
    $result=pg_query($dbconn,$updateUser_query);
    if(!$result){
      die("Error in SQL query: " .pg_last_error());
    }
    header("Location: http://localhost/MovieRater/views/profile.php");
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

            <h3 class="status"><i>Check yourself out!</i></h3>
           <img class="logo" src="../img/star.png" height="55" with="55"></img>
        </div>
        <div class="col-md-6 name-column">
           <h1 class="name">MovieRater</h1>    

        </div>
      </div>
    </div>
    <div id="content" class="container content">
     <div class="row">
      <div class="col-md-5">
        <div class="information">
        <h2 style="padding-left:50px;"><u> Account Information</u></h2>
           <form method="post" action="">
            <input type="submit" name="save" value="Save" class="btn btn-default submit"/>
          <table>
            <tr>
              <td> Name </td>
              <td class="text_center"> 
                <input type="name" class="name-form col-md-12" id="ifullname" name="ifullname"placeholder="<?php echo $row[0]." ".$row[1]; ?>" value="<?php echo $row[0]." ".$row[1]; ?>"> 
              </td>
              </tr>
              <tr>
              <td> Username </td>
              <td class="text_center"> 
                <input type="text" class="name-form col-md-12" id="iusername" name="iusername"placeholder="<?php echo $row[6]; ?>" value="<?php echo $row[6]; ?>"> 
              </td>
              </tr>
              <tr>
              <td> Password </td>
              <td class="text_center"> 
                <input type="text" class="name-form col-md-12" id="ipassword" name="ipassword"placeholder="<?php echo $row[7]; ?>" value="<?php echo $row[7]; ?>"> 
              </td>
              </tr>
              <tr>
                <td> Email </td>
                <td class="text_center">
                  <input type="email" class="name-form col-md-12" id="iemail" name="iemail"placeholder=" <?php echo $row[2]; ?> "value="<?php echo $row[2]; ?>"> 
                </td>
              </tr>
              <tr>
                <td> Date of Birth </td>
                <td class="text_center"> 
                  <input type="date" class="name-form col-md-12" id="idob" name="idob"placeholder=" <?php echo $row2[0]; ?>  " value="<?php echo $row2[0]; ?>"> 
                </td>
              </tr>
              <tr>
                <td> Gender </td>
                <td class="text_center"> <?php echo $row2[1]; ?> </td>
              </tr>
                <tr>
                  <td> City </td>
                  <td class="text_center">
                    <input type="text" class="name-form col-md-12" id="icity" name="icity"placeholder="<?php echo $row[3]; ?> " value="<?php echo $row[3]; ?>"> 
                  </td>
                </tr>
              
                <tr>
                  <td> Province </td>
                  <td class="text_center"> 
                   <input type="text" class="name-form col-md-12" id="iprovince" name="iprovince"placeholder="<?php echo $row[4]; ?> " value="<?php echo $row[4]; ?>"> 
                  </td>
                </tr>
              
                <tr>
                  <td> Country </td>
                  <td class="text_center">
                    <input type="text" class="name-form col-md-12" id="icountry" name="icountry"placeholder="<?php echo $row[5]; ?> " value="<?php echo $row[5]; ?>"> 
                </tr>

                <tr>
              <td> Occupation </td>
              <td class="text_center"> 
                <input type="text" class="name-form col-md-12" id="ioccupation" name="ioccupation"placeholder="<?php echo $row2[2]; ?>" value="<?php echo $row2[2]; ?>"> 
              </td>
              </tr>
                <tr>
              <td> Device Used </td>
              <td class="text_center"> 
                <input type="text" class="name-form col-md-12" id="idevice" name="idevice"placeholder="<?php echo $row2[3]; ?>" value="<?php echo $row2[3]; ?>"> 
              </td>
              </tr>
              <tr>
              <td> Age Range </td>
              <td class="text_center"> 
                <input type="text" class="name-form col-md-12" id="iageRange" name="iageRange"placeholder="<?php echo $row2[4]; ?>" value="<?php echo $row2[4]; ?>"> 
              </td>
              </tr>
              </tr>
          </table>
        </form>
      </div>
    </div>

    <div class="col-md-7">

      <div class="col-xs-2">
        <img src="../img/dead pool.jpg" height=200>
      </div>
          
      <div class="col-xs-2">
        <img src="../img/dead pool.jpg" height=200>
      </div>
          
      <div class="col-xs-2">
        <img src="../img/dead pool.jpg" height=200>
      </div>

      <div class="col-xs-2">
        <img src="../img/dead pool.jpg" height=200>
      </div>

      <div class="col-xs-2">
        <img src="../img/dead pool.jpg" height=200>
      </div>

      <div class="col-xs-2">
        <img src="../img/dead pool.jpg" height=200>
      </div>




    </div>





  </div>
  </body>
</html>