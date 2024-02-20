-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 20, 2024 lúc 08:13 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ezcode`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'Lập trình HTML & CSS'),
(2, 'Thiết kế đồ họa'),
(8, 'Frontend Development'),
(9, ' UI/UX Design'),
(10, 'Backend Development'),
(11, 'Web Development'),
(12, ' Database Management'),
(13, 'Lập trình PHP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `membership`
--

INSERT INTO `membership` (`id`, `name`) VALUES
(0, 'Chưa đăng kí'),
(1, 'VIP MEMBER'),
(2, 'GOLD MEMBER'),
(3, 'UNLIMITED MEMBER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `describe` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `total_register` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `describe`, `category`, `total_register`, `duration`) VALUES
(1, 'Lập trình Python cơ bản', 'a4.jpg', '299.000 VND', 'Khóa học này giúp bạn học cách lập trình bằng ngôn ngữ Python từ cơ bản đến nâng cao.', 13, 3132, '2 giờ'),
(2, 'Phát triển ứng dụng di động với React Native', 'a5.jpg', '399.000 VND', ' Khóa học này tập trung vào việc phát triển ứng dụng di động sử dụng React Native.', 8, 434, '2 giờ 30 phút'),
(6, 'Machine Learning và Data Science', 'a6.jpeg', '499.000 VND', 'Khóa học này cung cấp kiến thức và kỹ năng cần thiết để thực hiện các dự án Machine Learning và Data Science.', 12, 4344, '3 giờ 15 phút'),
(16, 'Thiết kế giao diện người dùng (UI/UX Design)', 'a7.jpg', '349.000 VND', 'Khóa học này hướng dẫn cách thiết kế giao diện người dùng hiệu quả và tương tác người dùng tốt.', 9, 6456, '3 giờ 30 phút'),
(17, 'Học lập trình web với HTML & CSS nâng cao', 'a8.jpg', ' 249.000 VND', ' Khóa học này giúp bạn nắm vững kiến thức cơ bản về lập trình web và xây dựng các trang web động.', 1, 7767, '3 giờ'),
(18, ' Frontend Development with React.js', 'b1.jpg', '399.000 VND', 'Khóa học này tập trung vào việc phát triển các ứng dụng web sử dụng thư viện React.js.', 8, 9879, '4 giờ 30 phút'),
(19, 'Full Stack Web Development with Node.js and MongoDB', 'b2.jpg', '449.000 VND', 'Khóa học này tập trung vào việc phát triển các ứng dụng web full stack sử dụng Node.js và MongoDB.', 8, 988, '2 giờ'),
(20, 'Học thiết kế đồ họa với Figma', 'b3.png', '249.000 VND', 'Khóa học này dạy cách sử dụng Figma để thiết kế các giao diện người dùng hiện đại.', 9, 2342, '5 giờ 30 phút'),
(21, 'Thiết kế đồ họa với Adobe Illustrator', 'b4.webp', '299.000 VND', ' Học cách sử dụng Adobe Illustrator để tạo ra các hình ảnh vector và thiết kế đồ họa chuyên nghiệp.', 2, 1434, '3 giờ'),
(22, ' Frontend Development with Angular', 'b5.webp', '399.000 VND', ' Học cách phát triển ứng dụng web sử dụng framework Angular của Google.', 8, 1145, '6 giờ 30 phút'),
(23, 'React.js Programming Basics', 'b6.png', '299.000 VND', 'Học cách sử dụng thư viện React.js để xây dựng các ứng dụng web hiệu quả.', 8, 3422, '4 giờ'),
(24, 'Introduction to SQL and Database Management', 'b7.jpg', ' 249.000 VND', 'Giới thiệu về SQL và cách quản lý cơ sở dữ liệu, bao gồm các thao tác cơ bản như tạo bảng, truy vấn dữ liệu, và cập nhật dữ liệu.', 12, 2332, '5 giờ 45 phút');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `membership` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `address`, `tel`, `membership`, `role`, `username`, `password`) VALUES
(2, 'Mai Đức Dương', '5e4c1ac7e064483a1175.jpg', 'duongmdph40323@fpt.edu.vn', 'ngõ 110 nguyên xá', '0865643858', 1, 1, 'duong2004', 'Duong2004@'),
(3, 'Mai Đức Dương', 'z4460877689128_1eb6c02c99083f326854d95d035ee70d.jpg', 'duongmdph40323@fpt.edu.vn', '198 Lê Thánh Tông,Đông Vệ', '0865643858', 2, 2, '', ''),
(7, 'Mai Nhi', 'anhuser2.jpg', 'nhi@fpt.edu.vn', '95 Tu Hoàng,Phương Canh,Nam Từ Liêm,Hà Nội', '0984045768', 3, 2, '', ''),
(8, 'Miu xinh', 'avt7.png', 'miuxinh20550@gmail.com', '123 Lê Lợi, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh', '0987123456', 0, 2, '', ''),
(9, 'Baby Chart', 'avt8.jpeg', 'nguyenvana@gmail.com', '101 Trần Phú, Phường Ngô Quyền, Quận Hải An, Thành phố Hải Phòng', '0928123456', 0, 2, '', ''),
(10, 'Hà Anh', 'avt9.png', 'haanhh@gmail.com', '234 Nguyễn Văn Cừ, Phường An Hoà, Quận Ninh Kiều, Thành phố Cần Thơ', '0868123456', 0, 2, '', ''),
(11, 'Lê Văn Minh', 'avt10.webp', 'leminhh@gmail.com', '676 Lê Duẩn, Phường Thanh Khê Tây, Quận Thanh Khê, Thành phố Đà Nẵng', '0948123456', 3, 2, '', ''),
(12, 'đasđa', '', 'duongkhongkich@gmail.com', 'ngõ 110 nguyên xá', '0865643858', 0, 3, '42343', 'Duong2004@'),
(13, 'mmm', '', 'duongkhongkich@gmail.com', 'ngõ 110 nguyên xá', '0865643858', 0, 2, 'duong2004', 'Duong2004@1'),
(14, 'dsađasad', '', 'duongmdph40323@fpt.edu.vn', 'ngõ 110 nguyên xá', '0865643858', 0, 2, 'dsđá', 'Duong2004@');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_buy_products`
--

CREATE TABLE `user_buy_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_buy_products`
--

INSERT INTO `user_buy_products` (`id`, `user_id`, `product_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 7, 16),
(4, 7, 17),
(5, 7, 21),
(6, 7, 24),
(7, 3, 24),
(8, 3, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_buy_products`
--
ALTER TABLE `user_buy_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user_buy_products`
--
ALTER TABLE `user_buy_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
