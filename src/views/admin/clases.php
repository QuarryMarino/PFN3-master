<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Dashboard</title>
    <link href="../../../dist/output.css" rel="stylesheet">
    <script src="./admin.js" defer> </script>
</head>

<body class="flex max-h-[100vh]">
    <header class="bg-[#353A40] min-w-[260px] max-w-[260px] h-[100vh] row-span-3">
        <a href="./index.php" class="flex items-center gap-2.5 border-b px-[15px] py-[15px] border-[#9FA9A0]">
            <img src="../../assets/logo.jpg" alt="logo" class="w-[50px] h-[50px] rounded-full object-cover" />
            <h2 class="text-[#9FA9A0] text-[20px]">Universidad</h2>
        </a>
        <div class=" border-b px-[15px] py-[15px] border-[#9FA9A0]">
            <h3 class="text-[#9FA9A0] text-[18px]">admin</h3>
            <h4 class="text-[#9FA9A0] text-[15px]">administrador</h4>
        </div>
        <nav class="px-[15px]">
            <h2 class="text-[#9FA9A0] text-[15px] text-center py-[10px] font-semibold">MENU ADMINISTRACIÔN</h2>
            <a href="./permisos.php" class=" text-[#9FA9A0] flex items-center gap-2.5 py-[7px]"><span class="material-symbols-outlined">manage_accounts</span>Permisos</a>
            <a href="./maestros.php" class=" text-[#9FA9A0] flex items-center gap-2.5 py-[7px]"><span class="material-symbols-outlined">interactive_space</span>Maestros</a>
            <a href="./alumnos.php" class=" text-[#9FA9A0] flex items-center gap-2.5 py-[7px]"><span class="material-symbols-outlined">school</span>Alumnos</a>
            <a href="./clases.php" class=" text-[#9FA9A0] flex items-center gap-2.5 py-[7px]"><span class="material-symbols-outlined">overview_key</span>clases</a>
        </nav>
    </header>
    <div class="w-[100%] h-[100vh]">
        <div class="flex justify-between w-[100%] h-[55px] px-[20px] border-b border-[#858388]">
            <div class="flex text-[#858388] items-center gap-7	">
                <span class="material-symbols-outlined">menu</span>
                <h3>Home</h3>
            </div>
            <div class="flex text-[#858388] gap-2.5 items-center cursor-pointer" id="settings">
                <h3>administrador</h3>
                <span class="material-symbols-outlined">expand_more</span>
            </div>
            <div id="settingsbar" class="hidden bg-[#ffffff] shadow-xl border border-[#EEEFF3] py-[10px] z-10 absolute right-[23px] top-[52px]">
                <a href="./perfil.php" class="flex items-center gap-2.5 border-b border-[#EEEFF3] py-[5px] px-[10px]"><span class="material-symbols-outlined">account_circle</span>Perfil</a>
                <a href="../../logout.php" class="flex items-center gap-2.5 text-[red] py-[5px] px-[10px]"><span class="material-symbols-outlined">logout</span>Logout</a>
            </div>
        </div>
        <main class="bg-[#F5F6FA] h-[84%] w-[100%] px-[20px] py-[10px]">
            <section>
                <div class="flex justify-between items-center mb-[20px]">
                    <h1 class="text-[#2A2A28] text-[20px]">Lista de Clases</h1>
                    <h3><span class="text-[#6396D5]">Home</span> / Clases</h3>
                </div>
                <div class="bg-[#ffffff] w-[100%] min-h-[450px] rounded">
                    <div class="flex justify-between items-center border-b border-[#E5E5E5] px-[20px] py-[10px]">
                        <h2 class="text-[18px]">informaión de clases</h2>
                        <button id="btnNewUser" class="bg-[#0079FF] py-[5px] px-[20px] text-[white] rounded">Agregar clase</button>
                    </div>
                    <div class="pt-[10px] flex justify-end gap-[20px] px-[20px]">
                        <span class="block">Search:</span>
                        <input type="text" id="search" class="border border-[#E5E5E5] outline-0 rounded">
                    </div>
                    <table class="bg-[#ffffff] max-h-[350px] overflow-auto w-[95%] text-center mx-[auto] mt-[10px] mb-[10px]">
                        <thead class="border border-[#E5E5E5]">
                            <tr>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">#</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">Class</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">Maestros</th>
                                <th class="text-[#2A3137] border-r border-[#E5E5E5]">Alumnos</th>
                                <th class="text-[#2A3137]">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once("../../connection/connection.php");


                            $query = "SELECT clases.*, users.name AS teacher_name, users.apellido AS teacher_apellido FROM clases LEFT JOIN users ON clases.id_teacher = users.id";
                             
                            $result = mysqli_query($mysqli, $query);
                            if ($result) {
                                
                            
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data = json_decode($row["students_list"]);
                                    $arrayLength = count($data);
                                    echo '<tr>';
                                    echo '<td>' . $row['id'] . '</td>';
                                    echo '<td>' . $row['name_clases'] . '</td>';
                                    echo '<td>' . $row['id_teacher'] . '</td>';
                                    echo '<td>' . $arrayLength . '</td>';
                                    echo '</tr>';
                                }
                            
                                echo '</table>';
                            } else {
                                echo 'No se encontraron resultados.';
                            }
                            
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
    <div class="hidden" id="newuser">
        <div class="bg-[rgba(0,0,0,0.4)] absolute top-0 left-0 z-10 w-[100vw] h-[100vh] exit"></div>
        <form class="grid gap-[2px] absolute z-20 bg-[white] top-[50%] left-[50%] w-[400px] translate-y-[-50%] p-[20px] translate-x-[-50%]" action="../../controller/create_class.php" method="post">
            <div class="flex items-center justify-between mb-[20px]">
                <h2 class="text-[30px]">Agregar clase</h2>
                <span class="material-symbols-outlined cursor-pointer exit">
                    close
                </span>
            </div>

            <label for="name">Nombre de la Material</label>
            <input class="border border-[#858388] rounded outline-0" type="text" name="name" id="name">
            <label for="teacher">Maestros disponible para la clase:</label>
            <select class="border border-[#858388] rounded outline-0" name="teacher" id="teacher">
                <?php
                require_once("../../connection/connection.php");

                $stmt = $mysqli->prepare("SELECT id, name, apellido FROM users WHERE roll = 'teacher'");
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    $teachers = $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($teachers as $teacher) {
                        $fullName = $teacher["name"] . ' ' . $teacher["apellido"];
                        echo '<option value="' . $teacher["id"] . '">' . $fullName . '</option>';
                    }
                } else {
                    echo "Database error: " . $mysqli->error;
                }
                ?>
            </select>
            <div class="flex justify-end gap-[5px] mt-[10px]">
                <span class="bg-[#858388] px-[10px] py-[5px] rounded text-[white] cursor-pointer exit">close</span>
                <button class="bg-[#0079FF] px-[10px] py-[5px] rounded text-[white]">crear</button>
            </div>
        </form>
    </div>
</body>

</html>