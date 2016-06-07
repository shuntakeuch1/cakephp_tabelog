<?php
App::import('Vendor','facebook',array('file' => 'facebook/src/facebook.php'));
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

   public function facebook()
   {
    $this->autoRender = false;
    $this->facebook = $this->createFacebook();
    $user = $this->facebook->getUser();
    if($user){
      // $myData = $this->facebook->api('/me?fields=name');
      // $data = array(
      //   'email' => $myData['email']
      //   );
      // $exist = $this->User->findByEmail($data['email']);
      //認証後の処理
      $myData = $this->facebook->api('/me?fields=name');
      $data = array(
        'name' => $myData['name']
        );
      $exist = $this->User->findByEmail($data['name']);
      if(!exist)
      {
        $this->User->save($data);
      }
      //ログイン状態にする
      $this->Auth->login($data);
      $this->Session->setFlash('Facebookログインに成功しました','default',array(),'auth');
      return $this->redirect($this->Auth->redirect());
    }
    else
    {
      //認証前
      $url = $this->facebook->getLoginUrl(array(
        'scope' => 'email'
        )
        );
      $this->redirect($url);
    }
   }

   private function createFacebook()
   {
    return new Facebook(array(
      'appId' => '588555911317721',
      'secret' => 'a790bf7f55915f43dad120a95ff93da5')

      );

   }

}
?>