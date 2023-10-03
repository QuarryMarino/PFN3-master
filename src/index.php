


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
    <link href="/dist/output.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-[#fff5d2] grid place-content-center">
    <img src="./assets/logo.jpg" alt="logo" class="w-72 h-72  block mx-auto" />
    <form class="bg-[#ffffff] shadow-md p-[20px]" action="./src/controller/login_db.php" method="post">
        <h1 class="text-[#8A8A8C] text-center text-lg">Bienvenido ingresa con tu cuenta</h1>
        <label for="email" class=" w-[300px] border border-[#8A8A8C] flex items-center p-[5px] rounded mt-[20px]">
            <input type="email" name="email" id="email" placeholder="Email" class="w-full outline-none" />
            <span class="material-symbols-outlined text-[#8A8A8C]">mail</span>
        </label>
        <label for="password" class="w-[300px] border border-[#8A8A8C] flex items-center p-[5px] rounded mt-[10px]">
            <input type="password" name=password id="password" placeholder="Password" class="w-full outline-none" />
            <span class="material-symbols-outlined text-[#8A8A8C]">lock</span>
        </label>
        <button class="bg-[#007BFF] px-[15px] py-[7px] text-[#ffffff] rounded ml-auto mt-[10px] block">Ingresar</button>
    </form>

    <div class=" grid place-content-center bg-[#ffffff] shadow-md p-[20px] justify-items-center w-72 ">
     
    </div>
</body>

</html>