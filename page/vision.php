<?php
/* www/page/vision.php */

include_once('../common.php');

// 페이지 제목
$g5['title'] = "비전";

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
<!-- content begin -->
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4 animated" data-animation="fadeInLeftBig">
				<img src="<?php echo G5_THEME_URL; ?>/img/events/pic20(1).jpg" class="img-responsive" alt="">
			</div>

			<div class="col-md-4 animated" data-animation="fadeInDownBig">
				<img src="<?php echo G5_THEME_URL; ?>/img/events/pic20(2).jpg" class="img-responsive" alt="">
			</div>

			<div class="col-md-4 animated" data-animation="fadeInRightBig">
				<img src="<?php echo G5_THEME_URL; ?>/img/events/pic20(3).jpg" class="img-responsive" alt="">
			</div>
		</div>
	</div>
</div>


<section class="section-title">
                    <h2>목회 &amp; 철학</h2>
                </section>

                <div class="fullwidth">
                    <div class="fx custom-carousel-1">
                        <div class="item">
                            <div class="overlay">
                                <a href="#">
                                    <h3>채러티교회 사명선언문</h3>
                                </a>
                                <span class="desc">“채러티교회는 세상 사람들에게 복음을 전파하여 예수님을 믿게 한 후, 예배와 성도의 교제 가운데 하나님의 사랑을 깨닫게 하고, 말씀과 다양한 신앙훈련을 통해 예수님의 제자로 변화되어, 성령님의 인도로 교회와 세상 속에서 봉사와 선교적 삶을 통해 예수님의 제자로써의 삶을 실천하는 성도가 되게 한다.” 
                                </span>
                            </div>
                            <img src="<?php echo G5_THEME_URL; ?>/img/events/pic%20(1).jpg" alt="">
                        </div>

                        <div class="item">
                            <div class="overlay">
                                <a href="#">
                                    <h3>채러티교회 7대 비전</h3>
                                </a>
                                <span class="desc">예수님의 참된 제자로 살아가는 교회 / 선교와 전도에 앞장서는 교회 / 사랑을 실천하는 성숙한 교회 / 제자훈련을 통해 평신도를 훈련하는 교회/
 성경적 가치관을 올바로 깨닫고 변화되는 교회/ 차세대를 하나님 말씀과 기도로 세우는 교회 /가정이 말씀으로 굳건히 세워지는 교회
                                </span>
                            </div>
                            <img src="<?php echo G5_THEME_URL; ?>/img/events/pic%20(2).jpg" alt="">
                        </div>

                        <div class="item">
                            <div class="overlay">
                                <a href="#">
                                    <h3>채러티교회 7대 기능</h3>
                                </a>
                                <span class="desc">1. 말씀/ "하나님께 속한 자는 하나님의 말씀을 듣나니" (요 8:47) - 2. 기도 / "내 집은 기도하는 집이 되리라 하였거늘" (누가 19:46) - 3. 예배/ “예배하는 자가 신령과 진정으로 예배 할찌니라”(요 4:24) - 4. 전도/ “너희는 가서 모든 족속으로 제자를 삼아”(마 28:19) - 5. 섬김/ “각 사람을 완전한 자로 세우려 함이니”(골 1:28)- 6. 봉사/ “이는 성도를 온전케 하며 봉사의 일을 하게 하며”(엡 4:12)- 7. 선교/ “땅끝까지 이르러 내 증인이 되리라 하시니라”(행 1:8)
                                </span>
                            </div>
                            <img src="<?php echo G5_THEME_URL; ?>/img/events/pic%20(3).jpg" alt="">
                        </div>
                    </div>
                </div>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>