<p align="center"><a target="_blank"><img src="public/argon/argon/img/brand/VpetLogo.svg" width="200"></a></p>



# About Vpet

**Vpet** is a web-based application that helps pet owners find veterinarians for their pets. **Vpet** provides a wide range of services and products, all of which are available for purchase straight from the **Vpet** website. The five actors in this application are the Customer, Veterinary, Admin, Pet Shop, and Vet Clinic. Admin is a person who can control the app's users, administer the app's information, and validate payments. Customers are pet owners or animal lovers who use the **Vpet** app to order items or services. To access all of the features on the **Vpet** website, customers must first create an account. Customers who have created an account may use this page to see and edit their profile, order products and services, view Vet locations, learn about disease diagnoses, schedule consultations, view reminders, and make payments. After consulting with the customer, the veterinarian is responsible for creating a recipe and setting a reminder for the customer. Pet Shop will function as a one-stop shop for all pet necessities in the marketplace, as well as animal care and grooming. The medicine that the doctor requires for the clients will be provided by the Vet Clinic.


# How To Install/Run the Vpet Website

## Requirement to use the application:
- XAMPP v3.3.0 (PHP version: 7.4.27)
- Internet Connection
- Composer installed on your device

## Step:

1. First, we need to install composer in the computer,
2. Next, we need to copy the folder of source code to htdocs folder in “C:\xampp\htdocs”,
3. Run the XAMPP application:
   - Start the “Apache” and “MySQL”,
   - Click the “Admin” in MySQL or open “http://localhost/phpmyadmin” in browser and create database with the name “vpet”,
4. Open Command Prompt:
   - If the direct is “C:\Users\folder>” type
   ```sh
   cd ..\..
   ```
   - If not (C:\>), type 
   ```sh
   cd xampp\htdocs\vpet
   ```
5. When the command prompt directed to the Vpet folder, type:
   - ```composer install```, press enter wait until finish,
   
   - Do the step c and d if the .env file is not in the Vpet project folder, skip if any,
   
   - ```copy .env.example .env```, press enter wait until finish,
   
   - ```php artisan key:generate```, press enter wait until finish,
   
   - Check if the DB_DATABASE name in the .env file is already “vpetdb” or not. If it hasn’t change it to “vpetdb”
   
   - ```php artisan migrate --seed```, press enter wait until finish,
   
   - ```php artisan serve```, press enter wait until finish
6. Open “http://127.0.0.1:8000” in browser
7. Login with:
   - Username: bagus_jatem	;Password: bagusJ	as Customer
   - Username: admin		;Password: admin1	as Admin
   - Username: cSahari		;Password: cSahari	as Vet Clinic
   - Username: happyPS		;Password: happyPS	as Pet Shop
   - Username: aidilClv		;Password: aidilClv	as Veterinary


# Created By:

- Dicky Adrianto (1800163)
- Ida Bagus Jatem Kamandalu (1800183)
