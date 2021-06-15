<!DOCTYPE html>
<html>
<head>
    <meta content="en-zw" http-equiv="Content-Language" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send SMS</title>
</head>
<body>
    <center>
        <center>
            <div class="top">
                <h2>Send Message</h2>
            </div>
        </center>
    <div class="msg">
        <form class="message">
            <input type="text" name="phone" placeholder="Phone"><br/>
            <input type="textarea" name="message" placeholder="Message"><br/>
            <input type="submit" name="sendbtn" value="Send">
        </form>     
    </div>
    </center>
    
</body>
</html>


<?php 
require __DIR__ . '\vendor\twilio\sdk\Twilio\autoload.php';
use Twilio\Rest\Client;
if (isset($_POST['sendbtn'])) {
    # code...
    $sid = 'ACe55a55ddb0a1cd5f54340d2cab70a250';
    $token = '768c132c6d087967b69548a646f8887b';
    $client = new Client($sid, $token);

    $phone = $_POST['phone'];
    $message = $_POST['message'];

    //Use the client to do fun stuff like send text messages!
    $client->messages->create(
    //the number you'd like to send the message to
        $phone,
        array(
        //A Twilio phone number you purchased at twilio.com/console
            'from' => '+14053316487',
            'body' => $message
        )
    );
}

?>