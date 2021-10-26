<div style="padding:50px">
  <div class="button" id="payButton">Click me to pay</div>
</div>



<footer>
  <p class="container">&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?> </p>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="<?php get_site_url(); ?>/js/scripts.js"></script>


<script>
  getSaferpayTransactionId().then(data => {
    if (data.error) {
      console.error(data);
    } else {
      console.log(data);
    }
  });

  async function getSaferpayTransactionId() {
    const url = 'http://localhost/transcontinental_list/actions/generate_saferpay_transaction_id.php';
    const response = await fetch(url);
    const data = await response.json();
    return data;
  }
</script>

<!--
<script src="https://pay.sandbox.datatrans.com/upp/payment/js/datatrans-2.0.0.js"></script>
<script>
  const payButton = document.getElementById('payButton');
  payButton.style.display = 'none';

  getDatatransTransactionId().then(data => {
    if (data.error) {
      console.error(data);
    } else if (data.transactionId) {
      console.log(data);
      payButton.style.display = 'block';
      payButton.onclick = function() {
        Datatrans.startPayment({
          transactionId: data.transactionId,
          'opened': function() {
            console.log('payment-form opened');
          },
          'loaded': function() {
            console.log('payment-form loaded');
          },
          'closed': function() {
            console.log('payment-page closed');
          },
          'error': function() {
            console.log('error');
          }
        });
      };


    }
  });

  async function getDatatransTransactionId() {
    const url = 'http://localhost/transcontinental_list/actions/generate_datatrans_transaction_id.php';
    const response = await fetch(url);
    const data = await response.json();
    return data;
  }
</script>
-->

</body>

</html>