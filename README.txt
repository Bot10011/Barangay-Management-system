2 SYSTEMS IN THIS FILES

1. MAIN SYSTEM - Barangay Management System
 - This system can only be accessed by the Brgy. Staff/Admin
 - access thru login.php

2. KIOSK 
- This system can be accessed both Staff(can be resident) and residents
- access thru scanQRCode.php
- KIOSK can be separated from the Main system



FILES NEEDED FOR KIOSK

JS FILES
- plugins/instascan.min.js

PHP FILES
- navbarResidentOnly.php
- notFound.php
- PINsettings.php
- scanQRCode.php
- resident_view.php
-processes.php (only three processes in this file needed for this KIOSK system)




PROCESSES NEEDED that can be found in processes.php
- QR CODE SCANNING
- PIN SETTINGS
- ACCESS AGAIN INFO THRU PIN