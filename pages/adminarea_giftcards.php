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


    <div class="row">
        <div class="col-sm-6">
            <div class="half_block">
                <h2>Liste des bons cadeaux</h2>
                <?php include('includes/search_giftcard_form.php'); ?>
                <ul>
                    <?php foreach (  get_giftcards() as $giftcard) : ?>
                        <li>
                            <a href="<?php get_site_url(); ?>/adminarea/giftcard?id=<?php echo convert_giftcard_id($giftcard->id); ?>">
                                <strong> Bon de <?php echo convert_cents_to_currency($giftcard->amount); ?>  pour: <?php echo $giftcard->receiver_first_name; ?> <?php echo $giftcard->receiver_last_name; ?></strong><br>
                                De la part de: <?php echo $giftcard->sender_first_name; ?> <?php echo $giftcard->sender_last_name; ?>
                            </a>
                            <br> <em>Créé le <?php  echo nice_date($giftcard->created_at); ?></em>

                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php
                use JasonGrimes\Paginator;
                $totalItems = count_giftcards();
                $itemsPerPage = posts_per_page();
                $currentPage = get_var('p');
                $s = (get_var('s')) ? "&s=" . get_var('s') : '';
                $urlPattern = site_url() . '/adminarea/giftcards?p=(:num)' . $s;
                $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
                $paginator->setMaxPagesToShow(3);
                $paginator->setPreviousText('Précédent');
                $paginator->setNextText('Suivant');
                echo $paginator;
                ?>
            </div>
        </div>
        <div class="col-sm-6">

        </div>
    </div>





</div>
