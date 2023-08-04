
<?php
    //libs SMTP
    include('class.smtp.php');
    include "class.phpmailer.php"; 


    $nFrom = "WEBSITE MASSAGE QUEEN";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'tuananh.namvietluat@gmail.com';  //dia chi email cua ban 
    $mPass = 'zaglceupsolvwrim';       //mat khau email cua ban
    $nTo = 'ADMIN Massage Queen'; //Ten nguoi nhan
    $mTo = 'phamkim158@gmail.com';   //dia chi nhan mail

    if (isset($_POST['activevoucher'])) {
        // active vouicher
        $codevoucher = $_POST['codevoucher'];
        $valueTypeServicesCL = $_POST['valueTypeServicesCL'];
        $valueDateBookingCL = $_POST['valueDateBookingCL'];
        $valueNameClientCL= $_POST['valueNameClientCL'];
        $valueContactClientCL= $_POST['valueContactClientCL'];


        
        
        $mail             = new PHPMailer();
        $body             = "
            <em style='color:white;font-weight:bold;padding: .5rem;background-color:red'>Thông tin khách hàng đặt phòng</em>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5;color:green;font-weight:bold'>Sử dụng voucher: " . $codevoucher . "</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Họ và Tên :" . $valueNameClientCL . "</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Số điện thoại :"  . $valueContactClientCL . "</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Ngày đặt : " . $valueDateBookingCL . "</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Loại dịch vụ :" . $valueTypeServicesCL ."</p>";   // Noi dung email
        
            $title = 'Thông tin Khách hàng từ Website Massage Queen';   //Tieu de gui mail
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
        $mail->AddReplyTo('phamkim158@gmail.com', 'ADMIN Massage Queen'); //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->AddCC('cungvan1122@gmail.com', 'Check CC');
        $mail->Subject    = $title;// tieu de email 
        $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
        // thuc thi lenh gui mail 
        if(!$mail->Send()) {
            $statusProcess = array('statusProcess' => 'fail');
            echo json_encode($statusProcess);
        } else {            
            $statusProcess = array('statusProcess' => 'pass');
            echo json_encode($statusProcess);
        }
            }else{
        // VALUE MODAL no voucher
        $valueTypeServicesCL = $_POST['valueTypeServicesCL'];
        $valueDateBookingCL = $_POST['valueDateBookingCL'];
        $valueNameClientCL= $_POST['valueNameClientCL'];
        $valueContactClientCL= $_POST['valueContactClientCL'];


        $mail             = new PHPMailer();
        $body             = "
            <em style='color:white;font-weight:bold;padding: .5rem;background-color:red'>Thông tin khách hàng đặt phòng</em>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5;color:darkred;font-weight:bold'>Khách không sử dụng voucher</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Họ và Tên :" . $valueNameClientCL . "</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Số điện thoại :"  . $valueContactClientCL . "</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Ngày đặt : " . $valueDateBookingCL . "</p>
            <p style='width:fit-content;border-bottom: 1px solid #d5d5d5'>Loại dịch vụ :" . $valueTypeServicesCL ."</p>";   // Noi dung email
        
            $title = 'Thông tin Khách hàng từ Website Massage Queen';   //Tieu de gui mail
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
        $mail->AddReplyTo('phamkim158@gmail.com', 'ADMIN Massage Queen'); //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->AddCC('cungvan1122@gmail.com', 'Check CC');
        $mail->Subject    = $title;// tieu de email 
        $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
        // thuc thi lenh gui mail 
        if(!$mail->Send()) {
            $statusProcess = array('statusProcess' => 'fail');
            echo json_encode($statusProcess);
        } else {            
            $statusProcess = array('statusProcess' => 'pass');
            echo json_encode($statusProcess);
        }
    }


    
 
    
  
?>
