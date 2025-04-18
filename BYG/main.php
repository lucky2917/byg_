<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BYG Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="bg-black text-white">
    <div id="top"></div>
<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if user is logged in
?>

<!-- Navbar -->
<nav class="fixed top-0 left-0 w-full bg-black text-white flex justify-center items-center p-6">
    <div class="flex items-center absolute left-6">
        <img src="https://img.freepik.com/premium-vector/letter-byg-building-vector-monogram-logo-design-template-building-shape-byg-logo_1064784-1283.jpg" alt="BYG Logo" class="h-20 w-20">
        <h1 class="text-4xl font-bold ml-2">BYG</h1>
    </div>
    
    <div class="space-x-8 text-lg text-gray-200 font-semibold">
        <a href="#top" class="hover:text-blue-600">Home</a>
        <a href="#features" class="hover:text-blue-600">Features</a>
        <a href="#testimonials" class="hover:text-blue-600">Community</a>
    </div>

    <!-- Right Side (Login/Signup OR My Bookings) -->
    <div class="absolute right-6">
        <?php if ($isLoggedIn): ?>
            <a href="my_bookings.php">
                <button class="bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">
                    My Bookings
                </button>
            </a>
            <a href="logout.php">
                <button class="bg-red-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-600">
                    Logout
                </button>
            </a>
        <?php else: ?>
            <a href="signup.php">
                <button class="bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">
                    Sign Up
                </button>
            </a>
            <a href="login.php">
                <button class="bg-white text-black px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">
                    Login
                </button>
            </a>
        <?php endif; ?>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="flex flex-col items-center justify-center py-32 pt-40 text-center">
        <h2 class="text-7xl md:text-8xl font-extrabold leading-tight max-w-5xl text-center">
            Game On! <span class="text-blue-500">Manage & Book</span> Sports Facilities with <span class="text-white">BYG.</span>
        </h2>
        <p class="text-xl md:text-2xl text-gray-300 mt-6 max-w-3xl">
            The all-in-one platform to streamline sports facility management and bookings effortlessly.
        </p>
        <div class="mt-6">
        <?php if ($isLoggedIn): ?>
    <a href="arenas.php">
        <button class="bg-[#FFD700] hover:bg-[#5B21B6] text-black px-10 py-5 rounded-xl font-semibold text-3xl transition duration-300">
            Explore Arenas
        </button>
    </a>
<?php else: ?>
    <a href="login.php">
        <button class="bg-red-500 hover:bg-red-600 text-white px-10 py-5 rounded-xl font-semibold text-3xl transition duration-300">
            Login to Explore
        </button>
    </a>
<?php endif; ?>
</div>
    </section>
    <!-- Full-Width Rounded Image -->
<section class="w-full mt-12 flex justify-center">
    <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sports Management" class="w-11/12 max-w-7xl h-auto rounded-3xl shadow-lg">
</section>
<!-- Branded Sports Arenas in India -->
<section class="py-16 bg-black text-white text-center">
    <h2 class="text-4xl font-bold mb-8">Where Legends Play: <span class="text-blue-500">Iconic Sports Arenas</span> Worldwide</h2>
    <div class="flex flex-wrap justify-center gap-8 px-10 max-w-6xl mx-auto">
        <img src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/022011/new_wembley_logo.png?itok=vayFlAN3" alt="Wembley Stadium (UK)" class="h-20">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSL54zG2bqmdYUw7LXMLEHLjNttPNmryTulKA&s" alt="Madison Square Garden (USA)" class="h-20">
        <img src="https://media.licdn.com/dms/image/v2/C4D0BAQEsISFRs8wF8A/company-logo_200_200/company-logo_200_200/0/1630530845455/allianz_arena_mnchen_stadion_gmbh_logo?e=2147483647&v=beta&t=NzkrKlYWDxkML_ImpWEaAxpui_rwELW52mdWLR59vrA" alt="Allianz Arena (Germany)" class="h-20">
        <img src="https://pbs.twimg.com/media/ES4hzwTUUAERLWP.png" alt="Melbourne Cricket Ground" class="h-20">
        <img src="https://i.scdn.co/image/ab67616d00001e0280be0f610cdcde01d88af39c" alt="Tokyo Dome (Japan)" class="h-20">
    </div>
