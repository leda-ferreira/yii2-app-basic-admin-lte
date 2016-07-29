<?php

namespace app\helpers;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * Description of UploadHelper
 *
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class UploadHelper
{
    public static $errorMessages = [
        UPLOAD_ERR_OK => false,
        UPLOAD_ERR_INI_SIZE => 'Tamanho excede limite',
        UPLOAD_ERR_FORM_SIZE => 'Tamanho excede limite',
        UPLOAD_ERR_PARTIAL => 'Envio incompleto',
        UPLOAD_ERR_NO_FILE => 'Erro interno (1).',
        UPLOAD_ERR_NO_TMP_DIR => 'Erro interno (2).',
        UPLOAD_ERR_CANT_WRITE => 'Erro interno (3).',
        UPLOAD_ERR_EXTENSION => 'Erro interno (4).',
    ];

    /**
     * @param Model $model
     * @param string $attribute
     * @param string $where
     * @return mixed
     */
    public static function uploadSingle(Model $model, $attribute, $where = null)
    {
        if ($where && substr($where, -1) !== '/') {
            $where .= '/';
        }

        $alias_abs = '@app/web/uploads/' . $where;
        $alias_rel = '@web/uploads/' . $where;

        $path_abs = Yii::getAlias($alias_abs);
        $path_rel = Url::to($alias_rel);

        $file = UploadedFile::getInstance($model, $attribute);
        if ($file) {
            $fname = Yii::$app->security->generateRandomString() . '.' . $file->extension;
            $saved = $file->saveAs($path_abs . $fname);
            return (object)[
                'alias' => (object)[
                    'abs' => $alias_abs . $fname,
                    'rel' => $alias_rel . $fname,
                ],
                'path' => (object)[
                    'abs' => $path_abs . $fname,
                    'rel' => $path_rel . $fname,
                ],
                'file' => $file,
                'error' => $file->error,
                'success' => $saved,
            ];
        }

        return null;
    }

    /**
     * @param Model $model
     * @param string $attribute
     * @param string $where
     * @return mixed
     */
    public static function uploadMultiple(Model $model, $attribute, $where = null)
    {
        if ($where && substr($where, -1) !== '/') {
            $where .= '/';
        }

        $alias_abs = '@app/web/uploads/' . $where;
        $alias_rel = '@web/uploads/' . $where;

        $path_abs = Yii::getAlias($alias_abs);
        $path_rel = Url::to($alias_rel);

        $result = [];
        foreach (UploadedFile::getInstances($model, $attribute) as $file) {
            $fname = Yii::$app->security->generateRandomString() . '.' . $file->extension;
            $saved = $file->saveAs($path_abs . $fname);
            $result[] = (object)[
                'alias' => (object)[
                    'abs' => $alias_abs . $fname,
                    'rel' => $alias_rel . $fname,
                ],
                'path' => (object)[
                    'abs' => $path_abs . $fname,
                    'rel' => $path_rel . $fname,
                ],
                'file' => $file,
                'error' => $file->error,
                'success' => $saved,
            ];
        }

        return $result;
    }

    /**
     * @param integer $error
     * @return string
     */
    public static function uploadErrorMessage($error)
    {
        if (isset(self::$errorMessages[$error])) {
            return self::$errorMessages[$error];
        }
        return 'Erro interno (0).';
    }
}
