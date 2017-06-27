<?php

class QuotesForm extends BaseQuotesForm
{
  public function configure()
  {
  	unset($this['id'],$this['tradetime']);
    
  	$this->widgetSchema['name'] = new sfWidgetFormInput(array('label' => 'Symbol Name'), array('size' => 30));
  	$this->widgetSchema['last_price']           = new sfWidgetFormInput(array('label' => 'Last Price'), array('size' => 30));
  	$this->widgetSchema['prichange']           = new sfWidgetFormInput(array('label' => 'Change'), array('size' => 30));
  	$this->widgetSchema['pctchange']           = new sfWidgetFormInput(array('label' => '% Change'), array('size' => 30));

  	$this->setValidators(array(
      'symbol'       => new sfValidatorString(array('max_length' => 18)),
      'name'         => new sfValidatorString(array('max_length' => 128)),
      'last_price'   => new sfValidatorPass(),
      'prichange'   => new sfValidatorPass(),
      'pctchange'   => new sfValidatorPass(),
      'volume'   => new sfValidatorPass(),
    ));

	$this->widgetSchema->setNameFormat('quotes[%s]');

  if($this->isNew()){
	  $this->validatorSchema->setPostValidator(
        new sfValidatorCallback(array('callback' => array($this, 'checkUnique')))
    );
    }
  }

  public function checkUnique($validator, $values)
  {
        $this->_object = Doctrine::getTable('Quotes')->getSymbolByKey(
            $values['symbol']);
    
    if ($this->_object)
    {
      // throw an error
      throw new sfValidatorError($validator, 'This symbol has already been added to the watchlist!');
    }
        
    return $values;
  }
}
