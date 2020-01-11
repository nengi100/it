<?php

require('PHPMailerAutoload.php');

class MailUtility {

    public $mail;

    function __construct() {
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP();
        $this->mail->SMTPDebug = 3;
        $this->mail->SMTPAuth = TRUE;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Port = 465;
        $this->mail->Username = "configureall@gmail.com";
        $this->mail->Password = "###########";
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Mailer = "smtp";
        $this->mail->SetFrom("configurell@gmail.com", "INTELLITECH");
        $this->mail->AddReplyTo("iconfigureall@gmail.com", "INTELLITECH");
    }

    function sendMail($toList = [], $subject = '', $message = '') {
        foreach ($toList as $to) {
            $this->mail->AddAddress($to);
        }
        $this->mail->Subject = $subject;
        $this->mail->WordWrap = 80;
        $this->mail->MsgHTML($message);
        $this->mail->IsHTML(true);
        if (!$this->mail->Send())
            return FALSE;
        else
            return TRUE;;
    }

}

?>