<?php
/*
Nick Tuttle
1-13-16
*/
/* e-mail recipient */
$myemail = "example@example.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name']);
$email = check_input($_POST['email']);
$phone = check_input($_POST['phone']);
$comments = check_input($_POST['comments']);
$contact = check_input($_POST['contact']);

/* message for the e-mail */
$subject = "Website Feedback";
$message = "

<strong>-APPLICANT DATA-</strong>

Name: $name
Email: $email
Phone: $phone
Comments: $comments
Contact Me?: $contact
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the confirm page */
header('Location: index.html');
exit();

/* Functions used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<b>Please correct the following error:</b><br />
<?php echo $myError; ?>

</body>
</html>
<?php
exit();
}
?>