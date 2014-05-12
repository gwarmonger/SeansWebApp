<button id="showcats"class="whitebutton"><h4>My Movie Lists</h4></button>
<div class="catcon well well-lg">
   <table class="table">
<?php foreach ($category as $cat):?>
   <tr>
        <td class="shrink"><button id="thecat_<?=$cat['category'];?>"class="deletebut" onClick="delThisCat('<?=$cat['category']?>')"><span class="glyphicon glyphicon-remove"></span></button></td>
    <td><button class="whitebutton"onClick="getCatsLink('<?=$cat['category']?>')"><?=$cat['category'];?></button></td>
 <script>  
    function getCatsLink(category){
          var request = category;
                $.ajax({
            url: "movie/getcatitem/",
            type: "POST",
            data: { "category" : category },
            dataType: "html",
            success: function(cat){
              $( "#theitems" ).html( cat );
            }
            });
              }
    function delThisCat(thecat){
        var answer = confirm ("Are you sure you want to remove this Category?");
        if (answer){
                $.ajax({
            url: "movie/deletecat/",
            type: "POST",
            data: { "category" : thecat },
            dataType: "html",
            success:function(){
            var selector = '#thecat_'+thecat;
            $(selector).parents('tr').remove();
                } 
            });
              }
            }

      </script>
<?php endforeach; ?>
 </table>
 <div id="theitems">

  </div>
</div>
</div>


<script>
$(document).ready(function () {
        $('.catcon').hide();
        $('#showcats').click(function () {
        $('.catcon').slideToggle(200, function (){
          });
        });
      });
</script>