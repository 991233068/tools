<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

class IndexController extends Controller
{
	/**
	 * @inheritdoc
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
	 * @inheritdoc
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

	public function actionIndex()
	{
	    return $this->render('index');
	}

    public function actionMessage(){
        return $this->render('message');
    }

	//发送接口
	public function actionInterface(){
		if($_POST){
			if(!$_POST['type']) exit(json_encode(['非法参数']));
			if(!$_POST['parameter-url'] || trim($_POST['parameter-url'])=='') exit(json_encode(['接口地址不能为空！']));
			if(!$this->EffectiveHttp($_POST['parameter-url'])) exit(json_encode(['请输入正确的url']));
			if(isset($_POST['parameter-name']) && count($_POST['parameter-name']) != count($_POST['parameter-value']) ) exit(json_encode(['非法参数']));
			
			$method = $_POST['type'] == 1 ?'GET':'POST';
			$data = [];
			if($_POST['parameter-name']){
				foreach($_POST['parameter-name'] as $k=>$v){
					$data[$v] = $_POST['parameter-value'][$k]; 
				}
			}
			exit($this->http($_POST['parameter-url'],$method,$data,'',$_POST['ishttps']));
		}
		exit(json_encode(['非法参数']));
	}

	public function EffectiveHttp($subject) {
		$pattern='/\b(([\w-]+:\/\/?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|\/)))/';
		if(preg_match($pattern, $subject)){
			return true;
		}else{
			return false;
		}
	}

	public function http($url, $method, $postfields = NULL, $headers = array(),$ishttps=0) {
	        $ci = curl_init();
	        /* Curl settings */
	        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
	        curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
	        curl_setopt($ci, CURLOPT_ENCODING, "");
	        //curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 1);
	        curl_setopt($ci, CURLOPT_HEADER, FALSE);
            if($ishttps == 1){
                curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ci, CURLOPT_SSL_VERIFYHOST,0);
            }

	        switch ($method) {
	            case 'POST':
	                curl_setopt($ci, CURLOPT_POST, TRUE);
	                if (!empty($postfields)) {
	                	//var_dump($postfields);
	                    curl_setopt($ci, CURLOPT_POSTFIELDS, json_encode($postfields));
	                }
	                break;
	            case 'DELETE':
	                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
	                if (!empty($postfields)) {
	                    $url = "{$url}?{$postfields}";
	                }
	        }

	        curl_setopt($ci, CURLOPT_URL, $url );
	        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );

	        $response = curl_exec($ci);

	        curl_close ($ci);
	        return $response;
	    }
}