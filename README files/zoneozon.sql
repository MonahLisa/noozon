-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 31 2023 г., 11:22
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zoneozon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '6', 1674769153),
('buyer', '7', 1674836309),
('buyer', '8', 1674836547),
('buyer', '9', 1674837629);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('addProduct', 2, 'Право добавлять товар', NULL, NULL, 1674835962, 1674835962),
('admin', 1, 'Администратор', NULL, NULL, 1674737848, 1674737848),
('banned', 1, 'Заблокированный пользователь', NULL, NULL, 1674738727, 1674738727),
('buyer', 1, 'Покупатель', NULL, NULL, 1674737848, 1674737848),
('buyProduct', 2, 'Право покупать товар', NULL, NULL, 1674835841, 1674835841),
('canAdmin', 2, 'Право входа в админку', NULL, NULL, 1674738765, 1674738765),
('canManagement', 2, 'Право быть менеджером компании', NULL, NULL, 1674769207, 1674769207),
('createCompany', 2, 'Право создать компанию', NULL, NULL, 1674835529, 1674835529),
('manager', 1, 'Менеджер', NULL, NULL, 1674737848, 1674737848),
('putRating', 2, 'Право ставить оценку товару', NULL, NULL, 1674832270, 1674832270),
('updateUser', 2, 'Право менять права пользователям', NULL, NULL, 1674832030, 1674832030),
('user', 1, 'Пользователь', NULL, NULL, 1674737848, 1674737848),
('writeReview', 2, 'Право написать отзыв под товаром', NULL, NULL, 1674832188, 1674832188);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'addProduct'),
('admin', 'buyProduct'),
('admin', 'canAdmin'),
('admin', 'createCompany'),
('buyer', 'buyProduct'),
('manager', 'addProduct'),
('manager', 'buyProduct'),
('manager', 'canAdmin'),
('manager', 'createCompany');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `owner_name` varchar(40) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `cart_has_product`
--

