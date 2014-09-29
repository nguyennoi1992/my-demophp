SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `minimart` ;
CREATE SCHEMA IF NOT EXISTS `minimart` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `minimart` ;

-- -----------------------------------------------------
-- Table `minimart`.`permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`permission` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`permission` (
  `id` INT NOT NULL ,
  `name` VARCHAR(30) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`user` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`user` (
  `user_id` INT(11) NOT NULL DEFAULT '0' ,
  `password` VARCHAR(30) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `gender` INT(11) NOT NULL ,
  `city` VARCHAR(30) NOT NULL ,
  `address` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(45) NOT NULL ,
  `status` BIT NOT NULL ,
  `money` DOUBLE NOT NULL ,
  `sigup_time` DATE NOT NULL ,
  `image_link` TEXT NOT NULL ,
  `permission_id` INT NOT NULL ,
  PRIMARY KEY (`user_id`) ,
  CONSTRAINT `fk_user_permission1`
    FOREIGN KEY (`permission_id` )
    REFERENCES `minimart`.`permission` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_user_permission1_idx` ON `minimart`.`user` (`permission_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`category` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`category` (
  `category_id` VARCHAR(10) NOT NULL ,
  `category_name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`category_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`product_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`product_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`product_type` (
  `id` VARCHAR(30) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `category_id` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_product_type_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `minimart`.`category` (`category_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_product_type_category1_idx` ON `minimart`.`product_type` (`category_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`product` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`product` (
  `product_id` INT NOT NULL ,
  `product_name` VARCHAR(45) NOT NULL ,
  `origin` VARCHAR(45) NOT NULL ,
  `price` DOUBLE NOT NULL ,
  `quantity` INT NOT NULL ,
  `update_time` DATE NOT NULL ,
  `rate` INT NOT NULL ,
  `status` INT NOT NULL ,
  `product_type` VARCHAR(30) NOT NULL ,
  `selled` INT NOT NULL ,
  PRIMARY KEY (`product_id`) ,
  CONSTRAINT `fk_product_product_type1`
    FOREIGN KEY (`product_type` )
    REFERENCES `minimart`.`product_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_product_product_type1_idx` ON `minimart`.`product` (`product_type` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`articles_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`articles_type` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`articles_type` (
  `id` INT NOT NULL ,
  `type_name` VARCHAR(45) NOT NULL ,
  `description` TEXT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`articles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`articles` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`articles` (
  `articles_id` INT NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `create_time` DATETIME NOT NULL ,
  `content` VARCHAR(45) NOT NULL ,
  `user_create` INT NOT NULL ,
  `del_flag` BIT NOT NULL ,
  `articles_type` INT NOT NULL ,
  PRIMARY KEY (`articles_id`) ,
  CONSTRAINT `fk_articles_articles_type1`
    FOREIGN KEY (`articles_type` )
    REFERENCES `minimart`.`articles_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_articles_articles_type1_idx` ON `minimart`.`articles` (`articles_type` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`order` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`order` (
  `id` INT NOT NULL ,
  `order_time` DATE NOT NULL ,
  `shipped_time` DATE NOT NULL ,
  `status` VARCHAR(15) NOT NULL ,
  `note` TEXT NOT NULL ,
  `user_id` INT(11) NOT NULL ,
  `create_time` TIMESTAMP NOT NULL ,
  `delete_time` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_order_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `minimart`.`user` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_order_user1_idx` ON `minimart`.`order` (`user_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`order_detail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`order_detail` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`order_detail` (
  `product_type_id` VARCHAR(30) NOT NULL ,
  `quantity` INT NULL ,
  `price_each` DOUBLE NULL ,
  PRIMARY KEY (`product_type_id`) ,
  CONSTRAINT `fk_product_type_has_order_product_type1`
    FOREIGN KEY (`product_type_id` )
    REFERENCES `minimart`.`product_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_product_type_has_order_product_type1_idx` ON `minimart`.`order_detail` (`product_type_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`order_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`order_details` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`order_details` (
  `product_id` INT NOT NULL ,
  `order_id` INT NOT NULL ,
  `quantity` INT NOT NULL ,
  `price_each` DOUBLE NOT NULL ,
  PRIMARY KEY (`product_id`, `order_id`) ,
  CONSTRAINT `fk_product_has_order_product1`
    FOREIGN KEY (`product_id` )
    REFERENCES `minimart`.`product` (`product_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_has_order_order1`
    FOREIGN KEY (`order_id` )
    REFERENCES `minimart`.`order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_product_has_order_order1_idx` ON `minimart`.`order_details` (`order_id` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_product_has_order_product1_idx` ON `minimart`.`order_details` (`product_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`action`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`action` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`action` (
  `code` VARCHAR(45) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`code`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`log_data_history`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`log_data_history` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`log_data_history` (
  `log_id` INT NOT NULL ,
  `user_id` INT(11) NOT NULL ,
  `action_type` VARCHAR(45) NOT NULL ,
  `data_row` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`log_id`) ,
  CONSTRAINT `fk_log_data_history_action1`
    FOREIGN KEY (`action_type` )
    REFERENCES `minimart`.`action` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_log_data_history_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `minimart`.`user` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_log_data_history_action1_idx` ON `minimart`.`log_data_history` (`action_type` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_log_data_history_user1_idx` ON `minimart`.`log_data_history` (`user_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `minimart`.`table1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `minimart`.`table1` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `minimart`.`table1` (
  `log_id` INT NOT NULL ,
  `field` VARCHAR(45) NOT NULL ,
  `value` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`log_id`, `field`) ,
  CONSTRAINT `fk_table1_log_data_history1`
    FOREIGN KEY (`log_id` )
    REFERENCES `minimart`.`log_data_history` (`log_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_table1_log_data_history1_idx` ON `minimart`.`table1` (`log_id` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
