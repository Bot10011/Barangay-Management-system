# 🏘️ Barangay Management System (BMS)

[![PHP](https://img.shields.io/badge/PHP-%3E=7.4-blue?logo=php)](https://www.php.net/) [![MySQL](https://img.shields.io/badge/MySQL-%3E=5.7-blue?logo=mysql)](https://www.mysql.com/) [![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

> **A complete digital solution for barangay record management, document issuance, and resident self-service.**

---

## 🚀 Quick Start

1. **Clone or Download** this repository.
2. **Import the Database**: Use the SQL file in `/db/` to set up your MySQL database.
3. **Configure** `config.php` with your database credentials.
4. **Run on Localhost or Server**:
   - Staff/Admin: `http://localhost/login.php`
   - Kiosk: `http://localhost/scanQRCode.php`

---

## ✨ Features

### 🛡️ Main System (Staff/Admin)
- **Secure Login** for staff and admin
- **Resident Management**: Add, update, view, and delete residents
- **Document Issuance**: Print certificates (Clearance, ID, Indigency, Residency, Construction, Plate, Ownership, Jobseeker, Non-Residency)
- **Income Tracking**: Record and report payments
- **Barangay Officials Management**
- **Reports & Export**: Download data for backup or analysis
- **Customization**: Change appearance and certificate templates
- **Contact & Messaging**: Email support

### 🏪 Kiosk System (Staff/Residents)
- **QR Code Scanning** for fast access
- **PIN Security**: Residents set a PIN for private access
- **Self-Service**: View records, request documents

---

## 🖥️ How It Works

### For Staff/Admin
1. **Login** via `login.php`
2. **Dashboard**: View stats and quick links
3. **Manage Residents**: Add/update info, upload docs
4. **Process Documents**: Accept requests, print certificates
5. **Track Income**: Record payments, view reports
6. **Manage Officials**: Update official profiles
7. **Export Data**: For backup/reporting

### For Residents (Kiosk)
1. **Scan QR Code** at `scanQRCode.php`
2. **Set/Enter PIN** for secure access
3. **View Info** and request documents

---

## 🔒 Security & Privacy
- **Authentication**: Only authorized users access the main system
- **Resident Privacy**: QR code + PIN for self-service
- **Data Privacy**: Consent for personal info (Data Privacy Act compliant)
- **File Uploads**: Only images (max 500KB)
- **Session Management**: Secure sessions

---

## 📁 Project Structure

```text
├── Admin/         # Admin & staff modules
├── Staff/         # Staff modules
├── db/            # Database SQL files
├── images-*/      # Images (users, certificates, etc.)
├── plugins/       # JS plugins (e.g., QR scanner)
├── Documents/     # Document templates/exports
├── login.php      # Staff/Admin login
├── scanQRCode.php # Kiosk entry point
├── config.php     # DB config
└── ...
```

---

## 🛠️ Developer Notes
- **Tech Stack**: PHP, MySQL, JavaScript, HTML/CSS
- **Dependencies**: See `/plugins/` for JS libraries (e.g., Instascan for QR)
- **Customizable**: Edit certificate templates and UI in `/Admin/` and `/Staff/`

---

## 🙋 FAQ

**Q: Who can access the main system?**  
A: Only authorized staff and admins via login.

**Q: Can residents access their info?**  
A: Yes, via the Kiosk system using QR code and PIN.

**Q: What documents can be issued?**  
A: Barangay Clearance, ID, Indigency, Residency, Construction, Plate, Ownership, Jobseeker, Non-Residency, and more.


---

> **Empowering barangays with digital solutions!** 
