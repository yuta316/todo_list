<!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
 
     <title>タスク管理</title>
 
     <!-- Styles -->
     <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
 </head>
 <body>
 <div id="app">
    <header-component></header-component>
    <el-main class="main">
        <router-view></router-view>
    </el-main>
    <footer-component></footer-component>
 </div>
 <!-- Scripts -->
 <script src="{{ mix('/js/app.js') }}" defer></script>

 <style>
     .main {
         padding: 180px 3%;
     }
 </style>
 </body>
</html>