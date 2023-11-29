
<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Product Listing</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class = "w-full h-[100px] flex  flex-row justify-between items-center  bg-slate-900 pl-[30px]">
    <p class = "text-slate-500 text-[50px] ">ElectroNacer</p>
    <div class = "w-1/4 h-[100px] flex  gap-[6px] flex-row justify-between items-center  pr-[30px]">
        <a class ="text-slate-500 text-[26px] "href="">create</a>
        <a class ="text-slate-500 text-[26px] "href="">product</a>
        <a class ="text-slate-500 text-[26px] "href="">log in</a>
        
    </div>

   </header>
   <table class="min-w-full mt-[60px] bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b">Image</th>
          <th class="py-2 px-4 border-b">Product Name</th>
          <th class="py-2 px-4 border-b">Description</th>
          <th class="py-2 px-4 border-b">Price</th>
          <th class="py-2 px-4 border-b">Actions</th>
        </tr>
      </thead>
      <tbody>
        
      <?php
      $data = mysqli_connect('localhost', 'root', '', 'elctro'); 
      $get_data = "SELECT * FROM product";
      $query = mysqli_query($data,$get_data);
      while($row = mysqli_fetch_assoc($query)){
        $name = $row['name'];
        $id = $row['id']
        ?>
         <tr>
          <td class="py-2 px-4 border-b"><img src="product1.jpg" alt="Product 1" class="w-16 h-16 object-cover"></td>
          <td class="py-2 px-4 border-b"><?=$name?></td>
          <td class="py-2 px-4 border-b">Product 1 Description</td>
          <td class="py-2 px-4 border-b">$19.99</td>
          <td class="py-2 px-4 border-b">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md"><?=$id?></button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md"><?=$id?></button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md"><?=$id?></button>
        
        </td>
        </tr>
        <?php

      }
      ?>
        
      </tbody>
    </table>
  
</body>
</html>
