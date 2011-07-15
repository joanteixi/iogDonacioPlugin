<?php

/**
 * donacio actions.
 *
 * @package    serveisolidari
 * @subpackage donacio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class donacioActions extends sfActions {

  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $this->form = new DonacioForm();
  }

  public function executeEnvia(sfWebRequest $request) {
    $this->form = new DonacioForm();
    $this->getUser()->setFlash('legal', 1);
    $this->form->bind($request->getParameter($this->form->getName()));
    if ($this->form->isValid()) {

      //grabem les dades del form...
      $this->form->save();
      //si tarja enviem petició a sis-sermepa
      if ($this->form->getValue('forma_pagament') == 'tarja') {
        $this->pagarAmbTarja();
        $this->setTemplate('pagamentAmbTarja');
        return sfView::SUCCESS;
      }

//enviar correu-e añ donant si han posat el email

      if ($this->form->getValue('email')) {
        $this->enviarEmailDonant();
      }

//envia email a admin serveisolidai
      $this->enviarEmailAdmin();
//enviar a la pàgina OK
      $this->getUser()->setFlash('donacio_id', $this->form->getObject()->getId());
      $this->redirect('donacio/gracies');
    }

    $this->setTemplate('index');
  }

  public function executeGracies() {
  }
  
    public function executeGraciesTarja() {
        
      
  }
  
  public function executePagamentDenegat() {
    
  }

  protected function conectarEmail() {
    $conn = Swift_SmtpTransport::newInstance("ssl://smtp.googlemail.com", 465)
            ->setUsername('mail@gmail.com')
            ->setPassword('1234');
    return $conn;
  }

  protected function enviarEmailDonant() {
    $swift = Swift_Mailer::newInstance($this->conectarEmail());
    $message = Swift_Message::newInstance();

    $message->setSubject('[DONATIU] Gràcies pel teu donatiu');
    $message->setFrom(array('no-reply@' . $this->getRequest()->getHost() => 'web@mydomain.org'));
    $message->setBody($this->getPartial('donatiuDonant', array('form' => $this->form->getObject())), "text/html");

 //test development
    $message->setTo(sfConfig::get('app_mails_send_notificacions', 'mail@mydomain.com'));
    //real
//    $message->setTo($this->form->getObject()->getEmail());
    try {
      $swift->send($message);
    } catch (Exception $e) {
      throw new sfException('Caught exception: ', $e->getMessage());
    }
  }

  public function executePagamentRealitzat() {
    $this->setTemplate('gracies');
  }

  public function executeResultatPagament(sfWebRequest $request) {
    //recollir dades, i guardar en registre de pagament.
    $gateway = new sfPaymentSermepa();
    $pagament = new sfPaymentTransaction($gateway);

    if ($pagament->collectPostVariables($request->getPostParameters())) {
      // si el collect funciona... grabamos los datos
      $donacio = DonacioPeer::retrieveByNPedido($pagament->getNbPedido());
      if ($donacio) {
        $donacio->setResponse($pagament->getResponse());
        $donacio->save();
      }
    }
    
    return $this->renderText('ok');
  }

  protected function enviarEmailAdmin() {

    $swift = Swift_Mailer::newInstance($this->conectarEmail());
    $message = Swift_Message::newInstance();

    $message->setSubject('[DONATIU] Donatiu ' . $this->form->getObject()->getNom() . ' ' . $this->form->getObject()->getCognoms());
    $message->setFrom(array('no-reply@' . $this->getRequest()->getHost() => 'web@mydomain.com'));
    $message->setBody($this->getPartial('donatiuAdmin', array('form' => $this->form->getObject())), "text/html");

    $message->setTo('admin@mydomain.com');
    try {
      $swift->send($message);
    } catch (Exception $e) {
      throw new sfException('Caught exception: ', $e->getMessage());
    }
  }

  protected function pagarAmbTarja() {
    $gateway = new sfPaymentSermepa();
    $pagament = new sfPaymentTransaction($gateway);
    //enable or disable test mode:
    $pagament->enableTestMode();
    $pagament->setImporte($this->form->getValue('donacio') * 100);
    $pagament->setTitular($this->form->getValue('nom'). ' '. $this->form->getValue('cognoms'));
    $pagament->prepareSubmit();
    $o = $this->form->getObject();
    $o->setNbPedido($pagament->getNbPedido());
    $o->save();
    
    $this->pagament = $pagament;
    
  }

}
