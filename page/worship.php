<?php
/* www/page/worship.php */

include_once('../common.php');

// 페이지 제목
$g5['title'] = "예배안내";

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
			<div class="col-md-12 col-md-offset-2 text-center wow fadeInUp">


					<div class="col-md-4">
                        <div class="contact-info">
                            <span class="title">주일예배</span>
                            1부 오전 09:00<br>
                            2부 오전 11:00<br>
                            3부 오후 14:00<br>

						
						<div class="divider-line"></div>

                            <span class="title">청년부 예배</span>
                            오후 14:00

                            <div class="divider-line"></div>

                            <span class="title">새벽기도회</span>
                            오전 5:30~6:30
						
                        </div>


                    </div>
		                        <div class="col-md-4 wow fadeInUp">
                            <img src="<?php echo G5_THEME_URL; ?>/img/misc/pic-4.png" class="img-responsive" alt="">
                        </div>
	
			</div>
		</div>
	</div>
</div>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>