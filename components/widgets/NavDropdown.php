<?php

namespace app\components\widgets;

use yii\bootstrap\Html;

/**
 * Description of NavDropdown
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class NavDropdown extends \yii\bootstrap\Dropdown
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Html::removeCssClass($this->options, ['widget' => 'dropdown-menu']);
        Html::addCssClass($this->options, ['widget' => 'treeview-menu']);
    }
}
