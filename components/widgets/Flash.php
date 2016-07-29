<?php

namespace app\components\widgets;

use app\helpers\UiHelper;

/**
 * Renders the flash messages
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class Flash extends \yii\bootstrap\Widget
{
    public $messages;
    public $callouts;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->messages === null) {
            $this->messages = UiHelper::alerts();
        }
        if ($this->callouts === null) {
            $this->callouts = UiHelper::callouts();
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $alerts = '';
        foreach ($this->messages as $key => $message_arr) {
            foreach ($message_arr as $message) {
                $alerts .= Alert::widget([
                    'options' => [
                        'class' => $key
                    ],
                    'body' => $message
                ]);
            }
        }

        $callouts = '';
        foreach ($this->callouts as $key => $callout_arr) {
            foreach ($callout_arr as $callout) {
                $callouts .= Callout::widget([
                    'options' => [
                        'class' => $key
                    ],
                    'body' => $callout
                ]);
            }
        }

        return $alerts . $callouts;
    }
}
