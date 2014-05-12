	<div class="col-md-10">
	<div id="datepicker"></div> 
	<script>
	$( document ).ready(function() {
	$("#datepicker").datepicker({ 'showOn': true, 
				dateFormat: "yy-mm-dd",			
			    onSelect: function(dateText, inst) { 
			    	var jdate = dateText;
			    	var dateAsObject = $(this).datepicker( 'getDate' ); //the getDate method
			      	console.log(jdate);
			      	var request = $.ajax({
						url: "memo/getmemo/",
						type: "POST",
						data: { "jdate" : jdate },
						dataType: "html",
						success: function(d){
							$( "#thememo" ).html( d ); //send the memo to #thememo in memomain.php
						}
						});
			      	}
				});
			});
			</script>