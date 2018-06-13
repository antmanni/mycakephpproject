<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Director $director
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $director->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $director->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Directors'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="directors form large-9 medium-8 columns content">
    <?= $this->Form->create($director) ?>
    <fieldset>
        <legend><?= __('Edit Director') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('birthdate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
