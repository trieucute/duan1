-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2022 at 10:49 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `ma_hh` int(20) NOT NULL,
  `ma_kh` int(10) NOT NULL,
  `noi_dung` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bl` date NOT NULL DEFAULT current_timestamp()
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
  `don_gia` float NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_don_hang` int(10) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` bigint(20) NOT NULL,
  `dia_chi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_dat_hang` date NOT NULL DEFAULT current_timestamp(),
  `trang_thai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_kh` int(10) NOT NULL,
  `phuong_thuc_thanh_toan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(20) NOT NULL,
  `ten_hh` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia` float NOT NULL,
  `giam_gia` float DEFAULT NULL,
  `ma_loai` int(11) DEFAULT NULL,
  `dac_biet` bit(1) NOT NULL DEFAULT b'0',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `ngay_nhap` date NOT NULL DEFAULT current_timestamp(),
  `mo_ta` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioi_tinh` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `ma_loai`, `dac_biet`, `so_luot_xem`, `ngay_nhap`, `mo_ta`, `gioi_tinh`, `id_hinh`) VALUES
(2, 'Áo khoác biker da đen Faisor', 5000000, NULL, 1, b'1', 245, '2022-11-03', 'Vỏ ngoài: Da thật\r\nLoại da: Da bò\r\nDa hoàn thiện: Bán anilin\r\nVỏ bên trong: Lớp lót Polyester chần\r\nPhong cách đóng cửa: Dây kéo\r\nKiểu cổ áo: Dây đeo với các nút Snap\r\nPhong cách còng: Dây kéo\r\nTúi bên ngoài: Hai\r\nTúi bên trong: Hai\r\nMàu đen', 'nam', 1),
(5, 'Áo len Blanco', 990000, 0, 3, b'1', 96, '2022-11-03', 'BLANCO là kiểu đan cực kỳ phức tạp nhưng không kém phần phức tạp, thể hiện một loạt các kiểu đan bằng len llama ấm áp.\r\n\r\nKiểu áo dài và quá khổ vừa vặn với đôi vai thả thường và đường viền cổ cao tinh xảo. Với sự kết hợp phức tạp của các hàng đan dây cáp, ren và argyle, BLANCO là một kiểu dáng có độ chi tiết cao. Được làm từ sợi llama sang trọng với ba màu đẹp, không bị phai màu.', 'nu', 2),
(6, 'Quần jean denim đen', 1000000, NULL, 5, b'1', 57, '2022-11-03', 'Xuất phát từ nguồn gốc đồ bảo hộ lao động giống như những người anh em Blue của nó, Black Jeans đã đi đường vòng sang punk-rock, và kết quả là, đã trở lại một sản phẩm đóng gói sẵn thiết yếu chỉ với một chút thái độ hơn. Quần jean đen của chúng tôi được cắt từ sợi cotton 100% hữu cơ 3/1, được thiết kế để tạo sự thoải mái lâu dài.\r\n\r\nCó sẵn trong tùy chỉnh Stay Black của chúng tôi (vâng, chúng sẽ giữ nguyên màu đen) và Grey Wash không kiểu cách sẽ tiếp tục có được đặc tính và lớp sơn phủ theo thời gian. Thoải mái với quần jean đen, oxford trắng và bốt chelsea - hoặc giản dị với Grey Wash, áo phông xám và giày thể thao yêu thích của bạn.', 'nam', 3),
(7, 'Áo sơ mi vải lanh', 800000, NULL, 4, b'1', 151, '2022-11-04', 'Được cắt từ vải 100% tự nhiên cao cấp, Áo sơ mi Linen của chúng tôi có kiểu dáng vừa vặn thoải mái, cổ áo không cài cúc, các nút nhựa sinh học tùy chỉnh và có độ dài vừa phải để có được chiều cao tay áo ở vị trí cần thiết.\r\n\r\nViệc đóng đinh nó không còn đơn giản nữa, nhưng giờ đây tất cả là của bạn.', 'unisex', 4),
(8, 'Áo thun oversized ', 450000, NULL, 2, b'0', 36, '2022-11-04', 'Áo phông nữ Oversize là loại áo phông thông thường, có kiểu dáng phá cách. Bây giờ với một chiếc áo vừa vặn quá khổ, vai buông xuống, tay áo rộng hơn và đường cắt hộp hơi cắt mà bạn đã mong đợi!', 'unisex', 5),
(9, 'Áo sơ mi denim FENNEL', 1249000, NULL, 4, b'1', 466, '2022-11-04', 'Áo sơ mi FENNEL là giải pháp hoàn hảo cho mọi dịp. Vẻ ngoài sạch sẽ có thể đưa bạn từ văn phòng và đi thẳng vào bất kỳ cuộc phiêu lưu ngoài trời nào đang chờ đợi phía trước. Khả năng mặc nó như một chiếc áo lót làm cho nó trở nên hoàn hảo cho những đêm dài mùa hè hoặc một ngày vào mùa thu - đặc biệt là một đêm trong rừng khi bạn đốt lửa Trại.\r\n\r\nChiếc áo sơ mi được làm thủ công từ chất liệu denim hữu cơ bền và thoải mái', 'nam', 6),
(10, 'Áo sơ mi nữ', 990000, NULL, 4, b'1', 211, '2022-11-04', 'Một chiếc áo sơ mi ngoại cỡ được làm từ chất liệu cotton poplin hữu cơ. Chiếc áo có đường xẻ sâu một bên và tập hợp, thắt eo sang một bên. Nó có tay áo tập hợp đầy đủ kết thúc trong một vòng bít rộng buộc chặt bằng các nút vỏ agoya', 'nu', 7),
(11, 'Đầm mini be 2 nơ ngực thêu Adorista', 660000, NULL, 6, b'1', 94, '2022-11-03', 'Nếu như bạn mong muốn trở thành một cô nàng quyến rũ hay đằm thắm thì ĐẦM MINI BE 2 NƠ NGỰC THÊU ADORISTA là sự chọn lựa tuyệt vời. Được thiết kế bằng lụa cao cấp với sự bay bổng nhẹ nhàng và bề mặt sáng bóng, những chiếc váy đầm sẽ càng trở nên thướt tha và bay bổng. Bên cạnh đó vải ren cũng là một sự lựa chọn không tồi.', 'nu', 8),
(12, 'Giày nam dáng Derby vân da cá sấu', 549000, NULL, 7, b'1', 25, '2022-11-04', '– Chất liệu: Da bò thật 100%\r\n– Kiểu dáng: Derby, form giày ôm chân\r\n– Thiết kế: Hoạ tiết giả vân da cá sấu thời thượng, đường chỉ nổi trên mũi giày tạo điểm nhấn nam tính, mạnh mẽ\r\n– Thương hiệu: Đồ da Tâm Anh\r\n– Màu sắc: Đen', 'nam', 9),
(13, 'Guốc nhọn quai ngang chần bông', 565000, NULL, 7, b'0', 8, '2022-11-03', '- Chất liệu: Da tổng hợp\r\n- Độ cao gót: 8 cm\r\n- Dòng: Casual\r\n- Thiết kế 2 quai ngang được chần bông vô cùng êm ái và chắc chắn giúp nàng tự tin thoải mái khi di chuyển.\r\n- Gót trụ cách điệu đẹp mắt, thời trang.\r\n- Gam màu nổi bật, hợp xu hướng.', 'nu', 10),
(14, 'Túi đeo thắt lưng Ophidia GG', 24000000, NULL, 8, b'1', 28, '0000-00-00', 'Được giới thiệu trong dòng Ophidia, chiếc túi thắt lưng được chế tác từ vải canvas GG Supreme kết hợp với sự kết hợp đặc biệt của House Web với phần cứng Double G.\r\nGG Supreme màu be / gỗ mun mềm với viền da nâu\r\nWeb xanh và đỏ\r\nPhần cứng bằng vàng cổ\r\nGỖ đôi\r\nLưới trở lại\r\nTúi khóa kéo phía trước\r\nTúi zip bên trong\r\nDây đeo nylon có thể điều chỉnh\r\nKhóa kéo\r\nMặt hàng này có thể vừa với điện thoại di động có kích thước lên đến 3,1 ”W x 6,2” H x 0,3 ”D\r\nVí đựng thẻ Gucci sẽ nằm gọn trong sản phẩm này\r\n9,5 \"Rộng x 5,5\" Cao x 2 \"D\r\nSản xuất tại Ý\r\n', 'unisex', 11),
(24, 'Quần tây Chino', 1300000, NULL, 5, b'0', 1, '2022-11-14', 'Bất kỳ tủ quần áo được cân nhắc kỹ lưỡng nào cũng cần có một chiếc quần tây đa năng. Được phát triển để hoàn thiện trong hơn 31 tháng, những chiếc Chinos của chúng tôi được thiết kế riêng từ loại vải dệt bằng vải cotton-satin của Ý có trọng lượng trung bình với một chút giãn, có phần đóng chồng lên nhau và chi tiết với nội thất xương cá có tông màu. Bật hoặc tắt đồng hồ, đây sẽ là những người chơi thường xuyên trong danh sách của bạn.', 'Nam', 12),
(25, 'Quần Jean Standard', 1025000, NULL, 5, b'0', 0, '2022-11-01', 'Được cho là một trong những thứ thiết yếu nhất trong tủ quần áo của phụ nữ, chiếc quần jean đã giặt sạch đã có vô số hình dạng, đường cắt và vẻ ngoài kể từ thời phục hưng của thời trang vào những năm 80.\r\n\r\nĐể giới thiệu chiếc quần jean nữ đầu tiên của mình, chúng tôi đã có bằng tiến sĩ về khoa học denim để xác định và cung cấp cho bạn một hình dáng duy nhất, bạn luôn có thể tin tưởng vào: Quần jean tiêu chuẩn. Chuẩn như không gầy cũng không phải boyfriend, không loe hay bootcut, không xẻ thấp cũng không phải kiểu \"mom\". Nó đúng.\r\n\r\nMột kiểu dáng hơi thon dài vượt thời gian, được cắt từ chất liệu denim Ý 13oz bền bỉ chỉ với một chút kéo giãn để tăng thêm sự thoải mái. Chúng là loại đá sạch hoàn hảo, được tạo ra để mang lại cho bạn sự thoải mái và phong cách, bật và tắt đồng hồ.', 'nu', 14),
(26, 'Quần Jean Everyday', 1050000, NULL, 5, b'0', 0, '2022-11-03', 'Gặp gỡ chiếc quần jean đầu tiên của chúng tôi. Chất liệu denim hoàn hảo cho mọi ngày, mọi đêm, mọi nơi, mọi phụ nữ. Được cắt từ sợi chéo denim cotton hữu cơ nặng, kiểu quần dài giữa của chúng tôi có kiểu chân thẳng và vừa vặn với chân hơi cắt<br>Được làm bằng bông hữu cơ được chứng nhận Tiêu chuẩn dệt hữu cơ toàn cầu (GOTS). Tiêu chuẩn GOTS đảm bảo không có hóa chất độc hại nào được sử dụng để trồng bông. Và những người làm ra sản phẩm này được trả lương đủ sống và được đối xử công bằng.', 'nu', 16),
(27, 'Quần tây Heavy Twill', 1230000, NULL, 5, b'0', 0, '2022-11-02', 'Có nguồn gốc từ quần áo bảo hộ lao động, The Heavy Twill Chino là chiếc quần hàng ngày được cắt thẳng và vừa vặn hơn của chúng tôi. Được cắt từ sợi xoắn bông hữu cơ cấp độ quân sự do Ý sản xuất, nó nặng hơn 25% và nhỏ gọn hơn đáng kể so với chiếc The Chino được thiết kế riêng, nó được tạo ra để mặc, yêu và rách, ngày này qua ngày khác.\r\n<br>\r\nHình dáng được cắt thẳng, thoải mái được tô điểm bằng các túi vá hai đường khâu tạo sự mạnh mẽ. Phối màu nó với Áo khoác ngoài của chúng tôi để có vẻ ngoài ton-sur-ton hoặc khoác trên mình một chiếc áo Hoodie để có trang phục giản dị hơn.', 'Nam', 15),
(28, 'Quần Jean Washed demin', 1100000, NULL, 5, b'0', 1, '2022-11-03', 'Quần jean washed denim của chúng tôi được cắt từ vải denim Ý có cấu trúc 13oz, được làm từ 100% bông hữu cơ. Vải denim được làm mềm và hoàn thiện bằng cách giặt không rườm rà sẽ tiếp tục có được đặc tính và khuôn mẫu theo thời gian. Đó là một phiến đá sạch hoàn hảo.\r\n<br>\r\nĐược ưu tiên mặc với áo phông trắng để có cái nhìn cổ nhất trong sách, nhưng thực sự thì chúng sẽ đi cùng với bất cứ thứ gì.', 'Nam', 17),
(29, 'Áo Khoác  Monochrome', 1200000, NULL, 1, b'1', 0, '2022-11-03', 'Được thiết kế như một chiếc áo khoác thông minh, có lớp lót đầy đủ với các túi bên trong, nhưng vẫn mang lại sự thoải mái của một chiếc áo hoodie cotton hữu cơ mềm mại sang trọng.\r\n<br>\r\nBạn được bảo hành 1 năm và sửa chữa miễn phí sau đó.Bao bì không có nhựa và có thể tái chế hoàn toàn.Vải được sản xuất tại Bồ Đào Nha. Hàng may mặc sản xuất tại Porto, Bồ Đào Nha', 'Nam', 18),
(30, 'Áo Organic hoodie', 880000, NULL, 1, b'0', 0, '2022-11-10', 'Áo hoodie hữu cơ tiêu chuẩn của chúng tôi. Thiết kế unisex. Chất liệu cotton hữu cơ cao cấp.Được làm bằng bông hữu cơ được chứng nhận Tiêu chuẩn Dệt may Hữu cơ Toàn cầu (GOTS). Tiêu chuẩn GOTS đảm bảo không có hóa chất độc hại nào được sử dụng để trồng bông. Và những người làm ra sản phẩm này được trả lương đủ sống và được đối xử công bằng.\r\n<br>\r\nBao bì được làm từ giấy tái chế và túi vận chuyển được làm từ vật liệu có thể phân hủy sinh học.', 'Unisex', 19),
(31, 'Áo Honest Basic Hoodie', 800000, NULL, 1, b'0', 0, '2022-11-03', 'Áo hoodie đen thoải mái. Kết hợp nó với quần chạy bộ để có một bộ trang phục đầy đủ!\r\n<br>\r\nÁo hoodie trung thực của chúng tôi rất phù hợp cho những buổi tối mùa hè se lạnh và những ngày mưa.', 'nu', 20),
(32, 'Áo khoác Mock Neck', 1010000, NULL, 1, b'0', 1, '2022-11-10', 'Ban đầu được lấy cảm hứng từ những chiếc áo len shetland quá khổ của những năm 40 và 50, Áo len cổ lọ có lịch sử lâu đời giúp bảo vệ chúng ta khỏi cái lạnh theo phong cách dễ dàng.\r\n<br>\r\nLà loại vải dệt kim dày, được làm bằng 100% len tái chế từ một nhà máy của Ý với hơn một thế kỷ kinh nghiệm về sợi cao cấp, Mock Neck Sweater nổi bật với phom dáng quá khổ với phần vai trễ xuống và đường viền, cổ tay áo và đường viền cổ áo tương phản tinh tế. Đó dễ dàng là cách thoải mái nhất để tạo nên vẻ ngoài sành điệu.', 'nu', 21),
(33, 'Áo Classic Organic', 1022000, NULL, 1, b'1', 0, '2022-11-08', 'Áo hoodie vừa vặn, thể thao dành cho cả nam và nữ được làm từ 100% cotton hữu cơ. Bên ngoài được dệt kim dày đặc để tạo cảm giác mịn màng và sạch sẽ trong khi bên trong được chải kỹ để tạo cảm giác mềm mại và thoải mái. Mũ trùm đầu hai lớp và túi kangaroo ở mặt trước.\r\n<br>\r\nMàu sắc được nhuộm vào vải mang lại vẻ sống động và độ bền màu lâu dài. Đã được giặt sơ nên không bị co hay xoắn dù bạn giặt bao nhiêu lần. Được sản xuất để tồn tại một cách bền vững tại nhà máy của chúng tôi ở Barcelos, Bồ Đào Nha. Có sẵn trong 45 màu sắc tuyệt đẹp', 'nu', 22),
(34, 'Quần Short Sustain', 750000, NULL, 5, b'0', 0, '2022-11-09', 'Loại Áo len mới 365 NGÀY MỘT NĂM của chúng tôi. Được làm bằng bông hữu cơ được GOTS chứng nhận, chiếc áo len dệt kim này giữ ấm khi trời lạnh nhưng vẫn đủ mát khi trời ấm.\r\n<br>\r\nKiểu dáng hoàn toàn và dệt kim có đường gân để có tay cầm vừa vặn', 'nam', 23),
(35, 'Áo Len Cashmere', 980000, NULL, 3, b'0', 1, '2022-11-15', 'Áo cổ tròn bằng cashmere tái chế với tay áo raglan. Phong cách raglan thoải mái này có các đường viền tạo cấu trúc và đường viền tương phản đặc trưng của thương hiệu dọc theo phần dưới và cổ tay áo.\r\n<br>\r\nHình bóng lỏng lẻo của nó sẽ vừa vặn thoải mái trên áo phông. 50% Cashmere tái chế và 50% Cashmere nguyên chất.', 'nam', 25),
(36, 'Áo len Wool Rib', 1220000, NULL, 3, b'0', 0, '2022-11-15', 'Bằng len hữu cơ với tay áo hình búa. Việc xây dựng chiếc áo len này làm cho mảnh này rất thoải mái.\r\n<br>\r\nNó được sản xuất ở Ý từ len siêu mịn, cực kỳ mềm khi chạm vào và được hoàn thiện với các đường viền có gân để tạo hình dáng nhỏ cho nó.', 'nam', 24),
(37, 'Áo len Merino', 989000, NULL, 3, b'1', 0, '2022-11-09', 'Áo cổ lọ đã, đang và sẽ luôn là món đồ không thể thiếu trong tủ đồ của bất kỳ người phụ nữ nào. Là món đồ yêu thích của các nữ diễn viên, nhân vật của công chúng, nhà thiết kế và nghệ sĩ trong thế kỷ qua, Áo cổ lọ của chúng tôi được làm từ 100% len merino siêu mịn của Argentina có thể truy xuất nguồn gốc, được dệt kim bằng loại vải dệt kim 24 khổ siêu nhẹ nhưng siêu bền.\r\n<br>\r\nTự hào với các đặc tính tự nhiên của len merino, Cổ rùa Merino sẽ vượt qua mọi cơn bão: Nó ấm áp, cách nhiệt, thoáng khí, hút ẩm và trung hòa mùi hôi. Lớp nền hoàn hảo cho vẻ ngoài tinh tế trong suốt tất cả các mùa.', 'Nữ', 27),
(38, 'Áo len Noal', 1280000, NULL, 3, b'0', 0, '2022-11-07', 'Áo len Noal được làm từ 100% len nguyên chất từ ​​cả cừu Đan Mạch và cừu Gotland kéo thành sợi, dệt kim và khâu tại Đan Mạch. Mỗi sản phẩm may mặc là duy nhất và do sợi len thô và tự nhiên nên có thể xảy ra các biến thể.\r\n<br>\r\nÁo len của Noah có các đường gân ở cổ áo và được làm bằng đường khâu hạt và dây cáp với hoa văn đẹp mắt. Nó là một chiếc áo vest dày hoàn hảo để mặc bên ngoài áo sơ mi hoặc váy.', 'nu', 28),
(39, 'Áo len Knitted', 1118000, NULL, 3, b'1', 0, '2022-11-10', 'Áo len dệt kim Unrecorded được làm từ 100% cotton hữu cơ và được thiết kế để vừa vặn với tay áo raglan.\r\n<br>\r\nĐược dệt kim trên máy Shima Seiki của Nhật Bản, kim tuyến 7 khổ làm cho chiếc áo len nặng nề và sang trọng.', 'nu', 29),
(40, 'Áo len Pokhara', 1400000, NULL, 3, b'0', 0, '2022-11-11', 'ang trọng, ấm cúng và ngoại cỡ - POKHARA là lựa chọn hoàn hảo cho những ngày se lạnh khi bạn muốn được bao bọc trong sự mềm mại và ấm áp. Hình dáng đồ sộ được cân bằng bởi các điểm nhấn có đường gân tinh tế chạy dọc ống tay áo và dọc theo đường viền. Nổi bật với các nút sừng và đường xẻ bên hông tương phản trên tay áo và đường viền.\r\n<br>\r\nĐược đan từ loại len yak mềm nhất với màu xám nhạt đẹp mắt, không nhuộm. Len yak của chúng tôi có nguồn gốc bền vững từ dự án Green Gold ở Mông Cổ, dự án này đang nỗ lực cải thiện sức khỏe của các đồng cỏ trong nước và thu nhập của những người chăn nuôi du mục.', 'nu', 30),
(41, 'Áo len Frank Chunky', 970000, NULL, 3, b'0', 0, '2022-11-10', 'Áo len cổ tròn được đan dày bằng kỹ thuật gọi là khâu toàn bộ áo len đan. Nó trông giống như một chiếc xương sườn nhưng tạo ra một đường đan đầy đặn hơn với những đường viền rõ ràng hơn. Màu xanh tuyệt đẹp đến từ thứ thuốc nhuộm yêu thích của chúng tôi - màu chàm.', 'nam', 26),
(42, 'Áo hoodie Asket', 1320000, NULL, 1, b'1', 0, '2022-11-08', 'Bắt nguồn từ thể thao và phản văn hóa, áo hoodie đã phát triển thành một mặt hàng chủ lực cực kỳ thiết yếu. Được cắt ra từ dây đai lưng 100% cotton hữu cơ, trọng lượng nặng, được phát triển tùy chỉnh của chúng tôi, Áo hoodie có mũ trùm đầu hai lớp có kích thước rộng rãi, nhưng nếu không thì đã được loại bỏ các chi tiết thông thường, không cần thiết.\r\n<br>\r\nBằng cách tối ưu hóa hình thức và chức năng thực tế (loại bỏ những thứ như túi đựng), chúng tôi đã tạo ra một sản phẩm nâng cao thể hiện sự tinh tế', 'nam', 31),
(43, 'Áo Everyone Hoodie', 1357000, NULL, 1, b'0', 0, '2022-11-02', 'Một chiếc áo hoodie trung tính về giới tính được làm từ bông phế liệu tái chế được tìm thấy trên sàn phòng cắt. Tốt đẹp.\r\n<br>\r\nMột chiếc áo hoodie để kết thúc tất cả những chiếc áo hoodie. Được làm từ hỗn hợp bông hữu cơ và bông phế thải (đừng lo, chúng tôi giặt sạch), Áo Hoodie Mọi người có thân áo rộng rãi, mũ trùm đầu và cổ áo lấy cảm hứng từ phong cách cổ điển với dây rút có thể điều chỉnh. Bạn có thể cần nó - và chiếc quần phù hợp', 'Unisex', 32),
(44, 'Áo thun tay ngắn  Sleeve Tee', 736000, NULL, 2, b'0', 0, '2022-11-09', 'Giới thiệu một kiểu cổ điển mới, áo bông hữu cơ Fairtrade và GOTS của chúng tôi. Trong một chiếc áo sơ mi slub, nó siêu mềm và co giãn, và được sản xuất tại một nhà máy Fairtrade ở Ấn Độ.\r\n<br>\r\nChiếc áo phông đơn giản này có cổ tròn và tay ngắn, đồng thời có thể được mặc với bất cứ thứ gì trong bộ sưu tập của chúng tôi — bỏ trong quần và váy, hoặc thậm chí là mặc nhiều lớp bên dưới váy yếm.', 'nu', 33),
(45, 'Áo thun AIAYU', 1173000, NULL, 2, b'1', 0, '2022-11-04', 'Chiếc áo phông AIAYU cổ điển này được làm từ 100% cotton hữu cơ, làm cho nó trở thành một mặt hàng chủ lực hàng ngày mềm mại và thoải mái.\r\n<br>\r\nChiếc áo phông ngắn tay này có đường viền cong và dài hơn một chút ở phía sau, tạo nên hình dáng đẹp. Phom dáng thoải mái giúp bạn dễ dàng tạo kiểu, có thể là áo cơ bản kết hợp với quần soóc hoặc quần dài thông thường, hoặc sơ vin một cách trang nhã với váy cạp cao.', 'nu', 34),
(46, 'Áo thun tay dài Sleeve Tee', 828000, NULL, 2, b'0', 0, '2022-11-15', 'Áo thun dài tay của chúng tôi. Thiết kế unisex. Chất liệu cotton hữu cơ cao cấp. Sản xuất tại Bồ Đào Nha.<br>\r\nĐược làm bằng bông hữu cơ được chứng nhận Tiêu chuẩn Dệt may Hữu cơ Toàn cầu (GOTS). Tiêu chuẩn GOTS đảm bảo không có hóa chất độc hại nào được sử dụng để trồng bông. Và những người làm ra sản phẩm này được trả lương đủ sống và được đối xử công bằng.\r\n<br>\r\nBao bì được làm từ giấy tái chế và túi vận chuyển được làm từ vật liệu có thể phân hủy sinh học.', 'unisex', 35),
(47, 'Áo thun Lisa Tee', 874000, NULL, 2, b'0', 0, '2022-11-10', 'Gặp Lisa! Một chiếc áo thun cổ thuyền cắt xén được làm từ vải jersey mềm, nhẹ. Giống như tất cả áo phông của chúng tôi, nó được làm bằng bông hữu cơ. Nó có tay áo ngắn, gọn gàng và cổ được hoàn thiện bằng một đường gân hẹp tự làm bằng vải.', 'nu', 36),
(48, 'Áo thun cổ điển A15', 943000, NULL, 2, b'1', 0, '2022-11-09', 'Là một chiếc áo phông cổ điển, A.15 có phom dáng chuẩn với cổ bẻ thoải mái theo phong cách cổ điển.\r\n<br>\r\nĐược làm từ bông hữu cơ siêu mềm của chúng tôi có màu xanh nước biển với nhãn hiệu đặc trưng và mã truy xuất nguồn gốc của chúng tôi ở viền sau bên trái.', 'unisex', 37),
(49, 'Áo thun 155 GSM ', 621000, NULL, 2, b'0', 0, '2022-11-04', 'Áo phông cơ bản của chúng tôi có phom vừa vặn và được làm từ bông hữu cơ 155 GSM nên áo phông này hoàn hảo cho mọi dịp.<br>\r\nĐược làm bằng bông hữu cơ được chứng nhận Tiêu chuẩn Dệt may Hữu cơ Toàn cầu (GOTS). Tiêu chuẩn GOTS đảm bảo không có hóa chất độc hại nào được sử dụng để trồng bông. Và những người làm ra sản phẩm này được trả lương đủ sống và được đối xử công bằng.\r\n<br>\r\nVải được nhuộm và hoàn thiện mà không sử dụng kim loại nặng hoặc thuốc nhuộm phân tán gây dị ứng', 'nam', 38),
(50, 'Áo thun kẻ sọc', 782000, NULL, 2, b'0', 0, '2022-11-03', 'Áo thun sọc nhuộm sợi, ngắn tay, cổ tròn.<br>\r\nSản xuất tại Ấn Độ. Chứng nhận thương mại công bằng.<br>\r\nBông hữu cơ tạo điều kiện thuận lợi cho việc tái chế sản phẩm trong tương lai. Chứng nhận hữu cơ bởi GOTS (Tiêu chuẩn Dệt may Hữu cơ Toàn cầu). Bảo vệ người nông dân với những vùng đất lành mạnh cho các thế hệ tương lai. Không sử dụng vật liệu có hại. Sử dụng ít nước hơn 70% và giảm 22% lượng khí thải carbon so với bông thông thường. In gốc nước với mực phân hủy sinh học.\r\n', 'nam', 41),
(51, 'Áo thun Hempt Clavel', 989000, NULL, 2, b'1', 0, '2022-11-11', 'Áo phông cổ chữ V cơ bản được làm từ sợi gai dầu và bông hữu cơ. Thắt lưng thẳng và tay áo ngắn.<br>\r\nĐược làm từ hỗn hợp của cây gai dầu và bông. Cả hai vật liệu đều là 100% hữu cơ — có nghĩa là không có hóa chất nhân tạo nào được sử dụng trong quá trình sản xuất. Các vật liệu được xác minh theo Tiêu chuẩn Hàm lượng Hữu cơ (OCS).', 'nu', 39),
(52, 'Áo thun tay dài Thermal', 1564000, NULL, 2, b'0', 0, '2022-11-15', 'Một chiếc áo thun sọc nhẹ được làm từ merino siêu mịn. Màu đen hơi trong suốt với tay áo dài và cổ cao. Chiều dài cơ thể đủ để nhét vào. Hình ôm sát và được làm từ lông cừu Úc có thể truy xuất nguồn gốc cũng được dệt kim tại địa phương.\r\n<br>\r\nNgoài ra còn có màu xanh nước biển, màu than củi và màu ngà voi không nhuộm – tất cả đều được sản xuất theo đơn đặt hàng, nhưng một khi loại vải này hết, nó sẽ biến mất.', 'unisex', 40),
(53, 'Áo thun tay dài Rib ', 805000, NULL, 2, b'0', 0, '2022-11-06', 'Nhìn tốt, cảm thấy tốt hơn. Chiếc áo thun dài tay dệt kim có đường gân vừa vặn, được làm gần như hoàn toàn bằng bông hữu cơ, nhưng chúng tôi đã quyết định thêm 5% elastane để giúp bạn có thêm khoảng trống.', 'nu', 43),
(54, 'Áo thun Crew Neck', 621000, NULL, 2, b'1', 0, '2022-11-07', 'Bạn có biết những chiếc áo thun mà bạn mượn từ bạn bè luôn cảm thấy mềm mại hơn, vừa vặn hơn và dễ bị sờn nhất không? Chúng tôi đã chắt lọc cảm giác đó và biến nó thành chiếc áo phông dành cho mọi giới tính mới của chúng tôi.\r\n\r\nCuối cùng, hãy là tee hoàn hảo cho tất cả. Được thiết kế để phù hợp với người mặc thoải mái, không phân biệt giới tính, Áo thun cổ tròn cho mọi người có đường viền thoải mái ở cổ, vai mở rộng và chiều dài vừa phải che hết hông. Mặc nó bên ngoài quần legging, mặc với quần jean yêu thích của bạn, đừng để bất kỳ ai khác mặc nó nếu không bạn sẽ không bao giờ nhìn thấy nó nữa.', 'unisex', 44),
(55, 'Áo thun Hempt', 989000, NULL, 2, b'0', 0, '2022-11-12', 'Áo thun ngắn tay cơ bản được làm từ sợi gai dầu và vải pha cotton hữu cơ.\r\n<br>\r\nCây gai dầu hữu cơ — siêu thực vật của tương lai. Nó có thể cải thiện đất cho canh tác tiếp theo. Cây gai dầu là một loại cây phát triển nhanh, phát triển tốt mà không cần nhiều nước. Khi nó phát triển mạnh, cây gai dầu hít vào khí CO2, giải độc đất và ngăn xói mòn đất.\r\n<br>\r\nNhà máy có thể được sử dụng cho nhiều thứ khác nhau. Ví dụ, sợi và thân của nó thường được dùng để may quần áo, xây nhà, thực phẩm cũng như chất bổ sung.', 'nam', 42),
(56, 'Quần short Frida', 843000, NULL, 5, b'1', 1, '2022-11-12', 'Quần short denim vừa vặn làm từ cotton hữu cơ. Những chiếc quần đùi Frida này được làm từ vải denim màu đen mà chúng tôi đã giặt thành màu xám đậm.\n<br>\nTại các đường nối, tông màu sáng hơn và tông màu gần như đen làm nổi bật cấu trúc quần đùi. Ở những nơi có màu sắc tươi sáng nhất, các đường đan chéo thể hiện rõ nhất, giúp chiếc quần đùi có mức độ chi tiết tinh tế ấn tượng.', 'nu', 48),
(57, 'Áo thun một túi Roy', 1104000, NULL, 2, b'0', 0, '2022-11-12', 'Áo thun cổ tròn được may bằng vải jersey sạch sẽ, sắc nét làm từ bông hữu cơ. Để có được vẻ ngoài đẹp trai, Roy đã nhuộm màu và sau đó rửa sạch bằng đá.\r\n<br>\r\nĐiều này mang lại kiểu triển vọng sống động mà chúng tôi nghĩ rất phù hợp với denim. Màu sắc sẽ tiếp tục phai dần theo thời gian khi bạn mặc và giặt.', 'nam', 46),
(58, 'Áo thun Essential Crew', 506000, NULL, 2, b'0', 0, '2022-11-03', 'Mặt hàng chủ lực tinh túy quanh năm trong tủ quần áo, Essential Crew là cốt lõi trong bộ sưu tập của chúng tôi.\r\n<br>\r\nVừa vặn với cơ thể, món đồ này được làm từ áo 100% cotton nhẹ nhất và bền nhất của chúng tôi và đã được GQ và The Wall Street Journal liệt kê là một trong những loại tốt nhất trên thị trường.', 'men', 47),
(59, 'Áo thun GOTS', 1012000, NULL, 2, b'1', 0, '2022-11-09', 'Áo thun sọc hữu cơ GOTS không nhuộm với đường viền vải thô, tay áo có mũ, dây đeo cổ cao và đường chỉ may tương phản đặc trưng của chúng tôi ở hai bên và ở giữa cổ.\r\n<br>\r\nHình ôm sát và được làm từ xương sườn có cấu trúc mềm mại, hữu cơ rất được yêu thích của chúng tôi.', 'nu', 45),
(60, 'Áo sơ mi Sammy', 1150000, NULL, 4, b'1', 1, '2022-11-09', 'Là một chiếc áo sơ mi cotton cổ điển, Sammy có lớp hoàn thiện bằng enzym độc đáo giúp tăng thêm độ mềm mại cho vải. Nó có một túi vá ở phía trước, với vai hơi tụt xuống và chiều dài dài hơn.\r\n<br>\r\nMặt trước có một khuy cài đóng túi trong khi tay áo kết thúc ở khuy măng sét. Mặc nó với denim để có vẻ ngoài thực sự vượt thời gian.', 'nu', 49),
(61, 'Áo sơ mi kiểu vải lanh', 1541000, NULL, 4, b'0', 0, '2022-11-15', 'Được cắt từ loại vải 100% tự nhiên cao cấp, Áo sơ mi vải lanh của chúng tôi có kiểu dáng vừa vặn thoải mái, cổ áo không cài cúc, các nút nhựa sinh học tùy chỉnh và chiều dài vai vừa phải để có được chiều cao tay áo ở nơi cần thiết.\r\n<br>\r\nĐóng đinh nó không hề đơn giản, nhưng bây giờ tất cả là của bạn.', 'nam', 50),
(62, 'Áo sơ mi Seersucker', 1472000, NULL, 4, b'0', 0, '2022-11-08', 'Được cắt từ vải cotton seersucker Bồ Đào Nha hữu cơ, chiếc áo sơ mi ngắn tay hoàn hảo này đủ nhẹ cho thời tiết ấm áp.\r\n<br>\r\nTất cả những gì bạn phải làm là thêm chiếc Chino Shorts yêu thích của mình và... bum-bum-bum.', 'nam', 51),
(63, 'Áo sơ mi kiểu Cuban', 1955000, NULL, 4, b'0', 0, '2022-11-13', 'Sự thoải mái của một chiếc áo phông với đường cắt tinh tế của một chiếc áo sơ mi thông minh.\r\n<br>\r\nĐược làm bằng vải mềm, nhẹ có nguồn gốc từ cây bạch đàn, Áo sơ mi có cổ Cuba của chúng tôi có mặt trước hai lớp để tăng thêm cấu trúc và cổ áo rộng để thoáng khí. Hồi sinh một cổ điển cũ thành một tủ quần áo mô-đun mới cần thiết.', 'nam', 52),
(64, 'Áo sơ mi Hemp mapple', 1955000, NULL, 4, b'1', 0, '2022-11-14', 'Áo sơ mi lưng thẳng bằng vải làm từ sợi gai dầu và vải tencel. Tay áo dài có còng và cổ áo sơ mi. Nút corozo tự nhiên ở mặt trước và cổ tay áo.\r\n<br>\r\nTencel là một loại tơ nhân tạo từ gỗ có nguồn gốc bền vững. Nó được tạo ra bằng cách hòa tan bột gỗ và sử dụng quy trình sấy khô đặc biệt gọi là kéo sợi. Trước khi sấy, dăm gỗ được trộn với dung môi để tạo ra hỗn hợp ướt. Trong quá trình sản xuất, Tencel cần ít năng lượng và nước hơn so với bông thông thường. Là một loại sợi có nguồn gốc từ thực vật, nó cũng có thể phân hủy sinh học và cần ít nước hơn nhiều so với bông.', 'nu', 53),
(65, 'Áo sơ mi Edgar', 1250000, NULL, 4, b'0', 0, '2022-11-08', 'Áo sơ mi Edgar được làm từ 100% cotton poplin hữu cơ và là một phần trong bộ sưu tập cổ điển của Skall Studio. Chiếc áo có kiểu dáng lấy cảm hứng từ trang phục nam cổ điển với phom dáng thoải mái và hơi quá khổ. Nó có cổ áo thông thường, vạt áo rộng và cổ tay áo có khuy cài, túi trước ngực và cổ áo có nếp gấp rộng ở phía sau.\r\n<br>\r\nÁo sơ mi Edgar là món đồ cổ điển trong tủ quần áo của Skall Studio và rất phù hợp để phối nhiều lớp. Ví dụ, nó có thể được tạo kiểu với chiếc quần Edgar phù hợp hoặc bên dưới một trong những chiếc áo ghi lê của chúng tôi', 'nu', 54),
(66, 'Áo sơmi AIAYU', 1426000, NULL, 4, b'0', 0, '2022-11-11', 'Áo sơ mi AIAYU là một món đồ kinh điển trong tủ quần áo ngay lập tức. Phiên bản này được làm từ seersucker bông hữu cơ thú vị, mang lại cho chiếc áo một cảm giác kết cấu và sang trọng. Khách hàng yêu thích này có hình dạng thoải mái với nhiều khối lượng.\r\n<br>\r\nChiếc áo có các chi tiết tỉ mỉ như đường viền cong dài hơn một chút ở phía sau, cổ tay áo cổ điển và dây cài khuy ở tay áo - hoàn hảo để xắn lên hoặc xắn xuống tùy theo mùa và tâm trạng của bạn', 'nu', 55),
(67, 'Áo sơ mi màu phong', 1550000, NULL, 4, b'0', 0, '2022-11-10', 'Áo sơ mi lưng thẳng với tay áo dài, còng và cổ áo sơ mi. Nút corozo tự nhiên ở mặt trước và cổ tay áo. Vải nghìn sọc màu lạc đà.\r\n<br>\r\nĐược làm bằng bông hữu cơ được chứng nhận Tiêu chuẩn Dệt may Hữu cơ Toàn cầu (GOTS). Tiêu chuẩn GOTS đảm bảo không có hóa chất độc hại nào được sử dụng để trồng bông. Và những người làm ra sản phẩm này được trả lương đủ sống và được đối xử công bằng.', 'nu', 56),
(68, 'Áo sơ mi Chambray ', 2050000, NULL, 4, b'0', 0, '2022-11-05', 'Thanh lịch trong cuộc sống hàng ngày, chiếc áo sơ mi chambray có trọng lượng trung bình này được làm bằng sợi gai dầu rất đặc biệt pha trộn với bông hữu cơ. Một cái nhìn thoải mái xuyên suốt thân xe, dài hơn ở phía sau với các chi tiết bổ sung ở đường xẻ bên và ách sau.\r\n<br>\r\nNổi bật với các nút corozo tự nhiên tương phản đẹp mắt của chúng tôi dưới túi quần ẩn, chiếc áo sơ mi này vừa đẹp vừa dễ mặc. Do kiểu dáng dành cho cả nam và nữ, chúng tôi khuyên nam giới hoặc những người có vai rộng nên đặt mua từ một đến hai cỡ.', 'nam', 57),
(69, 'Túi xách nhỏ đeo vai', 682000, NULL, 8, b'0', 0, '2022-11-08', 'Túi xách nhỏ đeo vai phối cùng xích dập nổi hoạ tiết Diamond Lattice sang trọng<br>\r\nTúi có kèm 2 dây đeo cho bạn mix & match theo phong cách của mình<br>\r\nChất liệu da tổng hợp cao cấp, bền đẹp, dễ vệ sinh<br>', 'nam', 58),
(70, 'Balo Keeping You Warm', 878000, NULL, 8, b'1', 5, '2022-11-04', 'Balo ngăn trước túi nhỏ kèm ngăn kéo trông năng động.Thiết kế nhỏ gọn có quai cầm tay và quai đeo dễ dàng điều chỉnh. Với màu chủ đạo là trắng pha chút vân viền gam màu nóng. Kích thước vừa đủ rộng để các vât dụng cá nhân trong công việc hay đi dạo', 'nu', 59),
(71, 'Túi xách nhỏ cầm tay Monogram', 780000, NULL, 8, b'1', 1, '2022-11-04', 'Túi xách nhỏ cầm tay khóa xoay monogram thời trang, mới lạ và nổi bật<br>\r\nTúi thiết kế dáng nhỏ gọn, hoạ tiết logo kim loại cách điệu đủ để bạn thu hút mọi ánh nhìn<br>\r\nCó nhiều sự lựa chọn về màu sắc để nàng thoải mái phối đồ và tạo phong cách mới<br>', 'nu', 60),
(72, 'Ví vải Tweel', 584000, NULL, 8, b'0', 2, '2022-11-05', 'Ví Vải Tweed Trang Trí Logo Cách Điệu sang trọng, bắt mắt<br>\r\nBên trong thiết kế nhiều ngăn nhỏ, tiện dụng<br>\r\nChất liệu da tổng hợp cao cấp. Ví phù hợp dùng như ví tiền hoặc đi tiệc, dạo phố<br>', 'nu', 61),
(73, 'Túi da nam đeo chéo LATA', 620000, NULL, 8, b'0', 0, '2022-11-12', 'Được làm từ chất liệu da tổng hợp cao cấp, bền bỉ. Với thiết kế đơn giản, năng động mang đến cho người dùng sự trẻ trung, cá tính nhưng không kém phần sang trọng. Kích thước túi nam được thiết kế khá rộng rãi và các ngăn đựng khoa học, tiện dụng chắc chắn sẽ là một trợ thủ đắc lực đồng hành cùng bạn suốt cả ngày dài.', 'nam', 62),
(74, 'Cặp da nam LATA', 750000, NULL, 8, b'1', 1, '2022-11-10', 'Cặp da nam Lata là sự lựa chọn hoàn hảo cho các chàng trai thể hiện sự thông minh, gu thẫm mỹ tinh tế trong thời trang của mình. Ngoài ra chiếc cặp nam công sở này còn được thiết kế với kích thước rộng rãi, có nhiều ngăn nhỏ có thể chứa laptop, tài liệu hay sách vở...vô cùng thuận tiện khi đi làm, đi công', 'nam', 63),
(75, 'Túi đeo chéo da nam dáng đứng LATA', 690000, NULL, 8, b'0', 1, '2022-11-14', 'Lata dáng đứng với các gam màu da lịch lãm là items bạn cần có để lưu trữ đồ đạc của mình được an toàn và tiện dụng. Đươc chế tác trên nền da tổng hợp cao cấp, chiếc túi còn thiết kế thêm các ngăn đựng khoa học giúp thỏa mãn nhu cầu mang theo nhiều đồ dùng cần thiết của bạn.', 'nam', 64),
(76, 'Giày thời Trang Unisex', 2335500, NULL, 7, b'1', 1, '2022-11-08', 'Nhờ sự pha trộn giữa chất lượng hiệu suất và sự thanh lịch giản dị mà tinh tế, giày tennis cổ điển là một trong những item có phong cách vượt thời gian.\r\n<br>\r\nGiày thời trang Unisex thích hợp mang hàng ngày với thiết kế đế giữa có chiều cao xếp chồng lên nhau độc đáo. Bên cạnh đó, thiết kế đế ngoài kiểu cúp cổ điển có biểu tượng \'N\' đặc trung của New Balance, cùng một miếng bọc ngón chân cao su kéo dài từ đế ngoài giúp bảo vệ chân của bạn tốt hơn.', 'unisex', 65),
(77, 'Giày Sandal Nhung Ankle Gót Trụ', 626000, NULL, 7, b'0', 0, '2022-11-12', '-Loại sản phẩm:Giày Sandals<br>\r\n-Độ cao gót: 7.5 cm<br>\r\n-Loại mũi:Hở mũi (mũi vuông)<br>\r\n-Chất liệu:Da nhân tạo<br>\r\n-Kiểu giày:Sandals<br>\r\n-Phù hợp sử dụng: Đi chơi, đi làm, đi học<br>', 'nu', 66),
(78, 'Giày bít mũi nhọn Polishes Style', 586000, NULL, 7, b'1', 0, '2022-11-10', '-Loại sản phẩm: Giày Bít<br>\r\n-Độ cao gót:7.5 cm<br>\r\n-Loại mũi:Bít mũi nhọn<br>\r\n-Chất liệu: Da nhân tạo phủ bóng<br>\r\n-Kiểu giày:Pumps<br>\r\n-Phù hợp sử dụng:Đi làm, đi tiệc, đi chơi', 'nu', 67),
(79, 'Giày tây Nam', 890000, NULL, 7, b'0', 0, '2022-11-08', '– Chất liệu da bò cao cấp hàng đầu thị trường\r\n<br>\r\n– Kiểu dáng đúng chuẩn Dress Shoes Âu Châu (khuôn giày nhập cao cấp tạo nên sự khác biệt)\r\n<br>\r\n– Thiết kế giày tây đúng chuẩn sang trọng Oxford, Derby, Wholecut, Wingtips, Double Monk, Captoe, Tassel Loafer…\r\n<br>\r\n– Công nghệ sản xuất Cementing ép keo đế cho độ bền vượt trội.\r\n<br>\r\n– Thương hiệu MARCO Shoemaker chuyên gia công sản xuất cho nhiều thương hiệu, công ty danh tiếng trong và ngoài nước.\r\n<br>', 'nam', 68),
(80, 'Giày Da Xỏ Penny Loafer', 790000, NULL, 7, b'0', 1, '2022-11-14', '– Chất liệu da bò cao cấp hàng đầu thị trường\r\n<br>\r\n– Kiểu dáng đúng chuẩn Dress Shoes Âu Châu (khuôn giày nhập cao cấp tạo nên sự khác biệt)\r\n<br>\r\n– Thiết kế giày tây đúng chuẩn sang trọng Oxford, Derby, Wholecut, Wingtips, Double Monk, Captoe, Tassel Loafer…\r\n<br>\r\n– Công nghệ sản xuất Cementing ép keo đế cho độ bền vượt trội.\r\n<br>\r\n– Thương hiệu MARCO Shoemaker chuyên gia công sản xuất cho nhiều thương hiệu, công ty danh tiếng trong và ngoài nước.\r\n<br>', 'nam', 69),
(81, 'Giày New Balance 550 GS', 3690000, NULL, 7, b'0', 0, '2022-11-15', 'New Balance là một thương hiệu thời trang và giày thể thao từ Mỹ. Hơn 100 năm qua, New Balance luôn tìm hiểu nhu cầu của những vận động viên để đầu tư, thiết kế những sản phẩm phù hợp. New Balance luôn tập trung đến từng chuyển động của cơ thể con người để có thể “Tạo-Ra-Điều-Tuyệt-Vời” (Making Excellent Happen)!', 'unisex', 70);

