<?php
class User extends AppModel
{
  public $hasMany = array(
    'Review' => array(
      'className' => 'Review'
      )
    );

  public $validate = array(
    'email'=>array(
      'validEmail' =>array(
        'rule' => array('email'),
        'message' => 'メールアドレスを入力してください'
        ),
      'emailExists' => array(
        'rule' =>array('isUnique',array('email')),
        'message' => 'すでに登録済みです'
        )
      ),
    'passwd' => array(
      'match' => array(
        'rule' => array(
          'confPassword','passwdconf'
          ),
        'message' => 'パスワード(確認)が一致しません'
        )
      ),
    'passwdold' => array(
      'match' => array('rule' => array('oldPassword','passwdold'),
        'message' => '旧パスワードが一致しません'
        )
      )
    );

  public function confPassword($field,$colum)
  {
    if($field['passwd'] === $this->data['User'][$colum])
    {
      $this->data['User']['passwd'] =
       Authcomponent::password($field['passwd']);
      return true;
    }
  }

  public function oldPassword($field,$colum)
  {
    $passwdold = Authcomponent::password($field[$colum]);
    $row = $this->findById($this->data['User']['id']);
    if($passwdold === $row['User']['passwd'])
    {
      return true;
    }
  }

}
?>