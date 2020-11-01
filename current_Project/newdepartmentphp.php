<html>

  <head>
    <title>New Department</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/construction.css">
  </head>
  
  <body>
    <!--Script to establish a connection with the database and insert user info.-->
    <?php

    require 'vendor/autoload.php';
    $client = new MongoDB\Client(
      'mongodb+srv://techno:techno123@cluster0.k9zfj.mongodb.net/EmployeeSystem?retryWrites=true&w=majority');
    $collection=$client->selectCollection('EmployeeSystem','Department');
    
    
    //the approved variable holds how many fields have had their input types approved 
    $approved = 0;
    
    //create variables to hold values from the input form
    $name = $_POST['name'];
    $id = $_POST['id'];
    $manager = $_POST['manager'];
    $location = $_POST['location'];
    
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
      
      $num_id=(int)$_POST['id'];
      $insert=array(
        '_id'=>$num_id,
        'name'=>$_POST['name'],
        'manager'=>$_POST['manager'],
        'location'=>$_POST['location'],
      );
      $collection->insertOne($insert);
    }
    else {
      echo "Operation unsuccessful: Department was not added, please try again.";
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