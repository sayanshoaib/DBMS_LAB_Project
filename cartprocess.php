<?php 

session_start();

if(
	isset($_SESSION['myemail'])
	&& !empty($_SESSION['myemail'])
) {
	?>
		<!DOCTYPE html>
		<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="Cart">
		<title>Cart</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
		<link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
		

		
		
	
		
		</head>

		<body>
            <h4 style="position: absolute; top: 10px; right: 150px;">
                <button onclick="tohome()">Home</button>

                <script>
                function tohome() {
                    location.assign("http://localhost/LabDbmsProject/home.php");
                }
                </script>
            </h4>
            <h4>
                <button onclick="toCart()">Cart</button>

                <script>
                function toCart() {
                location.assign("http://localhost/LabDbmsProject/cartprocess.php");
                }
                </script>
            </h4>
			
			
			<br>

            

			<div>
				<h5>Added Notes</h5>
                    <tbody>
                    <?php
                            if( 
                                isset($_POST['id']) 
                                && isset($_POST['userid']) 
                                && !empty($_POST['id'])
                                && !empty($_POST['userid'])
                            ){
                                $noteID = $_POST["id"];
                                $userID = $_POST["userid"];
                             
                                try{
                                   $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
                                 
                                   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
                                   $mysqlquerystring = "INSERT INTO `cart`(`USER_ID`, `NOTE_ID`) VALUES ($userID, $noteID)";

                                   $conn->exec($mysqlquerystring);
                                   print $mysqlquerystring;
                                   
                                   
                                   ?>
                                       <script>location.assign("http://localhost/LabDbmsProject/cartview.php");</script>
                                   <?php
                                   
                                  
                                  
                               }
                               catch(PDOException $ex){
                                   ?>
                                       <script>location.assign("http://localhost/LabDbmsProject/home.php");</script>
   
                                   <?php
                               }
   

                            }
                            
						?>
						
					</tbody>
		 		</table>
			</div>

			<br><br>

			
			<input id="lout" type="button" value="click to Logout" onclick="logoutfn();">
			
			
			

			<script> 
				function logoutfn() {
					location.assign('logout.php');
				}
				function uploadfn() {
					location.assign('upload.php');
				}
				function catfn() {
					location.assign('cat.php');
				}
			</script>

		</body>
		</html>
	<?php
} else {
	?>
		<script>location.assign("login.php");</script>
	<?php
}

?>


