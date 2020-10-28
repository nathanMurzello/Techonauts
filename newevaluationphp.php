<html>

  <head>
    <title>New Evaluation</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/construction.css">
  </head>
  
  <body>
    <?php
	
    $servername = "PANTHERT";
    $username = "batelsek1";
    $password = "batelsek1";
    
    // Create connection
	
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
      echo "Operation unsuccessful: Employee was not added, please try again.<br>";
      die("Connection failed: " . $conn->connect_error);
    }
	
	$weight1 = .30;   ##criteria question 1 (30%)
	$weight2 = .15;   ##criteria question 2 (15%)
	$weight3 = .40;   ##criteria question 3 (40%)
	$weight4 = .10;   ##criteria question 4 (10%)
	$weight5 = .05;   ##criteria question 5 (5%)
    $approved = 0;
    
	$emp_id = $_POST['emp_id'];
    $eval_id = $_POST['eval_id'];
    $value1 = $_POST['value1'];
	$value2 = $_POST['value2'];
	$value3 = $_POST['value3'];
	$value4 = $_POST['value4'];
	$value5 = $_POST['value5'];
	
	
	//calculate the evaluation raw score
    $score = (($value1*$weight1) + ($value2*$weight2) + ($value3*$weight3) + ($value4*$weight4) + ($value5*$weight5));
    //print "<div>Evaluation results are:  $score </div>";
	echo  "$emp_id, Evaluation raw score results are:, $score","%";

    if ($approved == 2) {
      echo "Evaluation successfully added.";
      $sql = "INSERT INTO evaluation(score)
      VALUES (‘$score’)";
      
      if ($conn->query($sql) === TRUE) {
        echo "New evaluation added successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    else {
      echo "Operation unsuccessful: Evaluation was not added, please try again.";
	  echo "Evaluation results are:, $score";
    }

    ?>

    <div class = banner>
      <a href= "./index.php"> Back </a>
    </div>
        
    <div id= copyright>
      The Techonauts: Bonnie Atelsek - Matthew Kabat - Nathan Murzello - Terrence Gaines
    </div>
    
    <?php
      $conn->close();
    ?>
  </body>

</html>