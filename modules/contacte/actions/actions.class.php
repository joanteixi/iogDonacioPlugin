<?php

/**
 * contacte actions.
 *
 * @package    aptic
 * @subpackage contacte
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class contacteActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex($request)
    {

        $this->content = ContingutPeer::retrieveByApartat('formulari');
        $this->form = new BasicForm();
        if ($request->isMethod('POST'))
        {
            $this->form->bind($request->getParameter('contacte'));
            if ($this->form->isValid())
            {
                $this->c = $request->getParameter('contacte');
                $this->enviarCorreu();
                return $this->redirect('contacte/gracies');
            }
        }


    }
    public function executeGracies($request)
    {

    }
    protected function enviarCorreu()
    {
        $conn = Swift_SmtpTransport::newInstance("ssl://smtp.googlemail.com",465)
                ->setUsername('test@gmail.com')
                ->setPassword('PASSWORD');

        $swift = Swift_Mailer::newInstance($conn);
        $message = Swift_Message::newInstance();


        $message->setSubject('[WEB] Nova demanda des de formulari contacte');
        $message->setFrom(array('no-reply@'.$this->getRequest()->getHost() => 'web@mydomain.com'));
        $message->setBody($this->getPartial('contingutMailContacte',array('form' => $this->form)),"text/html");

		$message->setTo(sfConfig::get('app_mails_send_notificacions', 'mail@mydomain.com'));
        try
        {
            $swift->send($message);
        } catch (Exception $e)
        {
            throw new sfException( 'Caught exception: ',  $e->getMessage());
        }

    }

    public function executeUpdateBasicForm($request)
    {
        $this->form = new BasicForm();
        $this->form->bind($request->getParameter('contacte'));
        if ($this->form->isValid())
        {
            $this->c = $request->getParameter('contacte');
            $this->enviarCorreu();
            return $this->renderText("El teu missatge s'ha enviat correctament.");


        } else {
        return $this->renderPartial('formulariBasic');
        

        }

    }
}


