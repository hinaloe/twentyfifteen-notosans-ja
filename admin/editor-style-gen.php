<?php

header( 'Content-Type: text/css; charset=UTF-8' );
$weight_normal = filter_input( INPUT_GET, 'normal', FILTER_VALIDATE_INT );
$weight_bold = filter_input( INPUT_GET, 'bold', FILTER_VALIDATE_INT );
?>
/* TwentyFifteen NotoSans JP Font Weight settings for TinyMCE */
/* ** https://wordpress.org/plugins/twentyfifteen-noto-sans-jp/ ** */
/* ===<?php
if ( $weight_normal ) { echo 'Normal: ' . $weight_normal; }
if ( $weight_bold ) { echo 'Bold: ' . $weight_bold; }
?>=== */
<?php

if ( $weight_normal !== false && $weight_normal !== null ) :
?>
body,
button,
input,
select,
textarea,

.main-navigation .menu-item-description,
.post-navigation .meta-nav,
blockquote strong,
blockquote b,
.image-navigation .nav-previous:not(:empty) + .nav-next:not(:empty):before,
.comment-navigation .nav-previous:not(:empty) + .nav-next:not(:empty):before,
.site-description {
	font-weight: <?php echo $weight_normal; ?> !important
}


::-webkit-input-placeholder {
	font-weight: <?php echo $weight_normal; ?>
}
:-moz-placeholder {
	font-weight: <?php echo $weight_normal; ?>
}

:-ms-input-placeholder {
	font-weight: <?php echo $weight_normal; ?>
}
<?php
endif;

if ( $weight_bold !== false && $weight_bold !== null ) :
?>

h1,
h2,
h3,
h4,
h5,
h6,
b,
strong,
th,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.post-password-form label,
.main-navigation .current-menu-item > a,
.main-navigation .current-menu-ancestor > a,
.post-navigation,
.pagination .current,
.image-navigation,
.comment-navigation,
.site-title,
.widget_calendar caption,
.widget_calendar tbody a,
.widget_rss .rsswidget ,
.sticky-post,
.comment-list .reply a,
.comment-form label,
.no-comments,
.widecolumn label,
.widecolumn .mu_register label,
dt,
body.webkit strong, body.webkit b {
	font-weight: <?php echo $weight_bold; ?> !important
}
<?php
endif;
