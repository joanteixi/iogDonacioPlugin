<?php use_helper('Date') ?>

<?php use_javascript('/js/accordion/jquery-1.5.1.min.js'); ?>
<?php use_javascript('/js/accordion/jquery-ui-1.8.13.custom.min.js'); ?>
<?php use_javascript('/js/accordion/ca.js'); ?>
<?php use_stylesheet('/js/accordion/css/south-street/jquery-ui-1.8.13.custom.css'); ?>
<?php use_stylesheet('/iogContactePlugin/css/form_donacions.css'); ?>

<!-- tooltip -->
<?php // use_javascript('jqueryTools.js'); ?>
<?php // use_javascript('jquery.tools/configure_tooltip.js'); ?>
<?php // use_stylesheet('/js/jquery.tools/tooltip.css'); ?>



<div class="formulari_donacio">

  <form id="donacio" action="<?php echo url_for('donacio/envia') ?>" method="POST" >

    <?php if ($form->hasErrors()): ?>
<!--      <ul class='error_list'><li>Hi ha errors que cal corregir. Revisa el formulari</li></ul>-->
    <?php endif ?>
      <fieldset>
        <div class="titol">
          <h2>Dades personals</h2>
          <p>Introdueix les teves dades</p>
        </div>
        <ul>
        <?php echo $form['nom']->renderRow(array('class' => 'dos_elements')) ?>
        <?php echo $form['cognoms']->renderRow() ?>
      </ul>

      <p class="avis">Si actues en nom d’una entitat, organització o empresa, introdueix aquí el seu nom
        complet i a partir d’ara omple el formulari amb les seves dades</p>

      <ul>

        <?php echo $form['entitat']->renderRow() ?>
        <?php echo $form['direccio']->renderRow() ?>
        <?php echo $form['codi_postal']->renderRow() ?>
        <?php echo $form['ciutat']->renderRow() ?>
        <?php echo $form['telefon']->renderRow() ?>
        <?php echo $form['email']->renderRow() ?>
        <?php echo $form['professio']->renderRow() ?>
        <?php echo $form['dni']->renderRow() ?>
        <?php echo $form['data_naixement']->renderRow() ?>
      </ul>

      <p class="avis">Recorda que per desgravar un 40% de l'import del teus donatius a la declaració de la renda, és necessari que ens facis arribar les teves dades.</p>
    </fieldset>

    <fieldset class="contribucio">
      <div class="titol">
        <h2>Dades econòmiques</h2>
        <p>Selecciona com vols fer la teva aportació</p>
      </div>
          <div class="imports">
          <a href="#">5 €</a>
          <a href="#">10 €</a>
          <a href="#">20 €</a>
          <a href="#">120 €</a>
        </div>
        
      <ul class="import_donacio">
        <li class="donacio_list">
         
          <?php echo $form['donacio']->renderLabel(); ?>
          <?php echo $form['donacio'] ?><span>.00 €</span>
        </li>
     <?php if ($form['donacio']->hasError()) : ?>
          <ul class="error_list">
            <li><?php echo $form['donacio']->getError()?></li>
          </ul>
          <?php endif ?>
        <?php echo $form['periodicitat']->renderRow() ?>
        <li><label>Escull com vols fer el donatiu</label></li>
      </ul>
              <?php echo $form['forma_pagament']->renderError(); ?>

      <div id="accordion">
    <h3 id="tdom"><a href="#">Fer la donació mitjançant domiciliació bancària</a></h3>
        <div id="dom">

            <?php echo $form['entitat_compte']->renderError() ?>
            <?php echo $form['oficina']->renderError() ?>
            <?php echo $form['dc']->renderError() ?>
            <?php echo $form['cc']->renderError() ?>
               <?php echo $form['titular_compte']->renderRow() ?>
          <li class="curt">
            <?php echo $form['entitat_compte']->renderLabel() ?>
            <?php echo $form['entitat_compte']->render(array('maxlength' => 4)) ?>
          </li>
          <li class="curt">
            <?php echo $form['oficina']->renderLabel() ?>
            <?php echo $form['oficina']->render(array('maxlength' => 4)) ?>
          </li>
          <li class="curt">
            <?php echo $form['dc']->renderLabel() ?>
            <?php echo $form['dc']->render(array('maxlength' => 2, 'class' => 'dc')) ?>
          </li>
          <li class="curt">
            <?php echo $form['cc']->renderLabel() ?>
            <?php echo $form['cc']->render(array('maxlength' => 10, 'class' => 'cc')) ?>
          </li>
        </div>
          <h3 id="ttr"><a href="#">Fer la donació per transferència bancària</a></h3>
        <div id="tr">
          <p>La transferencia es pot fer en qualsevol de les següents entitats bancàries:</p>
          <ul>
            <li>My bank account: XXXX-XXXX-XX-XXXXXXXXXX</li>
          </ul>
          <p>En el moment de fer la transferència posa el teu nom en el concepte de la transferència</p>
        </div>

          <h3 id="ttelf"><a href="#">Per telèfon</a></h3>
          <div id="telf">
            <p>Si ho prefereixes, ens pots deixar el teu telèfon i et trucarem per explicar més detingudament com col·laborar.</p>
            <?php echo $form['telefon']->render(array('id' => 'donacio_telefon_ext'));?>
          </div>

          <h3 id="txec"><a href="#">Enviant un xec</a></h3>
        <div id="xec">
          <p>Fes-nos arribar un xec nom de ... </p>
        </div>


         <h3 id="ttarja"><a href="#">Pagant amb tarjeta</a></h3>
        <div id="tarja">
          <p>Fes click en el botó "fer donació" i seràs redirigit a un sistema de pagament segur</p>
        </div>

          <h3 id="tma"><a href="#">Emplenant a mà les teves dades</a></h3>
        <div id="ma">
          <a href="" target="_blank"><img class="left" alt="PDF" style="margin-right: 15px" src="/images/icons/pdf50x70.png" /></a>
          <p>Imprimeix <a class="pdf" target="_blank" href="/media/fundraising/Camp.FB/2011.04.11___Correos_Apartado_ant__dot.pdf">aquesta butlleta</a> i envia-la a . </p>
        </div>

      
      </div>
      <div id="forma_pagament">
        <?php echo $form['forma_pagament']->renderRow(array('class' => 'forma_pagament')) ?>
      </div>

    <div><input type="submit" value="Fer la donació" /></div>

    <div class="avisos">
      <p>Moltes gràcies per confiar en nosaltres i voler ser part d’aquest projecte.</p>
      <p class="problema">Si tens algun problema o dubte sobre com omplir el formulari, si us plau, truca’ns</p>
      
    </div>
    </fieldset>
