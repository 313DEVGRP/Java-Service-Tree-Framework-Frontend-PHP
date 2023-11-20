<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>



<section id="page-blog" class="no-padding">

                <div class="fullwidth">
                    <div class="one-fourth text-center">
                        <div class="title-area wow slideInLeft">
                            <span>Latest</span>
                            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span><h1><?php echo $bo_subject ?></h1></span></a>
                        </div>
                    </div>

                    <div class="three-fourth">
                        <div class="custom-carousel-2">

<?php for ($i=0; $i<count($list); $i++) {  ?>

                            <div class="item-blog">
                                <div class="inner">
                                    <span class="date"><?php echo $list[$i]['datetime2'] ?></span>
                                    <a href="#">
                                        <h3><?php
 
            echo "<a href=\"".$list[$i]['href']."\"> ";
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
            <span class=\"lt_cmt\">+ ".$list[$i]['comment_cnt']."</span>";

            ?></h3>
                                    </a>
                                    <span class="desc"><?=cut_str($list[$i]['wr_content'], 110, '…' )?>
                                    </span>
                                </div>
                            </div>

    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    게시물이 없습니다.
    <?php }  ?>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </section>
