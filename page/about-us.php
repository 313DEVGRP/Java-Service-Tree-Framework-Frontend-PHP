<?php
/* www/page/about-us.php */

include_once('../common.php');

// 페이지 제목
$g5['title'] = "섬기는이";

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

		<!-- section begin -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center wow fadeInUp">
                            <div class="divider-double"></div>
                        </div>

                        <div class="col-md-10 col-md-offset-1">
                            <div class="custom-col-3 wow flipInX">
                                <div class="left-col">
                                    <img src="<?php echo G5_THEME_URL; ?>/img/sermons/pic%20(1).jpg" alt="" class="img-responsive">
                                </div>
                                <div class="mid-col">
                                    <a href="#">
                                        <h3>담임목사</h3>
                                    </a>
                                    <div class="details"><span>pastor@charity.or.kr</span></div>
                                </div>
                            </div>

                            <div class="custom-col-3 wow flipInX">
                                <div class="left-col">
                                    <img src="<?php echo G5_THEME_URL; ?>/img/sermons/pic%20(2).jpg" alt="" class="img-responsive">
                                </div>
                                <div class="mid-col">
                                    <a href="#">
                                        <h3>부목사</h3>
                                    </a>
                                    <div class="details"><span>pastor@charity.or.kr</span></div>
                                </div>
                              </div>


                            <div class="custom-col-3 wow flipInX">
                                <div class="left-col">
                                    <img src="<?php echo G5_THEME_URL; ?>/img/sermons/pic%20(3).jpg" alt="" class="img-responsive">
                                </div>
                                <div class="mid-col">
                                    <a href="#">
                                        <h3>부목사</h3>
                                    </a>
                                    <div class="details"><span>pastor@charity.or.kr</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- section close -->

</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>