<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Director $director
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Director'), ['action' => 'edit', $director->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Director'), ['action' => 'delete', $director->id], ['confirm' => __('Are you sure you want to delete # {0}?', $director->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Directors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Director'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="directors view large-9 medium-8 columns content">
    <h3><?= h($director->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($director->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($director->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthdate') ?></th>
            <td><?= h($director->birthdate) ?></td>
        </tr>
    </table>
</div>
