CREATE TABLE `modstud_stu` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `NAME` VARCHAR(65536) NOT NULL,
        `SURNAME` VARCHAR(65536) NOT NULL,
        `PATRONYMIC` VARCHAR(65536) NOT NULL,
        PRIMARY KEY(ID)
    );

CREATE TABLE `modstud_tea` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `NAME` VARCHAR(65536) NOT NULL,
        `SURNAME` VARCHAR(65536) NOT NULL,
        `PATRONYMIC` VARCHAR(65536) NOT NULL,
        PRIMARY KEY(ID)
    );

CREATE TABLE `modstud_timetable` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `DATETIME` TIMESTAMP NOT NULL,
        `ClASSROOM` INT(11) DEFAULT 0,
        `LESSON` VARCHAR(65536) NOT NULL,
        `ID_TEACH` INT(11) DEFAULT 0,
        PRIMARY KEY(ID)
    );

CREATE TABLE `modstud_categ` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `TABLE_ST_ID` INT(11) DEFAULT 0,
        `ID_STUD` INT(11) DEFAULT 0,
         PRIMARY KEY(ID)
    );
