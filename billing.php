<?php
require_once("includes/paypalConfig.php");
require_once("billingPlan.php");

$id = $plan->getId();

use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

$agreement = new Agreement();
$agreement->setName('Subscription to MFlix')
  ->setDescription('£9.99 setup fee and then recurring payments of £9.99 to MFlix')
  ->setStartDate(gmdate("Y-m-d\TH:i:s\Z", strtotime("+1 month", time())));

$plan = new Plan();
$plan->setId($id);
$agreement->setPlan($plan);

$payer = new Payer();
$payer->setPaymentMethod('paypal');
$agreement->setPayer($payer);

try {
    
    $agreement = $agreement->create($apiContext);
  
    $approvalUrl = $agreement->getApprovalLink();
    header("Location: $approvalUrl");
  } catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
  } catch (Exception $ex) {
    die($ex);
  }
?>