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
<div    class="logo"
        data-include="/php/gnuboard5/html/template/page-logo.html"
        style="left: 35px !important; position: absolute !important">
</div>

<nav    id="sidebar"
        class="sidebar nav-collapse collapse"
        data-include="/php/gnuboard5/html/template/page-sidebar.html">
</nav>

<div    class="wrap">
    <header class="page-header"
            data-include="/php/gnuboard5/html/template/page-header.html">
    </header>

    <div    class="content container">
        <section    class="widgetheader"
                    data-include="/php/gnuboard5/html/template/content-header.html">
        </section>

        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <header>
                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                            <img src="/313devgrp/arms/img/leaf.gif"
                                 style="width: 25px; vertical-align: unset;">
                            Java Service Tree Framework Community
                        </h4>
                    </header>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-9">
                                <section class="widget">
                                	<header>
                                		<h4>
                                			<span   class="font13"
                                					style="font-weight: bold">
                                					<i  class="fa fa-sort-amount-asc"
                                						style="vertical-align: middle;font-size: 14px;"></i>
                                					 게시판
                                			</span>
                                		</h4>
                                		<div class="widget-controls">
                                			<a  data-widgster="toleft"
                                				title="change width to left"
                                				href="#">
                                				<i class="glyphicon glyphicon-chevron-left"></i>
                                			</a>
                                			<a  data-widgster="expand"
                                				title="Expand"
                                				href="#">
                                				<i class="glyphicon glyphicon-chevron-up"></i>
                                			</a>
                                			<a  data-widgster="collapse"
                                				title="Collapse"
                                				href="#">
                                				<i class="glyphicon glyphicon-chevron-down"></i>
                                			</a>
                                			<a  data-widgster="toright"
                                				title="change width to right"
                                				href="#">
                                				<i class="glyphicon glyphicon-chevron-right"></i>
                                			</a>
                                			<a  data-widgster="restore"
                                				title="Restore"
                                				href="#">
                                				<span class="glyphicon glyphicon-repeat"></span>
                                			</a>
                                			<a  data-widgster="fullscreen"
                                				title="Fullscreen"
                                				href="#">
                                				<i class="glyphicon glyphicon-fullscreen"
                                					  style="font-size: 11px"></i>
                                			</a>
                                		</div>
                                	</header>
                                	<div class="body">
                                		<div class="gradient_middle_border" style="width: 100%; height: 2px"></div>
                                		<blockquote class="font13"
                                					style="margin-top: 5px;">
                                			Gnuboard5
                                			<div style="float: right;">
                                				<button class="btn btn-transparent btn-xs"
                                						style="margin-top: -3px; color: #acacac; background: rgba(51,51,51,.2); padding: 1px 9px;"
                                						onclick="window.open('docs/guide.html#product_inquiry_selection')">
                                					Help
                                					<i  class="fa fa-question"
                                						style="font-size: 14px; vertical-align: middle; color: #acacac"></i>
                                				</button>
                                			</div>
                                		</blockquote>
                                		<div class="clearfix"
                                			 style="margin-bottom: 10px; margin-top: 10px;">

                                			<!-- 게시판 목록 시작 { -->
                                			<div id="bo_list" style="width:<?php echo $width; ?>">

                                				<!-- 게시판 카테고리 시작 { -->
                                				<?php if ($is_category) { ?>
                                				<nav id="bo_cate">
                                					<h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
                                					<ul id="bo_cate_ul">
                                						<?php echo $category_option ?>
                                					</ul>
                                				</nav>
                                				<?php } ?>
                                				<!-- } 게시판 카테고리 끝 -->

                                				<form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">

                                				<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                                				<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
                                				<input type="hidden" name="stx" value="<?php echo $stx ?>">
                                				<input type="hidden" name="spt" value="<?php echo $spt ?>">
                                				<input type="hidden" name="sca" value="<?php echo $sca ?>">
                                				<input type="hidden" name="sst" value="<?php echo $sst ?>">
                                				<input type="hidden" name="sod" value="<?php echo $sod ?>">
                                				<input type="hidden" name="page" value="<?php echo $page ?>">
                                				<input type="hidden" name="sw" value="">

                                				<!-- 게시판 페이지 정보 및 버튼 시작 { -->
                                				<div id="bo_btn_top">
                                					<div id="bo_list_total" style="color:#acacac">
                                						<span>Total <?php echo number_format($total_count) ?>건</span>
                                						<?php echo $page ?> 페이지
                                					</div>

                                					<ul class="btn_bo_user">
                                						<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
                                						<?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
                                						<li>
                                							<button type="button" class="btn_bo_sch btn_b01 btn" title="게시판 검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">게시판 검색</span></button>
                                						</li>
                                						<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
                                						<?php if ($is_admin == 'super' || $is_auth) {  ?>
                                						<li>
                                							<button type="button" class="btn_more_opt is_list_btn btn_b01 btn" title="게시판 리스트 옵션"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
                                							<?php if ($is_checkbox) { ?>
                                							<ul class="more_opt is_list_btn">
                                								<li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
                                								<li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
                                								<li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
                                							</ul>
                                							<?php } ?>
                                						</li>
                                						<?php }  ?>
                                					</ul>
                                				</div>
                                				<!-- } 게시판 페이지 정보 및 버튼 끝 -->

                                				<div class="tbl_head01 tbl_wrap">
                                				    <div class="gradient_middle_border" style="width: 100%; height: 2px"></div>
                                					<table>
                                					<caption><?php echo $board['bo_subject'] ?> 목록</caption>
                                					<thead>
                                					<tr>
                                						<?php if ($is_checkbox) { ?>
                                						<th scope="col" class="all_chk chk_box">
                                							<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);" class="selec_chk">
                                							<label for="chkall">
                                								<span></span>
                                								<b class="sound_only">현재 페이지 게시물  전체선택</b>
                                							</label>
                                						</th>
                                						<?php } ?>
                                						<th scope="col">번호</th>
                                						<th scope="col">제목</th>
                                						<th scope="col">글쓴이</th>
                                						<th scope="col">조회</th>
                                						<?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천 </a></th><?php } ?>
                                						<?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천 </a></th><?php } ?>
                                						<th scope="col">날짜</th>
                                					</tr>
                                					</thead>
                                					<tbody>
                                					<?php
                                					for ($i=0; $i<count($list); $i++) {
                                						if ($i%2==0) $lt_class = "even";
                                						else $lt_class = "";
                                					?>
                                					<tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?> <?php echo $lt_class ?>">
                                						<?php if ($is_checkbox) { ?>
                                						<td class="td_chk chk_box">
                                							<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>" class="selec_chk">
                                							<label for="chk_wr_id_<?php echo $i ?>">
                                								<span></span>
                                								<b class="sound_only"><?php echo $list[$i]['subject'] ?></b>
                                							</label>
                                						</td>
                                						<?php } ?>
                                						<td class="td_num2">
                                						<?php
                                						if ($list[$i]['is_notice']) // 공지사항
                                							echo '<strong class="notice_icon">공지</strong>';
                                						else if ($wr_id == $list[$i]['wr_id'])
                                							echo "<span class=\"bo_current\">열람중</span>";
                                						else
                                							echo $list[$i]['num'];
                                						 ?>
                                						</td>

                                						<td class="td_subject" style="padding-left:<?php echo $list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '0'; ?>px">
                                							<?php
                                							if ($is_category && $list[$i]['ca_name']) {
                                							?>
                                							<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                                							<?php } ?>
                                							<div class="bo_tit">
                                								<a href="<?php echo $list[$i]['href'] ?>">
                                									<?php echo $list[$i]['icon_reply'] ?>
                                									<?php
                                										if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']);
                                									 ?>
                                									<?php echo $list[$i]['subject'] ?>
                                								</a>
                                								<?php
                                								if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
                                								// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
                                								if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);
                                								if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
                                								if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
                                								?>
                                								<?php if ($list[$i]['comment_cnt']) { ?><span class="sound_only">댓글</span><span class="cnt_cmt"><?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span><?php } ?>
                                							</div>
                                						</td>
                                						<td class="td_name sv_use"><?php echo $list[$i]['name'] ?></td>
                                						<td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
                                						<?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
                                						<?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
                                						<td class="td_datetime"><?php echo $list[$i]['datetime2'] ?></td>

                                					</tr>
                                					<?php } ?>
                                					<?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
                                					</tbody>
                                					</table>
                                				</div>
                                				<!-- 페이지 -->
                                				<?php echo $write_pages; ?>
                                				<!-- 페이지 -->

                                				<?php if ($list_href || $is_checkbox || $write_href) { ?>
                                				<div class="bo_fx">
                                					<?php if ($list_href || $write_href) { ?>
                                					<ul class="btn_bo_user">
                                						<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
                                						<?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
                                						<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
                                					</ul>
                                					<?php } ?>
                                				</div>
                                				<?php } ?>
                                				</form>

                                				<!-- 게시판 검색 시작 { -->
                                				<div class="bo_sch_wrap">
                                					<fieldset class="bo_sch">
                                						<h3>검색</h3>
                                						<form name="fsearch" method="get">
                                						<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                                						<input type="hidden" name="sca" value="<?php echo $sca ?>">
                                						<input type="hidden" name="sop" value="and">
                                						<label for="sfl" class="sound_only">검색대상</label>
                                						<select name="sfl" id="sfl">
                                							<?php echo get_board_sfl_select_options($sfl); ?>
                                						</select>
                                						<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                                						<div class="sch_bar">
                                							<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder=" 검색어를 입력해주세요">
                                							<button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                                						</div>
                                						<button type="button" class="bo_sch_cls" title="닫기"><i class="fa fa-times" aria-hidden="true"></i><span class="sound_only">닫기</span></button>
                                						</form>
                                					</fieldset>
                                					<div class="bo_sch_bg"></div>
                                				</div>
                                				<script>
                                				jQuery(function($){
                                					// 게시판 검색
                                					$(".btn_bo_sch").on("click", function() {
                                						$(".bo_sch_wrap").toggle();
                                					})
                                					$('.bo_sch_bg, .bo_sch_cls').click(function(){
                                						$('.bo_sch_wrap').hide();
                                					});
                                				});
                                				</script>
                                				<!-- } 게시판 검색 끝 -->
                                			</div>
                                		</div>
                                	</div>
                                </section>
                            </div>

                            <div class="col-sm-3">
                                <section class="widget">
                                    <header>
                                        <h4 style="font-size: 12px !important; font-weight: 300 !important;">
                                            ALM
                                            <small>Application Lifecycle Manage</small>
                                        </h4>
                                        <div class="widget-controls" style="top: 2px !important;">
                                            <a  data-widgster="toleft"
                                                title="change width to left"
                                                href="#">
                                                <i class="glyphicon glyphicon-chevron-left"></i>
                                            </a>
                                            <a  data-widgster="expand"
                                                title="Expand"
                                                href="#">
                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                            </a>
                                            <a  data-widgster="collapse"
                                                title="Collapse"
                                                href="#">
                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                            </a>
                                            <a  data-widgster="toright"
                                                title="change width to right"
                                                href="#">
                                                <i class="glyphicon glyphicon-chevron-right"></i>
                                            </a>
                                            <a  data-widgster="restore"
                                                title="Restore"
                                                href="#">
                                                <span class="glyphicon glyphicon-repeat"></span>
                                            </a>
                                            <a  data-widgster="fullscreen"
                                                title="Fullscreen"
                                                href="#">
                                                <i class="glyphicon glyphicon-fullscreen"
                                                   style="font-size: 11px">
                                                </i>
                                            </a>
                                        </div>
                                    </header>
                                    <div class="body">

                                        <div id="aside">
                                            <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                                            <?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                                        </div>

                                    </div>
                                </section>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>

        <footer class="content-footer pull-right"
                data-include="/php/gnuboard5/html/template/content-footer.html">
        </footer>
    </div>
