<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap');

        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --danger: #dc2626;
            --background: #f9fafb;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --border: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Roboto Slab", sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--text-primary);
            padding: 30px 120px;
            line-height: 1.5;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            font-size: 1rem;
            color: var(--text-primary);
            background: var(--background);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .btn-save {
            background-color: var(--primary);
            color: white;
        }

        .btn-save:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-cancel {
            background-color: var(--danger);
            color: white;
        }

        .btn-cancel:hover {
            background-color: #b91c1c;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Edit Section</h1>
        </div>

        <form action="<?php echo $redirection ?>" method="POST">
            <div class="form-group">
                <input type="hidden" id="id" name="id" value="<?php echo $Object->getId() ?>" required>
            </div>

            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" id="name" name="name" placeholder="Enter the name" value="<?php echo $Object->getName() ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter the description" required><?php echo $Object->getDescription() ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">Save</button>
                <button type="button" class="btn btn-cancel" onclick="window.history.back();">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>
