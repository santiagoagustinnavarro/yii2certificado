<?php

namespace app\controllers;

use Yii;
use app\models\Alumno;
use app\models\AlumnoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/******  agregados   ******/
use app\models\CsvForm;

use yii\filters\AccessControl;

/**
 * AlumnoController implements the CRUD actions for Alumno model.
 */
class AlumnoController extends Controller
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
            ],'access' => [
              'class' => \yii\filters\AccessControl::className(),
              'only' => ['index','create','update','view','importar'],
              'rules' => [
                  // allow authenticated users
                  ['actions' => ['index','create','update','view','importar'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
                  // everything else is denied
                  
              ],
          ],        
        ];
    }

    /**
     * Lists all Alumno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alumno model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Alumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alumno();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'documento' => $model->documento]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alumno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'documento' => $model->documento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alumno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($documento)
    {
        $this->findModel($documento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($documento)
    {
        if (($model = Alumno::findOne($documento)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public  function conversor( $texto)
    {

        return $texto;
    }

    public  function actionImprimirRegular( $documento)
    {
       $objAlumno = Alumno::find()->where(["documento" => $documento])->one();

        return $this->renderPartial('imprimir-regular', ['objAlumno'=>$objAlumno]);
    }

    public  function actionImprimirEscolaridad( $documento)
    {
       $objAlumno = Alumno::find()->where(["documento" => $documento])->one();

        return $this->renderPartial('imprimir-escolaridad', ['objAlumno'=>$objAlumno]);
    }


    public  function actionImprimirTituloTramite( $documento)
    {
       $objAlumno = Alumno::find()->where(["documento" => $documento])->one();

        return $this->renderPartial('imprimir-titulo-tramite', ['objAlumno'=>$objAlumno]);
    }

    public  function actionImportar(){
// Limpiamos el archivo  sheet001, dejamos en princiip y final la etiqueta "html" seguido de body y limpiamos entre </table> y </body>
// previamente hay que convertirlo, seleccionamos separador de columnas  ";" y "UTF-8"
     $model = new CsvForm;

     if($model->load(Yii::$app->request->post())){
         $file = UploadedFile::getInstance($model,'file');
         $filename = 'Data.'.$file->extension;
         $upload = $file->saveAs('../uploads/'.$filename);
         if($upload){
             define('CSV_PATH','../uploads/');
             $csv_file = CSV_PATH . $filename;
             $filecsv = file($csv_file);
          //   print_r($filecsv);
             foreach($filecsv as $fila){

                   $data = explode(";",$fila);

                   $alumno= new Alumno;

                   if(isset($data[0])){
                     $alumno->curso = $this->conversor($data[0]);
                   }

                   if(isset($data[1])){
                     $alumno->division = $this->conversor($data[1]);
                   }

                   if(isset($data[2])){
                     $alumno->turno = $this->conversor($data[2]);
                   }

                   if(isset($data[3])){
                     $alumno->documento = $this->conversor($data[3]);
                   }

                   if(isset($data[4])){
                     $alumno->cuil = $this->conversor($data[4]);
                   }

                   if(isset($data[5])){
                     $alumno->alumno = $this->conversor( $data[5]);
                   }

                   if(isset($data[6])){
                     $alumno->fecha_nacimiento = $this->conversor($data[6]);
                   }else{
                     $alumno->fecha_nacimiento = '';
                   }

                   if(isset($data[7])){
                     $alumno->repitente = $this->conversor( $data[7]);
                   }else{
                     $alumno->repitente = '';
                   }

                   if(isset($data[8])){
                      $alumno->telefono = $this->conversor($data[8]);
                   }

                   if(isset($data[9])){
                     $alumno->telefono_urgencia = $this->conversor($data[9]);
                   }

                  if(isset($data[10])){
                    $alumno->domicilio = $this->conversor($data[10]);
                  }

                  if(isset($data[11])){
                    $alumno->localidad = $this->conversor($data[11]);
                   }

                    $alumno->save();
             }
             unlink('../uploads/'.$filename);
             $model->file= 'se ingreso en éxito';
             return $this->render('importar',['model'=>$model]);
         }
      }else{
          return $this->render('importar',['model'=>$model]);
    }

  }





}
