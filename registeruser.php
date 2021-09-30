<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(   isset($_POST['firstname']) 
       && isset($_POST['lastname'])
       && isset($_POST['myemail'])
       && isset($_POST['phonenumber'])
       && isset($_POST['mypass'])
       && !empty($_POST['firstname'])
       && !empty($_POST['lastname'])
       && !empty($_POST['myemail'])
       && !empty($_POST['phonenumber'])
       && !empty($_POST['mypass'])
    ){
        
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['myemail'];
        $phone = $_POST['phonenumber'];
        $pass = $_POST['mypass'];
        
        
       
        try{
            $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $enc_password = md5($pass);
            
            
            $signupquery = "INSERT INTO `userlist`(`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PHONE_NUMBER`, `PASSWORD`) VALUES ('$fname','$lname','$email','$phone','$enc_password')";
            
            
            $conn->exec($signupquery);
            
            ?>
                <script>location.assign("login.php");</script>
            <?php
            
            
        }
        catch(PDOException $ex){
            ?>
                <script>location.assign("register.php");</script>
            <?php
        }
        
    }
    else{
       
    ?>
        <script>location.assign("register.php");</script>
    <?php
        
    } 
}
else{
   
    
    echo '<script>location.assign("register.php");</script>';
}


?>