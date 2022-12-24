<?php 
include 'conn.php';

    $query = "
    SELECT * FORM tbl_sample
    ORDER BY id DESC
    ";

    $stmt = $conn->prepare("SELECT * FROM tbl_sample ORDER BY id ASC");
    $stmt->execute();
    $result = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inline Edit table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dark-editable.css">

</head>

<body>

    <div class="container">
        <h1 class="mt-5 mb-5 text-center text-success">Inline Edit Table | Javascript PHP MYSQL Bootstrap5</h1>
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Frist Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                            </tr>
                            <?php 
                            foreach($result as $row)
                            {
                                echo '
                                <tr>
                                    <td><a href="#" class="first_name" id="first_name'.$row["id"].'" data-type="text" data-pk="'.$row["id"].'" data-url="process.php" data-name="first_name">'.$row["first_name"].'</a></td>
                                    <td><a href="#" class="last_name" id="last_name'.$row["id"].'" data-type="text" data-pk="'.$row["id"].'" data-url="process.php" data-name="last_name">'.$row["last_name"].'</a></td>
                                    <td><a href="#" class="gender" id="gender'.$row["id"].'" data-type="select" data-pk="'.$row["id"].'" data-url="process.php" data-name="gender">'.$row["gender"].'</a></td>
                                </tr>
                                ';
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="dark-editable.js"></script>

    <script>

        const first_name = document.getElementsByClassName('first_name');
        for(var count = 0; count < first_name.length; count++)
        {
            const first_name_data = document.getElementById(first_name[count].getAttribute('id'));
            const first_name_popover = new DarkEditable(first_name_data);
        }

        const last_name = document.getElementsByClassName('last_name');
        for(var count = 0; count < last_name.length; count++)
        {
            const last_name_data = document.getElementById(last_name[count].getAttribute('id'));
            const last_name_popover = new DarkEditable(last_name_data);
        }

        const gender = document.getElementsByClassName('gender');
        for(var count = 0; count < gender.length; count++)
        {
            const gender_data = document.getElementById(gender[count].getAttribute('id'));
            const gender_popover = new DarkEditable(gender_data, {
                source :[
                    {
                        value : 'Male',
                        text : 'Male'
                    },
                    {
                        value : 'Female',
                        text : 'Female'
                    }
                ]
            });
        }

    </script>

</body>

</html>