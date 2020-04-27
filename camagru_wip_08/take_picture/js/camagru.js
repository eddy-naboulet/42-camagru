(function() {

  var streaming = false,
      video        = document.querySelector('#video'),
      cover        = document.querySelector('#cover'),
      canvas       = document.querySelector('#canvas'),
      photo        = document.querySelector('#photo'),
      startbutton  = document.querySelector('#startbutton'),
      width = 600,
      height = 450;

  navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia);

  navigator.getMedia(
    {
      video: true,
      audio: false
    },
    function(stream) {
      if (navigator.mozGetUserMedia) {
        video.mozSrcObject = stream;
      } else {
        var vendorURL = window.URL || window.webkitURL;
		video.src = vendorURL.createObjectURL(stream);
      }
      video.play();
    },
    function(err) {
      console.log("An error occured! " + err);
    }
  );

  video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);
      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);
      streaming = true;
    }
  }, false);

	function sendPhoto(data) {
		const ajax = new XMLHttpRequest();
		var alerte = document.querySelector('input[name=mask]:checked');
		if(!alerte)
		{
			alert("Please select a Masks");
			return ;
		}
		else{

			const data_img = {
				mask: document.querySelector('input[name=mask]:checked').value,
				mask_name: document.querySelector('input[name=mask]:checked').id,
				img: data,
			};
			if (!ajax) return ;
			ajax.onreadystatechange = () => {
				if (ajax.readyState == 1) {
					startbutton.disabled = true;
				}
				if (ajax.readyState == 4 && ajax.responseText !== 'error') {
					photo.src = ajax.responseText;
					startbutton.disabled = false;
				} else if (ajax.readyState == 4) {
					alert('error');
					startbutton.disabled = false;
				}
			}
			ajax.open("POST", "../tools/filter.php", true);
			ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
			ajax.send(JSON.stringify(data_img));
		}
	}

	function takepicture() {
  		canvas.width = width;
  		canvas.height = height;
  		canvas.getContext('2d').drawImage(video, 0, 0, width, height);
		var alerte = document.querySelector('input[name=mask]:checked');
		if(!alerte)
		{
			return ;
		}
		else
		{


		if(img_upload_prev())
		{
			var data = img_upload_prev();

		}
		else{
			var data = canvas.toDataURL('image/png');
		}
  		photo.setAttribute('src', data);
  		sendPhoto(data);
		add_pict();
	}
  }
  startbutton.addEventListener('click', function(ev){
	  ev.preventDefault();
      takepicture();
  }, false);
})();
function add_pict(){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function(){
		if (ajax.readyState === 4) {
			document.getElementById("gallery").innerHTML = ajax.responseText;
		}

};
ajax.open("GET", '../tools/preview.php', true);
ajax.send();
}
function img_upload_prev(){
	var data_prev = null;
	var preview = document.querySelector('#img_upload');
	var file    = document.querySelector('input[type=file]').files[0];
	var reader  = new FileReader();
	const test = document.getElementById("testspan");
	var ouais = document.getElementById('ouais');
	var data;
	ouais.onclick = charge
	if (file)
	{
		var fileName = file['name'].toLowerCase();
		if (fileName.substr(fileName.length - 4) != ".jpg" && fileName.substr(fileName.length - 4) != ".png")
		{
			alert("invalid file extension");
			var test23 = document.getElementById("ouais");
			test23.value = null;
			// return ;
		}
		else
		{
			if(test)
			{
				test.classList = "okok";
				const test2 = document.getElementById("testspan2");
				test2.classList = "";
				const test3 = document.getElementById("img_upload");
				test3.classList = "";
				setTimeout(function(){
					delete_cell();

				},500)

			}

		}
	}
	reader.onloadend = function () {
		data_prev = reader.result;
		preview.src = reader.result;
	}
	if (file) {
		var fileName = file['name'].toLowerCase();
		if (fileName.substr(fileName.length - 4) != ".jpg" && fileName.substr(fileName.length - 4) != ".png")
		{
			// alert("invalid file extension");
			return ;
		}
		if (fileName === "" || fileName === null)
		{
			preview.src = data_prev;
		}
		reader.readAsDataURL(file);
		return (preview.src);
	} else {
		// preview.src = data_prev;
		// preview.src = "";
	}
}
function charge()
{
	document.body.onfocus = roar
	console.log(ouais.value);
}
function roar()
{
	console.log(ouais.value);
	if (!ouais.value)
	{
		var ouais2 = document.getElementById('testspan2');
		console.log(ouais2);
		if(ouais2.className === "")
		{
			location.reload();
			alert('reload');
			document.body.onfocus = null;

		}
	}
}
function delete_cell()
{
	var row = document.getElementById("testspan8");
	row.deleteCell(0);
}