</section>
<!-- Upcoming Matches Section (One Grid at a Time, Centered) -->
<section class="py-16 bg-black text-white text-center">
    <h2 class="text-4xl font-bold mb-8"> Upcoming Major Sports Events World-Wide</h2>

    <!-- Match Display Container -->
    <div class="relative w-full flex justify-center overflow-hidden ">
        <div id="matchesContainer" class="flex items-center transition-transform duration-700 ease-in-out">
            
            <div class="match-card shadow-lg opacity-40 scale-75"></div> <!-- Left shadow -->
            <div class="match-card active-match"> <h3>FIFA World Cup 2026</h3> <p>🏟 USA, Canada & Mexico</p> <p>📅 June 8 - July 8, 2026</p> </div>
            <div class="match-card shadow-lg opacity-40 scale-75"></div> <!-- Right shadow -->
            
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("matchesContainer");
        const matches = [
            { title: "FIFA World Cup 2026", venue: "USA, Canada & Mexico", date: "June 8 - July 8, 2026" },
            { title: "ICC Cricket World Cup 2027", venue: "South Africa, Namibia & Zimbabwe", date: "February - March 2027" },
            { title: "Olympic Games 2028", venue: "Los Angeles, USA", date: "July 21 - August 6, 2028" },
            { title: "UEFA Champions League Final 2025", venue: "Allianz Arena, Germany", date: "May 31, 2025" },
            { title: "Wimbledon 2025", venue: "London, UK", date: "June 30 - July 13, 2025" },
            { title: "Formula 1 Monaco Grand Prix 2025", venue: "Monte Carlo, Monaco", date: "May 25, 2025" }
        ];

        let index = 0;
        const intervalTime = 5000; // 3 seconds
        const mainCard = container.querySelector(".active-match");

        function updateMatch() {
            const nextMatch = matches[index];

            mainCard.innerHTML = `
                <h3 class="text-3xl font-extrabold">${nextMatch.title}</h3>
                <p class="text-xl font-bold text-white mt-2">${nextMatch.venue}</p>
                <p class="text-xl font-bold text-white">${nextMatch.date}</p>
            `;

            index = (index + 1) % matches.length;
        }

        setInterval(updateMatch, intervalTime);
    });
</script>
<!-- Tailwind & Custom Styles -->
<style>
 /* Match Card Styling */
/* Set a fixed height for all match cards */
.match-card {
    min-width: 500px;
    max-width: 550px;
    height: 200px; /* Set a fixed height */
    background: linear-gradient(135deg, #374151, #1e293b);
    padding: 50px;
    border-radius: 25px;
    text-align: center;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.6);
    transition: transform 0.8s ease-in-out, opacity 0.8s ease-in-out;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center align text */
}

/* Make sure active match has the same fixed height */
.active-match {
    transform: scale(1);
    opacity: 1;
    border: 4px solid wheat;
    height: 200px; /* Same height as other match cards */
}

/* Left & Right Shadow Cards */
.match-card.shadow-lg {
    transform: scale(0.85);
    opacity: 0.2;
    filter: blur(3px);
}

/* Enhanced Text Styling */
.match-card h3 {
    font-size: 2.6rem;
    font-weight: 900;
    color: #60a5fa;
    font-family: 'Poppins', sans-serif;
}

.match-card p {
    font-size: 1.6rem;
    color: #ffffff;
    font-family: 'Inter', sans-serif;
    font-weight: 700;
}

