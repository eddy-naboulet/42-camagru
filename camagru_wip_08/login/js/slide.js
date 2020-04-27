function open_create_user() {
    document.getElementById("my_create_user").style.width = "50%";
	const test = document.getElementById("bck");
	document.getElementById("open_create_user").style.visibility = "hidden";
	document.getElementById("open_login").style.visibility = "hidden";
	document.getElementById("open_gallery").style.visibility = "hidden";
	test.classList += " BLR";

}
function close_create_user() {
    document.getElementById("my_create_user").style.width = "0";
	document.getElementById("open_create_user").style.visibility = "visible";
	document.getElementById("open_login").style.visibility = "visible";
	document.getElementById("open_gallery").style.visibility = "visible";
	const test = document.getElementById("bck");
	test.classList = "cb-slideshow BW";

}
function open_login() {
    document.getElementById("my_login").style.width = "50%";
	const test = document.getElementById("bck");
	document.getElementById("open_create_user").style.visibility = "hidden";
	document.getElementById("open_login").style.visibility = "hidden";
	document.getElementById("open_gallery").style.visibility = "hidden";
	test.classList += " BLR";

}
function close_login() {
    document.getElementById("my_login").style.width = "0";
	document.getElementById("open_create_user").style.visibility = "visible";
	document.getElementById("open_login").style.visibility = "visible";
	document.getElementById("open_gallery").style.visibility = "visible";
	const test = document.getElementById("bck");
	test.classList = "cb-slideshow BW";

}
