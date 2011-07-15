<?php use_stylesheet('/iogContactePlugin/css/form_contacte.css'); ?>
<?php use_helper('jQuery'); ?>
<?php use_javascript('effects.js');?>
    <div id="indicator" style="display:none"><img src="/images/icons/bar-ajax-loader.gif" alt="Loading..." /> </div>
<div id="formulari_basic" class="form">
   <?php echo jq_form_remote_tag(array(
     'url'      => 'contacte/updateBasicForm',
     'update'   => 'formulari_basic',
     'loading'  => "$('#indicator').show(); $('#formulari_basic').hide()",
     'success'  => "$('#indicator').html('<h2>'+data+'</h2>').effect('highlight',{},2000)",
     
   )) ?>
    <table>
<?php echo $form ?>

    <tr><td colspan="2"><input type="submit" value="Enviar" /></td> </tr>
</table>
</form>
</div>