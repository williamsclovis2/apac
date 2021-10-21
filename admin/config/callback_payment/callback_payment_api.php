<?php
/**
 * @author Ezechiel Kalengya [ezechielkalengya@gmail.com | +250784700764 | Software Developer]
 * @api callback response 
 */
require_once '../../core/init.php';

if( Input::checkInput('TransID', 'get', 1) ||
    Input::checkInput('CCDapproval', 'get', 1) || 
    Input::checkInput('PnrID', 'get', 1) || 
    Input::checkInput('CompanyRef', 'get', 1) || 
    Input::checkInput('TransactionToken', 'get', 1)  ):

        $_CALLBACKDATA_['TransID']          = Input::get('TransID', 'get');
        $_CALLBACKDATA_['CCDapproval']      = Input::get('CCDapproval', 'get');
        $_CALLBACKDATA_['PnrID']            = Input::get('PnrID', 'get');
        $_CALLBACKDATA_['CompanyRef']       = Input::get('CompanyRef', 'get');
        $_CALLBACKDATA_['TransactionToken'] = Input::get('TransactionToken', 'get');

        /** Check If This Transaction Exists In Our Database */
        $_payment_entry_data_ = PaymentController::checkIfPaymentTransactionIDExists($_CALLBACKDATA_['CompanyRef'], $_CALLBACKDATA_['TransID']);

        $_PAYTOKEN_     = $_CALLBACKDATA_['TransID'];
        $PaymentHandler = new \PaymentHandler(); 
        $PAYMENT_REQ 	= $PaymentHandler->verifyPaymentToken($_PAYTOKEN_);

        if( !($_payment_entry_data_) ):
            Redirect::to('payment/error/notification/0'.sha1(time()));

        /** When The Transaction Is found */
        else:
            /** Check If The Transaction Status Not Yet Completed */
            if($_payment_entry_data_->transaction_status == 'COMPLETED'):
                Redirect::to('payment/error/notification/1'.sha1(time()));

            else:
                /** Verify PayToken Status */
                $_PAYTOKEN_     = $_CALLBACKDATA_['TransID'];
                $PaymentHandler = new \PaymentHandler(); 
                $PAYMENT_REQ 	= $PaymentHandler->verifyPaymentToken($_PAYTOKEN_);

                $diagnoArray[0] = 'NO_ERRORS';
                $diagnoArray[1] = '';
                if($PAYMENT_REQ):
                    switch ($PAYMENT_REQ->Result):

                        # When Transaction Paid Successfully
                        case 000:
                            // echo 'Yes paid';
                            # Update Database And Send Confirmation Email
                            $payment_method = $PAYMENT_REQ->CustomerCreditType;
                            $payment_id     = $PAYMENT_REQ->TransactionApproval;

                            $_UPDATE_PAYMENT_ENTRY_ = array(
                                'participant_id'    => $_payment_entry_data_->participant_id,
                                'payment_entry_id'  => $_payment_entry_data_->id,
                                'transaction_status'=> 'COMPLETED',
                                'callback_cmd'      => $PAYMENT_REQ->callback_cmd,
                                'callback_status'   => $PAYMENT_REQ->Result,

                                'payment_method'    => $payment_method,
                                'payment_operator'  => '',
                                'payment_id'        => $payment_id
                            );
                            PaymentController::updatePaymentTransactionEntry($_UPDATE_PAYMENT_ENTRY_);
                            Redirect::to('payment/success/notification/'.sha1(time()));
                            break;

                        case 003:
                            // echo 'pending bank';
                            Redirect::to('payment/error/notification/2'.sha1(time()));
                            break;

                        case 007:
                            // echo 'Part Payment Transactions not fully paid';
                            Redirect::to('payment/error/notification/3'.sha1(time()));
                            break;

                        case 900:
                            // echo 'Transaction not paid yet';
                            Redirect::to('payment/error/notification/4'.sha1(time()));
                            break;

                        case 901:
                            // echo 'Transaction declined'; 
                            # Update Database And Send Confirmation Email
                            $payment_method = $PAYMENT_REQ->CustomerCreditType;
                            $payment_id     = '';

                            $_UPDATE_PAYMENT_ENTRY_ = array(
                                'participant_id'    => $_payment_entry_data_->participant_id,
                                'payment_entry_id'  => $_payment_entry_data_->id,
                                'transaction_status'=> 'DECLINED',
                                'callback_cmd'      => $PAYMENT_REQ->callback_cmd,
                                'callback_status'   => $PAYMENT_REQ->Result,

                                'payment_method'    => $payment_method,
                                'payment_operator'  => '',
                                'payment_id'        => $payment_id
                            );
                            PaymentController::updatePaymentTransactionEntry($_UPDATE_PAYMENT_ENTRY_);
                            Redirect::to('payment/error/notification/5'.sha1(time()));
                            break;

                        case 903:
                            // echo 'The transaction passed the Payment Time Limit';
                            # Update Database And Send Confirmation Email
                            $payment_method = isset($PAYMENT_REQ->CustomerCreditType)?$PAYMENT_REQ->CustomerCreditType:'';
                            $payment_id     = '';

                            $_UPDATE_PAYMENT_ENTRY_ = array(
                                'participant_id'    => $_payment_entry_data_->participant_id,
                                'payment_entry_id'  => $_payment_entry_data_->id,
                                'transaction_status'=> 'TIMED_OUT',
                                'callback_cmd'      => $PAYMENT_REQ->callback_cmd,
                                'callback_status'   => $PAYMENT_REQ->Result,

                                'payment_method'    => $payment_method,
                                'payment_operator'  => '',
                                'payment_id'        => $payment_id
                            );
                            PaymentController::updatePaymentTransactionEntry($_UPDATE_PAYMENT_ENTRY_);
                            Redirect::to('payment/error/notification/6'.sha1(time()));
                            break;

                        case 904:
                            // echo 'Transaction cancelled';
                            # Update Database And Send Confirmation Email
                            $payment_method = isset($PAYMENT_REQ->CustomerCreditType)?$PAYMENT_REQ->CustomerCreditType:'';
                            $payment_id     = '';

                            $_UPDATE_PAYMENT_ENTRY_ = array(
                                'participant_id'    => $_payment_entry_data_->participant_id,
                                'payment_entry_id'  => $_payment_entry_data_->id,
                                'transaction_status'=> 'CANCELLED',
                                'callback_cmd'      => $PAYMENT_REQ->callback_cmd,
                                'callback_status'   => $PAYMENT_REQ->Result,

                                'payment_method'    => $payment_method,
                                'payment_operator'  => '',
                                'payment_id'        => $payment_id
                            );
                            PaymentController::updatePaymentTransactionEntry($_UPDATE_PAYMENT_ENTRY_);
                            Redirect::to('payment/error/notification/7'.sha1(time()));
                            break;
                    
                        default:
                            // echo 'Some errors occured';
                            Redirect::to('payment/error/notification/8'.sha1(time()));
                            break;

                    endswitch;
                endif;
            endif;
        endif;
else:
    Redirect::to('index');
endif;

?>