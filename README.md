# SkyPulse Airline Management System ✈️


A modern airline management system with Multi-Guard authentication, and dual interface (API + Blade). Built with Laravel 11 and Tailwind CSS.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)


## 🌟 Key Features

### Role-Based Access Control
- **Admin Panel**
  - Complete system administration
  - Flight management
  - User management
  - Booking oversight
  - Analytics dashboard
  - System configuration

- **User Interface**
  - Flight search and booking
  - Booking history
  - Profile management
  - Email notifications

- **Guest Access**
  - Read-only access

### Advanced Security Features
- Multi-Guard Authentication
- CSRF Protection
- Rate Limiting
- Password Confirmation
- Session Management
- API Token Authentication

### Modern Interface
- Responsive Design
- Real-time Updates
- Interactive Maps
- Dynamic Search
- Filtering System
## 📸 Application Screenshots

### Public Pages
#### Home Page![screencapture-127-0-0-1-8000-2025-03-28-13_38_07](https://github.com/user-attachments/assets/cb59cf1e-d088-49e0-a3f7-f2a3dcc73aa9)


*Welcome to SkyPulse - Your Gateway to the Skies*

#### Authentication
##### Login Page![Screenshot 2025-03-28 133445](https://github.com/user-attachments/assets/f98fd7c7-3aa2-465f-8db9-cac09d0c7808)
*Secure login interface for user*

##### Login Page for Admin![Screenshot 2025-03-28 133505](https://github.com/user-attachments/assets/f568cd94-fb2d-44d5-91a8-d0c810a54488)
*Secure login interface for admin*

### User Dashboard
#### Main Dashboard![screencapture-127-0-0-1-8000-dashboard-2025-03-28-13_37_50](https://github.com/user-attachments/assets/bad0ac30-efe9-4d36-9818-e7dbf6d47864)

*User's personalized dashboard with booking history*

#### Flight Search![screencapture-127-0-0-1-8000-flights-2025-03-28-13_37_32](https://github.com/user-attachments/assets/466e04c6-d903-4de2-824c-40e6eadf7bb2)
*Advanced flight search interface*

#### Flight Details![screencapture-127-0-0-1-8000-flights-1-2025-03-28-13_36_41](https://github.com/user-attachments/assets/388b26da-8a4a-4dbe-8d9e-a1a9d40ddb2d)
*Detailed view of flight information*

### Admin Panel
#### Admin Dashboard![screencapture-127-0-0-1-8000-admin-dashboard-2025-03-28-13_38_42](https://github.com/user-attachments/assets/34b135be-b902-47ea-9548-20d91b972ae0)
*Comprehensive admin control panel*


## 🛠 Technology Stack

### Backend
- Laravel 11
- PHP 8.1+
- MySQL/PostgreSQL
- Laravel Sanctum
- Laravel Breeze

### Frontend
- Blade Components
- Tailwind CSS
- Alpine.js
- Livewire

### Development Tools
- PHPUnit
- Xdebug
- Composer
- NPM
- Git

## 🔎📝 Installation Requirements

### System Requirements
- PHP >= 8.1
- MySQL >= 8.0
- Node.js >= 16.x
- Composer
- Git

### Development Environment
- XAMPP/WAMP/MAMP
- VSCode/PhpStorm
- Postman/Insomnia
- Git
- xdebug (for test coverage)

## 🔧⚙️ Installation

1. Clone the repository:
```bash
git clone https://github.com/issamchlf/SkyPulse.git
cd SkyPulse
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Environment setup:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=SkyPulse
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Database setup:
```bash
php artisan migrate:fresh --seed
```

6. Start development servers:
```bash
# Terminal 1
npm run dev

# Terminal 2
php artisan serve
```

## 🏃‍♂️🧪 Running Tests

### Test Coverage Setup
1. Uncomment the following lines in `phpunit.xml`:
```xml
<php>
    <ini name="xdebug.mode" value="coverage"/>
    <ini name="xdebug.start_with_request" value="1"/>
