          <!--  //? Swiper  Carousel -->

          <div class="container-fluid px-lg-4 mt-4">
            <div class="swiper swiper-container">
              <div class="swiper-wrapper">

               <?php  
               $res = selectAll('carousel');


               while ($row = mysqli_fetch_assoc($res)) {


                $path = CAROUSEL_IMG_PATH;
                   echo <<<data
                        <div class="swiper-slide">
                          <img src="$path$row[image]" class="w-100 d-block"style="height: 575px; object-fit: cover;" />
            
                        </div>

                                           
                 data;
            }
               
               
               ?>
<!--                 
                <div class="swiper-slide">
                  <img src="./images/carousel/2.png" class="w-100 d-block"style="height: 575px; object-fit: cover;" />
    
                </div>
                <div class="swiper-slide">
                  <img src="./images/carousel/14.jpg" class="w-100 d-block" style="height: 575px; object-fit: cover;" />
                </div>
              
                <div class="swiper-slide">
                  <img src="./images/carousel/13.jpg" class="w-100 d-block" style="height: 575px; object-fit: cover;" />
                </div>
                
                <div class="swiper-slide">
                  <img src="./images/carousel/4.jpeg" class="w-100 d-block"style="height: 575px; object-fit: cover;"/>
                </div>
                
                <div class="swiper-slide">
                  <img src="./images/carousel/7.jpeg" class="w-100 d-block"style="height: 575px; object-fit: cover;"/>
                </div>
                <div class="swiper-slide">
                  <img src="./images/carousel/9.jpeg" class="w-100 d-block"style="height: 575px; object-fit: cover;"/>
                </div>
                <div class="swiper-slide">
                  <img src="./images/carousel/10.jpeg" class="w-100 d-block"style="height: 575px; object-fit: cover;"/>
                </div>
                 -->
                
               

              </div>
            </div>

            <br><br><br>