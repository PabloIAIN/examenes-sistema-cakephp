<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->email) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $user->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reactivos') ?></h4>
                <?php if (!empty($user->reactivos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Pregunta') ?></th>
                            <th><?= __('Respuesta A') ?></th>
                            <th><?= __('Respuesta B') ?></th>
                            <th><?= __('Respuesta C') ?></th>
                            <th><?= __('Respuesta Correcta') ?></th>
                            <th><?= __('Retroalimentacion') ?></th>
                            <th><?= __('Dificultad') ?></th>
                            <th><?= __('Area Especialidad') ?></th>
                            <th><?= __('Subespecialidad') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->reactivos as $reactivo) : ?>
                        <tr>
                            <td><?= h($reactivo->id) ?></td>
                            <td><?= h($reactivo->pregunta) ?></td>
                            <td><?= h($reactivo->respuesta_a) ?></td>
                            <td><?= h($reactivo->respuesta_b) ?></td>
                            <td><?= h($reactivo->respuesta_c) ?></td>
                            <td><?= h($reactivo->respuesta_correcta) ?></td>
                            <td><?= h($reactivo->retroalimentacion) ?></td>
                            <td><?= h($reactivo->dificultad) ?></td>
                            <td><?= h($reactivo->area_especialidad) ?></td>
                            <td><?= h($reactivo->subespecialidad) ?></td>
                            <td><?= h($reactivo->user_id) ?></td>
                            <td><?= h($reactivo->created) ?></td>
                            <td><?= h($reactivo->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reactivos', 'action' => 'view', $reactivo->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reactivos', 'action' => 'edit', $reactivo->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Reactivos', 'action' => 'delete', $reactivo->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $reactivo->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>