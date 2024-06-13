<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-light-green.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{ env('APP_NAME') }}</title>
    {{-- @vite --}}
</head>
<body>
    <header>
        <nav>
           
            <div class="w3-top">
                <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            
                    <a href="{{ route('posts.index') }}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white  " ><i class="fa fa-book"></i>  Blogs</a>
                    <a href="{{ route('profiles') }}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white " title="Groups"><i class="fa fa-group "></i>  Authors</a>
                    
                    
                    @guest
                        <a href="{{route ('login')}}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white  w3-right" > Log in</a>
                        <a href="{{route ('register')}}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white  w3-right" > Register</a>
                    @endguest
                    
                    @auth
                    <a href="{{ route ("profile", ) }}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white "><i class="fa fa-home "></i> MyBlog</a>
                    <a href="{{ route('messages.indexIn') }}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white " title="Messages"><i class="fa fa-envelope"></i>  Messages</a>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white  w3-right" > Logout</button>

                    </form>

                    @endauth
            
    
                </div>
               
            </div>

        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>
    
</body>
</html>