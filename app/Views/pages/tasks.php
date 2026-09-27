<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Task List</h1><p>All tasks in the database, ordered by task date.</p>
<div class="card"><div class="scroll"><table><thead><tr><th>Date</th><th>Task</th><th>Status</th></tr></thead><tbody>
<?php foreach ($tasks as $task): ?><tr><td><?= esc($task['task_date']) ?></td><td><?= esc($task['title']) ?></td><td><?= esc(ucfirst($task['status'])) ?></td></tr><?php endforeach ?>
</tbody></table></div><?php if ($tasks === []): ?><p>No tasks found.</p><?php endif ?></div>
<?= $this->endSection() ?>
