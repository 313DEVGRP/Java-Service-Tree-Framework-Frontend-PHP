<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$visit_skin_url.'/style.css">', 0);
?>

<!-- 접속자집계 시작 { -->
<section id="visit" class="ft_cnt">
    <h2>접속자집계</h2>
    <dl class="darkBack">
        <dt style="font-weight: normal;"><span></span> 오늘</dt>
        <dd style="font-weight: normal;"><?php echo number_format($visit[1]) ?></dd>
        <dt style="font-weight: normal;"><span></span> 어제</dt>
        <dd style="font-weight: normal;"><?php echo number_format($visit[2]) ?></dd>
        <dt style="font-weight: normal;"><span></span> 최대</dt>
        <dd style="font-weight: normal;"><?php echo number_format($visit[3]) ?></dd>
        <dt style="font-weight: normal;"><span></span> 전체</dt>
        <dd style="font-weight: normal;"><?php echo number_format($visit[4]) ?></dd>
    </dl>
    <?php if ($is_admin == "super") {  ?><a href="<?php echo G5_ADMIN_URL ?>/visit_list.php" class="btn_admin btn"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a><?php } ?>
</section>
<!-- } 접속자집계 끝 -->