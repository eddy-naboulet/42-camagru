(function() {
	const	like_form = document.querySelectorAll('#formlikes');

	like_form.forEach((form) =>
	{
		form.addEventListener('submit', (evt) => {
			evt.preventDefault();
			const submit = form.querySelector('#like_button');
			const data = new FormData();
			data.append('id_pictures', form.querySelector('textarea[name=id_pictures]').value);
			data.append('author_picture', form.querySelector('textarea[name=author_picture]').value);
			data.append('nb_page', form.querySelector('textarea[name=nb_page]').value);
			const ajax = new XMLHttpRequest();
			if (!ajax)
				return ;
			ajax.onreadystatechange = () => {
				if (ajax.readyState == 1)
				{
					submit.disabled = true;
				}
				if (ajax.readyState == 4)
				{
					if (ajax.status == 200)
					{
						submit.style.color = "green";
						const likeCount =  form.querySelector('#prout');
						submit.innerHTML = ajax.responseText;
						likeCount.innerHTML = +likeCount.innerHTML + 1;
					}
					else
					 {
						submit.innerHTML = ajax.responseText;
						submit.style.color = "red";
					 }

					submit.disabled = false;
				}
			}
			ajax.open("POST", "php/like_server.php", true);
			ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
			ajax.send(data);
		}, true);
	})

	})();
