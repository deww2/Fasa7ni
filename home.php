<?php include 'includes/header.php'; ?>
<section class="main">
  <div>
    <h2>There is no time to be BORED in a world as BEAUTIFUL as this.</h2>
    <p>
      Welcome to Fasa7ni, your ultimate guide to unforgettable outings in
      Egypt!<br />Whether you're seeking romantic dinners, thrilling
      activities, day escapes, or quick getaways,<br />we've created a
      diverse collection of experiences just for you.
    </p>
    <br />
    <!-- <a href="#" class="mainbtn"> test button</a> -->

    <!--<div class="contactus">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-solid fa-phone"></i></a>
                <a href="#"><i class="fa-regular fa-envelope"></i></a>
            </div>-->
  </div>
</section>

<section class="cards" id="services">
  <h2 class="title" id="restaurantsc">Restaurants</h2>
  <div class="content">
    <div class="card">
      <div class="romantic">
        <a href="romanticdinner.php">
          <img src="images/romantic.jpeg" style="width: 250px; height: 200px; margin: 10px" />
        </a>
        <h1>Romantic dinners</h1>
        <p style="margin: 10px">
          Where love and flavor unite. Explore our menus and intimate
          settings for unforgettable romantic evenings.
        </p>
      </div>
    </div>

    <div class="card">
      <div class="quickoutings">
        <a href="cafes.php">
          <img src="images/quickoutings.jpg" style="width: 270px; height: 200px; margin: 10px" />
        </a>
        <h1>Quick Outings</h1>
        <p style="margin: 10px">
          Easier planning, charming cafes, scenic walks, and cozy spots for
          those spur-of-the-moment escapes.
        </p>
      </div>
    </div>

    <div class="card">
      <div class="familyoutings">
        <a href="restaurant.php">
          <img src="images/familyoutings.jpg" alt="family outing" style="width: 270px; height: 200px; margin: 10px" />
        </a>
        <h1>Family Outings</h1>
        <p style="margin: 10px">
          Enjoy family outings with ease! Discover venues where parents can
          relax while kids have fun in dedicated play areas.
        </p>
      </div>
    </div>
    <div class="showmore">
      <button type="button">
        <img src="images/showmorearrow.png" width="30" height="30" class="showmore-image" />
      </button>
    </div>
  </div>
</section>

<section class="cards" id="services">
  <h2 id="activitiesc" class="title">Activities</h2>
  <div class="content">
    <div class="card">
      <div class="padel">
         <img src="images/padel.jpg" style="width: 270px; height: 200px; margin: 10px" > 
         <a href="Activities.php">
        <h1>Padel</h1>
</a>
        <p style="margin: 10px"></p>
      </div>
    </div>

    <div class="card">
      <div class="hiking">
        <img src="images/hiking.jpg" style="width: 270px; height: 200px; margin: 10px" />
        <a href="Activities.php">
        <h1>Hiking</h1>
        </a>
        <p style="margin: 10px"></p>
      </div>
    </div>

    <div class="card">
      <div class="kayaking">
        <img src="images/kayaking.jpeg" style="width: 270px; height: 200px; margin: 10px" />
        <a href="Activities.php">
        <h1>Kayaking</h1>  
</a>
        <p style="margin: 10px"></p>
      </div>
    </div>

    <div class="showmore">
      <button type="button"> 
        <a href="Activities.php"> 
        <img src="images/showmorearrow.png" width="30" height="30" class="showmore-image" /> 
</a> 
      </button>
    </div>
  </div>
</section>

<section class="cards" id="services">
  <h2 id="dayusec" class="title">Day Use</h2>
  <div class="content">
    <div class="card">
      <div class="padel">
        <img src="images/alexdayuse.jpg" style="width: 270px; height: 200px; margin: 10px" />
        <a href="DayUse.php">
          <h1>Alexandria</h1>
        </a>

        <p style="margin: 10px"></p>
      </div>
    </div>
    <div class="card">
      <div class="hiking">
        <img src="images/sokhnadayusee.jpg" style="width: 270px; height: 200px; margin: 10px" />

        <a href="DayUse.php">
          <h1>Sokhna</h1>
        </a>
        <p style="margin: 10px"></p>
      </div>
    </div>
    <div class="card">
      <div class="kayaking">
        <img src="images/fayoumdayuse.jpeg" style="width: 270px; height: 200px; margin: 10px" />

        <a href="DayUse.php">
          <h1>fayoum</h1>
        </a>
        <p style="margin: 10px"></p>
      </div>
    </div>
    <div class="showmore">
      <button type="button">
        <img src="images/showmorearrow.png" width="30" height="30" class="showmore-image" />
      </button>
    </div>
  </div>
</section>
<style>
  body {
    background-image: url("images/backgrnd2.jpg");
    background-repeat: repeat;
    background-size: auto 100%;
  }
</style>
</body>

<?php include 'includes/footer.php'; ?>

</html>