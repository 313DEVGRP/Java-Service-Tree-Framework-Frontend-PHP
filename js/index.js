////////////////////////////////////////////////////////////////////////////////////////
//Document Ready ( execArmsDocReady )
////////////////////////////////////////////////////////////////////////////////////////


// 매우 중요!!!
////////////////////////////////////////////////////////////////////////////////////////
// 이 파일은 꼭 gnuboard5\bbs\js\index.js 와 싱크되어야 합니다.
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

        [
            "/313devgrp/reference/jquery-plugins/jstree-v.pre1.0/_lib/jquery.cookie.js",
            "/313devgrp/reference/jquery-plugins/jstree-v.pre1.0/_lib/jquery.hotkeys.js",
            "/313devgrp/reference/jquery-plugins/jstree-v.pre1.0/jquery.jstree.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/media/css/jquery.dataTables_lightblue4.css",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Responsive/css/responsive.dataTables_lightblue4.css",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Select/css/select.dataTables_lightblue4.css",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/media/js/jquery.dataTables.min.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Responsive/js/dataTables.responsive.min.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Select/js/dataTables.select.min.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/RowGroup/js/dataTables.rowsGroup.min.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Buttons/js/dataTables.buttons.min.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Buttons/js/buttons.html5.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Buttons/js/buttons.print.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Buttons/js/jszip.min.js",
            "/313devgrp/reference/jquery-plugins/dataTables-1.10.16/extensions/Buttons/js/pdfmake.min.js"
        ]
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
