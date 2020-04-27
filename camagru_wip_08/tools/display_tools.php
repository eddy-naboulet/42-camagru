<?php
function display_comments($ret2)
{
	echo'
	<table class="lightbox_zm2">
		<tr>
			<td class="profile-picture_user">
				<img class="ppr_pict" src=../'.$ret2['PROFILE_PICTURE_COMMENT'].' />
			</td>
			<td class="profile-picture_user">
				<p class="user_login">'.$ret2['AUTHOR_COMMENT'].'</p>
			</td>
			<td class="comment_user">
				<p class="comment">'.$ret2['COMMENT'].'</p>
				<p class="date_comment">'.$ret2['CREATE_DATE_COMMENT'].'</p>
			</td>
		</tr>
		<tr>
			<td class="none"></td>
			<td class="none"></td>
		</tr>
		<tr>
			<td class="none"></td>
			<td class="none"></td>
		</tr>
	</table>';
}
function display_gallery($ret, $nb_page, $likes)
{
	echo '
	<li class="'.$ret['MASK_NAME'].' mask" id="ff-item">
		<a href="#'.$ret['KEY_PICTURES'].'">
			<span class="details">
				'.$ret['MASK_NAME'].' <br />
				'.$ret['CREATE_DATE_PICTURE'].' <br />
				'.$ret['AUTHOR_PICTURE'].'
			</span>
			<img class="last_g" src="'.$ret['IMG_DATA'].'" width="250" height="187.5" />
	</a>
	</li>
	<div class="lightbox short-animate" id="'.$ret['KEY_PICTURES'].'">
		<img class="long-animate lightbox_zm" src="'.$ret['IMG_DATA'].'"/>
			<a href="#'.$ret['ID'].'">
				<button class="btn_box">
					&#8595;COMMENT BOX
				</button>
			</a>
			<form id="formlikes" method="post" action="php/like_server.php">
				<button class="post-share" id="like_button" type="submit">LIKE
				<span name="prout" class="post-share_number" id="prout" value='.$likes.'>'.$likes.'</span>
				</button>
				<textarea class="id_pictures" name="id_pictures" rows="1" cols="10" rezise="none">'.$ret['KEY_PICTURES'].'</textarea>
				<textarea class="id_pictures" name="author_picture" rows="1" cols="10" rezise="none">'.$ret['AUTHOR_PICTURE'].'</textarea>
				<textarea class="id_pictures" name="nb_page" rows="1" cols="10" rezise="none">'.$nb_page.'</textarea>
			</form>
	</div>
	<div class="lightbox2 short-animate" id="'.$ret['ID'].'">
		<a href="#'.$ret['KEY_PICTURES'].'">
			<button class="btn_box">
				&#8593;BACK TO PICTURE
			</button>
		</a>
		';

}
function display_gallery_my_profile($ret, $nb_page, $likes)
{
	echo '
	<li class="'.$ret['MASK_NAME'].' mask" id="ff-item">
		<a href="#'.$ret['KEY_PICTURES'].'">
			<span class="details">
				'.$ret['MASK_NAME'].' <br />
				'.$ret['CREATE_DATE_PICTURE'].' <br />
				'.$ret['AUTHOR_PICTURE'].'
			</span>
			<img class="last_g" src="'.$ret['IMG_DATA'].'" width="250" height="187.5" />
	</a>
	</li>
	<div class="lightbox short-animate" id="'.$ret['KEY_PICTURES'].'">
		<img class="long-animate lightbox_zm" src="'.$ret['IMG_DATA'].'"/>
			<a href="#'.$ret['ID'].'">
				<button class="btn_box">
					&#8595;COMMENT BOX
				</button>
				<form id="lol" method="POST" action="../tools/delete_picture.php">
					<button class="btn_box_delete">
						DELETE PICTURE
					</button>
	<textarea class="id_pictures" name="id_pictures" rows="1" cols="10" rezise="none">'.$ret['KEY_PICTURES'].'</textarea>
</form>
			</a>
			<form id="formlikes" method="post" action="php/like_server.php">
				<button class="post-share" id="like_button" type="submit">LIKE
				<span name="prout" class="post-share_number" id="prout" value='.$likes.'>'.$likes.'</span>
				</button>
				<textarea class="id_pictures" name="id_pictures" rows="1" cols="10" rezise="none">'.$ret['KEY_PICTURES'].'</textarea>
				<textarea class="id_pictures" name="author_picture" rows="1" cols="10" rezise="none">'.$ret['AUTHOR_PICTURE'].'</textarea>
				<textarea class="id_pictures" name="nb_page" rows="1" cols="10" rezise="none">'.$nb_page.'</textarea>
			</form>

			</div>

	<div class="lightbox2 short-animate" id="'.$ret['ID'].'">
		<a href="#'.$ret['KEY_PICTURES'].'">
			<button class="btn_box">
				&#8593;BACK TO PICTURE
			</button>
		</a>
		';

}
function display_gallery_not_log($ret, $nb_page, $likes)
{
	echo '
	<li class="'.$ret['MASK_NAME'].' mask" id="ff-item">
		<a href="#'.$ret['KEY_PICTURES'].'">
			<span class="details">
				'.$ret['MASK_NAME'].' <br />
				'.$ret['CREATE_DATE_PICTURE'].' <br />
				'.$ret['AUTHOR_PICTURE'].'
			</span>
			<img class="last_g" src="'.$ret['IMG_DATA'].'" width="250" height="187.5" />
	</a>
	</li>
	<div class="lightbox short-animate" id="'.$ret['KEY_PICTURES'].'">
		<img class="long-animate lightbox_zm" src="'.$ret['IMG_DATA'].'"/>
			<a href="#'.$ret['ID'].'">
				<button class="btn_box">
					&#8595;COMMENT BOX
				</button>
			</a>
				<p class="post-share" id="like_button" type="submit">LIKE
				<span name="prout" class="post-share_number" id="prout" value='.$likes.'>'.$likes.'</span>
				</p>
				<textarea class="id_pictures" name="id_pictures" rows="1" cols="10" rezise="none">'.$ret['KEY_PICTURES'].'</textarea>
				<textarea class="id_pictures" name="author_picture" rows="1" cols="10" rezise="none">'.$ret['AUTHOR_PICTURE'].'</textarea>
				<textarea class="id_pictures" name="nb_page" rows="1" cols="10" rezise="none">'.$nb_page.'</textarea>
	</div>
	<div class="lightbox2 short-animate" id="'.$ret['ID'].'">
		<a href="#'.$ret['KEY_PICTURES'].'">
			<button class="btn_box">
				&#8593;BACK TO PICTURE
			</button>
		</a>
		';

}
function display_form($ret, $nb_page, $author, $author_profile_picture)
{
	echo'
	<form id="formcomments" method="POST" action="php/insert_comment.php">
	<table class="table_comment">
		<tr>
			<td class="title_comment_box">
				<p>COMMENT BOX</p>
			</td>
			<td class="send_comment">
				<textarea class="txtar2"  name="id_comment" rows="5" cols="50" resize="none"></textarea>
			</td>
			<td class="title_comment_box2">
				<input type="submit" class="btn_comment" name="submit" id="form_button"  value="Submit" />
			</td>
		</tr>
	</table>
	<textarea class="id_pictures" name="id_pictures" rows="1" cols="10" rezise="none">'.$ret['KEY_PICTURES'].'</textarea>
	<textarea class="id_pictures" name="author_picture" rows="1" cols="10" rezise="none">'.$ret['AUTHOR_PICTURE'].'</textarea>
	<textarea class="id_pictures" name="author_comment" rows="1" cols="10" rezise="none">'.$author.'</textarea>
	<textarea class="id_pictures" name="author_profile_picture" rows="1" cols="10" rezise="none">'.$author_profile_picture.'</textarea>
	<textarea class="id_pictures" name="nb_page" rows="1" cols="10" rezise="none">'.$nb_page.'</textarea>
	</form>';
}
function display_close_btn()
{
	echo'</div>

	<div id="lightbox-controls" class="short-animate">
	  <a id="close-lightbox" class="long-animate" href="#!">Close Lightbox</a>
	</div>';
}
function display_info_my_profile($total_pictures, $total_comments, $total_likes, $search_info)
{
	echo'
	<div class="center">
		<table class="lightbox_zm2">
			<tr>
				<td class="profile-picture_user2">
				<img src=../'.$_SESSION['profile_picture'].' width="70" height="70"/>
				<p class="user_login">'.$_SESSION['logged_in_user'].'</p>
				</td>
				<td class="comment_userbox">
					<p class="title_details">First Name :</p>
				<p class="comment2">'.$search_info['FNAME'].'</p>
					<p class="title_details">last Name :</p>
					<p class="comment2">'.$search_info['LNAME'].'</p>
				</td>
				<td class="comment_userbox">
					<p class="title_details">E-mail :</p>
					<p class="comment2">'.$search_info['EMAIL'].'</p>
					<p class="title_details">Registered Since :</p>
					<p class="comment2">'.$search_info['CREATE_DATE'].'</p>
				</td>
				<td class="comment_userbox">
				<p class="title_details">Total Images :</p>
					<p class="comment2">'.$total_pictures.'</p>
					<p class="title_details">Total Comments :</p>
					<p class="comment2">'.$total_comments.'</p>
				</td>
				<td class="comment_userbox">
				<p class="title_details">Total Likes :</p>
				<p class="user_login">'.$total_likes.'</p>
				</td>
			</tr>
			<tr>
				<td class="none"></td>
				<td class="none">
				</td>
			</tr>
			<tr>
			<td class="none"></td>
			<td class="none">
			</td>
			</tr>
		</table>';
}
?>
