<?php
session_start();
include 'db_connection.php';

class BloodDonationController
{
    public static function handleAppointmentSubmission()
    {
        include 'db_connection.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bloodDonationForm"])) {
            $validationResult = self::validateForm($_POST);
            if ($validationResult !== true) {
                $_SESSION['error_message'] = $validationResult;
                header("Location: ../donate.php");
                exit();
            }

            self::insertDataIntoDatabase($_POST);
        } else {
            $_SESSION['error_message'] = "Invalid request method.";
            header("Location: ../donate.php");
            exit();
        }
    }

    private static function validateForm($postData)
    {
        if (empty($postData["fullName"])) {
            return "Full name is required.";
        }
        if (strpos($postData["fullName"], ' ') === false) {
            return "Patient name should contain at least two names";
        }

        if (empty($postData["email"])) {
            return "Email is required.";
        } elseif (!filter_var($postData["email"], FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }

        if (empty($postData["phone"])) {
            return "Phone number is required.";
        }

        if (empty($postData["age"]) || !is_numeric($postData["age"]) || $postData["age"] < 18) {
            return "Invalid age. Age must be a number and at least 18.";
        }

        if (empty($postData["cityTown"])) {
            return "City/Town is required.";
        }

        if (empty($postData["healthConditions"])) {
            return "Health conditions are required.";
        }

        if ($postData["previousDonations"] == "yes" && (empty($postData["lastDonationDate"]) || strtotime($postData["lastDonationDate"]) > time())) {
            return "Invalid last donation date.";
        }

        return true;
    }

    private static function insertDataIntoDatabase($postData)
    {
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $userID = $_SESSION['user_id'];
            include 'db_connection.php';

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $validatedData = self::sanitizeAndValidateData($postData);

            $currentDate = new DateTime('now', new DateTimeZone('UTC'));
            $appointmentDay = $currentDate->add(new DateInterval('P1D'))->format('Y-m-d');

            if (isset($validatedData['appointmentDay'])) {
                $selectedDate = new DateTime($validatedData['appointmentDay'], new DateTimeZone('UTC'));
                $minDate = new DateTime('tomorrow', new DateTimeZone('UTC'));

                if ($selectedDate < $minDate) {
                    $_SESSION['error_message'] = "Invalid appointment date. Please choose a date in the future.";
                    header("Location: ../donate.php");
                    exit();
                }
            }

            $sql = "INSERT INTO BloodDonationAppointment (
                userID, fullName, email, phoneNumber, gender, age,
                bloodType, cityTown, bloodDonationCenter, previousDonations,
                lastDonationDate, healthConditions, preferredContact,
                availability, donationFrequency, additionalComments, appointmentDay, pdfContent
            )
            VALUES (
                :userID, :fullName, :email, :phone, :gender, :age,
                :bloodType, :cityTown, :bloodDonationCenter, :previousDonations,
                :lastDonationDate, :healthConditions, :preferredContact,
                :availability, :donationFrequency, :additionalComments, :appointmentDay, :pdfContent
            )";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':fullName', $validatedData['fullName']);
            $stmt->bindParam(':email', $validatedData['email']);
            $stmt->bindParam(':phone', $validatedData['phone']);
            $stmt->bindParam(':gender', $validatedData['gender']);
            $stmt->bindParam(':age', $validatedData['age']);
            $stmt->bindParam(':bloodType', $validatedData['bloodType']);
            $stmt->bindParam(':cityTown', $validatedData['cityTown']);
            $stmt->bindParam(':bloodDonationCenter', $validatedData['bloodDonationCenter']);
            $stmt->bindParam(':previousDonations', $validatedData['previousDonations']);
            $stmt->bindParam(':lastDonationDate', $validatedData['lastDonationDate']);
            $stmt->bindParam(':healthConditions', $validatedData['healthConditions']);
            $stmt->bindParam(':preferredContact', $validatedData['preferredContact']);
            $stmt->bindParam(':availability', $validatedData['availability']);
            $stmt->bindParam(':donationFrequency', $validatedData['donationFrequency']);
            $stmt->bindParam(':additionalComments', $validatedData['additionalComments']);
            $stmt->bindParam(':appointmentDay', $appointmentDay);
            $stmt->bindParam(':pdfContent', $pdfContent, PDO::PARAM_LOB);
            $stmt->execute();

            self::generatePDF($postData, $pdo);

            $_SESSION['success_message'] = "Your appointment has been taken successfully. <a href='../BloodDonation/pdfA/appointment_" . $_SESSION['user_id'] . ".pdf'>Download PDF</a>";



            header("Location: ../donate.php");
            exit();
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "Error: " . $e->getMessage();
            header("Location: ../donate.php");
            exit();
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error: " . $e->getMessage();
            header("Location: ../donate.php");
            exit();
        }
    }

    private static function generatePDF($postData, $pdo)
    {
        require('../TCPDF-main/tcpdf.php');

        try {
            // Create a new TCPDF instance
            $pdf = new TCPDF();
            $pdf->AddPage();

            // Set font to a stylish font like 'times' and increase font size for title
            $pdf->SetFont('times', 'B', 22);

            // Title in a deep red color
            $pdf->SetTextColor(178, 34, 34);
            $pdf->Cell(0, 20, 'Blood Donation Appointment Details', 0, 1, 'C');
            $pdf->SetTextColor(0, 0, 0); // Reset text color

            // Add a decorative border around the title
            $pdf->SetLineWidth(1);
            $pdf->Cell(0, 0, '', 'T');

            // Use a modern font style for field labels and data
            $pdf->SetFont('times', 'B', 14);

            // Map form field names to custom labels
            $fieldLabels = array(
                'userID' => 'Appointment Id',
                'fullName' => 'Full Name',
                'email' => 'Email',
                'phone' => 'Phone Number',
                'gender' => 'Gender',
                'age' => 'Age',
                'bloodType' => 'Blood Type',
                'cityTown' => 'City/Town',
                'bloodDonationCenter' => 'Blood Donation Center',
                'previousDonations' => 'Previous Donations',
                'lastDonationDate' => 'Last Donation Date',
                'healthConditions' => 'Health Conditions',
                'preferredContact' => 'Preferred Contact',
                'availability' => 'Availability',
                'donationFrequency' => 'Donation Frequency',
                'additionalComments' => 'Additional Comments',
                'appointmentDay' => 'Appointment Day',
            );

            // Add appointment details with improved styling
            foreach ($fieldLabels as $key => $label) {
                if (isset($postData[$key])) {
                    $pdf->Ln(1); // Add some space between each field
                    $pdf->Cell(60, 12, $label . ':', 0, 0);
                    $pdf->SetFont('times', '', 14);
                    $pdf->Cell(0, 12, $postData[$key], 0, 1);
                    $pdf->SetFont('times', 'B', 14); // Reset font style
                }
            }

            // Add a decorative line
            $pdf->SetLineWidth(0.5);
            $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

            // Add a stylish thank-you paragraph
            $pdf->Ln(4);
            $pdf->SetTextColor(178, 34, 34);
            $thankYouMessage = "Gafus Thanks you for choosing to donate blood. Your generosity can save lives and make a difference. We appreciate your kindness and support.";
            $pdf->SetFont('times', 'I', 16);
            $pdf->MultiCell(0, 15, $thankYouMessage);

            // Add a footer with page number in a classy style
            $pdf->SetY(-25);
            $pdf->SetFont('times', 'I', 10);
            $pdf->Cell(0, 10, 'Page ' . $pdf->getAliasNumPage() . '/' . $pdf->getAliasNbPages(), 0, 0, 'C');

            $userName = $_SESSION['user_id'];
            $pdfName = 'appointment_' . $userName. '.pdf';

            $pdfPath = '../pdfA/' . $pdfName;

            $pdfDir = dirname(__DIR__) . '/pdfA/';
            if (!is_dir($pdfDir)) {
                mkdir($pdfDir, 0755, true);
            }

            $pdf->Output($pdfDir . $pdfName, 'F');

            return $pdfPath;
        } catch (Exception $e) {
            error_log('PDF Generation Error: ' . $e->getMessage());
            return false;
        }
    }

    private static function sanitizeAndValidateData($postData)
    {
        foreach ($postData as $key => $value) {
            $postData[$key] = htmlspecialchars(trim($value));
        }

        return $postData;
    }
}

BloodDonationController::handleAppointmentSubmission();
?>
