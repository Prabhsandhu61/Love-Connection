Dating Project Group Members:-

1) Rajanbeer Singh
2) Prabhjeet Singh Sandhu
3) Krupali Patel
4) Bansari Parekh

Folders for the project :--  
 
Styling folder:- css (Css for the all php pages with respective names)
Images folder:- images
Templating files:- views (two files for the header and footer)

Database:--

Tables:- user(for the login and registration), winks (for the profile and the profile matches of the person)

php coding files :-- 

home.php :- It is the index page of the project. this page shows the user interface of the website.

config.php :- This php file contains the databse connection with the php and the session start in this file. so basically this file works as the templating file for the all pages which includes the php content and the databse connection.

login.php :- If user is already registered then he/she can directly login. there is user table so in this page it checks in the user table using the query. 

logout.php :- There is one function for the session destroy. so this page is include where it needed to logout form the session.

signup.php :- This file included the php coding with respect to connected with the database. so user enter the information in the regeistration and it will insert in the user table.

search.php :- If user winks so it will check in the wink table from the database.so it will check with the fromid to toid which is already in the wink table and if the new wink then it will insert in the wink table.firstly this page was the addBio which can update the user information like change the profile and the other info.

wink.php :- This page shows the all data of the user and the howmany people are in the list. and user can send the request to the other people they like.  

aboutus.php and contact.php :- This pages contain the generally html coding with some php coding. 