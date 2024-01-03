<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 ">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="img\png-transparent-arduino-computer-software-library-electronics-computer-electronics-baby-computer-thumbnail.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">elctroNacer</span>
            </a>
           
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="pagnationforuser.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">pagnation</a>
                    </li>
                    <li>
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">log in</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>
</header>
    
   
<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>
    <form class="flex flex-col md:flex-row gap-3" method = "GET">
    <div class="flex">
        <input type="number" name = "prix_start" placeholder="prix start"
			class="w-[50px] md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
			>
      <input type="number" name = "prix_end" placeholder="prix end"
			class="w-[50px] md:w-80 px-3 h-10 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500"
			>
        <button type="submit" name = "send" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
    </div>
    </form>
<form method = "GET">
<select id="pricingType" name="category"
		class="w-[120px] h-10 border-2 border-sky-500 focus:outline-none focus:border-sky-500 text-sky-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
		<option value="all" >All</option>
    <?php
		 $data = mysqli_connect('localhost', 'root', '', 'elctro'); 
     $get_data = "SELECT * FROM category where statu  = 'yes'";
     $query = mysqli_query($data,$get_data);
     while($row = mysqli_fetch_assoc($query)){
        $name = $row['name'];
        ?>
        <option value="<?=$name?>"><?=$name?></option>
        <?php
     }
     ?>
                 
      
	</select>
  <button type="submit" name = "sendcategory" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>

</form>

<?php
       $sql = "SELECT product.*
       FROM product
       JOIN category ON product.category = category.name
       WHERE category.statu = 'yes' and product.status  = 'yes' ";

       if(isset($_GET['sendcategory'])){
        $select = $_GET['category'];
        if($select == 'all'){
          $sql = " SELECT product*
          FROM product
          JOIN category ON product.category = category.name
          WHERE category.statu = 'yes' and product.status  = 'yes' ";
        }
        else{
          $sql = "SELECT product.*
          FROM product
          JOIN category ON product.category = category.name
          WHERE category.statu = 'yes' and product.status  = 'yes' and product.category like '$select'";
        }
        
        
       }
       elseif(isset($_GET['send'])){
        $prix_start =  $_GET['prix_start'];
        $prix_end = $_GET['prix_end'];
        $sql = "SELECT product.*
        FROM product
        JOIN category ON product.category = category.name
        WHERE category.statu = 'yes' and product.status  = 'yes' and product.new_price >= $prix_start and product.new_price <= $prix_end";

      }
      if(isset($_GET['send']) && isset($_GET['sendcategory'])){
        $prix_start =  $_GET['prix_start'];
        $prix_end = $_GET['prix_end'];
        $sql = "SELECT product.*
        FROM product
        JOIN category ON product.category = category.name
        WHERE category.statu = 'yes' and product.status  = 'yes'  and product.new_price >= $prix_start and product.new_price <= $prix_end";

      }

       ?>
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
    <?php
      
       $query = mysqli_query($data,$sql);
       while($row = mysqli_fetch_assoc($query)){
         $image = $row['image'];
         $name = $row['name'];
    
         $category = $row['category'];
      
         $new_price = $row['new_price'];
         $stock = $row['stock'];
        
         ?>
         <a href="#" class="group">
        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
          <img src="img/<?=$image?>" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-[200px] w-[400px] object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-4 text-sm text-gray-700"><?=$name?></h3>
        <p class="mt-1 text-lg font-medium text-gray-900"><?=$new_price?></p>
      </a>
       <?php
       }
       ?>
      


     
    </div>
  </div>
</div>

</body>
</html>