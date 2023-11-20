<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

 <!-- footer begin -->
        <footer>

        </footer>
        <!-- footer close -->

<?php /* 검색 모달 시작 */ ?>
<div class="modal fade search-contents-modal" aria-hidden="true">
    <div class="modal-box">
        <div class="modal-content">
            <div class="modal-body">
                <div class="member-contents">
                    <div class="member-contnets-mid">
                        <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" class="eyoom-form">
                            <input type="hidden" name="sfl" value="wr_subject||wr_content">
                            <input type="hidden" name="sop" value="and">
                            <label for="sch_stx" class="sound_only"><strong>검색어 입력 필수</strong></label>
                            <div class="input input-button">
                                <input type="text" name="stx" id="head_sch_stx" class="sch_stx" maxlength="20" placeholder="검색어 입력">
                                <div class="button"><input type="submit"><i class="fa fa-search"></i></div>
                            </div>
                        </form>
                        <script>
                        function fsearchbox_submit(f)
                        {
                            if (f.stx.value.length < 2) {
                                alert("검색어는 두글자 이상 입력하십시오.");
                                f.stx.select();
                                f.stx.focus();
                                return false;
                            }

                            // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                            var cnt = 0;
                            for (var i=0; i<f.stx.value.length; i++) {
                                if (f.stx.value.charAt(i) == ' ')
                                    cnt++;
                            }

                            if (cnt > 1) {
                                alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                                f.stx.select();
                                f.stx.focus();
                                return false;
                            }

                            return true;
                        }
                        </script>
					</div>
					<div class="member-contnets-bottom">
						<button type="button" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php /* 검색 모달 끝 */ ?>

<?php /* 회원 버튼 콘텐츠 모달 시작 */ ?>
<div class="modal fade member-contents-modal" aria-hidden="true">
	<div class="modal-box">
		<div class="modal-content">
			<div class="modal-body">
				<div class="member-contents">
					<div class="member-contnets-mid">
						<?php echo outlogin('theme/ch_outlogin'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
					</div>
					<div class="member-contnets-bottom">
						<button type="button" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<!-- } 하단 끝 -->

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>