<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class contacteComponents extends sfComponents
{
    public function executeFormulariBasic($request)
    {
      $this->form = new BasicForm();
    }
}
?>
