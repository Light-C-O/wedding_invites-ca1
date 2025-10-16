## CA1

### Week 1
- **Monday - 29th Sept:**
    - Started CA1.
    - Installed Laravel which is a PHP framework for building modern, full-stack web applications, and a framework ios a tool that assists when it comes to saving time and benig organised.
    - Installed a new project as an exapmle, and used php artisan serve to run the application. [http://127.0.0.1:8000] - this where you see the running application.

- **Tuesday - 30th Sept:**
    - Created my ca1 project. 
    - Created a Model which is a PHP class, a blueprint or representation of a database table. It helps you interact with the database easily. It handles the database in the background so you don't have to deal with the complication of SQL, it keeps things simple and organised.
    - Created a Migration, it like a version control for your database. It helps you create, modify, and share the database structure such as tables, columns, indexes in a consistent way. Instead of manually creating tables using SQL, you can a write PHP code to define the database structure, and Laravel runs it to update the database.
    - Created a Resource Controller, it is a special type of Controller that automatically handles common actions you usually need for a resource. Thinng like create(), show(), edit() etc. Unlike a reguallar Controller, it generates all standard CRUD methods to make things operate faster and easier.
    - A View was made as well, which  bascally displays the user interface, it is the front-end code that user sees in the browser.
    - Created routes in the web.php. A route is simply a way to define what should happen when someone visits a specific URL in your web app.

- **Thursday - 2nd Oct:**
    - Had a few problems with Laravel, and it turns there were syntax errors as well as the fact I migrated but forgot seed the database. 
    - I also decided to change venue 'name' to 'title' in the venue table. It seems to have Laravel a bit of confused. 
    - I have created to the venue card components according to the instructions and everything is now working perfectly. I did run through an issue with the path for images. In the [resources/views/components/venue-card.blade.php], it didn't accept this format:[<img src='{{asset('images/venues/. image)}}' alt='{{title}}'>](according to the instruction). It turns out that {image} alreay has the pathway:images/venues. So, by removing, it should the image instead of the title as the alternative. It is important to resize the image into the same size to make them uniform.


### Week 2
- **Monday - 6th Oct:**
    - I have added a description to my table. 
    - Created Blade(view) compoments which is a reusable piece of code that encapsulates a section of a user interface (UI) to be reused throughout your application. It helps you organise your code.
    - @props where used for the venue details – this lists the arguments that can be passed in – make sure they match up with the attributes you want pass in from the view. 
    - I have completed the show venues, making sure that everything works before making it pretty.
    - I'll be implementing the create venues.
    - I changed the path for the images again. It turns out the images/venues was in the database instead of just the image name.
    - I have also added a readme that I would eventually use as a log of what I have done so far.

- **Tuesday - 7th Oct:**
    - Tried start with the create venues, immediately had problems with the show venues, everything was working but the gaps were not acting accordingly. It worked out in the end.
    - Started with the create: lots of syntax errors.
    - I also came an error that turns out when it comes to the validation, it doesn't accept float but numeric.
    - Came across a mass assignment error. A mass assignment is a way to quickly fill a model with data using an array, instead of setting each property one by one. Laravel, however blocks it by default inorer to prevert hacker from addin unwanted data.
    - Tried starting the edit but I have issues with the colour showing, it seems to be overidden somewhere.
    - Also have problem with adding colour in the create success message as well as the edit & delete button.

- **Friday - 10th Oct:**
    - Had a few issues with the size of the image. Despite the resizing the images to same ratio, for some reason, at a cetain display layout some images shrinks. 
    - I eventually found out that the image had a fixed width in the venue-card.blade.php, I changed to w-full inorder for it to strtch to the full container that it is in.
    - I have been having problems with the background colour for a while now. It seems to be overwitten somewhere. I asked gpt where the issue and it said it might be due to purge config. I checked the app.css and everthing was okay. But in thailwind, there were a few things there. I told to correct the code and I paste it in the tailwind.config.js to check and it worked.
    - I worked onthe venue-form.blade.php, and how the vaildation works and understanding. I have written comments on them show how some of them works, there are quite repetitive.
    - Will be now focusing fully on implementing the update and delete section of ca1.


### Week 3
- **Monday - 13th Oct:**
    - Had a few errors with the tailwind config. Had to clear the artisan view then the artisan config, then npm run dev on the terminal.
    - Started the edit section. I had to figure out the how to make the edit and update function in the VenueController. It was similar to the create and store, there wwere a few tweaks here and there with the help of chatGPT.
    - In the venue-form.blade, I changed the <x-primary-button> because for some reason the former layout didn't work, instead of using the short form of the if statement (?? : ) , I decided on the full @if statement. I also added a cancel button to redirect to the index.blade, both on the edit and the create.
    - Completed the edit.blade, mostly a copy and paste of the the creat.blade.
    - In the update/create function in VenueController, I decide to move the path to [images/] instead of [images/venues/] becuase I want I set the image in a way that once I update a image, the old image is unlinked(deleted) from the public folder completely.In order to leave the orginal image untouched I redirected the to images/ folder instead.
    - I added the delete function, in order for the venue to be deleted not only front-end(client side/browser) but also in back-end(server-side/phpMyAdmin).
    - I moved the delete and edit buttons to the show.blade to make the index.blade more breathable.
    - Modified the button component as well as the alert-success.blade.
    - Offically completed the CRUD function.

- **Tuesday - 14th Oct:**
    - Started the styling.
    - Had issues with bcakgoround colour, it was easily resolved when I input npm run dev in the terminal.

- **Thursday - 16th Oct:**
    - Continuing with the styling
    - Making a dark and light mode.
    - Ran through some with the route for the venues.show. I wantted a go back button when you click on the edit button that you to the venues.edit. I had to change the if statement to venue !=>null to show that if there's something in there go make to said venue that exists.

### Week 4


## GitHub Link
https://github.com/Light-C-O/wedding_invites-ca1.git

