<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'email' => 'admin@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'administrador',
                'active' => true,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}