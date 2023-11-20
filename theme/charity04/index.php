<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>


        <!-- slider -->
        <div id="slider">
            <!-- revolution slider begin -->
            <div class="fullwidthbanner-container">
                <div id="revolution-slider">
                    <ul>
                        <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">

                        </li>
                    </ul>
                </div>
            </div>
            <!-- revolution slider close -->
        </div>
        <!-- slider close -->
        <div class="clearfix"></div>

        <!-- content begin -->
        <div id="content" class="no-padding">

        </div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>