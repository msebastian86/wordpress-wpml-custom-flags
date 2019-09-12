// ======= APPROACH 1 - create custom lang switcher =======

function flag_switcher() {
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );

    if ( !empty( $languages ) ) {
        foreach( $languages as $l => $field ) {
            if ( $field['code'] === 'en' ) {
                $field['country_flag_url'] = 'link-to-your-flag.png';
            }
            if ( $field['code'] === 'pl' ) {
                $field['country_flag_url'] = 'link-to-your-flag.png';
            }
            if ( $field['active'] == '1' ) {
            echo ' <a class="active" title="' . $field['native_name'] . '">'; 
            } else {
            echo ' <a href="' . $field['url'] . '" class="not-active" title="' . $field['native_name'] . '">'; 
            }
                echo $field['code'] . ' <img src="' . $field['country_flag_url'] . '" height="28" alt="' . $field['language_code'] . '" width="28" alt="' . $field['native_name'] . '"/>';
            echo '</a> ';
        }
    }
}

// add <?php flag_switcher(); ?> in place where you want your switcher
                
// ======= APPROACH 2 - filter wpml flags in existing nav's =======
                
function wpml_flags($languages)
{
    $languages['de']['country_flag_url'] = 'http://scratchy.trailerparkboys.com/wp-content/uploads/2016/07/Julian__Sunnyvale-300x199.jpg';
    $languages['pl']['country_flag_url'] = assetPath('images') . '/pl.png';
    $languages['en']['country_flag_url'] = assetPath('images') . '/en.png';
    
    return $languages;
}

add_filter('icl_ls_languages', 'wpml_flags');
