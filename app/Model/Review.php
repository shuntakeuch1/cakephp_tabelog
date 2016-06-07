<?php

class Review extends AppModel
{
  public $belongsTo = array(
    'User' =>array(
      'className' => 'User'
      ),
    'Shop' => array(
      'className' =>'Shop'
      )
    );

  public function isReview ($shopId,$userId)
  {
    $review = $this->getData($shopId,$userId);
    return !empty($review) ? true : false;
  }
  public function getData($shopId,$userId)
  {
    $options = array(
      'conditions' =>array(
        'shop_id' => $shopId,
        'user_id' => $userId
        )
      );
    return $this->find('first',$options);
  }

  public function getReviewCnt($userId)
  {
    $options = array(
      'condition' => array(
        'user_id' => $userId
        )
      );
    return $this->find('count',$options);
  }

  public function getListByShopId($shopId)
  {
    $options = array(
      'fields' =>
      array('Review.id','Review.user_id','Review.title','Review.body','Review.score','Review.created','User.email','User.id'),
      'conditions' =>
        array('Review.shop_id' => $shopId),
        'recursive' => 2
        );
    return $this->find('all',$options);
  }

    public function getScoreAvg($shopId)
    {
      $options = array(
        'fields' => 'AVG(score) as avg',
        'conditions' => array('shop_id' =>$shopId),
        'group' => array('shop_id')
        );
      $data = $this->find('first',$options);
      $score = $scoreAve = 0;

      if(!empty($data[0]['avg']))
      {
        $score = round($data[0]['avg']);
        $scoreAve = round($data[0]['avg'],1);
      }
      return array($score,$scoreAve);

    }
}

?>