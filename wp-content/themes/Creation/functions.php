<?php
/** 
 * Functions file.
 * 
 * To getting start design the theme, please begins by reading on this link. https://codex.wordpress.org/Theme_Development
 * You can make this theme as your parent theme (design new by modify this theme and make it yours).
 * But I recommend that you use this theme as parent and create your new child theme.
 * 
 * Learn more about template hierarchy, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package bootstrap-basic4
 */


// Required WordPress variable
if (!isset($content_width)) {
    $content_width = 1140;// this will be override again in inc/classes/BootstrapBasic4.php `detectContentWidth()` method.
}


// Configurations ----------------------------------------------------------------------------
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($bootstrapbasic4_sidebar_left_size)) {
    $bootstrapbasic4_sidebar_left_size = apply_filters('bootstrap_basic4_column_left', 3);
}
// Right sidebar column size.
if (!isset($bootstrapbasic4_sidebar_right_size)) {
    $bootstrapbasic4_sidebar_right_size = apply_filters('bootstrap_basic4_column_right', 3);
}
// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
// 
// Title separator. Please note that this value maybe able overriden by other plugins.
if (!isset($bootstrapbasic4_title_separator)) {
    $bootstrapbasic4_title_separator = '|';
}


// Require, include files ---------------------------------------------------------------------
require get_template_directory() . '/inc/classes/Autoload.php';
require get_template_directory() . '/inc/functions/include-functions.php';

// Setup auto load for load the class files without manually include file by file.
$Autoload = new \BootstrapBasic4\Autoload();
$Autoload->register();
$Autoload->addNamespace('BootstrapBasic4', get_template_directory() . '/inc/classes');
unset($Autoload);

// Call to actions/filters of the theme to enable features, register sidebars, enqueue scripts and styles.
$BootstrapBasic4 = new \BootstrapBasic4\BootstrapBasic4();
$BootstrapBasic4->addActionsFilters();
unset($BootstrapBasic4);

// Call to actions/filters of theme hook to hook into WordPress and make changes to the theme.
$Bsb4Hooks = new \BootstrapBasic4\Hooks\Bsb4Hooks();
$Bsb4Hooks->addActionsFilters();
unset($Bsb4Hooks);

// Call to auto register widgets.
$AutoRegisterWidgets = new BootstrapBasic4\Widgets\AutoRegisterWidgets();
$AutoRegisterWidgets->registerAll();
unset($AutoRegisterWidgets);

// Call to actions/filters of theme hook to hook into WordPress widgets.
$WidgetHooks = new \BootstrapBasic4\Hooks\WidgetHooks();
$WidgetHooks->addActionsFilters();
unset($WidgetHooks);

// Display theme help page for admin.
$ThemeHelp = new \BootstrapBasic4\Controller\ThemeHelp();
$ThemeHelp->addActionsFilters();
unset($ThemeHelp);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact_form'])) {
    // Sanitize and validate input fields
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $comments = sanitize_textarea_field($_POST['comments']);

    if (!is_email($email)) {
        echo '<script>document.getElementById("formMessage").innerText = "Invalid email address.";</script>';
        exit;
    }

    // Prepare email
    $to = 'sndpdhiman11@gmail.com'; // Replace with the recipient email
    $subject = 'New Contact Form Submission';
    $message = "
        <h3>Contact Form Submission</h3>
        <p><strong>First Name:</strong> $first_name</p>
        <p><strong>Last Name:</strong> $last_name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Comments:</strong> $comments</p>
    ";
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: Creation Jewel <info@creationjewel.co.in>'
    ];

    // Send email
    if (wp_mail($to, $subject, $message, $headers)) {
        echo '<script>document.getElementById("formMessage").innerText = "Email sent successfully!";</script>';
    } else {
        echo '<script>document.getElementById("formMessage").innerText = "Failed to send email. Please try again later.";</script>';
    }
}

add_action('wp_mail_failed', function ($wp_error) {
    error_log(print_r($wp_error, true));
});


add_action('phpmailer_init', 'configure_outlook_smtp');
function configure_outlook_smtp(PHPMailer $phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.office365.com'; // Outlook SMTP server
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587; // SMTP port for STARTTLS
    $phpmailer->SMTPSecure = 'tls'; // Encryption type
    $phpmailer->Username = 'info@creationjewel.co.in'; // Your Outlook email
    $phpmailer->Password = 'Guy48071'; // Your Outlook password
    $phpmailer->From = 'info@creationjewel.co.in'; // Sender email
    $phpmailer->FromName = 'Creation Jewel'; // Sender name
}



