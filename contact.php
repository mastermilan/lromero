<?php
if(isset($_POST['email'])) {
    $email_to = "lromerovaldes@gmail.com";
    $email_subject = "Nuevo contacto de Sitio web";
    function died($error) {
        // Mensaje de error
        echo "Disculpas, pero ha ocurrido un(os) error(es) con lo datos del formulario. ";
        echo "El o los errores son los siguientes.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor corrija los errores.<br /><br />";
        die();
    }
    // validacion de campos
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['message'])) {
        died('Disculpas, pero ha ocurrido un(os) error(es) al enviar el formulario.');       
    }
    $name = $_POST['name']; // obligatorio
    $email = $_POST['email']; // obligatorio
    $telephone = $_POST['telephone']; // no obligatorio
    $prioritycase = $_POST['prioritycase']; // no obligatorio
    $asunto = $_POST['asunto']; // no obligatorio
    $message = $_POST['message']; // obligatorio
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'La direccion de E-mail es incorrecta.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'EL nombre no es un nombre Valido.<br />';
  }
  if(!preg_match($string_exp,$website)) {
    $error_message .= 'La url no es valida.<br />';
  }
  if(strlen($message) < 2) {
    $error_message .= 'El comentario no parece estar completo.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message .= "Nombre: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Telefono: ".clean_string($telephone)."\n";
    $email_message .= "Mensaje: ".clean_string($message)."\n";
// estructura del correo
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
<meta http-equiv="refresh" content="3;URL=http://www.lromerov.tk" /><!-- Redireccionar a pagina principal despues de 3 segundos -->
<!-- incluimos nuestro mensaje de agradecimiento -->
<body>
<h2>Me comunicaré con usted lo antes posible. ahora sera redireccionado a la página principal. Muchas Gracias.</h2>
</body>
<?php
}
?>