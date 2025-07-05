let map;
const lawyers = [
    {
        name: "John Legal",
        phone: "+919805297267",
        location: { lat: 0, lng: 0 },
        experience: "12 years",
        specialization: "Criminal Law"
    },
    {
        name: "Sarah Justice",
        phone: "+917319796601",
        location: { lat: 0, lng: 0 },
        experience: "8 years",
        specialization: "Family Law"
    },
    {
        name: "sanjay Goyal",
        phone: "+917319796601",
        location: { lat: 0, lng: 0 },
        experience: "8 years",
        specialization: "Family Law"
    }
];

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap, handleError);
    } else {
        alert("Geolocation is not supported by your browser.");
    }
}

function showMap(position) {
    const userLocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };

    // Initialize Map
    const mapElement = document.getElementById('map');
    mapElement.style.display = 'block';
    
    if (!map) {
        map = L.map('map').setView([userLocation.lat, userLocation.lng], 15);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
    }

    // Add User Marker
    L.marker([userLocation.lat, userLocation.lng], {
        icon: L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
            iconSize: [25, 41]
        })
    }).addTo(map).bindPopup("Your Location");

    // Add Lawyer Markers
    const lawyersList = document.getElementById('lawyersList');
    lawyersList.style.display = 'grid';
    lawyersList.innerHTML = '';

    lawyers.forEach((lawyer, index) => {
        // Generate random nearby location
        const lat = userLocation.lat + (Math.random() * 0.02 - 0.01);
        const lng = userLocation.lng + (Math.random() * 0.02 - 0.01);
        lawyer.location = { lat, lng };

        // Map Marker
        const marker = L.marker([lat, lng], {
            icon: L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
                iconSize: [25, 41]
            })
        }).addTo(map);

        // Popup Content
        const popupContent = `
            <div class="lawyer-popup">
                <h3>${lawyer.name}</h3>
                <p>📞 ${lawyer.phone}</p>
                <p>⚖️ ${lawyer.specialization}</p>
                <div class="contact-buttons">
                    <button class="contact-button call-button" onclick="window.location.href='tel:${lawyer.phone}'">
                        <i class="fas fa-phone"></i>
                        Call
                    </button>
                    <button class="contact-button chat-button" onclick="window.open('https://wa.me/${lawyer.phone}', '_blank')">
                        <i class="fab fa-whatsapp"></i>
                        Chat
                    </button>
                </div>
            </div>
        `;

        marker.bindPopup(popupContent);

        // Lawyer Card
        const card = document.createElement('div');
        card.className = 'lawyer-card';
        card.innerHTML = `
            <h3>${lawyer.name}</h3>
            <p>📞 ${lawyer.phone}</p>
            <p>⚖️ ${lawyer.specialization}</p>
            <p>Experience: ${lawyer.experience}</p>
            <div class="contact-buttons">
                <button class="contact-button call-button" onclick="window.location.href='tel:${lawyer.phone}'">
                    <i class="fas fa-phone"></i>
                    Call
                </button>
                <button class="contact-button chat-button" onclick="window.open('https://wa.me/${lawyer.phone}', '_blank')">
                    <i class="fab fa-whatsapp"></i>
                    Chat
                </button>
            </div>
        `;
        lawyersList.appendChild(card);
    });
}

function handleError(error) {
    let message = "Error retrieving location: ";
    switch(error.code) {
        case error.PERMISSION_DENIED:
            message += "Please enable location access to use this service.";
            break;
        case error.POSITION_UNAVAILABLE:
            message += "Location information unavailable.";
            break;
        case error.TIMEOUT:
            message += "Location request timed out.";
            break;
        default:
            message += "Unknown error occurred.";
    }
    alert(message);
}
