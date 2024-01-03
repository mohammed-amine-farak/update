
<?php
session_start();
$data = mysqli_connect('localhost', 'root', '', 'elctro'); 

$_SESSION['selctedname'] = '';
if(isset($_GET['update'])){
  $_SESSION['selctedname'] = $_GET['update'];
   header('location:upadatecategory.php');
   
}
if(isset($_GET['see'])){
    $get_data = "SELECT statu FROM category WHERE name like '%{$_GET['see']}%'";
        $query = mysqli_query($data,$get_data);
        
        if( $query != 'yes' ){
         mysqli_query($data,"UPDATE category set statu = 'yes' WHERE name like '%{$_GET['see']}%' ");
       
         
  }
  
       
  }
  if(isset($_GET['not_see'])){
    $get_data = "SELECT statu FROM category WHERE name like '%{$_GET['not_see']}%'";
        $query = mysqli_query($data,$get_data);
       
        if( $query != 'no'){
         mysqli_query($data,"UPDATE category set statu = 'no' WHERE name like '%{$_GET['not_see']}%' ");
         
  }
       
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
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
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Category name
                </th>
                <th scope="col" class="px-6 py-3">
                description
                </th>
                <th scope="col" class="px-6 py-3">
                image
                </th>
                <th scope="col" class="px-6 py-3">
                statu
                </th>
                <th scope="col" class="px-6 py-3">
                update 
                </th>
                <th scope="col" class="px-6 py-3">
                see
                </th>
                <th scope="col" class="px-6 py-3">
                dont see
                </th>
                
               
            </tr>
        </thead>
        <tbody>
        <?php
      $data = mysqli_connect('localhost', 'root', '', 'elctro'); 
      $get_data = "SELECT * FROM category";
      $query = mysqli_query($data,$get_data);
      while($row = mysqli_fetch_assoc($query)){
         $name = $row['name'];
         $description = $row['descri'];
         $images = $row['images'];
         $statu = $row['statu']
         ?>
       
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 <?=$name?>
                </th>
                <td class="px-6 py-4">
                <?=$description?>
                </td>
                <td class="px-6 py-4">
                <img src="categoryforImages/<?=$images?>" class ="h-[80px] w-[80px]" >  
                </td>
                <td class="px-6 py-4">
                <?=$statu?>
                </td>

                <td class="px-6 py-4">
                <form methode = 'GET'>
                  <button class="bg-blue-500 text-white px-4 py-2 rounded-md "  name ="update" value = "<?=$name?>" >update</button>
                </form>
               </td>
               <td class="px-6 py-4">
                <form methode = 'GET'>
                  <button class="bg-blue-500 text-white px-4 py-2 rounded-md "  name ="see" value = "<?=$name?>">see</button>
                </form>
               </td>
               <td class="px-6 py-4">
                <form methode = 'GET'>
                  <button class="bg-blue-500 text-white px-4 py-2 rounded-md "  name ="not_see" value = "<?=$name?>">not see</button>
                </form>
               </td>
            </tr>
            
            <?php
      }
            ?>
        </tbody>
    </table>
</div>
<button type="submit"  class="inline-flex  bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
             <a href="creatCategory.php">create the category</a> 
          </button>
</body>
</html>