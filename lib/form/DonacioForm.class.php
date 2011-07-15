<?php

/**
 * Donacio form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class DonacioForm extends BaseDonacioForm
{

  protected $periodicitat = array('puntual' => 'Puntual', 'men' => 'Mensual', 'trim' => 'Trimestral', 'anual' => 'Anual');
  protected $pagament = array("dom" => "Domiciliacio", "tr" => "Transferencia", "telf" => "Per telèfon", "xec" => "Xec bancari", "tarja" => "Tarjeta de crèdit","ma" => "Manual");
  

  public function configure()
  {
    unset($this['transaccio_id']);
    $this->widgetSchema->setFormFormatterName('list');
    $years = range(date('Y')- 100, date('Y') - 10);
    $this->widgetSchema['data_naixement'] = new sfWidgetFormJQueryDate(array('culture' => 'ca', 'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year% ', 'years' => array_combine($years, $years)), array('class' => 'data'))));

    // options
    $this->widgetSchema['periodicitat'] = new sfWidgetFormChoice(array('choices' => $this->periodicitat, 'expanded' => true));
    $this->widgetSchema['forma_pagament'] = new sfWidgetFormChoice(array('choices' => $this->pagament, 'expanded' => true));

    //titles
    $this->widgetSchema->setLabels(array(
        'donacio' => 'Import de la donació (sense decimals)',
        'forma_pagament' => 'Escull al forma de pagament'.$this->required(),
        'periodicitat' => 'Indica la periodicitat del pagament'.$this->required(),
        'direccio' => 'Direcció'.$this->required(),
        'nom' => 'Nom'.$this->required(),
        'cognoms' => 'Cognoms'.$this->required(),
        'codi_postal'      => 'Codi postal'.$this->required(),
        'ciutat'      => 'Ciutat'.$this->required(),
        'telefon'  => 'Telèfon / Mòbil'.$this->required(),
        'email'     => 'Correu electrònic',
        'dni'       => 'NIF núm.'.$this->required(),
        'professio' => 'Professió',
        'dc'      => 'Dígit',
        'cc'      => 'Compte',
        'data_naixement'      => 'Data naixement'.$this->required(),
        'entitat_compte' => 'Entitat'
        
        ));
    $this->widgetSchema['nom']->setAttribute('title' , 'El teu nom');

    //validators
    $this->validatorSchema['dni'] = new sfNifCifNieValidator(array('required' => true));
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => false), array('invalid' => 'Aquest email no sembla correcte'));
    $this->validatorSchema['donacio'] = new sfValidatorNumber(array('required' => true),array('invalid' => 'Cal posar un només un número', 'required' => 'Cal posar algún import'));
    $this->validatorSchema['forma_pagament'] = new sfValidatorChoice(array('required' => true, 'choices' => array_keys($this->pagament)),array('invalid' => 'Selecciona una opció', 'required' => 'Cal seleccionar una forma de pagament'));
    $this->validatorSchema['periodicitat'] = new sfValidatorChoice(array('required' => true, 'choices' => array_keys($this->periodicitat)),array('invalid' => 'Selecciona una opció', 'required' => 'Cal seleccionar una forma de pagament'));
    $this->validatorSchema['nom']->setMessage('required', 'Cal omplir aquest camp');
    $this->validatorSchema['nom']->setOption('required', true);
    $this->validatorSchema['cognoms']->setMessage('required', 'Cal omplir aquest camp');
    $this->validatorSchema['cognoms']->setOption('required', true);
    $this->validatorSchema['direccio']->setMessage('required', 'Cal omplir aquest camp');
    $this->validatorSchema['direccio']->setOption('required', true);
    $this->validatorSchema['codi_postal']->setMessage('required', 'Cal omplir aquest camp');
    $this->validatorSchema['codi_postal']->setOption('required', true);
    $this->validatorSchema['ciutat']->setMessage('required', 'Cal omplir aquest camp');
    $this->validatorSchema['ciutat']->setOption('required', true);
    $this->validatorSchema['telefon']->setMessage('required', 'Cal omplir aquest camp');
    $this->validatorSchema['telefon']->setOption('required', true);
    $this->validatorSchema['data_naixement']->setMessage('required', 'Cal omplir aquest camp');
    $this->validatorSchema['data_naixement']->setOption('required', true);
    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'checkTarjaPagamentPuntual')))
    );
 

  }
  public function checkTarjaPagamentPuntual($validator, $values)
  {
    if ($values['forma_pagament'] == 'tarja' && $values['periodicitat'] != 'puntual')
    {
      // password is not correct, throw an error
      $error = new sfValidatorError($validator, 'El pagament amb tarjeta només és compatible amb el pagament puntual');
       throw new sfValidatorErrorSchema($validator, array('forma_pagament' => $error));
    }
 
    // password is correct, return the clean values
    return $values;
  }
   public function bind(array $taintedValues = null, array $taintedFiles = null) {

    //enables transferència validator on active
    if (isset($taintedValues['forma_pagament']) && $taintedValues['forma_pagament']== 'dom') {
      $this->validatorSchema['entitat_compte']->setOption('required' , true);
      $this->validatorSchema['oficina']->setOption('required' , true);
      $this->validatorSchema['dc']->setOption('required' , true);
      $this->validatorSchema['cc']->setOption('required' , true);
      $this->validatorSchema['titular_compte']->setOption('required' , true);
    }
    parent::bind($taintedValues, $taintedFiles);
  }


  private  function required() {
    return ' <span class="required">*</span>';
  }
}
