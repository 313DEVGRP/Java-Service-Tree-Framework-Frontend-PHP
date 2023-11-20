<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 전 아웃로그인 시작 { -->
<div class="ol-before">
    <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
        <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
        <div class="ol-logo">
            <img src="<?php echo G5_THEME_IMG_URL ?>/logo-dark.png" alt="<?php echo $config['cf_title']; ?>">
        </div><div class="clearfix"></div>
        <div class="ol-account">
            <span class="pull-left"><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></span><div class="clearfix"></div>
            <span class="pull-left"><a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">아이디/비번찾기</a>
            </span>
            <div class="clearfix"></div>
        </div>

            <label class="input">
                <input type="text" id="ol_id" name="mb_id" required class="form-control" placeholder="ID">
            </label>


            <label class="input">
                <input type="password" name="mb_password" id="ol_pw" required class="form-control" placeholder="PASSWORD">
            </label>

        <div>
            <input type="checkbox" name="auto_login" value="1" id="auto_login">
            <label for="auto_login"><span class="font-size-12">자동로그인</span></label>
        </div>
        <div class="btn-login">
            <button id="ol_submit" class="btn btn-custom" type="submit"><i class="fa fa-power-off"></i> 로그인</button>
        </div>
        <div class="clearfix"></div>

        <?php
        // 소셜로그인 사용시 소셜로그인 버튼
        @include_once(get_social_skin_path().'/social_outlogin.skin.1.php');
        ?>
    </form>
</div>

<script>
$omi = $('#ol_id');
$omp = $('#ol_pw');
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');

$(function() {
    $omi.focus(function() {
        $omi_label.css('visibility','hidden');
    });
    $omp.focus(function() {
        $omp_label.css('visibility','hidden');
    });
    $omi.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_id" && $this.attr('value') == "") $omi_label.css('visibility','visible');
    });
    $omp.blur(function() {
        $this = $(this);
        if($this.attr('id') == "ol_pw" && $this.attr('value') == "") $omp_label.css('visibility','visible');
    });

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            swal({
                html: true,
                title: "알림",
                text: "<div class='alert alert-info text-left font-size-12'>자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.<br><br>공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.</div><strong>자동로그인을 사용하시겠습니까?</strong>",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#0078FF",
                confirmButtonText: "확인",
                cancelButtonText: "취소",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $("#auto_login").attr("checked");
                } else {
                    $("#auto_login").removeAttr("checked");
                }
            });
        }
    });
});

function fhead_submit(f) {
    if (f.mb_id.value == '' || f.mb_id.value == $("#ol_id").attr("placeholder")) {
        alert("아이디를 입력해 주세요.");
        f.mb_id.select();
        f.mb_id.focus();
        return false;
    }
    if (f.mb_password.value == '' || f.mb_password.value == $("#ol_pw").attr("placeholder")) {
        alert("비밀번호를 입력해 주세요.");
        f.mb_password.select();
        f.mb_password.focus();
        return false;
    }
    return true;
}
</script>
