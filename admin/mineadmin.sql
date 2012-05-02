
CREATE PROCEDURE addcol() BEGIN
IF NOT EXISTS(
	SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'users' AND COLUMN_NAME = 'password' and table_schema = 'minecraft'
	)
	THEN
		ALTER TABLE users ADD password varchar(255);
END IF;
END;

CALL addcol();

DROP PROCEDURE addcol;

insert into users (name, groups, password) values ('admin','default', '$O$Brl4bRZY/Lt9yEk.6htwp7hmElu6rO1gXFLmzoBTyYHLpZWUDy.gkyUtZoqakeESC1Z5JsXlPbPkoPJHP95hSzoN4aiDe2/');