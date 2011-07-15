<?php

/**
 * Contacte form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseContacteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'tipus_persona'   => new sfWidgetFormInput(),
      'nom'             => new sfWidgetFormInput(),
      'cognoms'         => new sfWidgetFormInput(),
      'dni'             => new sfWidgetFormInput(),
      'direccio'        => new sfWidgetFormInput(),
      'codi_postal'     => new sfWidgetFormInput(),
      'ciutat'          => new sfWidgetFormInput(),
      'provincia'       => new sfWidgetFormInput(),
      'pais_residencia' => new sfWidgetFormInput(),
      'telefon'         => new sfWidgetFormInput(),
      'email'           => new sfWidgetFormInput(),
      'data_naixement'  => new sfWidgetFormDate(),
      'nacionalitat'    => new sfWidgetFormInput(),
      'idioma_contacte' => new sfWidgetFormInput(),
      'sexe'            => new sfWidgetFormInput(),
      'accepta_mailing' => new sfWidgetFormInputCheckbox(),
      'text'            => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Contacte', 'column' => 'id', 'required' => false)),
      'tipus_persona'   => new sfValidatorString(array('max_length' => 1)),
      'nom'             => new sfValidatorString(array('max_length' => 255)),
      'cognoms'         => new sfValidatorString(array('max_length' => 255)),
      'dni'             => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'direccio'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'codi_postal'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ciutat'          => new sfValidatorString(array('max_length' => 100)),
      'provincia'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pais_residencia' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'telefon'         => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'email'           => new sfValidatorString(array('max_length' => 255)),
      'data_naixement'  => new sfValidatorDate(array('required' => false)),
      'nacionalitat'    => new sfValidatorString(array('max_length' => 100)),
      'idioma_contacte' => new sfValidatorString(array('max_length' => 2)),
      'sexe'            => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'accepta_mailing' => new sfValidatorBoolean(array('required' => false)),
      'text'            => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('contacte[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contacte';
  }


}
