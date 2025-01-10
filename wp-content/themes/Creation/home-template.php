<?php
/* Template Name: Home Page */
get_header();
?>

<div id="wrapper">
<section class="video-section">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
          
            $banner_group = get_field('banner');  
            if ($banner_group) {
                
                if (isset($banner_group['home_banner'])) {
                    $video_file = $banner_group['home_banner']; 
                    echo '<div class="uploaded-video">';

                   
                    if (isset($banner_group['banner_content']) && !empty($banner_group['banner_content'])) {
                        $banner_content = $banner_group['banner_content'];
                        echo '<div class="banner-content">';
                        echo wp_kses_post($banner_content);
                        echo '</div>';
                    }

                    
                    echo '<video autoplay loop muted playsinline width="100%" height="400">';
                    echo '<source src="' . esc_url($video_file) . '" type="video/mp4">';
                    echo 'Your browser does not support the video tag.';
                    echo '</video>';
                    echo '</div>';
                }
        
                
                if (isset($banner_group['banner_description'])) {
                    $banner_description = $banner_group['banner_description']; 
                    echo '<div class="container">';
                    echo '<div class="desc">';
                    echo wp_kses_post($banner_description);
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No video or description uploaded yet.</p>';
            }
        endwhile;
    endif;
    ?>
</section>


    <section id="mapSection">
        <div class="innerlogo text-right">
            <img src="<?php the_field('home_logo'); ?>">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="map text-center">
                    <img src="<?php the_field('home_map'); ?>">
                </div>
                <!-- <div class="heading col-12 text-center">
                    <span>
                        <?php //the_field('home_heading'); ?>
                    </span>
                </div> -->
            </div>
        </div>
        <div class="container custom_container">
            <div class="row justify-content-center">
                <div class="des">
                    <?php the_field('home_description'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="common" id="aboutUs">
        <div class="container">
            <div class="row  justify-content-between align-items-center">
                <!-- Left Column: Image -->
                <div class="col-lg-4">
                    <?php
                   
                    $about_us_group = get_field('about_us');
                    if ($about_us_group) {
                        if (isset($about_us_group['about_image'])) {
                            $about_image = $about_us_group['about_image']; 
                            
                           
                            if (is_array($about_image)) {
                                
                                echo '<img src="' . esc_url($about_image['url']) . '" alt="' . esc_attr($about_image['alt']) . '" class="img-fluid" />';
                            } else {
                               
                                echo '<img src="' . esc_url($about_image) . '" class="img-fluid" />';
                            }
                        }
                    }
                    ?>
                </div>

                <!-- Right Column: Heading and Content -->
                <div class="col-lg-8">
                    <?php
                    if ($about_us_group) {
                        // About Title
                        if (isset($about_us_group['about_title'])) {
                            $about_title = $about_us_group['about_title'];
                            echo '<h2>' . esc_html($about_title) . '</h2>';
                        }

                        // About Description
                        if (isset($about_us_group['about_description'])) {
                            $about_description = $about_us_group['about_description']; 
                            echo '<div class="about-description">';
                            echo wp_kses_post($about_description); 
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No About Us content found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="common" id="factory">
        <!-- Title Outside the Container -->
       

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center heading">
                <?php
                    $about_us_group = get_field('factory');
                    if ($about_us_group) {
                        if (isset($about_us_group['factory_title'])) {
                            $about_title = $about_us_group['factory_title'];
                            echo '<h2 class="factory-title">' . esc_html($about_title) . '</h2>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <!-- Left Column: Image -->
                <div class="col-lg-4">
                    <div class="uploaded-video">
                    <video autoplay loop muted>
    <source src="http://3.6.49.70/creations/wp-content/uploads/2025/01/factory1.mp4" type="video/mp4" />
</video>
                </div>
    <!-- <?php
    // if ($about_us_group) {
    //     if (isset($about_us_group['factory_image'])) {
    //         $video_url = $about_us_group['factory_image']; // Fetch the text field value (URL)

    //         // Check if the URL is not empty
    //         if (!empty($video_url)) {
    //             echo '<div class="uploaded-video">';
    //             echo '<video autoplay loop muted playsinline width="100%" height="400">';
    //             echo '<source src="' . esc_url($video_file) . '" type="video/mp4">';
    //             echo 'Your browser does not support the video tag.';
    //             echo '</video>';
    //             echo '</div>';
    //         } else {
    //             echo '<p>No video URL provided.</p>';
    //         }
    //     } else {
    //         echo '<p>factory_image field is not set.</p>';
    //     }
    // } else {
    //     echo '<p>Group field not found.</p>';
    // }
    ?> -->
</div>



                <!-- Right Column: Heading and Content -->
                <div class="col-lg-8">
                    <?php
                    if ($about_us_group) {
                        // About Description
                        if (isset($about_us_group['factory_description'])) {
                            $about_description = $about_us_group['factory_description']; 
                            echo '<div class="about-description">';
                            echo wp_kses_post($about_description); 
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No About Us content found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="common factoryManu" id="factory">
        <!-- Title Outside the Container -->
       

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center heading">
                <?php
                    $about_us_group = get_field('factory_manufacturing');
                    if ($about_us_group) {
                        if (isset($about_us_group['factory_manufacturing_title'])) {
                            $about_title = $about_us_group['factory_manufacturing_title'];
                            echo '<h2 class="factory-title">' . esc_html($about_title) . '</h2>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row justify-content-between  align-items-center">
                <!-- Left Column: Image -->
                <div class="col-lg-4">
                <div class="uploaded-video">
                    <video autoplay loop muted>
    <source src="http://3.6.49.70/creations/wp-content/uploads/2025/01/factory2.mp4" type="video/mp4" />
</video>
                </div>
    <!-- <?php
    // if ($about_us_group) {
    //     // Check if 'factory_manufacturing_image' field exists
    //     if (isset($about_us_group['factory_manufacturing_image'])) {
    //         $video_url = $about_us_group['factory_manufacturing_image']; // Fetch the text field value (URL)

    //         // Check if the URL is not empty
    //         if (!empty($video_url)) {
    //             echo '<div class="uploaded-video">';
    //             echo '<video autoplay loop muted playsinline width="100%" height="400">';
    //             echo '<source src="' . esc_url($video_file) . '" type="video/mp4">';
    //             echo 'Your browser does not support the video tag.';
    //             echo '</video>';
    //             echo '</div>';
    //         } else {
    //             echo '<p>No video URL provided.</p>';
    //         }
    //     } else {
    //         echo '<p>factory_manufacturing_image field is not set.</p>';
    //     }
    // } else {
    //     echo '<p>Group field not found.</p>';
    // }
    ?> -->
</div>


                <!-- Right Column: Heading and Content -->
                <div class="col-lg-8">
                    <?php
                    if ($about_us_group) {
                        // About Description
                        if (isset($about_us_group['factory_manufacturing_description'])) {
                            $about_description = $about_us_group['factory_manufacturing_description']; 
                            echo '<div class="about-description">';
                            echo wp_kses_post($about_description); 
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No About Us content found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="our-services common" id="our-services">
        <div class="container">
            <!-- First Row: Title and Short Description -->
            <?php
            $our_services_group = get_field('our_services');
            if ($our_services_group) {
                // Title
                if (isset($our_services_group['services_title'])) {
                    $services_title = $our_services_group['services_title'];
                    echo '<h2 class="services-title">' . esc_html($services_title) . '</h2>';
                }

                // Short Description
                if (isset($our_services_group['services_short_description'])) {
                    $services_short_description = $our_services_group['services_short_description'];
                    echo '<div class="services-short-description">';
                    echo wp_kses_post($services_short_description);
                    echo '</div>';
                }
            }
            ?>

            <!-- Second Row: Image on Left and Description on Right -->
            <div class="row justify-content-between  align-items-end">
                <!-- Left Column: Image -->
                <div class="col-lg-5 serviceImg">
                    <?php
                    if ($our_services_group) {
                        if (isset($our_services_group['services_image'])) {
                            $services_image = $our_services_group['services_image'];
                            if (is_array($services_image)) {
                                echo '<img src="' . esc_url($services_image['url']) . '" alt="' . esc_attr($services_image['alt']) . '" class="img-fluid" />';
                            } else {
                                echo '<img src="' . esc_url($services_image) . '" class="img-fluid" />';
                            }
                        }
                    }
                    ?>
                </div>

                <!-- Right Column: Inner Description -->
                <div class="col-lg-7">
                    <?php
                    if ($our_services_group) {
                        if (isset($our_services_group['service_inner_description'])) {
                            $service_inner_description = $our_services_group['service_inner_description'];
                            echo '<div class="service-inner-description">';
                            echo wp_kses_post($service_inner_description);
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- New Row: Additional Content -->
            <div class="row">
                <div class="col-12">
                    <?php
                    if ($our_services_group) {
                        if (isset($our_services_group['service_content'])) {
                            $service_content = $our_services_group['service_content'];
                            echo '<div class="service-content">';
                            echo wp_kses_post($service_content); // Display the content safely
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="product-section common" id="product">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <?php
                    $product_group = get_field('product');
                    if ($product_group) {
                        // Product Title
                        if (!empty($product_group['product_title'])) {
                            echo '<h2 class="product-title">' . esc_html($product_group['product_title']) . '</h2>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="innerProduct">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Column: Heading and Description -->
                    <!-- <div class="col-lg-5">
                    <?php
                        // if ($product_group) {
                        //     // Product Heading
                        //     if (!empty($product_group['product_heading'])) {
                        //         echo '<h3 class="product-heading">' . esc_html($product_group['product_heading']) . '</h3>';
                        //     }

                        //     // Product Description
                        //     if (!empty($product_group['product_desctiption'])) {
                        //         echo '<div class="product-description">';
                        //         echo wp_kses_post($product_group['product_desctiption']);
                        //         echo '</div>';
                        //     }
                        // }
                        ?>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <section class="product-carousel">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Owl Carousel Wrapper -->
                    <div class="owl-carousel owl-theme">
    <?php if( have_rows('product_gallery') ): // Check if repeater field has rows ?>
        <?php while( have_rows('product_gallery') ): the_row(); // Loop through rows ?>
            <?php 
            // Get the video URL from the text field
            $video_url = get_sub_field('product_gallery_image'); 
            ?>
            <?php if( !empty($video_url) ): // Check if video URL is not empty ?>
                <div class="video-item">
                    <video autoplay loop muted playsinline class="img-fluid">
                        <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php else: ?>
                <p>No video URL provided.</p>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No videos found in the gallery.</p>
    <?php endif; ?>
</div>

                </div>
            </div>
        </div>
    </section>

    <section class="responsibility-section common" id="responsibility">
    <div class="container">
        <div class="row">
            <div class="col-12 text-left">
                <h2><?php the_field('res_title'); ?></h2>
            </div>
        </div>
        <?php if( get_field('responsibility') ): ?>
    <?php $counter = 1; // Initialize a counter ?>
    <?php while( the_repeater_field('responsibility') ): ?>
        <?php
        // Determine the additional class based on the counter or other logic
        $additional_class = '';
        $col_lg_3_class = 'col-lg-3';
        $col_lg_8_class = 'col-lg-8'; // Default class

        if ($counter == 2) {
            $additional_class = 'section-two';
            $col_lg_3_class = 'col-lg-4'; // Adjust column width for section-two
        }

        if ($counter == 1) {
            $col_lg_8_class = 'col-lg-9'; // Change col-lg-8 to col-lg-9 only for the first row
        }
        ?>
        <div class="row repeaterRow justify-content-between align-items-center <?php echo $additional_class; ?>">
            <div class="<?php echo $col_lg_3_class; ?>">
                <img src="<?php the_sub_field('res_image'); ?>" class="img-fluid">
            </div>
            <div class="<?php echo $col_lg_8_class; ?>">
                <div class="des_res">
                    <?php the_sub_field('res_descripition'); ?>
                </div>
            </div>
        </div>
        <?php $counter++; // Increment the counter ?>
    <?php endwhile; ?>
<?php endif; ?>

  

    </div>
</section>

    <section class="contact-us-section common" id="contactUs">
        <div class="container">
            <!-- Section Title -->
            <?php 
            $contact_title = get_field('contact_title');
            if ($contact_title): ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="section-title"><?php echo esc_html($contact_title); ?></h2>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Contact Section Content -->
            <div class="row align-items-start mt-4 justify-content-center align-items-center">
                <!-- Left Column: Heading and Description -->
                <div class="col-lg-6">
                    <?php 
                    $contact_form_heading = get_field('contact_form_heading');
                    $contact_form_shortcode = get_field('contact_form_shortcode');
                    ?>
                    <?php if ($contact_form_heading): ?>
                        <h3 class="form-heading"><?php echo esc_html($contact_form_heading); ?></h3>
                    <?php endif; ?>
                    <?php if ($contact_form_shortcode): ?>
                        <div class="contact-form">
                            <?php echo do_shortcode($contact_form_shortcode); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>




</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

<script>
    jQuery(document).ready(function($) {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    margin:0
                },
                800: {
                    items: 4
                },
                1024: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        });
    });
</script>


<?php
get_footer(); 
?>