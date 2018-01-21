(function ($, root, undefined) {
    $(function () {
        'use strict';



        // use pictures to change the picture id for the giftcard or list
        var $picture_select = $('#picture');
        var $change_pictures = $('.change_picture');
        $change_pictures.on('click', function (e){
            var $this = $(this);
            var $picture_id = $this.data('picture');
            $change_pictures.removeClass('selected');
            $this.addClass('selected');
            if ($picture_select.length) {
                $picture_select.val($picture_id).change();
            };
        })

        // remove button on submit
        // show spinner on submit
        var $form = $('form');
        var $submit_button = $('#submit_button');
        var $spinner = $('#spinner');
        $form.on('submit', function(e){
            $submit_button.hide();
            $spinner.show();
        });

        // check amount is properly formatted
        // only allow numbers
        var $amount = $('#amount');

        $amount.on(' blur paste', function(e){
            var $this = $(this);
            var $value = $this.val();
            // only allow numbers
            // only allow upto 5 digits, ie no numbers above CHF 100,000
            // remove anything after the decimal
            // .replace(/[^0-9]+/g,'')
             var $newValue = $value.split('.')[0].substring(0,5);
             $this.val($newValue);
            // var $hasOnlyNumbers = $value.match(/[0-9]+/g) == $value;


        });


        $('.half_block').matchHeight();



    });

})(jQuery, this);
