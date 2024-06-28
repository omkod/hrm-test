<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Employee
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $attestation_date
 *
 * @package app\models
 */
class Employee extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'employee';
    }

    public function rules(): array
    {
        return [
          [['name', 'email'], 'required'],
          ['name', 'string', 'length' => [1, 255]],
          ['email', 'email'],
          ['email', 'unique'],
          ['attestation_date', 'date', 'format' => 'yyyy-M-d', 'message' => 'Date format must be yyyy-M-d'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
          'id'               => 'ID',
          'name'             => 'Name',
          'email'            => 'Email',
          'attestation_date' => 'Attestation Date',
        ];
    }

}