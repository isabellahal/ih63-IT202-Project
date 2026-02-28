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

SELECT * FROM candles;