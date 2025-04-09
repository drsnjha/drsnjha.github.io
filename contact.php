<?php

// configure
$from = 'info@drsnjha.com';
$sendTo = 'aptcodr@gmail.com';
$subject = 'New message from contact form';
$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message'); // array variable name => Text to appear in the email
$okMessage = 'आपका सन्देश हमे प्राप्त हो गया है | हम जल्द आपसे संपर्क करेंगे | धन्यवाद !   ';
$errorMessage = 'आपके फॉर्म में कुछ गलतियाँ हैं , कृपया उन्हे सुधार कर पुनः प्रयास करें | धन्यवाद !';

// let's do the sending

try
{
    $emailText = "आदरणीय पंडित जी , आपको आपकी वेबसाइट पर एक नया सन्देश प्राप्त हुआ है ! \n=============================\n";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
else {
    echo $responseArray['message'];
}
