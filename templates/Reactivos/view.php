<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reactivo $reactivo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reactivo'), ['action' => 'edit', $reactivo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reactivo'), ['action' => 'delete', $reactivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reactivo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reactivos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reactivo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reactivos view content">
            <h3><?= h($reactivo->respuesta_a) ?></h3>
            <table>
                <tr>
                    <th><?= __('Respuesta A') ?></th>
                    <td><?= h($reactivo->respuesta_a) ?></td>
                </tr>
                <tr>
                    <th><?= __('Respuesta B') ?></th>
                    <td><?= h($reactivo->respuesta_b) ?></td>
                </tr>
                <tr>
                    <th><?= __('Respuesta C') ?></th>
                    <td><?= h($reactivo->respuesta_c) ?></td>
                </tr>
                <tr>
                    <th><?= __('Respuesta Correcta') ?></th>
                    <td><?= h($reactivo->respuesta_correcta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Area Especialidad') ?></th>
                    <td><?= h($reactivo->area_especialidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subespecialidad') ?></th>
                    <td><?= h($reactivo->subespecialidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reactivo->hasValue('user') ? $this->Html->link($reactivo->user->email, ['controller' => 'Users', 'action' => 'view', $reactivo->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reactivo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dificultad') ?></th>
                    <td><?= $this->Number->format($reactivo->dificultad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($reactivo->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($reactivo->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Pregunta') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($reactivo->pregunta)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Retroalimentacion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($reactivo->retroalimentacion)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>