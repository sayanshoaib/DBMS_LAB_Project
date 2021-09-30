<?php 
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(   isset($_POST['myemail']) 
        && isset($_POST['mypass'])
        && !empty($_POST['myemail'])
        && !empty($_POST['mypass'])
    ){
        $email=$_POST['myemail'];
        $pass=$_POST['mypass'];
        
        
       
        try{
            $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
          
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $enc_password = md5($pass);
            
            $myquerystring = "SELECT EMAIL, PASSWORD FROM userlist WHERE EMAIL = '$email' and PASSWORD = '$enc_password'";

            $returnobj = $conn->query($myquerystring);

            
            if($returnobj->rowCount()==1){
                
                session_start();
                $_SESSION['myemail'] = $email;
                //echo $_SESSION['myemail'];
            

                
                ?>
                    <script>location.assign("home.php");</script>
                <?php
            }
            else {
                ?>
                    <script>location.assign("login.php");</script>
                <?php
            }
        }
        catch(PDOException $ex){
            ?>
                <script>location.assign("login.php");</script>
            <?php
        }
            
    }
    else{
       
        ?>
            <script>location.assign("login.php");</script>
        <?php
        
    } 
    }
else {
    
    ?>
        <script>location.assign("login.php");</script>
    <?php
}
?>  