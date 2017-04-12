<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	  $myCalendar = new tc_calendar("date5", true, false);
	  $myCalendar->setIcon("images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2015);
	  $myCalendar->dateAllow('2008-05-13', '2015-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
	  $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
	  $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
	  $myCalendar->writeScript();
	  ?>
</body>
</html>