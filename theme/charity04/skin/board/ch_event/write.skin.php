<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">
<link rel="stylesheet" href="<?php echo $board_skin_url ?>/css.css" />  
<script src="<?php echo $board_skin_url ?>/jquery-1.9.1.js"></script>
<script src="<?php echo $board_skin_url ?>/jquery-ui.js"></script>  
<script>  $(function() {
$( "#start_date" ).datepicker({dateFormat:"yy-mm-dd", numberOfMonths: 2, showButtonPanel: true});
$( "#end_date" ).datepicker({dateFormat:"yy-mm-dd", numberOfMonths: 2, showButtonPanel: true});
});  
</script>
<?php
$new_code = date("Ymdhms");
if($flag == "y") sql_query("update g5_write_$bo_table set wr_9 = '$new_code' where wr_id = '$wr_id' ");
$a = "";
$b = "";
$c = "";
$d = "";
$e = "";
$f = "";
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
				<!-- 게시물 작성/수정 시작 { -->
				<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
				<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
				<input type="hidden" name="w" value="<?php echo $w ?>">
				<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
				<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
				<input type="hidden" name="sca" value="<?php echo $sca ?>">
				<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
				<input type="hidden" name="stx" value="<?php echo $stx ?>">
				<input type="hidden" name="spt" value="<?php echo $spt ?>">
				<input type="hidden" name="sst" value="<?php echo $sst ?>">
				<input type="hidden" name="sod" value="<?php echo $sod ?>">
				<input type="hidden" name="page" value="<?php echo $page ?>">
				<?php
				$option = '';
				$option_hidden = '';
				if ($is_notice || $is_html || $is_secret || $is_mail) {
					$option = '';
					if ($is_notice) {
						$option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
					}

					if ($is_html) {
						if ($is_dhtml_editor) {
							$option_hidden .= '<input type="hidden" value="html1" name="html">';
						} else {
							$option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
						}
					}

					if ($is_secret) {
						if ($is_admin || $is_secret==1) {
							$option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
						} else {
							$option_hidden .= '<input type="hidden" name="secret" value="secret">';
						}
					}

					if ($is_mail) {
						$option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
					}
				}

				echo $option_hidden;
				?>

				<div class="meta">
					<?php if ($is_name) { ?>
					<label><input type="text" name="wr_name" id="wr_name" placeholder="이름 (필수)" value="<?php echo $name ?>" required class="required" maxlength="20" /></label>
					<?php } ?>
					<?php if ($is_password) { ?>
					<label><input type="password" name="wr_password" id="wr_password" placeholder="비밀번호 (필수)" required class="required" maxlength="20" /></label>
					<?php } ?>
					<?php if ($is_email) { ?>
					<div><label><input type="text" name="wr_email" id="wr_email" placeholder="이메일" value="<?php echo $email ?>" maxlength="100" /></label></div>
					<?php } ?>
					<?php if ($is_homepage) { ?>
					<label><input type="text" name="wr_homepage" id="wr_homepage" placeholder="홈페이지" value="<?php echo $homepage ?>" maxlength="50" /></label>
					<?php } ?>
					<?php if ($option) { ?>
					<?php echo $option ?>
					<?php } ?>
					<?php if ($is_category) { ?>

						<select name="ca_name" id="ca_name" required class="required" >
							<option value="">선택하세요</option>
							<?php echo $category_option ?>
						</select>
					<?php } ?>
					</div>

					 <? if($w != "") { ?>
					 <div class="meta">
							<input type="hidden" name="wr_9" value="<?php echo date("Ymdhms") ?>"> <? } ?>
							<? if($w == "u") { if($flag == "y") $wr_9 = $new_code; ?>
							<label for="wr_9">코드</strong></label>
							<input type="text" name="wr_9" value="<?php echo $wr_9 ?>" id="wr_9" readonly class="frm_input required" size="15" maxlength="255">&nbsp;&nbsp;&nbsp; <a href="<?php echo G5_HTTP_BBS_URL ?>/write.php?bo_table=<?php echo $bo_table ?>&amp;w=u&amp;wr_id=<?php echo $wr_id?>&amp;flag=y">새코드 발급</a>(복사를 한 행사의 경우 새코드명 발급을 반드시 눌러주세요)
					</div> 
					 <? } ?>
					 <div class="meta">

						   <label for="wr_subject"><strong class="sound_only">필수</strong></label>
						   <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" placeholder="제목 (필수)" required class="form-control">

					</div>
					<div class="meta">
							<label for="wr_1"><strong class="sound_only">필수</strong>
							<input type="text" name="wr_1" value="<?php echo $wr_1 ?>" id="wr_1t" required class="form-control" placeholder="주최">
					</div> 
					<div class="meta">

							<label for="wr_2">행사기간<strong class="sound_only">필수</strong></label>
							<?php $event_date = explode("~", $wr_2); ?>
							<input type="text" name="start_date" value="<?php echo $event_date[0] ?>" id="start_date" required class="frm_input required">  ~ <input type="text" name="end_date" value="<?php echo $event_date[1] ?>" id="end_date"  class="frm_input required">

					</div>
					<div class="meta">

						<label for="wr_3">마일리지<strong class="sound_only">필수</strong></label>
						<input type="text" name="wr_3" value="<?php echo $wr_3 ?>" id="wr_3" numeric class="frm_input required"> 

					</div>	
					<div class="meta">      
						 <label for="wr_link2">마일리지 한도<strong class="sound_only">필수</strong></label>
						 <input type="text" name="wr_link2" value="<?php echo $wr_link2 ?>" id="wr_link2" numeric  class="frm_input required"> 빈칸이면 무제한 사용 허용
					</div>
					<div class="meta"> 
						<label for="wr_4">참가비<strong class="sound_only">필수</strong></label>
						<input type="text" name="wr_4" value="<?php echo $wr_4 ?>" id="wr_4" required numeric class="frm_input required"> 원
					</div>	
					<div class="meta">        
						<label for="wr_5">신청 인원<strong class="sound_only"></strong></label>
						<input type="text" name="wr_5" value="<?php echo $wr_5 ?>" id="wr_5"  numeric class="frm_input required"> 명
					</div>
					<div class="meta">  
						<label for="wr_6">할인<strong class="sound_only"></strong></label>
						<? if($wr_6 != 1 ) $b = "checked"; else $a = "checked"; ?>
						<? if($wr_7 != 2 ) $c= "checked"; else $d = "checked"; ?>
						<input type="radio" name="wr_6" value="1" <?php echo $a ?> id="wr_6"   class="frm_input required" > 할인 
						<input type="radio" name="wr_6" value="2" id="wr_6"  <?php echo $b ?>  class="frm_input required" > 없음 &nbsp;&nbsp;&nbsp;&nbsp;
						 할인 방법 &nbsp;&nbsp; 
						<input type="radio" name="wr_7" value="1" <?php echo $c ?> id="wr_7"   class="frm_input required" > 정액 
						<input type="radio" name="wr_7" value="2" id="wr_7"  <?php echo $d ?>  class="frm_input required" >  % &nbsp;&nbsp;&nbsp;&nbsp;
						 할인 금액(혹은 %) 
						 <input type="text" name="wr_8" value="<?php echo $wr_8?>" id="wr_8" numeric  class="frm_input required">
					</div>
					<div class="meta">
						<label for="wr_10">상태<strong class="sound_only">필수</strong></label>
						<?php  if($write['wr_10'] == "접수중" || $write['wr_10'] == "") $e = "checked"; else $f = "checked"; ?>
							<input type="radio" name="wr_10" value="접수중" id="wr_10" <?php echo $e; ?> class="frm_input required">접수중
							<input type="radio" name="wr_10" value="마감" id="wr_10" <?php echo $f; ?> class="frm_input required"> 마감
					</div>

					<label for="wr_content">행사소개<strong class="sound_only">필수</strong></label>
						<?php if($write_min || $write_max) { ?>
						<!-- 최소/최대 글자 수 사용 시 -->
						<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
						<?php } ?>
						<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
						<?php if($write_min || $write_max) { ?>
						<!-- 최소/최대 글자 수 사용 시 -->
						<span id="char_count"></span>글자
						<?php } ?>

							<?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
							<input type="text" class="half-field form-control" name="wr_link<?php echo $i ?>" id="wr_link<?php echo $i ?>" placeholder="링크 #<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" maxlength="50" />
							<?php } ?>

							<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
								<input type="file" class="half-field form-control" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능">
								<?php if ($is_file_content) { ?>
								<input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="half-field form-control" size="50">
								<?php } ?>
								<?php if($w == 'u' && $file[$i]['file']) { ?>
								<input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
								<?php } ?>
						   <?php } ?>

								<?php if ($is_guest) { //자동등록방지  ?>자동등록방지
										<?php echo $captcha_html ?>
								<?php } ?>
				<div class="row h1"><p class="hidden"></p></div>
				<div class="btn_confirm write_div text-center">
					<input type="submit" value="글쓰기" id="btn_submit" accesskey="s" class="btn btn-custom">
					<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-custom">취소</a>
				</div>
				</form>
