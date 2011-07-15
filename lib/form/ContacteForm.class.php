<?php
class ContacteForm extends BaseContacteForm
{
    protected $tipus_persona = array('p' => 'Persona', 'e' => 'Entitat');
    protected $idioma = array('ca' => 'Català','es' => 'Castellà','en' => 'Anglès','fr' => 'Francès');
    protected $sexe = array('d' => 'Dona','h' => 'Home');

    public function configure()
    {

        $this->widgetSchema['pais_residencia'] = new sfWidgetFormI18nSelectCountry(array('culture' => 'ca_ES', 'default' => 'ES', 'add_empty' => 'Selecciona un país'));
        $this->widgetSchema['idioma_contacte'] = new sfWidgetFormChoice(array('choices' => $this->idioma, 'default' => 'ca'));
        $this->widgetSchema['sexe'] = new sfWidgetFormChoice(array('choices' => $this->sexe, 'default' => 'ca'));
        $this->widgetSchema['tipus_persona'] = new sfWidgetFormChoice(array('choices' => $this->tipus_persona, 'default' => 'p'));
        $this->widgetSchema->setLabels(array(
                'dni'           => 'DNI/NIF/PASSAPORT/NIE',
                'email'         => 'Adreça electrònica',
                'tipus_persona' => 'Persona o entitat'
        ));

        $this->widgetSchema->setPositions(array(
                'id'           ,
                'tipus_persona'   ,
                'sexe'            ,
                'nom'             ,
                'cognoms'         ,
                'dni'             ,
                'data_naixement'  ,
                'nacionalitat'    ,
                'direccio'        ,
                'codi_postal'     ,
                'ciutat'          ,
                'provincia'       ,
                'pais_residencia' ,
                'telefon'         ,
                'email'           ,
                'idioma_contacte' ,
                'accepta_mailing' ,
                'text'            ,
        ));

        //validators
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
        $this->validatorSchema['nacionalitat']->setMessages(array('required' => 'Cal escriure la nacionalitat'));
        $this->validatorSchema['ciutat']->setMessages(array('required' => 'Cal escriure la ciutat'));
        $this->getWidgetSchema()->setDefaultFormFormatterName('contacte');
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null)
    {
        $taintedValues['text'] = strip_tags($taintedValues['text']);
        parent::bind($taintedValues, $taintedFiles);
    }
}
?>