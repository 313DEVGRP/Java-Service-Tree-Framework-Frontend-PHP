////////////////////////////////////////////////////////////////////////////////////////
//Document Ready ( execArmsDocReady )
////////////////////////////////////////////////////////////////////////////////////////

function execDocReady() {

    var pluginGroups = [
        [	"/313devgrp/reference/light-blue/lib/vendor/jquery.ui.widget.js",
            "/313devgrp/reference/lightblue4/docs/lib/widgster/widgster.js"]
        // 추가적인 플러그인 그룹들을 이곳에 추가하면 됩니다.
    ];

    loadPluginGroupsParallelAndSequential(pluginGroups)
        .then(function() {

            console.log('모든 플러그인 로드 완료');

            //좌측 메뉴
            $('.widget').widgster();

            var str = window.location.href;
            if (str.indexOf("php/gnuboard5/") > 0) {

                if (str.indexOf("index.php") > 0) {
                    setSideMenu("sidebar_menu_community", "");
                } else if (str.indexOf("bo_table=notice") > 0) {
                    setSideMenu("sidebar_menu_community", "sidebar_menu_community_notice");
                } else if (str.indexOf("bo_table=qa") > 0) {
                    setSideMenu("sidebar_menu_community", "sidebar_menu_community_qa");
                } else if (str.indexOf("ibo_table=releasenote") > 0) {
                    setSideMenu("sidebar_menu_community", "sidebar_menu_community_releasenote");
                } else if (str.indexOf("bo_table=manual") > 0) {
                    setSideMenu("sidebar_menu_community", "sidebar_menu_community_manual");
                } else {
                    setSideMenu("sidebar_menu_community", "");
                }

            }
            // 스크립트 실행 로직을 이곳에 추가합니다.

        })
        .catch(function() {
            console.error('플러그인 로드 중 오류 발생');
        });

}

function middleProxy(){
    $.cookie('cookie', 'middle-proxy');
    location.href = '/swagger-ui/index.html';
}

function backendCore(){
    $.cookie('cookie', 'backend-core');
    location.href = '/swagger-ui.html';
}
