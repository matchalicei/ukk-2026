-- create_members_table

CREATE TABLE IF NOT EXISTS `member` (
    id_member       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_member      VARCHAR(100) NOT NULL,
    plat_nomor       VARCHAR(100) NOT NULL,
    jenis_kendaraan  VARCHAR(100) NOT NULL,
    warna            VARCHAR(100) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
