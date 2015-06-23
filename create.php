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
	<!-- SITE TITLE -->
	<title>GiveToken.com - Create</title>

	<link rel="stylesheet" href="assets/elegant-icons/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery-ui-1.10.4.min.css" />
	<link rel="stylesheet" href="css/create.css" />
	<link rel="stylesheet" href="css/create_and_preview.css" />
	<link rel="stylesheet" href="//vjs.zencdn.net/4.7/video-js.css">

	<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
	<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="js/id3-minimized.js"></script>
	<script src="js/util.js"></script>
	<script src="js/create.js"></script>
	<script src="js/init.js"></script>
	<script src="//vjs.zencdn.net/4.7/video.js"></script>
	<script src="//w.soundcloud.com/player/api.js" type="text/javascript"></script>
	<script src="js/facebook_init.js"></script>
	<script src="js/ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="50r9wt4kpyz9pcj"></script>
	
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="assets/gt-favicons.ico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/gt-favicons.ico/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/gt-favicons.ico/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/gt-favicons.ico/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/gt-favicons.ico/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/gt-favicons.ico/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/gt-favicons.ico/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/gt-favicons.ico/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/gt-favicons.ico/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="assets/gt-favicons.ico/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/gt-favicons.ico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/gt-favicons.ico/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/gt-favicons.ico/favicon-16x16.png">
	<link rel="manifest" href="assets/gt-favicons.ico/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- endFavicon -->
