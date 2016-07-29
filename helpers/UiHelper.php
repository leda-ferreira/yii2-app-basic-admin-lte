<?php

namespace app\helpers;

use Yii;

/**
 * Description of UiHelper
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class UiHelper
{
    const DANGER = 'danger';
    const INFO = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';

    public static function alert($message, $key = self::SUCCESS)
    {
        Yii::$app->session->addFlash("alert-{$key}", $message);
    }

    public static function callout($message, $key = self::SUCCESS)
    {
        Yii::$app->session->addFlash("callout-{$key}", $message);
    }

    public static function flashes($type, $prefix)
    {
        $session = Yii::$app->session;
        if ($type === false) {
            $alerts = [];
            foreach ($session->getAllFlashes() as $key => $messages) {
                if (strpos($key, $prefix) === 0) {
                    $alerts[$key] = (array)$messages;
                }
            }
            return $alerts;
        }
        return $session->getFlash($type);
    }

    public static function alerts($type = false)
    {
        return self::flashes($type, 'alert');
    }

    public static function callouts($type = false)
    {
        return self::flashes($type, 'callout');
    }

}
