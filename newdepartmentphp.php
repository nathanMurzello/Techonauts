<html>

  <head>
    <title>New Department</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/construction.css">
  </head>
  
  <body>
    <!--Script to establish a connection with the database and insert user info.-->
    <?php
    $servername = "codd.cs.gsu.edu";
    $username = "batelsek1";
    $password = "batelsek1";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        echo "Operation unsuccessful: Department was not added, please try again.<br>";
        die("Connection failed: " . $conn->connect_error);
    }
    
    //the approved variable holds how many fields have had their input types approved 
    $approved = 0;
    
    //create variables to hold values from the input form
    $name = $_POST['name'];
    $id = $_POST['id'];
    $manager = $_POST['manager'];
    $location = $_POST['location'];
    $form_result = $_POST['form'];
    
    //regex pattern to validate inputs
    $num_pattern = '/\d/';
    
    //all following if statements are validating the fields edited by the user to make sure
    //they contain the correct data types
    if (is_string($name) && !(preg_match($num_pattern, $name)) == 1) {
      $approved++;
    }
    else {
      echo "Error: A department name can only contain letters.<br>";
    }
    
    if (is_numeric($id)) {
      $approved++;
    }
    else {
      echo "\nError: A department ID can only contain numbers.<br>";
    }
    
    if (is_string($id)) {
      $approved++;
    }
    
    //if all fields have been approved, the data will be inserted into the database to create a new department
    if ($approved == 3) {
      $sql = "INSERT INTO techonauts(DeptName, DeptartmentID, Manager, Location)
      VALUES ('$name', '$id', '$manager', '$location')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New department added successfully";
      } else {
        echo "Operation unsuccessful: Department was not added, please try again.";
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    else {
      echo "Operation unsuccessful: Department was not added, please try again.";
    }
    ?>

    <!--Displays the back bar and the copyright bar at the bottom-->
    <div class = banner>
      <a href= "./homepage.html"> Back </a>
    </div>
        
    <div id= copyright>
      The Techonauts: Bonnie Atelsek - Matthew Kabat - Nathan Murzello - Terrence Gaines
    </div>
    
    <?php
      $conn->close();
    ?>
  </body>

</html>