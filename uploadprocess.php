<?php 

session_start();


if(
	isset($_SESSION['myemail'])
	&& !empty($_SESSION['myemail'])
) {
   

    if( isset($_POST['pname'])
        && isset($_FILES['pimage'])
        && isset($_FILES['pcnt'])
        && isset($_POST['pdsc'])
        && isset($_POST['pprice'])
        && isset($_POST['pcat'])
        && isset($_SESSION['myemail'])
        && !empty($_POST['pname'])
        && !empty($_FILES['pimage'])
        && !empty($_FILES['pcnt'])
        && !empty($_POST['pdsc'])
        && !empty($_POST['pprice'])
        && !empty($_POST['pcat'])
        && !empty($_SESSION['myemail'])

    ) {

        //print_r($_FILES['pimage']);

        $name = $_POST['pname'];
        $image = $_FILES['pimage'];
        $price = $_POST['pprice'];
        $content = $_FILES['pcnt'];
        $description = $_POST['pdsc'];
        $category = $_POST['pcat'];
        $myEmail = $_SESSION['myemail'];
        //echo $myEmail;

        $image_name = $image['name'];
        $image_tmp_path = $image['tmp_name'];
        $toImg = "notesimage/$image_name";

        move_uploaded_file($image_tmp_path, $toImg);

        $content_name = $content['name'];
        $content_tmp_path = $content['tmp_name'];
        $toFile = "notesfile/$content_name";

        move_uploaded_file($content_tmp_path, $toFile);

        try{
            $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
          
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $userID = "SELECT `USER_ID`\n"

                        . "FROM `userlist`\n"
        
                        . "WHERE EMAIL = '$myEmail'; ";

            $returnUserID = $conn->query($userID);
            print_r($returnUserID);
            $uID = print_r($returnUserID);
            
            
            $mysqlquerystring =  "INSERT INTO `note`(`NAME`, `IMAGEPATH`, `CONTENTPATH`, `DESCRIPTION`, `PRICE`, `CATEGORY_ID`, `FK_USER_ID`) VALUES ('$name','$toImg','$toFile','$description', $price,'$category', $uID)";

            $conn->exec($mysqlquerystring);
            print $mysqlquerystring;
            
            
            ?>
                <script>location.assign("http://localhost/LabDbmsProject/home.php");</script>
            <?php
            
            
           
        }
        catch(PDOException $ex){
            ?>
               
               <script>
                    location.assign("upload.php");
                    alert("<?php echo $ex; ?>"); 
                </script>
                
            <?php
                echo $ex;
        }

        

    }
    else{
        
        ?>
            <script>location.assign("upload.php")</script>
        <?php
        
    }

}
else {
	?>
		<script>location.assign("login.php");</script>
	<?php
}

?>


