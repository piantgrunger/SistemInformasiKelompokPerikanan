<?php

namespace app\controllers;

use Yii;
use app\models\Kelompok;
use app\models\Anggota;
use app\models\KelompokSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\helpers\Helper;
use kartik\mpdf\Pdf; 

/**
 * KelompokController implements the CRUD actions for Kelompok model.
 */
class KelompokController extends Controller
{
  
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kelompok models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KelompokSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kelompok model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kelompok model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kelompok();
        if ($model->load(Yii::$app->request->post()) ) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailKelompok = Yii::$app->request->post('Detkelompok', []);
                $model->detailKelompokBantuan = Yii::$app->request->post('Detkelompokbantuan', []);
               
                if (($model->save()) && (count( $model->detailKelompok)>0)
                   &&(Helper:: my_array_unique($model->detailKelompok,'id_anggota'))) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_kelompok]);
                }
                $transaction->rollBack();
            } catch (\Exception $ecx) {
              
                $transaction->rollBack();
                throw $ecx;
            }

            if (count( $model->detailKelompok)==0)
            {
                $model->addError('detailKelompok','Kelompok Harus Memiliki Anggota');
            }
           
           if (!Helper:: my_array_unique($model->detailKelompok,'id_anggota'))
           {
                $model->addError('detailKelompok','Anggota Tidak Boleh Kembar ');
                  
           }    
         
                    
            return $this->render('create', [
                'model' => $model,
            ]);
     

        } else {
            $model->id_propinsi = 35;
            $model->id_kota = 3523;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionPrint($id)
    {
        $model = $this->findModel($id);
        
         $content = $this->renderPartial('print',['model'=>$model]);
         
   
         // setup kartik\mpdf\Pdf component
$pdf = new Pdf([
   // set to use core fonts only
   'mode' => Pdf::MODE_UTF8, 
   // A4 paper format
   'format' => Pdf::FORMAT_A4, 
   // portrait orientation
   'orientation' => Pdf::ORIENT_PORTRAIT, 
   // stream to browser inline
   'destination' => Pdf::DEST_BROWSER, 
   // your html content input
   'content' => $content,  
   // format content from your own css file if needed or use the
   // enhanced bootstrap css built by Krajee for mPDF formatting 
   'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
   // any css to be embedded if required
   'cssInline' => '.kv-heading-1{font-size:18px}', 
    // set mPDF properties on the fly
   'options' => ['title' => 'Cetak Kelompok '],
    // call mPDF methods on the fly
]);
  return $pdf->render();
    }
   

    /**
     * Updates an existing Kelompok model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) ) {
          
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailKelompok = Yii::$app->request->post('Detkelompok', []);
                $model->detailKelompokBantuan = Yii::$app->request->post('Detkelompokbantuan', []);
                
                if (($model->save()) && (count( $model->detailKelompok)>0)
                  &&(Helper:: my_array_unique($model->detailKelompok,'id_anggota')
                     ))
                       {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_kelompok]);
                }
                $transaction->rollBack();
            } catch (\Exception $ecx) {
                $transaction->rollBack();
                throw $ecx;
            }
            if (count( $model->detailKelompok)==0)
                {
                    $model->addError('detailKelompok','Kelompok Harus Memiliki Anggota');
                }
             if (!Helper:: my_array_unique($model->detailKelompok,'id_anggota'))
           {
                $model->addError('detailKelompok','Anggota Tidak Boleh Kembar ');
                  
           }    
             
            return $this->render('update', [
                'model' => $model,
            ]);
    
          } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kelompok model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionAnggota()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id_propinsi = $_POST['depdrop_parents'];
            $param1 = null;
            if (!empty($_POST['depdrop_params'])) {
                $params = $_POST['depdrop_params'];
                $param1 = $params[0]; // get the value of input-type-1
            }
 
            $out = Anggota::getDataBrowseAnggota($id_propinsi,$param1); 
            // the getDefaultSubCat function will query the database
            // and return the default sub cat for the cat_id

            echo Json::encode(['output' => $out, 'selected' => '']);
            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionDelete($id)
    {
        
       try
      {
        $this->findModel($id)->delete();
      
      }
      catch(\yii\db\IntegrityException  $e)
      {
	Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
       } 
         return $this->redirect(['index']);
    }

    /**
     * Finds the Kelompok model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kelompok the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kelompok::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
