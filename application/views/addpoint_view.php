<div class="container">
<br>
<br>
<br>
<h1>Poin Data </h1>
<button id="like_this"class="btn btn-raised btn-success"> Like This! Data</button>
<button id="blue_thumb" class="btn btn-raised btn-success"> Blue Thumb Data</button>
<button class="btn btn-raised btn-success"onclick="show_poin()"> Poin Saldo</button>
<br>
<div id="data_table">
</div>
<div id="blue_table">

</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Employ</h4>
        </div>
        <div class="modal-body ">
        <form id="form" class="form-horizontal">


<?php echo form_open('control_crud/savepoint', 'role="form"'); ?>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date">
  </div>
  <div class="form-group">
    <label for="blue_thumb">Blue Thumb</label>
    <input type="text" class="form-control" id="blue_thumb" name="blue_thumb">
  </div>
  <div class="form-group">
    <label for="like_this">Like_this</label>
    <input type="text" class="form-control" id="like_this" name="like_this">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status">
  </div>
  <div class="form-group">
    <label for="award">Award</label>
    <input type="text-area" class="form-control" id="award" name="award">
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo site_url('control_crud') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
</div>

     </form>
   </div>
        </div>
    </div> <!-- modal end -->
