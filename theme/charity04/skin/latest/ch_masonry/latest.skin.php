<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$write_table =$g5['write_prefix'].$bo_table;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
$thumb_width = 270;
$thumb_height = 560;
$thumb2_width = 800;
$board_file_path = G5_DATA_PATH . '/file/' . $bo_table;
$board_file_url = G5_DATA_URL . '/file/' . $bo_table;
$row = sql_fetch(" SELECT bo_category_list FROM $g5[board_table] WHERE bo_table = '$bo_table' ");

//echo count($arr);

?> 
 <section id="section-gallery">
	<?
	for ($i=0; $i<count( (array) $lists); $i++) {
		echo "<li><a href=\"".$g5[bbs_path]."/bbs/board.php?bo_table=".$bo_table."&sca=".$arr[$i]."\">".$arr[$i]."</a></li>\n";
	}
	?>
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
	$img_content[]= '<img src="'.$img.'" alt="'.$thumb['alt'].'">';
$thumb1_src[] = $board_file_url . "/" . thumbnail($list[$i]['file'][0]['file'], $board_file_path, $board_file_path, $thumb2_width, '', false, true);
			}
	?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                             <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><span><h2><?php echo $bo_subject ?></h2></span></a>
                            <div class="divider-double"></div>
                        </div>
						
			<div id="gallery-isotope" class="col-md-12 wow fadeInUp" data-wow-delay=".25s">
				<div class="item long-pic"><a href="<?php echo $thumb1_src[0] ?>" data-gal="prettyPhoto[galllery]"><span class="overlay"></span></a><?php echo $img_content[0] ?></div>
				<div class="item small-pic"><a href="<?php echo $thumb1_src[1] ?>" data-gal="prettyPhoto[galllery]"><span class="overlay"></span></a><?php echo $img_content[1] ?></div>
				<div class="item wide-pic"><a href="<?php echo $thumb1_src[2] ?>" data-gal="prettyPhoto[galllery]"><span class="overlay"></span></a><?php echo $img_content[2] ?></div>
				<div class="item wide-pic"><a href="<?php echo $thumb1_src[3] ?>" data-gal="prettyPhoto[galllery]"><span class="overlay"></span></a><?php echo $img_content[3] ?></div>
				<div class="item small-pic"><a href="<?php echo $thumb1_src[4] ?>" data-gal="prettyPhoto[galllery]"><span class="overlay"></span></a><?php echo $img_content[4] ?></div>
			</div>
       </div> 
    </div>
</section>