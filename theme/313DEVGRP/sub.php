<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>

    <div    class="logo"
    			    data-include="html/template/page-logo.html"
    			    style="left: 35px !important; position: absolute !important">
        </div>

        <nav    id="sidebar"
                class="sidebar nav-collapse collapse"
                data-include="html/template/page-sidebar.html">
        </nav>

        <div    class="wrap">
            <header class="page-header"
                    data-include="html/template/page-header.html">
            </header>

            <div    class="content container">
                <section    class="widgetheader"
                            data-include="html/template/content-header.html">
                </section>

                <div    class="row"
                        data-include="html/template/content-container.html">
                </div>

                <footer class="content-footer pull-right"
                        data-include="html/template/content-footer.html">
                </footer>
            </div>
        </div>

        <div    class="loader animated fadeIn darkBack hide"
                style="z-index: 999999">
            <span   class="spinner"
                    style="font-size: 13px !important">
                <i  class="fa fa-empire fa-spin"></i>
                어플리케이션 API Data를 가져오는 중입니다...
            </span>
        </div>

        <div    id="topicon"
                style="opacity: 1">
            <img    src="./img/topicon.gif"
                    alt="맨위로" />
        </div>

        <!-- upload template -->
        <script id="template-upload"
                type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td class="preview"><span class="fade"></span></td>
                <td class="name"><span>{%=file.name%}</span></td>
                <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                {% if (file.error) { %}
                <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
                {% } else if (o.files.valid && !i) { %}
                <td>
                    <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="bar" style="width:0%;"></div>
                    </div>
                </td>
                <td>{% if (!o.options.autoUpload) { %}
                    <button class="btn btn-primary btn-sm start">
                        <i class="fa fa-upload"></i>
                        <span>Start</span>
                    </button>
                    {% } %}</td>
                {% } else { %}
                <td colspan="2"></td>
                {% } %}
                <td>{% if (!i) { %}
                    <button class="btn btn-warning btn-sm cancel">
                        <i class="fa fa-ban"></i>
                        <span>Cancel</span>
                    </button>
                    {% } %}</td>
            </tr>
            {% } %}
        </script>

        <!-- The template to display files available for download -->
        <script id="template-download"
                type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                {% if (file.error) { %}
                <td></td>
                <td class="name"><span>{%=file.name%}</span></td>
                <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
                {% } else { %}
                <td class="preview">{% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.fileName%}" data-gallery="gallery" download="{%=file.fileName%}">
                    <img src="{%=file.iconFileName%}" width="80" height="80" class="thumbnail">
                    {% } %}</td>
                <td class="name" style="vertical-align: middle;">
                    <a href="{%=file.url%}" title="{%=file.fileName%}" data-gallery="{%=file.thumbnailUrl&&'gallery'%}" download="{%=file.fileName%}">{%=file.fileName%}</a>
                </td>
                <td class="size" style="vertical-align: middle;"><span>{%=o.formatFileSize(file.size)%}</span></td>
                <td colspan="2"></td>
                {% } %}
                <td style="vertical-align: middle;">
                    <button class="btn btn-danger btn-sm delete file-delete-btn" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="fa fa-trash"></i>
                    <span>Delete</span>
                    </button>
                </td>
            </tr>
            {% } %}
        </script>

<?php
include_once(G5_THEME_PATH.'/tail.php');