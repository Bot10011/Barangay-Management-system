  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<!-- Redesigned Modern Footer -->
<footer class="bg-light text-dark pt-5 pb-4 border-top shadow-sm">
  <div class="container text-center text-md-start">
    <div class="row justify-content-center g-4">

      <!-- Vision -->
      <div class="col-md-3 col-sm-6">
        <div class="mb-3">
          <i class="fa-solid fa-eye fa-2x text-success mb-2"></i>
          <h6 class="fw-bold">Vision</h6>
        </div>
        <p class="text-muted small">A clean, green, organized, peaceful, God-fearing, and progressive Barangay.</p>
      </div>

      <!-- Mission -->
      <div class="col-md-4 col-sm-6">
        <div class="mb-3">
          <i class="fa-solid fa-bullseye fa-2x text-primary mb-2"></i>
          <h6 class="fw-bold">Mission</h6>
        </div>
        <p class="text-muted small">Deliver public service with pride, integrity, and accountability by engaging the community in achieving shared goals.</p>
      </div>

      <!-- Contact -->
      <div class="col-md-3 col-sm-6">
        <div class="mb-3">
          <i class="fa-solid fa-phone-volume fa-2x text-info mb-2"></i>
          <h6 class="fw-bold">Contact</h6>
        </div>
        <p class="text-muted small"><i class="fa-solid fa-phone me-2"></i>+63 912 345 6789</p>
        <p class="text-muted small"><i class="fa-solid fa-envelope me-2"></i>admin@gmail.com</p>
      </div>

    </div>

    <hr class="my-4">

    <!-- Footer Bottom -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-muted small px-3">
      <span>&copy; <?php echo date('Y'); ?> <strong>BMMS</strong>. All rights reserved.</span>
      <span><i class="fa-solid fa-code-branch me-1"></i>Version 4.2.0</span>
    </div>
  </div>
</footer>



<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
</body>
</html>

<?php include 'sweetalert_messages.php'; ?>

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
          window.location.href='logout.php?page=exit';
        }
      }
      
    });
  }
</script>
<!-- AUTO LOGOUT AFTER 5 MINS // OTHER CODE CAN BE SEEN IN NAVBAR.PHP(USER_AUTH.PHP)-->