
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/icon.ico" type="image/x-icon"/>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title> A datacenter with the highest guarantess| Datacenter United</title>
    </head>

    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-60" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold">
                        Welcome {{auth()->user()->name}}
                    </span>

                </li>
                <li>
                    <a href="/admin/users" class="hover:text-laravel"
                        ><i class="fa-sharp fa-solid fa-users"></i> Users
                        </a
                    >
                </li> 
                <li>
                    <a href="/admin/products" class="hover:text-laravel"
                        ><i class="fa-solid fa-store"></i> Products
                        </a
                    >
                </li>
                <li>
                <form class="inline" method="POST" action="/logout">
                  @csrf 
                  <button type="submit">
                <i class="fa-solid fa-door-closed"></i> Logout</button> 
                </form>
                </li>
                @else
               
                <li>
                    <a class="hover:text-laravel" href="{{ route('admin.products') }}">Products</a>
                    >
                </li>
                @endauth
            </ul>
        </nav>
    <main>
        
    @yield('content')
    
    </main>
    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>

   
        
      
    >
</footer>
<x-flash-message/>

</body>
</html>
