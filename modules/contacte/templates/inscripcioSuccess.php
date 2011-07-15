<?php use_stylesheet('/iogContactePlugin/css/form_contacte.css'); ?>
<div id="centre">
<h2><?php echo __('Inscripció')?></h2>



<h3 class="titular_estrella_color0">Inscripció a la <strong>formació bàsica II</strong></h3>
<p>Make inscription</p>
<form action='<?php echo url_for('contacte/inscripcio') ?>' method="POST" >
<table id='contacte'>
<?php echo $form?>
<tr>
<td colspan="2"><?php echo submit_tag('Envia')?>
</table>


</form>
</div>
