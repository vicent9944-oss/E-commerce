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
        $_SESSION['no-login-message'] = "<div style='color: #6e0000;' class='error'>Please Login First To Get Access.</div>";
        //Redirect to login page.
        header('location:'.SITEURL. 'build/sign-in.php');
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <!-- CSS External Link -->
  <link rel="stylesheet" href="styles11.css">
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Chart.js Library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

  <div class="dashboard-container">


    <!-- HIDEDBAR -->
    <aside class="sidebar1">
      <nav class="nav-menu">
        <a href="#" class="nav-item active" onclick="hideSidebar1()"><i style="margin: 4px;" class="fa-solid fa-close"><br>CLOSE</i></a>
        <a href="#" class="nav-item active"><i class="fa-solid fa-house"></i> Home</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-border-all"></i> My Devices</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-chart-line"></i>Provision New Device</a>
        <a href="settings.php" class="nav-item"><i class="fa-solid fa-gear"></i> Settings</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-circle-question"></i> Help</a>
      </nav>
    </aside> 
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <nav class="nav-menu">
        <a href="#" class="nav-item active"><i class="fa-solid fa-house"></i> Home</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-border-all"></i> My Devices</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-chart-line"></i>Provision New Device</a>
        <a href="settings.php" class="nav-item"><i class="fa-solid fa-gear"></i> Settings</a>
        <a href="#" class="nav-item"><i class="fa-solid fa-circle-question"></i> Help</a>
      </nav>
    </aside>
    

    <!-- MAIN CONTENT AREA -->
    <main class="main-content">
      
      <!-- TOPBAR / HEADER -->
      <header class="topbar">
        <h2 class="logo1"><img src="navlogo.png" width="200px" height="100px"></h2>
        <div class="user-profile">
          <div class="user-info">
            <span class="user-status"><span ></span> Welcome: </span>
            <span class="user-name"><?php echo htmlspecialchars($_SESSION['full_name'] ?? $_SESSION['user'] ?? 'User'); ?></span>
            
          </div>
          <button class="logout-btn"><i class="fa-solid fa-arrow-right-from-bracket"></i><a style="text-decoration: none;color:#101010;" href="logout.php" >Logout</a></button>
        </div>
        <div class="logo">
              <i style="cursor: pointer;" class="fa-solid fa-cubes-stacked" onclick="showSidebar1()"></i>
        </div>
      </header>
      
        <?php 
      if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];  //displaying session message
                    unset ($_SESSION['login']); //removing session message
                }
    ?>
      <!-- CONTENT BODY -->
      <div class="content-body">
        <h1 class="title">INCUBATOR CONTROL.</h1>
        
        <!-- DEVICE SELECTION SECTION -->
        <section class="section">
          <h3 class="sub-title">Start operate the Incubator.</h3>
          <div class="device-grid">
            
            <div class="device-card">
              <i >
                  <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 512 512">
                    <title>incubator</title>
                    <path fill="currentColor" d="M233 41v30h46V41zm-9 48c-29.8 0-77.4 11.7-116.3 29.2c-19.46 8.8-36.82 19-48.81 29.4c-7.86 6.8-12.84 13.4-15.52 19.4H468.6c-2.6-6-7.6-12.6-15.5-19.4c-12-10.4-29.3-20.6-48.8-29.4C365.4 100.7 317.8 89 288 89zM72.8 202.6l-48 64l14.4 10.8l48-64zm299.7 0l-14.4 10.8l48 64l14.4-10.8zm66.7 0l-14.4 10.8l48 64l14.4-10.8zM130.7 204l-32.05 64l16.15 8l32-64zm57.9 1.8l-16 64l17.4 4.4l16-64zm134.8 0l-17.4 4.4l16 64l17.4-4.4zM247 208v64h18v-64zM96 320c-28 0-56 53.3-56 106.6c0 26.7 28 53.3 56 53.3s56-26.6 56-53.3c0-53.3-28-106.6-56-106.6m320 0c-28 0-56 53.3-56 106.6c0 26.7 28 53.3 56 53.3s56-26.6 56-53.3c0-53.3-28-106.6-56-106.6m-160 .1c-28 0-56 53.3-56 106.6c0 26.7 28 53.3 56 53.3s56-26.6 56-53.3c0-53.3-28-106.6-56-106.6"/>
                </svg>
              </i>
              <h4>INCUBATOR.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
                
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i> connected</span>
            </div>

            <div class="device-card">
              <i ><svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" 
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12V3l4.912 1.914a1.7 1.7 0 0 1 .428 2.925zm0 0h9l-1.914 4.912a1.7 1.7 0 0 1-2.925.428zm0 
              0H3l1.914-4.912a1.7 1.7 0 0 1 2.925-.428zm0 0v9l-4.912-1.914a1.7 1.7 0 0 1-.428-2.925z"/></svg></i>
              
              <h4>MAIN FAN.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i>RUNNING</span>
            </div>

            <div class="device-card active">
              <i><svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24">
                  <path fill="currentColor" d="m12.363 2.068l4.912 1.914a2.7 2.7 0 0 1 .68 4.646l-3.045 2.371L21 11a1 1 0 0 1 .932 1.363l-1.914 4.912a2.7 2.7 0 0 1-4.646.68L13 14.908V21a1 1 0 0 1-1.363.932l-4.912-1.914a2.7 2.7 0 0 1-.68-4.646L9.09 13H3a1 1 0 0 1-.932-1.363l1.914-4.912a2.7 2.7 0 0 1 4.646-.68l2.371 3.044L11 3a1 1 0 0 1 1.363-.932"/>
                </svg></i>
              <h4>EXHAUST<br>FAN.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i>RUNNING</span>
            </div>

            <div class="device-card active">
              <i ><svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 48 48">
                  <g fill="none" stroke-width="3">
                    <path fill="#8fbffa" d="M39.911 20.329c2.47.122 4.476 1.853 4.73 4.312c.195 1.892.359 4.485.359 7.859s-.164 5.967-.359 7.859c-.254 2.46-2.26 4.19-4.73 4.312C36.695 44.83 31.493 45 24 45s-12.695-.17-15.911-.329c-2.47-.122-4.476-1.853-4.73-4.312C3.164 38.467 3 35.874 3 32.5s.164-5.967.359-7.859c.254-2.46 2.26-4.19 4.73-4.312C11.305 20.17 16.507 20 24 20s12.695.17 15.911.329"/>
                    <path fill="#fff" d="M36.945 26.025c1.178.065 1.963 1.04 1.999 2.22c.03.996.056 2.398.056 4.255a143 143 0 0 1-.056 4.255c-.036 1.18-.821 2.155-2 2.22a17 17 0 0 1-1.889 0c-1.178-.065-1.963-1.04-1.999-2.22A143 143 0 0 1 33 32.5c0-1.857.026-3.259.056-4.255c.036-1.18.821-2.155 2-2.22a17 17 0 0 1 1.889 0m-12 0c1.178.065 1.963 1.04 1.999 2.22c.03.996.056 2.398.056 4.255a143 143 0 0 1-.056 4.255c-.036 1.18-.821 2.155-2 2.22a17 17 0 0 1-1.889 0c-1.178-.065-1.963-1.04-1.999-2.22A143 143 0 0 1 21 32.5c0-1.857.026-3.259.056-4.255c.036-1.18.821-2.155 2-2.22a17 17 0 0 1 1.889 0M9 29a3 3 0 1 0 6 0a3 3 0 1 0-6 0"/>
                    <path stroke="#2859c5" stroke-linecap="round" stroke-linejoin="round" d="M24 3c-1.253 1.657-1.411 3.692 0 6s1.253 4.343 0 6M14 3c-1.253 1.657-1.411 3.692 0 6s1.253 4.343 0 6M34 3c-1.253 1.657-1.411 3.692 0 6s1.253 4.343 0 6m5.911 5.329c2.47.122 4.476 1.853 4.73 4.312c.195 1.892.359 4.485.359 7.859s-.164 5.967-.359 7.859c-.254 2.46-2.26 4.19-4.73 4.312C36.695 44.83 31.493 45 24 45s-12.695-.17-15.911-.329c-2.47-.122-4.476-1.853-4.73-4.312C3.164 38.467 3 35.874 3 32.5s.164-5.967.359-7.859c.254-2.46 2.26-4.19 4.73-4.312C11.305 20.17 16.507 20 24 20s12.695.17 15.911.329"/>
                    <path stroke="#2859c5" stroke-linecap="round" stroke-linejoin="round" d="M36.945 26.025c1.178.065 1.963 1.04 1.999 2.22c.03.996.056 2.398.056 4.255a143 143 0 0 1-.056 4.255c-.036 1.18-.821 2.155-2 2.22a17 17 0 0 1-1.889 0c-1.178-.065-1.963-1.04-1.999-2.22A143 143 0 0 1 33 32.5c0-1.857.026-3.259.056-4.255c.036-1.18.821-2.155 2-2.22a17 17 0 0 1 1.889 0m-12 0c1.178.065 1.963 1.04 1.999 2.22c.03.996.056 2.398.056 4.255a143 143 0 0 1-.056 4.255c-.036 1.18-.821 2.155-2 2.22a17 17 0 0 1-1.889 0c-1.178-.065-1.963-1.04-1.999-2.22A143 143 0 0 1 21 32.5c0-1.857.026-3.259.056-4.255c.036-1.18.821-2.155 2-2.22a17 17 0 0 1 1.889 0M15 29a3 3 0 1 1-6 0a3 3 0 0 1 6 0"/>
                  </g>
                </svg>
              </i>
              <h4>PRIMARY <br>HEATER.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i>RUNNING</span>
            </div>

            <div class="device-card active">
              <i ><svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 48 48">
                  <path fill="currentColor" fill-rule="evenodd" d="M12.405 1.794a2 2 0 1 1 3.19 2.413c-.404.534-.584 1.056-.595 1.588c-.01.545.155 1.26.706 2.162c.86 1.405 1.322 2.862 1.293 4.327c-.03 1.476-.555 2.8-1.404 3.923a2 2 0 1 1-3.19-2.413c.404-.535.584-1.057.595-1.59c.01-.544-.154-1.258-.706-2.16c-.86-1.406-1.322-2.863-1.293-4.327c.03-1.477.555-2.801 1.404-3.923m10 0a2 2 0 1 1 3.19 2.413c-.404.534-.584 1.056-.594 1.588c-.011.545.154 1.26.705 2.162c.86 1.405 1.322 2.862 1.293 4.327c-.03 1.476-.555 2.8-1.404 3.923a2 2 0 1 1-3.19-2.413c.404-.535.584-1.057.595-1.59c.01-.544-.154-1.258-.706-2.16c-.86-1.406-1.321-2.863-1.293-4.327c.03-1.477.555-2.801 1.404-3.923m12.802-.389a2 2 0 0 0-2.802.389c-.849 1.122-1.375 2.446-1.404 3.923c-.029 1.464.433 2.921 1.293 4.327c.552.902.716 1.616.706 2.16c-.01.533-.19 1.055-.595 1.59a2 2 0 1 0 3.19 2.413c.85-1.123 1.375-2.447 1.404-3.924c.029-1.464-.433-2.921-1.293-4.326c-.552-.903-.716-1.617-.706-2.162c.011-.532.19-1.054.595-1.588a2 2 0 0 0-.388-2.802M24 22c-7.637 0-12.87.178-16.031.338c-1.391.07-2.469 1.045-2.617 2.47C5.163 26.631 5 29.168 5 32.5s.163 5.869.352 7.692c.148 1.425 1.226 2.4 2.617 2.47c3.16.16 8.394.338 16.031.338s12.87-.178 16.031-.337c1.391-.07 2.469-1.046 2.617-2.471c.189-1.823.352-4.36.352-7.692s-.163-5.869-.352-7.692c-.149-1.425-1.226-2.4-2.617-2.47C36.871 22.178 31.637 22 24 22M7.767 18.343C11 18.179 16.302 18 24 18s13 .18 16.233.343c3.29.166 6.034 2.596 6.393 6.052c.205 1.967.374 4.642.374 8.105s-.17 6.138-.374 8.105c-.359 3.456-3.102 5.886-6.393 6.052C37 46.821 31.698 47 24 47s-13-.18-16.233-.343c-3.29-.166-6.034-2.596-6.393-6.052C1.169 38.638 1 35.963 1 32.5s.17-6.138.374-8.105c.359-3.456 3.102-5.886 6.393-6.052M12 25.5a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7m12.028.026a18 18 0 0 1 1.944 0c1.487.082 2.43 1.317 2.472 2.704c.03 1.001.056 2.409.056 4.27s-.026 3.269-.056 4.27c-.042 1.387-.985 2.622-2.472 2.704a18 18 0 0 1-1.944 0c-1.487-.082-2.43-1.317-2.472-2.704c-.03-1.001-.056-2.409-.056-4.27s.026-3.269.056-4.27c.042-1.387.985-2.622 2.472-2.704M36 25.5q-.537.001-.972.026c-1.487.082-2.43 1.317-2.472 2.704c-.03 1.001-.056 2.409-.056 4.27s.026 3.269.056 4.27c.042 1.387.985 2.622 2.472 2.704a18 18 0 0 0 1.944 0c1.487-.082 2.43-1.317 2.472-2.704c.03-1.001.056-2.409.056-4.27s-.026-3.269-.056-4.27c-.042-1.387-.985-2.622-2.472-2.704Q36.537 25.5 36 25.5" clip-rule="evenodd"/>
                </svg>
              </i>
              <h4>SECONDARY<br>HEATER.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i>RUNNING</span>
            </div>

            <div class="device-card active">
              <i >
                  <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11 9c-2.21 0-4 1.79-4 4s1.79 4 4 4s4-1.79 4-4s-1.79-4-4-4m0 6c-1.1 0-2-.89-2-2s.9-2 2-2s2 .9 2 2s-.89 2-2 2M7 4h7c2.21 0 4 1.79 4 4v1h-2V8a2 2 0 0 0-2-2H7c-1.1 0-2 .9-2 2v12h11v-2h2v4H3V8c0-2.21 1.79-4 4-4m12 6.5s2 2.17 2 3.5c0 1.1-.9 2-2 2s-2-.9-2-2c0-1.33 2-3.5 2-3.5"/>
                  </svg>
              </i>
              <h4>HUMIDIFIER.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i>RUNING</span>
            </div>

            <div class="device-card active">
              <i ><svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M17.707 3.293a1 1 0 1 0-1.414 1.414l2.294 2.294H11.5a4.5 4.5 0 0 0-4.5 4.5v7.086l-2.293-2.293a1 1 0 1 0-1.414 1.415l4 4a1 1 0 0 0 1.415 0l4-4a1 1 0 0 0-1.415-1.415L9 18.587v-7.086a2.5 2.5 0 0 1 2.5-2.5h7.086l-2.293 2.293a1 1 0 1 0 1.414 1.414l4-4a1 1 0 0 0 0-1.414z"/>
                </svg>
              </i>
              <h4>TURNER.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i>RUNING</span>
            </div>

            <div class="device-card active">
              <i >
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24">
                      <g fill="none">
                        <path fill="#fff" d="M12 4.65L5.14 9.06v6.174l2.94 3.136h.98v1.96h.98v1.96h3.92v-1.96h.98v-1.96h.98l2.94-3.136V9.06z"/>
                        <path fill="#bbd8ff" d="M12 4.65v13.72H9.06v1.96h5.88v-1.96h.98l2.94-3.234V9.06z"/>
                        <path stroke="#092f63" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M12.98 18.37v-6.86h3.43l-.49 2.94H8.08l-.49-2.94h3.43v6.86M12 .73v1.96m10.78 8.82h-1.96m.294-8.036L19.35 5.14m1.764 14.994L19.35 18.37M1.22 11.51h1.96m-.196-8.036L4.65 5.14M2.984 20.134L4.65 18.37m7.35 4.9v-.98"/>
                        <path stroke="#092f63" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="m12 4.65l6.86 4.41v6.174l-2.94 3.136H8.08l-2.94-3.136V9.06zm2.94 13.72v1.96H9.06v-1.96"/>
                        <path stroke="#092f63" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M13.96 20.33v1.96h-3.92v-1.96"/>
                      </g>
                    </svg>
              </i>
              <h4>LIGHTS.</h4>
              <label class="switch">
                <input type="checkbox" id="toggleSwitch">
                <span class="slider"></span>
              </label>
              <br>
              <span class="status connected"><i class="fa-solid fa-check"></i>ON</span>
            </div>

            

          </div>
        </section>

        <!-- LIVE METRICS SECTION -->
        <section class="section-metrics-section">
          <h3>Live statistics - Home Weather Station</h3>
          
          <div class="gauges-grid">
            
            <!-- Temperature -->
            <div class="gauge-card">
              <h4>Temperature</h4>
              <div class="circle-gauge temp-gauge">
                <div class="gauge-inner">
                  <i class="fa-solid fa-temperature-half"></i>
                  <span>24.8°C</span>
                </div>
              </div>
            </div>

            <!-- Humidity -->
            <div class="gauge-card">
              <h4>Humidity</h4>
              <div class="circle-gauge humidity-gauge">
                <div class="gauge-inner">
                  <i class="fa-solid fa-droplet"></i>
                  <span>62%</span>
                </div>
              </div>
            </div>

            <!-- Pressure -->
            <div class="gauge-card">
              <h4>Pressure</h4>
              <div class="circle-gauge pressure-gauge">
                <div class="gauge-inner">
                  <i class="fa-solid fa-gauge-high"></i>
                  <span>1013 hPa</span>
                </div>
              </div>
            </div>

            <!-- Wind Speed -->
            <div class="gauge-card">
              <h4>Wind Speed</h4>
              <div class="circle-gauge wind-gauge">
                <div class="gauge-inner">
                  <i class="fa-solid fa-wind"></i>
                  <span>8.5 <small>km/h</small></span>
                </div>
              </div>
            </div>

          </div>

          <!-- CHART AREA -->
          <div class="chart-container">
            <h4>Weather Status (Last 24Hours)</h4>
            <canvas id="weatherChart"></canvas>
          </div>

        </section>

      </div>
    </main>

  </div>
  <!-- Footer -->
        <footer class="footer">
            <p class="footer-brand">Powered by YHWH-GROUP.</p>
            <p class="footer-version">Created by VRM.</p>
        </footer>

  <!-- CHART JAVASCRIPT -->
  <script src="chart.js"></script>
  <script src="switch.js"></script>
  <script>
        function showSidebar1() {
        const sidebar=document.querySelector('.sidebar1')
        sidebar.style.display='flex'
}
        function hideSidebar1() {
        const sidebar=document.querySelector('.sidebar1')
        sidebar.style.display='none'
    }
  </script>
</body>
</html>



