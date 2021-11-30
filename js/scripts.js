(function ($, root, undefined) {
  $(function () {
    "use strict";

    var $areyousurelinks = $(".areyousurelink");
    $areyousurelinks.on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var $href = $this.attr("href");
      if (confirm("Êtes-vous sûr de vouloir supprimer ceci?")) {
        window.location.href = $href;
      }
    });

    // use pictures to change the picture id for the giftcard or list
    var $picture_select = $("#picture");
    var $change_pictures = $(".change_picture");
    $change_pictures.on("click", function (e) {
      var $this = $(this);
      var $picture_id = $this.data("picture");
      $change_pictures.removeClass("selected");
      $this.addClass("selected");
      if ($picture_select.length) {
        $picture_select.val($picture_id).change();
      }
    });

    // remove button on submit
    // show spinner on submit
    var $form = $("form");
    var $submit_button = $("#submit_button");
    var $spinner = $("#spinner");
    var $form_is_invalid = $("#form_is_invalid");
    $form_is_invalid.hide();
    $form.on("submit", function (e) {
      $form_is_invalid.hide();
      $submit_button.hide();
      $spinner.show();
    });

    $submit_button.on("click", function () {
      const inputs = document.getElementsByTagName("input");
      let form_valid = true;
      for (let i = 0; i < inputs.length; i++) {
        const input = inputs[i];
        const is_valid = input.checkValidity();
        if (is_valid) {
          input.classList.remove("invalid");
        } else {
          form_valid = false;
          input.classList.add("invalid");
        }
      }

      if (form_valid) {
        $form_is_invalid.hide();
      } else {
        $form_is_invalid.show();
      }
    });

    // // check amount is properly formatted
    // // only allow numbers
    // var $amount = $('#amount');
    //
    // $amount.on('keyup blur paste', function(e){
    //     var $this = $(this);
    //     var $value = $this.val();
    //     // only allow numbers
    //     // only allow upto 5 digits, ie no numbers above CHF 100,000
    //     // remove anything after the decimal
    //     var $newValue = $value.replace(/,+/g,'.').replace(/[^0-9\.]+/g,'');
    //     // var $newValue = $value.split('.')[0].substring(0,5);
    //      $this.val($newValue);
    //     // var $hasOnlyNumbers = $value.match(/[0-9]+/g) == $value;
    //
    //
    // });

    $(".half_block").matchHeight();

    if (typeof donation_edit_url !== "undefined") {
      var $donation_checkboxes = $(".update_donation_validated");
      $donation_checkboxes.on("click", function (e) {
        var $val = 0;
        var $this = $(this);
        var $id = $this.data("id");
        var $checked = $this.prop("checked");
        if ($checked) {
          $val = 1;
        }

        var request = $.ajax({
          method: "POST",
          url: donation_edit_url,
          data: {
            donation_id: $id,
            submit_ajax: true,
            validated: $val,
          },
        });
        request.done(function (msg) {
          console.log(msg);
        });
        request.fail(function () {
          alert("error");
        });

        console.log($id, $val);
      });
    } // end of if have donation_edit_url
  });
})(jQuery, this);
