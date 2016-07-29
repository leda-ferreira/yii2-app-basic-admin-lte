<?php

namespace app\components\widgets;

use yii\bootstrap\Html;

/**
 * Description of InfoBox
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class InfoBox extends \yii\bootstrap\Widget
{
    const TYPE_1 = 1;
    const TYPE_2 = 2;

    public $background;
    public $description;
    public $format;
    public $icon;
    public $number;
    public $progress;
    public $text;
    public $type;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->type === null) {
            $this->type = self::TYPE_1;
            if (isset($this->progress) || isset($this->description)) {
                $this->type = self::TYPE_2;
            }
        }
        if ($this->background === null) {
            $this->background = 'bg-aqua';
        }
        if ($this->icon === null) {
            $this->icon = 'fa fa-star-o';
        }
        if ($this->format === null) {
            $this->format = 'decimal';
        }

        Html::addCssClass($this->options, ['widget' => 'info-box']);
        if ($this->type === self::TYPE_2) {
            Html::addCssClass($this->options, $this->background);
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('infobox-' . $this->type, [
            'attributes' => Html::renderTagAttributes($this->options),
            'background' => $this->background,
            'description' => $this->description,
            'format' => $this->format,
            'icon' => $this->icon,
            'number' => $this->number,
            'progress' => $this->progress,
            'text' => $this->text,
        ]);
    }
}

/*

 *
 *
<!-- Apply any bg-* class to to the info-box to color it -->

 *  */