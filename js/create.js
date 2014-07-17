var imageType = /image.*/;
var videoType = /video.*/;
var audioType = /audio.*/;

$(document).ready(function() {
	$('.open-popup-link').magnificPopup({
		type: 'inline',
		midClick: true
	});
});

function sendGiftbox() {
	if (!document.getElementById('email').value) {
		document.getElementById('send-message').innerHTML = "Please enter a valid email address.";
	} else {
		var email = document.getElementById('email').value;
		var previewId = document.getElementById('preview-id').value;
		var xmlhttp = new XMLHttpRequest();
		var url = "send_preview.php?email=" + encodeURIComponent(email) + "&preview_id=" + encodeURIComponent(previewId);
		xmlhttp.open("GET", url, false);
		xmlhttp.send();
		try {
			var jsonObj = JSON.parse(xmlhttp.responseText);
			if (jsonObj.message === 'SUCCESSS'){
				$.magnificPopup.close();
			}
			else {
				document.getElementById('send-message').innerHTML = jsonObj.message;
			}
		} catch(err) {
			alert(xmlhttp.responseText);
		}
	}
}

/************** BENTO DRAG/DROP HANDLERS *****************/

function handleDragEnter(e) {
	this.classList.add('over');
}

function handleDragOver(e) {
	if (e.preventDefault) {
		e.preventDefault();
	}
	e.dataTransfer.dropEffect = 'move';

	return false;
}

function handleDragLeave(e) {
	this.classList.remove('over');
}

function handleDrop(e) {
	if (e.preventDefault) {
		e.preventDefault(); // Necessary. Allows us to drop.
	}
	this.classList.remove('over');
	var mimeType = e.dataTransfer.getData('mime_type');
	var img;
	var imageId;
	if (mimeType.match(imageType)) {

		// remove any previously dropped image
		removeImage(this);

		// get the drop data
		var src = e.dataTransfer.getData('text');
//		var item0 = e.dataTransfer.getData('text/plain');
//		var item1 = e.dataTransfer.getData('text/uri-list');
//		var item2 = e.dataTransfer.getData('text/html');

		// create an IMG element
		img = document.createElement('img');

		// create a DIV element
		var div = document.createElement('div');

		// set the IMG attributes
		img.setAttribute('src', src);
		imageId = this.id + '-image';
		img.id = imageId;

		// set the DIV attributes
		var divId = this.id + '-image-container';
		div.id = divId;
		div.style.position = 'absolute';

		// add the IMG to the DIV, add the DIV to the bento
		div.appendChild(img);
		this.appendChild(div);

		// make the IMG draggable inside the DIV
		$('#'+ img.id).draggable({ containment: "#" + div.id});

		// now resize the image so that it covers the bento
		resizeImage(img, this);

		// resize the image container so that the image has scroll containment
		resizeContainer(this, img, div);	

		// change the hover for the bento to show the slider
		showControls(this);
		
		// bring existing download icon back to the front
		var iconId = this.id + "-download-icon";
		var downloadIcon = document.getElementById(iconId);
		if (downloadIcon) {
			$('#'+iconId).css('z-index', "9999");
		}
	} else if (mimeType.match(audioType) || mimeType.match(videoType)) {
		img = document.createElement('img');
		img.setAttribute('src', 'images/download.jpg');
		imageId = this.id + '-download-icon';
		img.id = imageId;
		img.classList.add("download-icon");
		this.appendChild(img);
	}
	
	return false;
}

function handleDragEnd(e) {
	this.classList.remove('over');
}

function handleDragStart(e) {
	e.dataTransfer.setData("mime_type", this.file.type);
}

//******* SIDEBAR DRAG/DROP HANDLERS *****************

function handleAddImageDragEnter(e) {
	this.classList.add('over');
}

function handleAddImageDragOver(e) {
	if (e.preventDefault) {
		e.preventDefault();
	}
	e.dataTransfer.dropEffect = 'move';

	return false;
}
function handleAddImageDragLeave(e) {
	this.classList.remove('over');
}

