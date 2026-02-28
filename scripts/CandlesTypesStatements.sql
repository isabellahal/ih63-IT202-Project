DROP TABLE IF EXISTS candles;
DROP TABLE IF EXISTS candles_types;
CREATE TABLE candles_types (
candles_type_id INT NOT NULL,
candles_type_code VARCHAR(255) NOT NULL UNIQUE,
candles_type_name VARCHAR(255) NOT NULL,
candles_type_shelf_number VARCHAR(50) NOT NULL,
date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY ( candles_type_id )
);

INSERT INTO candles_types
(candles_type_id, candles_type_code, candles_type_name, candles_type_shelf_number)
VALUES
(1, 'SCNT', 'Scented', 'A1');
INSERT INTO candles_types
(candles_type_id, candles_type_code, candles_type_name, candles_type_shelf_number)
VALUES
(2, 'LED', 'LED', "B2");
INSERT INTO candles_types
(candles_type_id, candles_type_code, candles_type_name, candles_type_shelf_number)
VALUES
(3, 'DECO', 'Decorative', "C3");

SELECT * FROM candles_types;