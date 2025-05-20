<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Menu</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f8f1e5;
            color: #3e3e3e;
            margin: 0;
            padding: 40px;
        }

        h1 {
            text-align: center;
            font-size: 48px;
            margin-bottom: 40px;
            color: #5e3c27;
        }

        .menu-section {
            background: #fff7ef;
            margin-bottom: 40px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .menu-section h2 {
            font-size: 28px;
            border-bottom: 2px solid #e6cdb1;
            margin-bottom: 20px;
            padding-bottom: 5px;
            color: #aa4a24;
        }

        .menu-items {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .menu-item {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 8px;
            width: 280px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }

        .menu-item:hover {
            transform: scale(1.02);
        }

        .menu-item img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .menu-item-content {
            padding: 15px;
        }

        .menu-item-content h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }

        .menu-item-content p {
            font-size: 14px;
            color: #666;
            margin: 0;
        }
    </style>
</head>
<body>

    <h1>Our Daily Menu</h1>

    @foreach ($recipes as $mealType => $mealRecipes)
        @if(count($mealRecipes) > 0)
        <div class="menu-section">
            <h2>{{ ucfirst($mealType) }}</h2>
            <div class="menu-items">
                @foreach ($mealRecipes as $recipe)
                    <div class="menu-item">
                        <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}">
                        <div class="menu-item-content">
                            <h3>{{ $recipe['title'] }}</h3>
                            @if(!empty($recipe['summary']))
                                <p>{!! Str::limit(strip_tags($recipe['summary']), 100) !!}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    @endforeach

</body>
</html>
