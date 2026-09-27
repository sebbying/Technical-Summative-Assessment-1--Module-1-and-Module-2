<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Tasks for Today') ?></title>
    <style>
        :root{font-family:system-ui,Arial,sans-serif;color:#1e293b;background:#f5f7fb}*{box-sizing:border-box}body{margin:0}header{background:#17345d;color:white;padding:18px max(20px,calc((100vw - 960px)/2))}header strong{display:block;font-size:1.3rem}nav{display:flex;gap:18px;flex-wrap:wrap;margin-top:12px}nav a{color:white;text-decoration:none}nav a:hover{text-decoration:underline}main{max-width:960px;margin:32px auto;padding:0 20px}.card{background:white;border:1px solid #e1e7ef;border-radius:12px;padding:23px;margin:18px 0;box-shadow:0 3px 12px #1e293b0b}h1{margin-top:0}table{border-collapse:collapse;width:100%}th,td{text-align:left;padding:12px;border-bottom:1px solid #e3e9f0}th{background:#f0f4fa}.scroll{overflow:auto}.badge{border-radius:30px;background:#e8effb;padding:5px 10px;display:inline-block}footer{text-align:center;color:#64748b;padding:25px}
    </style>
</head>
<body>
<header><strong>Tasks for Today</strong><nav>
<a href="<?= site_url('/') ?>">Welcome</a><a href="<?= site_url('tasks') ?>">Task List</a><a href="<?= site_url('profile') ?>">Profile</a><a href="<?= site_url('about') ?>">About</a>
</nav></header>
<main><?= $this->renderSection('content') ?></main>
<footer>IT0049 Technical Summative Assessment 1</footer>
</body></html>
