<?php

$data = mysqli_connect('localhost', 'root', '', 'elctro');  



if(isset($_GET['send'])){
    $userfirstname = $_GET['first_name'];
    $userlastname = $_GET['last_name'];
    $userpassword = $_GET['password'];
    $useremail = $_GET['email'];
    
    $verify_query = mysqli_query($data,"SELECT email FROM person WHERE email = '$useremail'");
    if(mysqli_num_rows($verify_query) !=0){
        echo "thise email are used byanther on pleas";
    }
    else {
        mysqli_query($data, "INSERT INTO person(passworde,email,name,lastname) VALUES ('$userpassword', '$useremail','$userfirstname','$userlastname')");
        echo "Registration successful!";
        header("Location:massege-for-user.php");  
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
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">login</h2>
      <form  methode = "GET">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">enter your first_name</label>
                  <input id = "name" type="text" name="first_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="your first name" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">enter your last name</label>
                  <input  type="text" name="last_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="your last name" required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">enter your email</label>
                  <input id = "email" type="email" name="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="enter your email " required="">
              </div>
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">enter your password</label>
                  <input id = "password" type="password" name="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="password" required="">
              </div>
              
          </div>
          <button id = "send" type="submit" name = "send" class="inline-flex  bg-slate-900 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              log in
          </button>
      </form>
  </div>
</section>
<script src = "main.js" ></script>
</body>
</html>