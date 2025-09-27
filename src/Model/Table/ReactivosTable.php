<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReactivosTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('reactivos');
        $this->setDisplayField('pregunta');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('pregunta')
            ->requirePresence('pregunta', 'create')
            ->notEmptyString('pregunta');

        $validator
            ->scalar('respuesta_a')
            ->maxLength('respuesta_a', 500)
            ->requirePresence('respuesta_a', 'create')
            ->notEmptyString('respuesta_a');

        $validator
            ->scalar('respuesta_b')
            ->maxLength('respuesta_b', 500)
            ->requirePresence('respuesta_b', 'create')
            ->notEmptyString('respuesta_b');

        $validator
            ->scalar('respuesta_c')
            ->maxLength('respuesta_c', 500)
            ->requirePresence('respuesta_c', 'create')
            ->notEmptyString('respuesta_c');

        $validator
            ->scalar('respuesta_correcta')
            ->maxLength('respuesta_correcta', 1)
            ->requirePresence('respuesta_correcta', 'create')
            ->notEmptyString('respuesta_correcta')
            ->inList('respuesta_correcta', ['A', 'B', 'C']);

        $validator
            ->scalar('retroalimentacion')
            ->allowEmptyString('retroalimentacion');

        $validator
            ->integer('dificultad')
            ->requirePresence('dificultad', 'create')
            ->notEmptyString('dificultad')
            ->range('dificultad', [1, 5]);

        $validator
            ->scalar('area_especialidad')
            ->maxLength('area_especialidad', 100)
            ->requirePresence('area_especialidad', 'create')
            ->notEmptyString('area_especialidad');

        $validator
            ->scalar('subespecialidad')
            ->maxLength('subespecialidad', 100)
            ->requirePresence('subespecialidad', 'create')
            ->notEmptyString('subespecialidad');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }

    // Método para obtener las especialidades médicas
    public static function getEspecialidades()
    {
        return [
            'Medicina Interna' => [
                'Cardiología',
                'Gastroenterología',
                'Neumología',
                'Nefrología',
                'Endocrinología',
                'Hematología',
                'Reumatología',
                'Infectología',
                'Alergología',
                'Medicina Crítica (Terapia Intensiva)',
                'Geriatría'
            ],
            'Pediatría' => [
                'Neonatología',
                'Cardiología Pediátrica',
                'Neurología Pediátrica',
                'Gastroenterología Pediátrica',
                'Infectología Pediátrica',
                'Oncología Pediátrica',
                'Cuidados Intensivos Pediátricos',
                'Endocrinología Pediátrica'
            ],
            'Ginecología y Obstetricia' => [
                'Biología de la Reproducción (Reproducción Asistida)',
                'Oncología Ginecológica',
                'Uroginecología y Cirugía Pélvica Reconstructiva',
                'Medicina Materno-Fetal (Perinatología)',
                'Endocrinología Ginecológica y Reproductiva'
            ],
            'Cirugía General' => [
                'Cirugía Oncológica',
                'Cirugía Vascular y Angiológica',
                'Cirugía de Tórax',
                'Cirugía Endocrina',
                'Cirugía Hepatobiliopancreática',
                'Cirugía Bariátrica',
                'Cirugía Traumatológica',
                'Cirugía de Trasplantes'
            ]
        ];
    }
}