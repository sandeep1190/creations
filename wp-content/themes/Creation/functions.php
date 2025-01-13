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


add_action('wp_ajax_submit_custom_form', 'submit_custom_form');
add_action('wp_ajax_nopriv_submit_custom_form', 'submit_custom_form');

function submit_custom_form() {
    // Validate nonce
    check_ajax_referer('custom_form_nonce', 'security');

    // Retrieve and sanitize form data
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $company = sanitize_text_field($_POST['company']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $comments = sanitize_textarea_field($_POST['comments']);
    $file = $_FILES['attachment'];

    // Required fields validation
    if (!$first_name || !$last_name || !$company || !$email || !$phone || empty($file['name'])) {
        wp_send_json_error('All fields except comments are required.');
    }

    // Handle file upload
    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['path'] . '/' . basename($file['name']);
    if (!move_uploaded_file($file['tmp_name'], $upload_path)) {
        wp_send_json_error('File upload failed.');
    }

    // Send email to admin
    $to = 'admin@example.com'; // Replace with your admin email
    $subject = 'New Form Submission';
    $message = "First Name: $first_name\nLast Name: $last_name\nCompany: $company\nEmail: $email\nPhone: $phone\nComments: $comments\n";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];
    $attachments = [$upload_path];

    if (wp_mail($to, $subject, $message, $headers, $attachments)) {
        // Send confirmation email to user
        $user_message = "Thank you for submitting the form. We will get back to you soon.";
        wp_mail($email, 'Form Submission Confirmation', $user_message, $headers);

        wp_send_json_success('Form submitted successfully!');
    } else {
        wp_send_json_error('Failed to send email. Please try again later.');
    }
}


function enqueue_custom_form_script() {
    wp_enqueue_script('custom-form-script', get_template_directory_uri() . '/custom-form.js', ['jquery'], null, true);
    wp_localize_script('custom-form-script', 'customForm', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('custom_form_nonce')
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_form_script');

