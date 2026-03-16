CREATE TABLE candles (
    candles_id INT NOT NULL,
    candles_code VARCHAR(10) NOT NULL UNIQUE,
    candles_name VARCHAR(255) NOT NULL,
    candles_description TEXT NOT NULL,
    candles_size VARCHAR(50) NOT NULL,
    candles_burn_time VARCHAR(60) NOT NULL,
    candles_type_id INT DEFAULT 0,
    candles_buy_price DECIMAL(10,2) NOT NULL,
    candles_sell_price DECIMAL(10,2) NOT NULL,
    date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (candles_id),
        FOREIGN KEY (candles_type_id)
        REFERENCES candles_types(candles_type_id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(1, 'NILLA', 'Vanilla', 'Vanilla is a popular candle scent with many variations.', '10 oz', '40h', 1, 20.00, 25.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(2, 'FLAM', 'Flameless', 'This candle requires batteries.', '1 oz', '10,000h', 2, 2.00, 2.40);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(3, 'LAV', 'Lavender', 'Lavender scents are very relaxing.', '12 oz', '45h', 1, 18.00, 24.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(4, 'PEPP', 'Peppermint', 'Peppermint is usually a seasonal candle.', '9 oz', '39h', 1, 16.00, 22.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(5, 'CIN', 'Cinnamon', 'Cinnamon is a warm and spicy scent.', '10 oz', '40h', 1, 17.00, 23.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(6, 'ROSE', 'Rose', 'Rose scents are very fresh and romantic.', '11 oz', '42h', 1, 20.00, 26.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(7, 'LEM', 'Lemon', 'Lemon candles are usually for spring and summer.', '8 oz', '35h', 1, 16.00, 21.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(8, 'APPL', 'Apple', 'Apple candles give off a nice, fruity scent.', '10 oz', '40h', 1, 20.00, 27.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(9, 'COFF', 'Coffee', 'Coffee scented candles smell like real coffee.', '12 oz', '45h', 1, 21.00, 28.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(10, 'COTT', 'Cotton Candy', 'Cotton candy candles smell super sweet.', '10 oz', '37h', 1, 22.00, 26.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(11, 'FLM2', 'LED remote', 'LED candles can sometimes be controlled with remotes.', '5 oz', '10000h', 2, 3.00, 6.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(12, 'FLM3', 'LED small', 'LED candles that are small.', '6 oz', '10000h', 2, 4.00, 8.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(13, 'FLM4', 'LED flicker', 'LED candles that can flicker realistically.', '7 oz', '10000h', 2, 5.00, 9.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(14, 'CLR', 'Clear', 'Candles can be clear with designs inside.', '10 oz', '40h', 3, 20.00, 28.00);
INSERT INTO candles
(candles_id, candles_code, candles_name, candles_description, candles_size, candles_burn_time, candles_type_id, candles_buy_price, candles_sell_price)
VALUES
(15, 'CRVD', 'Hand Carved', 'Candles that have hand carved designs in them.', '12 oz', '50h', 3, 25.00, 35.00);

SELECT * FROM candles;