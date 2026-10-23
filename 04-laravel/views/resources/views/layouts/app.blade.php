<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                background: #f5f5f5;
            }

            header {
                background: #333;
                color: white;
                padding: 20px;
            }

            nav {
                background: #444;
                padding: 10px;
            }

            nav a {
                color: white;
                margin-right: 15px;
                text-decoration: none;
            }

            main {
                background: white;
                padding: 25px;
                margin: 30px;
                border-radius: 8px;
                border: 1px solid #ddd;
            }

            footer {
                background: #333;
                color: white;
                padding: 15px;
                text-align: center;
            }

            nav a{
                padding:8px 12px;
                text-decoration:none;
            }

            .active{
                background:#007bff;
                color:white;
                border-radius:5px;
            }

            label{
                display:block;
                margin-top: 10px;
            }

            form{
                width:50%;
                border: 1px solid #999;
                padding: 20px;
            }
            input[type="text"],input[type="number"],button{
                padding: 5px;
            }
            .error{
                color: red;
                font-weight: bold;
            }
            
        </style>
        @stack('styles')
    </head>
    <body>
        <header>
            <h1>Laravel Blade Layout Demo</h1>
        </header>
        <nav>
            <a href="{{ route('layout.home') }}" class="{{ request()->routeIs('layout.home') ? 'active' : '' }}">Početna</a>
            <a href="{{ route('layout.about') }}" class="{{ request()->routeIs('layout.about') ? 'active' : '' }}">O nama</a>
            <a href="{{ route('layout.car') }}" class="{{ request()->routeIs('layout.car') ? 'active' : '' }}">Automobil</a>
            <a href="{{ route('layout.book.create') }}" class="{{ request()->routeIs('layout.book.create') ? 'active' : '' }}">Nova knjiga</a>
            <a href="{{ route('layout.alerts') }}" class="{{ request()->routeIs('layout.alerts') ? 'active' : '' }}">Alert</a>
            <a href="{{ route('layout.cards') }}" class="{{ request()->routeIs('layout.cards') ? 'active' : '' }}">Card</a>
            <a href="{{ route('layout.tecajevi') }}" class="{{ request()->routeIs('layout.tecajevi') ? 'active' : '' }}">Tečajevi</a>
            <a href="{{ route('layout.stacks') }}" class="{{ request()->routeIs('layout.stacks') ? 'active' : '' }}">Stacks CSS</a>
            <a href="{{ route('layout.stacks.js') }}" class="{{ request()->routeIs('layout.stacks.js') ? 'active' : '' }}">Stacks JS</a>
            <a href="{{ route('layout.parent') }}" class="{{ request()->routeIs('layout.parent') ? 'active' : '' }}">Parent</a>
            <a href="{{ route('layout.products.table') }}" class="{{ request()->routeIs('layout.products.table') ? 'active' : '' }}">Products</a>
            <a href="{{ route('layout.vehicles.table') }}" class="{{ request()->routeIs('layout.vehicles.table') ? 'active' : '' }}">Vehicles</a>
            <a href="{{ route('layout.categories.table') }}" class="{{ request()->routeIs('layout.categories.table') ? 'active' : '' }}">Categories</a>
        </nav>

        @section('message')
        
        <p>
            Ovo je poruka iz glavnog layouta
        </p>

       

        @show
        <main>
            @yield('content')
        </main>
        <footer>
            Laravel tečaj - Blade Layout Primjeri
        </footer>
        @stack('scripts')
    </body>
</html>