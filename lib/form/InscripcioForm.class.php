<?php
class InscripcioForm extends BaseInscripcioForm
{
    public function configure()
    {
        $this->widgetSchema['email']->setLabel('Adreça electrònica');
        $this->widgetSchema['data_naixement']->setOption('format', '%day%/%month%/%year%');
        $this->widgetSchema['data_naixement']->setOption('years', $this->anys());
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
        $this->validatorSchema['data_naixement'] = new sfValidatorDate(array(),array('required' => 'Cal posar la data de naixement'));

        $this->getWidgetSchema()->setDefaultFormFormatterName('contacte');
    }

    protected function anys()
    {
        $ar = array();
        $n = '1950';
        while($n < 1996)
        {
            $ar[$n] = $n;
            $n++;

        }
        return $ar;
    }

}
?>