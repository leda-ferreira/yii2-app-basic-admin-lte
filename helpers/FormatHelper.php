<?php

namespace app\helpers;

/**
 * Description of FormatHelper
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class FormatHelper
{
    /**
     * @var array
     */
    public static $meses = [
        1 => 'janeiro',
        2 => 'fevereiro',
        3 => 'março',
        4 => 'abril',
        5 => 'maio',
        6 => 'junho',
        7 => 'julho',
        8 => 'agosto',
        9 => 'setembro',
        10 => 'outubro',
        11 => 'novembro',
        12 => 'dezembro'
    ];

    /**
     * @param string $date
     * @return string
     */
    public static function dateYmdToDmy($date)
    {
        return preg_replace('#(\d{4}).(\d{2}).(\d{2})#', '$3/$2/$1', $date);
    }

    /**
     * @param string $date
     * @return string
     */
    public static function dateDmyToYmd($date)
    {
        return preg_replace('#(\d{2}).(\d{2}).(\d{4})#', '$3-$2-$1', $date);
    }

    /**
     * @param string $true
     * @param string $false
     * @return array
     */
    public static function boolean($true = 'Sim', $false = 'Não')
    {
        return [
            true => $true,
            false => $false
        ];
    }

    /**
     * @param \yii\base\Model $model
     * @return string
     */
    public static function concatErrors(\yii\base\Model $model)
    {
        $errors = [];
        foreach ($model->errors as $field => $field_errors) {
            $errors[$field] = implode('<br>', $field_errors);
        }

        return implode('<br>', $errors);
    }
}
