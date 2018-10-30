<?php require_once 'loadClass.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>OOP Crud</title>
    <style type="text/css">
        .manageMember {
            width: 50%;
            margin: auto;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="manageMember">
        <a href="create.php"><button>Add Employee</button></a>
        <table border="1" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Salary</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($crud->listEmployees() as $row) {
                echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['salary']."</td>
                    <td>".$row['age']."</td>
                    <td>
                                    <a href='update.php?id=".$row['id']."'><button type='button'>Edit</button></a>
                                    <a href='remove.php?id=".$row['id']."'><button type='button'>Remove</button></a>
                    </td>
                    ";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>