function handleAddImageDrop(e) {
	if (e.preventDefault) {
		e.preventDefault(); // Necessary. Allows us to drop.
	}
	this.classList.remove('over');
	handleImageFiles(e.dataTransfer.files);
}

function handleAddMediaDrop(e) {
	if (e.preventDefault) {
		e.preventDefault(); // Necessary. Allows us to drop.
	}
	this.classList.remove('over');
	handleMediaFiles(e.dataTransfer.files);
}

function handleAddImageDragEnd(e) {
	this.classList.remove('over');
}

function handleImageFiles(files) {
	var tabs = document.getElementById("images-tab");
	for (var i = 0; i < files.length; i++) {
		var file = files[i];

		// if not an image go on to next file
		if (!file.type.match(imageType)) {
			alert("This drop zone only accepts image files (.jpg, .png, etc.).");
			continue;
		}

		var img = document.createElement("img");
		img.classList.add("photo-thumbnail");
		img.src = window.URL.createObjectURL(file);
		img.file = file;
		img.addEventListener('dragstart', handleDragStart, false);
		tabs.appendChild(img);
	}
}

function handleMediaFiles(files) {
    var tabs = document.getElementById("media-tab");
    for (var i = 0; i < files.length; i++) {
		var file = files[i];

		// if not an image go on to next file
		if (!file.type.match(videoType) && !file.type.match(audioType)) {
			alert("This drop zone only accepts music and video files (.mp3, .mp4, etc.).");
			continue;
		}

		var element;
		if (file.type.match(videoType)) {
			element = document.createElement("img");
			element.src = "images/video.jpg";
		}
		if (file.type.match(audioType)) {
			element = document.createElement("img");
			element.src = "images/audio.jpg";
		}
		element.classList.add("photo-thumbnail");
		element.file = file;
		element.addEventListener('dragstart', handleDragStart, false);
		tabs.appendChild(element);
    }

}

function handleImageFileSelect(evt) {
	handleImageFiles(evt.target.files);
}

function handleMediaFileSelect(evt) {
    handleMediaFiles(evt.target.files);
}


//******************************************************
function hideControls(bento) {
	var sliderId = bento.id + '-slider';
	var closeId = bento.id + '-close';
	var css = '.bento:hover #' + sliderId + '{display: none;} .bento:hover #' + closeId + '{display: none;}';
	var style = document.createElement('style');
	if (style.styleSheet)
		style.styleSheet.cssText = css;
	else 
		style.appendChild(document.createTextNode(css));
	document.getElementsByTagName('head')[0].appendChild(style);
	
	// put the slider on top
	document.getElementById(sliderId).style.zIndex = -9999;
	document.getElementById(closeId).style.zIndex = -9999;
}

function showControls(bento) {
	var sliderId = bento.id + '-slider';
	var closeId = bento.id + '-close';
	var css = '.bento:hover #' + sliderId + '{display: block;} .bento:hover #' + closeId + '{display: block;}';
	var style = document.createElement('style');
	if (style.styleSheet)
		style.styleSheet.cssText = css;
	else 
		style.appendChild(document.createTextNode(css));
	document.getElementsByTagName('head')[0].appendChild(style);
	
	// put the slider on top
	document.getElementById(sliderId).style.zIndex = 9999;
	document.getElementById(closeId).style.zIndex = 9999;
}

function removeChild(parent, childId) {
	var child = document.getElementById(childId);
	if (child) {
		parent.removeChild(child);
	}
}

function removeImage(bento) {
	removeChild(bento, bento.id + '-image-container');
	hideControls(bento);
}

function resizeContainer(bento, img, div) {
	// resize the DIV so that the image covers the bento with no white space
	var widthDiff = img.width - bento.offsetWidth;
	var heightDiff = img.height - bento.offsetHeight;
	var divWidth = bento.offsetWidth + (widthDiff * 2);
	var divHeight = bento.offsetHeight + (heightDiff * 2);
	div.style.width = divWidth + 'px';
	div.style.height = divHeight + 'px';
	div.style.left = (0 - ((divWidth - bento.offsetWidth) / 2)) + 'px';
	div.style.top = (0 - ((divHeight - bento.offsetHeight) / 2)) + 'px';
	img.style.left = ((divWidth / 2) - (img.width / 2)) + 'px';
	img.style.top = ((divHeight / 2) - (img.height / 2)) + 'px';
}

