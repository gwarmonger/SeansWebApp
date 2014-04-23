	<div class="container">
	<div class="row">
	<div id="datepicker" class="col-md-12"></div>
</div>
	<script>
	$( document ).ready(function() {
	$("#datepicker").datepicker({ 'showOn': true,
				dateFormat: "yy-mm-dd",			
			    onSelect: function(dateText, inst) { 
			    	var jdate = dateText; //the first parameter of this function
			    	var dateAsObject = $(this).datepicker( 'getDate' ); //the getDate method
			      	console.log(jdate);
			      	var request = $.ajax({
						url: "memo/getmemo/",
						type: "POST",
						data: { "jdate" : jdate },
						dataType: "html",
						success: function(d){
							$( "#test" ).html( d );
						}
						});
			      	}
				});
			});
			</script>