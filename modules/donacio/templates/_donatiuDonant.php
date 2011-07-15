 <?php
  $periodicitat = array('puntual' => 'Puntual', 'men' => 'Mensual', 'trim' => 'Trimestral', 'anual' => 'Anual');
  $pagament = array("dom" => "Domiciliacio", "tr" => "Transferencia", "telf" => "Per telèfon", "xec" => "Xec bancari", "tarja" => "Tarjeta de crèdit","ma" => "Manual");
 ?>
<h1 style="font-size:14px">
  Gràcies pel teu donatiu 
</h1>
<p>A continuació et mostrem les dades que ens has proporcionat. Si vols fer algún canvi, ens ho pots comunicar al nostre
  correu electrònic (info@mydomain.org) o bé responent aquest mateix e·mail. </p>
<ul>
  <li><?php echo $form->getNom() . ' ' . $form->getCognoms() ?></li>
  <?php if ($form->getEntitat()) : ?>
  <li>Entitat: <?php echo $form->getEntitat(); ?></li>
 <?php endif ?>

  <li>NIF: <?php echo $form->getDni() ?></li>
  <li>Adreça: <?php echo $form->getDireccio(); ?></li>
  <li>Població: <?php echo $form->getCiutat(); ?></li>
  <li>Codi postal: <?php echo $form->getCodiPostal(); ?></li>
  <li>Telefon: <?php echo $form->getTelefon() ?></li>
  <li>Email: <?php echo $form->getEmail() ?></li>
  <li>Profesió: <?php echo $form->getProfessio() ?></li>
  <li>Data naixement: <?php echo $form->getDataNaixement() ?></li>
  <li>Import: <?php echo $form->getDonacio() ?></li>
  <li>Periodicitat del donatiu: <?php echo $periodictat[$form->getPeriodicitat()] ?></li>
  <li>Forma pagament del donatiu: <?php echo $pagament[$form->getFormaPagament()] ?></li>
  <?php if ($form->getFormaPagament() == 'dom') : ?>
    <li>Dades bancàries:
      <ul>
        <li><?php echo $form->getTitularCompte() ?></li>
        <li><?php echo $form->getEntitatCompte() ?> - <?php echo $form->getOficina() ?> - <?php echo $form->getDc() ?> - <?php echo $form->getCc() ?></li>
      </ul>
    </li>  
  <?php endif ?>
</ul>

<p>Servei Solidari</p>

