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

                <!-- 커뮤니티 시작 -->
                <div class="row">
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-12">
                                <section class="widget">
                                    <header>
                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                            <img src="/arms/img/leaf.gif"
                                                 style="width: 25px; vertical-align: text-bottom;">
                                            Dashboard
                                        </h4>
                                    </header>
                                    <div class="body">

                                        <!-- 커뮤니티 시작 -->
                                        <div class="row">

                                            <div class="col-sm-8">
                                                <section class="widget">
                                                    <header>
                                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                                            ARMS .
                                                            <small>Concept</small>
                                                        </h4>
                                                        <div class="widget-controls" style="top: 2px !important;">
                                                            <a  data-widgster="toleft"
                                                                title="change width to left"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-left"></i>
                                                            </a>
                                                            <a  data-widgster="expand"
                                                                title="Expand"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a  data-widgster="collapse"
                                                                title="Collapse"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                            <a  data-widgster="toright"
                                                                title="change width to right"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-right"></i>
                                                            </a>
                                                            <a  data-widgster="restore"
                                                                title="Restore"
                                                                href="#">
                                                                <span class="glyphicon glyphicon-repeat"></span>
                                                            </a>
                                                            <a  data-widgster="fullscreen"
                                                                title="Fullscreen"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-fullscreen"
                                                                   style="font-size: 11px">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </header>
                                                    <div class="body">

                                                        <div class="thumbnail">
                                                            <img src="/arms/img/concept.png" alt="">
                                                            <div class="caption">
                                                                <h4 style="font-size:14px;">A-RMS 와 JIRA 관계도</h4>
                                                                <p style="font-size:13px;"><strong>A-RMS</strong>는 요구사항을 관리하며, <strong>JIRA</strong>에 <strong>Issue</strong>로 전환하고, Project에 전파하고, 수집하여, 통계를 내는 시스템입니다.</p>
                                                                <p style="padding-top:10px;"><a href="http://www.313.co.kr/jira/secure/Dashboard.jspa" target="_blank" class="btn btn-warning btn-sm" style="font-size:13px;line-height: 30px;height: 30px;">Demo OnPremise Jira</a> <a href="https://313devgrp.atlassian.net" target="_blank" class="btn btn-warning btn-sm" style="font-size:13px;line-height: 30px;height: 30px;">Demo Cloud Jira</a></p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </section>
                                            </div>

                                            <div class="col-sm-4">
                                                <section class="widget">
                                                    <header>
                                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                                            공지사항 .
                                                            <small>Notice</small>
                                                        </h4>
                                                        <div class="widget-controls" style="top: 2px !important;">
                                                            <a  data-widgster="toleft"
                                                                title="change width to left"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-left"></i>
                                                            </a>
                                                            <a  data-widgster="expand"
                                                                title="Expand"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a  data-widgster="collapse"
                                                                title="Collapse"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                            <a  data-widgster="toright"
                                                                title="change width to right"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-right"></i>
                                                            </a>
                                                            <a  data-widgster="restore"
                                                                title="Restore"
                                                                href="#">
                                                                <span class="glyphicon glyphicon-repeat"></span>
                                                            </a>
                                                            <a  data-widgster="fullscreen"
                                                                title="Fullscreen"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-fullscreen"
                                                                   style="font-size: 11px">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </header>
                                                    <div class="body">

                                                        <?php
                                                            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                                                            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                                                            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                                                            echo latest('theme/basic', 'notice', 5, 24);		// 최소설치시 자동생성되는 공지사항게시판
                                                        ?>

                                                    </div>
                                                </section>
                                            </div>

                                            <div class="col-sm-4">
                                                <section class="widget">
                                                    <header>
                                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                                            업데이트 노트 .
                                                            <small>UpdateNote</small>
                                                        </h4>
                                                        <div class="widget-controls" style="top: 2px !important;">
                                                            <a  data-widgster="toleft"
                                                                title="change width to left"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-left"></i>
                                                            </a>
                                                            <a  data-widgster="expand"
                                                                title="Expand"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a  data-widgster="collapse"
                                                                title="Collapse"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                            <a  data-widgster="toright"
                                                                title="change width to right"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-right"></i>
                                                            </a>
                                                            <a  data-widgster="restore"
                                                                title="Restore"
                                                                href="#">
                                                                <span class="glyphicon glyphicon-repeat"></span>
                                                            </a>
                                                            <a  data-widgster="fullscreen"
                                                                title="Fullscreen"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-fullscreen"
                                                                   style="font-size: 11px">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </header>
                                                    <div class="body">

                                                        <?php
                                                            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                                                            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                                                            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                                                            echo latest('theme/basic', 'releasenote', 5, 24);		// 최소설치시 자동생성되는 공지사항게시판
                                                        ?>

                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                        <!-- 커뮤니티 끝 -->


                                        <!-- 암스 시작 -->
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <section class="widget">
                                                    <header>
                                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                                            사용자 메뉴얼 .
                                                            <small>userGuide</small>
                                                        </h4>
                                                        <div class="widget-controls" style="top: 2px !important;">
                                                            <a  data-widgster="toleft"
                                                                title="change width to left"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-left"></i>
                                                            </a>
                                                            <a  data-widgster="expand"
                                                                title="Expand"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a  data-widgster="collapse"
                                                                title="Collapse"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                            <a  data-widgster="toright"
                                                                title="change width to right"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-right"></i>
                                                            </a>
                                                            <a  data-widgster="restore"
                                                                title="Restore"
                                                                href="#">
                                                                <span class="glyphicon glyphicon-repeat"></span>
                                                            </a>
                                                            <a  data-widgster="fullscreen"
                                                                title="Fullscreen"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-fullscreen"
                                                                   style="font-size: 11px">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </header>
                                                    <div class="body">

                                                        <?php
                                                            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                                                            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                                                            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                                                            echo latest('theme/basic', 'manual', 5, 24);		// 최소설치시 자동생성되는 공지사항게시판
                                                        ?>

                                                    </div>
                                                </section>
                                            </div>

                                            <div class="col-sm-6">
                                                <section class="widget">
                                                    <header>
                                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                                            문의/답변 .
                                                            <small>Q/A Board</small>
                                                        </h4>
                                                        <div class="widget-controls" style="top: 2px !important;">
                                                            <a  data-widgster="toleft"
                                                                title="change width to left"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-left"></i>
                                                            </a>
                                                            <a  data-widgster="expand"
                                                                title="Expand"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a  data-widgster="collapse"
                                                                title="Collapse"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                            <a  data-widgster="toright"
                                                                title="change width to right"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-right"></i>
                                                            </a>
                                                            <a  data-widgster="restore"
                                                                title="Restore"
                                                                href="#">
                                                                <span class="glyphicon glyphicon-repeat"></span>
                                                            </a>
                                                            <a  data-widgster="fullscreen"
                                                                title="Fullscreen"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-fullscreen"
                                                                   style="font-size: 11px">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </header>
                                                    <div class="body">

                                                        <?php
                                                            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                                                            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                                                            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                                                            echo latest('theme/basic', 'qa', 5, 24);		// 최소설치시 자동생성되는 공지사항게시판
                                                        ?>

                                                    </div>
                                                </section>
                                            </div>

                                        </div>

                                        <!-- 암스 끝 -->

                                    </div>
                                </section>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="row">
                            <div class="col-md-12">
                                <section class="widget">
                                    <header>
                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                            <img src="/arms/img/bestqulity.png"
                                                 style="width: 18px; vertical-align: text-bottom;">
                                            Login
                                        </h4>
                                    </header>
                                    <div class="body">

                                        <!-- 커뮤니티 시작 -->
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <section class="widget" style="padding: 12px 17px 19px 17px;">
                                                    <header>
                                                        <h4 style="font-size: 13px !important; font-weight: 300 !important;">
                                                            Community .
                                                            <small>Security</small>
                                                        </h4>
                                                        <div class="widget-controls" style="top: 2px !important;">
                                                            <a  data-widgster="toleft"
                                                                title="change width to left"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-left"></i>
                                                            </a>
                                                            <a  data-widgster="expand"
                                                                title="Expand"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                                            </a>
                                                            <a  data-widgster="collapse"
                                                                title="Collapse"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-down"></i>
                                                            </a>
                                                            <a  data-widgster="toright"
                                                                title="change width to right"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-chevron-right"></i>
                                                            </a>
                                                            <a  data-widgster="restore"
                                                                title="Restore"
                                                                href="#">
                                                                <span class="glyphicon glyphicon-repeat"></span>
                                                            </a>
                                                            <a  data-widgster="fullscreen"
                                                                title="Fullscreen"
                                                                href="#">
                                                                <i class="glyphicon glyphicon-fullscreen"
                                                                   style="font-size: 11px">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    </header>
                                                    <div class="body">

                                                        <div id="aside">
                                                            <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                                                            <?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
                                                        </div>

                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                        <!-- 커뮤니티 끝 -->

                                    </div>
                                </section>
                            </div>
                        </div>

                    </div>

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

        <!-- config icon template -->
        <script type="text/template" id="settings-template">
            <div class="setting clearfix" style="margin-top: 5px;">
                <div>Mode (NewTab)</div>
                <div class="btn-group" style="margin-top: 5px;">
                    <button type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">Adm</button>
                    <button type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">User</button>
                </div>
            </div>
            <div class="setting clearfix" style="margin-top: 15px;">
                <div>Sidebar</div>
                <div id="display-sidebar-toggle" class="btn-group" data-toggle="buttons-radio" style="margin-top: 5px;">
                    <% display = displaySidebar%>
                    <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>" style="margin-top: 0px;padding: 1px 7px;">Show</button>
                    <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>" style="margin-top: 0px;padding: 1px 7px;">Hide</button>
                </div>
            </div>
            <div class="setting clearfix" style="margin-top: 15px;">
                <div>TourGuide</div>
                <div class="btn-group" id="tourGuideButtons" data-toggle="buttons-radio" style="margin-top: 5px;">
                    <button id="tour_guide_on" type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">On</button>
                    <button id="tour_guide_off" type="button" class="btn btn-sm btn-default" style="margin-top: 0px;padding: 1px 7px;">Off</button>
                </div>
            </div>
        </script>

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