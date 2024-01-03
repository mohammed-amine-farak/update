<?php
$data = mysqli_connect('localhost', 'root', '', 'elctro');  

$persone = "SELECT * FROM person";
$query = mysqli_query($data, $persone);


if (isset($_GET['admine'])) {
   

    $selctid = $_GET['admine'];
    $get = "SELECT * FROM utilisateur WHERE Id LIKE '%$selctid%'";
    $scondquery = mysqli_query($data, $get);
    while($selected = mysqli_fetch_assoc($scondquery)){
        $name = $selected['name'];  
        $password = $selected['passworde'];
        $id = $selected['Id'];
        $email = $selected['email'];
        mysqli_query($data, "INSERT INTO adime(passworde,email,name) VALUES ('$password', '$email','$name')");
        mysqli_query($data, "DELETE FROM utilisateur WHERE Id='$id'");
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
<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 mb-[40px]">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="img\png-transparent-arduino-computer-software-library-electronics-computer-electronics-baby-computer-thumbnail.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">elctroNacer</span>
            </a>
           
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                   
                    <li>
                        <a href="listOfproduct.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">product</a>
                    </li>
                    <li>
                        <a href="chowTheUsers.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">users</a>
                    </li>
                    <li>
                        <a href="crud.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">create</a>
                    </li>
                    <li>
                        <a href="pagnation.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">pagnation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
    
   <div class="relative overflow-x-auto">
    <table class="w-[90%] ml-[100px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                 name
                </th>
                <th scope="col" class="px-6 py-3">
                email
                </th>
               <th scope="col" class="px-6 py-3">
                add
                </th>
               
                
               
            </tr>
        </thead>
        <tbody>
        <?php
      $data = mysqli_connect('localhost', 'root', '', 'elctro'); 
      $get_data = "SELECT * FROM utilisateur";
      $query = mysqli_query($data,$get_data);
      while($row = mysqli_fetch_assoc($query)){
        $name = $row['name'];  
        $id = $row['Id'];
        $email = $row['email'];
         ?>
       
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 <?=$name?>
                </th>
                <td class="px-6 py-4">
                <?=$email?>
                </td>
                

              
               <td class="px-6 py-4">
                <form methode = 'GET'>
                  <button class="bg-blue-500 text-white px-4 py-2 rounded-md "  name ="admine" value = "<?=$id?>">admine</button>
                </form>
               </td>
               
            </tr>
            
            <?php
      }
            ?>
        </tbody>
    </table>
    <button type="submit"  class="inline-flex ml-[100px] bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            <a href="utilisateur.php">utilisateur</a> 
          </button>
</div>
</body>
</html>