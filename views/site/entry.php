<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//$this->enableCsrfValidation = false;
$xml=@file_get_contents('php://input');
$response = \Yii::$app->request->post();
echo '0';

Yii::$app->session['paid'] = $xml;

//var_dump($xml);
//var_dump($_POST['bankName']);
exit();

?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->label('Ваше имя') ?>
    <?= $form->field($model, 'email')->label('Ваша почта') ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить',['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>


<?php
$kkb = \Yii::$app->get('kkbPayment');

$response = @file_get_contents('php://input');

//$response = '<document><bank name="Kazkommertsbank JSC"><customer name="TSET TEST" mail="abdu.galymzhan@gmail.com" phone=""><merchant cert_id="00C182B189" name="Test shop"><order order_id="400124" amount="1000" currency="398"><department merchant_id="92061101" amount="1000"/></order></merchant><merchant_sign type="RSA"/></customer><customer_sign type="RSA"/><results timestamp="2017-11-24 19:08:56"><payment merchant_id="92061101" card="440564-XX-XXXX-6150" amount="1000" reference="171124190855" approval_code="190855" response_code="00" Secure="No" card_bin="" c_hash="13988BBF7C6649F799F36A4808490A3E"/></results></bank><bank_sign cert_id="00c183d690" type="SHA/RSA">aoKHolBaRXOl4TZ12AlsjwgwOLD4RZFs3ajE6FD0f8XFP5Got9htJNYW6hYgqLTOPz74m6B3PEsnDBae6WzZDGD3HXACuv1LIJH/KelCMdzEUhB+Vs5+LqZVxbXdceESLUb1CeQb8hDp9AxZvWVeSE/eSMgWkw7fudT4J56xGmA=</bank_sign></document>';

//$response = \Yii::$app->request->post('response');
$paymentResponse = $kkb->processResponse($response);
Yii::$app->session['paid'] = $paymentResponse->orderId;
var_dump(Yii::$app->session['paid']);
//var_dump($paymentResponse);
?>


