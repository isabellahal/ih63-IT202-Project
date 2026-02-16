CREATE DATABASE candles;

CREATE USER 'candles_user'@'localhost' IDENTIFIED BY 'InventoryHelper';

GRANT SELECT,UPDATE,INSERT,DELETE ON candles.* TO 'candles_user'@'localhost';

USE candles;

CREATE TABLE candles_users (
    candles_user_id INT NOT NULL AUTO_INCREMENT,
    email_address VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    pronouns VARCHAR(60) NOT NULL,
    first_name VARCHAR(60) NOT NULL,
    last_name VARCHAR(60) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (candles_user_id)
);

INSERT INTO candles_users 
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('reefieteefie@candles.com', SHA2('myL0ngP@ssword', 256), 'She/Her', 'Reef', 'Teef', '222-2359');
INSERT INTO candles_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('beebeeboopboop@candles.com', SHA2('myL0ngP@ssword', 256), 'He/They', 'Bee', 'Boop', '177-8903');
INSERT INTO candles_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('supermegaaves@candles.com', SHA2('myL0ngP@ssword', 256), 'She/They', 'Aves', 'Fox', '584-0237');

SELECT * FROM candles_users;