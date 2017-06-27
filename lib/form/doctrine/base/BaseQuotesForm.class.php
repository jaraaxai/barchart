<?php

/**
 * Quotes form base class.
 *
 * @method Quotes getObject() Returns the current form's model object
 *
 * @package    next
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseQuotesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'symbol'     => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'last_price' => new sfWidgetFormInputText(),
      'prichange'  => new sfWidgetFormInputText(),
      'pctchange'  => new sfWidgetFormInputText(),
      'volume'     => new sfWidgetFormInputText(),
      'tradetime'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'symbol'     => new sfValidatorString(array('max_length' => 18, 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 128)),
      'last_price' => new sfValidatorNumber(array('required' => false)),
      'prichange'  => new sfValidatorNumber(array('required' => false)),
      'pctchange'  => new sfValidatorNumber(array('required' => false)),
      'volume'     => new sfValidatorInteger(array('required' => false)),
      'tradetime'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Quotes', 'column' => array('symbol')))
    );

    $this->widgetSchema->setNameFormat('quotes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quotes';
  }

}
