<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
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

				<u><span>Total <?php echo number_format($total_count) ?>건</span>
				<?php echo $page ?> 페이지</u>

	
					</div>
				</div>
				<div class="row">
				<div class="col-md-12">

			<?php if ($rss_href || $write_href) { ?>

				<p class="text-right"><?php if ($rss_href) { ?><a href="<?php echo $rss_href ?>" class="btn btn-custom"><i class="fa fa-rss"></i></a><?php } ?>
				<?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="btn btn-custom">관리자</a><?php } ?>
				<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-custom">글쓰기</a><?php } ?></p>

			<?php } ?>

		<!-- 게시판 카테고리 시작 { -->
		<?php if ($is_category) { ?>
		<ul class="nav nav-tabs">
			<?php echo $category_option ?>
		</ul>
		<?php } ?>
		<!-- } 게시판 카테고리 끝 -->
		<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post" class="eyoom-form">
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
			<table>
			<caption><?php echo $board['bo_subject'] ?> 목록</caption>
			<thead>
			<tr>
				<th class="hidden-md hidden-sm hidden-xs">번호</th>
				<?php if ($is_checkbox) { ?>
				<th>
					<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
					<label class="checkbox">
						<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);"><i></i>
					</label>
				</th>
				<?php } ?>
				<th>제목</th>
				<th class="hidden-xs">글쓴이</th>
				<th class="hidden-xs"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회 <i class="fa fa-sort" aria-hidden="true"></i></a></th>
				<?php if ($is_good) { ?><th  class="hidden-xs"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천 <i class="fa fa-sort" aria-hidden="true"></i></a></th><?php } ?>
				<?php if ($is_nogood) { ?><th  class="hidden-xs"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천 <i class="fa fa-sort" aria-hidden="true"></i></a></th><?php } ?>
				<th  class="hidden-xs"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
			</tr>
			</thead>
			<tbody>
			<?php
			for ($i=0; $i<count($list); $i++) {
			 ?>
			<tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
				<td class="td-num hidden-md hidden-sm hidden-xs">
				<?php
				if ($list[$i]['is_notice']) // 공지사항
					echo '<strong class="color-navy">공지</strong>';
				else if ($wr_id == $list[$i]['wr_id'])
					echo '<strong class="color-red">열람</strong>';
				else
					echo $list[$i]['num'];
				 ?>
				</td>
				<?php if ($is_checkbox) { ?>
				<td>
					<label for="chk_wr_id_<?php echo $i; ?>" class="sound_only"><?php echo $list[$i]['subject']; ?></label>
					<label class="checkbox">
						<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id']; ?>" id="chk_wr_id_<?php echo $i; ?>"><i></i>
					</label>
				</td>
				<?php } ?>

				<td class="td_subject" style="padding-left:20px">
					<div class="bo_tit ellipsis">
						<?php if ($list[$i]['icon_reply']) { ?>
						<span class="reply-indication" style="margin-left:<?php echo $list[$i]['reply']; ?>px;"></span>
						<?php } ?>
						<a href="<?php echo $list[$i]['href']; ?>">
							
							<?php if ($is_category && $list[$i]['ca_name']) { ?>
							<span class="color-grey margin-right-5">[<?php echo $list[$i]['ca_name']; ?>]</span>
							<?php } ?>
							<?php if ($list[$i]['icon_new']) { ?>
							
							<?php } ?>
							<?php if ($list[$i]['icon_secret']) { ?>
							<i class="fa fa-lock margin-right-5"></i>
							<?php } ?>
							<?php if ($list[$i]['is_notice']) { ?>
							<strong><?php echo $list[$i]['subject']; ?></strong>
							<?php } else if ($wr_id == $list[$i]['wr_id']) { ?>
							<strong><?php echo $list[$i]['subject']; ?></strong>
							<?php } else { ?>
							<span class="subject"><?php echo $list[$i]['subject']; ?></span>
							<?php } ?>
							<?php if ($list[$i]['wr_comment']) { ?>
							<span class="sound_only">댓글</span><span class="td-comment">+<?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span>
							<?php } ?>
						</a>
					</div>

				</td>
				<td class="td-name hidden-xs"><?php echo $list[$i]['name'] ?></td>
				<td class="td-num hidden-xs"><?php echo $list[$i]['wr_hit'] ?></td>
				<?php if ($is_good) { ?><td class="td-num hidden-xs color-green"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
				<?php if ($is_nogood) { ?><td class="td-num hidden-xs color-yellow"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
				<td class="td-date hidden-xs"><?php echo $list[$i]['datetime2'] ?></td>
			</tr>
			<tr class="td-mobile visible-xs"><?php /* 767px 이하에서만 보임 */ ?>
				<td colspan="<?php echo $colspan; ?>">
					<span class="td-mobile-name"><?php echo $list[$i]['name'] ?></span>
					<span><i class="fa fa-eye"></i> <?php echo number_format($list[$i]['wr_hit']); ?></span>
					<?php if ($is_good) { ?>
					<span><i class="fa fa-thumbs-up"></i> <?php echo number_format($list[$i]['wr_good']); ?></span>
					<?php } ?>
					<?php if ($is_nogood) { ?>
					<span><i class="fa fa-thumbs-down"></i> <?php echo number_format($list[$i]['wr_nogood']); ?></span>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
			<?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
			</tbody>
			</table>
		</div>

		<?php if ($list_href || $is_checkbox || $write_href) { ?>
		<div class="bo_fx">
			<?php if ($list_href || $write_href) { ?>

				<?php if ($is_checkbox) { ?>
				<button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn-custom">선택삭제</button>
				<button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn-custom">선택복사</button>
				<button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn-custom">선택이동</button>
				<?php } ?>
				<?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn btn-custom">목록</a><?php } ?>
				<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-custom">글쓰기</a><?php } ?>

			<?php } ?>
		</div>
		<?php } ?>

		</form>

		<!-- 게시판 검색 시작 { -->
		<div class="pull-left">
        <?php if ($rss_href) { ?>
        <a href="<?php echo $rss_href; ?>" class="btn-e btn-e-yellow" type="button"><i class="fa fa-rss"></i></a>
        <?php } ?>
        <a class="btn-e btn-e-dark" type="button" data-toggle="modal" data-target=".search-modal"><i class="fa fa-search"></i></a>
    </div>
		<!-- } 게시판 검색 끝 -->

<?php /* 게시판 검색 모달 시작 */ ?>
<div class="modal fade search-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h5 class="modal-title"><strong><?php echo $board['bo_subject']; ?> 검색</strong></h5>
            </div>

            <div class="modal-body">
                <?php /* 게시판 검색 시작 */ ?>

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


                        <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                        <div class="input input-button">
                            <input type="text" name="stx" value="<?php echo stripslashes($stx); ?>" required id="stx">
                            <div class="button"><input type="submit" value="검색" class="btn btn-custom"></div>
                        </div>
                    </section>
                    </form>
   
                <?php /* 게시판 검색 끝 */ ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-custom" type="button"><i class="fa fa-times"></i> 닫기</button>
            </div>
        </div>
    </div>
</div>
<iframe name="photoframe" id="photoframe" style="display:none;"></iframe>
<?php /* 게시판 검색 모달 끝 */ ?>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>


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

                    </div>



                </div>
            </div>
        </div>