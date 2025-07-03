<title>BMS | Dashboard</title>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<?php 
  
  include 'navbar.php'; 
  $query = mysqli_query($conn, "SELECT *, COUNT(residenceId) as countId,  YEAR(date_registered) AS year FROM residence GROUP BY YEAR(date_registered)");
  $chart_data = '';
  while($row = mysqli_fetch_array($query)) {
    $chart_data .= "{ Year:'".$row["year"]."', Population:".$row["countId"]."}, ";
  }
  $chart_data = substr($chart_data, 0, -2);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid card">
        
        <div class="row d-flex justify-content-center ">
          
          <div class="col-md-5 mt-4 bg-light">
            <div class="card-header text-center mt-4 " style="min-height: 200px; max-height: 200px; max-width: 100%;">
                <?php
                  $users = mysqli_query($conn, "SELECT residenceId from residence");
                  $row_users = mysqli_num_rows($users);
                ?>
                <h1 class="mt-5" style="font-size: 70px"><?php echo $row_users; ?></h1>
                <!-- <p class="mb-5">Total Population</p> -->
            </div>
            <div class="card-footer bg-transparent">
              <h5 class="text-center">Total population</h5>
            </div>
          </div>

          <div class="col-md-5 mt-4">
            <div class="card-header bg-light">
              <div id="chart" style="min-height: 200px; max-height: 200px; max-width: 100%;"></div>
            </div>
            <div class="card-footer">
              <h5 class="text-center text-dark">Population by year</h5>
            </div>
          </div>

          <div class="col-md-4 mt-4">
            <a href="detailedPopulation.php">
              <div class="card-header">
                <canvas id="population" style="min-height: 200px; max-height: 200px; max-width: 100%;"></canvas>
              </div>
              <div class="card-footer">
                <h5 class="text-center text-dark">Population</h5>
              </div>
            </a>
          </div>
          
         </div>
     </div>
 </section>
</div>


<?php include 'footer.php'; ?>
 <script>
    Morris.Bar({
     element : 'chart',
     data:[<?php echo $chart_data; ?>],
     xkey:'Year',
     ykeys:['Population'],
     labels:['Population'],
     hideHover:'auto',
     stacked:true
    });


</script>

