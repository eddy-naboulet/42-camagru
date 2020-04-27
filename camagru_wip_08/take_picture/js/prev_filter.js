function prev_filter(id)
{
	if (id == "Richard")
	{
		var obj = document.querySelector('#Richard');
		obj.style.display = "block";
		document.querySelector('#Peter').style.display = "none";
		document.querySelector('#Rasmus').style.display = "none";
		document.querySelector('#Aubrey').style.display = "none";
		document.querySelector('#Charlie').style.display = "none";
		document.querySelector('#Dennis').style.display = "none";
		document.querySelector('#Earl').style.display = "none";
		document.querySelector('#Graham').style.display = "none";
	}
	else if (id == "Peter")
	{
		var obj = document.querySelector('#Peter');
		obj.style.display = "block";
		document.querySelector('#Richard').style.display = "none";
		document.querySelector('#Rasmus').style.display = "none";
		document.querySelector('#Aubrey').style.display = "none";
		document.querySelector('#Charlie').style.display = "none";
		document.querySelector('#Dennis').style.display = "none";
		document.querySelector('#Earl').style.display = "none";
		document.querySelector('#Graham').style.display = "none";
	}
	else if (id == "Rasmus")
	{
		var obj = document.querySelector('#Rasmus');
		obj.style.display = "block";
		document.querySelector('#Richard').style.display = "none";
		document.querySelector('#Peter').style.display = "none";
		document.querySelector('#Aubrey').style.display = "none";
		document.querySelector('#Charlie').style.display = "none";
		document.querySelector('#Dennis').style.display = "none";
		document.querySelector('#Earl').style.display = "none";
		document.querySelector('#Graham').style.display = "none";
	}
	else if (id == "Aubrey")
	{
		var obj = document.querySelector('#Aubrey');
		obj.style.display = "block";
		document.querySelector('#Richard').style.display = "none";
		document.querySelector('#Peter').style.display = "none";
		document.querySelector('#Rasmus').style.display = "none";
		document.querySelector('#Charlie').style.display = "none";
		document.querySelector('#Dennis').style.display = "none";
		document.querySelector('#Earl').style.display = "none";
		document.querySelector('#Graham').style.display = "none";
	}
	else if (id == "Charlie")
	{
		var obj = document.querySelector('#Charlie');
		obj.style.display = "block";
		document.querySelector('#Richard').style.display = "none";
		document.querySelector('#Peter').style.display = "none";
		document.querySelector('#Rasmus').style.display = "none";
		document.querySelector('#Aubrey').style.display = "none";
		document.querySelector('#Dennis').style.display = "none";
		document.querySelector('#Earl').style.display = "none";
		document.querySelector('#Graham').style.display = "none";
	}
	else if (id == "Dennis")
	{
		var obj = document.querySelector('#Dennis');
		obj.style.display = "block";
		document.querySelector('#Richard').style.display = "none";
		document.querySelector('#Peter').style.display = "none";
		document.querySelector('#Rasmus').style.display = "none";
		document.querySelector('#Aubrey').style.display = "none";
		document.querySelector('#Charlie').style.display = "none";
		document.querySelector('#Earl').style.display = "none";
		document.querySelector('#Graham').style.display = "none";
	}
	else if (id == "Earl")
	{
		var obj = document.querySelector('#Earl');
		obj.style.display = "block";
		document.querySelector('#Richard').style.display = "none";
		document.querySelector('#Peter').style.display = "none";
		document.querySelector('#Rasmus').style.display = "none";
		document.querySelector('#Aubrey').style.display = "none";
		document.querySelector('#Charlie').style.display = "none";
		document.querySelector('#Dennis').style.display = "none";
		document.querySelector('#Graham').style.display = "none";
	}
	else if (id == "Graham")
	{
		var obj = document.querySelector('#Graham');
		obj.style.display = "block";
		document.querySelector('#Richard').style.display = "none";
		document.querySelector('#Peter').style.display = "none";
		document.querySelector('#Rasmus').style.display = "none";
		document.querySelector('#Aubrey').style.display = "none";
		document.querySelector('#Charlie').style.display = "none";
		document.querySelector('#Dennis').style.display = "none";
		document.querySelector('#Earl').style.display = "none";
	}
	else{
		alert("Please select a file");
	}
}
