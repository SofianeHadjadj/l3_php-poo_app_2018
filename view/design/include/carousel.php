          <h3>Derniers médias en ligne</h3>

          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
            <div class="secondary-slider mdl-shadow--4dp" style="min-height: 500px">

              <!-- 1er Slide -->

              <div class="t-slide current-t-slide text-slider">
                  <img src="https://picsum.photos/1800/900?image=868" alt="" />
                  <div class="t-slide-content">
                      <?php 
                          $newCar1=new ModeleFichier();  
                          $viewCarVid=$newCar1->viewCarousel1(); 
                      ?>
                  </div>
                </div>

                <!-- 2ème Slide -->

                <div class="t-slide text-slider">
                  <img src="https://picsum.photos/1800/900?image=839" alt="" />
                  <div class="t-slide-content">
                      <?php 
                          $newCar2=new ModeleFichier();  
                          $viewCarAud=$newCar2->viewCarousel2(); 
                      ?>                   
                  </div>
                </div>

                <!-- 3ème Slide -->

                <div class="t-slide text-slider">
                  <img src="https://picsum.photos/1800/900?image=821" alt="" />
                  <div class="t-slide-content">
                      <?php 
                          $newCar3=new ModeleFichier();  
                          $viewCarEb=$newCar3->viewCarousel3(); 
                      ?>  
                  </div>
                </div>

                <!-- Controleurs du Carousel -->

              <div class="t-slider-controls">
                <div class="arrow right-arrow">
                  <div class="arrow-container">
                    <div class="arrow-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                  </div>
                </div>
                <div class="arrow left-arrow">
                  <div class="arrow-container">
                    <div class="arrow-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                  </div>
                </div>
                <div class="t-dots-container">
                  <div class="t-slide-dots-wrap">
                    <div class="t-slide-dots">

                    </div>
                  </div>
                </div>
              </div>

            </div>
          </section>