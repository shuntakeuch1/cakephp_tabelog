<h2>レビュー
  <?php if(empty($id)) :?>作成<?php else :?>編集<?php endif ;?>
</h2>
<?=$this->Form->create('Review',array('action' => 'edit'))?>
<?=$this->Form->input('score',
  array(
  'label' => '点数',
  'type' =>'select',
  'options' => $scoreList,
  'value' =>$score
  )
 )?>
 <?=$this->Form->input('title',
 array('label' => '口コミのタイトル','value' => $title))
 ?>
<?=$this->Form->input('body',
 array('label' => '口コミの内容','value' => $body))
 ?>
<?=$this->Form->hidden('shop_id',array('value' => $shopId))?>
<?=$this->Form->hidden('id',array('value' => $id))?>
<?=$this->Form->end('投稿する')?>