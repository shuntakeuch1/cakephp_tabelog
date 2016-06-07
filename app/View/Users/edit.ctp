<h2>設定変更</h2>
 <?php echo $this->Form->create('User',array('action' => 'edit'));?>
  <?php echo $this->Form->input('email',
    array('label' => 'メールアドレス','type'=>'email','value' => $user['email']));?>
  <?php echo $this->Form->input('passwdold',
    array('label'=>'旧パスワード','type'=>'password'));?>
      <?php echo $this->Form->input('passwd',
    array('label'=>'新パスワード','type'=>'password'));?>
  <?php echo $this->Form->input('passwdconf',array('label'=>'新パスワード(確認)','type'=>'password'));?>
  <?=$this->Form->hidden('id',array('value' => $user['id']))?>
  <?php echo $this->Form->end('変更する') ;?>
