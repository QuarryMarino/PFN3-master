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
            <h3 class="text-[#9FA9A0] text-[18px]">Maestro</h3>
            <h4 class="text-[#9FA9A0] text-[15px]">maestro maestro</h4>
        </div>
        <nav class="px-[15px]">
            <h2 class="text-[#9FA9A0] text-[15px] text-center py-[10px] font-semibold">MENU MAESTROS</h2>
            <a href="./alumnos.php" class=" text-[#9FA9A0] flex items-center gap-2.5 py-[7px]"><span class="material-symbols-outlined">school</span>Alumnos</a>
        </nav>
    </header>
    <div class="w-[100%] h-[100vh]">
        <div class="flex justify-between w-[100%] h-[55px] px-[20px] border-b border-[#858388]">
            <div class="flex text-[#858388] items-center gap-7	">
                <span class="material-symbols-outlined">menu</span>
                <h3>Home</h3>
            </div>
            <div class="flex text-[#858388] gap-2.5 items-center cursor-pointer" id="settings">
                <h3>maestro maestro</h3>
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
                    <h1 class="text-[#2A2A28] text-[20px]">Lista de Alumnos</h1>
                    <h3><span class="text-[#6396D5]">Home</span> / alumnos</h3>
                </div>
                <div class="bg-[#ffffff] w-[100%] min-h-[450px] rounded">
                    <div class="flex justify-between items-center border-b border-[#E5E5E5] px-[20px] py-[10px]">
                        <h2 class="text-[18px]">informaión de Alumnos</h2>
                    </div>
                    <div class="pt-[10px] flex justify-end gap-[20px] px-[20px]">
                        <span class="block">Search:</span>
                        <input type="text" id="search" class="border border-[#E5E5E5] outline-0 rounded">
                    </div>
                    <table class="bg-[#ffffff] max-h-[350px] overflow-auto w-[95%] text-center mx-[auto] mt-[10px] mb-[10px]">
                        <thead class="border border-[#E5E5E5]">
                            <tr>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">#</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">DNI</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">Nombre</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">correo</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">Direccion</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">fec.de Nacimiento</th>
                                <th class="text-[#2A3137]">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("../../model/connection.php");


                            $teacher_id =  $_SESSION["user_data"]["id"];
                            $query = "SELECT u.id, u.first_name, u.last_name, u.email, u.birthdate, u.role, u.address, u.active, u.dni
                            FROM users AS u
                            WHERE u.id IN (SELECT students FROM classes WHERE teacher_id = $teacher_id)";

                            $result = mysqli_query($mysqli, $query);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "Student ID: " . $row['id'] . "<br>";
                                    echo "First Name: " . $row['first_name'] . "<br>";
                                    echo "Last Name: " . $row['last_name'] . "<br>";
                                    echo "Email: " . $row['email'] . "<br>";
                                    echo "Birthdate: " . $row['birthdate'] . "<br>";
                                    echo "Role: " . $row['role'] . "<br>";
                                    echo "Address: " . $row['address'] . "<br>";
                                    echo "Active: " . $row['active'] . "<br>";
                                    echo "DNI: " . $row['dni'] . "<br>";
                                    echo "<br>";
                                }
                            } else {
                                echo "Error: " . mysqli_error($mysqli);
                            }

                            mysqli_close($mysqli);
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </main>
        <footer class="border-t border-[#858388] px-[20px] py-[10px]">
            <p>Copyright (c) 2014 - 2021 <span class="text-[#6396D5]">AdminLTE.io.All</span> rights reserved.</p>
        </footer>
    </div>
</body>

</html>