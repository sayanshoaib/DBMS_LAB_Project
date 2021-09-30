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
			<h4>Home Page</h4>
			<p style="color:green;">Welcome, &nbsp 
				<?php 
					echo $_SESSION['myemail'];
				?>
			</p>
			<br>
			<h4 style="position:absolute; top:10px; right:465px">
                <button onclick="tohome()">Cart</button>

                <script>
                function tohome() {
                location.assign("http://localhost/LabDbmsProject/cartview.php");
                }
                </script>
            </h4>
			
			<form action="searchNotes.php" method="POST"> 
					<input type="textbox" name="string" placeholder="Search Notes" required />
					<input type="submit" name="submit" value="Search"/>
			</form>

		
			<br>

			<div class="form-group" id = "cat">
                <label for="category">Category</label>
                <select id="category" name="pcategory" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                
					<?php
							 try{
								$conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
							  
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								$catsqlquery = "SELECT `ID`, `CAT_NAME`, `CREATED_AT` FROM `categories`";

								$returnobjcat = $conn->query($catsqlquery);
								$returntablecat = $returnobjcat->fetchAll();
								print_r($returntablecat);

								if($returnobjcat->rowCount()==0) {
									?>
										<tr>
											<option colspan="1">Not Found</option>
										</tr>

									<?php
								}
								else{
						
									foreach($returntablecat as $row) {
											
											$categoryname = $row["CAT_NAME"];
										?>
											<tr>
												<option value="/LabDbmsProject/category/<?php echo $categoryname . ".php"?>"><?php print $row["CAT_NAME"] ?></option>
											</tr>	
									}
												
					
				}
											</tr>
										<?php
									}
								}
								
							   
							   
							}
							catch(PDOException $ex){
								?>
									<tr>
										<td colspan="6">No values found</td>
									</tr>

								<?php
							}

						?>
                </select>    
            </div>

            <br><br>

			
			<input id="upload" type="button" value="Upload Notes" onclick="uploadfn()">

			<input id="createcat" type="button" value="Create Category" onclick="catfn()">
			

			<br><br>

			<div>
				<h5>All Notes List</h5>
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
							<th>Shared By</th>
							<th>Cart</th>
						</tr>
					</thead>
					<tbody>
						<?php
							 try{
								$conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
							  
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								$mysqlquery = "SELECT n.ID, n.NAME, n.IMAGEPATH, n.CONTENTPATH, n.DESCRIPTION, n.PRICE, n.FK_USER_ID, c.CAT_NAME, u.FIRST_NAME, u.LAST_NAME \n"

								. "FROM note AS n \n"
							
								. "JOIN categories AS c \n"
							
								. "ON c.ID = n.CATEGORY_ID\n"
							
								. "JOIN userlist AS u \n"
							
								. "ON u.USER_ID = n.FK_USER_ID;";

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
										$cost = $row["PRICE"];
										?>
											<tr>
												<td> <?php print $row["ID"] ?></td>
												<td> <?php echo $row["NAME"] ?></td>
												<td> <img src="<?php print $row["IMAGEPATH"] ?>" width="300px" height="300px"></td>
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
												<td> <?php print $row["FIRST_NAME"] . " " . $row["LAST_NAME"] ?></td>
												<td>
													<form action="cartprocess.php" method="POST">
													 	<input type="hidden" name="id" value="<?php print $row["ID"] ?>"/>
														 <input type="hidden" name="userid" value="<?php print $row["FK_USER_ID"] ?>"/>
														<button type="submit">
															Add to Cart
														</button>
													</form>
												</td>
											</tr>
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


