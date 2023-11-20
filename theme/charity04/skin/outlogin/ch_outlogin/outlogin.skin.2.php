<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<div class="ol-after">
    <div class="ol-name">
        <div class="ol-logo">
            <img src="<?php echo G5_THEME_IMG_URL ?>/logo-dark.png" alt="<?php echo $config['cf_title']; ?>">
        </div>
        <h4><span>반갑습니다.</span> <?php echo $nick ?> <small>님</small></h4>
    </div>

    <ul class="ol-list list-unstyled">
        <?php if ($is_admin == 'super' || $is_auth) {  ?>
        <li><a href="<?php echo G5_ADMIN_URL ?>"><i class="fa fa-cog"></i> 관리자</a></li>
        <?php }  ?>
        <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php"><i class="fa fa-edit"></i> 정보수정</a></li>
        <li><a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fa fa-power-off"></i> 로그아웃</a></li>
    </ul>
</div>
