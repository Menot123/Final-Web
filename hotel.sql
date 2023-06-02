CREATE DATABASE hotel;
USE hotel;
CREATE TABLE admin (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(10) NOT NULL,
 `password` varchar(10) NOT NULL,
 PRIMARY KEY (`id`)
);
CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(20) NOT NULL,
 `password` varchar(20) NOT NULL,
 `name` varchar(50) NOT NULL,
 `gender` varchar(10) NOT NULL,
 `birth` date NOT NULL,
 `phone` varchar(20) NOT NULL,
 PRIMARY KEY (`id`)
);
CREATE TABLE `rooms` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(50) NOT NULL,
 `image_1` varchar(50) NOT NULL,
 `image_2` varchar(50) NOT NULL,
 `image_3` varchar(50) NOT NULL,
 `description` text NOT NULL,
 `price` double NOT NULL,
 PRIMARY KEY (`id`)
);
CREATE TABLE `contact` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(30) NOT NULL,
 `email` varchar(30) NOT NULL,
 `subject` varchar(50) NOT NULL,
 `message` text NOT NULL,
 PRIMARY KEY (`id`)
);
CREATE TABLE `bookroom` (
 `maphong` int(11) NOT NULL AUTO_INCREMENT,
 `checkin` date NOT NULL,
 `checkout` date NOT NULL,
 PRIMARY KEY (`maphong`)
);

CREATE TABLE `manageroom` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `idroom` int(11) NOT NULL,
 `roomname` varchar(50) NOT NULL,
 `total` varchar(30) NOT NULL,
 PRIMARY KEY (`id`)
);


INSERT INTO `admin` (`id`, `username`, `password`) VALUES (NULL, 'admin', '123456');

INSERT INTO `users` (`id`, `username`, `password`, `name`, `gender`, `birth`, `phone`) 
VALUES (NULL, 'nguyentiendat123', '123456789', 'Nguyễn Tiến Đạt', 'Nam', '2002-11-08', '0334353660'), 
(NULL, 'nguyenvana', '123456789', 'Nguyễn Văn A', 'Nữ', '2002-02-17', '0123456789');

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES (NULL, 'Nguyen Van A', 'nguyenvana@gmail.com', 'Tiệc lớn', 'Tôi muốn gặp mặt chủ sở hữu để bàn về việc tổ chức một bữa tiệc lớn tại đây');

