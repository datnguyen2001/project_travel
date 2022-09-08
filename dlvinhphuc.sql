-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 08, 2022 lúc 01:29 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dlvinhphuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `app_describe`
--

CREATE TABLE `app_describe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `app_describe`
--

INSERT INTO `app_describe` (`id`, `title`, `content`, `display`, `src`, `index`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor 1', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain.', 1, 'upload/room_hotel/img/4WuaPlR6KHdOBDMy0XBI0401fxPSyl46ZPDtwZIn.svg', 1, '2022-07-10 18:42:21', '2022-07-10 18:42:21'),
(3, 'Lorem ipsum dolor 2', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain. aggra 4q  a', 1, 'upload/room_hotel/img/iRv93xIh8nFf41C7gI5j5KEQ81QR66r3H3zYq2ld.svg', 2, '2022-07-10 18:42:45', '2022-07-10 18:42:45'),
(4, 'Lorem ipsum dolor 3', 'Lorem ipsum dolor 3Lorem ipsum dolor 3Lorem ipsum dolor 3Lorem ipsum dolor 3Lorem ipsum dolor 3Lorem ipsum dolor 3Lorem ipsum dolor 3', 1, 'upload/banner/img/PIhfTI00ImIZZllxNxhDP7nWAr7VBHOYmCeRXbVq.svg', 3, '2022-07-10 18:43:12', '2022-07-10 18:43:12'),
(5, 'Lorem ipsum dolor 4', 'Lorem ipsum dolor 4Lorem ipsum dolor 4Lorem ipsum dolor 4Lorem ipsum dolor 4Lorem ipsum dolor 4Lorem ipsum dolor 4Lorem ipsum dolor 4', 1, 'upload/banner/img/95m1ltZ7GbKxfVq1q4Fgw49WPbsmcq3Ec9yfQq9M.svg', 4, '2022-07-10 18:43:35', '2022-07-10 18:43:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles_review`
--

CREATE TABLE `articles_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_video` int(11) NOT NULL DEFAULT '1' COMMENT '1: img; 2: video',
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL DEFAULT '1' COMMENT '1: du lich; 2: booking; 3:am thuc; 4: gian hang',
  `img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_1` longtext COLLATE utf8mb4_unicode_ci,
  `img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_2` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_video` longtext COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `rating` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles_review`
--

