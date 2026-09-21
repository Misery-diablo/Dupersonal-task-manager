<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #fdf2f8);
            min-height: 100vh;
            color: #1f2937;
        }

        .header {
            background: linear-gradient(135deg, #4f46e5, #9333ea);
            color: white;
            padding: 25px 8%;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 45px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(79, 70, 229, 0.15);
        }

        .card h2 {
            margin-top: 0;
            color: #4f46e5;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #374151;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        select {
            background: white;
            cursor: pointer;
        }

        .status-help {
            font-size: 13px;
            color: #6b7280;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .update-button {
            flex: 1;
            border: none;
            background: linear-gradient(135deg, #4f46e5, #9333ea);
            color: white;
            padding: 14px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        .update-button:hover {
            opacity: 0.9;
        }

        .back-button {
            flex: 1;
            text-align: center;
            text-decoration: none;
            background: #f3f4f6;
            color: #374151;
            padding: 14px;
            border-radius: 10px;
            font-weight: bold;
        }

        .back-button:hover {
            background: #e5e7eb;
        }

        .status-box {
            background: #f5f3ff;
            padding: 15px;
            border-radius: 10px;
            border-left: 5px solid #8b5cf6;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>✏️ Edit Task</h1>
    </div>

    <div class="container">

        <div class="card">

            <h2>Update Your Task</h2>

            <p class="subtitle">
                Make changes to your task information below.
            </p>

            <form action="/tasks/{{ $task->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Task Name</label>

                    <input
                        type="text"
                        name="task_name"
                        value="{{ $task->task_name }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Description</label>

                    <textarea name="description">{{ $task->description }}</textarea>
                </div>

                <div class="form-group status-box">

                    <label>Status</label>

                    <select name="status">

                        <option value="Pending"
                            {{ $task->status == 'Pending' ? 'selected' : '' }}>
                            🟡 Pending
                        </option>

                        <option value="Completed"
                            {{ $task->status == 'Completed' ? 'selected' : '' }}>
                            🟢 Completed
                        </option>

                    </select>

                    <div class="status-help">
                        Choose whether your task is still pending or completed.
                    </div>

                </div>

                <div class="form-group">

                    <label>Due Date</label>

                    <input
                        type="date"
                        name="due_date"
                        value="{{ $task->due_date }}"
                    >

                </div>

                <div class="buttons">

                    <a href="/tasks" class="back-button">
                        ← Back
                    </a>

                    <button type="submit" class="update-button">
                        ✓ Update Task
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>