<?php

    require_once 'email.php';

    $emailDetails = 
        [
            'email'     => 'habib.almawali@gmail.com',
            'subject'   => 'Habib Dev.',
            'message'   => 'Dear Habib, email is working fine :)'
        ];

    $sendingEmail = $email->send($emailDetails);

    if ($sendingEmail == 'true') {
        echo "Email sent successfully"; 
    } else {
        echo $sendingEmail;
    }


?>