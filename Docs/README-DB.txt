Database Details: 


-Design:
 Database consists of 4 tables:
  
  1. "users" table, which contains basic information about the customers and the administrators. The differentiation between the two is in the 'role' field, where customers are assigned 'customer' and admins, 'admin'. Admins will be pre added to the database.

  2. "logs" table, where all the information about past services that have been provided, or due to be provided by the company are stored.  The differentiation between these two is the 'completed' field, which defaults as 0 (or incomplete), but when service has been provided it will be updated to a 1 (or complete). It has the foreign keys of 'service_id', to identify the type of service that was or will be provided in this entry of the log, 'user_id' to identify which user this service is/was for.

  3. "services" table, where all the kinds of services that are offered by the company are stored.

  4. "posts" table, where information about the title, body and who posted this news entry will be stored. It has a foreign key of 'user_id', which references the "users" table, more specifically the 'id' field, to match the admin who wrote this entry to the post.


- CRUD :
 

  Sign up form, which will require new customers to add their basic information into "users".

  After customers are authenticated and logged in, they will be able to make a call or email to the company requesting a service. Admins will listen/read to this call or email, and will create new rows in the 'logs' table.

  If the role is of 'admin', freedom to alter all the data in the database will be given. Meaning only a couple of pre-defined specific users will be able to fully CRUD the data in the "logs" table, and be able to add new posts to the newsreel, which will populate the "posts" table. 'admins' will also have the option to update information into any row of these tables, including the 'completed' and 'amount_in' fields in the "logs" table.

  A couple of tables will not be given the option to be changed within the app. The "services" table will always remain the same. The "users" table will be updated, but behind the scenes, no option to manually CRUD these tables will be provided. Only tables that users of the app, admin or customers, would be able to actively CRUD are the "logs" and "posts" tables. Admins will have full freedom over these tables, meanwhile customers will only be able to read logs that are associated to their specific id, or posts in the newsreel page.

After logs are marked as complete, they will be dismissed from the admins side of the "logs" table, and will need to be accessed through the 'past logs' page. On the users side, they will be able to see all services specific to their id.

Posts will be visible at all times in the 'news' page of the application.
