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
    - I changed the route for the edit to rediect to the specific venue or wedding that has been modified.
    - Concerning the dark-toggle button, it seems like depending on the screen or device you are using the light-mode flash is less obvious.
    - I decided to make it visually appealing and easy to understand. I removds the tables from the navbar and put it in the dashboard. I also make sure that only the admin can see the create, edit and delete section. I added images as icons for each table. I also invertated the colors dark-mode.
    - I discontinued the js_toggle_mobile.js as I removed it from the resonisive nav bar to the primary instead.
    - Modified the login.blade, register.blade and guest.blade to make a dark-mode option. I added go back button for the registetion and refirect to the login page.
    - I used colon on the value (:value) in forms so that on reload, the input stays there. I added this in the image so the image doesn't disappear on reload. Only the wedding_date_time goes blank on manual reload. In order to combat this, I would have to use a bit of Javascript and localstorage. This insures that whatever the user types stays in the field even after a full page reload. It only resets if they clear their browser storage. I decided not to add it as it is not a significant issue.
    - Modified the mobile version

- **Saturday - 8th Nov:**
    - I found the responsive-nav-link.blade.php it took a while to find the correct file to change the colours of the dropdoen on mobile format.

### Week 2
- **Monday - 10th Nov:**
    - It seems like using the colon in the value in venue and wedding-forms seem to cause issues. In the edit section, former input is not there. When I removed the colon it appeared. and it comes to the create section, the intial input goes away on manual reload. In order to fix it, I need to make js script that stores the input in localStorage. I made a js file called [all-form-persist.js]. In the script, I added the inputs that I wanted to be affected made sure that what whateever has been written gets saved in the storage so that when on reload it retores what was wriiten. I then imported it to the app.js.
    - I'm starting the many-to-many table. I'm trying to connect the guest table to weddings through venues as I made some kind of mix up.
    - I was planning to make form for the user to make themselves a guest throgh clicking on the venue and then they choose the wedding.
    - I'm also trying to change the wedding path to show the wedding in the venue choosen.
    - My plann it to list the wedding when you click on the venue and on the wedding, theere's abutton that says sign-up as guest
    - I still have issues with the wedding display underneath the venues

- **Tuesday - 11th Nov:**
    - I fixed the foreach to dislpay wedding cards under a specfic venue that has a wedding booked for it. There were a few errors with the syntax and being consistant with the initialisation.
    - Had issues with sedding the pivot table. I fixed it by calling the GuestSeeder in DatabaseSeeder first before the VenueSeeder- order of the call matters.
    - Starting with the Guests CRUD operations.
    - Changed the schema in create guest mirgation that makes the email a unique, that way in the validation I can make the requirement as email.
    - Having issues with the guest index.

- **Wednesday - 12th Nov:**
    - I fixed the guest index and card. The problem was that $venues in the guest is a collection and trying to access a property called title on a collection is not possible since a guest can go to many venues. I can show al titles through a loop or join all vneue titles through string with a comma to separate.
    - Finished the guest show.blade and details.blade.
    - Starting with the edit section.

## GitHub Link
https://github.com/Light-C-O/wedding_invites-ca1.git
