<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <footer class="main-footer">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Barangay Mission</label>
        <p class="text-sm text-justify text-muted">Barangay 193 is dedicated to deliver effective, efficient, & respectful public service with pride, integrity, & accountability by involving our constituents and stakeholders towards the  accomplishments of our goals.</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Barangay Vision</label>
        <p class="text-sm text-justify text-muted">We envisioned to be a Clean and Green, Organized, Peaceful, God-Fearing and a Progressive Barangay.</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Contact Us</label>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-phone"></i> +63 9123456789</p>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-envelope"></i> admin@gmail.com</p>
      </div>

    </div>
    <div class="dropdown-divider"></div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">BMMS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 4.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- GOOGLE PIE CHART -->
<script type="text/javascript" src="../plugins/google-pie-chart/loader.js"></script>

<script src="../plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<!-- <script src="js/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="js/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="js/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="js/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="js/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="js/moment/moment.min.js"></script> -->
<!-- <script src="js/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="js/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="js/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap Switch -->
  <script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


  $("#exampleUser").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#exampleUser_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });


  });

</script>
<script>
    $(function () {
      //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    });
</script>


<!-- AUTO LOGOUT AFTER 5 MINS // OTHER CODE CAN BE SEEN IN NAVBAR.PHP(USER_AUTH.PHP)-->
<script>
  setInterval(function(){
    check_user();
  },1000);
  function check_user(){
    jQuery.ajax({
      url:'user_auth.php',
      type:'post',
      data:'type=ajax',
      success:function(result){
        if(result=='logout'){
          window.location.href='../logout.php';
        }
      }
      
    });
  }
</script>
<!-- AUTO LOGOUT AFTER 5 MINS // OTHER CODE CAN BE SEEN IN NAVBAR.PHP(USER_AUTH.PHP)-->

</body>
</html>