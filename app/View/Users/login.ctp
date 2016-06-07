<h2>ログイン</h2>
<?=$this->Session->flash('auth');?>
<?=$this->Form->create('User',array('action' => 'login'));?>
<?=$this->Form->input('email',
  array('label' => 'メールアドレス','type' =>'email'))?>
<?=$this->Form->input('passwd',
  array('label' => 'パスワード','type' =>'password'))?>
<?=$this->Form->end('ログイン')?>