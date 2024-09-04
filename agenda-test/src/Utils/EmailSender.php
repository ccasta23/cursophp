<?php

namespace Agenda\Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Agenda\Models\Contact;

class EmailSender
{
    public function sendNotificationEmail(Contact $contact): void
    {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor de correo
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '5d8140f6da1340';
            $mail->Password = '497907cb6dfeb0';

            // Remitente y destinatario
            $mail->setFrom('carlos.castaneda@ucaldas.edu.co', 'Agenda de Contactos CC');
            $mail->addAddress($contact->getEmail());

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Has sido agregado a la agenda';
            $mail->Body    = 'Hola ' . $contact->getName() . ',<br><br>Has sido agregado a mi agenda de contactos con el teléfono: ' . $contact->getPhone();

            $mail->send();
            
            error_log(print_r($mail, true),3, destination: "error.log");
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}", 3, destination: "error.log");
            var_dump("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            var_dump($e);
            // Manejo de errores (en producción se debería registrar el error)
        }
    }
}
