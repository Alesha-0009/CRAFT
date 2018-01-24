CREATE TABLE user_role(
  id int NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL ,
  role_id int NOT NULL ,

  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (role_id) REFERENCES roles(id)
);