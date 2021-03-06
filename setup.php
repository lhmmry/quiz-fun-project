<!DOCTYPE html>
    <html>
        <head>
            <title>Setting up Fun Quiz database</title>
        </head>
        <body>

            <h3>Setting up...</h3>

    <?php 
        require_once 'functions.php';
        //Haomin liu,12109377,assignment 2,quizfun

        createTable("question",
                        "question_id INT(10) unsigned NOT NULL AUTO_INCREMENT,
                        question_text VARCHAR(256) DEFAULT NULL,
                        question_category VARCHAR(16) DEFAULT NULL,
                        INDEX(question_text(20)),
                        INDEX(question_category(4)),
                        PRIMARY KEY(question_id)");

        createTable("question_option",
                        "option_id INT(10) unsigned NOT NULL AUTO_INCREMENT,
                        question_id INT(10) unsigned DEFAULT NULL,
                        option_text VARCHAR(128) DEFAULT NULL,
                        is_right_option enum('0','1') DEFAULT '0',
                        INDEX(option_text(20)),
                        PRIMARY KEY(option_id),
                        FOREIGN KEY (question_id) 
                            REFERENCES question(question_id)
                            ON DELETE CASCADE");

        createTable("members",
                      "username VARCHAR(16) NOT NULL,
                      password VARCHAR(32) NOT NULL,
                      score INT(10) DEFAULT NULL,
                      INDEX(username(6)),
                      PRIMARY KEY(username)");

        createTable("profiles",
                      "username VARCHAR(16)NOT NULL,
                      profile_text VARCHAR(4096) NOT NULL,
                      INDEX(username(6)),
                      PRIMARY KEY(username)");

        insertTable("question",
                        "(1, 'What does PHP stand for?','PHP'),
                        (2, 'Which of the following is NOT a magic predefined constant?','PHP'),
                        (3, 'Which of the following is NOT a valid PHP comparison operator?','PHP'),
                        (4, 'A value that has no defined value is expressed in PHP with the following keyword:','PHP'),
                        (5, 'Which of the following is used to declare a constant?','PHP'),
                        (6, 'You can add names to each frame window using which setting in HTML?','HTML'),
                        (7, 'Use what to prevent confusion on numbers higher than 9 with hexadecimal colors ?','HTML'),
                        (8, 'What type of file do you have to use when you are saving a new page?','HTML'),
                        (9, 'All normal webpages consist of what two parts ?','HTML'),
                        (10, 'What character is used to indicate an end tag?','HTML'),
                        (11, 'To remove duplicate rows from the result set of a SELECT use the following keyword:','Mysql'),
                        (12, 'Which of the following can add a row to a table?','Mysql'),
                        (13, 'Which SQL statement is used to insert a new data in a database?','Mysql'),
                        (14, 'A SELECT command without a WHERE clause returns?','Mysql'),
                        (15, 'What SQL clause is used to restrict the rows returned by a query?','Mysql'),
                        (16, 'Which built-in method returns the length of the string?','JAVASCRIPT'),
                        (17, 'Which of the following function of String object combines the text of two strings and returns a new string?','JAVASCRIPT'),
                        (18, 'Which of the following is true?','JAVASCRIPT'),
                        (19, 'What is mean by \"this\" keyword in javascript?','JAVASCRIPT'),
                        (20, 'If x=103 & y=9 then x%=y , what is the value of x after executing x%=y?','JAVASCRIPT');");

        insertTable("question_option",
                        "(1, 1, 'Preprocessed Hypertext Page','0'),
                        (2, 1, 'Hypertext Markup Language','0'),
                        (3, 1, 'PHP: Hypertext Preprocessor', '1'),
                        (4, 1, 'PHypertext Transfer Protocol','0'),
                        (5, 1, 'Hypertext Make Language','0'),
                        (6, 2, '__LINE__','0'),
                        (7, 2, '__FILE__','0'),
                        (8, 2, '__CLASS__', '0'),
                        (9, 2, '__DIR__','0'),
                        (10, 2, '__DATE__','1'),
                        (11, 3, '!=','0'),
                        (12, 3, '>=','0'),
                        (13, 3, '<=>','1'),
                        (14, 3, '<>','0'),
                        (15, 3, '===','0'),
                        (16, 4, 'undef','1'),
                        (17, 4, 'null','0'),
                        (18, 4, 'none','0'),
                        (19, 4, 'There is no such concept in PHP','0'),
                        (20, 4, 'None of the above is true','0'),
                        (21, 5, 'const','0'),
                        (22, 5, 'constant','0'),
                        (23, 5, 'define','1'),
                        (24, 5, '#pragma','0'),
                        (25, 5, 'def','0'),
                        (26, 6, 'name','1'),
                        (27, 6, 'src','1'),
                        (28, 6, 'ur','0'),
                        (29, 6, 'url','0'),
                        (30, 6, 'address','0'),
                        (31, 7, '#','1'),
                        (32, 7, '!','0'),
                        (33, 7, '*','0'),
                        (34, 7, '%','0'),
                        (35, 7, '$','0'),
                        (36, 8, 'HTML File (*.*)','0'),
                        (37, 8, 'Web based.doc (*.*)','0'),
                        (38, 8, 'All Files (*.*)','1'),
                        (39, 8, 'Web Page, complete (*.htm, *.html)','0'),
                        (40, 8, 'Text File (*.*)','0'),
                        (41, 9, 'Head and body','1'),
                        (42, 9, 'Top and bottom','0'),
                        (43, 9, 'Head and footer','0'),
                        (44, 9, 'Body and frameset','0'),
                        (45, 9, 'Body and top','0'),
                        (46, 10, '<','0'),
                        (47, 10, '>','0'),
                        (48, 10, '=','0'),
                        (49, 10, '-','0'),
                        (50, 10, '/','1'),
                        (51, 11, 'NO DUPLICATE','0'),
                        (52, 11, 'UNIQUE','0'),
                        (53, 11, 'DISTINCT','1'),
                        (54, 11, 'DUPLICATE','0'),
                        (55, 11, 'None of the above','0'),
                        (56, 12, 'ADD','0'),
                        (57, 12, 'INSERT','1'),
                        (58, 12, 'UPDATE','0'),
                        (59, 12, 'ALTER','0'),
                        (60, 12, 'SELECT','0'),
                        (61, 13, 'INSERT INTO','1'),
                        (62, 13, 'UPDATE','0'),
                        (63, 13, 'ADD','0'),
                        (64, 13, 'INSERT NEW','0'),
                        (65, 13, 'INSERT ON','0'),
                        (66, 14, 'All the records from a table that match the previous WHERE clause','0'),
                        (67, 14, 'All the records from a table, or information about all the records','1'),
                        (68, 14, 'All the records from all tables that exist, or information about all the records','0'),
                        (69, 14, 'SELECT is invalid without a WHERE clause','0'),
                        (70, 14, 'Nothing','0'),
                        (71, 15, 'AND','0'),
                        (72, 15, 'WHERE','1'),
                        (73, 15, 'HAVING','0'),
                        (74, 15, 'FOR','0'),
                        (75, 15, 'TO','0'),
                        (76, 16, 'length()','1'),
                        (77, 16, 'size()','0'),
                        (78, 16, 'sizeof()','0'),
                        (79, 16, 'index()','0'),
                        (80, 16, 'None of the above','0'),
                        (81, 17, 'add()','0'),
                        (82, 17, 'marge()','0'),
                        (83, 17, 'concat()','1'),
                        (84, 17, 'append()','0'),
                        (85, 17, 'appendto()','0'),
                        (86, 18, 'If onKeyDown returns false, the key-press event is cancelled','1'),
                        (87, 18, 'If onKeyPress returns false, the key-down event is cancelled','0'),
                        (88, 18, 'If onKeyDown returns false, the key-up event is cancelled','0'),
                        (89, 18, 'If onKeyPress returns false, the key-up event is canceled','0'),
                        (90, 18, 'If onKeyDown returns true, the key-up event is canceled','0'),
                        (91, 19, 'It refers current object','1'),
                        (92, 19, 'It refers previous object','0'),
                        (93, 19, 'It refers next object','0'),
                        (94, 19, 'It is variable which contains value','0'),
                        (95, 19, 'None of the above','0'),
                        (96, 20, '3','0'),
                        (97, 20, '4','1'),
                        (98, 20, '2','0'),
                        (99, 20, '1','0'),
                        (100, 20, '5','0');");
    ?>

            <br>Great! Setting up completed.
        </body>
    </html>
