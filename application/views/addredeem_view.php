<div class="container">
<h1>Add Redeems </h1>
<?php echo form_open('control_crud/saveredeem', 'role="form"'); ?>
  <div class="form-group">
    <label for="code_redeem">Code Redeems </label>
    <input type="text" class="form-control" id="code_redeem" name="code_redeem" placeholder="Code redeem"></input>
  </div>
  <div class="form-group">
    <label for="name_redeem">Name Redeems </label>
    <input type="text" class="form-control" id="name_redeem" name="name_redeem" placeholder="Name redeem"></input>
  </div>
  <div class="form-group">
    <label for="periode">Periode </label>
    <input type="date" class="form-control" id="periode" name="periode" placeholder="Periode(end of event)"></input>
  </div>
  <div class="form-group">
    <label for="quota">Quota </label>
    <input type="int" class="form-control" id="quota" name="quota" placeholder="Maxsimum of claimers"></input>
  </div>
  <div class="form-group">
    <label for="blue_thumb">Blue Thumb</label>
    <input type="text" class="form-control" id="blue_thumb" name="blue_thumb">
  </div>
  <div class="form-group">
    <label for="like_this">Like this</label>
    <input type="text" class="form-control" id="like_this" name="like_this">
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo site_url('control_crud') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
</div>
