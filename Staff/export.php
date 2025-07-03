<?php

include("../config.php");
include("XLSXLibrary.php");

if(isset($_GET['export'])) {

  $export = $_GET['export'];


  if($export == 'resident') {



      $resident = [
        ['No.', 'Full name', 'Date of birth', 'Age', 'Birthplace', 'Gender', 'Civil status', 'Citizenship', 'Occupation', 'Religion', 'Address', 'Family Indicator', 'Head name', 'Family role', 'Sector', 'Resident status', 'Voter status', 'ID status', 'QR status', 'Years of stay', 'Date registered']
      ];

      $id = 0;
      $sql = "SELECT * FROM residence ORDER BY lastname";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        foreach ($res as $row) {
          $id++;
          $name = $row['lastname']. ' ' .$row['suffix']. ', ' .$row['firstname']. ' ' .$row['middlename'];
          $address = $row['house_no']. ' ' .$row['street_name']. ', ' .$row['purok']. ' ' .$row['zone']. ' ' .$row['barangay']. ', ' .$row['municipality']. ', ' .$row['province']. ' ' .$row['region'];
          $resident = array_merge($resident, array(array($id, $name, date("F d, Y", strtotime($row['dob'])), $row['age'], $row['birthplace'], $row['gender'], $row['civilstatus'], $row['citizenship'], $row['occupation'], $row['religion'], $address, $row['familyIndicator'], $row['headName'], $row['familyRole'], $row['sector'], $row['resident_status'], $row['voter_status'], $row['ID_status'], $row['QR_status'], $row['years_of_stay'], date("F d, Y", strtotime($row['date_registered'])))));
        }
      } else {
        $_SESSION['message'] = "No record found in the database.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: resident.php");
      }

      $xlsx = SimpleXLSXGen::fromArray($resident);
      $xlsx->downloadAs('Resident records.xlsx'); // This will download the file to your local system

      // $xlsx->saveAs('resident.xlsx'); // This will save the file to your server

      echo "<pre>";

      print_r($resident);

      header('Location: resident.php');






  } elseif($export == 'officials') {





      $officials = [
          ['No.', 'Full name', 'Position', 'Date registered']
        ];

        $id = 0;
        $sql = "SELECT * FROM officials ORDER BY lastname";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          foreach ($res as $row) {
            $id++;
            $name = $row['lastname']. ' ' .$row['suffix']. ', ' .$row['firstname']. ' ' .$row['middlename'];
            $officials = array_merge($officials, array(array($id, $name, $row['position'], date("F d, Y", strtotime($row['date_registered'])))));
          }
        } else {
          $_SESSION['message'] = "No record found in the database.";
          $_SESSION['text'] = "Please try again.";
          $_SESSION['status'] = "error";
          header("Location: officials.php");
        }

        $xlsx = SimpleXLSXGen::fromArray($officials);
        $xlsx->downloadAs('Official records.xlsx'); // This will download the file to your local system

        // $xlsx->saveAs('officials.xlsx'); // This will save the file to your server

        header('Location: officials.php');





  } elseif($export == 'income') {



        $income = [
          ['No.', 'Payment type', 'Amount', 'Added by', 'Date added', 'Updated by', 'Date updated']
        ];

        $id = 0;
        $sql = "SELECT * FROM income JOIN users ON income.added_by=users.user_Id WHERE paid_by='' ORDER BY date_added DESC";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          foreach ($res as $row) {
            $id++;
            $name = $row['lastname']. ' ' .$row['suffix']. ', ' .$row['firstname']. ' ' .$row['middlename'];
            $updatedBy = $row['lastname']. ' ' .$row['suffix']. ', ' .$row['firstname']. ' ' .$row['middlename'];
            if($row['updated_by'] == '') {
              $updatedBy = '';
            }

            $date_updated = date("F d, Y", strtotime($row['date_updated']));
            if($row['date_updated'] == '') {
              $date_updated = '';
            }
            $amount = '₱ '.number_format($row['paymentAmount'], 2, '.', ',');
            $income = array_merge($income, array(array($id, $row['paymentFor'], $amount, $name, date("F d, Y", strtotime($row['date_paid'])), $updatedBy, $date_updated)));
          }
        } else {
          $_SESSION['message'] = "No record found in the database.";
          $_SESSION['text'] = "Please try again.";
          $_SESSION['status'] = "error";
          header("Location: brgyIncome_list.php");
        }

        $xlsx = SimpleXLSXGen::fromArray($income);
        $xlsx->downloadAs('Income records.xlsx'); // This will download the file to your local system


        // $xlsx->saveAs('officials.xlsx'); // This will save the file to your server
        echo "<pre>";
        header('Location: brgyIncome_list.php');



  } else {

  }



}


