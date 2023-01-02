# login
Author : Areeb Amir,
Created : 18th November 2022,
Description : This code appears to be a PHP script that allows users to sign up for an account on a website. The script uses the PHPMailer library to send an email to the user with a verification link after they have successfully signed up.

The script first sets up a connection to an SMTP server and authenticates using the provided username and password. It then sets up the email by specifying the sender and recipient information, as well as the subject and body of the email.

Next, the script processes the user's sign-up form data, which is passed to the script via an HTTP POST request. It begins by removing any unwanted characters (such as backslashes) from the form data using the stripslashes function, and then decodes the data from JSON format using the json_decode function.

The script then sanitizes the form data using the mysqli_real_escape_string function, which escapes special characters in the data to prevent SQL injection attacks. The script also hashes the user's password using the SHA-256 algorithm and encodes it using the base64_encode function.

The script then generates a unique ID and a verification code for the user, and stores these values in the database along with the user's other form data. It also creates a verification link by concatenating the "verification.php" URL with the user's username and encoding the result using the SHA-256 and base64_encode functions.

Finally, the script sends the verification email to the user using the send method of the PHPMailer object. If the email is successfully sent, the script returns a success message to the client. If any errors occur during the process, the script returns an error message.

# Which Language is it written?
1)HTML
2)CSS
3)Javascript & Ajax
4)PHP
5)MySQL

# Does it need/contain any database?
Yes it need and contain database from the server. To create database, tables, and row & column, you have to copy code from directory folder named "database". And paste and run in the server's database managment system espically in "SQL" section. Your database will be created automatically by copy paste.

# Where to run?
You need to place that file in your any server e.g xampp, putty etc. And run the server. Browse the folder name, It will automatically redirect to main webfile.

# Want to be touch with me?
https://www.youtube.com/@AreebAmir
https://www.twitter.com/oneAreebAmir
