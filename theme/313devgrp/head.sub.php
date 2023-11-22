<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    // 상태바에 표시될 제목
    $g5_head_title = implode(' | ', array_filter(array($g5['title'], $config['cf_title'])));
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <title>313DEVGRP Community</title>

    <meta   charset="utf-8" />
    <meta   http-equiv="X-UA-Compatible"
            content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta   name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <meta   http-equiv="Expire"
            content="-1" />
    <meta   http-equiv="Keywords"
            content="313 DEV GRP" />
    <meta   http-equiv="Reply-to"
            content="313cokr@gmail.com" />
    <meta   http-equiv="Content-Language"
            content="Korean" />
    <meta   http-equiv="Last-Modified"
            content="Thu 01 Nov 2016 23:59:59" />
    <meta   http-equiv="Organization"
            content="www.313.co.kr" />
    <meta   http-equiv="Content-Type"
            content="text/html;charset=utf-8" />
    <meta   http-equiv="Cache-Control"
            content="no-cache" />
    <meta   http-equiv="Pragma"
            content="no-cache" />
    <meta   http-equiv="imagetoolbar"
            content="no" />
    <meta   http-equiv="content-Script-type"
            content="text/javascript" />
    <meta   http-equiv="content-Style-type"
            content="text/css" />

    <meta   name="robots"
            content="ALL, INDEX, FOLLOW" />
    <meta   name="Subject"
            content="313 DEV GRP" />
    <meta   name="Filename"
            content="index.html" />
    <meta   name="Author-Date"
            content="31 Oct 16" />
    <meta   name="Date"
            content="31 Oct 16" />
    <meta   name="Author"
            content="LeeDongmin" />
    <meta   name="Other Agent"
            content="LeeDongMin" />
    <meta   name="Email"
            content="313cokr@gmail.com" />
    <meta   name="Reply-To"
            content="313cokr@gmail.com" />
    <meta   name="Project"
            content="Java Service Tree Framework" />
    <meta   name="Status"
            content="Draft" />
    <meta   name="Location"
            content="South Korea" />
    <meta   name="distribution"
            content="313 DEV GRP" />
    <meta   name="Description"
            content="Standard Web Project" />
    <meta   name="verify-v1"
            content="Eal6+fiCjgKAZb5A6pRvSLmsh9NLF2AsqxqJrLuFoAs=" />
    <meta   name="Revision"
            content="1.0" />
    <meta   name="Generator"
            content="eclipse 3.6.1" />
    <meta   name="Classification"
            content="Development,Deployment" />
    <meta   name="Copyright"
            content="CopyRight@aRMS. All Rights Reserved" />
    <meta   name="title"
            content="313 DEV GRP" />
    <meta   name="revisit-after"
            content="7 days" />
    <meta   name="siteinfo"
            content="http://www.313.co.kr/robots.txt" />
    <meta   name="HandheldFriendly"
            content="True" />
    <meta   name="MobileOptimized"
            content="320" />
    <meta   name="format-detection"
            content="telephone=no">

    <meta   property="og:type"
            content="website" />
    <meta   property="og:title"
            content="313 DEV GRP" />
    <meta   property="og:url"
            content="http://www.313.co.kr/" />
    <meta   property="og:site_name"
            content="313 DEV GRP" />

