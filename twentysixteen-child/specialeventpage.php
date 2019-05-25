<?php /* Template Name: Special Event Page */ 
get_header(); ?>
  
  <div id="image_slide" class="container-fluid">
    <h2>
      What's on tap for your special event?
    </h2>
  </div>

  <div id="order_confidence">
    <div class="row">
      <div class="col-sm-12 col-md-7 col-lg-7 left">
        <h1>Order with Confidence</h1>
        <ul>
          <li><h5>No-commitment Pricing</h5></li>
          <li><h5>Dedicated team</h5></li>
          <li><h5>Full-service turnkey solution</h5></li>
          <li>
            <h5>Expert technical keep operations running smoothly</h5>
          </li>
          <li>
            <h5>
              Responsive customer experience learn that work to fill your
              needs
            </h5>
          </li>
          <li><h5>Secure and convenient payment methods</h5></li>
        </ul>
        <a href="/#contact"><button class="btn tasting">Schedule a tasting</button></a>
      </div>
      <div class="col-sm-12 col-md-5 col-lg-5 right mt-5 mt-md-0"></div>
    </div>
  </div>

  <div id="vertical_tabs">
    <h1 class="mt-3 mb-3">What's on Tap?</h1>
    <div class="row">
      <div class="tab">
        <div class="tablinks active" onclick="openCity(event, 'Coffee')">
          Coffee
        </div>
        <div class="tablinks" onclick="openCity(event, 'Iced_tea')">
          Iced Tea
        </div>
        <div class="tablinks" onclick="openCity(event, 'Craft_soda')">
          Craft Sodas & more
        </div>
        <div class="tablinks" onclick="openCity(event, 'Kombucha')">
          Kombucha
        </div>
      </div>

      <div id="Coffee" class="tabcontent">
        <h3 style="margin-bottom: 20px;">Coffee Selection</h3>
        <p class="line"></p>
        <p>Nitro Classic Cold Brew</p>
        <p>Nitro Caramel Mocha Cold Brew</p>
        <p>Classic Cold Brew Coffee</p>
        <p>Sumatra Nitro Cold Brew Coffee</p>
        <p>Special Roast <small>Avaiable upon Request</small></p>
      </div>

      <div id="Iced_tea" class="tabcontent" style="display: none">
        <h3 style="margin-bottom: 20px;">Iced Tea</h3>
        <p class="line"></p>
        <p>Nitro Black Tea</p>
        <p>Nitro Hibiscus Tea (caffeine free)</p>
        <p>Nitro Matcha Tea</p>
        <p>Sweet Tea</p>
        <p>Rasberry Sweet Tea</p>
        <p>Black Iced Tea</p>
        <p>Red Rasberry Hibscius</p>
        <p>Perfect Peach</p>
        <p>Arnold Palmer</p>
      </div>

      <div id="Craft_soda" class="tabcontent" style="display: none">
        <h3 style="margin-bottom: 20px;">Craft Sodas & more</h3>
        <p class="line"></p>
        <p>Root Beer</p>
        <p>Orange Cream soda</p>
        <p>Black Cherry Cream Soda</p>
        <p>Cola</p>
        <p>Wild Ginger Soda</p>
        <p>Orange Cream soda</p>
        <p>Lemonade</p>
        <p>Blueberry Acai Soda Water</p>
        <p>Lime & Mint Soda Water</p>
        <p>Rhubarb Lavender Soda Water</p>
      </div>

      <div id="Kombucha" class="tabcontent" style="display: none">
        <h3 style="margin-bottom: 20px;">Kombucha</h3>
        <p class="line"></p>
        <p>Lavender Lemonade</p>
        <p>Tart Cherry Ginseng</p>
        <p>Pineapple Ginger</p>
        <p>Super Berry</p>
        <p>Turmeric Ginger</p>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
