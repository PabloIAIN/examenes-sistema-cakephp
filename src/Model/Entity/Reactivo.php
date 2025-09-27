<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reactivo Entity
 *
 * @property int $id
 * @property string $pregunta
 * @property string $respuesta_a
 * @property string $respuesta_b
 * @property string $respuesta_c
 * @property string $respuesta_correcta
 * @property string|null $retroalimentacion
 * @property int $dificultad
 * @property string $area_especialidad
 * @property string $subespecialidad
 * @property int $user_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Reactivo extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'pregunta' => true,
        'respuesta_a' => true,
        'respuesta_b' => true,
        'respuesta_c' => true,
        'respuesta_correcta' => true,
        'retroalimentacion' => true,
        'dificultad' => true,
        'area_especialidad' => true,
        'subespecialidad' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
