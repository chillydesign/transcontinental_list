<?php $url = (has_valid_admin_cookie()) ? '/adminarea/list' : '/list'; ?>
<form action="<?php echo site_url() . $url; ?>/" method="get">
    <p><input type="text" name="id" placeholder="numéro de la liste" /></p>
    <p> <button type="submit">Accéder</button></p>
</form>
