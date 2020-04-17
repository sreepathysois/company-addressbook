<?php
   // Connect to database, and complain if it fails
   try {
      $DB = new PDO("mysql:host=db;dbname=database", "user", "password");
   }
   catch (PDOException $e) {
      // The PDO constructor throws an exception if it fails
      die('Error Connecting to Database: ' . $e->getMessage());
   }
   ?>
<?php
