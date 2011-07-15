<?php

/**
 * Donacio form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDonacioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nom'            => new sfWidgetFormInput(),
      'cognoms'        => new sfWidgetFormInput(),
      'entitat'        => new sfWidgetFormInput(),
      'direccio'       => new sfWidgetFormInput(),
      'codi_postal'    => new sfWidgetFormInput(),
      'ciutat'         => new sfWidgetFormInput(),
      'telefon'        => new sfWidgetFormInput(),
      'email'          => new sfWidgetFormInput(),
      'professio'      => new sfWidgetFormInput(),
      'dni'            => new sfWidgetFormInput(),
      'data_naixement' => new sfWidgetFormDate(),
      'donacio'        => new sfWidgetFormInput(),
      'periodicitat'   => new sfWidgetFormInput(),
      'forma_pagament' => new sfWidgetFormInput(),
      'cc'             => new sfWidgetFormInput(),
      'oficina'        => new sfWidgetFormInput(),
      'dc'             => new sfWidgetFormInput(),
      'entitat_compte' => new sfWidgetFormInput(),
      'titular_compte' => new sfWidgetFormInput(),
      'newsletter'     => new sfWidgetFormInputCheckbox(),
      'nb_pedido'      => new sfWidgetFormInput(),
      'response'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Donacio', 'column' => 'id', 'required' => false)),
      'nom'            => new sfValidatorString(array('max_length' => 255)),
      'cognoms'        => new sfValidatorString(array('max_length' => 255)),
      'entitat'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccio'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'codi_postal'    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ciutat'         => new sfValidatorString(array('max_length' => 100)),
      'telefon'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email'          => new sfValidatorString(array('max_length' => 255)),
      'professio'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'dni'            => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'data_naixement' => new sfValidatorDate(array('required' => false)),
      'donacio'        => new sfValidatorNumber(array('required' => false)),
      'periodicitat'   => new sfValidatorString(array('max_length' => 255)),
      'forma_pagament' => new sfValidatorString(array('max_length' => 255)),
      'cc'             => new sfValidatorInteger(array('required' => false)),
      'oficina'        => new sfValidatorInteger(array('required' => false)),
      'dc'             => new sfValidatorInteger(array('required' => false)),
      'entitat_compte' => new sfValidatorInteger(array('required' => false)),
      'titular_compte' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'newsletter'     => new sfValidatorBoolean(array('required' => false)),
      'nb_pedido'      => new sfValidatorInteger(array('required' => false)),
      'response'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('donacio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donacio';
  }


}
