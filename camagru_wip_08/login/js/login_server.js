(function() {
	const	form = document.querySelector('#formlogin');
	const	submitButton = form.querySelector('input[type=submit]');

	submitButton.addEventListener('click', connectUser, true);

	function connectUser(evt)
	{
		evt.preventDefault();
		const data = new FormData();
		const test_login = form.querySelector('input[name=login]');
		const test_pwd = form.querySelector('input[name=password]');
		const spans = form.querySelectorAll('span');
		if(!test_pwd || !test_login)
		{
			alert("Empty fields");
			return ;

		}
		else {

			data.append('login', form.querySelector('input[name=login]').value);
			data.append('password', form.querySelector('input[name=password]').value);
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
				if (ajax.responseText === "Successfully logged in")
				{
					document.getElementById("my_btn").value=ajax.responseText;
					submitButton.style.color = "green";
					window.setTimeout("location=('take_picture/take_picture.php');",3000);
				}
				else
				 {
					 document.getElementById("my_btn").value=ajax.responseText;
	 				submitButton.style.color = "red";
				 }

				submitButton.disabled = false;
			}
		}
		ajax.open("POST", "login/php/login_server.php", true);
		ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
		ajax.send(data);
	}
}

})();
