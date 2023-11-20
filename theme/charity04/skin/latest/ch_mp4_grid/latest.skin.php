<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$thumb_width = 360;
$thumb_height = 240;
?>

<section id="latest-sermons">
                <div class="container">
                    <div class="row">






                        <div class="col-md-8 col-md-offset-2 text-center wow fadeInUp">
                            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span><h2><?php echo $bo_subject ?></h2></span></a>
                            <div class="divider-double"></div>
                        </div>





<?php
for ($i=0; $i<count($list); $i++) {
    $list[$i]['file'] = get_file($bo_table, $list[$i]['wr_id']);


    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
	        if ($thumb['src']) {
	           $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$thumb_width.'" height="'.$thumb_height.'">';
	        } elseif ($list[$i]['wr_1']) { // youtube image 출력
	           $img_content = '<img src="http://img.youtube.com/vi/'.$list[$i]['wr_1'].'/0.jpg" alt="'.$thumb['alt'].'" width="'.$thumb_width.'" height="'.$thumb_height.'">';
		} else {
	           $img_content = '<span style="display:inline-block;width:'.$thumb_width.'px;height:'.$thumb_height.'px;text-align:center;color:#ccc;line-height:2.0em">no<br>image</span>';
	        }

    ?>
			<!-- event item begin -->
                    <div class="col-md-3 event-item">
                        <div class="inner">
                            <div class="left-col">
 <a href="<?php echo $list[$i]['wr_4'] ?>"><?php echo $img_content; ?></a>
                            </div>
                        </div>
                        <div class="desc">
                            <a href="#">
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

            ?>
								</h3>
                            </a>
                            <span class="text"><?php echo $list[$i]['datetime2'] ?>
                            </span>
                        </div>
                    </div>
                    <!-- event item close -->
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    게시물이 없습니다.
    <?php }  ?>






                    </div>
                </div>
            </section>
<iframe name="photoframe" id="photoframe" style="display:none;"></iframe>