-- --------------------------------------------------------

--
-- Table structure for table `hinh`
--

CREATE TABLE `hinh` (
  `id_hinh` int(11) NOT NULL,
  `hinh1` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh2` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh3` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_hh` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinh`
--

INSERT INTO `hinh` (`id_hinh`, `hinh1`, `hinh2`, `hinh3`, `ma_hh`) VALUES
(1, 'aokhoacda1.2.jpg', 'aokhoacda1.1.webp', '', 2),
(2, 'aolen1.jpg', 'aolen1.2.jpg', '', 5),
(3, 'quan1.jpg', 'quan1.2.jpg', '', 6),
(4, 'aosomi1.jpg', 'aosomi1.2.jpg', '', 7),
(5, 'aothun1.jpg', 'aothun1.2.jpg', '', 8),
(6, 'aosomi2.jpg', 'aosomi2.2.jpg', '', 9),
(7, 'aosomi3.jpg', 'aosomi3.2.jpg', '', 10),
(8, 'dam1.2.webp', 'dam1.webp', '', 11),
(9, 'giay1.jpg', 'giay1.2.jpg', '', 12),
(10, 'giay2.jpg', 'giay2.2.jpg', '', 13),
(11, 'bag1.avif', 'bag1.2.jpg', '', 14),
(12, 'quantay1.jpg', 'quantay1.1.jpg', '', 24),
(14, 'quanjean1.jpg', 'quanjean1.1.jpg', '', 25),
(15, 'quantay2.jpg', 'quantay2.2.jpg', '', 27),
(16, 'quanjean2.jpg', 'quanjean2.2.jpg\r\n', '', 26),
(17, 'quanjean3.jpg', 'quanjean3.1.jpg', '', 28),
(18, 'aokhoac2.jpg', 'aokhoac2.2.jpeg\n', '', 29),
(19, 'aokhoac3.jpg', 'aokhoac3.1.jpg', '', 30),
(20, 'aokhoac4.jpg', 'aokhoac4.1.jpg', '', 31),
(21, 'aokhoac5.jpg', 'aokhoac5.1.jpg', '', 32),
(22, 'aokhoac6.jpg', 'aokhoac6.1.jpg', '', 33),
(23, 'quanshort1.jpg', 'quanshort1.1.jpg', '', 34),
(24, 'aolen8.jpg', 'aolen8.1.jpg', '', 36),
(25, 'aolen7.jpg', 'aolen7.1.jpg', '', 35),
(26, 'aolen2.jpg', 'aolen2.1.jpg', '', 48),
(27, 'aolen3.jpg', 'aolen3.1.jpg', '', 37),
(28, 'aolen4.jpg', 'aolen4.1.jpg', '', 38),
(29, 'aolen5.jpg', 'aolen5.1.jpg', '', 39),
(30, 'aolen6.jpg', 'aolen6.1.jpg', '', 40),
(31, 'aohoodie1.jpg', 'aohoodie1.1.jpg', '', 42),
(32, 'aohoodie2.jpg', 'aohoodie2.1.jpg', '', 43),
(33, 'aothun2.jpg', 'aothun2.1.jpg', '', 44),
(34, 'aothun3.jpg', 'aothun3.1.jpg', '', 45),
(35, 'aothun4.jpg', 'aothun4.1.jpg', '', 46),
(36, 'aothun5.jpg', 'aothun5.1.jpg', '', 47),
(37, 'aothun6.jpg', 'aothun6.1.jpg', '', 48),
(38, 'aothun7.jpg', 'aothun7.1.jpg', '', 49),
(39, 'aothun8.jpg', 'aothun8.1.jpg', '', 51),
(40, 'aothun9.jpg', 'aothun9.1.jpg', '', 52),
(41, 'aothun10.jpg', 'aothun10.1.jpg', '', 50),
(42, 'aothun11.jpg', 'aothun11.1.jpg', '', 55),
(43, 'aothun12.jpg', 'aothun12.1.jpg', '', 53),
(44, 'aothun13.jpg', 'aothun13.1.jpg', '', 54),
(45, 'aothun14.jpg', 'aothun14.1.jpg', '', 59),
(46, 'aothun15.jpg', 'aothun15.1.jpg', '', 57),
(47, 'aothun16.jpg', 'aothun16.1.jpg', '', 58),
(48, 'quanshort2.jpg', 'quanshort2.1.jpg', '', 56),
(49, 'aosomi4.jpg', 'aosomi4.1.jpg', '', 60),
(50, 'aosomi5.jpg', 'aosomi5.1.jpg', '', 61),
(51, 'aosomi6.jpg', 'aosomi6.1.jpg', '', 62),
(52, 'aosomi7.jpg', 'aosomi7.1.jpg', '', 63),
(53, 'aosomi8.jpg', 'aosomi8.1.jpg', '', 64),
(54, 'aosomi9.jpg', 'aosomi9.1.jpg', '', 65),
(55, 'aosomi10.jpg', 'aosomi10.1.jpg', '', 66),
(56, 'aosomi11.jpg', 'aosomi11.1.jpg', '', 67),
(57, 'aosomi12.jpg', 'aosomi12.1.jpg', '', 68),
(58, 'bag1.jpg', 'bag1.1.jpg', '', 69),
(59, 'bag2.jpg', 'bag2.2.jpg', '', 70),
(60, 'bag3.jpg', 'bag3.1.jpg', '', 71),
(61, 'bag4.jpg', 'bag4.1.jpg', '', 72),
(62, 'bag5.jpg', 'bag5.1.jpg', '', 73),
(63, 'bag6.jpg', 'bag6.1.jpg', '', 74),
(64, 'bag7.jpg', 'bag7.1.jpg', '', 75),
(65, 'giay3.jpg', 'giay3.1.jpg', '', 76),
(66, 'giay4.jpg', 'giay4.1.jpg', '', 77),
(67, 'giay5.jpg', 'giay5.1.jpg', '', 78),
(68, 'giay6.jpg', 'giay6.1.jpg', '', 79),
(69, 'giay7.jpg', 'giay7.1.jpg', '', 80),
(70, 'giay8.jpg', 'giay8.1.jpg', '', 81);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `ma_kh` int(10) NOT NULL,
  `ho_ten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(200) NOT NULL,
  `SDT` bigint(20) NOT NULL,
  `ma_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`ma_kh`, `ho_ten`, `hinh`, `dia_chi`, `SDT`, `ma_user`) VALUES