<!-- } 게시물 작성/수정 끝 -->
			</div>
		</div>
	</div>
</div>
<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
	$("#wr_content").on("keyup", function() {
		check_byte("wr_content", "char_count");
	});
});

<?php } ?>
function html_auto_br(obj)
{
	if (obj.checked) {
		result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
		if (result)
			obj.value = "html2";
		else
			obj.value = "html1";
	}
	else
		obj.value = "";
}

function fwrite_submit(f)
{
	<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

	var subject = "";
	var content = "";
	$.ajax({
		url: g5_bbs_url+"/ajax.filter.php",
		type: "POST",
		data: {
			"subject": f.wr_subject.value,
			"content": f.wr_content.value
		},
		dataType: "json",
		async: false,
		cache: false,
		success: function(data, textStatus) {
			subject = data.subject;
			content = data.content;
		}
	});

	if (subject) {
		alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
		f.wr_subject.focus();
		return false;
	}

	if (content) {
		alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
		if (typeof(ed_wr_content) != "undefined")
			ed_wr_content.returnFalse();
		else
			f.wr_content.focus();
		return false;
	}

	if (document.getElementById("char_count")) {
		if (char_min > 0 || char_max > 0) {
			var cnt = parseInt(check_byte("wr_content", "char_count"));
			if (char_min > 0 && char_min > cnt) {
				alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
				return false;
			}
			else if (char_max > 0 && char_max < cnt) {
				alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
				return false;
			}
		}
	}

	<?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

	document.getElementById("btn_submit").disabled = "disabled";

	return true;
}
</script>
