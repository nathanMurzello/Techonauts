<html> 
<head>
    <title>New Department</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="./resources/newemployee.css">
</head> 
<body>
 
    <h1 class=banner id=dept>Please enter the department information</h1>
     
    <form class= dept action="newdepartmentphp.php" method="post">
        <div class= description>
            Fill out all provided fields with the new department information. Departments must be created
            before employees can be added to them. Department ID numbers must be unique. The location provided
            should correspond to the primary address listed by the department in question. 
        </div>
        
        Department Name: <input name="name" type="text" required>
        <br>
        
        Department ID Number: <input name="id" type="text" required> 
        <br>
        
        Department Manager: <input name="manager" type="text" required>
        <br>
        
        Department Location: <input name="location" type="text" required>
        <br>
        <br>
        
        <input name="verify" type="checkbox" required> I certify that all the information entered above is true and accurate to the best of my knowledge. 
        <p> 
        
        <p> 
        <input type="submit" value="Create Department"> 
        <input type="reset">
     
    </form>
    
    <div id= copyright>
      The Techonauts: Bonnie Atelsek - Matthew Kabat - Nathan Murzello - Terrence Gaines
    </div>
    
</body> 
</html> 