/* Smooth Scrolling */
#matchesContainer {
    display: flex;
    transition: transform 1s ease-in-out;
}
</style>
<h1 class="byg-title">BYG - BookYourGame</h1>
<style>
.byg-title {
    font-family: 'Inter', sans-serif; /* Adjust if needed */
    font-size: 100px; /* Increase size as needed */
    font-weight: 700; /* Bold */
    text-align: center; /* Adjust positioning */
    color: #ffffff; /* Adjust color if necessary */
    margin-bottom: 40px; /* Space between "BYG" and "Why BYG" */
}
</style>
<!-- About BYG Section -->
<section class="py-24 bg-black text-white">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16 px-12">
        
        <!-- Left Side: Image (Completely Left) -->
        <div class="w-full md:w-1/2 flex justify-start">
            <img src="https://t3.ftcdn.net/jpg/04/53/06/64/360_F_453066418_kxK9BM2ntfW2kBUEupXX63h4PDoNmHWo.jpg" 
                 alt="About BYG" class="shadow-xl w-[1000px] h-[600px] rounded-2xl object-cover">
        </div>

        <!-- Right Side: Text (Fully Right) -->
        <div class="w-full md:w-1/2 text-right">
            <h2 class="text-7xl font-extrabold mb-6 text-blue-400">Why BYG?</h2>
            <p class="text-4xl text-gray-300 font-bold leading-relaxed">
                BYG simplifies sports facility booking & <br>management with a seamless, tech-driven experience. Whether you’re a player, coach, <br>or venue owner, easily book, manage, and <br>track sports activities in real time. No hassle, just play!
            </p>
            
        </div>
    </div>
</section>
<!-- Features Section -->
<section id="features" class="py-24 text-white text-center">
    <h2 class="text-6xl font-bold mb-12">Why Choose <span class="text-blue-500">BYG?</span></h2>

    <div class="grid md:grid-cols-3 gap-16 max-w-6xl mx-auto px-8">
        
        <!-- Feature 1 -->
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/5705/5705322.png" alt="Instant Booking" class="feature-icon">
            <h3 class="text-2xl font-semibold mt-4">Instant Booking</h3>
            <p class="text-gray-300 mt-2">Book sports venues in seconds with real-time availability.</p>
        </div>

        <!-- Feature 2 -->
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/1232/1232369.png" alt="Easy Payments" class="feature-icon">
            <h3 class="text-2xl font-semibold mt-4">Secure Payments</h3>
            <p class="text-gray-300 mt-2">Seamless online payments with multiple payment options.</p>
        </div>

        <!-- Feature 3 -->
        <div class="feature-card">
            <img src="https://cdn-icons-png.flaticon.com/512/3176/3176366.png" alt="User Dashboard" class="feature-icon">
            <h3 class="text-2xl font-semibold mt-4">User Dashboard</h3>
            <p class="text-gray-300 mt-2">Track, manage, and reschedule your bookings in one place.</p>
        </div>

    </div>
