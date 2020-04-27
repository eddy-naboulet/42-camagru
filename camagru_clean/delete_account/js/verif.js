function surligne(champ, erreur)
{
   if(erreur)
	  champ.style.backgroundColor = "rgba(255, 0, 0, 0.3)";
   else
	  champ.style.backgroundColor = "rgba(0, 255, 0, 0.3)";
}

function verifPassword(champ)
{
   var regex = /(?=.*\w)(?=.*\d)(?=.*[A-Z]).{8}/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

function verifVerifPassword(champ) {
	var password = document.querySelector('input[name=password]');
	if (champ.value === password.value) {
		surligne(champ, false);
		return (true);
	} else {
		surligne(champ, true);
		return (false);
	}
}
// function verifDelete(champ) {
// 	var delete_a = document.querySelector('input[name=delete_c]');
// 	if (champ.value === delete_a.value) {
// 		surligne(champ, false);
// 		return (true);
// 	} else {
// 		surligne(champ, true);
// 		return (false);
// 	}
// }
function verifDelete(champ)
{
	var test = document.querySelector('input[name=delete_c]');
	console.log(champ.value);
   if(champ.value != test.value)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