CREATE TABLE `cart_has_product` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `p_id`) VALUES
(1, 'Дом', NULL),
(2, 'Аптека', NULL),
(3, 'Бытовая техника', NULL),
(4, 'Электроника', NULL),
(5, 'Ноутбуки и компьютеры', NULL),
(6, 'Одежда и обувь', NULL),
(7, 'Продукты питания', NULL),
(8, 'Красота', NULL),
(9, 'Детские товары', NULL),
(10, 'Зоотовары', NULL),
(11, 'Гигиена', NULL),
(12, 'Строительство и ремонт', NULL),
(13, 'Мебель', NULL),
(14, 'Хобби и творчество', NULL),
(15, 'Автотовары', NULL),
(16, 'Спорт и отдых', NULL),
(17, 'Книги', NULL),
(18, 'Для школы и офиса', NULL),
(19, 'Ювелирные украшения', NULL),
(20, 'Оборудование', NULL),
(21, 'Цифровые товары', NULL),
(22, 'Товары для взрослых', NULL),
(23, 'Бытовая химия', NULL),
(24, 'Акции', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'г Москва'),
(3, 'г Санкт-Петербург'),
(6, 'г Уфа'),
(18, 'г Казань'),
(27, 'г Сочи'),
(34, 'г Новосибирск'),
(820, 'г Краснодар'),
(823, 'г Анапа'),
(831, 'г Ейск'),
(838, 'г Крымск'),
(856, 'г Туапсе'),
(1381, 'г Красноярск'),
(1384, 'г Ачинск'),
(1388, 'г Боготол'),
(1394, 'г Енисейск'),
(1397, 'г Иланский'),
(1400, 'г Канск'),
(2034, 'г Владивосток'),
(2037, 'г Дальнереченск'),
(2121, 'г Ставрополь'),
(2126, 'г Благодарный'),
(2127, 'г Буденновск'),
(2128, 'г Георгиевск'),
(2130, 'г Изобильный'),
(2131, 'г Ипатово'),
(2132, 'г Новопавловск'),
(2139, 'г Нефтекумск'),
(2140, 'г Новоалександровск'),
(2142, 'г Светлоград'),
(2148, 'г Михайловск'),
(2507, 'г Хабаровск'),
(2509, 'г Амурск'),
(2511, 'г Бикин'),
(2514, 'г Вяземский'),
(2515, 'г Комсомольскна-Амуре'),
(2518, 'г Николаевскна-Амуре'),
(2521, 'г Советская Гавань'),
(2525, 'г Хабаровск'),
(2568, 'г Благовещенск'),
(2571, 'г Белогорск'),
(2572, 'г Благовещенск'),
(2583, 'г Свободный'),
(2586, 'г Сковородино'),
(2588, 'г Тында'),
(2589, 'г Шимановск'),
(2923, 'г Архангельск'),
(2924, 'г Нарьян-Мар'),
(2950, 'г Вельск'),
(2954, 'г Каргополь'),
(2956, 'г Котлас'),
(2960, 'г Мезень'),
(2962, 'г Няндома'),
(2963, 'г Онега'),
(2966, 'г Архангельск'),
(2970, 'г Шенкурск'),
(3116, 'г Коряжма'),
(3121, 'г Сольвычегодск'),
(3293, 'г Астрахань'),
(3295, 'г Ахтубинск'),
(3299, 'г Камызяк'),
(3302, 'г Нариманов'),
(3304, 'г Харабали'),
(3322, 'г Ахтубинск'),
(3497, 'г Белгород'),
(3499, 'г Алексеевка'),
(3502, 'г Валуйки'),
(3505, 'г Грайворон'),
(3506, 'г Губкин'),
(3508, 'г Короча'),
(3510, 'г Бирюч'),
(3512, 'г Новый Оскол'),
(3516, 'г Старый Оскол'),
(3518, 'г Шебекино'),
(3519, 'г Строитель'),
(3850, 'г Брянск'),
(3853, 'г Брянск'),
(3857, 'г Дятьково'),
(3859, 'г Жуковка'),
(3861, 'г Карачев'),
(3864, 'г Клинцы'),
(3869, 'г Новозыбков'),
(3871, 'г Почеп'),
(3873, 'г Севск'),
(3874, 'г Стародуб'),
(3876, 'г Сураж'),
(3877, 'г Трубчевск'),
(4402, 'г Владимир'),
(4404, 'г Александров'),
(4405, 'г Вязники'),
(4406, 'г Гороховец'),
(4407, 'г Гусь-Хрустальный'),
(4408, 'г Камешково'),
(4409, 'г Киржач'),
(4410, 'г Ковров'),
(4411, 'г Кольчугино'),
(4412, 'г Меленки'),
(4413, 'г Муром'),
(4414, 'г Петушки'),
(4416, 'г Собинка'),
(4417, 'г Судогда'),
(4418, 'г Суздаль'),
(4419, 'г Юрьев-Польский'),
(4477, 'г Волгоград'),
(4483, 'г Дубовка'),
(4485, 'г Жирновск'),
(4487, 'г Калач-на-Дону'),
(4488, 'г Камышин'),
(4491, 'г Котельниково'),
(4492, 'г Котово'),
(4493, 'г Ленинск'),
(4494, 'г Михайловка'),
(4496, 'г Николаевск'),
(4497, 'г Новоаннинский'),
(4501, 'г Палласовка'),
(4505, 'г Серафимович'),
(4508, 'г Суровикино'),
(4510, 'г Фролово'),
(5065, 'г Вологда'),
(5067, 'г Бабаево'),
(5069, 'г Белозерск'),
(5071, 'г Великий Устюг'),
(5074, 'г Вологда'),
(5075, 'г Вытегра'),
(5076, 'г Грязовец'),
(5078, 'г Кириллов'),
(5081, 'г Никольск'),
(5083, 'г Сокол'),
(5086, 'г Тотьма'),
(5089, 'г Харовск'),
(5091, 'г Череповец'),
(5364, 'г Никольск'),
(5394, 'г Кадников'),
(5475, 'г Харовск'),
(5529, 'г Воронеж'),
(5532, 'г Бобров'),
(5533, 'г Богучар'),
(5534, 'г Борисоглебск'),
(5535, 'г Бутурлиновка'),
(5540, 'г Калач'),
(5544, 'г Лиски'),
(5547, 'г Новохоперск'),
(5549, 'г Острогожск'),
(5550, 'г Павловск'),
(5553, 'г Поворино'),
(5557, 'г Россошь'),
(5558, 'г Семилуки'),
(5562, 'г Эртиль'),
(6159, 'г Нижний Новгород'),
(6162, 'г Арзамас'),
(6163, 'г Балахна'),
(6164, 'г Богородск'),
(6171, 'г Ветлуга'),
(6176, 'г Городец'),
(6178, 'г Володарск'),
(6180, 'г Княгинино'),
(6184, 'г Кстово'),
(6185, 'г Кулебаки'),
(6186, 'г Лукоянов'),
(6187, 'г Лысково'),
(6188, 'г Навашино'),
(6189, 'г Павлово'),
(6190, 'г Перевоз'),
(6193, 'г Сергач'),
(6200, 'г Чкаловск'),
(6729, 'г Иваново'),
(6731, 'г Вичуга'),
(6733, 'г Гаврилов Посад'),
(6735, 'г Иваново'),
(6737, 'г Кинешма'),
(6738, 'г Комсомольск'),
(6743, 'г Приволжск'),
(6744, 'г Пучеж'),
(6745, 'г Родники'),
(6747, 'г Тейково'),
(6748, 'г Фурманов'),
(6749, 'г Шуя'),
(6750, 'г Южа'),
(6751, 'г Юрьевец'),
(6932, 'г Родники'),
(6942, 'г Родники'),
(6959, 'г Тейково'),
(6993, 'г Иркутск'),
(7087, 'г Бодайбо'),
(7088, 'г Ангарск'),
(7089, 'г Братск'),
(7093, 'г Иркутск'),
(7097, 'г Киренск'),
(7100, 'г ЖелезногорскИлимский'),
(7101, 'г Нижнеудинск'),
(7103, 'г Слюдянка'),
(7104, 'г Тайшет'),
(7105, 'г Тулун'),
(7110, 'г Черемхово'),
(7112, 'г Шелехов'),
(7550, 'г Магас'),
(7555, 'г Калининград'),
(7557, 'г Багратионовск'),
(7558, 'г Гвардейск'),
(7559, 'г Гурьевск'),
(7560, 'г Гусев'),
(7562, 'г Краснознаменск'),
(7563, 'г Неман'),
(7564, 'г Нестеров'),
(7565, 'г Озерск'),
(7566, 'г Полесск'),
(7567, 'г Правдинск'),
(7568, 'г Славск'),
(7569, 'г Черняховск'),
(7727, 'г Тверь'),
(7729, 'г Андреаполь'),
(7730, 'г Бежецк'),
(7731, 'г Белый'),
(7732, 'г Бологое'),
(7733, 'г Весьегонск'),
(7734, 'г Вышний Волочек'),
(7738, 'г Тверь'),
(7739, 'г Калязин'),
(7740, 'г Кашин'),
(7742, 'г Кимры'),
(7743, 'г Конаково'),
(7744, 'г Красный Холм'),
(7745, 'г Кувшиново'),
(7747, 'г Лихославль'),
(7750, 'г Нелидово'),
(7752, 'г Осташков'),
(7755, 'г Ржев'),
(7760, 'г Старица'),
(7761, 'г Торжок'),
(7762, 'г Торопец'),
(7894, 'г Весьегонск'),
(8062, 'г Нелидово'),
(8202, 'г Калуга'),
(8206, 'г Боровск'),
(8207, 'г Кондрово'),
(8209, 'г Жиздра'),
(8210, 'г Жуков'),
(8211, 'г Киров'),
(8213, 'г Козельск'),
(8215, 'г Людиново'),
(8216, 'г Малоярославец'),
(8217, 'г Медынь'),
(8218, 'г Мещовск'),
(8219, 'г Мосальск'),
(8221, 'г Спас-Деменск'),
(8222, 'г Сухиничи'),
(8223, 'г Таруса'),
(8227, 'г Юхнов'),
(8625, 'г Калуга'),
(8626, 'г Калуга'),
(8631, 'г Калуга'),
(8634, 'г Калуга'),
(8635, 'г ПетропавловскКамчатский'),
(8649, 'г Елизово'),
(8662, 'г Кемерово'),
(8664, 'г Белово'),
(8665, 'г Гурьевск'),
(8667, 'г Кемерово'),
(8669, 'г Ленинск-Кузнецкий'),
(8670, 'г Мариинск'),
(8671, 'г Междуреченск'),
(8672, 'г Новокузнецк'),
(8673, 'г Прокопьевск'),
(8675, 'г Таштагол'),
(8677, 'г Топки'),
(8680, 'г Юрга'),
(8942, 'г Киров'),
(8946, 'г Белая Холуница'),
(8948, 'г Кирс'),
(8950, 'г Вятские Поляны'),
(8955, 'г Кирово-Чепецк'),
(8956, 'г Котельнич'),
(8959, 'г Луза'),
(8960, 'г Малмыж'),
(8961, 'г Мураши'),
(8964, 'г Нолинск'),
(8965, 'г Омутнинск'),
(8972, 'г Слободской'),
(8973, 'г Советск'),
(8979, 'г Орлов'),
(8982, 'г Яранск'),
(9404, 'г Кострома'),
(9407, 'г Буй'),
(9409, 'г Галич'),
(9411, 'г Кологрив'),
(9412, 'г Кострома'),
(9414, 'г Макарьев'),
(9415, 'г Мантурово'),
(9417, 'г Нея'),
(9418, 'г Нерехта'),
(9425, 'г Солигалич'),
(9428, 'г Чухлома'),
(9429, 'г Шарья'),
(9479, 'г Галич'),
(9525, 'г Макарьев'),
(9552, 'г Нерехта'),
(9592, 'г Солигалич'),
(9623, 'г Самара'),
(9631, 'г Самара'),
(9635, 'г Кинель'),
(9641, 'г Нефтегорск'),
(9643, 'г Похвистнево'),
(9646, 'г Тольятти'),
(9647, 'г Сызрань'),
(9862, 'Большая Раковка'),
(10024, 'г Курган'),
(10029, 'г Далматово'),
(10032, 'г Катайск'),
(10034, 'г Куртамыш'),
(10036, 'г Макушино'),
(10039, 'г Петухово'),
(10045, 'г Шадринск'),
(10047, 'г Шумиха'),
(10048, 'г Щучье'),
(10521, 'г Курск'),
(10527, 'г Дмитриев-Льговский'),
(10528, 'г Железногорск'),
(10533, 'г Курск'),
(10534, 'г Курчатов'),
(10535, 'г Льгов'),
(10538, 'г Обоянь'),
(10542, 'г Рыльск'),
(10545, 'г Суджа'),
(10547, 'г Фатеж'),
(10550, 'г Щигры'),
(11274, 'г Бокситогорск'),
(11275, 'г Волосово'),
(11276, 'г Волхов'),
(11277, 'г Всеволожск'),
(11278, 'г Выборг'),
(11279, 'г Гатчина'),
(11280, 'г Кингисепп'),
(11281, 'г Кириши'),
(11282, 'г Кировск'),
(11283, 'г Лодейное Поле'),
(11284, 'г Ломоносов'),
(11285, 'г Луга'),
(11286, 'г Подпорожье'),
(11287, 'г Приозерск'),
(11288, 'г Сланцы'),
(11289, 'г Тихвин'),
(11290, 'г Тосно'),
(11595, 'г Липецк'),
(11598, 'г Грязи'),
(11599, 'г Данков'),
(11603, 'г Елец'),
(11607, 'г Лебедянь'),
(11609, 'г Липецк'),
(11614, 'г Чаплыгин'),
(11811, 'г Лебедянь'),
(11955, 'г Магадан'),
(11961, 'г Сусуман'),
(12217, 'г Балашиха'),
(12218, 'г Волоколамск'),
(12219, 'г Воскресенск'),
(12220, 'г Дмитров'),
(12221, 'г Домодедово'),
(12222, 'г Егорьевск'),
(12223, 'г Сергиев Посад'),
(12225, 'г Истра'),
(12226, 'г Кашира'),
(12227, 'г Клин'),
(12228, 'г Коломна'),
(12229, 'г Красногорск'),
(12230, 'г Видное'),
(12232, 'г Луховицы'),
(12233, 'г Люберцы'),
(12234, 'г Можайск'),
(12235, 'г Мытищи'),
(12236, 'г Наро-Фоминск'),
(12237, 'г Ногинск'),
(12238, 'г Одинцово'),
(12239, 'г Озеры'),
(12240, 'г Орехово-Зуево'),
(12241, 'г Павловский Посад'),
(12242, 'г Подольск'),
(12243, 'г Пушкино'),
(12244, 'г Раменское'),
(12245, 'г Руза'),
(12247, 'г Серпухов'),
(12248, 'г Солнечногорск'),
(12249, 'г Ступино'),
(12250, 'г Талдом'),
(12251, 'г Чехов'),
(12252, 'г Шатура'),
(12254, 'г Щелково'),
(12898, 'г Мурманск'),
(12900, 'г Кандалакша'),
(12901, 'г Ковдор'),
(12902, 'г Кола'),
(12946, 'г Великий Новгород'),
(12949, 'г Боровичи'),
(12950, 'г Валдай'),
(12955, 'г Малая Вишера'),
(12958, 'г Великий Новгород'),
(12959, 'г Окуловка'),
(12961, 'г Пестово'),
(12963, 'г Сольцы'),
(12964, 'г Старая Русса'),
(12966, 'г Холм'),
(12967, 'г Чудово'),
(13214, 'г Барабинск'),
(13215, 'г Болотное'),
(13219, 'г Искитим'),
(13220, 'г Карасук'),
(13221, 'г Каргат'),
(13226, 'г Куйбышев'),
(13227, 'г Купино'),
(13235, 'г Татарск'),
(13236, 'г Тогучин'),
(13240, 'г Черепаново'),
(13242, 'г Чулым'),
(13765, 'г Омск'),
(13772, 'г Исилькуль'),
(13773, 'г Калачинск'),
(13781, 'г Называевск'),
(13793, 'г Тара'),
(13795, 'г Тюкалинск'),
(14249, 'г Оренбург'),
(14251, 'г Абдулино'),
(14257, 'г Бугуруслан'),
(14258, 'г Бузулук'),
(14259, 'г Гай'),
(14265, 'г Кувандык'),
(14271, 'г Оренбург'),
(14279, 'г Соль-Илецк'),
(14280, 'г Сорочинск'),
(14285, 'г Ясный'),
(14928, 'г Орел'),
(14930, 'г Болхов'),
(14933, 'г Дмитровск'),
(14941, 'г Ливны'),
(14942, 'г Малоархангельск'),
(14943, 'г Мценск'),
(14945, 'г Новосиль'),
(14946, 'г Орел'),
(15244, 'г Пенза'),
(15247, 'г Спасск'),
(15249, 'г Белинский'),
(15252, 'г Городище'),
(15255, 'г Каменка'),
(15258, 'г Кузнецк'),
(15265, 'г Нижний Ломов'),
(15266, 'г Никольск'),
(15269, 'г Сердобск'),
(15341, 'г Спасск'),
(15424, 'г Каменка'),
(15627, 'г Пермь'),
(15628, 'г Кудымкар'),
(15633, 'г Кудымкар'),
(15640, 'г Верещагино'),
(15641, 'г Горнозаводск'),
(15646, 'г Красновишерск'),
(15648, 'г Кунгур'),
(15649, 'г Нытва'),
(15652, 'г Оса'),
(15653, 'г Оханск'),
(15654, 'г Очер'),
(15655, 'г Пермь'),
(15657, 'г Соликамск'),
(15662, 'г Чердынь'),
(15663, 'г Чернушка'),
(15749, 'г Псков'),
(15752, 'г Великие Луки'),
(15753, 'г Гдов'),
(15759, 'г Невель'),
(15760, 'г Новоржев'),
(15761, 'г Новосокольники'),
(15762, 'г Опочка'),
(15763, 'г Остров'),
(15765, 'г Печоры'),
(15767, 'г Порхов'),
(15768, 'г Псков'),
(15769, 'г Пустошка'),
(15771, 'г Пыталово'),
(15772, 'г Себеж'),
(15905, 'г Невель'),
(15936, 'г Опочка'),
(15940, 'г Остров'),
(15941, 'г Остров'),
(16017, 'г Пыталово'),
(16043, 'г Ростов-на-Дону'),
(16045, 'г Азов'),
(16046, 'г Аксай'),
(16048, 'г Белая Калитва'),
(16062, 'г Константиновск'),
(16063, 'г Красный Сулин'),
(16067, 'г Миллерово'),
(16069, 'г Морозовск'),
(16076, 'г Пролетарск'),
(16079, 'г Сальск'),
(16080, 'г Семикаракорск'),
(16086, 'г Цимлянск'),
(16578, 'г Рязань'),
(16583, 'г Касимов'),
(16584, 'г Спас-Клепики'),
(16585, 'г Кораблино'),
(16587, 'г Михайлов'),
(16592, 'г Рыбное'),
(16593, 'г Ряжск'),
(16594, 'г Рязань'),
(16597, 'г Сасово'),
(16598, 'г Скопин'),
(16599, 'г Спасск-Рязанский'),
(16603, 'г Шацк'),
(17158, 'г Саратов'),
(17161, 'г Аркадак'),
(17162, 'г Аткарск'),
(17164, 'г Балаково'),
(17165, 'г Балашов'),
(17167, 'г Вольск'),
(17172, 'г Ершов'),
(17174, 'г Калининск'),
(17175, 'г Красноармейск'),
(17176, 'г Красный Кут'),
(17179, 'г Маркс'),
(17181, 'г Новоузенск'),
(17184, 'г Петровск'),
(17186, 'г Пугачев'),
(17189, 'г Ртищево'),
(17191, 'г Саратов'),
(17196, 'г Хвалынск'),
(17197, 'г Энгельс'),
(17936, 'г Южно-Сахалинск'),
(17938, 'г АлександровскСахалинский'),
(17939, 'г Анива'),
(17940, 'г Долинск'),
(17941, 'г Корсаков'),
(17942, 'г Курильск'),
(17943, 'г Макаров'),
(17944, 'г Невельск'),
(17946, 'г Оха'),
(17947, 'г Поронайск'),
(17948, 'г Северо-Курильск'),
(17950, 'г Томари'),
(17953, 'г Холмск'),
(18067, 'г Екатеринбург'),
(18069, 'г Алапаевск'),
(18070, 'г Артемовский'),
(18075, 'г Богданович'),
(18076, 'г Верхняя Салда'),
(18077, 'г Верхотурье'),
(18079, 'г Ирбит'),
(18080, 'г Каменск-Уральский'),
(18081, 'г Камышлов'),
(18082, 'г Красноуфимск'),
(18083, 'г Невьянск'),
(18084, 'г Нижние Серги'),
(18085, 'г Новая Ляля'),
(18086, 'г Нижний Тагил'),
(18088, 'г Реж'),
(18089, 'г Серов'),
(18091, 'г Сухой Лог'),
(18092, 'г Сысерть'),
(18094, 'г Тавда'),
(18095, 'г Талица'),
(18097, 'г Туринск'),
(18706, 'г Смоленск'),
(18708, 'г Велиж'),
(18709, 'г Вязьма'),
(18710, 'г Гагарин'),
(18712, 'г Демидов'),
(18713, 'г Дорогобуж'),
(18714, 'г Духовщина'),
(18715, 'г Ельня'),
(18721, 'г Починок'),
(18722, 'г Рославль'),
(18723, 'г Рудня'),
(18724, 'г Сафоново'),
(18725, 'г Смоленск'),
(18726, 'г Сычевка'),
(18732, 'г Ярцево'),
(19117, 'г Тамбов'),
(19121, 'г Жердевка'),
(19124, 'г Кирсанов'),
(19125, 'г Мичуринск'),
(19127, 'г Моршанск'),
(19133, 'г Рассказово'),
(19138, 'г Тамбов'),
(19466, 'г Томск'),
(19469, 'г Асино'),
(19475, 'г Колпашево'),
(19481, 'г Томск'),
(19634, 'г Тула'),
(19636, 'г Алексин'),
(19638, 'г Белев'),
(19639, 'г Богородицк'),
(19640, 'г Венев'),
(19643, 'г Ефремов'),
(19646, 'г Кимовск'),
(19647, 'г Киреевск'),
(19650, 'г Новомосковск'),
(19652, 'г Плавск'),
(19653, 'г Суворов'),
(19657, 'г Щекино'),
(19658, 'г Ясногорск'),
(19797, 'г Богородицк'),
(20112, 'г Тюмень'),
(20113, 'г Ханты-Мансийск'),
(20115, 'г Белоярский'),
(20118, 'г Нефтеюганск'),
(20119, 'г Нижневартовск'),
(20121, 'г Советский'),
(20122, 'г Сургут'),
(20123, 'г Ханты-Мансийск'),
(20170, 'г Салехард'),
(20173, 'г Надым'),
(20175, 'г Тарко-Сале'),
(20263, 'г Ишим'),
(20269, 'г Тобольск'),
(20270, 'г Тюмень'),
(20274, 'г Ялуторовск'),
(20604, 'г Барыш'),
(20606, 'г Инза'),
(20610, 'г Димитровград'),
(20616, 'г Сенгилей'),
(20821, 'г Челябинск'),
(20825, 'г Аша'),
(20828, 'г Верхнеуральск'),
(20829, 'г Еманжелинск'),
(20831, 'г Карталы'),
(20832, 'г Касли'),
(20833, 'г Катав-Ивановск'),
(20835, 'г Коркино'),
(20838, 'г Куса'),
(20840, 'г Нязепетровск'),
(20842, 'г Пласт'),
(20843, 'г Сатка'),
(20845, 'г Троицк'),
(20848, 'г Чебаркуль'),
(21190, 'г Чита'),
(21196, 'г Балей'),
(21197, 'г Борзя'),
(21204, 'г Краснокаменск'),
(21208, 'г Могоча'),
(21209, 'г Нерчинск'),
(21213, 'г ПетровскЗабайкальский'),
(21215, 'г Сретенск'),
(21219, 'г Хилок'),
(21221, 'г Чита'),
(21223, 'г Шилка'),
(21309, 'г Анадырь'),
(21311, 'г Анадырь'),
(21313, 'г Билибино'),
(21318, 'г Певек'),
(21346, 'г Ярославль'),
(21351, 'г Гаврилов-Ям'),
(21352, 'г Данилов'),
(21353, 'г Любим'),
(21354, 'г Мышкин'),
(21358, 'г ПереславльЗалесский'),
(21359, 'г Пошехонье'),
(21360, 'г Ростов'),
(21361, 'г Рыбинск'),
(21362, 'г Тутаев'),
(21364, 'г Ярославль'),
(21650, 'г Майкоп'),
(21730, 'г Баймак'),
(21733, 'г Белебей'),
(21735, 'г Белорецк'),
(21737, 'г Бирск'),
(21739, 'г Благовещенск'),
(21744, 'г Давлеканово'),
(21746, 'г Дюртюли'),
(21752, 'г Ишимбай'),
(21761, 'г Мелеуз'),
(21768, 'г Стерлитамак'),
(21770, 'г Туймазы'),
(21778, 'г Янаул'),
(22717, 'г Кяхта'),
(22723, 'г Гусиноозерск'),
(23025, 'г Махачкала'),
(23033, 'г Буйнакск'),
(23038, 'г Дербент'),
(23043, 'г Кизилюрт'),
(23044, 'г Кизляр'),
(23062, 'г Хасавюрт'),
(23516, 'г Нальчик'),
(23518, 'г Баксан'),
(23521, 'г Майский'),
(23522, 'г Прохладный'),
(23524, 'г Терек'),
(23525, 'г Нарткала'),
(23526, 'г Чегем'),
(23527, 'г Тырныауз'),
(23548, 'г Горно-Алтайск'),
(23664, 'г Элиста'),
(23666, 'г Городовиковск'),
(23668, 'г Лагань'),
(23809, 'г Петрозаводск'),
(23811, 'г Беломорск'),
(23813, 'г Кемь'),
(23814, 'г Кондопога'),
(23815, 'г Лахденпохья'),
(23817, 'г Медвежьегорск'),
(23819, 'г Олонец'),
(23820, 'г Питкяранта'),
(23821, 'г Петрозаводск'),
(23823, 'г Пудож'),
(23824, 'г Сегежа'),
(23825, 'г Суоярви'),
(23868, 'г Сыктывкар'),
(23871, 'г Емва'),
(24129, 'г Йошкар-Ола'),
(24131, 'г Волжск'),
(24132, 'г Козьмодемьянск'),
(24374, 'г Саранск'),
(24376, 'г Ардатов'),
(24384, 'г Инсар'),
(24387, 'г Ковылкино'),
(24389, 'г Краснослободск'),
(24392, 'г Рузаевка'),
(24394, 'г Темников'),
(24817, 'г Владикавказ'),
(24819, 'г Алагир'),
(24820, 'г Ардон'),
(24821, 'г Дигора'),
(24824, 'г Моздок'),
(24825, 'г Беслан'),
(24954, 'г Черкесск'),
(24959, 'г Карачаевск'),
(24986, 'г Агрыз'),
(24987, 'г Азнакаево'),
(24992, 'г Альметьевск'),
(24994, 'г Арск'),
(24996, 'г Бавлы'),
(24998, 'г Бугульма'),
(24999, 'г Буинск'),
(25003, 'г Елабуга'),
(25008, 'г Болгар'),
(25010, 'г Лаишево'),
(25011, 'г Лениногорск'),
(25012, 'г Мамадыш'),
(25013, 'г Менделеевск'),
(25014, 'г Мензелинск'),
(25016, 'г Нижнекамск'),
(25018, 'г Нурлат'),
(25024, 'г Тетюши'),
(25026, 'г Набережные Челны'),
(25028, 'г Чистополь'),
(25101, 'г Кызыл'),
(25105, 'г Чадан'),
(25110, 'г Туран'),
(25116, 'г Шагонар'),
(25266, 'г Ижевск'),
(25271, 'г Воткинск'),
(25272, 'г Глазов'),
(25277, 'г Камбарка'),
(25284, 'г Можга'),
(25654, 'г Абакан'),
(25775, 'г Грозный'),
(25776, 'г Чебоксары'),
(25778, 'г Алатырь'),
(25783, 'г Канаш'),
(25784, 'г Козловка'),
(25788, 'г Мариинский Посад'),
(25792, 'г Цивильск'),
(25795, 'г Шумерля'),
(25796, 'г Ядрин'),
(26203, 'г Якутск'),
(26206, 'г Алдан'),
(26215, 'г Вилюйск'),
(26219, 'г Нюрба'),
(26220, 'г Ленск'),
(26222, 'г Мирный'),
(26227, 'г Олекминск'),
(26229, 'г Покровск'),
(26230, 'г Среднеколымск'),
(26726, 'г Биробиджан'),
(26730, 'г Облучье');

