<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- subheader begin -->
<section id="subheader" data-speed="2" data-type="background">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>회원가입</h1>
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
			<div class="col-md-10 col-md-offset-1">


<!-- 회원가입약관 동의 시작 { -->
<div>

    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_register.skin.php');
    ?>

    <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

    <p>회원가입약관 및 개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.</p>
    <div id="fregister_chkall">
        <label for="chk_all">전체선택</label>
        <input type="checkbox" name="chk_all"  value="1"  id="chk_all">

    </div>

        <h2><i class="fa fa-check-square-o" aria-hidden="true"></i> 회원가입약관</h2>
        <textarea readonly class="form-control"><?php echo get_text($config['cf_stipulation']) ?></textarea>
        <fieldset class="fregister_agree">
            <label for="agree11">회원가입약관의 내용에 동의합니다.</label>
            <input type="checkbox" name="agree" value="1" id="agree11">
        </fieldset>





        <h2><i class="fa fa-check-square-o" aria-hidden="true"></i> 개인정보처리방침안내</h2>
        <div>



		                        <div class="widget widget-text">
                            <h3>개인정보처리방침안내</h3>
                            <address>
                                <span><strong>목적:</strong>이용자 식별 및 본인여부 확인, 고객서비스 이용에 관한 통지, CS대응을 위한 이용자 식별</span>
                                <span><strong>항목:</strong>아이디, 이름, 비밀번호, 연락처 (이메일, 휴대전화번호)</span>
                                <span><strong>보유기간:</strong>회원 탈퇴 시까지</span>
                            </address>

                        </div>


        </div>

        <fieldset class="fregister_agree">
            <label for="agree21">개인정보처리방침안내의 내용에 동의합니다.</label>
            <input type="checkbox" name="agree2" value="1" id="agree21">
        </fieldset>


    <div class="btn_confirm">
        <input type="submit" class="btn btn-custom" value="회원가입">
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
    
    jQuery(function($){
        // 모두선택
        $("input[name=chk_all]").click(function() {
            if ($(this).prop('checked')) {
                $("input[name^=agree]").prop('checked', true);
            } else {
                $("input[name^=agree]").prop("checked", false);
            }
        });
    });

    </script>
</div>
<!-- } 회원가입 약관 동의 끝 -->

			</div>
		</div>
	</div>
</div>
