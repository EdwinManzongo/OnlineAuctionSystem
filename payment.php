<?php 
session_start();
require_once 'Paynow-PHP-SDK-master/autoloader.php';

$BuyerID = $_SESSION['userid'];

if(isset($_POST['SubmitPayment'])){ 
    $InvoiceNumber = $_POST['ReferenceNumber'];
    $PaymentAmount = $_POST['PaymentAmount'];
    $PaymentEmail = $_POST['PaymentEmail'];
    $ItemID = $_POST['ItemNo'];
    $ItemName = $_POST['ItemName'];
}

$paynow = new Paynow\Payments\Paynow(
    '9713',
    '09c5be39-7a11-47ae-8ada-a3e2488ad40b',
    'http://localhost/Online-Auction-System/payment_success.php?inv='.$InvoiceNumber.'&ItemID='.$ItemID.'&buyer='.$BuyerID.'',
    'http://localhost/Online-Auction-System/payment_success.php?inv=$InvoiceNumber'
);


$payment = $paynow->createPayment($InvoiceNumber, $PaymentEmail);


$payment->add($InvoiceNumber, $PaymentAmount);
        // ->add('Sadza and Hot Water', 20.5);

// Optionally set a description for the order.
// By default, a description is generated from the items
// added to a payment
$payment->setDescription($ItemName);


// Initiate a Payment 
$response = $paynow->send($payment);


?>


<?php if(!$response->success): ?>

    <h2>An error occured while communicating with Paynow</h2>
    <p><?= $response->error ?></p>

<?php else: ?>

    <a href="<?= $response->redirectUrl() ?>">Click here to make payment of $<?= $payment->total ?></a>

<?php endif; ?>


<?php if(isset($_GET['paynow-return'])): ?>
<script>
    alert('Thank you for your payment!');
</script>
<?php endif; ?>