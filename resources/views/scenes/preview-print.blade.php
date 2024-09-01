@php use App\Models\Setting; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f8f8;
            flex-direction: column;
        }

        .container {
            background-color: white;
            width: 100vw;
            height: 100vh;
            padding: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        @media print {
            .container {
                width: 100vw;
                height: 100vh;
                margin: 0;
                padding: 0;
                border: none;
            }
        }

        .image-container {
            text-align: center;
            margin: auto;
            height: 100%; /* Adjust the height */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rotate-image {
            transform: rotate(90deg);
            width: auto;
            height: 100%;
        }

        .full-page-image {
            object-fit: contain;
        }

        .logo h1 {
            text-align: center;
            font-size: 26px;
            letter-spacing: 3px;
            margin: 0;
            font-weight: bold;
        }

        .content {
            margin-top: 30px;
            text-align: center;
        }

        .content h2 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        table {
            width: auto;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 8px 20px;
            font-size: 14px;
            text-align: center;
        }

        .total {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            padding-top: 20px;
            border-top: 1px solid #000;
        }

        .footer {
            text-align: center;
            margin-top: 740px;
            font-size: 12px;
        }

        .footer a {
            text-decoration: none;
            color: black;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<!-- First Page with Image -->
<div class="container">
    <div class="image-container" style="page-break-after: always;">
        <img src="{{ public_path($print_img) }}" alt="Image" class="full-page-image rotate-image">
    </div>

    <div class="logo content-center">
        <h1>{{ $setting->company_name }}</h1>
    </div>
    <div class="content">
        <h2>Product list:</h2>
        <table>
            @forelse($products as $key => $product)
                <tr>
                    <td class="number">{{ ++$key }}.</td>
                    <td class="item">{{ $product->name }}</td>
                    <td class="price">{{ $setting->currency_symbol.$product->price }}</td>
                </tr>
            @empty
                <tr>
                    <td class="item">No products were selected</td>
                </tr>
            @endforelse
        </table>
    </div>
    <div class="footer">
        <p>{{ $setting->company_phone }}</p>
        <p><a href="/">{{ $setting->company_url }}</a></p>
    </div>
</div>
</body>
</html>
