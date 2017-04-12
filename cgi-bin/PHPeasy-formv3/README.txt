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
	
	Contact Sunfrog Printing, Inc. at:
	http://www.sunfrogprinting.com
	
	++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	PHPeasy-form was developed to aid website owners in receiving feedback
	through web forms.  This script is not intended for use other than to
	collect legitimate contact from website visitors.

	This form handler will check for required fields, send the feedback 
	to an email address you specify and will also write the results 
	to a file on your website.
	
	This readme file should provide everything you need to implement this 
	form handler.  Customization and installation services are available 
	for a nominal fee.  For more information, visit the forums at 
	http://www.sunfrogprinting.com/forum.
	
	++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	BEFORE YOU BEGIN
	
	Be sure the web host you have selected supports PHP.  We have included a
	phpinfo file to help you with this.  Upload phpinfo.php to your web
	directory.  Point your browser to http://domain.com/phpinfo.php 
	(replacing domain.com with your own domain).  If a PHP information page is
	returned, you are good to go.  If you receive an error message, stop now --
	your web host does not support PHP and you will not be able to use this
	script.
	
	CREATE YOUR FORM
	
	Included with this archive is a basic feedback form called "feedback.htm".
	If you are familiar with web forms, you can customize the input fields as
	necessary to meet your needs.  Be sure to give each input field a unique
	name (label).  For the purpose of this readme file, we will assume you
	are using the feedback.htm file.  
	
	If you use your own form, simply copy/paste the form tag below just 
	beneath your <body> tag.  Be sure to put the </form> tag just before 
	the </body> tag.
	
	<form action="formsend.php" method="post">
	

	ASSIGN VARIABLES FOR COLLECTED DATA
	
	If you are using feedback.htm and made no changes to the fields, you
	may skip to "SET YOUR RECIPIENT AND SUBJECT".
	
	If you are using a custom form or if you made changes to feedback.htm,
	open the formsend.php file.  Starting on line 48, you will need to update
	the field names to match those used on your web form.  The format must 
	include the $_POST (example below) and must match the label you gave 
	your input field exactly (case sensitive, do not use spaces).

	For example, if you have a field named fax, the line in formsend.php
	should be $fax = $_POST['fax'];

	CONFIGURE THE WRITE-TO-FILE RESULTS
	
	Insert a line for each variable you want captured to the text file.
	If you need to add a line for fax, you would use the following format:
	$fax . "," . 

	So, adding a fax line to the default fields would result in a write
	command that looks like so:
	
	fwrite($fp, $name . "," . 
			$email . "," . 
			$fax . "," . 
			$comments . "," . 
			date("M-d-Y") . "\n");
	
	
	IF YOU DON'T WANT TO WRITE TO A FILE
	
	Should you decide not to capture your form results in a file, simply
	delete the following code (lines 52-57):
	
	$fp = fopen("formresults.txt", "a"); 
	fwrite($fp, $name . "," . 
				$email . "," . 
				$comments . "," . 
				date("M-d-Y") . "\n");
	fclose($fp);


	CONFIGURE THE EMAIL RESULTS
	
	If you are using feedback.htm and made no changes to the fields, you
	may skip this section and continue with "SET YOUR RECIPIENT AND SUBJECT".
	
	Starting on line 64, you will need to update the field names to match 
	the variables you assigned earlier (line 48 on formsend.php).  Within
	the $formsend tag, you will need to add a line for each variable you
	want sent in the email.
	
	For example, to add a line for fax, your $formsend tag should look
	like so:
	
		$forminfo = 
		(
		$name . "\r" .
		$email . "\r" .
		$fax . "\r" .
		$comments . "\r\n" .
		date("M-d-Y") . "\r\n\n"
		);
	
	If you would like to add field names prefacing each result, you should
	use the following format:
	"Name: " . $name . "\r" .
	

	SET YOUR RECIPIENT AND SUBJECT
	
	You will need to open formsend.php to set the recipient and subject.
	Update the email address in the "recipient" field on line 60 to be
	the email address where these form results should be sent.  Update the
	"subject" field on line 61 to have the text you want the email subject
	line to contain.
	
	To CC or BCC an email on the results, change the "from" portion of the
	$formsend (line 70) to the following:
	"From: $email\r\nReply-to:$email\r\nCC:you@domain.com" for a CC OR
	"From: $email\r\nReply-to:$email\r\nBCC:you@domain.com" for a BCC
	
	UPLOAD THE FILES
	
	Upload your form file, formsend.php and a blank text file to record your
	form results.  A sample file named formresults.txt has been included here.
	I strongly urge you to change the name of this file for security.  Be sure
	to change the name in your formsend.php file to match.  You may also need
	to CHMOD the file to 755.  You may also want to password-protect this file
	for added security.
	
	Test your form to confirm the results are displayed correctly, the 
	information is being stored in the online file and the results are sending
	through email.
	
	That's it.  You are now ready to accept feedback through your web form.

	VIEW RESULTS FILE

	To view the results online, point your browser to
	http://domain.com/formresults.txt

