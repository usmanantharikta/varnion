
</br>
</br>
<br>
<div class="container">
  <h2>Employers Data</h2>

  <!-- Trigger the modal with a button -->
  <button class="btn btn-raised btn-success"onclick="add_employ()"><i class="glyphicon glyphicon-plus"></i> Add New Employ Data</button>

	</br>
	</br>
    <table id="table"  class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Departement</th>
          <th>Division</th>
          <th>Location</th>
          <th style="width:125px;">Action</th>
          <th style="width:125px;">Add point</th>
        </tr>
      </thead>
      <tbody>
      </tbody>


    </table>




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
