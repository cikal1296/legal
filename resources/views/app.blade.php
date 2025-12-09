    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi React + Laravel</title>
</head>
<body>
    <div id="react-root"></div>

    @viteReactRefresh
    @vite([
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/js/main.jsx"
    ])
</body>
</html>
