<html>

  <head>
    <title>New Employee</title>
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
    
    $approved = 0;
    
    $zip = $_POST['zip_code'];
    $name = $_POST['first_name'] . $_POST['last_name'];
    $id = $_POST['id'];
    $state = $_POST['state'];
    $dept = $_POST['department'];
    $form_result = $_POST['form'];
   
    $zip_pattern= "/^(\d){5}$/";
    $num_pattern = '/\d/';
    
    if (is_numeric($zip) && preg_match($zip_pattern, $zip) == 1) {
      $approved++;
    }
    else {
      echo "Error: A zip code can only contain numbers, in the format 12345.<br>";
    }
    
    if (is_string($name) && preg_match($num_pattern, $name) == 0) {
      $approved++;
    }
    else {
      echo "Error: A name can only contain letters.<br>";
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
    
    
    if ($approved == 4) {
      echo "Employee successfully added.";
      /*$sql = "INSERT INTO AddressBook(F_NAME, L_NAME, ADDRESS_LINE, Phone_number, email_id, alt_email)
      VALUES (‘F_NAME’, ‘L_NAME', ‘ADDRESS_LINE', 'Phone_number', 'email_id','alt_email')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }*/
    }
    else {
      echo "Operation unsuccessful: Employee was not added, please try again.";
    }
    ?>

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