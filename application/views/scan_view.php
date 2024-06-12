<!-- application/views/scan_view.php -->
<html>
<head>
    <title>Escanear Documento</title>
</head>
<body>
    <h1>Escanear Documento</h1>
    <form action="<?php echo site_url('scan'); ?>" method="post">
        <label for="pages">Número de páginas:</label>
        <input type="number" id="pages" name="pages" min="1" value="1">
        <button type="submit">Escanear</button>
    </form>
</body>
</html>
