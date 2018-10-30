<?php
require_once 'loadClass.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $employee = $crud->getEmployeeById($id);
    $crud->remove($id);
    echo "<h3>Employee successfully removed</h3>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove employee</title>
</head>
<body>
<h3>Do you really want to remove ?</h3>
<form action="remove.php" method="post">
    <input type="hidden" name="id" value="<?php echo $employee['id'] ?>" />
    <button type="submit">Remove</button>
    <a href="index.php"><button type="button">Back</button></a>
</form>
</body>
</html>
