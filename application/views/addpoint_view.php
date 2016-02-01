<div class="container">
<br>
<br>
<br>
<h1>Poin Data </h1>
<button id="like_this"class="btn btn-raised btn-success"> Like This! Data</button>
<button id="blue_thumb" class="btn btn-raised btn-success"> Blue Thumb Data</button>
<button id="saldo" class="btn btn-raised btn-success"> Poin Saldo</button>
<br>
<div class="progress">
  <div class="progress-bar" style="width: 100%;"></div>
</div>
<div id="data_table">
  <div class="row">
  <div class="col-md-6" >
    <h2>Saldo Poin Like This!</h2>
    <table id="table_poin_like_this" class="table table-bordered table-striped tabel-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID </th>
          <th>Name</th>
          <th>Avalible</th>
          <th>Redeemed</th>

        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <h2>Saldo Poin Blue Thumbs</h2>
    <table id="table_poin_blue" class="table table-bordered table-striped tabel-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID </th>
          <th>Name</th>
          <th>Avalible</th>
          <th>Redeemed</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  </div>
  </div>

</div>

<!--modals for edit point -->
<div class="modal fade " id="modal_edit_poin" role="dialog">
  <div class="modal-dialog">
    <div class ="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Data Poin</h3>
        </div>
        <div class="modal-body ">
        <form action="#" id="form_edit_poin" class="form-horizontal">
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
                    <label class="control-label col-md-8">Quantity by Status</label>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Available</label>
                    <div class="col-md-9">
                        <input name="available" placeholder="Quantity Available" class="form-control" type="number">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Available</label>
                    <div class="col-md-9">
                        <input name="redeemed" placeholder="Quantity Redeemed" class="form-control" type="text">
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
        <button type="button" id="btnSave_poin" onclick="save_poin_edit()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
