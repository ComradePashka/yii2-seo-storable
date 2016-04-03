<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 3/17/2016
 * Time: 4:08 PM
 */

namespace comradepashka\seokit;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class UrlHistoryBehavior
 * @package comradepashka\seokit
 *
 */
class UrlHistoryBehavior extends Behavior
{
    public $url_attribute = 'url';

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterUpdate'
        ];
    }

    public function getUrlHistory()
    {
        return $this->owner->hasMany(UrlHistory::className(), ['entity_pk' => key($this->owner->getPrimaryKey(true))]);
    }

    public static function checkRedirect($path)
    {
        $item = UrlHistory::findOne(['old_url' => $path]);
        if ($item) {
            $entity = yii::createObject($item->entity_name);
            $url = $entity->findOne(json_decode($item->entity_pk))->attributes{$entity->url_attribute};
            return $url;
        }
    }

    public function afterUpdate($event)
    {
        $oldurl = $event->changedAttributes{$this->url_attribute};
        $newurl = $this->owner->{$this->url_attribute};
        if ($newurl != $oldurl) {
            $url = new UrlHistory();
            $url->entity_name = $this->owner->className();
            $url->entity_pk = json_encode($this->owner->primaryKey);
            $url->old_url = $oldurl;
            $url->save();
        }
    }
}