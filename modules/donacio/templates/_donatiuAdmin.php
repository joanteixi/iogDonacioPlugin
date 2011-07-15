<h1 style="font-size:14px">
  Donatiu
</h1>

<ul>
  <li><?php echo $form->getNom() . ' ' . $form->getCognoms() ?></li>
  <li>Entitat: <?php echo $form->getEntitat(); ?>></li>
  <li>NIF: <?php echo $form->getDni() ?></li>
  <li>Adreça: <?php echo $form->getDireccio(); ?></li>
  <li>Població: <?php echo $form->getCiutat(); ?></li>
  <li>Codi postal: <?php echo $form->getCodiPostal(); ?></li>
  <li>Telefon: <?php echo $form->getTelefon() ?></li>
  <li>Email: <?php echo $form->getEmail() ?></li>
  <li>Profesió: <?php echo $form->getProfessio() ?></li>
  <li>Data naixement: <?php echo $form->getDataNaixement() ?></li>
  <li>Import: <?php echo $form->getDonacio() ?></li>
  <li>Periodicitat: <?php echo $form->getPeriodicitat() ?></li>
  <li>Forma pagament: <?php echo $form->getFormaPagament() ?></li>
  <?php if ($form->getFormaPagament() == 'dom') : ?>
    <li>Dades bancàries:
      <ul>
        <li><?php echo $form->getTitularCompte() ?></li>
        <li><?php echo $form->getEntitatCompte() ?> - <?php echo $form->getOficina() ?> - <?php echo $form->getDc() ?> - <?php echo $form->getCc() ?></li>
      </ul>
    </li>  
  <?php endif ?>
    <li>Rep newsletter?: <?php echo $form->getNewsletter() ? 'Sí' : 'No' ?></li>
</ul>


<p><a href="http://www.backend.com/admin.php/donacions/<?php echo $form->getId()?>/edit">Pots accedir a l'administrador </a>per gestionar aquesta donació</p>
<p><a href="http://www.backend.com/admin.php/donacions/<?php echo $form->getId()?>/csv">Descarrega't la informació per excel</a></p>
