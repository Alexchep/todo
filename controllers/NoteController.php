<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\models\Notes;
use app\models\UploadImage;

class NoteController extends Controller
{
    public function actionIndex()
    {
        $query = Notes::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Notes();

        if ($model->load(Yii::$app->request->post())) {
            $upload = new UploadImage();
            $upload->picture = UploadedFile::getInstance($model, 'path_to_image');
            if($upload->picture != null) {
                $upload->picture->saveAs('uploads/' . $upload->picture->name);
                $model->path_to_image = $upload->picture->name;
                $model->user_id = 1;
                if($model->validate()){
                    // изменить когда появится регистрация на like $user->id
                    $model->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Notes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}