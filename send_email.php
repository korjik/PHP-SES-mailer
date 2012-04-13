<?
require_once('ses.php');
$ses = new SimpleEmailService('XXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXXXXX');
$file=$argv[1];

$text_email="Дорогой $username! Текст письма в формате text/plain";
$html_email="<strong>Дорогой $username!</strong><p> Вот текс письма в формате text/html!";

$user_list= fopen($file, "r");
while (($user_fields = fgetcsv ($user_list,",")) !== FALSE)
{
$username=$user_fields[0];
$email=$user_fields[1];
$m = new SimpleEmailServiceMessage();
$m->addTo($email);
$m->setFrom('validated@email.com');
$m->setSubject('Супер рассылка!');
$m->setMessageFromString($text_email,$html_email);

$send_emails=($ses->sendEmail($m));


}



?>
