-- 1. Спроектировать структуру таблиц(ы) для хранения Контактов, которые могут 
-- иметь друзей из этого же списка Контактов (в рамках задачи достаточно хранить 
-- только Имя Контакта). Если Контакт 2 является другом Контакта 1, 
-- это не означает, что Контакт 1 является другом Контакта 2.

CREATE TABLE contact
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE friendship (
	contact_id INT UNSIGNED NOT NULL,
	friend_id INT UNSIGNED NOT NULL,

	PRIMARY KEY (contact_id, friend_id),
	
	CONSTRAINT FK_friendship_contact FOREIGN KEY (contact_id) 
	  REFERENCES contact (id) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT FK_friendship_friend FOREIGN KEY (friend_id) 
	  REFERENCES contact (id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

DELIMITER $$
CREATE TRIGGER cant_be_friends_with_myself BEFORE INSERT ON friendship
  FOR EACH ROW BEGIN
    IF NEW.contact_id=NEW.friend_id THEN
      SIGNAL SQLSTATE '45000';
  END IF;
END$$

-- 1.1. Написать запрос sql, отображающий список Контактов, имеющих больше 5 друзей.
SELECT c.name FROM contact c JOIN friendship f ON c.id=f.contact_id
GROUP BY c.id HAVING COUNT(f.friend_id) > 5 ORDER BY c.name;

-- 1.2. Написать запрос sql, отображающий все пары Контактов, 
-- которые дружат друг с другом. Исключить дубликаты.
SELECT c1.name, c2.name
FROM friendship f1 
  JOIN friendship f2 ON f1.friend_id=f2.contact_id 
    AND f2.friend_id=f1.contact_id
  JOIN contact c1 ON f1.contact_id=c1.id
  JOIN contact c2 ON f2.contact_id=c2.id
WHERE c1.id < c2.id;
