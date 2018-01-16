<?php $url = (has_valid_admin_cookie()) ? '/adminarea/list' : '/list'; ?>
<form action="<?php echo site_url() . $url; ?>/" method="get">
    <p><input type="text" name="id" placeholder="list number" /></p>
    <p> <button type="submit">Search</button></p>
</form>
