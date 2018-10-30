<?php

require_once 'loadClass.php';

if (isset($_GET['id'])) {
    $employee = $crud->getEmployeeById(htmlspecialchars($_GET['id']));
}

if (!empty($_POST)) {
    if (!empty($_POST['name']) && is_string($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
    } else {
        $nameError = "Name is required";
    }
    if (!empty($_POST['salary']) && is_int($_POST['salary'])) {
        $salary = htmlspecialchars($_POST['salary']);
    } else {
        $salaryError = "Salary is required";
    }
    if (!empty($_POST['age']) && is_string($_POST['age'])) {
        $age = htmlspecialchars($_POST['age']);
    } else {
        $ageError = "Age is required";
    }
    $id = $_POST['id'];

    $crud->update($name, $salary, $age, $id);
    echo "<h3>Employee successfully updated</h3>";
}

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Employee</title>
        <style type="text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 50%;
            }

            table tr th {
                padding-top: 20px;
            }
        </style>
    </head>
    <body>
    <fieldset>
        <legend>Edit Employee</legend>

        <form action="update.php" method="post">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <th>Name</th>
                    <td>
                        <input type="text" name="name" placeholder="name" value="<?php echo $employee['name'] ?>"/>
                        <span class="error"><?php echo $nameError; ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Salary</th>
                    <td>
                        <input type="text" name="salary" placeholder="salary" value="<?php echo $employee['salary'] ?>"/>
                        <span class="error"><?php echo $salaryError; ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td>
                        <input type="text" name="age" placeholder="age" value="<?php echo $employee['age'] ?>"/>
                        <span class="error"><?php echo $ageError; ?></span>
                    </td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $employee['id'] ?>" />
                    <td><button type="submit">Save Changes</button></td>
                    <td><a href="index.php"><button type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    </body>
    </html>
