DROP DATABASE IF EXISTS DeepbookDB;
CREATE DATABASE DeepbookDB;
USE DeepbookDB;

CREATE TABLE Platform (
    PlatformID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    Name varchar (100) NULL,
    Description text NULL,
    policies text NOT NULL
)ENGINE=InnoDB;

CREATE TABLE users (
    userID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    usersUid varchar(100) NULL,
    usersEmail varchar(50) NULL,
    usersPwd varchar (64) NULL,
    profile_img varchar (255) NULL,
    cover_img varchar (255) NULL,
    user_level int(11) DEFAULT 0
)ENGINE=InnoDB;

CREATE TABLE comments (
    commentID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    content varchar(255) NULL,
    userID int NOT NULL,
    FOREIGN KEY (userID) REFERENCES users (userID),
    postID int NOT NULL,
    FOREIGN KEY (postID) REFERENCES posts (postID)
)ENGINE=InnoDB;

CREATE TABLE posts (
    postID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    post text,
    post_img varchar (255) NULL,
    userID int NOT NULL,
    FOREIGN KEY (userID) REFERENCES users (userID)
)ENGINE=InnoDB;


INSERT INTO `users` (`userID`, `usersUid`, `usersEmail`, `usersPwd`, `profile_img`, `cover_img`, `user_level`) VALUES
(1, 'admin', 'admin@admin.hu', '$2y$09$blAYjRdGp4Y3JBDfWfokAuy32osJaTGXUHsso2H3RgxUx9.UrM7bG', NULL, NULL, 1),
(2, 'test', 'test@test.com', '$2y$09$7SfVN2jAF8lB6.7AOsV5GuvOp8WjKN6/vMU6rAzDmMqStdxvUNduu', NULL, NULL, 2),
(3, 'user', 'user@gmail.com', '$2y$09$Np0NrfcLLJwjvximN45oreHZnGaJsWAssKpYp/hO3hdYKAhdDmBEa', NULL, NULL, 0);

INSERT INTO `Platform` (`PlatformID`, `Name`, `Description`, `policies`) VALUES
(1, 'DeepBook', 'Welcome to Deepbook!\r\nDeepbook was developed for people \r\nto share their struggles, help other \r\npeople and seek for help.', '<div class=\"row\" style=\"display:flex;\">\r\n<div class=\"column\"style=\"flex:50%;margin:40px;\">\r\n<h3>GENERAL GUIDELINES</h3>\r\n<p>Sharing U-M news, events or promoting faculty and student work\r\nthrough social media tools is an excellent, low-cost way to engage\r\nthe community and build our brand. Employees are encouraged\r\nto repost and share information with their family and friends that\r\nis available to the public (press releases, articles in the University\r\nRecord, Internet news, etc.). The best way to share university news\r\nis to link to the original source. When sharing information that is\r\nnot a matter of public record, please follow the below guidelines.</p>\r\n<br></br>\r\n<h3>MAINTAIN CONFIDENTIALITY</h3>\r\n<p>Do not post confidential or proprietary information about the\r\nUniversity of Michigan, its students, its alumni or your fellow\r\nemployees. Use good ethical judgment and follow university\r\npolicies and federal requirements, such as the Health Insurance\r\nPortability and Accountability Act (HIPAA) of 1996 and the Family\r\nEducational Rights and Privacy Act (FERPA). Review www.med.\r\numich.edu/news/newsroom/privacy.htm for HIPAA requirements\r\nand www.ogc.umich.edu/faq_student.html for FERPA. Review\r\nhttp://spg.umich.edu/pdf/601.07-0.pdf for more on your\r\nresponsibility as a U-M employee.</p>\r\n<br></br>\r\n<h3>MAINTAIN PRIVACY</h3>\r\n<p>Do not discuss a situation involving named or pictured individuals\r\non a social media site without their permission. As a guideline, do\r\nnot post anything that you would not present in any public forum.\r\nAdditional information on the appropriate handling of student,\r\nemployee and patient information can be found at: http://www.\r\nmais.umich.edu/access/download/ja_access_compliance.pdf</p>\r\n<br></br>\r\n<h3>RESPECT UNIVERSITY TIME AND PROPERTY</h3>\r\n<p>It’s appropriate to post at work if your comments are directly related\r\nto accomplishing work goals, such as seeking sources for information\r\nor working with others to resolve a problem. You should participate\r\nin personal social media conversations on your own time and in\r\naccordance with the Standard Practice Guide 520.1.</p>\r\n<br></br>\r\n<h3>DO NO HARM</h3>\r\n<p>Let your Internet social networking do no harm to the University of\r\nMichigan or to yourself whether you’re navigating those networks\r\non the job or off.</p>\r\n<br></br>\r\n<h3>UNDERSTAND YOUR PERSONAL RESPONSIBILITY.</h3>\r\n<p>U-M staff and faculty are personally responsible for the content they\r\npublish on blogs, wikis or any other form of user-generated content.\r\nBe mindful that what you publish will be public for a long time—\r\nprotect your privacy.</p>\r\n<br></br>\r\n</div>\r\n<div class=\"column\"style=\"flex:50%;margin:40px;\">\r\n<h3>BE AWARE OF LIABILITY.</h3>\r\n<p>You are responsible for what you post on your own site and on\r\nthe sites of others. Individual bloggers have been held liable for\r\ncommentary deemed to be copyright infringement, defamatory,\r\nproprietary, libelous, or obscene (as defined by the courts).\r\nIncreasingly, employers are conducting Web searches on job\r\ncandidates before extending offers. Be sure that what you post today\r\nwill not come back to haunt you.</p>\r\n<br></br>\r\n<h3>MAINTAIN TRANSPARENCY</h3>\r\n<p>The line between professional and personal business is sometimes\r\nblurred: Be thoughtful about your posting’s content and potential\r\naudiences. Be honest about your identity. In personal posts, you\r\nmay identify yourself as a U-M faculty or staff member. However,\r\nplease be clear that you are sharing your views as an individual, not\r\nas a representative of the University of Michigan.</p>\r\n<br></br>\r\n<h3>CORRECT MISTAKES</h3>\r\n<p>If you make a mistake, admit it. Be upfront and be quick with your\r\ncorrection. If you’re posting to a blog, you may choose to modify an\r\nearlier post—just make it clear that you have done so.</p>\r\n<br></br>\r\n<h3>RESPECT OTHERS</h3>\r\n<p>You are more likely to achieve your goals or sway others to your\r\nbeliefs if you are constructive and respectful while discussing a bad\r\nexperience or disagreeing with a concept or person.</p>\r\n<br></br>\r\n<h3>BE A VALUED MEMBER</h3>\r\n<p>If you join a social network, make sure you are contributing\r\nvaluable insights. Don’t hijack the discussion and redirect by posting\r\nself/organizational promoting information. Self-promoting behavior\r\nis viewed negatively and can lead to you being banned from Web\r\nsites or groups.</p>\r\n<br></br>\r\n<h3>THINK BEFORE YOU POST.</h3>\r\n<p>There’s no such thing as a “private” social media site. Search engines\r\ncan turn up posts and pictures years after the publication date.\r\nComments can be forwarded or copied. Archival systems save\r\ninformation even if you delete a post. If you feel angry or passionate\r\nabout a subject, it’s wise to delay posting until you are calm and clearheaded. Post only pictures that you would be comfortable sharing\r\nwith the general public (current and future peers, employers, etc.).</p> \r\n<br></br>\r\n</div>\r\n</div>');
