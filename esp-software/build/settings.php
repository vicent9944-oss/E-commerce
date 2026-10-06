<?php 
    //DATABASE CONNECTION.
 session_start();

  define('SITEURL', 'http://localhost/esp-software/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'esp_registration');

  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //db connection
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //selecting db



// check whether the user is loged in or not
if(!isset($_SESSION['user'])) //If user session is not set
    {
        //user is not logged in
        //redirect to login page
        $_SESSION['no-login-message'] = "<div style='color: #6e0000;' class='error'>Please Login First To Access Admin System.</div>";
        //Redirect to login page.
        header('location:'.SITEURL. 'build/sign-in.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="settings.css">
    <!-- Google Material Icons for the back arrow -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <div class="app-container">
        <!-- Top Navigation Bar -->
        <header class="app-bar">
            <span class="material-icons back-icon"><a href="user-dashboard.php">arrow_back</a></span>
            <h1 class="app-title">Settings</h1>
        </header>

        <!-- Main Content Area -->
        <main class="content">
            <!-- Section Header -->
            <div class="section-header">Device Settings</div>

            <!-- Settings List Items -->
            <div class="setting-item">
                <div class="setting-text">
                    <!-- Button to trigger the pop-up -->
<button id="open-menu-btn" class="btn" style="margin-right: auto;">
<span style="margin-right: auto;">Suported Device Types</span></button>
<span>BLE</span>
<!-- Pop-up Overlay and Menu Box -->
<div id="popup-overlay" class="overlay">
  <div class="popup-box">
    <button id="close-menu-btn" class="close-btn">&times;</button>
    <h2>Suported Device Types</h2>
        <label for="ble" class="radio-item">
            <input type="radio" name="ble" value="phone"><span>BLE</span>
        </label>
        
        <label for="SoftAP" class="radio-item">
            <input type="radio" name="SoftAP" value="phone">
            <span>SoftAP</span>
        </label>

        <label for="both" class="radio-item">
            <input type="radio" name="both" value="phone">
            <span>Both</span>
        </label>
    
  </div>
</div>

                </div>
            </div>

            <div class="setting-item">
                <div class="setting-text">
                    <span class="setting-label">Encrypted Communication</span>
                    <br>
                    <span class="setting-value">Secured</span>
                </div>
                <div class="setting-action">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
            </div>

            <div class="setting-item">
                <div class="setting-text">
                    <span class="setting-label">Sec2 Username for Wi-Fi</span>
                    <br>
                    <span class="setting-value">wifiprov</span>
                </div>
            </div>

            <div class="setting-item">
                <div class="setting-text">
                    <span class="setting-label">Sec2 Username for Thread</span>
                    <br>
                    <span class="setting-value">threadprov</span>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <p class="footer-brand">Powered by YHWH-GROUP.</p>
            <p class="footer-version">Created by VRM.</p>
        </footer>
    </div>

    <script>
        // Get DOM Elements
const openBtn = document.getElementById('open-menu-btn');
const closeBtn = document.getElementById('close-menu-btn');
const popupOverlay = document.getElementById('popup-overlay');

// Function to open the pop-up
openBtn.addEventListener('click', () => {
  popupOverlay.classList.add('show');
});

// Function to close the pop-up using the 'X' button
closeBtn.addEventListener('click', () => {
  popupOverlay.classList.remove('show');
});

// Function to close the pop-up if the user clicks outside the menu box
window.addEventListener('click', (event) => {
  if (event.target === popupOverlay) {
    popupOverlay.classList.remove('show');
  }
});


    </script>
</body>
</html>

