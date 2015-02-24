<?php
	include_once 'util.php';
	include_once 'config.php';
	_session_start();
	if (!logged_in()) {
            header('Location: '.$app_url);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Giftbox - Create</title>

	<link rel="stylesheet" href="assets/elegant-icons/style.css">
	<link rel="stylesheet" href="css/jquery-ui-1.10.4.min.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/create.css" />
	<link rel="stylesheet" href="css/create_and_preview.css" />
	<link rel="stylesheet" href="//vjs.zencdn.net/4.7/video-js.css">
	
	<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
	<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.magnific-popup.js"></script>
	<script src="js/id3-minimized.js"></script>
	<script src="js/util.js"></script>
	<script src="js/create.js"></script>
	<script src="js/init.js"></script>
	<script src="//vjs.zencdn.net/4.7/video.js"></script>
	<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
</head>
<body id="create-body">
	<?php include_once("analyticstracking.php") ?>
	<div id="content-wrapper">
		<section id="create-section">
			<div id="palette">
				<div id="palette-top">
					<a href="javascript:void(0)" onclick=""><i class="arrow_triangle-left_alt2 popout-arrow"></i></a>
				</div>
				<div id="palette-body">
					<a href="#"><img id="give-token-palette" src="images/give-token.jpg" width="220"></a>
					<a class="sidebar-tab selected-sidebar-tab" id="template-tab-selected"></a>
					<a class="sidebar-tab" id="text-tab" href="javascript:void(0)" onclick="selectSidebarTab(this)"></a>
					<a class="sidebar-tab" id="opener-tab" href="javascript:void(0)" onclick="selectSidebarTab(this)"></a>
					<a class="sidebar-tab" id="send-tab" href="javascript:void(0)" onclick="selectSidebarTab(this)"></a>

					<div class="sidebar-tab-container" id="sidebar-template-container">
						<span class="template-tab-text">PICK A TEMPLATE</span>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates('ALL')">ALL</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(2)">2</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(3)">3</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(4)">4</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(5)">5</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(6)">6</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(7)">7</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(8)">8</a>
						<a class="template-number" href="javascript:void(0)" onclick="showTemplates(9)">9</a>

						<div class="template-thumbnail-container">
							<div class="template-thumbnail" id="template-1-1"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-padded column height100 width100"></div>
							</div>

							<div class="template-thumbnail" id="template-2-1"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-padded column height100 width50"></div>
								<div class="thumb-padded column height100 width50"></div>
							</div>

							<div class="template-thumbnail" id="template-2-2"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-padded column height50 width100"></div>
								<div class="thumb-padded column height50 width100"></div>
							</div>

							<div class="template-thumbnail" id="template-3-1"  onclick="stack('template-2', 'template-3', 'template-1')">
								<div class="thumb-padded column height100 width33"></div>
								<div class="thumb-padded column height100 width33"></div>
								<div class="thumb-padded column height100 width33"></div>
							</div>

							<div class="template-thumbnail" id="template-3-2"  onclick="stack('template-2', 'template-3', 'template-1')">
								<div class="thumb-padded column height33 width100"></div>
								<div class="thumb-padded column height33 width100"></div>
								<div class="thumb-padded column height33 width100"></div>
							</div>

							<div class="template-thumbnail" id="template-3-3"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-padded column height100 width50"></div>
								<div class="thumb-column height100 width50">
									<div class="thumb-padded thumb-column height50 width100"></div>
									<div class="thumb-padded thumb-column height50 width100"></div>
								</div>						
							</div>

							<div class="template-thumbnail" id="template-3-4"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-column height100 width50">
									<div class="thumb-padded thumb-column height50 width100"></div>
									<div class="thumb-padded thumb-column height50 width100"></div>
								</div>						
								<div class="thumb-padded column height100 width50"></div>
							</div>

							<div class="template-thumbnail" id="template-3-5"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-column height50 width100">
									<div class="thumb-padded thumb-column height100 width50"></div>
									<div class="thumb-padded thumb-column height100 width50"></div>
								</div>						
								<div class="thumb-padded column height50 width100"></div>
							</div>

							<div class="template-thumbnail" id="template-3-6"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-padded column height50 width100"></div>
								<div class="thumb-column height50 width100">
									<div class="thumb-padded thumb-column height100 width50"></div>
									<div class="thumb-padded thumb-column height100 width50"></div>
								</div>						
							</div>

							<div class="template-thumbnail" id="template-4-1"  onclick="stack('template-2', 'template-3', 'template-1')">
								<div class="thumb-padded column height100 width25"></div>
								<div class="thumb-padded column height100 width25"></div>
								<div class="thumb-padded column height100 width25"></div>
								<div class="thumb-padded column height100 width25"></div>
							</div>

							<div class="template-thumbnail" id="template-4-2"  onclick="stack('template-2', 'template-3', 'template-1')">
								<div class="thumb-padded column height25 width100"></div>
								<div class="thumb-padded column height25 width100"></div>
								<div class="thumb-padded column height25 width100"></div>
								<div class="thumb-padded column height25 width100"></div>
							</div>

							<div class="template-thumbnail" id="template-4-3"  onclick="stack('template-2', 'template-3', 'template-1')">
								<div class="thumb-column height100 width50">
									<div class="thumb-padded column height50 width100"></div>
									<div class="thumb-padded column height50 width100"></div>
								</div>						
								<div class="thumb-column height100 width50">
									<div class="thumb-padded column height50 width100"></div>
									<div class="thumb-padded column height50 width100"></div>
								</div>						
							</div>

							<div class="template-thumbnail" id="template-4-4"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-padded column height100 width50"></div>
								<div class="thumb-column height100 width50">
									<div class="thumb-padded thumb-column height33 width100"></div>
									<div class="thumb-padded thumb-column height33 width100"></div>
									<div class="thumb-padded thumb-column height33 width100"></div>
								</div>						
							</div>
							
							<div class="template-thumbnail" id="template-4-5"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-column height100 width50">
									<div class="thumb-padded thumb-column height33 width100"></div>
									<div class="thumb-padded thumb-column height33 width100"></div>
									<div class="thumb-padded thumb-column height33 width100"></div>
								</div>						
								<div class="thumb-padded column height100 width50"></div>
							</div>
							
							<div class="template-thumbnail" id="template-4-6"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-column height50 width100">
									<div class="thumb-padded thumb-column height100 width33"></div>
									<div class="thumb-padded thumb-column height100 width33"></div>
									<div class="thumb-padded thumb-column height100 width33"></div>
								</div>						
								<div class="thumb-padded column height50 width100"></div>
							</div>
							
							<div class="template-thumbnail" id="template-4-7"  onclick="stack('template-1', 'template-2', 'template-3')">
								<div class="thumb-padded column height50 width100"></div>
								<div class="thumb-column height50 width100">
									<div class="thumb-padded thumb-column height100 width33"></div>
									<div class="thumb-padded thumb-column height100 width33"></div>
									<div class="thumb-padded thumb-column height100 width33"></div>
								</div>						
							</div>
							

						</div>
					</div>
				</div>
			</div>

			<div id="uploads">
				<div id="tabs">
					<ul>
						<li><a class="tab-text" href="#images-tab">Images</a></li>
						<li><a class="tab-text" href="#media-tab">Downloads</a></li>
					</ul>
					<div class="tab-panel" id="images-tab">
						<div class="icon-container" id="images-icon-container">
							<ul class="icon-list">
								<li class="tab-icon">
									<img id="select-image" src="images/computer.png">
									<input type="file" multiple id="select-image-file" />
								</li>
							</ul>
						</div>
						<div class="file-drop-zone" id="image-drop-zone">
							<p class="drop-zone-text">Drag and drop image files here</p>
						</div>
					</div>
					<div class="tab-panel" id="media-tab">
						<div class="icon-container" id="media-icon-container">
							<ul class="icon-list" id="media-icon-list">
								<li class="tab-icon">
									<img class="media-icon-image" id="select-media"  width="48" height="48" src="images/computer.png">
									<input type="file" multiple id="select-media-file" />
								</li>
								<li class="tab-icon">
									<a href="javascript:void(0)" onclick="inputURL('YouTube')"><img class="media-icon-image" width="48" height="48" src="images/youtube_icon.jpg"></a>
								</li>
								<li class="tab-icon">
									<a href="javascript:void(0)" onclick="inputURL('SoundCloud')"><img class="media-icon-image" width="48" height="48" src="images/soundcloud_icon.jpg"></a>
								</li>
								<li class="tab-icon">
									<a href="javascript:void(0)" onclick="inputURL('Spotify')"><img class="media-icon-image" width="48" height="48" src="images/spotify_icon.jpg"></a>
								</li>
							</ul>
						</div>
						<div class="file-drop-zone" id="media-drop-zone">
							<p class="drop-zone-text">Drag and drop music/video files here</p>
						</div>
					</div>
				</div>
			</div>
			
			<div id="templates">
				<div id="template-button-container">
					<a class="template-button" id="letter-button" href="javascript:void(0)" onclick="$('#letter-text').val(window.top_template.letterText); $('#letter-dialog').dialog('open');">Letter</a>
					<a class="template-button" id="wrapper-button" href="javascript:void(0)" onclick="wrapper()">Wrapper</a>
					<a class="template-button" id="save-button" href="javascript:void(0)" onclick="saveButton()">Save</a>
					<a class="template-button" id="preview-button" href="javascript:void(0)" onclick="preview()">Preview</a>
					<a class="template-button" id="send-button" href="javascript:void(0)" onclick="send()">Send</a>
					<a class="template-button" id="open-button" href="javascript:void(0)" onclick="selectSaved()">Open</a>
					<p id="template-status"></p>
				</div>
				<div id="template-container">
					<div class="template" id="template-3">
						<div class="divider-container" id="divider-container-3-1"></div>
						<div class="divider-container" id="divider-container-3-2"></div>
						<div class="divider-container" id="divider-container-3-3"></div>
						<div class="divider-container" id="divider-container-3-4"></div>
						<div class="divider-container" id="divider-container-3-5"></div>
						<div id="column-3-1" class="column height100 width33">
							<div id="column-3-4" class="padded column height33 width100">
								<div class="bento" id="bento-3-1">
									<div class="image-slider" id="bento-3-1-slider"></div>
									<div class="close-button" id="bento-3-1-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
							<div id="column-3-5" class="padded column height66 width100">
								<div class="bento" id="bento-3-2">
									<div class="image-slider" id="bento-3-2-slider"></div>
									<div class="close-button" id="bento-3-2-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
						</div>
						<div id="column-3-2" class="column height100 width33">
							<div id="column-3-6" class="padded column height50 width100">
								<div class="bento" id="bento-3-3">
									<div class="image-slider" id="bento-3-3-slider"></div>
									<div class="close-button" id="bento-3-3-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
							<div id="column-3-7" class="padded column height50 width100">
								<div class="bento" id="bento-3-4">
									<div class="image-slider" id="bento-3-4-slider"></div>
									<div class="close-button" id="bento-3-4-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
						</div>
						<div id="column-3-3" class="column height100 width33">
							<div id="column-3-8" class="padded column height66 width100">
								<div class="bento" id="bento-3-5">
									<div class="image-slider" id="bento-3-5-slider"></div>
									<div class="close-button" id="bento-3-5-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
							<div id="column-3-9" class="padded column height33 width100">
								<div class="bento" id="bento-3-6">
									<div class="image-slider" id="bento-3-6-slider"></div>
									<div class="close-button" id="bento-3-6-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
						</div>	
						<div class="vertical divider" id="divider-3-1"></div>
						<div class="vertical divider" id="divider-3-2"></div>
						<div class="horizontal divider" id="divider-3-3"></div>
						<div class="horizontal divider" id="divider-3-4"></div>
						<div class="horizontal divider" id="divider-3-5"></div>
					</div>
					<div class="template" id="template-2">
						<div class="divider-container" id="divider-container-2-1"></div>
						<div class="divider-container" id="divider-container-2-2"></div>
						<div class="divider-container" id="divider-container-2-3"></div>
						<div class="divider-container" id="divider-container-2-4"></div>
						<div id="column-2-1" class="column height100 width50">
							<div id="column-2-3" class="padded column height50 width100">
								<div class="bento" id="bento-2-1">
									<div class="image-slider" id="bento-2-1-slider"></div>
									<div class="close-button" id="bento-2-1-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
							<div id="column-2-4" class="padded column height50 width100">
								<div class="bento" id="bento-2-2">
									<div class="image-slider" id="bento-2-2-slider"></div>
									<div class="close-button" id="bento-2-2-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
						</div>
						<div id="column-2-2" class="column height100 width50">
							<div id="column-2-5" class="padded column height33 width100">
								<div class="bento" id="bento-2-3">
									<div class="image-slider" id="bento-2-3-slider"></div>
									<div class="close-button" id="bento-2-3-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
							<div id="column-2-6" class="padded column height33 width100">
								<div class="bento" id="bento-2-4">
									<div class="image-slider" id="bento-2-4-slider"></div>
									<div class="close-button" id="bento-2-4-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
							<div id="column-2-7" class="padded column height33 width100">
								<div class="bento" id="bento-2-5">
									<div class="image-slider" id="bento-2-5-slider"></div>
									<div class="close-button" id="bento-2-5-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
						</div>	
						<div class="vertical divider" id="divider-2-1"></div>
						<div class="horizontal divider" id="divider-2-2"></div>
						<div class="horizontal divider" id="divider-2-3"></div>
						<div class="horizontal divider" id="divider-2-4"></div>
					</div>
					<div class="template" id="template-1">
						<div class="divider-container" id="divider-container-1-1"></div>
						<div class="divider-container" id="divider-container-1-2"></div>
						<div class="divider-container" id="divider-container-1-3"></div>
						<div id="column-1-1" class="column padded height100 width33">
							<div class="bento" id="bento-1-1">
								<div class="image-slider" id="bento-1-1-slider"></div>
								<div class="close-button" id="bento-1-1-close" onclick="closeClicked(this)"></div>
							</div>
						</div>
						<div id="column-1-2" class="column padded height100 width33">
							<div class="bento" id="bento-1-2">
								<div class="image-slider" id="bento-1-2-slider"></div>
								<div class="close-button" id="bento-1-2-close" onclick="closeClicked(this)"></div>
							</div>
						</div>
						<div id="column-1-3" class="column height100 width33">
							<div id="column-1-4" class="column padded height50 width100">
								<div class="bento" id="bento-1-3">
									<div class="image-slider" id="bento-1-3-slider"></div>
									<div class="close-button" id="bento-1-3-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
							<div id="column-1-5" class="column padded height50 width100">
								<div class="bento" id="bento-1-4">
									<div class="image-slider" id="bento-1-4-slider"></div>
									<div class="close-button" id="bento-1-4-close" onclick="closeClicked(this)"></div>
								</div>
							</div>
						</div>
						<div class="vertical divider" id="divider-1-1"></div>
						<div class="vertical divider" id="divider-1-2"></div>
						<div class="horizontal divider" id="divider-1-3"></div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<form id="send-form" class="white-popup mfp-hide" name="send-form">
		<h1 class="dialog-header">Send to:</h1>
		<div id="dialog-form-container">
			<p class="dialog-message" id="send-message"></p>
			<input class="dialog-input" id="email" name="email" type="text" placeholder="Email address" size="30">
			<p>Or, copy this link into an email and send it yourself:</p>
			<input class="dialog-input" id="preview-link" name="preview-link" type="text" size="60" value="" readonly="readonly">
			<a class="dialog-button dialog-button-right" href="javascript:void(0)" onClick="sendGiftbox()">Send</a>
		</div>
	</form>
	
	<div id="save-dialog" title="Save">
		<form>
		    <fieldset style="margin-top: 25px">
				<label for="save-name">Name</label>
				<input type="text" name="save-name" id="save-name" class="text ui-widget-content ui-corner-all" style="padding: .4em; width: 95%;">
		    </fieldset>
		</form>
	</div>

	<div id="url-dialog">
		<form>
		    <fieldset style="margin-top: 25px">
				<label for="save-name">Paste link address here</label>
				<input type="text" name="url" id="url" class="text ui-widget-content ui-corner-all" style="padding: .4em; width: 95%;">
		    </fieldset>
		</form>
	</div>

	<div id="letter-dialog" title="Letter">
		<form>
			<textarea rows="29" cols="55" id="letter-text" class="text ui-widget-content ui-corner-all" style="padding: .4em; width: 95%;">
			</textarea>
		</form>
	</div>
	
	<div id="wrapper-dialog" title="Wrapper">
		<form>
			<fieldset style="margin-top: 30px">
				<label for="wrapper-type">Select a wrapper type</label>
				<select name="wrapper-type" id="wrapper-type">
					<option selected="selected" value="">None</option>
					<option value="food-box">Unload Boxes</option>
					<option value="briefcase">Unload Bags</option>
				</select>
				<br><br>
				<label for="unload-count">Number of items to unload</label>
				<input id="unload-count" name="unload-count">
			</fieldset>			
		</form>
	</div>

	<div id="open-dialog" title="Open">
		<fieldset>
			<label for="token-list">Select a Token to open:</label><br>
			<select id="token-list" name="token-list" size="9" style="margin: auto; margin-top: 10px;">
			</select>
		</fieldset>			
	</div>

	<script>
		var bentos = document.querySelectorAll('.bento');
		[].forEach.call(bentos, function(bento) {
			bento.addEventListener('dragenter', handleDragEnter, false);
			bento.addEventListener('dragover', handleDragOver, false);
			bento.addEventListener('dragleave', handleDragLeave, false);
			bento.addEventListener('drop', handleDrop, false);
			bento.addEventListener('dragend', handleDragEnd, false);
		});
		
		var dropZone = document.getElementById("image-drop-zone");
		dropZone.addEventListener('dragenter', handleAddImageDragEnter, false);
		dropZone.addEventListener('dragover', handleAddImageDragOver, false);
		dropZone.addEventListener('dragleave', handleAddImageDragLeave, false);
		dropZone.addEventListener('drop', handleAddImageDrop, false);
		dropZone.addEventListener('dragend', handleAddImageDragEnd, false);
		
		dropZone = document.getElementById("media-drop-zone");
		dropZone.addEventListener('dragenter', handleAddImageDragEnter, false);
		dropZone.addEventListener('dragover', handleAddImageDragOver, false);
		dropZone.addEventListener('dragleave', handleAddImageDragLeave, false);
		dropZone.addEventListener('drop', handleAddMediaDrop, false);
		dropZone.addEventListener('dragend', handleAddImageDragEnd, false);
		
		document.getElementById('select-image-file').addEventListener('change', handleImageFileSelect, false);
		document.getElementById('select-media-file').addEventListener('change', handleMediaFileSelect, false);
		
		var template1 = document.getElementById('template-1');
		var template2 = document.getElementById('template-2');
		var template3 = document.getElementById('template-3');
	
		template1.giftboxName = "Untitled";
		template1.giftboxId = null;
		template1.letterText = null;
		template1.wrapperType = "";
		template1.unloadCount = 3;
		
		template2.giftboxName = "Untitled";
		template2.giftboxId = null;
		template2.letterText = null;
		template2.wrapperType = "";
		template2.unloadCount = 3;

		template3.giftboxName = "Untitled";
		template3.giftboxId = null;
		template3.letterText = null;
		template3.wrapperType = "";
		template3.unloadCount = 3;

		window.top_template = template1;
		$("#preview-link").val("");
	</script>
	
</body>
</html>