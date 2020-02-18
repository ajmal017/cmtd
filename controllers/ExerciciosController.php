<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\ConsultaModel;
use app\models\MetodosModel;
use app\models\PredictModel;
use app\models\PredicttModel;

class ExerciciosController extends Controller
{
    
    public function actionHome(){
        $this->layout = 'home';
        
        return $this->render('home');
    }
    
   public function actionPredict(){
       $this->layout = 'clean';
       
        $model = new ConsultaModel;
        $model2 = new PredicttModel;
        $post = $_POST;
        
        if($model->load($post) && $model->validate()){
            return $this->render('predicttest', [
                'predicttModel' => $model2,
                'consultaModel' => $model
            ]);
        }

        else{

            return $this->render('predict', [
                'consultaModel' => $model,
                'predicttModel' => $model2
            ]);
       }
    }
    
    public function actionMetodos() {
        $this->layout = 'clean';
        
        $metodosModel = new MetodosModel;
        $post = $_POST;
        
        if($metodosModel->load($post) && $metodosModel->validate()){
           
            if($metodosModel->metodo == 'CMTD'){
                
                return $this->redirect(['predict']);
            }
            
            else{
                
                return $this->render('cmo');
            }
            
        }
        
        else{
            return $this->render('metodos', [
                'model' => $metodosModel
            ]);
        }
    }
    
    public function actionLogin(){
        
    }
    
    public function actionLogout(){
        
    }
    
}

