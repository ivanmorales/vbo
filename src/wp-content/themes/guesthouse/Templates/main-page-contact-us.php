{extends 'main-layout.php'}

{var $sectionsOrder = isset($post->options('sectionsOrder')->overrideGlobalOrder) ? $post->options('sectionsOrder')->order : null}

{block content}
<!-- SUBPAGE -->
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<style type="text/css">
	table.padded-table td { padding:5px; }
</style>
<div id="container" class="subpage defaultContentWidth subpage-line clear">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">
			<h1>{$post->title}</h1>

			{!$post->content}
			
			<form id="resForm" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" style="width:600px">
			<input type=hidden name="oid" value="00Dd0000000hNbD">
			<input type=hidden name="retURL" value="http://www.villabuenaonda.com/thank-you/">
			<table class="padded-table">
				<tr>
					<td width="128">
						First Name *
					</td>
					<td>
						<input  id="first_name" maxlength="40" name="first_name" size="20" type="text" class="required" /><br>
					</td>
				</tr>
				<tr>
					<td>
						Last Name *
					</td>
					<td>
						<input  id="last_name" maxlength="80" name="last_name" size="20" type="text" class="required"/><br>
					</td>
				</tr>
				<tr>
					<td>
						Phone *
					</td>
					<td>
						<input  id="phone" maxlength="40" name="phone" size="20" type="text" class="required"/><br>
					</td>
				</tr>
				<tr>
					<td>
						Email *
					</td>
					<td>
						<input  id="email" maxlength="80" name="email" size="20" type="text" class="required email" /><br>
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
						<br>
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
						<br>
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
						<br>
					</td>
				</tr>
				<tr>
					<td>
						Arrival:
					</td>
					<td>
						<span class="dateInput dateOnlyInput"><input  id="00Nd0000005h5zp" name="00Nd0000005h5zp" size="12" type="text" /></span><br>
					</td>
				</tr>
				<tr>
					<td>
						Departure:
					</td>
					<td>
						<span class="dateInput dateOnlyInput"><input  id="00Nd0000005h5zz" name="00Nd0000005h5zz" size="12" type="text" /></span><br>
					</td>
				</tr>
				<tr>
					<td>
						Comments:
					</td>
					<td>
						<textarea  id="00Nd0000005hgw9" name="00Nd0000005hgw9" type="text" wrap="soft"></textarea><br>
					</td>
				</tr>
				<tr>
					<td style="text-align:center;padding-top:20px" colspan="2">
						<input type="submit" name="submit" value="Submit">
					</td>
				</tr>
			</table>
			</form>

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	<div class="sidebar">
        {dynamicSidebar "subpages-sidebar"}
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
{/block}

{? isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'xr'}
{define $localViewer}
	{include snippet-custom-room-viewer.php, options => $post->options('page_room'), rooms => $site->create('room', $post->options('page_room')->roomViewerCat)}
{/define}

{? isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'xs'}
{define $localService}
	{include snippet-custom-services-boxes.php, boxes => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)}
{/define}

{? !empty($post->options('page_static_text')->staticText) ? $localStaticText = 'staticText' : $localStaticText = 'xt'}

{define $localStaticText}
      <div class="text defaultContentWidth clear">
        {doShortcode $post->options('page_static_text')->staticText}
      </div>
{/define}
