<?php
include_once 'includes/connection.php';
$sql = "SELECT * FROM about ";
$sql_query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($sql_query);
$name = $row['name'];
$surname = $row['surname'];
?>

<!DOCTYPE html>
<!-- Created By MsApps-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dilyerstevens</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
     
<style>

.skills .title::after{
    content: "Music Videos";
}
.teams .title::after{
    content: "Photos";
}
 img{
height: 150px;
       width: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid crimson;
      transition: all 0.3s ease;
}
.services .serv-content .card a{
    display: inline-block;
    background: crimson;
    color: #fff;
    font-size: 20px;
    font-weight: 500;
    padding: 10px 30px;
    margin-top: 20px;
    border-radius: 6px;
    border: 2px solid crimson;
    transition: all 0.3s ease;
}
.services .serv-content .card a:hover{
    color: crimson;
    background: white;
}
.teams .carousel .card img{
    height: 461px;
    width: 301px;
    object-fit: cover;
    border-radius: 3%;
    border: 5px solid crimson;
    transition: all 0.3s ease;
}

.skills .skills-content .video > iframe{
   

    width:100% ;
    height: 100%;
    padding: 10px 30px;
}
</style>
</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="">Dilyer<span>stevens</span></a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#music" class="menu-btn">Music</a></li>
                <li><a href="#videos" class="menu-btn">Video</a></li>
                <li><a href="#photo" class="menu-btn">Photo Album</a></li>
                <li><a href="" class="menu-btn">Store</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">Hello, my name is</div>
                <div class="text-2"><?php echo $name . $surname; ?></div>
                <div class="text-3">And I'm a <span class="typing"></span></div>

            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/profile-1.jpeg" alt="">
                </div>
                <div class="column right">
                    <div class="text">I'm <?php echo $name ?> and I'm a <span class="typing-2"></span></div>
                    <p><?php echo $row['information']; ?></p>
                    <!--<a href="#">Download CV</a>-->
                </div>
            </div>
        </div>
    </section>

    <!-- services section start -->
    <section class="services" id="music">
        <div class="max-width">
            <h2 class="title">Music</h2>
            <div class="serv-content">

            <?php 
              $sql = "SELECT * FROM songs";
              $query = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($query);
              if($row){
                  foreach($query as $row){
                      echo '    <div class="card">
                      <div class="box">
                          <img src="images/'.$row['photo'].'" alt="Dilyerstevens">
                          <div class="text">'.$row['name'].'</div>
                          <p>'.$row['description'].'</p>
                          <a href='.$row['link'].' >Listen</a>
                      </div>
                  </div>';
                  }
              }
              
              else{
                echo '    <div class="card">
                <div class="box">
                    <div class="text">About the songs</div>
                    <p>Songs are not appearening due to maintenace.Our team is working to get them back as soon as possible!</p>
                </div>
            </div>';
              } 
         
            ?>
            


            </div>
        </div>
        </div>
    </section>

    <!--Video ssection start -->
    <section class="skills" id="videos">
        <div class="max-width">
            <h2 class="title">Videos</h2>
            <div class="skills-content">
                <?php 
                 $sql = "SELECT * FROM songs";
                 $query = mysqli_query($conn,$sql);
                 
                 foreach($query as $row){
                     $video = $row['video'];
                     if($video !== ""){
                         echo '<div class="video">'.$video.'</div>' ;
                     }
                 }
                
                
                ?>
            
                
            </div>
        </div>
    </section>

    <!--Photo Album section start -->
    <section class="teams" id="photo">
        <div class="max-width">
            <h2 class="title">Photo Album</h2>
            <div class="carousel owl-carousel">
            <?php 
              $sql = "SELECT * FROM photo_album";
              $query = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($query);
              if($row){
                  foreach($query as $row){

                      echo '<div class="card">
                      <div class="box">
                          <img src="images/p'.$row['photo'].'" alt="">
                      </div>
                  </div>';
                  }
              }else{
                echo '<div class="card">
                <div class="box">
                    <div class="text">About the songs</div>
                    <p>Pictures are not appearening due to maintenace.Our team is working to get them back as soon as possible!</p>
                </div>
            </div>';
              } 
         
            ?>
            
            </div>
        </div>
    </section>

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corporis fuga corrupti. Doloribus quis soluta nesciunt veritatis vitae nobis?</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Dilyerstevens</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">abc@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php include_once 'includes/contact.php' ?>
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <footer>
        <span>Created By <a href="">MsApps</a> | <span class="far fa-copyright"></span> 2022 All rights reserved.</span>
    </footer>
<script src="scriptt.js"></script>
  
</body>

</html>