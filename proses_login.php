<?php 	
			if(isset($_POST['submit'])){
				session_start();
				include 'koneksi.php';

				$user = mysqli_real_escape_string($koneksi, $_POST['user']);
				$pass = mysqli_real_escape_string($koneksi, $_POST['pass']);

				$cek = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username = '".$user."' AND password = '".md5($pass)."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] = $d->admin_id;
					echo '<script>window.location="index.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}

			}
