<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
   <title>Todos</title>
</head>

<body>
   <div class="text-center p-10">
      <h1 class="text-2xl">What next you need to do</h1>
      <x-Alert></x-Alert>
      <form action="/todos/create" method="POST" class="py-5">
         @csrf
         <input type="text" name="title" class="py-2 px-2 border rounded-lg">
         <input type="submit" value="create" class="p-2 border rounded-lg">
      </form>
   </div>
</body>

</html>