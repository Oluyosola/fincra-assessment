1. Installation Instructuon

- Clone Project from the github repo link provided
- Run "composer install" in the terminal of the project root directory
- Run "php artisan serve" in the terminal of the project root directory
- Go to the server url given e.g "http://127.0.0.1:8000"
- follow the prompt to get the project installed




2. Create and Initialize database

- Create a Database with prefered name
- In the database configuration part of the prompt in 1 above fill in the required database details and complete project installation


Login Credentials

- For Admin:
 Username: admin
 Password: admin123

- For Agent
 Username: agent
 Password: agent123

3. Assumptions made

- role_id for admin = 1
- role_id for agent = 2
- login as Admin to give agent permission to its dashboard
- Agent Dashboard should be checked under Agent in the permissions table to give agent permission to access agent dashboard and save permission.
- A new agent can be created by adding a new user and make role agent
- An agent can not make a transfer to his/herself


4.Requirement not covered

-Agent Bulk Fund Transfer

5. Instructions to Configure and prepare source code to build and run properly.

Technology Requirement
-Xampp
-phpMyAdmin (or any other related mySQL database tool)
-Php
-Laravel
 
To be able to use the local bank transfer functionality, kindly get the following details to connect to FINCRA API  (https://sandboxapi.fincra.com)
fill the following required details in the .env file 

FINCRA_API_KEY=
FINCRA_API_URL=
MY_FINCRA_BUSINESS_KEY=
MY_FINCRA_BUSINESS_ID=


6. This is not an issue persay, taking this assessment has helped me in the last few days to learn more, research more and to come up with a minimum viable product within a specified amount of time.

7. The instructions are detailed but considering giving more time could help achieve more.