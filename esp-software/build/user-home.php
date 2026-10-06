<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-home</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <nav  class="sidebar" >
        <ul >
            <li  onclick="hideSidebar()">
                <a href="#">X</a>
            </li>

            <li>
                <a href="index.php">HOME</a>
            </li>
        
            <li>
                <a href="#">ABOUT</a>
            </li>
            <li>
                <a href="#">SERVICES</a>
            </li>
            <li>
                <a href="#">BLOG</a>
            </li>
            <li>
                <a href="#">NEWS</a>
            </li>
            <li>
                <a href="#">CONTACT</a>
            </li>
        </ul>
    </nav>
    <nav>
        <ul>
            <li class="menu-buttonlogo">
                <a href="#">LOGO</a>
            </li>
        
            
            <li class="hideonmobile">
                <a href="#">HOME</a>
            </li>
        
            <li class="hideonmobile">
                <a href="#">ABOUT</a>
            </li>
            <li class="hideonmobile">
                <a href="#">SERVICES</a>
            </li>
            
            <li class="hideonmobile">
                <a href="#">NEWS</a>
            </li>
            <li class="hideonmobile">
                <a href="#">CONTACT</a>
            </li>
            <li class="menu-button" onclick="showSidebar()">
                <a href="#">☰</a>
            </li>
           
        </ul>
    </nav>
    
        
            

            <div class="card-container">
                <div class="card">
                    <img src="background.jpg" alt="">
                    <div class="card-content">
                        <h3>Thermometer</h3>
                        <p>Lorem ipsum dolor sit amet consectetur 
                            adipisicing elit. Incidunt nobis aspernatur 
                            rerum voluptate dicta quis facilis dolores 
                            inventore eaque corporis illum, quidem deserunt 
                            minima asperiores similique 
                            officia. Facere, aliquam doloremque!</p>
                            <a href="#"  class="btn">Use Device</a>
                    </div>
                </div>
                <div class="card">
                    <img src="background.jpg" alt="">
                    <div class="card-content">
                        <h3>Hygromete</h3>
                        <p>Lorem ipsum dolor sit amet consectetur 
                            adipisicing elit. Incidunt nobis aspernatur 
                            rerum voluptate dicta quis facilis dolores 
                            inventore eaque corporis illum, quidem deserunt 
                            minima asperiores similique 
                            officia. Facere, aliquam doloremque!</p>
                            <a href="#"  class="btn">Use Device</a>
                    </div>
                </div>
                <div class="card">
                    <img src="background.jpg" alt="">
                    <div class="card-content">
                        <h3>Moisture meter</h3>
                        <p>Lorem ipsum dolor sit amet consectetur 
                            adipisicing elit. Incidunt nobis aspernatur 
                            rerum voluptate dicta quis facilis dolores 
                            inventore eaque corporis illum, quidem deserunt 
                            minima asperiores similique 
                            officia. Facere, aliquam doloremque!</p>
                            <a href="#"  class="btn">Use Device</a>
                    </div>
                </div>
                <div class="card">
                    <img src="background.jpg" alt="">
                    <div class="card-content">
                        <h3>Pollen</h3>
                        <p>Lorem ipsum dolor sit amet consectetur 
                            adipisicing elit. Incidunt nobis aspernatur 
                            rerum voluptate dicta quis facilis dolores 
                            inventore eaque corporis illum, quidem deserunt 
                            minima asperiores similique 
                            officia. Facere, aliquam doloremque!</p>
                            <a href="#"  class="btn">Use Device</a>
                    </div>
                </div>
            </div>

    
    
<hr style="color: black;">
    <footer class="footer">
        <br> </br>
        <h1>footer</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        </p>
    </footer>
    
</body>
<script>
    function showSidebar() {
        const sidebar=document.querySelector('.sidebar')
        sidebar.style.display='flex'
    }
    function hideSidebar() {
        const sidebar=document.querySelector('.sidebar')
        sidebar.style.display='none'
        hideSidebar();
    }
</script>
</html>