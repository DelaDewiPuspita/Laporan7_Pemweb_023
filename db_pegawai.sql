CREATE DATABASE db_pegawai;

USE db_pegawai;

CREATE TABLE departemen (
    id_departemen INT(10) NOT NULL AUTO_INCREMENT,
    nama_departemen VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_departemen)
);

CREATE TABLE pegawai (
    id_pegawai INT(10) NOT NULL AUTO_INCREMENT,
    nama_pegawai VARCHAR(100) NOT NULL,
    id_departemen INT(10) NOT NULL,
    gaji INT(10) NOT NULL,
    PRIMARY KEY (id_pegawai),
    FOREIGN KEY (id_departemen) REFERENCES departemen(id_departemen) ON DELETE CASCADE ON UPDATE CASCADE
);
