<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CertificateForm;
use frontend\services\CertificateService;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



/**
 * Site controller
 */
class SiteController extends Controller
{

    private $service;

    public function __construct(
        $id,
        $module,
        CertificateService $service,
        $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @return mixed
     */
    public function actionIndex()
    {
        $form = new CertificateForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $certificate = $this->service->create($form);
                $content = $this->renderPartial('viewpdf',['certificate' => $certificate]);
                $pdf = $this->service->pdf($content,$certificate);
                return $this->render('pdf',[
                    'pdf' => $pdf
                ]);

            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('index',[
            'model' => $form
        ]);
    }

}
