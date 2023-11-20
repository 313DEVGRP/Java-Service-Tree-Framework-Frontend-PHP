<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width = 640;
$thumb_height = 480;
$thumb2_width = 640;
$board_file_path = G5_DATA_PATH . '/file/' . $bo_table;
$board_file_url = G5_DATA_URL . '/file/' . $bo_table;
?>




<section class="section-title">
                    <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><h2><?php echo $bo_subject ?></h2></a>
                </section>

                <section>
                    <div class="container">
                        <div class="row">

<?php
for ($i=0; $i<count($list); $i++) {
    $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);


    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img class="img-responsive" src="'.$img.'" alt="'.$thumb['alt'].'" >';

    $thumb1_src = $board_file_url . "/" . thumbnail($list[$i]['file'][0]['file'], $board_file_path, $board_file_path, $thumb2_width, '', false, true);

    ?>

                            <div class="col-md-4 animated" data-animation="fadeInDownBig">
                                <a href="<?php echo $thumb["ori"] ?>" data-gal="prettyPhoto[galllery]"><span class="overlay"></span><?php echo $img_content; ?></a><div class="divider-single"></div>
                            </div>


<?php }  ?>
                        </div>
                    </div>
                </section>












