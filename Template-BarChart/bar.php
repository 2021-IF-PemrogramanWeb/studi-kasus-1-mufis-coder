<?php require_once("../auth.php"); ?>
<?php require_once("../config.php");?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Bar Chart Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Bar Chart <small>Bootstrap template, demonstrating a Bar Chart</small></h1>
</div>

<!-- Bar Chart - START -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Bar Series</h3>
                </div>
                <div class="panel-body">
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Multiple Bar Series</h3>
                </div>
                <div id="chart2" class="panel-body">
                </div>
            </div>
        </div>
    </div>   
</div>

<?php
    // $query = "SELECT * FROM penjualanhonda";
    $query = "SELECT New_Vehicle_Year, SUM(Count) as Count
                FROM penjualanhonda
                GROUP BY New_Vehicle_Year";
    $sql = $db->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();


    $countArry = array();
    $yearArry = array();
    foreach($data as $row) {
        array_push($countArry, $row['Count']);
        array_push($yearArry, $row['New_Vehicle_Year']); 
    }
?>
   

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        var data1 = [];
        var data1y = [];
        var countArray = <?php echo json_encode($countArry); ?>;
        var yearArray = <?php echo json_encode($yearArry); ?>;
        for(var i = 0; i < countArray.length; i++){
            if(countArray[i]>0){
                // document.write(passedArray[i]);
                data1.push(parseInt(countArray[i]));
            }
        }
        for(var i = 0; i < yearArray.length; i++){
            data1y.push(parseInt(yearArray[i]));
        }
        console.log(data1);
        console.log(data1y);
        var data2 = [3, 9, 12, 14, 22, 32, 45, 12, 67, 45, 55, 7];
        var data3 = [23, 19, 11, 134, 242, 352, 435, 22, 637, 445, 555, 57];
            
        $("#chart1").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Total Penjualan Mobil Honda"
                },
            },
            axisX: {
                title: {
                    text: "Tahun"
                },
                categoricalValues: data1y
            },
            dataSeries: [{
                seriesType: "bar",
                data: data1
            }]
        });

        $("#chart2").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Break-Down for selected quarter"
                }
            },
            dataSeries: [{
                seriesType: "bar",
                data: data2
            }, {
                seriesType: "bar",
                data: data3
            }]
        });
    });
</script>
<!-- Bar Chart - END -->

</div>

<p><a href="../logout.php">Logout</a></p>
<p><a href="../Table_Fixed_Header/dashboard.php">Dashboard</a></p>

</body>
</html>