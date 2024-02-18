<?php
include 'koneksi/koneksi.php';

$nama = $_POST["nama"];
$email = $_POST["email"];
$password = $_POST["password"];
$code = md5($email);
$telepon = $_POST["telepon"];
$alamat = $_POST["alamat"];

$namafoto = $_FILES['foto']['name'];
$lokasifoto = $_FILES['foto']['tmp_name'];
$namafotofiks = date("YmdHis").$namafoto;
move_uploaded_file($lokasifoto, "foto_pelanggan/$namafotofiks");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
//Server settings
$mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'insanmustadi37@gmail.com';                     //SMTP username
$mail->Password   = 'zvyfhnrtrkvgvchp';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('CCE_STORE@gmail.com', 'Kode Konfirmasi');
$mail->addAddress($email, $nama);     //Add a recipient
// $mail->addAddress('ellen@example.com');               //Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');



//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Konfirmasi pendaftaran';
$mail->Body    = 'Hi '.$nama. ' Terimakasih Sudah Mendaftar Pada Website CCE_STORE Silahkan Click verifikasi <a href="http://localhost/cce_store/verif.php?code='.$code.'">Verif</a>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if ($mail->send()){
	$koneksi->query("INSERT INTO pelanggan (nama_pelanggan,password_pelanggan,email_pelanggan,code,telepon_pelanggan,alamat_pelanggan,foto_pelanggan) VALUES ('$nama','$password','$email','$code','$_POST[telepon]','$_POST[alamat]','$namafotofiks')"); 
	echo "<script>alert('pendaftaran Berhasil, Cek email Untuk verifikasi akun');</script>";
	echo "<script>location='user_login.php';</script>";


}

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>