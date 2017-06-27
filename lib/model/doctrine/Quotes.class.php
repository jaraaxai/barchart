<?php

class Quotes extends BaseQuotes
{
  public function save(Doctrine_Connection $conn = null)
  {
    
    $this->setTradetime(date("Y-m-d H:i:s", time()));
    
    return parent::save($conn);
  }
}
