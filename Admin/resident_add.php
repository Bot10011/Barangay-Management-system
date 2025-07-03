<title>BMS | Resident info</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Resident info</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Resident info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body p-3">
                    <form action="process_save.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                      <input type="hidden" class="form-control" name="added_By" value="<?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']; ?>">
                      <div class="row">

                        <div class="col-lg-12 mt-1 mb-2">
                          <a class="h5 text-primary"><b>Basic information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>First name</b></span>
                              <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <span class="text-dark"><b>Middle name</b> (Optional)</span>
                              <input type="text" class="form-control"  placeholder="Middle name" name="middlename">
                          </div>
                        </div>
                        <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Last name</b></span>
                              <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Ext/Suffix</b> (Optional)</span>
                            <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix">
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Date of Birth</b></span>
                              <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="txtbirthdate" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" onchange="getAgeVal(0);">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Age</b></span>
                              <input type="text" class="form-control bg-white" placeholder="Select DOB first" required id="txtage" readonly>
                              <input type="hidden" class="form-control" name="age" placeholder="Age" required id="agestatus">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Place of Birth</b></span>
                              <textarea name="birthplace" id="" cols="30" rows="1" class="form-control" required placeholder="Place of Birth"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Sex</b></span>
                            <select class="form-control" name="gender" required>
                              <option selected disabled value="">Select sex</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Non-Binary">Non-Binary</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Civil Status</b></span>
                            <select class="form-control" name="civilstatus" required>
                              <option selected disabled value="">Select status</option>
                              <option value="Single">Single</option>
                              <option value="Married">Married</option>
                              <option value="Widow/ER">Widow/ER</option>
                              <option value="Separated">Separated</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Citizenship</b></span>
                              <select class="form-control" name="citizenship" required>
                                <option selected disabled value="">Select citizenship</option>
                                <option value="By Family">By Family</option>
                                <option value="By Birth">By Birth</option>
                                <option value="By Marriage">By Marriage</option>
                                <option value="By Investment">By Investment</option>
                                <option value="Naturalization">Naturalization</option>
                                <option value="Other">Other</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Profession/ Occupation</b></span>
                              <input type="text" class="form-control"  placeholder="Profession/ Occupation" name="occupation" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <span class="text-dark"><b>Religion</b></span>
                            <select class="form-control" name="religion" required>
                              <option selected disabled value="">Select religion</option>
                              <option value="Roman Catholic">Roman Catholic</option>
                              <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                              <option value="Evangelical Christianity">Evangelical Christianity</option>
                              <option value="Islam">Islam</option>
                              <option value="Protestants">Protestants</option>
                              <option value="Seventh-day Adventism">Seventh-day Adventism</option>
                              <option value="Aglipayan">Aglipayan</option>
                              <option value="Baptist">Baptist</option>
                              <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                              <option value="Buddhist">Buddhist</option>
                              <option value="Methodist">Methodist</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Judaism">Judaism</option>
                              <option value="Ang Dating Daan">Ang Dating Daan</option>
                              <option value="Other Religion">Other Religion</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Contact number</b></span>
                              <div class="input-group">
                                <div class="input-group-text">+63</div>
                                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10">
                              </div>
                            </div>
                        </div>






                        <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                          <a class="h5 text-primary"><b>Residence address</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>House No.</b></span>
                              <input type="text" class="form-control"  placeholder="House No." name="house_no" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Street name</b></span>
                              <input type="text" class="form-control"  placeholder="Street name" name="street_name" required>
                            </div>
                        </div>
                         <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Sitio/Purok</b></span>
                              <input type="text" class="form-control"  placeholder="Sitio/Purok" name="purok" required value="Pildera II" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Zone</b></span>
                              <input type="text" class="form-control"  placeholder="Zone" name="zone" required value="Zone 20" readonly>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Barangay</b></span>
                              <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required value="Barangay 193" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Municipality</b></span>
                              <input type="text" class="form-control"  placeholder="Municipality" name="municipality" required value="Pasay City" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Province</b></span>
                              <input type="text" class="form-control"  placeholder="Province" name="province" required value="Metro Manila" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Region</b></span>
                              <input type="text" class="form-control"  placeholder="Region" name="region" required value="NCR" readonly>
                            </div>
                        </div>




                        <div class="col-lg-12 mt-3 mb-2">
                          <a class="h5 text-primary"><b>Additional information</b></a>
                          <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Family Indicator</b></span>
                              <select class="form-control" name="familyIndicator" required>
                                <option selected disabled value="">Select indicator</option>
                                <option value="Head">Head</option>
                                <option value="Member">Member</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Family Head Name</b></span>
                              <input type="text" class="form-control"  placeholder="Family Head Name" name="headName" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Family Role</b></span>
                              <input type="text" class="form-control"  placeholder="Son, Mother, Father, Daughter, etc" name="familyRole" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Sector</b></span>
                              <select class="form-control" name="sector" required>
                                <option selected disabled value="">Select sector</option>
                                <option value="Senior Citizen">Senior Citizen</option>
                                <option value="PWD">PWD</option>
                                <option value="Solo Parents">Solo Parents</option>
                                <option value="N/A">N/A</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Residence status</b></span>
                              <select class="form-control" name="resident_status" required>
                                <option selected disabled value="">Select residence status</option>
                                <option value="Tempo/Rented">Tempo/Rented</option>
                                <option value="Perma/Owned">Perma/Owned</option>
                                <!-- <option value="Non-Resident">Non-Resident</option> -->
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Voter status</b></span>
                              <select class="form-control" name="voter_status" required>
                                <option selected disabled value="">Select voter status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="None">None</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Brgy ID status</b></span>
                              <select class="form-control" name="ID_status" required>
                                <option selected disabled value="">Select Brgy ID status</option>
                                <option value="Active">Active</option>
                                <option value="None">None</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>QR status</b></span>
                              <select class="form-control" name="QR_status" required>
                                <option selected disabled value="">Select QR status</option>
                                <option value="Active">Active</option>
                                <option value="None">None</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Months of Stay</b></span>
                              <input type="number" class="form-control"  placeholder="Months of Stay" name="months_of_stay" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Years of stay</b></span>
                              <input type="number" class="form-control"  placeholder="Years of stay" name="years_of_stay">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Resident picture</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)" required>
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>

                              </div>
                              <p class="help-block text-danger">Max. 500KB</p>
                            </div>
                        </div>
                         <!-- LOAD IMAGE PREVIEW -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2">
                            <div class="form-group" id="preview">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Digital signature</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="signature" onchange="signaturess(event)" required>
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>

                              </div>
                              <p class="help-block text-danger">Max. 500KB</p>
                            </div>
                        </div>
                        <!-- LOAD IMAGE PREVIEW -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2">
                            <div class="form-group" id="qrpreview">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Scanned personal documents (Optional)</b></span>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="certificate" onchange="certs(event)">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>

                              </div>
                              <p class="help-block text-danger">Max. 500KB</p>
                            </div>
                        </div>
                        <!-- LOAD IMAGE PREVIEW -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2">
                            <div class="form-group" id="certspreview">
                            </div>
                        </div>

                    </div>
                    <!-- END ROW -->
                    <hr>
                    <div class="float-right">
                      <a href="resident.php" class="btn bg-secondary"><i class="fa-solid fa-ban"></i> Cancel</a>
                      <button type="submit" class="btn bg-primary" name="create_resident" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                    </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<?php include 'footer.php';  ?>

