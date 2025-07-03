<title>BMS | Dashboard</title>
<?php include 'navbar.php'; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
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
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center mb-3">

          <div class="col-lg-6 col-6 d-flex justify-content-center mb-3">
            <div id="piechart" style="width: 100%; height: 230px;"></div>
          </div>
          <div class="col-lg-6 col-6 d-flex justify-content-center mb-3">
            <div id="piechart2" style="width: 100%; height: 230px;"></div>
          </div>
          <div class="col-lg-6 col-6 d-flex justify-content-center">
            <div id="piechart3" style="width: 100%; height: 230px;"></div>
          </div>
          <div class="col-lg-6 col-6 d-flex justify-content-center">
            <div id="piechart4" style="width: 100%; height: 230px;"></div>
          </div>

        </div>
        <h1 class="card p-5 text-center"></h1>
      </div>
    </section>
    
  </div>

<?php include 'footer.php'; ?>

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
  <script type="text/javascript">

      // POPULATION
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Percentage by gender'],
          <?php 
            $sql = mysqli_query($conn, "SELECT count(residenceId) AS male FROM residence WHERE gender='Male' ");
            while ($row = mysqli_fetch_array($sql)) {
              echo "['Male', ".$row['male']."],";
            }
            $sql = mysqli_query($conn, "SELECT count(residenceId) AS female FROM residence WHERE gender='Female' ");
            while ($row = mysqli_fetch_array($sql)) {
              echo "['Female', ".$row['female']."],";
            }
            $sql = mysqli_query($conn, "SELECT count(residenceId) AS nonbinary FROM residence WHERE gender='Non-Binary' ");
            while ($row = mysqli_fetch_array($sql)) {
              echo "['Non-Binary', ".$row['nonbinary']."],";
            }
          ?>
        ]);
        var options = {
          title: 'Population'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }



      // AGE
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(age);
      function age() {
        var data = google.visualization.arrayToDataTable([
          ['Age', 'Percentage by age'],
          <?php 
            $sql1 = mysqli_query($conn, "SELECT count(residenceId) AS toddler FROM residence WHERE ageClassification='Toddler' ");
            while ($row = mysqli_fetch_array($sql1)) {
              echo "['Toddler', ".$row['toddler']."],";
            }
            $sql2 = mysqli_query($conn, "SELECT count(residenceId) AS child FROM residence WHERE ageClassification='Child' ");
            while ($row = mysqli_fetch_array($sql2)) {
              echo "['Child', ".$row['child']."],";
            }
            $sql3 = mysqli_query($conn, "SELECT count(residenceId) AS teen FROM residence WHERE ageClassification='Teen' ");
            while ($row = mysqli_fetch_array($sql3)) {
              echo "['Teen', ".$row['teen']."],";
            }
            $sql4 = mysqli_query($conn, "SELECT count(residenceId) AS young FROM residence WHERE ageClassification='Young' ");
            while ($row = mysqli_fetch_array($sql4)) {
              echo "['Young', ".$row['young']."],";
            }
            $sql6 = mysqli_query($conn, "SELECT count(residenceId) AS adult FROM residence WHERE ageClassification='Adult' ");
            while ($row = mysqli_fetch_array($sql6)) {
              echo "['Adult', ".$row['adult']."],";
            }
            $sql7 = mysqli_query($conn, "SELECT count(residenceId) AS senior FROM residence WHERE ageClassification='Senior' ");
            while ($row = mysqli_fetch_array($sql7)) {
              echo "['Senior', ".$row['senior']."],";
            }
          ?>
        ]);
        var options = {
          title: 'Age'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }


      


      // SECTOR
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(sector);
      function sector() {
        var data = google.visualization.arrayToDataTable([
          ['Sector', 'Percentage by sector'],
          <?php 
            $sql1 = mysqli_query($conn, "SELECT count(residenceId) AS senior FROM residence WHERE sector='Senior Citizen' ");
            while ($row = mysqli_fetch_array($sql1)) {
              echo "['Senior Citizen', ".$row['senior']."],";
            }
            $sql2 = mysqli_query($conn, "SELECT count(residenceId) AS solo FROM residence WHERE sector='Solo Parents' ");
            while ($row = mysqli_fetch_array($sql2)) {
              echo "['Solo Parents', ".$row['solo']."],";
            }
            $sql3 = mysqli_query($conn, "SELECT count(residenceId) AS pwd FROM residence WHERE sector='PWD' ");
            while ($row = mysqli_fetch_array($sql3)) {
              echo "['PWD', ".$row['pwd']."],";
            }
          ?>
        ]);
        var options = {
          title: 'Sector'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart.draw(data, options);
      }




      // CIVIL STATUS
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(status);
      function status() {
        var data = google.visualization.arrayToDataTable([
          ['Civil Status', 'Percentage by status'],
          <?php 
            $sql1 = mysqli_query($conn, "SELECT count(residenceId) AS single FROM residence WHERE civilstatus='Single' ");
            while ($row = mysqli_fetch_array($sql1)) {
              echo "['Single', ".$row['single']."],";
            }
            $sql2 = mysqli_query($conn, "SELECT count(residenceId) AS married FROM residence WHERE civilstatus='Married' ");
            while ($row = mysqli_fetch_array($sql2)) {
              echo "['Married', ".$row['married']."],";
            }
            $sql3 = mysqli_query($conn, "SELECT count(residenceId) AS separated FROM residence WHERE civilstatus='Separated' ");
            while ($row = mysqli_fetch_array($sql3)) {
              echo "['Separated', ".$row['separated']."],";
            }
            $sql4 = mysqli_query($conn, "SELECT count(residenceId) AS widow FROM residence WHERE civilstatus='Widow/ER' ");
            while ($row = mysqli_fetch_array($sql4)) {
              echo "['Widow/ER', ".$row['widow']."],";
            }
          ?>
        ]);
        var options = {
          title: 'Civil Status'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart.draw(data, options);
      }
  </script>