<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear libro</h1>
    <form action="/bookStore/public/library" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>

        <label for="author">Author</label>
        <input type="text" name="author" id="author" required>

        <label for="book_type">Book Type</label>
        <input type="text" name="book_type" id="book_type" required>

        <label for="price">Price</label>
        <input type="text" name="price" id="price" required>

        <input type="hidden" name="method" value="post">
        <button tye="submit">Save</button>
    </form>
</body>
</html>