<div class="page_image" style="background-image:url('<?php echo site_url(); ?>/images/honeymoon.jpg'); overflow: hidden;"></div>
<div class="container">

    <div class="row">
        <div class="col-sm-3 col-sm-push-9">
            <a class="list_button right_list_button" href="<?php get_site_url(); ?>/adminarea">Retour à l'admin</a>
        </div>
        <div class="col-sm-9 col-sm-pull-3">
            <h1>Bons cadeaux</h1>
        </div>
    </div>
    <?php if (has_error()) : ?>
        <?php show_error_message(); ?>
    <?php endif; ?>
    <?php $archive = (get_var('archive'))  ? $_GET['archive']  :  'paye'; ?>
    <?php $giftcards =  get_giftcards($archive); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="half_block">
                <h2>Liste des bons cadeaux</h2>
                <?php include('includes/search_giftcard_form.php'); ?>
                <ul>
                    <?php foreach ($giftcards as $giftcard) : ?>
                        <?php $status = ($giftcard->status == 'utilisé' ? 'giftcard_used' : ''); ?>
                        <li class="<?php echo $status ?>">
                            <a href="<?php get_site_url(); ?>/adminarea/giftcard?id=<?php echo ($giftcard->id); ?>">
                                <strong> Bon #<?php echo ($giftcard->id); ?> de <?php echo convert_cents_to_currency($giftcard->amount); ?> pour: <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?></strong><br>
                                De la part de: <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?>
                            </a>
                            <br> <em>Créé le <?php echo nice_date($giftcard->created_at); ?></em>

                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php

                use JasonGrimes\Paginator;

                $totalItems =  count_giftcards($archive);
                $itemsPerPage = posts_per_page();
                $currentPage = get_var('p');
                $s = (get_var('s')) ? "&s=" . get_var('s') : '';
                $urlPattern = site_url() . '/adminarea/giftcards?p=(:num)' . $s . '&archive=' . $archive;
                $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
                $paginator->setMaxPagesToShow(3);
                $paginator->setPreviousText('Précédent');
                $paginator->setNextText('Suivant');
                echo $paginator;
                ?>
                <hr>
                <p>
                    <a <?php giftcardArchiveSelected('actif'); ?> href="<?php echo site_url(); ?>/adminarea/giftcards?p=1&archive=actif">actif</a> |
                    <a <?php giftcardArchiveSelected('nonpaye'); ?> href="<?php echo site_url(); ?>/adminarea/giftcards?p=1&archive=nonpaye">non payé</a> |
                    <a <?php giftcardArchiveSelected('annule'); ?> href="<?php echo site_url(); ?>/adminarea/giftcards?p=1&archive=annule">annulé</a> |
                    <a <?php giftcardArchiveSelected('utilise'); ?> href="<?php echo site_url(); ?>/adminarea/giftcards?p=1&archive=utilise">utilisé</a>
                </p>


            </div>

        </div>
        <div class="col-sm-6">
            <div class="half_block">
                <h2>Ajouter une bons cadeaux</h2>
                <?php include('includes/new_giftcard_form.php'); ?>
            </div>
        </div>
    </div>





</div>