<link rel="stylesheet" href="../../content/css/login.css">
<link rel="stylesheet" href="../../content/css/home_respons.css">

<style>
	


	#container-login input {
	background-color: #EDEDED;
	border: none;
	padding: 13px 15px;
	margin: 8px 0;
	filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
	
    border-radius: 10px;
	width: 100%;
}
.form-container form h1, .h1 {
    font-size: 2.2rem !important;
}
.container-login {
    /* background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgb(0 0 0 / 25%), 0 10px 10px rgb(0 0 0 / 22%);
    position: relative;
    overflow: hidden;
    margin: 20px auto; */
    width: 55%;
}
#container-login form {
    /* background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column; */
    padding: 0 30px !important;
    /* height: 100%;
    text-align: center; */
}
.social-container {
    margin: 10px 0 !important;
}
</style>
<div class="container-login " id="container-login">
	<div class="form-container sign-up-container">
	<form action="dangky.php" method="POST" >
			<h1>TẠO TÀI KHOẢN</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
		
			</div>
			<span>Hoặc đăng ký tài khoản của bạn</span>
            <!-- <input name="ho_ten"    placeholder="Họ và tên" value=""> -->
            <input name="email"  type="email"  placeholder="Email"  value="<?=$email?>">
            <input name="mat_khau" type="password" placeholder="Mật khẩu"   minlength="6">
            <input name="mat_khau2" type="password" placeholder="Xác nhận mật khẩu"  minlength="8">

			<input type="text" name="ma_user" id="" hidden>
			<input name="vai_tro" value="Khách hàng" type="hidden">

            <input name="kich_hoat" value="0" type="hidden">
			<button name="dang-ky" style="margin-top: 10px;" type="submit">ĐĂNG KÝ</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="dangnhap.php" method="POST">
			<h1>ĐĂNG NHẬP</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				
			</div>
			<span>Hoặc sử dụng tài khoản của bạn</span>
            <input name="email" type="email" placeholder="Email" value="<?=$email?>">
            
            <input name="mat_khau" type="password"  value=""placeholder="Mật khẩu" minlength="6">
            <!-- <input name="ghi_nho" type="checkbox" width="10%;" ><span style="float: ;left">Ghi nhớ tài khoản?</span>  -->
			<input name="ma_user" value="<?=$ma_user?>" hidden>
			<a href="../taikhoan/quenmk.php">Quên mật khẩu?</a>
			<button name="dang-nhap"style="margin-top: 10px;">Đăng nhập</button>
			<p class="dk_mobile" style=" display:none"><a href="../taikhoan/dangky.php" style="color:red; font-size:16px;"> Đăng ký</a> nếu bạn chưa có tài khoản</p>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h2>Chào mừng trở lại</h2>
				<p>    Để giữ kết nối với chung tôi, vui lòng đăng nhập bằng thông tin cá
            nhân của bạn</p>
				<button class="ghost" id="signIn">ĐĂNG NHẬP</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h2>Xin chào, bạn!</h2>
				<p>   Nhập thông tin cá nhân của bạn và bắt đầu hành trình đăng ký với chúng tôi</p>
				<button class="ghost" id="signUp" >ĐĂNG KÝ</button>
			</div>
		</div>
	</div>
</div>
<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container-login');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
	
	

});
</script>
<div class="thongbao" style="text-align:center;font-family: Mergeblack; ">
             
        <?php
   if(isset($thongbao)&& ($thongbao!=""))
   echo $thongbao;?></div>