<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/material.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/ripples.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script>
  $.material.init();
</script>

<script type="text/javascript">
	var save_method;
  var table;
	var title;
  var table_like_this;
  $(document).ready(function() {
    table = $('#table').DataTable({

      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.

      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('control_crud/ajax_list')?>",
          "type": "POST"
      },

      //Set column definition initialisation properties.
      "columnDefs": [
      {
        "targets": [ -1 ], //last column
        "orderable": false, //set not orderable
      },
      ],

    });
  });

  function add_employ(){
	  save_method='add';
	  $('#form')[0].reset();
	  $('#myModal').modal('show');
	  $('.modal-title').text('Add New Employ Data');
  }

	function edit_employ(id)
	{
		save_method='update';
		$('#form')[0].reset();

		$.ajax({
			url : "<?php echo site_url('control_crud/ajax_edit_employ/')?>/" + id,
			type:"GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="id"]').val(data.id);
				$('[name="id_employ"]').val(data.id_employ);
				$('[name="name"]').val(data.name);
			//	$('[name="gender"]').val(data.gender);
				$('[name="departement"]').val(data.departement);
				$('[name="division"]').val(data.division);
				$('[name="location"]').val(data.location);

				$('#myModal').modal('show');
				$('.modal-title').text('Edit Data Employ');
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
					alert('Error get data from ajax');
			}
		});
	}
		function reload_table()
		{
			table.ajax.reload(null,false); //reload datatable ajax
		}


	function save_employ(){
		var url;
		if(save_method=='add'){
			url="<?php echo site_url('control_crud/ajax_add_employ')?>";
		}
		else {
			url="<?php echo site_url('control_crud/ajax_update_employ')?>";
		}

		$.ajax({
			url: url,
			type :"POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data){
				$('#myModal').modal('hide');
				reload_table();
			},
			error: function (jqXHR, textStatus, errorThrown){
				alert('Error add / update data');
			}

		});
	}

	function delete_employ(id){
		if(confirm('Are you sure delete this data?')){
			$.ajax({
				url:"<?php echo site_url('control_crud/ajax_delete_employ')?>/"+id,
				type:"POST",
				dataType: "JSON",
				success: function (data){
					$('myModal').modal('hide');
					reload_table();
				},
				error: function (jqXHR, textStatus, errorThrown){
					alert('Error delete data');
				}
			});
		}
	}

//poin
function like_this(id){
	save_method='like_this';
	title='Add Data Like This';
	add_like_this(id,save_method,title);
}

function add_blue_thumbs(id)
{
	save_method="blue_thumb";
	title='Add Data Blue Thumbs';
	add_like_this(id,save_method,title);
}


function add_like_this(id,save_method,title)
{
	//save_method='like_this';
	$('#form_add_poin')[0].reset();

	$.ajax({
		url : "<?php echo site_url('control_crud/ajax_like_this/')?>/" + id,
		type:"GET",
		dataType: "JSON",
		success: function(data)
		{
			//$('[name="id"]').val(data.id);
			$('[name="employ_id"]').val(data.id_employ);
			$('[name="name"]').val(data.name);
		//	$('[name="gender"]').val(data.gender);
		//	$('[name="departement"]').val(data.departement);
		//	$('[name="division"]').val(data.division);
	//		$('[name="location"]').val(data.location);

			$('#modal_for_add_poin').modal('show');
			$('.modal-title').text(title);
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
				alert('Error get data from ajax');
		}
	});
}
function save_poin()
{
	var url;
	if(save_method=='like_this'){
		url="<?php echo site_url('control_crud/ajax_add_like_this')?>";
	}
	else {
		url="<?php echo site_url('control_crud/ajax_add_blue_thumb')?>";
	}

	$.ajax({
		url: url,
		type :"POST",
		data: $('#form_add_poin').serialize(),
		dataType: "JSON",
		success: function(data){
			$('#modal_for_add_poin').modal('hide')
			alert('click on localhost/varnion_passport/index.php/control_crud/addpoin');
			//reload_table();
		},
		error: function (jqXHR, textStatus, errorThrown){
			alert('Error add / update data');
		}

	});
}

//percobaan
$(document).ready(function(){
  $("#like_this").click(function(){
    $("#data_table").load("<?php echo base_url('assets/ajax/table_like_this.html')?>");
  });
  $("#blue_thumb").click(function(){
    $("#data_table").load("<?php echo base_url('assets/ajax/table_blue_thumb.html')?>");
  });
});

// like this table

// like this table


 </script>
</body>
</html>
