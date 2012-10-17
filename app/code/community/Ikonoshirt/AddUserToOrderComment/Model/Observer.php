<?php
class Ikonoshirt_AddUserToOrderComment_Model_Observer
{

    /**
     * set the logged in admin user if exists
     *
     * Attached to sales_order_status_history_save_before
     *
     * @param $event Varien_Event_Observer
     */
    public function addUserToOrderComment(Varien_Event_Observer $event)
    {
        /* @var $statusHistory Mage_Sales_Model_Order_Status_History */
        $statusHistory = $event->getStatusHistory();
        if($statusHistory->getId()) {
            return;
        }

        $adminSession = Mage::getSingleton('admin/session');
        if ($adminSession instanceof Mage_Admin_Model_Session) {
            $user = $adminSession->getUser();
            if ($user instanceof Mage_Admin_Model_User && $user->getId()) {
                $statusHistory->setAdminUserId($user->getId());
            }
        }
    }
}