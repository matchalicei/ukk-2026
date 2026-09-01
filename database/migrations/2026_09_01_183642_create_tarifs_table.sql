-- create_tarifs_table

CREATE TABLE IF NOT EXISTS `tarif` (
    id_tarif         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    jenis_kendaraan ENUM('mobil', 'motor') NOT NULL,
    tarif_per_jam DECIMAL(10,0) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