</div>

<div    class="loader animated fadeIn darkBack hide"
        style="z-index: 999999">
    <span   class="spinner"
            style="font-size: 13px !important">
        <i  class="fa fa-empire fa-spin"></i>
        어플리케이션 API Data를 가져오는 중입니다...
    </span>
</div>

<div    id="topicon"
        style="opacity: 1">
    <img    src="../img/topicon.gif"
            alt="맨위로" />
</div>

<!-- config icon template -->
<script type="text/template" id="settings-template">
    <div class="setting clearfix" style="margin-top: 5px;">
        <div>Mode (NewTab)</div>
        <div class="btn-group" style="margin-top: 5px;">
            <button type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">Adm</button>
            <button type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">User</button>
        </div>
    </div>
    <div class="setting clearfix" style="margin-top: 15px;">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="btn-group" data-toggle="buttons-radio" style="margin-top: 5px;">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>" style="margin-top: 0px;padding: 1px 7px;">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>" style="margin-top: 0px;padding: 1px 7px;">Hide</button>
        </div>
    </div>
    <div class="setting clearfix" style="margin-top: 15px;">
        <div>TourGuide</div>
        <div class="btn-group" id="tourGuideButtons" data-toggle="buttons-radio" style="margin-top: 5px;">
            <button id="tour_guide_on" type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">On</button>
            <button id="tour_guide_off" type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">Off</button>
        </div>
    </div>
