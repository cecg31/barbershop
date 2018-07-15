<link rel="stylesheet" href="../graphics/styling/style.css" type="text/css" media="screen">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../scripting/scripts.js" type="text/javascript" charset="utf-8"></script>

<!------ Include the above in your HEAD tag ---------->

<?php
	include 'config.php';
	
	$sql = "SELECT * FROM users WHERE visible = 1  ORDER BY ordered ASC";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}
?>
<div class="container">
	<div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-plane"></h4><br/>Flight
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-road"></h4><br/>Train
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>Hotel
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-cutlery"></h4><br/>Restaurant
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                </a>
              </div><!-- list-group -->
            </div><!-- col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu -->
        </div><!-- col-lg-6 col-md-6 col-sm-6 col-xs-6 bhoechie-tab-container -->
  </div><!-- row -->
</div><!-- container -->