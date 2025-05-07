<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Guru </title>

    <!-- bootstrap CSS File -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- css admin -->
    <link rel="stylesheet" href="admin/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
    
    .sidebar .icon {
    font-size: 20px; /* Ganti sesuai ukuran yang diinginkan */
 
}
#log_out {
    font-size: 20px; /* Ganti sesuai ukuran yang diinginkan */
    color: white;
    margin-top: 10px;
    cursor: pointer;
}
 </style>
<body>

  <div class="sidebar">
    <div class="logo-details">
    <i class="fas fa-graduation-cap icon"></i>
        <div class="logo_name">Guru</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>

      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>


      <li>
        <a href="guru.php">
          <i class='bx bx-user'></i>
          <span class="links_name">Guru</span>
        </a>
         <span class="tooltip">Guru</span>
      </li>
  
     <li class="profile">
     <i class='bx bx-log-out' id="log_out"></i>
         <div class="profile-details">
           <img src="yoo.jpg" alt="profileImg">
           <div class="name_job">
           <div class="name" style="font-size:12px; font-weight:bold; color: white;">Muhammad Farhan Asro</div>          
             <div class="job">Web designer</div>
           </div>
         </div>
     </li>
    </ul>
    
  </div>
  <section class="home-section">