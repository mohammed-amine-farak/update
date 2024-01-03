

<?php
$data = mysqli_connect('localhost', 'root', '', 'elctro');  


if(isset($_GET['send'])){
$password = $_GET['password'];
$amail = $_GET['email'];



$qu1 = "SELECT * FROM person where email = '$amail' and passworde = '$password'";
$run1 = mysqli_query($data,$qu1);


$qu2 = "SELECT * FROM super_admin where email = '$amail' and passworde = '$password'";
$run2 = mysqli_query($data,$qu2);

$qu3 = "SELECT * FROM utilisateur where email = '$amail' and passworde = '$password'";
$run3 = mysqli_query($data,$qu3);


$qu4 = "SELECT * FROM adime where email = '$amail' and passworde = '$password'";
$run4 = mysqli_query($data,$qu4);


if (mysqli_num_rows($run1)==1) {
   header("location:massege-for-user.php");
}
elseif (mysqli_num_rows($run2)==1 || mysqli_num_rows($run4)==1 ) {
    header("location:listOfproduct.php");
}
elseif (mysqli_num_rows($run3)==1) {
    header("location:pagnationforuser.php");
}


else{
    header("location:log-in.php");
}




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
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 ">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="img\png-transparent-arduino-computer-software-library-electronics-computer-electronics-baby-computer-thumbnail.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">elctroNacer</span>
            </a>
           
           
        </div>
    </nav>
</header>
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">login</h2>
      <form  methode = "GET">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">enter your email</label>
                  <input id = "email" type="email" name="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="enter your email" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">enter your password</label>
                  <input type="password" name="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="enter your password" required="">
              </div>
              
          </div>
          <button type="submit" id = "send" name = "send" class="inline-flex  bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              log in
          </button>
      </form>
  </div>
</section>
   <script src = "main.js" ></script>
</body>
</html>