create database Excalibur default character set utf8;
create user Excalibur@localhost identified by 'Excalibur_password';
grant all privileges on Excalibur.* to Excalibur@localhost;
grant file on *.* to Excalibur@localhost;
use Excalibur;
create table cards (
	Number smallint primary key,
	Title varchar(16) not null,
    Name varchar(32) not null,
    Rare enum('1','2','3','4','5','6') not null,
    Cost enum('1','2','3','4','5') not null,
    Arthur enum('傭兵','富豪','盗賊','歌姫') not null,
    Type enum('物','魔','治','支','守','妨') not null,
    Attribute enum('火','氷','風','光','闇') not null,
    BonusHP smallint unsigned,
    BonusPhysical smallint unsigned,
    BonusMagic smallint unsigned,
    BonusHeal smallint unsigned,
    SkillNormal varchar(256) not null,
    SkillSpecial varchar(256) not null
);
