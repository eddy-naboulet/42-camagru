const fields = document.querySelectorAll('.isField');
const form = document.querySelector('#msform');
const firstButton = fields[0].querySelector('input[type=button]');
const secondButton = fields[1].querySelectorAll('input[type=button]');
const thirdButton = fields[2].querySelectorAll('input[type=button]');
const progressBar = document.querySelector('#progressbar');
const pb_first_child = document.querySelector('li:first-child');
const pb_second_child = document.querySelector('li:nth-child(2)');
const pb_last_child = document.querySelector('li:last-child');

firstButton.addEventListener('click', (evt) => {
	evt.preventDefault();
	if (!verifPseudo(form.login))
		return (null);
	if (!verifMail(form.email))
		return (null)
	if (!verifPassword(form.password))
		return (null);
 	if (!verifVerifPassword(form.password_confirm))
		return (null);
	fields[0].classList.forEach((className) => {
		if (className === 'isVisible') {
			fields[0].classList += ' isAnimatedOut';
			fields[1].classList = 'isVisible isAnimatedIn isField';
			pb_second_child.classList = 'active';

			setTimeout(() => {
				fields[0].className = 'isInactive';
				fields[1].classList = 'isVisible isField';
			}, 600);
		}
	});
});


secondButton[0].addEventListener('click', (evt) => {
	evt.preventDefault();
	fields[1].classList.forEach((className) => {
		if (className === 'isVisible') {
			fields[1].classList += ' isAnimatedOutBack';
			fields[0].classList = 'isVisible isAnimatedInBack isField';
			pb_second_child.classList = '';
			setTimeout(() => {
				fields[1].className = 'isInactive';
				fields[0].classList = 'isVisible isField';
			}, 600);
		}
	});
})

secondButton[1].addEventListener('click', (evt) => {
	evt.preventDefault();
	fields[1].classList.forEach((className) => {
		if (className === 'isVisible') {
			fields[1].classList += ' isAnimatedOut';
			fields[2].classList = 'isVisible isAnimatedIn isField';
			pb_last_child.classList = 'active';
			setTimeout(() => {
				fields[1].className = 'isInactive';
				fields[2].classList = 'isVisible isField';
			}, 600);
		}
	});
})

thirdButton[0].addEventListener('click', (evt) => {
	evt.preventDefault();
	fields[2].classList.forEach((className) => {
		if (className === 'isVisible') {
			fields[2].classList += ' isAnimatedOutBack';
			fields[1].classList = 'isVisible isAnimatedInBack isField';
			pb_last_child.classList = '';
			setTimeout(() => {
				fields[2].className = 'isInactive';
				fields[1].classList = 'isVisible isField';
			}, 600);
		}
	});
})

const	submitButton = form.querySelector('input[type=submit]');

form.addEventListener('submit', (evt) => {
	evt.preventDefault();
	const data = new FormData();
	data.append('login', form.querySelector('input[name=login]').value);
	data.append('password', form.querySelector('input[name=password]').value);
	data.append('password_confirm', form.querySelector('input[name=password_confirm]').value);
	data.append('email', form.querySelector('input[name=email]').value);
	data.append('fname', form.querySelector('input[name=fname]').value);
	data.append('lname', form.querySelector('input[name=lname]').value);
	const test = form.querySelector('input[name=profile_picture]:checked');
	if(!test)
	{
		alert("Please select a profile picture");
		return ;

	}
	else
	{
		data.append('profile_picture', form.querySelector('input[name=profile_picture]:checked').value);


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
			submitButton.disabled = true;
		if (ajax.readyState == 4)
		{
			if (ajax.status == 200)
			{
				const isVisible = document.querySelector('.isVisible');
				const newMessage = document.createElement('span');
				newMessage.className = 'infoServer';
				newMessage.innerHTML = ajax.responseText;
				isVisible.appendChild(newMessage);
				submitButton.style.color = "green";
				setTimeout(function(){
					document.getElementById("open_create_user").style.visibility = "visible";
					document.getElementById("open_login").style.visibility = "visible";
					document.getElementById("open_gallery").style.visibility = "visible";
					const test = document.getElementById("bck");
					test.classList = "cb-slideshow BW";
					document.getElementById("my_create_user").style.width = "0";
				},1000);
			}
			else
			 {
				 const isVisible = document.querySelector('.isVisible');
				 const newMessage = document.createElement('span');
				 newMessage.className = 'infoServer';
				 newMessage.innerHTML = ajax.responseText;
				 isVisible.appendChild(newMessage);
				 submitButton.style.color = "red";
			 }
				submitButton.disabled = false;
		}
	}
	ajax.open("POST", "create_user/php/create_user_server.php", true);
	ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
	ajax.send(data);
}
});
