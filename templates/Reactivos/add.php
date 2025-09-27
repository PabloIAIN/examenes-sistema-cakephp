<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reactivo $reactivo
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Reactivos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reactivos form content">
            <?= $this->Form->create($reactivo) ?>
            <fieldset>
                <legend><?= __('Add Reactivo') ?></legend>
                <?php
                    echo $this->Form->control('pregunta');
                    echo $this->Form->control('respuesta_a');
                    echo $this->Form->control('respuesta_b');
                    echo $this->Form->control('respuesta_c');
                    echo $this->Form->control('respuesta_correcta');
                    echo $this->Form->control('retroalimentacion');
                    echo $this->Form->control('dificultad');
                    echo $this->Form->control('area_especialidad');
                    echo $this->Form->control('subespecialidad');
                    echo $this->Form->control('user_id', ['options' => $users]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