(216, 'dsadsa', NULL, '', 0, 1),
(217, 'trantrieu22', NULL, '', 0, 2),
(218, 'yến nhi', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id_tin` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `mo_ta` text NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL DEFAULT current_timestamp(),
  `tac_gia` varchar(50) NOT NULL,
  `hinh` varchar(200) DEFAULT NULL,
  `loai_tin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ma_user` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vai_tro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ma_user`, `email`, `mat_khau`, `vai_tro`, `ho_ten`) VALUES
(1, '$email', '$mat_khau', '$vai_tro', 'dsadsa'),
(2, 'trieutran989@gmail.com', 'dsadsa', 'khachhang', 'trantrieu22'),
(3, 'huynhnhi21103@gmail.com', '1234567890', 'khachhang', 'huỳnh thị yến nhi');

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
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `id_hinh` (`id_hinh`);

--
-- Indexes for table `hinh`
--
ALTER TABLE `hinh`
  ADD PRIMARY KEY (`id_hinh`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ma_kh`),
  ADD KEY `ma_user` (`ma_user`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id_tin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ma_user`);

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
  MODIFY `ma_hh` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `hinh`
--
ALTER TABLE `hinh`
  MODIFY `id_hinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ma_kh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id_tin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ma_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `id_hinh` FOREIGN KEY (`id_hinh`) REFERENCES `hinh` (`id_hinh`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `hinh`
--
ALTER TABLE `hinh`
  ADD CONSTRAINT `ma_hh` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `ma_user` FOREIGN KEY (`ma_user`) REFERENCES `user` (`ma_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