<script>

   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }


   function signaturess(event)
  {
    var signatureimage=URL.createObjectURL(event.target.files[0]);
    var signatureimagediv= document.getElementById('qrpreview');
    var signaturenewimg=document.createElement('img');
    signatureimagediv.innerHTML='';
    signaturenewimg.src=signatureimage;
    signaturenewimg.width="90";
    signaturenewimg.height="90";
    signaturenewimg.style['border-radius']="50%";
    signaturenewimg.style['display']="block";
    signaturenewimg.style['margin-left']="auto";
    signaturenewimg.style['margin-right']="auto";
    signaturenewimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    signatureimagediv.appendChild(signaturenewimg);
  }


   function certs(event)
  {
    var certsImage=URL.createObjectURL(event.target.files[0]);
    var certsImageDiv= document.getElementById('certspreview');
    var certsnewImage=document.createElement('img');
    certsImageDiv.innerHTML='';
    certsnewImage.src=certsImage;
    certsnewImage.width="90";
    certsnewImage.height="90";
    certsnewImage.style['border-radius']="50%";
    certsnewImage.style['display']="block";
    certsnewImage.style['margin-left']="auto";
    certsnewImage.style['margin-right']="auto";
    certsnewImage.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    certsImageDiv.appendChild(certsnewImage);
  }

  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }


  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('create_admin').disabled = false;
        document.getElementById('create_admin').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('create_admin').disabled = true;
        document.getElementById('create_admin').style.opacity = (0.4);
        
    }
  }


    function formatDate(date){
    var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');

    }

    function getAge(dateString){
      var birthdate = new Date().getTime();
      if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
      // variable is undefined or null value
      birthdate = new Date().getTime();
      }
      birthdate = new Date(dateString).getTime();
      var now = new Date().getTime();
      // now find the difference between now and the birthdate
      var n = (now - birthdate)/1000;
      if (n < 604800){ // less than a week
      var day_n = Math.floor(n/86400);
      if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
      // variable is undefined or null
      return '';
      }else{
      return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 2629743){ // less than a month
      var week_n = Math.floor(n/604800);
      if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
      return '';
      }else{
      return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 31562417){ // less than 24 months
      var month_n = Math.floor(n/2629743);
      if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
      return '';
      }else{
      return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
      }
      }else{
      var year_n = Math.floor(n/31556926);
      if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
      return year_n = '';
      }else{
      return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
      }
      }
    }

    function getAgeVal(pid){
      var birthdate = formatDate(document.getElementById("txtbirthdate").value);
      var count = document.getElementById("txtbirthdate").value.length;
      if (count=='10'){
      var age = getAge(birthdate);
      var str = age;
      var res = str.substring(0, 1);
      if (res =='-' || res =='0'){
      document.getElementById("txtbirthdate").value = "";
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      $('#txtbirthdate').focus();
      return false;
      }else{
      document.getElementById("txtage").value = age;
      document.getElementById("agestatus").value = age;
      }
      }else{
      document.getElementById("txtage").value = "";
      document.getElementById("agestatus").value = "";
      return false;
      }
    }
</script>