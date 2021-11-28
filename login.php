<html>
	<head>
		<title>Kết quả đăng nhập</title>
	</head>
	<body>
		<?php
			// Đọc dữ liệu từ biểu mẫu
			$username = $_POST["username"];
			$password = md5($_POST["password"]);
			// Tạo kết nối với cơ sở dữ liệu
			$conn = new mysqli("localhost", "root", "", "myclass");
			// Lấy mật khẩu của username từ cơ sở dữ liệu
			$sql = "SELECT Password FROM Users WHERE Username = \"" . $username . "\"";
			$result = $conn -> query($sql);
			// Xác định số dòng dữ liệu trả về
			$rows = $result -> num_rows;
			if ($rows > 0) {
				// Nếu có 1 dòng dữ liệu
				$row = $result -> fetch_assoc();
				// Xét mật khẩu
				if ($row["Password"] == $password) {
					echo "Bạn đăng nhập thành công!";
				} else {
					echo "Bạn chưa đăng nhập thành công";
				}
			} else {
				echo "Bạn chưa đăng nhập thành công";
			}
		?>
	</body>
</html>