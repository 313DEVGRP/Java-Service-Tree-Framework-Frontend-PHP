<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 600;
$thumb_height = 400;
?>




 <section id="section-text">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center wow fadeInUp">
                            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span><h2><?php echo $bo_subject ?></h2></span></a>
                            <div class="divider-double"></div>
                        </div>
<?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img class="img-responsive" src="'.$img.'" alt="'.$thumb['alt'].'" >';
    ?>

                        <div class="col-md-4 wow fadeInRight" data-wow-delay=".5s">
                            <a href="<?php echo $list[$i]['href'] ?>" class="img-responsive" alt=""><?php echo $img_content; ?></a>
                            <h3> <?php


 
            echo "";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];



            echo "";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

             //echo $list[$i]['icon_reply']." ";
           // if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
            //if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;

            if ($list[$i]['comment_cnt'])  echo "
            <span class=\"lt_cmt\">+ ".$list[$i]['wr_comment']."</span>";

            ?></h3>
                            <?=cut_str($list[$i][wr_content], 95, '…' )?>[<?php echo $list[$i]['datetime2'] ?>]
							<br>
                            <br>
                            <a href="<?php echo $list[$i]['href'] ?>" class="st-btn">Read More</a>
                        </div>

    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    게시물이 없습니다.
    <?php }  ?>

                    </div>
                </div>
            </section>

