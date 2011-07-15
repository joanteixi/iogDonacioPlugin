 <?php use_helper('Payment'); ?>
<?php use_stylesheet('/iogContactePlugin/css/form_donacions.css'); ?>

<div class="sermepa_connect">
  
          <h1>Connectant amb la plataforma de pagament...
<br>
<img alt="Loading..." src="/images/icons/ajax-loader-tpv.gif"></h1>

          <?php echo payment_form_tag_for($pagament->getGateway()); ?>
            
          <p>En uns segons seràs redirigit a la pàgina del banc per fer el pagament amb tarja. </p>
          <p><a href="javascript:{}" onclick="document.forms[0].submit(); return false;">Clica aquí si no es redirigeix la pàgina automàticament</a></p>

          </form>

</div>
<script type="text/javascript">
  setTimeout('redirect()',2000);
function redirect()
{
  document.forms[0].submit();
}
  </script>