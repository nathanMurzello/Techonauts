<html>

  <head>
    <title>New Employee</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/construction.css">
  </head>
  
  <body>
    <!--Script to establish a connection with the database.-->
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
    
    //the approved variable holds how many fields have had their input types approved 
    $approved = 0;
    
    //create variables to hold values from the input form
    $zip = $_POST['zip_code'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $id = $_POST['id'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $dept = $_POST['department'];
    $form_result = $_POST['form'];
   
    //regex patterns to validate inputs
    $zip_pattern= "/^(\d){5}$/";
    $num_pattern = '/\d/';
    
    //all following if statements are validating the fields edited by the user to make sure
    //they contain the correct data types
    if (is_numeric($zip) && preg_match($zip_pattern, $zip) == 1) {
      $approved++;
    }
    else {
      echo "Error: A zip code can only contain numbers, in the format 12345.<br>";
    }
    
    if (is_string($first) && preg_match($num_pattern, $first) == 0 && is_string($last) && preg_match($num_pattern, $last) == 0) {
      $approved++;
    }
    else {
      echo "Error: A name can only contain letters.<br>";
    }
    
    if (is_string($city) && preg_match($num_pattern, $city) == 0) {
      $approved++;
    }
    else {
      echo "Error: A city can only contain letters.<br>";
    }
    
    if (is_numeric($dept)) {
      $approved++;
    }
    else {
      echo "\nError: A department ID can only contain numbers.<br>";
    }
    
    if (is_numeric($id)) {
      $approved++;
    }
    else {
      echo "Error: An employee ID can only contain numbers.<br>";
    }

    //if all fields have been approved, the data will be inserted into the database to create a new employee
    if ($approved == 5) {
      $sql = "INSERT INTO techonauts(First, Last, Address, City, State, Zip, Deptnum) 
      VALUES ('$first', '$last', '$address', '$city', '$state','$zip', '$dept')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Operation unsuccessful: Employee was not added, please try again.";
      }
    }
    else {
      echo "Operation unsuccessful: Employee was not added, please try again.";
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