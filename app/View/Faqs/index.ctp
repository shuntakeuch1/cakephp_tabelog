<style>
    .slide {
        padding: 20px;
        border: 1px solid #eee;
        border-left-width: 5px;
        border-radius: 3px;
        cursor: pointer;
    }
    .slide h4 {
        margin-top: 0;
    }
    .slide p:last-child {
        margin-bottom: 0;
    }
    .slide+.slide {
    }
    .slide-primary {
        border-left-color: #428bca;
    }
    .slide-primary h4 {
        color: #428bca;
    }
    h4 {
        margin: 0;
        color: #000;
    }
    .slide-content {
        padding: 10px 20px;
    }
</style>
<script>
    $(function(){
        $(".slide-content").hide();
        $(".slide").click(function(){
            $(".slide-content").slideUp();
            $(this).next().slideDown();
        });
    });
</script>

<h3>FAQ</h3>
<?=$this->Session->flash('auth')?>

<h4 class="slide slide-primary">Q1. javascriptがわからない</h4>
<p class="slide-content">
    まずは文法から覚えていこう!!<br>
    https://developer.mozilla.org/ja/docs/Web/JavaScript
</p>

<h4 class="slide slide-primary">Q2. jQueryがわからない</h4>
<p class="slide-content">
    ドキュメントを読んでみよう!!<br>
    https://api.jquery.com/
</p>

<h4 class="slide slide-primary">Q3. うまく動かない</h4>
<p class="slide-content">
    デベロッパーツールを使おう!!<br>
    ログをみたり、ブレークポイントを使えばわかるかも？
</p>

<h4 class="slide slide-primary">Q4. 簡単すぎてもっと難しいことがしたい</h4>
<p class="slide-content">
    誰かに教えるつもりで覚えたことを書き出してみよう<br>
    教えることを前提として文章にすると本当に理解しているかわかるよ。
</p>
