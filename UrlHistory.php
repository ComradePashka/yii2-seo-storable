<?php

namespace comradepashka\seokit;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "url_history".
 *
 * @property string $entity_name
 * @property string $entity_pk
 * @property string $old_url
 */
class UrlHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_name', 'entity_pk', 'old_url'], 'required'],
            [['entity_name', 'entity_pk', 'old_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entity_name' => 'Entity Name',
            'entity_pk' => 'Entity Pk',
            'old_url' => 'Old Url',
        ];
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => TimestampBehavior::className(),
                'value' => function () {
                    return date('U');
                }
            ]
        ]);
    }
}