<ul>

<li><input type="checkbox" name="newsletter"><label for="newsletter">Vull rebre informació </label></li>
<li><input id="legal"  <?php echo $sf_user->getFlash('legal') == 1 ? 'checked="checked"' : ''  ?>type="checkbox" name="legal"><label for="legal">He llegit i  accepto les condicions d’us * </label></li>
</ul>

    <div class="legal"><h4>Condicions d'ús</h4><p>XXXXX li garanteix que les dades que vostè ens lliura voluntàriament seran introduïdes a la Base de Dades General d’Administració de la XXXXXX, registrada en el R.G.F.P. de la A.E.P.D. amb la denominació XXXXXX, el responsable de la qual és la pròpia XXXXX, a fi d’atendre la seva sol·licitud i per informar-li de les nostres activitats.

En tot cas i en qualsevol moment, vostè pot consultar, accedir, rectificar, cancel·lar o bé oposar-se que tractem les seves dades dirigint-se a les nostres oficines situades a la XXXXX on li facilitaran els impresos oficials oportuns i adequats a la seva pretensió.</p></div>


  </form>
  <div class="clear"></div>
</div>
<script type="text/javascript">
  $(function() {
		$( "#accordion" ).accordion({
                        active: '#t<?php echo $form['forma_pagament']->getValue();?>',
                        autoHeight: false,
                        change: function(event, ui) {
                          $('#donacio_forma_pagament_'+$(ui.newContent).attr('id')).trigger('click');
                        }

		});

                //al clicar en imports es posen en la caixa de donació
                $('div.imports a').click(function() {
                  $('#donacio_donacio').val(parseFloat($(this).html()));
                  return false;
                })

                //mateix telefon a les dues capses
                $('#donacio_telefon_ext').change(function() {
                  $('#donacio_telefon').val(this.value);
                })
                $('#donacio_telefon').change(function() {
                  $('#donacio_telefon_ext').val(this.value);
                })
                $('#donacio').submit(function() {
                  if (!$('#legal').is(':checked')) {
                    alert("Cal acceptar les condicions d'us");
                    return false;
                  }
                    $('input[type=submit]').val('Enviant ...').addClass('enviant');
                  return true;
                })

                //hover en botó
                $('input[type=submit]').hover(function() {
                  $(this).addClass('hover');
                }, function() {
                  $(this).removeClass('hover')
                })
	});

</script>
