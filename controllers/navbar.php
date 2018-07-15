<link rel="stylesheet" href="../graphics/styling/style.css" type="text/css" media="screen">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../scripting/scripts.js" type="text/javascript" charset="utf-8"></script>

<!------ Include the above in your HEAD tag ---------->


<div class="container">
	<div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
              <div class="list-group">
				<?php
					include 'config.php';
	
					$sql = "SELECT * FROM users WHERE visible = 1  ORDER BY ordered ASC";
					$result = mysqli_query($conn, $sql);
					
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
							echo "<a href='#' class='list-group-item text-center'>".
			                  "<h4 class='glyphicon glyphicon-plane'></h4><br/>". $row['name'] .
			               " </a>";
						
						}
				
				?>
              </div><!-- list-group -->
            </div><!-- col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu -->
  </div><!-- row -->
</div><!-- container -->