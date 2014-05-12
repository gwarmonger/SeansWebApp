<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Movie</h4>
      </div>
      <div class="modal-body">
        <?php   
        $bmodattr = array('id' => 'addform2', 'name' => 'addform2');
        $bmodattr2 = array('id' => 'movieid', 'type' => 'hidden', 'value'=> '', 'name'=>'movieid');
        $bmodattr3 = array('id' => 'title', 'type' => 'hidden', 'value'=> '', 'name'=>'title');
        $bmodattr4 = array('id' => 'thumburl', 'type' => 'hidden', 'value'=> '', 'name'=>'thumburl');
        echo form_open('movie/addmovie', $bmodattr);?>
        <span class="label label-default">Choose Category:</span>
        <select name="category">
          <?php
          foreach ($category as $cat)
          {?>
          <option value="<?=$cat['category'];?>"><?=$cat['category'];?></option>
          <?php }?>
        </select>
        <?php
        
        echo form_input($bmodattr2,'');
        echo form_input($bmodattr3,'');
        echo form_input($bmodattr4,'');
        echo form_close();
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="addItem2()" class="btn btn-primary">Add to List</button>
      </div>
    </div>
  </div>
</div>
<script>
function addItem2(){
$.post('addmovie/', $('#addform2').serialize())
$('#modal2').modal('hide')
}
</script>