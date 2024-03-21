<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .container {
            display: grid;
        }

        .header{
            background-color: red;
            padding: 3%;
            text-align: center;
        }

        .isi {
            background-color: brown;
            padding: 40px;
            width: 20px;
        }

        .content {
            background-color: blue;
            padding: 3%;
            width: 20px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header">header</div>
        <div class="isi">
            <ul>
                @foreach ($kategoris as $k)
                <li>{{ $k->name }}
                    <ul>
                        @foreach ($k->menu as $menu)
                            <li data-price="{{ $menu->price }}" data-id="{{ $menu->id }}"><{{ $menu->menu_name }}/li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="content">content</div>
    </div>
</body>
</html>
