<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title> Model </title>
	<link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<form action="insert.php" method="post" entype = "multipart/form-data">
Login: <input type="text" name="login" /><br><br>
First name: <input type="text" name="fname" /><br><br>
Last name: <input type="text" name="lname" /><br><br>
Password: <input type="text" name="pwd" /><br><br>
<select name="role">
                <option value="Manager">Manager</option>
                <option value="Security">Security</option>
                <option value="Programmer">Programmer</option>
                <option value="Tester">Tester</option>
                <option value="DevOps">DevOps</option>
</select>
<input type="file" name="file3"/><br><br>
<button type="submit" name="upload" value="Upload image">UPLOAD</button>
</form>
</body>
</html>