<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Welcome</h1>
<p>Tasks scheduled for today, <?= esc($today) ?>.</p>
<div class="card"><h2>Today's tasks (<?= count($tasks) ?>)</h2>
<?php if ($tasks === []): ?><p>No tasks scheduled for today. Import the sample database if this is your first visit.</p>
<?php else: ?><div class="scroll"><table><thead><tr><th>Task</th><th>Status</th></tr></thead><tbody>
<?php foreach ($tasks as $task): ?><tr><td><?= esc($task['title']) ?></td><td><span class="badge"><?= esc(ucfirst($task['status'])) ?></span></td></tr><?php endforeach ?>
</tbody></table></div><?php endif ?></div>
<?= $this->endSection() ?>