</php>
```

2. Run tests with coverage:
```bash
php artisan test --coverage
```

Current test coverage: **73.6%**

![Test Coverage Screenshot](https://github.com/user-attachments/assets/abb061e8-3b2e-4efc-9463-c5042ba6b9df)

## 📊📁 Database Structure

![Database Diagram](https://github.com/user-attachments/assets/f69407c0-b011-4951-a808-b1e7ce5ab234)

### Key Relationships
- Users → Reservations (One-to-Many)
- Flights → Reservations (One-to-Many)
- Planes → Flights (One-to-Many)
- Airlines → Planes (One-to-Many)

## 📡🌐 API Documentation

### Authentication Endpoints
```
POST /login
POST /logout
POST /register
POST /admin/login
```

### Flight Management
```
GET    /api/flights
GET    /api/flights/{id}
POST   /api/flights
PUT    /api/flights/{id}
DELETE /api/flights/{id}
```


### Plane Management
```
GET    /api/planes
GET    /api/planes/{id}
POST   /api/planes
PUT    /api/planes/{id}
DELETE /api/planes/{id}
```


## 🛠️🚀 Technologies & Tools

<a href='#777BB4' target="_blank"><img alt='PHP' src='https://img.shields.io/badge/PHP-100000?style=for-the-badge&logo=PHP&logoColor=FFFFFF&labelColor=8892be&color=8892be'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='HTML5' src='https://img.shields.io/badge/HTML5-100000?style=for-the-badge&logo=HTML5&logoColor=white&labelColor=E34F26&color=E34F26'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='CSS3' src='https://img.shields.io/badge/CSS3-100000?style=for-the-badge&logo=CSS3&logoColor=white&labelColor=1572B6&color=1572B6'/></a>
<a href='#4479A1' target="_blank"><img alt='MySQL' src='https://img.shields.io/badge/MySQL-100000?style=for-the-badge&logo=MySQL&logoColor=white&labelColor=00758f&color=00758f'/></a>
<a href='#FF2D20' target="_blank"><img alt='LARAVEL' src='https://img.shields.io/badge/LARAVEL-100000?style=for-the-badge&logo=LARAVEL&logoColor=white&labelColor=F05340&color=F05340'/></a>
<a href='visual studio code' target="_blank"><img alt='VSC' src='https://img.shields.io/badge/VSC-100000?style=for-the-badge&logo=VSC&logoColor=white&labelColor=0277BD&color=0277BD'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='Git' src='https://img.shields.io/badge/Git-100000?style=for-the-badge&logo=Git&logoColor=white&labelColor=F05032&color=F05032'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='GitHub' src='https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=GitHub&logoColor=white&labelColor=181717&color=181717'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='composer' src='https://img.shields.io/badge/composer-100000?style=for-the-badge&logo=composer&logoColor=white&labelColor=8f6447&color=8f6447'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='postman' src='https://img.shields.io/badge/Postman-100000?style=for-the-badge&logo=postman&logoColor=white&labelColor=FF6C37&color=FF6C37'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='node.js' src='https://img.shields.io/badge/Node.js-100000?style=for-the-badge&logo=node.js&logoColor=white&labelColor=82cc27&color=82cc27'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='xampp' src='https://img.shields.io/badge/xampp-100000?style=for-the-badge&logo=xampp&logoColor=white&labelColor=FB7A24&color=FB7A24'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='tailwindcss' src='https://img.shields.io/badge/tailwind-100000?style=for-the-badge&logo=tailwindcss&logoColor=FFFFFF&labelColor=06B6D4&color=06B6D4'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='javascript' src='https://img.shields.io/badge/javascript-100000?style=for-the-badge&logo=javascript&logoColor=000000&labelColor=F7DF1E&color=F7DF1E'/></a>

## ✍️🙍 Authors

| [Issam Chellaf](https://github.com/issamchlf) |

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📞 Support

For support, email issamchellaf734@gmail.com .
