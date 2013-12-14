<?php //netteCache[01]000369a:2:{s:4:"time";s:21:"0.06191000 1369161728";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:80:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-page-contact-us.php";i:2;i:1369161445;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-page-contact-us.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'q1lexbw96b')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb8a12c895ae_content')) { function _lb8a12c895ae_content($_l, $_args) { extract($_args)
?>
<!-- SUBPAGE -->
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<style type="text/css">
	table.padded-table td { padding:5px; }
</style>
<div id="container" class="subpage defaultContentWidth subpage-line clear">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">
			<h1><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>

			<?php echo $post->content ?>

			
			<form id="resForm" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" style="width:600px">
			<input type=hidden name="oid" value="00Dd0000000hNbD" />
			<input type=hidden name="retURL" value="http://www.villabuenaonda.com/thank-you/" />
			<table class="padded-table">
				<tr>
					<td width="128">
						First Name *
					</td>
					<td>
						<input  id="first_name" maxlength="40" name="first_name" size="20" type="text" class="required" /><br />
					</td>
				</tr>
				<tr>
					<td>
						Last Name *
					</td>
					<td>
						<input  id="last_name" maxlength="80" name="last_name" size="20" type="text" class="required" /><br />
					</td>
				</tr>
				<tr>
					<td>
						Phone *
					</td>
					<td>
						<input  id="phone" maxlength="40" name="phone" size="20" type="text" class="required" /><br />
					</td>
				</tr>
				<tr>
					<td>
						Email *
					</td>
					<td>
						<input  id="email" maxlength="80" name="email" size="20" type="text" class="required email" /><br />
					</td>
				</tr>
				<tr>
					<td>
						Room type:
					</td>
					<td>
						<select  id="00Nd0000005h5yr" name="00Nd0000005h5yr" title="Room type" >
							<option value="">--None--</option>
							<option value="Pool View Suite">Pool View Suite</option>
							<option value="Ocean View Suite">Ocean View Suite</option>
							<option value="Garden Suite">Garden Suite</option>
						</select>
						<br />
					</td>
				</tr>
				<tr>
					<td>
						# of Rooms:
					</td>
					<td>
						<select  id="00Nd0000005h5z1" name="00Nd0000005h5z1" title="# of Rooms">
							<option value="">--None--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
						</select>
						<br />
					</td>
				</tr>
				<tr>
					<td>
						# of People:
					</td>
					<td>
						<select  id="00Nd0000005h5zQ" name="00Nd0000005h5zQ" title="# of People">
							<option value="">--None--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
						</select>
						<br />
					</td>
				</tr>
				<tr>
					<td>
						Arrival:
					</td>
					<td>
						<span class="dateInput dateOnlyInput"><input  id="00Nd0000005h5zp" name="00Nd0000005h5zp" size="12" type="text" /></span><br />
					</td>
				</tr>
				<tr>
					<td>
						Departure:
					</td>
					<td>
						<span class="dateInput dateOnlyInput"><input  id="00Nd0000005h5zz" name="00Nd0000005h5zz" size="12" type="text" /></span><br />
					</td>
				</tr>
				<tr>
					<td>
						Comments:
					</td>
					<td>
						<textarea  id="00Nd0000005hgw9" name="00Nd0000005hgw9" type="text" wrap="soft"></textarea><br />
					</td>
				</tr>
				<tr>
					<td style="text-align:center;padding-top:20px" colspan="2">
						<input type="submit" name="submit" value="Submit" />
					</td>
				</tr>
			</table>
			</form>

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	<div class="sidebar">
<?php dynamic_sidebar("subpages-sidebar") ?>
	</div><!-- end of sidebar -->

</div><!-- end of container -->
<script type="text/javascript" language="javascript">
	jQuery(document).ready(function(){
		jQuery("#resForm").validate();
	});

	jQuery(window).load(function(){
		jQuery("#00Nd0000005h5zp").datepicker();
		jQuery("#00Nd0000005h5zz").datepicker();
	});
</script>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = true; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
$_l->extends = 'main-layout.php' ?>

<?php $sectionsOrder = isset($post->options('sectionsOrder')->overrideGlobalOrder) ? $post->options('sectionsOrder')->order : null ?>


<?php isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'xr' ;//
// block $localViewer
//
if (!function_exists($_l->blocks[$localViewer][] = '_lb4fca1a4225__localViewer')) { function _lb4fca1a4225__localViewer($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-room-viewer.php", array('options' => $post->options('page_room'), 'rooms' => $site->create('room', $post->options('page_room')->roomViewerCat)) + $template->getParams(), $_l->templates['q1lexbw96b'])->render() ;}} call_user_func(reset($_l->blocks[$localViewer]), $_l, get_defined_vars()) ?>

<?php isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'xs' ;//
// block $localService
//
if (!function_exists($_l->blocks[$localService][] = '_lb7ef32717c7__localService')) { function _lb7ef32717c7__localService($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-services-boxes.php", array('boxes' => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)) + $template->getParams(), $_l->templates['q1lexbw96b'])->render() ;}} call_user_func(reset($_l->blocks[$localService]), $_l, get_defined_vars()) ?>

<?php !empty($post->options('page_static_text')->staticText) ? $localStaticText = 'staticText' : $localStaticText = 'xt' ?>

<?php //
// block $localStaticText
//
if (!function_exists($_l->blocks[$localStaticText][] = '_lb24f36487f1__localStaticText')) { function _lb24f36487f1__localStaticText($_l, $_args) { extract($_args) ?>
      <div class="text defaultContentWidth clear">
        <?php echo do_shortcode($post->options('page_static_text')->staticText) ?>

      </div>
<?php }} call_user_func(reset($_l->blocks[$localStaticText]), $_l, get_defined_vars()) ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
