<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Halaman Tambah Upload Image</h2>
    <form action="{{ route('images.update', $image) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="file" name="image">
        <p>
            <button type="submit">Upload</button>
        </p>
    </form>

</body>
</html>