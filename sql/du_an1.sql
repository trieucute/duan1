-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 01:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `ma_hh` int(20) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `noi_dung` varchar(2000) NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_chi_tiet_don_hang` int(10) NOT NULL,
  `ma_hh` int(20) NOT NULL,
  `ma_don_hang` int(10) NOT NULL,
  `so_luong` int(10) NOT NULL,
  `don_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_don_hang` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `SDT` bigint(20) NOT NULL,
  `dia_chi` varchar(200) NOT NULL,
  `ghi_chu` varchar(500) DEFAULT NULL,
  `ngay_dat_hang` date NOT NULL DEFAULT current_timestamp(),
  `trang_thai` varchar(50) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `phuong_thuc_thanh_toan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(20) NOT NULL,
  `ten_hh` varchar(60) NOT NULL,
  `don_gia` float NOT NULL,
  `giam_gia` float DEFAULT NULL,
  `hinh` varchar(200) DEFAULT NULL,
  `ma_loai` int(11) DEFAULT NULL,
  `dac_biet` bit(1) NOT NULL DEFAULT b'0',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `ngay_nhap` date NOT NULL DEFAULT current_timestamp(),
  `mo_ta` varchar(4000) DEFAULT NULL,
  `gioi_tinh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ma_loai`, `dac_biet`, `so_luot_xem`, `ngay_nhap`, `mo_ta`, `gioi_tinh`) VALUES
