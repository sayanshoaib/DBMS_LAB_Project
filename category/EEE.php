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
		<title>EEE</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="cse.css">	
		
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
												<option value="http://localhost/LabDbmsProject/category/<?php echo $categoryname . ".php"?>"><?php print $row["CAT_NAME"] ?></option>
											
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
			

			<br><br>

			<div>
				<h5>All EEE Notes List</h5>
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
							 try{
								$conn=new PDO("mysql:host=localhost:3306; dbname=dbmsadb;", "root", "");
							  
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								$mysqlquery = "SELECT n.ID, n.NAME, n.IMAGEPATH, n.CONTENTPATH, n.DESCRIPTION, n.PRICE, c.CAT_NAME \n"

								. "FROM note AS n JOIN categories AS c \n"
							
								. "ON c.ID = n.CATEGORY_ID \n"

                                . "WHERE c.ID = 3;";

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
										//print_r($returntable)

										$notesImg = "http://localhost/LabDbmsProject/" . $row["IMAGEPATH"];
										$notesFile = "http://localhost/LabDbmsProject/" . $row["CONTENTPATH"];
										?>
											<tr>
												<td> <?php print $row["ID"] ?></td>
												<td> <?php print $row["NAME"] ?></td>
												<td> <img src="<?php print $notesImg ?>" width="300px" height="300px"></td>
												<td> <embed src="<?php print $notesFile ?>" width="300px" height="300px"></td> 
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