function resizeImage(img, bento) {
	var imgAspectRatio = img.height / img.width;
	var bentoAspectRatio = bento.offsetHeight / bento.offsetWidth;
	if (bentoAspectRatio < imgAspectRatio) {
//		img.width = bento.offsetWidth;
		img.style.height = "auto";
		img.style.width = bento.offsetWidth + "px";
	} else {
//		img.height = bento.offsetHeight;
		img.style.width = "auto";
		img.style.height = bento.offsetHeight + "px";
	}
	img.style.top = 0;
	img.style.left = 0;
	
	// set values for slider scaling
	img.originalWidth = img.width;
	img.originalHeight = img.height;
}

function resizeContents(bento, img, div) {
	resizeImage(img, bento);
	resizeContainer(bento, img, div);
}

function handleSearch(field) {
	var textLength = field.value.length;
	var index = 1;
	
	var images = document.querySelectorAll('.result-image');
	[].forEach.call(images, function(image) {
		if (index <= textLength) {
			image.style.display = "inline";
		} else {
			image.style.display = "none";
		}
		index += 1;
	});
}

function handleSliderEvent(event, ui) {
	var bento = event.target.parentNode;
	var nameRoot = bento.id;
	var image = document.getElementById(nameRoot + "-image");
	var container = document.getElementById(nameRoot + "-image-container");
	
	// change the value into a float (e.g. 1.5);
	var value = ui.value / 100;

	// scale the image
	image.style.width = (image.originalWidth * value) + "px";
	image.style.height = (image.originalHeight * value) + "px";
	
	// now resize the container so the image can be moved around
	resizeContainer(bento, image, container);
}

$(function() {
	$(".image-slider").slider({
		orientation: "vertical",
		min: 100,
		max: 400,
		slide: function(event, ui) {
			handleSliderEvent(event, ui);
		}
	});
});

function handleHorizontalDrag(target, movement) {
	var index;
	var newWidth;
	var newLeft;

	for (index = 0; index < target.leftDependents.length; ++index) {
		var leftDependent = target.leftDependents[index];
		newWidth = parseInt(getComputedStyle(leftDependent).width, 10) + movement;
		leftDependent.style.width = newWidth + "px";
		var leftImage = document.getElementById(leftDependent.id + "-image");
		if (leftImage) {
			var leftContainer = document.getElementById(leftDependent.id + "-image-container");
			resizeContents(leftDependent, leftImage, leftContainer);
		}
	}	

	for (index = 0; index < target.rightDependents.length; ++index) {
		var rightDependent = target.rightDependents[index];
		newWidth = parseInt(getComputedStyle(rightDependent).width, 10) - movement;
		newLeft = parseInt(getComputedStyle(rightDependent, null).left, 10) + movement;
		rightDependent.style.left = newLeft + "px";
		rightDependent.style.width = newWidth + "px";
		var rightImage = document.getElementById(rightDependent.id + "-image");
		if (rightImage) {
			var rightContainer = document.getElementById(rightDependent.id + "-image-container");
			resizeContents(rightDependent, rightImage, rightContainer);
		}
	}
}

