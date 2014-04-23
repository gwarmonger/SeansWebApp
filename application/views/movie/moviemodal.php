<!-- Modal -->
<div class="modal fade" id="addmovie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <?php   
        $modattr = array('id' => 'addform', 'name' => 'addform');
        $modattr2 = array('id' => 'movieid', 'type' => 'hidden', 'value'=> '', 'name'=>'movieid');
        $modattr3 = array('id' => 'title', 'type' => 'hidden', 'value'=> '', 'name'=>'title');
        $modattr4 = array('id' => 'thumburl', 'type' => 'hidden', 'value'=> '', 'name'=>'thumburl');
        echo form_open('movie/addmovie', $modattr);?>
        <span class="label label-default">Choose Category:</span>
        <select name="category">
          <?php
          foreach ($category as $cat)
          {?>
          <option value="<?=$cat['category'];?>"><?=$cat['category'];?></option>
          <?php }?>
        </select>
        <?php
        
        echo form_input($modattr2,'');
        echo form_input($modattr3,'');
        echo form_input($modattr4,'');
        echo form_close();
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="document.addform.submit()" class="btn btn-primary">Add to List</button>
      </div>
    </div>
  </div>
</div>