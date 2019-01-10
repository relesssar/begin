<?php

namespace app\controllers;

use app\models\EntryForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
//use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Epay\Client;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($target = 'World')
    {
        echo '<h2>123</h2>';
        $client = new \Epay\Client(array(
            'MERCHANT_CERTIFICATE_ID' => '00C182B189',
            'MERCHANT_NAME'           => 'Test shop',
            'PRIVATE_KEY_FN'          => \Yii::getAlias('@app') . '/vendor/kolesa-team/qazkom-epay/tests/data/test_prv.pem',
            'PRIVATE_KEY_PASS'        => 'nissan',
            'PRIVATE_KEY_ENCRYPTED'   => 1,
            'XML_TEMPLATE_FN'         => \Yii::getAlias('@app') . '/vendor/kolesa-team/qazkom-epay/tests/data/template.xml',
            'XML_TEMPLATE_CONFIRM_FN' => \Yii::getAlias('@app') . '/config/payment/template_confirm.xml',
            'PUBLIC_KEY_FN'           => \Yii::getAlias('@app') . '/vendor/kolesa-team/qazkom-epay/tests/data/kkbca_test.pub',
            'MERCHANT_ID'             => '92061101',
        ));
        $orderId = 111123;
        $amount = 100;

        $myxml = $client->processConfirmation (190110154533, 154533, 990000000001498, $client->getCurrencyId('KZT'), 100);
        var_dump($myxml);
        var_dump(Yii::$app->session['kkb_xml']);
        $myxml = '';
// Sign request for payment


//$signature = $client->processRequest($orderId, $client->getCurrencyId('KZT'), $amount);

// Process payment system response
//$result = $client->processResponse($response);

// Confirm request to unblock amount
//$result = $client->processConfirmation($reference, $approvalCode, $orderId, $client->getCurrencyId('KZT'), $amount);

//$filename = 'config/payment/template_confirm.xml';
        //$filename = \Yii::getAlias('@app') /*+ '/config/payment/template_confirm.xml'*/;
//        $filename = \Yii::getAlias('@app') . '/config/payment/template_confirm.xml';


//
//        var_dump($filename);
//        $content = file_get_contents($filename);
//        var_dump($content);

//        $filename = \Yii::getAlias('@app') . '/vendor/kolesa-team/qazkom-epay/tests/data/test_prv.pem';
//        var_dump($filename);
//        $content = file_get_contents($filename);
//        var_dump($content);
        return $this->render('say',['target'=>$target]);
    }

    public function actionHello()
    {
        return $this->render('hello');
    }
    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }
}
