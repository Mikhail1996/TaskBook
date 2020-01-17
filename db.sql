CREATE SCHEMA `tasks` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

CREATE TABLE `tasks`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `e-mail` VARCHAR(45) NOT NULL,
  `text` VARCHAR(1800) NOT NULL,
  `status` INT NOT NULL,
  PRIMARY KEY (`id`));
  
INSERT INTO `tasks`.`tasks` (`name`, `e-mail`, `text`, `status`) VALUES ('Петя', 'petya@mail.ru', 'На ветке сидели две вороны. Одна улетела. Сколько ворон осталось на ветке?', '1');
INSERT INTO `tasks`.`tasks` (`name`, `e-mail`, `text`, `status`) VALUES ('Вася', 'vasya@ya.ru', 'Зимой и летом одним цветом. Что это?', '1');
INSERT INTO `tasks`.`tasks` (`name`, `e-mail`, `text`, `status`) VALUES ('Иван', 'ivan@ya.ru', 'Сколько ног у осьминога?', '1');
INSERT INTO `tasks`.`tasks` (`name`, `e-mail`, `text`, `status`) VALUES ('Аня', 'anya@ya.ru', 'На каком континенте не растут пальмы?', '1');
INSERT INTO `tasks`.`tasks` (`name`, `e-mail`, `text`, `status`) VALUES ('Лена', 'lena@mail.ru', 'Почему снег белый?', '1');

