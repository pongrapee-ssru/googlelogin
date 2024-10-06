# Google OAuth2.0 PHP/cURL
This app demonstrates a simple method to build a login system where users log in using their Google accounts. The app determines if the user's login with Google succeeded, request the user's public info from Google, create a session, and redirect the user to the profile page where the retrieved user info will show up.

## Create a project directory
If you are using XAMPP, prepare a project directory on a local drive. For example, the file path C:\xampp\htdocs\googlelogin is accessible via http://localhost/googlelogin once the Apache web server has been started.

## Create a GCP project
To implement this app, you must create a new GCP project: https://console.cloud.google.com/apis Add credentials and specify scopes of use. This app requires the following scopes:
* openid
* profile
* email

Next, create a client ID. If you are using XAMPP, set the **Authorized JavaScript origins** to http://localhost and the **Authorized redirect URIs** should be like http://localhost/googlelogin/callback.php Get **client ID** and **client secret**.

## Web components
### config.php
Put the client ID, client secret, and redirect URI there.

### login.php
Open this page to log in. If the valid login session exists, the user will be redirected to **profile.php**

### callback.php
This file handle data sent back from Google.

### profile.php
This page display user data sent back from Google. The user requies a valid login session to open this page.

## logout.php
This file contains a logout script which destroys the login session and redirect the user back to the login page.
