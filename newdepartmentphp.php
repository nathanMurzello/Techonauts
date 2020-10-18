<html>

  <head>
    <title>New Department</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/construction.css">
  </head>
  
  <body>
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
    
    $approved = 0;
    
    $name = $_POST['name'];
    $id = $_POST['id'];
    $location = $_POST['location'];
    $form_result = $_POST['form'];
    
    $num_pattern = '/\d/';
    
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
    
    
    if ($approved == 3) {
      $sql = "INSERT INTO AddressBook(F_NAME, L_NAME, ADDRESS_LINE, Phone_number, email_id, alt_email)
      VALUES (‘F_NAME’, ‘L_NAME', ‘ADDRESS_LINE', 'Phone_number', 'email_id','alt_email')";
      
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