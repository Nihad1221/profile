<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $imageName = '';

    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] == 0) {
        $imageName = 'profile_' . time() . '.' . pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['profileImage']['tmp_name'], $imageName);
    }

    $file = fopen('data.txt', 'a');
    fwrite($file, "Full Name: $fullName\nEmail: $email\nPhone: $phone\nMobile: $mobile\nImage: $imageName\n\n");
    fclose($file);

    echo json_encode(['status' => 'success']);

}