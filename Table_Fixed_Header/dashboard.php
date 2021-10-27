<?php require_once("../auth.php"); ?>
<?php require_once("../config.php");?>

<!-- <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
<p><?php echo $_SESSION["user"]["email"] ?></p> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column4">No</th>
									<th class="cell100 column4">New_Vehicle_Category</th>
									<th class="cell100 column4">New_Vehicle_Make</th>
									<th class="cell100 column4">New_Vehicle_Model</th>
									<th class="cell100 column4">New_Vehicle_Year</th>
                                    <th class="cell100 column4">Count</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                                    <?php
                                    $query = "SELECT * FROM penjualanhonda";
                                    $sql = $db->prepare($query);
                                    $sql->execute();
                                    $data = $sql->fetchAll();
                                    foreach($data as $row) {
                                        echo "<tr class='row100 body'>";
                                            echo "<td class='cell100 column4'>".$row['No']."</td>";
                                            echo "<td class='cell100 column4'>".$row['New_Vehicle_Category']."</td>";
                                            echo "<td class='cell100 column4'>".$row['New_Vehicle_Make']."</td>";
                                            echo "<td class='cell100 column4'>".$row['New_Vehicle_Model']."</td>";
                                            echo "<td class='cell100 column4'>".$row['New_Vehicle_Year']."</td>";
                                            echo "<td class='cell100 column4'>".$row['Count']."</td>";
                                        echo "</tr>";
                                    }
                                    ?>
							</tbody>
						</table>
					</div>
                </div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <p><a href="../logout.php">Logout</a></p>
    <p><a href="../Template-BarChart/bar.php">Barplot</a></p>

</body>
</html>