<?php
session_start();

// Database connection variables
$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

// Fetch user details
if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    
    if ($result) {
        $user = $result->fetch_assoc();
    } else {
        die("Error fetching user details: " . $mysqli->error);
    }
}

else {
    // Handle the case where the user is not logged in
    header("Location: login.php"); // Redirect to home screen
    exit(); // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connect Sphere</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="LOGO\LOGO.png" type="image/png">
</head>
<body>
    <?php if (isset($user)): ?>
        
        <div class="login-logo" style="text-align: center; margin-top: 50px;">
        <img src="LOGO\WHITE.png" alt="Bank Logo" style="width: 100px;">
        <h2>Welcome <?= htmlspecialchars($user['name']) ?></h2>

        <div class="logout-button" style="text-align: right; margin-top: 10px;">
        <button  class="logout" onclick="window.location.href='logout.php'">Logout</button>
        </div> 
        </div>

        <div class="menu">
    <div class="for-you active" onclick="showContent('forYou')">For&nbsp;You
        <hr class="active-indicator">
    </div>
    <div class="following" onclick="showContent('following')">Following
    <hr class="active-indicator">
    </div>
</div>
<hr>



<div id="content" class="content">
    <!-- For You Content -->
    <div id="forYouContent" class="content-item active">
        <div class="tweet-container">
            <div class="tweet-header">
                <a href="Home.html" class="profile-link">
                    <img class="prof-logo" src="IMAGES/PROFILE/Elon.JPG" alt="Profile Picture">
                </a>
                <div class="user-info">
                    <div class="username">Elon Musk ✓</div>
                    <div class="handle">@elonmusk · 1d</div>
                </div>
            </div>
            <div class="tweet-content" align = "left">Great meeting with <a href="https://x.com/CyrilRamaphosa">@CyrilRamaphosa</a></div>
            <div class="tweet-image">
                <a href="Home.html">
                    <img class="content" src="IMAGES/CONTENT/IMG_3327.JPG" alt="Content">
                </a>
                <div class="stats">💬 10K &nbsp; 🔃 24K&nbsp;&nbsp; &nbsp;
                    <label class="heart-checkbox">
                        <input type="checkbox">
                        <span class="heart"></span>
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 290K &nbsp;  ılıl 57M &nbsp;⛉ &nbsp;↑
                </div>
            </div>
        </div>
        <div class="tweet-container">
            <div class="tweet-header">
                <a href="Home.html" class="profile-link">
                    <img class="prof-logo" src="IMAGES/PROFILE/Matric.JPG" alt="Profile Picture">
                </a>
                <div class="user-info">
                    <div class="username">META KOOL ✓</div>
                    <div class="handle">@mett_9 · 23m</div>
                </div>
            </div>
            <div class="tweet-content" align = "left">AI has truly taken the world by storm</div>
            <div class="tweet-image">
                <div class="video-container">
                    <video autoplay loop muted>
                        <source src="https://videos.pexels.com/video-files/4923273/4923273-hd_1920_1080_24fps.mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="stats">💬 557 &nbsp; 🔃 2.9K&nbsp; &nbsp;
                <label class="heart-checkbox">
                    <input type="checkbox">
                    <span class="heart"></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 103K &nbsp;  ılıl 2M &nbsp;⛉ &nbsp;↑
            </div>
        </div>
    </div>

    <!-- Following Content -->
    <div id="followingContent" class="content-item" style="display: none;">
            <div class="tweet-container">
            <div class="tweet-header">
                <a href="Home.html" class="profile-link">
                    <img class="prof-logo" src="IMAGES/PROFILE/Guyself.JPG" alt="Profile Picture">
                </a>
                <div class="user-info">
                    <div class="username" align = "left">AVID ⛽</div>
                    <div class="handle" align = "left">@imtoojaded_ · 1d</div>
                </div>
            </div>
            <div class="tweet-content" align = "left" >From the bottom of my heart I just want my life to get better. I'm so exhausted.</div>
            <div class="tweet-image"></div>
            <div class="stats">💬 104 &nbsp; 🔃 14K&nbsp;&nbsp; &nbsp;
                <label class="heart-checkbox">
                    <input type="checkbox">
                    <span class="heart"></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 46K &nbsp;  ılıl 1M &nbsp;⛉ &nbsp;↑
            </div>
        </div>
        <div class="tweet-container">
            <div class="tweet-header">
                <a href="Home.html" class="profile-link">
                    <img class="prof-logo" src="IMAGES/PROFILE/F1 lecl .JPG" alt="Profile Picture">
                </a>
                <div class="user-info">
                    <div class="username">blue</div>
                    <div class="handle">@dearchars · 1d</div>
                </div>
            </div>
            <div class="tweet-content">When drivers used to swap leads multiple times in a lap</div>
            <div class="tweet-image">
                <a href="Home.html">
                    <img class="content" src="IMAGES/CONTENT/IMG_3333.PNG" alt="Content">
                </a>
            </div>
            <div class="stats">💬 66 &nbsp; 🔃 836&nbsp;&nbsp;
                <label class="heart-checkbox">
                    <input type="checkbox">
                    <span class="heart"></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 13K &nbsp;  ılıl 603K &nbsp;⛉ &nbsp;↑
            </div>
        </div>
        <div class="tweet-container">
            <div class="tweet-header">
                <a href="Home.html" class="profile-link">
                    <img class="prof-logo" src="IMAGES/PROFILE/Cardin.JPG" alt="Profile Picture">
                </a>
                <div class="user-info">
                    <div class="username">Cardi B ✓</div>
                    <div class="handle">@imcardib · 6h</div>
                </div>
            </div>
            <div class="tweet-content">A hurt Nikka will do the unthinkable.</div>
            <div class="tweet-image"></div>
            <div class="stats">💬 956 &nbsp; 🔃 7.8K&nbsp;&nbsp; &nbsp;
                <label class="heart-checkbox">
                    <input type="checkbox">
                    <span class="heart"></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 36K &nbsp;  ılıl 3.3M &nbsp;⛉ &nbsp;↑
            </div>
        </div>
        <div class="tweet-container">
            <div class="tweet-header">
                <a href="Home.html" class="profile-link">
                    <img class="prof-logo" src="IMAGES/PROFILE/Matric.JPG" alt="Profile Picture">
                </a>
                <div class="user-info">
                    <div class="username">THE REAL WORLD ✓</div>
                    <div class="handle">@jointrw_ · 1d</div>
                </div>
            </div>
            <div class="tweet-content">If you don't have a plan, then you're plan is to fail.</div>
            <div class="tweet-image"></div>
            <div class="stats">💬 98 &nbsp; 🔃 12K&nbsp;&nbsp; &nbsp;
                <label class="heart-checkbox">
                    <input type="checkbox">
                    <span class="heart"></span>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 60K &nbsp;  ılıl 1M &nbsp;⛉ &nbsp;↑
            </div>
        </div>
    </div>
</div>
<div class="post-feed" id="post-feed" align-items: center;>
        <!-- Posts will be dynamically added here -->
    </div>

    <!-- Floating button -->
    <button class="floating-button" onclick="openPopup()">+</button>

    <!-- Popup for writing a post -->
    <div class="popup" id="popup">
        <div class="popup-header">
            <h2>Write Something</h2>
            <button class="close-button" onclick="closePopup()">&times;</button>
        </div>

        <div class="write-section">
            <textarea id="post-input" placeholder="What's on your mind?"></textarea>
            <button class="publish-button" onclick="publishPost()">Publish</button>
        </div>
    </div>
</div>
<button id="toggleBtn">☰</button>

<div class="sidenav" id="sidenav">
    <div class="tweet-header">
        <a href="https://x.com/<?php echo htmlspecialchars($user['prof_logo']); ?>" class="profile-link">
        <img class="prof-logo" src="<?php echo htmlspecialchars($user['prof_logo']); ?>" alt="Profile Picture">
        </a>
        <div class="user-info">
            <div class="handle"><?php echo htmlspecialchars($user['email']); ?></div>
            <div class="name"><?php echo htmlspecialchars($user['name']); ?></div>
            <div class="following"><?php echo htmlspecialchars($user['following']); ?> Following</div>
            <div class="following"><?php echo htmlspecialchars($user['followers']); ?> Followers</div>
        </div>
    </div>
    <a href="apply.html">👤 Profile</a>
    <a href="status.html">𝕏 Premium</a>
    <a href="students.html">⛉ Bookmarks</a>
    <a href="staff.html">💼 Jobs</a>
    <a href="contact.html">📄 Lists</a>
    <a href="contact.html">🎙️ Spaces</a>
    <a href="contact.html">💵 Monetisation</a>
    <a href="contact.html">Settings and Support</a>
</div>
    </body>
    <script src="auto.js"></script>
    </div>


<div>
    <footer class="footer">
        <a href="index.html" class="footer-icon"><img src="IMAGES/home.png" alt="Home Icon"></a>
        <a href="#" class="footer-icon"><img src="IMAGES/dashboard.png" alt="Dashboard Icon"></a>
        <a href="user-profile.html" class="footer-icon"><img src="IMAGES/profile.png" alt="Profile Icon"></a>
        <a href="settings.html" class="footer-icon"><img src="IMAGES/settings.png" alt="Settings Icon"></a>
    </footer>
</div>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>
