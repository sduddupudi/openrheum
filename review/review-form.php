<?php
include '../db_connection.php';
session_start();

if (empty($_SESSION["userID"])) {
   echo "<script>window.location = '" . $siteURL . "';</script>";
}

if (isset($_POST['Finalsubmit'])) {
   $user_id = $_SESSION['userID'];
   $email = $_SESSION['userName'];
   $quality_program = $_POST['quality_program'];
   $schedule_day = $_POST['schedule_day'];
   $diversity_activities = $_POST['diversity_activities'];
   $experience_rate = $_POST['experience_rate'];
   $ease_platform = $_POST['ease_platform'];
   $audio_qualitys = $_POST['audio_qualitys'];
   $p_readability = $_POST['p_readability'];
   $content_quality = $_POST['content_quality'];
   $session_name1 = $_POST['session_name1'];
   $reason1 = $_POST['reason1'];
   $session_name2 = $_POST['session_name2'];
   $reason2 = $_POST['reason2'];
   $session_name3 = $_POST['session_name3'];
   $reason3 = $_POST['reason3'];
   $recommendation = $_POST['recommendation'];
   $educational = $_POST['educational'];
   $general_comments = $_POST['general_comments'];
   $learning = $_POST['learning'];
   $createAT = date("Y-m-d h:m:i");

   $sql ="INSERT INTO client_review(quality_program,user_id,email,schedule_day,diversity_activities,experience_rate,ease_platform,audio_qualitys,p_readability,content_quality,session_name1,reason1,session_name2,reason2,session_name3,reason3,recommendation,educational,learning,general_comments,createAT)
   VALUES ('".$quality_program."','".$user_id."','".$email."','".$schedule_day."','".$diversity_activities."','".$experience_rate."','".$ease_platform."','".$audio_qualitys."','".$p_readability."','".$content_quality."','".$session_name1."','".$reason1."','".$session_name2."','".$reason2."','".$session_name3."','".$reason3."','".$recommendation."','".$educational."','".$learning."','".$general_comments."','".$createAT."')"; 

    if ($conn->query($sql) === TRUE) {
          $msg = "Review successfully submitted!";
    } else {
          $error = "Error: Failed!";
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

 <head>
      <meta charset="utf-8">
      <meta name="keywords" content="login">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Grayrids">
      <title>Review</title>
      <link rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <style type="text/css">
       .Newbtn {
            padding: 10px 30px;
            border: none;
            font-size: 16px;
            background: #012060;
            color: #fff;
            margin: 10px auto;
            display: block;
       }
   </style>
<body>
    <div class="review-section">
        <form method="POST" id="addform" name="addform">
            <div class="container">
             <?php if (!empty($msg)) { ?>
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> <?php echo $msg; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }else if (!empty($error)) { ?>

            <div class="alert alert-error" role="alert">
                <strong>Error!</strong> <?php echo $error; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php } ?>

                <h3>Virtual Open Rheum 2021 – Inspiring Change</h3>
                <h3>Evaluation Form </br>
                    Overall Program Evaluation – Day 1
                </h3>
                <h3>Overall Satisfaction for Day 1</h3>
             
                <table>
                    <tr>
                        <th>General appreciation</th>
                        <th>0</br>Very Poor</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</br>Fair</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</br>Good</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</br>Excellent</th>
                    </tr>
                    <tr>
                        <td>Quality of the program</td>
                        <td> <input type="radio" id="" name="quality_program" value="0" required=""></td>
                        <td> <input type="radio" id="" name="quality_program" value="1"></td>
                        <td> <input type="radio" id="" name="quality_program" value="2"></td>
                        <td> <input type="radio" id="" name="quality_program" value="3"></td>
                        <td> <input type="radio" id="" name="quality_program" value="4"></td>
                        <td> <input type="radio" id="" name="quality_program" value="5"></td>
                        <td> <input type="radio" id="" name="quality_program" value="6"></td>
                        <td> <input type="radio" id="" name="quality_program" value="7"></td>
                        <td> <input type="radio" id="" name="quality_program" value="8"></td>
                        <td> <input type="radio" id="" name="quality_program" value="9"></td>
                        <td> <input type="radio" id="" name="quality_program" value="10"></td>
                    </tr>
                    <tr>
                        <td>Schedule of the day</td>
                        <td> <input type="radio" id="" name="schedule_day" value="0" required=""></td>
                        <td> <input type="radio" id="" name="schedule_day" value="1"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="2"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="3"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="4"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="5"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="6"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="7"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="8"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="9"></td>
                        <td> <input type="radio" id="" name="schedule_day" value="10"></td>
                    </tr>
                    <tr>
                        <td>Diversity of interactive activities</td>
                        <td> <input type="radio" id="" name="diversity_activities" value="0" required=""></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="1"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="2"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="3"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="4"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="5"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="6"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="7"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="8"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="9"></td>
                        <td> <input type="radio" id="" name="diversity_activities" value="10"></td>
                    </tr>
                </table>
               
                <table class="mt-2">
                    <tr>
                        <th>Virtual experience</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Rate your overall virtual</br>experience</td>
                        <td> <input type="radio" id="" name="experience_rate" value="0" required=""></td>
                        <td> <input type="radio" id="" name="experience_rate" value="1"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="2"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="3"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="4"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="5"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="6"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="7"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="8"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="9"></td>
                        <td> <input type="radio" id="" name="experience_rate" value="10"></td>
                    </tr>
                    <tr>
                        <td>Ease of use of the platform</td>
                        <td> <input type="radio" id="" name="ease_platform" value="0" required=""></td>
                        <td> <input type="radio" id="" name="ease_platform" value="1"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="2"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="3"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="4"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="5"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="6"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="7"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="8"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="9"></td>
                        <td> <input type="radio" id="" name="ease_platform" value="10"></td>
                    </tr>
                    <tr>
                        <td>Audio Qualitys</td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="0" required=""></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="1"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="2"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="3"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="4"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="5"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="6"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="7"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="8"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="9"></td>
                        <td> <input type="radio" id="" name="audio_qualitys" value="10"></td>
                    </tr>
                    <tr>
                        <td>Presentation’s readability </td>
                        <td> <input type="radio" id="" name="p_readability" value="0" required=""></td>
                        <td> <input type="radio" id="" name="p_readability" value="1"></td>
                        <td> <input type="radio" id="" name="p_readability" value="2"></td>
                        <td> <input type="radio" id="" name="p_readability" value="3"></td>
                        <td> <input type="radio" id="" name="p_readability" value="4"></td>
                        <td> <input type="radio" id="" name="p_readability" value="5"></td>
                        <td> <input type="radio" id="" name="p_readability" value="6"></td>
                        <td> <input type="radio" id="" name="p_readability" value="7"></td>
                        <td> <input type="radio" id="" name="p_readability" value="8"></td>
                        <td> <input type="radio" id="" name="p_readability" value="9"></td>
                        <td> <input type="radio" id="" name="p_readability" value="10"></td>
                    </tr>
                    <tr>
                        <td>Content Quality</td>
                        <td> <input type="radio" id="" name="content_quality" value="0" required=""></td>
                        <td> <input type="radio" id="" name="content_quality" value="1"></td>
                        <td> <input type="radio" id="" name="content_quality" value="2"></td>
                        <td> <input type="radio" id="" name="content_quality" value="3"></td>
                        <td> <input type="radio" id="" name="content_quality" value="4"></td>
                        <td> <input type="radio" id="" name="content_quality" value="5"></td>
                        <td> <input type="radio" id="" name="content_quality" value="6"></td>
                        <td> <input type="radio" id="" name="content_quality" value="7"></td>
                        <td> <input type="radio" id="" name="content_quality" value="8"></td>
                        <td> <input type="radio" id="" name="content_quality" value="9"></td>
                        <td> <input type="radio" id="" name="content_quality" value="10"></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <p>My preferred sessions of the day and reason:</p>
                    </div>
                    <div class="col-sm-6 left"><label>1. Session name:</label>
                        <input type="text" name="session_name1">
                    </div>
                    <div class="col-sm-6 right"><label for="fname">Reason: </label>
                        <input type="text" name="reason1">
                    </div>
                    <div class="col-sm-6 left"><label>1. Session name:</label>
                        <input type="text" name="session_name2">
                    </div>
                    <div class="col-sm-6 right"><label for="fname">Reason: </label>
                        <input type="text" name="reason2">
                    </div>
                    <div class="col-sm-6 left"><label>1. Session name:</label>
                        <input type="text" name="session_name3">
                    </div>
                    <div class="col-sm-6 right"><label for="fname">Reason: </label>
                        <input type="text" name="reason3">
                    </div>
                    <div class="col-sm-12">
                        <textarea name="recommendation"
                            placeholder="What specific recommendations do you have to enhance your experience at this program?"></textarea>

                        <textarea name="educational"
                            placeholder="What suggestions would you have for this program of future educational topics?"></textarea>

                        <textarea name="learning"
                            placeholder="What are the key learning points? How may they change your practice?"></textarea>

                        <textarea name="general_comments" placeholder="General Comments:"></textarea>
                        <div class="text-center"> 
                         <button class="Newbtn" type="submit" id="Finalsubmit" name="Finalsubmit" class="btn btn-primary">
                            Submit Survey
                        </button></div>
                        <!-- <input type="submit" value="Submit Survey"> -->
                      

                    </div>

                </div>
            </div>
        </form>
    </div>



    <script type="text/javascript">
    $('#Finalsubmit').click(function() {
        // alert('hello');
        // if($('input[name="quality_program"]:checked').length == 0) {
        //       $('#error').html('Please select Quality of the program');
        //       return false;
        // }
        // else{
        //    $('#error').html('');
        //  }
        // } 
    })
    </script>





</body>

</html>