<?php
if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>
<?php
$shop_css = '';
if (defined('_SHOP_')) $shop_css = '_shop';
echo '<link rel="stylesheet" href="'.run_replace('head_css_url', G5_THEME_CSS_URL.'/'.(G5_IS_MOBILE?'mobile':'default').$shop_css.'.css?ver='.G5_CSS_VER, G5_THEME_URL).'">'.PHP_EOL;
?>

    <!-- favicon -->
    <link   rel="icon"
            href="./img/313_logo.ico"
            type="image/x-icon" />
    <link   rel="shortcut icon"
            href="./img/313_logo.ico"
            type="image/x-icon" />

    <link   href="/313devgrp/reference/lightblue4/docs/css/application.min.css"
            rel="stylesheet" />
    <link   href="/313devgrp/arms/css/override.css"
            rel="stylesheet" />

    <!-- common libraries. required for every page-->
    <script type="text/javascript" src="/313devgrp/reference/lightblue4/docs/lib/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/313devgrp/reference/lightblue4/docs/lib/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/313devgrp/reference/jquery-plugins/jquery-cookie-1.4.1/jquery.cookie.js"></script>
    <script type="text/javascript" src="/313devgrp/reference/lightblue4/docs/lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>

    <script type="text/javascript" src="/313devgrp/reference/jquery-plugins/jnotify_v2.1/jquery/jNotify.jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="/313devgrp/reference/jquery-plugins/jnotify_v2.1/jquery/jNotify.jquery.css" media="screen" />

    <!-- Ladda -->
    <script type="text/javascript" src="/313devgrp/reference/jquery-plugins/Ladda-jQuery-0.6.0/dist/spin.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="/313devgrp/reference/jquery-plugins/Ladda-jQuery-0.6.0/js/ladda.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="/313devgrp/reference/jquery-plugins/Ladda-jQuery-0.6.0/dist/ladda.min.css" media="screen" />

    <!-- notification popup -->
    <script src="/313devgrp/reference/lightblue4/docs/lib/messenger/build/js/messenger.min.js"></script>
    <script src="/313devgrp/reference/lightblue4/docs/lib/messenger/build/js/messenger-theme-flat.js"></script>

    <!-- ckeditor4 성능 이슈로 인한 주석 처리. -->
    <script type="text/javascript" src="/313devgrp/reference/jquery-plugins/ckeditor4-4.22.1/ckeditor.js" charset="utf-8"></script>

    <script type="text/javascript" src="/313devgrp/reference/lightblue4/docs/js/app.js"></script>

    <!-- page interaction -->
    <script type="text/javascript" src="/313devgrp/reference/jquery-plugins/topbar.js"></script>

    <!-- page js -->
    <script type="text/javascript" src="http://www.313.co.kr:9999/arms/js/common.js" charset="utf-8"></script>
    <script type="text/javascript" src="/313devgrp/arms/js/common/dwrChat.js" charset="utf-8"></script>

<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
<?php if (defined('G5_USE_SHOP') && G5_USE_SHOP) { ?>
var g5_theme_shop_url = "<?php echo G5_THEME_SHOP_URL; ?>";
var g5_shop_url = "<?php echo G5_SHOP_URL; ?>";
<?php } ?>
<?php if(defined('G5_IS_ADMIN')) { ?>
var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
<?php } ?>
</script>



<?php
//add_javascript('<script src="'.G5_JS_URL.'/jquery-1.12.4.min.js"></script>', 0);
//add_javascript('<script src="'.G5_JS_URL.'/jquery-migrate-1.4.1.min.js"></script>', 0);
if (defined('_SHOP_')) {
    if(!G5_IS_MOBILE) {
        add_javascript('<script src="'.G5_JS_URL.'/jquery.shop.menu.js?ver='.G5_JS_VER.'"></script>', 0);
    }
} else {
    add_javascript('<script src="'.G5_JS_URL.'/jquery.menu.js?ver='.G5_JS_VER.'"></script>', 0);
}
add_javascript('<script src="'.G5_JS_URL.'/common.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/wrest.js?ver='.G5_JS_VER.'"></script>', 0);
add_javascript('<script src="'.G5_JS_URL.'/placeholders.min.js"></script>', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/font-awesome/css/font-awesome.min.css">', 0);

if(G5_IS_MOBILE) {
    add_javascript('<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>
</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?> style="overflow-x: hidden">
<?php
if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
    $sr_admin_msg = '';
    if ($is_admin == 'super') $sr_admin_msg = "최고관리자 ";
    else if ($is_admin == 'group') $sr_admin_msg = "그룹관리자 ";
    else if ($is_admin == 'board') $sr_admin_msg = "게시판관리자 ";

    echo '<div id="hd_login_msg">'.$sr_admin_msg.get_text($member['mb_nick']).'님 로그인 중 ';
    echo '<a href="'.G5_BBS_URL.'/logout.php">로그아웃</a></div>';
}