<h2>新規会員登録</h2>
  <?php echo $this->Form->create('User',array('action' => 'add'));?>
  <?php echo $this->Form->input('email',
    array('label' => 'メールアドレス','type'=>'email'));?>
  <?php echo $this->Form->input('passwd',
    array('label'=>'パスワード','type'=>'password'));?>
  <?php echo $this->Form->input('passwdconf',array('label'=>'パスワード(確認)','type'=>'password'));?>
  <?php echo $this->Form->end('登録する') ;?>
