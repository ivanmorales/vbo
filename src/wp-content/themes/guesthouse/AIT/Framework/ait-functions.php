<?php

/**
 * AIT WordPress Framework
 *
 * Copyright (c) 2011, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */


/**
 * Load own jQuery from Google APIs (deregister from Wordpress)
 * @param string $version Version from jQuery Google API, eg. 1.6.2
 */
function aitLoadJQuery($version)
{
    // deregister the original version of jQuery
    wp_deregister_script('jquery');
    // discover the correct protocol to use
    $protocol = 'http:';

    if(isset($_SERVER['HTTPS'])){
       $protocol = 'https:';
    }
    // register the Google CDN version
    wp_register_script('jquery', $protocol.'//ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js', false, $version);
    // add it back into the queue
    wp_enqueue_script('jquery');
}



/**
 *
 * @param string $url Requested URL
 * @param int $cacheExpire Expire time in seconds
 * @param string $cacheKey Name of cache file
 * @return stdClass|SimpleXMLElement JSON object or XML object
 */
function aitFileCachedRemoteRequest($url, $cacheExpire, $cacheKey)
{
	$cacheFile = AIT_CACHE_DIR . '/' . $cacheKey . md5($url);
	$cache = @file_get_contents($cacheFile); // intentionally @
	$cache = strncmp($cache, '<', 1) ? @json_decode($cache) : @simplexml_load_string($cache); // intentionally @

	if($cache && @filemtime($cacheFile) + $cacheExpire > time()){ // intentionally @
		return $cache;

	}else{
		$request = wp_remote_get($url);

		if($request['response']['code'] == 200){
			$payload = $request['body'];

			if(strncmp($payload, '<', 1)){
				@file_put_contents($cacheFile, $payload);
				$payload = json_decode($payload);
			}else{
				$payload = simplexml_load_string($payload);
				@file_put_contents($cacheFile, $payload->asXml());
			}

			return $payload;

		}else{
			return false;
		}
	}
}



/**
 *
 * @param string prefix Prefix for transient key
 * @param string $url Requested URL
 * @param int $cacheExpire Expire time in seconds
 * @param string $id Id of HTML element to be selected via DOMDocument::getElementById()
 * @return stdClass|SimpleXMLElement JSON object or XML object
 */
