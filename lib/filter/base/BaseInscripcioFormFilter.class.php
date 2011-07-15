<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Inscripcio filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseInscripcioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'            => new sfWidgetFormFilterInput(),
      'cognoms'        => new sfWidgetFormFilterInput(),
      'dni'            => new sfWidgetFormFilterInput(),
      'telefon'        => new sfWidgetFormFilterInput(),
      'escola'         => new sfWidgetFormFilterInput(),
      'email'          => new sfWidgetFormFilterInput(),
      'data_naixement' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'nom'            => new sfValidatorPass(array('required' => false)),
      'cognoms'        => new sfValidatorPass(array('required' => false)),
      'dni'            => new sfValidatorPass(array('required' => false)),
      'telefon'        => new sfValidatorPass(array('required' => false)),
      'escola'         => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'data_naixement' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('inscripcio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Inscripcio';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nom'            => 'Text',
      'cognoms'        => 'Text',
      'dni'            => 'Text',
      'telefon'        => 'Text',
      'escola'         => 'Text',
      'email'          => 'Text',
      'data_naixement' => 'Date',
    );
  }
}