</section>
<style>
/* Features Section */
.feature-card {
    background: linear-gradient(135deg, #2d3748, #1a202c);
    padding: 32px; /* Increased padding for bigger size */
    border-radius: 20px; /* Slightly rounded for a modern look */
    text-align: center;
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease-in-out;
    width: 100%; /* Ensures full grid width */
    min-height: 250px; /* Increased height */
}

.feature-card:hover {
    transform: scale(1.1);
}

/* Feature Icons */
.feature-icon {
    width: 100px; /* Increased icon size */
    height: 100px;
    margin: 0 auto;
}
</style>
<!-- Testimonials Section -->
<section id="testimonials" class="py-16 bg-black text-white text-center">
    <h2 class="text-5xl font-bold mb-12">What Our <span class="text-blue-500">Users Say</span></h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 px-10 max-w-6xl mx-auto">
        
        <!-- Testimonial 1 - Christopher Nolan -->
        <div class="testimonial-card">
            <img src="https://assets.gqindia.com/photos/64c2485e55d9445b48560c2d/1:1/w_1080,h_1080,c_limit/Actors-who-turned-down-Christopher-Nolan-movies.jpg" alt="Christopher Nolan" class="testimonial-img">
            <h3 class="text-2xl font-semibold mt-4">Christopher Nolan</h3>
            <p class="text-yellow-400 text-lg">⭐⭐⭐⭐⭐</p>
            <p class="text-gray-300 mt-2">
                "Booking a sports facility with BYG is like crafting a perfect movie—every detail is precise, immersive, and flawless.  
                Just like I build non-linear storytelling**, BYG builds a seamless booking experience!"  
            </p>
        </div>

        <!-- Testimonial 2 - Kylie Jenner -->
        <div class="testimonial-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9FO1ffQ2k9rOszg8f7M3EjvXLNXiv3_hMHA&s" alt="Kylie Jenner" class="testimonial-img">
            <h3 class="text-2xl font-semibold mt-4">Kylie Jenner</h3>
            <p class="text-yellow-400 text-lg">⭐⭐⭐⭐⭐</p>
            <p class="text-gray-300 mt-2">
                "Luxury, convenience, and effortless access—that’s what BYG brings to sports facility booking.  
                Just like **my beauty empire** is built on exclusivity and top-tier quality, BYG ensures **premium sports experiences** in just a few clicks!"
            </p>
        </div>

        <!-- Testimonial 3 - James Cameron -->
        <div class="testimonial-card">
            <img src="https://media.gq.com/photos/637692e3c8b11c4c41b61ab5/master/w_1600%2Cc_limit/GQ1222_Cameron_02.jpg" alt="James Cameron" class="testimonial-img">
            <h3 class="text-2xl font-semibold mt-4">James Cameron</h3>
            <p class="text-yellow-400 text-lg">⭐⭐⭐⭐⭐</p>
            <p class="text-gray-300 mt-2">
                "Just like **Titanic was an ambitious cinematic journey**, BYG is an **innovative leap** in sports booking.  
                Whether you're diving into a **new adventure or a sports match**, BYG ensures **precision and reliability** in every booking!"
            </p>
        </div>

    </div>
</section>
<style>
.testimonial-card {
    background: linear-gradient(135deg, #2d3748, #1a202c);
    padding: 32px; /* Increased padding */
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease-in-out;
    width: 100%;
    min-height: 280px; /* Increased height */
}

.testimonial-card:hover {
    transform: scale(1.05);
}

/* User Profile Image */
.testimonial-img {
    width: 100px; /* Bigger profile images */
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto;
    border: 4px solid #3b82f6;

}
</style>
<!-- Social Media Links -->
<section class="py-12 bg-black text-white text-center">
    <h2 class="text-3xl font-bold mb-6">Connect With Us</h2>
    <div class="flex justify-center space-x-8">
     

        <!-- Instagram -->
        <a href="https://www.instagram.com/ft.ravii_/" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" 
                 alt="Instagram" class="social-icon">
        </a>

        <!-- GitHub -->
        <!-- GitHub (White Logo) -->
        <a href="https://github.com/lucky2917" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733553.png" 
                 alt="GitHub" class="social-icon">
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/in/ravi-sankar-gandreddi-9a2b44339/" target="_blank">
            <img src="https://cdn-icons-png.flaticon.com/512/174/174857.png" 
                 alt="LinkedIn" class="social-icon">
        </a>

    </div>
</section>
<style>
/* Social Media Icons */
.social-icon {
    width: 50px;
    height: 50px;
    transition: transform 0.3s ease-in-out;
}

.social-icon:hover {
    transform: scale(1.2);
}
</style>
<!-- Footer Section -->
<footer class="bg-black text-gray-400 text-center py-6 border-t border-gray-700">
    <p class="text-lg">&copy; 2025 <span class="text-white font-semibold">BYG</span>. All Rights Reserved.</p>
    <div class="mt-2 space-x-6">
        <a href="#" class="hover:text-white">Terms of Service</a>
        <span>|</span>
        <a href="#" class="hover:text-white">Privacy Policy</a>
    </div>
</footer>
</body>
</html>