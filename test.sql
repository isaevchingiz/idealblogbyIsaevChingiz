-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 23 2016 г., 11:46
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short` longtext NOT NULL,
  `content` longtext NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `short`, `content`, `date`) VALUES
(11, 'Great ideas for 2016', '[b]1. [/b] [i]Kid-friendly apps[/i]  [b]2. [/b] [i]Upcycling service[/i]', '[b]1 [/b] [i]Kid-friendly apps[/i][br]\r\nKids are your future customers, so gaining their loyalty now isn''t a bad idea.\r\n\r\nJWT Intelligence also cited the connectivity of kids as a big trend for 2015. According to Common Sense Media, three-quarters of kids have access to a mobile device. This spells a big business opportunity for anyone who can create products or design apps just for kids. And, if they also happen to be educational or promote good health, you''ll win their parents over, too.\r\n[b]2. [/b] [i]Upcycling service[/i]\r\nou''ve heard the saying, "one man''s trash is another man''s treasure," but have you ever thought of turning it into an actual business? If you''re an artist or just have a knack for crafts, try turning items that would otherwise be thrown out into useful products and selling them at craft fairs or on a website like Etsy. You can also offer to turn other people''s unwanted items into upcycled projects, like refreshing outdated clothes to make them more stylish or turning old T-shirts into quilts, for example. - See more at: http://www.businessnewsdaily.com/1646-great-business-ideas-2012.html#sthash.wyDCYIeH.dpuf\r\n', 'May 18, 2016, 11:18:13'),
(12, '4 iPhone Apps to Manage Your Business Contacts', '[center][b]iPhone Contact Management[/b][/center]\r\nThe days of the Rolodex are over. Your smartphone is now the best tool you have to manage your existing business contacts â€” and make new ones.', '[center][b]1.Connect (Free)[/b][/center]\r\nWhen youâ€™re running a business, itâ€™s not always easy to remember whoâ€™s who. Connect is an app for the iPhone that lets you sort and categorize your contacts into categories, to take a load off your memory while saving you time in the process.\r\n[center][b]2.CamCard (Free)[/b][/center]\r\nSwapping business cards is a time-tested way to introduce yourself to a new business contact â€” but in the age of the smartphone, it''s a little old fashioned.\r\n[center][b]3.Intro (Free)[/b][/center]\r\nntro for iPhone lets you connect and network with other business users before you ever meet. Just install the app and register using your LinkedIn or Facebook account.\r\n[center][b]4.LinkedIn (Free)[/b][/center]\r\nThe granddaddy of networking apps, LinkedIn is essentially Facebook for business. Like Facebook, it has a fully featured iPhone app so you can network on the go.\r\n', 'May 18, 2016, 22:58:25');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL DEFAULT '0',
  `comments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`, `comments`) VALUES
(1, 'admin', 'admin', 'user@user.com', '1', ''),
(4, 'user', 'user', 'user@user.com', '0', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
