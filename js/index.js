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

                const urlParams = new URL(location.href).searchParams;
                const name = urlParams.get('name');
                console.log("check" + name);
                if (str.indexOf("index.php") > 0) {

                } else if (str.indexOf("bo_table=notice") > 0) {
                    alert("check");
                } else if (str.indexOf("index.php") > 0) {

                } else if (str.indexOf("index.php") > 0) {

                } else if (str.indexOf("index.php") > 0) {

                } else {
                    setSideMenu("sidebar_menu_community", "");
                }

            }

            // 스크립트 실행 로직을 이곳에 추가합니다.

        })
        .catch(function(error) {
            console.table('플러그인 로드 중 오류 발생' + error);
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
