const	form = document.querySelector('#formPasswordReset');
const	submitButton = form.querySelector('input[type=submit]');

submitButton.addEventListener('click', (evt) => {
		evt.preventDefault();
		if (!verifPassword(form.password))
			return (null);
	 	if (!verifVerifPassword(form.password_confirm))
			return (null);
		evt.preventDefault();
		const data = new FormData();
		data.append('password', form.password.value);
		data.append('password_confirm', form.querySelector('input[name=password_confirm]').value);
		data.append('login', form.querySelector('input[name=login]').value);
		console.log(data['password']);
		console.log(form.password.value);
		console.log(data);
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
				if (ajax.status == 200)
				{
					document.getElementById("my_btn").value=ajax.responseText;
					 submitButton.style.color = "green";
					window.setTimeout("location=('../../index.php');",3000);
				}
				else
				 {
	 				submitButton.style.color = "red";
					newMessage.style.background = "red";
				 }

				submitButton.disabled = false;
			}
		}
		ajax.open("POST", "../php/reset_password_server.php", true);
		ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
		ajax.send(data);

});
