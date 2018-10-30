<?php

require_once 'loadClass.php';

if (isset($_POST) && !empty($_POST)) {
    $employee = new Employee();
    if (!empty($_POST['name']) && is_string($_POST['name'])) {
        $employee->setName(htmlspecialchars($_POST['name']));
    } else {
        $nameError = "Name is required";
    }
    if (!empty($_POST['salary']) && is_integer($_POST['salary'])) {
        $employee->setSalary(htmlspecialchars($_POST['salary']));
    } else {
        $salaryError = "Salary is required";
    }
    if (!empty($_POST['age']) && is_integer($_POST['age'])) {
        $employee->setAge(htmlspecialchars($_POST['age']));
    } else {
        $ageError = "Age is required";
    }

    $crud->add($employee);
    echo "<h3>New employee successfully created !</h3>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
<fieldset>
    <legend>Add Member</legend>

    <form action="create.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Name</th>
                <td>
                    <input type="text" name="name" placeholder="Name" />
                    <span class="error"><?php echo $nameError; ?></span>
                </td>
            </tr>
            <tr>
                <th>Salary</th>
                <td>
                    <input type="text" name="salary" placeholder="Salary" />
                    <span class="error"><?php echo $salaryError; ?></span>

                </td>
            </tr>
            <tr>
                <th>Age</th>
                <td>
                    <input type="text" name="age" placeholder="Age" />
                    <span class="error"><?php echo $ageError; ?></span>

                </td>
            </tr>
            <tr>
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>

</fieldset>
</body>
</html>
