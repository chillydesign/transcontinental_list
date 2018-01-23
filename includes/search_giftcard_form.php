<form action="<?php get_site_url();?>/adminarea/giftcards" method="get">
    <p class="search_container">
      <?php $value = (get_var('s')) ? get_var('s') : '';  ?>
    <input class="search_input" value="<?php echo $value; ?>" type="text" name="s" placeholder="Rechercher un bons cadeau"/>
    <button type="submit" class="search_button">Chercher</button>
  </p>
</form>
