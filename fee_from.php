<?php include('head.php'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Fee Form</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Fee Form</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <style>
    .error {
      color: red;
    }
    
  </style>
  <?php
  $standardErr = "";
  $feeErr = "";
  $id = "";
  if (isset($_GET['standardErr'])) {
    $standardErr = $_GET['standardErr'];
  }
  if (isset($_GET['feeErr'])) {
    $feeErr = $_GET['feeErr'];
  }
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  ?>
  <div class="container">
    <form method="post" action="fee_/insert.php">
      <div class="form-group">
      <label for="standard_id" class="col-form-label">Standard</label>
                <select class="form-control select2 select2-hidden-accessible" id="standard_id" name="standard"
                    style="width: 100%;" aria-hidden="true" data-select2-id="standard_id" >
                    <option value="" data-select2-id="36">Please select standard</option>
                    <option value="9" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='9'){echo 'selected=\"selected\"' ;}}?>>9</option>
                    <option value="10" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='10'){echo 'selected=\"selected\"' ;}}?>>10</option>
                    <option value="11" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='11'){echo 'selected=\"selected\"' ;}}?>>11</option>
                    <option value="12" <?php if(isset($_GET['oldstandard'])){if($_GET['oldstandard']=='12'){echo 'selected=\"selected\"' ;}}?>>12</option>
                </select>
                <p class="error"><?php echo  $standardErr;?></p>
      </div>
      <div class="form-group">
        <label for="name">Fee:</label>
        <input type="number" class="form-control" name="fee" placeholder="Enter fee" value="<?php echo isset($_GET['oldfee'])?$_GET['oldfee']:"";?>">
        <p class="error"><?php echo  $feeErr;?></p>
      </div>
      <?php
            if (isset($_GET['id'])) {
              ?>
              <input type="hidden" value='<?php echo $_GET['id'];?>' name="id">
            <?php 
            }
            ?>
      <?php
            if($id==""){
            ?>
            <button type="submit" class="btn btn-primary" name="Save">Save</button>
            <?php
            }?>
            <?php
            if($id!=""){
            ?>
            <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
            <?php
            }?>
    </form>
  </div>
</div>

<?php include('footer.php'); ?>
