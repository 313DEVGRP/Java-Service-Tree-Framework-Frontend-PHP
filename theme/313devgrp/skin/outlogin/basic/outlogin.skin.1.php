<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 전 아웃로그인 시작 { -->
<section id="ol_before" class="ol" style="margin-bottom: 42px;">
	<div id="ol_be_cate" style="display:none">
    	<h2><span class="sound_only">회원</span>로그인</h2>
    	<a href="<?php echo G5_BBS_URL ?>/register.php" class="join">회원가입</a>
    </div>
    <header class="text-align-center">
        <h4 style="font-size:13px;font-weight:bold;">
            Sign in to your account
        </h4>
    </header>
    <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off" style="padding:0px">
    <fieldset>
        <div class="ol_wr" style="margin-top: 18px;">
            <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
            <label for="ol_id" id="ol_idlabel" class="sound_only">회원아이디<strong>필수</strong></label>

            <div class="">
                <label for="username" class="" style="margin-bottom: 5px;">Username or email</label>

                <div class="input-group">
                    <span class="input-group-addon" id="addUsernameSkinFromCode">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="text" id="ol_id" name="mb_id" class="darkBack" required maxlength="20" placeholder="아이디">
                </div>
            </div>


            <label for="ol_pw" id="ol_pwlabel" class="sound_only">비밀번호<strong>필수</strong></label>

            <div class="" style="margin-top: 20px;">
                <label for="password" class="" style="margin-bottom: 5px;">Password</label>

                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="addPasswordSkinFromCode" style="padding: 10px 12px;">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input type="password" name="mb_password" id="ol_pw" class="darkBack" required maxlength="20" placeholder="비밀번호">
            </div>

            <div class="form-actions" style="margin-top: 0px; padding: 0px 0px 10px 0px;">
                <div id="kc-form-buttons" class="">
                  <input    type="submit" id="ol_submit" class="btn btn-block btn-lg btn-danger" value="Sign In" class="btn_b02"
                            style="padding: 0px;font-size: 14px;">
                </div>
            </div>

        </div>
        <?php
        // 소셜로그인 사용시 소셜로그인 버튼
        @include_once(get_social_skin_path().'/social_login.skin.php');
        ?>

    </fieldset>
    </form>
</section>

<?php echo visit('theme/basic'); // 접속자집계, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>

    <div id="ft_company" class="ft_cnt">
        <h2 style="margin-bottom: 10px;">사이트 정보</h2>
        <p class="ft_info font12 darkBack" style="text-align: left;">
            회사명 : 313DEVGRP / 대표 : 이동민<br>
            주소 : 강동구 천호동 570 강변그대가갤럭시 202-1402<br>
            통신판매업신고번호 :  제 77구 - 313호<br>
            개인정보관리책임자 :  이동민 / 전화 : 010-5093-7313<br>
        </p>
    </div>


<script>
jQuery(function($) {

    var $omi = $('#ol_id'),
        $omp = $('#ol_pw'),
        $omi_label = $('#ol_idlabel'),
        $omp_label = $('#ol_pwlabel');

    $omi_label.addClass('ol_idlabel');
    $omp_label.addClass('ol_pwlabel');

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    if( $( document.body ).triggerHandler( 'outlogin1', [f, 'foutlogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 전 아웃로그인 끝 -->
