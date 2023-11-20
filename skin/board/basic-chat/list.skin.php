<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

@include_once(G5_LIB_PATH.'/geoiploc.php');
?>
<style type="text/css">
	#chat-window {
	  width: 100%;
	  height: 300px;
	  margin: 0 auto;
	  padding: 10px;
	  background-color: #f7f7f7;
	  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
	  overflow-y: scroll;
	  overflow-x: hidden;
	  border-radius: 5px;
	}

	#chat-window::-webkit-scrollbar {
	  width: 10px;
	}

	#chat-window::-webkit-scrollbar-thumb {
	  background-color: #db3232;
	  border-radius: 5px;
	}

	#chat-window p {
	  margin: 0;
	  font-size: 14px;
	}

	#chat-window .cmessages strong {
	  color: #db3232;
	}

	.input-box {
	  max-width: 100%;
	  height: 40px;
	  padding: 2px 5px;
	  font-size: 16px;
	  border: 0px solid #d7d7d7;
	  outline: none;
	}

	#send-button {
	  padding:0px;
	  font-size: 14px;
	  text-align:center;
	  width:60px;
	  height:40px;
	  line-height:40px;
	  background-color: #373737;
	  color: white;
	  border: none;
	  cursor: pointer;
	}

	#send-button svg {
	  fill: #fff;
	  height:40px;
	  line-height:40px;
	}
	#send-button:hover {
	  background-color: #db3232;
	}
	#send-button:hover svg {
	  height:40px;
	  line-height:40px;
	  fill: #fff;
	}

	.user {  position:relative; clear:both; width:auto; display:inline-block; margin-bottom:5px;
	padding: 0px 10px; background: transparent !important; border:0px !important;}
	.usericon { height:35px; width:35px; background:#e7e7e7; 
		border-radius:21px; border:1px solid #d7d7d7; } 
	.usericon img { height:35px; width:35px; border-radius:18px; }
	.namepart { height:40px; max-width:100%; line-height:40px; padding-left:5px; }
	.username { font-size: 13px; height:17.5px; line-height:17.5px; }
	.usertime { font-size: 12px; height:17.5px; line-height:17.5px; color:#999; }
	.cmessages  { font-size: 14px; clear:both; max-width:100%; padding:10px 15px; margin-bottom:10px;
	border-radius:20px; border:1px solid #d7d7d7; }
	.floatleft { float:left; }
	.floatright { float:right; }
	.textleft { text-align:left; }
	.textright { text-align:right; }

	.textright .sv_on { text-align:left; }

	.bgyellow { background:#ffeb34;  }
	.bgwhite { background:#fff;  }

	.username.textright { min-width:100px; }

	#input-area { margin:0px auto; max-width:94%; padding-top:15px; position:relative; clear:both; text-align:left; }
	#input-area .input-left { float:left; padding:0px; margin:0px; height:40px; width:calc(100% - 60px); }
	#input-area .input-left #talk { height:40px; width:100%; overflow:hidden; }

	#input-area .input-left #talk::placeholder { color: #aaa; }

	#input-area .input-right { float:right; padding:0px; margin:0px; height:40px; width:60px; text-align:right;}
	#input-area #user_id { width:70px; font-size:12px; height:40px; line-height:40px; 

	#bo_list ul li {
		 background: transparent !important;
	}

	.list_01 li {
		 border: 0px;
	}
</style>
<form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
	<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
	<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
	<input type="hidden" name="stx" value="<?php echo $stx ?>">
	<input type="hidden" name="spt" value="<?php echo $spt ?>">
	<input type="hidden" name="sst" value="<?php echo $sst ?>">
	<input type="hidden" name="sod" value="<?php echo $sod ?>">
	<input type="hidden" name="page" value="<?php echo $page ?>">
	<input type="hidden" name="sw" value="">

<?php if ($rss_href || $write_href) { ?>
	<ul class="<?php echo isset($view) ? 'view_is_list btn_top' : 'btn_top top btn_bo_user';?>">
		<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
		 <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b03 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
		 <?php if ($is_admin == 'super' || $is_auth) {  ?>
		<li>
			<button type="button" class="btn_more_opt btn_b03 btn is_list_btn" title="게시판 리스트 옵션"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
			<?php if ($is_checkbox) { ?>	
			  <ul class="more_opt is_list_btn">
					<li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
					<li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
					<li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
			  </ul>
			  <?php } ?>
		</li>
		 <?php } ?>
		<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="fix_btn write_btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li><?php } ?>
	</ul>
<?php } ?>
<!-- 게시판 목록 시작 -->
<div id="bo_list">
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>

    <div class="list_01">
        <?php if ($is_checkbox) { ?>
        <div class="all_chk chk_box">
            <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);" class="selec_chk">
            <label for="chkall">
            	<span></span>
            	<b class="sound_only">현재 페이지 게시물 </b> 전체선택
            </label>
        </div>
        <?php } ?>
        <ul>
            <?php for ($i=0; $i<count($list); $i++) { ?>

					<?php if ($list[$i]['mb_id'] == $member['mb_id']) { ?>
						<li class="user floatright">
							<div class="namepart floatright">
								<div class="username textright">
									<?php echo $list[$i]['name'] ?> <?php echo $list[$i]['datetime'] ?> 
								</div>
							</div>
							<div class="cmessages textright bgyellow">
								<?php echo nl2br($list[$i]['wr_content']);?>
							</div>
						</li><br>
					<?php } else { ?>
						<li class="user floatleft">
							<div class="namepart floatleft">
								<div class="username textleft">
									<?php echo $list[$i]['name'] ?> <?php echo $list[$i]['datetime'] ?>
								</div>
							</div>
							<div class="cmessages textleft bgwhite">
								<?php echo nl2br($list[$i]['wr_content']);?>
							</div>
						</li><br>
	            <?php } ?>
            <?php } ?>
            <?php if (count($list) == 0) { echo '<li class="empty_table">등록된 글이 없습니다.</li>'; } ?>
        </ul>
    </div>

	<div id="input-area">
		<div class="input-left">
			<input type="text" id="user_id" name="wr_name" value="<?php echo @$member['mb_nick'];?>" class="input-box" placeholder="닉네임" required style="float:left;">
			<textarea id="talk" name="wr_content" placeholder="무의미한 내용은 삼가해 주세요" required class="input-box" maxlength="100" style="width:calc(100% - 80px) !important; font-size:13px; float:left; padding-top:12px; margin-left:5px;"></textarea>
		</div>
		<div class="input-right">
			<div id="send-button">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					 <path d="M24 0l-6 22-8.129-7.239 7.802-8.234-10.458 7.227-7.215-1.754 24-12"/>
				</svg>
			</div>
		</div>
	</div>
	<input type="hidden" id="chat_id" class="input-box" placeholder="회원ID" value="<?php echo (@$member['mb_id'])? $member['mb_id']:'guest';?>">
	<div style="clear:both;">
	</div>
</div>

</form>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages; ?>

<div id="bo_list_total">
    <span>전체 <?php echo number_format($total_count) ?>건</span>
    <?php echo $page ?> 페이지
</div>

<fieldset id="bo_sch">
    <legend>게시물 검색</legend>
    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <?php echo get_board_sfl_select_options($sfl); ?>
    </select>
    <input name="stx" value="<?php echo stripslashes($stx) ?>" placeholder="검색어를 입력하세요" required id="stx" class="sch_input" size="15" maxlength="20">
    <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i> <span class="sound_only">검색</span></button>
    </form>
</fieldset>

<script>
  $(document).ready(function () {
    $('img[alt="no_profile"]').css('border-radius', '50%');

		$("#send-button").click(function() {
			var user = $("#user_id").val();
			var message = $("#talk").val();
			var mb_id = $("#chat_id").val();
			
			if ($("#talk").val().trim() === '') {
				 alert('내용을 입력하세요');
				 $("#talk").focus();
				 return false;
			} else if ($("#user_id").val().trim() === '') {
				 alert('회원로그인 후 이용 가능 합니다.');
				 //$("#user_id").focus();
				 return false;
			} 

			$.ajax({
				url: "<?php echo $board_skin_url;?>/write.php",
				type: "POST",
				dataType: "json",
				data: { bo_table: '<?php echo $bo_table; ?>', message: message, wr_name : user, mb_id : mb_id},
				success: function(response) {
					location.reload();
				},
				error: function(xhr, status, error) {
					console.log(xhr.responseText);
				}
			});
			$("#talk").val("");
		});
  });
</script>

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

    if (sw == 'copy')
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
<!-- 게시판 목록 끝 -->
