<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\models\Notes;
use app\models\UploadImage;

class NoteController extends Controller
{
    public function actionIndex()
    {
        $notes = Notes::find()->all();

        return $this->render('index', ['notes' => $notes]);
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
            }

            $model->user_id = 1;

            if($model->validate()){
                // изменить когда появится регистрация на like $user->id
                $model->save();

                return $this->redirect(['index', 'id' => $model->id]);
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
        $post = Yii::$app->request->post('Notes');

        if ($post) {

            $model->title = $post['title'];
            $model->text = $post['text'];
            $img = isset($post['path_to_img']) ? $post['path_to_img'] : null;

            if (!is_null($img)) {
                $upload = new UploadImage();
                $upload->picture = UploadedFile::getInstance($model, 'path_to_image');

                if($upload->picture != null) {
                    $upload->picture->saveAs('uploads/' . $upload->picture->name);
                    $model->path_to_image = $upload->picture->name;
                }
            }

            $model->save();

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