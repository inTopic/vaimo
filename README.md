# vaimo

The client would like to ensure that all customers placing orders over £300 get a superior level of customer service and so would like all orders placed online, over the £300 threshold, to be allocated to an account manager. The allocation needs to be done at the point where the order is created. This should still happen even if the payment event fails. The allocation is to be done by post code area. A list of postcodes & account manager names is supplied for testing. (One postcode area can have only one account manager; one account manger can be assigned to multiple postcode areas.)
In the Admin backend the client also requires :
A menu point to access a grid that will show the postcode area covered and the account manager for that post code.
The Standard Sales grid should be extended so that there is a new column that shows the account manager linked to the order (a blank value for orders under the threshold or that don't fall in any valid postcode district). Due to anticipated requests, this column should be added by rewriting & extending the Core grid files
The client has no need at this time for a method to import postcode/account manager records, but the initial list should be imported as part of the module initialisation process.
