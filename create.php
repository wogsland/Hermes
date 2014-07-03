<?php
	include_once 'util.php';
	include_once 'config.php';
	if (!logged_in()) {
		header('Location: /giftbox');
		break;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Giftbox - Create</title>

	<link rel="stylesheet" href="css/jquery-ui-1.10.4.min.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/create.css" />
	<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
    <script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.magnific-popup.js"></script>
	<script src="js/create.js"></script>
	
</head>
<body>
	<div id="content-wrapper">
		<div class="header-wrapper" id="create-header-wrapper">
			<header>
				<h1>
					<a id="create-home-icon" title="Return to the Homepage" href="<?php echo $app_root ?>">Giftbox</a>
				</h1>
				<nav id="create-top-nav">
					<ul>
						<li>
							<a href="<?php echo $app_root ?>">Home</a>
						</li>
					</ul>
				</nav>
			</header>
		</div>
	
		<section id="create-section">
			<div id="palette">
				<div class="palette-box">
					<div class="palette-box-header">
						<span class="palette-box-header-text">Pick A Template</span>
					</div>
					<div class="template-thumbnail">
						<img src="./images/template-thumb-4.jpg" class="thumb-image" onclick="stack('#template-1', '#template-2', '#template-3')">
					</div>
					<div class="template-thumbnail">
						<img src="./images/template-thumb-5.jpg" class="thumb-image" onclick="stack('#template-2', '#template-3', '#template-1')">
					</div>
					<div class="template-thumbnail">
						<img src="./images/template-thumb-6.jpg" class="thumb-image" onclick="stack('#template-3', '#template-1', '#template-2')">
					</div>
				</div>
				<div class="palette-box">
					<div class="palette-box-header">
						<span class="palette-box-header-text">Border Settings</span>
					</div>
				</div>
				<div class="palette-box">
					<div class="palette-box-header">
						<span class="palette-box-header-text">Background Settings</span>
					</div>
				</div>
				<div class="palette-box">
					<div class="palette-box-header">
						<span class="palette-box-header-text">Pick A Wrapper</span>
					</div>
				</div>
			</div>
			<div id="uploads">
				<div id="image-drop-zone">
					<p id="image-drop-text">Drag and drop image files here</p>
				</div>
			</div>
			<div id="templates">
				<div id="template-button-container">
					<a class="open-popup-link template-button" id="send-button" data-effect="mfp-3d-unfold" href="#send-form">Send</a>
				</div>
				<div id="template-container">
					<div class="template" id="template-3">
						<div class="bento" id="bento-3-1">
							<div class="image-slider" id="bento-3-1-slider"></div>
							<div class="close-button" id="bento-3-1-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-3-2">
							<div class="image-slider" id="bento-3-2-slider"></div>
							<div class="close-button" id="bento-3-2-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-3-3">
							<div class="image-slider" id="bento-3-3-slider"></div>
							<div class="close-button" id="bento-3-3-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-3-4">
							<div class="image-slider" id="bento-3-4-slider"></div>
							<div class="close-button" id="bento-3-4-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-3-5">
							<div class="image-slider" id="bento-3-5-slider"></div>
							<div class="close-button" id="bento-3-5-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-3-6">
							<div class="image-slider" id="bento-3-6-slider"></div>
							<div class="close-button" id="bento-3-6-close" onclick="removeImage(this.parentElement)"></div>
						</div>
					</div>
					<div class="template" id="template-2">
						<div class="bento" id="bento-2-1">
							<div class="image-slider" id="bento-2-1-slider"></div>
							<div class="close-button" id="bento-2-1-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-2-2">
							<div class="image-slider" id="bento-2-2-slider"></div>
							<div class="close-button" id="bento-2-2-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-2-3">
							<div class="image-slider" id="bento-2-3-slider"></div>
							<div class="close-button" id="bento-2-3-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-2-4">
							<div class="image-slider" id="bento-2-4-slider"></div>
							<div class="close-button" id="bento-2-4-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-2-5">
							<div class="image-slider" id="bento-2-5-slider"></div>
							<div class="close-button" id="bento-2-5-close" onclick="removeImage(this.parentElement)"></div>
						</div>
					</div>
					<div class="template" id="template-1">
						<div class="divider-container" id="divider-container-1-1"></div>
						<div class="divider-container" id="divider-container-1-2"></div>
						<div class="divider-container" id="divider-container-1-3"></div>
						<div class="bento" id="bento-1-1">
							<div class="image-slider" id="bento-1-1-slider"></div>
							<div class="close-button" id="bento-1-1-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-1-2">
							<div class="image-slider" id="bento-1-2-slider"></div>
							<div class="close-button" id="bento-1-2-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-1-3">
							<div class="image-slider" id="bento-1-3-slider"></div>
							<div class="close-button" id="bento-1-3-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="bento" id="bento-1-4">
							<div class="image-slider" id="bento-1-4-slider"></div>
							<div class="close-button" id="bento-1-4-close" onclick="removeImage(this.parentElement)"></div>
						</div>
						<div class="divider" id="divider-1-1"></div>
						<div class="divider" id="divider-1-2"></div>
						<div class="divider" id="divider-1-3"></div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<form id="send-form" class="white-popup mfp-hide" name="send-form">
		<h1 class="dialog-header">Send Giftbox</h1>
		<div id="dialog-form-container">
			<p class="dialog-message" id="send-message"></p>
			<input id="preview-id" type="hidden" name="preview-id" value="0da4fb2c9250c2dc2f692ef051ad94cc">
			<input class="dialog-input" id="email" name="email" type="text" placeholder="Email address" size="30">
			<p>Or, copy this link into an email and send it yourself:</p>
			<input class="dialog-input" id="preview-link" name="preview-link" type="text" size="50" value="https://giftbox.com/preview.php?gbpid=0da4fb2c9250c2dc2f692ef051ad94cc" readonly="readonly">
			<a class="dialog-button dialog-button-right" href="javascript:void(0)" onClick="sendGiftbox()">Send</a>
		</div>
	</form>

	<script>
		var bentos = document.querySelectorAll('.bento');
		[].forEach.call(bentos, function(bento) {
			bento.addEventListener('dragenter', handleDragEnter, false);
			bento.addEventListener('dragover', handleDragOver, false);
			bento.addEventListener('dragleave', handleDragLeave, false);
			bento.addEventListener('drop', handleDrop, false);
			bento.addEventListener('dragend', handleDragEnd, false);
		});
		
		var imageDropZone = document.getElementById("image-drop-zone");
		imageDropZone.addEventListener('dragenter', handleAddImageDragEnter, false);
		imageDropZone.addEventListener('dragover', handleAddImageDragOver, false);
		imageDropZone.addEventListener('dragleave', handleAddImageDragLeave, false);
		imageDropZone.addEventListener('drop', handleAddImageDrop, false);
		imageDropZone.addEventListener('dragend', handleAddImageDragEnd, false);
	</script>
	
</body>
</html>