</head>
<body>
	<?php include_once("analyticstracking.php") ?>
	<div id="content-wrapper">
		<div id="palette">
			<div id="palette-top">
				<div class="popout-control" id="hide-palette" onclick="hidePalette()"><i class="fa fa-arrow-left fa-lg popout-arrow"></i></div>
				<div class="popout-control hidden" id="show-palette" class="hidden" href="javascript:void(0)" onclick="showPalette()"><i class="fa fa-arrow-right fa-lg popout-arrow"></i></div>
			</div>
			<div id="palette-body">
				<a href="<?php echo $app_root ?>"><img id="give-token-palette-logo" src="assets/img/logo-light.png" width="225"></a>
				<div class="sidebar-tab selected-sidebar-tab template-tab-selected" id="template-tab" onclick="selectSidebarTab(this)"></div>
				<div class="sidebar-tab sidebar-tab-hover text-tab" id="text-tab" onclick="textIconClicked()"></div>
				<div class="sidebar-tab sidebar-tab-hover opener-tab" id="opener-tab" onclick="addYouTubeRedirect();"></div>
				<div class="sidebar-tab sidebar-tab-hover send-tab" id="send-tab" onclick="selectSidebarTab(this)"></div>

				<div class="sidebar-tab-container" id="template-tab-container">
					<span class="template-tab-text">PICK A TEMPLATE</span>
					<a class="template-number template-number-selected" id="template-number-all" href="javascript:void(0)" onclick="showThumbnails('all')">ALL</a>
					<a class="template-number template-number-hover" id="template-number-2" href="javascript:void(0)" onclick="showThumbnails(2)">2</a>
					<a class="template-number template-number-hover" id="template-number-3" href="javascript:void(0)" onclick="showThumbnails(3)">3</a>
					<a class="template-number template-number-hover" id="template-number-4" href="javascript:void(0)" onclick="showThumbnails(4)">4</a>
					<a class="template-number template-number-hover" id="template-number-5" href="javascript:void(0)" onclick="showThumbnails(5)">5</a>
					<a class="template-number template-number-hover" id="template-number-6" href="javascript:void(0)" onclick="showThumbnails(6)">6</a>
					<a class="template-number template-number-hover" id="template-number-7" href="javascript:void(0)" onclick="showThumbnails(7)">7</a>
					<a class="template-number template-number-hover" id="template-number-8" href="javascript:void(0)" onclick="showThumbnails(8)">8</a>
					<a class="template-number template-number-hover" id="template-number-9" href="javascript:void(0)" onclick="showThumbnails(9)">9</a>

					<div class="template-thumbnail-container">
					<?php
						$dir = "./templates";
						$files = scandir($dir);
						foreach ($files as $filename) {
							if (strpos($filename, "thumbnail") !== FALSE) {
								include $dir."/".$filename;
							}
						}
					?>
					</div>
				</div>
				<div class="sidebar-tab-container" id="send-tab-container">
					<div class="send-button" id="facebook-send-button" onclick="featureNotAvailable('Facebook')"></div>
					<div class="send-button" id="twitter-send-button" onclick="featureNotAvailable('Twitter')"></div>
					<div class="send-button" id="pinterest-send-button" onclick="featureNotAvailable('Pinterest')"></div>
					<div class="send-button" id="instagram-send-button" onclick="featureNotAvailable('Instagram')"></div>
					<div class="send-button" id="googleplus-send-button" onclick="featureNotAvailable('Google+')"></div>
					<button class="palette-button" onclick="featureNotAvailable('Send For Corporate')">SEND FOR CORPORATE</button>
					<span class="template-tab-text">LINK</span>
					<input id="send-link-input" type="text"  readonly="readonly" placeholder="Save token to see link">
					<button class="palette-button" onclick="send()">ADVANCED SEND</button>
				</div>
			</div>
		</div>

		<div id="templates">
			<div id="template-nav-container">
				<ul class="template-nav-bar">
					<li><a href="javascript:void(0)" onclick="saveButton()"><i class="fa fa-save fa-lg"></i>SAVE</a></li>
					<li><a href="javascript:void(0)" onclick="preview()"><i class="fa fa-eye fa-lg"></i>PREVIEW</a></li>
					<li><a href="javascript:void(0)" onclick="selectSaved()"><i class="fa fa-folder-open fa-lg"></i>OPEN</a></li>
				</ul>
			</div>
			<div id="template-scroll-container">
				<div id="template-container">
				</div>
			</div>
		</div>
	</div>

	<!-- DIALOGS -------------------------------------------------------------------------------------------------------->

	<div id="send-dialog" title="Advanced Send">
		<p class="dialog-message" id="send-message"></p>
		<form id="send-form">
		    <fieldset>
				<label class="input-label" for="email">Send to:</label>
				<input class="dialog-input" id="email" name="email" type="text" placeholder="Email address"><br><br>
				<label class="input-label" for="preview-link">Or, copy this link into an email and send it yourself:</label>
				<input class="dialog-input" id="preview-link" name="preview-link" type="text"value="" readonly="readonly">
		    </fieldset>
		</form>
	</div>

	<div id="save-dialog" title="Save">
		<form>
		    <fieldset>
				<label class="input-label" for="save-name">Name</label>
				<input class="dialog-input" type="text" name="save-name" id="save-name">
		</form>
	</div>

	<div id="url-dialog">
		<form>
		    <fieldset>
				<label class="input-label" for="url">Paste link address here</label>
				<input class="dialog-input" type="text" name="url" id="url">
		    </fieldset>
		</form>
	</div>

	<div id="youtube-url-dialog">
		<form>
		    <fieldset>
				<label class="input-label" for="youtube-url">Paste link address here</label>
				<input class="dialog-input" type="text" name="youtube-url" id="youtube-url">
				<input class="auto-play-box" type="checkbox" name="youtube-auto-play" id="youtube-auto-play"><label for="youtube-auto-play">Auto Play</label>
		    </fieldset>
		</form>
	</div>

	<div id="youtube-redirect-dialog">
		<form>
			<fieldset>
				<label class="input-label" for="redirect-url">Paste Redirect Address here</label>
				<input class="dialog-input" type="text" name="redirect-url" id="redirect-url">
			</fieldset>
		</form>
	</div>

	<div id="add-hyperlink-dialog" title="Add A Hyperlink To This Image">
		<form>
		    <fieldset>
				<label class="input-label" for="url">Paste link address here</label>
				<input class="dialog-input" id="hyperlink-dialog-url" type="text" name="url" id="url">
		    </fieldset>
		</form>
	</div>

	<div id="redirect-dialog" title="Redirect">
		<div id="image-dialog-container">
			<div class="image-dialog-button" id="add-redirect-button" onclick="addRedirect()"><i class="fa fa-link fa-lg link"></i> ADD REDIRECT</div>
			<div  class="image-dialog-button" style="display:none" id="remove-redirect-button" onclick="removeRedirect()"><i class="fa fa-remove fa-lg remove"></i> REMOVE HYPERLINK</div>
			<div  class="image-dialog-button" style="display:none" id="change-redirect-button" onclick="changeRedirect()"><i class="fa fa-edit fa-lg edit"></i> CHANGE HYPERLINK</div>
			<input id="redirect-text" placeholder="https://www.example.com" disabled>
			<br>
			<br>
			<div>This will redirect your viewers to this url after any YouTube video finishes playing on the page.</div>
		</div>
		<div class="image-dialog-button  small-image-dialog-button" id="close-image-dialog-button" onclick="$('#redirect-dialog').dialog('close')"><i class="fa fa-close fa-lg close"></i> CLOSE</div>
	</div>

	<div id="facebook-album-dialog" title="CHOOSE AN ALBUM">
		<div id="facebook-albums" onclick="getFacebookAlbums()"><a id="previous-album" style="display:none">Previous</a><a id="next-album" style="display:none">Next</a></div>
	</div>

	<div id="facebook-photos-dialog" title="CHOOSE YOUR PHOTO">
		<div id="facebook-photos" onClick="getFacebookPhotos()"></div>
	</div>

	<div id="facebook-login-fail-dialog"  title="LOGIN FAILED">
		<div>Login failed. This was either because of your login information or because you have no albums on facebook.</div>
	</div>

	<div id="browser-dialog" title="BROWSER WARNING">
		<div>Please Note: Our product currently works best with Chrome or Opera. For best result, use one of those browsers.</div>
	</div>

	<div id="choose-photos-dialog" title="CHOOSE COVER FOR GALLERY" value="">
		<div id="choose-photo-options"></div>
	</div>

	<div id="input-overlay-dialog" title="INPUT TEXT FOR OVERLAY">
		<form id="letter-form">
			<label class="input-label" for="overlayText">Write your message here</label>
			<textarea name="overlayText" id="overlayText"></textarea>
			<script>
                CKEDITOR.replace( 'overlayText' );
            </script>
		</form>
	</div>

	<div id="add-dialog" title="SELECT AN IMAGE TO ADD TO YOUR TOKEN">
		<input class="hidden-file-input" type="file" multiple id="select-image-file" />
		<input class="hidden-file-input" type="file" multiple id="select-media-file" />
		<input class="hidden-file-input" type="file" multiple id="select-attachment-file" />
		<div id="add-nav-container">
			<ul id="add-nav-bar">
				<li><div class="add-nav-item add-nav-item-hover" id="add-stock" onclick="selectAddNav(this.id)">STOCK LIBRARY</div></li>
				<li><div class="add-nav-item add-nav-item-selected" id="add-images" class="nav-selected" href="javascript:void(0)" onclick="selectAddNav(this.id)">IMAGES</div></li>
				<li><div class="add-nav-item add-nav-item-hover" id="add-video-audio" href="javascript:void(0)" onclick="selectAddNav(this.id)">VIDEO & AUDIO</div></li>
				<li><div class="add-nav-item add-nav-item-hover" id="add-letter" href="javascript:void(0)" onclick="selectAddNav(this.id)">LETTER & ATTACHMENTS</div></li>
			</ul>
		</div>

			<!------------------ STOCK LIBRARY ------------------------>
			<div id="add-stock-container" class="add-content-container">
				<div class="add-content add-content-no-icons">
				</div>
			</div>

			<!--------------------- IMAGES ---------------------------->
			<div id="add-images-container" class="add-content-container">
				<div class="add-content-icon-bar">
					<div class="add-icon-container">
						<a class="add-icon-link" href="javascript:void(0)" onclick="selectFacebookImage()"><i class="fa fa-facebook fa-3x add-icon"></i></a>
						<a class="add-icon-link" href="javascript:void(0)" onclick="featureNotAvailable('Flickr')"><i class="fa fa-flickr fa-3x add-icon"></i></a>
						<a class="add-icon-link" id="dropbox-icon-link" href="javascript:void(0)" onclick="openDropBoxImage()"><i class="fa fa-dropbox fa-3x add-icon"></i></a>
						<a class="add-icon-link" id="desktop-icon-link" href="javascript:void(0)" onclick="$('#select-image-file').trigger('click')"><i class="fa fa-desktop fa-3x add-icon"></i></a>
					</div>
				</div>
				<div class="add-content" id="add-images">
					<div id="add-images-desktop">
					</div>
				</div>
			</div>

			<!--------------------- VIDEO & AUDIO --------------------->
			<div id="add-video-audio-container" class="add-content-container">
				<div class="add-content-icon-bar">
					<div class="add-icon-container">
						<a class="add-icon-link" href="javascript:void(0)" onclick="inputURL('YouTube')"><i class="fa fa-youtube fa-3x add-icon"></i></a>
						<a class="add-icon-link" href="javascript:void(0)" onclick="inputURL('Vimeo')"><i class="fa fa-vimeo-square fa-3x add-icon"></i></a>
						<a class="add-icon-link" href="javascript:void(0)" onclick="inputURL('SoundCloud')"><i class="fa fa-soundcloud fa-3x add-icon"></i></a>
						<a class="add-icon-link" href="javascript:void(0)" onclick="inputURL('Spotify')"><i class="fa fa-spotify fa-3x add-icon"></i></a>
						<a class="add-icon-link" href="javascript:void(0)" onclick="openDropBoxVideo()"><i class="fa fa-dropbox fa-3x add-icon"></i></a>
						<a class="add-icon-link" id="desktop-icon-link" href="javascript:void(0)" onclick="$('#select-media-file').trigger('click')"><i class="fa fa-desktop fa-3x add-icon"></i></a>
					</div>
				</div>
				<div class="add-content">
					<div id="add-av-desktop">
					</div>
				</div>
			</div>

			<!------------------------ LETTER ------------------------->
			<div id="add-letter-container" class="add-content-container">
				<form id="letter-form">
					<br>
					<textarea id="lettertext"></textarea>
					<script>
		                CKEDITOR.replace( 'lettertext' );
		            </script>
		            <br>
					<div id="add-attachment-desktop"></div>
					<a class="add-icon-link" id="attachment-icon-link" href="javascript:void(0)" onclick="$('#select-attachment-file').trigger('click')"><i class="fa fa-paperclip fa-2x add-icon"></i> <span>ADD ATTACHMENT</span></a>
				</form>
			</div>

		<div id="add-button-container">
			<div class="add-button" onclick="$('#add-dialog').dialog('close'); removeSelection('add-images-desktop'); removeSelection('add-av-desktop');">CANCEL</div>
			<div class="add-button" href="javascript:void(0)" onclick="doAdd()">USE</div>
		</div>
	</div>

	<div id="wrapper-dialog" title="Wrapper">
		<form>
			<fieldset>
				<label class="input-label" for="wrapper-type">Select a wrapper type</label>
				<select name="wrapper-type" id="wrapper-type">
					<option selected="selected" value="">None</option>
					<option value="food-box">Unload Boxes</option>
					<option value="briefcase">Unload Bags</option>
				</select>
				<br><br>
				<label class="input-label" for="unload-count">Number of items to unload</label>
				<input id="unload-count" name="unload-count">
			</fieldset>
		</form>
	</div>

	<div id="open-dialog" title="Open">
		<fieldset>
			<label class="input-label" for="token-list">Select a Token to open:</label>
			<select id="token-list" name="token-list" size="9" style="margin: auto"></select>
		</fieldset>
	</div>

	<div id="image-dialog" title="Image">
		<div id="image-dialog-container">
			<div class="image-dialog-button" id="add-overlay-button" onclick="openOverlay()">ADD TEXT OVERLAY</div>
			<div class="image-dialog-button" style="display:none" id="remove-overlay-button" onclick="removeOverlay()">REMOVE TEXT OVERLAY</div>
			<div class="image-dialog-button" style="display:none" id="change-overlay-button" onclick="changeOverlay()">CHANGE TEXT OVERLAY</div>
			<div class="image-dialog-button" id="add-gallery-button" onclick="createGallery()"><i class="fa fa-picture-o fa-lg picture-o"></i> CREATE GALLERY</div>
			<div class="image-dialog-button" id="add-hyperlink-button" onclick="<?php echo intval($_SESSION["level"]) > 1 ? "openHyperlinkInput()" : "standardFeature()"; ?>"><i class="fa fa-link fa-lg link"></i> ADD HYPERLINK</div>
			<div  class="image-dialog-button small-image-dialog-button" id="remove-hyperlink-button" onclick="removeHyperlink()"><i class="fa fa-remove fa-lg remove"></i> REMOVE HYPERLINK</div>
			<div  class="image-dialog-button  small-image-dialog-button" id="change-hyperlink-button" onclick="changeHyperlink()"><i class="fa fa-edit fa-lg edit"></i> CHANGE HYPERLINK</div>
			<input id="hyperlink-text" placeholder="https://www.example.com" disabled>
		</div>
		<div  class="image-dialog-button  small-image-dialog-button" id="close-image-dialog-button" onclick="$('#image-dialog').dialog('close')"><i class="fa fa-close fa-lg close"></i> CLOSE</div>
	</div>

	
	<script>
		document.getElementById('select-image-file').addEventListener('change', handleImageFileSelect, false);
		document.getElementById('select-media-file').addEventListener('change', handleMediaFileSelect, false);
		document.getElementById('select-attachment-file').addEventListener('change', handleAttachmentFileSelect, false);

		$("#preview-link").val("");

		selectTemplate("template-1");
	</script>

</body>
</html>
