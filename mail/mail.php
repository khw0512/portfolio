<?php
parse_str($_POST['form_data'], $form);

define('TO_EMAIL', 'info@realdatalabs.co.kr');
define('SUBJECT', 'RDLS 홈페이지');
define('FROM_EMAIL', $form['con_email']);

$MESSAGE = '안녕하세요 담당자님, <br/><br/>';
$MESSAGE .= 'Realdatalabs 홈페이지를 통해 아래와 같은 메시지가 접수되었습니다 : <br/><br/>';
$MESSAGE .= 'Name : '.$form['con_name'].'<br/>';
$MESSAGE .= 'Email : '.$form['con_email'].'<br/>';
$MESSAGE .= 'Subject : '.$form['con_subject'].'<br/>';

$MESSAGE .= 'Message : <br/>'.$form['con_message'].'<br/><br/>';
$MESSAGE .= 'Regards';

$HEADERS = "MIME-Version: 1.0" . "\r\n";
$HEADERS .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$HEADERS .= 'From: <'.FROM_EMAIL.'>' . "\r\n";

mail(TO_EMAIL, SUBJECT, $MESSAGE, $HEADERS);
echo 1;
exit();