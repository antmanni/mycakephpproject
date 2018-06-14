<?php

/*
 * @var \App\View\AppView $this
 * @var \App\Model\Entitiy\Movie $movie
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="movies form large-9 medium-8 columns content">
    <?= $this->Form->create($movie) ?>
    <fieldset>
        <legend><?= __('Add Movie') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('year');
            echo $this->Form->control('director_id');
            echo 'rating';
            echo $this->Form->select('rating', [
            	1 => 1, 
            	2 => 2, 
            	3 => 3, 
            	4 => 4, 
            	5 => 5
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
