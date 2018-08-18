<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "upperlinktable");
$form_data = json_decode(file_get_contents("php://input"));
$data = array();
$error = array();

if(empty($form_data->first_name))
{
 $error["first_name"] = "First Name is required";
}

if(empty($form_data->last_name))
{
 $error["last_name"] = "Last Name is required";
}

if(empty($form_data->phone))
{
 $error["phone"] = "Phone is required";
}

if(empty($form_data->email))
{
 $error["email"] = "Email is required";
}

if(empty($form_data->cover_letter))
{
 $error["cover_letter"] = "Cover Letter is required";
}

if(!empty($error))
{
 $data["error"] = $error;
}
else
{
 $first_name = mysqli_real_escape_string($connect, $form_data->first_name); 
 $last_name = mysqli_real_escape_string($connect, $form_data->last_name);
 $phone = mysqli_real_escape_string($connect, $form_data->phone);
 $email = mysqli_real_escape_string($connect, $form_data->email);
 $cover_letter = mysqli_real_escape_string($connect, $form_data->cover_letter);
 $query = "
  INSERT INTO tbl_user(first_name, last_name, phone, email, cover_letter) VALUES ('$first_name', '$last_name','$phone', '$email','$cover_letter')
 ";
 if(mysqli_query($connect, $query))
 {
  $data["message"] = "Your application has been submitted";
 }
}

echo json_encode($data);

?>
