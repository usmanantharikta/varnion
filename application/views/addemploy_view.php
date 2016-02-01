</br>
</br>
<br>
<div class="container">
  <!-- Trigger the modal with a button -->
  <button class="btn btn-raised btn-success"onclick="add_employ()"><i class="glyphicon glyphicon-plus"></i> Add New Employ Data</button>
  <button class="btn btn-raised btn-success"onclick="reload_table()"><i class="glyphicon glyphicon-plus"></i> Refresh</button>
	</br>
  <!-- Table Employ Data-->
  <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Employers Data</h3>
  </div>
  <div class="panel-body">
    <table id="table"  class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th style="width:40px">ID</th>
          <th>Name</th>
          <th style="width:50px">Gender</th>
          <th style="width:75px">Departement</th>
          <th style="width:75px">Division</th>
          <th style="width:75px" >Location</th>
          <th style="width:100px;">Action</th>
          <th style="width:160px;">Add point</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>


  <!-- Modal Add Employ-->
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
              <input type="hidden" value="" name="id"/>
              <div class="form-group">
                <label for="id_employ" class="col-md-2 control-label">ID</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="id_employ" name="id_employ">
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-md-2 control-label">Name</label>
                <div class="col-md-10">
			            <input type="text" class="form-control" id="name" name="name">
                </div>
              </div>
              <div class="form-group">
                <label for="departement" class="col-md-2 control-label">Departement</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="departement" name="departement">
                </div>
              </div>
              <div class="form-group">
                <label for="division" class="col-md-2 control-label">Division</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="division" name="division">
                </div>
              </div>
              <div class="form-group">
                <label for="location" class="col-md-2 control-label">Location</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" id="location" name="location">
                </div>
              </div>
			        <div class="form-group">
			  	      <label for="gender" class="col-md-2 control-label">Gender</label>
                <div class="col-md-10">
                  <div class="radio radio-primary">
                    <label>
			                   <input type="radio"  name="gender" id="gender" value="Male" checked>
                         Male
                    </label>
                  </div>
                  <div class="radio radio-primary">
                    <label>
                        <input type="radio"  name="gender" id="gender" value="Female">
                        Female
                    </label>
                  </div>
			            <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                  <button type="button" id="btnSave" onclick="save_employ()" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div>
			    </div>
        </form>
      </div>
    </div>
  </div> <!-- modal end -->

<!--modals for add point -->
<div class="modal fade " id="modal_for_add_poin" role="dialog">
  <div class="modal-dialog">
    <div class ="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Person Form</h3>
        </div>
        <div class="modal-body ">
        <form action="#" id="form_add_poin" class="form-horizontal">
            <input type="hidden" value="" name="id"/>
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">Employ ID</label>
                    <div class="col-md-9">
                        <input name="employ_id" placeholder="First Name" class="form-control" type="text" >
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Name</label>
                    <div class="col-md-9">
                        <input name="name" placeholder="Name" class="form-control" type="text" >
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                  <label class ="control-label col-md-3"> Date </label>
                  <div class="col-md-9">
                        <input name="date" placeholder="Date" class="form-control" type="date">
                        <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Quantity</label>
                    <div class="col-md-9">
                        <input name="quantity" placeholder="Quantity" class="form-control" type="text">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Status</label>
                    <div class="col-md-9">
                        <select name="status" class="form-control">
                            <option value="">--Select Status--</option>
                            <option value="Available">Available</option>
                            <option value="Redeemed">Redeemed</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Remarks</label>
                    <div class="col-md-9">
                        <textarea name="remarks" placeholder="Remarks" class="form-control"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" id="btnSave_poin" onclick="save_poin()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- End  modal for add point -->
</div>

<div class="modal fade" id="modal_dislike">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Panel primary</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" id="form_add_dislike">
              <fieldset>
                <input type="hidden" value="" name="id"/>
                <div class="form-group">
                  <label for="employ_id" class="col-lg-2 control-label">Id Employ</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="employ_id" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="name" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="date" class="col-lg-2 control-label">Date</label>
                  <div class="col-lg-10">
                    <input type="date" class="form-control" name="date" placeholder="Date">
                  </div>
                </div>
                <div class="form-group">
                  <label for="quantity" class="col-lg-2 control-label">Quantity</label>
                  <div class="col-lg-10">
                    <input type="number" class="form-control" name="date" placeholder="Quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="remarks" class="col-lg-2 control-label">Remarks</label>
                  <div class="col-lg-10">
                    <textarea class="form-control" name="remarks" placeholder="Remarks"></textarea>
                  </div>
                </div>
              </fieldset>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
        <!--end off panel-->
      </div>

    </div>
  </div>
</div>
