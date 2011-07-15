<?php
class BasicForm extends sfForm
{
    public function setup()
    {
        $this->setWidgets(array(
                'nom'             => new sfWidgetFormInput(),
                'cognoms'         => new sfWidgetFormInput(),
                'ciutat'          => new sfWidgetFormInput(),
                'email'           => new sfWidgetFormInput(),
                'text'            => new sfWidgetFormTextarea(),
        ));

        $this->setValidators(array(
                'nom'             => new sfValidatorString(array('max_length' => 255)),
                'cognoms'         => new sfValidatorString(array('max_length' => 255)),
                'ciutat'          => new sfValidatorString(array('max_length' => 100)),
                'email'           => new sfValidatorString(array('max_length' => 255)),
                'text'            => new sfValidatorString(),
        ));
        $this->validatorSchema['nom'] = new sfValidatorString(array(
                        'max_length' => 100,
                        'min_length' => 3,
                        'required' => true
                ),
                array(
                        'max_length' => '"%value%" té massa caràcters (ha de tenir 100 com a màxim).',
                        'min_length' => '"%value%" té pocs caràcters (ha de tenir 4  com a mínim).',
                        'required'   => 'Cal posar un nom'));
        $this->validatorSchema['cognoms'] = new sfValidatorString(
                array(
                        'max_length' => 100,
                        'min_length' => 3,
                        'required' => true
                ),
                array(
                        'max_length' => '"%value%" té massa caràcters (ha de tenir 100 com a màxim).',
                        'min_length' => '"%value%" té pocs caràcters (ha de tenir 4  com a mínim)',
                        'required'   => 'Cal escriure algun text per enviar el formulari.',
        ));

        $this->validatorSchema['email'] = new sfValidatorEmail(array(),array(
                        'invalid' => 'L’adreça electrònica no és vàlida',
                        'required'   => "Has d’indicar l'adreça electrònica per enviar el formulari."
        ));

        $this->validatorSchema['text'] = new sfValidatorString(array(),array('required' => 'Cal escriure algun text.'));

        $this->getWidgetSchema()->setDefaultFormFormatterName('contacte');
        $this->widgetSchema->setNameFormat('contacte[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

//        parent::setup();
    }
    public function bind(array $taintedValues = null, array $taintedFiles = null)
    {
        $taintedValues['text'] = strip_tags($taintedValues['text']);
        parent::bind($taintedValues, $taintedFiles);
    }
}
?>