# GP Breadcrumbs

## How to use
This is a simple shortcode plugin, so wherever you want breadcrumbs, just use the following shortcode
```
[gp-breadcrumbs]
```

## Hooks
If you want to use the breadcrumbs in your themes available hooks just use the following function
Replace "your_themes_hook" with the hook you want to use
```
function wcd_output_breadcrumbs() {
    echo do_shortcode('[gp-breadcrumbs]');
}
add_action( 'your_themes_hook', 'wcd_output_breadcrumbs' );
```