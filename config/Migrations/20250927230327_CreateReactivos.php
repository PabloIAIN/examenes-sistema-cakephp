<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateReactivos extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('reactivos');
        $table->addColumn('pregunta', 'text', [
            'null' => false,
        ]);
        $table->addColumn('respuesta_a', 'string', [
            'limit' => 500,
            'null' => false,
        ]);
        $table->addColumn('respuesta_b', 'string', [
            'limit' => 500,
            'null' => false,
        ]);
        $table->addColumn('respuesta_c', 'string', [
            'limit' => 500,
            'null' => false,
        ]);
        $table->addColumn('respuesta_correcta', 'string', [
            'limit' => 1,
            'null' => false,
        ]);
        $table->addColumn('retroalimentacion', 'text', [
            'null' => true,
        ]);
        $table->addColumn('dificultad', 'integer', [
            'default' => 1,
            'null' => false,
        ]);
        $table->addColumn('area_especialidad', 'string', [
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('subespecialidad', 'string', [
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addIndex(['user_id']);
        $table->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE']);
        $table->create();
    }
}