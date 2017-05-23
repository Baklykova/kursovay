<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 22.05.2017
 * Time: 11:42
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    public $imegeFile;
    public $pdfFile;

    public function rules()
    {
        return [
            [['imegeFile'], 'file', 'scipOnEmpty' =>true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['pdfFile'], 'file', 'sciponEmpty' => true, 'extensions' => 'pdf']
        ];
    }

    /**
     * @return bool
     */
    public function uploadImage()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('image/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function uploadPdf()
    {
        if ($this->validate()){
            $this->pdfFile->saveAs('pdf/' . $this->pdfFile->baseName . '.' . $this->pdfFile->extension);
            return true;
        } else{
            return false;
        }
    }
}