<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Thêm FontAwesome -->
    <?= $this->section("page_specific_css") ?>
    <style>
        .home-button {
            display: inline-flex;
            align-items: center;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-top: 30px;
        }

        .home-button:hover {
            background-color: #0056b3;
        }

        .home-button i {
            margin-right: 8px; 
        }
    </style>
</head>
<body>

    <div class="container">
    <?= $this->section("page") ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <?= $this->section("page_specific_js") ?>
</body>
</html>