</script>

<!-- upload template -->
<script id="template-upload"
        type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
        <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
        <td>
            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                <div class="bar" style="width:0%;"></div>
            </div>
        </td>
        <td>{% if (!o.options.autoUpload) { %}
            <button class="btn btn-primary btn-sm start">
                <i class="fa fa-upload"></i>
                <span>Start</span>
            </button>
            {% } %}</td>
        {% } else { %}
        <td colspan="2"></td>
        {% } %}
        <td>{% if (!i) { %}
            <button class="btn btn-warning btn-sm cancel">
                <i class="fa fa-ban"></i>
                <span>Cancel</span>
            </button>
            {% } %}</td>
    </tr>
    {% } %}
</script>

<!-- The template to display files available for download -->
<script id="template-download"
        type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
        <td></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else { %}
        <td class="preview">{% if (file.thumbnailUrl) { %}
            <a href="{%=file.url%}" title="{%=file.fileName%}" data-gallery="gallery" download="{%=file.fileName%}">
            <img src="{%=file.iconFileName%}" width="80" height="80" class="thumbnail">
            {% } %}</td>
        <td class="name" style="vertical-align: middle;">
            <a href="{%=file.url%}" title="{%=file.fileName%}" data-gallery="{%=file.thumbnailUrl&&'gallery'%}" download="{%=file.fileName%}">{%=file.fileName%}</a>
        </td>
        <td class="size" style="vertical-align: middle;"><span>{%=o.formatFileSize(file.size)%}</span></td>
        <td colspan="2"></td>
        {% } %}
        <td style="vertical-align: middle;">
            <button class="btn btn-danger btn-sm delete file-delete-btn" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
            <i class="fa fa-trash"></i>
            <span>Delete</span>
            </button>
        </td>
    </tr>
    {% } %}
</script>

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
        f.action = g5_bbs_url+"/board_list_update.php";
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
    f.action = g5_bbs_url+"/move.php";
    f.submit();
}

// 게시판 리스트 관리자 옵션
jQuery(function($){
    $(".btn_more_opt.is_list_btn").on("click", function(e) {
        e.stopPropagation();
        $(".more_opt.is_list_btn").toggle();
    });
    $(document).on("click", function (e) {
        if(!$(e.target).closest('.is_list_btn').length) {
            $(".more_opt.is_list_btn").hide();
        }
    });
});
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
