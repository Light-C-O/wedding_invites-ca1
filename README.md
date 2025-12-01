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
    - In the guest-details, I made a foreach loop for bothe venues and weddings in order to show the weddings that guest is in as well as the venues.
    - Finished with the edit section.
    - Starting the create.
    - Changing routes in order for it to make sense.

- **Thursday - 13th Nov:**
    - Finished create.
    - I made it that once a user click on sign me up as guest, it takes them to a guest form.
    - I want a user to sign up as guest to a wedding through choosing a venue. However, when user clicks on the add guest button, it adds them - but, you can't see the venue or the wedding they choose in the guests.show through guest-details.blade.php And see venues chosen in the guests.index through guest-card.blade.php. I found one of many errors, I had attached guests to books instead of venues (_misplaced the wording_)
    - I had to fix the GuestController in store function to add venues as an array to make the venues are passed.
    - I added Then hidden fields inside guest-form concerning wedding and venues. I added it my store function the controller.
    - I had some so many issues. And in order to fix most of them I needed to make another pivot table between weddings and guests. But is not what I want to do. i'm still to find a way around it.
    - Officially done with the CRUD functions of Guests.
    - In order to make things simpilar, I decided to not make it complicated by creating a guest though venues and by adding wedding to. Instead a user can just create a guest without needed to save a wedding first. Instead the guest can go to venues and click on a wedding associated to that venue and it will automatically save it to their guest details and be viewed there.
    - I'm thinking have to create a component called detail-card that way it will make things easier when it come to displaying the saved wedding.
    - I also made the route dashboard route is easier to access by having it in every screen, think of it as a Home button.

- **Sunday - 16th Nov:**
    - I make a new compoment called GuestInvite instead of the GuestDetailCard. Although, I ended up not using it once I found the problem.
    - I want it when a person logs in as a user, they the ability to go to venues and pick a wedding booked in that venue and save a date. Once they click on save a date button it will redirect back to their own guest.show with that specific venue and wedding. I managed to do that how ever due to the user not being a guest Laravel could display the the venue and wedding picked.In order for it to do that the user must be guest. So, there needs to be relationship between User table and Guest table : a one-to-one relationship.
    - I first created a mirgation to add a user_id to guest and ran it. I updated the User model and guest Model to create a one-to-one relationship. I then went to AppServiceProvider.php add a user registered listener that bascially creates a Guest record of each user that register, it also check if a user already has a guest profile to hinder any duplications. I put it in the booth method I cdon't need to make or create a provider called EventServiceProvider.
    - In venues/show.blade I changed the button route from ['guest' => auth()->user()->id] to ['guest' => Auth::user()->guest->id] it will assumes that each user has a related guest record. I created a safetynet in the form of a if statement says that if Auth::user()->guest is null then throw an error that tells the user they need to create a guest in order to save a date to a wedding of this venue.
    - I made sure in the store in GuestController the appropiate things. I made the mistake of forget to add user_id as on the things to create a guest. I also made sure to user_id in the fillable section in Guest.php.
    - Finally, now a user can log in, create a guest list, go to the venues, choose a venue they like and pick a wedding they want to save a date to and it redirects them to th guest form with the saved date of the wedding as well as the venue.
    - Although, I can click on a date and it dsplays the nfo on guests.show, it is temporary and the user and only display one wedding. For it to stay there, I have either make a new table or do some JSON with all the weddings. I rather not make it too complicated.
    - Refining the overall apearance and the routes for better navigation.

### Week 3
- **Monday - 17th Nov:**
    - I made the user_id a default.
    - The user_id has become an automatic guest once the login.
  
- **Tuesday - 18th Nov:**
    - Crated another branch called pivot_table.
    - Added a pivot table between guests and wedding - a many-to-many relationship. This is to have the ability to attach a wedding to a guest just like venue to guest.
    - Decided to change the route of the save a date button from a href into a new route in web.php with a submit form with a POST method.
    - The route expects a Guest parameter: /guests/{guest}/weddings/attach.
    - the form incorrectly passes a Wedding object to that route. 
    - Because {guest} cannot be resolved, the route cannot not match, so the controller method is never reached.
    - By passing the authenticated user’s guest ID to the route, it fixes the issue.
    - Don’t forget to include @csrf in the form, this tells Laravel that this form and method is allowed so it doesn't block it. In short, it confirms the request came from my website, and it is not a malicious site
    - After fixing the route, the controller finally successfully receive the request and it works perfectly fine and it was proven using the dump data function - (_dd()_).
    - Hopefully it will create new row in the database on the guest_wedding pivot table.