-- --------------------------------------------------------

--
-- Структура таблицы `citynull`
--

CREATE TABLE `citynull` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tax_number` int(11) NOT NULL,
  `photo` varchar(2000) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `manager_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `title` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `title`) VALUES
(1, 'RUB'),
(2, 'USD'),
(3, 'EUR'),
(4, 'CHF'),
(5, 'GBP'),
(6, 'JPY'),
(7, 'UAH'),
(8, 'KZT'),
(9, 'BYN'),
(10, 'TRY'),
(11, 'CNY'),
(12, 'PLN');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery_type`
--

CREATE TABLE `delivery_type` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `favourite`
--

CREATE TABLE `favourite` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `favourite`
--

INSERT INTO `favourite` (`user_id`) VALUES
(7),
(8),
(9);

-- --------------------------------------------------------

--
-- Структура таблицы `favourite_has_product`
--

CREATE TABLE `favourite_has_product` (
  `favourite_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `advantages` text NOT NULL,
  `disadvantages` text NOT NULL,
  `description` text NOT NULL,
  `evalutation` int(2) NOT NULL,
  `status` set('Одобрен','Отклонен','На проверке') NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback_media`
--

CREATE TABLE `feedback_media` (
  `id` int(11) NOT NULL,
  `media_type_id` int(11) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `feedback_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`id`, `title`) VALUES
