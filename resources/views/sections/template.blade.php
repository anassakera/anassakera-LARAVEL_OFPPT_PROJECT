<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/ofppt.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ec3a2927e4.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid box">
        <ul class="nav">
            <li>
                <i>
                    <img src="img/logo.png" alt="Logo"/>
                </i>
            </li>
            <li class="active">
                <a href="{{route('dashboard')}}"  id="lien-1">
                    <i class="fa-solid fa-house"></i> 
                    <span class="nav-text">Dashboard</span>
                </a>  
            </li>
            
            <li>
                <a href="{{route('storage')}}" id="lien-2">
                    <i class="fa-solid fa-box-open"></i> 
                    <span class="nav-text">Storage</span>
                </a>
            </li>
            <li>
                <a href="{{route('fix_issues')}}" id="lien-3">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span class="nav-text">Fix issues</span>
                </a>
            </li>
            <li>
                <a href="{{route('comments')}}" id="lien-4">
                    <i class="fa-solid fa-comment"></i>
                    <span class="nav-text">Comments</span>
                </a>
            </li>
            <li>
                <a href="{{route('settings')}}" id="lien-5">
                    <i class="fa-solid fa-gear"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
        </ul>

        <div class="mainers">
            <div class="welcome">
                <h4>2024/2025</h4>
            </div>
            <div class="content">
                @include('sections.dashboard')
            @yield('content')
            </div>
        </div>   
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="module" src="js/ofppt.js">
    </script>
</body>
</html>
