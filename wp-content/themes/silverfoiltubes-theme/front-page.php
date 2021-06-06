<?php get_header();?> 


<section id="hp-carousel">
  <div class="custom-width-carousel">
    <div id="main-carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php if($slides = get_field('slides') ) : ?>
          <?php foreach($slides as $key => $slide) : ?>
            <?php $img = $slide['hp_carousel_background'] ? $slide['hp_carousel_background']['url'] : placeholder(); ?>
            <div class="carousel-item<?= $key == 0 ? ' active': ''; ?>"  style="background-image: url(<?= $img ?>)">
              <?php if ($title = $slide['hp_carousel_title']) : ?>
                <div class="title"><?= $title; ?></div>
              <?php endif; ?>
              <?php if ($subTitle = $slide['hp_carousel_subtitle']) : ?>
                <div class="sub-title">
                  <?= $subTitle; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?> 
        <?php endif; ?>
      </div>
      <?php if(count($slides) > 1) : ?>
        <ol class="carousel-indicators">
          <?php foreach($slides as $key => $slide) : ?>
            <li data-target="#main-carousel" data-slide-to="<?= $key; ?>"<?= $key == 0 ? ' 
            class="active"' : 'class=""'; ?>></li>
          <?php endforeach; ?>
        </ol>
      <?php endif; ?>
    </div>
  </div>
</section>
<section id="hp-products">
  <div class="custom-width-products">
    <div class="content"> 
      <div class="title">
        <p>SILVERFOILTUBES <span>PRODUCTS</span></p>
      </div>
      <div class="description">
        <p>
          Lorem ipsum dolor sit amet, consectetur <span>adipiscing elit,</span> sed <span>do eiusmod tempor</span> incidid. sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
      </div>
      <div class="items row">
        <div class="col-12 col-lg-6 item-container">
          <div class="item" style="background-image: url('assets/images/product-1.png');">
            <div class="item-content active">
              <div class="item-text">
                <div class="item-title">
                  <p>CIGARETTE TUBES</p> 
                </div>
                <div class="item-description">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 item-container">
          <div class="item" style="background-image: url('assets/images/product-1.png');">
            <div class="item-content">
              <div class="item-text">
                <div class="item-title">
                  <p>CIGARETTE TUBES</p> 
                </div>
                <div class="item-description">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 item-container">
          <div class="item" style="background-image: url('assets/images/product-1.png');">
            <div class="item-content">
              <div class="item-text">
                <div class="item-title">
                  <p>CIGARETTE TUBES</p> 
                </div>
                <div class="item-description">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 item-container">
          <div class="item" style="background-image: url('assets/images/product-1.png');">
            <div class="item-content">
              <div class="item-text">
                <div class="item-title">
                  <p>CIGARETTE TUBES</p> 
                </div>
                <div class="item-description">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="contact-us" style="background-image: url('assets/images/bg-contact-us.png');">
  <div class="container-fluid">
    <div class="content">
      <div class="title">
        <span>CONTACT</span> US
      </div>
      <div class="address">
        Address:  Blk 1 Lot 10 Light Industry & Science Park III (LISP III) San Rafael, Sto. Tomas, Batangas
      </div>
      <div class="email-address">
        Email Address:  amado.tan@silverfoiltubes.com  |  janille.lim@silverfoiltubes.com
      </div>
      <div class="contact-number">
        Contact Number:  +16507735946  |  +16502922192
      </div>
    </div>
  </div>
</section>









<!-- <section class="hp-carousel">
  <div id="slides" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php if($slides = get_field('slides') ) : ?>
        <?php foreach($slides as $key => $slide) : ?>
          <?php $img = $slide['main_banner_image'] ? $slide['main_banner_image']['url'] : placeholder(); ?>
          <div class="carousel-item<?= $key == 0 ? ' active': ''; ?>"  style="background-image: url(<?= $img ?>)">
            <div class="contents">
              <div class="container carousel-text">
                <div class="row">
                  <div class="col-12">
                    <?php if ($title = $slide['main_banner_title']) : ?>
                      <div class="title"><?= $title; ?></div>
                    <?php endif; ?>
                    <?php if ($subTitle = $slide['main_banner_sub_title']) : ?>
                      <div class="sub-title">
                        <?= $subTitle; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?> 
      <?php endif; ?>
      <div class="carousel-indicator">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <?php if(count($slides) > 1) : ?>
                <ol class="carousel-indicators">
                  <?php foreach($slides as $key => $slide) : ?>
                    <li data-target="#slides" data-slide-to="<?= $key; ?>"<?= $key == 0 ? ' 
                    class="active"' : 'class=""'; ?>></li>
                  <?php endforeach; ?>
                </ol>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<?php get_footer(); ?>