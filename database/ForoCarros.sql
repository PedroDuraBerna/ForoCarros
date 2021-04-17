-- CREATE DATABASE

	CREATE DATABASE Database_ForoCarros;
	USE Database_ForoCarros;

-- USER

	CREATE TABLE users
	(
		users_id INT auto_increment NOT NULL,
		users_name VARCHAR(25) NOT NULL,
		users_password VARCHAR(1000) NOT NULL,
		users_email VARCHAR(100) NOT NULL,
		users_bio VARCHAR(10000),
		users_sign VARCHAR(100),
		users_interests VARCHAR(1000),
		users_birth_date date NOT NULL,
		users_registration_date DATETIME NOT NULL,
		users_last_connection_date DATETIME,
		users_profile_photo VARCHAR(1000),
		users_profile_visits_counter INT,
		users_rol VARCHAR(20) NOT NULL,
		CONSTRAINT pk_ususario PRIMARY KEY(users_id)
	) ENGINE=InnoDb;
		
-- TOPICS

	CREATE TABLE topics
	(
		topics_id INT auto_increment NOT NULL,
		topics_name VARCHAR(100) NOT NULL,
		topics_image VARCHAR(1000),
		CONSTRAINT pk_topics PRIMARY KEY(topics_id)
	) ENGINE=InnoDb;

	INSERT INTO topics (topics_id,topics_name)
	VALUES (1,"General"),(2,"Anime"),(3,"Deportes"),(4,"Informática"),(5,"Videojuegos"),(6,"Música"),(7,"Series"),(8,"Cine"),(9,"Humor"),(10,"Política"),(11,"Viajes"),(12,"Economía"),(13,"Cocina"),(14,"Arte"),(15,"Historia"),(16,"Moda"),(17,"Animales"),(18,"Paranormal"),(19,"Conspiraciones"),(20,"Carros");

-- POSTS

	CREATE TABLE posts
	(
		posts_id INT auto_increment NOT NULL,
		posts_title VARCHAR(50) NOT NULL,
		posts_text VARCHAR(20000) NOT NULL,
		posts_date DATETIME NOT NULL,
		posts_last_modification_date DATETIME NOT NULL,
		posts_visits_counter INT NOT NULL,
		posts_image VARCHAR(1000),
		users_id INT,
		topics_id INT,
		CONSTRAINT pk_posts PRIMARY KEY(posts_id),
		FOREIGN KEY(users_id) REFERENCES users(users_id),
		FOREIGN KEY(topics_id) REFERENCES topics(topics_id)
	) ENGINE=InnoDb;

-- LIKED POSTS

	CREATE TABLE liked_posts
	(
		users_id INT,
		posts_id INT,
		FOREIGN KEY(users_id) REFERENCES users(users_id),
		FOREIGN KEY(posts_id) REFERENCES posts(posts_id)
	) ENGINE=InnoDb;

-- COMMENTS

	CREATE TABLE comments
	(
		comments_id INT auto_increment NOT NULL,
		comments_text VARCHAR(10000) NOT NULL,
		comments_date DATETIME NOT NULL,
		comments_last_modified_date DATETIME NOT NULL,
		comments_image VARCHAR(1000),
		posts_id INT,
		users_id INT,
		CONSTRAINT pk_comments PRIMARY KEY(comments_id),
		FOREIGN KEY(posts_id) REFERENCES posts(posts_id),
		FOREIGN KEY(users_id) REFERENCES users(users_id)
	) ENGINE=InnoDb;

-- LIKED COMMENT

	CREATE TABLE liked_comments
	(
		comments_id INT,
		users_id INT,
		FOREIGN KEY(users_id) REFERENCES users(users_id),
		FOREIGN KEY(comments_id) REFERENCES comments(comments_id)
	) ENGINE=InnoDb;

-- VERSION 1.0 DATE 16/04/2021 PEDRO DURÁ BERNÁ