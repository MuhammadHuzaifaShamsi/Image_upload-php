<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Document</title>
</head>

<body>
    <form class="container mt-5" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="huzaifashamsi">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input name="image" class="form-control" type="file" id="formFile">
        </div>
        <button type="submit" class="btn btn-dark" name="submit" >Submit</button>
    </form>
</body>

</html>

<?php
include 'connection.php';

$allowed_extensions = ['jpg', 'jpeg', 'gif', 'png'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file = $_FILES['image'];

    $file_name = $file['name'];
    $file_error = $file['error'];
    $file_temp = $file['tmp_name'];

    $file_extension = explode('.', $file_name);
    $to_lowercase = strtolower(end($file_extension));

    if (in_array($to_lowercase, $allowed_extensions)) {
        $target_directory = "assets/${file_name}";
        move_uploaded_file($file_temp, $target_directory);
    } else {
        echo 'Email file is invalid';
    }

    $insert_query = "insert into images(name, email, image_path)
    values('$name', '$email', '$target_directory')";

    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo 'Data inserted successfull';
    } else {
        echo 'Data not inserted successfull';
    }


}
?>