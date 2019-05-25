<?php
/**
 * The template part for displaying reserve
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen_Child
 */
?>

<style>
  .btn{
    background-color: #d14d36;
    color: white;
    padding: 10px 21px;
    text-transform: none;
    font-size: 20px;
  }
  body{
    font-family: "Lato", sans-serif;
  }
  .reserve-intro{
    font-weight: 400;
    padding-bottom: 50px;
    max-width: 530px;
    margin: 0px auto;
  }
</style>


<div id="contact" class="container">
    <h1 class="text-center mb-4">Reserve</h1>
    <h3 class="text-center reserve-intro">Schedule a free sampling to learn more or try some of our tasty beverages.</h3>
    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-5 mr-5">
        <div class="form-group">
          <label for="full_name">Full Name</label>
          <input
            type="text"
            class="form-control"
            id="full_name"
            name="full_name"
            required
          />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
          />
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input
            type="text"
            class="form-control"
            id="phone"
            name="phone"
            required
          />
        </div>
        <div class="form-group">
          <label for="event">Event</label>
          <select 
            class="form-control"
            id="event"
            name="event">
            <option>Birthday</option>
            <option>Holiday</option>
          </select>
        </div>
        <div class="form-group">
          <label for="event">Present</label>
          <select 
            class="form-control"
            id="present"
            name="present">
            <option value="Trailer">Trailer</option>
            <option value="2 tap kegerator">2 tap kegerator</option>
            <option value="6 tap cart">6 tap cart</option>
            <option value="Keg">Keg</option>
          </select>
        </div>
        <div class="form-group keg" style="display: none;">
          <label for="event">Keg</label>
          <select 
            class="form-control"
            id="keg"
            name="keg">
            <option>Home Brew</option>
            <option>Sixth Barrel</option>
            <option>Quarter Barrel</option>
            <option>Slim Quarter</option>
            <option>Half Barrel</option>
          </select>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <input type="hidden" name="action" value="reserve_form">
        <div class="form-group">
          <button type="submit" class="btn">Submit</button>
        </div>
      </div>
      <div class="col-md-6">
        <img src="/wp-content/themes/twentysixteen-child/image/1.jpg">
      </div>

    </div>
</div>