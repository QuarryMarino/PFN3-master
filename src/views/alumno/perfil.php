<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Dashboard</title>
    <link href="../../../dist/output.css" rel="stylesheet">
    <script src="./script.js" defer> </script>
</head>

<body class="flex max-h-[100vh]">
    <header class="bg-[#353A40] min-w-[260px] max-w-[260px] h-[100vh] row-span-3">
        <div class="flex items-center gap-2.5 border-b px-[15px] py-[15px] border-[#9FA9A0]">
            <img src="../../assets/logo.jpg" alt="logo" class="w-[50px] h-[50px] rounded-full object-cover" />
            <h2 class="text-[#9FA9A0] text-[20px]">Universidad</h2>
        </div>
        <div class=" border-b px-[15px] py-[15px] border-[#9FA9A0]">
            <h3 class="text-[#9FA9A0] text-[18px]">Alumno</h3>
            <h4 class="text-[#9FA9A0] text-[15px]">Saunderson Brecons</h4>
        </div>
        <nav class="px-[15px]">
            <h2 class="text-[#9FA9A0] text-[15px] text-center py-[10px] font-semibold">MENU ALUMNOS</h2>
            <a href="#" class=" text-[#9FA9A0] flex items-center gap-2.5 py-[7px]"><span class="material-symbols-outlined">assignment_turned_in</span>Ver Calificaciones</a>
            <a href="./clases.php" class=" text-[#9FA9A0] flex items-center gap-2.5 py-[7px]"><span class="material-symbols-outlined">book</span>Administra tus Clases</a>
        </nav>
    </header>
    <div class="w-[100%] h-[100vh]">
        <div class="flex justify-between w-[100%] h-[55px] px-[20px] border-b border-[#858388]">
            <div class="flex text-[#858388] items-center gap-7	">
                <span class="material-symbols-outlined">menu</span>
                <h3>Home</h3>
            </div>
            <div class="flex text-[#858388] gap-2.5 items-center cursor-pointer" id="settings">
                <h3>Saunderson Brecons</h3>
                <span class="material-symbols-outlined">expand_more</span>
            </div>
            <div id="settingsbar" class="hidden bg-[#ffffff] shadow-xl border border-[#EEEFF3] py-[10px] z-10 absolute right-[23px] top-[52px]">
                <a href="./perfil.php" class="flex items-center gap-2.5 border-b border-[#EEEFF3] py-[5px] px-[10px]"><span class="material-symbols-outlined">account_circle</span>Perfil</a>
                <a href="../../../logout.php" class="flex items-center gap-2.5 text-[red] py-[5px] px-[10px]"><span class="material-symbols-outlined">logout</span>Logout</a>
            </div>
        </div>
        <main class="bg-[#F5F6FA] h-[84%] w-[100%] px-[20px] py-[10px]">
            <section>
                <div class="flex justify-between items-center mb-[20px]">
                    <h1 class="text-[#2A2A28] text-[20px]">Editar datos de perfil</h1>
                    <h3><span class="text-[#6396D5]">Home</span> / Perfil</h3>
                </div>
                <div class="bg-[#ffffff] w-[100%] min-h-[450px] rounded">
                    <div class="flex justify-between items-center border-b border-[#E5E5E5] px-[20px] py-[10px]">
                        <h2 class="text-[18px]">informacón de Usuario</h2>
                    </div>
                    <form class="grid px-[20px]" action="../../controller/update_user.php" method="post">
                        <label for="email">correo Electronico</label>
                        <input class="border border-[#858388] rounded" type="text" name="email" id="email" value="<?php echo isset($_SESSION["user_data"]["email"]) ? $_SESSION["user_data"]["email"] : ''; ?>">

                        <label for="password">Password</label>
                        <input class="border border-[#858388] rounded" type="password" name="password" id="password" />

                        <label for="nombre">nombre(s)</label>
                        <input class="border border-[#858388] rounded" type="text" name="firstName" id="nombre" value="<?php echo isset($_SESSION["user_data"]["first_name"]) ? $_SESSION["user_data"]["first_name"] : ''; ?>">

                        <label for="apelido">Apelido(s)</label>
                        <input class="border border-[#858388] rounded" type="text" name="lastName" id="apelido" value="<?php echo isset($_SESSION["user_data"]["last_name"]) ? $_SESSION["user_data"]["last_name"] : ''; ?>">

                        <label for="dirección">Dirección</label>
                        <input class="border border-[#858388] rounded" type="text" name="address" id="dirección" value="<?php echo isset($_SESSION["user_data"]["address"]) ? $_SESSION["user_data"]["address"] : ''; ?>">
                        <label for="data">Feach de nacimiento</label>
                        <input class="border border-[#858388] rounded" type="date" name="birthdate" id="data" value="<?php echo isset($_SESSION["user_data"]["birthdate"]) ? $_SESSION["user_data"]["birthdate"] : ''; ?>">
                        <input class="hidden" type="radio" name="role" value="teacher" checked />
                        <input class="hidden" type="radio" name="userId" value="<?php echo isset($_SESSION["user_data"]["id"]) ? $_SESSION["user_data"]["id"] : ''; ?>" checked />
                        <button class="bg-[#0079FF] px-[10px] py-[5px] mt-[10px] w-[200px] rounded text-[white]">Guardar cambios</button>
                    </form>


                </div>
            </section>
        </main>
        <footer class="border-t border-[#858388] px-[20px] py-[10px]">
            <p>Copyright (c) 2014 - 2021 <span class="text-[#6396D5]">AdminLTE.io.All</span> rights reserved.</p>
        </footer>
    </div>
</body>

</html>