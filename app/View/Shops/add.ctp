<h2>レストラン新規登録</h2>
<div>
  <?=$this->Form->create('Shop',array('action'=>'add'));?>
  <?=$this->Form->input('name',array('label'=>'店名')); ?>
  <?=$this->Form->input('tel',array('label'=>'電話番号')); ?>
  <?=$this->Form->input('addr',array('label'=>'住所')); ?>
  <?=$this->Form->input('url',array('label'=>'ホームページ')); ?>
  <?=$this->Form->end('登録する');?>
</div>
