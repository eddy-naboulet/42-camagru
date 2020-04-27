(function() {
	const	comments_form = document.querySelectorAll('#formcomments');

	comments_form.forEach((form) =>
	{
		form.addEventListener('submit', (evt) => {
			evt.preventDefault();
			const submit = form.querySelector('#form_button');
			const data = new FormData();
			data.append('id_pictures', form.querySelector('textarea[name=id_pictures]').value);
			data.append('author_picture', form.querySelector('textarea[name=author_picture]').value);
			data.append('nb_page', form.querySelector('textarea[name=nb_page]').value);
			data.append('id_comment', form.querySelector('textarea[name=id_comment]').value);
							const comment_content = form.id_comment,
							id_pictures = form.id_pictures,
							author_picture = form.author_picture;
							author_comment = form.author_comment;
							author_profile_picture = form.author_profile_picture;

			const ajax = new XMLHttpRequest();
			if (!ajax)
				return ;
			if (!comment_content.value)
			{
				alert("empty");
			}
			else {

			ajax.onreadystatechange = () => {
				if (ajax.readyState == 1)
				{
					submit.disabled = true;
				}
				if (ajax.readyState == 4)
				{
					if (ajax.status == 200)
					{
						const parent = form.nextSibling;
						const table = document.createElement('table');
						const first_tr = document.createElement('tr');
						const new_profile_picture = document.createElement('td');
						const new_picture = document.createElement('img');
						const new_name_author = document.createElement('td');
						const new_comment = document.createElement('p');
						const new_comments = document.createElement('td');
						const new_commenter = document.createElement('p');
						const new_commenter_date = document.createElement('p');
						const second_tr = document.createElement('tr');
						const hidden_td1 = document.createElement('td');
						const hidden_td2 = document.createElement('td');
						const third_tr = document.createElement('tr');
						const hidden_td3 = document.createElement('td');
						const hidden_td4 = document.createElement('td');
						const tbody_all = document.createElement('tbody');
						table.className= "lightbox_zm2";
						new_profile_picture.className = "profile-picture_user";
						new_name_author.className = "profile-picture_user";
						new_comment.className = "user_login";
						new_comments.className = "comment_user";
						new_commenter.className = "comment";
						new_commenter_date.className = "date_comment";
						new_picture.className = "ppr_pict"
						hidden_td1.className = "none";
						hidden_td2.className = "none";
						hidden_td3.className = "none";
						hidden_td4.className = "none";

						parent.appendChild(table);
						table.appendChild(tbody_all)
						tbody_all.appendChild(first_tr);
						tbody_all.appendChild(second_tr);
						tbody_all.appendChild(third_tr);
						first_tr.appendChild(new_profile_picture);
						first_tr.appendChild(new_name_author);
						first_tr.appendChild(new_comments);
						second_tr.appendChild(hidden_td1);
						second_tr.appendChild(hidden_td2);
						third_tr.appendChild(hidden_td3);
						third_tr.appendChild(hidden_td4);
						new_profile_picture.appendChild(new_picture);
						new_name_author.appendChild(new_comment);
						new_comments.appendChild(new_commenter);
						new_comments.appendChild(new_commenter_date);
						new_commenter.innerHTML = comment_content.value;
						new_picture.src = '../'+author_profile_picture.value;
						new_comment.innerHTML = author_comment.value;
						new_commenter_date.innerHTML = 'now';
						comment_content.value = "";
					}
					else
					 {
						submit.style.color = "red";
					 }

					submit.disabled = false;
				}
			}
			ajax.open("POST", "php/insert_comment.php", true);
			ajax.setRequestHeader('X-Requested-With', 'xmlhttprequest');
			ajax.send(data);
		}
		}, true);
	})

	})();
