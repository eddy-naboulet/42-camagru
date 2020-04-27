(function() {
	const	form = document.querySelector('#formPassword');
	const	submitButton = form.querySelector('input[type=submit]');

	submitButton.addEventListener('click', forgot_password, true);

	function forgot_password(evt)
	{
		evt.preventDefault();
		const data = new FormData();
		data.append('login', form.querySelector('input[name=login]').value);
		const test_log = form.querySelector('input[name=login]');
		const spans = form.querySelectorAll('span');
		if(!test_log)
		{
			alert("Empty fields");
			return;
		}
		else {

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
				if (ajax.responseText ==="email send")
				{
					document.getElementById("my_btn").value=ajax.responseText;
					submitButton.style.color = "green";
					window.setTimeout("location=('../index.php');",3000);
				}
				else
				 {
					 document.getElementById("my_btn").value=ajax.responseText;
	 				submitButton.style.color = "red";
				 }

				submitButton.disabled = false;
			}
		}
		ajax.open("POST", "php/forgot_password_server.php", true);
		ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
		ajax.send(data);
	}
}

})();
