<?php
/* www/page/greeting.php */

include_once('../common.php');

// 페이지 제목
$g5['title'] = "인사말";

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
			            <!-- section begin -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-8 wow fadeInLeft" data-wow-delay=".5s">
                           <h1>채러티교회 방문을 환영합니다.</h1>
                            <p>모든 성도들이 세상 속의 소금과 빛으로 살아가며 삶으로 복음을 증거하는 선교사로 살아가는 교회입니다. 한 지역에만 머물지 않고 땅 끝을 향해 나아가는 교회입니다.</p>

                            <p>
                                성경의 사도행전은 28장으로 끝나지만 그 28장의 마지막은 마치 끝나지 않은 것 같은 여운을 두고 끝납니다. 이는 사도행전의 역사는 교회를 통해 계속되고 있다는 것입니다. 온누리교회는 오늘 이 시대에 사도행전을 써 내려가는 교회가 되고 싶습니다.					
                            </p>


                            <p class="wow fadeIn" data-wow-delay='1.5s'>
                                <img src="<?php echo G5_THEME_URL; ?>/img/misc/pic-5.png" alt="">
                            </p>

                        </div>

                        <div class="col-md-4 wow fadeInUp">
                            <img src="<?php echo G5_THEME_URL; ?>/img/misc/pic-4.png" class="img-responsive" alt="">
                        </div>
                    </div>
                </div>

            <!-- section close -->
		</div>
	</div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>