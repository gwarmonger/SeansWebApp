
	<!-- Section 1 -->
<section id="intro" data-speed="6" data-type="background">
    <div class="container">
        <div class="col-md-6">
			<img class="img-responsive" src="<?=base_url();?>images/seanface2.jpg"/>
		</div>
			<div class="col-md-6">
				<h3>A king amongst kings, Sean A ain't nothing to @#%! with.</h3>
				</div>
	</div>
    </div>
</section>

<!-- Section 2 -->
<section id="home" data-speed="4" data-type="background">
    <div class="container">
       <div class="col-md-6">
			<img class="img-responsive" src="<?=base_url();?>images/seanface3.jpg"/>
		</div>
    </div>
</section>

<!-- Section 3 -->
<section id="about" data-speed="2" data-type="background">
    <div class="container">
        Peek-a-boo!
    </div>
</section>

<script>
$(document).ready(function(){
   $window = $(window);
   $('section[data-type="background"]').each(function(){
     var $scroll = $(this);
      $(window).scroll(function() {                        
        var yPos = -($window.scrollTop() / $scroll.data('speed'));
        var coords = '50% '+ yPos + 'px';
        // move the background
        $scroll.css({ backgroundPosition: coords });   
      }); 
   }); 
});
document.createElement("section");
</script>