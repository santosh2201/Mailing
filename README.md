Mailing
=======

This is a simple php application. This application gets data from practo apiary.io API. This data is shown as a list,where user can select patients and write a group mail. This applications stores email data in local mysql server.

Technologies used:<br>
1) PHP <br>
2) Mysql<br>
3) Javascript<br>
4) Jquery<br>
5) Bootstrap<br>

This application uses PHPMailer to send emails.

Setup
=====

1) To setup Mysql, please edit "Model/mysql-connect.php"<br>
2) Change $mail-&gt;addAddress() parameter in "mail-api.php" to your mail id or $email to test it with Apiary.io API<br>
