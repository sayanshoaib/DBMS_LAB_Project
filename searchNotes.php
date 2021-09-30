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
    	<meta name="description" content="Home">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/home.css">
		

		
		
	
		
		</head>

		<body>
            <h4>
                <button onclick="tohome()">Home</button>

                <script>
                function tohome() {
                location.assign("http://localhost/LabDbmsProject/home.php");
                }
                </script>
            </h4>
		
			<br><br>

            <h4>Search Successful</h4>


            <br><br>

			<div>
				<h5>Search Result</h5>
				<table id="ptable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Image</th>
							<th>Content</th>
							<th>Description</th>
							<th>Price</th>
							<th>Category Name</th>
						</tr>
					</thead>
					<tbody>
						<?php

                            if(
                                isset($_POST['string'])
                                && !empty($_POST['string'])
                            )  {

                                $search = $_POST['string'];

                                try{
                                    $conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
                                  
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                                    $mysqlquery = "SELECT n.ID, n.NAME, n.IMAGEPATH, n.CONTENTPATH, n.DESCRIPTION, n.PRICE, c.CAT_NAME\n"

                                    . "FROM note AS n \n"
                                
                                    . "JOIN categories AS c \n"
                                
                                    . "ON n.CATEGORY_ID = c.ID\n"
                                
                                    . "WHERE n.NAME = '$search';";
    
                                    $returnobj = $conn->query($mysqlquery);
                                    $returntable = $returnobj->fetchAll();
                                    //print_r($returntable);
    
                                    if($returnobj->rowCount()==0) {
                                        ?>
                                            <tr>
                                                <td colspan="7">No Notes found</td>
                                            </tr>
    
                                        <?php
                                    }
                                    else{
                                        foreach($returntable as $row) {
                                            //print_r($returntable);
                                            $cost = $row["PRICE"];
    
                                            $notesImg = "http://localhost/LabDbmsProject/" . $row["IMAGEPATH"];
                                            $notesFile = "http://localhost/LabDbmsProject/" . $row["CONTENTPATH"];
                                           
                                            ?>
                                                <tr>
                                                    <td> <?php print $row["ID"] ?></td>
                                                    <td> <?php print $row["NAME"] ?></td>
                                                    <td> <img src="<?php print $notesImg ?>" width="300px" height="300px"></td>
                                                    <?php 
												 	if($cost <= 0) {
														 ?>
															<td> <embed src="<?php print $row["CONTENTPATH"]?>" width="300px" height="300px"></td>
														 <?php
													 }
													 else {
														?> 
															<td> <?php echo "Private, Get access"; ?> </td>
														<?php 
													 }
													 
												    ?> 
                                                    <td> <?php print $row["DESCRIPTION"] ?></td>
                                                    <td> <?php print $row["PRICE"] ?></td>
                                                    <td> <?php print $row["CAT_NAME"] ?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    
                                   
                                   
                                }
                                catch(PDOException $ex){
                                    ?>
                                        <tr>
                                            <td colspan="7">No values found</td>
                                        </tr>
    
                                    <?php
                                }
                            }


							

						?>
					</tbody>
		 		</table>
			</div>

			

		</body>
		</html>
	<?php
} else {
	?>
		<script>location.assign("login.php");</script>
	<?php
}

?>


