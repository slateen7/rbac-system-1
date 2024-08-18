
 1: Create Project
 
 2: Working on the login UI for users using the 'php artisan ui' command.
 
 3: Create a table for roles and seed it with data.
 
 4: relation role table and user table. 
 
 5:I have set it up so that any user who registers will be assigned the 'Viewer' role.
 
 6: Any user who registers will be assigned the 'Viewer' role by default. After registration, you can go to the database and change their role to either 'Admin' or 'Editor,' while already registered users will remain as 'Viewer.
 
 7:Create a table for posts
 
8: relation post table and user table. 

9: The posts table fields for title and content.

10:After doing this, I will register 3 users: an Admin, a Viewer, and an Editor.

11:I created a function for creating posts and designed a form page for creating posts.

12:I created a function to store new posts.

13:I implemented a function to edit existing posts.

14:I added a function to delete posts.

15:I created a policy and middleware.

16: I have created policies for both the Editor and Viewer roles.

17:The Editor can view and create posts and edit.

18:The Viewer can only view post.

19: the admin can view create edit and delete a post.

20:In the middleware, I check if the user has a specific role. If they do, they are granted access; if they don't, access is denied. This is applied to the routes.

21:I also created a policy to ensure that validation can be applied on the front end as well.


   admin email and password 
   
      admin123@gmail.com
      
          admin123

 view email and password 
 
     viwer123@gmail.com
     
         viwer123

 editor email and password 
 
     editor123@gmail.com
     
         editor123

    
note :database file uploaded (file name  rabc-system.sql)
