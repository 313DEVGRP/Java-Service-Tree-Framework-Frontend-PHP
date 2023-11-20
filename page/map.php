<?php
/* www/page/map.php */

include_once('../common.php');

// 페이지 제목
$g5['title'] = "오시는길";

include_once(G5_THEME_PATH.'/head.php');
?>


<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $g5['title'] ?></h1>
			</div>
		</div>
	</div>
</section>
<!-- subheader close -->

<div class="clearfix"></div>

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center wow fadeInUp">
				<article class="post-details">
					<div class="entry">
						<h2 class="shortcode_title">채러티교회</h2>
<div class="row h1"><p class="hidden"></p></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwlNqAEil52XRPHmSVb4Luk18qQG9GqcM&sensor=false&language=en"></script> 
 
<script> 
  function initialize() { 
var myLatlng = new google.maps.LatLng(37.2915450, 127.0430790); // 좌표값
  var mapOptions = { 
        zoom: 14, // 지도 확대레벨 조정
        center: myLatlng, 
        mapTypeId: google.maps.MapTypeId.ROADMAP 
  } 
  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions); 
  var marker = new google.maps.Marker({ 
position: myLatlng, 
map: map, 
title: "채러티교회" // 마커에 마우스를 올렸을때 간략하게 표기될 설명글
}); 
  } 
window.onload = initialize;
</script>
 
<div id="map_canvas" style="width: 100%; height: 400px; margin:0px;"></div>
						<pre class="brush: plain">서울특별시 영등포구 영등포본동 215-14 전화: 02-1234-1234</pre>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>