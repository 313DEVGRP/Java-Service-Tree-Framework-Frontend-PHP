<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
@include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<?php 
$v_width = '100%';   // 동영상 넓이 지정
$v_height = '500';  // 동영상 높이 지정
?>

<!-- video-js -->
<link href="<?php echo $board_skin_url ?>/video-js/video-js.css" rel="stylesheet">
<script src="<?php echo $board_skin_url ?>/video-js/video.js"></script>
<script>
  videojs.options.flash.swf = "<?php echo $board_skin_url ?>/video-js/video-js.swf";
</script>
<!-- video-js end -->

        <!-- subheader begin -->
        <section id="subheader" data-speed="2" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $board['bo_subject'] ?></h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

<div class="clearfix"></div>

        <!-- content begin -->
        <div id="content">

            <div class="container">
                <div class="row">
					<h1 class="col-md-12"><?php if ($category_name) { ?>
            <span class="bo_v_cate">[<?php echo $view['ca_name']; // 분류 출력 끝 ?>]</span> 
            <?php } ?>
            <span class="bo_v_tit">
            <?php
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?></span></h1>
					<div class="col-md-12">

<!-- 게시물 읽기 시작 { -->

        <span class="sound_only">작성자</span> <strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <span class="sound_only">댓글</span><strong><a href="#bo_vc"> <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo number_format($view['wr_comment']) ?>건</a></strong>
        <span class="sound_only">조회</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($view['wr_hit']) ?>회</strong>
        <strong class="if_date"><span class="sound_only">작성일</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>

    
    <?php
    $cnt = 0;
    if ($view['file']['count']) {
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->

        <h2><i class="fa fa-download" aria-hidden="true"></i> 첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                </a>
                <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>

    <!-- } 첨부파일 끝 -->
    <?php } ?>

       <?php
    if (implode('', $view['link'])) {
     ?>
    <!-- 관련링크 시작 { -->

        <h2><i class="fa fa-link" aria-hidden="true"></i> 관련링크</h2>
        <ul>
        <?php
        // 링크
        $cnt = 0;
        for ($i=1; $i<=count($view['link']); $i++) {
            if ($view['link'][$i]) {
                $cnt++;
                $link = cut_str($view['link'][$i], 70);
            ?>
            <li>
                <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
                    <strong><?php echo $link ?></strong>
                </a>
                <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
            </li>
            <?php
            }
        }
        ?>
        </ul>

    <!-- } 관련링크 끝 -->
    <?php } ?>


 <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            // 첫번째 이미지 출력안함 $i=0 --> $i=1
            for ($i=1; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }

            echo "</div>\n";
        }
         ?>

		<!-- video start -->
		<!-- youtube -->
		<?php if($view['wr_1']){ ?>
		<div style="margin:0 0 10px 0;"> 
			<iframe width="<?php echo $v_width?>" height="<?php echo $v_height?>" src="http://www.youtube.com/embed/<?php echo $view[wr_1]?>?feature=player_embedded" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php } ?>

		<!-- vimeo -->
		<?php if($view['wr_2']){ ?>
		<div style="margin:0 0 10px 0;">
			<iframe src="//player.vimeo.com/video/<?php echo $view[wr_2]?>" width="<?php echo $v_width?>" height="<?php echo $v_height?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		<?php } ?>

		<!-- source code -->
		<?php if($view['wr_3']){ ?>
			<?php echo $view['wr_3']; ?>
		<?php } ?>

		<!-- 링크 동영상 video-js로 실행 -->
		<?php 
		if($view['wr_4']){ 
			if ($view['file'][0]['file']) {  // 첨부파일1(썸네일이미지) 있는 경우
				$v_logo = G5_URL."/data/file/".$bo_table."/".$view['file'][0]['file'];
			} else { 
				$v_logo = $board_skin_url."/video-js/logo.jpg";
			}
		?>
			<video id="video_link" class="video-js vjs-default-skin" controls preload="none" width="<?php echo $v_width?>" height="<?php echo $v_height?>" poster="<?php echo $v_logo?>" data-setup="{}">
			<source src="<?php echo $view['wr_4']?>" type='video/mp4' />
			</video>
		<?php } ?>

		<!-- 업로드 동영상 video-js로 실행 -->
		<?php 
		if($view['file'][1]['file']){
			if ($view[file][0][file]) {  // 첨부파일1(썸네일이미지) 있는 경우
				$v_logo = G5_URL."/data/file/".$bo_table."/".$view[file][0][file];
			} else { 
				$v_logo = $board_skin_url."/video-js/logo.jpg";
			}
		?>
			<video id="video_upload" class="video-js vjs-default-skin" controls preload="none" width="<?php echo $v_width?>" height="<?php echo $v_height?>" poster="<?php echo $v_logo?>" data-setup="{}">
			<source src="<?=G5_URL."/data/file/".$bo_table."/".$view['file'][1]['file']?>" type='video/mp4' />
			</video>
		<?php } ?>

		<!-- video end -->



        <!-- 본문 내용 시작 { -->

		<div class="row h1"><p class="hidden"></p></div><?php echo get_view_thumbnail($view['content']); ?>
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

<div class="row h1"><p class="hidden"></p></div><div class="row h1"><p class="hidden"></p></div>
        <!--  추천 비추천 시작 { -->
        <?php if ( $good_href || $nogood_href) { ?>
        <div style='text-align:center'>
            <?php if ($good_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="btn btn_b03"><span class="sound_only">추천</span><i class="fa fa-thumbs-up display-block"></i><strong><?php echo number_format($view['wr_good']) ?></strong></a>
                <b id="bo_v_act_good"></b>
            </span>
            <?php } ?>
            <?php if ($nogood_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="btn btn_b03"><span class="sound_only">비추천</span><i class="fa fa-thumbs-down display-block"></i><strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
                <b id="bo_v_act_nogood"></b>
            </span>
            <?php } ?>
			        <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn btn_b03" onclick="win_scrap(this.href); return false;"><i class="fa fa-thumb-tack" aria-hidden="true"></i> 스크랩</a><?php } ?>

        <?php
        include_once(G5_SNS_PATH."/view.sns.skin.php");
        ?>
        </div>
        <?php } else {
            if($board['bo_use_good'] || $board['bo_use_nogood']) {
        ?>
        <div style='text-align:center'>
            <?php if($board['bo_use_good']) { ?><span class="btn btn_b03"><span class="sound_only">추천</span><i class="fa fa-thumbs-up display-block"></i><strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
            <?php if($board['bo_use_nogood']) { ?><span class="btn btn_b03"><span class="sound_only">비추천</span><i class="fa fa-thumbs-down display-block"></i><strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
        </div>
        <?php
            }
        }
        ?>
        <!-- }  추천 비추천 끝 -->


    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top">
        <?php
        ob_start();
        ?>

<div class="pull-left">
            <?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn btn-custom">수정</a><?php } ?>
            <?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="btn btn-custom" onclick="del(this.href); return false;">삭제</a><?php } ?>
            <?php if ($copy_href) { ?><a href="<?php echo $copy_href ?>" class="btn btn-custom" onclick="board_move(this.href); return false;">복사</a><?php } ?>
            <?php if ($move_href) { ?><a href="<?php echo $move_href ?>" class="btn btn-custom" onclick="board_move(this.href); return false;">이동</a><?php } ?>
            <?php if ($search_href) { ?><a href="<?php echo $search_href ?>" class="btn_b01 btn"><i class="fa fa-search" aria-hidden="true"></i> 검색</a><?php } ?>
</div>

<div class="pull-right">
           <a href="<?php echo $list_href ?>" class="btn btn-custom">목록</a>
            <?php if ($reply_href) { ?><a href="<?php echo $reply_href ?>" class="btn btn-custom">답변</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-custom">글쓰기</a><?php } ?>

</div>
        <div class="row h1"><p class="hidden"></p></div>
		<div class="event-details">
        <?php if ($prev_href || $next_href) { ?>
        <ul>
            <?php if ($prev_href) { ?><li class="btn_prv"><span class="nb_tit"><i class="fa fa-caret-up" aria-hidden="true"></i> 이전글</span><a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a> <span class="nb_date"><?php echo str_replace('-', '.', substr($prev_wr_date, '2', '8')); ?></span></li><?php } ?>
            <?php if ($next_href) { ?><li class="btn_next"><span class="nb_tit"><i class="fa fa-caret-down" aria-hidden="true"></i> 다음글</span><a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a>  <span class="nb_date"><?php echo str_replace('-', '.', substr($next_wr_date, '2', '8')); ?></span></li><?php } ?>
        </ul>
		</div>
        <?php } ?>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->
        <div class="row h1"><p class="hidden"></p></div>



    <?php
    // 코멘트 입출력
    include_once(G5_BBS_PATH.'/view_comment.php');
     ?>


<!-- } 게시판 읽기 끝 -->
					</div>
				</div>
            </div>

        </div>
        <!-- content close -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();

    //sns공유
    $(".btn_share").click(function(){
        $("#bo_v_sns").fadeIn();
   
    });

    $(document).mouseup(function (e) {
        var container = $("#bo_v_sns");
        if (!container.is(e.target) && container.has(e.target).length === 0){
        container.css("display","none");
        }	
    });
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->