function handleVerticalDrag(target, movement) {
	var index;

	for (index = 0; index < target.topDependents.length; ++index) {
		var topDependent = target.topDependents[index];
		var newHeight = parseInt(getComputedStyle(topDependent).height, 10) + movement;
		topDependent.style.height = newHeight + "px";
		var topSlider = document.getElementById(topDependent.id + "-slider");
		if (topSlider) {
			topSlider.style.height = (newHeight - 45) + "px";
		}
		var topImage = document.getElementById(topDependent.id + "-image");
		if (topImage) {
			var topContainer = document.getElementById(topDependent.id + "-image-container");
			resizeContents(topDependent, topImage, topContainer);
		}
	}	

	for (index = 0; index < target.bottomDependents.length; ++index) {
		var bottomDependent = target.bottomDependents[index];
		bottomDependent.style.top = (parseInt(getComputedStyle(bottomDependent, null).top, 10) + movement) + "px";
		var newHeight = parseInt(getComputedStyle(bottomDependent).height, 10) - movement;
		bottomDependent.style.height = newHeight + "px";
		var bottomSlider = document.getElementById(bottomDependent.id + "-slider");
		if (bottomSlider) {
			bottomSlider.style.height = (newHeight - 45) + "px";
		}
		var bottomImage = document.getElementById(bottomDependent.id + "-image");
		if (bottomImage) {
			var bottomContainer = document.getElementById(bottomDependent.id + "-image-container");
			resizeContents(bottomDependent, bottomImage, bottomContainer);
		}
	}
}