function aitCachedRemoteRequest($prefix, $url, $cacheExpire, $id = null)
{
	$cacheTransient = substr($prefix, 11) . '_' . md5($url);
	$cache = get_transient($cacheTransient);

	if($cache !== false){
		// xml
		if(strncasecmp(trim($cache), '<?xml', 5) === 0){
			return @simplexml_load_string($cache); // intentionally @

		// html
		}elseif(strncasecmp(trim($cache), '<', 1) === 0){
			return $cache;

		// json
		}elseif(strncasecmp(trim($cache), '{', 1) === 0 || strncasecmp(trim($cache), '[', 1) === 0){
			return @json_decode($cache);
		}
	}else{

		$request = wp_remote_get($url);

		if(!is_wp_error($request)){

			if($request['response']['code'] == 200){
				$payload = $request['body'];

				// xml
				if(strncasecmp(trim($payload), '<?xml', 5) === 0){
					$payload = simplexml_load_string($payload);
					set_transient($cacheTransient, $payload->asXml(), $cacheExpire);

				// html
				}elseif(strncasecmp(trim($payload), '<', 1) === 0){
					$payload = str_replace("\r", '', $payload);
					$dom = new DOMDocument;
					@$dom->loadHTML($payload);
					$div = $dom->getElementById($id);
					$payload = $dom->saveXML($div);
					set_transient($cacheTransient, $payload, $cacheExpire);

				// json
				}elseif(strncasecmp(trim($payload), '{', 1) === 0 || strncasecmp(trim($payload), '[', 1) === 0){
					set_transient($cacheTransient, $payload, $cacheExpire);
					$payload = json_decode($payload);

				}

				return $payload;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}
}



/**
 * Gets all available fonts for theme
 * @return array Fonts
 */
function aitGetFonts($type = 'all')
{
	$fonts = array();
	$cufonFonts = array();
	$googleFonts = array();

	if($type == 'cufon' or $type == 'all'){
		foreach(glob(THEME_FONTS_DIR . '/*.js') as $i => $font){
			$content = file_get_contents($font);
			preg_match_all('/"font-family":"([a-zA-Z0-9 ]+)/m', $content, $matches);
			if(isset($matches[1])){
				$cufonFonts[$i]['font'] = str_replace(' ', '+', $matches[1][0]);
				$cufonFonts[$i]['file'] = basename($font);
			}
		}
	}

	if($type == 'google' or $type == 'all'){
		$file = AIT_FRAMEWORK_DIR . "/Libs/GoogleFonts.txt";
		foreach(file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $font){
			$googleFonts[]['font'] = $font;
		}
	}

	if(!empty($cufonFonts)){
		$fonts['cufon'] = array(
			'title' => __('Cufon Fonts', THEME_CODE_NAME),
			'fonts' => $cufonFonts,
		);
	}

	if(!empty($googleFonts)){
		$fonts['google'] = array(
			'title' => __('Google Fonts', THEME_CODE_NAME),
			'fonts' => $googleFonts,
		);
	}

	if($type != 'all'){
		unset($fonts[$type]);
	}

	return $fonts;
}



/**
 * Returns HTML <select> dropdown element for Fonts
 * @param string $name Value of attr. name
 * @param string $id Value of attr. id
 * @param string $type Cufon, Google Fonts or both?
 * @return string HTML <select> element
 */
function aitFontsDropdown($name, $id = 'ait-fonts-dropdown', $selected = '', $type = 'all', $dataAttr = '')
{
	$fonts = aitGetFonts($type);

	if(substr($name, -6, 6) == '[font]')
		$name = substr($name, 0, -6);

	$return  = "<select name=\"{$name}[font]\" id=\"$id\" {$dataAttr}>";
	$return .= "<option>" . __('- select font -', THEME_CODE_NAME) . "</option>";

	$selectedType = '';
	$selectedFile = '';

	foreach($fonts as $type => $group){
		$return .= "<optgroup label=\"{$group['title']}\" class=\"$type\">";
		foreach($group['fonts'] as $font){

			$s = '';
			$class = '';
			$f = '';
			if(isset($font['file'])){
				$class = "class=\"{$font['file']}\"";
				$f = $font['file'];
			}

			if($selected == $font['font']){
				$s = 'selected';
				$selectedType = $type;
				$selectedFile = $f;
			}

			$return .= "<option value=\"{$font['font']}\" $class $s>" . str_replace('+', ' ', $font['font']) . "</option>";
		}
		$return .= "</optgroup>";
	}
	$return .= "</select>";

	$return .= "<input type=\"hidden\" id=\"$id-type\" name=\"{$name}[type]\" value=\"$selectedType\">";
	$return .= "<input type=\"hidden\" id=\"$id-file\" name=\"{$name}[file]\" value=\"$selectedFile\">";

	$return .= "<script>
		jQuery(function(){
			var aitFontsDropdowns = [], aitFontsDropdownTypes = [], aitFontsDropdownFiles = [];
			aitFontsDropdowns['{$id}'] = jQuery('#{$id}');
			aitFontsDropdownTypes['{$id}'] = jQuery('#{$id}-type');
			aitFontsDropdownFiles['{$id}'] = jQuery('#{$id}-file');
			aitFontsDropdowns['{$id}'].change(function(){
				var \$selected = aitFontsDropdowns['{$id}'].find('option:selected');
				var type = \$selected.parent().attr('class');
				var file = \$selected.attr('class') != undefined ? \$selected.attr('class') : '';
				aitFontsDropdownTypes['{$id}'].val(type);
				aitFontsDropdownFiles['{$id}'].val(file);
			});
		});
		</script>
	";

	return $return;
}



/**
 * Generates CSS from LESS
 * @param string $input Absolut path to LESS file
 * @param string $output Absolut path to CSS file
 * @param array $options
 */
function aitSaveLess2Css($input = null, $output = null, $options = null)
{
	if($input === null and $output === null and $options === null){
		$options = get_option(AIT_OPTIONS_KEY);
		$input = THEME_DIR . "/style.less.css";
		$output = THEME_STYLESHEET_FILE;
	}

	if($options === false){ // for theme preview
		$options = aitGetThemeDefaultOptions($GLOBALS['aitThemeConfig']);
	}

	$less = new lessc();
	$less->importDir = THEME_DIR . '/';

	$content = file_get_contents($input);

	$onlyDesignVars = true;

	$configTypes = aitGetOptionsTypes($GLOBALS['aitThemeConfig'], $onlyDesignVars);

	$customCss = aitGetOptionsByType(array('custom-css', 'custom-css-vars'), $configTypes, $options);

	if(isset($customCss['custom-css'])){
		foreach($customCss['custom-css'] as $css){
			$content .= $css['value'];
			unset($options[$css['section']][$css['key']]);
		}
	}

	$variables = aitPrepareVariablesForLess($options, $configTypes);
	try{
		$css = $less->parse($content, $variables);
	}catch(Exception $e){
		wp_die($e->getMessage());
	}

	// save also comment header
	preg_match("/\/\*.*?\*\//s", $content, $match);
	$header = $match[0];

	unset($content); // clean up

	$header .= "\n\n/* *************************************\n *    !!! Do not edit this file !!!    *\n * Please edit style.less.css instead. *\n * *********************************** */\n\n";

	if(!defined('AIT_DEVELOPMENT') or AIT_DEVELOPMENT != true)
		$css = preg_replace('~\\s*([:;{},])\\s*~', '\\1', preg_replace('~/\\*.*\\*/~sU', '', $css));


	@chmod($output, 0777);
	$written = @file_put_contents($output, $header . "\n" . $css);
	@chmod($output, 0755);

	if($written === false)
		return false;
	else
		return true;
}



/**
 * Converts structured config array to simple key => value array
 * @param array $options Config array
 * @return array
 */
function aitPrepareVariablesForLess($options = null, $configTypes = null)
{
	if($options === null){
		$options = get_option(AIT_OPTIONS_KEY);
	}

	if($configTypes === null){
		$onlyDesignVars = true;
		$configTypes = aitGetOptionsTypes($GLOBALS['aitThemeConfig'], $onlyDesignVars);
	}

	$variables = array();
	foreach($options as $section => $values){
		foreach($values as $option => $value){
			if(isset($configTypes[$section][$option])){
				if($configTypes[$section][$option] == 'custom-css'){
					continue;
				}

				if(is_string($value)){
					if(empty($value)){
						$variables[$option] = '';
					}else{
						$variables[$option] = $value;
					}
					// url to images must be in quotes
					if(preg_match('/\.(jpg|png|gif)/', $variables[$option]) !== 0)
						$variables[$option] = "\"$variables[$option]\"";

				}elseif(is_array($value) and isset($value['font']) and !empty($value['type'])){
					$variables[$option] = "'" . str_replace('+', ' ', $value['font']) . "'";

				}elseif($configTypes[$section][$option] == 'custom-css-vars' and is_array($value)){
					foreach($value as $var){
						if(isset($var['variable']) and isset($var['value']) and !empty($var['variable']) and !empty($var['value'])){
							if(preg_match('/\.(jpg|png|gif)/', $var['value']) !== 0)
								$var['value'] = "\"$var[value]\"";
							$variables[$var['variable']] = $var['value'];
						}
					}
				}
			}
		}
	}
	return $variables;
}



/**
 * Gets default values from Neon theme config file
 * @param type $config
 * @return type
 */
function aitGetThemeDefaultOptions($config)
{
	$settings = $config;
	$defaults = array();

	foreach($config as $menu_key => $page){

		if(isset($page['tabs'])){
			foreach($page['tabs'] as $tab_key => $tab_page){
				unset($settings[$menu_key]);
				$settings[$tab_key] = $tab_page;
			}
		}
	}

	// Niagara waterfalls. Yeaah
	foreach($settings as $key => $value){
		foreach($value['options'] as $k => $v){
			if(isset($k['sortable']) and is_string($v) and substr($v, 0, 7) == 'section' and isset($v[7]) and $v[7] == ' ' and isset($v[8])){
				$defaults[$key]['sectionsOrder'][] = trim(strstr($v, ' '));
			}elseif(!is_string($v)){
				if(!isset($v['default']))
					$v['default'] = '';

				if(is_array($v['default']) and $v['type'] != 'clone' and $v['type'] != 'custom-css-vars'  and $v['type'] != 'order'){
					foreach($v['default'] as $name => $val){
						if(isset($val['checked'])){
							$defaults[$key][$k][$name] = $name;
							if($v['type'] != 'checkbox'){ // check box could have multiple options checked
								$defaults[$key][$k] = $name;
							}
						}
					}

				}elseif((is_array($v['default']) and $v['type'] == 'order')){
					$defaults[$key][$k] = array_keys($v['default']);

				//cloning
				}elseif((is_array($v['default']) and $v['type'] == 'clone') or (is_array($v['default']) and $v['type'] == 'custom-css-vars')){
					foreach($v['default'] as $name => $val){
						foreach($val as $clone_key => $clone_val){
							if(!isset($clone_val['default']))
								$clone_val['default'] = '';
							if(isset($clone_val['default']) and !is_array($clone_val['default'])){
								if(!empty($clone_val['default']) and $clone_val['type'] == 'image-url'){
									$clone_val['default'] = THEME_URL . '/' . $clone_val['default'];
								}
								$defaults[$key][$k][$name][$clone_key] = $clone_val['default'];
							}else{
								foreach($clone_val['default'] as $x => $y){
									if(isset($y['checked'])){
										$defaults[$key][$k][$name][$clone_key][$x] = $x;
										if($clone_val['type'] != 'checkbox'){
											$defaults[$key][$k][$name][$clone_key] = $x;
										}
									}else{
										if($clone_val['type'] == 'checkbox'){
											$defaults[$key][$k][$name][$clone_key][$x] = array();
										}
									}
								}
							}
						}
					}
				}else{
					if(!empty($v['default']) and $v['type'] == 'image-url'){
						$v['default'] = THEME_URL . '/' . $v['default'];
					}

					if($v['type'] == 'dropdown-categories')
						$v['default'] = 0;

					if(!empty($v['default']) and $v['type'] == 'font'){
						$v['default'] = array(
							'font' => str_replace(' ', '+', $v['default']),
							'type' => '',
							'file' => '',
						);

						foreach(aitGetFonts() as $type => $fonts){
							foreach($fonts['fonts'] as $font){
								if($v['default']['font'] == $font['font']){
									$v['default']['type'] = $type;
									if($type == 'cufon')
										$v['default']['file'] = $font['file'];

									break;
								}
							}
						}
					}
					$defaults[$key][$k] = $v['default'];
				}
			}
		}
	}
	return $defaults;
}



/**
 * Gets default values from Neon theme config file
 * @param type $config
 * @return type
 */
function aitGetOptionsTypes($config, $onlySkinable = false)
{
	$settings = $config;
	$types = array();
	// $types[<section>][<key>] = <type>

	foreach($config as $menuKey => $page){

		if(isset($page['tabs'])){
			foreach($page['tabs'] as $tabKey => $tabPage){
				unset($settings[$menuKey]);
				$settings[$tabKey] = $tabPage;
			}
		}
	}

	$designTypes = array('colorpicker', 'image-url', 'font', 'select', 'radio', 'custom-css', 'custom-css-vars');

	foreach($settings as $section => $options){
		foreach($options['options'] as $key => $value){
			if(is_string($value) and startsWith('section', $value)){
				continue;
			}

			if($onlySkinable){

				if(in_array($value['type'], $designTypes) and (!isset($value['skinable']) or (isset($value['skinable']) and $value['skinable'] != false))){
					if(($value['type'] == 'select' or $value['type'] == 'radio') and (endsWith('X', $key) or endsWith('Y', $key) or endsWith('Repeat', $key) or endsWith('Attach', $key))){
						$types[$section][$key] = $value['type'];
					}else{
						$types[$section][$key] = $value['type'];
					}
				}

				if(isset($value['skinable']) and $value['skinable'] == true){
					$types[$section][$key] = $value['type'];
				}

			}else{
				$types[$section][$key] = $value['type'];
			}
		}
	}
	return $types;
}



function aitGetOptionsByType($optionType, $optionsTypes, $options)
{
	$return = array();

	foreach($optionsTypes as $section => $opts){
		foreach($opts as $key => $value){
			if(is_string($optionType) and $optionType == $value){
				$return[] = array('section' => $section, 'key' => $key, 'value' => $options[$section][$key]);
			}elseif(is_array($optionType)){
				foreach($optionType as $type){
					if($type == $value and isset($options[$section][$key])){
						$return[$type][] = array('section' => $section, 'key' => $key, 'value' => $options[$section][$key]);
					}
				}
			}
		}
	}

	return $return;
}




/**
 * Loads and parses Neon theme config files
 * @param string $filename Absoluth path to config file
 * @return array
 */
function loadConfig($filename)
{
	$file = realpath($filename);
	if($file === false)
		return false;
	$options = NNeon::decode(file_get_contents($file));
    return $options;
}



/**
 * Converts raw array to object
 * @param array $array
 * @return stdClass|boolean
 */
function arrayToObject($array)
{
	$temp = array();
	$object = new stdClass;
	if (is_array($array) and count($array) > 0){
		foreach($array as $name => $value){
			foreach($value as $k => $v){
				if(is_array($v) and $k != 'sectionsOrder'){
					foreach($v as $i => $j){
						if(is_numeric($i)){ // cloned items
							$temp[$i] = (object) $j;
							@$object->$name->$k = $temp;
						}else{
							@$object->$name->$k->$i = $j; // checkbox
						}
					}
				}else{
					@$object->$name->$k = $v; // @ - PHP 5.4 compatibility
				}
			}
		}
		return $object;
	}else{
		return false;
	}
}



if (!function_exists('array_replace_recursive')){
	/**
	 * Replaces elements from passed arrays into the first array recursively
	 * (PHP 5 >= 5.3.0)
	 * @return array|null
	 */
	function array_replace_recursive()
	{
		$arrays = func_get_args();
		$original = array_shift($arrays);

		foreach($arrays as $array){
			foreach($array as $key => $value){
				if(is_array($value)){
					$original[$key] = array_replace_recursive($original[$key], $array[$key]);
				}else{
					$original[$key] = $value;
				}
			}
		}
		return $original;
	}
}



/**
 * Starts the $haystack string with the prefix $needle?
 * @param  string
 * @param  string
 * @return bool
 */
function startsWith($needle, $haystack)
{
	return strncmp($haystack, $needle, strlen($needle)) === 0;
}



/**
 * Ends the $haystack string with the suffix $needle?
 * @param  string
 * @param  string
 * @return bool
 */
function endsWith($needle, $haystack)
{
	return strlen($needle) === 0 || substr($haystack, -strlen($needle)) === $needle;
}



/**
 * Converts to web safe characters [a-z0-9-] text.
* @param string String in UTF-8 encoding
* @return string
*/
function webalize($text)
{
    $url = $text;
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = @iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
    return $url;
}