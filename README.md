# ABOUT speech-to-text
The speech-to-text project begins with a registration page. On this page, users are given two options: Login and Sign Up.

1. Sign Up: If the user clicks Sign Up, they will be prompted to enter their first name, last name, email, and password. Next, they will be asked to provide their contact number. Using the phone/email interface, the system will send an OTP (One-Time Password) to the provided contact number. The user must enter this OTP to complete the registration. If the OTP is correct, the user will be successfully logged in. If the OTP is incorrect, an error message will appear indicating that the password is incorrect.

2. Login: If the user clicks Login, they will be asked to enter their username, last name, and contact number. After submitting these details, an OTP will be sent to the provided contact number. The user must then enter the OTP. After successful OTP validation, they will see two options on the next screen: Validate OTP and Start Speech Recognition. If the user selects Start Speech Recognition, the microphone will activate, allowing the user to speak. The speech will be converted to text.



 # How to Run the Project

1. Download the project, which is in a ZIP file, and extract it to get the project files.
2. Open the home.php file. If it shows an error, you need to create an account on the phone/email interface first.
3. Replace the placeholder client ID in the code with your own client ID.
4. Use the XAMPP control panel to start the Apache and MySQL services.
5. Run the project on localhost. For example, navigate to localhost/project-foldername/home.php in your web browser.
   
# How to Fix Errors in home.php

1. Go to Google and search for a "phone.email" interface service to create an account. After creating your account, you will get a "data-client-id."
2. Open the home.php file and replace the placeholder client ID with your own client ID in line 71 of the code.

"C:\Users\admin\OneDrive\Pictures\Screenshots\code.png"
   
