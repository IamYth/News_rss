<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feed".
 *
 * @property integer $id
 * @property integer $source_id
 * @property string $name
 * @property string $description
 * @property integer $link
 *
 * @property Source $source
 */
class Feed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_id'], 'required'],
            [['source_id', 'link'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['source_id'], 'exist', 'skipOnError' => true, 'targetClass' => Source::className(), 'targetAttribute' => ['source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source_id' => 'Source ID',
            'name' => 'Name',
            'description' => 'Description',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::className(), ['id' => 'source_id']);
    }
}
