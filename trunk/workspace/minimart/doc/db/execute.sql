###########################
# Execute in table category
###########################

# Procedure get all category

DROP PROCEDURE IF EXISTS GET_ALL_CATEGORY;
DELIMITER //
CREATE PROCEDURE GET_ALL_CATEGORY()
BEGIN
	SELECT * FROM category;
END //
DELIMITER ;

# Procedure in table category with condition
DROP PROCEDURE IF EXISTS GET_BY_CATEGORY_ID;
DELIMITER //
CREATE PROCEDURE GET_BY_CATEGORY_ID(id_ int)
BEGIN
	SELECT * FROM category WHERE category_id = id_;
END //
DELIMITER ;

################################
# Execute in table product_type
################################

# Procedure get all product_type

DROP PROCEDURE IF EXISTS GET_ALL_PRODUCT_TYPE;
DELIMITER //
CREATE PROCEDURE GET_ALL_PRODUCT_TYPE()
BEGIN
	SELECT * FROM product_type;
END //
DELIMITER ;

# Procedure in table product_type with condition
DROP PROCEDURE IF EXISTS GET_BY_PRODUCT_TYPE_ID;
DELIMITER //
CREATE PROCEDURE GET_BY_PRODUCT_TYPE_ID(id_ int)
BEGIN
	SELECT * FROM product_type WHERE id = id_;
END //
DELIMITER ;

# Procedure in table product_type with condition
DROP PROCEDURE IF EXISTS GET_PRODUCT_TYPE_BY_CATEGORY_ID;
DELIMITER //
CREATE PROCEDURE GET_PRODUCT_TYPE_BY_CATEGORY_ID(category_id_ int)
BEGIN
	SELECT * FROM product_type WHERE category_id = category_id_;
END //
DELIMITER ;

################################
# Execute in table product
################################

# Procedure get all product

DROP PROCEDURE IF EXISTS GET_ALL_PRODUCT;
DELIMITER //
CREATE PROCEDURE GET_ALL_PRODUCT()
BEGIN
	SELECT * FROM product;
END //
DELIMITER ;

# Procedure in table product with condition
DROP PROCEDURE IF EXISTS GET_BY_PRODUCT_ID;
DELIMITER //
CREATE PROCEDURE GET_BY_PRODUCT_ID(id_ int)
BEGIN
	SELECT * FROM product WHERE product_id = id_;
END //
DELIMITER ;


# Procedure in table product with condition
DROP PROCEDURE IF EXISTS GET_PRODUCT_BY_PRODUCT_TYPE_ID;
DELIMITER //
CREATE PROCEDURE GET_PRODUCT_BY_PRODUCT_TYPE_ID(product_type_ int)
BEGIN
	SELECT * FROM product WHERE product_type = product_type_;
END //
DELIMITER ;