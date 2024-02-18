
	<?php
	session_start();
	session_destroy();
	echo "<script>alert('Anda berhasil Logout');
  document.location='../index.php'</script>;";
?>