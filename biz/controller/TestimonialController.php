<?php
include '../common/config.php';
include '../model/TestimonialDB.php';

$test_db = new TestimonialDB();
    switch ($_POST['action']) {
        case 'Add Testimonials':
            echo ($test_db->addTestimonials($_POST) ? "true" : "false");
        break;
        case 'Get two random testimonials':
            $result = $test_db->getTwoRandomTestimonial($_POST);
            echo json_encode($result);
            break;
        case 'Get all testimonial':
            $result = $test_db->getAllTestimonials($_POST);
            echo json_encode($result);
            break;    
        case 'Check testimonials':
            $result = $test_db->checkIfAbleTestimonial($_POST);
            echo json_encode($result);
            break;
        default:
        break;
    }
?>