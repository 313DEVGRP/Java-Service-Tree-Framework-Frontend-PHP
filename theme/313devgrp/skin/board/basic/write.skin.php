<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<div    class="logo"
        data-include="../html/template/page-logo.html"
        style="left: 35px !important; position: absolute !important">
</div>

<nav    id="sidebar"
        class="sidebar nav-collapse collapse"
        data-include="../html/template/page-sidebar.html">
</nav>

<div    class="wrap">
    <header class="page-header"
            data-include="../html/template/page-header.html">
    </header>

    <div    class="content container">
        <section    class="widgetheader"
                    data-include="../html/template/content-header.html">
        </section>

        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <header>
                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                            <img src="/arms/img/leaf.gif"
                                 style="width: 25px; vertical-align: unset;">
                            Java Service Tree Framework DevTools
                        </h4>
                    </header>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- 게시물 작성/수정 시작 { -->
                                <section id="bo_w">
                                    <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

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
                                            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="notice" name="notice"  class="selec_chk" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice"><span></span>공지</label></li>';
                                        }
                                        if ($is_html) {
                                            if ($is_dhtml_editor) {
                                                $option_hidden .= '<input type="hidden" value="html1" name="html">';
                                            } else {
                                                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" class="selec_chk" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html"><span></span>html</label></li>';
                                            }
                                        }
                                        if ($is_secret) {
                                            if ($is_admin || $is_secret==1) {
                                                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="secret" name="secret"  class="selec_chk" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret"><span></span>비밀글</label></li>';
                                            } else {
                                                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
                                            }
                                        }
                                        if ($is_mail) {
                                            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="mail" name="mail"  class="selec_chk" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail"><span></span>답변메일받기</label></li>';
                                        }
                                    }
                                    echo $option_hidden;
                                    ?>

                                    <?php if ($is_category) { ?>
                                    <div class="bo_w_select write_div">
                                        <label for="ca_name" class="sound_only">분류<strong>필수</strong></label>
                                        <select name="ca_name" id="ca_name" required>
                                            <option value="">분류를 선택하세요</option>
                                            <?php echo $category_option ?>
                                        </select>
                                    </div>
                                    <?php } ?>

                                    <div class="bo_w_info write_div">
                                        <?php if ($is_name) { ?>
                                            <label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
                                            <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input half_input required" placeholder="이름" style="background: rgba(51, 51, 51, 0.4) !important;border: 1px solid rgba(51, 51, 51, 0.425) !important;">
                                        <?php } ?>

                                        <?php if ($is_password) { ?>
                                            <label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
                                            <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input half_input <?php echo $password_required ?>" placeholder="비밀번호" style="background: rgba(51, 51, 51, 0.4) !important;border: 1px solid rgba(51, 51, 51, 0.425) !important;">
                                        <?php } ?>

                                        <?php if ($is_email) { ?>
                                            <label for="wr_email" class="sound_only">이메일</label>
                                            <input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input half_input email " placeholder="이메일" style="background: rgba(51, 51, 51, 0.4) !important;border: 1px solid rgba(51, 51, 51, 0.425) !important;">
                                        <?php } ?>


                                        <?php if ($is_homepage) { ?>
                                            <label for="wr_homepage" class="sound_only">홈페이지</label>
                                            <input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input half_input" size="50" placeholder="홈페이지" style="background: rgba(51, 51, 51, 0.4) !important;border: 1px solid rgba(51, 51, 51, 0.425) !important;">
                                        <?php } ?>
                                    </div>

                                    <?php if ($option) { ?>
                                    <div class="write_div">
                                        <span class="sound_only">옵션</span>
                                        <ul class="bo_v_option">
                                        <?php echo $option ?>
                                        </ul>
                                    </div>
                                    <?php } ?>

                                    <div class="bo_w_tit write_div">
                                        <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>

                                        <div id="autosave_wrapper" class="write_div">
                                            <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" size="50" maxlength="255" placeholder="제목" style="background: rgba(51, 51, 51, 0.4) !important;border: 1px solid rgba(51, 51, 51, 0.425) !important;color:#f8f8f8;">
                                            <?php if ($is_member) { // 임시 저장된 글 기능 ?>
                                            <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
                                            <?php if($editor_content_js) echo $editor_content_js; ?>
                                            <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
                                            <div id="autosave_pop">
                                                <strong>임시 저장된 글 목록</strong>
                                                <ul></ul>
                                                <div><button type="button" class="autosave_close">닫기</button></div>
                                            </div>
                                            <?php } ?>
                                        </div>

                                    </div>

                                    <div class="write_div">
                                        <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
                                        <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
                                            <?php if($write_min || $write_max) { ?>
                                            <!-- 최소/최대 글자 수 사용 시 -->
                                            <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                                            <?php } ?>
                                            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                                            <?php if($write_min || $write_max) { ?>
                                            <!-- 최소/최대 글자 수 사용 시 -->
                                            <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                                            <?php } ?>
                                        </div>

                                    </div>

                                    <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
                                    <div class="bo_w_link write_div">
                                        <label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i><span class="sound_only"> 링크  #<?php echo $i ?></span></label>
                                        <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){ echo $write['wr_link'.$i]; } ?>" id="wr_link<?php echo $i ?>" class="frm_input full_input" size="50">
                                    </div>
                                    <?php } ?>

                                    <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
                                    <div class="bo_w_flie write_div">
                                        <div class="file_wr write_div">
                                            <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #<?php echo $i+1 ?></span></label>
                                            <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file ">
                                        </div>
                                        <?php if ($is_file_content) { ?>
                                        <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
                                        <?php } ?>

                                        <?php if($w == 'u' && $file[$i]['file']) { ?>
                                        <span class="file_del">
                                            <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                                        </span>
                                        <?php } ?>

                                    </div>
                                    <?php } ?>


                                    <?php if ($is_use_captcha) { //자동등록방지  ?>
                                    <div class="write_div">
                                        <?php echo $captcha_html ?>
                                    </div>
                                    <?php } ?>

                                    <div class="btn_confirm write_div">
                                        <a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel btn">취소</a>
                                        <button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성완료</button>
                                    </div>
                                    </form>

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
                                </section>
                                <!-- } 게시물 작성/수정 끝 -->

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <footer class="content-footer pull-right"
                data-include="../html/template/content-footer.html">
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