<?php

class ReviewsController extends AppController
{

  public function beforeFilter()
  {
    parent::beforeFilter();
    $this->Auth->deny('edit');
  }

  public function edit ($shopId =null)
  {
    if($this->request->is('post'))
    {
        $request = $this->request->data['Review'];

        $data = array(
            'user_id' => $this->user['id'],
            'shop_id' => $request['shop_id'],
            'title' => $request['title'],
            'body' => $request['body'],
            'score' => $request['score']
            );

        if(!empty($request['id']))
        {
            $data['id'] =$request['id'];
        }

        $this->Review->save($data);

        $this->redirect(
            array(
            'controller' => 'shops',
            'action' => 'view',
            $request['shop_id']
            )
        );
    }
    $review = $this->Review->getData($shopId,$this->user['id']);
    //空だったら0をいれる。if(iserror~みたいなもの
    $id = !empty($review['Review']['id']) ? $review['Review']['id'] : 0;
    $title = !empty($review['Review']['title']) ? $review['Review']['title'] : "";
    $body = !empty($review['Review']['body']) ? $review['Review']['body'] : "";
    $score = !empty($review['Review']['score']) ? $review['Review']['score'] : "";
    $this->set('id',$id);
    $this->set('score',$score);
    $this->set('title',$title);
    $this->set('body',$body);
    $this->set('shopId',$shopId);
    $this->set('scoreList',Configure::read('scoreList'));
  }
}

?>