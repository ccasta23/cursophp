<?php
namespace Agenda\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Agenda\Models\Contact;


class ContactController {
    //Atributos
    private string $jsonFile;
    
    //Magic Methods
    public function __construct(string $jsonFile) {
        $this->jsonFile = $jsonFile;
    }

    public function readJsonFile() {
        return json_decode(
            file_get_contents($this->jsonFile), true
        );
    }

    public function add(Contact $contact) {
        $contacts = $this->readJsonFile($this->jsonFile);
        $contacts[] = $contact->toArray();
        file_put_contents($this->jsonFile, json_encode($contacts));
        $this->notifyEmail($contact);
    }

    public function notifyEmail(Contact $contact){

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();             
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '5d8140f6da1340';
            $mail->Password = '497907cb6dfeb0';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('carlos.castaneda@ucaldas.edu.co', 'Agenda CC');
            $mail->addAddress($contact->getEmail(), $contact->getName());     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Fuiste añadido a la agenda de Carlos Castañeda';
            $mail->Body    = "<b>Felicitaciones {$contact->getName()}</b> fuiste añadido";
            $mail->AltBody = "<b>Felicitaciones {$contact->getName()}</b> fuiste añadido";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}