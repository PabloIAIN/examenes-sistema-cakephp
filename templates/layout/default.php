<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Sistema de Exámenes:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <style>
        .navbar {
            background-color: #2c3e50;
            padding: 1rem;
            margin-bottom: 2rem;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 1rem;
        }
        .navbar a:hover {
            color: #3498db;
        }
        .user-info {
            float: right;
            color: white;
        }
        .dashboard-card {
            border: 1px solid #ddd;
            padding: 1.5rem;
            margin: 1rem 0;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        .alert {
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .alert-error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <?php if (isset($currentUser)): ?>
    <nav class="navbar">
        <div class="container">
            <?= $this->Html->link('Sistema de Exámenes', ['controller' => 'Pages', 'action' => 'dashboard']) ?>

            <?php if ($currentUser->role === 'administrador'): ?>
                <?= $this->Html->link('Dashboard', ['controller' => 'Pages', 'action' => 'dashboard']) ?>
                <?= $this->Html->link('Usuarios', ['controller' => 'Users', 'action' => 'index']) ?>
                <?= $this->Html->link('Todos los Reactivos', ['controller' => 'Reactivos', 'action' => 'index']) ?>
            <?php else: ?>
                <?= $this->Html->link('Dashboard', ['controller' => 'Pages', 'action' => 'dashboard']) ?>
                <?= $this->Html->link('Mis Reactivos', ['controller' => 'Reactivos', 'action' => 'index']) ?>
                <?= $this->Html->link('Crear Reactivo', ['controller' => 'Reactivos', 'action' => 'add']) ?>
            <?php endif; ?>

            <span class="user-info">
                Bienvenido, <?= h($currentUser->email) ?> (<?= h($currentUser->role) ?>)
                <?= $this->Html->link('Cerrar Sesión', ['controller' => 'Users', 'action' => 'logout'], ['style' => 'margin-left: 1rem;']) ?>
            </span>
        </div>
    </nav>
    <?php endif; ?>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer>
    </footer>
</body>
</html>