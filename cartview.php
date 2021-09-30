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
		

		
		
	
		
		</head>

		<body>
		
			<h4>
                <button onclick="tocart()">Cart</button>

                <script>
                function tocart() {
                location.assign("http://localhost/LabDbmsProject/cartview.php");
                }
                </script>
            </h4>

            <h4 style="position:absolute; top:10px; right:140px">
                <button onclick="tohome()">Home</button>

                <script>
                function tohome() {
                location.assign("http://localhost/LabDbmsProject/home.php");
                }
                </script>
            </h4>
			

            <br><br>

			
			

			<div>
				<h5>All Added Notes</h5>
				
                    <tbody>
                        <?php 
                    

                                try{
                                    $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
                                
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $mysqlquery = "SELECT c.CART_ID, n.ID, n.NAME, n.IMAGEPATH, n.DESCRIPTION, n.PRICE, u.FIRST_NAME, u.LAST_NAME, u.PHONE_NUMBER\n"

                                    . "FROM cart AS c\n"

                                    . "JOIN userlist AS u \n"

                                    . "ON c.USER_ID = u.USER_ID\n"

                                    . "JOIN note AS n \n"

                                    . "ON c.NOTE_ID = n.ID;";

                                    $returnobj = $conn->query($mysqlquery);
                                    $returntable = $returnobj->fetchAll();
                                    //print_r($returntable);

                                    if($returnobj->rowCount()==0) {
                                        ?>
                                            <tr>
                                                <td colspan="8">No Notes found</td>
                                            </tr>

                                        <?php
                                    }
                                    else{
                                        foreach($returntable as $row) {
                                            //print_r($returntable)
                                            $username = $row["FIRST_NAME"] . $row["LAST_NAME"];
                                
                                            ?>
                                                <div class="col">
                                                    <div class="card shadow-sm">
                                                        
                                                        <text>
                                                        <img src="<?php print $row["IMAGEPATH"] ?>" width="300px" height="300px">
                                                        <?php print $row["DESCRIPTION"] ?>
                                                        </text>

                                                        <div class="card-body">
                                                        <p class="card-text"><strong> <?php echo $row["NAME"] ?> </strong></p>
                                                        <p class="card-text"><strong> <?php echo "Price: " . $row["PRICE"] ?> </strong></p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="btn-group">
                                                            <form action="checkout.php" method="POST">
                                                            <input type="hidden" name="price" value="<?php print $row["PRICE"] ?>"/>
                                                                <input type="hidden" name="username" value="<?php print $username ?>"/>
                                                                <input type="hidden" name="pnumber" value="<?php print $row["PHONE_NUMBER"] ?>"/>
                                                                <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                                    CheckOut
                                                                </button>
													        </form>
                                                           
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">Remove</button>
                                                            </div>
                                                            <small class="text-muted"><?php print "Shared By: " . $row["FIRST_NAME"] . " " . $row["LAST_NAME"] ?></small>
                                                        </div>
                                                        </div>

                                                    </div>
                                                </div>
                                    

                                    
                                    
                                            <?php
                                            
                                        
                                        }
                                    }
                                    
                                
                                
                                }
                                catch(PDOException $ex){
                                    ?>
                                        <tr>
                                            <td colspan="8">No values found</td>
                                        </tr>

                                    <?php
                                }

                        ?>
                    </tbody>
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


