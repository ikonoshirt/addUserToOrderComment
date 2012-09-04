# Add User To Order Comment
Save the logged in admin user to the order-status-history entry.

A new column is added to the order_status_history and a foreign key to admin/user.

And a observer will be registered which is attached to the save-before event of the status-history and adds the data.