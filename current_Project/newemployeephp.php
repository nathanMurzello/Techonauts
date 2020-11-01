<html>

  <head>
    <title>New Employee</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/construction.css">
  </head>
  
  <body>
    
    <!--Script to establish a connection with the database.-->
    <?php
    require 'vendor/autoload.php';
    $client = new MongoDB\Client(
      'mongodb+srv://techno:techno123@cluster0.k9zfj.mongodb.net/EmployeeSystem?retryWrites=true&w=majority');
    $collection=$client->selectCollection('EmployeeSystem','Employee');
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
      $num_id=(int)$_POST['id'];
      $num_zip=(int)$_POST['zip_code'];
      $num_dep=(int)$_POST['department'];
      $insert=array(
          '_id'=>$num_id,
          'first_name'=>$_POST['first_name'],
          'last_name'=>$_POST['last_name'],
          'state'=>$_POST['state'],
          'zip_code'=>$num_zip,
          'department'=>$num_dep,
      );
      
      $collection->insertOne($insert);
    }
    else {
      echo "Operation unsuccessful: Employee was not added, please try again.";
    }
    ?>

    <!--Displays the back bar and the copyright bar at the bottom-->
    <div class = banner>
      <a href= "./index.php"> Back </a>
    </div>
        
    <div id= copyright>
      The Techonauts: Bonnie Atelsek - Matthew Kabat - Nathan Murzello - Terrence Gaines
    </div>
    
    
  </body>

</html>