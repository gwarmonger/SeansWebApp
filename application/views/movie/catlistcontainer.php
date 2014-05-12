<table id="cattable"class="table lightpink">
	<?php foreach ($movies as $movie){?>
	<tr>
	<td><button id="item_<?=$movie['movieid'];?>" onClick="delCatItem('<?=$movie['movieid']?>')"class="deletebut">
    <span class="glyphicon glyphicon-remove"></span></button>
	<td><h4><?=$movie['title'];?></h4></td>
	<td><img src="<?=$movie['thumburl'];?>"/></td>
</tr>
<?php } ?>
</table>

<script>
function delCatItem(catitem){
    var answer = confirm ("Are you sure you want to remove this movie?");
    if (answer){
        $.ajax({
            url: "movie/deleteitem/",
            type: "POST",
            data: { "movieid" : catitem },
            dataType: "html",
            success:function(){
            var selector = '#item_'+catitem;
            $(selector).parents('tr').remove();
                } 
            });
            }
              }
</script>
