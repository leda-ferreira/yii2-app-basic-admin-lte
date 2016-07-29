<?php

namespace app\components\widgets;

use yii\helpers\Html;

/**
 * Renders the page header and description
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class Title extends \yii\base\Widget
{
    /**
     * @var string
     */
    public $header;

    /**
     * @var string
     */
    public $description;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $description = '';
        if ($this->description) {
            $description = Html::tag('small', $this->description);
        }

        $header = '';
        if ($this->header) {
            $header = Html::tag('span', $this->header);
            if ($description) {
                $header .= " {$description}";
            }
        }

        return Html::tag('h1', $header);
    }
}
