<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

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
        }

        .header h1 {
            margin: 0;
            font-size: 30px;
        }

        .header p {
            margin: 6px 0 0;
            opacity: 0.85;
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
            box-shadow: 0 12px 35px rgba(79, 70, 229, 0.12);
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
        textarea {
            width: 100%;
            padding: 13px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .save-button {
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

        .save-button:hover {
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

        .required {
            color: #db2777;
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .card {
                padding: 25px;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="header">

        <div class="header-content">
            <h1>✨ Add New Task</h1>
            <p>Create a task and keep yourself organized.</p>
        </div>

    </div>

    <div class="container">

        <div class="card">

            <h2>Create Your Task</h2>

            <p class="subtitle">
                Enter the details below to add a new task.
            </p>

            <form action="/tasks" method="POST">

                @csrf

                <div class="form-group">

                    <label>
                        Task Name <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="task_name"
                        placeholder="e.g. Finish Laravel Project"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Description</label>

                    <textarea
                        name="description"
                        placeholder="Describe your task..."
                    ></textarea>

                </div>

                <div class="form-group">

                    <label>Due Date</label>

                    <input
                        type="date"
                        name="due_date"
                    >

                </div>

                <div class="buttons">

                    <a href="/tasks" class="back-button">
                        ← Back to Tasks
                    </a>

                    <button type="submit" class="save-button">
                        ✓ Save Task
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>