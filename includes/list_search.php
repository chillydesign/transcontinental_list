<?php $url = (has_valid_admin_cookie()) ? '/adminarea/list' : '/mariage'; ?>
<form action="<?php echo site_url() . $url; ?>/" method="get">
  <p class="search_container">
    <input class="search_input" type="text" name="id" placeholder="numéro de la liste" />
    <button class="search_button" type="submit">Chercher</button>
  </p>
</form>