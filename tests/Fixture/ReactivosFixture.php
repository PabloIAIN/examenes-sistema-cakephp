<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReactivosFixture
 */
class ReactivosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'pregunta' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'respuesta_a' => 'Lorem ipsum dolor sit amet',
                'respuesta_b' => 'Lorem ipsum dolor sit amet',
                'respuesta_c' => 'Lorem ipsum dolor sit amet',
                'respuesta_correcta' => 'L',
                'retroalimentacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'dificultad' => 1,
                'area_especialidad' => 'Lorem ipsum dolor sit amet',
                'subespecialidad' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created' => '2025-09-27 23:08:48',
                'modified' => '2025-09-27 23:08:48',
            ],
        ];
        parent::init();
    }
}
