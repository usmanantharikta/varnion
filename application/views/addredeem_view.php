<div class="container">
<h1>Redeems data </h1>

<button class="btn btn-raised btn-success"onclick="add_reward()"><i class="glyphicon glyphicon-plus"></i> Add New Reward Data</button>
</br>
</br>
<!-- Table Employ Data-->
  <table id="table_redeem"  class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th rowspan="2" >ID</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">Date Creat</th>
        <th rowspan="2">Date Expire</th>
        <th rowspan="2">Available Qty</th>
        <th rowspan="2">Value</th>
        <th rowspan="2">Like This!</th>
        <th rowspan="2">Blue Thumbs</th>
        <th colspan="2">Combination</th>
        <th rowspan="2">Description</th>
        <th rowspan="2">Action</th>
      </tr>
    <tr>
      <th>LT</th>
      <th>BT</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
<br>
<br>
<ln>

  <!--modals for add point -->
  <div class="modal fade " id="modal_reward" role="dialog">
    <div class="modal-dialog">
      <div class ="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Person Form</h3>
          </div>
          <div class="modal-body ">
          <form action="#" id="form_reward" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
              <div class="form-body">
                  <div class="form-group">
                      <label class="control-label col-md-3">Code Redeems</label>
                      <div class="col-md-9">
                          <input name="id_reward" placeholder="Reward Id" class="form-control" type="text" >
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Name Redeem</label>
                      <div class="col-md-9">
                          <input name="name" placeholder="Name Redeem" class="form-control" type="text" >
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class ="control-label col-md-3"> Date Creat </label>
                    <div class="col-md-9">
                          <input name="date_create" placeholder="Date Create" class="form-control" type="date">
                          <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class ="control-label col-md-3"> Date Expire</label>
                    <div class="col-md-9">
                          <input name="date_exp" placeholder="Date Expire" class="form-control" type="date">
                          <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Available Quantity</label>
                      <div class="col-md-9">
                          <input name="available_qty" placeholder="Available Quantity" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Value</label>
                      <div class="col-md-9">
                          <input name="value" placeholder="Value" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Like This</label>
                      <div class="col-md-9">
                          <input name="like_this" placeholder="Like This" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Blue Thumb</label>
                      <div class="col-md-9">
                          <input name="blue_thumb" placeholder="Blue Thumb" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-8">Combination Requirement</label>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Like This</label>
                      <div class="col-md-9">
                          <input name="like" placeholder="Like This" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Blue Thumb</label>
                      <div class="col-md-9">
                          <input name="blue" placeholder="Blue Thumb" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-md-3">Description</label>
                      <div class="col-md-9">
                          <textarea name="description" placeholder="Description" class="form-control"></textarea>
                          <span class="help-block"></span>
                      </div>
                  </div>
              </div>
          </form>
          </div>
          <div class="modal-footer">
          <button type="button" id="btnSave_poin" onclick="savereward()" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
