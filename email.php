<?php


  //$to = 'aggrenier@gmail.com';
  $to = 'info@nicksoru.com';

  $emailAddress = $_POST['email'];

  $subject = 'Soru - Contact';

  $from = $emailAddress;

  $headers = "From: $from"."\r\n".
      "Reply-To: $from"."\r\n";

  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '';
  $message = '<html><body>';

  foreach ($_POST as $key => $value) {
      $message .= "<strong>$key</strong> </br>".$value.'</br></br>';

      //echo "<strong>$key</strong> </br>" . $value . "</br></br>";
  }

  $message .= '</body></html>';

  if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];
  if(!$captcha){
    echo '';
    exit;
  }
  $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf3mB0UAAAAAAMaV7rlM_N2HM5StkR5-yn_RaoZ&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);

  if($response['success'] == false):

    mail($to, $subject, $message, $headers, "-f$from");
  else:

    echo '<h2>Thanks for posting comment.</h2>';
  endif;




?>


<script>

window.setTimeout(function(){


        // Move to a new location or you can do something else
        window.location.href = "http://nicksoru.com/thanks.html";

    }, 10);

</script>

<style>


h1 {
    text-align: center;
}

</style>
