<html>

<head>
</head>

<body>
  <?php
  date_default_timezone_set('Europe/Madrid');


  $captcha = filter_input(INPUT_POST, 'recaptcha_response', FILTER_SANITIZE_STRING);
  if (!$captcha) {
    echo 'Please check the captcha form.';
    echo '<script>window.setTimeout(function () {window.history.back();},10000);</script>';
    exit;
  }
  $secretKey = '6LctbbsUAAAAAHC8ATKev9MXogUP8PCR8NSCK0_i';
  $ip = $_SERVER['REMOTE_ADDR'];

  // post request to server
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array('secret' => $secretKey, 'response' => $captcha);

  $options = array(
    'http' => array(
      'header'  => 'Content-type: application/x-www-form-urlencoded\r\n',
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );

  $context  = stream_context_create($options);
  $response = file_get_contents($url, false, $context);
  $responseKeys = json_decode($response, true);
  //header('Content-type: application/json');
  if ($responseKeys['success']) {
    $score = $responseKeys['score'];
    require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/configs/varsWeb.php');
    if ($score >= $minimoPersonaReal) {
      //echo 'ERES HUMANO';
      echo '<form id="form" action="' . $_POST['send'] . '" method="GET">';
      /*
      foreach (array_keys($_POST) as $field) {
        if ($field == 'recaptcha_response' || $field == 'button' || $field == 'send') {
          continue;
        }
        //echo $field.": ".$_POST[$field]."<br>";
        echo '<input type="hidden" name="' . $field . '" id="' . $field . '" value="' . $_POST[$field] . '">';
      }
      */
      $UserName = $_POST["username"];
      $UserEmail = $_POST["email"];
      echo '<input type="hidden" name="name" id="name" value="' . $UserName . '">';
      echo '<input type="hidden" name="email" id="email" value="' . $UserEmail . '">';
      if (strpos($_POST['send'], 'beforeregister.html') !== false) {
        $t = date("y.m.d"); // e.g. "03.10.01"
        $hash=hash('gost', "a.l45Up=dF8t0".$UserEmail.$t,false);
        //$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

        //PHP MAIL
        $SentToEmail = $UserEmail; //email destinatario
        $SentToName =  $UserName; //NAME OR NULL 
        $Asunto = 'Register complet';
        $BodyHTML = 'Hola que tal, '.$UserName.'? <br><a href="'.$actual_link.'/example/users/beforeregister.html?key='.$hash.'">clicl Aqui</a>'; //Cuerpo
        $x = require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/mail/emailUnique.php');//MAIL
       //PHP MAIL
        require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/mongo/UserTempInsert.php');

        echo '<input type="hidden" name="resultMail" id="resultMail" value="' . $x . '">';

      }
      echo '<input type="hidden" name="exit" id="exit" value="' . $score . '">';
      echo '</form><script>window.onload = function(){document.forms[\'form\'].submit();}</script>';
    } else {
      echo 'Please check the form'; //echo 'ERES ROBOT';
      echo '<script>window.setTimeout(function () {window.history.back();},10000);</script>';
    }
    //echo PHP_EOL.'Tu puntuaccion es de ' . $score;
  } else {
    echo 'Please check the form or contact an administrator.'; //echo 'ha ocurrdio un error';
    sleep(10);
    echo '<script>window.setTimeout(function () {window.history.back();},10000);</script>';
  }
  ?>
</body>

</html>