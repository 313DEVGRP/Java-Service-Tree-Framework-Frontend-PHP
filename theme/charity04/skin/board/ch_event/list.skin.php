<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

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
				<!-- 게시판 목록 시작 { -->

					<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
					<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
					<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
					<input type="hidden" name="stx" value="<?php echo $stx ?>">
					<input type="hidden" name="spt" value="<?php echo $spt ?>">
					<input type="hidden" name="sca" value="<?php echo $sca ?>">
					<input type="hidden" name="page" value="<?php echo $page ?>">
					<input type="hidden" name="sw" value="">

						<?php
						for ($i=0; $i<count($list); $i++) {
						 ?>

					<div class="event-listing">
						<div class="event">
						                            <ul class="bloglist-small">
							<div class="widget latest_news">

                                <li>
                                    <div class="date-box">
                                        <span class="day"><?php            
			echo $list[$i]['datetime2'] = date("d", strtotime($list[$i]['wr_datetime']));
			 ?></span>
                                        <span class="month"><?php            
			echo $list[$i]['datetime2'] = date("M", strtotime($list[$i]['wr_datetime']));
			 ?></span>


                                    </div>
                                    <div class="txt">
                                        <h3>
										<?php if ($is_checkbox) { ?>
										<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
										<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
										<?php } ?>
										<?php
										if ($list[$i]['ca_name']) { // 분류  ?>
										[<?php echo $list[$i]['ca_name']; ?>]<?php } ?>
										<a href="<?php echo $list[$i]['href'] ?>"><?php echo $list[$i]['subject'] ?></a></h3>
                                        
										<div>
                                            <div><span>인원: <?php echo $list[$i]['wr_5'] ?>명 &nbsp;&nbsp;
											기간:</i> <?php echo $list[$i]['wr_2'] ?> &nbsp;&nbsp;
											참가비: <?php echo number_format($list[$i]['wr_4']) ?>원 &nbsp;&nbsp;
											상태: <?php echo $list[$i]['wr_10'] ?> &nbsp;&nbsp;
											
											<span class="sound_only">조회</span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($view['wr_hit']) ?>&nbsp;&nbsp;
											
											<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo $list[$i]['comment_cnt']; ?><span class="sound_only">개</span><?php } ?></a> 
											                <?php
                // if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
                // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                // if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                // if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                // if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                // if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                // if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];

                 ?></span></a>
											</div>
                                        </div>
                                    </div>
                                </li>

							</div>
             				</ul>
						</div>
					</div>
                    




           <?php } ?>
        <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>

	<div class="row h1"><p class="hidden">한줄간격주기</p></div>
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

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>

<!-- 게시판 검색 시작 { -->

<!-- } 게시판 검색 끝 -->

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