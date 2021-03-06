<?php

namespace common\models;

use Yii;
use \common\models\base\ModuleJadwal as BaseModuleJadwal;

/**
 * This is the model class for table "module_jadwal".
 */
class ModuleJadwal extends BaseModuleJadwal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['kelas_id', 'mapel_id', 'kode_guru', 'jam_id', 'hari'], 'required'],
            [['kelas_id', 'mapel_id', 'kode_guru', 'jam_id', 'created_by', 'created_at', 'updated_by', 'updated_at', 'deleted_by', 'lock'], 'integer'],
            [['deleted_at'], 'safe'],
            [['hari'], 'string', 'max' => 45],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }


    /**
     * 
     * @overide
     * replace ```index.php?modelName[id]=1``` to ```index.php?modelName[id]=1```
     * 
     */
    public function formName()
    {
        return '';
    }
}
