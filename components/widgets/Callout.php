<?php

namespace app\components\widgets;

use yii\bootstrap\Html;

/**
 * Description of Callout
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class Callout extends Alert
{
    /**
     * @inheritdoc
     */
    protected function renderCloseButton()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    protected function initOptions()
    {
        Html::addCssClass($this->options, ['callout']);
    }
}
