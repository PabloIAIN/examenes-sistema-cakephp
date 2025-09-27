<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reactivo> $reactivos
 */
?>
<div class="reactivos index content">
    <?= $this->Html->link(__('New Reactivo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reactivos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('respuesta_a') ?></th>
                    <th><?= $this->Paginator->sort('respuesta_b') ?></th>
                    <th><?= $this->Paginator->sort('respuesta_c') ?></th>
                    <th><?= $this->Paginator->sort('respuesta_correcta') ?></th>
                    <th><?= $this->Paginator->sort('dificultad') ?></th>
                    <th><?= $this->Paginator->sort('area_especialidad') ?></th>
                    <th><?= $this->Paginator->sort('subespecialidad') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reactivos as $reactivo): ?>
                <tr>
                    <td><?= $this->Number->format($reactivo->id) ?></td>
                    <td><?= h($reactivo->respuesta_a) ?></td>
                    <td><?= h($reactivo->respuesta_b) ?></td>
                    <td><?= h($reactivo->respuesta_c) ?></td>
                    <td><?= h($reactivo->respuesta_correcta) ?></td>
                    <td><?= $this->Number->format($reactivo->dificultad) ?></td>
                    <td><?= h($reactivo->area_especialidad) ?></td>
                    <td><?= h($reactivo->subespecialidad) ?></td>
                    <td><?= $reactivo->hasValue('user') ? $this->Html->link($reactivo->user->email, ['controller' => 'Users', 'action' => 'view', $reactivo->user->id]) : '' ?></td>
                    <td><?= h($reactivo->created) ?></td>
                    <td><?= h($reactivo->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reactivo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reactivo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $reactivo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $reactivo->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>