<?php
namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mail {

    public static function send($to, $subject, $message)
    {
        $config = App::get('config')['mail'];

        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = $config['smtp'];
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = $config['port'];
        $phpmailer->Username = $config['username'];
        $phpmailer->Password = $config['password'];

        $phpmailer->Subject = $subject;
        $phpmailer->Body    = $message;

        $phpmailer->addAddress($to);
        $phpmailer->setFrom($config['from'], $config['from_name']);
        try {
            $phpmailer->send();
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

    }
}