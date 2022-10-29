<?php
$sql = "
    SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
    SET time_zone = '+00:00';
    SET NAMES 'utf8';
    SET CHARACTER SET 'utf8';
    SET SESSION collation_connection = 'utf8_general_ci';

    CREATE TABLE IF NOT EXISTS `items` (
        `id` int(11) UNSIGNED NOT NULL,
        `title` varchar(100) NOT NULL,
        `price` int(5) UNSIGNED NOT NULL,
        `category` varchar(50) NOT NULL
        ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;
    
    INSERT INTO `items` (`id`, `title`, `price`, `category`) VALUES
        (1, 'Кружка Мужская', 300, 'cups'),
        (2, 'Кепка красная', 150, 'hats'),
        (3, 'Кепка синяя', 200, 'hats'),
        (4, 'Кружка Женская', 400, 'cups'),
        (5, 'Красная футблока', 550, 'shirts'),
        (6, 'Футболка \"Рик и Морти\"', 700, 'shirts');

    CREATE TABLE IF NOT EXISTS `orders` (
        `id` int(11) UNSIGNED NOT NULL,
        `user_id` int(11) UNSIGNED NOT NULL,
        `item_id` int(11) UNSIGNED NOT NULL
        ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

    CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) UNSIGNED NOT NULL,
        `login` varchar(150) NOT NULL,
        `pass` varchar(32) NOT NULL
        ) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

    INSERT INTO `users` (`id`, `login`, `pass`) VALUES
        (1, 'john', 'some_pass'),
        (2, 'john', 'some_pass'),
        (3, 'dm', 'some_pass'),
        (4, 'konst', 'some_pass');

    ALTER TABLE `items`
        ADD PRIMARY KEY (`id`);
      
    ALTER TABLE `orders`
        ADD PRIMARY KEY (`id`);
      
    ALTER TABLE `users`
        ADD PRIMARY KEY (`id`);

    ALTER TABLE `items`
        MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

    ALTER TABLE `orders`
        MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

    ALTER TABLE `users`
        MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

    ALTER TABLE `orders` ADD FOREIGN KEY (`item_id`) REFERENCES `items`(`id`);

    ALTER TABLE `orders` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);
    
    ";     

$conn->exec($sql);
echo "<br><span class='text-primary'>Данные успешно добавлены в БД</span>";
?>