INSERT INTO `articles_review` (`id`, `title`, `slug`, `content`, `banner`, `is_video`, `category_id`, `category_name`, `category`, `img_1`, `content_1`, `img_2`, `content_2`, `description`, `video`, `content_video`, `author`, `display`, `rating`, `created_at`, `updated_at`, `src`) VALUES
(1, 'African Nation Are Strugling To Save Their Wildlife', 'african-nation-are-strugling-to-save-their-wildlife', 'Ahen an unknown printer took a galley of type and their scrambled imaketype specimen book has follorrvived not only fiver centuriewhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting, remaining essentially unchanged.\r\nAhen an unknown printer took a galley of type and their scrambled imaketype specimen book has follorrvived not only fiver centuriewhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting, remaining essentially unchanged.', 'upload/travel/articles/img/fkhuN8x9oDM2YUOTJ1TYJufXa4ZbYiUIVU4OTbL4.png', 1, 3, 'Nghỉ dưỡng', 1, 'upload/travel/articles/img/gj1ZotHQEkVivzXIoqx4hFPZXSBRtCNIwLeKE1XY.png', '<h1>Volutpat et et et semper sit.</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non amet, aliquet diam urna pharetra lobortis eget. Accumsan cursus in libero, ultricies nec. Nulla aenean volutpat faucibus aliquam sollicitudin malesuada fringilla. Et vitae risus cursus consectetur aliquet urna consectetur. Accumsan sagittis elit aenean eget. Commodo massa vestibulum arcu maecenas. Risus blandit pellentesque enim in porttitor a, viverra.<br />Aliquam volutpat sit at venenatis, sed et. A tristique cras faucibus et eu, convallis. A consectetur vestibulum, lobortis morbi pharetra, ac ornare risus arcu. Dictum massa ipsum faucibus nullam dui tortor pellentesque. Morbi ut eget id tempor faucibus porttitor nunc. Pretium, consectetur ultrices dictum nunc, adipiscing fringilla a mi. Non potenti sit varius mauris, magna sed eleifend sagittis. Erat molestie interdum volutpat, dui duis magna proin in adipiscing.<br />Sodales nunc nulla feugiat lectus diam.</p>', 'upload/travel/articles/img/61s371euzOJk1yuyatvGMwgpNMMrnJNJhUJl4CpM.png', '<h1>Middle Post Heading</h1>\r\n<p>Our should never complain, complaining is a weak emotion, you got life, we breathing, we blessed. Surround yourself with angels. They never said winning was easy. Some people can&rsquo;t handle success, I can. Look at the sunset, life is amazing, life is beautiful, life is what A federal government initiated report conducted by the.</p>\r\n<p>&nbsp;</p>\r\n<p>Prom should never complain, complaining is a weak emoti you got life, we breathing, we blessed. Surround yourself with an gels. They never said winning Prom should never complain. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non amet, aliquet diam urna pharetra lobortis eget. Accumsan cursus in libero, ultricies nec. Nulla aenean volutpat faucibus aliquam sollicitudin malesuada fringilla.&nbsp;</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non amet, aliquet diam urna pharetra lobortis eget. Accumsan cursus in libero, ultricies nec. Nulla aenean volutpat faucibus aliquam sollicitudin malesuada fringilla. Et vitae risus cursus consectetur aliquet urna consectetur. Accumsan sagittis elit aenean eget. Commodo massa vestibulum arcu maecenas. Risus blandit pellentesque enim in porttitor a, viverra.<br />Aliquam volutpat sit at venenatis, sed et. A tristique cras faucibus et eu, convallis. A consectetur vestibulum, lobortis morbi pharetra, ac ornare risus arcu. Dictum massa ipsum faucibus nullam dui tortor pellentesque. Morbi ut eget id tempor faucibus porttitor nunc. Pretium, consectetur ultrices dictum nunc, adipiscing fringilla a mi. Non potenti sit varius mauris, magna sed eleifend sagittis. Erat molestie interdum volutpat, dui duis magna proin in adipiscing.<br />Sodales nunc nulla feugiat lectus diam. Commodo, turpis orci molestie velit porttitor leo. Nunc proin sed augue sagittis, non vestibulum ipsum amet posuere. Posuere vel, tincidunt ac sit tincidunt id sollicitudin pellentesque aliquet. Diam aliquam facilisi a et. Egestas at nunc mattis nam.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non amet, aliquet diam urna pharetra lobortis eget. Accumsan cursus in libero, ultricies nec. Nulla aenean volutpat faucibus aliquam sollicitudin malesuada fringilla. Et vitae risus cursus consectetur aliquet urna consectetur. Accumsan sagittis elit aenean eget. Commodo massa vestibulum arcu maecenas. Risus blandit pellentesque enim in porttitor a, viverra.<br />Aliquam volutpat sit at venenatis, sed et.</p>', 'upload/travel/articles/video-review/YJGSantjbhZsSfEjxvdp9FXsiBwIkFHHNDmSu5Y3.mp4', NULL, 'jack tran', 1, 5, '2022-06-16 01:30:39', '2022-08-02 01:59:59', 'upload/travel/articles/img/pifVQ7Fv76zNtkrPNzRYX1cDdmN80DXYtuw0caQP.jpg'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.aaqqaaaa', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elitaaqqaaaa', 'Ahen an unknown printer took a galley of type and their scrambled imaketype specimen book has follorrvived not only fiver centuriewhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting, remaining essentially unchanged.aaaaaaqqaa', 'upload/travel/articles/img/qKo7HamFp3LSVKN1z7MHkKMg21ANHzM1UPjIBJmg.png', 1, 4, 'Vui chơi', 1, 'upload/travel/articles/img/cFrhuClufRYEZVPjHtHzmqy8R7VlYaPBieqXPYAP.png', '<h2>Volutpat et et et semper sit.</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non amet, aliquet diam urna pharetra lobortis eget. Accumsan cursus in libero, ultricies nec. Nulla aenean volutpat faucibus aliquam sollicitudin malesuada fringilla. Et vitae risus cursus consectetur aliquet urna consectetur. Accumsan sagittis elit aenean eget. Commodo massa vestibulum arcu maecenas. Risus blandit pellentesque enim in porttitor a, viverra.<br />Aliquam volutpat sit at venenatis, sed et. A tristique cras faucibus et eu, convallis. A consectetur vestibulum, lobortis morbi pharetra, ac ornare risus arcu. Dictum massa ipsum faucibus nullam dui tortor pellentesque. Morbi ut eget id tempor faucibus porttitor nunc. Pretium, consectetur ultrices dictum nunc, adipiscing fringilla a mi. Non potenti sit varius mauris, magna sed eleifend sagittis. Erat molestie interdum volutpat, dui duis magna proin in adipiscing.<br />Sodales nunc nulla feugiat lectus diam. Commodo, turpis orci molestie velit porttitor leo. Nunc proin sed augue sagittis, non vestibulum ipsum amet posuere. Posuere vel, tincidunt ac sit tincidunt id sollicitudin pellentesque aliquet. Diam aliquam facilisi a et. Egestas at nunc mattis nam.qqqqq</p>', 'upload/travel/articles/img/30GGE7E51yzBf69SLNpsAxeGo8NAEPsR5zywh0xF.png', '<h2>Volutpat et et et semper sit.</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non amet, aliquet diam urna pharetra lobortis eget. Accumsan cursus in libero, ultricies nec. Nulla aenean volutpat faucibus aliquam sollicitudin malesuada fringilla. Et vitae risus cursus consectetur aliquet urna consectetur. Accumsan sagittis elit aenean eget. Commodo massa vestibulum arcu maecenas. Risus blandit pellentesque enim in porttitor a, viverra.<br />Aliquam volutpat sit at venenatis, sed et. A tristique cras faucibus et eu, convallis. A consectetur vestibulum, lobortis morbi pharetra, ac ornare risus arcu. Dictum massa ipsum faucibus nullam dui tortor pellentesque. Morbi ut eget id tempor faucibus porttitor nunc. Pretium, consectetur ultrices dictum nunc, adipiscing fringilla a mi. Non potenti sit varius mauris, magna sed eleifend sagittis. Erat molestie interdum volutpat, dui duis magna proin in adipiscing.<br />Sodales nunc nulla feugiat lectus diam. Commodo, turpis orci molestie velit porttitor leo. Nunc proin sed augue sagittis, non vestibulum ipsum amet posuere. Posuere vel, tincidunt ac sit tincidunt id sollicitudin pellentesque aliquet. Diam aliquam facilisi a et. Egestas at nunc mattis nam.qqqqqqqq</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non amet, aliquet diam urna pharetra lobortis eget. Accumsan cursus in libero, ultricies nec. Nulla aenean volutpat faucibus aliquam sollicitudin malesuada fringilla. Et vitae risus cursus consectetur aliquet urna consectetur. Accumsan sagittis elit aenean eget. Commodo massa vestibulum arcu maecenas. Risus blandit pellentesque enim in porttitor a, viverra.<br />Aliquam volutpat sit at venenatis, sed et. A tristique cras faucibus et eu, convallis. A consectetur vestibulum, lobortis morbi pharetra, ac ornare risus arcu. Dictum massa ipsum faucibus nullam dui tortor pellentesque. Morbi ut eget id tempor faucibus porttitor nunc. Pretium, consectetur ultrices dictum nunc, adipiscing fringilla a mi. Non potenti sit varius mauris, magna sed eleifend sagittis. Erat molestie interdum volutpat, dui duis magna proin in adipiscing.<br />Sodales nunc nulla feugiat lectus diam. Commodo, turpis orci molestie velit porttitor leo. Nunc proin sed augue sagittis, non vestibulum ipsum amet posuere. Posuere vel, tincidunt ac sit tincidunt id sollicitudin pellentesque aliquet. Diam aliquam facilisi a et. Egestas at nunc mattis nam.aaaqqqa</p>', 'upload/travel/articles/video-review/8OzMwQHM9sCB0KsjjrGtE5khYWfiSrgwZ8vtaZzu.mp4', '<p>hanfasdadasdsasaaaaaaaqqqqqaaaaaa</p>', 'Đông Alex', 1, 4.5, '2022-06-16 01:34:23', '2022-08-31 21:44:29', 'upload/travel/articles/img/i1y8aGpB22fo0k5q9RhoIicNXGQJPPBYLVFCRynB.png'),
(3, 'Flamingo Dai Lai ResortFlamingo Dai Lai ResortFlamingo Dai Lai Resort', 'flamingo-dai-lai-resortflamingo-dai-lai-resortflamingo-dai-lai-resort', 'Lorem ipsum dolor , consectetur adipiscing elit.Flamingo Dai Lai ResortFlamingo Dai Lai ResortFlamingo Dai Lai Resort', 'upload/travel/articles/img/uBD2eIwqMGWMgMXu9oCAZrODo9qrQ5pRIdyN2pWC.jpg', 1, 1, 'Nhà nghỉ', 2, 'upload/travel/articles/img/rDli6GhlmXKIGkDYcIeXFPVC4FiLWNtRFXlMJTqD.jpg', '<p>Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.</p>\r\n<div class=\"ddict_btn\" style=\"top: 28px; left: 265.163px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/travel/articles/img/qMOtTYNLhlhOOzlTwMb5QHlZMBmVGgX8nUswmpbc.jpg', '<p>Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.</p>\r\n<div class=\"ddict_btn\" style=\"top: 19px; left: 226.238px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<p>Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.</p>\r\n<div class=\"ddict_btn\" style=\"top: 24px; left: 166.175px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/travel/articles/video-review/sPLn14ulXHYM6DruE7g9hzWcICf0YMX18pmkWZaK.mp4', '<p>Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.</p>\r\n<div class=\"ddict_btn\" style=\"top: 25px; left: 202.875px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'asd', 1, 5, '2022-07-06 20:09:11', '2022-08-02 01:36:00', 'upload/travel/articles/img/G4nZwOX9cJzl8CH9zVRYo0nH5BxNwCWPUrPPlLbA.png'),
(4, 'aaaaaaaaaaMón ăn ngon toàn ở đây thôiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'aaaaaaaaaamon-an-ngon-toan-o-day-thoiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'aaaMón ăn ngon toàn ở đây thôiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiMón ăn ngon toàn ở đây thôiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'upload/travel/articles/img/bzVbI2BdOjanqCvb96ncM8FOzg8M8J2FPpfWOVQc.png', 1, 1, 'BBQ', 3, 'upload/travel/articles/img/7xI8Tbpo7r2PTBRqvy0X2yqXv4xUuEyTpNIkDTlb.png', '<p>aaaaaaaaaaaaaaaaaM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>', 'upload/travel/articles/img/jPDnLQgmxMrlFtmEbSwq6olx5dofVNHnWoEZgRbu.png', '<p>aaaaaaaaaaaaaaaaaaaaaaaM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>', '<p>aaaaaaaaaaaaaaaaaM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>', 'upload/travel/articles/video-review/Sm3OcmmhCqhA41pWaT8lhqcixWLKvaW1YdWTn3rB.mp4', '<p>aaaaaaaaaaaaaaaaaaaM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiv</p>', 'asd', 1, 5, '2022-07-06 21:24:23', '2022-08-02 00:16:04', 'upload/travel/articles/img/JQkpM6inWaCCh16g6b7rWn3cNnezh9RorxXGucbs.jpg'),
(5, 'akakakaka', 'akakakaka', 'aaaa', 'upload/travel/articles/img/ZANDPzqTHOpuD8e9Xn0cr71bPMtrzlFddLtd8vkK.png', 1, 1, 'Du lịch', 4, 'upload/travel/articles/img/Xdb7VEfdZB4ul71Yzzry4wr599clwHFbL1GpdXo9.jpg', '<p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/travel/articles/img/O9DxCKrEevMmKzItJBjMbZbWbMkfJHeHMP1OXcdX.png', '<p>aaaaaaaaaaaaaaaaaa</p>', '<p>aaaaaaaaaaaaaaaaaaa</p>', 'upload/travel/articles/video-review/Q3tTrO61Q6fIm5FErANq399q5VcAMFnZ7UODRnWu.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'asd', 1, 5, '2022-07-07 00:05:59', '2022-08-02 02:43:47', 'upload/travel/articles/img/skNHEx6oe70gqXEXmV0lWPcW6CXVD03B96KsshUz.jpg'),
(6, 'Deluxe Sky Residence King 1 Phòng Ngủ', 'deluxe-sky-residence-king-1-phong-ngu', 'Deluxe Sky Residence King 1 Phòng NgủDeluxe Sky Residence King 1 Phòng NgủDeluxe Sky Residence King 1 Phòng NgủDeluxe Sky Residence King 1 Phòng Ngủ', 'upload/travel/articles/img/aaZVLygV6LrQMRdybubt1pI9w6queEmvjeByw7g9.png', 1, 1, 'Nhà nghỉ', 2, 'upload/travel/articles/img/qSLvpP0SG52mlppwaesxEMnj6jwe4C8oFscjnOlB.png', '<p>Deluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng Ngủ</p>', 'upload/travel/articles/img/42AwBAduxA1nBZGBF392WafRdQAqYDZBNz9aMsSs.png', '<p>Deluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng Ngủ</p>', '<p>Deluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng Ngủ</p>', 'upload/travel/articles/video-review/4AKtxiMOlO5FwmHB4jbwvZsorWOLujLkmncjwtLR.mp4', '<p>Deluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng NgủDeluxe Sky Residence King 1 Ph&ograve;ng Ngủ</p>', 'a', 1, 5, '2022-07-07 02:41:58', '2022-08-02 01:35:45', 'upload/travel/articles/img/3AQXc341i3ztp3W2vEHxn5fFKZCminWTS2842Ln0.png'),
(7, 'Hàng tốtt okokokokok ok ok ok ok ok ok', 'hang-tott-okokokokok-ok-ok-ok-ok-ok-ok', 'Hàng tốtttttttttt ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok', 'upload/travel/articles/img/oKW6V8vdUxIRzeFnPvc0pPdOFRc9B55CX9DMS6vR.png', 1, 1, 'Du lịch', 4, 'upload/travel/articles/img/TzHkln7sAxu9acPNUc0q7So6fnp0g88janbHAGT7.jpg', '<p>H&agrave;&nbsp; H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok</p>', 'upload/travel/articles/img/y9As9Eb2137WwiY3n62CcWQXIN83Utt2YvJ0ZUcQ.jpg', '<p>H&agrave;ng tốt ok ok ok ok ok ok ok ok ok ok ok ok ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok</p>', '<p>H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok</p>', 'upload/travel/articles/video-review/BruVn8r01s6pKPCSO6q3eVBQRECFtYaDbAujm2Cd.mp4', '<p>H&agrave;ng tốt ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok ok&nbsp; H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok H&agrave;ng ok</p>', 'Khoa Pug', 1, 5, '2022-07-12 20:56:13', '2022-08-02 02:43:33', 'upload/travel/articles/img/lzZVRJbKwzY7Xd4MaGyMOHcrQZDGTx3ujW4QvDil.jpg'),
(8, 'Tam Đảo', 'tam-dao', 'Vui vẻ eeeeeee eeeeeeeee eeeeeeee eeeee eeeee eee ee a a a a a a a a â a  â', 'upload/travel/articles/img/dLMzCPzgrXrnUfLGinZBgf12e7u6zFAiGVO5DbTy.png', 1, 4, 'Tam Đảo', 5, 'upload/travel/articles/img/9K7LatRv0MyWQZahs4Mzl86I7qD0EfpLKJCfB8ml.jpg', '<p>Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.</p>\r\n<div class=\"ddict_btn\" style=\"top: 49px; left: 397.525px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/travel/articles/img/4G8AHuT6khTJe3ZWErLgMBW9yEFlCryB3GOgNooB.png', '<p>Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.</p>\r\n<div class=\"ddict_btn\" style=\"top: 36px; left: 218.45px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<p>Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.</p>', 'upload/travel/articles/video-review/ridDhuMhgL6K4BaPWucn0r6YRJqZ76T3iYtJn9dL.mp4', '<p>Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.Trong 3 chiến sĩ hy sinh khi đang l&agrave;m nhiệm vụ chữa ch&aacute;y, Trung t&aacute; Đặng Anh Qu&acirc;n c&oacute; gia cảnh &eacute;o le, binh nh&igrave; Nguyễn Đ&igrave;nh Ph&uacute;c l&agrave; người học giỏi, bảo lưu kết quả đại học để thực hiện nghĩa vụ c&ocirc;ng an.</p>\r\n<div class=\"ddict_btn\" style=\"top: 64px; left: 444.238px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'Khoa Pug', 1, 5, '2022-07-13 21:43:52', '2022-08-02 03:29:10', 'upload/travel/articles/img/VfxHuTNH4k5fIqbsb9ce5z2OapaCjjFsRUVLuA65.jpg'),
(13, 'aadadaaa bbbbbbbbb', 'aadadaaa-bbbbbbbbb', 'adad', 'upload/travel/articles/img/AdDdFacMK4xvimUjHX98ijKt815XvfoTQtPFdbuf.png', 1, 1, 'Nhà nghỉ', 2, 'upload/travel/articles/img/TDExdHm82poc11co98aWk247ERrIT9HcDy7vnD8u.png', '<p>aaaaaa</p>', 'upload/travel/articles/img/KBxC0YxjxNqEOwavzV9sNoycQnHp1v9k5JrT7bZe.png', '<p>aaaaaaaaaa</p>', '<p>aaaaaaaaaaaaa</p>', 'upload/travel/articles/video-review/IOZCCPvIoFQzzLIWHS5yqPFLGEBnP8rrIaHsCV19.mp4', '<p>aaaaaaaaaaaaaaaa</p>', 'Khoa Pug', 1, 5, '2022-07-14 02:24:54', '2022-08-31 20:42:13', 'upload/travel/articles/img/M23ZQ3PJlH4hHgkcxmvLV6y3t6uNqYMGKhrpJIJ3.jpg'),
(14, 'a', 'a', 'a', 'upload/travel/articles/img/XYOaKNYLb3ajaX2yj5pfIxCOPxZ0VvXqQcHVXeh7.jpg', 1, 2, 'Đặc sản', 3, 'upload/travel/articles/img/skqUfns4sC1dLDGQhj8acvexmfLOH5LaYTGYyvOS.png', '<p>aa</p>', 'upload/travel/articles/img/iCAjxfWkYCnjtZDiPCwwzpXoBOED2Wrvudf58XWv.png', '<p>aaaaaaaa</p>', '<p>aa</p>', 'upload/travel/articles/video-review/8WM79F8BKMqiGdmyJJ3dSPbN5kBDgwI91LDuzVWK.mp4', '<p>aaaaaaaaaaaaaa</p>', 'Khoa Pug', 1, 5, '2022-07-14 02:27:10', '2022-08-02 00:18:18', 'upload/travel/articles/img/x4k30HeTNv5FjyO5qOg8ANur49xBzYrFi2NZPbSs.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles_tourist`
--

CREATE TABLE `articles_tourist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_video` int(11) NOT NULL DEFAULT '1' COMMENT '1: img; 2: video',
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL DEFAULT '1' COMMENT '1: du lich; 2: booking; 3:am thuc; 4: gian hang',
  `img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_1` longtext COLLATE utf8mb4_unicode_ci,
  `img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_2` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_video` longtext COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `rating` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles_tourist`
--

INSERT INTO `articles_tourist` (`id`, `title`, `slug`, `content`, `banner`, `is_video`, `category_id`, `category_name`, `category`, `img_1`, `content_1`, `img_2`, `content_2`, `description`, `video`, `content_video`, `author`, `display`, `rating`, `created_at`, `updated_at`) VALUES
(3, 'Nha Trang', 'nha-trang', 'Đẹp', 'upload/travel/articles/img/eFFk28VnM1U86XUfQ61Gjh9KDgRkD3YuAMmYR30C.png', 1, 1, 'Nha Trang', 1, 'upload/travel/articles/img/YowQCM3Cfqco91bCbfGtvkNuX131AjLamM1QX48l.png', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/travel/articles/img/X4OZXCesJCRLcSnI7LcyFOnj8UqIacFJwn9DxyQz.jpg', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/travel/articles/video-review/rYKIkJiA0d5cqZiWTRWej0qDkufrRn1B1CRFbuer.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'Khoa Pug', 1, 5.00, '2022-07-13 01:12:43', '2022-07-13 01:12:43'),
(4, 'a', 'a', 'a', 'upload/travel/articles/img/YRRFtui9QXTsIPfnRkBkwFGXzQBUXWUUbcW6Akb0.png', 1, 1, 'Nha Trang', 1, 'upload/travel/articles/img/TpzLA9qd7yQmPOFjjTVxKx5CzRkqwp5nRXKYwbzH.png', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/travel/articles/img/ATlknNvexx5InHW6vAlHhwxUZ0ArT2Km6Z03HYvq.png', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', '<p>aaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/travel/articles/video-review/iz2OkGQvNkKdo0xoISohr21mfWJ33O5Dyazn7rEc.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'Khoa Pug', 1, 5.00, '2022-07-13 01:14:15', '2022-07-13 01:14:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` int(11) NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1:img, 2:video',
  `category` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `title`, `content`, `link`, `index`, `display`, `src`, `type`, `category`, `created_at`, `updated_at`) VALUES
(3, 'Flamingo Đại Lải Resort 2', 'Triết lí xanh trong thiết kế biệt thự', 'https://www.youtube.com/watch?v=itfWRlMhEao', 1, 1, 'upload/banner/img/6MVzBSsumzWKDW1obgPqwhWzMq9YdnL09f9sS8E7.jpg', 1, NULL, '2022-05-27 19:52:21', '2022-07-14 20:29:15'),
(5, 'Flamingo Đại Lải Resort', 'Triết lí xanh trong thiết kế biệt thự', 'https://www.youtube.com/watch?v=itfWRlMhEao', 2, 1, 'upload/banner/video/R2djuXFYOrrTY0fiJPAkkFdx474KhdCkMr38AlSB.mp4', 2, NULL, '2022-05-27 21:42:58', '2022-05-27 21:44:49'),
(6, 'Du lịch Tây Thiên', 'Vùng đất tâm linh thanh bình', 'https://www.youtube.com/watch?v=itfWRlMhEao', 3, 1, 'upload/banner/img/OWbzxHQ8haAlRXcAKAjhWIIVWs04bHAySo042Vub.jpg', 1, NULL, '2022-07-14 20:20:59', '2022-07-14 20:29:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_app`
--

CREATE TABLE `banner_app` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner_app`
--

INSERT INTO `banner_app` (`id`, `src`, `created_at`, `updated_at`) VALUES
(4, 'upload/room_hotel/img/UynEvDB9Hl5Cbllhxnuvbt8zcJO1nKD9d2sr8OYT.png', '2022-07-08 22:02:50', '2022-07-08 22:02:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_description`
--

CREATE TABLE `banner_description` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner_description`
--

INSERT INTO `banner_description` (`id`, `title`, `content`, `display`, `index`, `src`, `created_at`, `updated_at`) VALUES
(1, 'Có gì trong ứng dụng', 'But I must explain to you how all this mistakádfghjklppyttdddddddddddddddddddddddddđ', 1, 1, 'upload/banner/img/ESehuEPYcOdBEy5XMCpXsfWFIjbe7eZ2mJ3Bmks1.png', '2022-07-11 00:49:23', '2022-07-11 00:49:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_room`
--

CREATE TABLE `book_room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `name_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_room`
--

INSERT INTO `book_room` (`id`, `name_customer`, `phone_customer`, `email_customer`, `room_id`, `name_room`, `name_hotel`, `phone_hotel`, `status`, `type`, `content`, `created_at`, `updated_at`) VALUES
(1, 'ggg', '0897876994', 'nguyendatdz001@gmail.com', NULL, NULL, '5ka', '0978129116', 0, 0, NULL, '2022-07-14 01:23:47', '2022-07-14 01:23:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booth`
--

CREATE TABLE `booth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_booth` int(11) DEFAULT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_active` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `price_2` int(11) NOT NULL,
  `ratings` double(8,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1: Top dac san; 2: An gi',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booth`
--

INSERT INTO `booth` (`id`, `name`, `slug`, `content`, `banner`, `description`, `video_review`, `menu`, `category_booth`, `name_category`, `video_active`, `is_active`, `price`, `price_2`, `ratings`, `created_by`, `type`, `address`, `map`, `lat`, `lng`, `created_at`, `updated_at`, `src`) VALUES
(1, 'gà ok', 'ga-ok', 'ngon ok', 'upload/booth/img/qPiF93iMijcktruMnM8j92cewxe1wd6jmDmFOPht.png', '<p><strong>Đặc biệt, Hoa hậu Huỳnh Nguyễn Mai Phương </strong></p>\r\n<p>1) đ&atilde; ghi điểm bằng sự tinh tế khi nhận được những c&acirc;u hỏi về việc được ưu &aacute;i do đ&atilde; từng được tạo điều kiện tham gia nhiều hoạt động từ thiện c&ugrave;ng c&ocirc;ng ty Sen V&agrave;ng - đơn vị tổ chức Miss World Vietnam 2022.</p>\r\n<h3 style=\"text-align: left;\"><span style=\"font-family: \'times new roman\', times, serif;\">Mai Phương chia sẻ c&ocirc; cảm thấy đ&acirc;y kh&ocirc;ng phải l&agrave; một sự ưu &aacute;i m&agrave; ch&iacute;nh l&agrave; may mắn của c&ocirc; khi được nhận danh hiệu Người đẹp Nh&acirc;n &aacute;i v&agrave; được đi theo một ban tổ chức c&oacute; tầm, c&oacute; quy m&ocirc; để c&oacute; điều kiện gi&uacute;p đỡ nhiều ho&agrave;n cảnh kh&oacute; khăn hơn.</span></h3>\r\n<p>\"Khi tham gia c&aacute;c cuộc thi, ch&uacute;ng ta như nhau, kh&ocirc;ng ai được ưu &aacute;i hơn ai v&agrave; mỗi danh hiệu ch&uacute;ng ta đạt được đều l&agrave; sự nỗ lực của mỗi người. Mai Phương rất tự h&agrave;o v&igrave; sự nỗ lực của m&igrave;nh v&agrave; mong kh&aacute;n giả h&atilde;y c&oacute; c&aacute;i nh&igrave;n c&ocirc;ng t&acirc;m\" - c&ocirc; cho biết.</p>\r\n<p><strong>C&ocirc; cũng khẳng định:</strong></p>\r\n<p>\"Mai Phương l&agrave; người rất lỳ, c&oacute; sức bền v&agrave; lu&ocirc;n biết những điều m&igrave;nh thiếu để b&ugrave; đắp n&oacute; v&agrave; khiến cho những cố gắng của m&igrave;nh trở n&ecirc;n thuyết phục hơn. Dấu mốc đăng quang Miss World Vietnam 2022 chỉ l&agrave; một c&aacute;nh cửa mở đầu. Mai Phương rất vui khi nh&igrave;n thấy sự chấp nhận d&aacute;m đương đầu với thử th&aacute;ch của ch&iacute;nh m&igrave;nh. Sau đ&acirc;y sẽ l&agrave; một qu&atilde;ng đường rất d&agrave;i nữa để Mai Phương phấn đấu\".</p>\r\n<p><em>Người đẹp cũng chia sẻ</em> c&ocirc; rất biết ơn mẹ đ&atilde; lu&ocirc;n đồng h&agrave;nh v&agrave; ủng hộ m&igrave;nh. Do tự lập từ rất sớm n&ecirc;n Mai Phương đ&atilde; đi xa gia đ&igrave;nh v&agrave; c&ocirc; muốn b&ugrave; đắp cho mẹ bằng việc cố gắng trở về nh&agrave; thường xuy&ecirc;n hơn để ăn cơm c&ugrave;ng bố mẹ.</p>\r\n<p>3)Khi được hỏi về việc l&agrave;m thế n&agrave;o để toả s&aacute;ng v&agrave; kh&ocirc;ng bị lu mờ trước d&agrave;n Hoa hậu kh&aacute;c, người đẹp tự tin khẳng định: \"M&igrave;nh cứ l&agrave; ch&iacute;nh m&igrave;nh v&agrave; nỗ lực hết m&igrave;nh. Trong một vườn hoa, sẽ c&oacute; b&ocirc;ng to, b&ocirc;ng nhỏ, b&ocirc;ng xanh, b&ocirc;ng đỏ. Điều kh&aacute;c biệt đ&oacute; l&agrave; quyết t&acirc;m của m&igrave;nh đến đ&acirc;u v&agrave; đ&oacute; l&agrave; c&aacute;ch m&agrave; Mai Phương sẽ thể hiện khi s&aacute;nh vai c&ugrave;ng c&aacute;c c&ocirc; g&aacute;i kh&aacute;c\".</p>\r\n<p>Huỳnh Nguyễn Mai Phương sinh năm 1999 đến từ Đồng Nai. C&ocirc; cao 1m70, số đo ba v&ograve;ng 77-62-90. C&ocirc; từng đăng quang Hoa kh&ocirc;i Đại học Đồng Nai 2018, v&agrave;o top 5 Hoa hậu Việt Nam 2020.</p>\r\n<p>Tuy kh&ocirc;ng c&oacute; chiều cao</p>\r\n<p>4)qu&aacute; nổi trội nhưng b&ugrave; lại người đẹp sở hữu một profile \"đỉnh của ch&oacute;p\" khiến c&ocirc;ng ch&uacute;ng phải gật đầu t&aacute;n thưởng. Thời c&ograve;n học phổ th&ocirc;ng, Mai Phương đoạt giải Nh&igrave; (2017) v&agrave; giải Ba (2018) kỳ thi học sinh giỏi tiếng Anh cấp tỉnh. Hồi th&aacute;ng 4, c&ocirc; đạt 8.0 IELTS. C&ocirc; hiện l&agrave;m việc trong ng&agrave;nh truyền h&igrave;nh v&agrave; l&agrave; MC nhiều chương tr&igrave;nh, sự kiện.</p>\r\n<p>Hoa hậu c&oacute; nhiều t&agrave;i lẻ như chơi piano, guitar, ca h&aacute;t. Trước khi đăng quang Hoa hậu Thế giới Việt Nam tối 12/8, c&ocirc; thắng giải Người đẹp T&agrave;i năng, Queen Talk - Thử th&aacute;ch tiếng Anh v&agrave; v&agrave;o top nhiều phần thi phụ như: Người đẹp Nh&acirc;n &aacute;i, Người đẹp Thời trang, Người đẹp Du lịch, Ấn tượng v&ograve;ng gặp mặt, Người đẹp Thể thao.</p>\r\n<div class=\"ddict_btn\" style=\"top: 252px; left: 653.15px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/booth/review/88L2knzjkGNE4iJ8a09qwUO7uifA1CNzBWeRp138.mp4', NULL, 1, 'Du lịch', 0, 1, 80000, 150000, 4.00, 1, 1, 'Hà Nội', '20.971464467518082, 105.82796871048515', NULL, NULL, '2022-07-05 00:33:21', '2022-08-14 07:33:57', 'upload/travel/articles/img/moAn4AwYBRDSm4mVswrvrsbI1dKVqXtgAIgYr8Og.jpg'),
(2, 'aaaaaaaaaaaa bbbb b b b b b b b b b b b b  b b b b b b', 'aaaaaaaaaaaa-bbbb-b-b-b-b-b-b-b-b-b-b-b-b-b-b-b-b-b-b', 'aaaaaaaaaaaa', 'upload/booth/img/Y97vAmFXGpE5hVb43YK05N3iqSEoujlQRX2ZP6Nr.png', '<p>aaaaaaaaaaaaaaaaaaaaabbb</p>', 'upload/booth/review/ONhdbyASVnEpZJkqJc66ZEhapQiF9eh6Iw8vIjp0.mp4', NULL, 1, 'Du lịch', 0, 1, 75000, 150000, 5.00, 1, 2, 'Hà NộiHà NộiHà NộiHà NộiHà Nội', '20.971464467518082, 105.82796871048515', NULL, NULL, '2022-07-06 22:05:31', '2022-08-09 02:28:24', 'upload/travel/articles/img/ay4HlXY6gYezmzNNkZwMJqbaQufqzPhF9oyIZj0o.jpg'),
(3, 'aaabbbb ada ada đa ad ad ad ad a', 'aaabbbb-ada-ada-da-ad-ad-ad-ad-a', 'aaaa', 'upload/booth/img/4Y7TBaEeRcft6L5x0ZyzBrVbAjCqusHGDzpDda7i.png', '<p>aaaaaaaaaaaaaaaaa</p>', 'upload/booth/review/zDrGWbfvjhGGCtkAY0rF4Xv5DBR768Rk64IFDUdX.mp4', NULL, 1, 'Du lịch', 0, 1, 75000, 15000000, 5.00, 1, 1, 'Hà Nội', '20.971464467518082, 105.82796871048515', NULL, NULL, '2022-07-07 00:12:39', '2022-08-02 02:34:16', 'upload/travel/articles/img/hxrj3i0KsfxwwNiJCjUB09577q8dlvJQqL88v1QS.jpg'),
(4, 'Cá thính Lập Thạch', 'ca-thinh-lap-thach', 'Nhắc đến đặc sản Vĩnh Phúc thì không thể không kể đến món cá thính đặc sản Lập Thạch do người dân Văn Quán sáng tạo ra. Nguồn gốc của món ăn này xuất phát từ mùa mưa, nước lũ tràn về trong khoảng thời gian từ tháng 5 đến tháng 10 âm lịch nên người dân có', 'upload/booth/img/mtu2XHmUzrm0SjRkzHXTChSr6wwaRQz1qhAnjXlt.webp', '<div class=\"css-1dbjc4n r-knv0ih\">\r\n<div class=\"css-901oao r-13awgt0 r-1sixt3s r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p>L&acirc;u dần, m&oacute;n c&aacute; th&iacute;nh Lập Thạch đ&atilde; trở th&agrave;nh m&oacute;n ăn đặc sản Vĩnh Ph&uacute;c nổi tiếng trứ danh. Sau khi rửa sạch c&aacute; th&igrave; mổ bỏ ruột, bỏ hết phần m&agrave;ng đen trong bụng c&aacute; rồi chặt v&acirc;y, ướp c&ugrave;ng muối trắng v&agrave; xếp v&agrave;o lọ, n&eacute;n chặt.</p>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-knv0ih\">\r\n<div class=\"css-901oao r-13awgt0 r-1sixt3s r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p>C&aacute; ướp xong th&igrave; vắt hết nước, cho th&iacute;nh ng&ocirc; v&agrave; đậu v&agrave;o bụng cũng như mang c&aacute;, b&oacute;p kỹ, xếp v&agrave;o lọ s&agrave;nh phơi kh&ocirc;. Cứ mỗi lớp c&aacute; lại cho một lớp l&aacute; ổi rồi xếp rơm kh&ocirc; đ&atilde; v&ograve; kỹ, rũ sạch, kh&ocirc;ng c&ograve;n l&aacute; ch&acirc;n l&ecirc;n tr&ecirc;n đầu lọ để ủ trong khoảng 3 th&aacute;ng th&igrave; lấy ra nướng than hoa. Trong thời gian ủ, n&ecirc;n thường xuy&ecirc;n kiểm tra xem rơm c&oacute; bị ướt kh&ocirc;ng. Nếu c&oacute; th&igrave; phải thay ngay để tr&aacute;nh c&aacute; bị hỏng.</p>\r\n</div>\r\n</div>\r\n<div class=\"css-1dbjc4n r-knv0ih\">\r\n<div class=\"css-901oao r-13awgt0 r-1sixt3s r-majxgm r-fdjqy7\" dir=\"auto\">\r\n<p>M&oacute;n <strong>đặc sản Vĩnh Ph&uacute;c</strong> n&agrave;y kh&ocirc;ng kh&ocirc; như c&aacute; mắm biển cũng kh&ocirc;ng bị nh&atilde;o như khi ăn c&aacute; tươi hoặc c&aacute; r&aacute;n n&ecirc;n rất bắt vị. Khi gỡ c&aacute; sẽ thấy thịt c&aacute; c&oacute; m&agrave;u mận ch&iacute;nh. Trong l&uacute;c ăn c&oacute; thể thấy vị c&aacute; ngọt đậm, th&iacute;nh thơm v&agrave; gi&ograve;n sừn sựt lạ miệng.</p>\r\n</div>\r\n</div>', 'upload/booth/review/CpRX4bEKdNr57uR8FtyFfOkIEy763HC0mEep1BKy.mp4', NULL, 2, 'Ẩm thực', 0, 1, 750000, 1500000, 5.00, 1, 2, 'Vĩnh Phúc', '20.971464467518082, 105.82796871048515', NULL, NULL, '2022-07-12 01:06:55', '2022-08-02 02:51:19', 'upload/travel/articles/img/3D3uqbOd1RKu0ihfHrblCelbuCpAVpQyVjxHx52l.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `business_content`
--

CREATE TABLE `business_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `business_content`
--

INSERT INTO `business_content` (`id`, `title`, `content`, `display`, `index`, `src`, `created_at`, `updated_at`) VALUES
(1, 'Kinh doanh dễ dàng hơn với ứng dụng dành cho đối tác', '\"But I must explain toaaaaaaaaaaaaadsdddddddddddddddđaing painI will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.', 1, 1, 'upload/banner/img/tmPztbcmLOHUq83MTjDIXBZ8fmlKhFXzummG5xUr.png', '2022-07-10 20:58:56', '2022-07-10 20:58:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `business_icon`
--

CREATE TABLE `business_icon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `business_icon`
--

INSERT INTO `business_icon` (`id`, `title`, `content`, `display`, `index`, `src`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum 1', 'Lorem ipsum 1', 1, 1, 'upload/banner/img/5taJwDLS9Yf63sb3EnUGx0CBxXNJWTVG4J3NRsoa.svg', '2022-07-10 20:46:27', '2022-07-10 20:46:27'),
(3, 'Lorem ipsum 2', 'Lorem ipsum 2', 1, 2, 'upload/banner/img/bOkFKtIIT62HZnyRdvnNycRLHMG7RfNLSluFUmeU.svg', '2022-07-10 20:46:46', '2022-07-10 20:46:46'),
(4, 'Lorem ipsum 3', 'Lorem ipsum 1', 1, 3, 'upload/banner/img/t7Ia26hBOifc0StcwgjlIVk1KMUBzBHr1yuurYL3.svg', '2022-07-10 20:47:08', '2022-07-10 20:47:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_booking`
--

CREATE TABLE `category_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_booking`
--

INSERT INTO `category_booking` (`id`, `name`, `slug`, `img`, `index`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Nhà nghỉ', 'nha-nghi', 'upload/booking/category/Wf3WOlSFEITJn8YVYANsvYEEOLsvDc6UjCNXJqjy.png', 1, 1, '2022-05-30 21:55:29', '2022-05-30 21:55:29'),
(2, 'Khách sạn', 'khach-san', 'upload/booking/category/VfIYHq8ibWhYmiYgV3Bo2CH4lU9UDSJxdXwRMjES.png', 2, 1, '2022-05-30 21:56:30', '2022-05-30 21:56:30'),
(3, 'Căn hộ', 'can-ho', 'upload/booking/category/8cS9WfKO40SeNhSyqMTr2FYsvdX2Cevq4M8iZ1av.png', 3, 1, '2022-05-30 21:57:09', '2022-05-30 21:57:09'),
(4, 'Resort', 'resort', 'upload/booking/category/0jt9dvONFh7tdoZ4JPje3095B56pUOYghXJ8GGJh.png', 4, 1, '2022-05-30 21:57:37', '2022-05-30 21:57:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_booth`
--

CREATE TABLE `category_booth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_booth`
--

INSERT INTO `category_booth` (`id`, `name`, `img`, `index`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Du lịch', 'upload/booth/category/M9VDo53lrQ4iBMxumM850qVAxw0L7oLmNI73Ji4A.png', 1, 1, '2022-07-05 00:31:17', '2022-07-07 20:25:53'),
(2, 'Ẩm thực', 'upload/booth/category/uJmkc6YlGsZMSJaRUDrwFNXnwnRE4xc5qetnJM9j.jpg', 1, 1, '2022-07-07 20:25:18', '2022-07-07 20:26:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_culinary`
--

CREATE TABLE `category_culinary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_culinary`
--

INSERT INTO `category_culinary` (`id`, `name`, `img`, `index`, `display`, `created_at`, `updated_at`) VALUES
(1, 'BBQ', 'upload/culinary/category/4KqSTUdeP95CRAFiBgFzb5RxJJDsh4W08yViPxHc.png', 1, 1, '2022-05-29 19:18:45', '2022-07-12 20:50:17'),
(2, 'Đặc sản', 'upload/culinary/category/Iyky8zGuPIoOIMsGqdrL3BGNDeUbnUKVa935xMkw.png', 2, 1, '2022-06-15 20:18:39', '2022-06-15 20:18:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_tourism`
--

CREATE TABLE `category_tourism` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_tourism`
--

INSERT INTO `category_tourism` (`id`, `name`, `slug`, `img`, `index`, `display`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Tin tức nổi bật', 'tin-tuc-noi-bat', 'upload/explore_tourism/category/MAkTIptb8GVTKdxffDAnduV2gXWbSj7vqFAF5ArC.png', 1, 1, '2022-06-01 21:51:02', '2022-06-01 22:04:39', 1),
(3, 'Kinh nghiệm du lịch', 'kinh-nghiem-du-lich', 'upload/explore_tourism/category/Y9OfOKE0Bz8k1GAqqwYFE8eWsd6lLXBpe7FbyrLi.png', 2, 1, '2022-06-01 21:59:49', '2022-06-01 21:59:49', 1),
(4, 'Ẩm thực', 'am-thuc', 'upload/explore_tourism/category/y4320TAtSNGQUfN5XjdV48wvxNrf2yFENL82ttWy.jpg', 3, 1, '2022-06-14 20:30:09', '2022-06-14 20:30:09', 2),
(5, 'Booking', 'booking', 'upload/explore_tourism/category/lwFcbHlzPUsGlugDUEFjJpTYv91i3i6UXsc1PC0v.jpg', 4, 1, '2022-06-14 20:30:31', '2022-06-14 20:30:31', 2),
(6, 'Gian Hàng', 'gian-hang', 'upload/explore_tourism/category/YsINBlKZjxBfGI8LhPI05goiEBTwDIAmb0MtlN5O.jpg', 5, 1, '2022-06-14 20:31:00', '2022-06-14 20:31:00', 2),
(7, 'tin tuc', 'tin-tuc', 'upload/explore_tourism/category/sjht0Ve58icIFnVUdZOjnGHpsen9sLjSFGtSd3ht.png', 4, 1, '2022-06-14 21:23:14', '2022-06-14 21:23:14', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_tourist`
--

CREATE TABLE `category_tourist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL DEFAULT '0',
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_tourist`
--

INSERT INTO `category_tourist` (`id`, `title`, `banner`, `display`, `index`, `video`, `created_at`, `updated_at`) VALUES
(1, 'Nha Trang', 'upload/travel/category/jArgxuWcZv8bodBd9GZpik8J43TCvgyO6liWQnUH.jpg', 1, 2, 'upload/travel/category/video/eR51t8VcMbXgCSYUll9dwpHEJm03u57cXyrKVbhr.mp4', '2022-07-13 00:29:51', '2022-07-20 02:38:07'),
(3, 'Vĩnh Phúc', 'upload/travel/category/Pa4WOaYEcaTLoT8zAuOzq4AvvjmlgyC00bSLYTXS.png', 1, 2, 'upload/travel/category/video/Et59TfYYYN92R6XqnpM960QimtSrDGykNaH9GTzK.mp4', '2022-07-13 02:15:03', '2022-07-13 02:15:03'),
(4, 'Tam Đảo', 'upload/travel/category/r7888Qemx1IOAsSdKvzaqPNHyKRlZPDxueoQJize.png', 1, 3, 'upload/travel/category/video/MICErfkTp2XFlC5JMNWq3upbyd1FVhNZb4A1OBUe.mp4', '2022-07-13 02:18:02', '2022-07-13 20:32:15'),
(5, 'Vĩnh yên', 'upload/travel/category/f9OeUIRdq68K4f3zIGVYptHxyP7Vy6YiEsPQWK0P.png', 1, 4, 'upload/travel/category/video/Xg6bBQglXLb0Dnkbin5u67tQSYzf51EHaI1SoMrp.mp4', '2022-07-13 02:18:37', '2022-07-13 02:18:37'),
(6, 'Vĩnh Tường', 'upload/travel/category/Is6XD8Hx4XuOGjnKeVkp6TcinjdmI69SialWiDlg.png', 1, 4, 'upload/travel/category/video/NfC0P1OQj8mE27wAdF0y7bhx1O5bksApxZKjPkQa.mp4', '2022-07-13 02:20:16', '2022-07-13 02:20:16'),
(7, 'Lập Thạch', 'upload/travel/category/OsuM0MPiNn2oaBOD1eAVI8x3l4luJVgHRZzJZPyB.jpg', 1, 5, 'upload/travel/category/video/nRb2IuSVH1vPoCELydcHZBzQW5q43EHN2FdVgknG.mp4', '2022-07-13 02:20:47', '2022-07-13 20:32:35'),
(8, 'Quảng trường', 'upload/travel/category/C2iV2kyFnTmgLcETByan5eqgP1VPCbDRDzN6Roiu.png', 1, 6, 'upload/travel/category/video/mrNVBg2rM3dNBoC1J07tHKwKa89R9tTOunymwoja.mp4', '2022-07-13 02:24:24', '2022-07-13 02:24:24'),
(9, 'Đà Nẵng', 'upload/travel/category/ySDBaKzLODgVBo2aqTe7z4OCH9Db29lnUZa7l58u.jpg', 1, 7, 'upload/travel/category/video/ylyh4mCcrdB8M7ha0VEz7gf0rUjFHnraQp4zt0WG.mp4', '2022-07-13 02:27:14', '2022-07-13 02:27:14'),
(10, 'Hồ Tây', 'upload/travel/category/LreSiYM7ou3xxWSNtgbcrQZN45vbgQ0FUdV0b5yG.png', 1, 8, 'upload/travel/category/video/F6OSZwE0viyCA002yO6qmeiTyApzGaYC6VCpDAsY.mp4', '2022-07-13 02:30:56', '2022-07-13 20:32:49'),
(11, 'Lào Cai', 'upload/travel/category/NMcoGmMefqWOizHhCy9mNaDgqroot8pZFp8WXam8.png', 1, 9, 'upload/travel/category/video/LVgrEvZTvOaZ2gI4u3arWY3swS5xcC0DTuH50quJ.mp4', '2022-07-13 02:35:03', '2022-07-13 02:35:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_travel`
--

CREATE TABLE `category_travel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL DEFAULT '0',
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_travel`
--

INSERT INTO `category_travel` (`id`, `title`, `banner`, `display`, `index`, `video`, `created_at`, `updated_at`) VALUES
(3, 'Nghỉ dưỡng', 'upload/travel/category/DiI4WI5z0dHAnaZl0k4NprZB4UX3xhotHAxLSuDp.png', 1, 1, 'upload/travel/category/video/xx1AWKLpCbkSTNWAJYrdoUp36hpOLcenBuBbdoOG.mp4', '2022-06-15 20:58:31', '2022-06-15 21:37:49'),
(4, 'Vui chơi', 'upload/travel/category/uPEmvuF51SBM2t7imMbrOX1M6yfFX0D6fjrqWtP9.png', 1, 2, 'upload/travel/category/video/LQRLiQ1HXfWUzfnTY5kicuOmlLZkZhb28ZTHnJNg.mp4', '2022-06-15 20:59:00', '2022-06-15 20:59:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_support` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `note`, `is_support`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn', '0978659989', '123@gmail.com', 'âsasas', 0, '2022-07-12 04:09:56', '2022-07-12 04:09:56'),
(2, 'Nguyễn', '0978659989', 'admin@gmail.com', 'ok', 0, '2022-08-11 01:39:06', '2022-08-11 01:39:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `convenient`
--

CREATE TABLE `convenient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `convenient`
--

INSERT INTO `convenient` (`id`, `icon`, `name`, `created_at`, `updated_at`) VALUES
(1, 'upload/booking/convenient/icon/KlW6Iu3lT3rzsvCGVbAreNgUsY4t7QF9OBItFuNs.svg', 'Thang máy', '2022-07-07 02:48:54', '2022-07-07 03:01:11'),
(2, 'upload/booking/convenient/icon/52MpzkuxjbQOUaDI9mF2ARnLIb9s581PYAmi0ML0.svg', 'Sân vườn', '2022-07-07 02:53:58', '2022-07-07 03:00:58'),
(3, 'upload/booking/convenient/icon/QixT02h18ZJvJAg7ExwTkVBd5XaVHXp1h3q3GOBO.svg', 'Ban công', '2022-07-07 02:54:14', '2022-07-07 03:00:43'),
(4, 'upload/booking/convenient/icon/DqVZpZvcxdxe38fal2NVIketlXh7xtOZhtbtXJ9t.svg', 'Không hút thuốc', '2022-07-07 02:54:33', '2022-07-07 03:00:29'),
(5, 'upload/booking/convenient/icon/CXglzJN0OybGUW3hJm5Xu0w4HUPH7y09gLh8Y8da.svg', 'Điều hòa nhiệt độ', '2022-07-07 03:01:44', '2022-07-07 03:01:44'),
(6, 'upload/booking/convenient/icon/ool07UaCAfSwhxZQC1QV2DjuOgJ8HtOutxPqQO8K.svg', 'Bãi đỗ xe miễn phí', '2022-07-07 03:02:07', '2022-07-25 02:37:45'),
(7, 'upload/booking/convenient/icon/XtUW5LYU9XT4JUmdd3GVJTGDgCc3pPeah7nGSvvw.svg', 'Điều hòa', '2022-07-14 20:58:08', '2022-07-25 02:38:49'),
(8, 'upload/booking/convenient/icon/hmbDdcdNGn2XlGeO6OsFc3BoUs44M1tkqTfi60LS.svg', 'đệm êm', '2022-07-15 00:17:33', '2022-07-15 00:17:33'),
(9, 'upload/booking/convenient/icon/SKpIVaFEeulWmBGgimRlWhCWkwoUmQpTp6fVJnsA.svg', 'ok', '2022-07-15 00:25:35', '2022-07-15 00:25:35'),
(10, 'upload/booking/convenient/icon/fWuYgDeonFFHPwgZLTgwAICtUbUrOWZeBvkBn9VA.svg', 'tiện nghi như ở nhà', '2022-07-15 00:29:25', '2022-07-15 00:29:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `culinary`
--

CREATE TABLE `culinary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_culinary` int(11) DEFAULT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_active` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `price_2` int(11) NOT NULL,
  `ratings` double(8,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1: Top dac san; 2: An gi',
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `culinary`
--

INSERT INTO `culinary` (`id`, `name`, `content`, `banner`, `description`, `video_review`, `menu`, `category_culinary`, `name_category`, `video_active`, `is_active`, `price`, `price_2`, `ratings`, `created_by`, `created_at`, `updated_at`, `type`, `src`) VALUES
(1, 'Ghé quán Lòng “Chat” Tôn Thất Tùng ăn cực chất, nhậu cực đã – Digifood', 'Lòng “Chat” Tôn Thất Tùng ghi điểm trong mắt thực khách bởi không gian quán sạch sẽ, gọn gàng. Hơn hết là các món ăn thơm ngon, đậm vị và mức giá vô cùng phải chăng.', 'upload/culinary/video/za1KnhTuMvU0q40XMOJVKt3gJO2zybWIogOzz5Y8.mp4', '<p>Địa chỉ nh&agrave; h&agrave;ng L&ograve;ng &ldquo;Ch&aacute;t&rdquo; T&ocirc;n Thất T&ugrave;ng</p>\r\n<p>Địa chỉ: 64 T&ocirc;n Thất T&ugrave;ng, Đống Đa, H&agrave; Nội<br />SĐT: 09 6666 1589/ 07 99991266<br />Giờ phục vụ: 9:00 &ndash; 14:00 v&agrave; 18:00 &ndash; 22:00</p>\r\n<p>L&ograve;ng &ldquo;Chat&rdquo; T&ocirc;n Thất T&ugrave;ng ghi điểm trong mắt thực kh&aacute;ch bởi kh&ocirc;ng gian qu&aacute;n sạch sẽ, gọn g&agrave;ng. Hơn hết l&agrave; c&aacute;c m&oacute;n ăn thơm ngon, đậm vị v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng phải chăng. H&atilde;y c&ugrave;ng Digifood gh&eacute; thăm qu&aacute;n l&ograve;ng nức tiếng H&agrave; Nội n&agrave;y để chứng thực những điều tr&ecirc;n nh&eacute;</p>\r\n<p>Qu&aacute;n được lưu giữ v&agrave; ph&aacute;t triển bởi gia đ&igrave;nh c&oacute; truyền thống 3 thế hệ l&agrave;m nghề v&agrave; kinh doanh về l&ograve;ng lợn. Nhờ vậy, chủ qu&aacute;n c&oacute; sự am hiểu s&acirc;u sắc về nguy&ecirc;n liệu, từ c&aacute;ch lựa chọn đến chế biến đảm bảo m&oacute;n ăn giữ được hương vị đặc trưng ri&ecirc;ng, tươi, ngon, bổ dưỡng.</p>\r\n<p>Cả 2 cơ sở đều c&oacute; kh&ocirc;ng gian rộng r&atilde;i v&agrave; phục vụ chuy&ecirc;n nghiệp. Qu&aacute;n nằm ngay mặt đường n&ecirc;n bạn sẽ kh&ocirc;ng mất nhiều thời gian t&igrave;m kiếm.&nbsp;</p>', 'upload/culinary/review/aqrMs7AQopZYkV3kKGjINJX5LY9H6AyosrZwzd3p.mp4', NULL, 1, 'BBQ', 1, 1, 300000, 450000, 5.00, 1, '2022-05-30 23:53:31', '2022-08-01 23:55:22', 1, 'upload/travel/articles/img/6VCVKe5HqyPPuYnuVBWWtiHB8cmgHQTVe2PoB2L8.jpg'),
(2, 'Vịt cỏ vân đình', 'Lòng “Chat” Tôn Thất Tùng ghi điểm trong mắt thực khách bởi không gian quán sạch sẽ, gọn gàng. Hơn hết là các món ăn thơm ngon, đậm vị và mức giá vô cùng phải chăng.', 'upload/culinary/img/mMt205ShUxgAf5AmJNA5gDVphi6Y6xWKpyweqBj1.png', '<p>1. Địa chỉ nh&agrave; h&agrave;ng L&ograve;ng &ldquo;Ch&aacute;t&rdquo; T&ocirc;n Thất T&ugrave;ng&nbsp;&nbsp;</p>\r\n<p>Địa chỉ: 64 T&ocirc;n Thất T&ugrave;ng, Đống Đa, H&agrave; Nội<br />SĐT: 09 6666 1589/ 07 99991266<br />Giờ phục vụ: 9:00 &ndash; 14:00 v&agrave; 18:00 &ndash; 22:00</p>\r\n<p>L&ograve;ng &ldquo;Chat&rdquo; T&ocirc;n Thất T&ugrave;ng ghi điểm trong mắt thực kh&aacute;ch bởi kh&ocirc;ng gian qu&aacute;n sạch sẽ, gọn g&agrave;ng. Hơn hết l&agrave; c&aacute;c m&oacute;n ăn thơm ngon, đậm vị v&agrave; mức gi&aacute; v&ocirc; c&ugrave;ng phải chăng. H&atilde;y c&ugrave;ng Digifood gh&eacute; thăm qu&aacute;n l&ograve;ng nức tiếng H&agrave; Nội n&agrave;y để chứng thực những điều tr&ecirc;n nh&eacute;</p>\r\n<p>Qu&aacute;n được lưu giữ v&agrave; ph&aacute;t triển bởi gia đ&igrave;nh c&oacute; truyền thống 3 thế hệ l&agrave;m nghề v&agrave; kinh doanh về l&ograve;ng lợn. Nhờ vậy, chủ qu&aacute;n c&oacute; sự am hiểu s&acirc;u sắc về nguy&ecirc;n liệu, từ c&aacute;ch lựa chọn đến chế biến đảm bảo m&oacute;n ăn giữ được hương vị đặc trưng ri&ecirc;ng, tươi, ngon, bổ dưỡng.</p>', 'upload/culinary/review/pBOgMUINKh17b4QxLV1Qo9WRlWkoz0Fm5JkcCx2D.mp4', NULL, 1, 'BBQ', 0, 1, 450000, 1500000, 5.00, 1, '2022-06-02 01:07:37', '2022-08-01 21:18:21', 1, 'upload/travel/articles/img/QvK13wvFeNvSSKtB4sP0gQtRR5UyCpyOap9NpRRm.png'),
(3, 'Tiết canh', 'adsasdasdasdasd', 'upload/culinary/img/ehah67GCHdSMgLBUVXEoAbcpgDGzim1zVxXcyPfU.jpg', '<p>&aacute;dasdasdasdasda</p>\r\n<p>sdasdasdasd</p>', NULL, NULL, 2, 'Đặc sản', 0, 1, 75000, 150000, 5.00, 1, '2022-07-05 00:27:48', '2022-08-01 21:18:51', 1, 'upload/travel/articles/img/VYM6tm4eE8KCZKsnpVrSLvYyTCeBesrrWAHw8emR.jpg'),
(4, 'kaka', 'aáaa', 'upload/culinary/img/abydGxJTotmBNGRpaZALYabpTcapi4eDfn7ZQ2RG.png', '<p>aaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/culinary/review/bUMaVK4OHuk1ebmmCiMsOyZsxFaiD6c9sP9Ui3FO.mp4', NULL, 2, 'Đặc sản', 0, 1, 75000, 150000, 5.00, 1, '2022-07-06 21:23:01', '2022-08-01 21:21:17', 2, 'upload/travel/articles/img/T2chfKeKncMRtuGhxW7OiHJnOGDcZX57cLc44tLy.png'),
(6, 'sâsas', 'ấ', 'upload/culinary/img/9rhl1wLeiqlTOPitoZbi42ayi97HjphxcOpQpMWT.png', '<p><span style=\"text-decoration: underline;\"><strong>1) aakadlja;da;da</strong></span></p>\r\n<p>&acirc;dada</p>\r\n<p>2)&acirc;dadada</p>\r\n<p>&nbsp;adadadad</p>', 'upload/culinary/review/VoKXDoOYUW3iuYCvazf3mB1cNc6DmxfIHTmV7Sxt.mp4', NULL, 1, 'BBQ', 0, 1, 75000, 150000, 5.00, 1, '2022-07-14 02:00:22', '2022-08-01 21:20:46', 2, 'upload/travel/articles/img/eqsBo3nKDh0nGU1xoJlGgxeZh34MXXngZsREYE6g.jpg'),
(7, 'a', 'a', 'upload/culinary/img/bGTHPVKkIkixVUdDclZWJTvVyNaT0We4BI9Ml1Gt.png', '<p>a</p>', 'upload/culinary/review/0iI6pinKg3PSytZcCW6UTx3gFtx37cR923991HSA.mp4', NULL, 1, 'BBQ', 0, 1, 75000, 150000, 5.00, 1, '2022-07-14 02:26:00', '2022-08-01 21:19:19', 1, 'upload/travel/articles/img/LV8YtRCILJtgnx5DaK0nxCacDFpVgBIbxJ89Rxy6.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `geographical_location`
--

CREATE TABLE `geographical_location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `geographical_location`
--

INSERT INTO `geographical_location` (`id`, `title`, `content`, `posts`, `src`, `img_1`, `img_2`, `display`, `index`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Vị trí địa lí', 'Vĩnh Phúc là tỉnh nằm trong vùng kinh tế trọng điểm Bắc Bộ, cửa ngõ của Thủ đô Hà Nội, gần sân bay Quốc tế Nội Bài, là cầu nối giữa các tỉnh phía Tây Bắc với Hà Nội và đồng bằng châu thổ sông Hồng, vì vậy tỉnh có vai trò rất quan trọng trong chiến lược phát triển kinh tế vùng và quốc gia.\r\n\r\nTỉnh Vĩnh Phúc được thành lập từ năm 1950, trên cơ sở sáp nhập 2 tỉnh: Vĩnh Yên và Phúc Yên, năm 1968 sáp nhập với tỉnh Phú Thọ thành tỉnh Vĩnh Phú, từ ngày 01 tháng 01 năm 1997, tỉnh Vĩnh Phúc được tái lập. Thực hiện chủ trương của Đảng và Nhà nước về mở rộng địa giới hành chính Thủ đô Hà Nội, ngày 01 tháng 8 năm 2008, huyện Mê Linh, tỉnh Vĩnh Phúc chuyển về thành phố Hà Nội.', '<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia. aaaaaaaaa</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>', 'upload/travel/articles/img/UmLNBagfy0wMlDpJgjOXivtP8LEouq9ePoB7ew2w.jpg', 'upload/travel/articles/img/JFpTCy3KwNCxj2KLAk4p9wjsyJKdYARn4ijHMGzN.png', 'upload/travel/articles/img/67AUTEXJ6k1TMYId2w6AbvFx7NMjfyjXc0mpSPuO.jpg', 1, 1, 'Khoa Pug', '2022-07-20 00:35:03', '2022-08-02 20:25:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotel`
--

CREATE TABLE `hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) DEFAULT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_video` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_2` int(11) NOT NULL,
  `rating` double(8,2) NOT NULL DEFAULT '0.00',
  `rating_address` double(8,2) NOT NULL DEFAULT '0.00',
  `rating_price` double(8,2) NOT NULL DEFAULT '0.00',
  `rating_service` double(8,2) NOT NULL DEFAULT '0.00',
  `rating_toilet` double(8,2) NOT NULL DEFAULT '0.00',
  `rating_convenient` double(8,2) NOT NULL DEFAULT '0.00',
  `rating_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `slug`, `category`, `name_category`, `content`, `banner`, `is_video`, `address`, `map`, `price`, `price_2`, `rating`, `rating_address`, `rating_price`, `rating_service`, `rating_toilet`, `rating_convenient`, `rating_content`, `created_by`, `active`, `created_at`, `updated_at`, `phone`, `src`) VALUES
(1, 'Flamingo Đại Lải Resort', 'flamingo-dai-lai-resort', 4, 'Resort', '“Khu nghỉ mát trông rất đẹp. Biệt thự của tôi rất đẹp, sạch sẽ. Tất cả các nhân viên đều rất thân thiện và hữu ích. Tôi thích quang cảnh ở khắp mọi nơi vì đó là một không gian xanh đáng yêu! Tôi thực sự hài lòng với mọi thứ ở đây. Tôi sẽ đến một lần nữa v', 'upload/hotel/img/VzDEzWFcU9RAZ06FuqcvMW2cguFrEKJ9aXA4jjBh.png', 0, 'Ngọc Quang, Ngọc Thanh, Thị Xã Phúc Yên, Vĩnh Phúc, Việt Nam', '21.334051967611817, 105.71670986418948', 500000, 1500000, 4.60, 5.00, 5.00, 4.50, 4.00, 4.50, '“Khu nghỉ mát trông rất đẹp. Biệt thự của tôi rất đẹp, sạch sẽ. Tất cả các nhân viên đều rất thân thiện và hữu ích. Tôi thích quang cảnh ở khắp mọi nơi vì đó là một không gian xanh đáng yêu! Tôi thực sự hài lòng với mọi thứ ở đây. Tôi sẽ đến một lần nữa v', 1, 1, '2022-05-31 02:08:59', '2022-08-02 01:11:12', '0978699853', 'upload/travel/articles/img/I3Vzhz7QfqvoU8sAzX41OXrU7qnXZ6LnnCS5YhxA.jpg'),
(3, '5ka', '5ka', 2, 'Khách sạn', 'Ngủ ngon', 'upload/hotel/img/6i21JlzWesLa4wccto4O9kqdfP3Slst3hBbiUApt.jpg', 0, 'Hà Nội', '20.971464467518082, 105.82796871048515', 75000, 150000, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 'rt2er2wereweer', 1, 1, '2022-07-05 00:30:33', '2022-08-02 01:10:46', '0978129116', 'upload/travel/articles/img/qQ5beQwmmVYX9UjpANnV4JavbO7VvuVfWeyhhXFi.png'),
(4, 'King cup', 'king-cup', 2, 'Khách sạn', 'Vip pro', 'upload/hotel/img/NZomP7kcpcxJERl03Wrmr8rONau88rElJb6EQLRv.jpg', 0, 'Hà Nội Hà Nội Hà Nội Hà Nội Hà Nội Hà Nội Hà Nội Hà Nội à Nội Hà Nội Hà Nội Hà Nội Hà Nội Hà Nội Hà Nội', '20.971464467518082, 105.82796871048515', 75000, 150000, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 'ok', 1, 1, '2022-07-14 20:43:43', '2022-08-02 01:10:31', '0369979898', 'upload/travel/articles/img/oOpffSACHVb8IGEf14503gE8Mc8XK3rUJBezvPJm.jpg'),
(5, 'Cat Dog', 'cat-dog', 2, 'Khách sạn', 'ok ok', 'upload/hotel/img/UOfpBkJv1CiP8Rr5A6CS5A7vMK1RfSUxhFi0UeEa.jpg', 0, 'Hà Nội', '20.971464467518082, 105.82796871048515', 75000, 1500000, 4.40, 5.00, 4.00, 5.00, 3.00, 5.00, 'tốt', 1, 1, '2022-07-24 20:45:10', '2022-08-09 03:17:35', '099756599', 'upload/travel/articles/img/QJLsV8lY0l8X145p0gAcYEsZAX05fEUqDyMtsVUi.jpg'),
(6, 'a', 'a', 1, 'Nhà nghỉ', 'a', 'upload/hotel/img/IK108XfdE1IMA1BSSPoxKawkkNoPuxmzRDsMLjNh.png', 0, 'Hà Nội', '20.971464467518082, 105.82796871048515', 85000, 100000, 3.00, 1.00, 2.00, 3.00, 4.00, 5.00, 'ok', 1, 1, '2022-08-09 03:33:15', '2022-08-09 03:33:15', '97829116', 'upload/travel/articles/img/rW9KwwZmSZ9AKlACWFXBGeOr27WQJ83g04skcWTH.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_27_143838_add_level_to_user_table', 2),
(7, '2022_05_27_174701_create_banner_table', 3),
(10, '2022_05_28_073133_create_restaurant_table', 4),
(11, '2022_05_28_155355_create_culinary_table', 5),
(12, '2022_05_28_161038_create_multimedia_files_table', 5),
(13, '2022_05_28_161551_create_restaurant_culinary_table', 5),
(14, '2022_05_29_150919_create_category_culinary_table', 5),
(16, '2022_05_31_044231_create_category_booking_table', 6),
(20, '2022_05_31_082905_create_hotel_table', 7),
(24, '2022_05_31_102450_create_room_hotel_table', 8),
(25, '2022_06_02_043449_create_category_tourism_table', 9),
(28, '2022_06_02_050710_create_travel_articles_table', 10),
(30, '2022_06_15_031653_add_type_to_category_tourism_table', 11),
(31, '2022_06_16_021032_create_category_travel_table', 12),
(32, '2022_06_16_050259_create_articles_review_table', 13),
(33, '2022_06_17_023507_add_type_to_culinary_table', 14),
(34, '2022_06_17_034140_add_type_to_travel_articles_table', 14),
(35, '2022_06_17_093837_create_category_booth_table', 14),
(36, '2022_06_18_052949_create_booth_table', 14),
(37, '2022_06_20_110551_create_contact_table', 14),
(38, '2022_06_21_152917_add_rating_to_restaurant_table', 15),
(39, '2022_06_22_020118_create_subscribes_table', 16),
(40, '2022_06_22_071727_create_book_rom_table', 16),
(41, '2022_06_22_072207_add_phone_to_hotel', 16),
(42, '2022_06_23_042433_create_convenient_table', 16),
(43, '2022_06_23_061202_create_room_convenient_table', 16),
(44, '2022_06_27_025757_add_password_default_to_users_table', 16),
(45, '2022_07_08_064241_create_banner_app', 17),
(46, '2022_07_08_094331_create_title_feature', 18),
(48, '2022_07_09_032147_create_app_describe', 20),
(49, '2022_07_09_035248_create_travel_guide', 21),
(50, '2022_07_11_020325_create_search_service', 22),
(51, '2022_07_11_031702_create_business_content', 23),
(52, '2022_07_11_033307_create_business_icon', 24),
(53, '2022_07_11_040117_create_technology', 25),
(55, '2022_07_11_071147_create_support', 26),
(56, '2022_07_11_072214_create_banner_description', 27),
(57, '2022_07_11_102743_create_super_app', 28),
(58, '2022_07_13_065645_create_category_tourist', 29),
(59, '2022_07_13_073652_create_articles_tourist', 30),
(60, '2022_07_17_143102_add_src_to_travel_articles_table', 31),
(61, '2022_07_18_033053_create_table_introduce', 32),
(62, '2022_07_20_064430_add_posts_to_introduce_table', 33),
(63, '2022_07_20_071412_create_geographical_location', 34),
(64, '2022_07_20_075346_create_tradition_people', 35),
(65, '2022_08_02_035017_add_src_to_culinary_table', 36),
(66, '2022_08_02_042516_add_src_to_articles_review_table', 37),
(67, '2022_08_02_072552_add_src_to_hotel_table', 38),
(68, '2022_08_02_093110_add_src_to_booth_table', 39);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `multimedia_files`
--

CREATE TABLE `multimedia_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parent_type` int(11) NOT NULL DEFAULT '1' COMMENT '1:culinary; 2:hotel; 3:blog',
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `multimedia_files`
--

INSERT INTO `multimedia_files` (`id`, `parent_id`, `parent_type`, `src`, `extension`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'upload/multimedia/vC6ZEpNUQ0121jy4NJu7QmsexfYYQ2PRSYqiH1CY.jpg', 'jpg', '2022-05-30 23:53:31', '2022-05-30 23:53:31'),
(2, 1, 1, 'upload/multimedia/xEtpwB94g9aKqEbUteLwOFttfsJV1hzLPeSnYl16.jpg', 'jpg', '2022-05-30 23:53:31', '2022-05-30 23:53:31'),
(3, 1, 1, 'upload/multimedia/WyAaQah7tsTU2rWDcHxXrXzxcYIjt4YxjYCsVT9q.jpg', 'jpg', '2022-05-30 23:53:31', '2022-05-30 23:53:31'),
(4, 1, 1, 'upload/multimedia/Dl6cDpfxxZtTa9i2qGLAC1t1Un9nHUOuWXD55Dmg.jpg', 'jpg', '2022-05-30 23:53:31', '2022-05-30 23:53:31'),
(21, 2, 4, 'upload/multimedia/nqpLNbuD1TY2A8uBeOs7v6uqlUIrLpuiyRksE2XK.png', 'png', '2022-05-31 04:26:23', '2022-05-31 04:26:23'),
(22, 2, 4, 'upload/multimedia/5tUUdgwGqBMX7Xz6HgHyKBDDKAWsTvQLCQN12PCA.png', 'png', '2022-05-31 04:26:23', '2022-05-31 04:26:23'),
(23, 2, 4, 'upload/multimedia/1XeREZ2iOoEPlYkBHDG7IGK9FY0iQoGqeL8XGUPB.png', 'png', '2022-05-31 04:26:23', '2022-05-31 04:26:23'),
(24, 2, 4, 'upload/multimedia/bnAbmncJM5HsnoGPJlV5Xi1EhmdTzfLfaUqwws9n.png', 'png', '2022-05-31 04:26:23', '2022-05-31 04:26:23'),
(25, 2, 4, 'upload/multimedia/OGziXSmQPYjz84PwmG1fhi38TYnAFic0YDUUiDKC.png', 'png', '2022-05-31 04:26:23', '2022-05-31 04:26:23'),
(26, 2, 4, 'upload/multimedia/zVwC3ZWKDXPnFCm0SESNJUqhGLVLxTx45qnDsZxN.png', 'png', '2022-05-31 04:26:23', '2022-05-31 04:26:23'),
(42, 1, 4, 'upload/multimedia/bh7Cki1hhhPXPl2NDUlaNF8V7tl2unVyQy2L1Atd.png', 'png', '2022-05-31 04:53:14', '2022-05-31 04:53:14'),
(43, 1, 4, 'upload/multimedia/jLuNZuKjeAGPI45HwbD2ml7T7ZG2hsSoiRrHgLCR.png', 'png', '2022-05-31 04:53:14', '2022-05-31 04:53:14'),
(44, 1, 4, 'upload/multimedia/0oTL1o4ZMDmMvh34jEhziit5WqyVpqexIlAClFjK.png', 'png', '2022-05-31 04:53:14', '2022-05-31 04:53:14'),
(45, 2, 1, 'upload/multimedia/NxJkz7r2lEt7goNIfYB8k4IWPcugvKMdMOl87PrZ.png', 'png', '2022-06-02 01:07:37', '2022-06-02 01:07:37'),
(46, 2, 1, 'upload/multimedia/5IAOTRCm1ILoeMNPx1Wxcsp7HZNqAPgH3OCuEsvx.png', 'png', '2022-06-02 01:07:37', '2022-06-02 01:07:37'),
(47, 2, 1, 'upload/multimedia/HUuf8I6Ixot8aL24lmTTF7cxQCzEWtvvj5LaYBlO.png', 'png', '2022-06-02 01:07:37', '2022-06-02 01:07:37'),
(48, 2, 1, 'upload/multimedia/lxzpy3kQIRLUDx4AVXi9Q05S96APd1oci0WgjQcw.png', 'png', '2022-06-02 01:07:37', '2022-06-02 01:07:37'),
(49, 2, 1, 'upload/multimedia/I4shfxi5dM15nOLomDioTND4qjjGzwwvLU0wSGm1.png', 'png', '2022-06-02 01:07:37', '2022-06-02 01:07:37'),
(50, 2, 1, 'upload/multimedia/GgQuccE0O8voMbs5KHhdN39kiI8FVjkMYSdKfQ3S.png', 'png', '2022-06-02 01:07:37', '2022-06-02 01:07:37'),
(51, 2, 1, 'upload/multimedia/j8wMWqL4h1GYbpcyvoQBmETlTyYcit559TIYvE7Y.png', 'png', '2022-06-02 01:07:37', '2022-06-02 01:07:37'),
(54, 1, 3, 'upload/multimedia/q5GrkkRBpKhAvXVJRIOCmkpyJXj18gfh0p94ovp8.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(55, 1, 3, 'upload/multimedia/EpHLbn27883ltJIfint1LkQUeNY8yx583Ndnt1F6.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(56, 1, 3, 'upload/multimedia/ANLNv8m82adncdvUSOLoud2FjR5lhw9pycduGBJG.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(57, 1, 3, 'upload/multimedia/04XltBZnOSgWou6lvULXO3THZXPsC2CablGRAjxJ.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(58, 1, 3, 'upload/multimedia/9dwKqMvV4LyePY5PM7N72dTHD1Z92KcnAuiOHVwv.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(59, 1, 3, 'upload/multimedia/V0sH3h3R6wFyroU0K7Gi6NSiCaZEvq8WG3rhQpQo.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(60, 1, 3, 'upload/multimedia/pjwAeB0qqvod99QONOewQlIQiRkEbWr5Z9HH2I8G.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(61, 1, 3, 'upload/multimedia/k4pfzPjMEvC5fcZwirtn2AtTfaBKLAj63zcMTGx4.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(62, 1, 3, 'upload/multimedia/tkULEpsenke7niVmdEN83KoyasI5kh07lttc79KB.png', 'png', '2022-06-02 01:27:11', '2022-06-02 01:27:11'),
(63, 1, 3, 'upload/multimedia/UYiEv1jfGAbF0293T7AJPCruTXZp1dI1a165LeYA.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(64, 1, 3, 'upload/multimedia/He31CWucbBdULtKf7ZfDdUIY8xePDeSmrxRlZo60.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(65, 1, 3, 'upload/multimedia/8nd4EkR9OqD6YXTuLE5SB9DjCa8JGcBqGd0Tg1cO.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(66, 1, 3, 'upload/multimedia/bg84HPq1lAJqZBl68hyUbziuMVfUXZq6fOnf7bpb.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(67, 1, 3, 'upload/multimedia/x9eehaCPzsbm2NjEiWdVTgKPqzXtypdtDg2sYEza.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(68, 1, 3, 'upload/multimedia/w5SB48eWA1UipoMTqG8Q2smYcBpt2OlnbTDigvII.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(69, 1, 3, 'upload/multimedia/IsBUVQHHgr0Mw7urmjiYQUPAP8BJ5Hhpn67kAVPt.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(70, 1, 3, 'upload/multimedia/xkDeC43iooe8nGFh7NXCWfGgKrgj0SauukcFROOH.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(71, 1, 3, 'upload/multimedia/5nLmJZkOSEV6KIM0jb1dcFZDxeAALY9KjcEuTWEK.png', 'png', '2022-06-02 01:31:36', '2022-06-02 01:31:36'),
(72, 2, 3, 'upload/multimedia/Xvhy13VDQSLAmpB3N1AxikFDol62zenSXujIKvP1.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(73, 2, 3, 'upload/multimedia/CuYphiUWG7VQvPkZivs5mOLuuwMrTbNu6vvhFeyi.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(74, 2, 3, 'upload/multimedia/ox05gWfHqgTOjTnyDIh2GA1SB3KrfYLwWYLeGE40.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(75, 2, 3, 'upload/multimedia/dOroJhEgqfwtGMs5cOllRpFd6eRdNPcnOHKLzPNl.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(76, 2, 3, 'upload/multimedia/k0B3Tr0rfHIRzpn1PZAHsunn4mgWd2mC3q6HDZWB.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(77, 2, 3, 'upload/multimedia/6whbckVAwKb6eCoBUaj9pokaw3MLW2AwF3mf7mMr.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(78, 2, 3, 'upload/multimedia/p6ka5fPAET6fgXobwdGmF80QrdPBR6zPLcJZQQqV.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(79, 2, 3, 'upload/multimedia/HxSfGmAp9RtKYh3tjZXaC9rSFyzeiO18fTyS6lZL.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(80, 2, 3, 'upload/multimedia/t1QGiNYUF8APFVgZip3VocLnFwiOepGQ0XbpOaJE.png', 'png', '2022-06-02 01:33:43', '2022-06-02 01:33:43'),
(81, 3, 3, 'upload/multimedia/A8yKpfT5boFDADu9SAlvNSXkW4qgzsZ8LccdhUtU.png', 'png', '2022-06-02 01:38:58', '2022-06-02 01:38:58'),
(82, 3, 3, 'upload/multimedia/SooYTo4b9y2pptfcuKbQZspwWgXZuaODPSzEIat5.png', 'png', '2022-06-02 01:38:58', '2022-06-02 01:38:58'),
(83, 3, 3, 'upload/multimedia/kNnZT9q9uEwHDuiiE42WQHujLg5p6iMsp5lsZQpF.png', 'png', '2022-06-02 01:38:58', '2022-06-02 01:38:58'),
(84, 3, 3, 'upload/multimedia/WxbbKJNx3vizsEtPR2ZeuPTCseoTXew6V3gy05Lu.png', 'png', '2022-06-02 01:38:58', '2022-06-02 01:38:58'),
(85, 3, 3, 'upload/multimedia/nP661hxJIfSgMaqaK8tJf4B2eP0IWMLA9gWyrVRU.png', 'png', '2022-06-02 01:38:58', '2022-06-02 01:38:58'),
(96, 3, 3, 'upload/multimedia/LmWQhoo0mFWaiQDH3tJMUKuwGHNJGvj4uXe1WsRw.png', 'png', '2022-06-02 03:19:02', '2022-06-02 03:19:02'),
(97, 2, 1, 'upload/multimedia/bA0kjP7ndVDStlWdqf2SSOlly8DukWj7kiF8lJSr.png', 'png', '2022-06-02 04:15:54', '2022-06-02 04:15:54'),
(98, 5, 3, 'upload/multimedia/gSlS1Yo1bo70Lb8POFnp0pYXHfkWId3PJrhZycrQ.jpg', 'jpg', '2022-06-14 20:36:57', '2022-06-14 20:36:57'),
(99, 5, 3, 'upload/multimedia/vIvXTLKwBD5KJiEQsodWJZsrc0kyZqgeFSVEturC.jpg', 'jpg', '2022-06-14 20:36:57', '2022-06-14 20:36:57'),
(100, 5, 3, 'upload/multimedia/6zXMwVdsJPKwgg6gUt05oEzdvAw1LsWTKZEZH4nv.jpg', 'jpg', '2022-06-14 20:36:57', '2022-06-14 20:36:57'),
(101, 5, 3, 'upload/multimedia/Ns6yPfimjlw080zohKe16ZjINPsoVWP6UICgwKES.jpg', 'jpg', '2022-06-14 20:36:57', '2022-06-14 20:36:57'),
(102, 6, 3, 'upload/multimedia/onwWujjghbHDIrcnmqccqVUsuHYfv7wSbh6xqjUJ.png', 'png', '2022-06-14 20:39:34', '2022-06-14 20:39:34'),
(103, 6, 3, 'upload/multimedia/cDPiHZubrkMKiI4CZ2rzJFpJRVfUz4HwXO9NbQzL.png', 'png', '2022-06-14 20:39:34', '2022-06-14 20:39:34'),
(104, 6, 3, 'upload/multimedia/HnHtrgrEVzXHGziSRDX3Qxcx4f6vMH5GNrU6iBNI.png', 'png', '2022-06-14 20:39:34', '2022-06-14 20:39:34'),
(105, 6, 3, 'upload/multimedia/LcQwtRw88wo05SVhbAroIxm5l3SPgeyHIMS5VdSe.png', 'png', '2022-06-14 20:39:34', '2022-06-14 20:39:34'),
(106, 7, 3, 'upload/multimedia/5FMLc4Ui5DsLlI4kPOIlgX7DP0xES6ZZWPEpwd3R.png', 'png', '2022-06-14 20:40:45', '2022-06-14 20:40:45'),
(107, 7, 3, 'upload/multimedia/MmOxyQ1l7L7D6TCDbVdIkDwx1Lp2ClYxEfYZQnUK.png', 'png', '2022-06-14 20:40:45', '2022-06-14 20:40:45'),
(108, 7, 3, 'upload/multimedia/KWeOD6HB4Q9LxAcNPj2Xds9VRsXR1BLnfCefxCbB.png', 'png', '2022-06-14 20:40:45', '2022-06-14 20:40:45'),
(109, 7, 3, 'upload/multimedia/2a10SpNKN7kZY8S8Ddf6vgg6QV7nOjW0w0PeDAfm.png', 'png', '2022-06-14 20:40:45', '2022-06-14 20:40:45'),
(110, 8, 3, 'upload/multimedia/orfwUvQoVvEaZ6OOemqM6S7q4FAb1NorTBPuiEnp.png', 'png', '2022-06-14 20:56:26', '2022-06-14 20:56:26'),
(111, 8, 3, 'upload/multimedia/ClS2ucRY51ul9nhVIbS0KUdlZBaNfRxy7TrOmO8L.png', 'png', '2022-06-14 20:56:26', '2022-06-14 20:56:26'),
(112, 8, 3, 'upload/multimedia/b6C44d7tk5XN1q8divfItek15A9gJwqs0WatgQfN.png', 'png', '2022-06-14 20:56:26', '2022-06-14 20:56:26'),
(113, 8, 3, 'upload/multimedia/YE3rqoBSgfYB3y2UX1ZlhiT9wykub0S6whDuhvBe.png', 'png', '2022-06-14 20:56:26', '2022-06-14 20:56:26'),
(114, 8, 3, 'upload/multimedia/E7VvMhqRPfBlEDIAu9kombTsIEKhbw5yiwa7ogNs.png', 'png', '2022-06-14 20:56:26', '2022-06-14 20:56:26'),
(115, 8, 3, 'upload/multimedia/wxmnLQZ7Y01NK1JAwbzihM6c0GNu9HfloMcqfY3L.png', 'png', '2022-06-14 20:56:26', '2022-06-14 20:56:26'),
(116, 9, 3, 'upload/multimedia/7iFZKTzfwysAcQskSYL0QVmue10ll3wJhXnrjqKv.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(117, 9, 3, 'upload/multimedia/4Q7rqPLvDJeHx9YjTrkBsAYaWPPWm4IHh2NLdzdf.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(118, 9, 3, 'upload/multimedia/ps8ycNd58TlqPiTa0JIrLVcBwESk7xOrPuZmelxy.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(119, 9, 3, 'upload/multimedia/XrDELDzPhjRq1HJ03OAksYkyoFMXyLcwoMIrp0Mk.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(120, 9, 3, 'upload/multimedia/LQhJxD9KaCpGUab2BdQggoLCqH01ZPn1eYBSVda4.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(121, 9, 3, 'upload/multimedia/yNBmH0XkJ2qTT3f9tuSdY3j8hWfHwSknYXe3j426.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(122, 9, 3, 'upload/multimedia/Iv5P76lWdsv7UQk5yO67Owa04u7bEjBAvxaisObE.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(123, 9, 3, 'upload/multimedia/dZqzFiBAk1aBiLXiJ6UJzl24Vxq2IowHmSI2QBBr.png', 'png', '2022-06-14 20:57:31', '2022-06-14 20:57:31'),
(124, 10, 3, 'upload/multimedia/5U1tPpqt8rn63rYnUV43wkbPgt8ENyvunMbeTMaa.png', 'png', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(125, 10, 3, 'upload/multimedia/kbl7sMgkVx2CbzUAOvjUOckyrogox9Y0VLG7ZFFO.png', 'png', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(126, 10, 3, 'upload/multimedia/0r3XelBrANdbzHbHA626aNlRPWPu7haOvwJf4ix1.png', 'png', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(127, 10, 3, 'upload/multimedia/TYJ4XMWXQsKDheBxS3ZDZBROy6Q29reXMuel2vCL.png', 'png', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(128, 10, 3, 'upload/multimedia/TyXpKmYnaA6i5UYuXStA61w4fXv5SHM0W1aMuADQ.png', 'png', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(129, 10, 3, 'upload/multimedia/mtaYDnSxMRyO5LgehNBb3ItD3aSPgCq2tOfMcKHv.png', 'png', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(130, 10, 3, 'upload/multimedia/asgugYjxXaC4ve6Iw9IvknpTqfvow1BiqG1SvGKy.png', 'png', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(131, 11, 3, 'upload/multimedia/gidOzghIQXyYckRrogcRt68CoytpUd6Spd3R8z7Y.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(132, 11, 3, 'upload/multimedia/xKTHQ6wS8PliEYTYPO2yeWmYKzfogax3TeGWHoUH.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(133, 11, 3, 'upload/multimedia/Y6c3z9goWrieAk7BZwOptkdDIkXWdB27BQOQg462.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(134, 11, 3, 'upload/multimedia/Udyak7S5TT6hJ2XxIzbhYFxC43VDYCsvGKoUp9jQ.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(135, 11, 3, 'upload/multimedia/gjjg0y5DcCrBylcjCxzLHOjuDlXl5g2urZyY98MC.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(136, 11, 3, 'upload/multimedia/7RU9rAzk483GhYl7FfGBPTObeWWGfQIbplPmgUrj.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(137, 11, 3, 'upload/multimedia/LuJhnv4PEX67wBug8TnAPUasImlk4HwVqzBk5EgG.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(138, 11, 3, 'upload/multimedia/1WU7IDTvsKCPozcYjQkET0P8Wczsj0G8dIdLt3DU.png', 'png', '2022-06-14 21:24:38', '2022-06-14 21:24:38'),
(139, 12, 3, 'upload/multimedia/gNMq8osxo2ZgjyR80OlvU8p6EevJ5bztnElzk4M5.png', 'png', '2022-06-14 21:25:37', '2022-06-14 21:25:37'),
(140, 12, 3, 'upload/multimedia/BURuwGdttlKhEK8rOpE1lDqbqO3GaWqzIHzBlfyD.png', 'png', '2022-06-14 21:25:37', '2022-06-14 21:25:37'),
(141, 12, 3, 'upload/multimedia/hdDrk6PCD8m9DIo4hAIQvjDVcYeyzyuQsAglFFts.png', 'png', '2022-06-14 21:25:37', '2022-06-14 21:25:37'),
(142, 12, 3, 'upload/multimedia/mfb0Aem7zSyvYXsMKcSPO93d1EUZwALWSkMO6FNz.png', 'png', '2022-06-14 21:25:37', '2022-06-14 21:25:37'),
(143, 12, 3, 'upload/multimedia/YXFwZJ5YTbPxeQjb1N8pKmgYniLltjOD72tzpScV.png', 'png', '2022-06-14 21:25:37', '2022-06-14 21:25:37'),
(144, 12, 3, 'upload/multimedia/Lhm7GTSYSX3z9twHP8APv2HXf6Y2RXXu1qrGDxNx.png', 'png', '2022-06-14 21:25:37', '2022-06-14 21:25:37'),
(145, 12, 3, 'upload/multimedia/smPWAtBIg6wlbmoneeNtnFXTwS2r2UlKeEgwl0a8.png', 'png', '2022-06-14 21:25:37', '2022-06-14 21:25:37'),
(146, 13, 3, 'upload/multimedia/ORYbC3qWVcRNdvtWD78UUBsUZ0HKioaXWgywVsWr.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(147, 13, 3, 'upload/multimedia/gvQX7ioCXRg1Jigvqgo9F7nA1TqkDoPMJSIAkXjZ.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(148, 13, 3, 'upload/multimedia/bmk8FeCewDJaJnhBA5fVdONgvKmhidBy97Enqg9V.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(149, 13, 3, 'upload/multimedia/hjTthOby70qiKvOR6QJ52VvXD5NAA9ZBDoNFrQYs.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(150, 13, 3, 'upload/multimedia/uWfnFZXVi2KIvFwRsl79BJQIPGMxN2UuZ5qQDJAF.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(151, 13, 3, 'upload/multimedia/KgGcE8OowyRC3Mza4aMPyxomRi6tCTSmMlNEUwW9.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(152, 13, 3, 'upload/multimedia/z5Bw3PHiPmKd30eHLKteexxnhkca9YV73UrMGfs9.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(153, 13, 3, 'upload/multimedia/pdSYNBUYstjRfewpMXGqfVRvgbO4TnhoNIQl6Ve3.png', 'png', '2022-06-14 21:26:28', '2022-06-14 21:26:28'),
(154, 14, 3, 'upload/multimedia/vcC2Ai5iSs3E3lHgonleoOBurOoNxFK6iPwYWLSh.png', 'png', '2022-06-14 21:27:24', '2022-06-14 21:27:24'),
(155, 14, 3, 'upload/multimedia/HFDcclmCvA6axXmSNJlM40ry5NMXNVqSXmKQG1go.png', 'png', '2022-06-14 21:27:24', '2022-06-14 21:27:24'),
(156, 14, 3, 'upload/multimedia/5SnbS4H2iiVdAY3xzMzVQbvQQCNOnEkAn5XgTx6l.png', 'png', '2022-06-14 21:27:24', '2022-06-14 21:27:24'),
(157, 14, 3, 'upload/multimedia/m1oMWjrOyRQQRQtuoKacZMbTVra9v6NUQQrRq79m.png', 'png', '2022-06-14 21:27:24', '2022-06-14 21:27:24'),
(158, 14, 3, 'upload/multimedia/QDE2MHzJ5K5WWwagoDJNPS8CK6ygSdr0B4V5CTlm.png', 'png', '2022-06-14 21:27:24', '2022-06-14 21:27:24'),
(159, 15, 3, 'upload/multimedia/rBbQD3WAmbDHULKXeuMt2Wba5dONl5SfyybQ44fg.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(160, 15, 3, 'upload/multimedia/Kor2CE80L2hq2ux4mIO0WrnDP7BN1aIHy3gQWgqi.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(161, 15, 3, 'upload/multimedia/JR2UDDldPZTilEHgnU0P6bxYkTo5Kz85QEeoqJ25.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(162, 15, 3, 'upload/multimedia/6Tg4Tkqvc9bveWksowVdGkVGVXIZlA289WEuPUGB.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(163, 15, 3, 'upload/multimedia/9pHTbXQnqIPj18n5B7pXlsZ9RM2x8xUW7phl5LWQ.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(164, 15, 3, 'upload/multimedia/UBwttjph2F8SPH55GSms5uUMAHt4GxAoFdGcnHxk.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(165, 15, 3, 'upload/multimedia/kJD1X63Ib3qY44JekmrLzRj5acR1HbCpntl8GlTi.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(166, 15, 3, 'upload/multimedia/RIdRnD4op3vZ0AA4db5gLGfY0iRzWyxNdSjGrt1Q.png', 'png', '2022-06-14 21:28:03', '2022-06-14 21:28:03'),
(186, 3, 5, 'upload/multimedia/kDlGSJyciTkvqQ8r1vToDYJeAru3Hy8S4Qewon7d.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(187, 3, 5, 'upload/multimedia/sYvUAmRfuCO3Vjo5lFKh7anL9qlFxIr779OFGzO7.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(188, 3, 5, 'upload/multimedia/rh6CkKEJuGIDtcKXrFx9urLzLvMu2QXtRbIzPINY.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(189, 3, 5, 'upload/multimedia/uSW5MCN58CJVJp9VaImf8y3ZrOuEBX1jXPshddXh.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(190, 3, 5, 'upload/multimedia/bs0MKQaOBSmXvOU9BaoAbZ3mPDHmTEwGIzkIOEXs.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(191, 3, 5, 'upload/multimedia/mHnVBuNklqcXZpV1YIO4HvF9zC9rPSZKqANyvWcc.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(192, 3, 5, 'upload/multimedia/4DxxpjWLUDRb9D4TrNkh5gDpTVvqpGHZpFxmKnY7.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(194, 3, 5, 'upload/multimedia/kDf9jLyjQ25BGihbNSwVuDAhUV9HkSzVB7vfCUt0.png', 'png', '2022-06-15 20:58:31', '2022-06-15 20:58:31'),
(196, 4, 5, 'upload/multimedia/mBQurENu75O4bFDG5YnKGbsWLJtf693y9HMBP7Jh.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(197, 4, 5, 'upload/multimedia/bn8grTzehcsdPs82ZUdP2emeZozcFt5oz2mBtiij.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(198, 4, 5, 'upload/multimedia/0wzDA7Q82zY1IU2Jh9RtUseCnLxHEZheJzawlO4y.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(199, 4, 5, 'upload/multimedia/XsB63LWun3Zz7eYiZW2mEmaEGYdaAJGbMhtn0Jhq.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(200, 4, 5, 'upload/multimedia/DhwStzjT1EelxwfbfLSls49iHN42JNhWZ3pLibDh.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(201, 4, 5, 'upload/multimedia/bNLzgs46XesyrLE1Q5HQuLfhxJ3Yjne5gUhDQ8mR.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(202, 4, 5, 'upload/multimedia/jVPHPUgsxi2ihmRxr4QkiRIp6jcYpe2AzIaFAual.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(203, 4, 5, 'upload/multimedia/UynYVgZqaztxkG3xR06DLF0kzD28R18xzUsSa1lX.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(204, 4, 5, 'upload/multimedia/4MU0ydsAHTGtTWKkxl2LxSsKWlSG4ndbOWH7h8y0.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(205, 4, 5, 'upload/multimedia/aB3shygCZzqMnHNkLoEu0uW20pZdCx5n8qtqCcG3.png', 'png', '2022-06-15 20:59:00', '2022-06-15 20:59:00'),
(206, 3, 5, 'upload/multimedia/H2kTdTE6Hrf8QJyo54GJygoZ9fvIVo0MZ9qN6xiA.gif', 'gif', '2022-06-15 21:37:49', '2022-06-15 21:37:49'),
(207, 1, 6, 'upload/multimedia/ctzBAJEr1932oFy3MxRWY9rFVCc4ky9cCVJ83toE.png', 'png', '2022-06-16 01:30:39', '2022-06-16 01:30:39'),
(208, 1, 6, 'upload/multimedia/ss4i6kQpfQs9aDyLvxTv5G3eOhwDMIs6CpdnwHZA.png', 'png', '2022-06-16 01:30:39', '2022-06-16 01:30:39'),
(209, 1, 6, 'upload/multimedia/VxhwZoSXXZY0gzZtZKVANbtt01uAMGpdRzlJ5iMe.png', 'png', '2022-06-16 01:30:39', '2022-06-16 01:30:39'),
(211, 2, 6, 'upload/multimedia/k9hU0NrudWn15b19Cc4Bu2pmUeVYmMVIAzRpnBYm.png', 'png', '2022-06-16 01:34:23', '2022-06-16 01:34:23'),
(212, 2, 6, 'upload/multimedia/gkNHZoujuJ3oiVbBA6ltS4M4yftAVz6lfoZscwV6.png', 'png', '2022-06-16 01:34:23', '2022-06-16 01:34:23'),
(213, 2, 6, 'upload/multimedia/z0BhsPH8HkGBwApPN37Kyo4ETe8JTZ1RkR20aG34.png', 'png', '2022-06-16 01:34:23', '2022-06-16 01:34:23'),
(214, 2, 6, 'upload/multimedia/7VZ9xzw8RsdXs1NsoZyDKuPiCS6UhxLiFy9ZBsTX.png', 'png', '2022-06-16 01:34:23', '2022-06-16 01:34:23'),
(216, 2, 6, 'upload/multimedia/llRfz0sQOxTL5xhMSEaXbbmTyjCZ042KosVWZMtQ.jpg', 'jpg', '2022-06-16 09:14:11', '2022-06-16 09:14:11'),
(217, 2, 6, 'upload/multimedia/SeKK25c2WogDT2c0Ke1rUzpEU98ynwlyMJNiJcSM.jpg', 'jpg', '2022-06-16 09:14:11', '2022-06-16 09:14:11'),
(218, 3, 1, 'upload/multimedia/9qINcbTqdzcFty4xH73My9qjXyZ7q6yiioaYnyL5.jpg', 'jpg', '2022-07-05 00:27:48', '2022-07-05 00:27:48'),
(219, 3, 1, 'upload/multimedia/pme4TUnJr0bIOFqCD2Dfj80oOcaUT8uj45D9XrUH.jpg', 'jpg', '2022-07-05 00:27:48', '2022-07-05 00:27:48'),
(220, 3, 2, 'upload/multimedia/pKBtfnBV35vHgojStqXlN5F2mU0isyL4EIANRdHP.jpg', 'jpg', '2022-07-05 00:30:33', '2022-07-05 00:30:33'),
(221, 1, 7, 'upload/multimedia/DYD1di5oUvzydGR0QtrDwtDOF2P3ipAGzvGO3myA.jpg', 'jpg', '2022-07-05 00:33:21', '2022-07-05 00:33:21'),
(222, 16, 3, 'upload/multimedia/sQmxuNObukXFXobjBElMBjM2PsGic5DT94Mj5v2t.jpg', 'jpg', '2022-07-05 04:19:34', '2022-07-05 04:19:34'),
(223, 16, 3, 'upload/multimedia/ePDdDjHOOarwjARrJMsf30Nuwh9T2iXiCvkxQ87X.jpg', 'jpg', '2022-07-05 04:19:34', '2022-07-05 04:19:34'),
(224, 3, 1, 'upload/multimedia/Thb5SO6INkg7cf7SAvjWJsttHBTriWfoyhA2Dvwx.jpg', 'jpg', '2022-07-05 19:24:59', '2022-07-05 19:24:59'),
(225, 17, 3, 'upload/multimedia/kPPfrYUjz6qt3WF8LASOVplRxzezsE5Nh166QGT0.jpg', 'jpg', '2022-07-06 19:22:05', '2022-07-06 19:22:05'),
(226, 3, 6, 'upload/multimedia/ax4IdhnQ0By19xZQEw9uUMD8XQE657tBDpHIOAbk.jpg', 'jpg', '2022-07-06 20:09:11', '2022-07-06 20:09:11'),
(227, 18, 3, 'upload/multimedia/Wxk2zpli2k51PvONSw52rYrVAION708nPlAnJUAK.png', 'png', '2022-07-06 20:13:50', '2022-07-06 20:13:50'),
(228, 19, 3, 'upload/multimedia/t95fJBboxthGD7DtHYzyXTnSt24YWt1MBu6dSyo2.png', 'png', '2022-07-06 20:16:10', '2022-07-06 20:16:10'),
(229, 4, 1, 'upload/multimedia/U77QjVoMFb2V13Mo0AM2syTKjrLllKGceBy5AWUm.png', 'png', '2022-07-06 21:23:01', '2022-07-06 21:23:01'),
(230, 4, 6, 'upload/multimedia/yH6yDXjwMDglaCRDHzANFzPvPuo5d4ObI6ub3t8Z.png', 'png', '2022-07-06 21:24:23', '2022-07-06 21:24:23'),
(231, 2, 7, 'upload/multimedia/GzRC6iB3LQZVaQY0nt1bSVxlDqt6AYB7ZMCGPh5D.png', 'png', '2022-07-06 22:05:31', '2022-07-06 22:05:31'),
(232, 5, 6, 'upload/multimedia/1NKpm0dq4stGnN43HTb8Oqrmhqxhbha3EQm4626Y.png', 'png', '2022-07-07 00:06:00', '2022-07-07 00:06:00'),
(233, 3, 7, 'upload/multimedia/xwLmWZGnFsBvWoCqYUScTkVJNDn9MmNxZfsnEVg3.png', 'png', '2022-07-07 00:12:39', '2022-07-07 00:12:39'),
(234, 1, 7, 'upload/multimedia/XSF0tD8KPBHtP1lkZRxZ0cyKD8Zni6N5FVj9BCDg.png', 'png', '2022-07-07 01:32:37', '2022-07-07 01:32:37'),
(235, 16, 3, 'upload/multimedia/hjN4GzRTeqXLzXioAOcgB9Cq0HBRhwbBCGdLGMZx.png', 'png', '2022-07-07 01:53:38', '2022-07-07 01:53:38'),
(236, 18, 3, 'upload/multimedia/x2NObwZwWNAVohyEpPkc1nU2n51suxe024Efc9T8.png', 'png', '2022-07-07 02:02:12', '2022-07-07 02:02:12'),
(238, 20, 3, 'upload/multimedia/mfIDcM3taIM0Z3AJ6YGWyOE3tq3McHQgiaGV5Pb1.png', 'png', '2022-07-07 02:17:12', '2022-07-07 02:17:12'),
(239, 20, 3, 'upload/multimedia/dSUNjXr0ergS30U9hl8KYciGrAR9DP5luMArrQXJ.png', 'png', '2022-07-07 02:17:12', '2022-07-07 02:17:12'),
(240, 3, 6, 'upload/multimedia/a4z9hAuOAomLP31vaxQCqy7bIx7IBiUq5l83KFKe.png', 'png', '2022-07-07 02:36:22', '2022-07-07 02:36:22'),
(241, 3, 6, 'upload/multimedia/tdz40SbZmdWhujztGGwGt3Q4vlEZDnXa0U6ubS1P.png', 'png', '2022-07-07 02:36:22', '2022-07-07 02:36:22'),
(242, 3, 6, 'upload/multimedia/SuPbw8XcETA3TjKVS47DhjBlb672tncLeXAUx7XZ.png', 'png', '2022-07-07 02:36:22', '2022-07-07 02:36:22'),
(243, 18, 3, 'upload/multimedia/L5Z9uprPWxIRiL8xlwsywgbrWexeKD2QJRrjbX53.png', 'png', '2022-07-07 02:37:56', '2022-07-07 02:37:56'),
(244, 18, 3, 'upload/multimedia/VwnPnLbsTHDdnzjGZHatJKQ4eWOhUZsvj9IKYkJG.jpg', 'jpg', '2022-07-07 02:37:56', '2022-07-07 02:37:56'),
(246, 19, 3, 'upload/multimedia/A7xx9B2w0LBjfJZwu1zDsdS7MbaDteCLAv9SIShw.png', 'png', '2022-07-07 02:39:37', '2022-07-07 02:39:37'),
(247, 19, 3, 'upload/multimedia/zGKXzCM05q4q1f7CVnGDqZoK9LLc86WllJAUIdTh.png', 'png', '2022-07-07 02:39:37', '2022-07-07 02:39:37'),
(248, 19, 3, 'upload/multimedia/3VkeI7Ltd1yCkXJVC6z6piCqTpAM1LOjsn0wSbOo.png', 'png', '2022-07-07 02:39:37', '2022-07-07 02:39:37'),
(249, 3, 6, 'upload/multimedia/yCEA40B2o4QHfcAq8zEjLteVt9rN0EERWLxZiFrV.png', 'png', '2022-07-07 02:41:00', '2022-07-07 02:41:00'),
(250, 3, 6, 'upload/multimedia/5EkBUII1hJfL6hn3cELarfCdw9vBanJxSX01z0UZ.png', 'png', '2022-07-07 02:41:00', '2022-07-07 02:41:00'),
(251, 3, 6, 'upload/multimedia/J1lPEJX4WdpbxVzJnEA0waMwzJWvL2Q6edfKBC4A.jpg', 'jpg', '2022-07-07 02:41:00', '2022-07-07 02:41:00'),
(252, 6, 6, 'upload/multimedia/hNtQ71jZ2dv3aUAmuHeiYQIqaczijpnlSDz4wayM.png', 'png', '2022-07-07 02:41:58', '2022-07-07 02:41:58'),
(253, 6, 6, 'upload/multimedia/d6MIb1dQaTSdJKnEcc5hGNKWh96WY9TtjP6v5q59.png', 'png', '2022-07-07 02:41:58', '2022-07-07 02:41:58'),
(254, 6, 6, 'upload/multimedia/gF6nEsBfmX3pj3fB9z484ZfkeG1CVgtten8IvsX9.png', 'png', '2022-07-07 02:41:58', '2022-07-07 02:41:58'),
(264, 7, 4, 'upload/multimedia/n5G0SBPwUUesFtunNNVcUTZXA3Xl8oeAAPJAkbX0.jpg', 'jpg', '2022-07-07 03:20:29', '2022-07-07 03:20:29'),
(267, 7, 4, 'upload/multimedia/qnocQidD1Z3faQakruAGfWI1hzaBTiOFX4XSaiGm.png', 'png', '2022-07-07 04:04:55', '2022-07-07 04:04:55'),
(268, 7, 4, 'upload/multimedia/hZ980YdbAqyMoNUFtphrXDuigzemUQbUQDys9TDK.png', 'png', '2022-07-07 04:05:20', '2022-07-07 04:05:20'),
(269, 7, 4, 'upload/multimedia/zV6DirsiNdOKDYSwnhjX7mlJKa4os2MS4Nxd7XRP.png', 'png', '2022-07-07 04:10:24', '2022-07-07 04:10:24'),
(270, 3, 1, 'upload/multimedia/uNTuFkPE1VWHi2zHHb6vV7zqiCu360X6leSfHfRp.png', 'png', '2022-07-11 19:03:23', '2022-07-11 19:03:23'),
(271, 3, 1, 'upload/multimedia/OYo91aXn786WpiwNYODGK1H1Z4JDKBAFdpaaKlTn.png', 'png', '2022-07-11 19:03:23', '2022-07-11 19:03:23'),
(272, 3, 1, 'upload/multimedia/vaSXNp59yMI0IbGPJyMj5Ic2vfvLIuWFKSlZorXO.png', 'png', '2022-07-11 19:03:23', '2022-07-11 19:03:23'),
(273, 3, 1, 'upload/multimedia/xThW5J9nJzA0rTcoNpEs9C4TkvJLp1806E3Uw1AI.png', 'png', '2022-07-11 19:03:23', '2022-07-11 19:03:23'),
(274, 3, 1, 'upload/multimedia/Q8reL5qYhhqlkqkrpgGCCRJy6Q7uEluosKYbF4Qt.jpg', 'jpg', '2022-07-11 19:03:23', '2022-07-11 19:03:23'),
(275, 1, 1, 'upload/multimedia/JswkxdgIV9YSq2Regu8YFJIshcMl6O17jQ5tV4yy.jpg', 'jpg', '2022-07-11 19:30:41', '2022-07-11 19:30:41'),
(276, 1, 1, 'upload/multimedia/shCGcLUQvTzf9AOj7XVSIKpByeMXUcZq1qsDMHLr.png', 'png', '2022-07-11 19:59:06', '2022-07-11 19:59:06'),
(277, 4, 7, 'upload/multimedia/ebDPKIq7v5MYjsayUhfJZR8DMtrOkFUZBsrwTYmX.png', 'png', '2022-07-12 01:06:55', '2022-07-12 01:06:55'),
(278, 4, 7, 'upload/multimedia/w1fS2h1celSHsyhjCWEFXvl8QA53gFmxRbn9wpwA.png', 'png', '2022-07-12 01:06:55', '2022-07-12 01:06:55'),
(279, 4, 7, 'upload/multimedia/Eu7qO5vynaeVpJonakhZztebeUjck2idvQk0Fpco.png', 'png', '2022-07-12 01:06:55', '2022-07-12 01:06:55'),
(280, 4, 7, 'upload/multimedia/NlFoReWzLdsMDtKz4CUJfprdpEaG7udOdtUqJTMO.jpg', 'jpg', '2022-07-12 01:06:55', '2022-07-12 01:06:55'),
(281, 4, 7, 'upload/multimedia/dxGpfP88bAeWscE1NS62eacryfSpWV4wBxz5WE5w.png', 'png', '2022-07-12 01:06:55', '2022-07-12 01:06:55'),
(282, 1, 7, 'upload/multimedia/MUmMV7HW3ilzwCYj7yt15geNlhzjhC6emkr7yy8w.png', 'png', '2022-07-12 01:18:53', '2022-07-12 01:18:53'),
(283, 1, 7, 'upload/multimedia/Y6AhovqTMbgmLIYvPn2XWMHNJstyFENjbidlx4Xv.png', 'png', '2022-07-12 01:18:53', '2022-07-12 01:18:53'),
(284, 1, 7, 'upload/multimedia/tmTeNww129VgpXEORGtyflYoftXhi970SjBOEeN2.png', 'png', '2022-07-12 01:18:53', '2022-07-12 01:18:53'),
(285, 1, 7, 'upload/multimedia/xeb5XDmixXAk2ujy22isJqnS0O3t3Wg0oni0XaH9.png', 'png', '2022-07-12 01:18:53', '2022-07-12 01:18:53'),
(286, 1, 7, 'upload/multimedia/2qvTxGSFwpO4o9v8ExCQTOO6EzA4uHuKgP9NCLJZ.jpg', 'jpg', '2022-07-12 01:18:53', '2022-07-12 01:18:53'),
(287, 3, 2, 'upload/multimedia/QjluV4lu3U0hZ7oG3RC8Ihz6olP21t7gwNMtzvSM.png', 'png', '2022-07-12 01:49:25', '2022-07-12 01:49:25'),
(288, 3, 2, 'upload/multimedia/xW4hlBSRc2PImso6265YaDpKj7jKMpyjcNics0DV.png', 'png', '2022-07-12 01:49:25', '2022-07-12 01:49:25'),
(289, 3, 2, 'upload/multimedia/V897N2y6bB2x6v2ElBmqGyDHa92SfnwmICOHvUdt.jpg', 'jpg', '2022-07-12 01:49:25', '2022-07-12 01:49:25'),
(290, 3, 2, 'upload/multimedia/yeWJEc1P52UitQXLnBlqsO4cMJ2TYUpWrXHEfvjS.png', 'png', '2022-07-12 01:49:25', '2022-07-12 01:49:25'),
(291, 20, 3, 'upload/multimedia/4foKtfGjCdrnXbOru8wumky9wV2XbdywimRaRFHq.png', 'png', '2022-07-12 03:15:35', '2022-07-12 03:15:35'),
(292, 20, 3, 'upload/multimedia/RjPs8OXeplAdhDyoeQlfPO7QY78XCcYi60UQ35li.png', 'png', '2022-07-12 03:15:35', '2022-07-12 03:15:35'),
(293, 20, 3, 'upload/multimedia/HWn1QiEGaLTXUx96nzyYYWISYi1bb86Mm3h20OuC.png', 'png', '2022-07-12 03:15:35', '2022-07-12 03:15:35'),
(294, 20, 3, 'upload/multimedia/j3KW9lFe8khxgDmUJNMi7DnyQ2Xc42variSusnOy.jpg', 'jpg', '2022-07-12 03:15:35', '2022-07-12 03:15:35'),
(295, 3, 7, 'upload/multimedia/9pBGfG3fw0YyzEXMxTkmsAefLIYA3M3rIMTEWcbV.png', 'png', '2022-07-12 03:16:46', '2022-07-12 03:16:46'),
(296, 3, 7, 'upload/multimedia/LnvQHBb2NpD9yqP3j52MK3U1KIgMwiSaPKKbLzaG.png', 'png', '2022-07-12 03:16:46', '2022-07-12 03:16:46'),
(297, 3, 7, 'upload/multimedia/gmsd1qAy8PAzQaTTYEWleRcC7QByTUdbHa8ywoPh.png', 'png', '2022-07-12 03:16:46', '2022-07-12 03:16:46'),
(298, 3, 7, 'upload/multimedia/B9mLs9yWRkZ6rVNHYB9knB5Xdij1FFYdu8ikHibv.jpg', 'jpg', '2022-07-12 03:16:46', '2022-07-12 03:16:46'),
(299, 3, 7, 'upload/multimedia/nAimDBM4yUaRDkkp4h6ouFQDrPiEmI46ttSJ0LFB.png', 'png', '2022-07-12 03:16:46', '2022-07-12 03:16:46'),
(300, 12, 3, 'upload/multimedia/vJJOoQFelbhqAqJwaQG98DXOBCl1zGAmf9nVgkD8.webp', 'webp', '2022-07-12 18:59:24', '2022-07-12 18:59:24'),
(301, 12, 3, 'upload/multimedia/WeAwV9huecnrFv4CVXkhA98ibiaEEd0hoc6RKQXZ.jpg', 'jpg', '2022-07-12 18:59:24', '2022-07-12 18:59:24'),
(303, 1, 2, 'upload/multimedia/s8j6XRwFbhjm3GeomGffMc0slN22odGH470qEszq.png', 'png', '2022-07-12 20:45:43', '2022-07-12 20:45:43'),
(304, 1, 2, 'upload/multimedia/U3ZCHM6UWBsxfBtKi3yTUJaCqH3FqImhW5iSf2Fe.png', 'png', '2022-07-12 20:45:43', '2022-07-12 20:45:43'),
(305, 1, 2, 'upload/multimedia/3bTjikWJf5heIqinxaBkABK4f25r8IArBBuwgtj8.jpg', 'jpg', '2022-07-12 20:45:43', '2022-07-12 20:45:43'),
(306, 1, 2, 'upload/multimedia/dQyfWXkN9mJBctnnbzWyhRJTHumMkrKBsLueB93c.jpg', 'jpg', '2022-07-12 20:45:43', '2022-07-12 20:45:43'),
(307, 1, 2, 'upload/multimedia/RQMA8t2YtCGfKFI8FfwOaB6X7QaYRfBQuzFix8uP.png', 'png', '2022-07-12 20:47:21', '2022-07-12 20:47:21'),
(308, 21, 3, 'upload/multimedia/jlqxfCE8JSPtAMlPH4o0lEzrqKFio2eNmCbdQd5f.png', 'png', '2022-07-12 20:52:22', '2022-07-12 20:52:22'),
(309, 21, 3, 'upload/multimedia/yRTkCdD3NDObAyqGQ9tTUE9EuFGbrNQSCo9tZ5pD.png', 'png', '2022-07-12 20:52:22', '2022-07-12 20:52:22'),
(310, 21, 3, 'upload/multimedia/HkTxKyXkNnjIM6LQA8p45WYIponu8T3betwiuTkG.png', 'png', '2022-07-12 20:52:22', '2022-07-12 20:52:22'),
(311, 21, 3, 'upload/multimedia/HHJVi0xqdFmkIMpmFyBK021pcFBncps6wmjfcnGL.png', 'png', '2022-07-12 20:52:22', '2022-07-12 20:52:22'),
(312, 21, 3, 'upload/multimedia/wlrv1eXJLkggbgsPSYWr1ItO7N2NAZgK0RJjUUYw.png', 'png', '2022-07-12 20:52:22', '2022-07-12 20:52:22'),
(313, 21, 3, 'upload/multimedia/f9BA9VVYwEoqKa67DSJbHWQKO6ejLEcKZT5xdOoP.jpg', 'jpg', '2022-07-12 20:52:22', '2022-07-12 20:52:22'),
(314, 4, 6, 'upload/multimedia/FJV8r74rp57ocFUC8eGk0WhrNhn8LmMcxijQo5Mc.png', 'png', '2022-07-12 20:53:33', '2022-07-12 20:53:33'),
(315, 4, 6, 'upload/multimedia/6UCnzOxyJOeCrgOsI2V5nTLn823nnlUZkEwQkpQZ.png', 'png', '2022-07-12 20:53:33', '2022-07-12 20:53:33'),
(316, 4, 6, 'upload/multimedia/13X5N9WJk30RWnEf25OX0bS8LWMc3GL4kAVH6CQx.png', 'png', '2022-07-12 20:53:33', '2022-07-12 20:53:33'),
(317, 4, 6, 'upload/multimedia/rNeLpH7QDi4SyV3qUMTD6jhhSOgeVBUL1Quy93L4.png', 'png', '2022-07-12 20:53:33', '2022-07-12 20:53:33'),
(318, 4, 6, 'upload/multimedia/i3g5LdvLXM5Ar9rFRcEiWmeMno07fATWlAlghjuf.jpg', 'jpg', '2022-07-12 20:53:33', '2022-07-12 20:53:33'),
(319, 2, 7, 'upload/multimedia/QBusjQcjKBnioJUSHlAAEDWYFwA3i3IHIpI4s7Nb.png', 'png', '2022-07-12 20:54:21', '2022-07-12 20:54:21'),
(320, 2, 7, 'upload/multimedia/NBWhqSaUpnHC1Kvsf1NxPjxP87QuhbTNQkirsxqZ.png', 'png', '2022-07-12 20:54:21', '2022-07-12 20:54:21'),
(321, 2, 7, 'upload/multimedia/DGRWyIOCyj7C2TpIilSRMzM7VAkoTVSn4exWwOEh.png', 'png', '2022-07-12 20:54:21', '2022-07-12 20:54:21'),
(322, 2, 7, 'upload/multimedia/Rw3rkdR48vWq2t3rStIcZr80pQnFpAQiLh4n2KOR.png', 'png', '2022-07-12 20:54:21', '2022-07-12 20:54:21'),
(323, 2, 7, 'upload/multimedia/mvOEeeMLK80t8m4b4eCn4H3QjjoYyzyZyuyYCeL5.png', 'png', '2022-07-12 20:54:21', '2022-07-12 20:54:21'),
(324, 2, 7, 'upload/multimedia/K929aMK0Xi2E0BghFs2J5gP6NRfH39qzVonns8Nf.jpg', 'jpg', '2022-07-12 20:54:21', '2022-07-12 20:54:21'),
(325, 7, 6, 'upload/multimedia/rTe3RyaHG4uyrn1LoqgbPaT39diNJaB7fAa2InTO.png', 'png', '2022-07-12 20:56:13', '2022-07-12 20:56:13'),
(326, 7, 6, 'upload/multimedia/DnvKZqOLQPgn7Ow7vFr5uqz7Auuwma3KPXvXsSNt.png', 'png', '2022-07-12 20:56:13', '2022-07-12 20:56:13'),
(327, 7, 6, 'upload/multimedia/GJ7K4vxBtU1r7O4HdaMl60uYSnA5uQrl7ODNNtmQ.png', 'png', '2022-07-12 20:56:13', '2022-07-12 20:56:13'),
(328, 7, 6, 'upload/multimedia/ZNrYBet5Gu2rb6vyWw5rdXd9YQQuK8GHv6erpc6e.png', 'png', '2022-07-12 20:56:13', '2022-07-12 20:56:13'),
(329, 7, 6, 'upload/multimedia/6FxhgskvoKTi3v0X6WktMXAMmHMO14H6ANnIN4Lx.png', 'png', '2022-07-12 20:56:13', '2022-07-12 20:56:13'),
(330, 6, 6, 'upload/multimedia/AHRt5XXb9q36ER2kUQKwlrRsOaRQwHqB384ydKWK.png', 'png', '2022-07-12 20:57:45', '2022-07-12 20:57:45'),
(331, 6, 6, 'upload/multimedia/AVJLEczOuGo76WcTcKuOOEZeb2xZuhcziw1sdu7r.png', 'png', '2022-07-12 20:57:45', '2022-07-12 20:57:45'),
(332, 6, 6, 'upload/multimedia/Mh9SATPq5ZO8pApHQ8YcXsEgxMSrWNhvioxgvbjn.png', 'png', '2022-07-12 20:57:45', '2022-07-12 20:57:45'),
(333, 6, 6, 'upload/multimedia/WcvrwfHylUciTa17AZYwk1w9tlc63O0R5zawZWlp.png', 'png', '2022-07-12 20:57:45', '2022-07-12 20:57:45'),
(334, 19, 3, 'upload/multimedia/CSgdMTnENOxaytQouU4WjWz399XaxSb2Sszjl9Ur.png', 'png', '2022-07-12 20:58:00', '2022-07-12 20:58:00'),
(335, 1, 6, 'upload/multimedia/o5xMw8EBpsCnbdXhYzJ6gcu6WiBeh06hW1r7D4qh.png', 'png', '2022-07-12 20:58:37', '2022-07-12 20:58:37'),
(336, 1, 6, 'upload/multimedia/lEm1S02gcheDkEQJUmdSPkKd2NvNeQyxShZZJFrq.png', 'png', '2022-07-12 20:58:37', '2022-07-12 20:58:37'),
(337, 1, 6, 'upload/multimedia/fGdNka6IY6CGE0nMPBGPOffapTfI5bQFU6V2PL3J.png', 'png', '2022-07-12 20:58:37', '2022-07-12 20:58:37'),
(338, 1, 6, 'upload/multimedia/oiF36zVgoqGCOduWPfWcKeOGE0rp1TYkN5LdQig6.png', 'png', '2022-07-12 20:58:37', '2022-07-12 20:58:37'),
(339, 16, 3, 'upload/multimedia/DjygEhTISmWuHPPnVZc3ARnBKZJxI64RNNjXhFOb.png', 'png', '2022-07-12 21:36:31', '2022-07-12 21:36:31'),
(340, 16, 3, 'upload/multimedia/bQjBoxlpvTNNfcQsas13wdVfCYcr5ixa7oQqK2eo.png', 'png', '2022-07-12 21:36:31', '2022-07-12 21:36:31'),
(341, 16, 3, 'upload/multimedia/npc9NBcqebVX7euVqjafUOw1GVIF4JA4id5Kxn53.png', 'png', '2022-07-12 21:36:31', '2022-07-12 21:36:31'),
(342, 16, 3, 'upload/multimedia/6iu6KezgLG82X71Ruf8gisWCKtLQQ8gsRwy5TIfr.png', 'png', '2022-07-12 21:36:31', '2022-07-12 21:36:31'),
(343, 16, 3, 'upload/multimedia/xDepeiSaGeeGIDLZUHNSTIY4ugBKUOGkLJSjNhsA.png', 'png', '2022-07-12 21:36:31', '2022-07-12 21:36:31'),
(344, 16, 3, 'upload/multimedia/y2a2i29E7l87HvbULgmlKz40ilQV1dzfrqHGuypy.png', 'png', '2022-07-12 21:36:31', '2022-07-12 21:36:31'),
(345, 22, 3, 'upload/multimedia/X6ztXqSD1GaHReNTESFf0T8FRBVDLYoiAWr0LDRU.png', 'png', '2022-07-12 21:39:06', '2022-07-12 21:39:06'),
(346, 22, 3, 'upload/multimedia/E7nB17jBBzltoYo2V3LNznGv1inv4zLJ6rkH4irQ.png', 'png', '2022-07-12 21:39:06', '2022-07-12 21:39:06'),
(347, 22, 3, 'upload/multimedia/yhK6SNdq40aEwLfGttxyEL7tEZPEpcEB0YuBwijr.png', 'png', '2022-07-12 21:39:06', '2022-07-12 21:39:06'),
(348, 22, 3, 'upload/multimedia/tDQfVhO9JCfn6FDMdMgiMvMAU7tdKa8CegjsTUbt.png', 'png', '2022-07-12 21:39:06', '2022-07-12 21:39:06'),
(350, 22, 3, 'upload/multimedia/5eGU1oYxQ3Tw06jZb6LC3v2VSulKx0lpGVTtnBXf.png', 'png', '2022-07-12 21:39:06', '2022-07-12 21:39:06'),
(351, 22, 3, 'upload/multimedia/J4buUgqhMrpaxVoAFgHzdYVf5jj1IASmeRQ73Swm.png', 'png', '2022-07-12 21:39:06', '2022-07-12 21:39:06'),
(352, 22, 3, 'upload/multimedia/nZ05bIqzDbybLzBMnrokTo5xqgU6cj055jNNhjRB.jpg', 'jpg', '2022-07-12 21:39:06', '2022-07-12 21:39:06'),
(359, 24, 3, 'upload/multimedia/XjThPFb097Vb1eul3Cjoos5Fs0lvgYscLxCxR7gu.png', 'png', '2022-07-12 21:47:17', '2022-07-12 21:47:17'),
(360, 24, 3, 'upload/multimedia/hhJYKufkxa3juI0hrKvoUkSgH62BEeyrVGpUdRyg.png', 'png', '2022-07-12 21:47:17', '2022-07-12 21:47:17'),
(361, 24, 3, 'upload/multimedia/vJMYUFdqup2juufirq37wlFgJ4vByyqGyu6x2RxC.png', 'png', '2022-07-12 21:47:17', '2022-07-12 21:47:17'),
(362, 24, 3, 'upload/multimedia/pbn6V8cyHzLDLhIe6WIKjQSTcRph0WcoiCAiSMZp.png', 'png', '2022-07-12 21:47:17', '2022-07-12 21:47:17'),
(363, 24, 3, 'upload/multimedia/rNw5J4amUARO9WXclQA7v43yQNik9pUd297GsohF.jpg', 'jpg', '2022-07-12 21:47:17', '2022-07-12 21:47:17'),
(364, 25, 3, 'upload/multimedia/u8EV9hTvVQw6F0SmHNG4bv2mz2pLaooLIjuMfiVN.png', 'png', '2022-07-12 21:50:52', '2022-07-12 21:50:52'),
(365, 25, 3, 'upload/multimedia/0XZkW8mB81Aai9op83BrLWmiOuzHUoAQmfY1LQQI.png', 'png', '2022-07-12 21:50:52', '2022-07-12 21:50:52'),
(366, 25, 3, 'upload/multimedia/FpLTUuD3WVrdqKB9dsS7eulSKb0XOIKDhA5HuOus.png', 'png', '2022-07-12 21:50:52', '2022-07-12 21:50:52'),
(367, 25, 3, 'upload/multimedia/0NyMxrubDKoHed5Hh2Dd7HpNnh4SinJXKOmuc6tj.png', 'png', '2022-07-12 21:50:52', '2022-07-12 21:50:52'),
(369, 25, 3, 'upload/multimedia/VIwpiq36P9tUn9s3QuRHh2wtymcNovhnfUoxfyxN.png', 'png', '2022-07-12 21:50:52', '2022-07-12 21:50:52'),
(370, 25, 3, 'upload/multimedia/UitxnRa7LF68jf55Uk6K61qQgPGVAnVTAy9Y2CMH.png', 'png', '2022-07-12 21:50:52', '2022-07-12 21:50:52'),
(371, 26, 3, 'upload/multimedia/HdJ9VCNDuknFGcxcbZ8Nfsl9gjOl4ckYZECallmH.png', 'png', '2022-07-12 21:53:48', '2022-07-12 21:53:48'),
(372, 26, 3, 'upload/multimedia/QFUD7HzUXPKdhRjYdH4bu4h6v72OW2sY80v9eyrF.png', 'png', '2022-07-12 21:53:48', '2022-07-12 21:53:48'),
(373, 26, 3, 'upload/multimedia/tB45JQYuwYJ5zKcvIXQhFn3wEGWog6kY3dRqc8u7.png', 'png', '2022-07-12 21:53:48', '2022-07-12 21:53:48'),
(374, 26, 3, 'upload/multimedia/wzC4TWyzaAlSPMbePlVN8uIxlPsMXIznLRwjvKNI.png', 'png', '2022-07-12 21:53:48', '2022-07-12 21:53:48'),
(375, 26, 3, 'upload/multimedia/wtrWd735t2JwG5ACxNRMvQHWmlvc1NUFVqPacd7F.jpg', 'jpg', '2022-07-12 21:53:48', '2022-07-12 21:53:48'),
(376, 1, 8, 'upload/multimedia/jYm4NELExpL6A6xR0ePfxVCmaIqqPcZHwvVabKdI.png', 'png', '2022-07-13 00:29:51', '2022-07-13 00:29:51'),
(377, 1, 8, 'upload/multimedia/Z2TvWiQZGyjIstZJml1kvrbvACGZAwaNGhBnU1e9.png', 'png', '2022-07-13 00:29:52', '2022-07-13 00:29:52'),
(378, 1, 8, 'upload/multimedia/NvSgZ9AG0pWd12uvcBQxqPq4ACHW1UwqXpvdJ1Fj.png', 'png', '2022-07-13 00:29:52', '2022-07-13 00:29:52'),
(379, 1, 8, 'upload/multimedia/x59LgaDarn2p2nUL8DU600YpwMrbJgLS1xFh6AdZ.png', 'png', '2022-07-13 00:29:52', '2022-07-13 00:29:52'),
(388, 3, 9, 'upload/multimedia/BUT7E0Tjn2TIqXe8HP8kGcS5KL2ebWMsjZ8SgBaV.png', 'png', '2022-07-13 01:12:43', '2022-07-13 01:12:43'),
(389, 3, 9, 'upload/multimedia/XVFgDM634KcxEq34701Hs3kCta9xUyuDvPsgCLvk.png', 'png', '2022-07-13 01:12:43', '2022-07-13 01:12:43'),
(390, 3, 9, 'upload/multimedia/Ahf8WPl40RYNMSOTBGpg5BIg4qwRV1SDVZdsDjN8.png', 'png', '2022-07-13 01:12:43', '2022-07-13 01:12:43'),
(391, 3, 9, 'upload/multimedia/ZJizFBB9mPSd6zFadXNbrlGVcphNHXYx4DqsTw7C.png', 'png', '2022-07-13 01:12:43', '2022-07-13 01:12:43'),
(392, 4, 9, 'upload/multimedia/h6sUR6k0qY3EVkgsj6dy0mZn9LXAqCapJ1YlFaaQ.png', 'png', '2022-07-13 01:14:15', '2022-07-13 01:14:15'),
(393, 4, 9, 'upload/multimedia/Dz76snT41ns8EaUqS57TPi8WLcFWD9UYAkXaOzsJ.png', 'png', '2022-07-13 01:14:15', '2022-07-13 01:14:15'),
(394, 4, 9, 'upload/multimedia/jEHLfVVAtZBhZLZuEbo7YKZM09pxFvSDQhMaiFlQ.png', 'png', '2022-07-13 01:14:15', '2022-07-13 01:14:15'),
(395, 4, 9, 'upload/multimedia/QsaZywpSMjafmkhv2w34Q7ajh2dcN1it9UdInW4D.png', 'png', '2022-07-13 01:15:02', '2022-07-13 01:15:02'),
(396, 3, 8, 'upload/multimedia/KxGBhsBBptQQayQOY02cUie7AiSo0eIgVyUIJVAt.png', 'png', '2022-07-13 02:15:03', '2022-07-13 02:15:03'),
(397, 3, 8, 'upload/multimedia/9mXLh4OWI1AC4Lrufp1bpFF1pAzDfzfCoPmrKOAd.png', 'png', '2022-07-13 02:15:03', '2022-07-13 02:15:03'),
(398, 3, 8, 'upload/multimedia/fLg4gIMNYUtimJLoTqUWB1BFNp047BksCm312tyn.png', 'png', '2022-07-13 02:15:03', '2022-07-13 02:15:03'),
(399, 4, 8, 'upload/multimedia/yoe3VH9AIvtK7t09GZXu4zWFS3p1H3ATOihEEzcr.png', 'png', '2022-07-13 02:18:02', '2022-07-13 02:18:02'),
(400, 4, 8, 'upload/multimedia/os2dAtCyBLv2HjP9PHYntbQdgV1sR077Sqw0YgqJ.png', 'png', '2022-07-13 02:18:02', '2022-07-13 02:18:02'),
(401, 4, 8, 'upload/multimedia/4WiC4mY8GcclNTsYBWArD6q3lxJkLr20HIHnA9WD.png', 'png', '2022-07-13 02:18:02', '2022-07-13 02:18:02'),
(402, 4, 8, 'upload/multimedia/fPw53bE357uUsUoDsVDejnlanUfb9tL6J08KgsIl.jpg', 'jpg', '2022-07-13 02:18:02', '2022-07-13 02:18:02'),
(403, 5, 8, 'upload/multimedia/lKEbGK8znZixZk4TuSUEcrbDlbEapwKjDNoCoFAR.png', 'png', '2022-07-13 02:18:37', '2022-07-13 02:18:37'),
(404, 5, 8, 'upload/multimedia/xdCdPpqNdOdh284emIDD3UsP3Nwc0zyvlQKHPHWl.png', 'png', '2022-07-13 02:18:37', '2022-07-13 02:18:37'),
(405, 5, 8, 'upload/multimedia/6GmWGpXX6fh9W2XpqkA5rCTK3HYXzRJPXg063HDN.png', 'png', '2022-07-13 02:18:37', '2022-07-13 02:18:37'),
(406, 6, 8, 'upload/multimedia/Ea80RzhHVxvpnUkWRn14YvDNkiEBnCMQbmCAasHM.png', 'png', '2022-07-13 02:20:16', '2022-07-13 02:20:16'),
(407, 6, 8, 'upload/multimedia/ak0ttmcx1EY3NCFjJSpNhjUZ3CMSYlD41IuT7XTx.png', 'png', '2022-07-13 02:20:16', '2022-07-13 02:20:16'),
(408, 6, 8, 'upload/multimedia/DCv4m2wQmOycQAka8k1uxFL1HI8QKbgRwAEwFAap.png', 'png', '2022-07-13 02:20:16', '2022-07-13 02:20:16'),
(409, 7, 8, 'upload/multimedia/UWuwVLx4M1r6QUXNsL519oCdYksTy0Hqv0ugsBJK.png', 'png', '2022-07-13 02:20:47', '2022-07-13 02:20:47'),
(410, 7, 8, 'upload/multimedia/rkY9U72N55kCUNSiBoa1DsSyumc8HdIjSqJvyMII.png', 'png', '2022-07-13 02:20:47', '2022-07-13 02:20:47'),
(411, 7, 8, 'upload/multimedia/AE361C6ycOsTDo3tfzZtjdsxzCVdy3aSDgIFUVTE.png', 'png', '2022-07-13 02:20:47', '2022-07-13 02:20:47'),
(412, 7, 8, 'upload/multimedia/gDUAT1MnsLDhKdEwTjKv8TFj9VXH8SXMTU99p3QM.png', 'png', '2022-07-13 02:20:47', '2022-07-13 02:20:47'),
(413, 8, 8, 'upload/multimedia/BGMTZ26Jw73qK40sFLzDiE7zLBRrXRC9EwncpGJQ.png', 'png', '2022-07-13 02:24:24', '2022-07-13 02:24:24'),
(414, 8, 8, 'upload/multimedia/5DN8PjiA2Lbc5E8wNFV7vr1kb7OxqUYHmgrQXrBU.png', 'png', '2022-07-13 02:24:24', '2022-07-13 02:24:24'),
(415, 8, 8, 'upload/multimedia/AplW76vJpJZMOn3SwrHul1siENhnWdv2LMwcYa2x.png', 'png', '2022-07-13 02:24:24', '2022-07-13 02:24:24'),
(416, 9, 8, 'upload/multimedia/zhO5wVdW738e0dQ1jHH6GAzJwNpkk54GZqmYLIN5.png', 'png', '2022-07-13 02:27:14', '2022-07-13 02:27:14'),
(417, 9, 8, 'upload/multimedia/Z2SACgDAXJOUupmTKzxyiu1efkBDjcrmdMNXa1Yn.png', 'png', '2022-07-13 02:27:14', '2022-07-13 02:27:14'),
(418, 9, 8, 'upload/multimedia/j0MqyMy6UM7I6vxcbeDNMsprkO5mP802o4Wny1d5.png', 'png', '2022-07-13 02:27:14', '2022-07-13 02:27:14'),
(419, 10, 8, 'upload/multimedia/DMdBvcXGmsnGAZAbsM3ejYuHRGgQqXDCXSSfIrj9.png', 'png', '2022-07-13 02:30:56', '2022-07-13 02:30:56'),
(420, 10, 8, 'upload/multimedia/S1FXJflmWqZlKzjzx64dCzX53a13dyIZZw2Z0jr1.png', 'png', '2022-07-13 02:30:56', '2022-07-13 02:30:56'),
(421, 10, 8, 'upload/multimedia/Nh7BzAW2DDAd1Qn0MPSeqsaYqmCBA2WBNqAaYETD.png', 'png', '2022-07-13 02:30:56', '2022-07-13 02:30:56'),
(422, 11, 8, 'upload/multimedia/TBXlo9qDddugY37L8QH4QrLHxdbEck95ZDPPySaA.png', 'png', '2022-07-13 02:35:03', '2022-07-13 02:35:03'),
(423, 11, 8, 'upload/multimedia/z9vmxikVJgo4ZqszuHWr7FPwEY4zvI1x7IWlldLY.png', 'png', '2022-07-13 02:35:03', '2022-07-13 02:35:03'),
(424, 11, 8, 'upload/multimedia/k4EIoI5SKTHDJVPFPE5pwzASc4ym9Bc8y8eK8l4w.png', 'png', '2022-07-13 02:35:03', '2022-07-13 02:35:03'),
(425, 11, 8, 'upload/multimedia/Wk1YW29TMZOzyXrO6m48STIWPmTbQcmJUKVIknJ5.png', 'png', '2022-07-13 02:35:03', '2022-07-13 02:35:03'),
(426, 27, 3, 'upload/multimedia/I8SuS62Bq4AggJCnvqcdYoVSDIQxDVN9sYr6XjGv.png', 'png', '2022-07-13 19:24:00', '2022-07-13 19:24:00'),
(428, 1, 8, 'upload/multimedia/Hoi8YjcClp5fhbRWDH4J2eQxzbYWjLn5yMJXJmWh.png', 'png', '2022-07-13 19:36:24', '2022-07-13 19:36:24'),
(429, 1, 8, 'upload/multimedia/5aSHH3sh71YDMUo2pohjvow2PJVgQ04wQ8JUj6hE.png', 'png', '2022-07-13 19:36:24', '2022-07-13 19:36:24'),
(430, 1, 8, 'upload/multimedia/RN8Couljxggabo5aosh46LapLNREf3qMdjeOzeti.jpg', 'jpg', '2022-07-13 19:36:24', '2022-07-13 19:36:24'),
(431, 3, 8, 'upload/multimedia/CKCYkWNeKYymZ1WWV5xEyxvf0cy31e85LsIkfgjc.png', 'png', '2022-07-13 20:03:21', '2022-07-13 20:03:21'),
(432, 3, 8, 'upload/multimedia/gJyvoXFDzoAJndK9e4wG3cKDIUcz6q2vywKapc7S.png', 'png', '2022-07-13 20:03:21', '2022-07-13 20:03:21'),
(433, 3, 8, 'upload/multimedia/QRDssTnoTq9503Drs3o6XyDTpSbNYI1ptsa0wTvQ.png', 'png', '2022-07-13 20:03:21', '2022-07-13 20:03:21'),
(434, 3, 8, 'upload/multimedia/0OpxekfNMG0OwfxSO5XbaumloPmdemc4nE2zsu00.jpg', 'jpg', '2022-07-13 20:03:21', '2022-07-13 20:03:21'),
(435, 3, 8, 'upload/multimedia/qlfwzXyumhD7t5Cb3fXEhOGKXbtColXw3P1VoNmn.png', 'png', '2022-07-13 20:13:49', '2022-07-13 20:13:49'),
(436, 3, 8, 'upload/multimedia/WCBdq8fG62vpv02XxBH27UKHIXMjo5y9rmCsjlyI.png', 'png', '2022-07-13 20:13:49', '2022-07-13 20:13:49'),
(437, 1, 8, 'upload/multimedia/CPaNp1rU5MEdA8FBW0VJxiFkGbVJEvGl4WbjuIYH.jpg', 'jpg', '2022-07-13 21:03:14', '2022-07-13 21:03:14'),
(438, 8, 9, 'upload/multimedia/0opYqdNt48cwu7cualMF3RznOwtR7BbMas1DoMRr.png', 'png', '2022-07-13 21:43:52', '2022-07-13 21:43:52'),
(439, 8, 9, 'upload/multimedia/vuYl377MoASCLzmqzgnxgfiJyl9UoQ04jIh5SkK5.png', 'png', '2022-07-13 21:43:52', '2022-07-13 21:43:52'),
(440, 8, 9, 'upload/multimedia/ZwtEZotSIIvei51h5ZXvG6tsphSFgVnKrdHO60pD.png', 'png', '2022-07-13 21:43:52', '2022-07-13 21:43:52'),
(441, 8, 9, 'upload/multimedia/AvR0qV3bvFGFne0bELwNpD2rJ9JuiFIxDYrsYbed.png', 'png', '2022-07-13 21:43:52', '2022-07-13 21:43:52'),
(442, 8, 9, 'upload/multimedia/8DbH1psfvT4opGWkjebeK0ot24VlbAe9VGdvct6s.jpg', 'jpg', '2022-07-13 21:43:52', '2022-07-13 21:43:52'),
(443, 8, 9, 'upload/multimedia/Gjv6byczQY3GU9wRuK2PvRImnFU88TFcSlzsefvl.png', 'png', '2022-07-13 21:44:24', '2022-07-13 21:44:24'),
(445, 8, 9, 'upload/multimedia/HlqxZpfXrTJoBPB0waELgY0hy21ld8GHRMjEa2C3.png', 'png', '2022-07-13 21:53:15', '2022-07-13 21:53:15'),
(456, 18, 3, 'upload/multimedia/3VhmPAxqIiCpJGUo3vQH9nLcX421mwp9yUmnGS9k.png', 'png', '2022-07-14 01:18:36', '2022-07-14 01:18:36'),
(457, 18, 3, 'upload/multimedia/CPsy29TNDtKyRS9JruvS4eKfQQr3pvyHxLjBhdob.png', 'png', '2022-07-14 01:18:36', '2022-07-14 01:18:36'),
(461, 6, 1, 'upload/multimedia/NBbfXQsKXmH84SdQTUpprLCyDHQ7IvDa8HbuGhlg.png', 'png', '2022-07-14 02:00:22', '2022-07-14 02:00:22'),
(462, 6, 1, 'upload/multimedia/5PEVZg8XH1efAfC4NfMREBsrsbLmjFedm4IVU5Ez.png', 'png', '2022-07-14 02:00:22', '2022-07-14 02:00:22'),
(463, 6, 1, 'upload/multimedia/NsAmuQOxPB88SYDNYDxaAYHrJF1zDLiJmk7kS3Mz.png', 'png', '2022-07-14 02:00:22', '2022-07-14 02:00:22'),
(464, 6, 1, 'upload/multimedia/25L8khqnkuvRviMdG73wYqHfFfFNBDvsKeRiOIUm.png', 'png', '2022-07-14 02:00:22', '2022-07-14 02:00:22'),
(465, 13, 6, 'upload/multimedia/k2khFo8O49gveUrN80Zdc7RFs6cguwxXtYhhZ2aV.png', 'png', '2022-07-14 02:24:54', '2022-07-14 02:24:54'),
(466, 13, 6, 'upload/multimedia/WtE1iwYzSPPY0FNFkM0obbSMJrlLNcFAYnsBU1Nl.png', 'png', '2022-07-14 02:24:54', '2022-07-14 02:24:54'),
(467, 13, 6, 'upload/multimedia/gHyJPhf9NFAHb4Q8LPMuEfRBnrcrTFQUl4sBrCcn.png', 'png', '2022-07-14 02:24:54', '2022-07-14 02:24:54'),
(468, 7, 1, 'upload/multimedia/MHnSKducHCAukOnKx8WH2RKaJuBIHlTrP0J1IEqT.png', 'png', '2022-07-14 02:26:00', '2022-07-14 02:26:00'),
(469, 7, 1, 'upload/multimedia/6SvGg5GdvmcyQjkSVVrVVItOqhY1u3IfU8jAApJh.png', 'png', '2022-07-14 02:26:00', '2022-07-14 02:26:00'),
(470, 7, 1, 'upload/multimedia/samjvQMqJGBYyfUErYjvWHP4E6HXTUJihC20cgRy.png', 'png', '2022-07-14 02:26:00', '2022-07-14 02:26:00'),
(471, 14, 6, 'upload/multimedia/sd4amiaurHzXCfRWjNwyOsFhi5OWP3HOS5ckRFhe.png', 'png', '2022-07-14 02:27:10', '2022-07-14 02:27:10'),
(472, 14, 6, 'upload/multimedia/YDUtTuVEKsUGb9g0bCXPJ8IbboVvYvDKUGMz4AzI.png', 'png', '2022-07-14 02:27:10', '2022-07-14 02:27:10'),
(473, 14, 6, 'upload/multimedia/QKWCD0oDniB2lhnlSuKe3Oj7EJAzprrtsWIcAejq.png', 'png', '2022-07-14 02:27:10', '2022-07-14 02:27:10'),
(474, 4, 2, 'upload/multimedia/MF5S06mGeGdWsFTQB1Umsp6QqjA3fwE2FK1LmEYV.jpg', 'jpg', '2022-07-14 20:43:43', '2022-07-14 20:43:43'),
(475, 4, 2, 'upload/multimedia/QQJivDpIYYEwtkdtVB3swUZjL8K0hGMphMaXhuu6.png', 'png', '2022-07-14 20:43:43', '2022-07-14 20:43:43'),
(476, 4, 2, 'upload/multimedia/2p0VZqUvB8Krl09ufYRuZZy5bKmqBxUkqh47VoDh.png', 'png', '2022-07-14 20:43:43', '2022-07-14 20:43:43'),
(477, 14, 3, 'upload/multimedia/jgrH4td84mX26urgk1vHTgp8hEoOpLDZsp9dQYHN.jpg', 'jpg', '2022-07-15 03:01:40', '2022-07-15 03:01:40'),
(478, 14, 3, 'upload/multimedia/WVvimozRnWPPVED9fsitASrMrXkghIoHrPAQhR5V.jpg', 'jpg', '2022-07-15 03:01:40', '2022-07-15 03:01:40'),
(479, 14, 3, 'upload/multimedia/JvkG7ANsyjkTGyUMDFqeJghhiWTf2cCCinNFs6c6.png', 'png', '2022-07-15 03:01:40', '2022-07-15 03:01:40'),
(480, 25, 3, 'upload/multimedia/DU1YSgYRUzAyVU8WovsOzalzUVk4rG7BuXAOdsAS.jpg', 'jpg', '2022-07-15 03:06:55', '2022-07-15 03:06:55'),
(481, 25, 3, 'upload/multimedia/Db8LkEr87b31MrjFUjAKeEFP0v1W6NpDAGCNsAJZ.jpg', 'jpg', '2022-07-15 03:06:55', '2022-07-15 03:06:55'),
(482, 28, 3, 'upload/multimedia/GF0hhIl299VazDEIgTgGjfIzZbaRcuJeBu4C53iq.jpg', 'jpg', '2022-07-17 08:02:36', '2022-07-17 08:02:36'),
(483, 28, 3, 'upload/multimedia/G3r3jg4pD1QgEyqEHbGZBAlQx4AcNgXdGgAjKkDh.webp', 'webp', '2022-07-17 08:02:36', '2022-07-17 08:02:36'),
(484, 28, 3, 'upload/multimedia/RH7BiJBqRNVXfiexCPX917p7tVPoAbdo1A0E6fZR.jpg', 'jpg', '2022-07-17 08:02:36', '2022-07-17 08:02:36'),
(485, 28, 3, 'upload/multimedia/F0dsCgDpzLQT2t1NxBWNx8gOTOWjR9ixq31DNyeZ.png', 'png', '2022-07-17 08:02:36', '2022-07-17 08:02:36'),
(489, 30, 3, 'upload/multimedia/85W5pFkmPNSeNNHh5dqu2o5joQDuvG43mwSLMWJD.jpg', 'jpg', '2022-07-17 20:01:06', '2022-07-17 20:01:06'),
(490, 30, 3, 'upload/multimedia/hzIYvwHhziikEPhDPnrIffKNTV31gJiB9AJr9r6I.png', 'png', '2022-07-17 20:01:06', '2022-07-17 20:01:06'),
(491, 30, 3, 'upload/multimedia/6aVrV2TCLN0YY4lQI6ZDfPiaBK7Thyxv1sbNPoYu.png', 'png', '2022-07-17 20:01:06', '2022-07-17 20:01:06'),
(492, 30, 3, 'upload/multimedia/JwuWzfpm18SMKb527wjoLSOrL2GlYENFvkI19laI.png', 'png', '2022-07-17 20:01:06', '2022-07-17 20:01:06'),
(496, 22, 3, 'upload/multimedia/4UU5j53SaFUJPCOU85sLwFDxI7Eg9clrLmtybRW0.jpg', 'jpg', '2022-07-20 02:18:01', '2022-07-20 02:18:01'),
(497, 22, 3, 'upload/multimedia/L3AA8D80QlY6Pv8gDwerffREKfjPncclLWprn07y.jpg', 'jpg', '2022-07-20 02:18:01', '2022-07-20 02:18:01'),
(498, 17, 3, 'upload/multimedia/4TFpkYhQRjoXQkzIC6nRPw80HRUOSxcc6S1XtNVo.jpg', 'jpg', '2022-07-20 02:21:24', '2022-07-20 02:21:24'),
(499, 17, 3, 'upload/multimedia/sRRxowJ6NJl5hGtpkxyLSHCCyA7sJCTluQzkeEmX.png', 'png', '2022-07-20 02:21:24', '2022-07-20 02:21:24'),
(500, 17, 3, 'upload/multimedia/CKPNBBgn1uyc6eFN4JAh7MUtOZMm2YgcKOam6oVs.png', 'png', '2022-07-20 02:21:24', '2022-07-20 02:21:24');
INSERT INTO `multimedia_files` (`id`, `parent_id`, `parent_type`, `src`, `extension`, `created_at`, `updated_at`) VALUES
(501, 17, 3, 'upload/multimedia/JslsNla0YanXeA4lJjGelxuIIsmXNcv1T3lOt5tg.jpg', 'jpg', '2022-07-20 02:21:24', '2022-07-20 02:21:24'),
(503, 17, 3, 'upload/multimedia/Oh5hLYR0ePQ27lMA6FlGnc8U4Pqp66by2gWicgxn.jpg', 'jpg', '2022-07-20 02:21:24', '2022-07-20 02:21:24'),
(504, 17, 3, 'upload/multimedia/AE6jZmugHmVEY1O2u30zXxo8E0wJVXLLRI99nR6r.jpg', 'jpg', '2022-07-20 02:22:26', '2022-07-20 02:22:26'),
(505, 17, 3, 'upload/multimedia/uNbbOsSQkYVfYWsWbt1f25lUWfU5UqBEY0ZNIgws.png', 'png', '2022-07-20 02:22:26', '2022-07-20 02:22:26'),
(506, 5, 2, 'upload/multimedia/Mud0hkb0nP0s3HZDkbcDfqZe5ZFEpWPQTbx2zJb0.svg', 'svg', '2022-07-24 20:45:10', '2022-07-24 20:45:10'),
(507, 5, 2, 'upload/multimedia/usxPUqLeIFrzIXPfbEqaLilXWMXcor1IV016p8ak.svg', 'svg', '2022-07-24 20:45:10', '2022-07-24 20:45:10'),
(508, 5, 2, 'upload/multimedia/9pkYb8cCSt9buK87nAOq6FNJd7crasHj0KLvROAh.svg', 'svg', '2022-07-24 20:45:10', '2022-07-24 20:45:10'),
(509, 5, 2, 'upload/multimedia/0gdBzzs6cEPHsjPha4wzu2JNRByLEekcqwrpLA9y.svg', 'svg', '2022-07-24 20:45:10', '2022-07-24 20:45:10'),
(510, 5, 2, 'upload/multimedia/RhLnG8nRyQRJ4yMRn4F0AD7xJV99OHKEWJNtyFMW.svg', 'svg', '2022-07-24 20:45:10', '2022-07-24 20:45:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurant`
--

CREATE TABLE `restaurant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1:img, 2:video',
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` double(8,2) NOT NULL DEFAULT '5.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `content`, `address`, `banner`, `type`, `map`, `lat`, `lng`, `created_at`, `updated_at`, `rating`) VALUES
(3, 'Ghé quán Lòng “Chat” Tôn Thất Tùng ăn cực chất, nhậu cực đã – Digifood', 'Lòng “Chat” Tôn Thất Tùng ghi điểm trong mắt thực khách bởi không gian quán sạch sẽ, gọn gàng. Hơn hết là các món ăn thơm ngon, đậm vị và mức giá vô cùng phải chăng.', '36bt5-x2, khu đô thị bắc Linh Đàm', 'upload/restaurant/video/g4yNM2ElJRputXGtg4vGGlcrB1oGSRTvAH3m6FHr.mp4', 2, '20.07753545065414, 106.05051021092086', NULL, NULL, '2022-05-28 02:11:12', '2022-05-28 02:11:12', 5.00),
(4, 'Hoàng Anh Food 1', 'Hãy cùng Digifood ghé thăm quán lòng nức tiếng Hà Nội này để chứng thực những điều trên n', 'Ngõ 406, Kim Giang, Thanh Xuân, Hà Nội', 'upload/restaurant/img/fc5x6iDPWRRYLnE9ysFXDRJnXuVZsE7wIBTQvNaO.jpg', 1, '20.96754270037947, 105.825746664215', NULL, NULL, '2022-05-28 02:13:45', '2022-06-21 08:34:59', 4.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurant_culinary`
--

CREATE TABLE `restaurant_culinary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `culinary_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `top` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurant_culinary`
--

INSERT INTO `restaurant_culinary` (`id`, `culinary_id`, `restaurant_id`, `top`, `created_at`, `updated_at`) VALUES
(35, 2, 3, 0, '2022-08-01 21:18:22', '2022-08-01 21:18:22'),
(36, 2, 4, 1, '2022-08-01 21:18:22', '2022-08-01 21:18:22'),
(37, 3, 3, 0, '2022-08-01 21:18:51', '2022-08-01 21:18:51'),
(38, 3, 4, 1, '2022-08-01 21:18:51', '2022-08-01 21:18:51'),
(39, 7, 3, 1, '2022-08-01 21:19:19', '2022-08-01 21:19:19'),
(40, 6, 3, 1, '2022-08-01 21:20:46', '2022-08-01 21:20:46'),
(41, 4, 3, 0, '2022-08-01 21:21:17', '2022-08-01 21:21:17'),
(42, 4, 4, 1, '2022-08-01 21:21:17', '2022-08-01 21:21:17'),
(51, 1, 3, 1, '2022-08-02 00:06:44', '2022-08-02 00:06:44'),
(52, 1, 4, 0, '2022-08-02 00:06:44', '2022-08-02 00:06:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_convenient`
--

CREATE TABLE `room_convenient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `convenient_id` int(11) NOT NULL,
  `name_convenient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_convenient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room_convenient`
--

INSERT INTO `room_convenient` (`id`, `room_id`, `convenient_id`, `name_convenient`, `icon_convenient`, `created_at`, `updated_at`) VALUES
(21, 2, 6, 'Bãi đỗ xe miễn phí', 'upload/booking/convenient/icon/ihXVVHxLhCq7xx0g77SVm4hSI9L9ao0veZKin5aB.svg', '2022-07-07 03:02:41', '2022-07-07 03:02:41'),
(22, 2, 5, 'Điều hòa nhiệt độ', 'upload/booking/convenient/icon/CXglzJN0OybGUW3hJm5Xu0w4HUPH7y09gLh8Y8da.svg', '2022-07-07 03:02:41', '2022-07-07 03:02:41'),
(23, 2, 4, 'Không hút thuốc', 'upload/booking/convenient/icon/DqVZpZvcxdxe38fal2NVIketlXh7xtOZhtbtXJ9t.svg', '2022-07-07 03:02:41', '2022-07-07 03:02:41'),
(24, 2, 3, 'Ban công', 'upload/booking/convenient/icon/QixT02h18ZJvJAg7ExwTkVBd5XaVHXp1h3q3GOBO.svg', '2022-07-07 03:02:41', '2022-07-07 03:02:41'),
(25, 2, 2, 'Sân vườn', 'upload/booking/convenient/icon/52MpzkuxjbQOUaDI9mF2ARnLIb9s581PYAmi0ML0.svg', '2022-07-07 03:02:41', '2022-07-07 03:02:41'),
(26, 2, 1, 'Thang máy', 'upload/booking/convenient/icon/KlW6Iu3lT3rzsvCGVbAreNgUsY4t7QF9OBItFuNs.svg', '2022-07-07 03:02:41', '2022-07-07 03:02:41'),
(27, 1, 6, 'Bãi đỗ xe miễn phí', 'upload/booking/convenient/icon/ihXVVHxLhCq7xx0g77SVm4hSI9L9ao0veZKin5aB.svg', '2022-07-07 03:02:48', '2022-07-07 03:02:48'),
(28, 1, 5, 'Điều hòa nhiệt độ', 'upload/booking/convenient/icon/CXglzJN0OybGUW3hJm5Xu0w4HUPH7y09gLh8Y8da.svg', '2022-07-07 03:02:48', '2022-07-07 03:02:48'),
(29, 1, 4, 'Không hút thuốc', 'upload/booking/convenient/icon/DqVZpZvcxdxe38fal2NVIketlXh7xtOZhtbtXJ9t.svg', '2022-07-07 03:02:48', '2022-07-07 03:02:48'),
(30, 1, 3, 'Ban công', 'upload/booking/convenient/icon/QixT02h18ZJvJAg7ExwTkVBd5XaVHXp1h3q3GOBO.svg', '2022-07-07 03:02:48', '2022-07-07 03:02:48'),
(31, 1, 2, 'Sân vườn', 'upload/booking/convenient/icon/52MpzkuxjbQOUaDI9mF2ARnLIb9s581PYAmi0ML0.svg', '2022-07-07 03:02:48', '2022-07-07 03:02:48'),
(32, 1, 1, 'Thang máy', 'upload/booking/convenient/icon/KlW6Iu3lT3rzsvCGVbAreNgUsY4t7QF9OBItFuNs.svg', '2022-07-07 03:02:48', '2022-07-07 03:02:48'),
(100, 7, 10, 'tiện nghi như ở nhà', 'upload/booking/convenient/icon/fWuYgDeonFFHPwgZLTgwAICtUbUrOWZeBvkBn9VA.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04'),
(101, 7, 7, 'Điều hòa', 'upload/booking/convenient/icon/XtUW5LYU9XT4JUmdd3GVJTGDgCc3pPeah7nGSvvw.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04'),
(102, 7, 6, 'Bãi đỗ xe miễn phí', 'upload/booking/convenient/icon/ool07UaCAfSwhxZQC1QV2DjuOgJ8HtOutxPqQO8K.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04'),
(103, 7, 5, 'Điều hòa nhiệt độ', 'upload/booking/convenient/icon/CXglzJN0OybGUW3hJm5Xu0w4HUPH7y09gLh8Y8da.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04'),
(104, 7, 4, 'Không hút thuốc', 'upload/booking/convenient/icon/DqVZpZvcxdxe38fal2NVIketlXh7xtOZhtbtXJ9t.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04'),
(105, 7, 3, 'Ban công', 'upload/booking/convenient/icon/QixT02h18ZJvJAg7ExwTkVBd5XaVHXp1h3q3GOBO.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04'),
(106, 7, 2, 'Sân vườn', 'upload/booking/convenient/icon/52MpzkuxjbQOUaDI9mF2ARnLIb9s581PYAmi0ML0.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04'),
(107, 7, 1, 'Thang máy', 'upload/booking/convenient/icon/KlW6Iu3lT3rzsvCGVbAreNgUsY4t7QF9OBItFuNs.svg', '2022-08-09 01:47:04', '2022-08-09 01:47:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_hotel`
--

CREATE TABLE `room_hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_video` tinyint(1) NOT NULL DEFAULT '1',
  `hotel_id` int(11) NOT NULL,
  `name_hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_2` int(11) NOT NULL,
  `elevator` tinyint(1) NOT NULL DEFAULT '1',
  `balcony` tinyint(1) NOT NULL DEFAULT '1',
  `smoking` tinyint(1) NOT NULL DEFAULT '1',
  `air_conditional` tinyint(1) NOT NULL DEFAULT '1',
  `garden` tinyint(1) NOT NULL DEFAULT '1',
  `free_parking` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `room_hotel`
--

INSERT INTO `room_hotel` (`id`, `name`, `banner`, `is_video`, `hotel_id`, `name_hotel`, `price`, `price_2`, `elevator`, `balcony`, `smoking`, `air_conditional`, `garden`, `free_parking`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe Sky Residence King 1 Phòng Ngủ', 'upload/room_hotel/img/K391PdOj8MApZBwwf1CutuZEiebQUF1It4eSJW01.png', 0, 1, 'Flamingo Đại Lải Resort', 500000, 1500000, 0, 0, 0, 0, 0, 0, 1, '2022-05-31 04:24:34', '2022-07-07 02:55:04'),
(2, 'Deluxe Sky Residence King 2 Phòng Ngủ', 'upload/room_hotel/img/B7WigEfgPWWS7e6EvVT8AUTnM8wrq60JjqsOt5XJ.png', 0, 1, 'Flamingo Đại Lải Resort', 500000, 1500000, 0, 0, 0, 0, 0, 0, 1, '2022-05-31 04:26:23', '2022-07-07 02:51:43'),
(7, 'vip pro', 'upload/room_hotel/img/RPExHz2Snv1KSxQUWbMasChtbNZ5FP154d3I6SIe.png', 0, 3, '5ka', 85000, 150000, 0, 0, 0, 0, 0, 0, 1, '2022-07-07 03:19:34', '2022-08-09 01:47:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `search_service`
--

CREATE TABLE `search_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` double(8,2) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `search_service`
--

INSERT INTO `search_service` (`id`, `title`, `content`, `ratings`, `location`, `display`, `index`, `src`, `created_at`, `updated_at`) VALUES
(4, 'Tìm kiếm dịch vụ theo vị trí', 'Tìm kiếm dịch vụ theo vị tríTìm kiếm dịch vụ theo vị tríTìm kiếm dịch vụ theo vị tríTìm kiếm dịch vụ theo vị trí', 5.00, 'Park Teyang', 1, 1, 'upload/banner/img/gCPgrDCChJIT2tCTYQ2wxgqXOK2hWcQLmh4eU36u.png', '2022-07-10 19:56:03', '2022-07-10 19:56:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_send` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `is_send`, `created_at`, `updated_at`) VALUES
(1, '0977058273@gmail.com', 0, '2022-07-12 04:08:44', '2022-07-12 04:08:44'),
(2, 'admin@gmail.com', 0, '2022-07-12 19:48:55', '2022-07-12 19:48:55'),
(3, 'ngogsj@gmail.com', 0, '2022-07-14 01:21:42', '2022-07-14 01:21:42'),
(4, 'nguyendatdz001@gmail.com', 0, '2022-08-11 01:39:36', '2022-08-11 01:39:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `super_app`
--

CREATE TABLE `super_app` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Explores` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Destinations` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `super_app`
--

INSERT INTO `super_app` (`id`, `title`, `content`, `Explores`, `Destinations`, `Experience`, `display`, `index`, `img_1`, `img_2`, `img_3`, `created_at`, `updated_at`) VALUES
(1, 'Siêu ứng dụng số một về kết nối dịch vụ tại Vĩnh phúc', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.', '200', '200', '20', 1, 1, 'upload/travel/articles/img/P7pJ3DTYoIQKgxI8zcGYp2B0nuHIa79ZVmvcVecu.png', 'upload/travel/articles/img/tdnMQDt81qtMW8DsVuGLRbdtmSTRWfe1EqW9DIaM.png', 'upload/travel/articles/img/oUbJSJta1ge6OWTHwRZNnGKvzuTDRmb1cHioCPnu.png', '2022-07-11 03:29:16', '2022-07-11 03:29:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `support`
--

INSERT INTO `support` (`id`, `title`, `content`, `phone`, `display`, `index`, `icon`, `src`, `created_at`, `updated_at`) VALUES
(2, 'Hỗ trợ khách hàng mọi lúc mọi nơi 24/7', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.', 978659989, 1, 1, 'upload/travel/articles/img/WvLF8wqUUA5Z1qqdByQ7olkh4weUF6qrBEKzeWbp.svg', 'upload/banner/img/kaCzNYhbLyBfILk6FgmXwKYw2vVblpRuFIh9Hbjl.png', '2022-07-11 00:18:18', '2022-07-11 00:18:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_introduce`
--

CREATE TABLE `table_introduce` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `posts` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_introduce`
--

INSERT INTO `table_introduce` (`id`, `title`, `content`, `src`, `img_1`, `img_2`, `display`, `index`, `author`, `created_at`, `updated_at`, `posts`) VALUES
(1, 'Giới thiệu về Vĩnh Phúc', 'Vĩnh Phúc là tỉnh nằm trong vùng kinh tế trọng điểm Bắc Bộ,cửa ngõ của Thủ đô Hà Nội, gần sân bay Quốc tế Nội Bài,là cầu nối giữa các tỉnh phía Tây Bắc với Hà Nội và đồng bằng châu thổ sông Hồng, vì vậy tỉnh có vai trò rất quan trọng trong chiến ược phát triển kinh tế vùng và quốc gia.\r\n\r\n\r\n\r\nTỉnh Vĩnh Phúc được thành lập từ năm 1950, trên cơ sở sáp nhập 2 tỉnh: Vĩnh Yên và\r\n Phúc Yên, năm 1968 sáp nhập với tỉnh Phú Thọ thành tỉnh Vĩnh Phú, từ ngày 01 tháng 01 năm 1997, tỉnh Vĩnh Phúc được tái lập. Thực hiện chủ trương của Đảng và Nhà nước về mở rộng địa giới hành chính Thủ đô Hà Nội, ngày 01 tháng 8 năm 2008, huyện Mê Linh, tỉnh Vĩnh Phúc chuyển về thành phố Hà Nội.\r\nAhen an unknown printer took a galley of type and their scrambled imaketype specimen book has follorrvived not only fiver centuriewhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting, remaining essentially unchanged. Urna, donec parturient at egestas arcu ut quis non. Volutpat sollicitudin metus, maecenas eu facilisis bibendum sollicitudin habitasse pretium. Eget morbi sed id a. Velit egestas semper posuere donec id felis sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet tortor, nullam vel sapien in mauris lorem maecenas. Elit in imperdiet a dolor mauris donec tellus. Rhoncus feugiat dictum enim eget purus eget.', 'upload/travel/articles/img/oM7dWus335oxgLJrs62RQlQ9UKvIYBFDa9RUivSV.jpg', 'upload/travel/articles/img/Ye4Sl0b1Ol2YkKRNOzaV509q4LmFV6xVcduVkdhQ.jpg', 'upload/travel/articles/img/JwvxCeedaMwNggYvgOGvfDY4XcYEgK321S94p0H2.png', 1, 1, 'Khoa Pug', '2022-07-19 20:19:22', '2022-07-20 00:41:42', '<p>&nbsp;Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p><br />Ahen an unknown printer took a galley of type and their scrambled imaketype specimen book has follorrvived not only fiver centuriewhen an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting, remaining essentially unchanged. Urna, donec parturient at egestas arcu ut quis non. Volutpat sollicitudin metus, maecenas eu facilisis bibendum sollicitudin habitasse pretium. Eget morbi sed id a. Velit egestas semper posuere donec id felis sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet tortor, nullam vel sapien in mauris lorem maecenas. Elit in imperdiet a dolor mauris donec tellus. Rhoncus feugiat dictum enim eget purus eget.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `technology`
--

CREATE TABLE `technology` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `technology`
--

INSERT INTO `technology` (`id`, `title`, `content`, `display`, `index`, `src`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum 1', 'Lorem ipsum 1 Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1', 1, 1, 'upload/banner/img/o7ZreMuFFAdCqPa146R8UutqRsYJhyv2prblhsNr.svg', '2022-07-10 21:20:00', '2022-07-10 21:20:00'),
(3, 'Lorem ipsum 2', 'Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1', 1, 2, 'upload/banner/img/WdEicmoYMh0mRvnY48Owx1Mb71wN2Dc5f8lRjZpx.svg', '2022-07-11 00:02:04', '2022-07-11 00:02:04'),
(4, 'Lorem ipsum 3', 'Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1', 1, 3, 'upload/banner/img/6ELeEoefQlfvzujrFKPoXwuhSzCwUvykO2Bn9aQ6.svg', '2022-07-11 00:02:25', '2022-07-11 00:02:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `title_feature`
--

CREATE TABLE `title_feature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `title_feature`
--

INSERT INTO `title_feature` (`id`, `title`, `content`, `display`, `src`, `index`, `created_at`, `updated_at`) VALUES
(5, 'Tính năng 1', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus..', 1, 'upload/room_hotel/img/DnKvoXcl6A7z3keTBuYKJdT09mD7d52tVJhcokAj.svg', 1, '2022-07-11 01:01:31', '2022-07-11 01:01:31'),
(10, 'Tính năng 2', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus..', 1, 'upload/room_hotel/img/qzd2pcTsouFLQGbvyvnD1zDS2c2wfLjxmtNvQT1n.svg', 1, '2022-07-08 21:47:22', '2022-07-08 21:47:22'),
(11, 'Tính năng 3', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus..', 1, 'upload/banner/img/M3ufj19Oz1w9nM0DLzrrT8LAV40zF4RT8MycmsxX.svg', 3, '2022-07-08 21:47:26', '2022-07-08 21:47:26'),
(12, 'Tính năng 4', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus..', 1, 'upload/banner/img/e592f1YbTnsQAlDL08TK6DvkNz8dvvaBJZeRSz2v.svg', 4, '2022-07-08 21:47:31', '2022-07-08 21:47:31'),
(13, 'Tính năng 5', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat iaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 'upload/banner/img/1CXn9HYienMSWswhzBLISqJPaAL4fGaVzlXcm3rT.svg', 5, '2022-07-08 21:47:37', '2022-07-08 21:47:37'),
(14, 'Tính năng 6', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus..', 1, 'upload/banner/img/ATh0SgUjPhGRmkKFphUUfkxC3EoDvZo4Lm0ICBwG.svg', 6, '2022-07-08 21:47:43', '2022-07-08 21:47:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tradition_people`
--

CREATE TABLE `tradition_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `index` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tradition_people`
--

INSERT INTO `tradition_people` (`id`, `title`, `content`, `posts`, `src`, `img_1`, `img_2`, `display`, `index`, `author`, `created_at`, `updated_at`) VALUES
(2, 'Cuộc sống và con người', 'Vĩnh Phúc là tỉnh nằm trong vùng kinh tế trọng điểm Bắc Bộ, cửa ngõ của Thủ đô Hà Nội, gần sân bay Quốc tế Nội Bài, là cầu nối giữa các tỉnh phía Tây Bắc với Hà Nội và đồng bằng châu thổ sông Hồng, vì vậy tỉnh có vai trò rất quan trọng trong chiến lược phát triển kinh tế vùng và quốc gia.\r\n\r\nTỉnh Vĩnh Phúc được thành lập từ năm 1950, trên cơ sở sáp nhập 2 tỉnh: Vĩnh Yên và Phúc Yên, năm 1968 sáp nhập với tỉnh Phú Thọ thành tỉnh Vĩnh Phú, từ ngày 01 tháng 01 năm 1997, tỉnh Vĩnh Phúc được tái lập. Thực hiện chủ trương của Đảng và Nhà nước về mở rộng địa giới hành chính Thủ đô Hà Nội, ngày 01 tháng 8 năm 2008, huyện Mê Linh, tỉnh Vĩnh Phúc chuyển về thành phố Hà Nội.', '<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>\r\n<p>Vĩnh Ph&uacute;c l&agrave; tỉnh nằm trong v&ugrave;ng kinh tế trọng điểm Bắc Bộ, cửa ng&otilde; của Thủ đ&ocirc; H&agrave; Nội, gần s&acirc;n bay Quốc tế Nội B&agrave;i, l&agrave; cầu nối giữa c&aacute;c tỉnh ph&iacute;a T&acirc;y Bắc với H&agrave; Nội v&agrave; đồng bằng ch&acirc;u thổ s&ocirc;ng Hồng, v&igrave; vậy tỉnh c&oacute; vai tr&ograve; rất quan trọng trong chiến lược ph&aacute;t triển kinh tế v&ugrave;ng v&agrave; quốc gia.</p>\r\n<p>Tỉnh Vĩnh Ph&uacute;c được th&agrave;nh lập từ năm 1950, tr&ecirc;n cơ sở s&aacute;p nhập 2 tỉnh: Vĩnh Y&ecirc;n v&agrave; Ph&uacute;c Y&ecirc;n, năm 1968 s&aacute;p nhập với tỉnh Ph&uacute; Thọ th&agrave;nh tỉnh Vĩnh Ph&uacute;, từ ng&agrave;y 01 th&aacute;ng 01 năm 1997, tỉnh Vĩnh Ph&uacute;c được t&aacute;i lập. Thực hiện chủ trương của Đảng v&agrave; Nh&agrave; nước về mở rộng địa giới h&agrave;nh ch&iacute;nh Thủ đ&ocirc; H&agrave; Nội, ng&agrave;y 01 th&aacute;ng 8 năm 2008, huyện M&ecirc; Linh, tỉnh Vĩnh Ph&uacute;c chuyển về th&agrave;nh phố H&agrave; Nội.</p>', 'upload/travel/articles/img/ZZVr5PQTKUDUCbU5dCcO2GBwdJVSPirPrFNzr9AT.jpg', 'upload/travel/articles/img/Z7SSRfEsYHVGE19xxSsa08PVlTY9Di48foaNr4jw.png', 'upload/travel/articles/img/U1PaIxKqN4VDDWhRf6lsQXjfZBQMlatgnsJyIqWa.png', 1, 1, 'Khoa Pug', '2022-07-20 01:17:57', '2022-07-20 01:19:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `travel_articles`
--

CREATE TABLE `travel_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_video` int(11) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_img` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_video` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `index` int(11) DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `layout` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1:home, 2:booking, 3:culinary, 4:gian hang',
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `travel_articles`
--

INSERT INTO `travel_articles` (`id`, `title`, `slug`, `banner`, `category`, `name_category`, `is_video`, `content`, `content_img`, `video_review`, `content_video`, `rating`, `created_by`, `index`, `display`, `layout`, `created_at`, `updated_at`, `type`, `src`) VALUES
(3, 'Tây Thiên nên đi tháng mấy?', 'tay-thien-nen-di-thang-may', 'upload/explore_tourism/articles/img/A51xv3uk8J0rsThTnP0dhpkOZ03xLZZJ11tfTCqd.jpg', 3, 'Kinh nghiệm du lịch', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet tortor, nullam vel sapien in mauris lorem maecenas. Elit in imperdiet a dolor mauris donec tellus. Rhoncus feugiat dictum enim eget purus eget. Lorem metus, platea nullam amet. In praesent odio suspendisse habitasse egestas tempus.<br />Urna, donec parturient at egestas arcu ut quis non. Volutpat sollicitudin metus, maecenas eu facilisis bibendum sollicitudin habitasse pretium. Eget morbi sed id a. Velit egestas semper posuere donec id felis sodales.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet tortor, nullam vel sapien in mauris lorem maecenas. Elit in imperdiet a dolor mauris donec tellus. Rhoncus feugiat dictum enim eget purus eget. Lorem metus, platea nullam amet. In praesent odio suspendisse habitasse egestas tempus.<br />Urna, donec parturient at egestas arcu ut quis non. Volutpat sollicitudin metus, maecenas eu facilisis bibendum sollicitudin habitasse pretium. Eget morbi sed id a. Velit egestas semper posuere donec id felis sodales.</p>', 'upload/explore_tourism/articles/review/7kBqXy4JnYRR9hIs63CMTExslYGCRtakb0OQvWMU.mp4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet tortor, nullam vel sapien in mauris lorem maecenas. Elit in imperdiet a dolor mauris donec tellus. Rhoncus feugiat dictum enim eget purus eget. Lorem metus, platea nullam amet. In praesent odio suspendisse habitasse egestas tempus.<br />Urna, donec parturient at egestas arcu ut quis non. Volutpat sollicitudin metus, maecenas eu facilisis bibendum sollicitudin habitasse pretium. Eget morbi sed id a. Velit egestas semper posuere donec id felis sodales.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet tortor, nullam vel sapien in mauris lorem maecenas. Elit in imperdiet a dolor mauris donec tellus. Rhoncus feugiat dictum enim eget purus eget. Lorem metus, platea nullam amet. In praesent odio suspendisse habitasse egestas tempus.<br />Urna, donec parturient at egestas arcu ut quis non. Volutpat sollicitudin metus, maecenas eu facilisis bibendum sollicitudin habitasse pretium. Eget morbi sed id a. Velit egestas semper posuere donec id felis sodales.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis in sagittis, tempus netus dictum consequat imperdiet lorem purus. Eget aliquam, at arcu turpis dignissim nisl morbi massa. Sed morbi tortor elementum in ullamcorper lorem tortor molestie. Amet tortor, nullam vel sapien in mauris lorem maecenas. Elit in imperdiet a dolor mauris donec tellus. Rhoncus feugiat dictum enim eget purus eget. Lorem metus, platea nullam amet. In praesent odio suspendisse habitasse egestas tempus.<br />Urna, donec parturient at egestas arcu ut quis non. Volutpat sollicitudin metus, maecenas eu facilisis bibendum sollicitudin habitasse pretium. Eget morbi sed id a. Velit egestas semper posuere donec id felis sodales.</p>', 5.00, 1, 1, 1, 1, '2022-06-02 01:38:58', '2022-07-17 08:31:46', 1, 'upload/explore_tourism/articles/img/ueYQmCFtEuTuUDeGg1pVzVAic2Cbue8GkgFMJ8ku.jpg'),
(5, 'Ăn gì ở Tam Đảo?', 'an-gi-o-tam-dao', 'upload/explore_tourism/articles/img/75pkZNQRWkozB2jJvWQrN95Im5Rj27aJNU8ZODFI.png', 4, 'Ẩm thực', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>\r\n<p>&nbsp;</p>', 'upload/explore_tourism/articles/review/fg3RcppcvGAwetYfDn6qbjiBTL4m6g7RZOT9hBL5.mp4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>', 4.50, 1, 1, 1, 1, '2022-06-14 20:36:57', '2022-07-17 08:32:56', 1, 'upload/travel/articles/img/ApW8fK09fgbtudWkCY57d0HXJiRscHc7n4KbZzjB.jpg'),
(6, 'Những quán ăn ngon tại Đại Lải', 'nhung-quan-an-ngon-tai-dai-lai', 'upload/explore_tourism/articles/img/CrNvuaER39j7DPBSXTDYlI2rIuVBoqBXgaz6siY4.png', 4, 'Ẩm thực', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>', 'upload/explore_tourism/articles/review/N6SOD8d4xmfOGCLcy4VUO9YiPpSzF3E35zPFqdeU.mp4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>', 5.00, 1, 2, 1, 1, '2022-06-14 20:39:34', '2022-07-17 08:38:55', 1, 'upload/travel/articles/img/VvpjMxBxDB8x7NDt7iyms6srUFECjeOKww6FjU7q.jpg'),
(7, 'Những món ăn truyền thống', 'nhung-mon-an-truyen-thong', 'upload/explore_tourism/articles/img/Gyidg5S6VHxutyWX4AgqYdC8nZsieTOawX9ufBh6.png', 4, 'Ẩm thực', 0, 'Những món ăn truyền thốngNhững món ăn truyền thống', '<p>Những m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thống</p>', 'upload/explore_tourism/articles/review/mpLwgRuE5kDiQg5RhBlHQeg8WCeUKvEr5UlfsKG8.mp4', '<p>Những m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thốngNhững m&oacute;n ăn truyền thống</p>', 5.00, 1, 3, 1, 1, '2022-06-14 20:40:45', '2022-07-17 08:39:13', 1, 'upload/travel/articles/img/zFh8JcbV0FI2BK6DvOOcM7BS8Zc4qnZ5as2e7HLq.webp'),
(8, 'Phong dep dai lai', 'phong-dep-dai-lai', 'upload/explore_tourism/articles/img/4QPXTcDOa1qB8U81PfPq2SVXvdxnCA5S3uXZls8u.png', 5, 'Booking', 0, 'asdasdasdadsasd', '<p>asdasdaadasdasdasdaadasdasdasdaadasdasdasdaadasd</p>', 'upload/explore_tourism/articles/review/YCleIB1j8c287WuSwAAdpx8cZL2OWgHNfMIvTsL7.mp4', '<p>asdasdaadasdasdasdaadasdasdasdaadasdasdasdaadasd</p>', 5.00, 1, 6, 1, 1, '2022-06-14 20:56:26', '2022-07-17 08:39:27', 1, 'upload/travel/articles/img/fALg1e3a8m46H7A9xTMdJqOFEYoDJLlReW9WABW0.jpg'),
(9, 'Phong dep muong thanh', 'phong-dep-muong-thanh', 'upload/explore_tourism/articles/img/2qTpdj4vtcHM8akUJEyzVel0hgnk6EZu29dbqIJc.png', 5, 'Booking', 0, '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human', '<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>', 'upload/explore_tourism/articles/review/cb2onp5dbSGM4gSQhR5YWgviZRjMUt6sJH2HLPuF.mp4', '<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>', 5.00, 1, 7, 1, 1, '2022-06-14 20:57:31', '2022-07-17 08:39:45', 1, 'upload/travel/articles/img/SGLouXX6Dtfar2kXqAq4qyusGeRlPIMD7CVXotyZ.jpg'),
(10, 'Phòng đẹp homstay city', 'phong-dep-homstay-city', 'upload/explore_tourism/articles/img/CMjJpeB8iLPT4ycqBHgPCupfB5ZbcGDY5yXfl5rU.png', 5, 'Booking', 0, '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human', '<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>', 'upload/explore_tourism/articles/review/JBOSHAwugGjurewvYpMHClGnge39wVdABVPGNqnm.mp4', '<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>', 4.50, 1, 8, 1, 1, '2022-06-14 21:01:25', '2022-07-17 08:51:23', 1, 'upload/travel/articles/img/WiBGH88wnozrvGN6vxqjcakP10OZlAte7KL4mZNk.jpg'),
(11, 'Top 5 điểm du lịch quanh Vĩnh Phúc  siêu hấp dẫn phải dụ “cạ cứng” đi ngay', 'top-5-diem-du-lich-quanh-vinh-phuc-sieu-hap-dan-phai-du-ca-cung-di-ngay', 'upload/explore_tourism/articles/img/D7ju1K5l1NH0lIdJ26FggA3mhONx2lmdxyc5nVrM.png', 7, 'tin tuc', 0, 'Top 5 điểm du lịch quanh Vĩnh Phúc  siêu hấp dẫn phải dụ “cạ cứng” đi ngayTop 5 điểm du lịch quanh Vĩnh Phúc  siêu hấp dẫn phải dụ “cạ cứng” đi ngayTop 5 điểm du lịch quanh Vĩnh Phúc  siêu hấp dẫn phải dụ “cạ cứng” đi ngay', '<p>Top 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngay</p>', 'upload/explore_tourism/articles/review/8jZ6QbV427ftUnejpObPVc5rHSVMmTU1vt1hULU5.mp4', '<p>Top 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngayTop 5 điểm du lịch quanh Vĩnh Ph&uacute;c &nbsp;si&ecirc;u hấp dẫn phải dụ &ldquo;cạ cứng&rdquo; đi ngay</p>', 5.00, 1, 8, 1, 1, '2022-06-14 21:24:38', '2022-07-17 08:44:16', 1, 'upload/travel/articles/img/mNAcPSVVLtIpQEJR0Qv3enOeOlwATksqY9u1a7yB.png'),
(12, 'Du lịch tại chỗ - Xu hướng du lịch mùa Covid', 'du-lich-tai-cho-xu-huong-du-lich-mua-covid', 'upload/explore_tourism/articles/img/0NE4FtYm1u3nIJ8vRFu9E6KlSKsaTA30UPSi8Y4Z.png', 7, 'tin tuc', 0, 'Du lịch tại chỗ - Xu hướng du lịch mùa CovidDu lịch tại chỗ - Xu hướng du lịch mùa CovidDu lịch tại chỗ - Xu hướng du lịch mùa Covid', '<p>Du lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a Covid</p>', 'upload/explore_tourism/articles/review/nllwoaA8l82pED9cwKMR8sjAISif7KJhC0dT41cb.mp4', '<p>Du lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a Covid</p>', 4.50, 1, 3, 1, 1, '2022-06-14 21:25:37', '2022-07-17 08:42:46', 1, 'upload/travel/articles/img/mJWhklxZgws4RuhYxoQWIKOTpa6YIyIpXtvsVBv7.jpg'),
(13, 'Điển du lịch  Pleiku khiến bạn muốn xách balo  lên và đi ngay', 'dien-du-lich-pleiku-khien-ban-muon-xach-balo-len-va-di-ngay', 'upload/explore_tourism/articles/img/tsqlxWBcR4muEClYZlvuuay18voyacuLiUovktJH.png', 7, 'tin tuc', 0, 'Du lịch tại chỗ - Xu hướng du lịch mùa CovidDu lịch tại chỗ - Xu hướng du lịch mùa CovidDu lịch tại chỗ - Xu hướng du lịch mùa Covid', '<p>Điển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngay</p>', 'upload/explore_tourism/articles/review/AZt7b55D69TDSg5FrfYnDF8NUiBnBp3RJNe3Tvgh.mp4', '<p>Điển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngayĐiển du lịch &nbsp;Pleiku khiến bạn muốn x&aacute;ch balo &nbsp;l&ecirc;n v&agrave; đi ngay</p>', 5.00, 1, 7, 1, 1, '2022-06-14 21:26:28', '2022-07-17 08:44:35', 1, 'upload/travel/articles/img/Y4hc9IIWNNqZiWnpiMlNjhLjZ5YyNXrk7cxIJSu6.jpg'),
(14, 'Du lịch tại chỗ', 'du-lich-tai-cho', 'upload/explore_tourism/articles/img/qqO44iejI3ykBodHdIVVUaCq9L2VFAiGpj5gKpvp.png', 7, 'tin tuc', 0, 'Du lịch tại chỗ - Xu hướng du lịch mùa CovidDu lịch tại chỗ - Xu hướng du lịch mùa CovidDu lịch tại chỗ - Xu hướng du lịch mùa Covid', '<p>Du lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a Covid</p>', 'upload/explore_tourism/articles/review/5H41oZX9Nhsm5e68a5hgmsFvjT9NF771q8Vzpqpm.mp4', '<p>Du lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a CovidDu lịch tại chỗ - Xu hướng du lịch m&ugrave;a Covid</p>', 4.50, 1, 9, 1, 1, '2022-06-14 21:27:24', '2022-07-17 08:44:50', 1, 'upload/travel/articles/img/Vzo66yhXc3r0eHswWaqSjKA2rgAQnNQ27jEns56V.png'),
(15, 'Kinh doanh dễ dàng hơn với ứng dụng dành cho đối tác', 'kinh-doanh-de-dang-hon-voi-ung-dung-danh-cho-doi-tac', 'upload/explore_tourism/articles/img/OuuiuSpbwaztVJzE5HYAYhMkOr4vWtp9JUKX8xtI.png', 7, 'tin tuc', 0, 'Kinh doanh dễ dàng hơn với ứng dụng dành cho đối tácKinh doanh dễ dàng hơn với ứng dụng dành cho đối tácKinh doanh dễ dàng hơn với ứng dụng dành cho đối tác', '<p>Kinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;c</p>', 'upload/explore_tourism/articles/review/1CH3bQ2cWTAWRR2YM4w5GCBnTUCpD3oU5P7dQ7qp.mp4', '<p>Kinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;cKinh doanh dễ d&agrave;ng hơn với ứng dụng d&agrave;nh cho đối t&aacute;c</p>', 4.50, 1, 6, 1, 1, '2022-06-14 21:28:03', '2022-07-17 08:38:02', 1, 'upload/travel/articles/img/q13JXDIwPuiGIPSKpL1rM57bwmqW21iKfNA3lZR7.webp'),
(16, 'hot', 'hot', 'upload/explore_tourism/articles/img/UGKqRE62N52AMztru0ClIdSA7n2684RlgnkKTgnk.jpg', 1, 'Tin tức nổi bật', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor', '<p>adasdasdasaaaaaaaaaaaaaaaaa</p>', 'upload/explore_tourism/articles/review/YwF00Dthi468FeDOz1WmdVwl8PrK1hCsCl8qP8VN.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaa</p>', 5.00, 1, 1, 1, 1, '2022-07-05 04:19:34', '2022-07-17 08:45:34', 1, 'upload/travel/articles/img/RsIrPfeu3MeR3tQZTA0ByP7iKZoUrRYODXPgT01d.png'),
(17, 'Hàng về', 'hang-ve', 'upload/explore_tourism/articles/img/BJx8fkIziVqY1HxeLhwmrTbvm1cmi3rjUNCQlafT.jpg', 6, 'Gian Hàng', 0, 'asafsdgdhwrqqqqaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n<p>aaaaaaaaaaaaaaa</p>\r\n<p>aaaaaaaaaaaa</p>\r\n<p>aaaaaaaaaa</p>\r\n<p>aaaaaa</p>', 'upload/explore_tourism/articles/review/iFrPOhFFH0bIrKUUcmDeskzbj78wQ4At7n348PGY.mp4', '<p>aasfafdgdfaskndl ;rpjr jpwjdsm;da</p>', 5.00, 1, 2, 1, 1, '2022-07-06 19:22:05', '2022-07-17 08:41:13', 1, 'upload/travel/articles/img/iLcGzFz3irlMS1dvsqoytuD2fymjtWMjtiFK8qch.png'),
(18, 'Những điểm đẹp Tam Đảo', 'nhung-diem-dep-tam-dao', 'upload/explore_tourism/articles/video/UmGwenJcGWwyX5AYBFcrui5ycB9wlkoKHfBjjL6L.mp4', 1, 'Nhà nghỉ', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor', '<p>Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.</p>\r\n<div class=\"ddict_btn\" style=\"top: 32px; left: 226.238px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/explore_tourism/articles/review/NohrWRPu3zbua2cADm3RR4VuvZq92h3t1SNn4dFM.mp4', '<p>Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.Lorem ipsum dolor , consectetur adipiscing elit.</p>\r\n<div class=\"ddict_btn\" style=\"top: 25px; left: 234.012px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 5.00, 1, 1, 1, 1, '2022-07-06 20:13:50', '2022-08-02 19:52:43', 2, 'upload/travel/articles/img/qPHuyZnGfu70NgoVEM93wOL9Cx5djng2Dqi8xy5J.jpg'),
(19, 'Những điểm đẹp Tam Đảoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'nhung-diem-dep-tam-daoaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'upload/explore_tourism/articles/img/b7ghefHAmbYG6XqkZVmvwtm8fxY3B395EGQzE1Io.png', 1, 'Nhà nghỉ', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>\r\n<div class=\"ddict_btn\" style=\"top: 17px; left: 23.7875px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/explore_tourism/articles/review/5U1PuKvLPiMLoRcgSTf1ULrOZsn5DYWd3Jr7vxYS.mp4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor</p>\r\n<div class=\"ddict_btn\" style=\"top: 26px; left: 23.7875px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 5.00, 1, 1, 1, 1, '2022-07-06 20:16:10', '2022-07-17 19:50:50', 2, 'upload/travel/articles/img/GshGXkcsfASe2anuThTonRDeZ8WzuZtDkTxjWRU1.jpg'),
(20, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'upload/explore_tourism/articles/img/3w8j9S2hAPflTNidelxC52P69L4YRejKqh1GipsY.png', 3, 'Kinh nghiệm du lịch', 0, 'aaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaa\r\naaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/explore_tourism/articles/review/xrDmjv1eE1y6VuVy33fwBrwnVgcaV1gQfH7igPUC.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 5.00, 1, 1, 1, 1, '2022-07-07 02:17:12', '2022-07-17 08:40:58', 1, 'upload/travel/articles/img/tlMQ25td71C3hNb5LCj41ngaDu2qFVePCClr5ASK.webp'),
(21, 'Món ăn ngon toàn ở đây thôiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'mon-an-ngon-toan-o-day-thoiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'upload/explore_tourism/articles/img/JYOip2xKSyUwR19gfCQrf2kCoLLcNOjzCTSr2vqY.png', 1, 'BBQ', 0, 'Món ăn ngon toàn ở đây thôiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiMón ăn ngon toàn ở đây thôiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiMón ăn ngon toàn ở đây thôiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '<p>M&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>', 'upload/explore_tourism/articles/review/VOs3iR1uw4CZqhXgIsBt9Qrvuv941jT8t0YrWNMh.mp4', '<p>M&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiM&oacute;n ăn ngon to&agrave;n ở đ&acirc;y th&ocirc;iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>', 4.00, 1, 1, 1, 1, '2022-07-12 20:52:22', '2022-07-17 20:07:26', 3, 'upload/travel/articles/img/TpWhLEcgy5kLP4Hned6cITOClGvHXWlK6OD9Xhdg.png'),
(22, 'áasassssssssssssssssssssssssaaaaaaaaaaaaa', 'aasassssssssssssssssssssssssaaaaaaaaaaaaa', 'upload/explore_tourism/articles/img/LyD2LMhHqxkqNxNgXEJaiOjVr7ravbvDuN4BETaC.png', 3, 'Kinh nghiệm du lịch', 0, 'aaaaaaaaaaaaaaaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n<div class=\"ddict_btn\" style=\"top: 34px; left: 350.812px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/explore_tourism/articles/review/1SGYsEuzD3GSvLHgGfAYPODK0DE5iqqX4FJlrcpG.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 4.00, 1, 1, 1, 1, '2022-07-12 21:39:06', '2022-07-17 08:40:44', 1, 'upload/travel/articles/img/mQhUq3jkRS3yt8SRbJSaIJUyYrUZfHR30GIihtWj.jpg'),
(24, 'aaaaaaaaaaaaaa aaaaaaaaa aaa', 'aaaaaaaaaaaaaa-aaaaaaaaa-aaa', 'upload/explore_tourism/articles/img/Qao2bm03MfbvfWXAFI1Ch3QqhMhAYY5N73xvbemF.png', 1, 'Tin tức nổi bật', 0, 'aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/explore_tourism/articles/review/Fp6TAhY2nqutWjPHzhhVI3O3Oz8xRUVM3mKnnKYB.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 5.00, 1, 2, 1, 1, '2022-07-12 21:47:17', '2022-07-17 08:40:33', 1, 'upload/travel/articles/img/0Rli6MDEgY9ku0kSvDfHqeZfaPduCGK41k3JNWIN.jpg'),
(25, 'bbbbbbbbbbb bbbbbbbbb bbbbbbbbbbbbbb bbbb', 'bbbbbbbbbbb-bbbbbbbbb-bbbbbbbbbbbbbb-bbbb', 'upload/explore_tourism/articles/img/hQaWcSGrWJvSyHbqiWzkKuVtOTmp8LAPVoQ1f5rX.png', 1, 'Tin tức nổi bật', 0, 'bbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbb', '<p>bbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbb</p>', 'upload/explore_tourism/articles/review/EcLRwshE0d8dKKhs8YzbhhAXBpcAWQ5vLN8PNtSy.mp4', '<p>bbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbb bbbbbbbbb</p>', 4.00, 1, 1, 1, 1, '2022-07-12 21:50:52', '2022-07-17 08:40:22', 1, 'upload/travel/articles/img/pA0P8xhdbQSKZtqI9haoKsUntDFR6iU2VvFBz8wK.jpg'),
(26, 'ăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yy', 'an-j-daayyyyyyyyyyyyyyy-yyyyyyyyyyyyyyyyyyyy-yy', 'upload/explore_tourism/articles/img/JcaR6qFtsUwHkAiwGcdZQUj33DlceyJDtZ2QyTIa.png', 4, 'Ẩm thực', 0, 'ăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yy', '<p>ăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yy</p>', 'upload/explore_tourism/articles/review/1jZ8mhldT7uDg6YaYPDGmA2UE1I8MnArr7OyHFgw.mp4', '<p>ăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yyăn j daayyyyyyyyyyyyyyy yyyyyyyyyyyyyyyyyyyy yy</p>', 5.00, 1, 1, 1, 1, '2022-07-12 21:53:48', '2022-07-17 08:40:10', 1, 'upload/travel/articles/img/FdFlqSgvWWBPzVnigFD9r2MVTLQmqGG13vsekdZk.webp'),
(27, 'a', 'a', 'upload/explore_tourism/articles/img/FhGeGwpCPdS8XWqlbze1bHukAZ0t9sdOeAMq0ZJD.png', 1, 'Tin tức nổi bật', 0, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'upload/explore_tourism/articles/review/roo8HBpZNTK4LoysjxClSzlp9YW324Rx0ELXLVJR.mp4', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 5.00, 1, 10, 1, 1, '2022-07-13 19:24:00', '2022-07-17 08:38:36', 1, 'upload/travel/articles/img/Hz79BwLbQ7S9ZjvAw7nc7ndTb6bwJnWgeKrCLMo3.jpg'),
(28, 'aq', 'aq', 'upload/explore_tourism/articles/img/oie5Ft2Toy3wLt4NHlDuUgjCP1r2UGsMnBEWdxPs.jpg', 1, 'Tin tức nổi bật', 0, 'aq', '<p>a</p>', 'upload/explore_tourism/articles/review/azMaOkgmIMpS4pokW6EWBsSKp6Jee5dttdkzaBnE.mp4', '<p>a</p>', 5.00, 1, 20, 1, 1, '2022-07-17 08:02:36', '2022-07-17 08:30:39', 1, 'upload/travel/articles/img/D9BNNFgggmOceh8lg7D5WNoLSCTTMKIYR9zQtqgB.jpg'),
(30, 'awe', 'awe', 'upload/explore_tourism/articles/img/h6H1LgPWTh0YSUWxU0sQgrPnJfnTEGYJCjAo0xl4.png', 1, 'BBQ', 0, 'awe', '<p>a</p>', 'upload/explore_tourism/articles/review/tumchDTfHr2l6wnkD4ET7eLLTFuaffUj7odUxikl.mp4', '<p>aaaaaaaaaa</p>', 5.00, 1, 10, 1, 1, '2022-07-17 20:01:06', '2022-07-17 20:01:06', 3, 'upload/travel/articles/img/HdPUXz1uhLMA9yNXbN4TXtC6exIbOyeTTiHnQRhf.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `travel_guide`
--

CREATE TABLE `travel_guide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `travel_guide`
--

INSERT INTO `travel_guide` (`id`, `title`, `content`, `display`, `src`, `index`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum 1', 'Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1', 1, 'upload/room_hotel/img/rV5ou8UTGQlx7i9JxWKT5MJA7tw1Ty6U8X23ohxS.svg', 1, '2022-07-10 18:55:25', '2022-07-10 18:55:25'),
(3, 'Lorem ipsum 2', 'Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1Lorem ipsum 1', 1, 'upload/room_hotel/img/GAAIFvyqucR8zzPECqj42gV58wqOb6LJTdgjRLuf.svg', 2, '2022-07-10 18:55:47', '2022-07-10 18:55:47'),
(4, 'Lorem ipsum 3', 'Lorem ipsum 3Lorem ipsum 3Lorem ipsum 3Lorem ipsum 3Lorem ipsum 3Lorem ipsum 3Lorem ipsum 3Lorem ipsum 3Lorem ipsum 3', 1, 'upload/banner/img/mV7S9eQ9WsZAIj4O0E2hnd5VO0DVGjuhH9erb3IQ.svg', 3, '2022-07-10 18:56:16', '2022-07-10 18:56:16'),
(5, 'Lorem ipsum 4', 'Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4Lorem ipsum 4', 1, 'upload/banner/img/5ifEUy0BadjBia25G70FkBBDJtA235HelnZxm9kI.svg', 4, '2022-07-10 18:56:38', '2022-07-10 18:56:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_default` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `password_default`) VALUES
(1, '0915559221', 'jacktran210194@gmail.com', NULL, '$2y$10$HAeKhA3OhINCxs2hVWsHXecyNWJ4hGRzaYAIbLP72mLQp0FmV5SPq', NULL, '2022-05-27 07:36:52', '2022-05-27 07:36:52', 'Admin', NULL),
(2, '0978129116', 'dlvinhphuc8027@gamil.com', NULL, '$2y$10$unR0J46jDepVDjmS5eWKbOJWEULMriMDFLrPOHUUZRTlfADt71/fK', NULL, '2022-07-05 00:30:33', '2022-07-05 00:30:33', 'partner', 'dlvinhphuc@639114'),
(3, '0978699853', 'dlvinhphuc8862@gamil.com', NULL, '$2y$10$PggVrtX852KX1wUXn1oV5uEO15uo0opEGgTZGdeA25HqLe2A6Yw8K', NULL, '2022-07-12 00:47:54', '2022-07-12 00:47:54', 'partner', 'dlvinhphuc@542730'),
(4, '0369979898', 'dlvinhphuc3414@gamil.com', NULL, '$2y$10$ezqitFFZabyLZcq/sqdz8OsXUjrKdlWkxXMERLA83uUIn5tOAbRO.', NULL, '2022-07-14 20:43:43', '2022-07-14 20:43:43', 'partner', 'dlvinhphuc@802372'),
(5, '099756599', 'dlvinhphuc2760@gamil.com', NULL, '$2y$10$EJ222l9l5Zj5NxkpD6MNq.FfHV9pypQyEyZwe3Th8ufkYEINxbsvy', NULL, '2022-07-24 20:45:10', '2022-07-24 20:45:10', 'partner', 'dlvinhphuc@579745'),
(6, 'â', 'dlvinhphuc6684@gamil.com', NULL, '$2y$10$k5xAF3yRRfv5BtcQdEYLa.63Y99b/DysUKuKh8NnqRj1YFWVXjU4.', NULL, '2022-08-02 01:10:07', '2022-08-02 01:10:07', 'partner', 'dlvinhphuc@624861'),
(7, '97829116', 'dlvinhphuc6422@gamil.com', NULL, '$2y$10$rXeF/TH.tEl8nS9K6ASDvO7cztCP3T2fsmLBlrdsynDVnce8Vejra', NULL, '2022-08-09 03:33:15', '2022-08-09 03:33:15', 'partner', 'dlvinhphuc@193747');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `app_describe`
--
ALTER TABLE `app_describe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `articles_review`
--
ALTER TABLE `articles_review`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `articles_tourist`
--
ALTER TABLE `articles_tourist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner_app`
--
ALTER TABLE `banner_app`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner_description`
--
ALTER TABLE `banner_description`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_room`
--
ALTER TABLE `book_room`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `booth`
--
ALTER TABLE `booth`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `business_content`
--
ALTER TABLE `business_content`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `business_icon`
--
ALTER TABLE `business_icon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_booking`
--
ALTER TABLE `category_booking`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_booth`
--
ALTER TABLE `category_booth`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_culinary`
--
ALTER TABLE `category_culinary`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_tourism`
--
ALTER TABLE `category_tourism`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_tourist`
--
ALTER TABLE `category_tourist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_travel`
--
ALTER TABLE `category_travel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `convenient`
--
ALTER TABLE `convenient`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `culinary`
--
ALTER TABLE `culinary`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `geographical_location`
--
ALTER TABLE `geographical_location`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `multimedia_files`
--
ALTER TABLE `multimedia_files`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `restaurant_culinary`
--
ALTER TABLE `restaurant_culinary`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_convenient`
--
ALTER TABLE `room_convenient`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `room_hotel`
--
ALTER TABLE `room_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `search_service`
--
ALTER TABLE `search_service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `super_app`
--
ALTER TABLE `super_app`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_introduce`
--
ALTER TABLE `table_introduce`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `title_feature`
--
ALTER TABLE `title_feature`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tradition_people`
--
ALTER TABLE `tradition_people`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `travel_articles`
--
ALTER TABLE `travel_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `travel_guide`
--
ALTER TABLE `travel_guide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `app_describe`
--
ALTER TABLE `app_describe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `articles_review`
--
ALTER TABLE `articles_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `articles_tourist`
--
ALTER TABLE `articles_tourist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `banner_app`
--
ALTER TABLE `banner_app`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `banner_description`
--
ALTER TABLE `banner_description`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `book_room`
--
ALTER TABLE `book_room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `booth`
--
ALTER TABLE `booth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `business_content`
--
ALTER TABLE `business_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `business_icon`
--
ALTER TABLE `business_icon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category_booking`
--
ALTER TABLE `category_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category_booth`
--
ALTER TABLE `category_booth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category_culinary`
--
ALTER TABLE `category_culinary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category_tourism`
--
ALTER TABLE `category_tourism`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category_tourist`
--
ALTER TABLE `category_tourist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `category_travel`
--
ALTER TABLE `category_travel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `convenient`
--
ALTER TABLE `convenient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `culinary`
--
ALTER TABLE `culinary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `geographical_location`
--
ALTER TABLE `geographical_location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `multimedia_files`
--
ALTER TABLE `multimedia_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `restaurant_culinary`
--
ALTER TABLE `restaurant_culinary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `room_convenient`
--
ALTER TABLE `room_convenient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `room_hotel`
--
ALTER TABLE `room_hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `search_service`
--
ALTER TABLE `search_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `super_app`
--
ALTER TABLE `super_app`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `table_introduce`
--
ALTER TABLE `table_introduce`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `technology`
--
ALTER TABLE `technology`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `title_feature`
--
ALTER TABLE `title_feature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tradition_people`
--
ALTER TABLE `tradition_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `travel_articles`
--
ALTER TABLE `travel_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `travel_guide`
--
ALTER TABLE `travel_guide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
