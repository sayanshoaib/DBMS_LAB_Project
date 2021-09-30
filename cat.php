<?php 

session_start();

if(
	isset($_SESSION['myemail'])
	&& !empty($_SESSION['myemail'])
) {
    ?>  
            
        <Style>
            #formcat {
                position: absolute;
                background-color: palegreen;
                padding: 5px;
                top: 150px;
                right: 450px;
            }

            #catidname {
                width: 300px;
            }
        </Style>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            
        <form id="formcat" action="catprocess.php" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                    <h1>Create Category</h1>
                    <hr class="mb-3">
                    <label for="cname"><b>Category Name</b></label>
                    <input class="form-control"  id="catidname" type="text" name="cname" required>
                    
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Create">
                    </div>
                </div>

            </div>
	    </form>
       

    <?php

}
else {
	?>
		<script>location.assign("login.php");</script>
	<?php
}

?>


