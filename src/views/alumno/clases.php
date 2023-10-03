<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>clases</title>
    <link href="../../../dist/output.css" rel="stylesheet">
    <script src="./script.js" defer> </script>
</head>

<body class="flex max-h-[100vh]">
    <header class="bg-[#353A40] min-w-[260px] max-w-[260px] h-[100vh] row-span-3">
        <a href="./index.php" class="flex items-center gap-2.5 border-b px-[15px] py-[15px] border-[#9FA9A0]">
            <img src="../../assets/logo.jpg" alt="logo" class="w-[50px] h-[50px] rounded-full object-cover" />
            <h2 class="text-[#9FA9A0] text-[20px]">Universidad</h2>
        </a>
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
                <div class="flex justify-between items-center">
                    <h1 class="text-[#2A2A28] text-[20px]">Esquema de Clases</h1>
                    <h3><span class="text-[#6396D5]">Home</span> / classes</h3>
                </div>
            </section>
        </main>
        <footer class="border-t border-[#858388] px-[20px] py-[10px]">
            <p>Copyright (c) 2014 - 2021 <span class="text-[#6396D5]">AdminLTE.io.All</span> rights reserved.</p>
        </footer>
    </div>
</body>

</html>