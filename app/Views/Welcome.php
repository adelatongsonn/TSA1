<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background: #faf8f5;
            color: #33271f;
            font-family: "Trebuchet MS", Arial, sans-serif;
            line-height: 1.6;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            padding: 28px 18px;
            background: #5a3b26;
            color: white;
        }

        .brand {
            margin-bottom: 38px;
            font-size: 20px;
            font-weight: bold;
        }

        .brand small {
            display: block;
            margin-top: 5px;
            color: #e4d5c8;
            font-size: 12px;
            font-weight: normal;
        }

        .nav-label {
            margin: 0 12px 10px;
            color: #d2bba9;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .side-nav a {
            display: block;
            margin: 5px 0;
            padding: 12px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
        }

        .side-nav a:hover,
        .side-nav a.active {
            background: #73543e;
        }

        .side-nav a.active {
            font-weight: bold;
        }

        .main-content {
            max-width: 1100px;
            margin-left: 250px;
            padding: 42px;
        }

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            color: #5a3b26;
        }

        .page-heading p {
            margin: 0;
            color: #7b6b5e;
        }

        .card {
            padding: 28px;
            border: 1px solid #eadfd5;
            border-radius: 14px;
            background: white;
            box-shadow: 0 8px 24px #33271f12;
        }

        .card h2 {
            margin-top: 0;
            color: #5a3b26;
        }

        .task-list {
            margin: 16px 0 0;
            padding: 0;
            list-style: none;
        }

        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin: 10px 0;
            padding: 14px;
            border-radius: 8px;
            background: #f8f5f1;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-not-started {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-in-progress {
            background: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background: #dcfce7;
            color: #166534;
        }

        .empty {
            margin: 16px 0 0;
            padding: 16px;
            border-radius: 8px;
            background: #f8f5f1;
            color: #7b6b5e;
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 20px;
            }

            .brand {
                margin-bottom: 18px;
            }

            .side-nav {
                display: flex;
                flex-wrap: wrap;
                gap: 4px;
            }

            .main-content {
                margin-left: 0;
                padding: 24px 16px;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="brand">
            StudyPlan
            <small>Task management system</small>
        </div>

        <p class="nav-label">MENU</p>

        <nav class="side-nav">
            <a href="/" class="active" aria-current="page">Welcome</a>
            <a href="/tasks">Task List</a>
            <a href="/profile">Profile</a>
            <a href="/about">About</a>
        </nav>
    </aside>

    <main class="main-content">
        <div class="page-heading">
            <h1>Welcome to Today's Task Management System</h1>
            <p>Use your time wisely!</p>
        </div>

        <section class="card">
            <h2>Tasks for Today</h2>

            <?php if (empty($tasks)): ?>
                <p class="empty">There are no tasks for you today.</p>
            <?php else: ?>
                <ul class="task-list">
                    <?php foreach ($tasks as $task): ?>
                        <?php
                            $status = strtolower(trim($task['status']));
                            $statusClass = 'status-not-started';

                            if (
                                $status === 'in progress'
                                || $status === 'in_progress'
                            ) {
                                $statusClass = 'status-in-progress';
                            } elseif (
                                $status === 'completed'
                                || $status === 'done'
                            ) {
                                $statusClass = 'status-completed';
                            }
                        ?>

                        <li class="task-item">
                            <span><?= esc($task['title']) ?></span>

                            <span class="badge <?= $statusClass ?>">
                                <?= esc($task['status']) ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>