<?php
if (! defined ( 'MYWEBS' ))
	exit ( 'Now Allowed' );
switch ($act) {
	default :
		?>
<form
	action="<?php echo $M_PATH.$gm;?>/aksi.php?<?php echo $fm.'='.$gm.'&act=edit';?>"
	class="register" id="validatedForm" method="post">
	<h3>My Profile</h3>
	<fieldset class="row1">
		<legend>Data Diri </legend>
		<p>
			<label>User ID </label> <input type="text"
				value="<?= $_SESSION['mywebs_usr'];?>" name="userid" disabled
				required />
		</p>
		<p>
			<label>Old Password </label> <input type="password" name="old_pass"
				class="long" value="" />
		</p>
		<p>
			<label>New Password </label> <input type="password" name="new_pass"
				id="new_pass" class="long" value="" />
		</p>
		<p>
			<label>Re Type New Password </label> <input type="password"
				name="re_pass" id="re_pass" class="long" value="" />
		</p>
		<p></p>
	</fieldset>
	<fieldset class="row1">
		<button type="submit">
			<img src="my-content/images/apply2.png" alt="simpan" /> Simpan
		</button>
	</fieldset>
</form>
<?php
		break;
}
?>