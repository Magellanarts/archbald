<aside class="ba-aside ba-container">
    <div class="ba-aside-inner">
        <div class="ba-aside-module">
            <?php
                $json_string = file_get_contents("http://api.wunderground.com/api/db6bc0a70858eb5d/geolookup/conditions/q/PA/Archbald.json");
                $parsed_json = json_decode($json_string);
                $location = $parsed_json->{'location'}->{'city'};
                $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
                $icon = $parsed_json->{'current_observation'}->{'icon_url'};
                $icon_type= $parsed_json->{'current_observation'}->{'icon'};
                $forecast= $parsed_json->{'current_observation'}->{'forecast_url'};
                
            ?>
            <h4 class="ba-aside-module-heading"><?php  echo date('l, F j') ?></h4>
            
            <div class="ba-weather">
                <div class="ba-weather-thermometer"></div>
                <div class="ba-container ba-weather-temperature">
                    
                        <img src="<?php echo $icon; ?>" alt="<?php echo $icon_type; ?>" />
                        <span><?php echo floor($temp_f);?>&deg; F</span>

                </div>
                <div class="ba-container ba-weather-forecast">
                    <a class="ba-weather-forecast-link" href="<?php echo $forecast; ?>">View the 5-day forecast</a>
                </div>
            </div>

        </div>

        <div class="ba-aside-module borough-info">

            <div class="borough-info-container">
            
                <a href="https://www.google.com/maps/preview#!q=Archbald%2C+PA&data=!4m10!1m9!4m8!1m3!1d3385!2d-75.539584!3d41.497932!3m2!1i1449!2i870!4f13.1" target="_blank" class="ba-borough-info-map-link"><img class="ba-borough-info-map" src="<?php bloginfo( 'template_url' ); ?>/img/archbald-map.png" alt="Borough of Archbald" /></a>

                <p>The Borough of Archbald is located in Northeastern Pennsylvania and is part of Lackawanna County in the Blue Ridge Mountain range. <a class="ba-aside-module-learn-more-link" href="#">Learn More</a></p>
                <div class="ba-office-contact-info">
                    <div class="ba-office-contact-info-office-hours ba-container">
                        <h5>Office Hours</h5>
                        <span>8:00 AM - 4:00 PM</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</aside>