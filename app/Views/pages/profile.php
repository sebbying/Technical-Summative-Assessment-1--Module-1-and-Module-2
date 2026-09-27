<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h1>Profile</h1><div class="card">
<?php if ($user === null): ?><p>No demo user found. Import the sample database.</p>
<?php else: ?><p><strong>Name:</strong> <?= esc($user['full_name']) ?></p><p><strong>Username:</strong> <?= esc($user['username']) ?></p><p><strong>Email:</strong> <?= esc($user['email']) ?></p><p><strong>Member since:</strong> <?= esc($user['created_at']) ?></p><?php endif ?>
</div><?= $this->endSection() ?>
