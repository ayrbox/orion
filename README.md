# Orion Blood Bank

## Summary
Search portal for orion blood bank. Many blood reserves can be maintained
and availity of blood in each reserve.

Website users can go to website and search for blood available in the reserves.

Users can also register as donor.


## Background
The project was built to demostrate PHP skill for college dessertation with zero framework. Project is used
to learn symfony framework with same (or enchanced) features.

## Features:
1. Search for blood avaibility
2. Register as Donor
3. Add/Edit blood types (Admin Portal)
4. Add/Edit blood reserves in different location (Admin Portal)
5. Update blood avaibility and put notes
6. View List of Donors


## Setup Instructions:

1. Restore database from `orion-db.sql`.

1. Put all the files from `src` folder into website root folder.

1. Change the `config.php` to point to correct host (`localhost`), database name, username and password.

1. Run the website in the browser.


## Dev Environment

Run local server
```bash
php -S localhost:9090 -t ./public 
```
> Make sure path for public folder is correct 


## Conclusion Suggestion
The project is far from ready to implement in real worls. Require further development and improvment.

1. Security - Password are not encrypted.

2. Information from multiple blood banks so that users have single portal to check availability of blood.

3. Send Email and/or Mobile Notification to register donor about any new blood donation program.

4. Algorithm to suggest the search can be implemnted if particular blood is not available in particular area. (e.g Blood is available Pulchowk if the people is searching in Kathmandu). 
