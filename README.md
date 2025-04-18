BYG – Book Your Game

A complete sports facility booking system where users can explore global sports arenas, view real-time pricing for different sports, book slots, and track their bookings. Built from scratch with PHP, MySQL, Tailwind CSS, and hosted live on AWS EC2. 

---

Abstract

BYG aims to simplify the process of booking sports arenas. Users can register, verify using OTP, browse multi-sport arenas, select time slots, view dynamic prices, add custom add-ons, and confirm bookings. An admin dashboard is also included to monitor all activity.

---

Tech Stack

| Layer       | Tech Used                      |
|-------------|--------------------------------|
| Frontend    | HTML, CSS, Tailwind CSS, JS    |
| Backend     | PHP                            |
| Database    | MySQL                          |
| Email       | PHPMailer (SMTP with Gmail)    |
| Hosting     | AWS EC2 (Ubuntu 24.04 LTS)     |
| Local Dev   | XAMPP (Apache, MySQL, PHP)     |

---

Key Features

- OTP-based Signup & Secure Login**
- Explore 25+ Sports Arenas Worldwide**
- Sport-wise Pricing + Add-ons**
- Time Slot Selection**
- My Bookings Page for Users**
- Admin Dashboard with Total Revenue, Add-ons, and Bookings**
- Forgot Password via OTP Email**
- Hosted on AWS EC2 with Apache & MySQL**

---

 Live Demo

Hosted on AWS EC2 → http://3.110.177.57/main.php

Admin Credentials:  
Username: admin
Password: password

---

User Interface
- Landing Page with Features & Testimonials  
- Arena Cards with Dynamic "Book Now"  
- Booking Page with Dropdowns for Sports, Add-ons, and Time Slots  
- TailwindCSS-enhanced UI for dark mode

Auth System
- OTP sent via email during signup  
- Email verification  
- Forgot password with secure reset link (OTP token-based)

Admin Panel
- Dashboard with Total Revenue  
- Total Bookings  
- View Add-ons for each booking

---

Database Structure (MySQL)

- `users` — stores registered users, OTPs, reset tokens
- `arenas` — 25+ arenas with name, location, sports
- `sports_pricing` — prices for each sport per arena
- `bookings` — stores every confirmed booking
- `admin` — login for dashboard

---

Security & Error Handling

- Passwords hashed with `bcrypt`
- OTP and token-based email verification
- Session management with `$_SESSION`
- Error reporting enabled for development
- Inputs sanitized using `mysqli_real_escape_string`

---

Future Scope

- Integrate online payment (Razorpay / Stripe)
- Build progressive web app (PWA) or native Android version
- Add location filtering and availability calendar
- Implement booking cancellation/rescheduling

---

How to Run Locally

```bash
1. Clone the project

2. Import the SQL file into MySQL (e.g., using phpMyAdmin):
   byg_db.sql

3. Update database credentials in `db_connect.php`

4. Place project inside XAMPP's `htdocs` directory:
   /Applications/XAMPP/htdocs/BYG/

5. Start Apache and MySQL from XAMPP control panel

6. Access site at:
   http://localhost/BYG/main.php
