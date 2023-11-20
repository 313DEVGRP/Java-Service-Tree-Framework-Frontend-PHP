<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width = 640;
$thumb_height = 480;
?>




<section id="page-events" class="no-padding">
                <div class="fullwidth">
                    <div class="one-fourth text-center">
                        <div class="title-area wow slideInLeft">
                            <span>Upcoming</span>
                            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><h1><?php echo $bo_subject ?></h1></a>
                        </div>
                    </div>

                    <div class="three-fourth">
                        <div class="fx custom-carousel-1">

<?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    ?>

                            <div class="item">
                                <div class="overlay">
                                    <span class="time"><?php echo $list[$i]['datetime2'] ?></span>
                                   
                                        <h3><?php

 
            echo "<a href=\"".$list[$i]['href']."\">";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];



            echo "</a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

             //echo $list[$i]['icon_reply']." ";
           // if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
            //if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;

            if ($list[$i]['comment_cnt'])  echo "
            <span class=\"lt_cmt\">+ ".$list[$i]['wr_comment']."</span>";

            ?></h3>
 
                                    <span class="desc"><?=cut_str($list[$i]['wr_content'], 100, '…' )?>
                                    </span>
                                </div>
                                <a href="<?php echo $list[$i]['href'] ?>" class="lt_img"><?php echo $img_content; ?></a>
            

                              </div>

    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

            </section>









   


