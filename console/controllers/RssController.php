<?php
namespace console\controllers;

require(__DIR__ . '/../../common/models/Rss_Item.php');
require(__DIR__ . '/../../common/models/Rss_Parser.php');

use Yii;
use yii\web\Controller;
use common\models\Rss_Parser;
use common\models\Rss_Item;
use common\models\Feed;
use common\models\Source;

class RssController extends \yii\console\Controller
{
    public function actionPush()
    {
        $source = new Source();
        foreach ($source->getUrl() as $source) {
            $url = $source->link;
            $rss = new Rss_Parser();
            $rss->load($url);
            foreach($rss->getItems() as $item) {
                $model = new feed();
                //if (empty($model->getFeed())) {
                    $model->source_id = $source->id;
                    $model->link = $item->getLink();
                    $model->name = $item->getTitle(); 
                    $model->description = $item->getDescription();
                    $title = $model->name;
                    $filter = $model->multiexplode([",", ".", "|", ":", "!", "?", "«","»", " "], $title);
                    $blackTag = $model->getBlackTag();
                    $whiteTag = $model->getWhiteTag();
                    foreach ($filter as $needle) {
                        $slovo = $model->mb_convert_case($needle);
                        if (in_array($slovo, $blackTag)) {
                            if (empty($status)) {
                                $model->status = 'Опубликованная новость Black';
                                $status = $model->status;
                                echo "\n" . $status . ' ' . $title . "\n";
                                unset($status);
                            }
                        }
                        if (in_array($slovo, $whiteTag)) {
                            if (empty($status)) {
                                $model->status = 'Опубликованная новость White';
                                $status = $model->status;
                                echo "\n" . $status . ' ' . $title . "\n";
                                unset($status);
                            }
                        }    
                    }
                    if (empty($model->status)) {
                        $model->status = 'Неопубликованная новость';
                        $status = $model->status;
                        echo "\n" . $status . ' ' . $title . "\n";
                        unset($status);
                    }
                    $model->save(false);
                    //unset($model);
                 //}else {
                //     unset($model);
                //     //var_dump($model);
                //     $rec = new feed();
                //     foreach ($rec->getFeed() as $rec) {
                //         var_dump($rec);
                //         if ((($rec->link) !== ($item->getLink()))) {
                //             $rec->source_id = $source->id;
                //             $rec->link = $item->getLink();
                //             $rec->name = $item->getTitle(); 
                //             $rec->description = $item->getDescription();
                //             $title = $rec->name;
                //             $filter = $rec->multiexplode([",", ".", "|", ":", "!", "?", "«","»", " "], $title);
                //             $blackTag = $rec->getBlackTag();
                //             $whiteTag = $rec->getWhiteTag();
                //             foreach ($filter as $needle) {
                //                 $slovo = $rec->mb_convert_case($needle);
                //                 if (in_array($slovo, $blackTag)) {
                //                     if (empty($status)) {
                //                         $rec->status = 'Опубликованная новость Black';
                //                         $status = $rec->status;
                //                         echo "\n" . $status . ' ' . $title . "\n";
                //                         unset($status);
                //                     }
                //                 }
                //                 if (in_array($slovo, $whiteTag)) {
                //                     if (empty($status)) {
                //                         $rec->status = 'Опубликованная новость White';
                //                         $status = $rec->status;
                //                         echo "\n" . $status . ' ' . $title . "\n";
                //                         unset($status);
                //                     }
                //                 }    
                //             }
                //             if (empty($rec->status)) {
                //                 $rec->status = 'Неопубликованная новость';
                //                 $status = $rec->status;
                //                 echo "\n" . $status . ' ' . $title . "\n";
                //                 unset($status);
                //             }
                //         $rec->save(false);
                //         //var_dump($rec->save(false));

                //         }else {
                //             echo "Новых новостей нет "; // . date('jS \of F Y H:i:s') ;
                //         }
                //     }

                // }
               // die;
        	}
            //die;
        }
    }
}


                    














                    // foreach ($model->getFeed() as $model) {
                    // var_dump($model->link);


                //if (!empty($desc) && (stristr($desc, 'мед' ))) {
                    //var_dump($desc);
                //}