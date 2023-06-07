<?php
include("header.php");
include("connect.php");
?>
<html>
<style>

</style>
<body>

<form action="addUser.php" enctype="multipart/form-data" method="post">
<label for="name"> Name </label>
<input type="text" name="name" required pattern="[A-Za-z].+"/>
<input type="password" name="password" required pattern="[A-Za-z0-9].+"/>
<input type="Submit" value="Add" name="submit"/>

</form>

</body>
</html>