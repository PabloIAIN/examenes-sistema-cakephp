<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class User extends Entity
{
    protected array $_accessible = [
        'email' => true,
        'password' => true,
        'role' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'reactivos' => true,
    ];

    protected array $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}