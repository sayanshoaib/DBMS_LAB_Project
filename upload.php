<?php 

session_start();

if(
	isset($_SESSION['myemail'])
	&& !empty($_SESSION['myemail'])
) {
    ?>
        <style>
            #header{
                text-align: center;
                color: teal;
            }

            #upload {
                background-color: bisque;
            }

        </style>
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <h4 id="header">Upload Notes</h4>
        <div id="upload">
        <form action="uploadprocess.php" method="POST" enctype="multipart/form-data"> 
            <label for="pname">Name:</label>
            <input class="form-control" type="text" id="pname" name="pname">
            <br><br>
            <label for="pimage">Image:</label>
            <input class="form-control" type="file" id="pimage" name="pimage">
            <br><br>
            <label for="pcnt">Content:</label>
            <input class="form-control" type="file" id="pcnt" name="pcnt">
            <br><br>
            <label for="pdsc">Description:</label>
            <input class="form-control" type="text" id="pdsc" name="pdsc" placeholder="Course Description in less than 100 words.">
            <br><br>
            <label for="pprice">Price:</label>
            <input class="form-control" type="text" id="pprice" name="pprice">
            <br>
            <label for="pcat">Category</label>
            <select name="pcat">
            <option value="1">CSE</option>
            <option value="2">BBA</option>
            <option value="3">EEE</option>
            <option value="4">School</option>
            <option value="5">College</option>
            <option value="6">Others</option>
            </select> 
            <br><br>
            <input class="btn btn-primary" id="inp" type="submit" value="Upload">
            



        </form>
        </div>

    <?php

}
else {
	?>
		<script>location.assign("login.php");</script>
	<?php
}

?>


