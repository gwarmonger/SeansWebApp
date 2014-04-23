<button id="showcats"class="btn btn-primary submitbut btn-block"><h4>My Movie Lists</h4></button>
<div class="newdvdcon catcon well well-lg">
<?php foreach ($category as $cat):?>
	 
      <table class="table table-striped">
        <tr>
        <td><h5><?=$cat['title']?></h5></td>
       <td><img src="<?=$cat['thumburl']?>"class="thumbnail"/></td>
    <td><h5><?=$cat['category'];?></h5></td>
  </table>
<?php endforeach; ?>
</div>
<div class="clearfix"></div>
</div> <!--close moviewrapper-->

<script>
$(document).ready(function () {
        $('.catcon').hide();
        $('#showcats').click(function () {
        $('.catcon').slideToggle(200, function (){
          });
        });
      });
</script>
