<?php
/** 
 * The theme footer.
 * 
 * @package bootstrap-basic4
 */
?>
            </div><!--.site-content-->


            <footer id="site-footer" class="site-footer page-footer">
            <div class="container page-container">
                <div id="footer-row" class="row">
                    <div class="col-lg-3 footerCustom">
                        <?php dynamic_sidebar('footer-left'); ?> 
                    </div>
                    <div class="col-lg-4 footerCustom">
                    <?php dynamic_sidebar('footer-right'); ?> 
                    </div>
                    
                    
                    <!-- <div class="col-md-6 footer-left">
                        <?php 
                        //if (!dynamic_sidebar('footer-left')) {
                            /* translators: %s: WordPress text with link. */
                            //printf(__('Powered by %s', 'bootstrap-basic4'), '<a href="https://wordpress.org" rel="nofollow">WordPress</a>');
                            //echo ' | ';
                           // if (function_exists('the_privacy_policy_link')) {
                               // the_privacy_policy_link('', ' | ');
                          //  }
                            /* translators: %s: Bootstrap Basic 4 text with link. */
                           // printf(__('Theme: %s', 'bootstrap-basic4'), '<a href="https://rundiz.com" rel="nofollow">Bootstrap Basic4</a>');
                       // } 
                        ?> 
                    </div>
                    <div class="col-md-6 footer-right text-right">
                        <?php //dynamic_sidebar('footer-right'); ?> 
                    </div> -->
                </div>
            </footer><!--.page-footer-->
            <div class="footerLogo">
                    <div class="container">
                        <div class="row">
                            <div class="blockImg">
                                <div class="innerlogo">
                                <img src="http://3.6.49.70/creations/wp-content/uploads/2024/12/width_201.png">
                                </div>
                                    
                            </div>
                            <div class="blockImg">
                                <div class="innerlogo">
                                    <img src="http://3.6.49.70/creations/wp-content/uploads/2025/01/IGI-logo.png">
                                </div>
                            </div>
                            <div class="blockImg">
                                <div class="innerlogo">
                                    <img src="http://3.6.49.70/creations/wp-content/uploads/2025/01/GIA-logo.png">
                                </div>
                            </div>
                            <div class="blockImg">
                                <div class="innerlogo">
                                    <img src="http://3.6.49.70/creations/wp-content/uploads/2025/01/Costco-logo.png">
                                </div>
                            </div>
                            <div class="blockImg">
                                <div class="innerlogo">
                                    <img src="http://3.6.49.70/creations/wp-content/uploads/2025/01/Walmart-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div><!--.page-container-->
                    </div>

        <!--WordPress footer-->
        <?php wp_footer(); ?> 
        <!--end WordPress footer-->

        <script>
            jQuery(document).ready(function() {
                jQuery('a').on('click', function(event) {
        event.preventDefault(); // Prevent default anchor behavior

        // Get the target section's ID from the href attribute
        var target = jQuery(this).attr('href');
        var offset = jQuery(target).offset().top; // Get the top position of the target

        // Animate the scroll to the target section
        jQuery('html, body').animate({
            scrollTop: offset
        }, 1000); // Adjust the duration (in milliseconds) as needed
    });
});
            </script>
    </body>
</html>
