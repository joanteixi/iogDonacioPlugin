<?php

/**
 * Inscripcio form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseInscripcioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nom'            => new sfWidgetFormInput(),
      'cognoms'        => new sfWidgetFormInput(),
      'dni'            => new sfWidgetFormInput(),
      'telefon'        => new sfWidgetFormInput(),
      'escola'         => new sfWidgetFormInput(),
      'email'          => new sfWidgetFormInput(),
      'data_naixement' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Inscripcio', 'column' => 'id', 'required' => false)),
      'nom'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cognoms'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'dni'            => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'telefon'        => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'escola'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'data_naixement' => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('inscripcio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inscripcio';
  }


}
