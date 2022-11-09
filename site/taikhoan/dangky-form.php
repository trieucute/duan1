<link rel="stylesheet" href="../../content/css/login.css">
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
.sign-in-container {
	opacity: 1;
	display: block;

}
.container-login.right-panel-active .sign-in-container {
	transform: translateX(100%);
	opacity: 0;
	z-index: 3;
	display: none;
	animation: show 0.6s;
}
</style>
<div class="container-login right-panel-active" id="container-login">
	<div class="form-container sign-up-container">
		<form action="dangky.php" method="POST">
			<h1>TẠO TÀI KHOẢN</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
		
			</div>
			<span>Hoặc đăng ký tài khoản của bạn</span>
            <input name="ho_ten"    placeholder="Họ và tên" value="<?=$ho_ten?>">
            <input name="email"  type="email"  placeholder="Email"  value="<?=$email?>">
            <input name="mat_khau" type="password" placeholder="Mật khẩu"  value="<?=$mat_khau?>">
			<input name="vai_tro" value="khachhang" type="hidden">
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
            <input name="email"  type="email" placeholder="Email" value="<?=$email?>">
            
            <input name="mat_khau" type="password"  value=""placeholder="Mật khẩu"   value="<?=$mat_khau?>">
            <!-- <input name="ghi_nho" type="checkbox" width="10%;" ><span style="float: ;left">Ghi nhớ tài khoản?</span>  -->
                 
			<a href="#">Quên mật khẩu?</a>
			<button name="dang-nhap" style="margin-top: 10px;" type="submit">Đăng nhập</button>
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
				<button class="ghost" id="signUp"   >ĐĂNG KÝ</button>
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