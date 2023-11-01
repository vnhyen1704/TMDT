<?php

    $fashion_estore_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $fashion_estore_scroll_position = get_theme_mod( 'fashion_estore_scroll_top_position','Right');
    if($fashion_estore_scroll_position == 'Right'){
        $fashion_estore_theme_css .='#button{';
            $fashion_estore_theme_css .='right: 20px;';
        $fashion_estore_theme_css .='}';
    }else if($fashion_estore_scroll_position == 'Left'){
        $fashion_estore_theme_css .='#button{';
            $fashion_estore_theme_css .='left: 20px;';
        $fashion_estore_theme_css .='}';
    }else if($fashion_estore_scroll_position == 'Center'){
        $fashion_estore_theme_css .='#button{';
            $fashion_estore_theme_css .='right: 50%;left: 50%;';
        $fashion_estore_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $fashion_estore_slider_img_opacity = get_theme_mod( 'fashion_estore_slider_opacity_color','');
    if($fashion_estore_slider_img_opacity == '0'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.1'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.1';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.2'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.2';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.3'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.3';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.4'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.4';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.5'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.5';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.6'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.6';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.7'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.7';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.8'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.8';
        $fashion_estore_theme_css .='}';
        }else if($fashion_estore_slider_img_opacity == '0.9'){
        $fashion_estore_theme_css .='.slider-box img{';
            $fashion_estore_theme_css .='opacity:0.9';
        $fashion_estore_theme_css .='}';
        }