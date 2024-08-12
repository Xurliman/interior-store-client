<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
</head>
<body>
<!-- First Page with Image -->
<div class="container">
    <div class="image-container">
        <img src="{{ \Illuminate\Support\Facades\Storage::url($print_img) }}" alt="Image" class="full-page-image rotate-image">
    </div>
</div>

<!-- Page break -->
<div class="container" style="page-break-before: always;">
    <div class="logo">
        <h1>FANTOM</h1>
    </div>
    <div class="content">
        <h2>Product list:</h2>
        <table>
            @foreach($products as $key => $product)
                <tr>
                    <td class="number">{{ $key++ }}</td>
                    <td class="item">{{ $product->name }}</td>
                    <td class="price">{{ "$".$product->price }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="footer">
        <p>+47 94 163 884</p>
        <p><a href="http://fantomstudio.uz/configurator">fantomstudio.uz/configurator</a></p>
    </div>
</div>
</body>
</html>
