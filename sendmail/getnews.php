
<?php
    $infoClient = $_POST['infoClient'];
 
 
    //goi thu vien
    include('class.smtp.php');
    include "class.phpmailer.php"; 
    $nFrom = "Thông tin từ Web NamVietLaw";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'tuananh.namvietluat@gmail.com';  //dia chi email cua ban 
    $mPass = 'slgllrjtahqacfox';       //mat khau email cua ban
    $nTo = 'Luật sư Trần Hữu Toàn'; //Ten nguoi nhan
    $mTo = 'cungvan1122@gmail.com';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = "<strong>Khách hàng " . $infoClient . " đăng ký nhận tin tức từ HT Law & Partners</p>";   // Noi dung email
    $title = 'Thông tin Khách hàng từ HT Law & Partners';   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('cungvan1122@gmail.com', 'Luật sư Trần Hữu Toàn'); //khi nguoi dung phan hoi se duoc gui den email nay
	$mail->AddCC('cungvan1122@gmail.com', 'Check CC');
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        /* echo 'Co loi!'; */
         
    } else {
         
        /* echo '<script type="text/javascript">alert("hello!");</script>'; */
    }
?>
