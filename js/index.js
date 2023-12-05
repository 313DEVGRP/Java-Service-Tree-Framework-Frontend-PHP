////////////////////////////////////////////////////////////////////////////////////////
//Document Ready ( execArmsDocReady )
////////////////////////////////////////////////////////////////////////////////////////

function execDocReady() {

    var pluginGroups = [
            [
                "/313devgrp/reference/light-blue/lib/vendor/jquery.ui.widget.js",
                "/313devgrp/reference/light-blue/lib/vendor/http_blueimp.github.io_JavaScript-Templates_js_tmpl.js",
                "/313devgrp/reference/light-blue/lib/vendor/http_blueimp.github.io_JavaScript-Load-Image_js_load-image.js",
                "/313devgrp/reference/light-blue/lib/vendor/http_blueimp.github.io_JavaScript-Canvas-to-Blob_js_canvas-to-blob.js",
                "/313devgrp/reference/light-blue/lib/jquery.iframe-transport.js",
                "/313devgrp/reference/light-blue/lib/jquery.fileupload.js",
                "/313devgrp/reference/light-blue/lib/jquery.fileupload-fp.js",
                "/313devgrp/reference/light-blue/lib/jquery.fileupload-ui.js"
            ],
            [
                "/313devgrp/reference/lightblue4/docs/lib/slimScroll/jquery.slimscroll.min.js",
                "/313devgrp/reference/jquery-plugins/unityping-0.1.0/dist/jquery.unityping.min.js",
                "/313devgrp/reference/light-blue/lib/bootstrap-datepicker.js",
                "/313devgrp/reference/jquery-plugins/datetimepicker-2.5.20/build/jquery.datetimepicker.min.css",
                "/313devgrp/reference/jquery-plugins/datetimepicker-2.5.20/build/jquery.datetimepicker.full.min.js",
                "/313devgrp/reference/lightblue4/docs/lib/widgster/widgster.js"
            ],
            [
                "/313devgrp/reference/jquery-plugins/select2-4.0.2/dist/css/select2_lightblue4.css",
                "/313devgrp/reference/jquery-plugins/select2-4.0.2/dist/js/select2.min.js",
                "/313devgrp/reference/jquery-plugins/lou-multi-select-0.9.12/css/multiselect-lightblue4.css",
                "/313devgrp/reference/jquery-plugins/lou-multi-select-0.9.12/js/jquery.quicksearch.js",
                "/313devgrp/reference/jquery-plugins/lou-multi-select-0.9.12/js/jquery.multi-select.js",
                "/313devgrp/reference/jquery-plugins/multiple-select-1.5.2/dist/multiple-select-bluelight.css",
                "/313devgrp/reference/jquery-plugins/multiple-select-1.5.2/dist/multiple-select.min.js"
            ],
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
