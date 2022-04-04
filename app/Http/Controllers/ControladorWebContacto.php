<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use Session;

class ControladorWebContacto extends Controller
{
    public function index(){
            return view("web.contacto");
    }

    public function enviar(Request $request )
    {
      $nombre = $request->input('txtNombre');
      $email = $request->input('txtEmail');
      $asunto = $request->input('txtAsunto');
      $mensaje = $request->input('txtMensaje');
      $address = "lourdesyorio51@gmail.com";

      $body = "Nombre: $nombre <br>
                  Email: $email <br>
                  Mensaje: $mensaje";
      //Instancia y configuraciones de PHPMailer
      $mail = new PHPMailer(true);
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = env('MAIL_HOST');
      $mail->SMTPAuth = true;
      $mail->Username = env('MAIL_USERNAME');
      $mail->Password = env('MAIL_PASSWORD');
      $mail->SMTPSecure = env('MAIL_ENCRYPTION');
      $mail->Port = env('MAIL_PORT');
      //Destinatarios
      $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')); //Dirección desde
      $mail->addAddress($address); //Dirección para
      //$mail->addReplyTo($replyTo); //Dirección de reply no-reply

      //Contenido del mail
      $mail->isHTML(true);
      $mail->Subject = $asunto;
      $mail->Body = $body;
      //$mail->send();
      return view("web.mensaje-enviado",compact($nombre)); //Retorna vista para confirmar el envio
    }
}