- **Wednesday - 19th Nov:**
    - Merged the pivot_table to wedding_invites-ca2
    - In the attachWedding function in GuestController, I implemtented the action that it fetches weddings, validates input, attaches the selected wedding to the guest (without removing existing ones). Then, it redirects back to the guest show page with the selected wedding and venue for the view to display.
    - When a user(_that is guest_) clicks on the wedding, it goes to the guest show but it didn't display the wedding choosen. I chacked my GuestController and, it seems like I didn't make any changes to it. I had to use session because attachWedding does a redirect. Redirects start a new request so request data is lost
    - I first decided to use an alternative. Return the view directly (no redirect), append IDs to the redirect URL (query params/route params), or flash only the IDs and re-fetch models in show.
    - I later changed it that in the show function in GuestController, it loads all venues associated with that guest along with their weddings, then combines those weddings into a unique collection. 
    - It then initializes the selected wedding and venue as null by default, then tries to determine the correct selections in order: first using the guest’s wedding_id, then checking for a selectedWeddingId in the session, and finally looking for a wedding ID in the URL query. 
    - If no venue is selected yet, it falls back to the guest’s venue_id. Finally, it returns the guests.show view with the guest, their venues, weddings, and the selected wedding and venue for display.
    - Also amended the attachedWedding. It first validates that a wedding_id is provided and exists, then retrieves the corresponding wedding, and links it to the guest without removing any existing associations. It also stores the wedding’s venue ID and then redirects to the guest’s show page, passing along the selected wedding and venue IDs and a success message for display.
    - This is shown in the database as well, however I want it to be stored in a way. Not sure I can make it work without making a migration in the guest table to add wedding_id and venue_id. I may try adding a selected column, like booloean in the pivot table between guest and wedding.

- **Thursday - 20th Nov:**
    - I decided add another coloumn called selected. I used the pivot table guest_wedding - mark the selected wedding on the existing guest_wedding pivot (adding a boolean) and update the pivot when attaching so the choice persists. The selected wedding's venue comes from the Wedding->venue relation.
    - It displays the selected wedding, and it stays there when I get back to it, it also states it had been selected in the database (_1 in the selected column since its a boolean_). However if user picks another wedding, it automtically unselects the previous one and replaces it with the new one. I don't want it to do that, although I am satisfied that I can see it as a record in the database. But I want the user to also see the other wedding they have selected, so I want the previous ones to *remain* selected.

- **Sunday - 23rd Nov:**
    - I tested a few things and noticed that I could create a guest. I troubleshoot an it turns out that I didn't add the user_id in the create in store function in GuestController. I also came accross a error, I was making the gust twice - one with the user_id and one without. I fixed te problem by commenting out one of the create  guest and added the logged-user id into the one I want to user to validate.
    - I removed created_at and updated_at in the fillable in the Guest model as Laravel already does it automatically.
    - I had another issue that needed fixing. I had passed $guest in route('guests.store') in the create.blade.php, it caused it to not go to the directed route show that the guest had been created.
    - I was able to display venue on the wedding selected of tht guest by modifying the index in the controller to fetch every guest while also loading their related venues and those venues’ weddings, along with the guest’s own weddings and each wedding’s venue, in advance to avoid extra database queries.
    - Back to the issue (_"I want the user to also see the other weddings they have selected, so I want the previous ones to **remain** selected"_). In order to do that, I need to migrate - to add venue_id on the pivot table guest_wedding as well as possibly another selected column, make it true when attaching. I have to update the pivot table schema, the guest relation and show/display multiple weddings. This is quite challenging, as it's above my capability. I understand the logic and what it should do, but how to exceute and implement it, is where I'm stuck.
    - I believe I have added what I want for my project. Preparing the script to record.

### Week 4
- **Monday - 24th Nov:**
    - Completed the recording.

### Week 5
-**Monday - 12th Dec:**
    - Made a last-minute changes (_not in the recording_).
    - Corrected few colours.
    - Corrected structures: I attempted the vertical stretching with flex-col and place-self-stretch, but nothing changed. I later find the issue, it was the a tag that was block the effect, the place-self-strtech is supposed to be applied to the a tag not the on the card in the wedding-card compoment. Fixed the stretching with h-full on the a tag as well in the wedding-card. Wanted to add justify-center to center vertiacl in the wedding-card but decided against it.
    - Dispalyed the number of guests in wedding: I wanted to show how many guests are attached to a single wedding. The WeddingController was updated to also eager load the guests. Later on, I got an error in the blade compente wedding-details that $wedding was not received as a variable. I had forgotten to add it to the @props as well as the show.blade for weddings. Now, the guest count is displayed correctly in addition to the capacity of the venue when a guest saves a date to the wedding.
    

## GitHub Link
https://github.com/Light-C-O/wedding_invites-ca1.git
