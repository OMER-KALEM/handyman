<?php

$smtpuser = "test@test.com.tr";
$smtphost = "mail.test.com.tr";
$smtpport = "25";
$smtppass = "a1234";

if (isset($_POST['contactform'])) {
	$fullName = htmlspecialchars(trim($_POST['fullName']));
	$telefon = htmlspecialchars(trim($_POST['telefon']));
	$subject = htmlspecialchars(trim($_POST['subject']));
	$email = htmlspecialchars(trim($_POST['email']));
	$message = htmlspecialchars(trim($_POST['message']));
	// $ip = htmlspecialchars(trim($_POST['iletisim_ip']));

	include 'class.phpmailer.php';
	$epostal = $smtpuser;
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = false;
	$mail->Host = $smtphost;
	$mail->Port = $smtpport;
	$mail->SMTPSecure = 'tls';
	$mail->Username = $smtpuser;
	$mail->Password = $smtppass;
	$mail->SetFrom($mail->Username, $fullName);
	$mail->AddAddress($epostal, $fullName);
	$mail->AddAddress($email, $fullName);
	$mail->CharSet = 'UTF-8';
	$mail->Subject = 'İletişim Formu';
	$content = '
	<b>Websitenizden gelen iletişim maili</b><br>
	<table align="left" class="tg" style="undefined;table-layout: fixed; width: 535px">

		<tr>
			<td class="tg-031e">Ad Soyad</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $fullName . '</td>
		</tr>
		<tr>
			<td class="tg-031e">Telefon</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $telefon . '</td>
		</tr>
		<tr>
			<td class="tg-031e">E-Posta</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $email . '</td>
		</tr>
		<tr>
			<td class="tg-031e">Konu</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $subject . '</td>
		</tr>
		<tr>
			<td class="tg-031e">Mesaj</td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $message . '</td>
		</tr>
		</table>';
	// <tr>
	// 	<td class="tg-031e">İp Adresi</td>
	// 	<td class="tg-031e">:</td>
	// 	<td class="tg-031e">' . $ip . '</td>
	// </tr>

	$mail->MsgHTML($content);

	if ($mail->Send()) {

		header("Location:../index.php?iletisimgonder=ok");
	} else {
		header("Location:../index.php?iletisimgonder=no");
	}
}

exit;

?>