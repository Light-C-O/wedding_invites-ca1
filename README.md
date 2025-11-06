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


## GitHub Link
https://github.com/Light-C-O/wedding_invites-ca1.git
