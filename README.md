## CA2

### Week 1
- **Monday - 3rd Nov:**
    - Started CA2 by making a branch from the main
    - Updated the ERD.
    - Created a new attribute called role in the users table (using a migration)
    - Seed the user table with an admin user, using the command: php artisan make:seeder AdminSeeder
    - Made an admin and user role option
  
- **Tuesday - 4th Nov:**
    - Finished the user-role application
    - Made wedding table
    - Created a Model, Controller, Migration and Seeder for table weddings
    - Called the class WeddingSeeder to seed weddings table in the database. Made sure to comment-out the VenueSeeder to prevent any duplication. Did the same with the WeddingSeeder once it was seeded in the database
    - In the process of finishing wedding components (details and card)
    - In the process of wedding CRUD functions - still have a few uncompleted sections
    - Made folder to start the edit, create, show and index blade.php files

- **Wednesday - 5th Nov:**
    - Fixed a few errors with syntax and added a few things in Wedding controller that will help me pull information from Venues table
    - Fixed the index.blade of weddings by correcting errors in the component wedding-card.blade.
    - Managed to replace venue_id to the actual name by pulling the title from the venue table.
    - Finished the show.blade of weddings.
    - In the process of create.

- **Thursday - 6th Nov:**
    - Started with the create scetion.
    - I decided to install a data and time picker - made sure that when on edit to keeps the same time and on create, it is empty.
    - Had venue issues in pulling all the venues from the venues table. Needed to go to the controller and call a finction Venue::all() to get the venues
    - Simplified a few if statement for clear look, and for it to easy to read and understand.
    - I made a new mirgation that makes few colomns nullable in weddings table, meaning it is an option to fill them - not a requirement.
    - Completed the create of CRUD operations.
    - Offically completed the CRUD functions of Weddings.
    - I fixed the errors for the if statement concering User or Admin. I made mention the role column with the 'user' or 'admin in it'.
    - I have a js dark-mode toggle button, when on click it goes to dark mode. However for some reason, it goes back light when I click on another button instead of staying dark until click the js toggle button again. I found that I needed to use localStorage for it to remember the theme preference and reapply it when the page loads.
    - I made an improved verion of the dark-mode toggle, it fixed temporeraly before I found another issue. It does stay dark but it flashes light before it settles to dark-mode again everytime I click on another button. I'm not sure what could be the problem.
  
- **Friday - 7th Nov:**
    - Had to fresh my migarion, what was in the sql and my dabase files were out of sync.
    - I formated venues create and edit to make it look better.
    - I chaged the route for the edit to rediect to the specific venue or wedding that has been modified.
    - Concerning the dark-toggle button, it seems like depending on the screen or device youare using the light-mode flash is less obvious.


## GitHub Link
https://github.com/Light-C-O/wedding_invites-ca1.git
