CREATE DATABASE converter_admin;
USE converter_admin;

CREATE TABLE exchange_rates (
    from_currency VARCHAR(3),
    to_currency   VARCHAR(3),
    rate          DECIMAL(10,4),
    PRIMARY KEY (from_currency, to_currency)
);

INSERT INTO exchange_rates VALUES
('USD','INR',83.00),
('INR','USD',0.012),
('USD','SGD',1.35),
('SGD','USD',0.74),
('USD','EUR',0.92),
('EUR','USD',1.08),
('USD','GBP',0.79),
('GBP','USD',1.27),
('USD','JPY',148.50),
('JPY','USD',0.0067),
('INR','EUR',0.011),
('EUR','INR',89.0),
('SGD','EUR',0.66);
