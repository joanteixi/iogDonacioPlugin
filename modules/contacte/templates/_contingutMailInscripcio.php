<p>Des del formulari web de contacte s'ha enviat aquesta sol·licitud d'inscripció al curs:</p>
<ul>
    <li>Nom i cognoms: <?php echo $c->getNom().' '.$c->getCognoms()?></li>
    <li>E-mail: <?php echo $c->getEmail() ?></li>
    <li>DNI <?php echo $c->getDni() ?></li>
    <li>Telefon: <?php echo $c->getTelefon() ?></li>
    <li>Escola: <?php echo $c->getEscola() ?></li>
    <li>Data naixement: <?php echo $c->getDataNaixement('d-M-y') ?></li>
</ul>
<p><a href="http://www.backend.com/downloadExcel">Descarrega't l'excel d'inscripcions</a></p>
<p>Fí del missatge.</p>

<p>Aquest correu electrònic s'ha generat automàticament.</p>

