
<?php
$data = mysqli_connect('localhost', 'root', '', 'elctro');  

if(isset($_GET['send'])){
$name = $_GET['name'];
$old_price = $_GET['old_price'];
$new_price = $_GET['new_price'];
$stock = $_GET['stock'];
$category = $_GET['category'];
$img = $_GET['img'];

mysqli_query($data, "INSERT INTO product(name,old_price,new_price,image,stock,category) VALUES ('$name', '$old_price','$new_price','$img','$stock','$category')");
header('location:listOfproduct.php');

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class = "w-full h-[100px] flex  flex-row justify-between items-center  bg-slate-900 pl-[30px]">
    <p class = "text-slate-500 text-[50px] ">ElectroNacer</p>
    <div class = "w-1/4 h-[100px] flex  gap-[6px] flex-row justify-between items-center  pr-[30px]">
        <a class ="text-slate-500 text-[26px] "href="">create</a>
        <a class ="text-slate-500 text-[26px] "href="">product</a>
        <a class ="text-slate-500 text-[26px] "href="">log in</a>
        
    </div>

   </header>
   <section class = "h-[100vh] w-[100%] bg-slate-500 flex flex-col items-center pt-[30px]">
        <div class ="h-[500px] w-[60%]  bg-slate-800 flex flex-col items-center">
            <form action="" class ="h-[500px] w-[60%] flex flex-col items-center pt-[30px]">
             <input class ="w-[90%] h-[50px] mt-[20px] " type="text" name ="name" placeholder = "name">   
             <input class ="w-[90%] h-[50px] mt-[20px]" type="number" name ="old_price" placeholder = "old-price">   
             <input class ="w-[90%] h-[50px] mt-[20px]" type="number" name ="new_price" placeholder = "new-price">   
            
             <input class ="w-[90%] h-[50px] mt-[20px]" type="number" name = "stock" placeholder = "stock">
             <input class ="w-[90%] h-[50px] mt-[20px]" type="text" name ="category" placeholder = "category">
             <input class ="w-[90%] h-[50px] mt-[20px]" type="file" name = "img">   
             <button type="submit" name = "send" class="w-full bg-slate-900 text-white  hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>

            </form>
        </div> 
         
   </section>
</body>
</html>