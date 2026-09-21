<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #fdf2f8, #ecfeff);
            min-height: 100vh;
            color: #1f2937;
        }

        .header {
            background: linear-gradient(135deg, #4f46e5, #7c3aed, #db2777);
            color: white;
            padding: 30px 8%;
            box-shadow: 0 5px 20px rgba(79, 70, 229, 0.25);
        }

        .header-content {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo h1 {
            margin: 0;
            font-size: 30px;
        }

        .logo p {
            margin: 6px 0 0;
            opacity: 0.85;
        }

        .add-button {
            background: white;
            color: #4f46e5;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.2s;
        }

        .add-button:hover {
            transform: translateY(-2px);
            background: #f5f3ff;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .welcome {
            background: white;
            padding: 25px;
            border-radius: 18px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .welcome h2 {
            margin: 0 0 8px;
            color: #4f46e5;
        }

        .welcome p {
            margin: 0;
            color: #6b7280;
        }

        .task-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 22px;
        }

        .task-card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #8b5cf6;
            transition: 0.2s;
        }

        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(79, 70, 229, 0.15);
        }

        .task-card h3 {
            margin: 0 0 12px;
            color: #312e81;
            font-size: 20px;
        }

        .description {
            color: #6b7280;
            min-height: 45px;
            line-height: 1.5;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .completed {
            background: #d1fae5;
            color: #065f46;
        }

        .due-date {
            background: #f3f4f6;
            padding: 10px;
            border-radius: 8px;
            color: #4b5563;
            font-size: 14px;
            margin: 18px 0;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .edit-button {
            flex: 1;
            text-align: center;
            background: #dbeafe;
            color: #1d4ed8;
            text-decoration: none;
            padding: 10px;
            border-radius: 9px;
            font-weight: bold;
        }

        .edit-button:hover {
            background: #bfdbfe;
        }

        .delete-button {
            background: #fee2e2;
            color: #b91c1c;
            border: none;
            padding: 10px 15px;
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
        }

        .delete-button:hover {
            background: #fecaca;
        }

        .empty {
            background: white;
            padding: 50px;
            text-align: center;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .empty-icon {
            font-size: 50px;
        }

        .empty h2 {
            color: #4f46e5;
        }

        .empty p {
            color: #6b7280;
        }

        @media (max-width: 600px) {
            .header-content {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .container {
                width: 92%;
            }
        }
    </style>
</head>

<body>

    <div class="header">

        <div class="header-content">

            <div class="logo">
                <h1>📋 Task Manager</h1>
                <p>Organize your tasks. Get things done.</p>
            </div>

            <a href="/tasks/create" class="add-button">
                ＋ Add Task
            </a>

        </div>

    </div>

    <div class="container">

        <div class="welcome">
            <h2>✨ My Tasks</h2>
            <p>Keep track of your work and stay organized.</p>
        </div>

        @if ($tasks->count() > 0)

            <div class="task-grid">

                @foreach ($tasks as $task)

                    <div class="task-card">

                        <h3>{{ $task->task_name }}</h3>

                        <p class="description">
                            {{ $task->description ?: 'No description provided.' }}
                        </p>

                        @if ($task->status == 'Completed')

                            <span class="status completed">
                                🟢 Completed
                            </span>

                        @else

                            <span class="status pending">
                                🟡 Pending
                            </span>

                        @endif

                        <div class="due-date">
                            📅 Due:
                            {{ $task->due_date ?: 'No due date' }}
                        </div>

                        <div class="actions">

                            <a
                                href="/tasks/{{ $task->id }}/edit"
                                class="edit-button"
                            >
                                ✏️ Edit
                            </a>

                            <form
                                action="/tasks/{{ $task->id }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this task?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                >
                                    🗑️ Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">📝</div>

                <h2>No Tasks Yet</h2>

                <p>
                    You don't have any tasks yet.
                    Click "Add Task" to get started!
                </p>

            </div>

        @endif

    </div>

</body>
</html>