<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Contacte filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseContacteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipus_persona'   => new sfWidgetFormFilterInput(),
      'nom'             => new sfWidgetFormFilterInput(),
      'cognoms'         => new sfWidgetFormFilterInput(),
      'dni'             => new sfWidgetFormFilterInput(),
      'direccio'        => new sfWidgetFormFilterInput(),
      'codi_postal'     => new sfWidgetFormFilterInput(),
      'ciutat'          => new sfWidgetFormFilterInput(),
      'provincia'       => new sfWidgetFormFilterInput(),
      'pais_residencia' => new sfWidgetFormFilterInput(),
      'telefon'         => new sfWidgetFormFilterInput(),
      'email'           => new sfWidgetFormFilterInput(),
      'data_naixement'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'nacionalitat'    => new sfWidgetFormFilterInput(),
      'idioma_contacte' => new sfWidgetFormFilterInput(),
      'sexe'            => new sfWidgetFormFilterInput(),
      'accepta_mailing' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'text'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tipus_persona'   => new sfValidatorPass(array('required' => false)),
      'nom'             => new sfValidatorPass(array('required' => false)),
      'cognoms'         => new sfValidatorPass(array('required' => false)),
      'dni'             => new sfValidatorPass(array('required' => false)),
      'direccio'        => new sfValidatorPass(array('required' => false)),
      'codi_postal'     => new sfValidatorPass(array('required' => false)),
      'ciutat'          => new sfValidatorPass(array('required' => false)),
      'provincia'       => new sfValidatorPass(array('required' => false)),
      'pais_residencia' => new sfValidatorPass(array('required' => false)),
      'telefon'         => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'data_naixement'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'nacionalitat'    => new sfValidatorPass(array('required' => false)),
      'idioma_contacte' => new sfValidatorPass(array('required' => false)),
      'sexe'            => new sfValidatorPass(array('required' => false)),
      'accepta_mailing' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'text'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contacte_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contacte';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'tipus_persona'   => 'Text',
      'nom'             => 'Text',
      'cognoms'         => 'Text',
      'dni'             => 'Text',
      'direccio'        => 'Text',
      'codi_postal'     => 'Text',
      'ciutat'          => 'Text',
      'provincia'       => 'Text',
      'pais_residencia' => 'Text',
      'telefon'         => 'Text',
      'email'           => 'Text',
      'data_naixement'  => 'Date',
      'nacionalitat'    => 'Text',
      'idioma_contacte' => 'Text',
      'sexe'            => 'Text',
      'accepta_mailing' => 'Boolean',
      'text'            => 'Text',
    );
  }
}
