<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Director $director
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Directors'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="directors form large-9 medium-8 columns content">
    <?= $this->Form->create($director) ?>
    <fieldset>
        <legend><?= __('Add Director') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('birthdate', [
                'label' => 'Birth Date',
                'minYear' => 1800,
                'maxYear' => date('Y'),
                'monthNames' => false
        ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
