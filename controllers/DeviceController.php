<?php

namespace app\controllers;

use app\models\Device;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DeviceController implements the CRUD actions for Device model.
 */
class DeviceController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Device models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Device::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Device model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Device model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Device();

        // if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $uploadDir = Yii::getAlias('@webroot/upload/');
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                // Upload the files
                $files = UploadedFile::getInstances($model, 'files');
                if (!empty($files)) {
                    $filePaths = [];
                    $fileCount = count($files);
                    $uploadedCount = 0;
                
                    foreach ($files as $file) {
                        $filePath = $uploadDir . $file->baseName . '.' . $file->extension;
                
                        if ($file->saveAs($filePath)) {
                            $filePaths[] = $filePath;
                
                            // Convert Excel file to CSV
                            $csvFilePath = $uploadDir . $file->baseName . '.csv';
                            $spreadsheet = IOFactory::load($filePath);
                            $writer = IOFactory::createWriter($spreadsheet, 'Csv');
                            $writer->save($csvFilePath);
                
                            // Import CSV data into the database
                            $handle = fopen($csvFilePath, 'r');
                            while (($data = fgetcsv($handle)) !== false) {
                                $rowData[] = $data;
                            }
                            fclose($handle);
                
        
                            // Import data into the database
                            foreach ($rowData as $row) {
                                $modelRow = new Device();
                                $modelRow->brand = isset($row[0]) ? $row[0] : null;
                                $modelRow->IMEI = isset($row[1]) ? $row[1] : null;
                                $modelRow->files = $filePath;
                                $modelRow->save();
                            }
                        }
                    }
                    $model->files = implode(',', $filePaths);
                }
                if ($model->save()) {

                    Yii::$app->session->setFlash('success', 'Device added successfull.');
                    
                    return $this->redirect(['index']);
                   

                }          
              
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Device model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', 'Device updated successfull.');

            return $this->redirect(['view', 'id' => $model->id]);
            

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Device model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', 'Device successfull deleted.');

        return $this->redirect(['index']);
        

    }

    /**
     * Finds the Device model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Device the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Device::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
