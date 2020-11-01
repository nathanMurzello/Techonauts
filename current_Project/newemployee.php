<html> 
<head>
    <title>New Employee</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/newemployee.css">
</head> 
<body>
 
    <h1 class=banner>Please enter the employee information</h1>
     
    <form action="newemployeephp.php" method="post">
        <div class= description>
            Fill out all provided fields with the new employee's information so that a profile can be added
            for them. Employee ID numbers must be unique. The department they belong to must already exist
            in order for the ID to be used to add employees. The zip code provided should correspond to the
            location the employee has listed as their home address.
        </div>
    
        First Name: <input name="first_name" type="text" required>
        <br>
        
        Last Name: <input name="last_name" type="text" required> 
        <br>
        
        Employee ID Number: <input name="id" type="password" required>
        <br>
        
        Employment Address: <input name="address" type="text" required>
        <br>
        
        Employment City: <input name="city" type="text" required>
        <br>
        
        Employment State: 
        <select name="state" required> 
        <option selected> Alabama 
        <option> Alaska 
        <option> Arizona
        <option> Arkansas
        <option> California
        <option> Colorado
        <option> Connecticut
        <option> Delaware
        <option> Florida 
        <option> Georgia
        <option> Hawaii 
        <option> Idaho
        <option> Illinois
        <option> Indiana 
        <option> Iowa
        <option> Kansas 
        <option> Kentucky
        <option> Louisiana
        <option> Maine 
        <option> Maryland
        <option> Massachusetts 
        <option> Michigan
        <option> Minnesota
        <option> Mississippi 
        <option> Missouri
        <option> Montana 
        <option> Nebraska
        <option> Nevada
        <option> New Hampshire 
        <option> New Jersey
        <option> New Mexico 
        <option> New York
        <option> North Carolina
        <option> North Dakota 
        <option> Ohio
        <option> Oklahoma 
        <option> Oregon
        <option> Pennsylvania
        <option> Rhode Island 
        <option> South Carolina
        <option> South Dakota 
        <option> Tennessee
        <option> Texas
        <option> Utah
        <option> Vermont 
        <option> Virginia
        <option> Washington 
        <option> West Virginia
        <option> Wisconsin
        <option> Wyoming 
        </select> 
        <br>
        
        Zip Code: <input name="zip_code" type="text" required>
        <br>
        
        Department Number: <input name="department" type="text" required>
        <br>
        <br>
        
        <input name="verify" type="checkbox" required> I certify that all the information entered above is true and accurate to the best of my knowledge. 
        <br>
        
        <br> 
        <input type="submit" value="Create Employee" name="form_result"> 
        <input type="reset">
    </form>
    
    <div id= copyright>
      The Techonauts: Bonnie Atelsek - Matthew Kabat - Nathan Murzello - Terrence Gaines
    </div>
    
</body> 
</html> 