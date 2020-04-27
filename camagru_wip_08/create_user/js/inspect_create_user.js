function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "rgba(255, 0, 0, 0.3)";
   else
      champ.style.backgroundColor = "rgba(0, 255, 0, 0.3)";
}

function verifPseudo(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
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

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(champ && champ.value && !regex.test(champ.value))
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
