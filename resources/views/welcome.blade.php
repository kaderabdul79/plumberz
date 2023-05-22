<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plumberz</title>
    <style>
        .v-snackbar__wrapper{
            top: 60px;
            right: 0px; 
            transform: translateX(0%)
        }
        .v-snackbar--active{
            position: absolute;
            top: 60px;
            height: 50px;
            transform: translateX(500px)
        }
    </style>
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'])
</head>
<body class="antialiased">
    <div id="app">
        
    </div>
</body>
</html>