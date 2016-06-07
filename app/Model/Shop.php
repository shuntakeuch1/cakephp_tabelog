<?php
class Shop extends AppModel
{

  public $hasMany = array(
  'Review' => array(
    'className' =>'Review',
    'order' => 'Review.created DESC'
    )
  );
  public $validate = array(
      'name'=>array(
        'rule'=>array('notBlank')
        ),
      'tel'=>array(
        'rule'=>array('notBlank')
        ),
      'addr' => array(
        'rule' => array('notBlank')
        ),
      'url' => array(
       'rule' => array('url'),
       'message' => '形式が正しくありません'
       )
    );



}
?>