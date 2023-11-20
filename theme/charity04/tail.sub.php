<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<?php if ($is_admin == 'super') {  ?><!-- <div style='float:left; text-align:center;'>RUN TIME : <?php echo get_microtime()-$begin_time; ?><br></div> --><?php }  ?>



</div>

    <!-- LOAD JS FILES -->


	<script src="<?php echo G5_THEME_URL; ?>/js/jquery-1.12.1.min.js"></script>
	<script src="<?php echo G5_THEME_URL; ?>/js/YouTubePopUp.jquery.js"></script>

    <script src="<?php echo G5_THEME_URL; ?>/js/jquery.min.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/jquery.isotope.min.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/easing.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/jquery.ui.totop.js"></script>
	<script src="<?php echo G5_THEME_URL; ?>/js/selectnav.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/ender.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/responsiveslides.min.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/owl.carousel.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/jquery.fitvids.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/jquery.plugin.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/jquery.countdown.js"></script>
	<script src="<?php echo G5_THEME_URL; ?>/js/moment.min.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/fullcalendar.min.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/fullcalendar-settings.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/countdown-custom.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/wow.min.js"></script>
    <script src="<?php echo G5_THEME_URL; ?>/js/custom.js"></script>

    <script src="<?php echo G5_THEME_URL; ?>/js/mediaelement-and-player.min.js"></script>
	<script src="<?php echo G5_THEME_URL; ?>/js/jquery.poptrox.min.js" type="text/javascript"></script>


    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script type="text/javascript" src="<?php echo G5_THEME_URL; ?>/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo G5_THEME_URL; ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>






<script src="<?php echo G5_THEME_URL; ?>/appleple-modal-video-290ae5f/js/modal-video.min.js"></script>

<script>
    $(".js-modal-btn").modalVideo();
</script>






<script type="text/javascript">

		$(window).load(function(){

				$('audio,video').mediaelementplayer();

			

		})



    </script>
<script>
$(window).load(function(){
	$(function(){
		var $portfolio = $('.mas-gallery');
		$portfolio.isotope({
		masonry: {
		  columnWidth: 1
		}
		});
	});
});
</script>
<script>
$(document).ready(function() {
	$(".tweets-slides").owlCarousel({
		autoPlay: 5000,
		slideSpeed:1000,
		singleItem : true,
		transitionStyle : "fadeUp",		
		navigation : false
	}); /*** TWEETS CAROUSEL ***/
	$(".products-carousel").owlCarousel({
		autoPlay: 8000,
		rewindSpeed : 3000,
		slideSpeed:2000,
		items : 2,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,2],
		itemsTablet : [768,2],
		itemsMobile : [479,1],
		navigation : false,
	}); /*** PRODUCTS CAROUSEL ***/
			$(".team-carousel").owlCarousel({
		autoPlay: 8000,
		rewindSpeed : 3000,
		slideSpeed:2000,
		items : 4,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [979,2],
		itemsTablet : [768,2],
		itemsMobile : [479,2],
		navigation : false,
	}); /*** TEAM CAROUSEL ***/
});	
$('audio,video').mediaelementplayer();
</script>





</body>
</html>
<?php echo html_end(); // HTML 마지막 처리 함수 : 반드시 넣어주시기 바랍니다. ?>