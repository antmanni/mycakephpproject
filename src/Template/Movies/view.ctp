<?php
/*
 * Create by: antmanni
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie $movie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movie'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movies view large-9 medium-8 columns content">
    <h3><?= h($movie->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($movie->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Database id') ?></th>
            <td><?= $this->Number->format($movie->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($movie->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Director') ?></th>
            <td><?= h($movie->director->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Your rating') ?></th>
            <td><?= h($movie->rating) ?></td>
        </tr>
    </table>
</div>