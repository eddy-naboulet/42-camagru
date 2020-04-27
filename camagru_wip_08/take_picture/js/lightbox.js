function openNav(src) {
	// document.getElementById("mylightbox").style.width = "100%";

	// document.getElementById("mylightbox").style.visibility = "visible";
	document.getElementById("mylightbox").style.width = "100%";
    document.getElementById("mylightbox").style.height = "50%";
	document.getElementById("tchoin").src = src;
	const test = document.getElementById("bck");
	test.classList += " BLR";
	// console.log(src);
}

function closeNav() {
	// document.getElementById("mylightbox").style.width = "0";
    // document.getElementById("mylightbox").style.visibility = "hidden";
	document.getElementById("mylightbox").style.width = "0%";
    document.getElementById("mylightbox").style.height = "0%";
	document.getElementById("ggl").style.visibility = "visible";
	const test = document.getElementById("bck");
	test.classList = "cb-slideshow BW";

}
