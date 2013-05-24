<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index page</title>

</head>
<body>
<?php include 'tms_nav_bar.php'; ?>

<pre>
  me tms index page
</pre>

<?php
$con = mysql_connect("localhost","root","");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("tms", $con);

$sql = "INSERT INTO tb_common_member (email, username, password) VALUES ('$_POST[email]', '$_POST[username]', md5('$_POST[password]'))"

if (!mysql_query($sql,$con)) {
  die('Error: ' . mysql_error());
}

mysql_close($con);

?>

</body>


</html>
