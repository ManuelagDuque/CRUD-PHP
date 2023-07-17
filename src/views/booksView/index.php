<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Colection</title>
</head>
<body>
    <h1>listado de libros</h1>
    <a href="/bookStore/public/library/create">
        <button>Crear libro</button>
    </a>
    <ul>
        <?php foreach($results as $result): ?>
            <li>
                <?= $result["title"]?> esccrito por: 
                <?= $result["author"]?>
                <form action="/bookStore/public/library/ 
                    <?=$result["id"]?>"
                    method="post"
                >
                    <input type="hidden" name="method" value="delete">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach;?>
    </ul>
</body>
</html>
