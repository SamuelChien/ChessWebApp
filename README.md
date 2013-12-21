Group Members :

1. Name : Samuel Chien
   Student Number : 998758759

2. Name : Maria-Rafailia Tsimpoukelli
   Student Number : 996572588
IMPORTANT NOTES: 
(1) We have submitted the assignment one day late, but the professor has 
given us a 1-day extension, so we are not getting any deductions for the delay.

(2) How to set it up :
1. copy all three folders application, system and www to your apache folder.
2. rename www folder to htdoc, if neccessary
3. Pull the .sql file, if necessary.
4. change the config/database to your database credential
5. type localhost, you should see the home page of Connect 4

** the reason we seperate a www folder out is because is not saved to serve the controller logic files on server.
It increased the security risk people might be able to corrupt php and see our application files.**

File Summary :
        - system : all the files for codeigniter system.

        - application : where all views, controllers and models are.
                - model : 
					- invite_model : execute queries for invite table
					- user_model : execute queries for user table
					- match_model : execute queries for match table
                - controller :
					- account.php : in charge of creating a new account, logging in, logging out and resetting
						password.
					- arcade.php : in charge of showing available users, creating, accepting and declining
					 	invitations.
					- board.php : in charge of showing the game board, posting and getting a message.
                - views :
					- account :
						- emailPage : a view that tells the user to check their email for the new password.
						- loginForm : a view with the login form for the game.
						- newForm : a view with a form for registering for the game.
						- newFormBack
						- newLoginForm
						- recoverPasswordForm
						- updatePasswordForm : the view for updating the password.
					- arcade :
						- availableUsers : the view for inviting a user to a game.
						- mainPage : the view where it shows the available users.
					- match :
						- board : the view that shows the game board.
                - www
					- captcha :
					- css :
						- global.css : style for background that all views share.
						- template.css : custom style page for home page and all the game playing.
					- images : images used for this assignment.
					- js :
		- doc :
				-connect4.mwb : database model where user should create their database according to this structure.

General Summary
The Connect 4 web application starts with a page where a user can create an account and/or log in.
There is also the option of resetting a password and entering captcha.
Once a user is logged in, he can see all the available other users, and challenge them to a game.
When a user challenges another user to play the game, the other user gets an invitation, and they can
either accept or reject it.
Now, when two users are on the gameboard page, they are playing in turns. One user is in "playing" state,
and the other user in "waiting" state, waiting for the first user to make a move. Once the first, user put a
disc in the gameboard, his state becomes "waiting", and it is the second user's turn to play.
Before switching turns, every time we check if there is a winner, and in that case, the game is over and the 
players are informed about the state of the game.
Also, during the game, there is a chat box on the same page with the game board, where users can talk.

Our design for the Connect4 game is mainly focused around the MVC model of the Codeigniter. All our database functions
are implemented in the 'user_model', 'invite_model' and 'match_model' under models folder. 
	User_Model : MYSQL Operations for user table
	Invite_Model : MYSQL Operations for invite table
	Match_Model : MYSQL Operations for match model

All the main control functions are implemented in application/controllers folder.  Controller functions are responsible for
receiving and validating data from views, calling appropriate queries, parametrizing their results, and passing them onto the
view through variables. All the pages are generated through views and shown to the user. The same principle works for the 
admin page. The css file is loaded from the www/asset folder.