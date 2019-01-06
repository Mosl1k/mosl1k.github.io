-- phpMyAdmin SQL Dump
-- version 4.2.13
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 11 2015 г., 09:54
-- Версия сервера: 5.6.21-70.0-1-beget-log
-- Версия PHP: 5.5.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `masterb6_111`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_bonus_list`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 06:34
--

DROP TABLE IF EXISTS `db_bonus_list`;
CREATE TABLE IF NOT EXISTS `db_bonus_list` (
`id` int(11) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_bonus_list`
--

INSERT INTO `db_bonus_list` (`id`, `user`, `user_id`, `sum`, `date_add`, `date_del`) VALUES
(1, 'a010885', 1, 2, 1428734071, 1428820471);

-- --------------------------------------------------------

--
-- Структура таблицы `db_chat`
--
-- Создание: Апр 11 2015 г., 05:27
--

DROP TABLE IF EXISTS `db_chat`;
CREATE TABLE IF NOT EXISTS `db_chat` (
`id` int(11) NOT NULL,
  `to` varchar(10) NOT NULL,
  `user` char(10) NOT NULL,
  `comment` text CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `time` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_chat_ban`
--
-- Создание: Апр 11 2015 г., 05:27
--

DROP TABLE IF EXISTS `db_chat_ban`;
CREATE TABLE IF NOT EXISTS `db_chat_ban` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `time_uban` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competition`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_competition`;
CREATE TABLE IF NOT EXISTS `db_competition` (
`id` int(11) NOT NULL,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_competition_users`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_competition_users`;
CREATE TABLE IF NOT EXISTS `db_competition_users` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_conabrul`
--
-- Создание: Апр 11 2015 г., 05:27
-- Последнее обновление: Апр 11 2015 г., 05:27
--

DROP TABLE IF EXISTS `db_conabrul`;
CREATE TABLE IF NOT EXISTS `db_conabrul` (
`id` int(11) NOT NULL,
  `rules` text NOT NULL,
  `about` text NOT NULL,
  `contacts` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_conabrul`
--

INSERT INTO `db_conabrul` (`id`, `rules`, `about`, `contacts`) VALUES
(1, '<p><strong>1. ОБЩИЕ ПОЛОЖЕНИЯ</strong><br /><strong>1.1.</strong> Зарегистрировавшись на проекте, Вы соглашаетесь с данными правилами в полном объеме.<br /><strong>1.2.</strong> Администрация не несет ответственности за возможный ущерб, нанесенный Вам в результате использования данного проекта.<br /><strong>1.3.</strong> В случае игнорирования данных правил или их несоблюдения аккаунт подлежит блокировке.<br /><strong>1.4.</strong> Администрация может вносить в эти правила изменения без предупреждения пользователей.<br /><strong>1.5.</strong> Администрация не несет ответственности за возможный взлом аккаунтов.<br /><strong>1.6.</strong> Регистрируясь на проекте, пользователь соглашается быть  чьим-либо  партнером, и обязуется не выражать свои претензии по этому  поводу  администрации.<br /><strong>1.7.</strong> Администрация проекта не несет ответственности за возможное снижение или повышение заработка и активности партнеров.<br /><strong>1.8.</strong> При оплате каких либо услуг, а затем отказа от их использования, денежные средства не возвращаются.<br /><strong>1.9.</strong> Администрация вправе устанавливать цены на любые услуги по своему усмотрению. <br /><br /><strong>2. ОБЯЗАННОСТИ ПРОЕКТА</strong><br /><strong>2.1.</strong> Сохранять конфиденциальность информации зарегистрированного пользователя, полученной от него при регистрации.<br /><strong>2.2.</strong> При возникновении технических проблем возобновить работу проекта в течение 3-х суток.<br /><strong>2.3.</strong> Выплачивать пользователям заработанные денежные средства в течение 1 недели, с момента заказа выплаты.<br /><strong>2.4.</strong> Отвечать на письма, присланные в службу технической поддержки в течение 24-х часов. <br /><br /><strong>3. ОБЯЗАННОСТИ ПОЛЬЗОВАТЕЛЕЙ</strong><br /><strong>3.1.</strong> При регистрации указывать правдивую информацию во всех полях регистрационной формы.<br /><strong>3.2.</strong> Не реже одного раза в неделю знакомиться с данными правилами.<br /><strong>3.3.</strong> Не регистрировать более одного аккаунта с одного компьютера.  (Вход в  два разных аккаунта с одного компьютера считается нарушением).<br /><strong>3.4.</strong> При обнаружении неисправностей либо некоторых погрешностей проекта сообщать в службу поддержки.<br /><strong>3.5.</strong> Не проводить попыток взлома проекта и не использовать возможные ошибки.<br /><strong>3.6.</strong> Не использовать для рекламы своей партнерской ссылки СПАМ в любом виде (почта, форумы, гостевые книги и пр.).<br /><strong>3.7.</strong> Не публиковать оскорбительных сообщений, клевету и иные виды сообщений портящих репутацию проекта или пользователей.<br /><strong>3.8.</strong> Не выражать недовольство по поводу проекта и его работы.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>3.9.</strong> Принимать участие в игре, могут только лица, достигшие совершеннолетнего возраста.</p>', '<p>Стоимость такси всего от 24 руб. (2400 серебра).<br />Доход каждые 10 минут! В месяц от 30 до 90 процентов!<br />Автоматическая система накопления билетов! Сбор билетов без потерь, без ограничений по срокам! Собирайте билеты, так как удобно именно Вам, Хоть раз в час, хоть раз в день, хоть раз в месяц! Системный рынок позволит мгновенно обменять билеты на Серебро!&nbsp;</p>\r\n<p>Вам даже не нужно звать людей в игру для того, чтобы получить прибыль, система всё делает сама!&nbsp;<br />Максимально быстрые выплаты денег на Ваш кошелек! Любую сумму без дополнительных лимитов и ограничений!<br />В игре всегда можно посмотреть системный резервный фонд на выкуп билетов! Он отображается в реальном времени и Вы всегда в курсе!<br />Резерв системы на выкуп билетов гарантирует пользователям автоматический выкуп билетов и получение стабильного дохода.&nbsp;<br />Резерв системы показывается и обновляется в онлайн режиме. Администрация проекта гарантирует выкуп билетов на сумму, которая есть в резерве!&nbsp;<br />Резерв системы - это гарант, который Администрация обязуется выплачивать!<br />Каждый пользователь стабильно будет получать доход.<br />В процессе игры дополнительно будут добавлены новые блоки, которые позволят стабильно пополнять резерв на выкуп билетов, что даст дополнительную гарантию участникам!<br />Также при большом сборе средств в резерве на выкуп билетов, администрация проекта планирует инвестиции для получения дохода, который будет пополнять резерв системы на выкуп!<br />Ваш таксопарк будет приносить прибыль всегда!<br />И даже, если резерв системы опустошиться и станет равен нулю Вы всё равно будете продолжать стабильно получать доход!<br />Билеты будут накапливаться дальше и Вы будете получать серебро, просто заявки на продажу билетов будут формироваться в виде очереди!<br />Стабильный прирост резерва всегда будет обеспечивать все выплаты, а далее и очередь обмена билетов, которые будут обрабатываться по очереди!<br />Вы ни чем не рискуете и ничего не потеряете! Ваш доход гарантирован на 100%<br />Выплаты были, есть и будут стабильными всегда! Администрация гарантирует обмен серебра на деньги, полный выкуп!</p>', '<p><strong><br /></strong></p>');

-- --------------------------------------------------------

--
-- Структура таблицы `db_config`
--
-- Создание: Апр 11 2015 г., 05:27
-- Последнее обновление: Апр 11 2015 г., 05:35
--

DROP TABLE IF EXISTS `db_config`;
CREATE TABLE IF NOT EXISTS `db_config` (
`id` int(11) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `min_pay` double NOT NULL DEFAULT '15',
  `ser_per_wmr` int(11) NOT NULL DEFAULT '1000',
  `ser_per_wmz` int(11) NOT NULL DEFAULT '3300',
  `ser_per_wme` int(11) NOT NULL DEFAULT '4200',
  `percent_swap` int(11) NOT NULL DEFAULT '0',
  `percent_sell` int(2) NOT NULL DEFAULT '10',
  `items_per_coin` int(11) NOT NULL DEFAULT '7',
  `a_in_h` int(11) NOT NULL DEFAULT '0',
  `b_in_h` int(11) NOT NULL DEFAULT '0',
  `c_in_h` int(11) NOT NULL DEFAULT '0',
  `d_in_h` int(11) NOT NULL DEFAULT '0',
  `e_in_h` int(11) NOT NULL DEFAULT '0',
  `f_in_h` int(11) NOT NULL DEFAULT '0',
  `g_in_h` int(11) NOT NULL DEFAULT '0',
  `8_in_h` int(11) NOT NULL DEFAULT '0',
  `9_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_a_t` int(11) NOT NULL DEFAULT '0',
  `amount_b_t` int(11) NOT NULL DEFAULT '0',
  `amount_c_t` int(11) NOT NULL DEFAULT '0',
  `amount_d_t` int(11) NOT NULL DEFAULT '0',
  `amount_e_t` int(11) NOT NULL DEFAULT '0',
  `amount_f_t` int(11) NOT NULL DEFAULT '0',
  `amount_g_t` int(11) NOT NULL DEFAULT '0',
  `amount_8_t` int(11) NOT NULL DEFAULT '0',
  `amount_9_t` int(11) NOT NULL DEFAULT '0',
  `timer` int(25) NOT NULL,
  `amount_gardener` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_config`
--

INSERT INTO `db_config` (`id`, `admin`, `pass`, `min_pay`, `ser_per_wmr`, `ser_per_wmz`, `ser_per_wme`, `percent_swap`, `percent_sell`, `items_per_coin`, `a_in_h`, `b_in_h`, `c_in_h`, `d_in_h`, `e_in_h`, `f_in_h`, `g_in_h`, `8_in_h`, `9_in_h`, `amount_a_t`, `amount_b_t`, `amount_c_t`, `amount_d_t`, `amount_e_t`, `amount_f_t`, `amount_g_t`, `amount_8_t`, `amount_9_t`, `timer`, `amount_gardener`) VALUES
(1, 'admin', 'admin', 20, 100, 3400, 4100, 25, 50, 100, 100, 240, 1000, 1900, 6700, 3500, 14600, 27800, 62500, 2400, 5000, 18000, 30000, 80000, 50000, 150000, 250000, 500000, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_donations`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_donations`;
CREATE TABLE IF NOT EXISTS `db_donations` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_free_insert`
--
-- Создание: Апр 11 2015 г., 05:27
--

DROP TABLE IF EXISTS `db_free_insert`;
CREATE TABLE IF NOT EXISTS `db_free_insert` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `sum` double NOT NULL,
  `date_add` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `db_free_insert`
--

INSERT INTO `db_free_insert` (`id`, `user_id`, `user`, `sum`, `date_add`, `status`) VALUES
(1, 1, 'a010885', 100, 1428734017, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_games_knb`
--
-- Создание: Апр 11 2015 г., 05:27
--

DROP TABLE IF EXISTS `db_games_knb`;
CREATE TABLE IF NOT EXISTS `db_games_knb` (
`id` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `summa` decimal(7,2) NOT NULL,
  `item` int(1) NOT NULL,
  `login` varchar(10) NOT NULL,
  `dat` datetime NOT NULL,
  `last` int(11) NOT NULL,
  `gamer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_insert_money`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_insert_money`;
CREATE TABLE IF NOT EXISTS `db_insert_money` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_kamikadze`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_kamikadze`;
CREATE TABLE IF NOT EXISTS `db_kamikadze` (
`id` int(11) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `item` int(2) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  `stavka` int(11) NOT NULL DEFAULT '0',
  `status` varchar(11) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_lottery`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_lottery`;
CREATE TABLE IF NOT EXISTS `db_lottery` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_lottery_winners`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_lottery_winners`;
CREATE TABLE IF NOT EXISTS `db_lottery_winners` (
`id` int(11) NOT NULL,
  `user_a` varchar(10) NOT NULL,
  `bil_a` int(11) NOT NULL DEFAULT '0',
  `user_b` varchar(10) NOT NULL,
  `bil_b` int(11) NOT NULL DEFAULT '0',
  `user_c` varchar(10) NOT NULL,
  `bil_c` int(11) NOT NULL DEFAULT '0',
  `bank` float NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_nap`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_nap`;
CREATE TABLE IF NOT EXISTS `db_nap` (
`id` int(11) NOT NULL,
  `user_id` int(13) NOT NULL,
  `login` varchar(55) NOT NULL,
  `date` int(13) NOT NULL,
  `summa` float NOT NULL,
  `win` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_news`
--
-- Создание: Апр 11 2015 г., 05:27
-- Последнее обновление: Апр 11 2015 г., 05:27
--

DROP TABLE IF EXISTS `db_news`;
CREATE TABLE IF NOT EXISTS `db_news` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `like` int(12) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_news`
--

INSERT INTO `db_news` (`id`, `title`, `news`, `date_add`, `like`) VALUES
(60, 'Наша игра стартовала!!!', '<p style="text-align: left;"><span style="font-size: large; color: #00ccff;"><em><strong>Сегодня официальный старт нашей игры. &nbsp;Мы честный и прозрачный проект. У нас много преимуществ по сравнению с аналогичным играми. Быстрая окупаемость и никаких ограничений на вывод. Прозрачная статистика и резерв игры. Много бонусов и игр. В процессе &nbsp;будут добавлены модули для более выгодной и интересной игры.&nbsp;</strong></em></span></p>\r\n<p style="text-align: left;"><strong><span style="font-size: medium;">С уважением Админ.</span></strong></p>', 1427939943, 14),
(61, 'Подарки!!!', '<p><span style="color: #00ccff; font-size: large;"><strong><em>Дорогие участники проекта! За проявление активности по развитию игры, а это создание тем на форумах, посты в соц. сетях, видео о нашем проекте и вообще за рекламу, мы будем щедро благодарить Вас бонусами в размере от 100 до 10000 серебра на счёт игры. Результаты своей активности присылайте на почту </em></strong></span><span style="font-size: large; color: #3366ff;"><strong>HOCHU-BONUS@TAXIFARM.RU</strong></span><span style="color: #00ccff; font-size: large;"><strong><em> с указанием ссылки на ресурс и логином в игре.</em></strong></span></p>\r\n<p><span style="color: #000000;"><strong><span style="font-size: medium;">С уважением Админ.</span></strong></span></p>', 1428072484, 8),
(62, 'Дорогие участники!!!', '<p><span style="color: #00ccff;"><em><strong><span style="font-size: large;">Дорогие участники игры, проявляйте активность, пишите отзывы и выкладывайте скриншоты выплат. Чтоб наш проект радовал нас ещё очень долго.</span></strong></em></span></p>\r\n<p><span style="font-size: medium;">С уважением Админ</span></p>', 1428325866, 7),
(63, 'Внутренняя почта', '<p><em><strong><span style="font-size: large; color: #00ccff;">Мы добавили раздел "<span style="color: #3366ff;"><a href="account/pm">ВНУТРЕННЯЯ ПОЧТА</a></span>" . Теперь вы можете писать письма конкретному игроку или своим рефералам.&nbsp;</span></strong></em></p>\r\n<p style="text-align: center;"><img style="vertical-align: middle;" src="http://mtdata.ru/u3/photoD10A/20429510982-0/big.jpeg" alt="" width="350" height="409" /></p>', 1428399376, 6),
(64, 'Payeer', '<p><span style="font-size: large; color: #00ccff;"><em><strong>Дорогие участники! Payeer временно не работает. Писал в поддержку , говорят что технические работы. Но у нас есть платёжная система Free-Kassa в которой ещё больше видов оплаты.</strong></em></span></p>\r\n<p><span style="font-size: medium; color: #000000;"><span style="color: #00ccff; font-size: medium;">С Уважением Админ</span></span></p>', 1428513223, -2);

-- --------------------------------------------------------

--
-- Структура таблицы `db_otziv`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_otziv`;
CREATE TABLE IF NOT EXISTS `db_otziv` (
`id` int(11) NOT NULL,
  `login` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `neg` int(1) NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `like` int(12) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `db_payeer_insert`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 06:18
--

DROP TABLE IF EXISTS `db_payeer_insert`;
CREATE TABLE IF NOT EXISTS `db_payeer_insert` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_payeer_insert`
--

INSERT INTO `db_payeer_insert` (`id`, `user_id`, `user`, `sum`, `date_add`, `status`) VALUES
(1, 1, 'a010885', 100, 1428733089, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `db_payment`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_payment`;
CREATE TABLE IF NOT EXISTS `db_payment` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `comission` double NOT NULL DEFAULT '0',
  `valuta` varchar(3) NOT NULL DEFAULT 'RUB',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) NOT NULL DEFAULT '0',
  `pay_sys_id` int(11) NOT NULL DEFAULT '0',
  `response` int(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_pay_systems`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_pay_systems`;
CREATE TABLE IF NOT EXISTS `db_pay_systems` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `first_char` varchar(3) NOT NULL,
  `comment` text NOT NULL,
  `min_pay` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_recovery`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_recovery`;
CREATE TABLE IF NOT EXISTS `db_recovery` (
`id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_regkey`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_regkey`;
CREATE TABLE IF NOT EXISTS `db_regkey` (
`id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referer_name` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_request_payment`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_request_payment`;
CREATE TABLE IF NOT EXISTS `db_request_payment` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sell_items`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_sell_items`;
CREATE TABLE IF NOT EXISTS `db_sell_items` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a_s` int(11) NOT NULL DEFAULT '0',
  `b_s` int(11) NOT NULL DEFAULT '0',
  `c_s` int(11) NOT NULL DEFAULT '0',
  `d_s` int(11) NOT NULL DEFAULT '0',
  `e_s` int(11) NOT NULL DEFAULT '0',
  `f_s` int(11) NOT NULL DEFAULT '0',
  `g_s` int(11) NOT NULL DEFAULT '0',
  `8_s` int(11) NOT NULL DEFAULT '0',
  `9_s` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `all_sell` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_sender`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_sender`;
CREATE TABLE IF NOT EXISTS `db_sender` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `page` int(5) NOT NULL DEFAULT '0',
  `sended` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_statday`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_statday`;
CREATE TABLE IF NOT EXISTS `db_statday` (
  `ip` varchar(15) NOT NULL,
  `time` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_stats`;
CREATE TABLE IF NOT EXISTS `db_stats` (
`id` int(11) NOT NULL,
  `all_users` int(11) NOT NULL DEFAULT '0',
  `all_payments` double NOT NULL DEFAULT '0',
  `all_insert` double NOT NULL DEFAULT '0',
  `donations` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_btree`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_stats_btree`;
CREATE TABLE IF NOT EXISTS `db_stats_btree` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `tree_name` varchar(10) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_swap_ser`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_swap_ser`;
CREATE TABLE IF NOT EXISTS `db_swap_ser` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `amount_b` double NOT NULL DEFAULT '0',
  `amount_p` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_a`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 06:35
--

DROP TABLE IF EXISTS `db_users_a`;
CREATE TABLE IF NOT EXISTS `db_users_a` (
`id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `referer` varchar(10) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referals` int(11) NOT NULL DEFAULT '0',
  `date_reg` int(11) NOT NULL DEFAULT '0',
  `date_login` int(11) NOT NULL DEFAULT '0',
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `hide` int(11) NOT NULL,
  `chat_moder` double NOT NULL DEFAULT '0',
  `plat_pass` varchar(55) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_users_a`
--

INSERT INTO `db_users_a` (`id`, `user`, `email`, `pass`, `referer`, `referer_id`, `referals`, `date_reg`, `date_login`, `ip`, `banned`, `hide`, `chat_moder`, `plat_pass`) VALUES
(1, 'a010885', 'a010885@yandex.ru', '123456', 'Admin', 1, 1, 1428732941, 1428734158, 1599307196, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `db_users_b`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 06:34
--

DROP TABLE IF EXISTS `db_users_b`;
CREATE TABLE IF NOT EXISTS `db_users_b` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `money_b` double NOT NULL DEFAULT '0',
  `money_p` double NOT NULL DEFAULT '0',
  `a_t` int(11) NOT NULL DEFAULT '0',
  `b_t` int(11) NOT NULL DEFAULT '0',
  `c_t` int(11) NOT NULL DEFAULT '0',
  `d_t` int(11) NOT NULL DEFAULT '0',
  `e_t` int(11) NOT NULL DEFAULT '0',
  `f_t` int(11) NOT NULL DEFAULT '0',
  `g_t` int(11) NOT NULL DEFAULT '0',
  `8_t` int(11) NOT NULL DEFAULT '0',
  `9_t` int(11) NOT NULL DEFAULT '0',
  `a_b` int(11) NOT NULL DEFAULT '0',
  `b_b` int(11) NOT NULL DEFAULT '0',
  `c_b` int(11) NOT NULL DEFAULT '0',
  `d_b` int(11) NOT NULL DEFAULT '0',
  `e_b` int(11) NOT NULL DEFAULT '0',
  `f_b` int(11) NOT NULL DEFAULT '0',
  `g_b` int(11) NOT NULL DEFAULT '0',
  `8_b` int(11) NOT NULL DEFAULT '0',
  `9_b` int(11) NOT NULL DEFAULT '0',
  `all_time_a` int(11) NOT NULL DEFAULT '0',
  `all_time_b` int(11) NOT NULL DEFAULT '0',
  `all_time_c` int(11) NOT NULL DEFAULT '0',
  `all_time_d` int(11) NOT NULL DEFAULT '0',
  `all_time_e` int(11) NOT NULL DEFAULT '0',
  `all_time_f` int(11) NOT NULL DEFAULT '0',
  `all_time_g` int(11) NOT NULL DEFAULT '0',
  `all_time_8` int(11) NOT NULL DEFAULT '0',
  `all_time_9` int(11) NOT NULL DEFAULT '0',
  `last_sbor` int(11) NOT NULL DEFAULT '0',
  `from_referals` double NOT NULL DEFAULT '0',
  `to_referer` double NOT NULL DEFAULT '0',
  `payment_sum` decimal(10,2) NOT NULL DEFAULT '0.00',
  `insert_sum` double NOT NULL DEFAULT '0',
  `curmonth` int(11) NOT NULL,
  `curlimit` int(11) NOT NULL,
  `purse` varchar(8) NOT NULL,
  `pay_points` double NOT NULL DEFAULT '10'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `db_users_b`
--

INSERT INTO `db_users_b` (`id`, `user`, `money_b`, `money_p`, `a_t`, `b_t`, `c_t`, `d_t`, `e_t`, `f_t`, `g_t`, `8_t`, `9_t`, `a_b`, `b_b`, `c_b`, `d_b`, `e_b`, `f_b`, `g_b`, `8_b`, `9_b`, `all_time_a`, `all_time_b`, `all_time_c`, `all_time_d`, `all_time_e`, `all_time_f`, `all_time_g`, `all_time_8`, `all_time_9`, `last_sbor`, `from_referals`, `to_referer`, `payment_sum`, `insert_sum`, `curmonth`, `curlimit`, `purse`, `pay_points`) VALUES
(1, 'a010885', 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1428732941, 0, 0, '0.00', 0, 0, 0, '', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `db_vote_news`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_vote_news`;
CREATE TABLE IF NOT EXISTS `db_vote_news` (
`id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `dislike` int(12) NOT NULL,
  `oklike` int(12) NOT NULL,
  `id_news` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `db_vote_otziv`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `db_vote_otziv`;
CREATE TABLE IF NOT EXISTS `db_vote_otziv` (
`id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `dislike` int(12) NOT NULL,
  `oklike` int(12) NOT NULL,
  `id_news` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `square`
--
-- Создание: Апр 11 2015 г., 05:32
-- Последнее обновление: Апр 11 2015 г., 05:32
--

DROP TABLE IF EXISTS `square`;
CREATE TABLE IF NOT EXISTS `square` (
`sq_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `text` text CHARACTER SET cp1251 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wmrush_pm`
--
-- Создание: Апр 11 2015 г., 05:27
--

DROP TABLE IF EXISTS `wmrush_pm`;
CREATE TABLE IF NOT EXISTS `wmrush_pm` (
`id` int(11) NOT NULL,
  `id_pm` int(11) NOT NULL,
  `user_id_in` int(11) NOT NULL,
  `login_in` varchar(55) NOT NULL,
  `user_id_out` int(11) NOT NULL,
  `login_out` varchar(55) NOT NULL,
  `theme` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `inbox` int(11) NOT NULL,
  `outbox` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `db_bonus_list`
--
ALTER TABLE `db_bonus_list`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_chat`
--
ALTER TABLE `db_chat`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_chat_ban`
--
ALTER TABLE `db_chat_ban`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_competition`
--
ALTER TABLE `db_competition`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_competition_users`
--
ALTER TABLE `db_competition_users`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_conabrul`
--
ALTER TABLE `db_conabrul`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_config`
--
ALTER TABLE `db_config`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_donations`
--
ALTER TABLE `db_donations`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_free_insert`
--
ALTER TABLE `db_free_insert`
 ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `db_games_knb`
--
ALTER TABLE `db_games_knb`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_insert_money`
--
ALTER TABLE `db_insert_money`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_kamikadze`
--
ALTER TABLE `db_kamikadze`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_lottery`
--
ALTER TABLE `db_lottery`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_lottery_winners`
--
ALTER TABLE `db_lottery_winners`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_nap`
--
ALTER TABLE `db_nap`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_news`
--
ALTER TABLE `db_news`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_otziv`
--
ALTER TABLE `db_otziv`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_payeer_insert`
--
ALTER TABLE `db_payeer_insert`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_payment`
--
ALTER TABLE `db_payment`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_pay_systems`
--
ALTER TABLE `db_pay_systems`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_recovery`
--
ALTER TABLE `db_recovery`
 ADD PRIMARY KEY (`id`), ADD KEY `ip` (`ip`);

--
-- Индексы таблицы `db_regkey`
--
ALTER TABLE `db_regkey`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `db_request_payment`
--
ALTER TABLE `db_request_payment`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_sell_items`
--
ALTER TABLE `db_sell_items`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_sender`
--
ALTER TABLE `db_sender`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_stats`
--
ALTER TABLE `db_stats`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_stats_btree`
--
ALTER TABLE `db_stats_btree`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_swap_ser`
--
ALTER TABLE `db_swap_ser`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_users_a`
--
ALTER TABLE `db_users_a`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `ip` (`ip`);

--
-- Индексы таблицы `db_users_b`
--
ALTER TABLE `db_users_b`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_vote_news`
--
ALTER TABLE `db_vote_news`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `db_vote_otziv`
--
ALTER TABLE `db_vote_otziv`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `square`
--
ALTER TABLE `square`
 ADD PRIMARY KEY (`sq_id`);

--
-- Индексы таблицы `wmrush_pm`
--
ALTER TABLE `wmrush_pm`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `db_bonus_list`
--
ALTER TABLE `db_bonus_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_chat`
--
ALTER TABLE `db_chat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_chat_ban`
--
ALTER TABLE `db_chat_ban`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_competition`
--
ALTER TABLE `db_competition`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_competition_users`
--
ALTER TABLE `db_competition_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_conabrul`
--
ALTER TABLE `db_conabrul`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_config`
--
ALTER TABLE `db_config`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_donations`
--
ALTER TABLE `db_donations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_free_insert`
--
ALTER TABLE `db_free_insert`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_games_knb`
--
ALTER TABLE `db_games_knb`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_insert_money`
--
ALTER TABLE `db_insert_money`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_kamikadze`
--
ALTER TABLE `db_kamikadze`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_lottery`
--
ALTER TABLE `db_lottery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_lottery_winners`
--
ALTER TABLE `db_lottery_winners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_nap`
--
ALTER TABLE `db_nap`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_news`
--
ALTER TABLE `db_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT для таблицы `db_otziv`
--
ALTER TABLE `db_otziv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_payeer_insert`
--
ALTER TABLE `db_payeer_insert`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_payment`
--
ALTER TABLE `db_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_pay_systems`
--
ALTER TABLE `db_pay_systems`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_recovery`
--
ALTER TABLE `db_recovery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_regkey`
--
ALTER TABLE `db_regkey`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_request_payment`
--
ALTER TABLE `db_request_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_sell_items`
--
ALTER TABLE `db_sell_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_sender`
--
ALTER TABLE `db_sender`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_stats`
--
ALTER TABLE `db_stats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_stats_btree`
--
ALTER TABLE `db_stats_btree`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_swap_ser`
--
ALTER TABLE `db_swap_ser`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_users_a`
--
ALTER TABLE `db_users_a`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `db_vote_news`
--
ALTER TABLE `db_vote_news`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `db_vote_otziv`
--
ALTER TABLE `db_vote_otziv`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `square`
--
ALTER TABLE `square`
MODIFY `sq_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `wmrush_pm`
--
ALTER TABLE `wmrush_pm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