$(function() {
	var divider;

	// Template #1
	divider = document.getElementById("divider-1-1");
	divider.leftDependents = [document.getElementById("bento-1-1")];
	divider.rightDependents = [document.getElementById("bento-1-2"), document.getElementById("divider-container-1-2")];

	divider = document.getElementById("divider-1-2");
	divider.leftDependents = [document.getElementById("bento-1-2"), document.getElementById("divider-container-1-1")];
	divider.rightDependents = [document.getElementById("bento-1-3"), document.getElementById("bento-1-4"), document.getElementById("divider-1-3"), document.getElementById("divider-container-1-3")];

	divider = document.getElementById("divider-1-3");
	divider.topDependents = [document.getElementById("bento-1-3")];
	divider.bottomDependents = [document.getElementById("bento-1-4")];

	$("#divider-1-1").draggable({
		axis: "x",
		containment: "#divider-container-1-1",
		drag: function(event, ui) {
			handleHorizontalDrag(event.target, ui.position.left - ui.originalPosition.left);
			ui.originalPosition.left = ui.position.left;
		}
	});
	
	$("#divider-1-2").draggable({
		axis: "x",
		containment: "#divider-container-1-2",
		drag: function(event, ui) {
			handleHorizontalDrag(event.target, ui.position.left - ui.originalPosition.left);
			ui.originalPosition.left = ui.position.left;
		}
	});

	$("#divider-1-3").draggable({
		axis: "y",
		containment: "#divider-container-1-3",
		drag: function(event, ui) {
			handleVerticalDrag(event.target, ui.position.top - ui.originalPosition.top);
			ui.originalPosition.top = ui.position.top;
		}
	});
	
	// Template #2
	divider = document.getElementById("divider-2-1");
	divider.leftDependents = [document.getElementById("bento-2-1"), document.getElementById("bento-2-2"), document.getElementById("divider-2-2"), document.getElementById("divider-container-2-2")];
	divider.rightDependents = [document.getElementById("bento-2-3"), document.getElementById("bento-2-4"), document.getElementById("bento-2-5"), document.getElementById("divider-2-3"), document.getElementById("divider-2-4"), document.getElementById("divider-container-2-3"), document.getElementById("divider-container-2-4")];

	divider = document.getElementById("divider-2-2");
	divider.topDependents = [document.getElementById("bento-2-1")];
	divider.bottomDependents = [document.getElementById("bento-2-2")];

	divider = document.getElementById("divider-2-3");
	divider.topDependents = [document.getElementById("bento-2-3")];
	divider.bottomDependents = [document.getElementById("bento-2-4"), document.getElementById("divider-container-2-4")];

	divider = document.getElementById("divider-2-4");
	divider.topDependents = [document.getElementById("bento-2-4"), document.getElementById("divider-container-2-3")];
	divider.bottomDependents = [document.getElementById("bento-2-5")];

	$("#divider-2-1").draggable({
		axis: "x",
		containment: "#divider-container-2-1",
		drag: function(event, ui) {
			handleHorizontalDrag(event.target, ui.position.left - ui.originalPosition.left);
			ui.originalPosition.left = ui.position.left;
		}
	});
	
	$("#divider-2-2").draggable({
		axis: "y",
		containment: "#divider-container-2-2",
		drag: function(event, ui) {
			handleVerticalDrag(event.target, ui.position.top - ui.originalPosition.top);
			ui.originalPosition.top = ui.position.top;
		}
	});
	
	$("#divider-2-3").draggable({
		axis: "y",
		containment: "#divider-container-2-3",
		drag: function(event, ui) {
			handleVerticalDrag(event.target, ui.position.top - ui.originalPosition.top);
			ui.originalPosition.top = ui.position.top;
		}
	});
	
	$("#divider-2-4").draggable({
		axis: "y",
		containment: "#divider-container-2-4",
		drag: function(event, ui) {
			handleVerticalDrag(event.target, ui.position.top - ui.originalPosition.top);
			ui.originalPosition.top = ui.position.top;
		}
	});
	
	// Template #3
	divider = document.getElementById("divider-3-1");
	divider.leftDependents = [document.getElementById("bento-3-1"), document.getElementById("bento-3-2"), document.getElementById("divider-3-3"), document.getElementById("divider-container-3-3")];
	divider.rightDependents = [document.getElementById("bento-3-3"), document.getElementById("bento-3-4"), document.getElementById("divider-3-4"), document.getElementById("divider-container-3-2")];

	divider = document.getElementById("divider-3-2");
	divider.leftDependents = [document.getElementById("bento-3-3"), document.getElementById("bento-3-4"), document.getElementById("divider-3-4"), document.getElementById("divider-container-3-1"), document.getElementById("divider-container-3-4")];
	divider.rightDependents = [document.getElementById("bento-3-5"), document.getElementById("bento-3-6"), document.getElementById("divider-3-5"), document.getElementById("divider-container-3-5")];

	divider = document.getElementById("divider-3-3");
	divider.topDependents = [document.getElementById("bento-3-1")];
	divider.bottomDependents = [document.getElementById("bento-3-2")];

	divider = document.getElementById("divider-3-4");
	divider.topDependents = [document.getElementById("bento-3-3")];
	divider.bottomDependents = [document.getElementById("bento-3-4")];

	divider = document.getElementById("divider-3-5");
	divider.topDependents = [document.getElementById("bento-3-5")];
	divider.bottomDependents = [document.getElementById("bento-3-6")];

	$("#divider-3-1").draggable({
		axis: "x",
		containment: "#divider-container-3-1",
		drag: function(event, ui) {
			handleHorizontalDrag(event.target, ui.position.left - ui.originalPosition.left);
			ui.originalPosition.left = ui.position.left;
		}
	});
	
	$("#divider-3-2").draggable({
		axis: "x",
		containment: "#divider-container-3-2",
		drag: function(event, ui) {
			handleHorizontalDrag(event.target, ui.position.left - ui.originalPosition.left);
			ui.originalPosition.left = ui.position.left;
		}
	});

	$("#divider-3-3").draggable({
		axis: "y",
		containment: "#divider-container-3-3",
		drag: function(event, ui) {
			handleVerticalDrag(event.target, ui.position.top - ui.originalPosition.top);
			ui.originalPosition.top = ui.position.top;
		}
	});
	
	$("#divider-3-4").draggable({
		axis: "y",
		containment: "#divider-container-3-4",
		drag: function(event, ui) {
			handleVerticalDrag(event.target, ui.position.top - ui.originalPosition.top);
			ui.originalPosition.top = ui.position.top;
		}
	});
	
	$("#divider-3-5").draggable({
		axis: "y",
		containment: "#divider-container-3-5",
		drag: function(event, ui) {
			handleVerticalDrag(event.target, ui.position.top - ui.originalPosition.top);
			ui.originalPosition.top = ui.position.top;
		}
	});

});

function stack(top, middle, bottom) {
	$(top).css('z-index', "3");
	$(middle).css('z-index', "2");
	$(bottom).css('z-index', "1");
}
