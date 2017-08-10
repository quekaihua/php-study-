<?php
//$rootPath = dirname(__FILE__);
//require $rootPath . '/PHPMailer/PHPMailerAutoload.php';
require './vendor/autoload.php';
error_reporting(0);

function sendMail($host, $fromEmail, $password, $toEmail, $fromName, $toName, $subject, $content){
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = $host;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $fromEmail;                 // SMTP username  myshengun@aliyun.com
    $mail->Password = $password;                           // SMTP password qkh125128
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($toEmail, $toName);     // Add a recipient
    $mail->addReplyTo($fromEmail, 'Information');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->msgHtml($content);

    return $mail->send();
}

sendMail("smtp.aliyun.com", "myshengun@aliyun.com", "qkh125128", "myshengun@163.com", 'aliyun', 'myshengun@163.com', 'this is a test subject.', 'test content.');

$link = mysqli_connect("localhost", "homestead", "secret");
mysqli_select_db($link, "homestead");
mysqli_query($link, "set names utf8");
while(true){
    $sql = "SELECT * FROM task_list WHERE status = 0 ORDER BY task_id ASC";
    $res = mysqli_query($link, $sql);
    $mailList = array();
    while($row = mysqli_fetch_assoc($res)){
        $mailList[] = $row;
    }
    print_r($mailList);
    if(empty($mailList)){
        break;
    }else{
        foreach($mailList as $k => $v){
            if(sendMail("smtp.aliyun.com", "myshengun@aliyun.com", "qkh125128", $v['user_email'], "aliyun", $v['user_email'], "测试邮件", "测试发送")){
                $re = mysqli_query($link, "UPDATE task_list SET status = 1 WHERE task_id = " . $v['task_id']);
            }
            sleep(3);
        }
    }
}