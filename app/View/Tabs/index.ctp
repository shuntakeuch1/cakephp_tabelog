<style>
    .tab {
        border-bottom: 1px solid #003d4c;
        display: table;
        width: 100%;
    }
    .tab > li {
        display: table-cell;
        vertical-align: middle;
        float: left;
        list-style-type: none;
        padding: 10px 10px;
        cursor: pointer;
    }
    .active {
        background-color: #003d4c;
        color: #ffffff;
        font-weight: bold:
    }
    .tab-content {
        padding: 10px 30px;
    }
</style>
<script>
    $(function(){
        $(".tab-content").hide();
        $("#tab1").show();
        $(".tab li").click(function() {
            $(".tab li").removeClass("active");
            $(".tab-content").hide();

            //クリックされた要素の取得
            $(this).addClass("active");
            //属性の値の取得
            var target = $(this).data("target");
            $("#" + target).show();
        });
    });
</script>

<h3>タブメニュー</h3>
<?=$this->Session->flash('auth')?>

<ul class="tab">
    <li class="active" data-target="tab1">javascript</a></li>
    <li data-target="tab2">jQuery</li>
    <li data-target="tab3">Node.js</li>
</ul>

<p class="tab-content" id="tab1">
    javascriptの話です<br>
    javascriptは昔は実はあまりよくないものというイメージがありました<br>
</p>

<p class="tab-content" id="tab2">
    jQueryの話です<br>
    jQueryがあることで簡単にコーディングできるようになりました<br>
</p>

<p class="tab-content" id="tab3">
    Node.jsの話です<br>
    PHPのようにサーバーサイドのプログラムをjavascriptでもかけるようになります<br>
</p>
<?php
var_dump( true == true);
var_dump( 0 ==false);
var_dump( false === false);
