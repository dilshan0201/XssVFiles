<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - XSS Demo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #ADD8E6;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        main {
            padding: 2rem;
            text-align: center;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #ADD8E6;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Search Results</h1>
    </header>
    <nav>
        <a href="index.html">Welcome</a>
        <a href="find.html">Find</a>
    </nav>

    <main>
        <?php
            if (isset($_GET['search'])) {
                $searchQuery = $_GET['search'];
                echo "<div>You searched for: " . htmlspecialchars($searchQuery) . "</div>";

                // Check for the XSS script
                if (strpos($searchQuery, '<script>alert(') !== false) {
                    echo "<script>alert('Congrats! You found the XSS vulnerability! Here is your Key: KEY{Xss_VULNERABILITY}');</script>";
                }
            } else {
                echo "<div>No search query provided.</div>";
            }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 || For educational purposes only.</p>
    </footer>
</body>
</html>
