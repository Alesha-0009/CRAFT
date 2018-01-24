CREATE TABLE roles(
  id int NOT NULL AUTO_INCREMENT,
  role_name VARCHAR (50),

  PRIMARY KEY (id)
);

INSERT INTO roles (role_name) VALUES ('Администратор');
INSERT INTO roles (role_name) VALUES ('Модератор');
INSERT INTO roles (role_name) VALUES ('Пользователь');