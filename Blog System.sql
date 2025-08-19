create Database BlogSystem;
Use BlogSystem;

create table Users(
UserID int auto_increment primary key,
Name varchar(50) not null,
Email varchar(80) unique not null,
Phone varchar(20),
Password varchar(50) not null
);

create table Profile(
ProfileID int auto_increment primary key,
UserID int ,
Bio varchar(50),
foreign key (UserID) references Users(UserID)
);

create table Posts(
PostID int auto_increment primary key,
UserID int ,
Title varchar(50) not null,
Content text,
CreatedAt  timestamp default current_timestamp,
foreign key (UserID) references Users(UserID)
);

create table Categories(
CategoryID int auto_increment primary key,
ca_Name varchar(50),
ca_Description text
);

-- bridge 
CREATE TABLE PostCategories (
    PostID INT,
    CategoryID INT,
    PRIMARY KEY (PostID, CategoryID),
    FOREIGN KEY (PostID) REFERENCES Posts(PostID),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

create table Comments(
CommentID int auto_increment primary key,
PostID int ,
UserID int ,
Content text,
CreatedAt  timestamp default current_timestamp,
 FOREIGN KEY (PostID) REFERENCES Posts(PostID),
 foreign key (UserID) references Users(UserID)
 );
 
 CREATE TABLE Tags (
    TagID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) UNIQUE NOT NULL
);
 
-- bridge
 CREATE TABLE PostTags (
    PostID INT,
    TagID INT,
    PRIMARY KEY (PostID, TagID),
    FOREIGN KEY (PostID) REFERENCES Posts(PostID),
    FOREIGN KEY (TagID) REFERENCES Tags(TagID)
);


insert into Users( Name , Email , Phone , Password) values 
('Ali Ahmed', 'ali@example.com', '01012345678', 'pass123'),
('Sara Mohamed', 'sara@example.com', '01098765432', 'pass456'),
('Omar Khaled', 'omar@example.com', '01122334455', 'pass789');

insert into Profile (UserID, Bio) values
(1, 'I am Ali, a software engineer who loves blogging.'),
(2, 'Sara here! I write about travel and food.'),
(3, 'Omar is passionate about technology and startups.');

insert into Posts (UserID, Title, Content) values
(1, 'First Post', 'This is the first blog post content.'),
(1, 'Second Post', 'Another post from Ali.'),
(2, 'Travel to Italy', 'My experience in Rome and Florence.'),
(3, 'Tech Trends 2025', 'AI, Blockchain, and more.');

insert into Categories ( ca_Name , ca_Description) values 
('Technology', 'All about latest tech trends.'),
('Travel', 'Travel guides and experiences.'),
('Food', 'Delicious recipes and food blogs.');

INSERT INTO PostCategories (PostID, CategoryID) VALUES
(1, 1), 
(2, 1),
(3, 2),
(3, 3),
(4, 1);

INSERT INTO Tags (Name) VALUES
('AI'),
('Blockchain'),
('Recipes'),
('Europe'),
('Tutorial');

INSERT INTO PostTags (PostID, TagID) VALUES
(1, 5),
(3, 4),
(3, 3), 
(4, 1), 
(4, 2); 

INSERT INTO Comments (PostID, UserID, Content) VALUES
(1, 2, 'Great first post, Ali!'),
(1, 3, 'Looking forward to more content.'),
(3, 1, 'Nice trip, Sara! I want to visit too.'),
(4, 2, 'Very informative post, thanks Omar.');


SELECT * FROM Users;

-- Show all posts with the author's name
SELECT p.PostID, p.Title, p.Content, u.Name AS Author
FROM Posts p
JOIN Users u ON p.UserID = u.UserID;


-- update users phone
UPDATE Users
SET Phone = '01234567890'
WHERE UserID = 1;


