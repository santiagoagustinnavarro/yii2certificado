<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property string $curso
 * @property string $division
 * @property string $turno
 * @property string $documento
 * @property string $cuil
 * @property string $alumno
 * @property string $fecha_nacimiento
 * @property string $repitente
 * @property string $telefono
 * @property string $telefono_urgencia
 * @property string $domicilio
 * @property string $localildad
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['documento' ], 'required'],
            [['curso', 'documento', 'repitente', 'telefono', 'telefono_urgencia'], 'string', 'max' => 30],
            [['curso', 'division', 'turno', 'documento', 'cuil', 'alumno', 'fecha_nacimiento', 'repitente', 'telefono', 'telefono_urgencia', 'domicilio', 'localidad',], 'default', 'value' =>null],

            [['division'], 'string', 'max' => 40],
            [['turno'], 'string', 'max' => 20],
            [['cuil'], 'string', 'max' => 15],
            [['alumno'], 'string', 'max' => 60],
            [['fecha_nacimiento'], 'string', 'max' => 20],
            [['domicilio', 'localidad'], 'string', 'max' => 50],
            [['documento'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'curso' => 'Curso',
            'division' => 'Division',
            'turno' => 'Turno',
            'documento' => 'Documento',
            'cuil' => 'Cuil',
            'alumno' => 'Alumno',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'repitente' => 'Repitente',
            'telefono' => 'Telefono',
            'telefono_urgencia' => 'Telefono Urgencia',
            'domicilio' => 'Domicilio',
            'localildad' => 'Localildad',
        ];
    }

    public function getAlumno()
    {
        return $this->alumno;
    }



}
