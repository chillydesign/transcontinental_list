<form action="<?php get_site_url();?>/adminarea/users" method="get">
    <p class="search_container">
      <?php $value = (get_var('s')) ? get_var('s') : '';  ?>
    <input class="search_input" value="<?php echo $value; ?>" type="text" name="s" placeholder="Rechercher un client"/>
    <button type="submit" class="search_button">Chercher</button>
  </p>
</form>
