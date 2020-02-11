<!-- Bootstrap Navigation Footer Walker -->
<?php 

class bootstrap_footer_menu_walker extends bootstrap_menu_walker
{
    function start_el( &$output, $item, $depth=0, $args=array(), $id = 0 )
    {
        // Preparing variables
        // https://www.ibenic.com/how-to-create-wordpress-custom-menu-walker-nav-menu-class/
        
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $output .= "<li class='" . 'nav-item '.  implode(" ", $item->classes) . "'>";
        
        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) 
        {
            $output .= "<a class='nav-link' href='" . $permalink . "'>";
        } 
        else 
        {
            $output .= '<span>';
        }
        
        $output .= $title;

        if( $description != '' && $depth == 0 ) 
        {
            $output .= '<small class="description">' . $description . '</small>';
        }

        if( $permalink && $permalink != '#' ) 
        {
            $output .= '</a>';
        } 
        else 
        {
            $output .= '</span>';
        }
        
    }
    
    function start_lvl( &$output, $depth = 0, $arg = Array() )
    {
        $output .= "\n<ul class='sub-menu'>\n";

        $output .= '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
    }

    function end_lvl(&$output, $depth=0, $args=array()) {
        
        $output .= "</div>\n";
        $output .= "</ul>\n";
    }

};


?>