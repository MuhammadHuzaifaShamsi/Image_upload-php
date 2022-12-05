<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Document</title>
</head>

<body>
    <table class="table container mt-5">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connection.php';

            $select_query = "select * from images";
            $result = mysqli_query($conn, $select_query);

            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $email = $row['email'];
                $image = $row['image_path'];

                echo "
                <tr>
                    <td>$name</td>
                    <td>$email</td>
                    <td><img src=$image style='width: 200px;'></td>
                </tr>
                ";
            }
            ?>
            <!-- <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr> -->
        </tbody>
    </table>
</body>

</html>