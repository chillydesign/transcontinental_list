<?php $url = (has_valid_admin_cookie()) ? '/adminarea/list' : '/' . list_url(); ?>
<form action="<?php echo site_url() . $url; ?>/" method="get">
  <p class="search_container">
    <input class="search_input" type="text" name="id" placeholder="<?php t('numero_de_la_liste'); ?>" />
    <button class="search_button" type="submit"><?php t('chercher'); ?></button>
  </p>
</form>