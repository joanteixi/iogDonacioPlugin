<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Donacio filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseDonacioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'            => new sfWidgetFormFilterInput(),
      'cognoms'        => new sfWidgetFormFilterInput(),
      'entitat'        => new sfWidgetFormFilterInput(),
      'direccio'       => new sfWidgetFormFilterInput(),
      'codi_postal'    => new sfWidgetFormFilterInput(),
      'ciutat'         => new sfWidgetFormFilterInput(),
      'telefon'        => new sfWidgetFormFilterInput(),
      'email'          => new sfWidgetFormFilterInput(),
      'professio'      => new sfWidgetFormFilterInput(),
      'dni'            => new sfWidgetFormFilterInput(),
      'data_naixement' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'donacio'        => new sfWidgetFormFilterInput(),
      'periodicitat'   => new sfWidgetFormFilterInput(),
      'forma_pagament' => new sfWidgetFormFilterInput(),
      'cc'             => new sfWidgetFormFilterInput(),
      'oficina'        => new sfWidgetFormFilterInput(),
      'dc'             => new sfWidgetFormFilterInput(),
      'entitat_compte' => new sfWidgetFormFilterInput(),
      'titular_compte' => new sfWidgetFormFilterInput(),
      'newsletter'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'transaccio_id'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'            => new sfValidatorPass(array('required' => false)),
      'cognoms'        => new sfValidatorPass(array('required' => false)),
      'entitat'        => new sfValidatorPass(array('required' => false)),
      'direccio'       => new sfValidatorPass(array('required' => false)),
      'codi_postal'    => new sfValidatorPass(array('required' => false)),
      'ciutat'         => new sfValidatorPass(array('required' => false)),
      'telefon'        => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'professio'      => new sfValidatorPass(array('required' => false)),
      'dni'            => new sfValidatorPass(array('required' => false)),
      'data_naixement' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'donacio'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'periodicitat'   => new sfValidatorPass(array('required' => false)),
      'forma_pagament' => new sfValidatorPass(array('required' => false)),
      'cc'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'oficina'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dc'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'entitat_compte' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'titular_compte' => new sfValidatorPass(array('required' => false)),
      'newsletter'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'transaccio_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('donacio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Donacio';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nom'            => 'Text',
      'cognoms'        => 'Text',
      'entitat'        => 'Text',
      'direccio'       => 'Text',
      'codi_postal'    => 'Text',
      'ciutat'         => 'Text',
      'telefon'        => 'Text',
      'email'          => 'Text',
      'professio'      => 'Text',
      'dni'            => 'Text',
      'data_naixement' => 'Date',
      'donacio'        => 'Number',
      'periodicitat'   => 'Text',
      'forma_pagament' => 'Text',
      'cc'             => 'Number',
      'oficina'        => 'Number',
      'dc'             => 'Number',
      'entitat_compte' => 'Number',
      'titular_compte' => 'Text',
      'newsletter'     => 'Boolean',
      'transaccio_id'  => 'Number',
    );
  }
}
