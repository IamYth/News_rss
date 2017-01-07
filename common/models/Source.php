<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "source".
 *
 * @property integer $id
 * @property integer $link
 * @property integer $logo
 *
 * @property Feed[] $feeds
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link', 'logo'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'logo' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeds()
    {
        return $this->hasMany(Feed::className(), ['source_id' => 'id']);
    }
}
