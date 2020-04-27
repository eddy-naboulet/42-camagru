function openNav(src) {
	document.getElementById("mylightbox").style.width = "100%";
    document.getElementById("mylightbox").style.height = "100%";
	document.getElementById("tchoin").src = src;
	const test = document.getElementById("bck");
	test.classList += " BLR";
}

function closeNav() {
	document.getElementById("mylightbox").style.width = "0%";
    document.getElementById("mylightbox").style.height = "0%";
	document.getElementById("ggl").style.visibility = "visible";
	const test = document.getElementById("bck");
	test.classList = "cb-slideshow BW";

}
