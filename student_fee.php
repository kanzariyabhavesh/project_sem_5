<?php include('head.php'); ?>
<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Fee</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Fee</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
<center>
  <style>
    .error {
      color: red;
    }
    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
    }
  </style>
  <div class="form-container">
    <form id="form" method="post" action="fee_/fee_I.php">
        <div class="row d-flex">
            <div class="form-group col-md-6">
                <label for="name" class="col-form-label">Full name</label>
                <input type="text" class="form-control" id="name" placeholder="Full name" name="name" value="<?php echo isset($_GET['oldname'])?$_GET['oldname']:"";?>">
            </div>
            <div class="form-group col-md-6">
                <label for="parent_name" class="col-form-label">Parent Full name</label>
                <input type="text" class="form-control" id="parent_name" placeholder="Parent Full name" name="parent_name"  value="<?php echo isset($_GET['oldparent_name'])?$_GET['oldparent_name']:"";?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="standard_id" class="col-form-label">Standard</label>
                <select class="form-control select2 select2-hidden-accessible" id="standard_id" name="standard"
                    style="width: 100%;" aria-hidden="true" data-select2-id="standard_id" >
                    <option value="" data-select2-id="36">Please select standard</option>
                    <option value="9" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='9'){echo 'selected=\"selected\"' ;}}?>>9</option>
                    <option value="10" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='10'){echo 'selected=\"selected\"' ;}}?>>10</option>
                    <option value="11" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='11'){echo 'selected=\"selected\"' ;}}?>>11</option>
                    <option value="12" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='12'){echo 'selected=\"selected\"' ;}}?>>12</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="class_id" class=" col-form-label">ClassRoom</label>
                <select class="form-control select2 select2-hidden-accessible" id="class_id" name="class"
                    style="width: 100%;"  aria-hidden="true" data-select2-id="class_id">
                    <option value="" data-select2-id="39">Please select class</option>
                    <option value="A" <?php if(isset($_GET['oldclass'])){if($_GET['oldclass']=='A'){echo ' selected=\"selected\"' ;}}?>>A</option>
                    <option value="B" <?php if(isset($_GET['oldclass'])){if($_GET['oldclass']=='B'){echo ' selected=\"selected\"' ;}}?>>B</option>
                    <option value="C" <?php if(isset($_GET['oldclass'])){if($_GET['oldclass']=='C'){echo ' selected=\"selected\"' ;}}?>>C</option>
                    <option value="D" <?php if(isset($_GET['oldclass'])){if($_GET['oldclass']=='D'){echo ' selected=\"selected\"' ;}}?>>D</option>
                    <option value="E" <?php if(isset($_GET['oldclass'])){if($_GET['oldclass']=='E'){echo ' selected=\"selected\"' ;}}?>>E</option>
                </select> 
            </div>
            <div class="form-group col-md-6">
                <label for="dob" class="col-form-label">DOB</label>
                <input type="date" class="form-control" id="dob" placeholder="DOB" name="dob"  value="<?php echo isset($_GET['olddob'])?$_GET['olddob']:"";?>">
            </div>
            <div class="form-group col-md-6">
                <label for="email" class="col-form-label">E-mail</label>
                <input type="text" class="form-control" id="email" placeholder="E-mail" name="email"  value="<?php echo isset($_GET['oldemail'])?$_GET['oldemail']:"";?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="phone_number" class="col-form-label">Phone number</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number"  value="<?php echo isset($_GET['oldphone_number'])?$_GET['oldphone_number']:"";?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="gender" class="col-form-label">Gender</label>
                <div class="form-group ">
                    <select name="gender" id="gender_id" class="form-control"  value="<?php echo isset($_GET['oldgender'])?$_GET['oldgender']:"";?>">
                        <option value="" >Select Gender</option>
                        <option  value="Male"<?php if(isset($_GET['oldgender'])){if($_GET['oldgender']=='Male'){echo ' selected=\"selected\"' ;}}?>>Male</option>
                        <option value="Female"<?php if(isset($_GET['oldgender'])){if($_GET['oldgender']=='Female'){echo ' selected=\"selected\"' ;}}?>>Female</option>
                    </select>
                </div> 
            </div>
            <div class="form-group col-md-6">
                 <label for="parent_name" class="col-form-label">Total Fee</label>
                <input type="text" class="form-control" id="Fee" placeholder="Fee" name="Fee"  value="<?php echo isset($_GET['oldfee'])?$_GET['oldfee']:"";?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="parent_name" class="col-form-label">Cerdit Fee</label>
                <input type="text" class="form-control" id="Cerdit_Fee" placeholder="Cerdit Fee" name="Cerdit_fee" value="<?php echo isset($_GET['oldcerditfee'])?$_GET['oldcerditfee']:"";?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="address" class="col-form-label">Address</label>
                <textarea name="address" class="form-control " id="address" cols="30" rows="10"><?php echo isset($_GET['oldaddress'])?$_GET['oldaddress']:"";?></textarea>
            </div>
            <?php
            if (isset($_GET['id1'])) {
              ?>
              <input type="hidden" value='<?php echo $_GET['id1'];?>' name="id1">
            <?php 
            }
            ?>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button></a>
            <?php
            if(isset($_GET['id1'])==""){
            ?>
            <button type="submit" class="btn btn-primary" name="Save">Save</button>
            <?php
            }?>
            <?php
            if(isset($_GET['id1'])!=""){
            ?>
            <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
            <?php
            }?>
         
      </div>
</form>
</center>
  <?php include('footer.php') ?>
  