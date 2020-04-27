const	form = document.querySelector('#formPassword');
const	submitButton = form.querySelector('input[type=submit]');

submitButton.addEventListener('click', (evt) => {
		evt.preventDefault();
		if (!verifDelete(form.delete_a))
			return (null);
		evt.preventDefault();
		const data = new FormData();
		data.append('delete_a', form.delete_a.value);
		const spans = form.querySelectorAll('span');
		for (let i = 0; i < spans.length; i++)
		{
			spans[i].parentNode.removeChild(spans[i]);
		}
		const ajax = new XMLHttpRequest();
		if (!ajax)
			return ;
		ajax.onreadystatechange = () => {
			if (ajax.readyState == 1)
			{
				submitButton.disabled = true;
			}
			if (ajax.readyState == 4)
			{
				if (ajax.responseText == "Your account has been deleted")
				{
					document.getElementById("my_btn").value="ajax.responseText";
					 submitButton.style.color = "green";
					// window.setTimeout("location=('../index.php');",3000);
				}
				else
				 {
					 document.getElementById("my_btn").value=ajax.responseText;
	 				submitButton.style.color = "red";
				 }

				submitButton.disabled = false;
			}
		}
		ajax.open("POST", "php/delete_account_server.php", true);
		ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
		ajax.send(data);

});
