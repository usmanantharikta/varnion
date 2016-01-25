<?php if (!isset($ajax_req)): ?>
<div class="show-gallery"><p>View only Gallery</p></div>
<div class="show-images"><p>View only Images</p></div>
<div class="show-articles"><p>View only Articles</p></div>
<?php endif; ?>

<div id="ajax-content-container">
  <table class="table table-bordered table-condensed table-striped">
    <tr>
      <th>Title</th>
      <th>Type</th>
    </tr>
    <?php foreach ($node_list as $key=>$value): ?>
      <tr>
        <td><?php print $value->title; ?></td>
        <td width="10%"><?php print ucfirst($value->type); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<script type="text/javascript">
$(document).ready(function () {
  ajax_articles();
  ajax_images();
  ajax_gallery();
});

function ajax_articles() {
  $('.show-articles').click(function () {
    $.ajax({
      url: base_url+"index.php?/ajax_demo/give_more_data",
      async: false,
      type: "POST",
      data: "type=article",
      dataType: "html",
      success: function(data) {
        $('#ajax-content-container').html(data);
      }
    })
  });

}

function ajax_images() {
  $('.show-images').click(function () {
    $.ajax({
      url: base_url+"index.php?/ajax_demo/give_more_data",
      async: false,
      type: "POST",
      data: "type=image",
      dataType: "html",
      success: function(data) {
        $('#ajax-content-container').fadeIn().html(data);
      }
    })
  });
}

function ajax_gallery() {
  $('.show-gallery').click(function () {
    $.ajax({
      url: base_url+"index.php?/ajax_demo/give_more_data",
      async: false,
      type: "POST",
      data: "type=gallery",
      dataType: "html",
      success: function(data) {
        $('#ajax-content-container').html(data);
      }
    })
  });
}
</script>
