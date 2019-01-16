<?php

use yii\helpers\Html;

$this->title = 'Say';
<<<<<<< HEAD
//$this->params['breadcrumbs'][] = $this->title;
?>

<!--<h1> --><?//= Html::encode($this->title) ?><!-- </h1>-->
<!--<h1>Hello --><?//= Html::encode($target) ?><!-- </h1>-->
<!--<p>Welcome</p>-->

<?php
//$orderID = 1484;
//$orderID += 900000000000000;
//$orderID_ = $orderID;
////$orderIDstr = (string)$orderID;
////$mystr =  strlen($orderIDstr);
//print_r($orderID); echo '<br>';
//$orderID -= 900000000000000;
//print_r($orderID);
=======
$this->params['breadcrumbs'][] = $this->title;

// new

>>>>>>> 8236d12034736dec2766db9bfcaf6e3cca3adf6c


?>
<!--<script type="text/javascript"> function hello(){ $.ajax( { type: 'post', url: 'http://192.168.56.3:8090/hello.php', data: '&id=' + $('#id').val() + '&name=' + $('#name').val(), dataType: 'json', //alert(data); success: function(data) { //alert(data); } }); } </script>-->
<!---->
<!--<input type="button" name="Release" onclick="hello();" value="submit" />-->

<?php


<<<<<<< HEAD
?>
=======
<h1> <?= Html::encode($this->title) ?> </h1>
<h1>Hello <?= Html::encode($target) ?> </h1>
<p>Welcome</p>

<form action="<?= $paymentUrl ?>" id="kkb-payment-form" style="display: none">
    <input type="text" name="Signed_Order_B64" size="100" value="<?= $kkbPaymentBase64 ?>">
    <input type="text" id="em" name="email" size="50" maxlength="50" value="<?= 'test@test.ru' ?>">
    <input type="text" name="Language" size="50" maxlength="3" value="rus">
    <input type="text" name="BackLink" size="50" maxlength="50" value="<?= 'http://e8bcaeea.ngrok.io/site/say' ?>">
    <input type="text" name="PostLink" size="50" maxlength="50" value="<?= 'http://e8bcaeea.ngrok.io/site/entry' ?>">
    </form>
    <button type="submit" value="Submit" form="kkb-payment-form" id="pay-order-btn" style="width: 100%; margin: 7px 14px 0px 14px;"  class="btn green-btn disabled-switch order_online_pay"><?= Yii::t('app', 'Payment by card online') ?></button>
<?php
//$result = $this->generateMerchantXML($orderId, $amount, $currencyCode);
//var_dump(Yii::$app->session['paid']);
//var_dump(Yii::$app->session['mymerchcertid']);
//var_dump(Yii::$app->session['myorderid']);
//var_dump(Yii::$app->session['myRsa']);
var_dump(Yii::$app->session['mykkbPayment']);
$myorder;
$kkbPayment->merchantCertificateId;
//echo Yii::$app->getSecurity()->generatePasswordHash('12345');
?>


<!--<form method="GET">
    Login: <input type="text" name="login">
    E-mail: <input type="text" name="email">
    <input type="submit" value="Отправить">
</form>-->

<?php
/*С помощью суперглобального массива $_GET
выводим принятые значения:*/
//echo "<br/>login = ". $_GET['login'];
//echo "<br/>email = ". $_GET['email'];
//if( $_GET["login"] || $_GET["email"] ) {
//    echo "<br/>login = ". $_GET['login'];
//    echo "<br/>email = ". $_GET['email'];

    //exit();
//}
?>

<?php
/*
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$response = file_get_contents("https://testpay.kkb.kz/jsp/remote/checkOrdern.jsp?%3Cdocument%3E %3Cmerchant+id%3D%2298105411%22%3E%3Ccommand+type%3D%22%22%2F%3E%3Cpayment+reference%3D%22%22+approval_code%3D%22%22+orderid%3D%221223225636%22+amount%3D%22%22+currency_code%3D%22398%22%2F%3E%3C%2Fmerchant%3E %3Cmerchant_sign+type%3D%22RSA%22+cert_id%3D%2200c183d70b%22%3E jLxRe7eQBDepu4VdRS0tNH0OL7AQq6rCjqoXcEhk94ivd7aAEujSHT%2F0Rmd3KCoqmenSG21hQzlrbknB4IPJ%2B%2B4oLLs0Plwer0zXC6%2BV9Sivgk06H62RiiWNV1PsNKtZaRkOqcuJpHT4ulTLp024b2FuAExLjk5t6jcGvEwG4nw%3D %3C%2Fmerchant_sign%3E%3C%2Fdocument%3E+", false, stream_context_create($arrContextOptions));

echo $response;
*/
$url = "https://testpay.kkb.kz/jsp/remote/checkOrdern.jsp?";

$post_string = '%3Cdocument%3E%3Cmerchant%20id%3D%2292061101%22%3E%3Ccommand%20type%3D%22complete%22%2F%3E%3Cpayment%20reference%3D%22171124190855%22%20approval_code%3D%22190855%22%20orderid%3D%22400124%22%20amount%3D%221000%22%20currency_code%3D%22398%22%2F%3E%3C%2Fmerchant%3E%3Cmerchant_sign%20type%3D%22RSA%22%20cert_id%3D%22%22%3EaoKHolBaRXOl4TZ12AlsjwgwOLD4RZFs3ajE6FD0f8XFP5Got9htJNYW6hYgqLTOPz74m6B3PEsnDBae6WzZDGD3HXACuv1LIJH%2FKelCMdzEUhB%2BVs5%2BLqZVxbXdceESLUb1CeQb8hDp9AxZvWVeSE%2FeSMgWkw7fudT4J56xGmA%3D%3C%2Fmerchant_sign%3E%3C%2Fdocument%3E';


$header  = "POST HTTP/1.0 \r\n";
$header .= "Content-type: text/xml \r\n";
$header .= "Content-length: ".strlen($post_string)." \r\n";
$header .= "Content-transfer-encoding: text \r\n";
$header .= "Connection: close \r\n\r\n";
$header .= $post_string;

$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5 GTB6");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 4);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);

$data = curl_exec($ch);

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

?>

>>>>>>> 8236d12034736dec2766db9bfcaf6e3cca3adf6c
