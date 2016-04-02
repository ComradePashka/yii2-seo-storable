<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 3/17/2016
 * Time: 4:08 PM
 */

namespace comradepashka\seostorable;

use yii;
use yii\base\Behavior;
use yii\web\View;

/**
 * Class SeoStorableBehaviour
 * @package comradepashka\seostorable
 *
 */

class SeoStorableBehaviour extends Behavior
{
    /*
    public function events()
    {
        return [
            View::EVENT_END_BODY, [$this, 'registerToolsAsset']
        ];
    }
    */
    public function init() {
        yii::trace("init behavior");
    }
    public function afterUpdate($event) {
        yii::trace("after update! old attributes: " . json_encode($this->owner->oldAttributes));
    }

}