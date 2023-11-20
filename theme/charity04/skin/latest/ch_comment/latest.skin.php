<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 100;
$thumb_height = 100;
?>


            <section id="section-testimonial">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div id="testi-carousel" class="testi-slider text-center wow fadeInUp">


<?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="img-circle">';
    ?>
                                <div class="item">
                                    <?php echo $img_content; ?>
                                    <blockquote><?=cut_str($list[$i]['wr_content'], 96, '…' )?></blockquote>
                                    <span class="testi-by"><?php echo $list[$i]['datetime2'] ?></span>
                                </div>


    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    게시물이 없습니다.
    <?php }  ?>


                            </div>
                        </div>
                    </div>
                </div>
            </section>






