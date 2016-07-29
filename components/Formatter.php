<?php

namespace app\components;

use yii\helpers\Html;
use yii\helpers\StringHelper;
use app\helpers\UiHelper;

/**
 * Description of Formatter
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class Formatter extends \yii\i18n\Formatter
{
    /**
     * Formats the value with yii\helpers\StringHelper::truncate
     * @param mixed $value
     * @param integer $length
     * @param string $suffix
     * @param string $encoding
     * @param boolean $asHtml
     * @return string
     */
    public function asTruncated($value, $length, $suffix = '...', $encoding = null, $asHtml = false)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return StringHelper::truncate($value, $length, $suffix, $encoding, $asHtml);
    }

    /**
     * Formats the value with yii\helpers\StringHelper::truncateWords
     * @param mixed $value
     * @param integer $count
     * @param string $suffix
     * @param boolean $asHtml
     * @return string
     */
    public function asWords($value, $count, $suffix = '...', $asHtml = false)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }
        return StringHelper::truncateWords($value, $count, $suffix, $asHtml);
    }

    /**
     * Formats the value as link
     * @param string $url
     * @param string $value
     * @param array $options
     * @return string
     */
    public function asTextLink($url, $value = null, $options = [])
    {
        if ($url === null || trim($url) === '') {
            return $this->nullDisplay;
        }
        if (strpos($url, '://') === false) {
            $url = 'http://' . $url;
        }
        if ($value === null) {
            $value = $url;
        }

        return Html::a($value, $url, $options);
    }

    /**
     * TODO: Describe this
     * @param string $value
     * @param array $array
     * @return string
     */
    public function asArrayValue($value, $array = [])
    {
        if (isset($array[$value])) {
            return $array[$value];
        }
        return $value;
    }
}