INSERT INTO `rooms` (`id`, `title`, `image_1`, `image_2`, `image_3`, `description`, `price`) VALUES (NULL, 'Phòng Ngủ Trên Đá Ven Biển', 'assets/images/rooms/room1/1.jpg', 'assets/images/rooms/room1/2.jpg', 'assets/images/rooms/room1/3.jpg', '<li>1 giường King và 2 giường Queen</li>\r\n<li>Phòng ngủ riêng, có khu vực Sinh hoạt và Ăn uống</li>\r\n<li>Bể bơi riêng ngoài trời</li> <li>Phòng Ngủ Trên Đá</li>\r\n<li>Khu vực ban công đầy đủ tiện nghi</li> ', '11000'), (NULL, 'Phòng Ngủ Ven Biển Hoàng Gia', 'assets/images/rooms/room2/1.jpg', 'assets/images/rooms/room2/2.jpg', 'assets/images/rooms/room2/3.jpg', '<li>2 giường King</li>\r\n<li>Khu vực có không gian riêng tư</li> <li>Phòng ngủ riêng, có khu vực sinh hoạt và ăn uống</li> <li>Bể bơi riêng ngoài trời</li> <li>Phòng Ngủ Bên Biển</li>', '20000'), (NULL, 'Phòng Sun Peninsula 3 ', 'assets/images/rooms/room3/1.jpg', 'assets/images/rooms/room3/2.jpg', 'assets/images/rooms/room3/3.jpg', '<li>3 giường King</li> <li>Phòng ngủ riêng, có Khu vực Sinh hoạt, Ăn uống và Nhà bếp</li> <li>Phòng tắm sang trọng nhìn ra biển</li> <li>Phòng ngủ trên đá ven biển</li>\r\n<li>Ban công đầy đủ tiện nghi</li> ', '35000'), (NULL, 'Phòng Tổng Thống Đặc Biệt', 'assets/images/rooms/room4/1.jpg', 'assets/images/rooms/room4/2.jpg', 'assets/images/rooms/room4/3.jpg', '<li>1 giường super King</li> <li>Phòng ngủ có Khu vực Sinh hoạt và Ăn uống</li> <li>Bể bơi riêng ngoài trời</li> <li>Phòng tổng thống khung cảnh biển và núi</li>\r\n<li>Phòng tắm sang trọng nhìn ra biển</li> \r\n\r\n', '8000'), (NULL, 'Phòng Suite Khung Cảnh Toàn Đại Dương', 'assets/images/rooms/room5/1.jpg', 'assets/images/rooms/room5/2.jpg', 'assets/images/rooms/room5/3.jpg', '<li>1 giường King</li> <li>Khu vực sinh hoạt riêng</li> <li>Tầng cao và Minibar</li> <li>Ban công đầy đủ tiện nghi</li>\r\n<li>Khung Cảnh Đại Dương</li>', '4000'), (NULL, 'Phòng Suite Riêng Tư', 'assets/images/rooms/room6/1.jpg', 'assets/images/rooms/room6/2.jpg', 'assets/images/rooms/room6/3.jpg', '<li>1 giường King</li>\r\n<li>Hồ bơi riêng</li>\r\n<li>Khung cảnh núi</li>\r\n<li>Nội thất tiện nghi</li>\r\n<li>Ban công rộng</li>\r\n', '3800'), (NULL, 'Phòng Classic Khung Cảnh Đại Dương', 'assets/images/rooms/room7/1.jpg', 'assets/images/rooms/room7/2.jpg', 'assets/images/rooms/room7/3.jpg', '<li>2 giường Queen</li>\r\n<li>Phòng tắm sang trọng nhìn ra biển</li>\r\n<li>Minibar dự trữ</li>\r\n<li>Hướng biển</li>\r\n<li>Ban công đầy đủ tiện nghi</li>\r\n \r\n \r\n ', '2500'), (NULL, 'Phòng Vịnh Bãi Bắc', 'assets/images/rooms/room8/1.jpg', 'assets/images/rooms/room8/2.jpg', 'assets/images/rooms/room8/3.jpg', '<li>2 giường King và 2 giường Queen</li>\r\n<li>Phòng Ngủ Vịnh Bãi Bắc </li>\r\n<li>Vòi tắm ngoài trời</li>\r\n<li>Bồn tắm và buồng tắm đứng riêng biệt</li>\r\n<li>Hướng biển và bể bơi riêng ngoài trời</li>\r\n', '50000'), (NULL, 'Phòng Đặc Biệt 1 Giường King', 'assets/images/rooms/room9/1.jpg', 'assets/images/rooms/room9/2.jpg', 'assets/images/rooms/room9/3.jpg', '<li>1 Giường King</li>\r\n<li>Có khu vực làm việc riêng</li>\r\n<li>Đầy đủ tiện nghi</li> <li>Bồn tắm to hiện đại</li>\r\n<li>Khu vực ban công đầy đủ tiện nghi</li> ', '2500'), (NULL, 'Phòng PenHouse Thiết Kế Mới', 'assets/images/rooms/room10/1.jpg', 'assets/images/rooms/room10/2.jpg', 'assets/images/rooms/room10/3.jpg', '<li>1 giường King</li>\r\n<li>Khu vực giải trí riêng</li>\r\n<li>Có bàn làm việc</li> <li>Bồn tắm hướng ra biển</li>\r\n<li>Khu vực ban công đầy đủ tiện nghi</li> ', '3500'), (NULL, 'Phòng Classic View Biển', 'assets/images/rooms/room11/1.jpg', 'assets/images/rooms/room11/2.jpg', 'assets/images/rooms/room11/3.jpg', '<li>1 giường King</li>\r\n<li>Thiết kế tiện nghi</li>\r\n<li>Khu vực làm việc riêng biệt</li>\r\n<li>Bồn tắm và buồng tắm đứng riêng biệt</li>\r\n<li>Hướng biển và bể bơi riêng ngoài trời</li>\r\n', '1900'), (NULL, 'Phòng Triple City', 'assets/images/rooms/room12/1.jpg', 'assets/images/rooms/room12/2.jpg', 'assets/images/rooms/room12/3.jpg', '<li>3 giường Queen</li>\r\n<li>Khu vực giải trí riêng</li>\r\n<li>Quầy minibar</li> <li>Phòng tắm rộng rãi với buồng tắm đứng</li>\r\n<li>Khu vực ban công đầy đủ tiện nghi</li> ', '2900'), (NULL, 'Phòng Junior Suite King', 'assets/images/rooms/room13/1.jpg', 'assets/images/rooms/room13/2.jpg', 'assets/images/rooms/room13/3.jpg', '<li>1 giường King</li> <li>Khu vực sinh hoạt riêng</li> <li>Tầng cao và Minibar</li> <li>Bồn tắm thủy lực toàn cảnh biển</li>\r\n<li>Tầm nhìn trực diện hướng biển</li>', '4800'), (NULL, 'Phòng Executive Suite Đặc Biệt', 'assets/images/rooms/room14/1.jpg', 'assets/images/rooms/room14/2.jpg', 'assets/images/rooms/room14/3.jpg', '<li>1 giường King</li>\r\n<li>Hồ bơi riêng</li>\r\n<li>Khung cảnh núi và biển</li>\r\n<li>Nội thất tiện nghi</li>\r\n<li>Ban công rộng và tiện nghi</li>\r\n', '5500'), (NULL, 'Phòng Club Suite Kiểu Mới', 'assets/images/rooms/room15/1.jpg', 'assets/images/rooms/room15/2.jpg', 'assets/images/rooms/room15/3.jpg', '<li>2 giường King</li>\r\n<li>Phòng tắm sang trọng nhìn ra biển</li>\r\n<li>Hướng phòng khung cảnh biển</li>\r\n<li>Ban công đầy đủ tiện nghi</li>\r\n<li>Minibar dự trữ</li>\r\n \r\n \r\n ', '6000'), (NULL, 'Phòng Deluxe Ocean Plus Sang Trọng', 'assets/images/rooms/room16/1.jpg', 'assets/images/rooms/room16/2.jpg', 'assets/images/rooms/room16/3.jpg', '<li>1 giường King</li>\r\n<li>Thiết kế tiện nghi</li>\r\n<li>Bồn tắm và buồng tắm đứng riêng biệt</li>\r\n<li>Khu vực tiếp khách rộng rãi</li>\r\n<li>Hướng biển và bể bơi riêng ngoài trời</li>\r\n', '5990'), (NULL, 'Phòng Junior Suite Queen', 'assets/images/rooms/room17/1.jpg', 'assets/images/rooms/room17/2.jpg', 'assets/images/rooms/room17/3.jpg', '<li>2 Giường Queen</li>\r\n<li>Có khu vực làm việc riêng</li>\r\n<li>Đầy đủ tiện nghi</li> <li>Bồn tắm to hiện đại</li>\r\n<li>Khu vực ban công đầy đủ tiện nghi</li> ', '4500'), (NULL, 'Phòng Imperial Suite Thượng Hạng', 'assets/images/rooms/room18/1.jpg', 'assets/images/rooms/room18/2.jpg', 'assets/images/rooms/room18/3.jpg', '<li>1 giường Super King</li>\r\n<li>Thiết kế sang trọng, đỉnh cao</li>\r\n<li>Phòng tắm thượng hạng, đầy đủ tiện nghi</li>\r\n<li>Khu vực tiếp khách rộng rãi</li>\r\n<li>Phòng riêng tư và an toàn tối đa</li>\r\n', '17000'), (NULL, 'Phòng Executive Governor Suite ', 'assets/images/rooms/room19/1.jpg', 'assets/images/rooms/room19/2.jpg', 'assets/images/rooms/room19/3.jpg', '<li>1 giường King</li>\r\n<li>Khu vực phòng ngủ khung hướng ánh sáng</li>\r\n<li>Phòng tắm thượng hạng, đầy đủ tiện nghi</li>\r\n<li>Khu vực tiếp khách rộng rãi</li>\r\n<li>Phòng riêng tư và an toàn tối đa</li>\r\n', '13000'), (NULL, 'Phòng Executive Premium Đặc Biệt', 'assets/images/rooms/room20/1.jpg', 'assets/images/rooms/room20/2.jpg', 'assets/images/rooms/room20/3.jpg', '<li>1 giường King</li> <li>Khu vực sinh hoạt riêng</li> <li>Tầng cao và Minibar</li> <li>Bồn tắm thủy lực toàn cảnh biển</li>\r\n<li>Tầm nhìn hướng biển</li>', '8800');

INSERT INTO `bookroom` (`maphong`, `checkin`, `checkout`) VALUES (NULL, '2022-12-18', '2022-12-20'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01'), (NULL, '2022-01-01', '2022-01-01');

INSERT INTO `manageroom` (`id`, `idroom`, `roomname`, `total`) VALUES (NULL, '1', 'Phòng Ngủ Trên Đá Ven Biển', '11600000');