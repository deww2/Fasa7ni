<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="Style.css" />
  <script src="javascriptfile.js"></script>
  <title>About Us</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="display:flex;
  justify-content:center;
  align-items: center;
  flex-wrap:wrap;
  min-height: 100vh;">
  <style>
    body {
      background-image: url('images/backgrnd2.jpg');
      background-repeat: repeat;
      background-size: 100%;
      position: relative;
    }


    footer {
      position: relative;

      bottom: 0;
      width: 100%;

      padding: 20px;
      /* Add padding to provide space between content and footer */

      background-color: rgb(18, 26, 68);
      color: rgb(15, 244, 252);
      max-height: auto;

    }
  </style>

  <header>
    <a href="home.php" class="logo">Fasa7ni</a>
    <nav class="navigation">
      <label for="Category" style="
        color: rgb(15, 244, 252);
        text-transform: uppercase;
        font-weight: 500;
        font-size: 1.1em;
        padding-left: 30px;
      ">Categories:
      </label>
      <select id="nav-select">
        <option id="categoriesc" value="Categories">Categories</option>
        <option id="resturantsc" value="Restaurants">Restaurants</option>
        <option id="activitiessc" value="Activities">Activities</option>
        <option id="dayuseec" value="DayUse">DayUse</option>
      </select>

      <a href="about us.php">About us</a>
      <button id="loginButtono" onclick="toggleContactUsPopup()" class="navi-links">
        Contact Us
      </button>
      <!-- Button to open popup -->
      <div class="Form-popup" id="ContactUsForm">
        <form class="Form-container">
          <button type="button" class="Closebtnn" onclick="closeContactUsForm()">
            Close
          </button>
          <h1>Contact Us</h1>
          <input type="name" placeholder="Name" class="Form-container" name="name" required />

          <input type="email" placeholder="Email" class="Form-container" name="email" required />
          <input type="number" placeholder="Phone Number" class="Form-container" name="number" required />
          <input height="100px" type="text" placeholder="Write your enquiry here " class="Form-container" name="enquiry"
            required /><br /><br />
          <input type="checkbox" /><span>by mail</span>
          <input type="checkbox" /><span>by phone number</span>
          <button type="submit" class="Formbtn">Submit enquiry</button>
        </form>
      </div>
      &nbsp;&nbsp;<button id="loginButton">Login</button>
      <div id="loginPopup">
        <form>
          <h2>Login</h2><br>
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
          <button type="submit">Login</button>
          <button type="button" id="closeButton">Close</button>
        </form>
      </div>

    </nav>
  </header>

  <body>
    <center>
      <h1 style="
        margin-bottom: 25px;
        margin-top: 80px;
        margin-left: 25px;
        text-align: center;
        color: rgb(37, 6, 174);
      ">
        About Us
      </h1>
    </center>
    <center>
      <p style="max-width: 70%; text-align: center; margin-right: -5%">
        Fasa7ni is a website that includes a complete guide that benefit tourists,
        adventurous people who are willing to explore different places, experience
        new adventures and locals that are just willing to try something new.
        These cuisines are divided into different categories like different budget
        ranges, luxury restaurants and restaurants that are specialized in certain
        food such as breakfast or deserts, the user can reserve a place through
        our website to dine-in in one of the restaurants on our website to save
        them the hustle of contacting the restaurants directly. Secondly,
        activities that include painting, padel, kayaking, pottery, and yoga.
        Thirdly ,adventurous places such as Skydiving, rock climbing, camping,
        caving, hot air balloons, horse riding. Moreover, another category which
        is historical places to visit, which includes pyramids, museums, and other
        historical places which increases the user’s history information about
        Egypt. Additionally, the fact that the user does not need to have friends
        or to be with their family to enjoy these places as we have a category
        that includes activities, café, and other places to enjoy with your pet!
      </p>
    </center>
    <div class="BIGBOX">
      <div class="box">
        <div class="'imgBx">
          <img src="images/karen's photo.jpg" style="width: 220px; height: 200px; top: 0px; bottom: 0%;" />
        </div>
        <div class="contentt">
          <h2 style="top: 0px; text-align: center;">Karen Ashraf</h2>
          <div class="hidden-text" style="text-align: center;">Karen is an outgoing person and she loves to know new
            people and explore new things and places.</div>
          <script>
            $(document).ready(function () {
              $('.box').hover(function () {
                $('.hidden-text').fadeIn(200);
              }, function () {
                $('.hidden-text').fadeOut(200);
              });
            });

          </script>
        </div>
      </div>
    </div>


    <div class="BIGBOX">
      <div class="box1">
        <div class="'imgBx">
          <img src="images/nada's photo.jpg" style="width: 220px; height: 200px; " />
        </div>
        <div class="contentt">
          <h2 style="top: 0px; text-align: center;">Nada Mamdouh</h2>
          <div class="hidden-text1" style="text-align: center;">Nada loves the quick outings and spots with her friends,
            which suits the teenagers more than any other age.</div>
          <script>
            $(document).ready(function () {
              $('.box1').hover(function () {
                $('.hidden-text1').fadeIn(200);
              }, function () {
                $('.hidden-text1').fadeOut(200);
              });
            });
          </script>
        </div>
      </div>
    </div>

    <div class="BIGBOX">
      <div class="box2">
        <div class="'imgBx">
          <img src="images/sandy's photo.jpg" style="width: 220px; height: 200px; " />
        </div>
        <div class="contentt">
          <h2 style="top: 0px; text-align: center;">Sandy Mohamed</h2>
          <div class="hidden-text2" style="text-align: center;">Sandy is a girl who really loves spending day uses in
            different places near Cairo, so she has a bank of knowledge about the places that could be visited for day
            use.</div>
          <script>
            $(document).ready(function () {
              $('.box2').hover(function () {
                $('.hidden-text2').fadeIn(200);
              }, function () {
                $('.hidden-text2').fadeOut(200);
              });
            });
          </script>
        </div>
      </div>
    </div>


    <div class="BIGBOX">
      <div class="box3">
        <div class="'imgBx">
          <img src="images/sandra's photo.jpg" style="width: 220px; height: 200px; " />
        </div>
        <div class="contentt">
          <h2 style="top: 0px; text-align: center;">Sandra Ramy</h2>
          <div class="hidden-text3" style="text-align: center;">Sandra is someone who enjoys spending time with her
            family, and loves sitting in restaurants and having talks with her beloved people.</div>
          <script>
            $(document).ready(function () {
              $('.box3').hover(function () {
                $('.hidden-text3').fadeIn(200);
              }, function () {
                $('.hidden-text3').fadeOut(200);
              });
            });
          </script>
        </div>
      </div>
    </div>


    <footer>
      <div class="footer">
        <div class="footer-section">
          <h3>Contact Us</h3>
          <ul>
            <li><a href="#">Contact</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>

        <div class="footer-section">
          <h3>About Us</h3>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Our Story</a></li>
          </ul>
        </div>

        <div class="footer-section">
          <h3>Follow Us</h3>
          <ul class="social-icons">
            <li>
              <a href="#"><img src="images/fbicon.jpg" alt="Facebook" /></a>
            </li>
            <li>
              <a href="#"><img src="images/instagramicon.jpg" alt="Instagram" /></a>
            </li>
            <li>
              <a href="#"><img src="images/emailicon.jpg" alt="Gmail" /></a>
            </li>
          </ul>
        </div>

        <div class="footerbtngroup">
          <a class="footerbtn">Log In </a>

          <!-- ADD FROM HEREEEEE -->

          <button onclick="toggleSignUpPopup()" class="footerbtn">Sign Up</button>
          <!-- Button to open popup -->
          <div class="Form-popup" id="SignUpForm">
            <form class="Form-container">
              <button type="button" class="Closebtnn" onclick="closeSignUpForm()">
                Close
              </button>
              <h1>Sign Up</h1>
              <input type="name" placeholder="First Name" class="Form-container" name="name" required />
              <input type="name" placeholder="Last Name" class="Form-container" name="name" required />
              <input type="email" placeholder="Email" class="Form-container" name="email" required />
              <input type="date" placeholder="Date of Birth" class="Form-container" name="date" required />
              <input type="password" placeholder="Password" class="Form-container" name="password" required />

              <button type="submit" class="Formbtn">Sign Up</button>
              <hr />
              or
              <hr />
              <br />
              <a> Already have an account? <a href="login.php">Log In</a></a>
            </form>
          </div>

          <button onclick="toggleSubscribePopup()" class="footerbtn">
            Subscribe to Newsletter
          </button>
          <!-- Button to open popup -->
          <div class="Form-popup" id="SubscribeForm">
            <form class="Form-container">
              <button type="button" class="Closebtnn" onclick="closeSubscribeForm()">
                Close
              </button>
              <h1>Subscribe</h1>
              <input type="name" placeholder="Name" class="Form-container" name="name" required />
              <input type="email" placeholder="Email" class="Form-container" name="email" required /><br /><br />
              <button type="submit" class="Formbtn">Subscribe</button>
            </form>
          </div>
          <!-- ADD TO HEREEEEE -->
        </div>
      </div>
    </footer>

  </body>

</html>