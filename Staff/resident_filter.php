<form  method="POST">
  <div class="row">
   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm small" name="gender">
          <option selected value="">Sort by gender</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT gender FROM residence ORDER BY gender");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="sector">
          <option selected value="">Sort by sector</option>
          <?php 
            $sector = mysqli_query($conn, "SELECT DISTINCT sector FROM residence ORDER BY sector");
            while($row = mysqli_fetch_array($sector)) { 
          ?>
          <option value="<?php echo $row['sector']; ?>"><?php echo $row['sector']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="citizenship">
          <option selected value="">Sort by citizenship</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT citizenship FROM residence ORDER BY citizenship");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['citizenship']; ?>"><?php echo $row['citizenship']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="resident_status">
          <option selected value="">Sort by Resident Status</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT resident_status FROM residence ORDER BY resident_status");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['resident_status']; ?>"><?php echo $row['resident_status']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="ID_status">
          <option selected value="">Sort by ID Status</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT ID_status FROM residence ORDER BY ID_status");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['ID_status']; ?>"><?php echo $row['ID_status']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="years_of_stay">
          <option selected value="">Sort by Years of Stay</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT years_of_stay FROM residence ORDER BY years_of_stay");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['years_of_stay']; ?>"><?php echo $row['years_of_stay']; ?> years</option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="age">
          <option selected value="">Sort by age</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT age FROM residence ORDER BY age");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['age']; ?>"><?php echo $row['age']; ?> years</option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="added_By">
          <option selected value="">Sort by Encoder</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT added_By FROM residence ORDER BY added_By");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['added_By']; ?>"><?php echo $row['added_By']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="familyRole">
          <option selected value="">Sort by Family Role</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT familyRole FROM residence ORDER BY familyRole");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['familyRole']; ?>"><?php echo $row['familyRole']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="headName">
          <option selected value="">Sort by Family Head Name</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT headName FROM residence ORDER BY headName");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['headName']; ?>"><?php echo $row['headName']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="familyIndicator">
          <option selected value="">Sort by Family Indicator</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT familyIndicator FROM residence ORDER BY familyIndicator");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['familyIndicator']; ?>"><?php echo $row['familyIndicator']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>

   <div class="col-lg-3 col-md-3 col-sm-4 col-12 p-1 mb-2">
        <div class="input-group">
          <div class="input-group-append">
          <div class="input-group-text">
            <i class="fa-solid fa-filter"></i>
          </div>
        </div>
        <select class="form-control form-control-sm" name="religion">
          <option selected value="">Sort by Religion</option>
          <?php 
            $fetch = mysqli_query($conn, "SELECT DISTINCT religion FROM residence ORDER BY religion");
            while($row = mysqli_fetch_array($fetch)) { 
          ?>
          <option value="<?php echo $row['religion']; ?>"><?php echo $row['religion']; ?></option>
          <?php } ?>
        </select>
      </div>
   </div>
  </div>
  <div class="row">
      <div class="col-12">
        <button type="submit" name="filter" class="m-1 btn btn-dark btn-sm float-right"><i class="fa-solid fa-filter"></i> Filter</button>
        <button type="button" name="filter" class="m-1 btn btn-primary btn-sm float-right" onclick=location=URL><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
      </div>
  </div>
</form>
