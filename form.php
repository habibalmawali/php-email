<?php

    require_once 'email.php';

    $errors = array();

    if(isset($_POST['send'])) {

        $user_message       = $_POST['message'];
        $user_email          = $_POST['email'];
        
        if (empty($user_message)) {
            $errors[] = "Message is required";
        }

        if (empty($user_email)) {
            $errors[] = "Email Address is required";
        }

        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email Address is not valid";
        }

        if (empty($errors)) {

            $emailDetails = 
                [
                    'email'     => $user_email,
                    'subject'   => 'Habib Dev. email form example',
                    'message'   => '<h2>' . $user_message . '</h2>'
                ];

            $sendingEmail = $email->send($emailDetails);

            if ($sendingEmail == 'true') {
                $success = "Email sent successfully"; 
            } else {
                $errors[] = $sendingEmail;
            }
                  
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<div class="container mt-5">
		<div class="jumbotron">
			
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 offset-md-2">
            
                <h1 class="text-center mt-3"><code>Welcome :)</code></h1>
                <br>
                <?php
                
                    if(isset($success)) {
                        ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php
                    }

                    if (isset($errors)) {
                        foreach($errors as $error) {
                            ?>
                                <div class="alert alert-danger">
                                    <?php echo $error . '<br>'; ?>
                                </div>
                            <?php
                        }
                    }
                
                ?>
                <form action="" method="post">
                    
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control">
                    
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control"></textarea>
                    
                    <input type="submit" value="Send" name="send" class="btn btn-primary mt-2">
                </form>

            </div>
        </div>
    </div>


		</div>
	</div>
	
</body>
</html>