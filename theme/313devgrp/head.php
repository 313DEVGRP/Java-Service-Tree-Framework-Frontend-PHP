<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>

    <div id="tnb" class="darkBack">
    	<div class="inner">
            <header class="page-header" style="margin: 5px 0 0;">
                <div class="navbar">
                    <ul id="hd_qnb">
                        <li><a href="<?php echo G5_BBS_URL ?>/faq.php" class="font13">FAQ</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/qalist.php" class="font13">Q&A</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/new.php" class="font13">새글</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/current_connect.php" class="visit font13">접속자<strong class="visit-num"><?php echo connect('theme/basic'); // 현재 접속자수, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?></strong></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="hidden-xs">
                            <a
                                href="#"
                                id="search_toggle">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a  href="#"
                                title="Messages"
                                id="messages"
                                class="dropdown-toggle"
                                data-toggle="dropdown">
                                <i class="glyphicon glyphicon-comment"></i>
                            </a>
                            <ul id="messages_menu"
                                class="dropdown-menu messages"
                                role="menu">
                                <li role="presentation">
                                    <a  href="#"
                                        class="message">
                                        <img    src="../reference/lightblue4/docs/img/1.png"
                                                alt="" />
                                        <div class="details">
                                            <div class="sender">Jane Hew</div>
                                            <div class="text">Hey, John! How is it going? ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="message">
                                        <img    src="../reference/lightblue4/docs/img/2.png"
                                                alt="" />
                                        <div class="details">
                                            <div class="sender">Alies Rumiancaŭ</div>
                                            <div class="text">I'll definitely buy this template</div>
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="message">
                                        <img    src="../reference/lightblue4/docs/img/3.png"
                                                alt="" />
                                        <div class="details">
                                            <div class="sender">Michał Rumiancaŭ</div>
                                            <div class="text">Is it really Lore ipsum? Lore ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="text-align-center see-all">
                                        See all messages
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a  href="#"
                                title="8 support tickets"
                                class="dropdown-toggle"
                                data-toggle="dropdown">
                                <i class="glyphicon glyphicon-globe"></i>
                                <span class="count">8</span>
                            </a>
                            <ul id="support_menu"
                                class="dropdown-menu support"
                                role="menu">
                                <li role="presentation">
                                    <a  href="#"
                                        class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-important"><i class="fa fa-bell-o"></i></span>
                                        </div>
                                        <div class="details">Check out this awesome ticket</div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-warning"><i class="fa fa-question-circle"></i></span>
                                        </div>
                                        <div class="details">"What is the best way to get ...</div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-success"><i class="fa fa-tag"></i></span>
                                        </div>
                                        <div class="details">This is just a simple notification</div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-info"><i class="fa fa-info-circle"></i></span>
                                        </div>
                                        <div class="details">12 new orders has arrived today</div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="support-ticket">
                                        <div class="picture">
                                            <span class="label label-important"><i class="fa fa-plus"></i></span>
                                        </div>
                                        <div class="details">One more thing that just happened</div>
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="text-align-center see-all">
                                        See all tickets
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="hidden-xs">
                            <a  href="#"
                                id="settings"
                                title="Settings"
                                data-toggle="popover"
                                data-placement="bottom">
                                <i class="glyphicon glyphicon-cog"></i>
                            </a>
                        </li>
                        <li class="hidden-xs dropdown">
                            <a  href="#"
                                title="Account"
                                id="account"
                                class="dropdown-toggle"
                                data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                            </a>
                            <ul id="account_menu"
                                class="dropdown-menu account"
                                role="menu">
                                <li role="presentation"
                                    class="account-picture">

                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="link">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="link">
                                        <i class="fa fa-calendar"></i>
                                        Calendar
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a  href="#"
                                        class="link">
                                        <i class="fa fa-inbox"></i>
                                        Inbox
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="visible-xs">
                            <a  href="#"
                                class="btn-navbar"
                                data-toggle="collapse"
                                data-target=".sidebar"
                                title="">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <li class="hidden-xs logout">
                            <a href="#"
                                    class="link logout"><i class="glyphicon glyphicon-off"></i></a>
                        </li>
                    </ul>
                    <form   id="search_form"
                            class="hidden-xs navbar-form pull-right"
                            role="search">
                        <input  type="search"
                                class="form-control search-query"
                                placeholder="Search..." />
                    </form>
                    <div class="notifications pull-right" style="line-height: 21px !important;"></div>
                </div>
            </header>
		</div>
    </div>
    <div id="hd_wrapper">

        <div id="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/megazone.png" style="width:150px;" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>

        <ul class="hd_login">
            <?php
            $menu_datas = get_menu_db(0, true);
            $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
            $i = 0;
            foreach( $menu_datas as $row ){
                if( empty($row) ) continue;
                $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
            ?>
            <li class="gnb_1dli <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                <?php
                $k = 0;
                foreach( (array) $row['sub'] as $row2 ){

                    if( empty($row2) ) continue;

                    if($k == 0)
                        echo '<span class="bg">하위분류</span><div class="gnb_2dul"><ul class="gnb_2dul_box">'.PHP_EOL;
                ?>
                    <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                <?php
                $k++;
                }   //end foreach $row2

                if($k > 0)
                    echo '</ul></div>'.PHP_EOL;
                ?>
            </li>
            <?php
            $i++;
            }   //end foreach $row

            if ($i == 0) {  ?>
                <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
            <?php } ?>
            <?php if ($is_member) {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
            <?php if ($is_admin) {  ?>
            <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
            <?php }  ?>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
            <?php }  ?>
        </ul>
    </div>

    <script>

    $(function(){
        $(".gnb_menu_btn").click(function(){
            $("#gnb_all, #gnb_all_bg").show();
        });
        $(".gnb_close_btn, #gnb_all_bg").click(function(){
            $("#gnb_all, #gnb_all_bg").hide();
        });
    });

    </script>
</div>
<!-- } 상단 끝 -->


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr" class="darkBack">

    <div id="container">
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }