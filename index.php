

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
elseif (mysqli_num_rows($run2)==1) {
    header("location:chowtheUsers.php");
}
elseif (mysqli_num_rows($run3)==1) {
    header("location:listOfproduct.php");
}
elseif (mysqli_num_rows($run4)==1) {
    header("location:crud.php");
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
  <div class="bg-slate-900  w-full h-screen bg-cover bg-center flex flex-col justify-center items-center" >
  
 
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <input type="email" name="email"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password"  placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      
                  </div>
                  <button type="submit" name = "send" class="w-full bg-slate-900 text-white  hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
 
    </div>

</body>
</html>