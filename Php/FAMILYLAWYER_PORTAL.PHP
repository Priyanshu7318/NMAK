<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Legal Experts</title>
    <link href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a237e 0%, #4a148c 100%);
            color: white;
            min-height: 100vh;
        }

        .header {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #FFD700 0%, #FFA500 100%);
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            padding: 3rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .lawyer-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            color: #2d2d2d;
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .lawyer-card:hover {
            transform: translateY(-10px) rotateX(5deg) rotateY(-5deg);
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        .lawyer-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,215,0,0.1), transparent);
            transform: rotate(45deg);
            transition: 0.5s;
        }

        .lawyer-card:hover::before {
            animation: shine 1.5s;
        }

        @keyframes shine {
            0% { left: -50%; }
            100% { left: 150%; }
        }

        .profile-section {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FFD700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .lawyer-info {
            flex: 1;
        }

        .lawyer-name {
            font-size: 1.6rem;
            color: #1a237e;
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .details {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.6;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin: 1.5rem 0;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            background: rgba(26, 35, 126, 0.05);
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .stat-item:hover {
            background: rgba(255, 215, 0, 0.1);
            transform: translateY(-3px);
        }

        .win-rate {
            color: #4CAF50;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .cases-handled {
            color: #1a237e;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .stat-details {
            position: absolute;
            bottom: 110%;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            color: #2d2d2d;
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            width: 220px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 20;
        }

        .stat-item:hover .stat-details {
            opacity: 1;
            visibility: visible;
            bottom: 120%;
        }

        .stat-details h4 {
            color: #1a237e;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .stat-details ul {
            list-style: none;
            font-size: 0.9rem;
        }

        .stat-details li {
            padding: 0.25rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-details ion-icon {
            color: #4CAF50;
            min-width: 18px;
        }

        .button-container {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .book-btn, .details-btn {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
        }

        .book-btn {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
        }

        .details-btn {
            background: linear-gradient(135deg, #1a237e 0%, #4a148c 100%);
            color: white;
        }

        .book-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        .details-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 35, 126, 0.4);
        }

        .details-panel {
            position: absolute;
            background: rgba(255, 255, 255, 0.98);
            color: #2d2d2d;
            padding: 1.5rem;
            border-radius: 15px;
            width: calc(100% - 3rem);
            top: 110%;
            left: 1.5rem;
            z-index: 10;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .details-btn:hover .details-panel {
            opacity: 1;
            visibility: visible;
            top: -400%;
        }

        .specializations {
            list-style: none;
        }

        .specializations li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .specializations li ion-icon {
            color: #FFD700;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 2rem;
            }
            
            .profile-section {
                flex-direction: column;
                text-align: center;
            }
            
            .button-container {
                flex-direction: column;
            }
        }

        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(50px) rotateX(30deg);
            }
            to {
                opacity: 1;
                transform: translateY(0) rotateX(0);
            }
        }

        .lawyer-card {
            animation: cardEntrance 0.6s ease forwards;
            opacity: 0;
        }

        .lawyer-card:nth-child(1) { animation-delay: 0.2s; }
        .lawyer-card:nth-child(2) { animation-delay: 0.4s; }
        .lawyer-card:nth-child(3) { animation-delay: 0.6s; }
        .lawyer-card:nth-child(4) { animation-delay: 0.8s; }
        .lawyer-card:nth-child(5) { animation-delay: 1s; }

        @keyframes textEntrance {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .details-panel {
    position: absolute;
    background: #ffffff; /* Solid white background */
    color: #2d2d2d;
    padding: 1.5rem;
    border-radius: 15px;
    width: calc(100% - 3rem);
    bottom: 100%;
    left: 1.5rem;
    z-index: 1000; /* Increased z-index to ensure it stays on top */
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transform-origin: bottom center;
    /* Added these properties to ensure full coverage */
    box-sizing: border-box;
    margin-bottom: 15px; /* Space between button and panel */
}

.details-btn:hover .details-panel {
    opacity: 1;
    visibility: visible;
    bottom: 120%;
    transform: translateY(-10px);
}

/* Add this to ensure lawyer cards don't interfere */
.lawyer-card {
    position: relative;
    z-index: 1;
}

.details-btn {
    position: relative;
    z-index: 1001; /* Higher than panel's z-index */
}
.details-panel {
    position: absolute;
    background: #ffffff;
    color: #2d2d2d;
    padding: 1.5rem;
    border-radius: 15px;
    width: 120px;
    height: 250px;
    min-width: 280px;
    max-width: 90vw;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1000;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid rgba(0,0,0,0.1);
}

.details-panel h3 {
    color: #1a237e;
    font-size: 1.1rem;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #FFD700;
    display: inline-block;
}

.specializations {
    display: grid;
    gap: 0.8rem;
    margin-bottom: 1.5rem;
}

.specializations li {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    padding: 0.5rem;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.specializations li:hover {
    background: rgba(255,215,0,0.05);
    transform: translateX(5px);
}

.specializations ion-icon {
    color: #1a237e;
    font-size: 1.4rem;
    min-width: 24px;
}

.details-panel p {
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0.5rem 0;
    padding: 0.3rem 0;
    position: relative;
}

.details-panel p:before {
    content: '•';
    color: #FFD700;
    margin-right: 0.8rem;
}

/* Education section styling */
.details-panel h3:nth-of-type(2) {
    margin-top: 1.5rem;
    color: #4CAF50;
    border-color: #4CAF50;
}

/* Languages section styling */
.details-panel h3:nth-of-type(3) {
    color: #FFA500;
    border-color: #FFA500;
}

/* Animated background pattern */
.details-panel::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 200%;
    background-image: linear-gradient(45deg, transparent 95%, rgba(26, 35, 126, 0.03) 100%);
    border-radius: 15px;
    pointer-events: none;
}

.details-btn:hover .details-panel {
    opacity: 1;
    visibility: visible;
    bottom: 120%;
    transform: translate(-50%, -10px);
}
.img-prf:hover{
    transform: translateY(-2px);
}
    </style>
</head>
<body>
    <div class="header">
        <h1>Elite Legal Experts</h1>
        <p>Premier Legal Representation with Proven Excellence</p>
    </div>

    <div class="container">
        <!-- Lawyer 1 -->
        <div class="lawyer-card" data-whatsapp-number="+919805297267">
            <div class="profile-section">
                <div class="img-prf">
                <img src="https://images.pexels.com/photos/32976/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=800" class="profile-pic" alt="Ashutosh Saklani">
                </div>
                <div class="lawyer-info">
                    <h2 class="lawyer-name">Pranav Digwal</h2>
                    <div class="details">
                        <p>📍 New delhi,India</p>
                        <p>⭐ 15 Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <div class="win-rate">92%</div>
                    <div>Win Rate</div>
                    <div class="stat-details">
                        <h4>Notable Achievements:</h4>
                        <ul>
                            <li><ion-icon name="trophy-outline"></ion-icon>150+ Real-state Cases</li>
                            <li><ion-icon name="star-outline"></ion-icon>98% IP Success Rate</li>
                            <li><ion-icon name="scale-outline"></ion-icon>50 High-Value Wins</li>
                        </ul>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="cases-handled">700+</div>
                    <div>Cases Handled</div>
                    <div class="stat-details">
                        <h4>Case Distribution:</h4>
                        <ul>
                            <li><ion-icon name="document-outline"></ion-icon>150 Civil</li>
                            <li><ion-icon name="business-outline"></ion-icon>325 Real-state</li>
                            <li><ion-icon name="cash-outline"></ion-icon>120 M&A</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="book-btn">
                    <ion-icon name="calendar-outline"></ion-icon>
                    Schedule
                </button>
                <button class="details-btn">
                    <ion-icon name="information-circle-outline"></ion-icon>
                    Details
                    <div class="details-panel">
                        <h3>Specializations</h3>
                        <ul class="specializations">
                            <li><ion-icon name="balance-scale-outline"></ion-icon>Civil Law</li>
                            <li><ion-icon name="business-outline"></ion-icon>Real state Law</li>
                            <li><ion-icon name="shield-checkmark-outline"></ion-icon>Intellectual Property</li>
                        </ul>
                        
                    </div>
                </button>
            </div>
        </div>

        <!-- Lawyer 2 -->
        <div class="lawyer-card" data-whatsapp-number="+919805297267">
            <div class="profile-section">
                <div class="img-prf">
                
                <img src="https://c8.alamy.com/comp/KX39X6/smiling-indian-lawyer-woman-sitting-chair-in-office-cabin-KX39X6.jpg" class="profile-pic" alt="Michael Rodriguez">
                </div>
                <div class="lawyer-info">
                    <h2 class="lawyer-name">Vidhi Sharma</h2>
                    <div class="details">
                        <p>📍 Rajpura,Punjab,india</p>
                        <p>⭐ 12 Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <div class="win-rate">88%</div>
                    <div>Win Rate</div>
                    <div class="stat-details">
                        <h4>Notable Achievements:</h4>
                        <ul>
                            <li><ion-icon name="ribbon-outline"></ion-icon>Civil Rights Awards</li>
                            <li><ion-icon name="shield-outline"></ion-icon>100+ Acquittals</li>
                            <li><ion-icon name="git-merge-outline"></ion-icon>Complex Appeals</li>
                        </ul>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="cases-handled">450+</div>
                    <div>Cases Handled</div>
                    <div class="stat-details">
                        <h4>Case Distribution:</h4>
                        <ul>
                            <li><ion-icon name="people-outline"></ion-icon>150 Civil Rights</li>
                            <li><ion-icon name="book-outline"></ion-icon>100 Appeals</li>
                            <li><ion-icon name="warning-outline"></ion-icon>200 Criminal</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="book-btn">
                    <ion-icon name="calendar-outline"></ion-icon>
                    Schedule
                </button>
                <button class="details-btn">
                    <ion-icon name="information-circle-outline"></ion-icon>
                    Details
                    <div class="details-panel">
                        <h3>Specializations</h3>
                        <ul class="specializations">
                            <li><ion-icon name="alert-circle-outline"></ion-icon>Criminal Defense</li>
                            <li><ion-icon name="people-outline"></ion-icon>Civil Rights</li>
                            <li><ion-icon name="document-attach-outline"></ion-icon>Appellate Practice</li>
                        </ul>
                        
                    </div>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Lawyer 3 -->
        <div class="lawyer-card" data-whatsapp-number="+919805297267">
            <div class="profile-section">
                <div class="img-prf">
                <img src="https://img.freepik.com/premium-photo/man-sitting-desk-front-row-books_644690-93002.jpg" class="profile-pic" alt="Ashutosh Saklani">
                </div>
                <div class="lawyer-info">
                    <h2 class="lawyer-name">Ashutosh Saklani</h2>
                    <div class="details">
                        <p>📍 Mohali, Punjab</p>
                        <p>⭐ 15 Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <div class="win-rate">89%</div>
                    <div>Win Rate</div>
                    <div class="stat-details">
                        <h4>Notable Achievements:</h4>
                        <ul>
                            <li><ion-icon name="trophy-outline"></ion-icon>150+ Civil Cases</li>
                            <li><ion-icon name="star-outline"></ion-icon>98% IP Success Rate</li>
                            <li><ion-icon name="scale-outline"></ion-icon>50 High-Value Wins</li>
                        </ul>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="cases-handled">650+</div>
                    <div>Cases Handled</div>
                    <div class="stat-details">
                        <h4>Case Distribution:</h4>
                        <ul>
                            <li><ion-icon name="business-outline"></ion-icon>320 Civil</li>
                            <li><ion-icon name="document-outline"></ion-icon>200 Corporate</li>
                            <li><ion-icon name="cash-outline"></ion-icon>130 M&A</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="book-btn">
                    <ion-icon name="calendar-outline"></ion-icon>
                    Schedule
                </button>
                <button class="details-btn">
                    <ion-icon name="information-circle-outline"></ion-icon>
                    Details
                    <div class="details-panel">
                        <h3>Specializations</h3>
                        <ul class="specializations">
                            <li><ion-icon name="balance-scale-outline"></ion-icon>Civil Law</li>
                            <li><ion-icon name="git-merge-outline"></ion-icon>Mergers & Acquisitions</li>
                            <li><ion-icon name="shield-checkmark-outline"></ion-icon>Intellectual Property</li>
                        </ul>
                        
                    </div>
                </button>
            </div>
        </div>


        <!-- Lawyer 4 -->
        <div class="lawyer-card" data-whatsapp-number="+919805297267">
            <div class="profile-section">
                <div class="img-prf">
                
                <img src="https://images.pexels.com/photos/4427557/pexels-photo-4427557.jpeg?auto=compress&cs=tinysrgb&w=800" class="profile-pic" alt="Michael Rodriguez">
                </div>
                <div class="lawyer-info">
                    <h2 class="lawyer-name">Akbar Alam</h2>
                    <div class="details">
                        <p>📍 Kashmir,India</p>
                        <p>⭐ 10+ Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <div class="win-rate">79%</div>
                    <div>Win Rate</div>
                    <div class="stat-details">
                        <h4>Notable Achievements:</h4>
                        <ul>
                            <li><ion-icon name="shield-outline"></ion-icon>100+ Acquittals</li>
                            <li><ion-icon name="git-merge-outline"></ion-icon>Complex Appeals</li>
                            <li><ion-icon name="ribbon-outline"></ion-icon>Civil Rights Awards</li>
                        </ul>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="cases-handled">300+</div>
                    <div>Cases Handled</div>
                    <div class="stat-details">
                        <h4>Case Distribution:</h4>
                        <ul>
                            <li><ion-icon name="people-outline"></ion-icon>150 Civil Rights</li>
                            <li><ion-icon name="warning-outline"></ion-icon>150 Corporates</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="book-btn">
                    <ion-icon name="calendar-outline"></ion-icon>
                    Schedule
                </button>
                <button class="details-btn">
                    <ion-icon name="information-circle-outline"></ion-icon>
                    Details
                    <div class="details-panel">
                        <h3>Specializations</h3>
                        <ul class="specializations">
                            <li><ion-icon name="people-outline"></ion-icon>Civil Rights</li>
                            <li><ion-icon name="alert-circle-outline"></ion-icon>Corporates Rights</li>
                            <li><ion-icon name="document-attach-outline"></ion-icon>Appellate Practice</li>
                        </ul>
                        
                    </div>
                </button>
            </div>
        </div>
    </div> 
    <div class="container">
        <!-- Lawyer 5 -->
        <div class="lawyer-card" data-whatsapp-number="+919805297267">
            <div class="profile-section">
                <div class="img-prf">
                <img src="https://media.istockphoto.com/id/1435687148/photo/portrait-of-attractive-elegant-confident-arabian-or-indian-successful-businessman.jpg?s=612x612&w=0&k=20&c=dUoTDPlD6vLyC8tkd9OdOt0OuFhvjnFQitHPmJWoLEA=" class="profile-pic" alt="Ashutosh Saklani">
                </div>
                <div class="lawyer-info">
                    <h2 class="lawyer-name">Ashwini Tyagi</h2>
                    <div class="details">
                        <p>📍 Jaipur,Rajshtan,India</p>
                        <p>⭐ 25+ Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <div class="win-rate">95%</div>
                    <div>Win Rate</div>
                    <div class="stat-details">
                        <h4>Notable Achievements:</h4>
                        <ul>
                            <li><ion-icon name="trophy-outline"></ion-icon>145+ Family disputes</li>
                            <li><ion-icon name="star-outline"></ion-icon>98% IP Success Rate</li>
                            <li><ion-icon name="scale-outline"></ion-icon>100 High-Value Wins</li>
                        </ul>
                    </div>
                </div>
                <div class="stat-item">
                    <div class="cases-handled">650+</div>
                    <div>Cases Handled</div>
                    <div class="stat-details">
                        <h4>Case Distribution:</h4>
                        <ul>
                            
                            <li><ion-icon name="document-outline"></ion-icon>200 Civil</li>
                            <li><ion-icon name="cash-outline"></ion-icon>80+ Family</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="book-btn">
                    <ion-icon name="calendar-outline"></ion-icon>
                    Schedule
                </button>
                <button class="details-btn">
                    <ion-icon name="information-circle-outline"></ion-icon>
                    Details
                    <div class="details-panel">
                        <h3>Specializations</h3>
                        <ul class="specializations">
                            <li><ion-icon name="balance-scale-outline"></ion-icon>Civil Law</li>
                            <li><ion-icon name="business-outline"></ion-icon>Corporate Law</li>
                            <li><ion-icon name="shield-checkmark-outline"></ion-icon>Intellectual Property</li>
                        </ul>
                        
                    </div>
                </button>
            </div>
        </div>

        <!-- Lawyer 6 -->
         
        <?php
        $server="localhost:3306";
        $username="root";
        $password="";
        $dbname="nmak_final";
        
        $conn=mysqli_connect($server, $username, $password, $dbname);
        
        
        if(mysqli_connect_error())
        {
        die('connect error('. mysqli_connect_errno() .')'
        .mysqli_connect_error());
        }
        $sql="select * from family_lawyer";
        $result = $conn->query($sql);
        

if ($result->num_rows > 0) {
  
  // output data of each row
  while($row = $result->fetch_array()) {  ?>
        <div class="lawyer-card" data-whatsapp-number=<?php echo $row[1] ?>>
            <div class="profile-section">
                <div class="img-prf">
                
                <img src= "get_image.php?id=<?php echo $row[15]; ?>"  alt="<?php echo htmlspecialchars($row[16]); ?>">
                </div>
                <div class="lawyer-info">
                    <h2 class="lawyer-name"><?php echo $row[0] ?></h2>
                    <div class="details">
                        <p>📍 <?php echo $row[2] ?></p>
                        <p>⭐ <?php echo $row[7] ?></p>
                    </div>
                </div>
            </div>
            <div class="stats">
                <div class="stat-item">
                    <div class="win-rate"><?PHP ECHO $row[8] ?> </div>
                    <div>Win Rate</div>
                    <div class="stat-details">
                        <h4>Notable Achievements:</h4>
                        <?PHP ECHO $row[9] ?>       
                                 </div>
                </div>
                <div class="stat-item">
                    <div class="cases-handled"><?PHP ECHO $row[10] ?> </div>
                    <div>Cases Handled</div>
                    <div class="stat-details">
                        <h4>Case Distribution:</h4>
                        <?PHP ECHO $row[11] ?> 
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button class="book-btn">
                    <ion-icon name="calendar-outline"></ion-icon>
                    Schedule
                </button>
                <button class="details-btn">
                    <ion-icon name="information-circle-outline"></ion-icon>
                    Details
                    <div class="details-panel">
                        <h3>Specializations</h3>
                        <br><?PHP ECHO $row[12] ?> 
                        
                    </div>
                </button>
            </div>
        </div>
        <?php }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
        ?>
    </div>
</div>

    <script>
        // WhatsApp Integration
        document.querySelectorAll('.book-btn').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.lawyer-card');
                const number = card.dataset.whatsappNumber;
                const message = encodeURIComponent("Hello, I'd like to schedule a consultation");
                window.open(`https://wa.me/${number}?text=${message}`, '_blank');
            });
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.lawyer-card');
            cards.forEach(card => {
                card.style.visibility = 'visible';
            });
        });
    </script>
</body>
</html>