(2, 'Áo khoác biker da đen Faisor', 5000000, NULL, 'aokhoacda1.jpg', 1, b'1', 232, '2022-11-03', 'Vỏ ngoài: Da thật\r\nLoại da: Da bò\r\nDa hoàn thiện: Bán anilin\r\nVỏ bên trong: Lớp lót Polyester chần\r\nPhong cách đóng cửa: Dây kéo\r\nKiểu cổ áo: Dây đeo với các nút Snap\r\nPhong cách còng: Dây kéo\r\nTúi bên ngoài: Hai\r\nTúi bên trong: Hai\r\nMàu đen', 'nam'),
(5, 'Áo len Blanco', 4000000, 1000000, 'aolen1.jpg', 3, b'1', 22, '2022-11-03', 'BLANCO là kiểu đan cực kỳ phức tạp nhưng không kém phần phức tạp, thể hiện một loạt các kiểu đan bằng len llama ấm áp.\r\n\r\nKiểu áo dài và quá khổ vừa vặn với đôi vai thả thường và đường viền cổ cao tinh xảo. Với sự kết hợp phức tạp của các hàng đan dây cáp, ren và argyle, BLANCO là một kiểu dáng có độ chi tiết cao. Được làm từ sợi llama sang trọng với ba màu đẹp, không bị phai màu.', 'nu'),
(6, 'Quần jean denim đen', 1000000, NULL, 'quan1.jpg', 5, b'1', 12, '2022-11-03', 'Xuất phát từ nguồn gốc đồ bảo hộ lao động giống như những người anh em Blue của nó, Black Jeans đã đi đường vòng sang punk-rock, và kết quả là, đã trở lại một sản phẩm đóng gói sẵn thiết yếu chỉ với một chút thái độ hơn. Quần jean đen của chúng tôi được cắt từ sợi cotton 100% hữu cơ 3/1, được thiết kế để tạo sự thoải mái lâu dài.\r\n\r\nCó sẵn trong tùy chỉnh Stay Black của chúng tôi (vâng, chúng sẽ giữ nguyên màu đen) và Grey Wash không kiểu cách sẽ tiếp tục có được đặc tính và lớp sơn phủ theo thời gian. Thoải mái với quần jean đen, oxford trắng và bốt chelsea - hoặc giản dị với Grey Wash, áo phông xám và giày thể thao yêu thích của bạn.', 'nam'),
(7, 'Áo sơ mi vải lanh', 800000, NULL, 'aosomi1.jpg', 4, b'1', 88, '2022-11-04', 'Được cắt từ vải 100% tự nhiên cao cấp, Áo sơ mi Linen của chúng tôi có kiểu dáng vừa vặn thoải mái, cổ áo không cài cúc, các nút nhựa sinh học tùy chỉnh và có độ dài vừa phải để có được chiều cao tay áo ở vị trí cần thiết.\r\n\r\nViệc đóng đinh nó không còn đơn giản nữa, nhưng giờ đây tất cả là của bạn.', 'unisex'),
(8, 'Áo thun oversized ', 450000, NULL, 'aothun1.jpg', 2, b'0', 34, '2022-11-04', 'Áo phông nữ Oversize là loại áo phông thông thường, có kiểu dáng phá cách. Bây giờ với một chiếc áo vừa vặn quá khổ, vai buông xuống, tay áo rộng hơn và đường cắt hộp hơi cắt mà bạn đã mong đợi!', 'unisex'),
(9, 'Áo sơ mi denim FENNEL', 1249000, NULL, 'aosomi2.jpg\r\n', 4, b'1', 455, '2022-11-04', 'Áo sơ mi FENNEL là giải pháp hoàn hảo cho mọi dịp. Vẻ ngoài sạch sẽ có thể đưa bạn từ văn phòng và đi thẳng vào bất kỳ cuộc phiêu lưu ngoài trời nào đang chờ đợi phía trước. Khả năng mặc nó như một chiếc áo lót làm cho nó trở nên hoàn hảo cho những đêm dài mùa hè hoặc một ngày vào mùa thu - đặc biệt là một đêm trong rừng khi bạn đốt lửa Trại.\r\n\r\nChiếc áo sơ mi được làm thủ công từ chất liệu denim hữu cơ bền và thoải mái', 'nam'),
(10, 'Áo sơ mi nữ', 990000, NULL, 'aosomi3.jpg\r\n', 4, b'1', 32, '2022-11-04', 'Một chiếc áo sơ mi ngoại cỡ được làm từ chất liệu cotton poplin hữu cơ. Chiếc áo có đường xẻ sâu một bên và tập hợp, thắt eo sang một bên. Nó có tay áo tập hợp đầy đủ kết thúc trong một vòng bít rộng buộc chặt bằng các nút vỏ agoya', 'nu'),
(11, 'Đầm mini be 2 nơ ngực thêu Adorista', 660000, NULL, 'dam1.2.webp', 6, b'1', 88, '2022-11-03', 'Nếu như bạn mong muốn trở thành một cô nàng quyến rũ hay đằm thắm thì ĐẦM MINI BE 2 NƠ NGỰC THÊU ADORISTA là sự chọn lựa tuyệt vời. Được thiết kế bằng lụa cao cấp với sự bay bổng nhẹ nhàng và bề mặt sáng bóng, những chiếc váy đầm sẽ càng trở nên thướt tha và bay bổng. Bên cạnh đó vải ren cũng là một sự lựa chọn không tồi.', 'nu'),
(12, 'Giày nam dáng Derby vân da cá sấu', 549000, NULL, 'giay1.jpg\r\n', 7, b'1', 23, '2022-11-04', '– Chất liệu: Da bò thật 100%\r\n– Kiểu dáng: Derby, form giày ôm chân\r\n– Thiết kế: Hoạ tiết giả vân da cá sấu thời thượng, đường chỉ nổi trên mũi giày tạo điểm nhấn nam tính, mạnh mẽ\r\n– Thương hiệu: Đồ da Tâm Anh\r\n– Màu sắc: Đen', 'nam'),
(13, 'Guốc nhọn quai ngang chần bông', 565000, NULL, 'giay2.jpg\r\n', 7, b'0', 3, '2022-11-03', '- Chất liệu: Da tổng hợp\r\n- Độ cao gót: 8 cm\r\n- Dòng: Casual\r\n- Thiết kế 2 quai ngang được chần bông vô cùng êm ái và chắc chắn giúp nàng tự tin thoải mái khi di chuyển.\r\n- Gót trụ cách điệu đẹp mắt, thời trang.\r\n- Gam màu nổi bật, hợp xu hướng.', 'nu'),
(23, 'Túi đeo thắt lưng Ophidia GG', 24000000, NULL, 'bag1.avif', 8, b'1', 22, '0000-00-00', 'Được giới thiệu trong dòng Ophidia, chiếc túi thắt lưng được chế tác từ vải canvas GG Supreme kết hợp với sự kết hợp đặc biệt của House Web với phần cứng Double G.\r\nGG Supreme màu be / gỗ mun mềm với viền da nâu\r\nWeb xanh và đỏ\r\nPhần cứng bằng vàng cổ\r\nGỖ đôi\r\nLưới trở lại\r\nTúi khóa kéo phía trước\r\nTúi zip bên trong\r\nDây đeo nylon có thể điều chỉnh\r\nKhóa kéo\r\nMặt hàng này có thể vừa với điện thoại di động có kích thước lên đến 3,1 ”W x 6,2” H x 0,3 ”D\r\nVí đựng thẻ Gucci sẽ nằm gọn trong sản phẩm này\r\n9,5 \"Rộng x 5,5\" Cao x 2 \"D\r\nSản xuất tại Ý\r\n', 'unisex');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hinh` varchar(100) DEFAULT NULL,
  `kich_hoat` bit(1) NOT NULL DEFAULT b'0',
  `vai_tro` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(1, 'Áo khoác'),
(2, 'Áo thun'),
(3, 'Áo len'),
(4, 'Áo sơ mi'),
(5, 'Quần'),
(6, 'Đầm / váy'),
(7, 'Giày'),
(8, 'Túi xách');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_chi_tiet_don_hang`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_don_hang` (`ma_don_hang`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_don_hang`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `ma_chi_tiet_don_hang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_don_hang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_3` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`ma_don_hang`) REFERENCES `don_hang` (`ma_don_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_3` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
