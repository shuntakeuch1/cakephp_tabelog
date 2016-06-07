<div style = "height:30px;">
<span style = "float:left;">
    <h1>
    <?=$this->Html->link('スパル食べログ',array('controller'=>'shops','action' => 'index'));?>
    </h1>
</span>

<span style="float:right; margin:auto 10px;">
  <?php if($isLogin):?>
    <?=$this->Html->link('ログアウト',array(
      'controller' =>'users','action' => 'logout'
    ))?>

  <?php else :?>
    <?=$this->Html->link('ログイン',array(
    'controller' => 'users','action' => 'login'))?>
  <?php endif ;?>
</span>
<?php if(!$isLogin):?>
  <span style="float:right; margin:auto 10px;">
  <?=$this->Html->link('新規登録',
    array('controller' => 'users',
          'action' =>'add')); ?>
  </span>
<?php endif?>
<span style = "float:right;margin:auto 10px;">
  <?php if(!($isLogin)):?>
    <?=$this->Html->link('Facebookログイン',array('controller' => 'users','action' => 'facebook'))?>
  <?php else :?>
    <?=$this->Html->link('設定変更',
    array('controller' => 'users','action' => 'edit'))?>
  <?php endif;?>
</span>

</div>