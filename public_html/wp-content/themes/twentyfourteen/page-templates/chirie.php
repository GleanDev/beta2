<?php
/*
 * Template Name: Chirie
 */
 
 get_header();
?>


<script>
function initialize()
{
var mapProp = {
  center:new google.maps.LatLng(45.908742,25.120850),
  zoom:6,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>



<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
		<div id="googleMap" style="width:500px;height:380px;"></div>

<?php //echo getDistance('48.89526','-2.33293','48.72931','-1.92927'); ?>	

		</div><!-- #content -->
	</div><!-- #primary -->

</div><!-- #main-content -->


<?php 
get_footer();
?>