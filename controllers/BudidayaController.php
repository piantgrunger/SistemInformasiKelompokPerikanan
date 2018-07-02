<?php

namespace app\controllers;

use Yii;
use app\models\Anggota;
use app\models\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\Kota;
use app\models\Kelurahan;
use app\models\Kecamatan;
use kartik\mpdf\Pdf;

/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class BudidayaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Anggota models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, true);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anggota model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */

    // THE CONTROLLER
    public function actionKota()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id_propinsi = $_POST['depdrop_parents'];
            $out = Kota::getDataBrowseKota($id_propinsi);
            // the getDefaultSubCat function will query the database
            // and return the default sub cat for the cat_id

            echo Json::encode(['output' => $out, 'selected' => '']);

            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    // THE CONTROLLER
    public function actionKelurahan()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id_propinsi = $_POST['depdrop_parents'];
            $out = Kelurahan::getDataBrowseKelurahan($id_propinsi);
            // the getDefaultSubCat function will query the database
            // and return the default sub cat for the cat_id

            echo Json::encode(['output' => $out, 'selected' => '']);

            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionPrint($id)
    {
        $model = $this->findModel($id);

        $content = $this->renderPartial('print', ['model' => $model]);

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
   'options' => ['title' => 'Cetak Anggota'],
    // call mPDF methods on the fly
]);

        return $pdf->render();
    }

    // THE CONTROLLER
    public function actionKecamatan()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id_propinsi = $_POST['depdrop_parents'];
            $out = Kecamatan::getDataBrowseKecamatan($id_propinsi);
            // the getDefaultSubCat function will query the database
            // and return the default sub cat for the cat_id

            echo Json::encode(['output' => $out, 'selected' => '']);

            return;
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    /**
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->old_foto_anggota = $model->foto_anggota;

        if ($model->load(Yii::$app->request->post()) && $model->upload() && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_anggota]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Anggota model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
        } catch (\yii\db\IntegrityException $e) {
            Yii::$app->session->setFlash('error', 'Data Tidak Dapat Dihapus Karena Dipakai Modul Lain');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return Anggota the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
