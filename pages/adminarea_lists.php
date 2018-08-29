<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">

    <div class="row">
        <div class="col-sm-3 col-sm-push-9">
            <a class="list_button right_list_button" href="<?php get_site_url(); ?>/adminarea">Retour à l'admin</a>
        </div>
        <div class="col-sm-9 col-sm-pull-3">
            <h1>listes</h1>
        </div>
    </div>
    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php endif; ?>


    <?php $archive = ( get_var('archive') )  ? $_GET['archive']  :  'active'; ?>
    <?php $lists = get_lists($archive); ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="half_block">
                <h2>Toutes les listes</h2>
                <?php include('includes/list_search.php'); ?>
                <ul>
                    <?php foreach (  $lists as $list) : ?>
                        <?php $list_status = ( $list->active == 0 ? 'list_inactive' : '' ); ?>
                        <li  class="<?php echo $list_status ?>">
                          <a href="<?php get_site_url(); ?>/adminarea/list?id=<?php echo $list->list_number; ?>">
                            <strong>#<?php echo $list->list_number;?> | <?php echo $list->name; ?> par <?php echo $list->first_name; ?> <?php echo $list->last_name; ?> </strong></a>
                            <br> <em>Créée le <?php  echo nice_date($list->created_at); ?></em>
                          </li>
                    <?php endforeach; ?>
                </ul>
                <?php
                use JasonGrimes\Paginator;
                $totalItems = count_lists( $archive );
                $itemsPerPage = posts_per_page();
                $currentPage = get_var('p');
                $s = (get_var('s')) ? "&s=" . get_var('s') : '';
                $urlPattern = site_url() . '/adminarea/lists?p=(:num)' . $s . '&archive=' . $archive;
                $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
                $paginator->setMaxPagesToShow(3);
                $paginator->setPreviousText('Précédent');
                $paginator->setNextText('Suivant');
                echo $paginator;
                ?>
                <hr>
                <p><a href="<?php echo site_url(); ?>/adminarea/lists?p=1&archive=active">active</a> |
                <a href="<?php echo site_url(); ?>/adminarea/lists?p=1&archive=inactive">inactive</a> |
                <a href="<?php echo site_url(); ?>/adminarea/lists?p=1&archive=expired">expirée</a></p>
            </div>
        </div>
        <div class="col-sm-6">
          <div class="half_block">
            <h2>Ajouter une liste</h2>
            <?php include('includes/new_list_form.php'); ?>
          </div>
        </div>
    </div>





</div>
