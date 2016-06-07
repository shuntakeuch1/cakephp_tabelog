<?php

class UsersController extends AppController
{

  public $components = array(
    'Session','Auth' => array(
        'authenticate' => array(
          'Form' => array(
              'fields' =>
              array('username' => 'email','password' =>'passwd')
            )
          ),
        'loginRedirect' => array('controller' => 'shops','action'=>'index'),
        'logoutRedirect' => array('controller' => 'shops','action' => 'index'),
        'authError' => 'ユーザーネームとメールアドレスを入力してください'
      )
    );

  public function beforeFilter()
  {
    parent::beforeFilter();
    //アクセス制限
    $this->Auth->deny('edit');
  }

  public function add ()
  {
      if($this->request->is('post'))
      {
        $this->User->set($this->data);
        if($this->User->validates())
        {
          $this->User->save($this->data);
          //ログイン状態にする
          $data = $this->User->find('first',array(
            'conditions' => array('email' =>$this->data['User']['email'])
            ));
          $this->Auth->login($data['User']);
          $this->Session->setFlash('ログインに成功しました','default',array(),'auth');
          return $this->redirect($this->Auth->redirect());
        }
      }
   }

   public function edit()
   {
      if($this->request->is('post'))
      {
        $this->User->validate['email'] = array(
          'validEmail' => array(
            'rule' => array('email'),
            'message' => 'メールアドレスを入力してください'
            )
          );

        $this->User->set($this->data);
        if($this->User->validates())
        {
          $this->User->save($this->data);
          //ログイン状態にする
          $data = $this->User->find('first',
            array(
              'conditions' => array('email' =>$this->data['User']['email'])));
          $this->Auth->login($data['User']);
          $this->Session->setFlash('設定変更に成功しました','default',array(),'auth');
          return $this->redirect($this->Auth->redirect());
        }
      }

   }

   public function login()
   {
      if($this->request->is('post')){

        //=じゃないの?
        // $this->User->set($this->data);
        if($this->Auth->login())
        {
          $this->Session->setFlash(' ログインに成功しました','default',array(),'auth');
          return $this->redirect($this->Auth->redirect());

        }
        else
        {
          $this->Session->setFlash('メールアドレスかパスワードが間違っています','default',array(),'auth');
        }

      }
   }

   public function logout()
   {
      $this->Auth->logout();
      $this->Session->setFlash('ログアウトしました','default', array(),'auth');
      return $this->redirect($this->Auth->redirect());
   }


}
?>