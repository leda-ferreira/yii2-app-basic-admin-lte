<?php

namespace app\components\widgets;

use yii\bootstrap\Html;

/**
 * Description of Box
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class Box extends \yii\bootstrap\Widget
{
    public $body;
    public $footer;
    public $labels = [];
    public $overlay;
    public $title;
    public $tools;

    public $solid = false;
    public $removable = false;
    public $expandable = false;
    public $collapsed = false;

    public $bodyOptions = [];
    public $footerOptions = [];
    public $headerOptions = [];
    public $overlayOptions = [];
    public $titleOptions = [];
    public $toolsOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, ['widget' => 'box']);
        if ($this->solid === true) {
            Html::addCssClass($this->options, 'box-solid');
        }
        if ($this->collapsed === true) {
            Html::addCssClass($this->options, 'collapsed-box');
        }
        Html::addCssClass($this->bodyOptions, 'box-body');
        Html::addCssClass($this->footerOptions, 'box-footer');
        Html::addCssClass($this->headerOptions, 'box-header with-border');
        Html::addCssClass($this->overlayOptions, 'overlay');
        Html::addCssClass($this->titleOptions, 'box-title');
        Html::addCssClass($this->toolsOptions, 'box-tools pull-right');

        if (!isset($this->body)) {
            ob_start();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (!isset($this->body)) {
            $this->body = ob_get_clean();
        }

        $displayTools = isset($this->tools) ||
            isset($this->labels) ||
            $this->expandable ||
            $this->removable;

        return $this->render('box', [
            'attributes' => Html::renderTagAttributes($this->options),
            'body' => $this->body,
            'footer' => $this->footer,
            'overlay' => $this->overlay,
            'title' => $this->title,
            'tools' => $this->tools,
            'labels' => $this->labels,
            'displayTools' => $displayTools,
            'expandable' => $this->expandable,
            'removable' => $this->removable,
            'bodyAttributes' => Html::renderTagAttributes($this->bodyOptions),
            'footerAttributes' => Html::renderTagAttributes($this->footerOptions),
            'headerAttributes' => Html::renderTagAttributes($this->headerOptions),
            'overlayAttributes' => Html::renderTagAttributes($this->overlayOptions),
            'titleAttributes' => Html::renderTagAttributes($this->titleOptions),
            'toolsAttributes' => Html::renderTagAttributes($this->toolsOptions)
        ]);
    }
}
