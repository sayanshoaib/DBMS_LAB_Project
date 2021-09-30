<?php 

session_start();

if(
	isset($_SESSION['myemail'])
	&& !empty($_SESSION['myemail'])
) {
   

    if( 
           isset($_POST['cname'])
        && !empty($_POST['cname'])

    ) {


        $category = $_POST['cname'];
        $createAt = date('Y-m-d H:i:s');

        try{
            $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
          
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $mysqlquerystring =  "INSERT INTO categories(`CAT_NAME`, `CREATED_AT`) VALUES ('$category', '$createAt')";

            $conn->exec($mysqlquerystring);

            ?>
                <script>location.assign("home.php");</script>
            <?php
           
           
        }
        catch(PDOException $ex){
            ?>
                <script>
                    location.assign("catprocess.php");
                    alert("<?php echo $ex; ?>"); 
                </script>
            <?php
                echo $ex;
        }

        

    }
    else{
        ?>
            <script>location.assign("catprocess.php")</script>
        <?php
    }

}
else {
	?>
		<script>location.assign("login.php");</script>
	<?php
}

?>