(1, 'мужской'),
(2, 'женский');

-- --------------------------------------------------------

--
-- Структура таблицы `manager_list`
--

CREATE TABLE `manager_list` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `media_type`
--

CREATE TABLE `media_type` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1674468780),
('m140506_102106_rbac_init', 1674735576),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1674735576),
('m180523_151638_rbac_updates_indexes_without_prefix', 1674735577),
('m200409_110543_rbac_update_mssql_trigger', 1674735577),
('m230123_100438_create_user_table', 1674468788);

-- --------------------------------------------------------

--
-- Структура таблицы `order_place`
--

CREATE TABLE `order_place` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `house` int(11) NOT NULL,
  `flat` int(11) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `discount` int(11) NOT NULL,
  `is_discounted` tinyint(1) NOT NULL,
  `specifications` text NOT NULL,
  `way_to_use` text NOT NULL,
  `rating` float NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `price` float NOT NULL,
  `new_price` float NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `product_media`
--

CREATE TABLE `product_media` (
  `id` int(11) NOT NULL,
  `media_type_id` int(11) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `permissions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `auth_key`, `password_hash`, `password_reset_token`, `city_id`, `currency_id`, `cart_id`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(4, 'asdasda', 'aPoEu2z9na5nK0gpNtlLXcuZb8oXV7Bk', '$2y$13$yOM3JYSkUAGRFZxx2FuVw.agdJS2VHqpxSNxKzNMZhN40uY/C6s9u', NULL, 2034, 1, NULL, 'sadaads@asda.f', '535435345', 10, 1674729953, 1674729953),
(5, 'csdcdcd', 'nSCsejTs4CYpjXxBxGoXr7MGIsQxgSFJ', '$2y$13$68hgG1gJYZm0JNn9QmKpPOXDCIfR3CX.W72gOJRKTcs0NtJfsM50.', NULL, 856, 7, NULL, 'csdcdcs@fvfv.rty', '43534543', 10, 1674729977, 1674729977),
(6, 'admin', 'cUK8-ZXB9-zhcUxGJLyUUWxQ-yG644uI', '$2y$13$frqTO0kS5uN1YCM63ThGiOhgWcTZnla1g1BWD9uOX3NhGIVKGkOoK', NULL, 3, 1, NULL, 'monriarty@yandex.ru', '+79213219948', 10, 1674769076, 1674769076),
(7, 'пользователь обыкновенный', '8KeCqLppghVCub3W9LDNiV94oVCj4GOI', '$2y$13$8cJpks4A3v.PXZAhNNy4auiQzAUAGpVJ78zlbZY3G1mzSfS7rWleO', NULL, 1, 1, NULL, 'simpleuser@buy.com', '88005553535', 10, 1674836309, 1674836309),
(8, 'пользователь', 'jUZXO3H7GHMqg17EmSsRFO-87AMeXG5m', '$2y$13$Ie8v0hy1wgnWzjnZc.sC7up22KMyOLr8ppbK/F/4fKSnwQpArUocS', NULL, 3, 1, NULL, 'user@use.ru', '86966969696', 10, 1674836547, 1674836547),
(9, 'чувак', '50Y8psWK0cn5nh8aMoRPpZTTivm7nmPi', '$2y$13$XLb8TI3QoGGExp2levnJCuMDIcU2Py0/jawaR7tJvLsCzmifYFBKu', NULL, 3, 1, NULL, 'dude@man.du', '88888888888', 10, 1674837629, 1674837629);

-- --------------------------------------------------------

--
-- Структура таблицы `user_has_order`
--

CREATE TABLE `user_has_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `delivery_type_id` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `total_discount` int(11) NOT NULL,
  `order_place_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `is_delivered` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `avatar` varchar(2000) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `first_name`, `last_name`, `avatar`, `date_of_birth`, `gender_id`) VALUES
(7, 'Неизвестный', 'Пользователь', NULL, NULL, NULL),
(8, 'Неизвестный', 'Пользователь', NULL, NULL, NULL),
(9, 'Неизвестный', 'Пользователь', NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart_has_product`
--
ALTER TABLE `cart_has_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `citynull`
--
ALTER TABLE `citynull`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_list_id` (`manager_list_id`),
  ADD KEY `company_ibfk_2` (`created_by`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `delivery_type`
--
ALTER TABLE `delivery_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favourite`
--
ALTER TABLE `favourite`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Индексы таблицы `favourite_has_product`
--
ALTER TABLE `favourite_has_product`
  ADD UNIQUE KEY `favourite_id` (`favourite_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Индексы таблицы `feedback_media`
--
ALTER TABLE `feedback_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_id` (`feedback_id`),
  ADD KEY `media_type_id` (`media_type_id`);

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manager_list`
--
ALTER TABLE `manager_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Индексы таблицы `media_type`
--
ALTER TABLE `media_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order_place`
--
ALTER TABLE `order_place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Индексы таблицы `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `media_type_id` (`media_type_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `currency_id` (`currency_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `user_has_order`
--
ALTER TABLE `user_has_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_type_id` (`delivery_type_id`),
  ADD KEY `card_id` (`card_id`),
  ADD KEY `order_place_id` (`order_place_id`);

--
-- Индексы таблицы `user_profile`
--
ALTER TABLE `user_profile`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `cart_has_product`
--
ALTER TABLE `cart_has_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26731;

--
-- AUTO_INCREMENT для таблицы `citynull`
--
ALTER TABLE `citynull`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `delivery_type`
--
ALTER TABLE `delivery_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback_media`
--
ALTER TABLE `feedback_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `manager_list`
--
ALTER TABLE `manager_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `media_type`
--
ALTER TABLE `media_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_place`
--
ALTER TABLE `order_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user_has_order`
--
ALTER TABLE `user_has_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cart_has_product`
--
ALTER TABLE `cart_has_product`
  ADD CONSTRAINT `cart_has_product_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_has_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`manager_list_id`) REFERENCES `manager_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favourite_has_product`
--
ALTER TABLE `favourite_has_product`
  ADD CONSTRAINT `favourite_has_product_ibfk_1` FOREIGN KEY (`favourite_id`) REFERENCES `favourite` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_has_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `feedback_media`
--
ALTER TABLE `feedback_media`
  ADD CONSTRAINT `feedback_media_ibfk_1` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_media_ibfk_2` FOREIGN KEY (`media_type_id`) REFERENCES `media_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `manager_list`
--
ALTER TABLE `manager_list`
  ADD CONSTRAINT `manager_list_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_place`
--
ALTER TABLE `order_place`
  ADD CONSTRAINT `order_place_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_place_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `citynull` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `product_media_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_media_ibfk_2` FOREIGN KEY (`media_type_id`) REFERENCES `media_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_5` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_has_order`
--
ALTER TABLE `user_has_order`
  ADD CONSTRAINT `user_has_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`delivery_type_id`) REFERENCES `delivery_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_order_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_order_ibfk_3` FOREIGN KEY (`order_place_id`) REFERENCES `order_place` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
