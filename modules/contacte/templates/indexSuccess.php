<?php use_stylesheet('/iogContactePlugin/css/form_contacte.css'); ?>
<?php echo $content ?>


<form action='<?php echo url_for('contacte/index') ?>' method="POST" >
<table id='contacte'>
<?php echo $form?>
<tr>
<td colspan="2"><?php echo submit_tag(__('Envia'))?>
</table>

</form>