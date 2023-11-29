-- Created by Qina Yu

CREATE DATABASE `coderfly`;
GRANT USAGE ON *.* TO 'qiu'@'localhost' IDENTIFIED BY 'algonquin';
GRANT ALL PRIVILEGES ON coderfly.* TO 'qiu'@'localhost';
FLUSH PRIVILEGES;
use `coderfly`;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS blog;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS users;

-- users
CREATE TABLE users (
    UserId INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(10),
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    Email VARCHAR(30),
    Password VARCHAR(15)
);

-- category
CREATE TABLE category (
    CategoryId INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(20)
);

-- blog
CREATE TABLE blog (
    BlogId INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255),
    CreatedOnDate DATE,
    Content TEXT,
    CategoryId INT,
    UserId INT,
    FOREIGN KEY (CategoryId) REFERENCES category(CategoryId),
    FOREIGN KEY (UserId) REFERENCES users(UserId)
);

-- category
CREATE TABLE comments (
    CommentId INT AUTO_INCREMENT PRIMARY KEY,
    CommentedOnDate DATE,
    CommentContent TEXT,
    BlogId INT,
    UserId INT,
    FOREIGN KEY (BlogId) REFERENCES blog(BlogId),
    FOREIGN KEY (UserId) REFERENCES users(UserId)
);

-- Sample data for Users Entity
INSERT INTO users (Username, FirstName, LastName, Email, Password) VALUES
    ('user1', 'John', 'Doe','user1@gmail.com', 'password1'),
    ('user2', 'Jane', 'Smith','user2@gmail.com', 'password2'),
    ('user3', 'Mike', 'Johnson','user3@gmail.com', 'password3'),
    ('user4', 'Emily', 'Davis','user4@gmail.com', 'password4'),
    ('user5', 'David', 'Wilson','user5@gmail.com', 'password5');

-- Sample data for Category Entity
INSERT INTO category (CategoryName) VALUES
    ('Java'),
    ('HTML'),
    ('CSS'),
    ('JavaScript'),
    ('PHP');

-- Sample data for Blog Entity
INSERT INTO blog (Title, CreatedOnDate, Content, CategoryId, UserId) VALUES
    ('Polymorphism', '2023-11-01', 'Relying on each object to do different things in response to the same method call. There are two types of polymorphism in OOP:
a. **Compile-Time Polymorphism (Static Polymorphism):** This is also known as method overloading. It occurs when you have multiple methods in a class with the same name but different parameters. The appropriate method to call is determined at compile time based on the method signature and the arguments provided.
b.**Run-Time Polymorphism (Dynamic Polymorphism):** The ability to treat different classes as the same super class.This is also known as method overriding. It occurs when a subclass provides its own implementation of a method that is already defined in its superclass. The specific method to be called is determined at runtime based on the actual type of the object.
Promotes code reusability, extensibility, flexibility.
Dynamic binding uses object to resolve binding, while static binding uses type of the class and fields. Static binding is for final, static and private methods.', 1, 1),
    ('HTML Notes', '2023-11-02', 'The Web is the collection of websites and pages linking to each other. The internet is hardware plus protocols while the www is software plus protocols
Server: a computer responds to HTTP request.
Browser: rendering the webpage
Protocol: govern how data packets are transferred. Implemented in every os.
HTTP: Web Communication 200 OK 301-303 page removed 403 forbidden 404 PNF 500 server error
SSH: Secure Shell Protocol allows remote command-line connections to server.
FTP: used for transferring files between computers.
POP/IMAP/SMTP: Email-related protocols for transferring and storing emails.
DNS: resolving domain names to IP addresses.
32 IPv4 last 8 bit host ID, 128IPv6
IP Address + Port number = Socket', 2, 2),
    ('Styling with CSS', '2023-11-03', 'Explore the world of Cascading Style Sheets (CSS).', 3, 3),
    ('JavaScript Fundamentals', '2023-11-04', 'Get started with JavaScript programming.', 4, 4),
    ('PHP Development Guide', '2023-11-05', 'A comprehensive guide to PHP web development.', 5, 5);

-- Sample data for Comments Entity
INSERT INTO comments (CommentedOnDate, CommentContent, BlogId, UserId) VALUES
    ('2023-11-01', 'Great blog about Java!', 1, 1),
    ('2023-11-02', 'I found the HTML tutorial very helpful.', 2, 2),
    ('2023-11-03', 'CSS is essential for web design.', 3, 3),
    ('2023-11-04', 'JavaScript is my favorite language.', 4, 4),
    ('2023-11-05', 'PHP is powerful for web development.', 5, 4);



select * from users;
