<?
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
   Copyright (C) 2004-2008 Sunfrog Printing, Inc. All rights reserved.

   PHPeasy-form version 3.0
   Released 2006-03-17

   This file is part of PHPeasy-form.

   PHPeasy-form is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

    PHPeasy-form is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with PHPeasy-form; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	
	Contact Sunfrog Printing, Inc at:
	http://www.sunfrogprinting.com
	
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?

if ((!$name) || (!$email) || (!$comments))
{
    $display .= '<p align="center">All fields are required.  Please check your information and try again.</p>';
	$display .= '<p align="center"><a href=javascript:history.back()>Go back</a></p>';

}
else{

$name = $_POST['name'];
$email = $_POST['email'];
$comments = $_POST['comments'];

$fp = fopen("formresults.txt", "a"); 
fwrite($fp, $name . "," . 
			$email . "," . 
			$comments . "," . 
			date("M-d-Y") . "\n");
fclose($fp);

// send form results through email
$recipient = "user@foo.com";
$subject = "Feedback from website";
$forminfo = 
(
$name . "\r" .
$email . "\r" .
$comments . "\r\n" .
date("M-d-Y") . "\r\n\n"
);

$formsend = mail("$recipient", "$subject", "$forminfo", "From: $email\r\nReply-to:$email\r\n");
$display .= '<p>Thank you. You have successfully submitted the following information:</p>';
$display .= nl2br($forminfo);
}

?>
<? echo $display; ?>
<p align="center">PHPeasy-form written by <a href="http://www.sunfrogprinting.com">Sunfrog Printing, Inc.</a></p>
</body>
</html>
