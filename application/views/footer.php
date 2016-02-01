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
  var table_employ;
	var title;
  var table_like_this;
  var table_blue_thumbs;
  var edit_point_method;
  var point_method;
  //var table_redeem;
  var table_saldo_like;
  var save_reward;
  var table_re;
  //for display data employ
  $(document).ready(function()
  {
    table_employ = $('#table').DataTable(
      {

      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.

      // Load data for the table's content from an Ajax source
      "ajax":
      {
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
// add data employ
  function add_employ()
  {
	  save_method='add';
	  $('#form')[0].reset();
	  $('#myModal').modal('show');
	  $('.modal-title').text('Add New Employ Data');
  }

  //add reward
  function add_reward(){
    save_reward='add';
    $('#form_reward')[0].reset();
    //$('#from_add_reward')[0].reset();
    $('#modal_reward').modal('show');
    $('.modal-title').text('Add New Reward data')
  }

//edit data employ
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


  //for reload data tabel employ
  function reload_table()
  {
  	table_employ.ajax.reload(null,false); //reload datatable ajax
    table_like_this.ajax.reload(null,false);
    table_blue_thumbs.ajax.reload(null,false);
    //table_reward.ajax.reload(null,false);
  //  table_redeem;
    //table_saldo_like
  }
  function reload(){
    table_re.ajax.reload(null,false);
  }

  //for save data employ to database
  function save_employ()
  {
  		var url;
  		if(save_method=='add')
      {
  			url="<?php echo site_url('control_crud/ajax_add_employ')?>";
  		}
  		else
      {
  			url="<?php echo site_url('control_crud/ajax_update_employ')?>";
  		}

  		$.ajax(
        {
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

  //delete data employ
  function delete_employ(id)
  {
  		if(confirm('Are you sure delete this data?'))
      {
  			$.ajax(
          {
  				url:"<?php echo site_url('control_crud/ajax_delete_employ')?>/"+id,
  				type:"POST",
  				dataType: "JSON",
  				success: function (data)
          {
  					$('myModal').modal('hide');
  					reload_table();
  				},
  				error: function (jqXHR, textStatus, errorThrown)
          {
  					alert('Error delete data');
  				}
  			});
  		}
  	}
  //poin ajax
  // add point like this
  function like_this(id)
  {
  	save_method='like_this';
  	title='Add Data Like This';
  	add_like_this(id,save_method,title);
  }

  //add poin Blue Thumbs
  function add_blue_thumbs(id)
  {
  	save_method="blue_thumb";
  	title='Add Data Blue Thumbs';
  	add_like_this(id,save_method,title);
  }

//add Dislike
    function add_dislike(id)
    {
    $('#form_add_dislike')[0].reset();
    $.ajax(
      {
        url:"<?php echo site_url('control_crud/control_dislike/')?>/" + id ,
        type: "GET",
        dataType: "JSON",
        success: function(data)
    		{
    			$('[name="employ_id"]').val(data.id_employ);
    			$('[name="name"]').val(data.name);
    			$('#modal_dislike').modal('show');
    			$('.panel-title').text('Add Poin Dislike');
    		},
    		error: function (jqXHR, textStatus, errorThrown)
    		{
    				alert('Error get data from ajax');
    		}
      });
    }

  //get data employ id and name
  function add_like_this(id,save_method,title)
  {
  	$('#form_add_poin')[0].reset();
  	$.ajax(
      {
  		url : "<?php echo site_url('control_crud/ajax_like_this/')?>/" + id,
  		type:"GET",
  		dataType: "JSON",
  		success: function(data)
  		{
  			$('[name="employ_id"]').val(data.id_employ);
  			$('[name="name"]').val(data.name);
  			$('#modal_for_add_poin').modal('show');
  			$('.modal-title').text(title);
  		},
  		error: function (jqXHR, textStatus, errorThrown)
  		{
  				alert('Error get data from ajax');
  		}
  	});
  }

  //save data poin to data base
  function save_poin()
  {
  	var url;
  	if(save_method=='like_this')
    {
  		url="<?php echo site_url('control_crud/ajax_add_like_this')?>";
  	}
  	else
    {
  		url="<?php echo site_url('control_crud/ajax_add_blue_thumb')?>";
  	}

  	$.ajax({
  		url: url,
  		type :"POST",
  		data: $('#form_add_poin').serialize(),
  		dataType: "JSON",
  		success: function(data)
      {
  			$('#modal_for_add_poin').modal('hide')
  			alert('click on localhost/varnion_passport/index.php/control_crud/addpoin');
  			//reload_table();
  		},
  		error: function (jqXHR, textStatus, errorThrown)
      {
  			alert('Error add / update data');
  		}

  	});
  }

  //ajax load page
  $(document).ready(function(){
    $("#like_this").click(function(){
      $("#data_table").load("<?php echo base_url('assets/ajax/table_like2.html')?>");
      point_method='like_this';
    });
    $("#blue_thumb").click(function(){
      point_method="blue_thumb";
      $("#data_table").load("<?php echo base_url('assets/ajax/table_blue_thumb1.html')?>");
    });
    $("#saldo").click(function(){
      point_method="blue_thumb";
      $("#data_table").load("<?php echo base_url('assets/ajax/table_saldo1.html')?>");
    });
  });

  //edit poin like This
  function edit_poin_like_this(id)
  {
    edit_point_method="like_this";
    $('#form_edit_poin')[0].reset();
    $.ajax({
      url: "<?php echo site_url('control_crud/edit_poin_like_this_control')?>/"+id,
      type : "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="id"]').val(data.id);
        $('[name="employ_id"]').val(data.employ_id);
        $('[name="name"]').val(data.name);
        $('[name="date"]').val(data.date);
        $('[name="available"]').val(data.available);
        $('[name="redeemed"]').val(data.redeemed);
        $('[name="remarks"]').val(data.remarks);
        $('#modal_edit_poin').modal('show');
        $('.modal-title').text('Edit Poin Like This');
      },
      error: function (jqXHR, textStatus, errorThrown)
			{
					alert('Error get data from ajax');
			}
    });
  }

  //edit point blue thumbs
  function edit_point_blue_thumb(id)
  {
    edit_point_method="blue_thumb";
    $('#form_edit_poin')[0].reset();
    $.ajax({
      url: "<?php echo site_url('control_crud/edit_poin_blue_thumb_control')?>/"+id,
      type : "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="id"]').val(data.id);
        $('[name="employ_id"]').val(data.employ_id);
        $('[name="name"]').val(data.name);
        $('[name="date"]').val(data.date);
        $('[name="available"]').val(data.available);
        $('[name="redeemed"]').val(data.redeemed);
        $('[name="remarks"]').val(data.remarks);
        $('#modal_edit_poin').modal('show');
        $('.modal-title').text('Edit Poin Blue Thumb');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

  //save update point
  function save_poin_edit()
  {
    var url;
    if(edit_point_method=='like_this')
    {
      url="<?php echo site_url('control_crud/update_poin_like_this')?>";
    }
    else
    {
      url="<?php echo site_url('control_crud/update_point_blue_thumb')?>";
    }

    $.ajax(
      {
        url : url,
        type : "POST",
        data :$('#form_edit_poin').serialize(),
        dataType : "JSON",
        success: function(data){
          $('#modal_edit_poin').modal('hide');
          reload_table();
        },
        error: function(jqXHR, textStatus, errorThrown){
          alert('Error Edit point data');
        }
      }
    );
  }

  //delete point
  function delete_poin(id)
  {
      if(confirm('Are you sure delete this data?'))
      {
        var url;
        if(point_method=='like_this')
        {
          url="<?php echo site_url('control_crud/delete_poin_like_this/')?>";
        }
        else
        {
          url="<?php echo site_url('control_crud/delete_point_blue_thumb/')?>";
        }

        $.ajax(
          {
          url:url+"/"+id,
          type:"POST",
          dataType: "JSON",
          success: function (data)
          {
            $('myModal').modal('hide');
            reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error delete data');
          }
        });
      }
    }

    $(document).ready(function()
    {
      table_re = $('#table_redeem').DataTable(
        {

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.

        // Load data for the table's content from an Ajax source
        "ajax":
        {
            "url": "<?php echo site_url('control_crud/redeem_list_view')?>",
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

    $(document).ready(function() {
        $('#table_poin_like_this').DataTable( {
            "paging":   false,
            "ordering": true,
            "info": false,
            "ajax":
            {
                "url": "get_point_like_this",
                "type": "POST"
            },
        } );
    } );

    $(document).ready(function() {
        $('#table_poin_blue').DataTable( {
            "paging":   false,
            "ordering": true,
            "info": false,
            "ajax":
            {
                "url": "get_point_blue_thumb",
                "type": "POST"
            },
        } );
    } );

    function savereward(){
      var url;
      if(save_reward=='add')
      {
        url="<?php echo site_url('control_reward/add_reward')?>";
      }
      else
      {
      url="<?php echo site_url('control_reward/update_reward')?>";
      }

      $.ajax(
        {
        url: url,
        type :"POST",
        data: $('#form_reward').serialize(),
        dataType: "JSON",
        success: function(data){
          $('#modal_reward').modal('hide');
          reload();
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error add / update data');
        }

      });
    }

    function delete_reward(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        $.ajax(
          {
          url:"<?php echo site_url('control_reward/control_delete_reward')?>/"+id,
          type:"POST",
          dataType: "JSON",
          success: function (data)
          {
            $('#modal_reward').modal('hide');
            reload();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error delete data');
          }
        });
      }
    }

    function edit_reward(id)
    {
      save_reward='update';
      $('#form_reward')[0].reset();
      $.ajax({
        url : "<?php echo site_url('control_reward/control_edit_reward/')?>/" + id,
        type:"GET",
        dataType: "JSON",
        success: function(data)
        {
          $('[name="id"]').val(data.id);
          $('[name="id_reward"]').val(data.id_reward);
          $('[name="name"]').val(data.name);
          $('[name="date_create"]').val(data.date_create);
          $('[name="date_exp"]').val(data.date_exp);
          $('[name="available_qty"]').val(data.available_qty);
          $('[name="value"]').val(data.value);
          $('[name="like_this"]').val(data.like_this);
          $('[name="blue_thumb"]').val(data.blue_thumb);
          $('[name="like"]').val(data.like);
          $('[name="blue"]').val(data.blue);
          $('[name="description"]').val(data.description);
          $('#modal_reward').modal('show');
          $('.modal-title').text('Edit Data Reward');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });
    }

 </script>
</body>
</html>
