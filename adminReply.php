<?php
$sql = "SELECT * FROM messages";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

require_once ('web/templates/adminReplyForm.php');

if(isset($_POST['submit'])){
//    ini_set('SMTP', "smtp.gmail.com");
//    ini_set('smtp_port', "465");
//    ini_set('username', "papershoppingorder@gmail.com");
//    ini_set('password', "papershop2");
//    ini_set('sendmail_from', "papershoppingorder@gmail.com");
    $to = $v['email'];
    $subject = 'Odpowiedz na pytanie dotyczące: '.$v['subject'];
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";

    mail($to,$subject,$txt,$headers);
}
