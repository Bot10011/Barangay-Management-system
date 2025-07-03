<title>BMS | Barangay Income Report</title>
<?php 
    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Barangay Income Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Barangay Income Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center mb-3">

      <?php 
          // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
          // $all = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS total FROM documents");

          $all = mysqli_query($conn, "SELECT SUM(paymentAmount) AS total FROM income");
          $row_all = mysqli_fetch_array($all);
      ?>

          <div class="col-md-4">
            <div class="card card-success shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Overall Report</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h3>₱<?php echo number_format($row_all['total'], 2, '.', ','); ?></h3>
                <p>Total Income</p>
              </div>
            </div>
          </div>

      <?php 
          $monthFormat = date("m");
          $year = date('Y');
          // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
          // $month = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS total FROM documents WHERE MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");

          $month = mysqli_query($conn, "SELECT SUM(paymentAmount) AS total FROM income WHERE MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
          $row_month = mysqli_fetch_array($month);
      ?>
          <div class="col-md-4">
            <div class="card card-warning shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Report This Month</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h3>₱<?php echo number_format($row_month['total'], 2, '.', ','); ?></h3>
                <p>Total Income</p>
              </div>
            </div>
          </div>


        <?php 
          // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
          // $day = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS total FROM documents WHERE date_acquired='$date_today'");
          // 
          $day = mysqli_query($conn, "SELECT SUM(paymentAmount) AS total FROM income WHERE date_paid='$date_today'");
          $row_day = mysqli_fetch_array($day);
      ?>
          <div class="col-md-4">
            <div class="card card-info shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Report Today</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <h3>₱<?php echo number_format($row_day['total'], 2, '.', ','); ?></h3>
                <p>Total Income</p>
              </div>
            </div>
          </div>

        </div>




        <div class="row">

          <div class="col-md-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Overall Report</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool pt-3" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body">
                <canvas id="overAll" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Report This Month</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool pt-3" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="ReportThisMonth" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
  </div>

<?php include 'footer.php'; ?>
<script>
  $(function () {

   // OVERALL REPORT ****************************
    var donutChartCanvas = $('#overAll').get(0).getContext('2d')
    var donutData        = {

    labels: [ 'Permit', 'Indigency', 'Residency', 'Job Seeker', 'Non-Residency', 'Barangay Clearance', 'Barangay Construction', 'Barangay Business', 'Barangay Plate', 'Barangay ID Card', 'Ownership', 'Other',],
     <?php 
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS permit FROM documents WHERE doc_type='Barangay Permit'");
      $sql = mysqli_query($conn, "SELECT SUM(paymentAmount) AS permit FROM income WHERE paymentFor='Barangay Permit'");
      $row = mysqli_fetch_array($sql);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql2 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS indigency FROM documents WHERE doc_type='Barangay Indigency'");
      $sql2 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS indigency FROM income WHERE paymentFor='Barangay Indigency'");
      $row2 = mysqli_fetch_array($sql2);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql3 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS residency FROM documents WHERE doc_type='Barangay Residency'");
      $sql3 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS residency FROM income WHERE paymentFor='Barangay Residency'");
      $row3 = mysqli_fetch_array($sql3);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql4 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS job FROM documents WHERE doc_type='First Time Job Seeker'");
      $sql4 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS job FROM income WHERE paymentFor='First Time Job Seeker'");
      $row4 = mysqli_fetch_array($sql4);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql5 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS nonresidency FROM documents WHERE doc_type='Brgy. Non-Residency'");
      $sql5 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS nonresidency FROM income WHERE paymentFor='Brgy. Non-Residency'");
      $row5 = mysqli_fetch_array($sql5);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql6 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS brgyclearance FROM documents WHERE doc_type='Barangay Clearance'");
      $sql6 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS brgyclearance FROM income WHERE paymentFor='Barangay Clearance'");
      $row6 = mysqli_fetch_array($sql6);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql7 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS construction FROM documents WHERE doc_type='Barangay Construction'");
      $sql7 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS construction FROM income WHERE paymentFor='Barangay Construction'");
      $row7 = mysqli_fetch_array($sql7);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql8 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS business FROM documents WHERE doc_type='Barangay Business'");
      $sql8 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS business FROM income WHERE paymentFor='Barangay Business'");
      $row8 = mysqli_fetch_array($sql8);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql9 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS plate FROM documents WHERE doc_type='Barangay Plate'");
      $sql9 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS plate FROM income WHERE paymentFor='Barangay Plate'");
      $row9 = mysqli_fetch_array($sql9);
  
      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql10 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS IDCard FROM documents WHERE doc_type='Barangay ID Card'");
      $sql10 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS IDCard FROM income WHERE paymentFor='Barangay ID Card'");
      $row10 = mysqli_fetch_array($sql10);

      $sql11 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS ownership FROM income WHERE paymentFor='Barangay Ownership'");
      $row11 = mysqli_fetch_array($sql11);

      $sql12 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS otherFee FROM income WHERE paid_by=''");
      $row12 = mysqli_fetch_array($sql12);

      

      echo " datasets: [ 
              { 
                data: [".$row['permit'].", ".$row2['indigency'].", ".$row3['residency'].", ".$row4['job'].", ".$row5['nonresidency'].", ".$row6['brgyclearance'].", ".$row7['construction'].", ".$row8['business'].", ".$row9['plate'].", ".$row10['IDCard'].", ".$row11['ownership'].", ".$row12['otherFee']."], 
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ffcccc', '#33cc33', '#ff6600', '#6600cc', '#00ff80', '#ff66a3'],
              } 
             ] ";
      ?>
    }

    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      // type: 'pie',
      data: donutData,
      options: donutOptions
    })



















    // REPORT THIS MONTH ****************************
    var donutChartCanvas = $('#ReportThisMonth').get(0).getContext('2d')
    var donutData        = {

    labels: [ 'Permit', 'Indigency', 'Residency', 'Job Seeker', 'Non-Residency', 'Barangay Clearance', 'Barangay Construction', 'Barangay Business', 'Barangay Plate', 'Barangay ID Card', 'Ownership', 'Other',],
     <?php 

      date_default_timezone_set('Asia/Manila');
      $monthFormat = date("m");
      $year = date('Y');

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS permit FROM documents WHERE doc_type='Barangay Permit' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql = mysqli_query($conn, "SELECT SUM(paymentAmount) AS permit FROM income WHERE paymentFor='Barangay Permit' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row = mysqli_fetch_array($sql);
      

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql2 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS indigency FROM documents WHERE doc_type='Barangay Indigency' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql2 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS indigency FROM income WHERE paymentFor='Barangay Indigency' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year' ");
      $row2 = mysqli_fetch_array($sql2);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql3 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS residency FROM documents WHERE doc_type='Barangay Residency' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql3 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS residency FROM income WHERE paymentFor='Barangay Residency' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row3 = mysqli_fetch_array($sql3);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql4 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS job FROM documents WHERE doc_type='First Time Job Seeker' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql4 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS job FROM income WHERE paymentFor='First Time Job Seeker' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row4 = mysqli_fetch_array($sql4);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql5 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS nonresidency FROM documents WHERE doc_type='Brgy. Non-Residency' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql5 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS nonresidency FROM income WHERE paymentFor='Brgy. Non-Residency' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row5 = mysqli_fetch_array($sql5);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql6 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS brgyclearance FROM documents WHERE doc_type='Barangay Clearance' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql6 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS brgyclearance FROM income WHERE paymentFor='Barangay Clearance' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row6 = mysqli_fetch_array($sql6);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql7 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS construction FROM documents WHERE doc_type='Barangay Construction' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql7 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS construction FROM income WHERE paymentFor='Barangay Construction' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row7 = mysqli_fetch_array($sql7);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql8 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS business FROM documents WHERE doc_type='Barangay Business' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql8 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS business FROM income WHERE paymentFor='Barangay Business' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row8 = mysqli_fetch_array($sql8);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql9 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS plate FROM documents WHERE doc_type='Barangay Plate' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql9 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS plate FROM income WHERE paymentFor='Barangay Plate' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row9 = mysqli_fetch_array($sql9);

      // ORIGINAL CODE WHEN *INCOME TABLE* HAS NOT BEEN CREATED YET
      // $sql10 = mysqli_query($conn, "SELECT SUM(doc_paidAmount) AS IDCard FROM documents WHERE doc_type='Barangay ID Card' AND MONTH(date_acquired)='$monthFormat' AND YEAR(date_acquired)='$year'");
      $sql10 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS IDCard FROM income WHERE paymentFor='Barangay ID Card' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row10 = mysqli_fetch_array($sql10);

      $sql11 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS ownership FROM income WHERE paymentFor='Barangay Ownership' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row11 = mysqli_fetch_array($sql11);

      $sql12 = mysqli_query($conn, "SELECT SUM(paymentAmount) AS otherFee FROM income WHERE paid_by='' AND MONTH(date_paid)='$monthFormat' AND YEAR(date_paid)='$year'");
      $row12 = mysqli_fetch_array($sql12);

      echo " datasets: [ 
              { 
                data: [".$row['permit'].", ".$row2['indigency'].", ".$row3['residency'].", ".$row4['job'].", ".$row5['nonresidency'].", ".$row6['brgyclearance'].", ".$row7['construction'].", ".$row8['business'].", ".$row9['plate'].", ".$row10['IDCard'].", ".$row11['ownership'].", ".$row12['otherFee']."], 
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#ffcccc', '#33cc33', '#ff6600', '#6600cc', '#00ff80', '#ff66a3'],
              } 
             ] ";
      ?>
    }

    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      // type: 'pie',
      data: donutData,
      options: donutOptions
    })













  })
</script>

