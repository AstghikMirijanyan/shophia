<?php

namespace frontend\modules\blog\controllers;

use common\models\Blog;
use common\models\Comments;
use yii\web\Controller;

/**
 * Default controller for the `blog` module
 */
class BlogController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $articles = Blog::find()->with('comments')->orderBy(['created_at'=>SORT_DESC])->asArray()->all();
        return $this->render('index',['articles' => $articles]);
    }

    public function actionArticle($slug){
        $blog = Blog::findOne(['slug'=>$slug]);

        if(!empty($blog)){
            $comment = new Comments();

//            $comment->user_id = \Yii::$app->user->id;
            $comment->blog_id = $blog->id;
            if($comment->load(\Yii::$app->request->post()) && $comment->save()){

            }

            $article = Blog::find()
                ->with(['comments' => function($article){
                $article->with('user');
                $article->orderBy(['created_at' => SORT_DESC]);
            }])->where(['id' => $blog->id])->asArray()->one();


            return $this->render('blog',
                ['article' => $article,
                    'comment' => $comment]);
        }
    }

}
