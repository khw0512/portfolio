<?php
parse_str($_POST['form_data'], $form);

define('TO_EMAIL', 'mylves@hanmail.net');
define('SUBJECT', 'Portfolio');
define('FROM_EMAIL', $form['con_email']);

$MESSAGE = '안녕하세요 담당자님, <br/><br/>';
$MESSAGE .= 'Portfolio를통해 아래와 같은 메시지가 접수되었습니다 : <br/><br/>';
$MESSAGE .= 'Name : '.$form['your-name'].'<br/>';
$MESSAGE .= 'Email : '.$form['your-email'].'<br/>';
$MESSAGE .= 'Subject : '.$form['your-subject'].'<br/>';

$MESSAGE .= 'Message : <br/>'.$form['your-message'].'<br/><br/>';
$MESSAGE .= 'Regards';

$HEADERS = "MIME-Version: 1.0" . "\r\n";
$HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$HEADERS .= 'From: <'.FROM_EMAIL.'>' . "\r\n";

mail(TO_EMAIL, SUBJECT, $MESSAGE, $HEADERS);
echo 1;
exit();