<?php
$data = mysqli_connect('localhost', 'root', '', 'elctro');  

$persone = "SELECT * FROM person";
$query = mysqli_query($data, $persone);


if (isset($_GET['admin'])) {
   

    $selctid = $_GET['admin'];
    $get = "SELECT * FROM person WHERE Id LIKE '%$selctid%'";
    $scondquery = mysqli_query($data, $get);
    while($selected = mysqli_fetch_assoc($scondquery)){
        $name = $selected['name'];  
        $password = $selected['passworde'];
        $id = $selected['Id'];
        $email = $selected['email'];
        mysqli_query($data, "INSERT INTO adime(passworde,email,name) VALUES ('$password', '$email','$name')");
        mysqli_query($data, "DELETE FROM person WHERE Id='$id';");
       

    }
    header('location: '.$_SERVER['PHP_SELF']);
}

if (isset($_GET['user'])) {
   

    $selctid = $_GET['user'];
    $get = "SELECT * FROM person WHERE Id LIKE '%$selctid%'";
    $scondquery = mysqli_query($data, $get);
    while($selected = mysqli_fetch_assoc($scondquery)){
        $name = $selected['name'];  
        $password = $selected['passworde'];
        $id = $selected['Id'];
        $email = $selected['email'];
        mysqli_query($data, "INSERT INTO utilisateur(passworde,email,name) VALUES ('$password', '$email','$name')");
        mysqli_query($data, "DELETE FROM person WHERE Id='$id';");
    

    }
    header('location: '.$_SERVER['PHP_SELF']);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <header class = "w-full h-[100px] flex  flex-row justify-between items-center  bg-slate-900 pl-[30px]">
    <p class = "text-slate-500 text-[50px] ">ElectroNacer</p>
    <div class = "w-1/4 h-[100px] flex  gap-[6px] flex-row justify-between items-center  pr-[30px]">
        <a class ="text-slate-500 text-[26px] " href="">create</a>
        <a class ="text-slate-500 text-[26px] " href="">product</a>
        <a class ="text-slate-500 text-[26px] " href="">log in</a>
        
    </div>

   </header>
   <section class = "min-h-[100vh] w-[100%] bg-slate-500 flex flex-col items-center pt-[30px]">
   <p class="text-[30px] bold text-gray-900 dark:text-white">list of users</p>
                     <form methode = "get" class ="w-[90%] h-auto pt-[20px] pb-[20px]">
                        <?php
                        while($nameRow = mysqli_fetch_assoc($query)){
                            $name = $nameRow['name'];
                            $id = $nameRow['Id'];
                            
                            ?>
                    <div class ="pl-[30px] h-[100px] w-[100%] bg-slate-900 rounded-md flex flex-row justify-between items-center mb-[20px]">
                        <p class = "text-slate-500 text-[20px] "><?=$name?></p>
                         <div class = "w-[20%] h-[100px] flex  gap-[6px] flex-row justify-between items-center  pr-[30px]">
                         <button type="submit" name = "admin" value="<?= $id ?>"
                          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">add'it to admin</button>
                         <button type="submit"name = "user" value="<?= $id ?>" 
                         class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">add'it to user</button>
                         </div>
                        </div>
                             <?php 
                        }
                        ?>
                      
                       
                     </form>
   </section>
</body>
</html>