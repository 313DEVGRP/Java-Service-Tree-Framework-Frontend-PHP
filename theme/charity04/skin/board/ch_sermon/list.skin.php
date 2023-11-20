<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$thumb_width=70;
$thumb_height=30;

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 6;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

?>
<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $board['bo_subject'] ?></h1>
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
			<div class="col-md-12">
			<h5><span>Total <?php echo number_format($total_count) ?>건</span>
			<?php echo $page ?> 페이지</h5>
			<!-- 게시판 카테고리 시작 { -->
			<?php if ($is_category) { ?>
			<ul class="nav nav-tabs">
				<?php echo $category_option ?>
			</ul>
			<?php } ?>
			<!-- } 게시판 카테고리 끝 -->
			</div>
		</div>
		<div class="row">
		<div class="col-md-12">
			<?php if ($is_checkbox) { ?>
			<div id="gall_allchk">
				<label for="chkall">현재 페이지 게시물 전체</label>
				<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
			</div>
			<?php } ?>
			<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
			<input type="hidden" name="stx" value="<?php echo $stx ?>">
			<input type="hidden" name="spt" value="<?php echo $spt ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sst" value="<?php echo $sst ?>">
			<input type="hidden" name="sod" value="<?php echo $sod ?>">
			<input type="hidden" name="page" value="<?php echo $page ?>">
			<input type="hidden" name="sw" value="">
			<div class="tbl_head01 tbl_wrap">
				<?php
				for ($i=0; $i<count($list); $i++) {
				 ?>
				<div class="custom-col-3">
					<div class="left-col">
						<?php
							$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
							if ($thumb['src']) {
							   $img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$thumb_width.'" height="'.$thumb_height.'">';
							} elseif ($list[$i]['wr_1']) { // youtube image 출력
							   $img_content = '<img src="http://img.youtube.com/vi/'.$list[$i]['wr_1'].'/0.jpg" alt="'.$thumb['alt'].'" width="'.$thumb_width.'" height="'.$thumb_height.'">';
						} else {
							   $img_content = '<span style="display:inline-block;width:'.$thumb_width.'px;height:'.$thumb_height.'px;text-align:center;color:#ccc;line-height:2.0em">no<br>image</span>';
							}
							echo $img_content;
							?>
					</div>
					<div class="mid-col">
						
							<h3> <?php
									// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
									// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
									 ?>
									<?php
									$youtube_url = $list[$i]['wr_1'];
									$regExp = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
									preg_match($regExp, $youtube_url, $matches);
									$youtube_id = $matches[7];
									?><?php
								if ($list[$i]['is_notice']) // 공지사항
									echo '<strong>공지</strong>';
								else if ($wr_id == $list[$i]['wr_id'])
									echo "<span class=\"bo_current\">열람중</span>";
								else
									echo $list[$i]['num'];
								 ?>
								<a href="#">
								<?php if ($is_checkbox) { ?>

									<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?=cut_str($list[$i]['subject'],30)?></label>
									<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">

								<?php } ?>

								<?php
								echo $list[$i]['icon_reply'];
								if ($is_category && $list[$i]['ca_name']) {
								 ?>
								<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link">[<?php echo $list[$i]['ca_name'] ?>]</a>
								<?php } ?>

								<a href="<?php echo $list[$i]['href'] ?>">
									<?=cut_str($list[$i]['subject'],30)?>
									<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?>
								</a>
							</h3>
										</a>
										<div class="details"><span><a href="#"><?php echo $list[$i]['name'] ?></a>, <?php echo $list[$i]['datetime2'] ?></div>
					</div>
					<div class="right-col">
						<span class="js-modal-btn" data-video-id="<?php echo $list[$i]['wr_1'] ?>"><i class="fa fa-video-camera"></i></span>
						<a href="<?php echo $list[$i]['wr_4'] ?>"><i class="fa fa-volume-up"></i></a>
						<a href="<?php echo $list[$i]['href'] ?>"><i class="fa fa-file-pdf-o"></i></a>
					</div>
				</div>
				<?php } ?>
				<?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
			</div>
			<div class="row h1"><p class="hidden">한줄간격주기</p></div>
				<?php if ($rss_href) { ?>
				<a href="<?php echo $rss_href; ?>" class="btn-e btn-e-yellow" type="button"><i class="fa fa-rss"></i></a>
				<?php } ?>
				<a class="btn-e btn-e-dark" type="button" data-toggle="modal" data-target=".search-modal"><i class="fa fa-search"></i></a>
				<?php if ($list_href || $is_checkbox || $write_href) { ?>

				<?php if ($is_checkbox) { ?>
				<input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn-custom">
				<input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn-custom">
				<input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn-custom">
				<?php } ?>

					<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn btn-custom">목록</a><?php } ?>
					<?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="btn btn-custom">관리자</a><?php } ?>
					<?php if ($write_href) { ?><a href="<?=$write_href?>" class="btn btn-custom">글쓰기</a><?php } ?>
				<?php } ?>
			</form>
			<!-- 페이지 -->
<?php echo $write_pages;  ?>
			</div>
		</div>
	</div>
</div>
<?php /* 게시판 검색 모달 시작 */ ?>
<div class="modal fade search-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h5 class="modal-title"><i class="fa fa-search color-grey"></i> <strong><?php echo $board['bo_subject']; ?> 검색</strong></h5>
            </div>
            <div class="modal-body">
                <?php /* 게시판 검색 시작 */ ?>
                <fieldset id="bo_sch">
                    <form name="fsearch" method="get">
                    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                    <input type="hidden" name="sca" value="<?php echo $sca ?>">
                    <input type="hidden" name="sop" value="and">
                    <label for="sfl" class="sound_only">검색대상</label>

                        <label class="select">
                            <select name="sfl" id="sfl" class="form-control">
                                <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
                                <option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
                                <option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
                                <option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
                                <option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
                                <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
                                <option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
                            </select>
                            <i></i>
                        </label>
                        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                        <div class="input input-button">
                            <input type="text" name="stx" class="form-control" value="<?php echo stripslashes($stx); ?>" required id="stx">
                            <div class="button"><input type="submit" value="검색" class="btn btn-custom"></div>
                        </div>
                    </form>
                </fieldset>
                <?php /* 게시판 검색 끝 */ ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-custom" type="button"><i class="fa fa-times"></i> 닫기</button>
            </div>
        </div>
    </div>
</div>
<?php /* 게시판 검색 모달 끝 */ ?>
<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->