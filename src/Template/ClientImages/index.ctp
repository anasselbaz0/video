<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientImage[]|\Cake\Collection\CollectionInterface $clientImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Client Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Client Folders'), ['controller' => 'ClientFolders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client Folder'), ['controller' => 'ClientFolders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientImages index large-9 medium-8 columns content">
    <h3><?= __('Client Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_folders_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientImages as $clientImage): ?>
            <tr>
                <td><?= $this->Number->format($clientImage->id) ?></td>
                <td><?= h($clientImage->path) ?></td>
                <td><?= $clientImage->has('client_folder') ? $this->Html->link($clientImage->client_folder->id, ['controller' => 'ClientFolders', 'action' => 'view', $clientImage->client_folder->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clientImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientImage->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
